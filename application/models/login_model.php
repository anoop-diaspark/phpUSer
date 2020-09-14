<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
     
        public function verify_users()
{

    $this->load->helper('url');
    $pass = $this->input->post('password');
    $pass = md5($pass);

    $data = array(
        'email' => $this->input->post('email'),
        'password' =>  $pass,
    );

    // return $this->db->insert('users', $data);

    //     if ($slug === FALSE)
    //     {
    //             $query = $this->db->get('users');
    //             return $query->result_array();
    //     }
    $email = $this->input->post('email');
    $sql = "SELECT * FROM `users` WHERE email='$email' and password='$pass'";
    $query = $this->db->query($sql);
        // $query = $this->db->get_where('users', $data);
        if($query->num_rows() == 1){
            $qureyResult = $query->row_array();
        if($qureyResult['STATUS'] != "NO"){
            $this->session->set_userdata('logged_in',$qureyResult['role']);
            $this->session->set_userdata('firstname',$qureyResult['firstname']);
        return true;
          }
         else {
        $this->session->set_flashdata('success','This User is not approved yet');
        return false;
    }
    }
        else {
            $this->session->set_flashdata('success','eEmail and Password does not match');
            return false;}
}

     
public function get_users()
{
    $sql = "SELECT * FROM `users` WHERE firstname !='Admin'";
    $query = $this->db->query($sql);
                // $query = $this->db->get('users');
                return $query->result_array();

     
}
}