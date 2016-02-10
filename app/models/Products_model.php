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
    public function get_products($order_by = null, $sort = 'DESC', $limit = null, $offset = 0, $status = null) {
        //$this->db->select('*');
        //$this->db->from('st_products');
        
        $this->db->select('a.*, b.product_status AS product_status, c.confidence_level AS confidence_level');
        $this->db->from('st_products AS a');
        $this->db->join('product_status AS b', 'b.id = a.status', 'left');
        $this->db->join('confidence AS c', 'c.id = a.confidence_level', 'left');
        
        if($limit != null) {
            $this->db->limit($limit, $offset);
        }
        
        if($order_by != null) {
            $this->db->order_by($order_by, $sort);
        }
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_approved_products($order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
        $this->db->select('a.*, b.product_status AS product_status, c.confidence_level AS confidence_level');
        $this->db->from('st_products AS a');
        $this->db->where('a.approval_status = 3');
        $this->db->join('product_status AS b', 'b.id = a.status', 'left');
        $this->db->join('confidence AS c', 'c.id = a.confidence_level', 'left');
        
        if($limit != null) {
            $this->db->limit($limit, $offset);
        }
        
        if($order_by != null) {
            $this->db->order_by($order_by, $sort);
        }
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_pending_products($order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
        $this->db->select('a.*, b.product_status AS product_status, c.confidence_level AS confidence_level');
        $this->db->from('st_products AS a');
        $this->db->where('a.approval_status = 2');
        $this->db->join('product_status AS b', 'b.id = a.status', 'left');
        $this->db->join('confidence AS c', 'c.id = a.confidence_level', 'left');
        
        if($limit != null) {
            $this->db->limit($limit, $offset);
        }
        
        if($order_by != null) {
            $this->db->order_by($order_by, $sort);
        }
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_not_approved_products($order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
        $this->db->select('a.*, b.product_status AS product_status, c.confidence_level AS confidence_level');
        $this->db->from('st_products AS a');
        $this->db->where('a.approval_status = 1');
        $this->db->join('product_status AS b', 'b.id = a.status', 'left');
        $this->db->join('confidence AS c', 'c.id = a.confidence_level', 'left');
        
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
    
    public function get_product_name($id) {
        $this->db->select('name');
        $this->db->from('st_products');
        $this->db->where('id', $id);
        
        $query = $this->db->get();
        
        return $query->row();
    }
    
    public function get_product_id($name) {
        $this->db->select('id');
        $this->db->from('st_products');
        $this->db->where('name', $name);
        
        $query = $this->db->get();
        
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
    
    public function get_product_for_review($id) {
        $this->db->select('a.*, b.product_status AS product_status, c.confidence_level AS confidence_level, d.graphics AS graphics');
        $this->db->where('a.id', $id);
        $this->db->from('st_products AS a');
        $this->db->join('product_status AS b', 'b.id = a.status', 'left');
        $this->db->join('confidence AS c', 'c.id = a.confidence_level', 'left');
        $this->db->join('graphics AS d', 'd.id = a.graphics', 'left');
        
        $query = $this->db->get();
        
        return $query->row();
    }
    
    public function get_manufacturers_for_product($id) {
        $this->db->select('a.*, b.samples_status AS samples_status, c.shipping_terms AS shipping_terms');
        $this->db->from('st_manufacturers AS a');
        $this->db->where('product_id', $id);
        $this->db->join('samples_status AS b', 'b.id = a.samples_status', 'left');
        $this->db->join('shipping_terms AS c', 'c.id = a.shipping_terms', 'left');
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_concepts_for_product($id) {
        $this->db->select('*');
        $this->db->from('concepts');
        $this->db->where('product_id', $id);
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_purchase_orders_for_product($id) {
        $this->db->select('*');
        $this->db->from('po_tracking');
        $this->db->where('product_id', $id);
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_shipping_for_product($id) {
        $this->db->select('*');
        $this->db->from('shipping');
        $this->db->where('product_id', $id);
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_legal_for_product($id) {
        $this->db->select('*');
        $this->db->from('legal');
        $this->db->where('product_id', $id);
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_marketing_for_product($id) {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->where('product_id', $id);
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_listings_for_product($id) {
        $this->db->select('*');
        $this->db->from('listings');
        $this->db->where('product_id', $id);
        
        $query = $this->db->get();
        
        return $query->result();
    }
}
