<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('trackingsheet_chat');
        date_default_timezone_set('Asia/Dubai');
        $this->session_user_id = $this->session->userdata('user_id');            
    }
    
    function index($sheet_user_id=0){
        
        $this->db->query('Update jb_notification set read_flag="read" where noti_type="tsheet_message" and notify_user_id='.$sheet_user_id);
        
        LoginCheck(site_url('login'), current_url()); 
        $data['sheet_user_id'] = $sheet_user_id;
        $data['hide_left_profile'] = 1;
        $this->load->view('messages/index', $data);

    }
    
    public function GetTsheetChat($sheet_user_id){
        
        $shoutbox_messages = $this->trackingsheet_chat->GetChatList($sheet_user_id);  
        
        $data['shoutbox_messages'] = $shoutbox_messages;
        $data['sheet_user_id'] = $sheet_user_id;            
        $this->load->view('shoutbox/trackingsheet_chat', $data);
    }
    
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */