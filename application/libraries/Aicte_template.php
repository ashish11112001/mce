<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Aicte_template {
    function show($view, $data = array())
    {
        // Get current CI Instance
        $CI = & get_instance();
 
        // Load template views
        $CI->load->view('aicte/template/dept_header', $data);
        $CI->load->view($view, $data);
        $CI->load->view('aicte/template/dept_footer', $data);
    }
}
 
/* End of file Template.php */