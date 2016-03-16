<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
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
    
    
    
    
}