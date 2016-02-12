<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Calendar_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_calendar_products() {
        $query = $this->db->query("SELECT id, name AS title, estimated_launch_date AS start FROM `st_products` WHERE `estimated_launch_date` != 0000-00-00 AND `estimated_launch_date` != '' ORDER BY `estimated_launch_date` ASC");
        
        return $query->result();
    }
}
