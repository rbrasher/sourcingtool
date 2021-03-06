<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Manufacturers_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all manufacturers.
     * 
     * @param string $order_by
     * @param string $sort
     * @param int $limit
     * @param int $offset
     * @return array of objects
     */
    public function get_manufacturers($order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
//        $this->db->select('*');
//        $this->db->from('st_manufacturers');
        
        $this->db->select('a.*, b.name AS product_name');
        $this->db->from('st_manufacturers AS a');
        $this->db->join('st_products AS b', 'b.id = a.product_id', 'left');
        
        if($limit != null) {
            $this->db->limit($limit, $offset);
        }
        
        if($order_by != null) {
            $this->db->order_by($order_by, $sort);
        }
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * Get a single manufacturer.
     * 
     * @param int $id
     * @return object
     */
    public function get_manufacturer($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('st_manufacturers');
        
        return $query->row();
    }
    
    public function get_manufacturers_for_product($product_id) {
        $this->db->select('a.*, b.samples_status AS samples_status, c.shipping_terms AS shipping_terms');
        $this->db->where('product_id', $product_id);
        $this->db->from('st_manufacturers AS a');
        $this->db->join('samples_status AS b', 'b.id = a.samples_status', 'left');
        $this->db->join('shipping_terms AS c', 'c.id = a.shipping_terms', 'left');
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * Insert a new manufacturer.
     * 
     * @param array $data
     * @return boolean
     */
    public function insert($data) {
        $this->db->insert('st_manufacturers', $data);
        
        return true;
    }
    
    /**
     * Update a manufacturer.
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('st_manufacturers', $data);
        
        return true;
    }
    
    /**
     * Delete a manufacturer.
     * 
     * @param int $id
     * @return boolean
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('st_manufacturers');
        
        return true;
    }
    
    public function get_samples_status($order_by = null, $sort = 'DESC') {
        $this->db->select('*');
        $this->db->from('samples_status');
        
        if($order_by != null) {
            $this->db->order_by($order_by, $sort);
        }
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_shipping_terms($order_by = null, $sort = 'DESC') {
        $this->db->select('*');
        $this->db->from('shipping_terms');
        
        if($order_by != null) {
            $this->db->order_by($order_by, $sort);
        }
        
        $query = $this->db->get();
        
        return $query->result();
    }
}