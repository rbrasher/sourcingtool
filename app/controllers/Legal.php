<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Legal extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        $this->load->model('Legal_model');
        $this->load->model('Products_model');
    }
    
    public function index() {
        $data['legal'] = $this->Legal_model->get_legal('id', 'ASC');
        
        //load view
        $this->load->view('header', $data);
        $this->load->view('legal/index');
        $this->load->view('footer');
    }
    
    public function add() {
        //validation rules
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('box_pc', 'Box PC', 'trim|xss_clean');
        $this->form_validation->set_rules('llc', 'LLC', 'trim|xss_clean');
        $this->form_validation->set_rules('credit_card', 'Credit Card', 'trim|xss_clean');
        $this->form_validation->set_rules('bank_account', 'bank_account', 'trim|xss_clean');
        $this->form_validation->set_rules('amazon_account', 'Amazon Account', 'trim|xss_clean');
        $this->form_validation->set_rules('special_conditions', 'Special Conditions', 'trim|xss_clean');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|xss_clean');
        
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('legal/add');
            $this->load->view('footer');
        } else {
            $data = array(
                'product_id'            => $this->input->post('product_id'),
                'box_pc'                => $this->input->post('box_pc'),
                'llc'                   => $this->input->post('llc'),
                'credit_card'           => $this->input->post('credit_card'),
                'bank_account'          => $this->input->post('bank_account'),
                'amazon_account'        => $this->input->post('amazon_account'),
                'special_conditions'    => $this->input->post('special_conditions'),
                'phone_number'          => $this->input->post('phone_number'),
                'created_modified_by'   => $this->session->userdata('name')
            );

            //Insert Legal Info
            $this->Legal_model->insert($data);
            
            //set message
            $this->session->set_flashdata('legal_saved', 'Legal Info has been saved.');
            
            redirect('legal');
        }
    }
    
    public function edit($id) {
        //validation rules
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('box_pc', 'Box PC', 'trim|xss_clean');
        $this->form_validation->set_rules('llc', 'LLC', 'trim|xss_clean');
        $this->form_validation->set_rules('credit_card', 'Credit Card', 'trim|xss_clean');
        $this->form_validation->set_rules('bank_account', 'bank_account', 'trim|xss_clean');
        $this->form_validation->set_rules('amazon_account', 'Amazon Account', 'trim|xss_clean');
        $this->form_validation->set_rules('special_conditions', 'Special Conditions', 'trim|xss_clean');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|xss_clean');
        
        $data['legal'] = $this->Legal_model->get_legal_by_id($id);
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('legal/edit');
            $this->load->view('footer');
        } else {
            $data = array(
                'product_id'            => $this->input->post('product_id'),
                'box_pc'                => $this->input->post('box_pc'),
                'llc'                   => $this->input->post('llc'),
                'credit_card'           => $this->input->post('credit_card'),
                'bank_account'          => $this->input->post('bank_account'),
                'amazon_account'        => $this->input->post('amazon_account'),
                'special_conditions'    => $this->input->post('special_conditions'),
                'phone_number'          => $this->input->post('phone_number'),
                'created_modified_by'   => $this->session->userdata('name')
            );

            //Update Legal Info
            $this->Legal_model->update($data, $id);
            
            //set message
            $this->session->set_flashdata('legal_saved', 'Legal Info has been updated.');
            
            redirect('legal');
        }
    }
    
//    public function delete($id) {
//        $this->Legal_model->delete($id);
//        
//        //set message
//        $this->session->set_flashdata('legal_deleted', 'Legal Info has been deleted.');
//        
//        redirect('legal');
//    }
}