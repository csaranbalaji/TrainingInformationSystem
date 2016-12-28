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
    
    function index()
    {
        $this->register();
    }

    function register()
    {
        //set validation rules
        $this->form_validation->set_rules('sid', 'ID', 'trim|required');
        $this->form_validation->set_rules('s1', 'Mark 1', 'trim|required');
        $this->form_validation->set_rules('s2', 'Mark 2', 'trim|required');
        $this->form_validation->set_rules('s3', 'Mark 3', 'trim|required');
        $this->form_validation->set_rules('s4', 'Mark 4', 'trim|required');
        
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
                'id' => $this->input->post('sid'),
                's1' => $this->input->post('s1'),
                's2' => $this->input->post('s2'),
                's3' => $this->input->post('s3'),
                's4' => $this->input->post('s4')
            );
            
            // insert form data into database
            if ($this->entry_model->insertUser($data))
            {
				redirect('entry');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('entry/register');
            }
        }
    }
    
    function post()
    {
        //set validation rules
        $this->form_validation->set_rules('class', 'Class', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('ques', 'Question', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            echo nl2br("\n <div class='alert alert-danger' align='center'><strong>Failed!</strong> Please Check the Respective Tab.</div>");
            $this->load->view('entry_view');
        }
        else
        {
            //insert the user registration details into database
            $data = array(
                'class' => $this->input->post('class'),
                'subject' => $this->input->post('subject'),
                'question' => $this->input->post('ques')
            );
            
            // insert form data into database
            if ($this->entry_model->insertQues($data))
            {
				echo nl2br("\n <div class='alert alert-success' align='center'><strong>Success!</strong> Data Has Been Entered Successfully.</div>");
				redirect('entry');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('entry/post');
            }
        }
    }
    
    public function do_upload() { 
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png|doc|pdf|html'; 
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('myfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            echo nl2br("\n <div class='alert alert-danger' align='center'><strong>Failed!</strong> Please Check the Respective Tab.</div>");
            $this->load->view('entry_view'); 
         }
			
         else { 
             
            $fileData = $this->upload->data();
            $myfile = array(
                    'filename' => $fileData['file_name'],
                    'modified' => date("Y-m-d")
                    );
            if($this->entry_model->upload($myfile))
            {
				echo nl2br("\n <div class='alert alert-success' align='center'><strong>Success!</strong> File Has Been Uploaded Successfully.</div>");
				$this->load->view('entry_view'); 
            }
         } 
      } 
   
}
?>
