<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meriise extends CI_Controller
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
			$data['pageTitle'] = "Department Login";
			$data['action'] = 'meriise';
			$data['action1'] = 'meriise/forgot';
			$this->login_template->show('meriise/Login', $data);
		} else {
			$username = $this->input->post('username');
			redirect('meriise/dashboard', 'refresh');
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
			$this->meriise_template->show('meriise/Dashboard', $data);
		} else {
			redirect('meriise-manage', 'refresh');
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
			$data['pageTitle'] = "About MERIISE";
			$data['activeMenu'] = "aboutDept";

			$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();

			$this->meriise_template->show('meriise/aboutDepartment', $data);
		} else {
			redirect('meriise-manage', 'refresh');
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
				$data['action'] = 'meriise/editAboutDepartment/';
				$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();
				$this->meriise_template->show('meriise/editAboutDepartment', $data);
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
				redirect('meriise/aboutDepartment', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function hodDetails()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Contacts";
			$data['activeMenu'] = "hodDetails";

			$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();

			$this->meriise_template->show('meriise/hodDetails', $data);
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function editHodDetails()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Update Contacts";
			$data['activeMenu'] = "hodDetails";

			$this->form_validation->set_rules('hod_name', 'Name', 'required');
			$this->form_validation->set_rules('hod_designation', 'Designation', 'required');
			$this->form_validation->set_rules('hod_email', 'Email', 'required');
			// $this->form_validation->set_rules('hod_message', 'Message', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/editHodDetails';
				$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();
				$this->meriise_template->show('meriise/editHodDetails', $data);
			} else {
				$updateDetails = array(
					'hod_name' => $this->input->post('hod_name'),
					'hod_designation' => $this->input->post('hod_designation'),
					'hod_email' => strtolower($this->input->post('hod_email')),
					'hod_message' => $this->input->post('hod_message'),
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
				redirect('meriise/hodDetails', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function hod_pic()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Update HOD Pic";
			$data['activeMenu'] = "hodDetails";

			$this->meriise_template->show('meriise/hod_pic', $data);
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function hod_upload_pic()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Update HOD Pic";
			$data['activeMenu'] = "hodDetails";

			$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/faculty';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['overwrite'] = true;
			// $config['max_size']  = '0';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('jpeg|jpg');
			$data['upload_data'] = '';

			if (!$this->upload->do_upload('logo')) {
				$data['msg'] = $this->upload->display_errors();
				$this->session->set_flashdata('message', $data['msg']);
				$this->session->set_flashdata('status', 'alert-danger');
			} else {
				$time = date('dHi');
				$data['msg'] = "Upload success!";
				$upload_data = $this->upload->data();
				$data['upload_data'] = $upload_data;

				$file_name = 'HOD.jpg';
				$path = './assets/departments/' . $data['short_name'] . '/faculty/';

				$url = glob('./assets/departments/' . $data['short_name'] . '/faculty/' . $file_name);
				if ($url) {
					unlink($url[0]);
				}

				$image_config['image_library'] = 'gd2';
				$image_config['source_image'] = $upload_data["full_path"];
				$image_config['new_image'] = $upload_data["file_path"] . $file_name;
				$image_config['quality'] = "100%";
				$image_config['maintain_ratio'] = FALSE;
				$image_config['max_size'] = 10000;
				$image_config['width'] = 200;
				$image_config['height'] = 200;
				$image_config['x_axis'] = '0';
				$image_config['y_axis'] = '0';

				$this->load->library('image_lib');

				$this->image_lib->clear();
				$this->image_lib->initialize($image_config);
				$this->image_lib->resize();
				// unlink($upload_data["full_path"]); 

				$this->session->set_flashdata('message', 'HOD Photo uploaded successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
				redirect("dept/hodDetails");
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function editCV()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Update CV";
			$data['activeMenu'] = "hodDetails";

			$data['upload_path'] = './assets/departments/' . $data['short_name'] . '/CV';

			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/editCV/';
				$data['files'] = $this->input->post('files');
				$this->meriise_template->show('meriise/hod_cv', $data);
			} else {

				$url = glob('./assets/departments/' . $data['short_name'] . '/CV/HOD_CV.pdf');
				if ($url) {
					unlink($url[0]);
				}

				$filename = null;
				if (!empty($_FILES['files']['name'])) {

					$config['upload_path'] = $data['upload_path'];
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '10000';
					$config['file_name'] = 'HOD_CV.pdf';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('files')) {
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
					}

					$this->session->set_flashdata('message', 'HOD CV uploaded successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}

				redirect('meriise/hodDetails', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
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
			$data['action'] = 'meriise/changePassword';

			$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
			$this->form_validation->set_rules('newPassword', 'New Password', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['oldPassword'] = '';
				$data['newPassword'] = '';
				$this->meriise_template->show('meriise/changePassword', $data);
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
				redirect('meriise/changePassword', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function student()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Student";
			$data['activeMenu'] = "student";

			$staff = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'student')->result();

			if ($staff != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'Profile', 'width' => '5%'),
					array('data' => 'Name', 'width' => '30%'),
					array('data' => 'Designation', 'width' => '25%'),
					array('data' => 'Branch', 'width' => '15%'),
					array('data' => 'Status', 'width' => '10%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($staff as $staff1) {

					$btn = '<div class="btn-group">
							' . anchor('meriise/viewStudent/' . $staff1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="View Student"') . '
							' . anchor('meriise/editStudent/' . $staff1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Student"') . '
							' . anchor('meriise/deleteStudent/' . $staff1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Student"') . '
						</div>';

					$url = glob('./assets/departments/' . $data['short_name'] . '/student/profile_' . $staff1->id . '-*.jpg');
					if ($url) {
						if (file_exists($url[0])) {
							$profile_pic = base_url() . $url[0];
						} else {
							$profile_pic = base_url() . "assets/departments/avatar.jpg";
						}
					} else {
						$profile_pic = base_url() . "assets/departments/avatar.jpg";
					}

					if ($staff1->status) {
						$status = anchor('meriise/statusStudent/' . $staff1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('meriise/statusStudent/' . $staff1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}

					$this->table->add_row(
						'<img src="' . $profile_pic . '" class="img-avatar img-avatar48">',
						anchor('meriise/viewStudent/' . $staff1->id, $staff1->name),
						$staff1->designation,
						$staff1->department,
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Student details not yet created..! </h4>';
			}

			$this->meriise_template->show('meriise/staff', $data);
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function addStudent()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Student";
			$data['activeMenu'] = "student";

			$this->form_validation->set_rules('name', 'Student Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('department', 'Department', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/addStudent';
				$this->meriise_template->show('meriise/addStaff', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'name' => $this->input->post('name'),
					'designation' => $this->input->post('designation'),
					'department' => $this->input->post('department'),
					'status' => '1'
				);

				$result = $this->admin_model->insertDetails('student', $insertData);
				if ($result) {
					$this->session->set_flashdata('message', 'Student Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('meriise/student', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function viewStudent($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Student";
			$data['activeMenu'] = "student";

			$data['Staff'] = $this->admin_model->getDetails('student', $id)->row();

			$this->meriise_template->show('meriise/view_staff', $data);
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function editStudent($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Student";
			$data['activeMenu'] = "student";

			$this->form_validation->set_rules('name', 'Student Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('department', 'Department', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/editStudent/' . $id;
				$data['Staff'] = $this->admin_model->getDetails('student', $id)->row();
				$this->meriise_template->show('meriise/editStaff', $data);
			} else {
				$updateDetails = array(
					'name' => $this->input->post('name'),
					'designation' => $this->input->post('designation'),
					'department' => $this->input->post('department')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'student');

				if ($result) {
					$this->session->set_flashdata('message', 'Student Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('meriise/student', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function statusStudent($id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Student Status";
			$data['activeMenu'] = "student";

			$updateDetails = array('status' => $status);

			$result = $this->admin_model->updateDetails($id, $updateDetails, 'student');

			if ($result) {
				$this->session->set_flashdata('message', 'Student Status updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('meriise/student', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function deleteStudent($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Student";
			$data['activeMenu'] = "student";

			$studentPic = "profile_" . $id;
			$url = glob('./assets/departments/' . $data['short_name'] . '/student/' . $studentPic . '-*.jpg');
			if ($url) {
				unlink($url[0]);
			}

			$this->admin_model->delDetails('student', $id);

			$this->session->set_flashdata('message', 'Student Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('meriise/student', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function upload_pic()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Upload Student Pic";
			$data['activeMenu'] = "student";

			$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/student/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['overwrite'] = true;
			$config['max_size']  = '3000';

			$staff_id = $this->input->post('staff_id');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('jpeg|jpg|png');
			$data['upload_data'] = '';
			// var_dump($this->upload->data());
			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('message', $this->upload->display_errors());
				$this->session->set_flashdata('status', 'alert-danger');
				redirect("meriise/viewStudent/" . $staff_id);
			} else {
				$time = date('dHi');
				$studentPic = "profile_" . $staff_id;
				$url = glob('./assets/departments/' . $data['short_name'] . '/student/' . $studentPic . '-*.jpg');
				if ($url) {
					unlink($url[0]);
				}

				$upload_data = $this->upload->data();
				$data['upload_data'] = $upload_data;

				$image_config['image_library'] = 'gd2';
				$image_config['source_image'] = $upload_data["full_path"];
				$image_config['new_image'] = $upload_data["file_path"] . $studentPic . '-' . $time . '.jpg';
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

				$this->session->set_flashdata('message', 'Student profile pic uploaded successfully...!');
				$this->session->set_flashdata('status', 'alert-success');

				redirect("meriise/viewStudent/" . $staff_id);
			}
		} else {
			redirect('meriise-manage', 'refresh');
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
					array('data' => 'Specialization', 'width' => '25%'),
				
					array('data' => 'Status', 'width' => '10%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($faculty as $faculty1) {

					$btn = '<div class="btn-group">
							' . anchor('meriise/viewFaculty/' . $faculty1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="View Faculty"') . '
							' . anchor('meriise/editFaculty/' . $faculty1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Faculty"') . '
							' . anchor('meriise/deleteFaculty/' . $faculty1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Faculty"') . '
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
						$status = anchor('meriise/statusFaculty/' . $faculty1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('meriise/statusFaculty/' . $faculty1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}

					$HOD = ($faculty1->isHOD) ? " and HOD" : null;
					$Principal = ($faculty1->isPrincipal) ? " and Principal" : null;
					$VicePrincipal = ($faculty1->isVicePrincipal) ? " and Vice-Principal" : null;

					$this->table->add_row(
						'<img src="' . $profile_pic . '" class="img-avatar img-avatar48">',
						anchor('meriise/viewFaculty/' . $faculty1->id, $faculty1->name),
						$faculty1->specialization,
						
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Faculty details not yet created..! </h4>';
			}

			$this->meriise_template->show('meriise/faculty', $data);
		} else {
			redirect('meriise-manage', 'refresh');
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
			
			$this->form_validation->set_rules('qualification', 'Qualification', 'required');
			$this->form_validation->set_rules('specialization', 'Specialization', 'required');
			
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/addFaculty';
				$data['staffType'] = array(' ' => "Select") + $this->staffType;
				$data['designationType'] = array(' ' => "Select") + $this->designationType;
				$this->meriise_template->show('meriise/addFaculty', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'name' => $this->input->post('name'),
					
					'qualification' => $this->input->post('qualification'),
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
				//   redirect('meriise/faculty', 'refresh');
				redirect("meriise/viewFaculty/" . $faculty_id);
			}
		} else {
			redirect('meriise-manage', 'refresh');
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
			
			$this->form_validation->set_rules('qualification', 'Qualification', 'required');
			$this->form_validation->set_rules('specialization', 'Specialization', 'required');
			
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/editFaculty/' . $id;
				$data['staffType'] = array(' ' => "Select") + $this->staffType;
				$data['designationType'] = array(' ' => "Select") + $this->designationType;
				$data['Faculty'] = $this->admin_model->getDetails('faculty', $id)->row();
				$this->meriise_template->show('meriise/editFaculty', $data);
			} else {
				$updateDetails = array(
					'name' => $this->input->post('name'),
					
					'qualification' => $this->input->post('qualification'),
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
				redirect('meriise/faculty', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
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

			$this->meriise_template->show('meriise/view_faculty', $data);
		} else {
			redirect('meriise-manage', 'refresh');
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

				redirect("meriise/viewFaculty/" . $faculty_id);
			}
		} else {
			redirect('meriise-manage', 'refresh');
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
			redirect('meriise/faculty', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
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

			redirect('meriise/faculty', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function updateProfile($faculty_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Update Profile";
			$data['activeMenu'] = "faculty";
			$data['faculty_id'] = $faculty_id;

			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/updateProfile/' . $faculty_id;
				$data['btn_name'] = 'Add';

				$data['files'] = $this->input->post('files');

				$this->meriise_template->show('meriise/updateProfile', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/profiles/';
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '30000';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('files')) {
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];

						$updateDetails = array('profile' => $filename);
						$res = $this->admin_model->updateDetails($faculty_id, $updateDetails, 'faculty');

						if ($res) {
							$this->session->set_flashdata('message', 'Profile Details are updated successfully...!');
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
				redirect('meriise/viewFaculty/' . $faculty_id, 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}



	function collaborations()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Collaborations";
			$data['activeMenu'] = "collaborations";

			$activityTypes = $this->globals->activityTypes();

			$details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'dept_id', 'academic_year', 'DESC', 'collaborations')->result();

			if ($details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Year', 'width' => '15%'),
					array('data' => 'Collaborations Title', 'width' => '20%'),
					array('data' => 'Details', 'width' => '45%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($details as $details1) {

					$btn = '<div class="btn-group">
							' . anchor('meriise/editCollaborations/' . $details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit Collaborations"') . '
							' . anchor('meriise/deleteCollaborations/' . $details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove Collaborations"') . '
						</div>';
					$this->table->add_row(
						$i++,
						$details1->academic_year,
						$details1->activity_type,
						$details1->details,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Collaborations details not yet created..! </h4>';
			}

			$this->meriise_template->show('meriise/collaborations', $data);
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function addcollaborations()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Collaborations";
			$data['activeMenu'] = "collaborations";

			$data['activityTypes'] = array(' ' => "Select") + $this->globals->activityTypes();

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_rules('activity_type', 'Collaborations Title', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/addCollaborations';
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$this->meriise_template->show('meriise/addCollaborations', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'academic_year' => $this->input->post('academic_year'),
					'activity_type' => $this->input->post('activity_type'),
					'details' => $this->input->post('details')
				);

				$res = $this->admin_model->insertDetails('collaborations', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Collaborations Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('meriise/collaborations', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function editCollaborations($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Collaborations";
			$data['activeMenu'] = "collaborations";

			$data['activityTypes'] = array(' ' => "Select") + $this->globals->activityTypes();

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_rules('activity_type', 'Collaborations Title', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/editCollaborations/' . $id;
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$data['Details'] = $this->admin_model->getDetails('collaborations', $id)->row();
				$this->meriise_template->show('meriise/editCollaborations', $data);
			} else {
				$updateDetails = array(
					'academic_year' => $this->input->post('academic_year'),
					'activity_type' => $this->input->post('activity_type'),
					'details' => $this->input->post('details')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'collaborations');

				if ($result) {
					$this->session->set_flashdata('message', 'Collaborations Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('meriise/collaborations', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function deleteCollaborations($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Collaborations";
			$data['activeMenu'] = "collaborations";

			$this->admin_model->delDetails('collaborations', $id);

			$this->session->set_flashdata('message', 'Collaborations Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-warning');

			redirect('meriise/collaborations', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
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
					' . anchor('meriise/deleteDocuments/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/documents/' . $files, $fileName, 'target="_blank"');
					}


					$this->table->add_row($i++, $fileName, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5">  documents not yet created..! </h4>';
			}
			$this->meriise_template->show('meriise/accredited_documents', $data);
		} else {
			redirect('meriise-manage', 'refresh');
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
				$data['action'] = 'meriise/addDocuments/';
				$data['btn_name'] = 'Add';

				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->meriise_template->show('meriise/addDocuments', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/documents/';
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '30000';
					$config['encrypt_name'] = TRUE;

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
				redirect('meriise/documents', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
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

			redirect('meriise/documents', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('meriise-manage', 'refresh');
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

			$this->meriise_template->show('meriise/latestNews', $data);
		} else {
			redirect('meriise-manage', 'refresh');
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
			$data['action'] = 'meriise/addLatestNews';

			$data['newsDisplay'] = array(' ' => "Select") + $this->globals->newsDisplay2();

			$this->form_validation->set_rules('news_title', 'Title', 'required');
			$this->form_validation->set_rules('display_in', 'Display in', 'required');
			if ($this->form_validation->run() === FALSE) {
				$this->meriise_template->show('meriise/addLatestNews', $data);
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
				redirect('meriise/latestNews', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
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
			$data['action'] = 'meriise/editLatestNews/' . $id;

			$data['newsDisplay'] = array(' ' => "Select") + $this->globals->newsDisplay2();
			$data['Details'] = $this->admin_model->getDetails('events', $id)->row();

			$this->form_validation->set_rules('news_title', 'Title', 'required');
			$this->form_validation->set_rules('display_in', 'Display in', 'required');
			if ($this->form_validation->run() === FALSE) {

				$this->meriise_template->show('meriise/editLatestNews', $data);
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
				redirect('meriise/latestNews', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
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

			$data['newsDisplay'] = array('0' => "") + $this->globals->newsDisplay2();

			$data['latestNews'] = $this->admin_model->getDetails('events', $id)->row();

			$this->meriise_template->show('meriise/viewLatestNews', $data);
		} else {
			redirect('meriise-manage', 'refresh');
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
			$url = glob('./assets/departments/MERIISE/latest_news/' . $fileNames[$filenameID]);
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

			redirect('meriise/viewLatestNews/' . $id, 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
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
			redirect('meriise/latestNews', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
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
			redirect('meriise/latestNews', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
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
					$url = glob('./assets/departments/MERIISE/latest_news/' . $fileNames1);
					if ($url) {
						unlink($url[0]);
					}
				}
			}

			$this->admin_model->delDetails('events', $id);

			$this->session->set_flashdata('message', 'Latest News deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('meriise/latestNews', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
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


	function mhrddocuments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Mhrddocuments";
			$data['activeMenu'] = "mhrddocuments";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'mhrddocuments')->result();

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
				' . anchor('assets/departments/' . $data['short_name'] . '/mhrddocuments/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
				' . anchor('meriise/deleteMhrddocuments/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/mhrddocuments/' . $files, $fileName, 'target="_blank"');
					}



					$this->table->add_row($i++, $fileName, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Documents not yet created..! </h4>';
			}
			$this->meriise_template->show('meriise/mhrddocuments', $data);
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function addMhrddocuments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Mhrddocuments";
			$data['activeMenu'] = "mhrddocuments";

			$this->form_validation->set_rules('details', 'Title', 'trim');
			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/addMhrddocuments/';
				$data['btn_name'] = 'Add';

				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->meriise_template->show('meriise/addMhrddocuments', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/mhrddocuments/';
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '30000';
					$config['encrypt_name'] = TRUE;

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
						$res = $this->admin_model->insertDetails('mhrddocuments', $insertDetails);
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
				redirect('meriise/mhrddocuments', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function deleteMhrddocuments($file_type, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove Accredited Mhrddocuments";
			$data['activeMenu'] = "mhrddocuments";
			$data['eid'] = $id;

			if ($file_type == "F") {
				$Details = $this->admin_model->getDetails('mhrddocuments', $id)->row();
				if ($Details->file_names) {

					$fileName = $Details->file_names;
					$url = glob('./assets/departments/' . $data['short_name'] . '/mhrddocuments/' . $fileName);
					if ($url) {
						unlink($url[0]);
					}
					// array_splice($fileNames, $filenameID, 1); 
				}
			}

			$this->admin_model->delDetails('mhrddocuments', $id);
			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('meriise/mhrddocuments', 'refresh');
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function forgot()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['pageTitle'] = "Forgot Password";
			$data['action'] = 'meriise/forgot';

			$this->login_template->show('meriise/forgot', $data);
		} else {
			$username = $this->input->post('username');
			$newPassword = $this->random_password();
			$updateDetails = array('password' => md5($newPassword));
			$result = $this->admin_model->forgotPassword($username, $updateDetails, 'departments');
			if ($result) {
				$this->session->set_flashdata('message', '<h5 class="text-success">Password reseted successfully...!</h5>');
			} else {
				$this->session->set_flashdata('message', '<h5 class="text-danger">Oops something went wrong please try again.!</h5>');
			}
			redirect('meriise/forgot', 'refresh');
		}
	}

	function random_password()
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$password = array();
		$alpha_length = strlen($alphabet) - 1;
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alpha_length);
			$password[] = $alphabet[$n];
		}
		return implode($password);
	}


	function cms()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "About MERIISE";
			$data['activeMenu'] = "cms";

			$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield('1', 'id', 'meriise')->row();

			$this->meriise_template->show('meriise/cms', $data);
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	function editcms()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Update cms Details";
			$data['activeMenu'] = "cms";

			$this->form_validation->set_rules('infrastructure', 'Infrastructure', 'required');
			// 			$this->form_validation->set_rules('vision', 'Vision', 'required');
			// 			$this->form_validation->set_rules('mission', 'Mission', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'meriise/editcms/';
				$data['departmentsDetails'] =$this->admin_model->getDetailsbyfield('1', 'id', 'meriise')->row();
				$this->meriise_template->show('meriise/editcms', $data);
			} else {
				$updateDetails = array(
					'nain' => $this->input->post('nain'),
					'uba' => $this->input->post('uba'),
					'infrastructure' => $this->input->post('infrastructure'),
					'updated_by' => $data['username'],
					'updated_on' => date('Y-m-d h:i:s')
				);
				$result = $this->admin_model->updateDetailsbyfield('id', '1', $updateDetails, 'meriise');
				if ($result) {
					$this->session->set_flashdata('message', 'Details udpated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('meriise/cms', 'refresh');
			}
		} else {
			redirect('meriise-manage', 'refresh');
		}
	}

	
}
