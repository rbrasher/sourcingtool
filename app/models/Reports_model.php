<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Reports_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_products() {
        
        //this joins maunfacturers into products
        //
//        $this->db->select('a.*, d.name AS manufacturer_name, d.email_address, d.contact_info, d.owner, d.total_price AS manufacturer_total_price, d.price_per_item, d.qty_per_package, d.moq, d.lead_time_in_days, d.samples_status, d.shipping_terms, b.product_status AS product_status, c.confidence_level AS confidence, e.samples_status as samples_status, f.shipping_terms as shipping_terms, g.graphics as graphics');
//        $this->db->from('st_products AS a');
//        $this->db->join('st_manufacturers as d', 'd.product_id = a.id', 'left');
//        $this->db->join('product_status AS b', 'b.id = a.status', 'left');
//        $this->db->join('graphics as g', 'g.id = a.graphics', 'left');
//        $this->db->join('confidence AS c', 'c.id = a.confidence_level', 'left');
//        $this->db->join('samples_status AS e', 'e.id = d.samples_status', 'left');
//        $this->db->join('shipping_terms AS f', 'f.id = d.shipping_terms', 'left');
        
        //this just gets products and related table keys for products
        $this->db->select('a.*, b.product_status AS product_status, c.confidence_level AS confidence, g.graphics as graphics');
        $this->db->from('st_products AS a');
        $this->db->join('product_status AS b', 'b.id = a.status', 'left');
        $this->db->join('graphics as g', 'g.id = a.graphics', 'left');
        $this->db->join('confidence AS c', 'c.id = a.confidence_level', 'left');
        
        $query = $this->db->get();
        
        return $query->result();
        
    }
    
    public function get_manufacturers() {
        $this->db->select('a.*, b.samples_status AS samples_status, c.shipping_terms AS shipping_terms');
        $this->db->from('st_manufacturers AS a');
        $this->db->join('samples_status as b', 'b.id = a.samples_status', 'left');
        $this->db->join('shipping_terms as c', 'c.id = a.shipping_terms', 'left');
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
}