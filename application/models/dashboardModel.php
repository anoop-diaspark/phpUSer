<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DashboardModel extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }


public function change_status($id = null,$status = null)
{
        if ($id == null || $status == null)
        {
                
                return false;
        }

        $update_rows = array('STATUS' =>$status,);
		$this->db->where('id', $id );
        $query = $this->db->update('users', $update_rows);
        if(empty($query)){
            return false;
        }
        return true;
}


public function deleteRow($id = null)
{
        if ($id == null)
        {
                
                return false;
        }
        $sql =  "DELETE FROM `users` WHERE `id` = $id";
        $query = $this->db->query($sql);
        if(empty($query)){
            return false;
        }
        return true;
}
}