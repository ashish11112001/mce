<?php
class Globals_model extends CI_Model
{

    public function designations()
    {
        $designations = array(
            '1' => 'Professor',
            '2' => 'Associate Professor',
            '3' => 'Assistant Professor'
        );
        return $designations;
    }

    public function departmentsList()
    {
        $query = $this->db->get('departments');
        $departments = $query->result();


        foreach ($departments as $dep) {
            $departments[$dep->id] = $dep->department_name;
        }
        return $departments;
    }



    public function departmentShortName()
    {
        $query = $this->db->get('departments');
        $departments = $query->result();


        foreach ($departments as $dep) {
            $departments[$dep->id] = $dep->short_name;
        }
        
        return $departments;
    }

    public function departmentId($id)
    {
        $this->db->like('department_name', $id);
        $query = $this->db->get('departments');
        $departments = $query->row();


        
        
        return $departments->id;
    }


    public function publicationTypes()
    {
        $details = array(
            '1' => 'National Journal',
            '2' => 'International Journal',
            '3' => 'National Conference',
            '4' => 'International Conference'
        );
        return $details;
    }

    public function activityTypes()
    {
        return array(
            '1' => 'Technical Events',
            '2' => 'Industry Interaction',
            '3' => 'Cocurricular Activities',
            '4' => 'Extra Curricular Activities'
        );
    }

    public function academicYears($start)
    {
        $result = array();
        $end = date('Y');
        for ($start; $start <= $end; $start++) {
            $startInc = $start + 1;
            $ay = $start . '-' . $startInc;
            $result[$ay] = $ay;
        }
        $result = array_reverse($result);
        return $result;
    }

    public function newsDisplay()
    {
        return array(
            "1" => "Notification",
            "2" => "Exam Timetable",
            "3" => "Exam Circular",
            "4" => "Calendar of Events",
            "5" => "Tender"
        );
    }

    public function get_name_by_id($id,$table) {
        // Assuming your table name is 'your_table'
        $query = $this->db->get_where($table, array('id' => $id));

        // Check if a row with the given ID exists
        if ($query->num_rows() > 0) {
            // Retrieve the 'name' field value
            $result = $query->row()->name;
            return $result;
        } else {
            return false; // or handle the case when the ID is not found
        }
    }
}
