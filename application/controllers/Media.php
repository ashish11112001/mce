<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->load->library('aws_sdk');
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
            $data['pageTitle'] = "Media Login";
            $data['action'] = 'media-manage';

            $this->login_template->show('media/Login', $data);
        } else {
            $username = $this->input->post('username');
            redirect('media/dashboard', 'refresh');
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


    public function dashboard()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $this->media_template->show('media/dashboard', $data);
        } else {
            redirect('media-manage', 'refresh');
        }
    }

    // Function to load the create folder form
    public function createFolderForm($folder = '')
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $data['folder'] = $folder;
            $this->media_template->show('media/create_folder_form', $data);
        } else {
            redirect('media-manage', 'refresh');
        }
    }

    // Function to create a folder in S3 bucket
    public function createFolder($parent = '')
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $this->form_validation->set_rules('folder_name', 'Folder Name', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->media_template->show('media/create_folder_form');
            } else {
                $folderName = $this->input->post('folder_name');

                if ($parent == '') {
                    $this->aws_sdk->createFolder($folderName, 'file--storage');
                } else {
                    $this->aws_sdk->createFolderInFolder('file--storage', $parent, $folderName);
                }

                redirect('media/createFolderForm');
            }
        } else {
            redirect('media-manage', 'refresh');
        }
    }

    // Function to load the upload form
    public function uploadForm()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $bucketName = 'file--storage';

            try {
                $objects = $this->aws_sdk->s3->listObjectsV2([
                    'Bucket' => $bucketName,
                    'Delimiter' => '/'
                ]);

                $data['folders'] = $objects['CommonPrefixes'];
                $this->media_template->show('media/upload_form', $data);
            } catch (S3Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            redirect('media-manage', 'refresh');
        }
    }

    // Function to upload a file
    public function uploadFile()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $bucketName = 'file--storage';
            $this->form_validation->set_rules('folder_name', 'Folder Name', 'trim');

            if ($this->form_validation->run() === FALSE) {
                $folderName = $this->input->post('folder_name');
                $data['objects'] = $this->aws_sdk->listObjectsInFolder1($bucketName,  $folderName);
                $data['currentFolderPath'] =  $folderName;
                $this->media_template->show('media/folder_contents', $data);
            } else {
                $folderName = $this->input->post('folder_name');
                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|xlsx';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('userfile')) {
                    $error = array('error' => $this->upload->display_errors());

                    //  $this->media_template->show('upload_form', $error);
                    $data['objects'] = $this->aws_sdk->listObjectsInFolder1($bucketName,  $folderName);
                    $data['currentFolderPath'] =  $folderName;


                    $this->media_template->show('media/folder_contents', $data);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $filePath = $data['upload_data']['full_path'];
                    $result =  $this->aws_sdk->uploadFile($filePath, 'file--storage', $folderName);

                    $url = glob($filePath);
                    if ($url) {
                        unlink($url[0]);
                    }
                    $data['objects'] = $this->aws_sdk->listObjectsInFolder1($bucketName,  $folderName);
                    $data['currentFolderPath'] =  $folderName;


                    $this->media_template->show('media/folder_contents', $data);
                }
            }
        } else {
            redirect('media-manage', 'refresh');
        }
    }

    // Function to list files in S3 bucket
    public function listFiles()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $bucketName = 'file--storage';

            try {
                $objects = $this->aws_sdk->s3->listObjectsV2([
                    'Bucket' => $bucketName
                ]);

                $data['files'] = $objects['Contents'];
                $this->media_template->show('list_files', $data);
            } catch (S3Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            redirect('media-manage', 'refresh');
        }
    }

    // Function to list folders in S3 bucket
    public function listFolders($folder = '')
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $bucketName = 'file--storage';

            try {
                // $objects = $this->aws_sdk->s3->listObjectsV2([
                //     'Bucket' => $bucketName,
                //     'Delimiter' => '/'
                // ]);

                // $data['folders'] = $objects['CommonPrefixes'];
                if ($folder == '') {
                    $objects = $this->aws_sdk->listRootObjects($bucketName);

                    $data['folders'] = isset($objects['folders']) ? $objects['folders'] : [];
                    $data['files'] = isset($objects['files']) ? $objects['files'] : [];
                } else {
                    $objects = $this->aws_sdk->listObjectsInFolder($bucketName, $folder);

                    $data['folders'] = isset($objects['folders']) ? $objects['folders'] : [];
                    $data['files'] = isset($objects['files']) ? $objects['files'] : [];
                }
                $data['folder'] = $folder;
                //  $this->media_template->show('list_folders', $data);
                $this->media_template->show('media/list_folders', $data);
            } catch (S3Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            redirect('media-manage', 'refresh');
        }
    }

    public function viewFolderContents()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $this->load->library('aws_sdk');

            $bucketName = 'file--storage'; // Replace with your bucket name
            $folderPath = $this->input->get('folder');

            $data['objects'] = $this->aws_sdk->listObjectsInFolder1($bucketName, $folderPath);
            $data['currentFolderPath'] = $folderPath;


            $this->media_template->show('media/folder_contents', $data);
        } else {
            redirect('media-manage', 'refresh');
        }
    }

    public function displayRootContents()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $this->load->library('aws_sdk');

            $bucketName = 'file--storage'; // Replace with your bucket name
            $rootPath = ''; // Root path in the bucket
            $data['objects'] = $this->aws_sdk->listRootObjects($bucketName);

            $data['folders'] = isset($objects['folders']) ? $objects['folders'] : [];
            $data['files'] = isset($objects['files']) ? $objects['files'] : [];
            // $data['objects'] = $this->aws_sdk->listObjectsInFolder1($bucketName, $rootPath);

            // var_dump($data['objects']);

            $this->media_template->show('media/root_contents', $data);
        } else {
            redirect('media-manage', 'refresh');
        }
    }

    public function createNewFolder()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['department_name'] = $session_data['department_name'];
            $data['short_name'] = $session_data['short_name'];
            $this->load->library('aws_sdk');

            $bucketName = 'file--storage'; // Replace with your bucket name

            $currentPath = $this->input->post('currentPath'); // Get the current path from the form
            $newFolderName = $this->input->post('newFolderName'); // Get the new folder name from the form

            $result = $this->aws_sdk->createFolderAtCurrentPath($bucketName, $currentPath, $newFolderName);

            if ($result) {


                // Redirect back to the folder contents view after creating the folder
                redirect('media/viewFolderContents?folder=' . urlencode($currentPath));
            } else {
                echo 'Failed to create folder.';
            }
        } else {
            redirect('media-manage', 'refresh');
        }
    }
    
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('media-manage', 'refresh');
	}
}
