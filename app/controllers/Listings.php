<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Listings extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
//        if(!$this->session->userdata('logged_in')) {
//            redirect('authentication/login');
//        }
        
        $this->load->model('Listings_model');
        $this->load->model('Products_model');
    }
    
    public function index() {
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        $data['listings'] = $this->Listings_model->get_listings('id', 'ASC');
        
        //Load view
        $this->load->view('header', $data);
        $this->load->view('listings/index');
        $this->load->view('footer');
    }
    
    public function add() {
        //process form uploads
        $config['upload_path'] = './documents/listings/listing_images/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        //form validation
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
        $this->form_validation->set_rules('bullets', 'Bullets', 'trim|xss_clean');
        // listing images?
        $this->form_validation->set_rules('product_description', 'Product Description', 'trim|xss_clean');
        $this->form_validation->set_rules('credibility_site', 'Credibility Site', 'trim|xss_clean');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('listings/add');
            $this->load->view('footer');
        } else {
            //upload listing images
//            if(!$this->upload->do_upload('userfile1')) {
//                $this->session->set_flashdata('upload_error', 'There was an error uploading the Listing Image.');
//                
//                redirect('listings/add');
//            } else {
//                $file_data = $this->upload->data();
//                
//                $listing_image = $file_data['file_name']; 
//            }
            
            $secondary_files = array();
            if($this->upload->do_multi_upload("myfiles")) {
                $secondary_files = $this->upload->get_multi_upload_data();
            }
            
            $filenames = '';
            
            $listing_image = array_shift($secondary_files);
            $primary_image = $listing_image['file_name'];
            
            foreach($secondary_files as $file) {
                $filenames .= $file['file_name'] . '|';
            }
            
            $filenames = rtrim($filenames, "|");
            
            $data = array(
                'product_id'            => $this->input->post('product_id'),
                'title'                 => $this->input->post('title'),
                'bullets'               => $this->input->post('bullets'),
                'listing_image'         => $primary_image,
                'secondary_images'      => $filenames,
                'product_description'   => $this->input->post('product_description'),
                'credibility_site'      => $this->input->post('credibility_site'),
                'notes'                 => $this->input->post('notes')
            );
            
            //var_dump($data);die();
            
            //Insert new listing
            $this->Listings_model->insert($data);
            
            //set message
            $this->session->set_flashdata('listing_saved', 'Listing added successfully.');
            
            redirect('listings');
        }
    }
    
    public function edit($id) {
        //form validation
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
        $this->form_validation->set_rules('bullets', 'Bullets', 'trim|xss_clean');
        // listing images?
        $this->form_validation->set_rules('product_description', 'Product Description', 'trim|xss_clean');
        $this->form_validation->set_rules('credibility_site', 'Credibility Site', 'trim|xss_clean');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        $data['listing'] = $this->Listings_model->get_listing_by_id($id);
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('listings/edit');
            $this->load->view('footer');
        } else {
            //listing images ??
            $data = array(
                'product_id'            => $this->input->post('product_id'),
                'title'                 => $this->input->post('title'),
                'bullets'               => $this->input->post('bullets'),
                'product_description'   => $this->input->post('product_description'),
                'credibility_site'      => $this->input->post('credibility_site'),
                'notes'                 => $this->input->post('notes')
            );
            
            //Insert new listing
            $this->Listings_model->update($data, $id);
            
            //set message
            $this->session->set_flashdata('listing_saved', 'Listing saved successfully.');
            
            redirect('listings');
        }
    }
    
//    public function delete($id) {
//        $this->Listings_model->delete($id);
//        
//        //set message
//        $this->session->set_flashdata('listing_deleted', 'Listing deleted successfully.');
//        
//        redirect('listings');
//    }
    
    public function review($id) {
        $data = array(
            'approval_status' => 2
        );
        
        $this->Listings_model->update($data, $id);
        
        $data['listing'] = $this->Listings_model->get_listing_for_review($id);
        
        //load view
        $this->load->view('review/header', $data);
        $this->load->view('review/listing');
        $this->load->view('review/footer');
    }
    
    public function approve($id) {
        $data = array(
            'approval_status' => 3
        );
        
        $this->Listings_model->update($data, $id);
        
        //set message
        $this->session->set_flashdata('listing_approved', 'Listing is Approved');
        
        redirect('listings');
    }
    
    public function unapprove($id) {
        $data = array(
            'approval_status' => 1
        );
        
        $this->Listings_model->update($data, $id);
        
        //set message
        $this->session->set_flashdata('listing_rejected', 'Listing has been rejected.');
        
        redirect('listings');
    }
}