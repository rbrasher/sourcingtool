<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Products extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        $this->load->model('Products_model');
        $this->load->model('Manufacturers_model');
        $this->load->model('Concepts_model');
        $this->load->model('Listings_model');
    }
    
    /**
     * All products.
     */
    public function index() {
        //$data['products'] = $this->Products_model->get_products('id', 'ASC');
        $data['products'] = $this->Products_model->get_not_approved_products('id', 'ASC');
        $data['pending_products'] = $this->Products_model->get_pending_products('id', 'ASC');
        $data['not_viable_products'] = $this->Products_model->get_not_viable_products('id', 'ASC');
        $data['manufacturers'] = $this->Manufacturers_model->get_manufacturers('product_id', 'ASC');
        //load view
        $this->load->view('header', $data);
        $this->load->view('products/index');
        $this->load->view('footer');
    }
    
    public function production() {
        $data['approved_products'] = $this->Products_model->get_approved_products('id', 'ASC');
        $data['manufacturers'] = $this->Manufacturers_model->get_manufacturers('product_id', 'ASC');
        
        //load view
        $this->load->view('header', $data);
        $this->load->view('products/production');
        $this->load->view('footer');
    }
    
    /**
     * Add a product.
     */
    public function add() {
        //validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|xss_clean');
        $this->form_validation->set_rules('quantity_per_package', 'Quantity Per Package', 'trim|xss_clean');
        $this->form_validation->set_rules('total_price', 'Total Price', 'trim|xss_clean');
        $this->form_validation->set_rules('item_price', 'Item Price', 'trim|xss_clean');
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
        $this->form_validation->set_rules('competitor_price_example', 'Competitor Price Example', 'trim|xss_clean');
        $this->form_validation->set_rules('competitor_qty_example', 'Competitor Qty Example', 'trim|xss_clean');
        $this->form_validation->set_rules('marketing_hook', 'Marketing Hook', 'trim|xss_clean');
        $this->form_validation->set_rules('competitor_link', 'Competitor Link', 'trim|xss_clean');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', 'trim|xss_clean|min_length[3]');
        $this->form_validation->set_rules('sourcing_due_date', 'Sourcing Due Date', 'trim|xss_clean');
        
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
                'name'                          => $this->input->post('name'),
                'status'                        => $this->input->post('status'),
                'quantity_per_package'          => $this->input->post('quantity_per_package'),
                'total_price'                   => $this->input->post('total_price'),
                'item_price'                    => $this->input->post('item_price'),
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
                'competitor_price_example'      => $this->input->post('competitor_price_example'),
                'competitor_qty_example'        => $this->input->post('competitor_qty_example'),
                'mktg_hook'                     => $this->input->post('marketing_hook'),
                'competitor_link'               => $this->input->post('competitor_link'),
                'assigned_to'                   => $this->input->post('assigned_to'),
                'sourcing_due_date'             => $this->input->post('sourcing_due_date'),
                'created_modified_by'           => $this->session->userdata('name')
            );
            
            //add product
            $this->Products_model->insert($data);
            
            $p = $this->Products_model->get_product_id($data['name']);
            
            $to = 'quinn@innitech.com';
            $subject = 'New Product Added';
            $message = ucwords($data['name']) . ' was added into the Sourcing Tool. <a href="http://healing-reviews.org/sourcingtool/products/edit/' . $p->id . '" target="_blank">View Product</a>';
            $additional_headers = "From: Sourcing Tool\r\n";
            
            mail($to, $subject, $message, $additional_headers);
            
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
        $this->form_validation->set_rules('quantity_per_package', 'Quantity Per Package', 'trim|xss_clean');
        $this->form_validation->set_rules('total_price', 'Total Price', 'trim|xss_clean');
        $this->form_validation->set_rules('item_price', 'Item Price', 'trim|xss_clean');
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
        $this->form_validation->set_rules('competitor_price_example', 'Competitor Price Example', 'trim|xss_clean');
        $this->form_validation->set_rules('competitor_qty_example', 'Competitor Qty Example', 'trim|xss_clean');
        $this->form_validation->set_rules('marketing_hook', 'Marketing Hook', 'trim|xss_clean');
        $this->form_validation->set_rules('competitor_link', 'Competitor Link', 'trim|xss_clean');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', 'trim|xss_clean|min_length[3]');
        $this->form_validation->set_rules('sourcing_due_date', 'Sourcing Due Date', 'trim|xss_clean');
        
        $data['product'] = $this->Products_model->get_product($id);
        $data['graphics'] = $this->Products_model->get_graphics();
        $data['confidence'] = $this->Products_model->get_confidence();
        $data['product_status'] = $this->Products_model->get_products_status();
        
        $data['samples_status'] = $this->Manufacturers_model->get_samples_status('id', 'ASC');
        $data['shipping_terms'] = $this->Manufacturers_model->get_shipping_terms('id', 'ASC');
        $data['manufacturers'] = $this->Manufacturers_model->get_manufacturers_for_product($id);
        $data['concepts'] = $this->Products_model->get_concepts_for_product($id);
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('products/edit');
            $this->load->view('footer');
        } else {
            $data = array(
                'name'                              => $this->input->post('name'),
                'status'                            => $this->input->post('status'),
                'quantity_per_package'              => $this->input->post('quantity_per_package'),
                'total_price'                       => $this->input->post('total_price'),
                'item_price'                        => $this->input->post('item_price'),
                'packaging'                         => $this->input->post('packaging'),
                'confidence_level'                  => $this->input->post('confidence_level'),
                'best_bsr'                          => $this->input->post('best_bsr'),
                'top_3_avg_bsr'                     => $this->input->post('top_3_avg_bsr'),
                'top_10_avg_bsr'                    => $this->input->post('top_10_avg_bsr'),
                'target_price'                      => $this->input->post('target_price'),
                'fba_fee_est'                       => $this->input->post('fba_fee_est'),
                'margin_per_sale'                   => $this->input->post('margin_per_sale'),
                'estimated_sales_per_day'           => $this->input->post('estimated_sales_per_day'),
                'estimated_margin_per_month'        => str_replace(',', '', $this->input->post('estimated_margin_per_month')),
                'competitor_price_example'          => $this->input->post('competitor_price_example'),
                'competitor_qty_example'            => $this->input->post('competitor_qty_example'),
                'mktg_hook'                         => $this->input->post('marketing_hook'),
                'competitor_link'                   => $this->input->post('competitor_link'),
                'assigned_to'                       => $this->input->post('assigned_to'),
                'sourcing_due_date'                 => $this->input->post('sourcing_due_date'),
                'created_modified_by'               => $this->session->userdata('name')
            );
            
            //update product
            $this->Products_model->update($data, $id);
            
            //set message
            $this->session->set_flashdata('product_saved', 'Product updated successfully');
            
            redirect('products');
        }
    }
    
    /**
     * Edit a production product
     * 
     * @param int $id
     */
    public function edit_production($id) {
        //validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|xss_clean');
        $this->form_validation->set_rules('quantity_per_package', 'Quantity Per Package', 'trim|xss_clean');
        $this->form_validation->set_rules('total_price', 'Total Price', 'trim|xss_clean');
        $this->form_validation->set_rules('item_price', 'Item Price', 'trim|xss_clean');
        $this->form_validation->set_rules('graphics', 'Graphics', 'trim|xss_clean');
        $this->form_validation->set_rules('packaging', 'Packaging', 'trim|xss_clean');
        $this->form_validation->set_rules('confidence_level', 'Confidence Level', 'trim|xss_clean');
        //$this->form_validation->set_rules('best_bsr', 'Best BSR', 'trim|xss_clean');
        //$this->form_validation->set_rules('top_3_avg_bsr', 'Top 3 Avg BSR', 'trim|xss_clean');
        //$this->form_validation->set_rules('top_10_avg_bsr', 'Top 10 Avg BSR', 'trim|xss_clean');
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
        //$this->form_validation->set_rules('competitor_price_example', 'Competitor Price Example', 'trim|xss_clean');
        //$this->form_validation->set_rules('competitor_qty_example', 'Competitor Qty Example', 'trim|xss_clean');
        //$this->form_validation->set_rules('marketing_hook', 'Marketing Hook', 'trim|xss_clean');
        //$this->form_validation->set_rules('competitor_link', 'Competitor Link', 'trim|xss_clean');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', 'trim|xss_clean|min_length[3]');
        //$this->form_validation->set_rules('sourcing_due_date', 'Sourcing Due Date', 'trim|xss_clean');
        
        $data['product'] = $this->Products_model->get_product($id);
        $data['graphics'] = $this->Products_model->get_graphics();
        $data['confidence'] = $this->Products_model->get_confidence();
        $data['product_status'] = $this->Products_model->get_products_status();
        
        $data['samples_status'] = $this->Manufacturers_model->get_samples_status('id', 'ASC');
        $data['shipping_terms'] = $this->Manufacturers_model->get_shipping_terms('id', 'ASC');
        $data['manufacturers'] = $this->Manufacturers_model->get_manufacturers_for_product($id);
        
        $data['concepts'] = $this->Products_model->get_concepts_for_product($id);
        $data['purchase_orders'] = $this->Products_model->get_purchase_orders_for_product($id);
        $data['shipping'] = $this->Products_model->get_shipping_for_product($id);
        $data['legal'] = $this->Products_model->get_legal_for_product($id);
        $data['marketing'] = $this->Products_model->get_marketing_for_product($id);
        $data['listings'] = $this->Products_model->get_listings_for_product($id);
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('products/edit_production');
            $this->load->view('footer');
        } else {
            $data = array(
                'name'                              => $this->input->post('name'),
                'status'                            => $this->input->post('status'),
                'quantity_per_package'              => $this->input->post('quantity_per_package'),
                'total_price'                       => $this->input->post('total_price'),
                'item_price'                        => $this->input->post('item_price'),
                'graphics'                          => $this->input->post('graphics'),
                'packaging'                         => $this->input->post('packaging'),
                'confidence_level'                  => $this->input->post('confidence_level'),
                //'best_bsr'                          => $this->input->post('best_bsr'),
                //'top_3_avg_bsr'                     => $this->input->post('top_3_avg_bsr'),
                //'top_10_avg_bsr'                    => $this->input->post('top_10_avg_bsr'),
                'target_price'                      => $this->input->post('target_price'),
                'fba_fee_est'                       => $this->input->post('fba_fee_est'),
                'margin_per_sale'                   => $this->input->post('margin_per_sale'),
                'estimated_sales_per_day'           => $this->input->post('estimated_sales_per_day'),
                'estimated_margin_per_month'        => str_replace(',', '', $this->input->post('estimated_margin_per_month')),
                'date_of_deposit'                   => $this->input->post('date_of_deposit'),
                'qty_ordered'                       => $this->input->post('qty_ordered'),
                'expected_ship_date'                => $this->input->post('expected_ship_date'),
                'ship_method'                       => $this->input->post('ship_method'),
                'estimated_arrival_date'            => $this->input->post('estimated_arrival_date'),
                'estimated_date_at_fba'             => $this->input->post('estimated_date_at_fba'),
                'estimated_launch_date'             => $this->input->post('estimated_launch_date'),
                //'competitor_price_example'          => $this->input->post('competitor_price_example'),
                //'competitor_qty_example'            => $this->input->post('competitor_qty_example'),
                //'mktg_hook'                         => $this->input->post('marketing_hook'),
                //'competitor_link'                   => $this->input->post('competitor_link'),
                'assigned_to'                       => $this->input->post('assigned_to'),
                //'sourcing_due_date'                 => $this->input->post('sourcing_due_date'),
                'created_modified_by'               => $this->session->userdata('name')
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
        $product = $this->Products_model->get_product($id);
        
        if($product->approval_status != 3 && $product->approval_status != 2) {
            $this->Products_model->delete($id);
            
            //set message
            $this->session->set_flashdata('product_deleted', 'Product deleted successfully.');

            redirect('products');
            
        } else {
            //set message
            $this->session->set_flashdata('product_delete_error', 'Products in Production cannot be deleted. Please see Ron to delete this Product.');

            redirect('products');
        }
    }
    
    public function review($id) {
        $data = array(
            'approval_status' => 2
        );
        
        $this->Products_model->update($data, $id);
        
        $data['product'] = $this->Products_model->get_product_for_review($id);
        $data['manufacturers'] = $this->Products_model->get_manufacturers_for_product($id);
                
        //load view
        $this->load->view('review/header', $data);
        $this->load->view('review/product');
        $this->load->view('review/footer');
    }
    
    public function approve($id) {
        $data = array(
            'approval_status' => 3
        );
        
        $this->Products_model->update($data, $id);
        
        //set message
        $this->session->set_flashdata('product_approved', 'Product is Approved');
        
        redirect('products');
    }
    
    public function unapprove($id) {
        $data = array(
            'approval_status' => 1
        );
        
        $this->Products_model->update($data, $id);
        
        //set message
        $this->session->set_flashdata('product_rejected', 'Product is Unapproved');
        
        redirect('products');
    }
    
    public function add_manufacturer_from_product($id) {
        $config['upload_path'] = './documents/brochures/';
        $config['allowed_types'] = 'jpg|png|ai|pdf|xls|doc|xlsx|docx';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        if(strlen($_FILES['userfile']['name']) > 0) {
            //upload brochure
            if(!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading your document.');

                redirect('products/edit/' . $id);
            } else {
                $file_data = $this->upload->data();

                $brochure = $file_data['file_name'];
            }
        } else {
            $brochure = '';
        }
        
        //does another manufacturer exist for this product?
        $manufacturers = $this->Products_model->get_manufacturers_for_product($id);
        $product = $this->Products_model->get_product($id);
        
        if(!$manufacturers) {
            
            $margin_per_sale = $this->calculate_margin($product->target_price, $product->fba_fee_est, $this->input->post('total_price'));
            $estimated_margin_per_month = $this->calculate_monthly_margin($margin_per_sale, $product->estimated_sales_per_day);
            
            $product_data = array(
                'status'                        => 2,
                'quantity_per_package'          => $this->input->post('qty_per_package'),
                'total_price'                   => $this->input->post('total_price'),
                'item_price'                    => $this->input->post('price_per_item'),
                'margin_per_sale'               => $margin_per_sale,
                'estimated_margin_per_month'    => $estimated_margin_per_month
            );

            $this->Products_model->update($product_data, $id);
        }
        
        $data = array(
            'name'                  => $this->input->post('manufacturer_name'),
            'product_id'            => $this->input->post('product_id'),
            'email_address'         => $this->input->post('email_address'),
            'contact_info'          => $this->input->post('contact_info'),
            'owner'                 => $this->input->post('owner'),
            'total_price'           => $this->input->post('total_price'),
            'price_per_item'        => $this->input->post('price_per_item'),
            'qty_per_package'       => $this->input->post('qty_per_package'),
            'moq'                   => $this->input->post('moq'),
            'lead_time_in_days'     => $this->input->post('lead_time_in_days'),
            'samples_status'        => $this->input->post('samples_status'),
            'shipping_terms'        => $this->input->post('shipping_terms'),
            'notes'                 => $this->input->post('notes'),
            'brochure'              => $brochure,
            'created_modified_by'   => $this->session->userdata('name')
        );

        //Insert new manufacturer
        $this->Manufacturers_model->insert($data);

        //set message
        $this->session->set_flashdata('manufacturer_saved', 'Manufacturer added successfully.');

        redirect('products/edit/'. $id);
    }
    
    public function add_manufacturer_from_production_product($id) {
        $config['upload_path'] = './documents/brochures/';
        $config['allowed_types'] = 'jpg|png|ai|pdf|xls|doc|xlsx|docx';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        if(strlen($_FILES['userfile']['name']) > 0) {
            //upload brochure
            if(!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading your document.');

                redirect('products/edit_production/' . $id);
            } else {
                $file_data = $this->upload->data();

                $brochure = $file_data['file_name'];
            }
        } else {
            $brochure = '';
        }
        
        //does another manufacturer exist for this product?
        $manufacturers = $this->Products_model->get_manufacturers_for_product($id);
        $product = $this->Products_model->get_product($id);
        
        if(!$manufacturers) {
            
            $margin_per_sale = $this->calculate_margin($product->target_price, $product->fba_fee_est, $this->input->post('total_price'));
            $estimated_margin_per_month = $this->calculate_monthly_margin($margin_per_sale, $product->estimated_sales_per_day);
            
            $product_data = array(
                'status'                        => 2,
                'quantity_per_package'          => $this->input->post('qty_per_package'),
                'total_price'                   => $this->input->post('total_price'),
                'item_price'                    => $this->input->post('price_per_item'),
                'margin_per_sale'               => $margin_per_sale,
                'estimated_margin_per_month'    => $estimated_margin_per_month
            );

            $this->Products_model->update($product_data, $id);
        }

        $data = array(
            'name'                  => $this->input->post('manufacturer_name'),
            'product_id'            => $this->input->post('product_id'),
            'email_address'         => $this->input->post('email_address'),
            'contact_info'          => $this->input->post('contact_info'),
            'owner'                 => $this->input->post('owner'),
            'total_price'           => $this->input->post('total_price'),
            'price_per_item'        => $this->input->post('price_per_item'),
            'qty_per_package'       => $this->input->post('qty_per_package'),
            'moq'                   => $this->input->post('moq'),
            'lead_time_in_days'     => $this->input->post('lead_time_in_days'),
            'samples_status'        => $this->input->post('samples_status'),
            'shipping_terms'        => $this->input->post('shipping_terms'),
            'notes'                 => $this->input->post('notes'),
            'brochure'              => $brochure,
            'created_modified_by'   => $this->session->userdata('name')
        );

        //Insert new manufacturer
        $this->Manufacturers_model->insert($data);

        //set message
        $this->session->set_flashdata('manufacturer_saved', 'Manufacturer added successfully.');

        redirect('products/edit_production/'. $id);
    }
    
    public function add_bulk_manufacturer($id) {
        
        if(isset($_POST['changes']) && $_POST['changes']) {

            //var_dump($_POST['changes']);die();
        } elseif (isset($_POST['data']) && $_POST['data']) {
            //when posting, we should end up here
            $manufacturers = $_POST['data'];
            
            foreach($manufacturers as $manufacturer) :

                if(isset($manufacturer[0]) && $manufacturer[0] !== '') {
                    $data = array(
                        'product_id'        => $id,
                        'name'              => $manufacturer[0],
                        'email_address'     => $manufacturer[1],
                        'contact_info'      => $manufacturer[2],
                        'owner'             => $this->session->userdata('name'),
                        'total_price'       => $manufacturer[3],
                        'price_per_item'    => $manufacturer[4],
                        'qty_per_package'   => $manufacturer[5],
                        'moq'               => $manufacturer[6],
                        'lead_time_in_days' => $manufacturer[7],
                        'created_modified_by'   => $this->session->userdata('name')
                    );

                    $this->Manufacturers_model->insert($data);
                }
            endforeach;

            $out = array(
                'result' => 'ok'
            );
            echo json_encode($out);
        }
    }
    
    public function set_as_primary_manufacturer($product_id, $manufacturer_id) {
        $manufacturers = $this->Products_model->get_manufacturers_for_product($product_id);
        
        if($manufacturers) {
            //clear out all other primary manufacturers
            foreach($manufacturers as $manufacturer) {
                if($manufacturer->is_primary == 1) {
                    $data = array(
                        'is_primary' => 0
                    );
                    
                    $this->Manufacturers_model->update($data, $manufacturer->id);
                }
            }
        }
        
        $product = $this->Products_model->get_product($product_id);
        $manufacturer = $this->Manufacturers_model->get_manufacturer($manufacturer_id);
        
        $margin_per_sale = $this->calculate_margin($product->target_price, $product->fba_fee_est, $manufacturer->total_price);
        $estimated_margin_per_month = $this->calculate_monthly_margin($margin_per_sale, $product->estimated_sales_per_day);
        
        if($product->status < 4) {
            $status = 4;
        } else {
            $status = $product->status;
        }
        
        $product_data = array(
            'status'                        => $status,
            'quantity_per_package'          => $manufacturer->qty_per_package,
            'total_price'                   => $manufacturer->total_price,
            'item_price'                    => $manufacturer->price_per_item,
            'margin_per_sale'               => $margin_per_sale,
            'estimated_margin_per_month'    => $estimated_margin_per_month
        );
        
        $this->Products_model->update($product_data, $product_id);
        
        $data = array(
            'is_primary' => 1
        );
        
        $this->Manufacturers_model->update($data, $manufacturer_id);
        
        redirect('products/edit/' . $product_id);
    }
    
    //this is no longer used
    /*
    public function remove_as_primary_manufacturer($product_id, $manufacturer_id) {
        $data = array(
            'is_primary' => 0
        );
        
        $this->Manufacturers_model->update($data, $manufacturer_id);
        
        redirect('products/edit/' . $product_id);
    }
    */
    
    public function set_as_primary_production_manufacturer($product_id, $manufacturer_id) {
        $manufacturers = $this->Products_model->get_manufacturers_for_product($product_id);
        
        if($manufacturers) {
            //clear out all other primary manufacturers
            foreach($manufacturers as $manufacturer) {
                if($manufacturer->is_primary == 1) {
                    $data = array(
                        'is_primary' => 0
                    );
                    
                    $this->Manufacturers_model->update($data, $manufacturer->id);
                }
            }
        }
        
        $product = $this->Products_model->get_product($product_id);
        $manufacturer = $this->Manufacturers_model->get_manufacturer($manufacturer_id);
        
        $margin_per_sale = $this->calculate_margin($product->target_price, $product->fba_fee_est, $manufacturer->total_price);
        $estimated_margin_per_month = $this->calculate_monthly_margin($margin_per_sale, $product->estimated_sales_per_day);
        
        if($product->status < 4) {
            $status = 4;
        } else {
            $status = $product->status;
        }
        
        $product_data = array(
            'status'                        => $status,
            'quantity_per_package'          => $manufacturer->qty_per_package,
            'total_price'                   => $manufacturer->total_price,
            'item_price'                    => $manufacturer->price_per_item,
            'margin_per_sale'               => $margin_per_sale,
            'estimated_margin_per_month'    => $estimated_margin_per_month
        );
        
        $this->Products_model->update($product_data, $product_id);
        
        $data = array(
            'is_primary' => 1
        );
        
        $this->Manufacturers_model->update($data, $manufacturer_id);
        
        redirect('products/edit_production/' . $product_id);
    }
    
    //this is no longer used
    /*
    public function remove_as_primary_production_manufacturer($product_id, $manufacturer_id) {
        $data = array(
            'is_primary' => 0
        );
        
        $this->Manufacturers_model->update($data, $manufacturer_id);
        
        redirect('products/edit_production/' . $product_id);
    }
     * 
     */
    
    public function add_concept_from_product($id) {
        $config['upload_path'] = './documents/concepts/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        
        if(strlen($_FILES['userfile1']['name']) > 0) {
            //upload instruction manual
            if(!$this->upload->do_upload('userfile1')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading the Instruction Manual.');

                redirect('products/edit/'. $id);
            } else {
                $file_data = $this->upload->data();

                $instruction_manual = $file_data['file_name'];
            }
        } else {
            $instruction_manual = '';
        }
        
        if(strlen($_FILES['userfile2']['name']) > 0) {
            //upload product design
            if(!$this->upload->do_upload('userfile2')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading the Product Design.');

                redirect('products/edit/' . $id);
            } else {
                $file_data = $this->upload->data();

                $product_design = $file_data['file_name'];
            }
        } else {
            $product_design = '';
        }
        
        $data = array(
            'product_id'            => $this->input->post('product_id'),
            'listing_mock'          => $this->input->post('listing_mock'),
            'box_art_work'          => $this->input->post('box_art_work'),
            'instruction_manual'    => $instruction_manual,
            'product_design'        => $product_design,
            'brand'                 => $this->input->post('brand'),
            'upc'                   => $this->input->post('upc'),
            'domain'                => $this->input->post('domain'),
            'notes'                 => $this->input->post('notes'),
            'created_modified_by'   => $this->session->userdata('name')
        );
        
        //Insert new concept
        $this->Concepts_model->insert($data);
        
        //set message
        $this->session->set_flashdata('concept_saved', 'New Concept added successfully.');
        
        redirect('products/edit/'. $id);
    }
    
    public function approve_concept($product_id, $concept_id) {
        $data = array(
            'listing_mock'      => 3,
            'box_art_work'      => 3,
            'approval_status'   => 3
        );
        
        $this->Concepts_model->update($data, $concept_id);
        
        //set message
        $this->session->set_flashdata('concept_approved', 'Concept is Approved');
        
        redirect('products/edit/' . $product_id);
    }
    
    public function unapprove_concept($product_id, $concept_id) {
        $data = array(
            'listing_mock'      => 1,
            'box_art_work'      => 1,
            'approval_status'   => 1
        );
        
        $this->Concepts_model->update($data, $concept_id);
        
        //set message
        $this->session->set_flashdata('concept_rejected', 'Concept is Unapproved');
        
        redirect('products/edit/' . $product_id);
    }
    
    public function add_listing_for_production_product($id) {
        //process form uploads
        $config['upload_path'] = './documents/listings/listing_images/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->load->library('zip');
        
        if($_FILES) {
            //upload listing images
            if(strlen($_FILES['main_image']['name']) > 0) {
                if(!$this->upload->do_upload('main_image')) {
                    $this->session->set_flashdata('upload_error', 'There was an error uploading the Listing Image.');

                    redirect('listings/add');
                } else {
                    $file_data = $this->upload->data();

                    $listing_image = $file_data['file_name']; 
                }
            } else {
                $listing_image = '';
            }

            if(strlen($_FILES['sec_image_1']['name']) > 0) {
                if(!$this->upload->do_upload('sec_image_1')) {
                    $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 1');

                    redirect('listings/add');
                } else {
                    $file_data = $this->upload->data();

                    $sec_image_1 = $file_data['file_name'];
                }
            } else {
                $sec_image_1 = '';
            }

            if(strlen($_FILES['sec_image_2']['name']) > 0) {
                if(!$this->upload->do_upload('sec_image_2')) {
                    $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 2');
                    redirect('listings/add');
                } else {
                    $file_data = $this->upload->data();

                    $sec_image_2 = $file_data['file_name'];
                }
            } else {
                $sec_image_2 = '';
            }

            if(strlen($_FILES['sec_image_3']['name']) > 0) {
                if(!$this->upload->do_upload('sec_image_3')) {
                    $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 3');
                    redirect('listings/add');
                } else {
                    $file_data = $this->upload->data();

                    $sec_image_3 = $file_data['file_name'];
                }
            } else {
                $sec_image_3 = '';
            }

            if(strlen($_FILES['sec_image_4']['name']) > 0) {
                if(!$this->upload->do_upload('sec_image_4')) {
                    $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 4');
                    redirect('listings/add');
                } else {
                    $file_data = $this->upload->data();

                    $sec_image_4 = $file_data['file_name'];
                }
            } else {
                $sec_image_4 = '';
            }

            if(strlen($_FILES['sec_image_5']['name']) > 0) {
                if(!$this->upload->do_upload('sec_image_5')) {
                    $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 5');
                    redirect('listings/add');
                } else {
                    $file_data = $this->upload->data();

                    $sec_image_5 = $file_data['file_name'];
                }
            } else {
                $sec_image_5 = '';
            }

            if(strlen($_FILES['sec_image_6']['name']) > 0) {
                if(!$this->upload->do_upload('sec_image_6')) {
                    $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 6');
                    redirect('listings/add');
                } else {
                    $file_data = $this->upload->data();

                    $sec_image_6 = $file_data['file_name'];
                }
            } else {
                $sec_image_6 = '';
            }

            $zip_name = $this->input->post('product_id') . '_listing_images.zip';

            $zip_data = array(
                $listing_image  => $this->zip->read_file($config['upload_path'] . $listing_image),
                $sec_image_1    => $this->zip->read_file($config['upload_path'] . $sec_image_1),
                $sec_image_2    => $this->zip->read_file($config['upload_path'] . $sec_image_2),
                $sec_image_3    => $this->zip->read_file($config['upload_path'] . $sec_image_3),
                $sec_image_4    => $this->zip->read_file($config['upload_path'] . $sec_image_4),
                $sec_image_5    => $this->zip->read_file($config['upload_path'] . $sec_image_5),
                $sec_image_6    => $this->zip->read_file($config['upload_path'] . $sec_image_6)
            );

            $this->zip->add_data($zip_data);
            $this->zip->archive($config['upload_path'] . $zip_name);
        } else {
            $zip_name = '';
        }
        
        $data = array(
            'product_id'            => $this->input->post('product_id'),
            'title'                 => $this->input->post('title'),
            'brand'                 => $this->input->post('brand'),
            'price'                 => $this->input->post('price'),
            'sale_price'            => $this->input->post('sale_price'),
            'bullet_1'              => $this->input->post('bullet_1'),
            'bullet_2'              => $this->input->post('bullet_2'),
            'bullet_3'              => $this->input->post('bullet_3'),
            'bullet_4'              => $this->input->post('bullet_4'),
            'bullet_5'              => $this->input->post('bullet_5'),
            'listing_image'         => $listing_image,
            'sec_image_1'           => $sec_image_1,
            'sec_image_2'           => $sec_image_2,
            'sec_image_3'           => $sec_image_3,
            'sec_image_4'           => $sec_image_4,
            'sec_image_5'           => $sec_image_5,
            'sec_image_6'           => $sec_image_6,
            'zip_file'              => $zip_name,
            'credibility_site'      => $this->input->post('credibility_site'),
            'created_modified_by'   => $this->session->userdata('name')
        );
        
        //Insert new Listing
        $this->Listings_model->insert($data);
        
        //set message
        $this->session->set_flashdata('listing_added', 'Listing added successfully');
        
        redirect('products/edit_production/' . $id);
    }
    
    public static function calculate_margin($target_price, $fba_fee_est, $total_price) {
        $margin = (($target_price - $fba_fee_est) - $total_price);
        
        return $margin;
    }
    
    public static function calculate_monthly_margin($margin_per_sale, $est_sales_per_day) {
        $estimated_margin_per_month = ($margin_per_sale * $est_sales_per_day) * 30;
        return $estimated_margin_per_month;
    }
}