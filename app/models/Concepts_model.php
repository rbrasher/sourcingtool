<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Concepts_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    } 
    
    /**
     * Get all Concepts.
     * 
     * @param string $order_by
     * @param string $sort
     * @param int $limit
     * @param int $offset
     * @return array of objects
     */
    public function get_concepts($order_by = null, $sort = 'ASC', $limit = null, $offset = 0) {
        $this->db->select('*');
        $this->db->from('concepts');
        
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
     * Get a single Concept.
     * 
     * @param int $id
     * @return object
     */
    public function get_concept($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('concepts');
        
        return $query->row();
    }
    
    /**
     * Insert a new Concept
     * 
     * @param array $data
     * @return boolean
     */
    public function insert($data) {
        $this->db->insert('concepts', $data);
        
        return true;
    }
    
    /**
     * Update a Concept.
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('concepts', $data);
        
        return true;
    }
    
    /**
     * Delete a Concept.
     * 
     * @param int $id
     * @return boolean
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('concepts');
        
        return true;
    }
    
    /**
     * Get Approval Statuses.
     * 
     * @return array of objects
     */
    public function get_approval_statuses() {
        $this->db->select('*');
        $this->db->from('approval_status');
        
        $this->db->order_by('id', 'ASC');
        
        $query = $this->db->get();
        
        return $query->result();
    }
}
