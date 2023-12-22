<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Globals {

    public function designations() {
        $designations = array('1' => 'Professor', 
                              '2' => 'Associate Professor', 
                              '3' => 'Assistant Professor');
        return $designations;   
    }
    
    public function departmentsList() {
        $departments = array('1' => 'Civil Engineering', 
                            '2' => 'Mechanical Engineering', 
                            '3' => 'Electrical and Electronics Engineering', 
                            '4' => 'Electronics and Communication Engineering', 
                            '5' => 'Industrial Engineering and Management', 
                            '6' => 'Electronics and Instrumentation Engineering', 
                            '7' => 'Computer Science and Engineering',
                            '8' => 'Electronics and Telecommunication Engineering',
                            '9' => 'Information Science and Engineering',
                            '10' => 'Medical Electronics Engineering',
                            '11' => 'Aeronautical Engineering',
                            '12' => 'Computer Applications (MCA)',
                            '13' => 'Business Administration (MBA)',
                            '14' => 'Mathematics',
                            '15' => 'Physics',
                            '16' => 'Chemistry',
                            '17' => 'Humanities and Social Science',
                            '18' => 'Computer Science and Business Systems',
                            '19' => 'Artificial Intelligence and Machine Learning',
                        );
        return $departments;   
    }

    public function departmentShortName() {
        $departments = array('1' => 'CV', 
                            '2' => 'ME', 
                            '3' => 'EEE', 
                            '4' => 'ECE', 
                            '5' => 'IEM', 
                            '6' => 'EIE', 
                            '7' => 'CS',
                            '8' => 'ETE',
                            '9' => 'IS',
                            '10' => 'ML',
                            '11' => 'AE',
                            '12' => 'MCA',
                            '13' => 'MBA',
                            '14' => 'MAT',
                            '15' => 'PHY',
                            '16' => 'CHE',
                            '17' => 'HSS',
                            '18' => 'CSBS',
                            '19' => 'AIML'
                        );
        return $departments;   
    }

    public function publicationTypes() {
        $details = array('1' => 'National Journal', 
                              '2' => 'International Journal', 
                              '3' => 'National Conference', 
                              '4' => 'International Conference');
        return $details;   
    }

    public function activityTypes() {
        return array('1' => 'Technical Events', 
                    '2' => 'Industry Interaction', 
                    '3' => 'Cocurricular Activities', 
                    '4' => 'Extra Curricular Activities');
    }
     
    public function academicYears($start) {
        $result = array(); $end = date('Y');
        for($start; $start <= $end; $start++){
            $startInc = $start + 1;
            $ay = $start.'-'.$startInc;
            $result[$ay] = $ay;
        }
        $result = array_reverse($result);
        return $result;   
    }
    
    public function newsDisplay(){
        return array(
            "1" => "Notification",
            "2" => "Exam Timetable",
            "3" => "Exam Circular",
            "4" => "Calendar of Events",
            "5" => "Tender"
        );
    }

    public function newsDisplay1(){
        return array(
            
            "4" => "Events",
           
        );
    }
    public function newsDisplay2(){
        return array(
            
            "4" => "Events",
            "5" => "Startups"
        );
    }
}
?>