
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                $this->load->helper('url_helper');
                $this->load->helper('url');
                if($this->session->userdata('logged_in') == 'USER'){
                    redirect('dashboard');
                }
                $this->load->model('login_model');
         
        }
        public function index()
        {
         $this->load->view('login');
         
        }
      
public function verifyLogin()
 {
         $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
 
  $this->form_validation->set_rules('email', 'email', 'required');


  if ($this->form_validation->run() == TRUE) {

   $data =  $this->login_model->verify_users();
  if($data){
     //set message to be shown when login is completed
  
     redirect('dashboard');
    }
     else{ 
        redirect('login');
    }
    //  $this->load->view('login/login');
    
  } else {
         //return to the signup page again with validation errors
         $this->load->view('login/login');
     }   
 }
}
