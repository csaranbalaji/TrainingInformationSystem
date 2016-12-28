<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Display_model extends CI_Model{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->helper(array('cookie'));
     }

     //read the list from db
     function get_course_list()
     {	
		 $id=get_cookie('id');
          $sql = 'select id,fname,email,course from trainee';
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     
     function get_question_list()
     {
          $sql = 'select * from questions where course="Git and SVN"';
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     
     function status($status)
     {
		 $id=get_cookie('id');
		  $sql = "update project set pstatus = '" . $status . "' where id=".$id ;
          $query = $this->db->query($sql);
	 }
	 
	 function get_file_list()
     {	
		 
          $sql = "select marks from ";
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
}
