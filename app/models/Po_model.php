<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Po_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all Purchase Orders.
     * 
     * @param string $order_by
     * @param string $sort
     * @param int $limit
     * @param int $offset
     * @return array of objects
     */
    public function get_purchase_orders($order_by = null, $sort = 'ASC', $limit = null, $offset = 0) {
        $this->db->select('*');
        $this->db->from('po_tracking');
        
        //will probably need to join a po_status table with this one
        //$this->db->select('a.*, b.name AS product_name');
        //$this->db->from('st_manufacturers AS a');
        //$this->db->join('st_products AS b', 'b.id = a.product_id', 'left');
        
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
     * Get a single purchase order.
     * 
     * @param int $id
     * @return object
     */
    public function get_purchase_order($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('po_tracking');
        
        return $query->row();
    }
    
    /**
     * Insert a new purchase order.
     * 
     * @param array $data
     * @return boolean
     */
    public function insert($data) {
        $this->db->insert('po_tracking', $data);
        
        return true;
    }
    
    /**
     * Update a purchase order.
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('po_tracking', $data);
        
        return true;
    }
    
    /**
     * Delete a purchase order.
     * 
     * @param int $id
     * @return boolean
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('po_tracking');
        
        return true;
    }
}
