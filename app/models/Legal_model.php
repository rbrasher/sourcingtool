<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Legal_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all Legal.
     * 
     * @param string $order_by
     * @param string $sort
     * @param int $limit
     * @param int $offset
     * @return array of objects
     */
    public function get_legal($order_by = null, $sort = 'ASC', $limit = null, $offset = 0) {
        $this->db->select('a.*, b.name AS product_name');
        $this->db->from('legal AS a');
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
     * Get Legal Info by ID.
     * 
     * @param int $id
     * @return object
     */
    public function get_legal_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('legal');
        
        return $query->row();
    }
    
    /**
     * Insert new Legal
     * 
     * @param array $data
     * @return boolean
     */
    public function insert($data) {
        $this->db->insert('legal', $data);
        
        return true;
    }
    
    /**
     * Update Legal Info
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('legal', $data);
        
        return true;
    }
    
    /**
     * Delete Legal Info.
     * 
     * @param int $id
     * @return boolean
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('legal');
        
        return true;
    }
}
