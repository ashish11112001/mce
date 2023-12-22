<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aicte extends CI_Controller
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
			$data['pageTitle'] = "Aicte Login";
			$data['action'] = 'aicte';

			$this->login_template->show('aicte/Login', $data);
		} else {
			$username = $this->input->post('username');
			redirect('aicte/dashboard', 'refresh');
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
			$this->aicte_template->show('aicte/Dashboard', $data);
		} else {
			redirect('aicte-manage', 'refresh');
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
			$data['action'] = 'aicte/changePassword';

			$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
			$this->form_validation->set_rules('newPassword', 'New Password', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['oldPassword'] = '';
				$data['newPassword'] = '';
				$this->aicte_template->show('aicte/changePassword', $data);
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
				redirect('aicte/changePassword', 'refresh');
			}
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function aboutDepartment()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "About Aicte";
			$data['activeMenu'] = "aboutDept";

			$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();

			$this->aicte_template->show('aicte/aboutDepartment', $data);
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function editAboutDepartment()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Update Department Details";
			$data['activeMenu'] = "aboutDept";

			$this->form_validation->set_rules('about', 'About Department', 'required');
			// 			$this->form_validation->set_rules('vision', 'Vision', 'required');
			// 			$this->form_validation->set_rules('mission', 'Mission', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'aicte/editAboutDepartment/';
				$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();
				$this->aicte_template->show('aicte/editAboutDepartment', $data);
			} else {
				$updateDetails = array(
					'about' => $this->input->post('about'),
					'vision' => $this->input->post('vision'),
					'mission' => $this->input->post('mission'),
					'updated_by' => $data['username'],
					'updated_on' => date('Y-m-d h:i:s')
				);
				$result = $this->admin_model->updateDetailsbyfield('department_id', $data['id'], $updateDetails, 'departments_data');
				if ($result) {
					$this->session->set_flashdata('message', 'Details udpated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('aicte/aboutDepartment', 'refresh');
			}
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function equipments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Equipments";
			$data['activeMenu'] = "equipments";

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
					' . anchor('aicte/deleteDocuments/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/documents/' . $files, $fileName, 'target="_blank"');
					}

			
					$this->table->add_row($i++, $fileName, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Not yet created..! </h4>';
			}
			$this->aicte_template->show('aicte/accredited_documents', $data);
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}






	function addEquipments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Equipments";
			$data['activeMenu'] = "equipments";

			$this->form_validation->set_rules('details', 'Title', 'trim');
			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'aicte/addEquipments/';
				$data['btn_name'] = 'Add';

				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->aicte_template->show('aicte/addDocuments', $data);
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
				redirect('aicte/equipments', 'refresh');
			}
		} else {
			redirect('aicte-manage', 'refresh');
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

			redirect('aicte/equipments', 'refresh');
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}


	
	function latestNews()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "Latest News";
			$data['activeMenu'] = "latestNews";

			$data['latestNews'] = $this->admin_model->getLatestEvents($data['id'])->result();

			$this->aicte_template->show('aicte/latestNews', $data);
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function addLatestNews()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Latest News";
			$data['activeMenu'] = "latestNews";
			$data['action'] = 'aicte/addLatestNews';

			$data['newsDisplay'] = array(' ' => "Select") + $this->globals->newsDisplay1();

			$this->form_validation->set_rules('news_title', 'Title', 'required');
			$this->form_validation->set_rules('display_in', 'Display in', 'required');
			if ($this->form_validation->run() === FALSE) {
				$this->aicte_template->show('aicte/addLatestNews', $data);
			} else {

				$fileNames = [];
				$count = count($_FILES['files']['name']);
				for ($i = 0; $i < $count; $i++) {

					if (!empty($_FILES['files']['name'][$i])) {

						$_FILES['file']['name'] = $_FILES['files']['name'][$i];
						$_FILES['file']['type'] = $_FILES['files']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['files']['error'][$i];
						$_FILES['file']['size'] = $_FILES['files']['size'][$i];

						//   $config['upload_path'] = 'assets/latest_news/'; 
						$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/latest_news/';
						$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
						$config['max_size'] = '5000';
						//   $config['file_name'] = $_FILES['files']['name'][$i];

						$this->load->library('upload', $config);

						if ($this->upload->do_upload('file')) {
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$fileNames[] = $filename;
						}
					}
				}

				$insertData = array(
					'news_title' => $this->input->post('news_title'),
					'news_slug' => $this->create_unique_slug($this->input->post('news_title')),
					'news_date' => date('Y-m-d H:i:s'),
					'news_details' => $this->input->post('news_details'),
					'files' => serialize($fileNames),
					'display_in' => $this->input->post('display_in'),
					'new_label' => '0',
					'dept_id' => $data['id'],
					'status' => '1'
				);


				$result = $this->admin_model->insertDetails('events', $insertData);
				if ($result) {
					$this->session->set_flashdata('message', 'Latest News created successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('aicte/latestNews', 'refresh');
			}
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function editLatestNews($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Latest News";
			$data['activeMenu'] = "latestNews";
			$data['action'] = 'aicte/editLatestNews/' . $id;

			$data['newsDisplay'] = array(' ' => "Select") + $this->globals->newsDisplay1();
			$data['Details'] = $this->admin_model->getDetails('events', $id)->row();

			$this->form_validation->set_rules('news_title', 'Title', 'required');
			$this->form_validation->set_rules('display_in', 'Display in', 'required');
			if ($this->form_validation->run() === FALSE) {

				$this->aicte_template->show('aicte/editLatestNews', $data);
			} else {

				$fileNames = unserialize($data['Details']->files);
				$count = count($_FILES['files']['name']);
				for ($i = 0; $i < $count; $i++) {

					if (!empty($_FILES['files']['name'][$i])) {

						$_FILES['file']['name'] = $_FILES['files']['name'][$i];
						$_FILES['file']['type'] = $_FILES['files']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['files']['error'][$i];
						$_FILES['file']['size'] = $_FILES['files']['size'][$i];

						$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/latest_news/';
						$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
						$config['max_size'] = '5000';
						//   $config['file_name'] = $_FILES['files']['name'][$i];

						$this->load->library('upload', $config);

						if ($this->upload->do_upload('file')) {
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$fileNames[] = $filename;
						}
					}
				}

				$updateDetails = array(
					'news_title' => $this->input->post('news_title'),
					'news_slug' => $this->create_unique_slug($this->input->post('news_title')),
					'news_date' => date('Y-m-d H:i:s'),
					'news_details' => $this->input->post('news_details'),
					'files' => serialize($fileNames),
					'display_in' => $this->input->post('display_in')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'events');

				if ($result) {
					$this->session->set_flashdata('message', 'Latest News updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('aicte/latestNews', 'refresh');
			}
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function viewLatestNews($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "View Latest News";
			$data['activeMenu'] = "latestNews";

			$data['newsDisplay'] = array('0' => "") + $this->globals->newsDisplay1();

			$data['latestNews'] = $this->admin_model->getDetails('events', $id)->row();

			$this->aicte_template->show('aicte/viewLatestNews', $data);
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function latestNewsDelete($id, $filenameID)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "View Latest News";
			$data['activeMenu'] = "latestNews";

			$latestNews = $this->admin_model->getDetails('events', $id)->row();

			$fileNames = unserialize($latestNews->files);
			$url = glob('./assets/latest_news/' . $fileNames[$filenameID]);
			if ($url) {
				unlink($url[0]);
			}
			array_splice($fileNames, $filenameID, 1);

			$updateDetails = array('files' => serialize($fileNames));

			$result = $this->admin_model->updateDetails($id, $updateDetails, 'events');

			if ($result) {
				$this->session->set_flashdata('message', 'Attachment file removed successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}

			redirect('aicte/viewLatestNews/' . $id, 'refresh');
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function updateLatestNewsStatus($id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "View Latest News";
			$data['activeMenu'] = "latestNews";

			$updateDetails = array('status' => $status);

			$result = $this->admin_model->updateDetails($id, $updateDetails, 'events');

			if ($result) {
				$this->session->set_flashdata('message', 'Latest News status updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('aicte/latestNews', 'refresh');
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function updateLatestNewsLabel($id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "View Latest News";
			$data['activeMenu'] = "latestNews";

			$updateDetails = array('new_label' => $status);

			$result = $this->admin_model->updateDetails($id, $updateDetails, 'events');

			if ($result) {
				$this->session->set_flashdata('message', 'New Label status updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('aicte/latestNews', 'refresh');
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}


	function deleteLatestNews($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "View Latest News";
			$data['activeMenu'] = "latestNews";

			$latestNews = $this->admin_model->getDetails('events', $id)->row();
			if ($latestNews->files != '') {
				$fileNames = unserialize($latestNews->files);
				foreach ($fileNames as $fileNames1) {
					$url = glob('./assets/latest_news/' . $fileNames1);
					if ($url) {
						unlink($url[0]);
					}
				}
			}

			$this->admin_model->delDetails('events', $id);

			$this->session->set_flashdata('message', 'Latest News deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('aicte/latestNews', 'refresh');
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function create_unique_slug($string, $table = 'latest_news', $field = 'news_slug', $key = NULL, $value = NULL)
	{
		$t = &get_instance();
		$slug = url_title($string);
		$slug = strtolower($slug);
		$i = 0;
		$params = array();
		$params[$field] = $slug;

		if ($key) $params["$key !="] = $value;

		while ($t->db->where($params)->get($table)->num_rows()) {
			if (!preg_match('/-{1}[0-9]+$/', $slug))
				$slug .= '-' . ++$i;
			else
				$slug = preg_replace('/[0-9]+$/', ++$i, $slug);

			$params[$field] = $slug;
		}
		return $slug;
	}


	function sliders()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Gallery";
			$data['activeMenu'] = "sliders";

			$details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'dept_id', 'academic_year', 'DESC', 'sliders')->result();

			if ($details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					
					array('data' => 'Image', 'width' => '65%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($details as $details1) {

					$btn = '<div class="btn-group">
							
							' . anchor('aicte/deleteSlider/' . $details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove Slider"') . '
						</div>';

					if ($details1->file_name) {
						$file = '<img src="'.base_url().'assets/departments/'.$data['short_name'].'/sliders/'.$details1->file_name.'" width="150px"></img>';
					} else {
						$file = null;
					}

		
					$this->table->add_row(
						$i++,
					
						 $file ,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Gallery details not yet created..! </h4>';
			}

			$this->aicte_template->show('aicte/sliders', $data);
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}


	function editSlider($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Gallery";
			$data['activeMenu'] = "sliders";

			$Details = $this->admin_model->getDetails('sliders', $id)->row();
			if ($Details->file_name) {
				$fileName = $Details->file_name;
				$url = glob('./assets/departments/' . $data['short_name'] . '/sliders/' . $fileName);
				if ($url) {
					unlink($url[0]);
				}
			}
			$updateDetails = array('file_name' => '');
			$result = $this->admin_model->updateDetails($id, $updateDetails, 'sliders');

			if ($result) {
				$this->session->set_flashdata('message', 'Gallery Details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('aicte/sliders', 'refresh');
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}


	function addSlider()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Slider";
			$data['activeMenu'] = "sliders";

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'aicte/addSlider';
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$this->aicte_template->show('aicte/addSlider', $data);
			} else {
				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/sliders/';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$config['max_size'] = '30000';

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

				$insertData = array(
					'dept_id' => $data['id'],
					
					'file_name' => $filename
				
				);

				$res = $this->admin_model->insertDetails('sliders', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Gallery Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('aicte/sliders', 'refresh');
			}
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function deleteSlider($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Slider";
			$data['activeMenu'] = "sliders";

			$Details = $this->admin_model->getDetails('sliders', $id)->row();
			if ($Details->file_names) {

				$fileName = $Details->file_names;
				$url = glob('./assets/departments/' . $data['short_name'] . '/sliders/' . $fileName);
				if ($url) {
					unlink($url[0]);
				}
			}

			$this->admin_model->delDetails('sliders', $id);

			$this->session->set_flashdata('message', 'Gallery Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-warning');

			redirect('aicte/sliders', 'refresh');
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}


	function faculty()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Faculty";
			$data['activeMenu'] = "faculty";

			$faculty = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'faculty')->result();

			if ($faculty != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'Profile', 'width' => '5%'),
					array('data' => 'Name', 'width' => '30%'),
					array('data' => 'Designation', 'width' => '25%'),
					
					array('data' => 'Status', 'width' => '10%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($faculty as $faculty1) {

					$btn = '<div class="btn-group">
							' . anchor('aicte/viewFaculty/' . $faculty1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="View Faculty"') . '
							' . anchor('aicte/editFaculty/' . $faculty1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Faculty"') . '
							' . anchor('aicte/deleteFaculty/' . $faculty1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Faculty"') . '
						</div>';

					$url = glob('./assets/departments/' . $data['short_name'] . '/faculty/profile_' . $faculty1->id . '-*.jpg');
					if ($url) {
						if (file_exists($url[0])) {
							$profile_pic = base_url() . $url[0];
						} else {
							$profile_pic = base_url() . "assets/departments/avatar.jpg";
						}
					} else {
						$profile_pic = base_url() . "assets/departments/avatar.jpg";
					}

					if ($faculty1->status) {
						$status = anchor('aicte/statusFaculty/' . $faculty1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('aicte/statusFaculty/' . $faculty1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}

					$HOD = ($faculty1->isHOD) ? " and HOD" : null;
					$Principal = ($faculty1->isPrincipal) ? " and Principal" : null;
					$VicePrincipal = ($faculty1->isVicePrincipal) ? " and Vice-Principal" : null;

					$this->table->add_row(
						'<img src="' . $profile_pic . '" class="img-avatar img-avatar48">',
						anchor('aicte/viewFaculty/' . $faculty1->id, $faculty1->name),
						$faculty1->specialization,
					
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Faculty details not yet created..! </h4>';
			}

			$this->aicte_template->show('aicte/faculty', $data);
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function addFaculty()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Faculty";
			$data['activeMenu'] = "faculty";

			$this->form_validation->set_rules('name', 'Name', 'required');
		
			$this->form_validation->set_rules('specialization', 'Designation', 'required');
			
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'aicte/addFaculty';
				$data['staffType'] = array(' ' => "Select") + $this->staffType;
				$data['designationType'] = array(' ' => "Select") + $this->designationType;
				$this->aicte_template->show('aicte/addFaculty', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'name' => $this->input->post('name'),
					
					'specialization' => $this->input->post('specialization'),
					'status' => '1'
				);

				$faculty_id = $this->admin_model->insertDetails('faculty', $insertData);
				if ($faculty_id) {
					$this->session->set_flashdata('message', 'Faculty Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				//   redirect('aicte/faculty', 'refresh');
				redirect("aicte/viewFaculty/" . $faculty_id);
			}
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function editFaculty($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Faculty";
			$data['activeMenu'] = "faculty";

			$this->form_validation->set_rules('name', 'Name', 'required');
		
			$this->form_validation->set_rules('specialization', 'Designation', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'aicte/editFaculty/' . $id;
				$data['staffType'] = array(' ' => "Select") + $this->staffType;
				$data['designationType'] = array(' ' => "Select") + $this->designationType;
				$data['Faculty'] = $this->admin_model->getDetails('faculty', $id)->row();
				$this->aicte_template->show('aicte/editFaculty', $data);
			} else {
				$updateDetails = array(
					'name' => $this->input->post('name'),
					'designation_id' => $this->input->post('designation_id'),
					
					'specialization' => $this->input->post('specialization'),
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'faculty');

				if ($result) {
					$this->session->set_flashdata('message', 'Faculty Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('aicte/faculty', 'refresh');
			}
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}


	function viewFaculty($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Faculty";
			$data['activeMenu'] = "faculty";

			$data['staffType'] = array(' ' => "Select") + $this->staffType;
			$data['designationType'] = array(' ' => "Select") + $this->designationType;
			$data['Faculty'] = $this->admin_model->getDetails('faculty', $id)->row();

			$this->aicte_template->show('aicte/view_faculty', $data);
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function faculty_upload_pic()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Upload Faculty Pic";
			$data['activeMenu'] = "faculty";

			echo $config['upload_path'] = './assets/departments/' . $data['short_name'] . '/faculty/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['overwrite'] = true;
			$config['max_size']  = '0';

			$faculty_id = $this->input->post('faculty_id');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('jpeg|jpg');
			$data['upload_data'] = '';

			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('message', $this->upload->display_errors());
				$this->session->set_flashdata('status', 'alert-danger');
				echo $this->upload->display_errors();
			} else {
				$time = date('dHi');
				$facultyPic = "profile_" . $faculty_id;
				$url = glob('./assets/departments/' . $data['short_name'] . '/faculty/' . $facultyPic . '-*.jpg');
				if ($url) {
					unlink($url[0]);
				}

				$upload_data = $this->upload->data();
				$data['upload_data'] = $upload_data;

				$image_config['image_library'] = 'gd2';
				$image_config['source_image'] = $upload_data["full_path"];
				$image_config['new_image'] = $upload_data["file_path"] . $facultyPic . '-' . $time . '.jpg';
				$image_config['quality'] = "100%";
				$image_config['maintain_ratio'] = FALSE;
				$image_config['max_size'] = 10000;
				$image_config['width'] = 1000;
				$image_config['height'] = 1000;
				$image_config['x_axis'] = '0';
				$image_config['y_axis'] = '0';

				$this->load->library('image_lib');

				$this->image_lib->clear();
				$this->image_lib->initialize($image_config);
				$this->image_lib->resize();
				unlink($upload_data["full_path"]);

				$this->session->set_flashdata('message', 'Faculty profile pic uploaded successfully...!');
				$this->session->set_flashdata('status', 'alert-success');

				redirect("aicte/viewFaculty/" . $faculty_id);
			}
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function statusFaculty($id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Faculty Status";
			$data['activeMenu'] = "faculty";

			$updateDetails = array('status' => $status);

			$result = $this->admin_model->updateDetails($id, $updateDetails, 'faculty');

			if ($result) {
				$this->session->set_flashdata('message', 'Faculty Status updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('aicte/faculty', 'refresh');
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}

	function deleteFaculty($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Faculty";
			$data['activeMenu'] = "faculty";

			$facultyPic = "profile_" . $id;
			$url = glob('./assets/departments/' . $data['short_name'] . '/faculty/' . $facultyPic . '-*.jpg');
			if ($url) {
				unlink($url[0]);
			}

			$this->admin_model->delDetails('faculty', $id);

			$this->session->set_flashdata('message', 'Faculty Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('aicte/faculty', 'refresh');
		} else {
			redirect('aicte-manage', 'refresh');
		}
	}



	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('aicte-manage', 'refresh');
	}
	
	

}
