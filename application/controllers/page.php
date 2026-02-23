<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
    var $limit  = 12; var $offset = 0; var $pages  = 7;
	public $global_array; 
	function __construct()
        {
            parent::__construct();
            $this->load->model('front_model');
            $this->load->model('page_model');
            $this->load->model('member_model');
            $this->load->model('social_groups_model');
            $this->load->model('socialgroups_subscribers');
            
            $d = $this->front_model->getSettings();
            foreach($d as $c)
            {
                $this->global_array[$c->option] = $c->value;
            }
            
            $this->user_id = $this->session->userdata('user_id');
        }
	
	function faqs(){
            
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['faqs'] = $this->page_model->getFaqs(array('status' => 1, 'language_id'=>$this->session->userdata('SessLangID')));
            $this->load->view('faqs', $data);
        }
	function mail(){
            $this->load->view('pages/mail');
        }
	function index()
        {
            
            $slug = $this->uri->segment(2);
            if($slug=='social-media' || $slug=='resume'){
                if($this->session->userdata('user_id') == ""){
                    $this->session->set_flashdata('msg','You must login to view this page!');
                    redirect('login');
                    exit();
                }
            }
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['page'] = $this->page_model->getPage(array('status' => 1, 'slug' => $slug));		 
  //           echo "<pre>";
  // print_r($data['page']);
  // die();
            $this->load->view('page',$data);
        }
		
	function live()
        {            
            //$slug = $this->uri->segment(2);
            $data['live'] = $this->page_model->getLive(array());		 
            //print_r($data['live']);
            $data['video_right'] = $this->banner_model->getBanners(array('position' =>'video_right','limit' =>'1','status' =>'1'));
            $data['latest_videos'] = $this->video_model->geLatestVideos(array('limit' =>'4'));
            $this->load->view('live',$data);
        }	
        
        function social_media(){
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            
            if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
                _setError("Complete your profile to access Social Media Groups");
                redirect(site_url('edit-profile'));
                exit;
            }
            
            $data['profile'] = $user_detail;
            $data['pagename'] = "home";
            $this->load->view('social-media/social-media-links', $data);
        }
        
        function SocialGroupDetail($social_group_id){
            
            $user_id = $this->session->userdata('user_id');
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$user_id));
            
            if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
                _setError("Complete your profile to access Social Media Groups");
                redirect(site_url('profile'));
                exit;
            }
            
            //check for Engeerning group
           if($social_group_id==1){
               if(!in_array($user_detail->m_category, array(16,9,8,52,37,53,49))){
                   _setError('Please complete your profile to join this group');
                   redirect(site_url('social-media'));
                   exit();
               }
           }
           
            //check for Finace group
           if($social_group_id==2){
               if(!in_array($user_detail->m_category, array(53,1))){
                   _setError('Only Banking & Finance Related members can join this group');
                   redirect(site_url('social-media'));
                   exit();
               }
           }
           
            //check for HSC group
           if($social_group_id==9){               
                if(!in_array($user_detail->m_category, array(52,8))){
                   _setError('Only Relevant members can join this group');
                   redirect(site_url('social-media'));
                   exit();
               }
           }
            //check for hr group
           if($social_group_id==6){
               //if(($user_detail->m_category!=25 && $user_detail->m_category!=28) && ($user_detail->m_category!=3 && $user_detail->m_category!=9)){
               if(!in_array($user_detail->m_category, array(25,28,3,9,8))){
                   _setError('Only Relevant members can join this group');
                   redirect(site_url('social-media'));
                   exit();
               }
           }
           
            //check for HSC group
           if($social_group_id==11){
               if($user_detail->m_category!=50){
                   _setError('Only Relevant members can join this group');
                   redirect(site_url('social-media'));
                   exit();
               }
           }
           
            //check for HSC group
           if($social_group_id==12){
               if($user_detail->m_category!=41){
                   _setError('Only Relevant members can join this group');
                   redirect(site_url('social-media'));
                   exit();
               }
           }
           
           if($social_group_id==13){
               if($user_detail->m_category!=47){
                   _setError('Only Relevant members can join this group');
                   redirect(site_url('social-media'));
                   exit();
               }
           }
           
           if($social_group_id==14){
               if(!in_array($user_detail->m_category, array(16,9,8,52,37,53,49))){               
                   _setError('Only Relevant members can join this group');
                   redirect(site_url('social-media'));
                   exit();
               }
           }
           
           if($social_group_id==20){
               if(!in_array($user_detail->m_category, array(16,9,8,52,37,53,49))){
                   _setError('Only Relevant members can join this group');
                   redirect(site_url('social-media'));
                   exit();
               }
           }
           
            
            $group_info = $this->social_groups_model->GetById($social_group_id);
            $group_subscribers = $this->socialgroups_subscribers->Search(array('social_group_id'=>$social_group_id));
           
            $data['group_info'] = $group_info;
            $data['group_subscribers'] = $group_subscribers;
            $data['pagename'] = "Social";
            $this->load->view('social-media/social-group', $data);
        }
        
        function JoinSocialGroup($social_group_id){
            
            LoginCheck(site_url('login'), current_url());
            
            $user_id = $this->session->userdata('user_id');
                    
            //socialgroups_subscribers
            $user_detail = $this->member_model->userDetail(array('user_id' =>$user_id));
            
            if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
                _setError("Complete your profile to access Social Media Groups");
                redirect(site_url('profile'));
                exit;
            }
            
            $get_exist = $this->socialgroups_subscribers->Search(array('user_id'=>$user_id,'social_group_id'=>$social_group_id));
            
            if(count($get_exist)==0){
                
                $add_subcriber['user_id'] = $user_id;
                $add_subcriber['social_group_id'] = $social_group_id;
                $add_subcriber['added_on'] = date('Y-m-d H:i:s');
                
                $return = $this->socialgroups_subscribers->Save($add_subcriber);
                
                
            }
            
            $group_info = $this->social_groups_model->GetById($social_group_id);
            
            $group_info->group_link;    
            redirect($group_info->group_link);
            exit;
            
        }
        
        
        
        function my_profile(){
            
            $data['pagename'] = "home";
            $this->load->view('pages/my-profile', $data);
        }
        
        function edit_profile(){
            
            $data['pagename'] = "home";
            $this->load->view('profile/edit-profile-tabs', $data);
        }
        
        function find_job(){
            
            LoginCheck(site_url('login'), current_url());
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            
            /*if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
                redirect(site_url('profile'));
                exit;
            }*/
            
            $data['profile'] = $user_detail;
            $data['pagename'] = "home";
            $this->load->view('pages/find-job-tabs', $data);
        }
        function Job_Seeker_Support_System(){
            
            $retun = LoginCheck(site_url('login'), current_url());
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['session_user_id']  = $this->session->userdata('user_id');
            
            /*if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
                redirect(site_url());
                exit;
            }*/
            
            $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));
            $data['profile'] = $user_detail;
            $data['pagename'] = "home";
            $this->load->view('pages/job-seekers-support-system', $data);
        }
        function recruiters_support_sysetm(){
            
            $retun = LoginCheck(site_url('login'), current_url());
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            
            if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
                redirect(site_url('profile'));
                exit;
            }
            $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));
            $data['profile'] = $user_detail;
            $data['pagename'] = "home";
            $this->load->view('pages/recruiters-support-system', $data);
        }
        
        function UpdateProfilePhoto(){
            
            $user_id  = $this->session->userdata('user_id');
            
            if($user_id==""){ redirect(site_url('login')); }
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$user_id));
            
            $post_file = intval($this->get_post('post_file',0));
            
            
            
            if($post_file>0){
                
                //Get member name to atttach it with image name
                $member_name = preg_replace('/\s*/', '', $user_detail->m_name);
                $member_name = strtolower($member_name);
                
                $current_file = $this->get_post('current_file');
                
                //Image Libaray Config
                $config = array('upload_path'=> 'assets/uploads/members/temp', 'allowed_types' => 'gif|jpg|png|jpeg','file_name'=>$member_name.'-'.rand(0,9999),'overwrite'=>TRUE);
                $this->load->library('upload', $config);                    
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('memberfile')){
                    $udata = array('upload_data' => $this->upload->data());                        
                    $file_name = $udata['upload_data']['file_name'];
                    $data['m_avatar'] = $file_name;
                    $return = $this->member_model->Save($data,$user_id);
                    
                    $full_image_path="./assets/uploads/members/".$file_name;
                    copy("./assets/uploads/members/temp/".$file_name,$full_image_path);
                    resizeImg($full_image_path, 500, 500);
                    
                    $medium_thumb_image_path="./assets/uploads/members/small_thumbs/".$file_name;
                    copy("./assets/uploads/members/".$file_name,$medium_thumb_image_path);
                    resizeImg($medium_thumb_image_path, 200, 200);
                    try {
                        @unlink('./assets/uploads/members/small_thumbs/'.$current_file);
                        @unlink('./assets/uploads/members/'.$current_file);
                    } catch (Exception $exc) {
                        //echo $exc->getTraceAsString();
                    }                    
                    _setSuccess('Profile Picture Updated Successfully');

                }else{
                    //$return = array('error' => $this->upload->display_errors());
                    _setError('Unable to Upload Photo Please try again later');
                }
                
                redirect(site_url('UpdateProfilePhoto'));
                exit;
            }
            
            $data['profile'] = $user_detail;
            $data['pagename'] = "home";
            $this->load->view('profile/profile-picture', $data);
        }
        
        function seven_days_plan(){    
            
            if($this->user_id==""){ redirect(site_url('login')); }
            $data['pagename'] = "7 Days Job Search Plan";
            $this->load->view('pages/7-days-plan', $data);
        }
        
        
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */