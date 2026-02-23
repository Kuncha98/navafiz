<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedcomments extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('feed_comments_model');        
        $this->load->model('feed_model');      
        $this->session_user_id = $this->session->userdata('user_id');
    }
    
    
    function index(){
        
        LoginCheck(site_url('login'), current_url());        
        $user_id = $this->session->userdata('user_id');
        
        $data['data'] = "";
        $this->load->view('feed/index', $data);
    }
    
    function loadfeedcomments($feed_id){        
        LoginCheck(site_url('login'), current_url());            
        
        $get_comments = $this->feed_comments_model->GetPostComments($feed_id);    
        
        $get_feed =  $this->db->query('select user_id from '.FEED_TABLE.' where feed_id='.$feed_id)->row();
        $feed_owner_id = isset($get_feed->user_id) && $get_feed->user_id>0 ? $get_feed->user_id:0; 
        
        $commnetform = '<div class="row postcmtfrm">';
        $commnetform .= '<div class="col-md-1 col-xs-1 p-0 userprofile d-none d-sm-block">';
        $commnetform .= '<a class="userpic img-fluid" href="javascript:void(0);" style="background-image: url('.profile_picture($this->session_user_id).')"></a>';
        $commnetform .= '</div>';
        $commnetform .= '<div class="col-md-11 col-xs-11 commentbox">';
        $commnetform .= '<textarea class="form-control commentxt" feed_id="'.$feed_id.'" feed_owner_id="'.$feed_owner_id.'"></textarea>';
        $commnetform .= '<a class="btn btn-outline-secondary postcomment">Post</a>';        
        $commnetform .= '</div>';
        $commnetform .= '</div>';
        
        echo $commnetform.$get_comments;
    }
    
    function loadcommentfrm(){        
        LoginCheck(site_url('login'), current_url());            
        
        $data = array();
        $this->load->view('feed/feedcomments', $data);
    }
    
    
    
    
    function post(){
        LoginCheck(site_url('login'), current_url());        
        
        $session_user_id = $this->session_user_id;
        $comment_text = $this->get_post('comment_txt');
        $feed_id = $this->get_post('feed_id');
        $feed_owner_id = $this->get_post('feed_owner_id',0);
                        
        if($session_user_id>0 && !empty($comment_text)){
            $data['user_id'] = $this->session_user_id;
            $data['comment_text'] = $comment_text;
            $data['feed_id'] = $feed_id;
            $data['parent_id'] = $this->get_post('parent_id',0);
            $data['added_on'] = datenow();     
            
            $user_sess_name = $this->session->userdata('name');
            
            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = $user_sess_name." Posted a comment on your feed post.";
            $noti['noti_desc'] = $comment_text;
            $noti['noti_type'] = 'tsheet_message';
            $noti['notify_user_id'] = $feed_owner_id;
            $noti['noti_link'] = site_url("feed/view/$feed_id");
            AddNotification($noti);
            
            $this->feed_comments_model->Save($data);        
        }
    }
    
    function view($feed_id){
        LoginCheck(site_url('login'), current_url());        
        $feed_id = intval($feed_id);
        
        $post = $this->feed_model->GetById($feed_id);                
        $data['post'] = $post;        
        $this->load->view('feed/view', $data);
    }
    function delete($feed_id){
        LoginCheck(site_url('login'), current_url());        
        $feed_id = intval($feed_id);
        
        $post = $this->feed_model->Delete($feed_id);        
        _setSuccess("Your request completed successfully");
        redirect(site_url('feed'));
    }
    
}


/* End of file front.php */
/* Location: ./application/controllers/front.php */