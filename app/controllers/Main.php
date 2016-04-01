<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Main extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        $this->load->model('Products_model');
        
    }
    
    public function index() {
        $start_date = date('Y-m-d');
        $end_date = $this->add_days($start_date, 30);

        $data['production_count'] = $this->Products_model->get_production_count();
        $data['rd_count'] = $this->Products_model->get_rd_count();
        $data['launch_count'] = $this->Products_model->get_launch_count($start_date, $end_date);
        $data['est_margin'] = $this->Products_model->get_estimated_monthly_margins();
        
        $this->load->view('header', $data);
        $this->load->view('main');
        $this->load->view('footer');
    }
    
    public function add_days($my_date,$numdays) {
        $date_t = strtotime($my_date.' UTC');
        return gmdate('Y-m-d',$date_t + ($numdays*86400));
    } 
    
    
}
