<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {
    var $limit  = 20; var $offset = 0; var $pages  = 7;
    function __construct()
    {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('events_model');
        $this->load->model('event_gallery_model');
        $this->load->model('member_model');
        $this->load->model('event_chat_model','event_chat');
        $this->load->library('paging_front');
        $this->user_id = $this->session->userdata('user_id');
        $this->session_user_id = $this->user_id;
    }

    function index()
    {    
        $meta_title_name = 'Navafiz Events';
         https://navafiz.com/nassets/img/logo.png?v=1
        $meta_img = site_url('nassets/img/logo.png');
//        $meta_desc_city = !empty($profile->m_current_city) ? $profile->m_current_city : ''; 
        $page_metas = array(
            'title' => $meta_title_name,
            'description' => 'Events / Meetups & Training Sessions',
            'og_img' => $meta_img,
            'og_url' => 'events' ,
        );
        
        $data['page_metas'] = $page_metas;
        $data['limit'] = $this->limit;
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $data['latesevents'] = $this->event_model->getRecentEvents(array('e_status' => 1));	
        $this->load->view('events/events-citiest-tab', $data);        
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
    
    function Add_e(){
     LoginCheck(site_url('login'), current_url());
     
     $this->load->view('events/addevent');
        
    }
    
    function Edit_e($id){
        $event_info = $this->events_model->GetById($id);
        $data['event_info'] = $event_info;
        
        $this->load->view('events/editevent', $data);
    }
    
    function AddEvent()
    { 
        LoginCheck(site_url('login'), current_url());
        
        
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
        
        //converting date
        $event_date = date("Y-m-d H:i:s",strtotime($this->input->post('event_date')));
        
        
        $data['event_date'] = $event_date;        
        $data['location'] = $this->get_post('location');
        $data['address'] = $this->get_post('address');
        $data['added_by_userid'] = $this->session_user_id;
        
        $event_id = $this->events_model->Save($data);

        $session_name = $this->session->userdata('name');

        $noti['user_id'] = $this->session_user_id;
        $noti['noti_title'] = $session_name." Posted a new Event";
        $noti['noti_desc'] = $session_name." Posted a new Event";
        $noti['noti_type'] = 'events';
        $noti['noti_link'] = site_url('event/view/'.$event_id);
        AddNotification($noti);
        
        _setSuccess('Event Added Successfully');
        redirect(site_url('event/view/'.$event_id));
        exit;
        
        
        
        
    }
    
    
    function editevent($e_id){
        LoginCheck(site_url('login'), current_url());
        
//        $event_id = $this->events_model->GetById($data);
        
        $config = array('upload_path'=> 'public-assets/events/', 'file_name'=>'event-'.time(),'allowed_types'=>'jpg|png|jpeg|bmp');
        $this->load->library('upload', $config);                    
        $this->upload->initialize($config);
        $event_picture_file = '';
        
        if(!empty($_FILES['event_picture']['name'])){
             if($this->upload->do_upload('event_picture')){
                $udata = array('upload_data' => $this->upload->data());                        
                $event_picture_file = $udata['upload_data']['file_name'];            
                $data['event_picture'] = $event_picture_file;
            }else{
                $errors = $this->upload->display_errors();
                echo "<pre>"; print_r($errors); echo "</pre>";
                exit;
            }
        }
        
        $data['title'] = $this->get_post('title');
        $data['description'] = $this->get_post('description');
        $data['city_id'] = $this->get_post('city_id');
        //converting date
        $event_date = date("Y-m-d H:i:s",strtotime($this->input->post('event_date')));        
        $data['event_date'] = $event_date;
        $data['location'] = $this->get_post('location');
        $data['address'] = $this->get_post('address');
        $data['added_by_userid'] = $this->session_user_id;
        
        $event_id = $this->events_model->Save($data,$e_id);
        
        $session_name = $this->session->userdata('name');
        
        
        $noti['user_id'] = $this->session_user_id;
        $noti['noti_title'] = $session_name." Event Updated";
        $noti['noti_desc'] = $session_name." Event Updated";
        $noti['noti_type'] = 'events';
        $noti['noti_link'] = site_url('event/view/'.$event_id);
        AddNotification($noti);
        
        _setSuccess('Event Updated Successfully');
        redirect(site_url('event/view/'.$e_id));
        exit;
        
        
    }
    
    
    
    
    
    
    
    function CheckIn($member_id=0,$event_id=0){ 
        LoginCheck(site_url('login'), current_url());
        
        $event_id = $this->get_post('event_id');
        $member_id = $this->get_post('member_id');
        
        $this->db->query('Update jb_event_subscribers set check_in=1 where pu_event_id='.$event_id.' and pu_member_id='.$member_id.' ');        
    }
    
    function events_citites()
    {   
        redirect(site_url('events'));
        exit;
    }
    
    function RegisterEvent($event_id)
    {
        LoginCheck(site_url('login'), current_url());
        
        $user_id = $this->session->userdata('user_id');
        
        if($event_id>0 && $user_id>0)
        {
            $data =  $this->member_model->registerProgram(array('pu_event_id' =>$event_id,'pu_member_id' =>$user_id,'pu_add_date' =>date('Y-m-d H:i:s'),'event_id'=>$event_id));
        }
        
        redirect(site_url('event/view/'.$event_id));
        exit;
        
    }
	
    function view($id)
    {
        
        
        $this->load->model('event_subscribers_model','event_subscribers');
        $event_info = $this->events_model->GetById($id);
        
        
        $data['limit'] = 8;
        $subscriber_data = array();
        $event_subscribers = $this->event_subscribers->Search(array('pu_event_id'=>$id));
        if(count($event_subscribers)>0){
            foreach($event_subscribers as $subscriber){
                $subscriber_data[] = $this->member_model->userDetail(array('user_id' =>$subscriber->pu_member_id));                
            }
        }
        
        $single_event = $this->event_model->getEvents(array('status' =>1,'e_id' =>$id));
        
//        $meta_title_name = !empty($profile->m_name) ? $profile->m_name : 'Navafiz';
//        $meta_title_profession = !empty($profile->m_profession) ? ' | ' .$profile->m_profession : ''; 
//        $meta_desc = !empty($member_summary_points->point_1) ? ' | '. $member_summary_points->point_1 : ''; 
//        $meta_img = !empty($profile->m_avatar) ? 'assets/uploads/members/'.$profile->m_avatar : '';
//        $meta_desc_city = !empty($profile->m_current_city) ? $profile->m_current_city : ''; 
//        $page_metas = array(
//            'title' => $meta_title_name . $meta_title_profession,
//            'description' =>  $meta_desc_city . $meta_desc,
//            'og_img' => $meta_img,
//            'og_url' => 'profile/'.$id ,
//        );
        
        
        $e_data['views'] = $single_event->views + 1;
        $this->events_model->Save($e_data,$id);
        
        
        $page_metas = array(
            'title' => $single_event->title,
            'description' =>  date("d F Y",  strtotime($single_event->event_date)),
            'og_img' => !empty($single_event->event_picture) ? 'public-assets/events/'.$single_event->event_picture: 'public-assets/nassets/img/logo.png',
            'og_url' => 'event/view/'.$single_event->e_id,
        );
        
//        print_r($page_metas);
//        exit();
        
        $event_chat = $this->event_chat->GetByEventId($id);

        $data['event_chat'] = $event_chat;
        $data['page_meta'] = $page_metas;
        $data['event'] = $single_event;
        $data['latesevents'] = $this->event_model->getRecentEvents(array('e_status' => 1));	
        $data['pagename'] = "event_detail";
        $data['event_subscribers'] = $event_subscribers; 
        $data['event_info'] = $event_info;
        
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

    function addGallery(){
        $event_id = $this->input->post('event_id');
        $img=$_FILES['event_gallery']['name'];
        $tmp=$_FILES['event_gallery']['tmp_name'];
          for($i=0;$i<count($img);$i++)
        {
            $im=explode(".", $img[$i]);
            $name=$im[0].'-'.microtime(true).'.'.$im[1];
            $arr=array('event_gallery_image'=>$name,
                'user_id' => $this->session->userdata('user_id'),
                'event_id' => $event_id,
                'added_on' => date('Y-m-d H:i:s'),
            );
            $this->event_gallery_model->addGallery($arr);
            $target="uploads/event_gallery/".$name;
            move_uploaded_file($tmp[$i],$target);
        }

        $user_sess_name = $this->session->userdata('name');
        $noti['user_id'] = $this->session_user_id;
        $noti['noti_title'] = $user_sess_name." has added Image in Gallery. ";
        $noti['noti_desc'] = $user_sess_name." has added Image in Gallery. ";
        $noti['noti_type'] = 'events';
        $noti['noti_link'] = site_url('event/view/'.$event_id);
        AddNotification($noti);

        _setSuccess('Event gallery images added successfully');
        redirect("event/view/$event_id");
    }

    function Imagesajax(){

        $data = array();
        $page_id = $this->input->post('page_id');
        $limit = $this->input->post('limit');
        $event_id = $this->input->post('event_id');
        
        $data = array();
           
       $data['limit_selected']  = $limit;
       $data['images'] = $this->event_gallery_model->getImages(array('limit' => $limit, 'event_id' => $event_id));
        $this->load->view('events/event-gallery-list',$data);
    }

    public function PostChatMessage($event_id,$session_user_id){
            
            $sdata['user_id'] = $session_user_id;
            $sdata['event_id'] = $event_id;
            $sdata['message'] = $this->get_post('message_text');            
            $sdata['added_on'] = datenow();
            
            $this->event_chat->Save($sdata);

            $user_sess_name = $this->session->userdata('name');
            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = "Post comment on Event.";
            $noti['noti_desc'] = $user_sess_name." Posted a comment on Event Discussion Board.";
            $noti['noti_type'] = 'event_message';
            $noti['noti_link'] = site_url('event/view/'.$event_id);
            AddNotification($noti);

            redirect(site_url('event/view/'.$event_id));
            exit();
    }
    
    
    public function sendEventEmail(){
        $to = 'sikanderahmad930@gmail.com';
        $subject     = "Hello John !!";
        $messageText = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
   
        
        $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com', //
                        'smtp_port' => 465,        
                        'smtp_user' => SMTP_USER, //
                        'smtp_pass' => SMTP_PASSWORD, //
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE        
                    );   

                    $config['newline'] = "\r\n";
                    $config['crlf']    = "\r\n";

                    $this->load->library("email",$config);
                    $this->email->set_mailtype("html");
                    $this->email->set_newline("\r\n");
                    $this->email->from('navafizweb@gmail.com', 'Navafiz');
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($messageText);

                    if($this->email->send()) {
                       _setSuccess('Please check your Email');
                        echo "Email sent successfully :) ";
                        exit();
                                         
                    } else {
                        _setError("Error sending email");
                        echo "Error sending email ,,,";
                        exit();
                    }
    }



    public function deletechat($id,$event_id){

        $this->event_chat->Delete($id);
        redirect(site_url('event/view/'.$event_id));
            exit();
    }

}

/* End of file front.php */
/* Location: ./application/controllers/front.php */