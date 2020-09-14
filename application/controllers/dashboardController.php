<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dashboardController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                $this->load->helper('url_helper');
                $this->load->helper('url');
                if($this->session->userdata('logged_in') != 'USER' && $this->session->userdata('logged_in') != 'ADMIN'){
                    redirect('login');
                }
                $this->load->model('login_model');
                $this->load->model('dashboardModel');
                $this->load->library('table');

        }
        public function update_row($id  = NUll,$status = null){
		if($status != null){
                        $updateStatus = $status == "APPROVED" ? "YES" : "NO";
                $data = $this->dashboardModel->change_status($id,  $updateStatus);
}
                if ( !$data)
                {
                        show_404();
                }
                redirect('dashboard');
        }
        
        public function delete_row($id  = NUll){
		if($id != null){
               
                $data = $this->dashboardModel->deleteRow($id);
}
                if ( !$data)
                {
                        show_404();
                }
                redirect('dashboard');
	}
        public function logout()
        {
                
            $this->session->unset_userdata('logged_in');
         redirect('login');
        }
        public function tableView()
{
    

        $data['items'] = $this->login_model->get_users();

        if (empty($data['items']))
        {
                show_404();
        }


        if($this->session->userdata('logged_in') != 'USER'){
                $this->load->view('dashboard/dashboardView', $data);
            }
       else  $this->load->view('dashboard/userDashBoardView', $data);
      
}


}