<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dept extends CI_Controller
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
			$data['action'] = 'dept';

			$this->login_template->show('dept/Login', $data);
		} else {
			$username = $this->input->post('username');
			redirect('dept/dashboard', 'refresh');
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
			$this->dept_template->show('dept/Dashboard', $data);
		} else {
			redirect('dept', 'refresh');
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
			$data['pageTitle'] = "About Department";
			$data['activeMenu'] = "aboutDept";

			$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();

			$this->dept_template->show('dept/aboutDepartment', $data);
		} else {
			redirect('dept', 'refresh');
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
			$this->form_validation->set_rules('vision', 'Vision', 'required');
			$this->form_validation->set_rules('mission', 'Mission', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editAboutDepartment/';
				$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();
				$this->dept_template->show('dept/editAboutDepartment', $data);
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
				redirect('dept/aboutDepartment', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
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

			$this->dept_template->show('dept/hodDetails', $data);
		} else {
			redirect('dept', 'refresh');
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
				$data['action'] = 'dept/editHodDetails';
				$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();
				$this->dept_template->show('dept/editHodDetails', $data);
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
				redirect('dept/hodDetails', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
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

			$this->dept_template->show('dept/hod_pic', $data);
		} else {
			redirect('dept', 'refresh');
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
			redirect('dept', 'refresh');
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
				$data['action'] = 'dept/editCV/';
				$data['files'] = $this->input->post('files');
				$this->dept_template->show('dept/hod_cv', $data);
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

				redirect('dept/hodDetails', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
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
			$data['action'] = 'dept/changePassword';

			$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
			$this->form_validation->set_rules('newPassword', 'New Password', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['oldPassword'] = '';
				$data['newPassword'] = '';
				$this->dept_template->show('dept/changePassword', $data);
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
				redirect('dept/changePassword', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function programmes()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Programmes";
			$data['activeMenu'] = "programmes";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'programmes')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => "5%"),
					array('data' => 'Type', 'width' => "10%"),
					array('data' => 'Course Name', 'width' => "30%"),
					array('data' => 'Year of Approval', 'width' => "20%"),
					array('data' => 'Intake', 'width' => "15%"),
					array('data' => 'Actions', 'width' => "20%")
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="dropdown">
						<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdown-default-outline-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Actions
						</button>
						<div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-outline-light">'
						. anchor('dept/viewProgramme/' . $Details1->id, 'View', 'class="dropdown-item"') . ''
						. anchor('dept/editProgramme/' . $Details1->id, 'Edit', 'class="dropdown-item"') . ''
						. anchor('dept/deleteProgramme/' . $Details1->id, 'Delete', 'class="dropdown-item"') . '
							<div class="dropdown-divider"></div>'
						. anchor('dept/managePEOs/' . $Details1->id, 'PEOs', 'class="dropdown-item"') . ''
						. anchor('dept/managePSOs/' . $Details1->id, 'PSOs', 'class="dropdown-item"') . ''
						. anchor('dept/managePOs/' . $Details1->id, 'POs', 'class="dropdown-item"') . '
						</div>
					</div>';
					$this->table->add_row(
						$i++,
						$Details1->course_type,
						anchor('dept/viewProgramme/' . $Details1->id, $Details1->course_name),
						$Details1->year_of_approval,
						$Details1->intake,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Programmes not yet created..! </h4>';
			}

			$this->dept_template->show('dept/programmes', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addProgramme()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Programme";
			$data['activeMenu'] = "programmes";

			$this->form_validation->set_rules('course_type', 'Type', 'required');
			// $this->form_validation->set_rules('course_name', 'Course Name', 'required');
			$this->form_validation->set_rules('intake', 'Intake', 'required');
			$this->form_validation->set_rules('year_of_approval', 'Year of Approval', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addProgramme';
				$data['courseTypes'] = array(" " => "Select") + $this->courseTypes;
				$this->dept_template->show('dept/addProgramme', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'course_type' => $this->input->post('course_type'),
					'course_name' => $this->input->post('course_name'),
					'intake' => $this->input->post('intake'),
					'year_of_approval' => $this->input->post('year_of_approval'),
					'accreditations' => $this->input->post('accreditations'),
					'collaborations' => $this->input->post('collaborations'),
					'memberships' => $this->input->post('memberships')
				);

				$result = $this->admin_model->insertDetails('programmes', $insertData);
				if ($result) {
					$this->session->set_flashdata('message', 'Programme Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/programmes', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editProgramme($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Programme";
			$data['activeMenu'] = "programmes";

			$this->form_validation->set_rules('course_type', 'Type', 'required');
			// $this->form_validation->set_rules('course_name', 'Course Name', 'required');
			$this->form_validation->set_rules('intake', 'Intake', 'required');
			$this->form_validation->set_rules('year_of_approval', 'Year of Approval', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editProgramme/' . $id;
				$data['courseTypes'] = array(" " => "Select") + $this->courseTypes;
				$data['Programme'] = $this->admin_model->getDetails('programmes', $id)->row();
				$this->dept_template->show('dept/editProgramme', $data);
			} else {
				$updateDetails = array(
					'course_type' => $this->input->post('course_type'),
					'course_name' => $this->input->post('course_name'),
					'intake' => $this->input->post('intake'),
					'year_of_approval' => $this->input->post('year_of_approval'),
					'accreditations' => $this->input->post('accreditations'),
					'collaborations' => $this->input->post('collaborations'),
					'memberships' => $this->input->post('memberships')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'programmes');

				if ($result) {
					$this->session->set_flashdata('message', 'Programme Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/programmes', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteProgramme($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Programme";
			$data['activeMenu'] = "programmes";

			$this->admin_model->delDetails('programmes', $id);
			$this->admin_model->delDetailsbyfield('peos', 'pid', $id);
			$this->admin_model->delDetailsbyfield('psos', 'pid', $id);
			$this->admin_model->delDetailsbyfield('pos', 'pid', $id);

			$this->session->set_flashdata('message', 'Programme Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/programmes', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function viewProgramme($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Programme";
			$data['activeMenu'] = "programmes";

			$data['courseTypes'] = array(" " => "Select") + $this->courseTypes;
			$data['Programme'] = $this->admin_model->getDetails('programmes', $id)->row();
			$data['PEOs'] = $this->admin_model->getDetailsbyfieldSort($id, 'pid', 'id', 'ASC', 'peos')->result();
			$data['PSOs'] = $this->admin_model->getDetailsbyfieldSort($id, 'pid', 'id', 'ASC', 'psos')->result();
			$data['POs'] = $this->admin_model->getDetailsbyfieldSort($id, 'pid', 'id', 'ASC', 'pos')->result();

			$this->dept_template->show('dept/view_programme', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function managePEOs($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];

			$Programme = $this->admin_model->getDetails('programmes', $id)->row();
			$data['pageTitle'] = $Programme->course_name . " - PEO's";
			$data['activeMenu'] = "programmes";

			$data['PEOs'] = $this->admin_model->getDetailsbyfieldSort($id, 'pid', 'id', 'ASC', 'peos')->result();

			$this->form_validation->set_rules('objective_name', 'Objective', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['pid'] = $id;
				$data['action'] = 'dept/managePEOs/' . $id;
				$data['objective_name'] = $this->input->post('objective_name');
				$this->dept_template->show('dept/PEOs', $data);
			} else {
				$insertDetails = array(
					'pid' => $id,
					'objective_name' => $this->input->post('objective_name')
				);

				$result = $this->admin_model->insertDetails('peos', $insertDetails);

				if ($result) {
					$this->session->set_flashdata('message', 'Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/managePEOs/' . $id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}


	function editPEOs($peos_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];

			$Programme = $this->admin_model->getDetails('programmes', $id)->row();
			$data['pageTitle'] = $Programme->course_name . " - PEO's";
			$data['activeMenu'] = "programmes";

			$data['PEOs'] = $this->admin_model->getDetailsbyfieldSort($id, 'pid', 'id', 'ASC', 'peos')->result();
			$this->form_validation->set_rules('objective_name', 'Objective', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['pid'] = $id;
				$data['action'] = 'dept/editPEOs/' . $peos_id . '/' . $id;
				$PEOsData = $this->admin_model->getDetails('peos', $peos_id)->row();
				$data['objective_name'] = $PEOsData->objective_name;
				$this->dept_template->show('dept/PEOs', $data);
			} else {
				$updateDetails = array('objective_name' => $this->input->post('objective_name'));

				$result = $this->admin_model->updateDetails($peos_id, $updateDetails, 'peos');

				if ($result) {
					$this->session->set_flashdata('message', 'Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}

				redirect('dept/managePEOs/' . $id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deletePEOs($peos_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Objective";
			$data['activeMenu'] = "programmes";

			$this->admin_model->delDetails('peos', $peos_id);

			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/managePEOs/' . $id, 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function managePSOs($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];

			$Programme = $this->admin_model->getDetails('programmes', $id)->row();
			$data['pageTitle'] = $Programme->course_name . " - PSO's";
			$data['activeMenu'] = "programmes";

			$data['PSOs'] = $this->admin_model->getDetailsbyfieldSort($id, 'pid', 'id', 'ASC', 'psos')->result();

			$this->form_validation->set_rules('outcome_name', 'Outcome', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['pid'] = $id;
				$data['action'] = 'dept/managePSOs/' . $id;
				$data['outcome_name'] = $this->input->post('outcome_name');
				$this->dept_template->show('dept/PSOs', $data);
			} else {
				$insertDetails = array(
					'pid' => $id,
					'outcome_name' => $this->input->post('outcome_name')
				);

				$result = $this->admin_model->insertDetails('psos', $insertDetails);

				if ($result) {
					$this->session->set_flashdata('message', 'Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/managePSOs/' . $id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}


	function editPSOs($psos_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];

			$Programme = $this->admin_model->getDetails('programmes', $id)->row();
			$data['pageTitle'] = $Programme->course_name . " - PSO's";
			$data['activeMenu'] = "programmes";

			$data['PSOs'] = $this->admin_model->getDetailsbyfieldSort($id, 'pid', 'id', 'ASC', 'psos')->result();
			$this->form_validation->set_rules('outcome_name', 'Outcome', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['pid'] = $id;
				$data['action'] = 'dept/editPSOs/' . $psos_id . '/' . $id;
				$PSOsData = $this->admin_model->getDetails('psos', $psos_id)->row();
				$data['outcome_name'] = $PSOsData->outcome_name;
				$this->dept_template->show('dept/PSOs', $data);
			} else {
				$updateDetails = array('outcome_name' => $this->input->post('outcome_name'));

				$result = $this->admin_model->updateDetails($psos_id, $updateDetails, 'psos');

				if ($result) {
					$this->session->set_flashdata('message', 'Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}

				redirect('dept/managePSOs/' . $id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deletePSOs($psos_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Outcome";
			$data['activeMenu'] = "programmes";

			$this->admin_model->delDetails('psos', $psos_id);

			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/managePSOs/' . $id, 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function managePOs($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];

			$Programme = $this->admin_model->getDetails('programmes', $id)->row();
			$data['pageTitle'] = $Programme->course_name . " - PO's";
			$data['activeMenu'] = "programmes";

			$data['POs'] = $this->admin_model->getDetailsbyfieldSort($id, 'pid', 'id', 'ASC', 'pos')->result();

			$this->form_validation->set_rules('outcome_name', 'Outcome', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['pid'] = $id;
				$data['action'] = 'dept/managePOs/' . $id;
				$data['outcome_name'] = $this->input->post('outcome_name');
				$this->dept_template->show('dept/POs', $data);
			} else {
				$insertDetails = array(
					'pid' => $id,
					'outcome_name' => $this->input->post('outcome_name')
				);

				$result = $this->admin_model->insertDetails('pos', $insertDetails);

				if ($result) {
					$this->session->set_flashdata('message', 'Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/managePOs/' . $id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}


	function editPOs($pos_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];

			$Programme = $this->admin_model->getDetails('programmes', $id)->row();
			$data['pageTitle'] = $Programme->course_name . " - PO's";
			$data['activeMenu'] = "programmes";

			$data['POs'] = $this->admin_model->getDetailsbyfieldSort($id, 'pid', 'id', 'ASC', 'pos')->result();
			$this->form_validation->set_rules('outcome_name', 'Outcome', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['pid'] = $id;
				$data['action'] = 'dept/editPOs/' . $pos_id . '/' . $id;
				$POsData = $this->admin_model->getDetails('pos', $pos_id)->row();
				$data['outcome_name'] = $POsData->outcome_name;
				$this->dept_template->show('dept/POs', $data);
			} else {
				$updateDetails = array('outcome_name' => $this->input->post('outcome_name'));

				$result = $this->admin_model->updateDetails($pos_id, $updateDetails, 'pos');

				if ($result) {
					$this->session->set_flashdata('message', 'Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}

				redirect('dept/managePOs/' . $id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deletePOs($pos_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Outcome";
			$data['activeMenu'] = "programmes";

			$this->admin_model->delDetails('pos', $pos_id);

			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/managePOs/' . $id, 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function staff()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Staff";
			$data['activeMenu'] = "staff";

			$staff = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'staff')->result();

			if ($staff != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'Profile', 'width' => '5%'),
					array('data' => 'Name', 'width' => '30%'),
					array('data' => 'Designation', 'width' => '25%'),
					array('data' => 'Mobile', 'width' => '15%'),
					array('data' => 'Priority', 'width' => '15%'),
					array('data' => 'Status', 'width' => '10%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($staff as $staff1) {

					$btn = '<div class="btn-group">
							' . anchor('dept/viewStaff/' . $staff1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="View Staff"') . '
							' . anchor('dept/editStaff/' . $staff1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Staff"') . '
							' . anchor('dept/deleteStaff/' . $staff1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Staff"') . '
						</div>';

					$url = glob('./assets/departments/' . $data['short_name'] . '/staff/profile_' . $staff1->id . '-*.jpg');
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
						$status = anchor('dept/statusStaff/' . $staff1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('dept/statusStaff/' . $staff1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}

					$this->table->add_row(
						'<img src="' . $profile_pic . '" class="img-avatar img-avatar48">',
						anchor('dept/viewStaff/' . $staff1->id, $staff1->name),
						$staff1->designation,
						$staff1->mobile,
						$staff1->priority_order,
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Staff details not yet created..! </h4>';
			}

			$this->dept_template->show('dept/staff', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addStaff()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Staff";
			$data['activeMenu'] = "staff";

			$this->form_validation->set_rules('name', 'Staff Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			// $this->form_validation->set_rules('experience', 'Experience', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('mobile', 'Moile', 'numeric|exact_length[10]');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addStaff';
				$this->dept_template->show('dept/addStaff', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'name' => $this->input->post('name'),
					'designation' => $this->input->post('designation'),
					'experience' => $this->input->post('experience'),
					'email' => strtolower($this->input->post('email')),
					'mobile' => $this->input->post('mobile'),
					'priority_order' => $this->input->post('priority_order'),
					'status' => '1'
				);

				$result = $this->admin_model->insertDetails('staff', $insertData);
				if ($result) {
					$this->session->set_flashdata('message', 'Staff Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/staff', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function viewStaff($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Staff";
			$data['activeMenu'] = "staff";

			$data['Staff'] = $this->admin_model->getDetails('staff', $id)->row();

			$this->dept_template->show('dept/view_staff', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editStaff($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Staff";
			$data['activeMenu'] = "staff";

			$this->form_validation->set_rules('name', 'Staff Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('experience', 'Experience', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('mobile', 'Moile', 'required|numeric|exact_length[10]');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editStaff/' . $id;
				$data['Staff'] = $this->admin_model->getDetails('staff', $id)->row();
				$this->dept_template->show('dept/editStaff', $data);
			} else {
				$updateDetails = array(
					'name' => $this->input->post('name'),
					'designation' => $this->input->post('designation'),
					'experience' => $this->input->post('experience'),
					'email' => strtolower($this->input->post('email')),
					'priority_order' => $this->input->post('priority_order'),
					'mobile' => $this->input->post('mobile')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'staff');

				if ($result) {
					$this->session->set_flashdata('message', 'Staff Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/staff', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function statusStaff($id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Staff Status";
			$data['activeMenu'] = "staff";

			$updateDetails = array('status' => $status);

			$result = $this->admin_model->updateDetails($id, $updateDetails, 'staff');

			if ($result) {
				$this->session->set_flashdata('message', 'Staff Status updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('dept/staff', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteStaff($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Staff";
			$data['activeMenu'] = "staff";

			$studentPic = "profile_" . $id;
			$url = glob('./assets/departments/' . $data['short_name'] . '/staff/' . $studentPic . '-*.jpg');
			if ($url) {
				unlink($url[0]);
			}

			$this->admin_model->delDetails('staff', $id);

			$this->session->set_flashdata('message', 'Staff Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/staff', 'refresh');
		} else {
			redirect('dept', 'refresh');
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
			$data['pageTitle'] = "Upload Staff Pic";
			$data['activeMenu'] = "staff";

			$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/staff/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['overwrite'] = true;
			$config['max_size']  = '0';

			$staff_id = $this->input->post('staff_id');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('jpeg|jpg');
			$data['upload_data'] = '';

			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('message', $this->upload->display_errors());
				$this->session->set_flashdata('status', 'alert-danger');
			} else {
				$time = date('dHi');
				$studentPic = "profile_" . $staff_id;
				$url = glob('./assets/departments/' . $data['short_name'] . '/staff/' . $studentPic . '-*.jpg');
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

				$this->session->set_flashdata('message', 'Staff profile pic uploaded successfully...!');
				$this->session->set_flashdata('status', 'alert-success');

				redirect("dept/viewStaff/" . $staff_id);
			}
		} else {
			redirect('dept', 'refresh');
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
					array('data' => 'Mobile', 'width' => '15%'),
					array('data' => 'Priority', 'width' => '15%'),
					array('data' => 'Status', 'width' => '10%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($faculty as $faculty1) {

					$btn = '<div class="btn-group">
							' . anchor('dept/viewFaculty/' . $faculty1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="View Faculty"') . '
							' . anchor('dept/editFaculty/' . $faculty1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Faculty"') . '
							' . anchor('dept/deleteFaculty/' . $faculty1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Faculty"') . '
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
						$status = anchor('dept/statusFaculty/' . $faculty1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('dept/statusFaculty/' . $faculty1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}

					$HOD = ($faculty1->isHOD) ? " and HOD" : null;
					$Principal = ($faculty1->isPrincipal) ? " and Principal" : null;
					$VicePrincipal = ($faculty1->isVicePrincipal) ? " and Vice-Principal" : null;

					$this->table->add_row(
						'<img src="' . $profile_pic . '" class="img-avatar img-avatar48">',
						anchor('dept/viewFaculty/' . $faculty1->id, $faculty1->name),
						$this->designationType[$faculty1->designation_id] . $HOD . $Principal . $VicePrincipal,
						$faculty1->mobile,
						$faculty1->priority_order,
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Faculty details not yet created..! </h4>';
			}

			$this->dept_template->show('dept/faculty', $data);
		} else {
			redirect('dept', 'refresh');
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
			$this->form_validation->set_rules('designation_id', 'Designation', 'required');
			$this->form_validation->set_rules('staff_type', 'Staff Type', 'required');
			$this->form_validation->set_rules('qualification', 'Qualification', 'required');
			$this->form_validation->set_rules('specialization', 'Specialization', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('mobile', 'Moile', 'required|numeric|exact_length[10]');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addFaculty';
				$data['staffType'] = array(' ' => "Select") + $this->staffType;
				$data['designationType'] = array(' ' => "Select") + $this->designationType;
				$this->dept_template->show('dept/addFaculty', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'name' => $this->input->post('name'),
					'designation_id' => $this->input->post('designation_id'),
					'isHOD' => $this->input->post('isHOD') ? '1' : '0',
					'isPrincipal' => $this->input->post('isPrincipal') ? '1' : '0',
					'isVicePrincipal' => $this->input->post('isVicePrincipal') ? '1' : '0',
					'staff_type' => $this->input->post('staff_type'),
					'email' => strtolower($this->input->post('email')),
					'password'=>md5($this->input->post('mobile')),
					'mobile' => $this->input->post('mobile'),
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
				//   redirect('dept/faculty', 'refresh');
				redirect("dept/viewFaculty/" . $faculty_id);
			}
		} else {
			redirect('dept', 'refresh');
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
			$this->form_validation->set_rules('designation_id', 'Designation', 'required');
			$this->form_validation->set_rules('staff_type', 'Staff Type', 'required');
			$this->form_validation->set_rules('qualification', 'Qualification', 'required');
			$this->form_validation->set_rules('specialization', 'Specialization', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('mobile', 'Moile', 'required|numeric|exact_length[10]');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editFaculty/' . $id;
				$data['staffType'] = array(' ' => "Select") + $this->staffType;
				$data['designationType'] = array(' ' => "Select") + $this->designationType;
				$data['Faculty'] = $this->admin_model->getDetails('faculty', $id)->row();
				$this->dept_template->show('dept/editFaculty', $data);
			} else {
				$updateDetails = array(
					'name' => $this->input->post('name'),
					'designation_id' => $this->input->post('designation_id'),
					'isHOD' => $this->input->post('isHOD') ? '1' : '0',
					'isPrincipal' => $this->input->post('isPrincipal') ? '1' : '0',
					'isVicePrincipal' => $this->input->post('isVicePrincipal') ? '1' : '0',
					'staff_type' => $this->input->post('staff_type'),
					'password'=>md5($this->input->post('mobile')),
					'email' => strtolower($this->input->post('email')),
					'mobile' => $this->input->post('mobile'),
					'qualification' => $this->input->post('qualification'),
					'specialization' => $this->input->post('specialization'),
					'additional' => $this->input->post('additional'),
					'research' => $this->input->post('research'),
					'google' => $this->input->post('google'),
					'irins' => $this->input->post('irins'),
					'faculty' => $this->input->post('faculty'),
					'priority_order' => $this->input->post('priority_order'),
					'doj' => $this->input->post('doj')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'faculty');

				if ($result) {
					$this->session->set_flashdata('message', 'Faculty Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/faculty', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
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

			$this->dept_template->show('dept/view_faculty', $data);
		} else {
			redirect('dept', 'refresh');
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

			$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/faculty/';
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

				redirect("dept/viewFaculty/" . $faculty_id);
			}
		} else {
			redirect('dept', 'refresh');
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
			redirect('dept/faculty', 'refresh');
		} else {
			redirect('dept', 'refresh');
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

			redirect('dept/faculty', 'refresh');
		} else {
			redirect('dept', 'refresh');
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
				$data['action'] = 'dept/updateProfile/' . $faculty_id;
				$data['btn_name'] = 'Add';

				$data['files'] = $this->input->post('files');

				$this->dept_template->show('dept/updateProfile', $data);
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
				redirect('dept/viewFaculty/' . $faculty_id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function publications()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Publications";
			$data['activeMenu'] = "publications";

			$publicationTypes = $this->globals->publicationTypes();

			$details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'dept_id', 'academic_year', 'DESC', 'publications')->result();

			if ($details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Year', 'width' => '15%'),
					array('data' => 'Publication Type', 'width' => '20%'),
					array('data' => 'Details', 'width' => '45%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($details as $details1) {

					$btn = '<div class="btn-group">
							' . anchor('dept/editPublication/' . $details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit Publication"') . '
							' . anchor('dept/deletePublication/' . $details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove Publication"') . '
						</div>';
					if ($details1->link) {
						$link = anchor($details1->link, '<i class="fa fa-link"></i> Reference Link', 'class="text-primary" target="_blank"');
					} else {
						$link = null;
					}
					$this->table->add_row(
						$i++,
						$details1->academic_year,
						$publicationTypes[$details1->publication_type],
						$details1->details . $link,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Publicattion details not yet created..! </h4>';
			}

			$this->dept_template->show('dept/publications', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addPublication()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Publication";
			$data['activeMenu'] = "publications";

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('publication_type', 'Publication Type', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addPublication';
				$data['publicationTypes'] = array(' ' => "Select") + $this->globals->publicationTypes();
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$this->dept_template->show('dept/addPublication', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'academic_year' => $this->input->post('academic_year'),
					'publication_type' => $this->input->post('publication_type'),
					'details' => $this->input->post('details'),
					'link' => $this->input->post('link')
				);

				$res = $this->admin_model->insertDetails('publications', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Publication Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/publications', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editPublication($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Publication";
			$data['activeMenu'] = "publications";

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('publication_type', 'Publication Type', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editPublication/' . $id;
				$data['publicationTypes'] = array(' ' => "Select") + $this->globals->publicationTypes();
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$data['Details'] = $this->admin_model->getDetails('publications', $id)->row();
				$this->dept_template->show('dept/editPublication', $data);
			} else {
				$updateDetails = array(
					'academic_year' => $this->input->post('academic_year'),
					'publication_type' => $this->input->post('publication_type'),
					'details' => $this->input->post('details'),
					'link' => $this->input->post('link')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'publications');

				if ($result) {
					$this->session->set_flashdata('message', 'Publications Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/publications', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deletePublication($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Publication";
			$data['activeMenu'] = "publications";

			$this->admin_model->delDetails('publications', $id);

			$this->session->set_flashdata('message', 'Publication Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-warning');

			redirect('dept/publications', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}


	function achievements()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Achievements";
			$data['activeMenu'] = "achievements";

			$details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'dept_id', 'academic_year', 'DESC', 'achievements')->result();

			if ($details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Year', 'width' => '15%'),
					array('data' => 'Details', 'width' => '65%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($details as $details1) {

					$btn = '<div class="btn-group">
							' . anchor('dept/editAchievement/' . $details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit Achievement"') . '
							' . anchor('dept/deleteAchievement/' . $details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove Achievement"') . '
						</div>';

					if ($details1->file_name) {
						$file = "File: " . anchor('assets/departments/' . $data['short_name'] . '/achievements/' . $details1->file_name, $details1->file_name, 'target="_blank"') . '<br>';
					} else {
						$file = null;
					}

					if ($details1->url) {
						$url = "Link: " . anchor($details1->url, 'Click here', 'target="_blank"');
					} else {
						$url = null;
					}

					$this->table->add_row(
						$i++,
						$details1->academic_year,
						$details1->details . $file . $url,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Achievement details not yet created..! </h4>';
			}

			$this->dept_template->show('dept/achievements', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addAchievement()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Achievement";
			$data['activeMenu'] = "achievements";

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addAchievement';
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$this->dept_template->show('dept/addAchievement', $data);
			} else {
				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/achievements/';
					$config['allowed_types'] = 'pdf';
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
					'academic_year' => $this->input->post('academic_year'),
					'details' => $this->input->post('details'),
					'file_name' => $filename,
					'url' => $this->input->post('url')
				);

				$res = $this->admin_model->insertDetails('achievements', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Achievement Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/achievements', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editAchievement($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Achievement";
			$data['activeMenu'] = "achievements";
			$data['Details'] = $this->admin_model->getDetails('achievements', $id)->row();
			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editAchievement/' . $id;
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);

				$this->dept_template->show('dept/editAchievement', $data);
			} else {
				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/achievements/';
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '30000';

					$this->load->library('upload', $config);
					if ($this->upload->do_upload('files')) {

						if ($data['Details']->file_name) {
							$fileNameOld = $data['Details']->file_name;
							$url = glob('./assets/departments/' . $data['short_name'] . '/achievements/' . $fileNameOld);
							if ($url) {
								unlink($url[0]);
							}
						}

						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];

						$updateDetails = array(
							'academic_year' => $this->input->post('academic_year'),
							'details' => $this->input->post('details'),
							'file_name' => $filename,
							'url' => $this->input->post('url')
						);
					} else {
						$filename = '';
						$updateDetails = array(
							'academic_year' => $this->input->post('academic_year'),
							'details' => $this->input->post('details'),
							'url' => $this->input->post('url')
						);
					}
				} else {
					$filename = '';
					$updateDetails = array(
						'academic_year' => $this->input->post('academic_year'),
						'details' => $this->input->post('details'),
						'url' => $this->input->post('url')
					);
				}

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'achievements');

				if ($result) {
					$this->session->set_flashdata('message', 'Achievement Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/achievements', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editAchievement1($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Achievement";
			$data['activeMenu'] = "achievements";

			$Details = $this->admin_model->getDetails('achievements', $id)->row();
			if ($Details->file_name) {
				$fileName = $Details->file_name;
				$url = glob('./assets/departments/' . $data['short_name'] . '/achievements/' . $fileName);
				if ($url) {
					unlink($url[0]);
				}
			}
			$updateDetails = array('file_name' => '');
			$result = $this->admin_model->updateDetails($id, $updateDetails, 'achievements');

			if ($result) {
				$this->session->set_flashdata('message', 'Achievement Details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('dept/achievements', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteAchievement($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Achievement";
			$data['activeMenu'] = "achievements";

			$Details = $this->admin_model->getDetails('achievements', $id)->row();
			if ($Details->file_names) {

				$fileName = $Details->file_names;
				$url = glob('./assets/departments/' . $data['short_name'] . '/achievements/' . $fileName);
				if ($url) {
					unlink($url[0]);
				}
			}

			$this->admin_model->delDetails('achievements', $id);

			$this->session->set_flashdata('message', 'Achievement Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-warning');

			redirect('dept/achievements', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function activities()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Activities";
			$data['activeMenu'] = "activities";

			$activityTypes = $this->globals->activityTypes();

			$details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'dept_id', 'academic_year', 'DESC', 'activities')->result();

			if ($details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Year', 'width' => '15%'),
					array('data' => 'Activity Type', 'width' => '20%'),
					array('data' => 'Details', 'width' => '45%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($details as $details1) {

					$btn = '<div class="btn-group">
							' . anchor('dept/editActivity/' . $details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit Activity"') . '
							' . anchor('dept/deleteActivity/' . $details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove Activity"') . '
						</div>';
					$this->table->add_row(
						$i++,
						$details1->academic_year,
						$activityTypes[$details1->activity_type],
						$details1->details,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Activity details not yet created..! </h4>';
			}

			$this->dept_template->show('dept/activities', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addActivity()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Activity";
			$data['activeMenu'] = "activities";

			$data['activityTypes'] = array(' ' => "Select") + $this->globals->activityTypes();

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_rules('activity_type', 'Activity Type', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addActivity';
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$this->dept_template->show('dept/addActivity', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					$new_name                   = time().$_FILES["files"]['name'];
					$config['file_name']        = $new_name;
					$config['upload_path'] = './assets/activity/';
					$config['allowed_types'] = 'pdf';
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
					'academic_year' => $this->input->post('academic_year'),
					'activity_type' => $this->input->post('activity_type'),
					'details' => $this->input->post('details'),
					'file_names'=>$filename
				);

				$res = $this->admin_model->insertDetails('activities', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Activity Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/activities', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editActivity($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Activity";
			$data['activeMenu'] = "activities";

			$data['activityTypes'] = array(' ' => "Select") + $this->globals->activityTypes();

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_rules('activity_type', 'Activity Type', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editActivity/' . $id;
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$data['Details'] = $this->admin_model->getDetails('activities', $id)->row();
				$this->dept_template->show('dept/editActivity', $data);
			} else {
				$updateDetails = array(
					'academic_year' => $this->input->post('academic_year'),
					'activity_type' => $this->input->post('activity_type'),
					'details' => $this->input->post('details')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'activities');

				if ($result) {
					$this->session->set_flashdata('message', 'Activity Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/activities', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteActivity($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Activity";
			$data['activeMenu'] = "activities";

			$this->admin_model->delDetails('activities', $id);

			$this->session->set_flashdata('message', 'Activity Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-warning');

			redirect('dept/activities', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function committees()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Committees";
			$data['activeMenu'] = "committees";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'committees')->result();

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
							' . anchor('dept/committeeMembers/' . $Details1->id, '<i class="fa fa-fw fa-users"></i>', 'class="btn btn-sm btn-primary" data-toggle="tooltip" title="Members List"') . '
							' . anchor('dept/editCommittee/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
							' . anchor('dept/deleteCommittee/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
						</div>';
					if ($Details1->status) {
						$status = anchor('dept/statusCommittee/' . $Details1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('dept/statusCommittee/' . $Details1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}
					$this->table->add_row(
						$i++,
						anchor('dept/committeeMembers/' . $Details1->id, $Details1->name, 'class="text-dark"'),
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Committees not yet created..! </h4>';
			}

			$this->dept_template->show('dept/committees', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addCommittee()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Committee Details";
			$data['activeMenu'] = "committees";

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addCommittee';
				$this->dept_template->show('dept/addCommittee', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'name' => $this->input->post('name'),
					'status' => $this->input->post('status')
				);

				$res = $this->admin_model->insertDetails('committees', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Committee Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/committees', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editCommittee($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Committee Details";
			$data['activeMenu'] = "committees";

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['Details'] = $this->admin_model->getDetails('committees', $id)->row();
				$data['action'] = 'dept/editCommittee/' . $id;
				$this->dept_template->show('dept/editCommittee', $data);
			} else {

				$updateDetails = array(
					'name' => $this->input->post('name'),
					'status' => $this->input->post('status')
				);
				$res = $this->admin_model->updateDetails($id, $updateDetails, 'committees');
				if ($res) {
					$this->session->set_flashdata('message', 'Committee Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/committees', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function statusCommittee($id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Committee Status";
			$data['activeMenu'] = "committees";

			$updateDetails = array('status' => $status);
			$res = $this->admin_model->updateDetails($id, $updateDetails, 'committees');
			if ($res) {
				$this->session->set_flashdata('message', 'Status details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('dept/committees', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteCommittee($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Committee Details";
			$data['activeMenu'] = "committees";

			$this->admin_model->delDetails('committees', $id);
			$this->admin_model->delDetailsbyfield('committee_members', 'committee_id', $id);

			$this->session->set_flashdata('message', 'Committee Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/committees', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function committeeMembers($committee_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['activeMenu'] = "committees";
			$data['committee_id'] = $committee_id;

			$committeeDetails = $this->admin_model->getDetails('committees', $committee_id)->row();
			$data['pageTitle'] = $committeeDetails->name . " Members List";
			$Details = $this->admin_model->getDetailsbyfield($committee_id, 'committee_id', 'committee_members')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => "5%"),
					array('data' => 'Name', 'width' => "15%"),
					array('data' => 'Designation', 'width' => "15%"),
					array('data' => 'Position', 'width' => "15%"),
					array('data' => 'Organisation', 'width' => "15%"),
					array('data' => 'Email', 'width' => "15%"),
					array('data' => 'Status', 'width' => "10%"),
					array('data' => 'Actions', 'width' => "20%")
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
							' . anchor('dept/editCommitteeMember/' . $committee_id . '/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
							' . anchor('dept/deleteCommitteeMember/' . $committee_id . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
						</div>';
					if ($Details1->status) {
						$status = anchor('dept/statusCommitteeMember/' . $committee_id . '/' . $Details1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('dept/statusCommitteeMember/' . $committee_id . '/' . $Details1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}
					$this->table->add_row(
						$i++,
						$Details1->name,
						$Details1->designation,
						$Details1->position,
						$Details1->organisation,
						$Details1->email,
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Committee Members not yet created..! </h4>';
			}

			$this->dept_template->show('dept/committeeMembers', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addCommitteeMember($committee_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Committee Member Details";
			$data['activeMenu'] = "committees";
			$data['committee_id'] = $committee_id;

			$this->form_validation->set_rules('name', 'Name', 'required');
			// $this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');
			// $this->form_validation->set_rules('organisation', 'Organisation/Nominated', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addCommitteeMember/' . $committee_id;
				$this->dept_template->show('dept/addCommitteeMember', $data);
			} else {
				$insertData = array(
					'committee_id' => $committee_id,
					'name' => $this->input->post('name'),
					'position' => $this->input->post('position'),
					'designation' => $this->input->post('designation'),
					'organisation' => $this->input->post('organisation'),
					'email' => $this->input->post('email'),
					'status' => '1'
				);

				$res = $this->admin_model->insertDetails('committee_members', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Member Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/committeeMembers/' . $committee_id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editCommitteeMember($committee_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Committee Member Details";
			$data['activeMenu'] = "committees";
			$data['committee_id'] = $committee_id;

			$this->form_validation->set_rules('name', 'Name', 'required');
			// $this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');
			// $this->form_validation->set_rules('organisation', 'Organisation/Nominated', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['Details'] = $this->admin_model->getDetails('committee_members', $id)->row();
				$data['action'] = 'dept/editCommitteeMember/' . $committee_id . '/' . $id;
				$this->dept_template->show('dept/editCommitteeMember', $data);
			} else {

				$updateDetails = array(
					'name' => $this->input->post('name'),
					'position' => $this->input->post('position'),
					'designation' => $this->input->post('designation'),
					'organisation' => $this->input->post('organisation'),
					'email' => $this->input->post('email')
				);

				$res = $this->admin_model->updateDetails($id, $updateDetails, 'committee_members');
				if ($res) {
					$this->session->set_flashdata('message', 'Committee Member Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/committeeMembers/' . $committee_id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function statusCommitteeMember($committee_id, $id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Committee Status";
			$data['activeMenu'] = "committees";

			$updateDetails = array('status' => $status);
			$res = $this->admin_model->updateDetails($id, $updateDetails, 'committee_members');
			if ($res) {
				$this->session->set_flashdata('message', 'Status details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('dept/committeeMembers/' . $committee_id, 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteCommitteeMember($committee_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Committee Details";
			$data['activeMenu'] = "committees";

			$this->admin_model->delDetails('committee_members', $id);

			$this->session->set_flashdata('message', 'Committee Member Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/committeeMembers/' . $committee_id, 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function researchAreas()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Research Areas";
			$data['activeMenu'] = "research";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'research_areas')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => "5%"),
					array('data' => 'Research Area', 'width' => "75%"),
					array('data' => 'Actions', 'width' => "20%")
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
				' . anchor('dept/editResearchArea/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
				' . anchor('dept/deleteResearchArea/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

					$this->table->add_row(
						$i++,
						$Details1->research_area,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> details not yet created..! </h4>';
			}
			$this->dept_template->show('dept/researchAreas', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addResearchArea()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Research Area Details";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('research_area', 'Research Area', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addResearchArea';
				$this->dept_template->show('dept/addResearchArea', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'research_area' => $this->input->post('research_area'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->insertDetails('research_areas', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Research Areas Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchAreas', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editResearchArea($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Research Area Details";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('research_area', 'Research Area', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['Details'] = $this->admin_model->getDetails('research_areas', $id)->row();
				$data['action'] = 'dept/editResearchArea/' . $id;
				$this->dept_template->show('dept/editResearchArea', $data);
			} else {

				$updateDetails = array('research_area' => $this->input->post('research_area'), 'last_updated' => date('Y-m-d h:i:s'));
				$res = $this->admin_model->updateDetails($id, $updateDetails, 'research_areas');
				if ($res) {
					$this->session->set_flashdata('message', 'Research Area Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchAreas', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteResearchArea($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Research Area Details";
			$data['activeMenu'] = "research";

			$this->admin_model->delDetails('research_areas', $id);

			$this->session->set_flashdata('message', 'Research Area Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/researchAreas', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function researchFaculties()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Research Faculties";
			$data['activeMenu'] = "research";

			$Details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'dept_id', 'year_of_award', 'DESC', 'research_faculties')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Research Supervisor', 'width' => '20%'),
					array('data' => 'Specialization', 'width' => '25%'),
					array('data' => 'Awarded University', 'width' => '20%'),
					array('data' => 'Year of Award', 'width' => '15%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
				' . anchor('dept/editResearchFaculties/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
				' . anchor('dept/deleteResearchFaculties/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

					$this->table->add_row(
						$i++,
						$Details1->faculty_name,
						nl2br($Details1->research_area),
						$Details1->university,
						$Details1->year_of_award,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> details not yet created..! </h4>';
			}
			$this->dept_template->show('dept/researchFaculties', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addResearchFaculties()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add New Research Faculty";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('faculty_name', 'Faculty Name', 'required');
			$this->form_validation->set_rules('research_area', 'Research Area', 'required');
			$this->form_validation->set_rules('university', 'University', 'required');
			$this->form_validation->set_rules('year_of_award', 'Year of Award', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addResearchFaculties/';
				$data['btn_name'] = 'Add';
				$data['faculty_name'] = $this->input->post('faculty_name');
				$data['research_area'] = $this->input->post('research_area');
				$data['university'] = $this->input->post('university');
				$data['year_of_award'] = $this->input->post('year_of_award');
				$this->dept_template->show('dept/addResearchFaculties', $data);
			} else {
				$insertDetails = array(
					'dept_id' => $data['id'],
					'faculty_name' => $this->input->post('faculty_name'),
					'research_area' => $this->input->post('research_area'),
					'university' => $this->input->post('university'),
					'year_of_award' => $this->input->post('year_of_award'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->insertDetails('research_faculties', $insertDetails);

				if ($res) {
					$this->session->set_flashdata('message', 'Research Faculty Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchFaculties', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editResearchFaculties($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Research Faculty";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('faculty_name', 'Faculty Name', 'required');
			$this->form_validation->set_rules('research_area', 'Research Area', 'required');
			$this->form_validation->set_rules('university', 'University', 'required');
			$this->form_validation->set_rules('year_of_award', 'Year of Award', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editResearchFaculties/' . $id;
				$data['btn_name'] = 'Edit';
				$Details = $this->admin_model->getDetails('research_faculties', $id)->row();
				$data['faculty_name'] = $Details->faculty_name;
				$data['research_area'] = $Details->research_area;
				$data['university'] = $Details->university;
				$data['year_of_award'] = $Details->year_of_award;
				$this->dept_template->show('dept/addResearchFaculties', $data);
			} else {
				$updateDetails = array(
					'dept_id' => $data['id'],
					'faculty_name' => $this->input->post('faculty_name'),
					'research_area' => $this->input->post('research_area'),
					'university' => $this->input->post('university'),
					'year_of_award' => $this->input->post('year_of_award'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->updateDetails($id, $updateDetails, 'research_faculties');
				if ($res) {
					$this->session->set_flashdata('message', 'Research Faculty Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchFaculties', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteResearchFaculties($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Research Faculty Details";
			$data['activeMenu'] = "research";

			$this->admin_model->delDetails('research_faculties', $id);

			$this->session->set_flashdata('message', 'Research Faculties Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/researchFaculties', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function researchScholars()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Research Scholars";
			$data['activeMenu'] = "research";

			$Details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'dept_id', 'year', 'DESC', 'research_scholars')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Year of Admission', 'width' => '10%'),
					array('data' => 'Guide Name', 'width' => '25%'),
					array('data' => 'Student Name', 'width' => '25%'),
					array('data' => 'Field of Study', 'width' => '25%'),
					array('data' => 'Action', 'width' => '10%')
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
				' . anchor('dept/viewResearchScholars/' . $Details1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-primary" data-toggle="tooltip" title="View"') . '	
				' . anchor('dept/editResearchScholars/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
				' . anchor('dept/deleteResearchScholars/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

					$this->table->add_row(
						$i++,
						$Details1->year,
						$Details1->guide_name,
						$Details1->student_name,
						$Details1->field_of_study,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> details not yet created..! </h4>';
			}
			$this->dept_template->show('dept/researchScholars', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addResearchScholars()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add New Research Scholars";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('guide_name', 'Guide Name', 'required');
			$this->form_validation->set_rules('student_name', 'Student Name', 'required');
			$this->form_validation->set_rules('field_of_study', 'Field of Study', 'required');
			$this->form_validation->set_rules('scholar_type', 'Scholar Type', 'required');
			$this->form_validation->set_rules('research_type', 'Research Type', 'required');
			$this->form_validation->set_rules('year', 'Admission Year', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addResearchScholars/';
				$data['btn_name'] = 'Add';
				$data['guide_name'] = $this->input->post('guide_name');
				$data['student_name'] = $this->input->post('student_name');
				$data['field_of_study'] = $this->input->post('field_of_study');
				$data['scholar_type'] = $this->input->post('scholar_type');
				$data['research_type'] = $this->input->post('research_type');
				$data['year'] = $this->input->post('year');

				$this->dept_template->show('dept/addResearchScholars', $data);
			} else {
				$insertDetails = array(
					'dept_id' => $data['id'],
					'guide_name' => $this->input->post('guide_name'),
					'student_name' => $this->input->post('student_name'),
					'field_of_study' => $this->input->post('field_of_study'),
					'scholar_type' => $this->input->post('scholar_type'),
					'research_type' => $this->input->post('research_type'),
					'year' => $this->input->post('year'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->insertDetails('research_scholars', $insertDetails);

				if ($res) {
					$this->session->set_flashdata('message', 'Research Scholars Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchScholars', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editResearchScholars($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Research Scholars";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('guide_name', 'Guide Name', 'required');
			$this->form_validation->set_rules('student_name', 'Student Name', 'required');
			$this->form_validation->set_rules('field_of_study', 'Field of Study', 'required');
			$this->form_validation->set_rules('scholar_type', 'Scholar Type', 'required');
			$this->form_validation->set_rules('research_type', 'Research Type', 'required');
			$this->form_validation->set_rules('year', 'Admission Year', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editResearchScholars/' . $id;
				$data['btn_name'] = 'Edit';
				$Details = $this->admin_model->getDetails('research_scholars', $id)->row();
				$data['guide_name'] = $Details->guide_name;
				$data['student_name'] = $Details->student_name;
				$data['field_of_study'] = $Details->field_of_study;
				$data['scholar_type'] = $Details->scholar_type;
				$data['research_type'] = $Details->research_type;
				$data['year'] = $Details->year;
				$this->dept_template->show('dept/addResearchScholars', $data);
			} else {
				$updateDetails = array(
					'dept_id' => $data['id'],
					'guide_name' => $this->input->post('guide_name'),
					'student_name' => $this->input->post('student_name'),
					'field_of_study' => $this->input->post('field_of_study'),
					'scholar_type' => $this->input->post('scholar_type'),
					'research_type' => $this->input->post('research_type'),
					'year' => $this->input->post('year'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->updateDetails($id, $updateDetails, 'research_scholars');
				if ($res) {
					$this->session->set_flashdata('message', 'Research Scholars Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchScholars', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function viewResearchScholars($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Research Scholars";
			$data['activeMenu'] = "research";

			$data['Details'] = $this->admin_model->getDetails('research_scholars', $id)->row();
			$this->dept_template->show('dept/viewResearchScholars', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteResearchScholars($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Research Scholars";
			$data['activeMenu'] = "research";

			$this->admin_model->delDetails('research_scholars', $id);

			$this->session->set_flashdata('message', 'Research Scholars Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/researchScholars', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function researchFacilities()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Research Facilities";
			$data['activeMenu'] = "research";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'research_facilities')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Contact Person', 'width' => '40%'),
					array('data' => 'Research Facility', 'width' => '45%'),
					array('data' => 'Action', 'width' => '10%')
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
				' . anchor('dept/viewResearchFacilities/' . $Details1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-primary" data-toggle="tooltip" title="View"') . '	
				' . anchor('dept/editResearchFacilities/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
				' . anchor('dept/deleteResearchFacilities/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

					$this->table->add_row(
						$i++,
						$Details1->person,
						$Details1->facility,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> details not yet created..! </h4>';
			}
			$this->dept_template->show('dept/researchFacilities', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addResearchFacilities()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add New Research Facilities";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('person', 'Person', 'required');
			$this->form_validation->set_rules('facility', 'Facility', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addResearchFacilities/';
				$data['btn_name'] = 'Add';
				$data['person'] = $this->input->post('person');
				$data['facility'] = $this->input->post('facility');
				$data['description'] = $this->input->post('description');

				$this->dept_template->show('dept/addResearchFacilities', $data);
			} else {
				$insertDetails = array(
					'dept_id' => $data['id'],
					'person' => $this->input->post('person'),
					'facility' => $this->input->post('facility'),
					'description' => $this->input->post('description'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->insertDetails('research_facilities', $insertDetails);

				if ($res) {
					$this->session->set_flashdata('message', 'Research Facility Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchFacilities', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editResearchFacilities($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Research Facilities";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('person', 'Person', 'required');
			$this->form_validation->set_rules('facility', 'Facility', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editResearchFacilities/' . $id;
				$data['btn_name'] = 'Edit';
				$Details = $this->admin_model->getDetails('research_facilities', $id)->row();
				$data['person'] = $Details->person;
				$data['facility'] = $Details->facility;
				$data['description'] = $Details->description;
				$this->dept_template->show('dept/addResearchFacilities', $data);
			} else {
				$updateDetails = array(
					'dept_id' => $data['id'],
					'person' => $this->input->post('person'),
					'facility' => $this->input->post('facility'),
					'description' => $this->input->post('description'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->updateDetails($id, $updateDetails, 'research_facilities');
				if ($res) {
					$this->session->set_flashdata('message', 'Research Facility Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchFacilities', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function viewResearchFacilities($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Research Facilities";
			$data['activeMenu'] = "research";

			$data['Details'] = $this->admin_model->getDetails('research_facilities', $id)->row();
			$this->dept_template->show('dept/viewResearchFacilities', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteResearchFacilities($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Research Facilities";
			$data['activeMenu'] = "research";

			$this->admin_model->delDetails('research_facilities', $id);

			$this->session->set_flashdata('message', 'Research Facilities Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/researchFacilities', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function researchGrants()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Research Grants";
			$data['activeMenu'] = "research";

			$Details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'dept_id', 'sanctioned_year', 'DESC', 'research_grants')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Project Title', 'width' => '60%'),
					array('data' => 'Sanctioned Year', 'width' => '15%'),
					array('data' => 'Status', 'width' => '10%'),
					array('data' => 'Action', 'width' => '10%')
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
				' . anchor('dept/viewResearchGrants/' . $Details1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-primary" data-toggle="tooltip" title="View"') . '	
				' . anchor('dept/editResearchGrants/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
				' . anchor('dept/deleteResearchGrants/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

					$this->table->add_row(
						$i++,
						$Details1->project_title,
						$Details1->sanctioned_year,
						$Details1->status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> details not yet created..! </h4>';
			}
			$this->dept_template->show('dept/researchGrants', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addResearchGrants()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add New Research Grants";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('project_title', 'Project Title', 'required');
			$this->form_validation->set_rules('sanctioned_year', 'Sanctioned Year', 'required');
			$this->form_validation->set_rules('agency', 'Agency', 'required');
			$this->form_validation->set_rules('amount', 'Amount', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('investigators', 'Investigators', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addResearchGrants/';
				$data['btn_name'] = 'Add';

				$data['project_title'] = $this->input->post('project_title');
				$data['sanctioned_year'] = $this->input->post('sanctioned_year');
				$data['amount'] = $this->input->post('amount');
				$data['agency'] = $this->input->post('agency');
				$data['status'] = $this->input->post('status');
				$data['investigators'] = $this->input->post('investigators');

				$this->dept_template->show('dept/addResearchGrants', $data);
			} else {
				$insertDetails = array(
					'dept_id' => $data['id'],
					'project_title' => $this->input->post('project_title'),
					'sanctioned_year' => $this->input->post('sanctioned_year'),
					'amount' => $this->input->post('amount'),
					'agency' => $this->input->post('agency'),
					'status' => $this->input->post('status'),
					'investigators' => $this->input->post('investigators'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->insertDetails('research_grants', $insertDetails);

				if ($res) {
					$this->session->set_flashdata('message', 'Research Grants Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchGrants', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editResearchGrants($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Research Grants";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('project_title', 'Project Title', 'required');
			$this->form_validation->set_rules('sanctioned_year', 'Sanctioned Year', 'required');
			$this->form_validation->set_rules('agency', 'Agency', 'required');
			$this->form_validation->set_rules('amount', 'Amount', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('investigators', 'Investigators', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editResearchGrants/' . $id;
				$data['btn_name'] = 'Edit';
				$Details = $this->admin_model->getDetails('research_grants', $id)->row();

				$data['project_title'] = $Details->project_title;
				$data['sanctioned_year'] = $Details->sanctioned_year;
				$data['amount'] = $Details->amount;
				$data['agency'] = $Details->agency;
				$data['status'] = $Details->status;
				$data['investigators'] = $Details->investigators;

				$this->dept_template->show('dept/addResearchGrants', $data);
			} else {
				$updateDetails = array(
					'dept_id' => $data['id'],
					'project_title' => $this->input->post('project_title'),
					'sanctioned_year' => $this->input->post('sanctioned_year'),
					'amount' => $this->input->post('amount'),
					'agency' => $this->input->post('agency'),
					'status' => $this->input->post('status'),
					'investigators' => $this->input->post('investigators'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->updateDetails($id, $updateDetails, 'research_grants');
				if ($res) {
					$this->session->set_flashdata('message', 'Research Grant Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchGrants', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function viewResearchGrants($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Research Grants";
			$data['activeMenu'] = "research";

			$data['Details'] = $this->admin_model->getDetails('research_grants', $id)->row();
			$this->dept_template->show('dept/viewResearchGrants', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteResearchGrants($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Research Grants";
			$data['activeMenu'] = "research";

			$this->admin_model->delDetails('research_grants', $id);

			$this->session->set_flashdata('message', 'Research Grant Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/researchGrants', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function researchPublications()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Research Publications";
			$data['activeMenu'] = "research";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'research_publications')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Names', 'width' => '40%'),
					array('data' => 'Publication Title', 'width' => '45%'),
					array('data' => 'Action', 'width' => '10%')
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
				' . anchor('dept/viewResearchPublications/' . $Details1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-primary" data-toggle="tooltip" title="View"') . '	
				' . anchor('dept/editResearchPublications/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
				' . anchor('dept/deleteResearchPublications/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

					$this->table->add_row(
						$i++,
						$Details1->student_name,
						$Details1->publication_title,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> details not yet created..! </h4>';
			}
			$this->dept_template->show('dept/researchPublications', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addResearchPublications()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add New Research Publications";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('student_name', 'Student Name', 'required');
			$this->form_validation->set_rules('publication_title', 'Publication Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('coordinator', 'Coordinator', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addResearchPublications/';
				$data['btn_name'] = 'Add';

				$data['student_name'] = $this->input->post('student_name');
				$data['publication_title'] = $this->input->post('publication_title');
				$data['description'] = $this->input->post('description');
				$data['coordinator'] = $this->input->post('coordinator');
				$data['link'] = $this->input->post('link');

				$this->dept_template->show('dept/addResearchPublication', $data);
			} else {
				$insertDetails = array(
					'dept_id' => $data['id'],
					'student_name' => $this->input->post('student_name'),
					'publication_title' => $this->input->post('publication_title'),
					'description' => $this->input->post('description'),
					'coordinator' => $this->input->post('coordinator'),
					'link' => $this->input->post('link'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->insertDetails('research_publications', $insertDetails);

				if ($res) {
					$this->session->set_flashdata('message', 'Research Publications Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchPublications', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editResearchPublications($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Research Publications";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('student_name', 'Student Name', 'required');
			$this->form_validation->set_rules('publication_title', 'Publication Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('coordinator', 'Coordinator', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editResearchPublications/' . $id;
				$data['btn_name'] = 'Edit';
				$Details = $this->admin_model->getDetails('research_publications', $id)->row();

				$data['student_name'] = $Details->student_name;
				$data['publication_title'] = $Details->publication_title;
				$data['description'] = $Details->description;
				$data['coordinator'] = $Details->coordinator;
				$data['link'] = $Details->link;

				$this->dept_template->show('dept/addResearchPublication', $data);
			} else {
				$updateDetails = array(
					'dept_id' => $data['id'],
					'student_name' => $this->input->post('student_name'),
					'publication_title' => $this->input->post('publication_title'),
					'description' => $this->input->post('description'),
					'coordinator' => $this->input->post('coordinator'),
					'link' => $this->input->post('link'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->updateDetails($id, $updateDetails, 'research_publications');
				if ($res) {
					$this->session->set_flashdata('message', 'Research Publication Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/researchPublications', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function viewResearchPublications($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Research Publications";
			$data['activeMenu'] = "research";

			$data['Details'] = $this->admin_model->getDetails('research_publications', $id)->row();
			$this->dept_template->show('dept/viewResearchPublications', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteResearchPublications($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Research Publications";
			$data['activeMenu'] = "research";

			$this->admin_model->delDetails('research_publications', $id);

			$this->session->set_flashdata('message', 'Research Publication Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/researchPublications', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function researchCollaborations()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Research Collaborations/MoUs";
			$data['activeMenu'] = "research";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'research_collaborations')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Title', 'width' => '80%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
				' . anchor('dept/viewResearchCollaborations/' . $Details1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-primary" data-toggle="tooltip" title="View"') . '	
				' . anchor('dept/editResearchCollaborations/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
				' . anchor('dept/deleteResearchCollaborations/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

					$this->table->add_row(
						$i++,
						$Details1->title,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> details not yet created..! </h4>';
			}
			$this->dept_template->show('dept/researchCollaborations', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addResearchCollaborations()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add New Research Collaborations/MoUs";
			$data['activeMenu'] = "research";

			$this->form_validation->set_rules('title', 'Title', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addResearchCollaborations/';
				$data['btn_name'] = 'Add';

				$data['title'] = $this->input->post('title');
				$data['description'] = $this->input->post('description');
				$data['files'] = $this->input->post('files');
				$data['link'] = $this->input->post('link');

				$this->dept_template->show('dept/addResearchCollaborations', $data);
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
						$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/research/';
						$config['allowed_types'] = 'pdf';
						$config['max_size'] = '5000';

						$this->load->library('upload', $config);

						if ($this->upload->do_upload('file')) {
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$fileNames[] = $filename;
						}
					}
				}

				$insertDetails = array(
					'dept_id' => $data['id'],
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'file_names' => serialize($fileNames),
					'link' => $this->input->post('link'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->insertDetails('research_collaborations', $insertDetails);
				if ($res) {
					$this->session->set_flashdata('message', 'Research Collaboration Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}

				redirect('dept/researchCollaborations', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editResearchCollaborations($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Research Collaborations";
			$data['activeMenu'] = "research";
			$data['eid'] = $id;

			$this->form_validation->set_rules('title', 'Title', 'required');
			$Details = $this->admin_model->getDetails('research_collaborations', $id)->row();

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editResearchCollaborations/' . $id;
				$data['btn_name'] = 'Edit';

				$data['title'] = $Details->title;
				$data['description'] = $Details->description;
				$data['files'] = $Details->file_names;
				$data['link'] = $Details->link;

				$this->dept_template->show('dept/addResearchCollaborations', $data);
			} else {

				$fileNames = unserialize($Details->file_names);
				$count = count($_FILES['files']['name']);
				for ($i = 0; $i < $count; $i++) {

					if (!empty($_FILES['files']['name'][$i])) {

						$_FILES['file']['name'] = $_FILES['files']['name'][$i];
						$_FILES['file']['type'] = $_FILES['files']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['files']['error'][$i];
						$_FILES['file']['size'] = $_FILES['files']['size'][$i];

						$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/research/';
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
					'dept_id' => $data['id'],
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'file_names' => serialize($fileNames),
					'link' => $this->input->post('link'),
					'last_updated' => date('Y-m-d h:i:s')
				);

				$res = $this->admin_model->updateDetails($id, $updateDetails, 'research_collaborations');
				if ($res) {
					$this->session->set_flashdata('message', 'Research Publication Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}

				redirect('dept/researchCollaborations', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function viewResearchCollaborations($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Research Collaborations";
			$data['activeMenu'] = "research";
			$data['eid'] = $id;

			$data['Details'] = $this->admin_model->getDetails('research_collaborations', $id)->row();
			$this->dept_template->show('dept/viewResearchCollaborations', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteResearchCollaborationsFile($id, $filenameID)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove Research Collaborations";
			$data['activeMenu'] = "research";
			$data['eid'] = $id;

			$Details = $this->admin_model->getDetails('research_collaborations', $id)->row();

			$fileNames = unserialize($Details->file_names);
			$url = glob('./assets/departments/' . $data['short_name'] . '/research/' . $fileNames[$filenameID]);
			if ($url) {
				unlink($url[0]);
			}
			array_splice($fileNames, $filenameID, 1);

			$updateDetails = array('file_names' => serialize($fileNames));

			$result = $this->admin_model->updateDetails($id, $updateDetails, 'research_collaborations');

			if ($result) {
				$this->session->set_flashdata('message', 'Attachment file removed successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}

			redirect('dept/researchCollaborations', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function syllabus()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Syllabus";
			$data['activeMenu'] = "syllabus";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'syllabus')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Title', 'width' => '80%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$fileName = null;
					$files = $Details1->file_names;
					$files1 = pathinfo($files, PATHINFO_FILENAME);
					$name = str_replace('_', ' ', $files1);

					$btn = '<div class="btn-group">
				' . anchor('assets/departments/' . $data['short_name'] . '/syllabus/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
				' . anchor('dept/deleteSyllabus/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

					$download = anchor('assets/departments/' . $data['short_name'] . '/syllabus/' . $files, $fileName, 'target="_blank"');
					$this->table->add_row($i++, $name, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> details not yet created..! </h4>';
			}
			$this->dept_template->show('dept/syllabus', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addSyllabus()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add New Syllabus";
			$data['activeMenu'] = "syllabus";

			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addSyllabus/';
				$data['btn_name'] = 'Add';

				$data['files'] = $this->input->post('files');

				$this->dept_template->show('dept/addSyllabus', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/syllabus/';
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '30000';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('files')) {
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];

						$insertDetails = array(
							'dept_id' => $data['id'],
							'file_names' => $filename,
							'last_updated' => date('Y-m-d h:i:s')
						);
						$res = $this->admin_model->insertDetails('syllabus', $insertDetails);
						if ($res) {
							$this->session->set_flashdata('message', 'Syllabus Details inserted successfully...!');
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
				redirect('dept/syllabus', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteSyllabus($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove Syllabus";
			$data['activeMenu'] = "research";
			$data['eid'] = $id;

			$Details = $this->admin_model->getDetails('syllabus', $id)->row();

			if ($Details->file_names) {

				$fileName = $Details->file_names;
				$url = glob('./assets/departments/' . $data['short_name'] . '/syllabus/' . $fileName);
				if ($url) {
					unlink($url[0]);
				}
				// array_splice($fileNames, $filenameID, 1); 
			}
			$this->admin_model->delDetails('syllabus', $id);
			$this->session->set_flashdata('message', 'Syllabus Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/syllabus', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function materials()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Course Materials";
			$data['activeMenu'] = "materials";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'materials')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Material Title', 'width' => '80%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($Details as $Details1) {

					if ($Details1->file_type == 'F') {
						$fileName = null;
						$files = $Details1->file_names;
						$files1 = pathinfo($files, PATHINFO_FILENAME);
						$name = str_replace('_', ' ', $files1);

						$btn = '<div class="btn-group">
					' . anchor('assets/departments/' . $data['short_name'] . '/materials/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
					' . anchor('dept/deleteMaterials/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/materials/' . $files, $fileName, 'target="_blank"');
					}

					if ($Details1->file_type == 'L') {

						$name = anchor($Details1->url, $Details1->file_names, 'target="_blank"');

						$btn = '<div class="btn-group">
					' . anchor($Details1->url, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
					' . anchor('dept/deleteMaterials/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						//$download = anchor($Details1->url, $fileName, 'target="_blank"');
					}

					$this->table->add_row($i++, $name, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> materials not yet created..! </h4>';
			}
			$this->dept_template->show('dept/materials', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addMaterials()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add New Materials";
			$data['activeMenu'] = "materials";

			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addMaterials/';
				$data['btn_name'] = 'Add';

				$data['files'] = $this->input->post('files');

				$this->dept_template->show('dept/addMaterials', $data);
			} else {

				$filename = null;
				// var_dump($_FILES);
				// 	die();
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/materials/';
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '300000';

					$this->load->library('upload', $config);

					
					if ($this->upload->do_upload('files')) {
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];

						$insertDetails = array(
							'dept_id' => $data['id'],
							'file_names' => $filename,
							'url' => '',
							'file_type' => 'F',
							'last_updated' => date('Y-m-d h:i:s')
						);
						$res = $this->admin_model->insertDetails('materials', $insertDetails);
						if ($res) {
							$this->session->set_flashdata('message', 'Material Details inserted successfully...!');
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
				redirect('dept/materials', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addMaterialsLink()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add New Material Link";
			$data['activeMenu'] = "materials";

			$this->form_validation->set_rules('files', 'Title', 'trim');
			$this->form_validation->set_rules('url', 'Link/URL', 'trim');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addMaterialsLink/';
				$data['btn_name'] = 'Add';

				$data['files'] = $this->input->post('files');
				$data['url'] = $this->input->post('url');

				$this->dept_template->show('dept/addMaterialsLink', $data);
			} else {
				$insertDetails = array(
					'dept_id' => $data['id'],
					'file_names' => $this->input->post('files'),
					'url' => $this->input->post('url'),
					'file_type' => 'L',
					'last_updated' => date('Y-m-d h:i:s')
				);
				$res = $this->admin_model->insertDetails('materials', $insertDetails);
				if ($res) {
					$this->session->set_flashdata('message', 'Material Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/materials', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteMaterials($file_type, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove Course Materials";
			$data['activeMenu'] = "materials";
			$data['eid'] = $id;

			if ($file_type == "F") {
				$Details = $this->admin_model->getDetails('materials', $id)->row();
				if ($Details->file_names) {

					$fileName = $Details->file_names;
					$url = glob('./assets/departments/' . $data['short_name'] . '/materials/' . $fileName);
					if ($url) {
						unlink($url[0]);
					}
					// array_splice($fileNames, $filenameID, 1); 
				}
			}

			$this->admin_model->delDetails('materials', $id);
			$this->session->set_flashdata('message', 'Material Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/materials', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function accreditedDocuments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Documents";
			$data['activeMenu'] = "accreditedDocuments";

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
					' . anchor('assets/departments/' . $data['short_name'] . '/accreditedDocuments/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
					' . anchor('dept/deleteAccreditedDocuments/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/accreditedDocuments/' . $files, $fileName, 'target="_blank"');
					}

					// if($Details1->file_type == 'L'){

					// $name = anchor($Details1->url,$Details1->file_names,'target="_blank"');

					// $btn = '<div class="btn-group">
					// 	'.anchor($Details1->url,'<i class="fa fa-fw fa-eye"></i>','class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"').'
					// 	'.anchor('dept/deleteMaterials/'.$Details1->file_type.'/'.$Details1->id,'<i class="fa fa-fw fa-times"></i>','class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"').'
					// 	</div>';

					// //$download = anchor($Details1->url, $fileName, 'target="_blank"');
					// }

					$this->table->add_row($i++, $fileName, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> accredited documents not yet created..! </h4>';
			}
			$this->dept_template->show('dept/accredited_documents', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addAccreditedDocuments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Documents";
			$data['activeMenu'] = "accreditedDocuments";

			$this->form_validation->set_rules('details', 'Title', 'trim');
			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addAccreditedDocuments/';
				$data['btn_name'] = 'Add';

				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->dept_template->show('dept/addAccreditedDocuments', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/accreditedDocuments/';
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
				redirect('dept/accreditedDocuments', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteAccreditedDocuments($file_type, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove Accredited Documents";
			$data['activeMenu'] = "accreditedDocuments";
			$data['eid'] = $id;

			if ($file_type == "F") {
				$Details = $this->admin_model->getDetails('accredited_documents', $id)->row();
				if ($Details->file_names) {

					$fileName = $Details->file_names;
					$url = glob('./assets/departments/' . $data['short_name'] . '/accreditedDocuments/' . $fileName);
					if ($url) {
						unlink($url[0]);
					}
					// array_splice($fileNames, $filenameID, 1); 
				}
			}

			$this->admin_model->delDetails('accredited_documents', $id);
			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/accreditedDocuments', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('dept', 'refresh');
	}
	function facilities()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Facilities";
			$data['activeMenu'] = "facilities";

			$details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'dept_id', 'academic_year', 'DESC', 'facilities')->result();

			if ($details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => '5%'),
					array('data' => 'Year', 'width' => '15%'),
					array('data' => 'Details', 'width' => '65%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($details as $details1) {

					$btn = '<div class="btn-group">
							' . anchor('dept/editFacilitie/' . $details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit Facilitie"') . '
							' . anchor('dept/deleteFacilitie/' . $details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove Facilitie"') . '
						</div>';

					if ($details1->file_name) {
						$file = "File: " . anchor('assets/departments/' . $data['short_name'] . '/facilities/' . $details1->file_name, $details1->file_name, 'target="_blank"') . '<br>';
					} else {
						$file = null;
					}

					if ($details1->url) {
						$url = "Link: " . anchor($details1->url, 'Click here', 'target="_blank"');
					} else {
						$url = null;
					}

					$this->table->add_row(
						$i++,
						$details1->academic_year,
						$details1->details . $file . $url,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Facilitie details not yet created..! </h4>';
			}

			$this->dept_template->show('dept/facilities', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}


	function editFacilitie($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Facilitie";
			$data['activeMenu'] = "facilities";

			$Details = $this->admin_model->getDetails('facilities', $id)->row();
			if ($Details->file_name) {
				$fileName = $Details->file_name;
				$url = glob('./assets/departments/' . $data['short_name'] . '/facilities/' . $fileName);
				if ($url) {
					unlink($url[0]);
				}
			}
			$updateDetails = array('file_name' => '');
			$result = $this->admin_model->updateDetails($id, $updateDetails, 'facilities');

			if ($result) {
				$this->session->set_flashdata('message', 'Facilitie Details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('dept/facilities', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}


	function addFacilitie()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Facilitie";
			$data['activeMenu'] = "facilities";

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addFacilitie';
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$this->dept_template->show('dept/addFacilitie', $data);
			} else {
				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/facilities/';
					$config['allowed_types'] = 'pdf';
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
					'academic_year' => $this->input->post('academic_year'),
					'details' => $this->input->post('details'),
					'file_name' => $filename,
					'url' => $this->input->post('url')
				);

				$res = $this->admin_model->insertDetails('facilities', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Facilitie Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/facilities', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteFacilitie($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Facilitie";
			$data['activeMenu'] = "facilities";

			$Details = $this->admin_model->getDetails('facilities', $id)->row();
			if ($Details->file_names) {

				$fileName = $Details->file_names;
				$url = glob('./assets/departments/' . $data['short_name'] . '/facilities/' . $fileName);
				if ($url) {
					unlink($url[0]);
				}
			}

			$this->admin_model->delDetails('facilities', $id);

			$this->session->set_flashdata('message', 'Facilitie Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-warning');

			redirect('dept/facilities', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}


	function alumni()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Alumni";
			$data['activeMenu'] = "alumni";

			$alumni = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'alumni')->result();

			if ($alumni != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'Profile', 'width' => '5%'),
					array('data' => 'Name', 'width' => '30%'),
					array('data' => 'Designation', 'width' => '25%'),
					array('data' => 'Mobile', 'width' => '15%'),
					array('data' => 'Status', 'width' => '10%'),
					array('data' => 'Action', 'width' => '15%')
				);
				$i = 1;
				foreach ($alumni as $alumni1) {

					$btn = '<div class="btn-group">
						' . anchor('dept/viewAlumni/' . $alumni1->id, '<i class="fa fa-fw fa-eye"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="View Alumni"') . '
						' . anchor('dept/editAlumni/' . $alumni1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Alumni"') . '
						' . anchor('dept/deleteAlumni/' . $alumni1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Alumni"') . '
					</div>';

					$url = glob('./assets/departments/' . $data['short_name'] . '/alumni/profile_' . $alumni1->id . '-*.jpg');
					if ($url) {
						if (file_exists($url[0])) {
							$profile_pic = base_url() . $url[0];
						} else {
							$profile_pic = base_url() . "assets/departments/avatar.jpg";
						}
					} else {
						$profile_pic = base_url() . "assets/departments/avatar.jpg";
					}

					if ($alumni1->status) {
						$status = anchor('dept/statusAlumni/' . $alumni1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('dept/statusAlumni/' . $alumni1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}

					$this->table->add_row(
						'<img src="' . $profile_pic . '" class="img-avatar img-avatar48">',
						anchor('dept/viewAlumni/' . $alumni1->id, $alumni1->name),
						$alumni1->designation,
						$alumni1->mobile,
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Alumni details not yet created..! </h4>';
			}

			$this->dept_template->show('dept/alumni', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addAlumni()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Alumni";
			$data['activeMenu'] = "alumni";

			$this->form_validation->set_rules('name', 'Alumni Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			// $this->form_validation->set_rules('experience', 'Experience', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('mobile', 'Moile', 'numeric|exact_length[10]');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addAlumni';
				$this->dept_template->show('dept/addAlumni', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'name' => $this->input->post('name'),
					'designation' => $this->input->post('designation'),
					'experience' => $this->input->post('experience'),
					'email' => strtolower($this->input->post('email')),
					'mobile' => $this->input->post('mobile'),
					'status' => '1'
				);

				$result = $this->admin_model->insertDetails('alumni', $insertData);
				if ($result) {
					$this->session->set_flashdata('message', 'Alumni Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/alumni', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function viewAlumni($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "View Alumni";
			$data['activeMenu'] = "alumni";

			$data['Alumni'] = $this->admin_model->getDetails('alumni', $id)->row();

			$this->dept_template->show('dept/view_alumni', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editAlumni($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Alumni";
			$data['activeMenu'] = "alumni";

			$this->form_validation->set_rules('name', 'Alumni Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('experience', 'Experience', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('mobile', 'Moile', 'required|numeric|exact_length[10]');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/editAlumni/' . $id;
				$data['Alumni'] = $this->admin_model->getDetails('alumni', $id)->row();
				$this->dept_template->show('dept/editAlumni', $data);
			} else {
				$updateDetails = array(
					'name' => $this->input->post('name'),
					'designation' => $this->input->post('designation'),
					'experience' => $this->input->post('experience'),
					'email' => strtolower($this->input->post('email')),
					'mobile' => $this->input->post('mobile')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'alumni');

				if ($result) {
					$this->session->set_flashdata('message', 'Alumni Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/alumni', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function statusAlumni($id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Alumni Status";
			$data['activeMenu'] = "alumni";

			$updateDetails = array('status' => $status);

			$result = $this->admin_model->updateDetails($id, $updateDetails, 'alumni');

			if ($result) {
				$this->session->set_flashdata('message', 'Alumni Status updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('dept/alumni', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteAlumni($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Alumni";
			$data['activeMenu'] = "alumni";

			$studentPic = "profile_" . $id;
			$url = glob('./assets/departments/' . $data['short_name'] . '/alumni/' . $studentPic . '-*.jpg');
			if ($url) {
				unlink($url[0]);
			}

			$this->admin_model->delDetails('alumni', $id);

			$this->session->set_flashdata('message', 'Alumni Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/alumni', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function upload_pic_alumni()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Upload Alumni Pic";
			$data['activeMenu'] = "alumni";

			$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/alumni/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['overwrite'] = true;
			$config['max_size']  = '0';

			$alumni_id = $this->input->post('alumni_id');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('jpeg|jpg');
			$data['upload_data'] = '';

			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('message', $this->upload->display_errors());
				$this->session->set_flashdata('status', 'alert-danger');
			} else {
				$time = date('dHi');
				$studentPic = "profile_" . $alumni_id;
				$url = glob('./assets/departments/' . $data['short_name'] . '/alumni/' . $studentPic . '-*.jpg');
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

				$this->session->set_flashdata('message', 'Alumni profile pic uploaded successfully...!');
				$this->session->set_flashdata('status', 'alert-success');

				redirect("dept/viewAlumni/" . $alumni_id);
			}
		} else {
			redirect('dept', 'refresh');
		}
	}
	
		function sliders()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Sliders";
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
							
							' . anchor('dept/deleteSlider/' . $details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove Slider"') . '
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
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Slider details not yet created..! </h4>';
			}

			$this->dept_template->show('dept/sliders', $data);
		} else {
			redirect('dept', 'refresh');
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
			$data['pageTitle'] = "Edit Slider";
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
				$this->session->set_flashdata('message', 'Slider Details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('dept/sliders', 'refresh');
		} else {
			redirect('dept', 'refresh');
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
				$data['action'] = 'dept/addSlider';
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$this->dept_template->show('dept/addSlider', $data);
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
					$this->session->set_flashdata('message', 'Slider Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/sliders', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
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

			$this->session->set_flashdata('message', 'Slider Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-warning');

			redirect('dept/sliders', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function placementDepartment()
{
    if ($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['department_name'] = $session_data['department_name'];
        $data['short_name'] = $session_data['short_name'];
        $data['pageTitle'] = "Placement Department";
        $data['activeMenu'] = "placementDept";

        $data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();

        $this->dept_template->show('dept/placementDepartment', $data);
    } else {
        redirect('dept', 'refresh');
    }
}

function editPlacementDepartment()
{
    if ($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['department_name'] = $session_data['department_name'];
        $data['short_name'] = $session_data['short_name'];
        $data['pageTitle'] = "Update Department Details";
        $data['activeMenu'] = "placementDept";

        $this->form_validation->set_rules('placement', 'Placement Department', 'required');
     
        if ($this->form_validation->run() === FALSE) {
            $data['action'] = 'dept/editPlacementDepartment/';
            $data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['id'], 'department_id', 'departments_data')->row();
            $this->dept_template->show('dept/editPlacementDepartment', $data);
        } else {
            $updateDetails = array(
                'placement' => $this->input->post('placement'),
            
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
            redirect('dept/placementDepartment', 'refresh');
        }
    } else {
        redirect('dept', 'refresh');
    }
}


function newsletters()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Newsletters";
			$data['activeMenu'] = "newsletters";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'newsletters')->result();

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
					' . anchor('assets/departments/' . $data['short_name'] . '/newsletters/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
					' . anchor('dept/deleteNewsletters/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/newsletters/' . $files, $fileName, 'target="_blank"');
					}

				

					$this->table->add_row($i++, $fileName, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Newsletters not yet created..! </h4>';
			}
			$this->dept_template->show('dept/newsletters', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addNewsletters()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Newsletters";
			$data['activeMenu'] = "newsletters";

			$this->form_validation->set_rules('details', 'Title', 'trim');
			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addNewsletters/';
				$data['btn_name'] = 'Add';

				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->dept_template->show('dept/addNewsletters', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/newsletters/';
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
						$res = $this->admin_model->insertDetails('newsletters', $insertDetails);
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
				redirect('dept/newsletters', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteNewsletters($file_type, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove Newsletters";
			$data['activeMenu'] = "newsletters";
			$data['eid'] = $id;

			if ($file_type == "F") {
				$Details = $this->admin_model->getDetails('newsletters', $id)->row();
				if ($Details->file_names) {

					$fileName = $Details->file_names;
					$url = glob('./assets/departments/' . $data['short_name'] . '/newsletters/' . $fileName);
					if ($url) {
						unlink($url[0]);
					}
					// array_splice($fileNames, $filenameID, 1); 
				}
			}

			$this->admin_model->delDetails('newsletters', $id);
			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/newsletters', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function disclosures()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Disclosures";
			$data['activeMenu'] = "disclosures";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'disclosures')->result();

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
					' . anchor('assets/departments/' . $data['short_name'] . '/disclosures/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
					' . anchor('dept/deleteDisclosures/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
					</div>';

						$download = anchor('assets/departments/' . $data['short_name'] . '/disclosures/' . $files, $fileName, 'target="_blank"');
					}

				

					$this->table->add_row($i++, $fileName, $btn);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Disclosures not yet created..! </h4>';
			}
			$this->dept_template->show('dept/disclosures', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addDisclosures()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Disclosures";
			$data['activeMenu'] = "disclosures";

			$this->form_validation->set_rules('details', 'Title', 'trim');
			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addDisclosures/';
				$data['btn_name'] = 'Add';

				$data['details'] = $this->input->post('details');
				$data['files'] = $this->input->post('files');

				$this->dept_template->show('dept/addDisclosures', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					//   $config['upload_path'] = 'assets/latest_news/'; 
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/disclosures/';
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
						$res = $this->admin_model->insertDetails('disclosures', $insertDetails);
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
				redirect('dept/disclosures', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteDisclosures($file_type, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Remove Disclosures";
			$data['activeMenu'] = "disclosures";
			$data['eid'] = $id;

			if ($file_type == "F") {
				$Details = $this->admin_model->getDetails('disclosures', $id)->row();
				if ($Details->file_names) {

					$fileName = $Details->file_names;
					$url = glob('./assets/departments/' . $data['short_name'] . '/disclosures/' . $fileName);
					if ($url) {
						unlink($url[0]);
					}
					// array_splice($fileNames, $filenameID, 1); 
				}
			}

			$this->admin_model->delDetails('disclosures', $id);
			$this->session->set_flashdata('message', 'Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/disclosures', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}



	function albums()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Albums";
			$data['activeMenu'] = "albums";

			$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'albums')->result();

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
							' . anchor('dept/albumImages/' . $Details1->id, '<i class="fa fa-fw fa-users"></i>', 'class="btn btn-sm btn-primary" data-toggle="tooltip" title="Images List"') . '
							' . anchor('dept/editAlbum/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
							' . anchor('dept/deleteAlbum/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
						</div>';
					if ($Details1->status) {
						$status = anchor('dept/statusAlbum/' . $Details1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('dept/statusAlbum/' . $Details1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}
					$this->table->add_row(
						$i++,
						anchor('dept/albumImages/' . $Details1->id, $Details1->name, 'class="text-dark"'),
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Albums not yet created..! </h4>';
			}

			$this->dept_template->show('dept/albums', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addAlbum()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Album Details";
			$data['activeMenu'] = "albums";

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addAlbum';
				$this->dept_template->show('dept/addAlbum', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['id'],
					'name' => $this->input->post('name'),
					'status' => $this->input->post('status')
				);

				$res = $this->admin_model->insertDetails('albums', $insertData);
				if ($res) {
					$this->session->set_flashdata('message', 'Album Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/albums', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editAlbum($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Album Details";
			$data['activeMenu'] = "albums";

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['Details'] = $this->admin_model->getDetails('albums', $id)->row();
				$data['action'] = 'dept/editAlbum/' . $id;
				$this->dept_template->show('dept/editAlbum', $data);
			} else {

				$updateDetails = array(
					'name' => $this->input->post('name'),
					'status' => $this->input->post('status')
				);
				$res = $this->admin_model->updateDetails($id, $updateDetails, 'albums');
				if ($res) {
					$this->session->set_flashdata('message', 'Album Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/albums', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function statusAlbum($id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Album Status";
			$data['activeMenu'] = "albums";

			$updateDetails = array('status' => $status);
			$res = $this->admin_model->updateDetails($id, $updateDetails, 'albums');
			if ($res) {
				$this->session->set_flashdata('message', 'Status details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('dept/albums', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteAlbum($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Album Details";
			$data['activeMenu'] = "albums";

			$this->admin_model->delDetails('albums', $id);
			$this->admin_model->delDetailsbyfield('album_images', 'album_id', $id);

			$this->session->set_flashdata('message', 'Album Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/albums', 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function albumImages($album_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['activeMenu'] = "albums";
			$data['album_id'] = $album_id;

			$albumDetails = $this->admin_model->getDetails('albums', $album_id)->row();
			$data['pageTitle'] = $albumDetails->name . " Images List";
			$Details = $this->admin_model->getDetailsbyfield($album_id, 'album_id', 'album_images')->result();

			if ($Details != null) {
				$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
					array('data' => 'S.No', 'width' => "10%"),
					array('data' => 'Image', 'width' => "30%"),
					
					array('data' => 'Status', 'width' => "30%"),
					array('data' => 'Actions', 'width' => "30%")
				);
				$i = 1;
				foreach ($Details as $Details1) {
					$btn = '<div class="btn-group">
							' . anchor('dept/editAlbumImage/' . $album_id . '/' . $Details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"') . '
							' . anchor('dept/deleteAlbumImage/' . $album_id . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
						</div>';
					if ($Details1->status) {
						$status = anchor('dept/statusAlbumImage/' . $album_id . '/' . $Details1->id . '/0', 'Enabled', 'class="badge badge-success fa-sm"');
					} else {
						$status = anchor('dept/statusAlbumImage/' . $album_id . '/' . $Details1->id . '/1', 'Disabled', 'class="badge badge-danger fa-sm"');
					}
					$this->table->add_row(
						$i++,
						'<img src="' .base_url() .'assets/departments/' . $data['short_name'] . '/albums/' .$Details1->file_names . '" class="img-avatar img-avatar48">',
						
						$status,
						$btn
					);
				}
				$data['table'] = $this->table->generate();
			} else {
				$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Album Images not yet created..! </h4>';
			}

			$this->dept_template->show('dept/albumImages', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function addAlbumImage($album_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Add Album Image Details";
			$data['activeMenu'] = "albums";
			$data['album_id'] = $album_id;

			$this->form_validation->set_rules('album_id', 'Album', 'required');
			

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'dept/addAlbumImage/' . $album_id;
				$this->dept_template->show('dept/addAlbumImage', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/albums/';
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
					$filename = '';
				}


				$res='';
               if($filename != '')
			   {
				$insertData = array(
					'album_id' => $album_id,
					
					'file_names' => $filename,
					'status' => '1'
				);

				$res = $this->admin_model->insertDetails('album_images', $insertData);
			   }
				
				if ($res) {
					$this->session->set_flashdata('message', 'Image Details inserted successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/albumImages/' . $album_id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function editAlbumImage($album_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Edit Album Image Details";
			$data['activeMenu'] = "albums";
			$data['album_id'] = $album_id;
			$data['Details'] = $this->admin_model->getDetails('album_images', $id)->row();
			$this->form_validation->set_rules('album_id', 'Album', 'required');
			if ($this->form_validation->run() === FALSE) {
				
				$data['action'] = 'dept/editAlbumImage/' . $album_id . '/' . $id;
				$this->dept_template->show('dept/editAlbumImage', $data);
			} else {

				$filename = null;
				if (!empty($_FILES['files']['name'])) {
					$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/albums/';
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

				$res = $this->admin_model->updateDetails($id, $updateDetails, 'album_images');
			   }
				
				if ($res) {
					$this->session->set_flashdata('message', 'Album Image Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/albumImages/' . $album_id, 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
		}
	}

	function statusAlbumImage($album_id, $id, $status)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Album Status";
			$data['activeMenu'] = "albums";

			$updateDetails = array('status' => $status);
			$res = $this->admin_model->updateDetails($id, $updateDetails, 'album_images');
			if ($res) {
				$this->session->set_flashdata('message', 'Status details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('dept/albumImages/' . $album_id, 'refresh');
		} else {
			redirect('dept', 'refresh');
		}
	}

	function deleteAlbumImage($album_id, $id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $session_data['short_name'];
			$data['pageTitle'] = "Delete Album Details";
			$data['activeMenu'] = "albums";

			$this->admin_model->delDetails('album_images', $id);

			$this->session->set_flashdata('message', 'Album Image Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-success');

			redirect('dept/albumImages/' . $album_id, 'refresh');
		} else {
			redirect('dept', 'refresh');
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

			$this->dept_template->show('dept/latestNews', $data);
		} else {
			redirect('dept', 'refresh');
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
			$data['action'] = 'dept/addLatestNews';

			$data['newsDisplay'] = array(' ' => "Select") + $this->globals->newsDisplay1();

			$this->form_validation->set_rules('news_title', 'Title', 'required');
			
			if ($this->form_validation->run() === FALSE) {
				$this->dept_template->show('dept/addLatestNews', $data);
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
					'display_in' => '4',
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
				redirect('dept/latestNews', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
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
			$data['action'] = 'dept/editLatestNews/' . $id;

			$data['newsDisplay'] = array(' ' => "Select") + $this->globals->newsDisplay1();
			$data['Details'] = $this->admin_model->getDetails('events', $id)->row();

			$this->form_validation->set_rules('news_title', 'Title', 'required');
			
			if ($this->form_validation->run() === FALSE) {

				$this->dept_template->show('dept/editLatestNews', $data);
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
					'display_in' => '4'
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'events');

				if ($result) {
					$this->session->set_flashdata('message', 'Latest News updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-danger');
				}
				redirect('dept/latestNews', 'refresh');
			}
		} else {
			redirect('dept', 'refresh');
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

			$this->dept_template->show('dept/viewLatestNews', $data);
		} else {
			redirect('dept', 'refresh');
		}
	}

	function latestNewsDelete($id, $filenameID)
	{
		if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];

			$data['pageTitle'] = "View Latest News";
			$data['activeMenu'] = "latestNews";

			$latestNews = $this->admin_model->getDetails('events', $id)->row();

			$fileNames = unserialize($latestNews->files);
			$url = glob('./assets/departments/' . $data['short_name'] . '/latest_news/' . $fileNames[$filenameID]);
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

			redirect('dept/viewLatestNews/' . $id, 'refresh');
		} else {
			redirect('dept', 'refresh');
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
			redirect('dept/latestNews', 'refresh');
		} else {
			redirect('dept', 'refresh');
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
			redirect('dept/latestNews', 'refresh');
		} else {
			redirect('dept', 'refresh');
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

			redirect('dept/latestNews', 'refresh');
		} else {
			redirect('dept', 'refresh');
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


	
function placements()
{
	if ($this->session->userdata('logged_in')) {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['department_name'] = $session_data['department_name'];
		$data['short_name'] = $session_data['short_name'];
		$data['pageTitle'] = "Placements";
		$data['activeMenu'] = "placements";

		$Details = $this->admin_model->getDetailsbyfield($data['id'], 'dept_id', 'placements')->result();

		if ($Details != null) {
			$table_setup = array('table_open' => '<table class="table table-bordered table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
			$this->table->set_template($table_setup);
			$this->table->set_heading(
				array('data' => 'S.No', 'width' => '5%'),
				array('data' => 'Title', 'width' => '80%'),
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
				' . anchor('assets/placements/' . $files, '<i class="fa fa-fw fa-download"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" target="_blank"') . '
				' . anchor('dept/deletePlacements/' . $Details1->file_type . '/' . $Details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove"') . '
				</div>';

					$download = anchor('assets/placements/' . $files, $fileName, 'target="_blank"');
				}

			

				$this->table->add_row($i++, $fileName, $btn);
			}
			$data['table'] = $this->table->generate();
		} else {
			$data['table'] = '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Placements not yet created..! </h4>';
		}
		$this->dept_template->show('dept/placements', $data);
	} else {
		redirect('dept', 'refresh');
	}
}

function addPlacements()
{
	if ($this->session->userdata('logged_in')) {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['department_name'] = $session_data['department_name'];
		$data['short_name'] = $session_data['short_name'];
		$data['pageTitle'] = "Add Placements";
		$data['activeMenu'] = "placements";

		$this->form_validation->set_rules('details', 'Title', 'trim');
		$this->form_validation->set_rules('files', 'File Name', 'trim');

		if ($this->form_validation->run() === FALSE) {
			$data['action'] = 'dept/addPlacements/';
			$data['btn_name'] = 'Add';

			$data['details'] = $this->input->post('details');
			$data['files'] = $this->input->post('files');

			$this->dept_template->show('dept/addPlacements', $data);
		} else {

			$filename = null;
			if (!empty($_FILES['files']['name'])) {
				

				$new_name                   = time().$_FILES["files"]['name'];
				$config['file_name']        = $new_name;
				$config['upload_path'] = './assets/placements/';
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
					$res = $this->admin_model->insertDetails('placements', $insertDetails);
					if ($res) {
						$this->session->set_flashdata('message', 'Placement Files inserted successfully...!');
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
			redirect('dept/placements', 'refresh');
		}
	} else {
		redirect('dept', 'refresh');
	}
}

function deletePlacements($file_type, $id)
{
	if ($this->session->userdata('logged_in')) {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['department_name'] = $session_data['department_name'];
		$data['short_name'] = $session_data['short_name'];
		$data['pageTitle'] = "Remove Placements";
		$data['activeMenu'] = "placements";
		$data['eid'] = $id;

		if ($file_type == "F") {
			$Details = $this->admin_model->getDetails('placements', $id)->row();
			if ($Details->file_names) {

				$fileName = $Details->file_names;
				$url = glob('./assets/placements/' . $fileName);
				if ($url) {
					unlink($url[0]);
				}
				// array_splice($fileNames, $filenameID, 1); 
			}
		}

		$this->admin_model->delDetails('placements', $id);
		$this->session->set_flashdata('message', 'Details deleted successfully...!');
		$this->session->set_flashdata('status', 'alert-success');

		redirect('dept/placements', 'refresh');
	} else {
		redirect('dept', 'refresh');
	}
}


}
