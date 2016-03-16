<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Marketing extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')) {
            redirect('authentication/login');
        }
        
        $this->load->model('Marketing_model');
        $this->load->model('Products_model');
    }
    
    public function index() {
        $data['marketing'] = $this->Marketing_model->get_marketing('id', 'ASC');
        
        //load view
        $this->load->view('header', $data);
        $this->load->view('marketing/index');
        $this->load->view('footer');
    }
    
    public function add() {
        $config['upload_path'] = './documents/promo_codes/';
        $config['allowed_types'] = 'xls|csv|doc';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        //form validation
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('seller_central_ad', 'Seller Central Ad', 'trim|xss_clean');
        $this->form_validation->set_rules('keywords', 'Keywords', 'trim|xss_clean');
        $this->form_validation->set_rules('ams_ad', 'AMS Ad', 'trim|xss_clean');
        $this->form_validation->set_rules('marketing_lander', 'Marketing Lander', 'trim|xss_clean');
        $this->form_validation->set_rules('adwords', 'Adwords', 'trim|xss_clean');
        //not sure about promo codes file
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('marketing/add');
            $this->load->view('footer');
        } else {
            if(strlen($_FILES['userfile1']['name']) > 0) {
                //upload promo codes
                if(!$this->upload->do_upload('userfile1')) {
                    $this->session->set_flashdata('upload_error', 'There was an error uploading Promo Codes.');

                    redirect('marketing/add');
                } else {
                    $file_data = $this->upload->data();

                    $promo_codes = $file_data['file_name'];
                }
            } else {
                $promo_codes = '';
            }
            
            $data = array(
                'product_id'            => $this->input->post('product_id'),
                'seller_central_ad'     => $this->input->post('seller_central_ad'),
                'keywords'              => $this->input->post('keywords'),
                'ams_ad'                => $this->input->post('ams_ad'),
                'marketing_lander'      => $this->input->post('marketing_lander'),
                'adwords'               => $this->input->post('adwords'),
                'promo_codes'           => $promo_codes,
                'notes'                 => $this->input->post('notes'),
                'created_modified_by'   => $this->session->userdata('name')
            );
            
            //Insert Marketing Info
            $this->Marketing_model->insert($data);
            
            //set message
            $this->session->set_flashdata('marketing_saved', 'Marketing Info has been added.');
            
            redirect('marketing');
        }
    }
    
    public function edit($id) {
        $config['upload_path'] = './documents/promo_codes/';
        $config['allowed_types'] = 'xls|csv|doc';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);

        //form validation
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('seller_central_ad', 'Seller Central Ad', 'trim|xss_clean');
        $this->form_validation->set_rules('keywords', 'Keywords', 'trim|xss_clean');
        $this->form_validation->set_rules('ams_ad', 'AMS Ad', 'trim|xss_clean');
        $this->form_validation->set_rules('marketing_lander', 'Marketing Lander', 'trim|xss_clean');
        $this->form_validation->set_rules('adwords', 'Adwords', 'trim|xss_clean');
        $this->form_validation->set_rules('promo_codes', 'Promo Codes', 'trim|xss_clean');
        $this->form_validation->set_rules('notes', 'Notes', 'trim|xss_clean');
        
        $data['products'] = $this->Products_model->get_products('id', 'ASC');
        $data['marketing'] = $this->Marketing_model->get_marketing_by_id($id);
        
        if($this->form_validation->run() == FALSE) {
            //load view
            $this->load->view('header', $data);
            $this->load->view('marketing/edit');
            $this->load->view('footer');
        } else {
            if(strlen($_FILES['userfile1']['name']) > 0) {
                //upload promo codes
                if(!$this->upload->do_upload('userfile1')) {
                    $this->session->set_flashdata('upload_error', 'There was an error uploading Promo Codes.');

                    redirect('marketing/add');
                } else {
                    $file_data = $this->upload->data();

                    $promo_codes = $file_data['file_name'];
                }
            } else {
                $promo_codes = '';
            }
            
            $data = array(
                'product_id'            => $this->input->post('product_id'),
                'seller_central_ad'     => $this->input->post('seller_central_ad'),
                'keywords'              => $this->input->post('keywords'),
                'ams_ad'                => $this->input->post('ams_ad'),
                'marketing_lander'      => $this->input->post('marketing_lander'),
                'adwords'               => $this->input->post('adwords'),
                'promo_codes'           => $promo_codes, //$this->input->post('promo_codes'),
                'notes'                 => $this->input->post('notes'),
                'created_modified_by'   => $this->session->userdata('name')
            );
            var_dump($data);die();
            
            //Insert Marketing Info
            $this->Marketing_model->update($data, $id);
            
            //set message
            $this->session->set_flashdata('marketing_saved', 'Marketing Info has been saved.');
            
            redirect('marketing');
        }
    }
    
//    public function delete($id) {
//        $this->Marketing_model->delete($id);
//        
//        //set message
//        $this->session->set_flashdata('marketing_deleted', 'Marketing Info has been deleted.');
//        
//        redirect('marketing');
//    }
}
