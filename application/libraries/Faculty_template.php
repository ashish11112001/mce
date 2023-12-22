<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Faculty_template {
    function show($view, $data = array())
    {
        // Get current CI Instance
        $CI = & get_instance();
 
        // Load template views
        $CI->load->view('faculty/template/dept_header', $data);
        $CI->load->view($view, $data);
        $CI->load->view('faculty/template/dept_footer', $data);
    }
}
 
/* End of file Template.php */