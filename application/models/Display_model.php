<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Display_model extends CI_Model{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->helper(array('cookie'));
     }

     //read the list from db
     function get_mark_list()
     {	
		 $id=get_cookie('id');
          $sql = 'select * from marks where id='.$id;
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     
     function get_assignment_list()
     {
          $sql = 'select * from assignment';
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     
     function answer($ans)
     {
		  $sql = "update assignment set ans = '" . $ans . "' where class='ug1'" ;
          $query = $this->db->query($sql);
	 }
	 
	 function get_file_list()
     {	
		 
          $sql = "select sno,filename,date_format(modified,'%d-%m-%Y') as modified from file;";
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
}
