<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {    
	
    function __construct()
    {
        parent::__construct();        
        $this->user_id = $this->session->userdata('user_id');
        $this->session_user_id = $this->user_id;        
        if($this->session_user_id>0){
            redirect(site_url('feed'));
            exit();
        }
    }
    
    
      
    function index(){                  
        // $this->load->view('home/index');
        $this->load->view('home/index-new');
    }
}