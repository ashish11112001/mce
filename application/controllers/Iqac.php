<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iqac extends CI_Controller
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
			$data['pageTitle'] = "Iqac Login";
			$data['action'] = 'iqac';

			$this->login_template->show('iqac/Login', $data);
		} else {
			$username = $this->input->post('username');
			redirect('iqac/dashboard', 'refresh');
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
			$this->iqac_template->show('iqac/Dashboard', $data);
		} else {
			redirect('iqac-manage', 'refresh');
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
			$data['action'] = 'iqac/changePassword';

			$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
			$this->form_validation->set_rules('newPassword', 'New Password', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['oldPassword'] = '';
				$data['newPassword'] = '';
				$this->iqac_template->show('iqac/changePassword', $data);
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
				redirect('iqac/changePassword', 'refresh');
			}
		} else {
			redirect('iqac-manage', 'refresh');
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
			$data['pageTitle'] = "IQAC MOMS";
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
					' . anchor('iqac/deleteDocuments/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/documents/' . $files, $fileName, 'target="_blank"');
					}

			
					$this->table->add_row($i++, $fileName, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> IQAC MOMS not yet created..! </h4>';
			}
			$this->iqac_template->show('iqac/accredited_documents', $data);
		} else {
			redirect('iqac-manage', 'refresh');
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
			$data['pageTitle'] = "Add IQAC MOMS";
			$data['activeMenu'] = "documents";

			$this->form_validation->set_rules('details', 'Title', 'trim');
			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'iqac/addDocuments/';
				$data['btn_name'] = 'Add';

				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->iqac_template->show('iqac/addDocuments', $data);
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
				redirect('iqac/documents', 'refresh');
			}
		} else {
			redirect('iqac-manage', 'refresh');
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

			redirect('iqac/documents', 'refresh');
		} else {
			redirect('iqac-manage', 'refresh');
		}
	}








	function aqardocuments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "AQAR Documents";
			$data['activeMenu'] = "aqardocuments";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'aqar_documents')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Details', 'width' => '50%'),
					array('data' => 'Report Year', 'width' => '30%'),
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
					' . anchor('assets/departments/' . $data['short_name'] . '/aqardocuments/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
					' . anchor('iqac/deleteAqar/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/aqardocuments/' . $files, $fileName, 'target="_blank"');
					}

			
					$this->table->add_row($i++, $fileName,'AQAR '.$Details1->academic_year, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> AQAR Documents not yet created..! </h4>';
			}
			$this->iqac_template->show('iqac/aqar_documents', $data);
		} else {
			redirect('iqac-manage', 'refresh');
		}
	}

	function addAqar()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add AQAR Documents";
			$data['activeMenu'] = "aqardocuments";
			$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
			$this->form_validation->set_rules('details', 'Title', 'trim');
			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'iqac/addAqar/';
				$data['btn_name'] = 'Add';
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->iqac_template->show('iqac/addAqar', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/aqardocuments/';
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
							'academic_year' => $this->input->post('academic_year'),
							'file_type' => 'F',
							'last_updated' => date('Y-m-d h:i:s')
						);
						$res = $this->admin_model->insertDetails('aqar_documents', $insertDetails);
						if ($res) {
							$this->session->set_flashdata('message', 'AQAR Documents Details inserted successfully...!');
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
				redirect('iqac/aqardocuments', 'refresh');
			}
		} else {
			redirect('iqac-manage', 'refresh');
		}
	}

	function deleteAqar($file_type, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove AQAR Documents";
			$data['activeMenu'] = "aqardocuments";
			$data['eid'] = $id;

			if ($file_type == "F") {
				$Details = $this->admin_model->getDetails('aqar_documents', $id)->row();
				if ($Details->file_names) {

					$fileName = $Details->file_names;
					$url = glob('./assets/departments/' . $data['short_name'] . '/aqardocuments/' . $fileName);
					if ($url) {
						unlink($url[0]);
					}
					// array_splice($fileNames, $filenameID, 1); 
				}
			}

			$this->admin_model->delDetails('aqar_documents', $id);
			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('iqac/aqardocuments', 'refresh');
		} else {
			redirect('iqac-manage', 'refresh');
		}
	}


	function aqarreports()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "AQAR Reports";
			$data['activeMenu'] = "aqarreports";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'aqar_reports')->result();

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
					' . anchor('assets/departments/' . $data['short_name'] . '/aqarreports/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
					' . anchor('iqac/deleteReports/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/aqarreports/' . $files, $fileName, 'target="_blank"');
					}

			
					$this->table->add_row($i++, $fileName, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> AQAR Reports not yet created..! </h4>';
			}
			$this->iqac_template->show('iqac/aqar_reports', $data);
		} else {
			redirect('iqac-manage', 'refresh');
		}
	}

	function addReports()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add AQAR Reports";
			$data['activeMenu'] = "aqarreports";

			$this->form_validation->set_rules('details', 'Title', 'trim');
			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'iqac/addReports/';
				$data['btn_name'] = 'Add';

				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->iqac_template->show('iqac/addReports', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/aqarreports/';
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
						$res = $this->admin_model->insertDetails('aqar_reports', $insertDetails);
						if ($res) {
							$this->session->set_flashdata('message', 'AQAR Reports Details inserted successfully...!');
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
				redirect('iqac/aqarreports', 'refresh');
			}
		} else {
			redirect('iqac-manage', 'refresh');
		}
	}

	function deleteReports($file_type, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove AQAR Reports";
			$data['activeMenu'] = "aqarreports";
			$data['eid'] = $id;

			if ($file_type == "F") {
				$Details = $this->admin_model->getDetails('aqar_reports', $id)->row();
				if ($Details->file_names) {

					$fileName = $Details->file_names;
					$url = glob('./assets/departments/' . $data['short_name'] . '/aqarreports/' . $fileName);
					if ($url) {
						unlink($url[0]);
					}
					// array_splice($fileNames, $filenameID, 1); 
				}
			}

			$this->admin_model->delDetails('aqar_reports', $id);
			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('iqac/aqarreports', 'refresh');
		} else {
			redirect('iqac-manage', 'refresh');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('iqac-manage', 'refresh');
	}
	
	

}
