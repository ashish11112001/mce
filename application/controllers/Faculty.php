<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faculty extends CI_Controller
{

	public $courseTypes = array("UG" => "Under Graduation", "PG" => "Post Graduation", "Ph.D" => "Ph.D");
	public $staffType = array('1' => 'Regular', '2' => 'Tenure', '3' => 'Visiting');
	public $designationType = array('1' => 'Professor', '2' => 'Associate Professor', '3' => 'Assistant Professor');

	function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->model('admin_model', '', TRUE);
		$this->load->model('globals_model', '', TRUE);
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
			$data['pageTitle'] = "Faculty Login";
			$data['action'] = 'faculty';

			$this->login_template->show('faculty/Login', $data);
		} else {
			$username = $this->input->post('username');
			redirect('faculty/dashboard', 'refresh');
		}
	}

	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

		//query the database
		$result = $this->admin_model->FacultyLogin($username, md5($password));
		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					'name' => $row->name,
					'dept_id' => $row->dept_id,
					'email' => $row->email
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
			$data['name'] = $session_data['name'];
			
			$data['pageTitle'] = "Dashboard";
			$data['activeMenu'] = "dashboard";
			$this->faculty_template->show('faculty/Dashboard', $data);
		} else {
			redirect('faculty', 'refresh');
		}
	}

	function changePassword()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['name'] = $session_data['name'];
			$data['email'] = $session_data['email'];
			$data['dept_id'] = $session_data['dept_id'];
			$data['pageTitle'] = "Dashboard";
			$data['activeMenu'] = "changePassword";
			$data['action'] = 'faculty/changePassword';

			$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
			$this->form_validation->set_rules('newPassword', 'New Password', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['oldPassword'] = '';
				$data['newPassword'] = '';
				$this->faculty_template->show('faculty/changePassword', $data);
			} else {
				$oldPassword = $this->input->post('oldPassword');
				$newPassword = $this->input->post('newPassword');

				if ($oldPassword == $newPassword) {
					$this->session->set_flashdata('message', '<h5 class="text-success">Old and New Password should not be same...!</h5>');
				} else {
					$updateDetails = array('password' => md5($newPassword));
					$result = $this->admin_model->changePassword($data['id'], $oldPassword, $updateDetails, 'faculty');
					if ($result) {
						$this->session->set_flashdata('message', '<h5 class="text-success">Password udpated successfully...!</h5>');
					} else {
						$this->session->set_flashdata('message', '<h5 class="text-danger">Oops something went wrong please try again.!</h5>');
					}
				}
				redirect('faculty/changePassword', 'refresh');
			}
		} else {
			redirect('faculty', 'refresh');
		}
	}

	function profile()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$id=$session_data['id'];
			$data['dept_id'] = $session_data['dept_id'];
			// $data['username'] = $session_data['username'];
			// $data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
			$data['pageTitle'] = "My Profile";
			$data['activeMenu'] = "faculty";

			$data['staffType'] = array(' ' => "Select") + $this->staffType;
			$data['designationType'] = array(' ' => "Select") + $this->designationType;
			$data['Faculty'] = $this->admin_model->getDetails('faculty', $id)->row();

			$this->faculty_template->show('faculty/view_profile', $data);
		} else {
			redirect('faculty', 'refresh');
		}
	}


	function profile_edit()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$id=$session_data['id'];
			$data['dept_id'] = $session_data['dept_id'];
			// $data['username'] = $session_data['username'];
			// $data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
			$data['pageTitle'] = "Edit Profile";
			$data['activeMenu'] = "profile_edit";

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('designation_id', 'Designation', 'required');
			$this->form_validation->set_rules('staff_type', 'Staff Type', 'required');
			$this->form_validation->set_rules('qualification', 'Qualification', 'required');
			$this->form_validation->set_rules('specialization', 'Specialization', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('mobile', 'Moile', 'required|numeric|exact_length[10]');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'faculty/profile_edit/';
				$data['staffType'] = array(' ' => "Select") + $this->staffType;
				$data['designationType'] = array(' ' => "Select") + $this->designationType;
				$data['Faculty'] = $this->admin_model->getDetails('faculty', $id)->row();
				$this->faculty_template->show('faculty/profile', $data);
			} else {
				$updateDetails = array(
					'name' => $this->input->post('name'),
					'designation_id' => $this->input->post('designation_id'),
					'isHOD' => $this->input->post('isHOD') ? '1' : '0',
					'isPrincipal' => $this->input->post('isPrincipal') ? '1' : '0',
					'isVicePrincipal' => $this->input->post('isVicePrincipal') ? '1' : '0',
					'staff_type' => $this->input->post('staff_type'),
					'email' => strtolower($this->input->post('email')),
					'mobile' => $this->input->post('mobile'),
					'qualification' => $this->input->post('qualification'),
					'specialization' => $this->input->post('specialization'),
					'additional' => $this->input->post('additional'),
					'research' => $this->input->post('research'),
					'google' => $this->input->post('google'),
					'irins' => $this->input->post('irins'),
					'faculty' => $this->input->post('faculty'),
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
				redirect('faculty/profile', 'refresh');
			}
		} else {
			redirect('faculty', 'refresh');
		}
	}

	function faculty_upload_pic()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$id=$session_data['id'];
			$data['dept_id'] = $session_data['dept_id'];
			// $data['username'] = $session_data['username'];
			// $data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
			$data['pageTitle'] = "Upload Faculty Pic";
			$data['activeMenu'] = "profile";

			$config['upload_path'] = './assets/departments/' . $data['short_name'] . '/faculty/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['overwrite'] = true;
			$config['max_size']  = '0';

			$faculty_id = $session_data['id'];

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('jpeg|jpg');
			$data['upload_data'] = '';

			if (!$this->upload->do_upload('logo')) {
				echo $this->upload->display_errors();
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

				$this->session->set_flashdata('message', 'Profile pic uploaded successfully...!');
				$this->session->set_flashdata('status', 'alert-success');

				redirect("faculty/profile/" );
			}
		} else {
			redirect('faculty', 'refresh');
		}
	}


	function updateProfile()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['dept_id'] = $session_data['dept_id'];
			// $data['username'] = $session_data['username'];
			// $data['department_name'] = $session_data['department_name'];
			$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
			$data['pageTitle'] = "Update Profile";
			$data['activeMenu'] = "faculty";
			$faculty_id =$session_data['id'];
			$data['faculty_id'] = $faculty_id;

			$this->form_validation->set_rules('files', 'File Name', 'trim');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'faculty/updateProfile/';
				$data['btn_name'] = 'Add';

				$data['files'] = $this->input->post('files');

				$this->faculty_template->show('faculty/updateProfile', $data);
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
				redirect('faculty/profile/', 'refresh');
			}
		} else {
			redirect('faculty', 'refresh');
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

			$details = $this->admin_model->getDetailsbyfieldSort($data['id'], 'faculty_id', 'academic_year', 'DESC', 'publications')->result();

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
							' . anchor('faculty/editPublication/' . $details1->id, '<i class="fa fa-fw fa-pencil-alt"></i>', 'class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit Publication"') . '
							' . anchor('faculty/deletePublication/' . $details1->id, '<i class="fa fa-fw fa-times"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove Publication"') . '
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

			$this->faculty_template->show('faculty/publications', $data);
		} else {
			redirect('faculty', 'refresh');
		}
	}

	function addPublication()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$id=$session_data['id'];
			$data['dept_id'] = $session_data['dept_id'];
			$data['pageTitle'] = "Add Publication";
			$data['activeMenu'] = "publications";

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('publication_type', 'Publication Type', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'faculty/addPublication';
				$data['publicationTypes'] = array(' ' => "Select") + $this->globals->publicationTypes();
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$this->faculty_template->show('faculty/addPublication', $data);
			} else {
				$insertData = array(
					'dept_id' => $data['dept_id'],
					'faculty_id' => $data['id'],
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
				redirect('faculty/publications', 'refresh');
			}
		} else {
			redirect('faculty', 'refresh');
		}
	}

	function editPublication($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			
			$data['dept_id'] = $session_data['dept_id'];
			$data['pageTitle'] = "Edit Publication";
			$data['activeMenu'] = "publications";

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('publication_type', 'Publication Type', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'faculty/editPublication/' . $id;
				$data['publicationTypes'] = array(' ' => "Select") + $this->globals->publicationTypes();
				$data['academicYears'] = array(' ' => "Select") + $this->globals->academicYears(2005);
				$data['Details'] = $this->admin_model->getDetails('publications', $id)->row();
				$this->faculty_template->show('faculty/editPublication', $data);
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
				redirect('faculty/publications', 'refresh');
			}
		} else {
			redirect('faculty', 'refresh');
		}
	}
	
	
	function deletePublication($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			
			$data['dept_id'] = $session_data['dept_id'];
			$data['pageTitle'] = "Edit Publication";
			$data['activeMenu'] = "publications";

			$this->admin_model->delDetails('publications', $id);

			$this->session->set_flashdata('message', 'Publication Details deleted successfully...!');
			$this->session->set_flashdata('status', 'alert-warning');

			redirect('faculty/publications', 'refresh');
		} else {
			redirect('faculty', 'refresh');
		}
	}
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('faculty', 'refresh');
	}

}
