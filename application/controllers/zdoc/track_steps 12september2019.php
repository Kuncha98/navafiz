<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Track_steps extends CI_Controller {
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('member_model');
            $this->load->model('Profile_model','profile_model');
            $this->load->model('cvreview_points_model');
            $this->load->model('cvreview_model');
            $this->load->model('trackingsheet_chat');
            $this->load->model('member_job_portals');
            $this->load->model('member_recruiters');
            date_default_timezone_set('Asia/Dubai');
        }
        
        public function index($id){
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$id));
            $pro_details =   $this->member_model->getMembers(array('m_status' =>1,'id' =>$id));
            $data['pro_details'] = $pro_details;
            $data['card_user_id'] = $id;
            $this->load->view('track-steps/index', $data);
        }
        
        public function sheet($id){
            $user_profile = $this->member_model->userDetail(array('user_id' =>$id));
            $this->load->model('swot_model');            
            $userswot_data = $this->swot_model->Search(array('member_id'=>$id));
            
            $shoutbox_messages = $this->trackingsheet_chat->Search(array('sheet_user_id'=>$id));
            
            //Get Job portal Count
            $jobportal_count = 0;
            $user_job_portal =  $this->member_job_portals->Search(array('user_id'=>$id));
            if(count($user_job_portal)>0){
                $user_job_portal = (array) $user_job_portal[0];
                unset($user_job_portal['id'],$user_job_portal['user_id'],$user_job_portal['added_on'],$user_job_portal['updated_on']);
                $jobportal_count = count(array_filter($user_job_portal));
            }
            
            //Get Job Recruiters
            $recruiters_count = 0;
            $user_recruiters =  $this->member_recruiters->Search(array('user_id'=>$id));
            if(count($user_recruiters)>0){
                $user_recruiters = (array) $user_recruiters[0];
                unset($user_recruiters['id'],$user_recruiters['user_id'],$user_recruiters['added_on'],$user_recruiters['updated_on']);
                $recruiters_count = count(array_filter($user_recruiters));
            }
            
            
            
            
            
            
            $data['profile'] = $user_profile;
            $data['shoutbox_messages'] = $shoutbox_messages;            
            $pro_details =   $this->member_model->getMembers(array('m_status' =>1,'id' =>$id));
            $data['userswot_data'] = $userswot_data;
            $data['pro_details'] = $pro_details;
            $data['card_user_id'] = $id;
            $data['jobportal_count'] = $jobportal_count;
            $data['recruiters_count'] = $recruiters_count;
            $this->load->view('track-steps/index', $data);
        }
        
        public function PostAdminComment($card_user_id){
            
            $trackingsheet_admin_comments = $this->get_post('trackingsheet_admin_comments');
            $data['trackingsheet_admin_comments'] = $trackingsheet_admin_comments;
            
            $this->profile_model->Save($data,$card_user_id);
            redirect(site_url('track_steps/sheet/'.$card_user_id));
            exit();
        }
        public function PostChatMessage($sheet_user_id,$session_user_id){
            
            $sdata['user_id'] = $session_user_id;
            $sdata['sheet_user_id'] = $sheet_user_id;
            $sdata['message'] = $this->get_post('message_text');            
            $sdata['added_on'] = datenow();
            
            $this->trackingsheet_chat->Save($sdata);
            redirect(site_url('track_steps/sheet/'.$sheet_user_id));
            exit();
        }
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */