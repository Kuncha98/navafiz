<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cvreview extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->model('member_model');
            $this->load->model('cvreview_points_model');
            $this->load->model('cvreview_model');
        }
        
        public function index(){
            
            $user_id = $this->session->userdata('user_id');
            if($user_id == ""){
                _setError("Please login to access this page");
                redirect(site_url('login'));
                exit;
            } 		
            
            
            $current_review = $this->cvreview_model->Search(array('member_id'=>$user_id));
            $user_details = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            
            if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city) || substr_count($user_detail->m_skills, ",")<2){
                _setError("Complete your profile to access this page");
                redirect(site_url('edit-profile'));
                exit;
            }
            
            $data['profile'] = $user_details;
            $data['current_review'] = $current_review;
            
            $this->load->view('cvreview/cvreview-mainpage', $data);
                
        }
        public function CvreviewReport(){
            
            $user_id = $this->session->userdata('user_id');
            if($user_id == ""){
                _setError("Please login to access this page");
                redirect(site_url('login'));
                exit;
            }
            
            $current_review = $this->cvreview_model->GetByUserId($user_id);
            $user_details = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['profile'] = $user_details;
            $data['current_review'] = $current_review;
            
            $this->load->view('cvreview/cvreview-report', $data);
                
        }
        
        public function CvReviewsList(){
            
            $user_id = $this->session->userdata('user_id');
            if(!in_array($user_id, array(10,3478,3346,3797)) ||  $user_id == ""){
                _setError("You're not Authorized to access this page");
                redirect(site_url());
                exit;
            }
            
            
            $cvreviews_list  = $this->cvreview_model->Search(array('review_status'=>'review_inprocess'));
            $user_details = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['profile'] = $user_details;
            $data['cvreviews_list'] = $cvreviews_list;
            
            $this->load->view('cvreview/cvreviews-list', $data);
                
        }
        
        function SubmitCvReview(){
        
            if($this->session->userdata('user_id')==""){
                redirect(site_url('login'));
                exit;
            }
            
            $cvr_points = $this->cvreview_points_model->GetAll();        
            $data['cvr_points'] = $cvr_points;
            $this->load->view('cvreview/submit-cv-review', $data);
        
        }
        
        function UpdateCvReview($user_id){
            $review_id = $this->get_post('review_id');
            if($user_id==""){
                redirect(site_url('login'));
                exit;
            }
            
            $do_post = intval($this->get_post('do_post',0));
            
            if($do_post>0){
                
                $admin_comments = $this->get_post('admin_comments');
                
                $data['comment_by'] = $user_id;
                $data['admin_comments'] = $admin_comments;
                $data['updated_on'] = date('Y-m-d H:i:s');
                
                if($this->cvreview_model->Save($data,$review_id))
                {
                    _setSuccess('Cv Review Updated Successfully');
                }else{
                    _setError('Unable to completed request');
                }
                
                redirect(site_url('cvreviews-list'));
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
            
            $user_id = $this->session->userdata('user_id');
            if(empty($user_id)){ redirect(site_url('login')); exit;}
            
            $review_title = $this->get_post('review_title');
            $user_comments = $this->get_post('user_comments');
            
            $config = array('upload_path'=> 'public-assets/cvreviews/', 'allowed_types' => 'doc|docx|pdf','file_name'=>'cv_review'.time(),'overwrite'=>TRUE);
            $this->load->library('upload', $config);                    
            $this->upload->initialize($config);

            if($this->upload->do_upload('resume_file')){
                $udata = array('upload_data' => $this->upload->data());                        
                $resume_file = $udata['upload_data']['file_name'];
               
                $data['member_id'] = $user_id;
                $data['review_title'] = $review_title;
                $data['user_comments'] = $user_comments;
                $data['resume_file'] = $resume_file;
                $data['added_on'] = date('Y-m-d H:i:s');
                
                $this->cvreview_model->DeleteByUserid($user_id);
                
                if($this->cvreview_model->Save($data)){
                    _setSuccess('Your Cv has been submitted we will update you shortly alternativly you can whatsapp on +971 554465332');
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
        
        
	
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */