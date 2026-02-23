<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recruiters extends CI_Controller {    
	
    function __construct()
    {
        parent::__construct();
        $this->load->model('member_recruiters');
        $this->user_id = $this->session->userdata('user_id');
    }
    
    
    function index($user_id)
    {   
       
        $user_job_portal = $this->member_recruiters->Search(array('user_id'=>$user_id));
        $portal_id = 0;
        if(count($user_job_portal)>0){
            $user_job_portal = $user_job_portal[0];
            $portal_id = isset($user_job_portal->id) ? $user_job_portal->id:0;
        }
        
        $is_post = intval($this->get_post('is_post',0));
        
        if($is_post>0){
            $post_data['hays'] = $this->get_post('hays');
            $post_data['nadia'] = $this->get_post('nadia');
            $post_data['bac'] = $this->get_post('bac');
            $post_data['charterhouse'] = $this->get_post('charterhouse');
            $post_data['michael_page'] = $this->get_post('michael_page');
            $post_data['expertsrecruitment'] = $this->get_post('expertsrecruitment');
            $post_data['abcrecruitment'] = $this->get_post('abcrecruitment');
            $post_data['roberthalf'] = $this->get_post('roberthalf');
            $post_data['gulfrecruiter'] = $this->get_post('gulfrecruiter');
            $post_data['tascoutsourcing'] = $this->get_post('tascoutsourcing');
            $post_data['user_id'] = $user_id;
            
            if($portal_id>0){
                $post_data['updated_on'] = datenow();
                $this->member_recruiters->Save($post_data,$portal_id);
            }else{
                $post_data['added_on'] = datenow();
                $this->member_recruiters->Save($post_data);
            }
            
            redirect(site_url('recruiters/index/'.$user_id));
            exit;
        }
        
        $data['user_id'] = $user_id;
        $data['user_job_portal'] = $user_job_portal;
        $this->load->view('recruiters/index',$data);
    }
    
    
    function view($user_id)
    {   
        $user_job_portal = $this->member_recruiters->Search(array('user_id'=>$user_id));
        if(count($user_job_portal)>0){
            $user_job_portal = $user_job_portal[0];
            $portal_id = isset($user_job_portal->id) ? $user_job_portal->id:0;
        }
        
        $data['user_id'] = $user_id;
        $data['user_job_portal'] = $user_job_portal;
        $this->load->view('recruiters/view',$data);
    }
}