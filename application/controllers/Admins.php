<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->CI = & get_instance();
        $this->load->model('admin_model','',TRUE);
	  	$this->load->library(array('table','form_validation'));
  		$this->load->helper(array('form','form_helper'));
		date_default_timezone_set('Asia/Kolkata');
		ini_set('upload_max_filesize','20M');
    }
    
	function index(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
	   	$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		if($this->form_validation->run() == FALSE)
	    {
		 $data['pageTitle'] = "Admin Login";
		 $data['action'] = 'admins';

		 $this->login_template->show('admin/Login',$data);
	    }else{
	    	$username = $this->input->post('username');
	    	redirect('admins/dashboard', 'refresh');
	   }
	}

	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		
   		//query the database
   		$result = $this->admin_model->login($username, md5($password));
   		if($result)
   		{
     	  $sess_array = array();
     	  foreach($result as $row)
          {
       		$sess_array = array(
				'id' => $row->id,
         		'username' => $row->username
       		);
       	   $this->session->set_userdata('logged_in', $sess_array);
          }
          return TRUE;
		}
   		else
   		{
     		$this->form_validation->set_message('check_database', 'Invalid username or password');
     		return false;
   		}
 	}
	
	function dashboard()
    {
	  if($this->session->userdata('logged_in'))
	  {
     	$session_data = $this->session->userdata('logged_in');
     	$data['username'] = $session_data['username'];
     	$data['pageTitle'] = "Dashboard";
 		$data['activeMenu'] = "dashboard";
	    $this->admin_template->show('admin/Dashboard',$data);
   	  }else{
     	redirect('admins', 'refresh');
   	  }
	 }
	
	function scrolling()
	{
	  if($this->session->userdata('logged_in'))
	  {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['pageTitle'] = "Scrolling";
		$data['activeMenu'] = "scrolling";

		$this->form_validation->set_rules('scroll_text', 'Details', 'required');
		if($this->form_validation->run() === FALSE){
			$data['action'] = 'admins/scrolling';
			$Scrolling = $this->admin_model->getDetails('scrolling', '1')->row();
			$data['scroll_text'] = $Scrolling->scroll_text;
			$this->admin_template->show('admin/Scrolling',$data);
		}else{
			$updateDetails = array('scroll_text' => $this->input->post('scroll_text'));
			$result = $this->admin_model->updateDetails('1', $updateDetails, 'scrolling');
			if($result){
				$this->session->set_flashdata('message', 'Scrolling Details updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			}else{
				$this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
				$this->session->set_flashdata('status', 'alert-danger');
			}

			redirect('admins/scrolling', 'refresh');
		}
	  }else{
		redirect('admins', 'refresh');
	  }
	}

	function latestNews()
	{
	  if($this->session->userdata('logged_in'))
	  {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['pageTitle'] = "Latest News";
		$data['activeMenu'] = "latestNews";
		
		$data['latestNews'] = $this->admin_model->getLatestNews()->result();

		$this->admin_template->show('admin/latestNews',$data);
	  }else{
		redirect('admins', 'refresh');
	  }
	}

	function addLatestNews()
	{
	  if($this->session->userdata('logged_in'))
	  {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['pageTitle'] = "Add Latest News";
		$data['activeMenu'] = "latestNews";
		$data['action'] = 'admins/addLatestNews';
		
		$data['newsDisplay'] = array(' ' => "Select") + $this->globals->newsDisplay();

		$this->form_validation->set_rules('news_title', 'Title', 'required');
		$this->form_validation->set_rules('display_in', 'Display in', 'required');
 		if ($this->form_validation->run() === FALSE){
			$this->admin_template->show('admin/addLatestNews',$data);
 		 }else{
			
			$fileNames = [];
			$count = count($_FILES['files']['name']);
			for($i=0;$i<$count;$i++){

				if(!empty($_FILES['files']['name'][$i])){
			
				  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
				  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
				  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
				  $_FILES['file']['size'] = $_FILES['files']['size'][$i];
		  
				  $config['upload_path'] = 'assets/latest_news/'; 
				  $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
				  $config['max_size'] = '30000';
				//   $config['file_name'] = $_FILES['files']['name'][$i];
				  
				  $this->load->library('upload',$config); 
			
				  if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$fileNames[] = $filename;
				  }
				}
			  }
		 
		   $insertData = array('news_title' => $this->input->post('news_title'),
		   					'news_slug' => $this->create_unique_slug($this->input->post('news_title')),
	       		 			'news_date' => date('Y-m-d H:i:s'),
							'news_details' => $this->input->post('news_details'),
							'files' => serialize($fileNames),
							'display_in' => $this->input->post('display_in'),
							'sort_order' => $this->input->post('sort_order'),
							'new_label' => '0',
							'status' => '1'
					);

			
			$result = $this->admin_model->insertDetails('latest_news', $insertData);
		  	if($result){
				$this->session->set_flashdata('message', 'Latest News created successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
		  	}else{
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');	  
		  	}
		  	redirect('admins/latestNews', 'refresh');
		  }		
	  }else{
		redirect('admins', 'refresh');
	  }
	}

	function editLatestNews($id)
	{
	  if($this->session->userdata('logged_in'))
	  {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['pageTitle'] = "Edit Latest News";
		$data['activeMenu'] = "latestNews";
		$data['action'] = 'admins/editLatestNews/'.$id;
		
		$data['newsDisplay'] = array(' ' => "Select") + $this->globals->newsDisplay();
		$data['Details'] = $this->admin_model->getDetails('latest_news', $id)->row();

		$this->form_validation->set_rules('news_title', 'Title', 'required');
		$this->form_validation->set_rules('display_in', 'Display in', 'required');
 		if ($this->form_validation->run() === FALSE){
			
			$this->admin_template->show('admin/editLatestNews',$data);
 		 }else{
			
			$fileNames = unserialize($data['Details']->files);
			$count = count($_FILES['files']['name']);
			for($i=0;$i<$count;$i++){

				if(!empty($_FILES['files']['name'][$i])){
			
				  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
				  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
				  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
				  $_FILES['file']['size'] = $_FILES['files']['size'][$i];
		  
				  $config['upload_path'] = 'assets/latest_news/'; 
				  $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
				  $config['max_size'] = '30000';
				//   $config['file_name'] = $_FILES['files']['name'][$i];
				  
				  $this->load->library('upload',$config); 
			
				  if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$fileNames[] = $filename;
				  }
				}
			  }
			   
		   $updateDetails = array('news_title' => $this->input->post('news_title'),
		   					'news_slug' => $this->create_unique_slug($this->input->post('news_title')),
	       		 			'news_date' => date('Y-m-d H:i:s'),
							'news_details' => $this->input->post('news_details'),
							'files' => serialize($fileNames),
							'sort_order' => $this->input->post('sort_order'),
							'display_in' => $this->input->post('display_in')
						);

			$result = $this->admin_model->updateDetails($id, $updateDetails, 'latest_news');

		  	if($result){
				$this->session->set_flashdata('message', 'Latest News updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
		  	}else{
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-danger');	  
		  	}
		  	redirect('admins/latestNews', 'refresh');
		  }		
	  }else{
		redirect('admins', 'refresh');
	  }
	}

	function viewLatestNews($id)
	{
	  if($this->session->userdata('logged_in'))
	  {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['pageTitle'] = "View Latest News";
		$data['activeMenu'] = "latestNews";
		
		$data['newsDisplay'] = array('0' => "") + $this->globals->newsDisplay();

		$data['latestNews'] = $this->admin_model->getDetails('latest_news',$id)->row();

		$this->admin_template->show('admin/viewLatestNews',$data);
	  }else{
		redirect('admins', 'refresh');
	  }
	}
	
	function latestNewsDelete($id, $filenameID)
	{
	  if($this->session->userdata('logged_in'))
	  {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['pageTitle'] = "View Latest News";
		$data['activeMenu'] = "latestNews";
		
		$latestNews = $this->admin_model->getDetails('latest_news',$id)->row();

		$fileNames = unserialize($latestNews->files);
		$url = glob('./assets/latest_news/'.$fileNames[$filenameID]);
		if($url){            
			unlink($url[0]);            
		}
		array_splice($fileNames, $filenameID, 1); 
		
		$updateDetails = array('files' => serialize($fileNames));

		$result = $this->admin_model->updateDetails($id, $updateDetails, 'latest_news');

		if($result){
			$this->session->set_flashdata('message', 'Attachment file removed successfully...!');
			$this->session->set_flashdata('status', 'alert-success');
		}else{
			$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
			$this->session->set_flashdata('status', 'alert-danger');	  
		}

		redirect('admins/viewLatestNews/'.$id, 'refresh');
		 
	  }else{
		redirect('admins', 'refresh');
	  }
	}

	function updateLatestNewsStatus($id, $status)
	{
	  if($this->session->userdata('logged_in'))
	  {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['pageTitle'] = "View Latest News";
		$data['activeMenu'] = "latestNews";
		
		$updateDetails = array('status' => $status);         
         
		$result = $this->admin_model->updateDetails($id, $updateDetails, 'latest_news');
		
		if($result){
			$this->session->set_flashdata('message', 'Latest News status updated successfully...!');
			$this->session->set_flashdata('status', 'alert-success');
		}else{
			$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
			$this->session->set_flashdata('status', 'alert-danger');	  
		}
	    redirect('admins/latestNews', 'refresh');
				 
	  }else{
		redirect('admins', 'refresh');
	  }
	}

	function updateLatestNewsLabel($id, $status)
	{
	  if($this->session->userdata('logged_in'))
	  {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['pageTitle'] = "View Latest News";
		$data['activeMenu'] = "latestNews";
		
		$updateDetails = array('new_label' => $status);         
         
		$result = $this->admin_model->updateDetails($id, $updateDetails, 'latest_news');
		
		if($result){
			$this->session->set_flashdata('message', 'New Label status updated successfully...!');
			$this->session->set_flashdata('status', 'alert-success');
		}else{
			$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
			$this->session->set_flashdata('status', 'alert-danger');	  
		}
	    redirect('admins/latestNews', 'refresh');
				 
	  }else{
		redirect('admins', 'refresh');
	  }
	}


	function deleteLatestNews($id)
	{
	  if($this->session->userdata('logged_in'))
	  {
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['username'] = $session_data['username'];
		$data['pageTitle'] = "View Latest News";
		$data['activeMenu'] = "latestNews";
			
		$latestNews = $this->admin_model->getDetails('latest_news',$id)->row();
		if($latestNews->files != ''){
			$fileNames = unserialize($latestNews->files);
            foreach($fileNames as $fileNames1){
				$url = glob('./assets/latest_news/'.$fileNames1);
				if($url){            
					unlink($url[0]);            
				}
            }
		}
	  
		$this->admin_model->delDetails('latest_news', $id);
         
		$this->session->set_flashdata('message', 'Latest News deleted successfully...!');
		$this->session->set_flashdata('status', 'alert-success');
		
	    redirect('admins/latestNews', 'refresh');
				 
	  }else{
		redirect('admins', 'refresh');
	  }
	}

	function create_unique_slug($string,$table='latest_news',$field='news_slug',$key=NULL,$value=NULL)
	{
		$t =& get_instance();
		$slug = url_title($string);
		$slug = strtolower($slug);
		$i = 0;
		$params = array ();
		$params[$field] = $slug;
	
		if($key)$params["$key !="] = $value; 
	
		while ($t->db->where($params)->get($table)->num_rows())
		{   
			if (!preg_match ('/-{1}[0-9]+$/', $slug ))
				$slug .= '-' . ++$i;
			else
				$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
			
			$params [$field] = $slug;
		}   
		return $slug;   
	}

	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('admins', 'refresh');
	}

}