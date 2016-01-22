<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Tasks_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    function get_tasks() {
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->order_by('id', 'DESC');
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function change_task_status($task_id, $save_data) {
        $this->db->where('id', $task_id);
        $this->db->update('tasks', $save_data);
        
        return true;
    }
    
    function save_task($save_data) {
        $this->db->insert('tasks', $save_data);
        
        return true;
    }
    
    function get_task($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tasks');
        
        return $query->row();
    }
    
    function delete_task($id) {
        $this->db->where('id', $id);
        $this->db->delete('tasks');
        
        return true;
    }
    
    function complete_task($id) {
        $data = array(
            'task_status' => 'done'
        );
        
        $this->db->where('id', $id);
        $this->db->update('tasks', $data);
    }
}