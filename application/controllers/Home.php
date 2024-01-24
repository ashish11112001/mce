<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.'third_party/Dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;
class Home extends CI_Controller
{

	public $courseTypes = array("UG" => "Under Graduation", "PG" => "Post Graduation", "Ph.D" => "Ph.D");
	public $designationType = array("" => "", "1" => "Professor", "2" => "Associate Professor", "3" => "Assistant Professor");
	public $staffType = array('1' => 'Regular', '2' => 'Tenure', '3' => 'Visiting');
	public $CI = NULL;

	function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->model('admin_model', '', TRUE);
		$this->load->model('globals_model', '', TRUE);
		$this->load->library(array('table', 'form_validation', 'pagination', 'email'));
		$this->load->helper(array('form', 'form_helper', 'email'));
		date_default_timezone_set('Asia/Kolkata');
	}

	public function index()
	{
		$Scrolling = $this->admin_model->getDetails('scrolling', '1')->row();
		$data['scroll_text'] = $Scrolling->scroll_text;
		$data['scroll_status'] = $Scrolling->status;
		$data['activeMenu'] = "Home";

		$data['newsDcisplay'] = array(' ' => "Select") + $this->globals->newsDisplay();
		$data['latestNews'] = $this->admin_model->latestNews()->result();
		// echo "<pre>";
		// print_r($latestNews); die;

		$this->template->show('home', $data);
	}

	public function index1()
	{
		$Scrolling = $this->admin_model->getDetails('scrolling', '1')->row();
		$data['scroll_text'] = $Scrolling->scroll_text;
		$data['scroll_status'] = $Scrolling->status;
		$data['activeMenu'] = "Home";
		$this->template->show('home1', $data);
	}

	public function news($slug)
	{
		$data['mainMenu'] = 'Home';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Home";
		$data['newsDcisplay'] = $this->globals->newsDisplay();
		$data['newsDetails'] = $this->admin_model->getDetailsbyfield($slug, 'news_slug', 'latest_news')->row();
		
		$this->template->show('News_Details', $data);
	}

	public function Founder()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Founder";
		$this->template->show('Founder', $data);
	}



	public function Institute()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Institute";
		$this->template->show('Institute', $data);
	}

	public function Management()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Management";
		$this->template->show('Management', $data);
	}

	public function Vision_and_Mission()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Vision and Mission";
		$this->template->show('Vision_and_Mission', $data);
	}

	public function Administration()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Administration";
		$this->template->show('Administration', $data);
	}

	public function Mentor()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Mentor";
		$this->template->show('Mentor', $data);
	}

	public function Executive_Committee_of_MTES()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Governing bodies';
		$data['activeMenu'] = "Executive Committee of MTES";
		$this->template->show('Executive_Committee_of_Mte', $data);
	}

	public function Board_Of_Governors_of_MCE()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Governing bodies';
		$data['activeMenu'] = "Board Of Governors of MCE";
		$this->template->show('Board_Of_Governors_of_MCE', $data);
	}

	public function Chairman_Message()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Messages';
		$data['activeMenu'] = "Chairman Message";
		$this->template->show('Chairman_Message', $data);
	}

	public function Vicechairman_Message()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Messages';
		$data['activeMenu'] = "Vicechairman Message";
		$this->template->show('Vicechairman_Message', $data);
	}

	public function Secretary_Message()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Messages';
		$data['activeMenu'] = "Secretary Message";
		$this->template->show('Secretary_Message', $data);
	}

	public function Treasurer_Message()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Messages';
		$data['activeMenu'] = "Treasurer Message";
		$this->template->show('Treasurer_Message', $data);
	}

	public function Principal_Message()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Messages';
		$data['activeMenu'] = "Principal Message";
		$this->template->show('Principal_Message', $data);
	}

	public function Academic_Council()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Other Committee';
		$data['activeMenu'] = "Academic Council";
		$this->template->show('Academic_Council', $data);
	}

	public function Board_Of_Studies()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Other Committee';
		$data['activeMenu'] = "Board Of Studies";
		$this->template->show('Board_Of_Studies', $data);
	}

	public function Equivalence_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Other Committee';
		$data['activeMenu'] = "Equivalence Committee";
		$this->template->show('Equivalence_Committee', $data);
	}

	public function Anti_Ragging_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Other Committee';
		$data['activeMenu'] = "Anti-Ragging Committee";
		$this->template->show('Anti_Ragging_Committee', $data);
	}

	public function Campus_Disciplinary_committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Other Committee';
		$data['activeMenu'] = "Campus Disciplinary committee";
		$this->template->show('Campus_Disciplinary_committee', $data);
	}

	public function Grievance_Redressal_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Other Committee';
		$data['activeMenu'] = "Grievance Redressal Committee";
		$this->template->show('Grievance_Redressal_Committee', $data);
	}

	public function Standing_Disciplinary_Action_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Other Committee';
		$data['activeMenu'] = "Standing Disciplinary Action Committee";
		$this->template->show('Standing_Disciplinary_Action_Committee', $data);
	}

	public function College_Internal_Complaints_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Other Committee';
		$data['activeMenu'] = "College Internal Complaints Committee";
		$this->template->show('College_Internal_Complaints_Committee', $data);
	}

	public function IQAC()
	{
		$data['mainMenu'] = 'Other Committee';
		$data['parentMenu'] = 'IQAC';
		$data['activeMenu'] = "IQAC";
		$this->template->show('IQAC', $data);
	}
	
		public function IQAC_MOMS()
	{
		$data['mainMenu'] = 'Other Committee';
		$data['parentMenu'] = 'IQAC';
		$data['activeMenu'] = "IQAC MOMS";
		$data['documents']  = $this->admin_model->getDetailsbyfield('23', 'dept_id', 'accredited_documents')->result();
		$this->template->show('IQAC_MOMS', $data);
	}
	
			public function AQAR_Reports()
	{
			$data['mainMenu'] = 'Other Committee';
		$data['parentMenu'] = 'IQAC';
		$data['activeMenu'] = "AQAR Reports";
		$data['documents']  = $this->admin_model->getDetailsbyfield('23', 'dept_id', 'aqar_reports')->result();
		$this->template->show('AQAR_Reports', $data);
	}
	
		public function AQAR_Documents()
	{
			$data['mainMenu'] = 'Other Committee';
		$data['parentMenu'] = 'IQAC';
		$data['activeMenu'] = "AQAR Documents";
		$data['documents']  = $this->admin_model->getDetailsbyfield('23', 'dept_id', 'aqar_documents')->result();
		$this->template->show('AQAR_Documents', $data);
	}

	public function SC_ST_OBC_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Other Committee';
		$data['activeMenu'] = "SC ST OBC Committee";
		$this->template->show('SC_ST_Committee', $data);
	}

	public function Research_Programs()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Research Programs";
		$this->template->show('Research_Programs', $data);
	}

	public function Student_Affairs()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Student Affairs";
		$this->template->show('Student_Affairs', $data);
	}

	public function Scholarships()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Scholarships";
		$this->template->show('Scholarships', $data);
	}

	public function Prospectus()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Prospectus";
		$this->template->show('Prospectus', $data);
	}

	public function Enquiry()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Enquiry";
		$this->template->show('Enquiry', $data);
	}

	public function Process()
	{
		$data['mainMenu'] = 'Examination';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Process";
		$this->template->show('Process', $data);
	}

	public function Circulars()
	{
		$data['mainMenu'] = 'Examination';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Circulars";
		$data['circulars'] = $this->admin_model->getDetailsbyfield('22', 'dept_id', 'accredited_documents')->result();
		$this->template->show('Circulars', $data);
	}

	public function Seat_Allotment()
	{
		$data['mainMenu'] = 'Examination';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Seat Allotment";
		$data['circulars'] = $this->admin_model->getDetailsbyfieldSort('22', 'dept_id','id','desc', 'seats')->result();
		$this->template->show('seats', $data);
	}

	public function Results()
	{
		$data['mainMenu'] = 'Examination';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Results";
		$this->template->show('Results', $data);
	}

	public function Malpractice_Enquiry_Committee()
	{
		$data['mainMenu'] = 'Examination';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Malpractice Enquiry Committee";
		$this->template->show('Malpractice_Enquiry_Committee', $data);
	}

	public function Placement_Overview()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Placement Overview";
		$this->template->show('Placement_Overview', $data);
	}

	public function Testimonials()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Testimonials";
		$this->template->show('Testimonials', $data);
	}

	public function Our_Recruiters()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Our Recruiters";
		$this->template->show('Our_Recruiters', $data);
	}

	public function Placement_Records()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Placement Records";
		$data['placement'] = $this->admin_model->getDetailsbyfield('21', 'dept_id', 'accredited_documents')->result();
		$this->template->show('Placement_Records', $data);
	}

	public function ME_RIISE()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "ME-RIISE";
		$this->template->show('ME_RIISE', $data);
	}
	
		public function Make_In_MCE()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Make In MCE";
		$this->template->show('Make_In_MCE', $data);
	}
	
	
		public function Library()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = 'Facilities';
		$data['activeMenu'] = "Library";
		$this->template->show('Library', $data);
	}
	
	
		public function Sports()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = 'Facilities';
		$data['activeMenu'] = "Sports";
		$this->template->show('Sports', $data);
	}
	
		public function Boys_Hostel()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Hostel';
		$data['activeMenu'] = 'Boys Hostel';
		$this->template->show('Boys_Hostel', $data);
	}
	

	public function Hostel()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Hostel';
		$data['activeMenu'] = 'Hostel';
		$this->template->show('Hostel', $data);
	}


	public function Clubs()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = 'Clubs';
		$this->template->show('Clubs', $data);
	}
		public function Girls_Hostel()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Hostel';
		$data['activeMenu'] = 'Girls Hostel';
		$this->template->show('Girls_Hostel', $data);
	}
	
		public function Transport()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = 'Facilities';
		$data['activeMenu'] = "Transport";
		$this->template->show('Transport', $data);
	}
	
		public function Eco_Club()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = "Eco Club";
		$this->template->show('Eco_Club', $data);
	}
	
		public function Leo_Club()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = "Leo Club";
		$this->template->show('Leo_Club', $data);
	}
	
		public function Literary_Club()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = "Literary Club";
		$this->template->show('Literary_Club', $data);
	}
	
		public function Rotaract_Club()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = "Rotaract Club";
		$this->template->show('Rotaract_Club', $data);
	}
	
		public function Devops_Club()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = "Devops Club";
		$this->template->show('Devops_Club', $data);
	}
	
		public function Spicmacacy()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = "Spicmacacy";
		$this->template->show('Spicmacacy', $data);
	}
	
		public function Science_Association()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = "Science Association";
		$this->template->show('Science_Association', $data);
	}
	
		public function Technical_Club()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = "Technical Club";
		$this->template->show('Technical_Club', $data);
	}
	
	
		public function FOSS_Club()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = 'Clubs';
		$data['activeMenu'] = "FOSS Club";
		$this->template->show('FOSS_Club', $data);
	}
	
		public function Others()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = 'Facilities';
		$data['activeMenu'] = "Others";
		$this->template->show('Others', $data);
	}
	
	
	
	
	
	

	public function Network_Control_Centre()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Network Control Centre";
		$this->template->show('Network_Control_Centre', $data);
	}

	public function National_Service_Scheme()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "National Service Scheme";
		$this->template->show('National_Service_Scheme', $data);
	}

	public function MOU()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "MOU";
		$this->template->show('MOU', $data);
	}
	
		public function Spiritual_Enclave()
	{
		$data['mainMenu'] = 'Other Wings';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Spiritual Enclave";
		$this->template->show('Spiritual_Enclave', $data);
	}
	
		public function AICTE_IDEA_Lab()
	{
		$data['mainMenu'] = 'AICTE IDEA-Lab';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Home";
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield('25', 'department_id', 'departments_data')->row();
		$this->template->show('AICTE_IDEA_Lab', $data);
	}
	
		public function AICTE_People()
	{
		$data['mainMenu'] = 'AICTE IDEA-Lab';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "People";
		$data['faculty'] = $this->admin_model->getDetailsbyfield('25', 'dept_id', 'faculty')->result();
		$this->template->show('AICTE_People', $data);
	}
	
		public function AICTE_Equipments()
	{
		$data['mainMenu'] = 'AICTE IDEA-Lab';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Equipments";
		$data['documents'] = $this->admin_model->getDetailsbyfield('25', 'dept_id', 'accredited_documents')->result();
		$this->template->show('AICTE_Equipments', $data);
	}
	
		public function AICTE_Events()
	{
		$data['mainMenu'] = 'AICTE IDEA-Lab';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Events";
		$data['documents'] = $this->admin_model->getDetailsbyfield('25', 'dept_id', 'events')->result();
		$this->template->show('AICTE_Events', $data);
	}

		public function AICTE_Gallery()
	{
		$data['mainMenu'] = 'AICTE IDEA-Lab';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$data['documents'] = $this->admin_model->getDetailsbyfield('25', 'dept_id', 'sliders')->result();
		$this->template->show('AICTE_Gallery', $data);
	}
	
		public function NAAC()
	{
	    
	    $data['link']=$_GET['link'];
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		
		switch($data['link'])
		{
		    case 4 :
		        $data['activeMenu'] = "DVV Clarification";
	        	$this->template->show('DVV_Clarification', $data);
	        	break;
	        case 5 :
	           	$data['activeMenu'] = "Extended Profile";
	        	$this->template->show('Extended_Profile', $data);
		        break;
		    case 6 :
		        $data['activeMenu'] = "Curricular Aspects";
	        	$this->template->show('Curricular_Aspects', $data);
	        	break;
	         case 7 :
		       $data['activeMenu'] = "Teaching Learning and Evaluation";
		$this->template->show('Teaching_Learning_and_Evaluation', $data);
	        	break;
	        case 8 :
	           $data['activeMenu'] = "Research, Innovations and Extension";
		$this->template->show('Research_Innovations_and_Extension', $data);
		        break;
		    case 9 :
		        $data['activeMenu'] = "Infrastructure and Learning Resources";
		$this->template->show('Infrastructure_and_Learning_Resources', $data);
	        	break;	
	         case 10 :
		        	$data['activeMenu'] = "Student Support and Progression";
		$this->template->show('Student_Support_and_Progression', $data);
	        	break;
	        case 11 :
	           	$data['activeMenu'] = "Governances, Leadership and Management";
		$this->template->show('Governances_Leadership_and_Management', $data);
		        break;
		    case 12 :
		       $data['activeMenu'] = "Institutional Values and Best Practices";
		$this->template->show('Institutional_Values_and_Best_Practices', $data);
	        	break;	
	        case 15 :
	           	$data['activeMenu'] = "Undertaking";
		$this->template->show('Undertaking', $data);
		        break;
		    case 17 :
		       $data['activeMenu'] = "Naac Certificate From 2018-2023";
		$this->template->show('Naac_Certificate', $data);
	        	break;	
	        
	    	  
		  default :
		      $data['activeMenu'] = "NAAC";
		      $this->template->show('NAAC', $data);
		      break;
		        
		}
		
	}
	
		public function DVV_Clarification_1()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "DVV Clarification-1";
		$this->template->show('DVV_Clarification', $data);
	}
	public function DVV_Clarification_2()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "DVV Clarification-2";
		$this->template->show('DVV_Clarification2', $data);
	}
	
		public function Extended_Profile()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Extended Profile";
		$this->template->show('Extended_Profile', $data);
	}
	
		public function Curricular_Aspects()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Curricular Aspects";
		$this->template->show('Curricular_Aspects', $data);
	}
	
		public function Teaching_Learning_and_Evaluation()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Teaching Learning and Evaluation";
		$this->template->show('Teaching_Learning_and_Evaluation', $data);
	}
	
		public function Research_Innovations_and_Extension()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Research, Innovations and Extension";
		$this->template->show('Research_Innovations_and_Extension', $data);
	}
	
		public function Infrastructure_and_Learning_Resources()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Infrastructure and Learning Resources";
		$this->template->show('Infrastructure_and_Learning_Resources', $data);
	}
	
		public function Student_Support_and_Progression()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Student Support and Progression";
		$this->template->show('Student_Support_and_Progression', $data);
	}
	
		public function Governances_Leadership_and_Management()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Governances, Leadership and Management";
		$this->template->show('Governances_Leadership_and_Management', $data);
	}
	
		public function Institutional_Values_and_Best_Practices()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Institutional Values and Best Practices";
		$this->template->show('Institutional_Values_and_Best_Practices', $data);
	}
	
		public function Undertaking()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Undertaking";
		$this->template->show('Undertaking', $data);
	}
	
		public function Naac_Certificate()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Naac Certificate From 2018-2023";
		$this->template->show('Naac_Certificate', $data);
	}
	
		public function FAQ()
	{
		$data['mainMenu'] = 'false';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "FAQ";
		$this->template->show('FAQ', $data);
	}
	
		public function Help_Desk()
	{
		$data['mainMenu'] = 'false';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Help Desk";
		$this->template->show('Help_Desk', $data);
	}
	
	public function Support()
	{
		$data['mainMenu'] = 'false';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Support";
		$this->template->show('Support', $data);
	}
	
		public function Enquiry_Now()
	{
		$data['mainMenu'] = 'false';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Enquiry Now";
		$this->template->show('Enquiry_Now', $data);
	}

	public function Admission_Information()
	{
		$data['mainMenu'] = 'false';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Admission Information";
		$this->template->show('Enquiry_Now', $data);
	}
	
		public function Circulars_News()
	{
		$data['mainMenu'] = 'false';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Circulars";
		$this->template->show('Circulars_News', $data);
	}
	
		public function Student_Portal()
	{
		$data['mainMenu'] = 'false';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Student Portal";
		$this->template->show('Student_Portal', $data);
	}
	
		public function Gallerys()
	{
		$data['mainMenu'] = 'Gallerys';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallerys', $data);
	}
	
	
	public function Gallery_Har_Ghar_Tiranga()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_Har_Ghar_Tiranga', $data);
	}
	
		public function Gallery_Divya_Chaithanya()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_Divya_Chaithanya', $data);
	}
	
		public function Gallery_Nenapina_Doni()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_Nenapina_Doni', $data);
	}
	
		public function Gallery_Annual_Athletic_Meet()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_Annual_Athletic_Meet', $data);
	}
	
		public function Gallery_College()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_College', $data);
	}
	
		public function NBA()
	{
		$data['mainMenu'] = 'NBA';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "NBA";
		$this->template->show('NBA', $data);
	}
	
		public function NIRF()
	{
		$data['mainMenu'] = 'NIRF';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "NIRF";
		$this->template->show('NIRF', $data);
	}
	
		public function AICTE()
	{
		$data['mainMenu'] = 'AICTE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "AICTE";
		$this->template->show('AICTE', $data);
	}
	
		public function ARIIA()
	{
		$data['mainMenu'] = 'ARIIA';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "ARIIA";
		$this->template->show('ARIIA', $data);
	}

	public function QS_I_GAUGE()
	{
		$data['mainMenu'] = 'QS-I-GAUGE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "QS-I-GAUGE";
		$this->template->show('QS-I-GAUGE', $data);
	}
	public function QRO()
	{
		$data['mainMenu'] = 'QRO';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "QRO";
		$this->template->show('QRO', $data);
	}
	
// 	public function MHRD_IIC()
// 	{
// 		$data['mainMenu'] = 'MHRD_IIC';
// 		$data['parentMenu'] = false;
// 		$data['activeMenu'] = "MHRD-IIC";
// 		$this->template->show('MHRD_IIC', $data);
// 	}
	
		public function Affiliation_from_VTU()
	{
		$data['mainMenu'] = 'Affiliation_from_VTU';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Affiliation From VTU";
		$this->template->show('Affiliation_from_VTU', $data);
	}
	
		public function Contactss()
	{
		$data['mainMenu'] = 'Contactss';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Contact";
		$this->template->show('Contactss', $data);
	}
	
		public function TEQIP_I()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = 'TEQIP';
		$data['activeMenu'] = "TEQIP-I";
		$this->template->show('TEQIP_I', $data);
	}
	
		public function TEQIP_II()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = 'TEQIP';
		$data['activeMenu'] = "TEQIP-II";
		$this->template->show('TEQIP_II', $data);
	}
	
		public function TEQIP_III()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = 'TEQIP';
		$data['activeMenu'] = "TEQIP-III";
		$this->template->show('TEQIP_III', $data);
	}
	
		public function Proceedings()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = 'TEQIP';
		$data['activeMenu'] = "Proceedings";
		$this->template->show('Proceedings', $data);
	}
	
		public function TEQIP_Gallery()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = 'TEQIP';
		$data['activeMenu'] = "Gallery";
		$this->template->show('TEQIP_Gallery', $data);
	}
	
		public function TEQIP_Contact()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = 'TEQIP';
		$data['activeMenu'] = "Contact";
		$this->template->show('TEQIP_Contact', $data);
	}
	
		public function Institutions_Innovation_Council()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Institution's Innovation Council";
		$this->template->show('Institutions_Innovation_Council', $data);
	}
	
		public function Unnat_Bharath_Abhiyan()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Unnat Bharath Abhiyan";
		$this->template->show('Unnat_Bharath_Abhiyan', $data);
	}
	
	
		public function New_Age_Innovation_Network()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "New Age Innovation Network";
		$this->template->show('New_Age_Innovation_Network', $data);
	}
	
	
		public function Startup_Karnataka()
	{
		$data['mainMenu'] = 'Government Initiative';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Startup Karnataka";
		$this->template->show('Startup_Karnataka', $data);
	}
	
		public function Alumnii()
	{
		$data['mainMenu'] = 'Alumnii';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Alumni";
		$this->template->show('Alumnii', $data);
	}
	
		public function Media()
	{
		$data['mainMenu'] = 'Media';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Media";
		$this->template->show('Media', $data);
	}
	
		public function Online_Payment()
	{
		$data['mainMenu'] = 'Online_Payment';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Online Payment";
		$this->template->show('Online_Payment', $data);
	}
	
		public function Program()
	{
		$data['mainMenu'] = 'Program';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Programmes";
		$this->template->show('Program', $data);
	}
	
		public function Forms()
	{
		$data['mainMenu'] = 'Forms';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Forms";
		$this->template->show('Forms', $data);
	}
	
	
   public function MERIIISE()
 	{
		$data['mainMenu'] = 'ME-RIISE';
 		$data['parentMenu'] = false;
		$data['activeMenu'] = 'Home';
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield('20', 'department_id', 'departments_data')->row();
		
		$this->template->show('ME_RIIISE', $data);
    }
    
    	public function MERIISEAbout()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'About-Us';
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield('20', 'department_id', 'departments_data')->row();
		$this->template->show('MERIISE_About', $data);
	}
	
	public function MERIISEFaculty()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = 'Team';
		$data['activeMenu'] = 'Faculty';
		// $data['faculty'] = $this->admin_model->getDetailsbyfield('20', 'dept_id', 'faculty')->result();
		$data['faculty'] =	$this->admin_model->getDetailsbyfieldSort('20', 'dept_id', 'id', 'ASC', 'faculty')->result();
		$this->template->show('MERIISE_Faculty', $data);
	}
	
	public function Student_Members()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = 'Team';
		$data['activeMenu'] = 'Student Members';
		$data['faculty'] = $this->admin_model->getDetailsbyfield('20', 'dept_id', 'student')->result();
		$this->template->show('Student_Members', $data);
	}
	
	
		public function MHRDIIIC()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'MHRD-IIC';
		$data['documents'] = $this->admin_model->getDetailsbyfield('20', 'dept_id', 'mhrddocuments')->result();
		$this->template->show('MHRD_IIIC', $data);
	}
	
		public function NAIN()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAIN';
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield('1', 'id', 'meriise')->row();
		$this->template->show('NAIN', $data);
	}
	
		public function UBA()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "UBA";
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield('1', 'id', 'meriise')->row();
		$this->template->show('UBA', $data);
	}
	
		public function Infrastructure()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Infrastructure";
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield('1', 'id', 'meriise')->row();
		$this->template->show('Infrastructure', $data);
	}
	
		public function Startups()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Startups";
		$data['documents'] = $this->admin_model->getDetailsbyfield2('display_in','5','dept_id' ,'20', 'events')->result();
		$this->template->show('Startups', $data);
	}
	
		public function MERIISEEvents()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Events";
		$data['documents'] = $this->admin_model->getDetailsbyfield2('display_in','4','dept_id' ,'20', 'events')->result();
		$this->template->show('MERIISE_Events', $data);
	}
	
		public function Collaborations()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Collaborations";
		$data['collaborations'] = $this->admin_model->getDetailsbyfieldSort('20', 'dept_id', 'academic_year', 'DESC', 'collaborations')->result();
		$this->template->show('Collaborations', $data);
	}
	
		public function Document()
	{
		$data['mainMenu'] = 'ME-RIISE';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Documents";
		$data['documents']  = $this->admin_model->getDetailsbyfield('20', 'dept_id', 'accredited_documents')->result();
		$this->template->show('Document', $data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	


	public function Student_Feedback()
	{
		$data['mainMenu'] = 'Dashboard';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Student Feedback";
		$this->template->show('Student_Feedback', $data);
	}

	public function Building__Civil_Works_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Building & Civil Works Committee";
		$this->template->show('Building__Civil_Works_Committee', $data);
	}

	public function Academic_Council_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Academic Council Committee";
		$this->template->show('Academic_Council_Committee', $data);
	}

	public function Admission_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Admission Committee";
		$this->template->show('Admission_Committee', $data);
	}

	public function Computer_Maintenance_Technical_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Computer Maintenance Technical Committee";
		$this->template->show('Computer_Maintenance_Technical_Committee', $data);
	}

	public function Extra_Curricular_Activities_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Extra-Curricular Activities Committee";
		$this->template->show('Extra_Curricular_Activities_Committee', $data);
	}

	public function Electrical_Works__Fire_Safety_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Electrical Works & Fire Safety Committee";
		$this->template->show('Electrical_Works__Fire_Safety_Committee', $data);
	}

	public function Examination_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Examination Committee";
		$this->template->show('Examination_Committee', $data);
	}

	public function Finance_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Finance Committee";
		$this->template->show('Finance_Committee', $data);
	}

	public function Governing_Body_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Governing Body Committee";
		$this->template->show('Governing_Body_Committee', $data);
	}

	public function Library_Committee()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = 'Committees';
		$data['activeMenu'] = "Library Committee";
		$this->template->show('Library_Committee', $data);
	}


	// public function Newsletters()
	// {
	// 	$data['mainMenu'] = 'About Us';
	// 	$data['parentMenu'] = false;
	// 	$data['activeMenu'] = "Newsletters";
	// 	$this->template->show('Newsletters', $data);
	// }

	public function Right_to_Information_RTI()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Right to Information (RTI)";
		$this->template->show('Right_to_Information_RTI', $data);
	}

	public function Mandatory_Disclosure()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Mandatory Disclosure";
		$this->template->show('Mandatory', $data);
	}

	public function Researchs()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Research";
		$this->template->show('Research', $data);
	}

	public function Audit_Reports()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Audit Reports";
		$this->template->show('Audit_Reports', $data);
	}

	public function Annual_Reports()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Annual Reports";
		$this->template->show('Annual_Reports', $data);
	}

	public function Accreditations_Approvals()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = "Accreditations/Approvals";
		$data['activeMenu'] = "Accreditations/Approvals";
		$this->template->show('Accreditations_Approvals', $data);
	}


	public function Organisation_Chart()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Organisation Chart";
		$this->template->show('Organisation_Chart', $data);
	}



	public function UGC()
	{
		$data['mainMenu'] = 'About Us';
		$data['parentMenu'] = "Accreditations/Approvals";
		$data['activeMenu'] = "UGC";
		$this->template->show('UGC', $data);
	}

// 	public function AICTE()
// 	{
// 		$data['mainMenu'] = 'About Us';
// 		$data['parentMenu'] = "Accreditations/Approvals";
// 		$data['activeMenu'] = "AICTE";
// 		$this->template->show('AICTE', $data);
// 	}

// 	public function NAAC()
// 	{
// 		$data['mainMenu'] = 'About Us';
// 		$data['parentMenu'] = "Accreditations/Approvals";
// 		$data['activeMenu'] = "NAAC";
// 		$this->template->show('NAAC', $data);
// 	}

// 	public function NBA()
// 	{
// 		$data['mainMenu'] = 'About Us';
// 		$data['parentMenu'] = "Accreditations/Approvals";
// 		$data['activeMenu'] = "NBA";
// 		$this->template->show('NBA', $data);
// 	}

// 	public function NIRF()
// 	{
// 		$data['mainMenu'] = 'About Us';
// 		$data['parentMenu'] = "Accreditations/Approvals";
// 		$data['activeMenu'] = "NIRF";
// 		$this->template->show('NIRF', $data);
// 	}

// 	public function Affiliation_from_VTU()
// 	{
// 		$data['mainMenu'] = 'About Us';
// 		$data['parentMenu'] = "Accreditations/Approvals";
// 		$data['activeMenu'] = "Affiliation from VTU";
// 		$this->template->show('Affiliation_from_VTU', $data);
// 	}

// 	public function ARIIA()
// 	{
// 		$data['mainMenu'] = 'About Us';
// 		$data['parentMenu'] = "Accreditations/Approvals";
// 		$data['activeMenu'] = "ARIIA";
// 		$data['page_title'] = "Atal Ranking of Institutions on Innovation Achievements (ARIIA)";
// 		$this->template->show('ARIIA', $data);
// 	}

// 	public function QS_I_Gauge()
// 	{
// 		$data['mainMenu'] = 'About Us';
// 		$data['parentMenu'] = "Accreditations/Approvals";
// 		$data['activeMenu'] = "QS_I_GAUGE";
// 		$data['page_title'] = "QS_I_GAUGE";
// 		$this->template->show('QS_I_GAUGE', $data);
// 	}

// 	public function TEQIP_III()
// 	{
// 		$data['mainMenu'] = 'TEQIP';
// 		$data['parentMenu'] = 'TEQIP-III';
// 		$data['activeMenu'] = "TEQIP-III";
// 		$this->template->show('TEQIP_III', $data);
// 	}

	public function AMCAT()
	{
		$data['mainMenu'] = 'TEQIP';
		$data['parentMenu'] = "TEQIP-III";
		$data['activeMenu'] = "AMCAT";
		$this->template->show('AMCAT', $data);
	}

	public function FMR()
	{
		$data['mainMenu'] = 'TEQIP';
		$data['parentMenu'] = "TEQIP-III";
		$data['activeMenu'] = "FMR";
		$this->template->show('FMR', $data);
	}

	public function EAP()
	{
		$data['mainMenu'] = 'TEQIP';
		$data['parentMenu'] = "TEQIP-III";
		$data['activeMenu'] = "EAP";
		$this->template->show('EAP', $data);
	}

	public function Online_Students_Feedback()
	{
		$data['mainMenu'] = 'TEQIP';
		$data['parentMenu'] = "TEQIP-III";
		$data['activeMenu'] = "Online Students Feedback";
		$data['page_title'] = "Online Students Feedback";
		$this->template->show('Online_Students', $data);
	}

	public function BOG_Proceedings()
	{
		$data['mainMenu'] = 'TEQIP';
		$data['parentMenu'] = "TEQIP-III";
		$data['activeMenu'] = "BOG Proceedings";
		$this->template->show('Bog', $data);
	}

	public function TEQIP_Annual_Reports()
	{
		$data['mainMenu'] = 'TEQIP';
		$data['parentMenu'] = "TEQIP-III";
		$data['activeMenu'] = "Annual Reports";
		$this->template->show('Teqip_Annual_Reports', $data);
	}

	public function TEQIP_Audit_Reports()
	{
		$data['mainMenu'] = 'TEQIP';
		$data['parentMenu'] = "TEQIP-III";
		$data['activeMenu'] = "Audit Reports";
		$this->template->show('Teqip_Audit_Reports', $data);
	}


// 	public function TEQIP_II()
// 	{
// 		$data['mainMenu'] = 'TEQIP';
// 		$data['parentMenu'] = false;
// 		$data['activeMenu'] = "TEQIP-II";
// 		$this->template->show('TEQIP_II', $data);
// 	}

// 	public function TEQIP_I()
// 	{
// 		$data['mainMenu'] = 'TEQIP';
// 		$data['parentMenu'] = false;
// 		$data['activeMenu'] = "TEQIP-I";
// 		$this->template->show('TEQIP_I', $data);
// 	}

	public function About_IQAC()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "About IQAC";
		$this->template->show('About_IQAC', $data);
	}

	public function IQAC_Staff()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Staff";
		$this->template->show('IQAC_Staff', $data);
	}

	public function IQAC_Coordinators()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Coordinators";
		$this->template->show('IQAC_Coordinators', $data);
	}

	public function IQAC_Core_Committee()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Core Committee";
		$this->template->show('IQAC_Core_Committee', $data);
	}

	public function Minutes_of_Meeting()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Minutes of Meeting";
		$this->template->show('IQAC_MOMs', $data);
	}

	public function Good_Governance_Document()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Good Governance Document";
		$this->template->show('Good_Governance_Document', $data);
	}

// 	public function AQAR_Reports()
// 	{
// 		$data['mainMenu'] = 'IQAC';
// 		$data['parentMenu'] = false;
// 		$data['activeMenu'] = "AQAR Reports";
// 		$this->template->show('AQAR_Reports', $data);
// 	}

// 	public function AQAR_Documents()
// 	{
// 		$data['mainMenu'] = 'IQAC';
// 		$data['parentMenu'] = false;
// 		$data['activeMenu'] = "AQAR Documents";
// 		$this->template->show('AQAR_Documents', $data);
// 	}

	public function AISHE_2022()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "AISHE 2022";
		$this->template->show('AISHE_2022', $data);
	}

	public function Sanctioned_Posts()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Sanctioned Posts";
		$this->template->show('Sanctioned_Posts', $data);
	}

	public function Egovernance()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "E-Governance";
		$this->template->show('Egovernance', $data);
	}

	public function Strategic_Plan()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Strategic Plan";
		$this->template->show('Strategic_Plan', $data);
	}

	public function Green_Campus_Practice()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Green Campus Practice";
		$this->template->show('Green_Campus_Practice', $data);
	}

	public function Security_and_Safety_of_Women()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Security and Safety of Women";
		$this->template->show('Security_and_Safety_of_Women', $data);
	}

	public function StakeHolders_Feedback()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "StakeHolders Feedback";
		$this->template->show('StakeHolders_Feedback', $data);
	}

	public function ATR_Feedback_on_Syllabus()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "ATR Feedback on Syllabus";
		$this->template->show('ATR_Feedback_on_Syllabus', $data);
	}

	public function List_of_faculty_members()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "List of Faculty Members";
		$this->template->show('List_of_faculty_members', $data);
	}

	public function Professional_Bodies_Memberships()
	{
		$data['mainMenu'] = 'IQAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Professional Bodies Memberships";
		$this->template->show('Professional_Bodies_Memberships', $data);
	}

	public function Programs_Offered()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Programs Offered";
		$this->template->show('Programs_Offered', $data);
	}

	public function Eligibility_Criteria()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Eligibility Criteria";
		$this->template->show('Eligibility_Criteria', $data);
	}

	public function Fee_Structure()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Fee Structure";
		$this->template->show('Fee_Structure', $data);
	}

	public function Application_Forms()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Application Forms";
		$this->template->show('Application_Forms', $data);
	}

	public function International_Admissions()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "International Admissions";
		$this->template->show('International_Admissions', $data);
	}



	public function Notifications()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Notifications";
		$this->template->show('Notifications', $data);
	}

	public function Admission_Statistics()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Admission Statistics";
		$this->template->show('Admission_Statistics', $data);
	}

	public function Reservation()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['page_title'] = "Reservations Under KEA and GOI";
		$data['activeMenu'] = "Reservation";
		$this->template->show('Reservation', $data);
	}

	public function Students_Onroll()
	{
		$data['mainMenu'] = 'Admissions';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Students On-Roll AY 2021-22";
		$this->template->show('Students_Onroll', $data);
	}

	public function overview($id)
	{
		$data['page_title'] = "Overview";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data["slider_count"] = $this->admin_model->sliders_count($data['dept_id']);
		$data['activeMenu'] = "Overview";
		$data['sliders'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'sliders')->result();
		$data['Details'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'events')->result();
		
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'department_id', 'departments_data')->row();
		$this->template->show('Dept_Overview', $data);
	}


	public function placements($id)
	{
		$data['page_title'] = "Placements";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data["slider_count"] = $this->admin_model->sliders_count($data['dept_id']);
		$data['activeMenu'] = "Placements";
		$data['sliders'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'sliders')->result();
		$data['Details'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'placements')->result();
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'department_id', 'departments_data')->row();
		$this->template->show('Dept_Placement', $data);
	}
	public function gallery($id)
	{
		$data['page_title'] = "Gallery";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['id'] = $id;
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['albums'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'albums')->result();
		$data['activeMenu'] = "Gallery";
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'department_id', 'departments_data')->row();
		$this->template->show('Dept_Gallery', $data);
	}
	public function gallery_images($id,$alb)
	{
		$data['page_title'] = "Gallery";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['id'] = $id;
		$data['album'] = $this->admin_model->getDetailsbyfield($alb, 'id', 'albums')->row();
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['albums'] = $this->admin_model->getDetailsbyfield($alb, 'album_id', 'album_images')->result();
		$data['activeMenu'] = "Gallery";
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'department_id', 'departments_data')->row();
		$this->template->show('Dept_Gallery_Inner', $data);
	}


	public function Contacts($id)
	{
		$data['page_title'] = "Contacts";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Contacts";
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'department_id', 'departments_data')->row();
		$this->template->show('Dept_HOD_Details', $data);
	}


	public function Programmes($id)
	{
		$data['page_title'] = "Programmes";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Programmes";
		$data['courseTypes'] = $this->courseTypes;
		$data['Programmes'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'programmes')->result();
		$this->template->show('Dept_Programmes', $data);
	}


	public function Committees($id)
	{
		$data['page_title'] = "Committees";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Committees";
		$data['courseTypes'] = $this->courseTypes;
		$data['Committees'] = $this->admin_model->getCommittees($data['dept_id'])->result();
		$this->template->show('Dept_Committees', $data);
	}
	public function Syllabus($id)
	{
		$data['page_title'] = "Syllabus / Time Table/ Calender of events"; 
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Syllabus";
		$data['Details'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'syllabus')->result();
		$this->template->show('Dept_Syllabus', $data);
	}

	public function Learning_Resources($id)
	{
		$data['page_title'] = "Materials";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Learning Resources";
		$data['Details'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'materials')->result();
		$this->template->show('Dept_Materials', $data);
	}



	public function Time_Table_Calendar_Of_Events($id)
	{
		$data['page_title'] = "Accredited Documents";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Time Table-Calendar Of Events";
		$data['Details'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'accredited_documents')->result();
		$this->template->show('Dept_Accredited_Documents', $data);
	}
	public function newsletters($id)
	{
		$data['page_title'] = "Newsletters";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Newsletters";
		$data['Details'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'newsletters')->result();
		$this->template->show('Dept_Newsletters', $data);
	}

	public function Mandatory_Disclosures($id)
	{
		$data['page_title'] = "Mandatory Disclosures";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Mandatory Disclosures";
		$data['Details'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'disclosures')->result();
		$this->template->show('Dept_Disclosures', $data);
	}


	public function News_and_Events($id)
	{
		$data['page_title'] = "News and Events";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "News and Events";
		$data['Details'] = $this->admin_model->getDetailsbyfield($data['dept_id'], 'dept_id', 'events')->result();
		$this->template->show('Dept_news', $data);
	}

	

	public function Staff($id)
	{
		$data['page_title'] = "Staff";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Staff";
		$config = array();
		$config["base_url"] = base_url() . "home/Staff/".$id.'/';
		$config["total_rows"] = $this->admin_model->staff_count($data['dept_id']);
		$config["per_page"] = 10;
		$config["uri_segment"] = 4;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["links"] = $this->pagination->create_links();
		// $data['staff'] = $this->admin_model->get_staff($data['dept_id'], $config["per_page"], $page);
		$data['staff'] = $this->admin_model->get_staff_priority($data['dept_id'], $config["per_page"], $page);
		$this->template->show('Dept_Staff', $data);
	}

	public function Faculty($id)
	{
		$data['page_title'] = "Faculty";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Faculty";
		$config = array();
		$config["base_url"] = base_url() . "home/Faculty/".$id.'/';
		$config["total_rows"] = $this->admin_model->faculty_count($data['dept_id']);
		$config["per_page"] = 10;
		$config["uri_segment"] = 4;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['designationType'] = $this->designationType;
		$data['faculty'] = $this->admin_model->get_faculty_priority($data['dept_id'], $config["per_page"], $page);
		$this->template->show('Dept_Faculty', $data);
	}

	public function Alumni($id)
	{
		$data['page_title'] = "Alumni";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Alumni";
		$config = array();
		$config["base_url"] = base_url() . "home/Alumni/".$id.'/';
		$config["total_rows"] = $this->admin_model->alumni_count($data['dept_id']);
		$config["per_page"] = 10;
		$config["uri_segment"] = 4;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['staff'] = $this->admin_model->get_alumni($data['dept_id'], $config["per_page"], $page);
		$this->template->show('Dept_Alumni', $data);
	}
	public function Research($id)
	{
		$data['page_title'] = "Research";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Research";
		$this->template->show('Dept_Research', $data);
	}


	public function Publications($id)
	{
		$data['page_title'] = "Publications";
		$data['mainMenu'] = 'Departments';
		$data['down'] = $id;
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Publications";

		$data['publicationTypes'] = array(' ' => " ") + $this->globals->publicationTypes();
		$publicationsStats = $this->admin_model->getPublicationsStats($data['dept_id']);
		$res = array();
		foreach ($publicationsStats as $publicationsStats1) {
			if (array_key_exists($publicationsStats1->academic_year, $res)) {
				$res[$publicationsStats1->academic_year][$publicationsStats1->publication_type] = $publicationsStats1->count;
			} else {
				$res[$publicationsStats1->academic_year][$publicationsStats1->publication_type] = $publicationsStats1->count;
			}
		}
		$data['publicationsStats'] = $res;

		$config = array();
		$config["base_url"] = base_url() . "home/Publications/".$id.'/';
		$config["total_rows"] = $this->admin_model->publications_count($data['dept_id']);
		$config["per_page"] = 10;
		$config["uri_segment"] = 4;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $page;
		$data['publications'] = $this->admin_model->get_publications($data['dept_id'], $config["per_page"], $page);
		$this->template->show('Dept_Publications', $data);
	}

	
	public function Achievements($id)
	{
		$data['page_title'] = "Achievements";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Achievements";

		$config = array();
		$config["base_url"] = base_url() . "home/Achievements/".$id.'/';
		$config["total_rows"] = $this->admin_model->achievements_count($data['dept_id']);
		$config["per_page"] = 10;
		$config["uri_segment"] = 4;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $page;
		$data['achievements'] = $this->admin_model->get_achievements($data['dept_id'], $config["per_page"], $page);
		$this->template->show('Dept_Achievements', $data);
	}

	public function Activities($id)
	{
		$data['page_title'] = "Activities";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Activities";

		$config = array();
		$config["base_url"] = base_url() . "home/Activities/".$id.'/';
		$config["total_rows"] = $this->admin_model->activities_count($data['dept_id']);
		$config["per_page"] = 10;
		$config["uri_segment"] = 4;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $page;

		$this->template->show('Dept_Activities', $data);
	}


	public function Academic_Regulations()
	{
		$data['mainMenu'] = 'Academic';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Academic Regulations";
		$this->template->show('Academic_Regulations', $data);
	}

	public function Code_of_Conduct()
	{
		$data['mainMenu'] = 'Academic';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Code of Conduct";
		$this->template->show('Code_of_Conduct', $data);
	}

	public function I_Year_BE_Curriculum()
	{
		$data['mainMenu'] = 'Academic';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "I Year B.E Curriculum";
		$this->template->show('I_Year_BE_Curriculum', $data);
	}

	public function Syllabus_Details()
	{
		$data['mainMenu'] = 'Academic';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Syllabus";
		$this->template->show('Syllabus', $data);
	}

	public function Calendar_of_Events()
	{
		$data['mainMenu'] = 'Academic';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Calendar of Events";
		$data['latestNews'] = $this->admin_model->getLatestNewsbyDisplay('4')->result();
		$this->template->show('Calendar_of_Events', $data);
	}

	public function Academic_Circulars()
	{
		$data['mainMenu'] = 'Academic';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Academic Circulars";
		$this->template->show('Academic_Circulars', $data);
	}

	public function Academic_Council_Minutes()
	{
		$data['mainMenu'] = 'Academic';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Academic Council Minutes";
		$this->template->show('Academic_Council_Minutes', $data);
	}

	public function Exam_Timetables()
	{
		$data['mainMenu'] = 'Examinations';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Exam Timetables";
		$data['latestNews'] = $this->admin_model->getLatestNewsbyDisplay('2')->result();
		$this->template->show('Exam_Timetables', $data);
	}

	public function Exam_Circulars()
	{
		$data['mainMenu'] = 'Examinations';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Exam Circulars";
		$display = 3;
		$config = array();
		$config["base_url"] = base_url() . "home/Exam_Circulars/";
		$config["total_rows"] = $this->admin_model->getLatestNewsCount($display);
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['latestNews'] = $this->admin_model->getLatestNewsList($display, $config["per_page"], $data['page'])->result();
		$this->template->show('Exam_Circulars', $data);
	}

	public function Graduation_Day()
	{
		$data['mainMenu'] = 'Examinations';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Graduation Day";
		$this->template->show('Graduation_Day', $data);
	}

	public function Rank_List()
	{
		$data['mainMenu'] = 'Examinations';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Rank List";
		$this->template->show('Rank_List', $data);
	}

	public function ACTS()
	{
		$data['mainMenu'] = 'RESEARCH & INNOVATION';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Ambedkar Centre for Tech Startup(ACTS)- The Incubation & Startup Cell";
		$this->template->show('ACTS', $data);
	}

	public function IIC()
	{
		$data['mainMenu'] = 'RESEARCH & INNOVATION';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Institution's Innovation Council (IIC)";
		$this->template->show('IIC', $data);
	}

	public function IPR()
	{
		$data['mainMenu'] = 'RESEARCH & INNOVATION';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Intellectual Property Rights (IPR) Cell";
		$this->template->show('IPR', $data);
	}

	public function Industrial_Consultancy_Services()
	{
		$data['mainMenu'] = 'RESEARCH & INNOVATION';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Industrial Consultancy Services";
		$this->template->show('Industrial_Consultancy_Services', $data);
	}

	public function Funded_Research_Projects()
	{
		$data['mainMenu'] = 'RESEARCH & INNOVATION';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Funded Research Projects";
		$this->template->show('Funded_Research_Projects', $data);
	}

	public function Research_Guides()
	{
		$data['mainMenu'] = 'RESEARCH & INNOVATION';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Research Guides";
		$this->template->show('Research_Guides', $data);
	}

	public function About_R_and_D()
	{
		$data['mainMenu'] = 'Cells';
		$data['parentMenu'] = "R & D Cell";
		$data['activeMenu'] = "About R & D";
		$this->template->show('About_R_and_D', $data);
	}

	public function IIC_Social_Media()
	{
		$data['mainMenu'] = 'RESEARCH & INNOVATION';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "IIC Social Media";
		$this->template->show('IIC_Social_Media', $data);
	}

	public function ISTE_Chapter()
	{
		$data['mainMenu'] = 'Cells';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "ISTE Chapter";
		$this->template->show('ISTE_Chapter', $data);
	}

	public function StartUp_Cell()
	{
		$data['mainMenu'] = 'Cells';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "StartUp Cell";
		$this->template->show('StartUp_Cell', $data);
	}

	public function SC_ST_OBC_Cell()
	{
		$data['mainMenu'] = 'Cells';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "SC-ST-OBC Cell";
		$this->template->show('SC_ST_OBC_Cell', $data);
	}

	public function Institutional_Membership()
	{
		$data['mainMenu'] = 'Cells';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Institutional Membership";
		$this->template->show('Institutional_Membership', $data);
	}

	public function About_Library()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = "Library";
		$data['activeMenu'] = "About Library";
		$this->template->show('About_Library', $data);
	}

	public function Library_Staff_Details()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = "Library";
		$data['activeMenu'] = "Library Staff Details";
		$this->template->show('Library_Staff_Details', $data);
	}

	public function Library_Location_and_Services()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = "Library";
		$data['activeMenu'] = "Library Location and Services";
		$this->template->show('Library_Location_and_Services', $data);
	}

	public function eResources()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = "Library";
		$data['activeMenu'] = "eResources";
		$this->template->show('eResources', $data);
	}

	public function DELNET()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = "Library";
		$data['activeMenu'] = "DELNET";
		$this->template->show('DELNET', $data);
	}

	public function Library_Timings()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = "Library";
		$data['activeMenu'] = "Library Timings";
		$this->template->show('Library_Timings', $data);
	}

	public function Library_Statistics()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = "Library";
		$data['activeMenu'] = "Library Statistics";
		$this->template->show('Library_Statistics', $data);
	}

	public function Library_Rules_and_Regulations()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = "Library";
		$data['activeMenu'] = "Library Rules and Regulations";
		$this->template->show('Library_Rules_and_Regulations', $data);
	}

	public function Library_Journals()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = "Library";
		$data['activeMenu'] = "National & International Journals";
		$this->template->show('Library_Journals', $data);
	}

	// public function Hostel()
	// {
	// 	$data['mainMenu'] = 'Facilities';
	// 	$data['parentMenu'] = false;
	// 	$data['activeMenu'] = "Hostel";
	// 	$this->template->show('Hostel', $data);
	// }

// 	public function Sports()
// 	{
// 		$data['mainMenu'] = 'Facilities';
// 		$data['parentMenu'] = false;
// 		$data['activeMenu'] = "Sports";
// 		$this->template->show('Sports', $data);
// 	}

	public function NSS()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "NSS";
		$data['page_title'] = 'National Service Scheme (NSS)';
		$this->template->show('NSS', $data);
	}

	public function ICT()
	{
		$data['mainMenu'] = 'Facilities';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "ICT";
		$this->template->show('ICT', $data);
	}

	public function R_and_D_Cell()
	{
		$data['mainMenu'] = 'RESEARCH & INNOVATION';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "R & D Cell";
		$this->template->show('R_and_D_Cell', $data);
	}

	public function NIRF_Details()
	{
		$data['mainMenu'] = 'RESEARCH & INNOVATION';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "NIRF Details";
		$this->template->show('NIRF_Details', $data);
	}


	public function About_Placement_Cell()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "About Placement Cell";
		$this->template->show('About_Placement_Cell', $data);
	}

	public function Placement_Training()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Placement Training";
		$this->template->show('Placement_Training', $data);
	}

	public function Placement_Activities()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Placement Activities";
		$this->template->show('Placement_Activities', $data);
	}

	public function Placement_Gallery()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Placement_Gallery', $data);
	}

	public function Placement_Recruiting_Companies()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Recruiting Companies";
		$this->template->show('Placement_Recruiting_Companies', $data);
	}

	public function Placement_Statistics()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Placement Statistics";
		$this->template->show('Placement_Statistics', $data);
	}

	public function Placement_Contact_Us()
	{
		$data['mainMenu'] = 'Placements';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Contact Us";
		$this->template->show('Placement_Contact_Us', $data);
	}

// 	public function Media()
// 	{
// 		$data['mainMenu'] = 'Media';
// 		$data['parentMenu'] = false;
// 		$data['activeMenu'] = "Media";
// 		$this->template->show('Media', $data);
// 	}

	public function Naac_Documents()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'Naac_Documents';
		$this->template->show('Naac_Documents', $data);
	}

	public function Metric_Clarifications()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'Metric_Clarifications';
		$this->template->show('Metric_Clarifications', $data);
	}

	public function Naac_Clarifications()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'Naac_Clarifications';
		$this->template->show('Naac_Clarifications', $data);
	}

	public function Naac_Clarifications_112()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'Naac Clarifications 1.1.2';
		$this->template->show('Naac_Clarifications_112', $data);
	}

	public function Naac_Documents_112()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'Naac Documents 1.1.2';
		$this->template->show('Naac_Documents_112', $data);
	}

	public function Naac_Clarifications_113()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		
		$data['activeMenu'] = 'Naac Clarifications 1.1.3';
		$this->template->show('Naac_Clarifications_113', $data);
	}

	public function Naac_Documents_113()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_113', $data);
	}

	public function Naac_Clarifications_121()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_121', $data);
	}

	public function Naac_Documents_121()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR-CYCLE-2';
		$this->template->show('Naac_Documents_121', $data);
	}

	public function Naac_Clarifications_122()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_122', $data);
	}

	public function Naac_Documents_122()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_122', $data);
	}

	public function Naac_Documents_131()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_131', $data);
	}

	public function Naac_Clarifications_132()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_132', $data);
	}

	public function Naac_Documents_132()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_132', $data);
	}


	public function Naac_Clarifications_133()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_133', $data);
	}

	public function Naac_Documents_133()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_133', $data);
	}

	public function Naac_Clarifications_134()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_134', $data);
	}

	public function Naac_Documents_134()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_134', $data);
	}
	public function Naac_Documents_141()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_141', $data);
	}


	public function Naac_Clarifications_142()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_142', $data);
	}

	public function Naac_Documents_142()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_142', $data);
	}

	public function Naac_Clarifications_211()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_211', $data);
	}

	public function Naac_Clarifications_212()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_212', $data);
	}

	public function Naac_Clarifications_222()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_222', $data);
	}

	public function Naac_Documents_232()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_232', $data);
	}

	public function Naac_Clarifications_233()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_233', $data);
	}


	public function Naac_Documents_233()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_233', $data);
	}
	public function Naac_Documents_234()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_234', $data);
	}
	public function Naac_Clarifications_241()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_241', $data);
	}
	public function Naac_Clarifications_242()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_242', $data);
	}

	public function Naac_Clarifications_243()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_243', $data);
	}

	public function Naac_Clarifications_251()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_251', $data);
	}

	public function Naac_Clarifications_252()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_252', $data);
	}

	public function Naac_Documents_261()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_261', $data);
	}

	public function Naac_Clarifications_263()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_263', $data);
	}

	public function Naac_Documents_312()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_312', $data);
	}

	public function Naac_Clarifications_321()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_321', $data);
	}

	public function Naac_Clarifications_332()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_332', $data);
	}

	public function Naac_Clarifications_371()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_371', $data);
	}


	public function Naac_Documents_321()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_321', $data);
	}

	public function Naac_Clarifications_323()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_323', $data);
	}

	public function Naac_Documents_323()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_323', $data);
	}



	public function Naac_Documents_324()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_324', $data);
	}
	public function Naac_Documents_332()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_332', $data);
	}

	public function Naac_Clarifications_342()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_342', $data);
	}

	public function Naac_Clarifications_344()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_344', $data);
	}

	public function Naac_Clarifications_522()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_522', $data);
	}

	public function Naac_Clarifications_523()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_523', $data);
	}

	public function Naac_Clarifications_362()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_362', $data);
	}

	public function Naac_Clarifications_372()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_372', $data);
	}

	public function Naac_Documents_342()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_342', $data);
	}
	public function Naac_Documents_351()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_351', $data);
	}

	public function Naac_Clarifications_352()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_352', $data);
	}

	public function Naac_Documents_362()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_362', $data);
	}

	public function Naac_Clarifications_363()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_363', $data);
	}

	public function Naac_Clarifications_364()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_364', $data);
	}

	public function Naac_Documents_371()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_371', $data);
	}
	public function Naac_Documents_372()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_372', $data);
	}

	public function Naac_Clarifications_413()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_413', $data);
	}

	public function Naac_Clarifications_513()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_513', $data);
	}

	public function Naac_Documents_521()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_521', $data);
	}

	public function Naac_Clarifications_521()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_521', $data);
	}


	public function Naac_Documents_522()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_522', $data);
	}
	public function Naac_Documents_531()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_531', $data);
	}

	public function Naac_Clarifications_531()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_531', $data);
	}
	public function Naac_Documents_633()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_633', $data);
	}
	public function Naac_Clarifications_633()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_633', $data);
	}
	public function Naac_Documents_634()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC SSR -CYCLE-2';
		$this->template->show('Naac_Documents_634', $data);
	}
	public function Naac_Clarifications_634()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_634', $data);
	}

	public function Naac_Clarifications_7110()
	{
		$data['mainMenu'] = false;
		$data['parentMenu'] = false;
		$data['activeMenu'] = 'NAAC Clarifications CYCLE-2';
		$this->template->show('Naac_Clarifications_7110', $data);
	}


	public function Gallery_1()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery', $data);
	}

	public function Gallery_9th_graduation_day()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_9th_graduation_day', $data);
	}

	public function Gallery_7th_8th_graduation_day()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_7th_8th_graduation_day', $data);
	}

	public function Gallery_mAITri_2019()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_mAITri_2019', $data);
	}

	public function Gallery_mAITri_2018()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_mAITri_2018', $data);
	}

	public function Gallery_Founders_Day_2018()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_Founders_Day_2018', $data);
	}

	public function Gallery_DrBRAmbedkar_jayanthi_Celebrations_2019()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_DrBRAmbedkar_jayanthi_Celebrations_2019', $data);
	}

	public function Gallery_DrBRAmbedkar_jayanthi_Celebrations_2022()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_DrBRAmbedkar_jayanthi_Celebrations_2022', $data);
	}


	public function Gallery_DrBRAmbedkar_jayanthi_Celebrations_2023()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_DrBRAmbedkar_jayanthi_Celebrations_2023', $data);
	}


	public function Gallery_National_Level_Techno_Exhibition_2019()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_National_Level_Techno_Exhibition_2019', $data);
	}

	public function Gallery_National_Level_Techno_Exhibition_2023()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_National_Level_Techno_Exhibition_2023', $data);
	}

	public function Gallery_Kalarava_2019()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_Kalarava_2019', $data);
	}

	public function Gallery_kalarava_2022()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_kalarava_2022', $data);
	}

	public function Gallery_Independence()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_Independence', $data);
	}

	public function Gallery_National_Conference_2019()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_National_Conference_2019', $data);
	}

	public function Gallery_Inauguration_of_First_Year_BE_2021()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_Inauguration_of_First_Year_BE_2021', $data);
	}

	public function Gallery_Inauguration_of_MSME_Takshashila_Business_Incubator_2022()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Gallery_Inauguration_of_MSME_Takshashila_Business_Incubator_2022', $data);
	}

	public function Stake_holders_perception()
	{
		$data['mainMenu'] = 'Stake Holders Perception';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Stake Holders Perception";
		$this->template->show('Stake_holders_perception', $data);
	}

// 	public function MoU()
// 	{
// 		$data['mainMenu'] = 'MoU';
// 		$data['parentMenu'] = false;
// 		$data['activeMenu'] = "MoU";
// 		$this->template->show('MoU', $data);
// 	}

	public function contact_us()
	{
		$data['mainMenu'] = 'Contact';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Contact Us";
		$data['action'] = 'home/contact_us';
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('interest', 'Interest', 'required');
		$this->form_validation->set_rules('query', 'Query', 'required');
		if ($this->form_validation->run() === FALSE) {
			// $this->admin_template->show('admin/add_faculty',$data);        
			$this->template->show('Contact_us', $data);
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$interest = $this->input->post('interest');
			$query = $this->input->post('query');

			// SEND MAIL    -- CHANGE EMAIL

			$emailContent = '<!DOCTYPE><html><head></head><body>';
			$emailContent .= '<h4> Website Enquiry </h4>';
			$emailContent .= '<h4> Name: ' . $name . '</h4>';
			$emailContent .= '<h4> Email: ' . $email . '</h4>';
			$emailContent .= '<h4> Interest: ' . $interest . '</h4>';
			$emailContent .= '<h4> Query: ' . $query . '</h4>';
			// $emailContent .="<p> You are receiving this email because we received a password reset request for your BMSCE Campus account.</p>";
			// $emailContent .="<p> Click the link below to reset your password and will expire in 24 hours.</p>";
			//                 // $emailContent .="<a style='background-color: #f44336; border: none; color: white; padding: 10px 25px; text-align: center; text-decoration: none;display: inline-block;font-size: 14px;' target='_blank' href='https://webcampus.bmsce.in/".$key."'>Reset Password</a>";
			// $emailContent .="<p> If you did not request a password reset, no further action is required. </p>";
			$emailContent .= "</body></html>";

			$config['smtp_host']    = '127.0.0.1';
			$config['smtp_port']    = '25';
			//$config['smtp_user']    = 'no-reply@bmsedu.in';    //Important
			//$config['smtp_pass']    = 'BMS!@#$%^';  //Important
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html

			$this->load->library('email', $config);
			$this->email->set_mailtype("html");
			$this->email->from($email);
			$this->email->to('enquiry@drait.edu.in, seenu619@gmail.com');
			$this->email->subject('Enquiry Form Details');
			$this->email->message($emailContent);

			if ($this->email->send()) {
				//SUCCESS MESSAGE
				// $data['msg'] = "<h6 class='tx-color-03 mg-b-30 tx-center'> An email has been sent to email you have provided. Please follow the link in the email to complete your password reset request. <br/> <br/> If you can't see the email from us look in your email's spam folder. </h6>";       
				$this->session->set_flashdata('message', 'Your submission is received and we will contact you soon.');
			} else {
				$this->session->set_flashdata('message', 'Oops! Something went wrong.');
			}

			redirect('home/contact_us');
		}
	}
	
	public function Facilities($id)
{
    $data['page_title'] = "Facilities";
    $data['mainMenu'] = 'Departments';
    $data['dept_name'] = str_replace('-', ' ', $id);
    $data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
    $data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
    $data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
    $data['activeMenu'] = "Facilities";

    $config = array();
    $config["base_url"] = base_url() . "home/Facilities/".$id.'/';
    $config["total_rows"] = $this->admin_model->facilities_count($data['dept_id']);
    $config["per_page"] = 10;
    $config["uri_segment"] = 3;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
    $config['cur_tag_close'] = '</a></li>';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $config['next_tag_open'] = '<li class="pg-next">';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li class="pg-prev">';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data["links"] = $this->pagination->create_links();
    $data['page'] = $page;
    $data['facilities'] = $this->admin_model->get_facilities($data['dept_id'], $config["per_page"], $page);
    $this->template->show('Dept_Facilities', $data);
}

	public function error404()
	{
		$data['page_title'] = "Page Not Found..!";
		$this->template->show('error404', $data);
	}
	

	public function facultyProfile($faculty_id, $faculty_name)
	{
		$data['page_title'] = "Faculty Profile";
		$data['mainMenu'] = 'Departments';
		$faculty = $this->admin_model->getDetails('faculty', $faculty_id)->row();
		$data['faculty']=$faculty;
		$data['dept_id'] = $faculty->dept_id;
		$data['publications'] = $this->admin_model->getDetailsbyfieldSort($faculty_id, 'faculty_id', 'academic_year', 'DESC', 'publications')->result();
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Faculty";
		
		$this->template->show('Dept_Faculty_Profile', $data);
	}

	public function feedback()
	{
		$data['mainMenu'] = 'Feedback';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Feedback";
		$this->template->show('Feedback', $data);
	}

	public function Events()
	{
		$data['mainMenu'] = 'Events';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Events";
		$this->template->show('events', $data);
	}
	public function Publications_Download($id)
	{
		$data['page_title'] = "Publications";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "Publications";

		$data['publicationTypes'] = array(' ' => " ") + $this->globals->publicationTypes();
		$publicationsStats = $this->admin_model->getPublicationsStats($data['dept_id']);
		$res = array();
		foreach ($publicationsStats as $publicationsStats1) {
			if (array_key_exists($publicationsStats1->academic_year, $res)) {
				$res[$publicationsStats1->academic_year][$publicationsStats1->publication_type] = $publicationsStats1->count;
			} else {
				$res[$publicationsStats1->academic_year][$publicationsStats1->publication_type] = $publicationsStats1->count;
			}
		}
		$data['publicationsStats'] = $res;

		
		$data['page'] = $page;
		$data['publications'] = $this->admin_model->get_publications_download($data['dept_id']);
		$this->template->show('Dept_Publications_Download', $data);


		$html = $this->load->view('Dept_Publications_Download', $data, true);

		// echo $html;
		// die();
	
				// Create PDF instance
				$options = new Options();
				// $options->set('isHtml5ParserEnabled', true);
				$dompdf = new Dompdf($options);
				$dompdf->loadHtml($html);
		
				// Set paper size (optional)
				$dompdf->setPaper('A4', 'portrait');
		
				// Render PDF (first page)
			echo	$dompdf->render();
				//  $dompdf->stream($id.'-Publications.pdf');    
	}


	public function Graduation_Day2019()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Graduation_Day2019', $data);
	}
	public function Graduation_Day2018()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Graduation_Day2018', $data);
	}
	public function Graduation_Day2020()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Graduation_Day2020', $data);
	}
	public function Graduation_Day2022()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Graduation_Day2022', $data);
	}
	public function Graduation_Day2023()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Graduation_Day2023', $data);
	}
	public function Graduation_Day2017()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Graduation_Day2017', $data);
	}
	public function Nenapina_Doni_2023()
	{
		$data['mainMenu'] = 'Gallery';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Gallery";
		$this->template->show('Nenapina_Doni_2023', $data);
	}


	public function Quality_Initiatives()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Quality Initiatives";
		$this->template->show('Quality_Initiatives', $data);
	}

	public function Qualitative_Matrics()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "Qualitative Matrics";
		$this->template->show('Qualitative_Matrics', $data);
	}

	public function SSR()
	{
		$data['mainMenu'] = 'NAAC';
		$data['parentMenu'] = false;
		$data['activeMenu'] = "SSR";
		$this->template->show('SSR', $data);
	}


	public function Initiative($id)
	{
		$data['page_title'] = "Quality Initiative";
		$data['mainMenu'] = 'NAAC';
		$data['activeMenu'] = "Quality Initiative";
	
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($id, 'id', 'naac_files')->row();
		$this->template->show('naac_info', $data);
	}

	public function matrics($id)
	{
		$data['page_title'] = "Qualitative Matrics";
		$data['mainMenu'] = 'NAAC';
		$data['activeMenu'] = "Qualitative Matrics";
	
		$data['departmentsDetails'] = $this->admin_model->getDetailsbyfield($id, 'id', 'naac_files')->row();
		$this->template->show('naac_info', $data);
	}

	public function CIE_Seat_Allotment($id)
	{
		$data['page_title'] = "CIE Seat Allotment";
		$data['mainMenu'] = 'Departments';
		$data['dept_name'] = str_replace('-', ' ', $id);
		$data['dept_id'] = $this->globals_model->departmentId($data['dept_name']);
		$data['parentMenu'] = $this->globals_model->departmentsList()[$data['dept_id']];
		$data['short_name'] = $this->globals_model->departmentShortName()[$data['dept_id']];
		$data['activeMenu'] = "CIE Seat Allotment";
		$data['circulars'] = $this->admin_model->getDetailsbyfieldSort($data['dept_id'], 'dept_id','id','desc', 'seats')->result();
		$this->template->show('Dept_Seats', $data);
	}

	public function docs()
	{
		$Scrolling = $this->admin_model->getDetails('scrolling', '1')->row();
		$data['scroll_text'] = $Scrolling->scroll_text;
		$data['scroll_status'] = $Scrolling->status;
		$data['activeMenu'] = "Home";

		// echo "<pre>";
		// print_r($latestNews); die;

		$this->template->show('docs', $data);
	}
	

}
