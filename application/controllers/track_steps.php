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
            $this->load->model('employment_history_model');
            date_default_timezone_set('Asia/Dubai');
            $this->session_user_id = $this->session->userdata('user_id');            
            
        }
        
        public function index($id){
            LoginCheck();
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$id));
            $pro_details =   $this->member_model->getMembers(array('m_status' =>1,'id' =>$id));
            $data['pro_details'] = $pro_details;
            $data['card_user_id'] = $id;            
            $this->load->view('track-steps/index', $data);
        }
        
        public function sheet($id=0){
            LoginCheck(site_url('login'), current_url());            
            
            if($id>0){
                $this->load->model('companies_users_applylist','apply_list');            
                $user_profile = $this->profile_model->GetById($id);

                if(empty($user_profile)){
                    _setSuccess('Not data exist with provided information');
                    redirect(site_url());
                    exit();
                }

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

                $company_apply_count = $this->apply_list->CountByUser($id);

                $employment_history = $this->employment_history_model->Search(array('user_id'=> $id));    

                $data['employment_history'] = $employment_history;

                $data['profile'] = $user_profile;
                $data['shoutbox_messages'] = $shoutbox_messages;            
                $pro_details =   $this->member_model->getMembers(array('m_status' =>1,'id' =>$id));
                $data['userswot_data'] = $userswot_data;
                $data['pro_details'] = $pro_details;
                $data['sheet_user_id'] = $id;
                $data['jobportal_count'] = $jobportal_count;
                $data['company_apply_count'] = $company_apply_count;
                $data['recruiters_count'] = $recruiters_count;
                $this->load->view('track-steps/index', $data);
            }else{
                _setError("Invalid member data to view trackingsheet please try again");
                redirect(site_url());
                exit;
            }
        }
        
        public function GetTsheetChat($sheet_user_id){
            $shoutbox_messages = $this->trackingsheet_chat->GetChatList($sheet_user_id);  
            $data['shoutbox_messages'] = $shoutbox_messages;
            $data['sheet_user_id'] = $sheet_user_id;            
            $this->load->view('shoutbox/trackingsheet_chat', $data);
        }
        
        public function PostAdminComment($card_user_id){
            
            LoginCheck(site_url('login'), current_url());
            
            $trackingsheet_admin_comments = $this->get_post('trackingsheet_admin_comments');
            $get_dismissed_by = $this->get_post('dismissed_by',0);
            $dismissed_by = $get_dismissed_by>0 ? $this->session_user_id : 0;
            
            $redirect_url = $this->get_post('redirect_url');
            
            $data['trackingsheet_admin_comments'] = $trackingsheet_admin_comments;            
            if($get_dismissed_by>0){
                $data['dismissed_by'] = $dismissed_by;            
                $data['mentor_id'] = 0;
            }
            
            $this->profile_model->Save($data,$card_user_id);
            redirect(site_url($redirect_url));
            exit();
        }
        
        public function video_cv($card_user_id){
            
            LoginCheck(site_url('login'), current_url());
            
            $video_cv = $this->get_post('video_cv');
            $get_dismissed_by = $this->get_post('dismissed_by',0);
            $dismissed_by = $get_dismissed_by>0 ? $this->session_user_id : 0;
            
            $redirect_url = $this->get_post('redirect_url');
            
            $data['video_cv'] = $video_cv;            
            if($get_dismissed_by>0){
                $data['dismissed_by'] = $dismissed_by;            
                $data['mentor_id'] = 0;
            }
            
            $this->profile_model->Save($data,$card_user_id);
            redirect(site_url($redirect_url));
            exit();
        }
        
        public function numbers($card_user_id) {
        
            LoginCheck(site_url('login'), current_url());
        
            $get_dismissed_by = $this->get_post('dismissed_by', 0);
            $dismissed_by = $get_dismissed_by > 0 ? $this->session_user_id : 0;
        
            $m_phone = $this->get_post('m_phone');
            $m_mobile = $this->get_post('m_mobile');
        
            if (empty($m_phone) && empty($m_mobile)) {
                _setError('You must provide at least one contact number (Phone or Mobile).');
                redirect(current_url());
                exit();
            }
        
            $redirect_url = $this->get_post('redirect_url');
        
            $data = [];
            if (!empty($m_phone)) {
                $data['m_phone'] = $m_phone;
            }
            if (!empty($m_mobile)) {
                $data['m_mobile'] = $m_mobile;
            }
        
            if ($get_dismissed_by > 0) {
                $data['dismissed_by'] = $dismissed_by;
                $data['mentor_id'] = 0;
            }
        
            if (!empty($data)) {
                $this->profile_model->Save($data, $card_user_id);
                _setSuccess('Contact number(s) updated successfully.');
            } else {
                _setError('No data to update.');
            }
        
            redirect(site_url($redirect_url));
            exit();
        }
                
        
        public function whatsapp_number($card_user_id) {

            LoginCheck(site_url('login'), current_url());
        
            $whatsapp_number = $this->get_post('whatsapp_number');
        
            // Ensure whatsapp_number is provided
            if (empty($whatsapp_number)) {
                // Set error message and redirect
                _setError('WhatsApp number is required.');
                redirect(current_url());
                exit();
            }
        
            $redirect_url = $this->get_post('redirect_url');
        
            // Prepare data to update
            $data['whatsapp_number'] = $whatsapp_number;
        
            // Save the data
            $this->profile_model->Save($data, $card_user_id);
        
            // Set success message and redirect
            _setSuccess('WhatsApp number updated successfully.');
            redirect(site_url($redirect_url));
            exit();
        }


        
        public function PostChatMessage($sheet_user_id,$session_user_id){
            
            LoginCheck(site_url('login'), current_url());
            
            $send_email_also = $this->get_post('send_email_also',0);
            
            if($send_email_also>0){
                $ubasic_info = BasicInfoUser($sheet_user_id);
                if(!empty($ubasic_info->m_email)){                    
                    $subject = 'Navafiz | You got a new message on from '.$this->session->userdata('name');
                    $message = "<p>Hello,</p>";
                    $message .= "<p>".$this->session->userdata('name')." Sent you a new message on your Tracking Sheet</p>";
                    $message .= "<p><a href='https://navafiz.com/track_steps/sheet/".$sheet_user_id."'>Click here to view</a></p>";
                    $message .= "<p>--</p>";
                    $message .= "<p>Message from www.navafiz.com</p>";
                    $message .= "#".rand(0,999999);
                    SendMail($ubasic_info->m_email, $subject, $message);
                }
            }            
            
            $sdata['user_id'] = $session_user_id;
            $sdata['sheet_user_id'] = $sheet_user_id;
            $sdata['message'] = $this->get_post('message_text');
            $sdata['parent_id'] = $this->get_post('parent_id');
            $sdata['added_on'] = datenow();

            $user_sess_name = $this->session->userdata('name');
            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = $user_sess_name." Posted a comment on Tracksheet Discussion Board.";
            $noti['noti_desc'] = $this->get_post('message_text');
            $noti['noti_type'] = 'tsheet_message';
            $noti['notify_user_id'] = $sheet_user_id;
            $noti['noti_link'] = site_url("track_steps/sheet/$sheet_user_id");
            AddNotification($noti);
            
            $this->trackingsheet_chat->Save($sdata);
            return true;
        }

        function deletechatmessage($message_id)
        {
            LoginCheck(site_url('login'), current_url());
            
            $user_id = $this->session->userdata('user_id');
            if($user_id==""){ 
                _setError("Please login to access Navafiz Discussion Board");
                redirect(site_url('login')); 
                exit;
            }
            
            $this->trackingsheet_chat->Delete($message_id);
            return true;
        }
        
        function requestformentor($user_id)
        {
            $subject = $this->session->userdata('name').' has Request for assigning a Mentor.';
            $message = "<p>Dear Admin, </p>";
            $message .= "<p>".$this->session->userdata('name')." has requested for assigning a Mentor.</p>";
            $message .= "<p><a href='https://navafiz.com/track_steps/sheet/".$user_id."'>Trackingsheet link</a></p>";
            $message .= "<p>--</p>";
            $message .= "<p>Message from www.navafiz.com</p>";
            
            $from_email='support@navafiz.com';
                    
             $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com', //
                'smtp_port' => 465,        
                'smtp_user' => SMTP_USER, //
                'smtp_pass' => SMTP_PASSWORD, //
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE        
            );      

            $CI =& get_instance();
            $CI->load->library('email', $config);    
            $CI->email->set_mailtype("html");
            $CI->email->from($from_email,'Navafiz Support');
            $CI->email->reply_to($from_email);            
            //$to_emails = array('ali_cs7@yahoo.com','neethu.navafiz@gmail.com','usman@useevs.com');
            $CI->email->to($to_emails);
            $CI->email->subject($subject);
            $CI->email->message($message);                
            $CI->email->send();
            
            $ss['request_for_mentor'] = 1;
            $this->profile_model->Save($ss, $this->session_user_id);
            
            _setSuccess("Your request has been submited Team will contact you shortly.");
            redirect(site_url('track_steps/sheet/'.$user_id)); 
            exit;
        }
        
        function requestjoinprojectuplift($user_id){
            $subject = $this->session->userdata('name').' has Request to Join Project Uplift.';
            $message = "<p>Dear Admin, </p>";
            $message .= "<p>".$this->session->userdata('name')." has requested to Join Project Uplift .</p>";
            $message .= "<p><a href='https://navafiz.com/track_steps/sheet/".$user_id."'>Trackingsheet link</a></p>";
            $message .= "<p>--</p>";
            $message .= "<p>Message from www.navafiz.com</p>";
            
            $from_email='support@navafiz.com';
                    
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com', //
                'smtp_port' => 465,        
                'smtp_user' => SMTP_USER, //
                'smtp_pass' => SMTP_PASSWORD, //
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE        
            );     

            $CI =& get_instance();
            $CI->load->library('email', $config);    
            $CI->email->set_mailtype("html");
            $CI->email->from($from_email,'Navafiz Support');
            $CI->email->reply_to($from_email);            
            //$to_emails = array('ali_cs7@yahoo.com','neethu.navafiz@gmail.com','usman@useevs.com');
            $CI->email->to($to_emails);
            $CI->email->subject($subject);
            $CI->email->message($message);                
            $CI->email->send();
            
            $ss['request_join_projectuplift'] = 1;
            $this->profile_model->Save($ss, $this->session_user_id);
            
            _setSuccess("Your request has been submited Team will contact you shortly.");
            redirect(site_url('track_steps/sheet/'.$user_id)); 
            exit;
        }
        
        
          function requestcvreview($user_id){
            $subject = $this->session->userdata('name').' has Request to Join Project Uplift.';
            $message = "<p>Dear Admin, </p>";
            $message .= "<p>".$this->session->userdata('name')." has requested to Join Project Uplift .</p>";
            $message .= "<p><a href='https://navafiz.com/track_steps/sheet/".$user_id."'>Trackingsheet link</a></p>";
            $message .= "<p>--</p>";
            $message .= "<p>Message from www.navafiz.com</p>";
            
            $from_email='support@navafiz.com';
                    
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com', //
                'smtp_port' => 465,        
                'smtp_user' => SMTP_USER, //
                'smtp_pass' => SMTP_PASSWORD, //
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE        
            );     

            $CI =& get_instance();
            $CI->load->library('email', $config);    
            $CI->email->set_mailtype("html");
            $CI->email->from($from_email,'Navafiz Support');
            $CI->email->reply_to($from_email);            
            //$to_emails = array('ali_cs7@yahoo.com','neethu.navafiz@gmail.com','usman@useevs.com');
            $CI->email->to($to_emails);
            $CI->email->subject($subject);
            $CI->email->message($message);                
            $CI->email->send();
            
            //END OF EMAILL...
            
            $ss['resume_review_request'] = 1;
            $this->profile_model->Save($ss, $this->session_user_id);
            
            _setSuccess("Your request has been submited Team will contact you shortly.");
            redirect(site_url('track_steps/sheet/'.$user_id)); 
            exit;
        }
        
        
        
         function profile_approval($user_id,$a_id){
             
            $user_details = $this->profile_model->GetById($user_id);
            $username = $user_details->m_name;

            $ss['profile_mentors_approved'] = 1;
            $ss['profile_mentors_approved_by'] = $a_id;
            
           
 
            $this->profile_model->Save($ss, $user_id);
            
            _setSuccess("Your request has been submited Team will contact you shortly.");
            redirect(site_url('n/'.$user_id)); 
            exit;
        }
        
                 function requestcvwriting($user_id){
            $subject = $this->session->userdata('name').' has Request to Join Project Uplift.';
            $message = "<p>Dear Admin, </p>";
            $message .= "<p>".$this->session->userdata('name')." has requested to Join Project Uplift .</p>";
            $message .= "<p><a href='https://navafiz.com/track_steps/sheet/".$user_id."'>Trackingsheet link</a></p>";
            $message .= "<p>--</p>";
            $message .= "<p>Message from www.navafiz.com</p>";
            
            $from_email='support@navafiz.com';
                    
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com', //
                'smtp_port' => 465,        
                'smtp_user' => SMTP_USER, //
                'smtp_pass' => SMTP_PASSWORD, //
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE        
            );     

            $CI =& get_instance();
            $CI->load->library('email', $config);    
            $CI->email->set_mailtype("html");
            $CI->email->from($from_email,'Navafiz Support');
            $CI->email->reply_to($from_email);            
            //$to_emails = array('ali_cs7@yahoo.com','neethu.navafiz@gmail.com','usman@useevs.com');
            $CI->email->to($to_emails);
            $CI->email->subject($subject);
            $CI->email->message($message);                
            $CI->email->send();
            
            $ss['resume_writing_request'] = 1;
            $this->profile_model->Save($ss, $this->session_user_id);
            
            _setSuccess("Your request has been submited Team will contact you shortly.");
            redirect(site_url('track_steps/sheet/'.$user_id)); 
            exit;
        }
        
        public function UpdateMentor($profile_id)
        {
            $mentor_id = $this->input->post('mentor_id');
            $redirect_url = $this->input->post('redirect_url');
            $is_mentor = $this->input->post('is_mentor'); // checkbox value
        
            // Prepare update data
            $data = [
                'mentor_id' => $mentor_id,
                'mentor_assigned_date' => date('Y-m-d') // only date
            ];
            if (!empty($data['mentor_id']) && $data['mentor_id'] != 0) {
                // Update candidate's mentor info
                $this->db->where('m_id', $profile_id);
                $this->db->update('jb_member', $data);
            }
            // Update the role_id (2 if checked, 0 if unchecked)
            $role_id = ($is_mentor) ? 2 : 0;
            $this->db->where('m_id', $profile_id);
            $this->db->update('jb_member', ['role_id' => $role_id]);
        
            $this->session->set_flashdata('success', 'Mentor updated successfully!');
            redirect($redirect_url);
        }



        
        
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */