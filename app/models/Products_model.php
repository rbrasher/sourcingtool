<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Products_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all Products
     * 
     * @param string $order_by
     * @param string $sort
     * @param int $limit
     * @param int $offset
     * @return object
     */
    public function get_products($order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
        $this->db->select('*');
        $this->db->from('st_products');
        
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
     * Get a single product
     * 
     * @param int $id
     * @return object
     */
    public function get_product($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('st_products');
        
        return $query->row();
    }
    
    /**
     * Insert a new product.
     * 
     * @param array $data
     * @return boolean
     */
    public function insert($data) {
        $this->db->insert('st_products', $data);
        
        return true;
    }
    
    /**
     * Update a product
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('st_products', $data);
        
        return true;
    }
    
    /**
     * Delete a product.
     * 
     * @param type $id
     * @return boolean
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('st_products');
        
        return true;
    }
    
    public function get_graphics() {
        $query = $this->db->query('SELECT * FROM graphics ORDER BY `id` ASC');
        
        return $query->result();
    }
    
    public function get_confidence() {
        $query = $this->db->query('SELECT * FROM confidence ORDER BY `id` ASC');
        
        return $query->result();
    }
    
    public function get_products_status() {
        $query = $this->db->query('SELECT * FROM product_status ORDER BY `id` ASC');
        
        return $query->result();
    }
}
