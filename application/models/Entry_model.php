<?php
class Entry_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function insertUser($data)
    {
			return $this->db->insert('marks', $data);
    }
    
    function insertQues($data)
    {
			return $this->db->insert('assignment', $data);
	}
	
	function upload($data)
	{
			return $this->db->insert('file',$data);
	}
    
    
    
}
?>
