<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Tasks extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        $this->load->helper('string');
        $this->load->model('Tasks_model');
    }
    
    public function index() {
        $data['tasks'] = $this->Tasks_model->get_tasks();
        
        //Load View
        $this->load->view('header', $data);
        $this->load->view('tasks/index');
        $this->load->view('footer');
    }
    
    public function add() {
        $this->form_validation->set_rules('task_desc', 'Task Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('task_owner', 'Task Owner', 'trim|xss_clean');
        $this->form_validation->set_rules('task_due_date', 'Due Date', 'trim|xss_clean');
        $this->form_validation->set_rules('task_status', 'Task Status', 'trim|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            
            //Load View
            $this->load->view('header');
            $this->load->view('tasks/add');
            $this->load->view('footer');
        } else {
            $data = array(
                'task_owner'        => $this->input->post('task_owner'),
                'task_desc'         => $this->input->post('task_desc'),
                'task_due_date'     => $this->input->post('task_due_date'),
                'task_status'       => $this->input->post('task_status')
            );
            
            //add task
            $this->Tasks_model->save_task($data);
            
            //set message
            $this->session->set_flashdata('task_saved', 'Task created successfully.');
            
            redirect('tasks');
        }
    }
    
    public function edit($id) {
        $this->form_validation->set_rules('task_desc', 'Task Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('task_owner', 'Task Owner', 'trim|xss_clean');
        $this->form_validation->set_rules('task_due_date', 'Due Date', 'trim|xss_clean');
        $this->form_validation->set_rules('task_status', 'Task Status', 'trim|xss_clean');
        
        $data['task'] = $this->Tasks_model->get_task($id);
        if($this->form_validation->run() == FALSE) {
            //Load View
            $this->load->view('header', $data);
            $this->load->view('tasks/edit');
            $this->load->view('footer');
        } else {
            $data = array(
                'task_owner'        => $this->input->post('task_owner'),
                'task_desc'         => $this->input->post('task_desc'),
                'task_due_date'     => $this->input->post('task_due_date'),
                'task_status'       => $this->input->post('task_status')
            );
            //update task
            $this->Tasks_model->change_task_status($id, $data);
            
            //set message
            $this->session->set_flashdata('task_saved', 'Task updated successfully');
            
            redirect('tasks');
        }
    }
    
    public function delete($id) {
        $this->Tasks_model->delete_task($id);
        
        //set message
        $this->session->set_flashdata('task_deleted', 'Task deleted successfully.');
        
        redirect('tasks');
    }
    
    public function complete($id) {
        $this->Tasks_model->complete_task($id);
        
        //set message
        $this->session->set_flashdata('task_completed', 'Task completed.');
        
        redirect('tasks');
    }
}
