<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Authenticate_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login_user($email, $password) {
        //Secure password
        $enc_password = md5($password);
        
        //Validate
        $this->db->where('email', $email);
        $this->db->where('password', $enc_password);
        
        $result = $this->db->get('users');
        
        if($result->num_rows() == 1) {
            return $result->row();
        } else {
            return false;
        }
    }
}
