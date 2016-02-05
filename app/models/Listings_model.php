<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Listings_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all Listings.
     * 
     * @param string $order_by
     * @param string $sort
     * @param int $limit
     * @param int $offset
     * @return array of objects
     */
    public function get_listings($order_by = null, $sort = 'ASC', $limit = null, $offset = 0) {
        $this->db->select('a.*, b.name AS product_name, c.approval_status AS approval');
        $this->db->from('listings AS a');
        $this->db->join('st_products AS b', 'b.id = a.product_id', 'left');
        $this->db->join('approval_status AS c', 'c.id = a.approval_status', 'left');
        
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
     * Get a Listing by it's ID
     * 
     * @param int $id
     * @return object
     */
    public function get_listing_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('listings');
        
        return $query->row();
    }
    
    /**
     * Insert a new Listing.
     * 
     * @param array $data
     * @return boolean
     */
    public function insert($data) {
        $this->db->insert('listings', $data);
        
        return true;
    }
    
    /**
     * Update a Listing.
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('listings', $data);
        
        return true;
    }
    
    /**
     * Delete a Listing.
     * 
     * @param int $id
     * @return boolean
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('listings');
        
        return true;
    }
    
    public function get_listing_for_review($id) {
        $this->db->select('a.*, b.name AS product_name');
        $this->db->where('a.id', $id);
        $this->db->from('listings AS a');
        $this->db->join('st_products AS b', 'b.id = a.product_id', 'left');
        
        $query = $this->db->get();
        
        return $query->row();
    }
}