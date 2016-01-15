<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Authenticate extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Authenticate_model');
    }
    
    public function login() {
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            //Load view
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            //Validate
            $user_id = $this->Authenticate_model->login_user($email, $password);
            
            if($user_id) {
                $user_data = array(
                    'user_id'   => $user_id,
                    'email'     => $email,
                    'logged_in' => true
                );
                
                //set session userdata
                $this->session->set_userdata($user_data);
                
                //Set message
                $this->session->set_flashdata('pass_login', 'Logged in successfully');
                
                redirect('main');
            } else {
                $this->session->set_flashdata('fail_login', 'Invalid Email or Password');
                redirect('authenticate/login');
            }
        }
    }
    
    public function logout() {
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        
        //set message
        $this->session->set_flashdata('logged_out', 'You have successfully logged out.');
        
        redirect('authenticate/login');
    }
}