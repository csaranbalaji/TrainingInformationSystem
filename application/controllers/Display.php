<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Display extends CI_Controller {
     public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->database();
          $this->load->library(array('session', 'form_validation'));
          
          //load the model
          $this->load->model('display_model'); 
     }

     public function index()
     {
           
          
          //call the model function to get the data
          $profile = $this->display_model->get_profile_list();           
          $data['profile'] = $profile;
          
            
          //call the model function to get the data
          $quesresult = $this->display_model->get_question_list();           
          $data['questlist'] = $quesresult;
          
           
          //call the model function to get the data
          $projectresult = $this->display_model->get_project();           
          $data['project'] = $projectresult;
          
          //load the view
          $this->load->view('display_view',$data);
     }
     public function update_mark($mark)
     {
		 
		 $this->display_model->update_mark($mark);
	 }
     function update()
    {
        //set validation rules
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            echo nl2br("\n <div class='alert alert-danger' align='center'><strong>Failed!</strong> Please Check the Respective Tab.</div>");
            $this->load->view('display_view');
        }
        else
        {
			$status=$this->input->post('status');
			$data=$this->input->post();
            // insert form data into database
            if ($this->display_model->update_status($status,$data))
            {
				echo nl2br("\n <div class='alert alert-success' align='center'><strong>Success!</strong> Status Has Been Updated Successfully.</div>");
				redirect('display');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('display');
            }
        }
    }
    
}
