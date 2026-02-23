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
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */