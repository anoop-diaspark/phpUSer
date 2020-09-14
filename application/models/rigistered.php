<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rigistered extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }


public function set_user()
{
    $this->load->helper('url');
    $date = date("Y-m-d H:i:s");
    $pass = $this->input->post('password');
    $pass = md5($pass);

    $data = array(
        'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'),
        'email' => $this->input->post('email'),
        'password' =>  $pass,
        'date' =>  $date ,
        'role' => 'USER',
        'STATUS' => 'NO',
    );

    return $this->db->insert('users', $data);
}
}