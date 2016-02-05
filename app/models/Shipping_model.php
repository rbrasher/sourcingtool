<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Shipping_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all Shipping Info.
     * 
     * @param string $order_by
     * @param string $sort
     * @param int $limit
     * @param int $offset
     * @return type array of objects
     */
    public function get_shipping($order_by = null, $sort = 'ASC', $limit = null, $offset = 0) {
        //$this->db->select('*');
        //$this->db->from('shipping');
        $this->db->select('a.*, b.name AS product_name');
        $this->db->from('shipping AS a');
        $this->db->join('st_products As b', 'b.id = a.product_id', 'left');
        
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
     * Get Shipping Info by ID
     * 
     * @param int $id
     * @return object
     */
    public function get_shipping_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('shipping');
        
        return $query->row();
    }
    
    /**
     * Insert new Shipping Info
     * @param array $data
     * @return boolean
     */
    public function insert($data) {
        $this->db->insert('shipping', $data);
        
        return true;
    }
    
    /**
     * Update Shipping Info.
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('shipping', $data);
        
        return true;
    }
    
    /**
     * Delete Shipping Info.
     * 
     * @param int $id
     * @return boolean
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('shipping');
        
        return true;
    }
}
