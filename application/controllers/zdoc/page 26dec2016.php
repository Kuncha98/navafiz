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
        }
	
	function faqs()
        {
            $data = "";
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['faqs'] = $this->page_model->getFaqs(array('status' => 1, 'language_id'=>$this->session->userdata('SessLangID')));
            $this->load->view('faqs', $data);
        }
	function index()
        {
            $data = "";
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
            
            $this->load->view('page',$data);
        }
		
	function live()
        {
            $data = "";
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
                redirect(site_url('profile'));
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
            
            
            $group_info = $this->social_groups_model->GetById($social_group_id);
            $group_subscribers = $this->socialgroups_subscribers->Search(array('user_id'=>$user_id,'social_group_id'=>$social_group_id));
           
            $data['group_info'] = $group_info;
            $data['group_subscribers'] = $group_subscribers;
            $data['pagename'] = "Social";
            $this->load->view('social-media/social-group', $data);
        }
        function JoinSocialGroup($social_group_id){
            
        
            
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
        
        function swot(){
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            
            if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
                redirect(site_url('profile'));
                exit;
            }
            
            
            $data['profile'] = $user_detail;
            $data['pagename'] = "home";
            $this->load->view('pages/swot', $data);
        }
        
        function my_profile(){
            
            $data['pagename'] = "home";
            $this->load->view('pages/my-profile', $data);
        }
        
        function edit_profile(){
            
            $data['pagename'] = "home";
            $this->load->view('pages/edit-profile-tabs', $data);
        }
        function find_job(){
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            
            if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
                redirect(site_url('profile'));
                exit;
            }
            
            $data['profile'] = $user_detail;
            $data['pagename'] = "home";
            $this->load->view('pages/find-job-tabs', $data);
        }
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */