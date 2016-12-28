<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Display extends CI_Controller {
     public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->database();
     }

     public function index()
     {
          //load the model
          $this->load->model('display_model');  
          
          //call the model function to get the data
          $markresult = $this->display_model->get_mark_list();           
          $data['marklist'] = $markresult;
          
            
          //call the model function to get the data
          $assignresult = $this->display_model->get_assignment_list();           
          $data['deptlist'] = $assignresult;
          
           
          //call the model function to get the data
          $fileresult = $this->display_model->get_file_list();           
          $data['filelist'] = $fileresult;
          
          //load the view
          $this->load->view('display_view',$data);
     }
}
