<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class subscribe_model extends CI_Model {

        public function __construct()
        {
             $this->load->database();
        }





public function sub_data()
{
       
        $sql =  "SELECT * FROM `transaction` WHERE `Months` = 9 AND `years` =2020";
        $query = $this->db->query($sql);
        print_r($query);
        return $query->result_array();
}
} 