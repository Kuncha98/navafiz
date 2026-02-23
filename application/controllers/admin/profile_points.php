<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_points extends CI_Controller {
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('Points_model','points_model');
            $this->load->model('Profile_model','profile_model');
          
            $this->session_user_id = $this->session->userdata('user_id');            
            
        }
        
        
        public function index(){
            
            $data['page_title'] = 'Profile Points';
            $data['content_view'] = 'admin/profile_points/index';
            $this->load->view('admin/sb-template', $data);
            
        }
        
        public function GetPoints(){
            
//            LoginCheck(site_url('login'), current_url());
          
            $user_id = $this->input->post('user_id');
            
            $points = $this->points_model->GetAllUserPoints($user_id);
            $data['points'] = $points;
            
            $data['page_title'] = 'Profile Points';
            $data['content_view'] = 'admin/profile_points/index';
            $this->load->view('admin/sb-template', $data);
           
}
        
        
}