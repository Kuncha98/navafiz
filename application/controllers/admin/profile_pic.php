<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_pic extends CI_Controller {
    var $limit  = 12; var $offset = 0; var $pages  = 7;
	public $global_array; 
	function __construct()
        {
            parent::__construct();
            $this->load->model('front_model');
            $this->load->model('page_model');
            $this->load->model('member_model');
            $this->load->model('admin_member_model');
            
//            $d = $this->front_model->getSettings();
//            foreach($d as $c)
//            {
//                $this->global_array[$c->option] = $c->value;
//            }
            
//            $this->user_id = $this->session->userdata('user_id');
        }
        
        function index(){
           $data['forms'] = $this->admin_member_model->GetAllPics();
           
           $data['page_title'] = 'Members Profile Pictures';
           $data['content_view'] = 'admin/profile_pic/listprofile';
           $this->load->view('admin/sb-template', $data);
        }


        
        }
        
?>