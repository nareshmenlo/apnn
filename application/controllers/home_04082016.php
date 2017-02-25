<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Home extends CI_Controller {

    public function index()
    {
        $this->load->model('home_model');
        $data['flash'] = $this->home_model->getAll('flash');
        $data['latestupdates'] = $this->home_model->getAll('latest');
        $data['political'] = $this->home_model->getAll('political');
        $data['editorchoice'] = $this->home_model->getAll('editor_choice');
        $data['moviereviews'] = $this->home_model->getAll('movie_reviews');
        $data['cinema'] = $this->home_model->getAll('cinema');
        $title['title'] = "APNN News Portal";
        $this->load->view('header',$title);
        $this->load->view('home',$data);
        $this->load->view('sidebar');
        $this->load->view('footer');
    }

        public function contactus(){
                //set validation rules
                $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|callback_alpha_space_only');
                $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
                $this->form_validation->set_rules('phone', 'Phone number', 'trim|required|xss_clean');
                $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
                $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

                //run validation on form input
                if ($this->form_validation->run() == FALSE)
                {
                    //validation fails
                        $title['title'] = "Aayudham : Contact Us";
                                        $this->load->view('header',$title);

                    $this->load->view('contact_form_view');
                                $this->load->view('footer');

                }
                else
                {
                   $ToEmail = 'APNN@gmail.com'; 
                    $EmailSubject = 'APNN News contact form : '.$_POST["subject"]; 
                    $mailheader = "From: ".$_POST["email"]."\r\n"; 
                    $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
                    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    $MESSAGE_BODY = "Name: ".$_POST["name"]."<br>"; 
                    $MESSAGE_BODY .= "Email: ".$_POST["email"]."<br>"; 
                    $MESSAGE_BODY .= "Phone: ".$_POST["phone"]."<br>"; 
                    $MESSAGE_BODY .= "Subject: ".$_POST["subject"]."<br>"; 
                    $MESSAGE_BODY .= "Message: ".nl2br($_POST["message"])."<br>"; 
                    if (mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader)){
                        // mail sent
                        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
                        redirect('home/contactus');
                    }else{
                        //error

                        print_r($this->email->print_debugger());exit;
                        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
                        redirect('home/contactus');
                    }
                }
        }

         //custom validation function to accept only alphabets and space input
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}