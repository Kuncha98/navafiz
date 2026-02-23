<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Whatshappening extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('page_model');
        $this->load->model('member_model');
        $this->load->model('social_groups_model');
        $this->load->model('socialgroups_subscribers');
        $this->load->model('whatshappening_model');
        date_default_timezone_set('Asia/Dubai');
         
        $this->user_id = $this->session->userdata('user_id');
        if($this->user_id == ""){
            redirect('login');
        }
    }
    
    
    function index($page=1){
        
        $whatshappening = $this->whatshappening_model->Search(array('sh_status'=>1));
        $data['list_happening'] = $whatshappening;
        $data['page'] = $page+1;
        $this->load->view('whatshappening/index', $data);
    }
    
    function loadmore($page=1){
        $limit = 20;
        $start = $page*$limit;
        
        $whatshappening = $this->whatshappening_model->SearchByLimit($limit,$start,array('sh_status'=>1));
        $data['list_happening'] = $whatshappening;
        $data['page'] = $page+1;
        $this->load->view('whatshappening/loadmore', $data);
    }
    
    function addshout()
    { 
        $user_id = $this->session->userdata('user_id');
       

        if(isset($_FILES['whats_image']['name'])){
            
            $config = array('upload_path'=> 'assets/uploads/happens/temp', 'allowed_types' => 'gif|jpg|png|jpeg','file_name'=>'whats-'.rand(0,9999),'overwrite'=>TRUE);
            $this->load->library('upload', $config);                    
            $this->upload->initialize($config);
                
            if($this->upload->do_upload('whats_image')){
                $udata = array('upload_data' => $this->upload->data());                        
                $file_name = $udata['upload_data']['file_name'];
                
                
                
                $full_image_path="./assets/uploads/happens/".$file_name;
                copy("./assets/uploads/happens/temp/".$file_name,$full_image_path);
                resizeImg($full_image_path, 500, 500);
                
            }else{
                $file_name = '';
            }
        }else{
            $file_name = '';
        }
        
        $data['message'] = $this->get_post('message');
        $data['add_date'] = datenow();
        $data['sh_member_id'] = $user_id;
        $data['sh_image'] = $file_name;
        $data['sh_status'] = 1;
        
        $return = $this->whatshappening_model->Save($data);
        if($return>0){
            _setSuccess('Post Added in Whats Happening');
        }else{
             _setError('Unable to Add post please try again');
        }
        redirect(site_url('whats-happening'));
    }
    function view($happening_id){
        $user_id = $this->session->userdata('user_id');
        if($user_id == ""){
            redirect('login');
        }
        
        $happening = $this->whatshappening_model->GetById($happening_id);
        $data['happening'] = $happening;
        $this->load->view('whatshappening/view', $data);
    }
}


/* End of file front.php */
/* Location: ./application/controllers/front.php */