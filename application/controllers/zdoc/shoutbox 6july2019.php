<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shoutbox extends CI_Controller {
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('front_model');
            $this->load->model('page_model');
            $this->load->model('member_model');
            $this->load->model('social_groups_model');
            $this->load->model('socialgroups_subscribers');
        }
	
	function index()
        {
            $user_id = $this->session->userdata('user_id');
            if($user_id==""){ 
                _setError("Please login to access Navafiz Discussion Board");
                redirect(site_url('login')); 
                exit;
            }
            $user_detail = GetUserDetails($user_id);
            
            if(empty($user_detail->m_current_city) || substr_count($user_detail->m_skills, ",")<2){
                _setError("Complete your profile to access this page");
                redirect(site_url('edit-profile'));
                exit;
            }
            date_default_timezone_set('Asia/Dubai');
            
            $is_post = intval($this->get_post('is_post',0));
            if($is_post){                
                $data['user_id'] = $user_id;
                $data['message'] = $this->get_post('message');
                $data['added_on'] = datenow();
                
                shoutbox_post_message($data);
            }
            $this->load->view('shoutbox/shoutbox');
        }
	
        function delete($message_id)
        {
            $user_id = $this->session->userdata('user_id');
            if($user_id==""){ 
                _setError("Please login to access Navafiz Discussion Board");
                redirect(site_url('login')); 
                exit;
            }
            
            
            shoutbox_delete_message($message_id);
            redirect(site_url('shoutbox'));
            exit;
        }
        
		
	
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */