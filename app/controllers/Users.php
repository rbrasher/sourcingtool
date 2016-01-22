<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        
//        if(!$this->session->userdata('logged_in')) {
//            redirect('authenticate/login');
//        }
    }
    
    /***
     * All Users
     */
    public function index() {
        $data['users'] = $this->User_model->get_users('id', 'DESC');
        
        //Load view
        $this->load->view('header', $data);
        $this->load->view('users/index');
        $this->load->view('footer');
    }
    
    
    /**
     * Add a user
     */
    public function add() {
        //validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header');
            $this->load->view('users/add');
            $this->load->view('footer');
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'email'         => $this->input->post('email'),
                'password'      => md5($this->input->post('password'))
            );
            
            //Insert new user
            $this->User_model->insert($data);
            
            //Set message
            $this->session->set_flashdata('user_saved', 'User added successfully');
            
            redirect('users');
        }
    }
    
    /**
     * Edit a User
     * 
     * @param int $id
     */
    public function edit($id) {
        //validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
        
        $data['user'] = $this->User_model->get_user($id);
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('users/edit');
            $this->load->view('footer');
        } else {
            $data = array(
                'first_name'        => $this->input->post('first_name'),
                'last_name'         => $this->input->post('last_name'),
                'email'             => $this->input->post('email'),
                'password'          => md5($this->input->post('password'))
            );
            
            //Update user
            $this->User_model->update($data, $id);
            
            //Set message
            $this->session->set_flashdata('user_saved', 'User updated successfully');
            
            redirect('users');
        }
    }
    
    /**
     * Delete a user.
     * 
     * @param int $id
     */
    public function delete($id) {
        $this->User_model->delete($id);
        
        //Set message
        $this->session->set_flashdata('user_deleted', 'User deleted successfully');
        
        redirect('users');
    }
    
}