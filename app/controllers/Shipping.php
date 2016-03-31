<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Shipping extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        $this->load->model('Shipping_model');
        $this->load->model('Products_model');
    }
    
    public function index() {
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        $data['shipping'] = $this->Shipping_model->get_shipping('id', 'ASC');
        
        //Load view
        $this->load->view('header', $data);
        $this->load->view('shipping/index');
        $this->load->view('footer');
    }
    
    public function add() {
        //form validation
        $this->form_validation->set_rules('product_id', 'Product ID', 'required|trim|xss_clean');
        $this->form_validation->set_rules('ship_method', 'Ship Method', 'trim|xss_clean');
        $this->form_validation->set_rules('company', 'Company', 'trim|xss_clean');
        $this->form_validation->set_rules('shipping_company', 'Shipping Company', 'trim|xss_clean');
        $this->form_validation->set_rules('tracking_number', 'Tracking #', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_arrival_date', 'Estimated Arrival Date', 'trim|xss_clean');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        $data['products'] = $this->Products_model->get_products();
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('shipping/add');
            $this->load->view('footer');
        } else {
            $data = array(
                'product_id'                => $this->input->post('product_id'),
                'ship_method'               => $this->input->post('ship_method'),
                'company'                   => $this->input->post('company'),
                'shipping_company'          => $this->input->post('shipping_company'),
                'tracking_number'           => $this->input->post('tracking_number'),
                'estimated_arrival_date'    => $this->input->post('estimated_arrival_date'),
                'notes'                     => $this->input->post('notes'),
                'created_modified_by'       => $this->session->userdata('name')
            );
            
            //Insert Shipping
            $this->Shipping_model->insert($data);
            
            //set message
            $this->session->set_flashdata('shipping_saved', 'Shipping Info has been added.');
            
            redirect('shipping');
        }
    }
    
    /**
     * Edit Shipping Info
     * @param int $id
     */
    public function edit($id) {
        //form validation
        $this->form_validation->set_rules('product_id', 'Product ID', 'required|trim|xss_clean');
        $this->form_validation->set_rules('ship_method', 'Ship Method', 'trim|xss_clean');
        $this->form_validation->set_rules('company', 'Company', 'trim|xss_clean');
        $this->form_validation->set_rules('shipping_company', 'Shipping Company', 'trim|xss_clean');
        $this->form_validation->set_rules('tracking_number', 'Tracking #', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_arrival_date', 'Estimated Arrival Date', 'trim|xss_clean');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        $data['products'] = $this->Products_model->get_products();
        $data['shipping'] = $this->Shipping_model->get_shipping_by_id($id);
        
        //var_dump($data['shipping']);die();
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('shipping/edit');
            $this->load->view('footer');
        } else {
            $data = array(
                'product_id'                => $this->input->post('product_id'),
                'ship_method'               => $this->input->post('ship_method'),
                'company'                   => $this->input->post('company'),
                'shipping_company'          => $this->input->post('shipping_company'),
                'tracking_number'           => $this->input->post('tracking_number'),
                'estimated_arrival_date'    => $this->input->post('estimated_arrival_date'),
                'notes'                     => $this->input->post('notes'),
                'created_modified_by'       => $this->session->userdata('name')
            );
            
            //Update Shipping Info
            $this->Shipping_model->update($data, $id);
            
            //set message
            $this->session->set_flashdata('shipping_saved', 'Shipping Info has been updated.');
            
            redirect('shipping');
        }
    }
    
    /**
     * Delete Shipping Info
     * @param int $id
     */
//    public function delete($id) {
//        $this->Shipping_model->delete($id);
//        
//        //set message
//        $this->session->set_flashdata('shipping_deleted', 'Shipping Info has been deleted.');
//        
//        redirect('shipping');
//    }
}
