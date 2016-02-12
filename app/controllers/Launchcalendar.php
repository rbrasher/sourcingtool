<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Launchcalendar extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        //load models
        $this->load->model('Calendar_model');
    }
    
    public function index() {
        //$data['events'] = $this->Calendar_model->get_calendar_products();
        $data['events'] = $this->Calendar_model->get_calendar_products();
        
        //load view
        $this->load->view('launch_calendar/index', $data);
    }
    
}

