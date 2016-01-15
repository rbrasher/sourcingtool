<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all users.
     * 
     * @param string $order_by
     * @param string $sort
     * @param int $limit
     * @param int $offset
     */
    public function get_users($order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
        $this->db->select('*');
        $this->db->from('users');
        
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
     * Get a single user
     * 
     * @param int $id
     */
    public function get_user($id) {
       $this->db->where('id', $id);
       $query = $this->db->get('users');
       
       return $query->row();
    }
    
    /**
     * Insert a User
     * @param array $data
     * @return boolean
     */
    public function insert($data) {
        $this->db->insert('users', $data);
        
        return true;
    }
    
    /**
     * Update a user
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        
        return true;
    }
    
    /**
     * Delete a user.
     * 
     * @param int $id
     * @return boolean
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
        
        return true;
    }
}
