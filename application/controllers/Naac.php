<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Naac extends CI_Controller
{

	public $courseTypes = array("UG" => "Under Graduation", "PG" => "Post Graduation", "Ph.D" => "Ph.D");
	public $staffType = array('1' => 'Regular', '2' => 'Tenure', '3' => 'Visiting');
	public $designationType = array('1' => 'Professor', '2' => 'Associate Professor', '3' => 'Assistant Professor');

	function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->model('admin_model', '', TRUE);
		$this->load->library(array('table', 'form_validation'));
		$this->load->helper(array('form', 'form_helper'));
		date_default_timezone_set('Asia/Kolkata');
		ini_set('upload_max_filesize', '50M');
	}

	function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		if ($this->form_validation->run() == FALSE) {
			$data['pageTitle'] = "Naac Login";
			$data['action'] = 'naac';

			$this->login_template->show('naac/Login', $data);
		} else {
			$username = $this->input->post('username');
			redirect('naac/dashboard', 'refresh');
		}
	}

	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

		//query the database
		$result = $this->admin_model->deptLogin($username, md5($password));
		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					'department_name' => $row->department_name,
					'short_name' => $row->short_name,
					'username' => $row->username
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}

	function dashboard()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Dashboard";
			$data['activeMenu'] = "dashboard";
			$this->naac_template->show('naac/Dashboard', $data);
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function changePassword()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Dashboard";
			$data['activeMenu'] = "changePassword";
			$data['action'] = 'naac/changePassword';

			$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
			$this->form_validation->set_rules('newPassword', 'New Password', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['oldPassword'] = '';
				$data['newPassword'] = '';
				$this->naac_template->show('naac/changePassword', $data);
			} else {
				$oldPassword = $this->input->post('oldPassword');
				$newPassword = $this->input->post('newPassword');

				if ($oldPassword == $newPassword) {
					$this->session->set_flashdata('message', '<h5 class="text-success">Old and New Password should not be same...!</h5>');
				} else {
					$updateDetails = array('password' => md5($newPassword));
					$result = $this->admin_model->changePassword($data['id'], $oldPassword, $updateDetails, 'departments');
					if ($result) {
						$this->session->set_flashdata('message', '<h5 class="text-success">Password udpated successfully...!</h5>');
					} else {
						$this->session->set_flashdata('message', '<h5 class="text-danger">Oops something went wrong please try again.!</h5>');
					}
				}
				redirect('naac/changePassword', 'refresh');
			}
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function documents()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Documents";
			$data['activeMenu'] = "documents";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'accredited_documents')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Details', 'width' => '80%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($Details as $Details1) {

					if ($Details1->file_type == 'F') {
						$fileName = ($Details1->details) ? $Details1->details : '--';
						$files = $Details1->file_names;
						$files1 = pathinfo($files, PATHINFO_FILENAME);
						$name = str_replace('_', ' ', $files1);

						$btn = '<div class="btn-group">
					' . anchor('assets/departments/' . $data['short_name'] . '/documents/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
					' . anchor('naac/deleteDocuments/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/documents/' . $files, $fileName, 'target="_blank"');
					}

			
					$this->table->add_row($i++, $fileName, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> accredited documents not yet created..! </h4>';
			}
			$this->naac_template->show('naac/accredited_documents', $data);
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function addDocuments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Documents";
			$data['activeMenu'] = "documents";

			$this->form_validation->set_rules('details', 'Title', 'trim');
			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'naac/addDocuments/';
				$data['btn_name'] = 'Add';

				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->naac_template->show('naac/addDocuments', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/documents/';
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '30000';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('files')) {
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];

						$insertDetails = array(
							'dept_id' => $data['id'],
							'details' => $this->input->post('details'),
							'file_names' => $filename,
							'file_type' => 'F',
							'last_updated' => date('Y-m-d h:i:s')
						);
						$res = $this->admin_model->insertDetails('accredited_documents', $insertDetails);
						if ($res) {
							$this->session->set_flashdata('message', 'Accredit Details inserted successfully...!');
							$this->session->set_flashdata('status', 'alert-success');
						} else {
							$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
							$this->session->set_flashdata('status', 'alert-danger');
						}
					} else {
						$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
						$this->session->set_flashdata('status', 'alert-danger');
					}
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('naac/documents', 'refresh');
			}
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function deleteDocuments($file_type, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove Accredited Documents";
			$data['activeMenu'] = "documents";
			$data['eid'] = $id;

			if ($file_type == "F") {
				$Details = $this->admin_model->getDetails('accredited_documents', $id)->row();
				if ($Details->file_names) {

					$fileName = $Details->file_names;
					$url = glob('./assets/departments/' . $data['short_name'] . '/documents/' . $fileName);
					if ($url) {
						unlink($url[0]);
					}
					// array_splice($fileNames, $filenameID, 1); 
				}
			}

			$this->admin_model->delDetails('accredited_documents', $id);
			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('naac/documents', 'refresh');
		} else {
			redirect('naac-manage', 'refresh');
		}
	}


	function naacs()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Naacs";
			$data['activeMenu'] = "naacs";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'naacs')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => "5%"),
					array('data' => 'Cell Name', 'width' => "65%"),
					array('data' => 'Status', 'width' => "10%"),
					array('data' => 'Actions', 'width' => "20%")
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
							' . anchor('naac/naacFiles/' . $Details1->id, '<i class="fa fa-fw fa-file"></i>Add Files', 'class="btn btn-sm btn-primary" data-toggle="tooltip" title="Files List"') . '
							
						</div>';
					if ($Details1->status) {
						$status = anchor('naac/statusNaac/' . $Details1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('naac/statusNaac/' . $Details1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}
					$this->table->add_row(
						$i++,
						anchor('naac/naacFiles/' . $Details1->id, $Details1->name, 'class="text-dark"'),
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Naacs not yet created..! </h4>';
			}

			$this->naac_template->show('naac/naacs', $data);
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function addNaac()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Naac Details";
			$data['activeMenu'] = "naacs";

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'naac/addNaac';
				$this->naac_template->show('naac/addNaac', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'name' => $this->input->post('name'),
					'status' => $this->input->post('status')
				);

				$res = $this->admin_model->insertDetails('naacs', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Naac Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('naac/naacs', 'refresh');
			}
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function editNaac($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Naac Details";
			$data['activeMenu'] = "naacs";

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['Details'] = $this->admin_model->getDetails('naacs', $id)->row();
				$data['action'] = 'naac/editNaac/' . $id;
				$this->naac_template->show('naac/editNaac', $data);
			} else {

				$updateDetails = array(
					'name' => $this->input->post('name'),
					'status' => $this->input->post('status')
				);
				$res = $this->admin_model->updateDetails($id, $updateDetails, 'naacs');
				if ($res) {
					$this->session->set_flashdata('message', 'Naac Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('naac/naacs', 'refresh');
			}
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function statusNaac($id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Naac Status";
			$data['activeMenu'] = "naacs";

			$updateDetails = array('status' => $status);
			$res = $this->admin_model->updateDetails($id, $updateDetails, 'naacs');
			if ($res) {
				$this->session->set_flashdata('message', 'Status details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('naac/naacs', 'refresh');
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function deleteNaac($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Naac Details";
			$data['activeMenu'] = "naacs";

			$this->admin_model->delDetails('naacs', $id);
			$this->admin_model->delDetailsbyfield('naac_files', 'naac_id', $id);

			$this->session->set_flashdata('message', 'Naac Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('naac/naacs', 'refresh');
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function naacFiles($naac_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['activeMenu'] = "naacs";
			$data['naac_id'] = $naac_id;

			$naacDetails = $this->admin_model->getDetails('naacs', $naac_id)->row();
			$data['pageTitle'] = $naacDetails->name . " Files List";
			$Details = $this->admin_model->getDetailsbyfield($naac_id, 'naac_id', 'naac_files')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => "10%"),
					array('data' => 'File', 'width' => "30%"),
					
					array('data' => 'Status', 'width' => "30%"),
					array('data' => 'Actions', 'width' => "30%")
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
							
							' . anchor('naac/deleteNaacFile/' . $naac_id . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
						</div>';
					if ($Details1->status) {
						$status = anchor('naac/statusNaacFile/' . $naac_id . '/' . $Details1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('naac/statusNaacFile/' . $naac_id . '/' . $Details1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}
					$this->table->add_row(
						$i++,
						'<a href="' .base_url() .'assets/departments/' . $data['short_name'] . '/naacs/' .$Details1->file_names . '" target="blank">'.$Details1->title .'</a>',
						
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Naac Files not yet created..! </h4>';
			}

			$this->naac_template->show('naac/naacFiles', $data);
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function addNaacFile($naac_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Naac File Details";
			$data['activeMenu'] = "naacs";
			$data['naac_id'] = $naac_id;

			$this->form_validation->set_rules('naac_id', 'Naac', 'required');
			

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'naac/addNaacFile/' . $naac_id;
				$this->naac_template->show('naac/addNaacFile', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/naacs/';
					$config['allowed_types'] = 'pdf|jpg|jpeg';
					$config['max_size'] = '30000';
					$new_name = time().$_FILES["userfiles"]['name'];
					$config['file_name'] = $new_name;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('files')) {
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
					} else {
						$filename = '';
					}
				} else {
					$filename = '';
				}


				$res='';
               if($filename != '')
			   {
				$insertData = array(
					'naac_id' => $naac_id,
					'order' => $this->input->post('order'),
					'title' => $this->input->post('title'),
					'file_names' => $filename,
					'status' => '1'
				);

				$res = $this->admin_model->insertDetails('naac_files', $insertData);
			   }

			   if($this->input->post('detail') != '')
			   {
				$insertData = array(
					'naac_id' => $naac_id,
					'order' => $this->input->post('order'),
					'title' => $this->input->post('title'),
					'detail' => $this->input->post('detail'),
					'status' => '1'
				);

				$res = $this->admin_model->insertDetails('naac_files', $insertData);
			   }
			   

				
				if ($res) {
					$this->session->set_flashdata('message', 'File Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('naac/naacFiles/' . $naac_id, 'refresh');
			}
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function editNaacFile($naac_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Naac File Details";
			$data['activeMenu'] = "naacs";
			$data['naac_id'] = $naac_id;
			$data['Details'] = $this->admin_model->getDetails('naac_files', $id)->row();
			$this->form_validation->set_rules('naac_id', 'Naac', 'required');
			if ($this->form_validation->run() === FALSE) {
				
				$data['action'] = 'naac/editNaacFile/' . $naac_id . '/' . $id;
				$this->naac_template->show('naac/editNaacFile', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/naacs/';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$config['max_size'] = '30000';
					$new_name = time().$_FILES["userfiles"]['name'];
					$config['file_name'] = $new_name;

					$this->load->library('upload', $config);
					if ($this->upload->do_upload('files')) {
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
					} else {
						$filename = '';
					}
				} else {
					$filename = $data['Details']->file_names;
				}


				$res='';
               if($filename != '')
			   {
				$updateDetails = array(
					
					'file_names' => $filename,
					'status' => '1'
				);

				$res = $this->admin_model->updateDetails($id, $updateDetails, 'naac_files');
			   }
				
				if ($res) {
					$this->session->set_flashdata('message', 'Naac File Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('naac/naacFiles/' . $naac_id, 'refresh');
			}
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function statusNaacFile($naac_id, $id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Naac Status";
			$data['activeMenu'] = "naacs";

			$updateDetails = array('status' => $status);
			$res = $this->admin_model->updateDetails($id, $updateDetails, 'naac_files');
			if ($res) {
				$this->session->set_flashdata('message', 'Status details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('naac/naacFiles/' . $naac_id, 'refresh');
		} else {
			redirect('naac-manage', 'refresh');
		}
	}

	function deleteNaacFile($naac_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Naac Details";
			$data['activeMenu'] = "naacs";
$Details = $this->admin_model->getDetails('naac_files', $id)->row();
		
			
			if ($Details->file_names) {

				$fileName = $Details->file_names;
				// $url = glob('./assets/departments/' . $data['short_name'] . '/naacs/' . $fileName);
				// if ($url) {
				// 	unlink($url[0]);
				// }
				// array_splice($fileNames, $filenameID, 1); 
			}
			$this->admin_model->delDetails('naac_files', $id);
			$this->session->set_flashdata('message', 'Naac File Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('naac/naacFiles/' . $naac_id, 'refresh');
		} else {
			redirect('naac-manage', 'refresh');
		}
	}












	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('naac-manage', 'refresh');
	}
	
	

}
