<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Display_model extends CI_Model{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->library('mongoci');
          $this->load->driver('cache');
          $this->load->helper(array('cookie'));
     }
     
	public function mongo_cursor($cursor)  // iterator to cursor and return array 
	{
		$data=array();
		foreach($cursor as $user_data)
		{
		  $data[]=$user_data;
		}
		return $data;

	}
	
     //read the list from db
     function get_profile_list()
     {	
		 $id=get_cookie('id');
		  $this->cache->redis->save('id',$id,100);
          $sql = 'select * from trainee where id='.$id;
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     
     function get_question_list()
     {
          /* //For MySql
          $sql = 'select * from question where course="Git & SVN"';
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;*/
          //for Mongo DB
          $query = $this->mongoci->db->question->find();
          return $this->mongo_cursor($query);
     }
     
     function get_project()
     {
		 $id=get_cookie('id');
          $sql = 'select * from project where id='.$id;
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     
     function update_status($status)
     {
		 $id=get_cookie('id');
		  $sql = "update project set pstatus = concat('".$status."<br>',pstatus) where id=".$id ;
          return $this->db->query($sql);
	 }
	 
	 function update_mark($mark)
     {
		 $id=get_cookie('id');
		  $sql = "update trainee set mark = '" . $mark . "' where id=".$id ;
          return $this->db->query($sql);
	 }
	 
}
