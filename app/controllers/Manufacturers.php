<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Manufacturers extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Manufacturers_model');
        $this->load->model('Products_model');
        
//        if(!$this->session->userdata('logged_in')) {
//            redirect('authenticate/login');
//        }
    }
    
    /**
     * All Manufacturers
     */
    public function index() {
        $data['manufacturers'] = $this->Manufacturers_model->get_manufacturers('id', 'ASC');
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        //
        //Load view
        $this->load->view('header', $data);
        $this->load->view('manufacturers/index');
        $this->load->view('footer');
    }
    
    /**
     * Add a manufacturer.
     */
    public function add() {
        //validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('product_id', 'Product ID', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|valid_email|xss_clean');
        $this->form_validation->set_rules('contact_info', 'Contact Info', 'trim|xss_clean');
        $this->form_validation->set_rules('owner', 'Owner', 'trim|xss_clean');
        $this->form_validation->set_rules('total_price', 'Total Price', 'trim|xss_clean');
        $this->form_validation->set_rules('price_per_item', 'Price Per Item', 'trim|xss_clean');
        $this->form_validation->set_rules('qty_per_package', 'Quantity Per Package', 'trim|xss_clean');
        $this->form_validation->set_rules('moq', 'MOQ', 'trim|xss_clean');
        $this->form_validation->set_rules('lead_time_in_days', 'Lead Time In Days', 'trim|xss_clean');
        $this->form_validation->set_rules('samples_status', 'Samples Status', 'trim|xss_clean');
        $this->form_validation->set_rules('shipping_terms', 'Shipping Terms', 'trim|xss_clean');
        
        $data['samples_status'] = $this->Manufacturers_model->get_samples_status('id', 'ASC');
        $data['shipping_terms'] = $this->Manufacturers_model->get_shipping_terms('id', 'ASC');
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('manufacturers/add');
            $this->load->view('footer');
        } else {
            $data = array(
                'name'              => $this->input->post('name'),
                'product_id'        => $this->input->post('product_id'),
                'email_address'     => $this->input->post('email_address'),
                'contact_info'      => $this->input->post('contact_info'),
                'owner'             => $this->input->post('owner'),
                'total_price'       => $this->input->post('total_price'),
                'price_per_item'    => $this->input->post('price_per_item'),
                'qty_per_package'   => $this->input->post('qty_per_package'),
                'moq'               => $this->input->post('moq'),
                'lead_time_in_days' => $this->input->post('lead_time_in_days'),
                'samples_status'    => $this->input->post('samples_status'),
                'shipping_terms'    => $this->input->post('shipping_terms')
            );
            
            //Insert new manufacturer
            $this->Manufacturers_model->insert($data);
            
            //set message
            $this->session->set_flashdata('manufacturer_saved', 'Manufacturer added successfully');
            
            redirect('manufacturers');
        }
    }
    
    /**
     * Edit a manufacturer.
     * 
     * @param int $id
     */
    public function edit($id) {
        //validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('product_id', 'Product ID', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|valid_email|xss_clean');
        $this->form_validation->set_rules('contact_info', 'Contact Info', 'trim|xss_clean');
        $this->form_validation->set_rules('owner', 'Owner', 'trim|xss_clean');
        $this->form_validation->set_rules('total_price', 'Total Price', 'trim|xss_clean');
        $this->form_validation->set_rules('price_per_item', 'Price Per Item', 'trim|xss_clean');
        $this->form_validation->set_rules('qty_per_package', 'Quantity Per Package', 'trim|xss_clean');
        $this->form_validation->set_rules('moq', 'MOQ', 'trim|xss_clean');
        $this->form_validation->set_rules('lead_time_in_days', 'Lead Time In Days', 'trim|xss_clean');
        $this->form_validation->set_rules('samples_status', 'Samples Status', 'trim|xss_clean');
        $this->form_validation->set_rules('shipping_terms', 'Shipping Terms', 'trim|xss_clean');
        
        $data['manufacturer'] = $this->Manufacturers_model->get_manufacturer($id);
        $data['samples_status'] = $this->Manufacturers_model->get_samples_status('id', 'ASC');
        $data['shipping_terms'] = $this->Manufacturers_model->get_shipping_terms('id', 'ASC');
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('manufacturers/edit');
            $this->load->view('footer');
        } else {
            $data = array(
                'name'              => $this->input->post('name'),
                'product_id'        => $this->input->post('product_id'),
                'email_address'     => $this->input->post('email_address'),
                'contact_info'      => $this->input->post('contact_info'),
                'owner'             => $this->input->post('owner'),
                'total_price'       => $this->input->post('total_price'),
                'price_per_item'    => $this->input->post('price_per_item'),
                'qty_per_package'   => $this->input->post('qty_per_package'),
                'moq'               => $this->input->post('moq'),
                'lead_time_in_days' => $this->input->post('lead_time_in_days'),
                'samples_status'    => $this->input->post('samples_status'),
                'shipping_terms'    => $this->input->post('shipping_terms')
            );
            
            //Update manufacturer
            $this->Manufacturers_model->update($data, $id);
            
            //Set message
            $this->session->set_flashdata('manufacturer_saved', 'Manufacturer has been updated.');
            
            redirect('manufacturers');
        }
    }
    
    /**
     * Delete a manufacturer.
     * 
     * @param int $id
     */
    public function delete($id) {
        $this->Manufacturers_model->delete($id);
        
        //set message
        $this->session->set_flashdata('manufacturer_deleted', 'Manufacturer deleted successfully.');
        
        redirect('manufacturers');
    }
}
