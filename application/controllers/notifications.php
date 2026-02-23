<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('notification_model');
        $this->user_id = $this->session->userdata('user_id');
        $this->session_user_id = $this->user_id;
        if($this->user_id==""){
            redirect(site_url('login'));
            exit;
        }
    }
    
    function index(){
        
        if(!in_array($this->session_user_id, CvReviewTeamList())){
            _setError("You don't have permission to access this page");
            redirect(site_url());
            exit();
        }
        
        $this->load->view('notification/all-notifications');
    }

    function notificationsajax(){
        $limit = $this->get_post('limit');        
        $team_noti = array('cvreview','events','event_message','company','testimonial','mentors','general_message','tsheet_message','registration');
        $notifications = $this->notification_model->ByType($team_noti,$limit);
        $data['notifications'] = $notifications;
        $this->load->view('notification/notifications-list',$data);
    }
    
    function notifications_home(){
        $limit = 10;        
        $team_noti = array('cvreview','events','event_message','company','testimonial','mentors','general_message','tsheet_message','registration');
        $notifications = $this->notification_model->ByType($team_noti,$limit);
        $data['notifications'] = $notifications;
        $this->load->view('notification/notifications-list',$data);
    }
    
    function adminactivityajax(){
        $limit = 30;    

        $team_noti = array('cvreview','events','event_message','company','testimonial','mentors','general_message','tsheet_message','registration');
        $notifications = $this->notification_model->ByType($team_noti,$limit);
        $data['notifications'] = $notifications;
        $this->load->view('notification/adminactivity',$data);
    }

    function notificationtype($type=NULL){
        $data['type'] = $type;
        $this->load->view('notification/type-notifications',$data);
    }

    function notificationstypeajax(){        
        $limit = $this->get_post('limit');        
        $public_noti = array('whatshappening','job','events','event_message','general_message','company','testimonial','general_message');
        $notifications = $this->notification_model->ByType($public_noti,$limit);
        $data['notifications'] = $notifications;
        $this->load->view('notification/type-notifications-list',$data);
    }

    function updateNotification(){

        $data = array(
            'read_flag' => $this->input->post('read'),
        );
         $this->notification_model->updateNotification($data);
    }
    
    function usernotifications(){
        
        $this->load->view('notification/user-notifications');
    }
    
    function usernotificationsajax(){        
        $limit = $this->get_post('limit');        
        
        $notifications = $this->notification_model->SearchLimit(array('notify_user_id'=>  $this->session_user_id),$limit);
        $data['notifications'] = $notifications;
        
        $this->db->query('Update jb_notification set read_flag="read" where  notify_user_id='.$this->session_user_id);
        
        $this->load->view('notification/user-notifications-list',$data);
    }
    
    public function DeleteNotification(){
        
        if(!in_array($this->user_id, CvReviewTeamList())){
            _setError("You don't have permission to access this page");
            redirect(site_url());
            exit;
        }
        
        $notification_id=$this->input->post('id');
        if(intval($notification_id)>0){
            $result = $this->notification_model->Delete($notification_id);
            echo $result;
        }

    }
  }

/* End of file Notifications.php */
/* Location: ./application/controllers/Notifications.php */