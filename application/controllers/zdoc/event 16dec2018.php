<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {
    var $limit  = 20; var $offset = 0; var $pages  = 7;
	function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
		
		$this->load->model('member_model');
		$this->load->library('paging_front');
		
		
		
	}

	function index()
		{ 
		$data = "";
		if($this->session->userdata('user_id') != "")
		{ 
		$data['limit'] = $this->limit;
		$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
	$data['latesevents'] = $this->event_model->getRecentEvents(array('e_status' => 1));	
        $this->load->view('events', $data);
		}
		else
		{
		redirect('/');
		}
	}
	
	
	
	function eventsajax()
	    {
		$data = "";
        $page_id = $this->input->post('page_id');
		$cat_id = $this->input->post('cat_id');
        $limit = $this->input->post('limit');
        $data = array();
        if($page_id!="")
             $offset    = $limit * ($page_id-1);
		else	
			$offset = 0;
        
		$total   =  $this->event_model->getTotalEvents(array('cat_id' =>$cat_id,'status' =>1));
        $options =  array('records' => $limit ,
                    'pages'   => $this->pages,
                    'page_no' => $page_id,
                    'total'   => $total );
        $paging          = new paging_front($options);
        $paging_link     = $paging->show_paging();
        $data['total_deals']   		= $total;
        $data['limit_selected'] 	= $limit;
        $data['events'] = $this->event_model->getEvents(array('cat_id' =>$cat_id,'e_status' =>1,'offset' =>$offset, 'limit' => $limit));
		
		
        $data['paging_link'] = $paging_link;
        $this->load->view('listevents', $data);
		}

			//echo "ws".$paging_link;


function eventdetail($id)
	{
	$data="";
	$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
	//$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
	$data['event'] = $this->event_model->getEvents(array('status' =>1,'e_id' =>$id));
	//$data['relatedjobs'] = $this->job_model->getRelatedJobs(array('m_status' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
	$data['latesevents'] = $this->event_model->getRecentEvents(array('e_status' => 1));	
	$data['pagename'] = "event_detail";
    $data['eventimages'] = $this->event_model->getEventImages(array('status' => 1,'e_id' =>$id));	    
	$this->load->view('eventdetail', $data);
	}

          


	
	
	
	
	
	function videoshow()
		{ 
	
      	$id = $this->uri->segment(3);
		$data['video'] =  $this->video_model->updateVideoView($id);
		$data['video'] =  $this->video_model->getVideo($id);
		$data['video_right'] = $this->banner_model->getBanners(array('position' =>'video_right','limit' =>'1','status' =>'1'));
		$data['video_bottom'] = $this->banner_model->getBanners(array('position' =>'video_bottom','limit' =>'1','status' =>'1'));
       $data['latest_videos'] = $this->video_model->geLatestVideos(array('limit' =>'3'));
	  
	   
		$this->load->view('videoshow', $data);
	}

	
	


}

/* End of file front.php */
/* Location: ./application/controllers/front.php */