<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {
    var $limit  = 20; var $offset = 0; var $pages  = 7;
    function __construct()
    {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('events_model');
        $this->load->model('member_model');
        $this->load->library('paging_front');
    }

    function index()
    { 
        if($this->session->userdata('user_id') == ""){
            redirect(site_url('login'));
        }
        
        $data['limit'] = $this->limit;
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $data['latesevents'] = $this->event_model->getRecentEvents(array('e_status' => 1));	
        $this->load->view('events', $data);
        
    }
    function city($city_id){
        
        $event_list = $this->events_model->Search(array('city_id'=>$city_id));
        $data['event_list'] = $event_list;
        $this->load->view('events/events-by-city', $data);
    }
    function edit($event_id){
        
        $event = $this->events_model->GetById($event_id);
        
        $data['event_id'] = $event_id;
        $data['event'] = $event;
        $this->load->view('events/edit-event', $data);
    }
    function delete($event_id){
        
        if(intval($event_id)>0){
            $this->events_model->Delete($event_id);
        }
        
        _setSuccess('Event Deleted Successfully');
        redirect(site_url('event-in-uae'));
        exit;
    }
    function AddEvent()
    { 
        if($this->session->userdata('user_id') == ""){
            redirect(site_url('login'));
        }
        
        $config = array('upload_path'=> 'public-assets/events/', 'file_name'=>'event-'.time(),'allowed_types'=>'jpg|png|jpeg|bmp');
        $this->load->library('upload', $config);                    
        $this->upload->initialize($config);
        $event_picture_file = '';
        if($this->upload->do_upload('event_picture')){
            $udata = array('upload_data' => $this->upload->data());                        
            $event_picture_file = $udata['upload_data']['file_name'];            
        }else{
            $errors = $this->upload->display_errors();
            echo "<pre>"; print_r($errors); echo "</pre>";
            exit;
        }
        
        $data['title'] = $this->get_post('title');
        $data['description'] = $this->get_post('title');
        $data['city_id'] = $this->get_post('city_id');
        $data['event_picture'] = $event_picture_file;
        $data['event_date'] = $this->get_post('event_date');
        $data['location'] = $this->get_post('location');
        
        $this->events_model->Save($data);
        
        _setSuccess('Event Added Successfully');
        redirect(site_url('event-in-uae'));
        exit;
        
        
        
        
    }
    
    function events_citites()
    { 
        if($this->session->userdata('user_id') == ""){
            redirect(site_url('login'));
        }
        
        $data['limit'] = $this->limit;
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $data['latesevents'] = $this->event_model->getRecentEvents(array('e_status' => 1));	
        $this->load->view('events/events-citiest-tab', $data);
        
    }
	
    function eventsajax()
    {
        $data = "";
        $page_id = $this->input->post('page_id');
        $cat_id = $this->input->post('cat_id');
        $limit = $this->input->post('limit');
        $data = array();
        if($page_id!="")
            $offset = $limit * ($page_id-1);
        else	
        $offset = 0;

        $total   =  $this->event_model->getTotalEvents(array('cat_id' =>$cat_id,'status' =>1));
        $options =  array('records' => $limit ,
                    'pages'   => $this->pages,
                    'page_no' => $page_id,
                    'total'   => $total );
        $paging = new paging_front($options);
        $paging_link = $paging->show_paging();
        $data['total_deals'] = $total;
        $data['limit_selected'] = $limit;
        $data['events'] = $this->event_model->getEvents(array('cat_id' =>$cat_id,'e_status' =>1,'offset' =>$offset, 'limit' => $limit));


        $data['paging_link'] = $paging_link;
        $this->load->view('events/listevents', $data);
    }


    function view($id)
    {
        $this->load->model('event_subscribers_model','event_subscribers');
        
        $subscriber_data = array();
        $event_subscribers = $this->event_subscribers->Search(array('pu_event_id'=>$id));
        if(count($event_subscribers)>0){
            foreach($event_subscribers as $subscriber){
                $subscriber_data[] = $this->member_model->userDetail(array('user_id' =>$subscriber->pu_member_id));
            }
        }
        
        
        $data="";
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        //$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $data['event'] = $this->event_model->getEvents(array('status' =>1,'e_id' =>$id));
        //$data['relatedjobs'] = $this->job_model->getRelatedJobs(array('m_status' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $data['latesevents'] = $this->event_model->getRecentEvents(array('e_status' => 1));	
        $data['pagename'] = "event_detail";
        $data['event_subscribers'] = $subscriber_data;
        $data['eventimages'] = $this->event_model->getEventImages(array('status' => 1,'e_id' =>$id));	    
        $this->load->view('events/eventdetail', $data);
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