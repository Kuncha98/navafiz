<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_portals extends CI_Controller {    
	
    function __construct()
    {
        parent::__construct();
        $this->load->model('member_job_portals');
        $this->user_id = $this->session->userdata('user_id');
    }
    
    
    function index($user_id)
    {   
       
        $user_job_portal = $this->member_job_portals->Search(array('user_id'=>$user_id));
        if(count($user_job_portal)>0){
            $user_job_portal = $user_job_portal[0];
            $portal_id = isset($user_job_portal->id) ? $user_job_portal->id:0;
        }
        
        $data['user_id'] = $user_id;
        $data['user_job_portal'] = $user_job_portal;
        $this->load->view('job_portals/index',$data);
    }
    
    function save(){
        
        $is_post = intval($this->get_post('is_post',0));        
        $user_id = intval($this->get_post('user_id'));        
        $user_job_portal = $this->member_job_portals->Search(array('user_id'=>$user_id));
        if(count($user_job_portal)>0){
            $user_job_portal = $user_job_portal[0];
            $portal_id = isset($user_job_portal->id) ? $user_job_portal->id:0;
        }
        if($is_post>0){
            $post_data['navafiz'] = $this->get_post('navafiz');
            $post_data['bayt'] = $this->get_post('bayt_link');
            $post_data['monstergulf'] = $this->get_post('monstergulf');
            $post_data['gulftalent'] = $this->get_post('gulftalent');
            $post_data['naukrigulf'] = $this->get_post('naukrigulf');
            $post_data['dubizzle'] = $this->get_post('dubizzle');
            $post_data['indeed'] = $this->get_post('indeed');
            $post_data['worldwideworker'] = $this->get_post('worldwideworker');
            $post_data['gotogulf'] = $this->get_post('gotogulf');
            $post_data['khaleejtimes'] = $this->get_post('khaleejtimes');
            $post_data['user_id'] = $user_id;
            
            if($portal_id>0){
//                echo $portal_id;
//                exit();
                $post_data['updated_on'] = datenow();
                $this->member_job_portals->Save($post_data,$portal_id);
            }else{
//                echo $portal_id;
//                exit();
                $post_data['added_on'] = datenow();
                $this->member_job_portals->Save($post_data);
            }
        }
        _setSuccess("Job Portals Updated Successfully");
        redirect(site_url('job_portals/index/'.$user_id));
        exit;
    }
    
    function view($user_id)
    {   
        $user_job_portal = $this->member_job_portals->Search(array('user_id'=>$user_id));
        if(count($user_job_portal)>0){
            $user_job_portal = $user_job_portal[0];
            $portal_id = isset($user_job_portal->id) ? $user_job_portal->id:0;
        }
        
        $data['user_id'] = $user_id;
        $data['user_job_portal'] = $user_job_portal;
        $this->load->view('job_portals/view',$data);
    }
}