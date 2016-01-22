<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Report extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Products_model');
        $this->load->model('Manufacturers_model');
        $this->load->model('Reports_model');
    }
    
    public function index() {
        $data['products'] = $this->Reports_model->get_products();
        $data['manufacturers'] = $this->Reports_model->get_manufacturers();
        
        //var_dump($data['products']);die();
        //
        //Load view
        $this->load->view('report/header', $data);
        //$this->load->view('report/test');
        $this->load->view('report/index');
        $this->load->view('report/footer');
    }
}