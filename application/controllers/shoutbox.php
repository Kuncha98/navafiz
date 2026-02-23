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
            $this->load->model('shoutbox_model');
            date_default_timezone_set('Asia/Dubai');
            
            $this->session_user_id = $this->session->userdata('user_id');
        }
	
	function index($message_parent_id=0)
        {
            $user_id = $this->session->userdata('user_id');
            
            if($user_id==""){
                _setError("Please login to access Navafiz Discussion Board");
                redirect(site_url('login')); 
                exit();
            }
            
            $user_detail = GetUserDetails($user_id);            
            if(empty($user_detail->m_current_city) || substr_count($user_detail->m_skills, ",")<2){
                _setError("Complete your profile to access this page");
                redirect(site_url('edit-profile'));
                exit();
            }
            
            date_default_timezone_set('Asia/Dubai');
            
            $is_post = intval($this->get_post('is_post',0));
            if($is_post){                
                $sdata['user_id'] = $user_id;
                $sdata['message'] = $this->get_post('message');
                $sdata['parent_id'] = $message_parent_id;
                $sdata['added_on'] = datenow();
                
                shoutbox_post_message($sdata);
                
                $user_sess_name = $this->session->userdata('name');
                $noti['user_id'] = $this->session_user_id;
                $noti['noti_title'] = $user_sess_name." Posted a comment on General Discussion Board.";
                $noti['noti_desc'] = $this->get_post('message');
                $noti['noti_type'] = 'general_message';
                $noti['noti_link'] = site_url("shoutbox/");
                AddNotification($noti);
            }
            
            $shoutbox_messages = $this->shoutbox_model->GetAll();
            $messages_list = $this->shoutbox_model->generateTree($shoutbox_messages);
            
            
            $data['shoutbox_messages'] = $shoutbox_messages;
            $data['messages_list'] = $messages_list;
            $data['message_parent_id'] = $message_parent_id;
            $this->load->view('shoutbox/shoutbox', $data);
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