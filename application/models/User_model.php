<?php
class User_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function insertUser($data)
    {
		if($data['role'] == 'S')
			return $this->db->insert('student', $data);
		else
			return $this->db->insert('staff', $data);
    }
    
    
    
}
?>
