<?php
class Entry_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('mongoci');
    }
    
    //insert into user table
    function insertQues($data)
    {		
			//Mongo DB insert
			$query = $this->mongoci->db->question->insert($data);
			return $query;
			//MySql insert
			//return $this->db->insert('question', $data);
	}
	
	//read the list from db
     function get_profile_list()
     {	
		 
          $sql = 'select * from trainee';
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     
     function get_question_list()
     {
          $sql = 'select * from question where course="Git & SVN"';
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     
     function get_project()
     {
		 
          $sql = 'select * from project';
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
        
}
?>
