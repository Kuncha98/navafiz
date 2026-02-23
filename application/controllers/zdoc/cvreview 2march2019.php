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
            if($this->user_id==""){
                redirect(site_url('login'));
                exit;
            }
            
            $user_detail = GetUserDetails($this->user_id);
            
            if(empty(trim($user_detail->m_current_city)) || substr_count($user_detail->m_skills, ",")<2){
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
        public function CvreviewReport(){
            
            $current_review = $this->cvreview_model->GetByUserId($this->user_id);
            $user_details = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['profile'] = $user_details;
            $data['current_review'] = $current_review;
            
            $this->load->view('cvreview/cvreview-report', $data);
                
        }
        
        public function CvReviewsList(){
            
            if(!in_array($this->user_id, CvReviewTeamList())){
                _setError("You're not Authorized to access this page");
                redirect(site_url());
                exit;
            }
            
            $cvreviews_list  = $this->cvreview_model->GetAll();
            $user_details = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['profile'] = $user_details;
            $data['cvreviews_list'] = $cvreviews_list;
            
            $this->load->view('cvreview/cvreviews-list', $data);
                
        }
        
        function SubmitCvReview(){
            $cvr_points = $this->cvreview_points_model->GetAll();        
            $data['cvr_points'] = $cvr_points;
            $this->load->view('cvreview/submit-cv-review', $data);
        
        }
        
        function AddCvReview(){
        
            $cvr_points = $this->cvreview_points_model->GetAll();        
            $data['cvr_points'] = $cvr_points;
            $this->load->view('cvreview/add-cv-review', $data);
        
        }
        
        function UpdateCvReview($user_id){
            
            $review_id = $this->get_post('review_id');
            $do_post = intval($this->get_post('do_post',0));
            
            if($do_post>0){
                
                $admin_comments = $this->get_post('admin_comments');
                
                $data['comment_by'] = $user_id;
                $data['admin_comments'] = $admin_comments;
                $data['updated_on'] = date('Y-m-d H:i:s');
                $data['review_status'] = 'commented';
                
                if($this->cvreview_model->Save($data,$review_id))
                {
                    _setSuccess('Cv Review Updated Successfully');
                }else{
                    _setError('Unable to completed request');
                }
                
                redirect(site_url('cvreport/'.$user_id));
                exit();
            }
            $current_review = $this->cvreview_model->GetByUserId($user_id);
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
            
            $data['review_status'] = 'review_done';
            if($this->cvreview_model->Save($data,$review_id))
            {
                _setSuccess('Cv Review Approved Successfully');
            }else{
                _setError('Unable to completed request');
            }

            redirect(site_url('cvreviews-list'));
            exit();
        }
        
        function AssignCvReview(){
            
            $review_id = intval($this->get_post('review_id'));
            $assign_user_to = intval($this->get_post('assign_user_to'));
            
            $data['assign_user_to'] = $assign_user_to;
            $return = $this->cvreview_model->Save($data,$review_id);
            if(count($return)>0){
                _setSuccess('Request Completed Successfully');
            }else{
                _setError('Unable to compelte request please try again');
            }
            
            redirect(site_url('cvreviews-list#rownum'.$review_id));
            exit;
        }
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */