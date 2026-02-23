<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teamactions extends CI_Controller {
    	public $global_array; 
	function __construct()
        {
            parent::__construct();
            $this->load->model('front_model');
            $this->load->model('page_model');
            $this->load->model('member_model');
            $this->load->model('social_groups_model');
            $this->load->model('socialgroups_subscribers');
            $this->load->model('cvreview_model');
            
            $this->user_id = $this->session->userdata('user_id');
        }
        
        function index($team_member_id=0){
            
            if(!in_array($this->user_id, CvReviewTeamList())){
                _setError("You're not Authorized to access this page");
                redirect(site_url());
                exit;
            }
            
            $cvreviews_list  = $this->cvreview_model->Search(array('assign_user_to'=>$team_member_id));
            $data['cvreviews_list'] = $cvreviews_list;
            $data['team_member_id'] = $team_member_id;
            $this->load->view('teamactions/index', $data);
        }
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */