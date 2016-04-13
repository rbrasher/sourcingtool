<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Listings extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Listings_model');
        $this->load->model('Products_model');
    }
    
    public function index() {
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        $data['listings'] = $this->Listings_model->get_listings('id', 'ASC');
        
        //Load view
        $this->load->view('header', $data);
        $this->load->view('listings/index');
        $this->load->view('footer');
    }
    
    public function add() {
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        //process form uploads
        $config['upload_path'] = './documents/listings/listing_images/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        //form validation
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
        $this->form_validation->set_rules('brand', 'Brand', 'trim|xss_clean');
        $this->form_validation->set_rules('price', 'Price', 'trim|xss_clean');
        $this->form_validation->set_rules('sale_price', 'Sale Price', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_1', 'Bullet 1', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_2', 'Bullet 2', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_3', 'Bullet 3', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_4', 'Bullet 4', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_5', 'Bullet 5', 'trim|xss_clean');
        $this->form_validation->set_rules('credibility_site', 'Credibility Site', 'trim|xss_clean');
        
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('listings/add');
            $this->load->view('footer');
        } else {
            $listing_image = '';
            $sec_image_1 = '';
            $sec_image_2 = '';
            $sec_image_3 = '';
            $sec_image_4 = '';
            $sec_image_5 = '';
            $sec_image_6 = '';
            
            //upload listing images
            if(!$this->upload->do_upload('main_image')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading the Listing Image.');
                
                redirect('listings/add');
            } else {
                $file_data = $this->upload->data();
                
                $listing_image = $file_data['file_name']; 
            }
            
            if(!$this->upload->do_upload('sec_image_1')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 1');
                
                redirect('listings/add');
            } else {
                $file_data = $this->upload->data();
                
                $sec_image_1 = $file_data['file_name'];
            }
            
            if(!$this->upload->do_upload('sec_image_2')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 2');
                redirect('listings/add');
            } else {
                $file_data = $this->upload->data();
                
                $sec_image_2 = $file_data['file_name'];
            }
            
            if(!$this->upload->do_upload('sec_image_3')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 3');
                redirect('listings/add');
            } else {
                $file_data = $this->upload->data();
                
                $sec_image_3 = $file_data['file_name'];
            }
            
            if(!$this->upload->do_upload('sec_image_4')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 4');
                redirect('listings/add');
            } else {
                $file_data = $this->upload->data();
                
                $sec_image_4 = $file_data['file_name'];
            }
            
            if(!$this->upload->do_upload('sec_image_5')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 5');
                redirect('listings/add');
            } else {
                $file_data = $this->upload->data();
                
                $sec_image_5 = $file_data['file_name'];
            }
            
            if(!$this->upload->do_upload('sec_image_6')) {
                $this->session->set_flashdata('upload_error', 'There was an error uploading Secondary Listing Image 6');
                redirect('listings/add');
            } else {
                $file_data = $this->upload->data();
                
                $sec_image_6 = $file_data['file_name'];
            }
            
//            $secondary_files = array();
//            if($this->upload->do_multi_upload("myfiles")) {
//                $secondary_files = $this->upload->get_multi_upload_data();
//            }
//            
//            $filenames = '';
//            
//            $listing_image = array_shift($secondary_files);
//            $primary_image = $listing_image['file_name'];
//            
//            foreach($secondary_files as $file) {
//                $filenames .= $file['file_name'] . '|';
//            }
//            
//            $filenames = rtrim($filenames, "|");
            
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
                //'listing_image'         => $primary_image,
                'listing_image'         => $listing_image,
                'sec_image_1'           => $sec_image_1,
                'sec_image_2'           => $sec_image_2,
                'sec_image_3'           => $sec_image_3,
                'sec_image_4'           => $sec_image_4,
                'sec_image_5'           => $sec_image_5,
                'sec_image_6'           => $sec_image_6,
                //'secondary_images'      => $filenames,
                'credibility_site'      => $this->input->post('credibility_site'),
                'created_modified_by'   => $this->session->userdata('name')
            );

            //Insert new listing
            $this->Listings_model->insert($data);
            
            //set message
            $this->session->set_flashdata('listing_saved', 'Listing added successfully.');
            
            redirect('listings');
        }
    }
    
    public function edit($id) {
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        //form validation
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
        $this->form_validation->set_rules('brand', 'Brand', 'trim|xss_clean');
        $this->form_validation->set_rules('price', 'Price', 'trim|xss_clean');
        $this->form_validation->set_rules('sale_price', 'Sale Price', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_1', 'Bullet 1', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_2', 'Bullet 2', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_3', 'Bullet 3', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_4', 'Bullet 4', 'trim|xss_clean');
        $this->form_validation->set_rules('bullet_5', 'Bullet 5', 'trim|xss_clean');
        $this->form_validation->set_rules('credibility_site', 'Credibility Site', 'trim|xss_clean');
        
        
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
                'brand'                 => $this->input->post('brand'),
                'price'                 => $this->input->post('price'),
                'sale_price'            => $this->input->post('sale_price'),
                'bullet_1'              => $this->input->post('bullet_1'),
                'bullet_2'              => $this->input->post('bullet_2'),
                'bullet_3'              => $this->input->post('bullet_3'),
                'bullet_4'              => $this->input->post('bullet_4'),
                'bullet_5'              => $this->input->post('bullet_5'),
                //'secondary_images'      => $this->input->post('secondary_images'),
                'credibility_site'      => $this->input->post('credibility_site'),
                'created_modified_by'   => $this->session->userdata('name')
            );

            //Insert new listing
            $this->Listings_model->update($data, $id);
            
            //set message
            $this->session->set_flashdata('listing_saved', 'Listing saved successfully.');
            
            redirect('listings');
        }
    }
    
    public function delete($id) {
        $this->Listings_model->delete($id);
        
        //set message
        $this->session->set_flashdata('listing_deleted', 'Listing deleted successfully.');
        
        redirect('listings');
    }
    
    public function review($id) {
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
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
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        $data = array(
            'approval_status' => 3
        );
        
        $this->Listings_model->update($data, $id);
        
        //set message
        $this->session->set_flashdata('listing_approved', 'Listing is Approved');
        
        redirect('listings');
    }
    
    public function unapprove($id) {
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        $data = array(
            'approval_status' => 1
        );
        
        $this->Listings_model->update($data, $id);
        
        //set message
        $this->session->set_flashdata('listing_rejected', 'Listing has been rejected.');
        
        redirect('listings');
    }
    
    public function amazonPreview($id) {
        $data['listing'] = $this->Listings_model->get_listing_for_review($id);
        
        $this->load->view('listings/amazon_preview', $data);
    }
}