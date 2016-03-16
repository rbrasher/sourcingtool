<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Po extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')) {
            redirect('authentication/login');
        }
        
        $this->load->model('Po_model');
        $this->load->model('Products_model');
    }
    
    public function index() {
        $data['pos'] = $this->Po_model->get_purchase_orders();
        
        //Load View
        $this->load->view('header', $data);
        $this->load->view('purchase_orders/index');
        $this->load->view('footer');
    }
    
    /**
     * Add a purchase order.
     */
    public function add() {
        //validation rules
        $this->form_validation->set_rules('product_id', 'Select a Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('product', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('po_status_id', 'PO Status', 'trim|xss_clean');
        $this->form_validation->set_rules('po', 'PO #', 'required|trim|xss_clean');
        $this->form_validation->set_rules('po_amount', 'PO Amount', 'trim|xss_clean');
        $this->form_validation->set_rules('price_unit_sea', 'Price Unit Sea', 'trim|xss_clean');
        $this->form_validation->set_rules('price_unit_air', 'Price Unit Air', 'trim|xss_clean');
        $this->form_validation->set_rules('pi', 'PI', 'trim|xss_clean');
        $this->form_validation->set_rules('po_date', 'PO Date', 'trim|xss_clean');
        $this->form_validation->set_rules('po_qty', 'PO Qty', 'trim|xss_clean');
        $this->form_validation->set_rules('deposit_date_30', 'Deposit Date 30', 'trim|xss_clean');
        $this->form_validation->set_rules('ship1_qty', 'Ship 1 Qty', 'trim|xss_clean');
        $this->form_validation->set_rules('ship1_method_id', 'Ship 1 Method', 'trim|xss_clean');
        $this->form_validation->set_rules('ship1_plan_ship_date', 'Ship 1 Plan Ship Date', 'trim|xss_clean');
        $this->form_validation->set_rules('ship1_actual_ship_date', 'Ship 1 Actual Ship Date', 'trim|xss_clean');
        
        $this->form_validation->set_rules('ship2_qty', 'Ship 2 Qty', 'trim|xss_clean');
        $this->form_validation->set_rules('ship2_method_id', 'Ship 2 Method', 'trim|xss_clean');
        $this->form_validation->set_rules('ship2_plan_ship_date', 'Ship 2 Plan Ship Date', 'trim|xss_clean');
        $this->form_validation->set_rules('ship2_actual_ship_date', 'Ship 2 Actual Ship Date', 'trim|xss_clean');
        
        $this->form_validation->set_rules('ship3_qty', 'Ship 3 Qty', 'trim|xss_clean');
        $this->form_validation->set_rules('ship3_method_id', 'Ship 3 Method', 'trim|xss_clean');
        $this->form_validation->set_rules('ship3_plan_ship_date', 'Ship 3 Plan Ship Date', 'trim|xss_clean');
        $this->form_validation->set_rules('ship3_actual_ship_date', 'Ship 3 Actual Ship Date', 'trim|xss_clean');
        
        $this->form_validation->set_rules('non_holiday_lead_time', 'Non Holiday Lead Time', 'trim|xss_clean');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('purchase_orders/add');
            $this->load->view('footer');
        } else {
            $data = array(
                'product_id'                => $this->input->post('product_id'),
                'product'                   => $this->input->post('product'),
                'po_status_id'              => $this->input->post('po_status_id'),
                'po'                        => $this->input->post('po'),
                'po_amount'                 => $this->input->post('po_amount'),
                'price_unit_sea'            => $this->input->post('price_unit_sea'),
                'price_unit_air'            => $this->input->post('price_unit_air'),
                'pi'                        => $this->input->post('pi'),
                'po_date'                   => $this->input->post('po_date'),
                'po_qty'                    => $this->input->post('po_qty'),
                'deposit_date_30'           => $this->input->post('deposit_date_30'),
                'ship1_qty'                 => $this->input->post('ship1_qty'),
                'ship1_method_id'           => $this->input->post('ship1_method_id'),
                'ship1_plan_ship_date'      => $this->input->post('ship1_plan_ship_date'),
                'ship1_actual_ship_date'    => $this->input->post('ship1_actual_ship_date'),
                'ship2_qty'                 => $this->input->post('ship2_qty'),
                'ship2_method_id'           => $this->input->post('ship2_method_id'),
                'ship2_plan_ship_date'      => $this->input->post('ship2_plan_ship_date'),
                'ship2_actual_ship_date'    => $this->input->post('ship2_actual_ship_date'),
                'ship3_qty'                 => $this->input->post('ship3_qty'),
                'ship3_method_id'           => $this->input->post('ship3_method_id'),
                'ship3_plan_ship_date'      => $this->input->post('ship3_plan_ship_date'),
                'ship3_actual_ship_date'    => $this->input->post('ship3_actual_ship_date'),
                'non_holiday_lead_time'     => $this->input->post('non_holiday_lead_time'),
                'notes'                     => $this->input->post('notes'),
                'created_modified_by'       => $this->session->userdata('name'),
                'create_time'               => date('Y-m-d H:i:s', time())
            );
            
            //Insert new Purchase Order
            $this->Po_model->insert($data);
            
            //set message
            $this->session->set_flashdata('po_saved', 'Purchase Order create successfully.');
            
            redirect('po');
        }
    }
    
    /**
     * Edit a purchase order.
     * 
     * @param int $id
     */
    public function edit($id) {
        //validation rules
        $this->form_validation->set_rules('product_id', 'Select a Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('product', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('po_status_id', 'PO Status', 'trim|xss_clean');
        $this->form_validation->set_rules('po', 'PO #', 'required|trim|xss_clean');
        $this->form_validation->set_rules('po_amount', 'PO Amount', 'trim|xss_clean');
        $this->form_validation->set_rules('price_unit_sea', 'Price Unit Sea', 'trim|xss_clean');
        $this->form_validation->set_rules('price_unit_air', 'Price Unit Air', 'trim|xss_clean');
        $this->form_validation->set_rules('pi', 'PI', 'trim|xss_clean');
        $this->form_validation->set_rules('po_date', 'PO Date', 'trim|xss_clean');
        $this->form_validation->set_rules('po_qty', 'PO Qty', 'trim|xss_clean');
        $this->form_validation->set_rules('deposit_date_30', 'Deposit Date 30', 'trim|xss_clean');
        $this->form_validation->set_rules('ship1_qty', 'Ship 1 Qty', 'trim|xss_clean');
        $this->form_validation->set_rules('ship1_method_id', 'Ship 1 Method', 'trim|xss_clean');
        $this->form_validation->set_rules('ship1_plan_ship_date', 'Ship 1 Plan Ship Date', 'trim|xss_clean');
        $this->form_validation->set_rules('ship1_actual_ship_date', 'Ship 1 Actual Ship Date', 'trim|xss_clean');
        
        $this->form_validation->set_rules('ship2_qty', 'Ship 2 Qty', 'trim|xss_clean');
        $this->form_validation->set_rules('ship2_method_id', 'Ship 2 Method', 'trim|xss_clean');
        $this->form_validation->set_rules('ship2_plan_ship_date', 'Ship 2 Plan Ship Date', 'trim|xss_clean');
        $this->form_validation->set_rules('ship2_actual_ship_date', 'Ship 2 Actual Ship Date', 'trim|xss_clean');
        
        $this->form_validation->set_rules('ship3_qty', 'Ship 3 Qty', 'trim|xss_clean');
        $this->form_validation->set_rules('ship3_method_id', 'Ship 3 Method', 'trim|xss_clean');
        $this->form_validation->set_rules('ship3_plan_ship_date', 'Ship 3 Plan Ship Date', 'trim|xss_clean');
        $this->form_validation->set_rules('ship3_actual_ship_date', 'Ship 3 Actual Ship Date', 'trim|xss_clean');
        
        $this->form_validation->set_rules('non_holiday_lead_time', 'Non Holiday Lead Time', 'trim|xss_clean');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        $data['po'] = $this->Po_model->get_purchase_order($id);
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('purchase_orders/edit');
            $this->load->view('footer');
        } else {
            $data = array(
                'product_id'                => $this->input->post('product_id'),
                'product'                   => $this->input->post('product'),
                'po_status_id'              => $this->input->post('po_status_id'),
                'po'                        => $this->input->post('po'),
                'po_amount'                 => str_replace(',', '', $this->input->post('po_amount')),
                'price_unit_sea'            => $this->input->post('price_unit_sea'),
                'price_unit_air'            => $this->input->post('price_unit_air'),
                'pi'                        => $this->input->post('pi'),
                'po_date'                   => $this->input->post('po_date'),
                'po_qty'                    => str_replace(',', '', $this->input->post('po_qty')),
                'deposit_date_30'           => $this->input->post('deposit_date_30'),
                'ship1_qty'                 => str_replace(',', '', $this->input->post('ship1_qty')),
                'ship1_method_id'           => $this->input->post('ship1_method_id'),
                'ship1_plan_ship_date'      => $this->input->post('ship1_plan_ship_date'),
                'ship1_actual_ship_date'    => $this->input->post('ship1_actual_ship_date'),
                'ship2_qty'                 => str_replace(',', '', $this->input->post('ship2_qty')),
                'ship2_method_id'           => $this->input->post('ship2_method_id'),
                'ship2_plan_ship_date'      => $this->input->post('ship2_plan_ship_date'),
                'ship2_actual_ship_date'    => $this->input->post('ship2_actual_ship_date'),
                'ship3_qty'                 => str_replace(',', '', $this->input->post('ship3_qty')),
                'ship3_method_id'           => $this->input->post('ship3_method_id'),
                'ship3_plan_ship_date'      => $this->input->post('ship3_plan_ship_date'),
                'ship3_actual_ship_date'    => $this->input->post('ship3_actual_ship_date'),
                'non_holiday_lead_time'     => $this->input->post('non_holiday_lead_time'),
                'notes'                     => $this->input->post('notes'),
                'created_modified_by'       => $this->session->userdata('name')
            );
            var_dump($data);die();
            //Update Purchase Order
            $this->Po_model->update($data, $id);
            
            //Set message
            $this->session->set_flashdata('po_saved', 'Purchase Order updated successfully.');
            
            redirect('po');
        }
        
    }
    
    /**
     * Delete a Purchase Order.
     * 
     * @param int $id
     */
//    public function delete($id) {
//        $this->Po_model->delete($id);
//        
//        //set message
//        $this->session->set_flashdata('po_deleted', 'Purchase Order has been deleted successfully.');
//        
//        redirect('po');
//    }
    
//    public function approve($id) {
//        $data = array(
//            'approval_status' => 3
//        );
//        
//        $this->Po_model->update($data, $id);
//        
//        //set message
//        $this->session->set_flashdata('po_approved', 'Purchase Order has been approved.');
//        
//        redirect('po');
//    }
//    
//    public function unapprove($id) {
//        $data = array(
//            'approval_status' => 1
//        );
//        
//        $this->Po_model->update($data, $id);
//        
//        //set message
//        $this->session->set_flashdata('po_rejected', 'Purchase Order has been rejected.');
//        
//        redirect('po');
//    }
}
