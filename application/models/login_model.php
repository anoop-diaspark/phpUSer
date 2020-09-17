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
public function get_sub()
{
    $month = 1;
    $yearlyMonths = 12;
    $year = 2019;
    $yearShort = 19;
    $current_month = date("n");
    $current_year = date("Y");
    $TotalValue = array();
    for( $month; $month <= $yearlyMonths && $year <= $current_year;$month++ ){
      
        $month_name = date("M-", mktime(0, 0, 0, $month, 10)); 
        $month_name = $month_name . $yearShort;
        $monthName = array($month_name);
        $sql1 = "SELECT count(*) as MonthlyCount FROM `transaction` WHERE YEAR(creation_date) = $year AND MONTH(creation_date) = $month AND payment_status='TXN_SUCCESS'";
        $query1 = $this->db->query($sql1);
        $result =  $query1->result();
        $sql = "SELECT SUM(pay_amount) Amount FROM `transaction` WHERE YEAR(creation_date) = $year AND MONTH(creation_date) = $month AND payment_status='TXN_SUCCESS'";
        $query = $this->db->query($sql);
         $result1 =  $query->result();
        $sql2 =    "SELECT count(*) as MonthlyCountlead from user_master_wish where YEAR(created_time) = $year AND MONTH(created_time) = $month AND sf_dc_lead_id !=''";
        // $sql2 = "SELECT count(*) as MonthlyCountlead FROM `user_master_wish` WHERE YEAR(creation_date) = $year AND MONTH(creation_date) = $month AND sf_dc_lead_id !=''";
        $query2 = $this->db->query($sql2);
        $result3 =  $query2->result();
        $arrmerge = array_merge(  $monthName,$result , $result1, $result3);
        array_push($TotalValue,$arrmerge);
            if($year == $current_year ){
            $yearlyMonths = $current_month;
            }
            if($month == 12 && $year != $current_year){
            $month = 0;
                $year = $year+1;
                $yearShort = $yearShort+1;
        }
    }
   
                return $TotalValue ;

     
}
}