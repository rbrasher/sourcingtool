<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Products extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
        
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
    }
    
    /**
     * All products.
     */
    public function index() {
        $data['products'] = $this->Products_model->get_products('id', 'DESC');
        
        //load view
        $this->load->view('header', $data);
        $this->load->view('products/index');
        $this->load->view('footer');
    }
    
    /**
     * Add a product.
     */
    public function add() {
        //validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|xss_clean');
        $this->form_validation->set_rules('qty_per_package', 'Qty Per Package', 'trim|xss_clean');
        $this->form_validation->set_rules('graphics', 'Graphics', 'trim|xss_clean');
        $this->form_validation->set_rules('packaging', 'Packaging', 'trim|xss_clean');
        $this->form_validation->set_rules('confidence_level', 'Confidence Level', 'trim|xss_clean');
        $this->form_validation->set_rules('best_bsr', 'Best BSR', 'trim|xss_clean');
        $this->form_validation->set_rules('top_3_avg_bsr', 'Top 3 Avg BSR', 'trim|xss_clean');
        $this->form_validation->set_rules('top_10_avg_bsr', 'Top 10 Avg BSR', 'trim|xss_clean');
        $this->form_validation->set_rules('target_price', 'Target Price', 'trim|xss_clean');
        $this->form_validation->set_rules('fba_fee_est', 'FBA Fee Est', 'trim|xss_clean');
        $this->form_validation->set_rules('margin_per_sale', 'Margin Per Sale', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_sales_per_day', 'Estimated Sales Per Day', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_margin_per_month', 'Estimated Margin Per Month', 'trim|xss_clean');
        $this->form_validation->set_rules('date_of_deposit', 'Date of Deposit', 'trim|xss_clean');
        $this->form_validation->set_rules('qty_ordered', 'Qty Ordered', 'trim|xss_clean');
        $this->form_validation->set_rules('expected_ship_date', 'Expected Ship Date', 'trim|xss_clean');
        $this->form_validation->set_rules('ship_method', 'Ship Method', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_arrival_date', 'Estimated Arrival Date', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_date_at_fba', 'Estimated Date at FBA', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_launch_date', 'Estimated Launch Date', 'trim|xss_clean');
        $this->form_validation->set_rules('competitor_price_example', 'Competitor Price Example', 'trim|xss_clean');
        $this->form_validation->set_rules('competitor_qty_example', 'Competitor Qty Example', 'trim|xss_clean');
        $this->form_validation->set_rules('marketing_hook', 'Marketing Hook', 'trim|xss_clean');
        
        $data['graphics'] = $this->Products_model->get_graphics();
        $data['confidence'] = $this->Products_model->get_confidence();
        $data['product_status'] = $this->Products_model->get_products_status();
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('products/add');
            $this->load->view('footer');
        } else {
            $data = array(
                'name'                  => $this->input->post('name'),
                'status'                => $this->input->post('status'),
                'qty_per_package'       => $this->input->post('qty_per_package'),
                'graphics'              => $this->input->post('graphics'),
                'packaging'             => $this->input->post('packaging'),
                'confidence_level'      => $this->input->post('confidence_level'),
                'best_bsr'              => $this->input->post('best_bsr'),
                'top_3_avg_bsr'         => $this->input->post('top_3_avg_bsr'),
                'top_10_avg_bsr'        => $this->input->post('top_10_avg_bsr'),
                'target_price'          => $this->input->post('target_price'),
                'fba_fee_est'           => $this->input->post('fba_fee_est'),
                'margin_per_sale'       => $this->input->post('margin_per_sale'),
                'estimated_sales_per_day'   => $this->input->post('estimated_sales_per_day'),
                'estimated_margin_per_month'    => $this->input->post('estimated_margin_per_month'),
                'date_of_deposit'               => $this->input->post('date_of_deposit'),
                'qty_ordered'                   => $this->input->post('qty_ordered'),
                'expected_ship_date'            => $this->input->post('expected_ship_date'),
                'ship_method'                   => $this->input->post('ship_method'),
                'estimated_arrival_date'        => $this->input->post('estimated_arrival_date'),
                'estimated_date_at_fba'         => $this->input->post('estimated_date_at_fba'),
                'estimated_launch_date'         => $this->input->post('estimated_launch_date'),
                'competitor_price_example'      => $this->input->post('competitor_price_example'),
                'competitor_qty_example'        => $this->input->post('competitor_qty_example'),
                'marketing_hook'                => $this->input->post('marketing_hook')
            );
            
            //add product
            $this->Products_model->insert($data);
            
            //set message
            $this->session->set_flashdata('product_saved', 'Product added successfully.');
            
            redirect('products');
        }
    }
    
    /**
     * Edit a product
     * 
     * @param int $id
     */
    public function edit($id) {
        //validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|xss_clean');
        $this->form_validation->set_rules('qty_per_package', 'Qty Per Package', 'trim|xss_clean');
        $this->form_validation->set_rules('graphics', 'Graphics', 'trim|xss_clean');
        $this->form_validation->set_rules('packaging', 'Packaging', 'trim|xss_clean');
        $this->form_validation->set_rules('confidence_level', 'Confidence Level', 'trim|xss_clean');
        $this->form_validation->set_rules('best_bsr', 'Best BSR', 'trim|xss_clean');
        $this->form_validation->set_rules('top_3_avg_bsr', 'Top 3 Avg BSR', 'trim|xss_clean');
        $this->form_validation->set_rules('top_10_avg_bsr', 'Top 10 Avg BSR', 'trim|xss_clean');
        $this->form_validation->set_rules('target_price', 'Target Price', 'trim|xss_clean');
        $this->form_validation->set_rules('fba_fee_est', 'FBA Fee Est', 'trim|xss_clean');
        $this->form_validation->set_rules('margin_per_sale', 'Margin Per Sale', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_sales_per_day', 'Estimated Sales Per Day', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_margin_per_month', 'Estimated Margin Per Month', 'trim|xss_clean');
        $this->form_validation->set_rules('date_of_deposit', 'Date of Deposit', 'trim|xss_clean');
        $this->form_validation->set_rules('qty_ordered', 'Qty Ordered', 'trim|xss_clean');
        $this->form_validation->set_rules('expected_ship_date', 'Expected Ship Date', 'trim|xss_clean');
        $this->form_validation->set_rules('ship_method', 'Ship Method', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_arrival_date', 'Estimated Arrival Date', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_date_at_fba', 'Estimated Date at FBA', 'trim|xss_clean');
        $this->form_validation->set_rules('estimated_launch_date', 'Estimated Launch Date', 'trim|xss_clean');
        $this->form_validation->set_rules('competitor_price_example', 'Competitor Price Example', 'trim|xss_clean');
        $this->form_validation->set_rules('competitor_qty_example', 'Competitor Qty Example', 'trim|xss_clean');
        $this->form_validation->set_rules('marketing_hook', 'Marketing Hook', 'trim|xss_clean');
        
        $data['product'] = $this->Products_model->get_product($id);
        $data['graphics'] = $this->Products_model->get_graphics();
        $data['confidence'] = $this->Products_model->get_confidence();
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('products/edit');
            $this->load->view('footer');
        } else {
            $data = array(
                'name'                          => $this->input->post('name'),
                'status'                        => $this->input->post('status'),
                'qty_per_package'               => $this->input->post('qty_per_package'),
                'graphics'                      => $this->input->post('graphics'),
                'packaging'                     => $this->input->post('packaging'),
                'confidence_level'              => $this->input->post('confidence_level'),
                'best_bsr'                      => $this->input->post('best_bsr'),
                'top_3_avg_bsr'                 => $this->input->post('top_3_avg_bsr'),
                'top_10_avg_bsr'                => $this->input->post('top_10_avg_bsr'),
                'target_price'                  => $this->input->post('target_price'),
                'fba_fee_est'                   => $this->input->post('fba_fee_est'),
                'margin_per_sale'               => $this->input->post('margin_per_sale'),
                'estimated_sales_per_day'       => $this->input->post('estimated_sales_per_day'),
                'estimated_margin_per_month'    => $this->input->post('estimated_margin_per_month'),
                'date_of_deposit'               => $this->input->post('date_of_deposit'),
                'qty_ordered'                   => $this->input->post('qty_ordered'),
                'expected_ship_date'            => $this->input->post('expected_ship_date'),
                'ship_method'                   => $this->input->post('ship_method'),
                'estimated_arrival_date'        => $this->input->post('estimated_arrival_date'),
                'estimated_date_at_fba'         => $this->input->post('estimated_date_at_fba'),
                'estimated_launch_date'         => $this->input->post('estimated_launch_date'),
                'competitor_price_example'      => $this->input->post('competitor_price_example'),
                'competitor_qty_example'        => $this->input->post('competitor_qty_example'),
                'marketing_hook'                => $this->input->post('marketing_hook')
            );
            
            //update product
            $this->Products_model->update($data, $id);
            
            //set message
            $this->session->set_flashdata('product_saved', 'Product updated successfully');
            
            redirect('products');
        }
    }
    
    /**
     * Delete a product.
     * 
     * @param int $id
     */
    public function delete($id) {
        $this->Products_model->delete($id);
        
        //set message
        $this->session->set_flashdata('product_deleted', 'Product deleted successfully.');
        
        redirect('products');
    }
}