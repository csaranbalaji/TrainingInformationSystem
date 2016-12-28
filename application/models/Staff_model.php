<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Staff_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->helper(array('cookie'));
     }
     //get the username & password from tbl_usrs
     function get_user($usr, $pwd)
     {
          $sql = "select fname from staff where email = '" . $usr . "' and password = '" . md5($pwd) ."'" ;
          $query = $this->db->query($sql);
          $res = $query->result();
          $row = $res[0];  
          set_cookie('name',$row->fname,'3600');
          return $query->num_rows();
     }
}?>
