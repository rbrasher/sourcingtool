<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Calendar_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_calendar_products() {
        $today = date('Y-m-d');
        $query = $this->db->query("SELECT id, name AS title, estimated_launch_date AS start FROM `st_products` WHERE `estimated_launch_date` != 0000-00-00 AND `estimated_launch_date` != '' AND `estimated_launch_date` >= '" . $today . "' ORDER BY `estimated_launch_date` ASC");
        
        return $query->result();
    }
    
    public function get_nearest_launch_product() {
        $today = date('Y-m-d');
        //var_dump($today);die();
        $query = $this->db->query("SELECT id, name AS title, estimated_launch_date AS start FROM `st_products` WHERE `estimated_launch_date` != 0000-00-00 AND `estimated_launch_date` != '' AND `estimated_launch_date` >= '" . $today . "' ORDER BY `estimated_launch_date` ASC LIMIT 1");
        
        return $query->row();
    }
    
    public function get_sourcing_due_products() {
        $today = date('Y-m-d');
        $query = $this->db->query("SELECT id, name AS title, sourcing_due_date AS start FROM `st_products` WHERE `sourcing_due_date` != 0000-00-00 AND `sourcing_due_date` != '' AND `sourcing_due_date` >= '" . $today . "' ORDER BY `sourcing_due_date` ASC");
        
        return $query->result();
    }
    
    public function get_expected_ship_date_products() {
        $today = date('Y-m-d');
        $query = $this->db->query("SELECT id, name AS title, expected_ship_date AS start FROM `st_products` WHERE `expected_ship_date` != 0000-00-00 AND `expected_ship_date` != '' AND `expected_ship_date` >= '" . $today . "' ORDER BY `expected_ship_date` ASC");
        
        return $query->result();
    }
    
    public function get_estimated_arrival_date_products() {
        $today = date('Y-m-d');
        $query = $this->db->query("SELECT id, name AS title, estimated_arrival_date AS start FROM `st_products` WHERE `estimated_arrival_date` != 0000-00-00 AND `estimated_arrival_date` != '' AND `estimated_arrival_date` >= '" . $today . "' ORDER BY `estimated_arrival_date` ASC");
        
        return $query->result();
    }
    
    public function get_estimated_date_at_fba_products() {
        $today = date('Y-m-d');
        $query = $this->db->query("SELECT id, name AS title, estimated_date_at_fba AS start FROM `st_products` WHERE `estimated_date_at_fba` != 0000-00-00 AND `estimated_date_at_fba` != '' AND `estimated_date_at_fba` >= '" . $today . "' ORDER BY `estimated_date_at_fba` ASC");
        
        return $query->result();
    }
}
