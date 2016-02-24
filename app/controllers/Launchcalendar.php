<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Launchcalendar extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        //load models
        $this->load->model('Calendar_model');
    }
    
    public function index() {
        $events = $this->Calendar_model->get_calendar_products();
        $data['next_launch_product'] = $this->Calendar_model->get_nearest_launch_product();
        $sourcing_due_products = $this->Calendar_model->get_sourcing_due_products();
        $expected_ship_products = $this->Calendar_model->get_expected_ship_date_products();
        $expected_arrival_products = $this->Calendar_model->get_estimated_arrival_date_products();
        $estimated_fba_products = $this->Calendar_model->get_estimated_date_at_fba_products();
        
        foreach($events as $event) {
            $event->color = 'green';
        }
        
        foreach($sourcing_due_products as $sourcing_due_product) {
            $sourcing_due_product->color = '#000';
        }
        
        foreach($expected_ship_products as $expected_ship_product) {
            $expected_ship_product->color = '#c36a0a';
        }
        
        foreach($expected_arrival_products as $expected_arrival_product) {
            $expected_arrival_product->color = '#8d0ac3';
        }
        
        foreach($estimated_fba_products as $estimated_fba_product) {
            $estimated_fba_product->color = 'blue';
        }
        
        $events = array_merge($events, $sourcing_due_products);
        $events = array_merge($events, $expected_ship_products);
        $events = array_merge($events, $expected_arrival_products);
        $events = array_merge($events, $estimated_fba_products);
        $data['events'] = $events;
        
        //load view
        $this->load->view('launch_calendar/index', $data);
    }
    
}

