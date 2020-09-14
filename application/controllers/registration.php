
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                $this->load->helper('url_helper');
                $this->load->helper('url');
                if($this->session->userdata('logged_in') == 'USER'){
                  redirect('dashboard');
              }
                $this->load->model('rigistered');
               
        }
        public function index()
        {
         $this->load->view('register');
        }
// public function registration()
// {
//     $this->load->helper('form');
//     $this->load->library('form_validation');

//     // $data['title'] = 'Create a news item';

//     $this->form_validation->set_rules('firstname', 'firstname', 'required');
//     $this->form_validation->set_rules('lastname', 'lastname', 'required');
//     $this->form_validation->set_rules('email', 'email', 'required');
//     $this->form_validation->set_rules('password', 'password', 'required|valid_email');
//     if ($this->form_validation->run() === FALSE)
//     {
//         // $this->load->view('css/style');
//         $this->load->view('register');
//         // $this->load->view('templates/footer');

//     }
//     else
//     {
//         $this->rigistered->set_user();
//         $this->load->view('news/success');
//     }
// }
public function signUp()
 {
         $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
 
  $this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[users.email]', array('is_unique' => 'This %s already exists.'));


  if ($this->form_validation->run() == TRUE) {

    $this->rigistered->set_user();
     //set message to be shown when registration is completed
     $this->session->set_flashdata('success','User is registered!');
    //  $this->load->view('registration/registration');
     redirect('register');
  } else {
         //return to the signup page again with validation errors
         $this->load->view('registration/registration');
     }   
 }
}
