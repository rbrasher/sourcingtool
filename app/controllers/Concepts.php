<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Concepts extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('string');
        
        $this->load->model('Concepts_model');
        $this->load->model('Products_model');
        
//        if(!$this->session->userdata('logged_in')) {
//            redirect('authentication/login');
//        }
    }
    
    public function index() {
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        $data['concepts'] = $this->Concepts_model->get_concepts('id', 'ASC');
        $data['approval_statuses'] = $this->Concepts_model->get_approval_statuses();
        
        //load view
        $this->load->view('header', $data);
        $this->load->view('concepts/index');
        $this->load->view('footer');
    }
    
    public function add() {
        $config['upload_path'] = './documents/concepts/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        //validation rules
        $this->form_validation->set_rules('product_id', 'Product ID', 'required|trim|xss_clean');
        $this->form_validation->set_rules('listing_mock', 'Listing Mock', 'trim|xss_clean');
        $this->form_validation->set_rules('box_art_work', 'Box Art Work', 'trim|xss_clean');
        $this->form_validation->set_rules('instruction_manual', 'Instruction Manual', 'trim|xss_clean');
        $this->form_validation->set_rules('product_design', 'Product Design', 'trim|xss_clean');
        $this->form_validation->set_rules('brand', 'Brand', 'trim|xss_clean');
        $this->form_validation->set_rules('upc', 'UPC', 'trim|xss_clean');
        $this->form_validation->set_rules('domain', 'Domain', 'trim|xss_clean');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        $data['approval_statuses'] = $this->Concepts_model->get_approval_statuses();
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('concepts/add');
            $this->load->view('footer');
        } else {
            $product_id = $this->input->post('product_id');
            $product_name = $this->Products_model->get_product_name($product_id);
            
            //TODO: prepend product name to uploaded files
            
            //upload instruction manual
            if(!$this->upload->do_upload('userfile1')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading the Instruction Manual.');
                
                redirect('concepts/add');
            } else {
                $file_data = $this->upload->data();
                
                $instruction_manual = $file_data['file_name'];
            }
            
            if(!$this->upload->do_upload('userfile2')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading the Product Design.');
                
                redirect('concepts/add');
            } else {
                $file_data = $this->upload->data();
                
                $product_design = $file_data['file_name'];
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
                'notes'                 => $this->input->post('notes')
            );
            
            //Insert new concept
            $this->Concepts_model->insert($data);
            
            //set message
            $this->session->set_flashdata('concept_saved', 'Concept added successfully.');
            
            redirect('concepts');
        }
    }
    
    public function edit($id) {
        $config['upload_path'] = './documents/concepts/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        //validation rules
        $this->form_validation->set_rules('product_id', 'Product ID', 'required|trim|xss_clean');
        $this->form_validation->set_rules('listing_mock', 'Listing Mock', 'trim|xss_clean');
        $this->form_validation->set_rules('box_art_work', 'Box Art Work', 'trim|xss_clean');
        
        //may not need the next two
        $this->form_validation->set_rules('instruction_manual', 'Instruction Manual', 'trim|xss_clean');
        $this->form_validation->set_rules('product_design', 'Product Design', 'trim|xss_clean');
        
        $this->form_validation->set_rules('brand', 'Brand', 'trim|xss_clean');
        $this->form_validation->set_rules('upc', 'UPC', 'trim|xss_clean');
        $this->form_validation->set_rules('domain', 'Domain', 'trim|xss_clean');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        $data['concept'] = $this->Concepts_model->get_concept($id);
        $data['approval_statuses'] = $this->Concepts_model->get_approval_statuses();
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('concepts/edit');
            $this->load->view('footer');
        } else {
            $product_id = $this->input->post('product_id');
            $product_name = $this->Products_model->get_product_name($product_id);
            
            //TODO: prepend product name to uploaded files
            
            //upload instruction manual
//            if(!$this->upload->do_upload('userfile1')) {
//                $this->session->set_flashdata('upload_error', 'There was an error uploading the Instruction Manual.');
//
//                redirect('concepts/edit/' . $id);
//            } else {
//                $file_data = $this->upload->data();
//
//                $instruction_manual = $file_data['file_name'];
//            }
            
            //upload Product Design
//            if(!$this->upload->do_upload('userfile2')) {
//                $this->session->set_flashdata('upload_error', 'There was an error uploading the Product Design.');
//
//                redirect('concepts/edit/' . $id);
//            } else {
//                $file_data = $this->upload->data();
//
//                $product_design = $file_data['file_name'];
//            }
            
            $data = array(
                'product_id'            => $this->input->post('product_id'),
                'listing_mock'          => $this->input->post('listing_mock'),
                'box_art_work'          => $this->input->post('box_art_work'),
                'instruction_manual'    => $this->input->post('instruction_manual'),
                'product_design'        => $this->input->post('product_design'),
                //'instruction_manual'    => $instruction_manual,
                //'product_design'        => $product_design,
                'brand'                 => $this->input->post('brand'),
                'upc'                   => $this->input->post('upc'),
                'domain'                => $this->input->post('domain'),
                'notes'                 => $this->input->post('notes')
            );
            
            //var_dump($data);die();
            
            //Update Concept
            $this->Concepts_model->update($data, $id);
            
            //set message
            $this->session->set_flashdata('concept_saved', 'Concept has been updated successfully.');
            
            redirect('concepts');
        }
    }
    
    /**
     * Delete a Concept.
     * 
     * @param int $id
     */
//    public function delete($id) {
//        $this->Concepts_model->delete($id);
//        
//        //set message
//        $this->session->set_flashdata('concept_deleted', 'Concept deleted successfully.');
//        
//        redirect('concepts');
//    }
    
    
    public function approve($id) {
        $data = array(
            'listing_mock'      => 3,
            'box_art_work'      => 3,
            'approval_status'   => 3
        );
        
        $this->Concepts_model->update($data, $id);
        
        //set message
        $this->session->set_flashdata('concept_approved', 'Concept is Approved');
        
        redirect('concepts');
    }
    
    public function unapprove($id) {
        $data = array(
            'listing_mock'      => 1,
            'box_art_work'      => 1,
            'approval_status'   => 1
        );
        
        $this->Concepts_model->update($data, $id);
        
        //set message
        $this->session->set_flashdata('concept_rejected', 'Concept is Unapproved');
        
        redirect('concepts');
    }
}
