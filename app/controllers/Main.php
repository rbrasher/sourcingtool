<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Main extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
    }
    
    public function index() {
        
        $this->load->view('header');
        $this->load->view('main');
        $this->load->view('footer');
    }
    
    
}
