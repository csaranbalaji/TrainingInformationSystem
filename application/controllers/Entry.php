<?php
class Entry extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
        $this->load->model('entry_model');
    }
    
    public function index()
     {
          //call the model function to get the data
          $profile = $this->entry_model->get_profile_list();           
          $data['studlist'] = $profile;
          
            
          //call the model function to get the data
          $quesresult = $this->entry_model->get_question_list();           
          $data['questlist'] = $quesresult;
          
           
          //call the model function to get the data
          $projectresult = $this->entry_model->get_project();           
          $data['project'] = $projectresult;
          
          //load the view
          $this->load->view('entry_view',$data);
     }

    function addQues()
    {
        //set validation rules
        $this->form_validation->set_rules('course', 'Course', 'trim|required');
        $this->form_validation->set_rules('ques', 'Question', 'trim|required');
        $this->form_validation->set_rules('op1', 'Option 1', 'trim|required');
        $this->form_validation->set_rules('op2', 'Option 2', 'trim|required');
        $this->form_validation->set_rules('op3', 'Option 3', 'trim|required');
        $this->form_validation->set_rules('op4', 'Option 4', 'trim|required');
        $this->form_validation->set_rules('ans', 'Answer', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('entry_view');
        }
        else
        {
            //insert the user registration details into database
            $data = array(
                'course' => $this->input->post('course'),
                'ques' => $this->input->post('ques'),
                'c1' => $this->input->post('op1'),
                'c2' => $this->input->post('op2'),
                'c3' => $this->input->post('op3'),
                'c4' => $this->input->post('op4'),
                'ans' => $this->input->post('ans')
            );
            
            // insert form data into database
            if ($this->entry_model->insertQues($data))
            {
				redirect('entry');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('entry/addQues');
            }
        }
    }
    
    
   
}
?>
