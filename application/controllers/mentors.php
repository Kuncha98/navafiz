<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mentors extends CI_Controller {    
	
    function __construct()
    {
        parent::__construct();        
        $this->user_id = $this->session->userdata('user_id');
        $this->session_user_id = $this->user_id;
        $this->load->model('user_model');
        $this->load->model('profile_model');
        $this->load->model('user_recommendation');
        $this->load->model('job_model');
        $this->load->model('members_interview_model');
        
        $this->load->model('mentors_super6');
        
        if(!in_array($this->session_user_id , CvReviewTeamList())){
            _setError("Your don't have permission to access this page");
            redirect(site_url());
        }
    }
    
    
      
    function index(){  
        
        LoginCheck(site_url('login'), current_url());
        
        $query = $this->db->query('Select * from '.MEMBER_TABLE.' where role_id in (1,2,5,6) order by last_login_date DESC');
        $mentors_list = $query->result();
        
        $myvotes_to_list = array();
        $mysuper6_list = $this->mentors_super6->Search(array('vote_from'=>$this->session_user_id));
        foreach ($mysuper6_list as $each) {
            $myvotes_to_list[] = $each->vote_to;
        }
        
        $votes_given_list = array();
        $tosuper6_list = $this->mentors_super6->Search(array('vote_to'=>$this->session_user_id));
        foreach ($tosuper6_list as $each1) {
            $votes_given_list[] = $each1->vote_from;
        }
        
        $data['user_id'] = '';
        $data['mentors_list'] = $mentors_list;
        $data['votes_to_list'] = $myvotes_to_list;
        $data['votes_given_list'] = $votes_given_list;
        
        $this->load->view('mentors/index',$data);
    }
    
    function index1(){  
        
        LoginCheck(site_url('login'), current_url());
        
        $query = $this->db->query('Select * from '.MEMBER_TABLE.' where role_id in (1,2,5,6) order by last_login_date DESC');
        $mentors_list = $query->result();
        
        $myvotes_to_list = array();
        $mysuper6_list = $this->mentors_super6->Search(array('vote_from'=>$this->session_user_id));
        foreach ($mysuper6_list as $each) {
            $myvotes_to_list[] = $each->vote_to;
        }
        
        $votes_given_list = array();
        $tosuper6_list = $this->mentors_super6->Search(array('vote_to'=>$this->session_user_id));
        foreach ($tosuper6_list as $each1) {
            $votes_given_list[] = $each1->vote_from;
        }
        
        $data['user_id'] = '';
        $data['mentors_list'] = $mentors_list;
        $data['votes_to_list'] = $myvotes_to_list;
        $data['votes_given_list'] = $votes_given_list;
        
        $this->load->view('mentors/index1',$data);
    }
    
    function mentors_ajax(){
        LoginCheck(site_url('login'), current_url());
            
        $data = array();
        $page_id = $this->input->post('page_id');
        $limit = $this->input->post('limit'); 
//        echo 'aa',$limit;
//        exit();
       
            $myvotes_to_list = array();
//            $mysuper6_list = $this->mentors_super6->Search(array('vote_from'=>$this->session_user_id));
//            foreach ($mysuper6_list as $each) {
//                $myvotes_to_list[] = $each->vote_to;
//            }
//
//
//            $votes_given_list = array();
//            $tosuper6_list = $this->mentors_super6->Search(array('vote_to'=>$this->session_user_id));
//            foreach ($tosuper6_list as $each1) {
//                $votes_given_list[] = $each1->vote_from;
//            }
            
//            $data['votes_to_list'] = $myvotes_to_list;
//            $data['votes_given_list'] = $votes_given_list;
        
        
        
        
        
        $mentors_list = $this->profile_model->SearchMentors($limit,$page_id);

        $data['mentors_list'] = $mentors_list;
       
        
        $this->load->view('mentors/main-mentors', $data);
    }
    
    
    function mentors_ajax1(){
        LoginCheck(site_url('login'), current_url());
            
        $data = array();
        $page_id = $this->input->post('page_id');
        $limit = $this->input->post('limit'); 
//        echo 'aa',$limit;
//        exit();
       
            $myvotes_to_list = array();
            $mysuper6_list = $this->mentors_super6->Search(array('vote_from'=>$this->session_user_id));
            foreach ($mysuper6_list as $each) {
                $myvotes_to_list[] = $each->vote_to;
            }


            $votes_given_list = array();
            $tosuper6_list = $this->mentors_super6->Search(array('vote_to'=>$this->session_user_id));
            foreach ($tosuper6_list as $each1) {
                $votes_given_list[] = $each1->vote_from;
            }
            
            $data['votes_to_list'] = $myvotes_to_list;
            $data['votes_given_list'] = $votes_given_list;
        
        
        
        
        
        $mentors_list = $this->profile_model->SearchMentors($limit,$page_id);

        $data['mentors_list'] = $mentors_list;
       
        
        $this->load->view('mentors/main-mentors1', $data);
    }
    

    
    function quick_job_applicants($job_id=1){
        $job_applicants = $this->job_model->getJobApplicants(array('job_id'=>$job_id));
        $data['list_jobs'] = $this->job_model->fetchQuickJobs();        
        $data['job_applicants'] = $job_applicants;
        $data['job_id'] = $job_id;

        $this->load->view('mentors/list_quick_job_applicants',$data);
    }
    
    function fetch_applicants($job_id){
        $job_applicants = $this->job_model->getJobApplicants(array('job_id'=>$job_id));
        $data['job_applicants'] = $job_applicants;
        $this->load->view('mentors/fetch_quick_applicants',$data);

    }
    
    
    
    function delete_quick_member($id,$job_id){
        if(!empty($id) && !empty($job_id)){
            if($this->job_model->delete_quick_applicant($id,$job_id)){
                _setSuccess('Successfully deleted applicant');
                
            }else{
                _setError('Error deleting applicant');
            }
        }
        redirect(site_url('mentors/quick_job_applicants/'.$job_id));
        exit();
    }

    
    function add_quick_member($job_id){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $whatsapp_number = $this->input->post('whatsapp_number');
//        $data['m_name'] = $name;
//                $data['m_email'] = $email;
//                $data['m_phone'] = $whatsapp_number;
//                print_r($data);
//                exit();
        if(!empty($name) && !empty($whatsapp_number)){
            $res = $this->profile_model->Search(array('m_name'=>$name,'m_email'=>$email));
            if(empty($res)){
                $data['m_name'] = $name;
                $data['m_email'] = $email;
                $data['m_phone'] = $whatsapp_number;
                if($this->profile_model->Save($data)){
                    _setSuccess('Successfully registered applicant');
                }else{
                    _setError('Error registering applicant');
                }
            }else{
                _setError('The Applicant is already registered');
                
            }
        }else{
            _setError('Some Information are missing');
            
        }
        redirect(site_url('mentors/fetch_applicants/'.$job_id));
        exit();
    }
    
    
    function mentorsEmail(){
        LoginCheck(site_url('login'), current_url());
        
        if(!in_array($this->session_user_id , CvReviewTeamList())){
            _setError("You Don't have permission to check this page.");
            redirect(site_url());
        }
        
        $query = $this->db->query('Select m_id,m_name,m_email from '.MEMBER_TABLE.' where role_id in (1,2,5,6) order by last_login_date DESC');
        $mentors_email_list = $query->result();
        $data['mentors_list'] = $mentors_email_list;
        
        $this->load->view('mentors/mentors_email',$data);
    }
    
    function mlist(){
        $query = $this->db->query('Select * from '.MEMBER_TABLE.' where role_id in (1,2,5,6) order by last_login_date DESC');
        $mentors_list = $query->result();
        
    }
    
    function usersby($user_id){   
        LoginCheck(site_url('login'), current_url());
        
        if(!in_array($this->session_user_id , CvReviewTeamList())){
            _setError("You Don't have permission to check this page.");
            redirect(site_url());
        }
        
        $data['recommended'] = $this->user_recommendation->Search(array('recommend_by'=>$user_id));
        $data['shortlisted'] = $this->job_model->search_shortlist_can(array('updated_by'=>$user_id));
        $data['mark_interview'] = $this->members_interview_model->Search(array('updated_by'=>$user_id));
//        print_r($data['mark_interview']);
//        exit();
        //Get Latest 10 Jobs
        $query = $this->db->query('select * from jb_member where mentor_id='.$user_id.' order by last_login_date desc');
        $users_uder_mentors = $query->result();        
        
        //$users_uder_mentors = $this->user_model->Search(array('mentor_id'=>$user_id));        
        $data['user_id'] = $user_id;
        $data['user_by'] = $user_id;
        $data['users_uder_mentors'] = $users_uder_mentors;
        $this->load->view('mentors/users_under_mentors',$data);
    }
    function activity(){            
        
        LoginCheck(site_url('login'), current_url());
        if(!in_array(intval($this->session_user_id), CvReviewTeamList())){
            _setError("You Don't have permission to check this page.");
            redirect(site_url());
        }
        
        
        $data['pagename'] = "home";
        $this->load->view('pages/mentors-activity', $data);
    }
    function SaveActivity(){ 
        
        LoginCheck(site_url('login'), current_url());
        if(!in_array(intval($this->session_user_id), CvReviewTeamList())){
            _setError("You Don't have permission to check this page.");
            redirect(site_url());
        }
     
        $mentor_activity_text = $this->get_post('mentor_activity_text');
        $post_user_id = $this->get_post('post_user_id');
        
        $data['mentor_activity_text']  = $mentor_activity_text;
        
        $this->profile_model->Save($data,$post_user_id);        
        redirect(site_url('mentors/activity'));
        exit();
    }
    function addsuper6($vote_to){
        
        LoginCheck(site_url('login'), current_url());
        if(!in_array(intval($this->session_user_id), CvReviewTeamListForVoting())){
            _setError("You Don't have permission to check this page.");
            redirect(site_url());
        }
        
        $data['vote_from'] = $this->session_user_id;
        $data['vote_to'] = $vote_to;
        $data['added_on'] = datenow();
        
        $checkexist = $this->mentors_super6->Search(array('vote_from'=>$this->session_user_id));
        foreach ($checkexist as $each) {
            $votes_to[] = $each->vote_to;
        }
            
        if(count($checkexist)<=5){
            if(!in_array($vote_to, $votes_to)){
               $this->mentors_super6->Save($data);
                _setSuccess("Add in Super 6 request processed successfully");
            }else{
                _setError("You have already added this mentor into your Super 6");
            }
        }else{
            _setError("You have already added 6 you can revoke earlier recommendation to modify");
        }
        
        redirect(site_url('mentors'));
        exit();
    }
    
    function removesuper6($vote_to){
        
        LoginCheck(site_url('login'), current_url());
        
        if(!in_array($this->session_user_id, CvReviewTeamListForVoting())){
            _setError("You Don't have permission to check this page.");
            redirect(site_url());
        }
    
        $query = $this->db->query('delete from '.MENTOR_SUPER6_TABLE.' where vote_from='.$this->session_user_id.' and vote_to='.$vote_to.'  ');
        
        if($query){
            _setSuccess("Request completed successfully");
        }
        
        redirect(site_url('mentors'));
        exit();
    }
}