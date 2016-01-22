<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Main extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Tasks_model');
//        if(!$this->session->userdata('logged_in')) {
//            redirect('authenticate/login');
//        }
    }
    
    public function index() {
        $data['tasks'] = $this->Tasks_model->get_tasks();
        
        $this->load->view('header', $data);
        $this->load->view('main');
        $this->load->view('footer');
    }
    
    
}
