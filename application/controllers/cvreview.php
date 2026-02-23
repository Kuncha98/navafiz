<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cvreview extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->model('member_model');
            $this->load->model('profile_model');
            $this->load->model('cvreview_points_model');
            $this->load->model('cvreview_model');
            $this->load->model('cvreview_userpoints_model');
            date_default_timezone_set('Asia/Dubai');
            
            $this->user_id = $this->session->userdata('user_id');
            $this->session_user_id = $this->user_id;
            if($this->user_id==""){
                redirect(site_url('login'));
                exit;
            }
            
            $this->user_detail = GetUserDetails($this->user_id);
            
            if(empty(trim($this->user_detail->m_current_city)) || substr_count($this->user_detail->m_skills, ",")<2){
                _setError("Complete your profile to access this page");
                redirect(site_url('edit-profile'));
                exit;
            }
        }
        
        public function index(){
            
            $user_detail = GetUserDetails($this->user_id);
            $current_review = $this->cvreview_model->Search(array('member_id'=>$this->user_id));
            $data['profile'] = $user_detail;
            $data['current_review'] = $current_review;
            
            $this->load->view('cvreview/cvreview-mainpage', $data);
                
        }
        
        public function downloadCV($member_cv,$role_id,$user_id,$user_name) {
            $name = str_replace("%20",' ',$user_name);
//            echo $split_name;exit();
            $data['user_id'] = $user_id;
            $data['noti_title'] = $name.' has Downloaded CV';
            $data['noti_desc'] = $name.' has Downloaded CV';
            $data['noti_link'] = $role_id == '9' ? redirect(site_url('public-assets/blueusersfiles/'.$member_cv)) : site_url('public-assets/cvreviews/'.$member_cv);
            $data['noti_type'] = 'cvreview';
            $data['added_on'] = date('Y-m-d H:i:s');
            
            sendNotificationToAdmin($data);
            
            if($role_id == '9'){
                redirect(site_url('public-assets/blueusersfiles/'.$member_cv));
            }else{
                redirect(site_url('public-assets/cvreviews/'.$member_cv));
            }
        }
        
        public function CvreviewReport($user_id){
            
            $current_review = $this->cvreview_model->GetByUserId($user_id);
            $user_details = $this->member_model->userDetail(array('user_id' =>$user_id));
            $data['profile'] = $user_details;
            $data['current_review'] = $current_review;
            
            $this->load->view('cvreview/cvreview-report', $data);
                
        }
        
        public function CvReviewsList(){
            
            if(!in_array(intval($this->user_id), CvReviewTeamList())){
                _setError("You're not Authorized to access this page");
                redirect(site_url());
                exit;
            }
            
            $cvreviews_list  = $this->cvreview_model->DataCount();
            $data['cvreviews_list'] = $cvreviews_list;            
            $this->load->view('cvreview/cvreviews-list', $data);
                
        }

    function cvreviewsajax(){
        
        $limit = $this->get_post('limit');
        $review_status = $this->get_post('review_status');
        $cvreviews_list = $this->cvreview_model->GetByAjax($limit,$review_status);
        $data['cvreviews_list'] = $cvreviews_list;
        $this->load->view('cvreview/cvreview-ajax-list',$data);
    }
        
        function SubmitCvReview(){
            

            $data = array(
                'read_21_points' => 1
            );
            $this->member_model->Save($data,$this->user_id);
            $cvr_points = $this->cvreview_points_model->GetAll();

            $data['cvr_points'] = $cvr_points;
            $this->load->view('cvreview/submit-cv-review', $data);
        
        }

        function updateSampleResume(){
          $data = array(
                'sample_resume' => 1
            );
            $this->member_model->Save($data,$this->user_id);  
        }
        
        function AddCvReview(){
            
            /*if(!in_array($this->user_detail->m_current_city, array('Abu Dhabi', 'Dubai','Sharjah','Al Ain','Ajman','Ras Al Khaimah','Fujairah City','Umm al-Quwain'))){
                _setError("Only UAE Based members can submit cv review");
                redirect(site_url());
                exit;
            }*/
            
            $cvr_points = $this->cvreview_points_model->GetAll();        
            $data['cvr_points'] = $cvr_points;
            $this->load->view('cvreview/add-cv-review', $data);
        
        }
        
        function UpdateCvReview($user_id){
            
            if(!in_array($this->session_user_id, CvReviewTeamList())){
                _setError("You don't have permission to access this page");
                redirect(site_url());
                exit();
            }
            
            $review_id = $this->get_post('review_id');
            $do_post = intval($this->get_post('do_post',0));
            $current_review = $this->cvreview_model->GetByUserId($user_id);
        
            if($do_post>0){
                $mentor = GetUserDetails($current_review->assign_user_to);
                $mentor_name = $mentor->m_name;
                
                $session_name = $this->session->userdata('name');
                $admin_comments = $this->get_post('admin_comments');
                
                $data['comment_by'] = $user_id;
                $data['admin_comments'] = $admin_comments;
                $data['updated_on'] = date('Y-m-d H:i:s');
                $data['review_status'] = 'commented';
                
                if($this->cvreview_model->Save($data,$review_id))
                {
                    
                    $noti['user_id'] = $this->session_user_id;
                    $noti['noti_title'] = $session_name." has post comment on Resume for review ";
                    $noti['noti_desc'] = $session_name." has post comment on Resume  for review ";                    
                    $noti['noti_type'] = 'cvreview';
                    $noti['notify_user_id'] = $user_id;
                    $noti['noti_link'] = site_url('cvreport/'.$user_id);
                    AddNotification($noti);
                    
                    _setSuccess('Cv Review Updated Successfully');
                }else{
                    _setError('Unable to completed request');
                }
                
                redirect(site_url('cvreport/'.$user_id));
                exit();
            }
            
            $cvr_points = $this->cvreview_points_model->GetAll();        
            $data['cvr_points'] = $cvr_points;
            $data['review_id'] = $review_id;
            $data['current_review'] = $current_review;
            $this->load->view('cvreview/update-cv-review', $data);
        
        }
        
        
        function PostCvReview(){
            
            $file_ext=preg_split("/\./", $_FILES["resume_file"]["name"]);
            $file_ext1=$file_ext[count($file_ext)-1];
            $file_name = preg_replace('/\s/', '-', $this->session->userdata('name'))."_".$this->session->userdata('user_id').".".$file_ext1;
            
            $session_name = $this->session->userdata('name');
            $review_title = $this->get_post('review_title');
            $user_comments = $this->get_post('user_comments');
            
            $config = array('upload_path'=> 'public-assets/cvreviews/', 'allowed_types' => 'doc|docx|pdf','file_name'=>$file_name,'overwrite'=>TRUE);
            $this->load->library('upload', $config);                    
            $this->upload->initialize($config);

            if($this->upload->do_upload('resume_file')){
                $udata = array('upload_data' => $this->upload->data());                        
                $resume_file = $udata['upload_data']['file_name'];
               
                $data['member_id'] = $this->user_id;
                //$data['review_title'] = $review_title;
                //$data['user_comments'] = $user_comments;
                $data['resume_file'] = $resume_file;                
                $data['added_on'] = date('Y-m-d H:i:s');
                
                
                $this->cvreview_model->DeleteByUserid($this->user_id);
                
                if($this->cvreview_model->Save($data)){
                    $this->profile_model->Save(array('member_cv'=>$resume_file),$this->user_id);                    
                    
                    $noti['user_id'] = $this->session_user_id;
                    $noti['noti_title'] = "Uploaded Resume for review";
                    $noti['noti_desc'] = $session_name." has uploaded Resume for review.";
                    $noti['noti_type'] = 'cvreview';
                    $noti['noti_link'] = site_url('cvreport/'.$this->user_id);
                    AddNotification($noti);

                    $data = array(
                        'upload_resume' => 1
                    );
            
                    $this->member_model->Save($data,$this->user_id);
                    _setSuccess('Your CV has been submitted. Navafiz expert will review and provide feedback. Please check your report after 5 days ... under Report section. <br >alternatively you can whatsapp on +971 55 446 5332.');
                }else{  
                    _setError("Unable to Process Your Request");
                }
            }else{
                $return = array('error' => $this->upload->display_errors());
                _setError($this->upload->display_errors());
            }
            
            redirect(site_url('cvreview'));
            exit;            
        }
        
        function ApprovReview($review_id){

            if(!in_array($this->user_id,  CvReviewTeamList())){
                _setError("You don't have access for this page");
                redirect(site_url());
                exit();
            }
            
            $session_name = $this->session->userdata('name');
            $current_review = $this->cvreview_model->GetById($review_id);
            $mentor_name = GetUserDetails($this->user_id)->m_name;
            $data['review_status'] = 'review_done';
            if($this->cvreview_model->Save($data,$review_id))
            {
                
                $noti['user_id'] = $this->session_user_id;
                $noti['noti_title'] = "CV approved by ".$mentor_name;
                $noti['noti_desc'] = "CV approved by ".$mentor_name;
                $noti['noti_type'] = 'cvreview';
                $noti['notify_user_id'] = $current_review->member_id;
                $noti['noti_link'] = site_url('cvreport/'.$current_review->member_id);
                AddNotification($noti);

                _setSuccess('Cv Review Approved Successfully');
            }else{
                _setError('Unable to completed request');
            }

            redirect(site_url('cvreviews-list'));
            exit();
        }
        
        function DisApprove($review_id){

            if(!in_array($this->user_id,  CvReviewTeamList())){
                _setError("You don't have access for this page");
                redirect(site_url());
                exit();
            }
            
            $session_name = $this->session->userdata('name');
            $current_review = $this->cvreview_model->GetById($review_id);
            $mentor_name = GetUserDetails($this->user_id)->m_name;
            $data['review_status'] = 'review_inprocess';
            $data['admin_comments'] = '';
            $data['updated_on'] = datenow();            
            
            if($this->cvreview_model->Save($data,$review_id))
            {
                
                $noti['user_id'] = $this->session_user_id;
                $noti['noti_title'] = "CV Disapproved by ".$mentor_name;
                $noti['noti_desc'] = "CV Disapproved by ".$mentor_name;
                $noti['noti_type'] = 'cvreview';
                $noti['notify_user_id'] = $current_review->member_id;
                $noti['noti_link'] = site_url('cvreport/'.$current_review->member_id);
                AddNotification($noti);

                _setError('Cv Review DisApproved Successfully');
            }else{
                _setError('Unable to completed request');
            }

            redirect(site_url('cvreviews-list'));
            exit();
        }
        
function AssignCvReview() {
    
    // Check if the user has access to this page
    if (!in_array($this->user_id, CvReviewTeamList())) {
        _setError("You don't have access for this page");
        redirect(site_url());
        exit();
    }
    
    // Retrieve posted data
    $review_id = intval($this->get_post('review_id'));
    $assign_user_to = intval($this->get_post('assign_user_to'));
    $member_id = intval($this->get_post('member_id'));
    
    $redirect_page = $this->get_post('redirect_page', '');

    // Prepare data for saving
    $data['assign_user_to'] = $assign_user_to; // This will be set to NULL later if necessary
    $data['assigned_date'] = datenow();
    $assign_user = BasicInfoUser($assign_user_to); // Fetch user info
    $session_name = $this->session->userdata('name');

    // Check if assign_user_to is empty or null
    if (empty($assign_user_to)) {
        // Update the database to set assign_user_to to NULL
        $data['assign_user_to'] = null;
        $data['assigned_date'] = null; // Set assigned_date to null if no user is assigned
    } else {
        // Check if assign_user is a valid object
        if (!$assign_user || !isset($assign_user->m_name)) {
            _setError('Assigned user not found or invalid.');
            redirect(site_url());
            exit();
        }
    }

    // Save assignment data
    $return = $this->cvreview_model->Save($data, $review_id);
    
    if ($return) {
        // Cleanup old assignments
        $this->db->query('UPDATE jb_cvreview SET `assign_user_to`=0, `assigned_date`=null WHERE DATE(assigned_date) < DATE_SUB(CURDATE(), INTERVAL 5 DAY) AND review_status NOT IN ("review_done", "commented")');

        // Prepare notification only if a valid user is assigned
        if (!empty($assign_user_to) && $assign_user) {
            // Prepare notification
            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = "A Resume has been assigned to " . $assign_user->m_name . ' for review';
            $noti['noti_desc'] = "A Resume has been assigned to " . $assign_user->m_name . ' for review';
            $noti['noti_type'] = 'cvreview';
            $noti['notify_user_id'] = $assign_user->m_id;
            $noti['noti_link'] = site_url('teamactions/index/' . $assign_user->m_id);
            AddNotification($noti);

            // Send email notification if the user has an email
            if (!empty($assign_user->m_email)) {
                $subject = 'You have been assigned a new Resume for Review by ' . $session_name;
                $message = "<p>Dear " . $assign_user->m_name . ",</p>";
                $message .= "<p>" . $session_name . " assigned you a new Resume for Review</p>";
                $message .= "<p><a href='https://navafiz.com/teamactions/index/" . $assign_user_to . "'>Take Action</a></p>";
                $message .= "<p>--</p>";
                $message .= "<p>Message from www.navafiz.com</p>";
                $message .= "#" . rand(0, 999999);
                SendMail($assign_user->m_email, $subject, $message);
            }
        }

        _setSuccess('Request Completed Successfully');
        
    } else {
        _setError('Unable to complete request, please try again');
    }
    
    // Redirect based on the specified page
    if ($redirect_page == 'detail') {
        redirect(site_url('cvreport/' . $member_id));             
    } else {
        redirect(site_url('cvreviews-list#rownum' . $review_id));
    }
    
    exit;
}
        function AssignMentor(){
            
            if(!in_array($this->user_id,  CvReviewTeamList())){
                _setError("You don't have access for this page");
                redirect(site_url());
                exit();
            }
            
            $mentor_id = $this->get_post('mentor_id');
            $to_member_id = $this->get_post('to_member_id');
            
            $to_member = BasicInfoUser($to_member_id);
            
            if($mentor_id>0){
                $mentor_info = BasicInfoUser($mentor_id);            
            }
            
            $session_name = $this->session->userdata('name');
        
            $this->profile_model->Save(array('mentor_id'=>$mentor_id,'mentor_assigned_date'=>  datenow()),$to_member_id);
            
            if($mentor_id>0){
                
                $user_id = $this->session_user_id;
                $noti['user_id'] = $this->session_user_id;
                $noti['noti_title'] = $session_name." has assigned ".$mentor_info->m_name." As mentor for ".$to_member->m_name;
                $noti['noti_desc'] = $session_name." has assigned ".$mentor_info->m_name." As mentor for ".$to_member->m_name;
                $noti['noti_type'] = 'mentors';
                $noti['notify_user_id'] = $mentor_info->m_id;            
                $noti['noti_link'] = site_url('profile/'.$to_member_id);
                AddNotification($noti);

                if(!empty($mentor_info->m_email)){
                    $subject = 'You have been assigned as Mentor for '.$to_member->m_name;
                    $message = "<p>Dear ".$mentor_info->m_name.",</p>";
                    $message .= "<p>You have been assigned as Mentor for ".$to_member->m_name." </p>";
                    $message .= "<p>1- Please remind the candidate if his profile is incomplete or Resume is not uploaded in the System.</p>";
                    $message .= "<p>2- Please review his resume, if uploaded in the system and approve or disapprove based on your analysis and comments.</p>";
                    $message .= "<p>3- If required you can assign someone else as Resume reviewer or Mentor for candidates. </p>";
                    $message .= "<p><a href='https://navafiz.com/track_steps/sheet/".$user_id."'>Checkout Profile completion via Trackingsheet</a></p>";
                    $message .= "<p>Thanks for being a great Mentor and supporting the professional community.</p>";
                    $message .= "<p>Regards, <br /> Navafiz System Generated Message. <br /> For any issues email to Neethu Anzar or Liaqat Ali</p>";
                    $message .= "<p>--</p>";
                    $message .= "<p>Message from www.navafiz.com</p>";
                    $message .= "#".rand(0,999999);
                    SendMail($mentor_info->m_email, $subject, $message);                    
                }
            }
            
            _setSuccess("Mentor Assigned Successfully");
            redirect(site_url('track_steps/sheet/'.$to_member_id));
            exit();
        }
        public function download_cv($filename) {
            // Ensure user is logged in
            if (!$this->session->userdata('logged_in')) {
                show_error('Unauthorized access', 403);
            }
        
            // Define the private CV path
            $cv_path = site_url('public-assets/cvreviews/'.$filename);
        
            // Check if file exists
            if (!file_exists($cv_path)) {
                show_404();
            }
        
            // Load the file helper and force download
            $this->load->helper('download');
            force_download($cv_path, NULL);
        }

}

/* End of file front.php */
/* Location: ./application/controllers/front.php */