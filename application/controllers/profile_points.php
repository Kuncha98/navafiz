<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_points extends CI_Controller {
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('Points_model','points_model');
            $this->load->model('Profile_model','profile_model');
          
            $this->session_user_id = $this->session->userdata('user_id');            
            
        }
        
        public function GetPoints($user_id){
            
            LoginCheck(site_url('login'), current_url());
          
              
            $points = $this->points_model->GetAllUserPoints($user_id);
            if(!empty($points)){
                $user = GetUserName($user_id);
                $data['user'] = $user;
                $data['points'] = $points;
                $this->load->view("profile/profile_points",$data);
            }
          
        }
        
        
}