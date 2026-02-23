<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('page_model');
        $this->load->model('member_model');
        $this->load->model('testimonials_model');
        
        $this->user_id = $this->session->userdata('user_id');
        $this->session_user_id = $this->user_id;
        
    }

    function index()
    {
        $achievements = $this->testimonials_model->GetAll();                
        $data['achievements'] = $achievements;
        $data['pagename'] = "home";
    
        // File path for counter (inside application folder)
        $file = APPPATH . 'cache1/page_counter.txt';
    
        // If file not exists, create with 0
        if (!file_exists($file)) {
            file_put_contents($file, 0);
        }
    
        // Read current count
        $views = (int) file_get_contents($file);
    
        // Increment by 1
        $views++;
    
        // Save updated count back to file
        file_put_contents($file, $views);
    
        // Send value to view
        $data['page_views'] = $views;
    
        $this->load->view('testimonials/index', $data);
    }

    
    function post($achievement_id = 0)
    {   
        if (empty($this->user_id)) { 
            _setError("Please login to access Navafiz Discussion Board");
            redirect(site_url('login')); 
            exit;
        }
        
        $do_post = intval($this->get_post('do_post',0));
        if ($do_post > 0) {
    
            $title        = $this->get_post('title');
            $description  = $this->get_post('description');
            $achive_id    = intval($this->get_post('achive_id',0));
    
            // Duplicate protection: check if same testimonial already exists
            $this->db->where('user_id', $this->user_id);
            $this->db->where('title', $title);
            $this->db->where('description', $description);
            $duplicate = $this->db->get('testimonials')->row();
    
            if ($duplicate) {
                // If exists, do NOT insert again — just redirect with success.
                _setSuccess("Request Completed Successfully");
                redirect(site_url('testimonials'));
                exit;
            }
    
            // Prepare data
            $data['title']       = $title;
            $data['description'] = $description;
            $data['user_id']     = $this->user_id;
            $data['added_on']    = datenow();
            
            // Save testimonial
            $return_id = $this->testimonials_model->Save($data, $achive_id);
    
            // Add notification
            $noti['user_id']     = $this->session_user_id;
            $noti['noti_title']  = $this->session->userdata('name') . " Add Story in Testimonial";
            $noti['noti_desc']   = $title;
            $noti['noti_type']   = 'testimonial';
            $noti['noti_link']   = site_url('testimonials');
            AddNotification($noti);
            
            _setSuccess("Request Completed Successfully");
            redirect(site_url('testimonials'));
            exit;
        }
    
        // Load view normally
        $curr_achievment = array();
        if ($achievement_id > 0) {
            $curr_achievment = $this->testimonials_model->GetById($achievement_id);
        }
        
        $data['profile']         = $this->member_model->userDetail(array('user_id' => $this->user_id));
        $data['pagename']        = "home";
        $data['curr_achievment'] = $curr_achievment;
        $this->load->view('testimonials/post', $data);
    }

    
    
    
    function testimonial_detail($id){
        
        
        $res = $this->testimonials_model->Search(array('id'=>$id));
        if(!empty($res)){
           $achievement = $this->testimonials_model->GetById($id);   
           
            if(!empty($achievement) > 0){
                
            $user_detail = BasicInfoUser($achievement->user_id);
            $user_picture = empty($user_detail->m_avatar) ? 'default.png' : $user_detail->m_avatar; 
            
            
            $page_metas = array(
            'title' => $achievement->title,
            'description' =>  date("d F Y",  strtotime($achievement->added_on)),
            'og_img' => 'assets/uploads/members/'.$user_picture,
            'og_url' => 'testimonials/testimonial_detail/'.$achievement->id,
            );
                
                
                $views = $achievement->views + 1;
                $t_data['views'] = $views;
                $this->testimonials_model->Save($t_data,$id);

                $data['page_meta'] = $page_metas;
                $data['achievement'] = $achievement;
                $data['pagename'] = "Testimonial Detail";

                $this->load->view('testimonials/testimonial_detail', $data);
                
            } 
        }else{
            _setError('Testimonial not found');
            redirect(site_url('testimonials'));
            exit();
        }
        
        
        
        
        
           
    }
    
    
    
    
    function delete($achievement_id)
    { 
        if(empty($this->user_id)){ 
            _setError("Please login to access Navafiz Discussion Board");
            redirect(site_url('login')); 
            exit;
        }
        
        if($achievement_id>0){
            if($this->testimonials_model->Delete($achievement_id)){
                _setSuccess("Request Completed Successfully");
            }else{
                _setError("Unable to process your request");
            }
        }
        
        redirect(site_url('testimonials'));
        exit;
    }
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */