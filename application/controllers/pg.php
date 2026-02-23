<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pg extends CI_Controller {
    
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
	
	function collaborators(){            
            $data['pagename'] = "home";
            $this->load->view('pages/navafiz-collaborators', $data);
        }	
        
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */