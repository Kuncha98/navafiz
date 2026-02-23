<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Achievements extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('page_model');
        $this->load->model('member_model');
        $this->load->model('achievements_model');
        
        $this->user_id = $this->session->userdata('user_id');
        if(empty($this->user_id)){ 
            _setError("Please login to access Navafiz Discussion Board");
            redirect(site_url('login')); 
            exit;
        }
    }

    function index()
    {
        $achievements = $this->achievements_model->GetAll();        
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->user_id));
        $data['achievements'] = $achievements;
        $data['pagename'] = "home";
        $this->load->view('achievements/index', $data);
    }

    function userAchievements(){

        $achievements = $this->achievements_model->GetAllByID($this->user_id);        
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->user_id));
        $data['achievements'] = $achievements;
        $data['pagename'] = "home";
        $this->load->view('achievements/index', $data);
    }
    
    function post($achievement_id = 0)
    {   
        $do_post = intval($this->get_post('do_post',0));
        if($do_post>0){
            
            $title = $this->get_post('title');
            $description = $this->get_post('description');
            $achive_id = intval($this->get_post('achive_id',0));
            
            $data['title'] = $title;
            $data['description'] = $description;
            $data['user_id'] = $this->user_id;
            $data['added_on'] = datenow();
            
            $this->achievements_model->Save($data,$achive_id);
            _setSuccess("Request Completed Successfully");
            redirect(site_url('achievements'));
            exit;
        }
        $curr_achievment = array();
        if($achievement_id>0){
            $curr_achievment = $this->achievements_model->GetById($achievement_id);
        }
        
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->user_id));
        $data['pagename'] = "home";
        $data['curr_achievment'] = $curr_achievment;
        $this->load->view('achievements/post', $data);
    }
    
    function delete($achievement_id)
    {   
        if($achievement_id>0){
            if($this->achievements_model->Delete($achievement_id)){
                _setSuccess("Request Completed Successfully");
            }else{
                _setError("Unable to process your request");
            }
        }
        
        redirect(site_url('achievements'));
        exit;
    }
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */