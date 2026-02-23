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
        $this->load->model('whatshappening_meta_model');
        date_default_timezone_set('Asia/Dubai');
         
        $this->user_id = $this->session->userdata('user_id');
        $this->session_user_id = $this->user_id;
    }
    
    
    function index($page=1){
        
        LoginCheck(site_url('login'), current_url());
        
        $user_id = $this->session->userdata('user_id');
        $limit = 30;
        if($page>1){
            $start = $page*$limit;
        }else{
            $start = 0;
        }
        
        $user_detail = $this->member_model->userDetail(array('user_id' =>$user_id));
        $data['user_detail'] = $user_detail;
        $whatshappening = $this->whatshappening_model->Search($limit,$start,array('sh_status'=>1));
        
        $data['list_happening'] = $whatshappening;
        $data['page'] = $page+1;
        $this->load->view('whatshappening/index', $data);
    }
    function likePost()
    {
        LoginCheck(site_url('login'), current_url());
        
        $postId = $this->input->post('postId');
        $delete = ($this->input->post('like') == 'true') ? '0' : '1';
         $user_id = $this->session->userdata('user_id');
         $data = array('post_id'=>$postId,'meta_type'=>'1','is_deleted'=>$delete,'created_at'=>time(),'member_id'=>$user_id);
        $id = addPostLikeOfMember($postId,$data);
        //$whatshappening = $this->whatshappening_meta_model->save($data);
        echo json_encode($data);
         echo $delete.'delete';
        exit;
    }
    
    function commentPost()
    {
        LoginCheck(site_url('login'), current_url());
        
        $cmnt = $this->input->post('cmnt');
        $postId = $this->input->post('postId');
        $user_id = $this->session->userdata('user_id');
        $data = array('post_id'=>$postId,'meta_type'=>'2','description'=>$cmnt,'is_deleted'=>0,'created_at'=>date('Y-m-d H:i:s'),'member_id'=>$user_id);
        $user_sess_name = $this->session->userdata('name');
        // ABC has posted on Whats happening
        
        $noti['user_id'] = $this->session_user_id;
        $noti['noti_title'] = $user_sess_name." has commented on Whats happening";
        $noti['noti_desc'] = $user_sess_name." has commented on Whats happening";
        $noti['noti_type'] = 'whatshappening';
        $noti['noti_link'] = site_url('whatshappening/view/'.$postId);
        AddNotification($noti);
         
        $whatshappening = $this->whatshappening_meta_model->save($data);         
        $query = $this->db->query("SELECT jb_shoutbox_meta.created_at,m_avatar,jb_member.m_profession,m_name,jb_shoutbox_meta.description from jb_shoutbox_meta  INNER JOIN jb_member on jb_member.m_id = jb_shoutbox_meta.member_id where meta_type=2 AND is_deleted = 0 AND jb_shoutbox_meta.id= '$whatshappening'");                               
        echo json_encode($query->row_array());                         
        exit;
    }
    
    function loadmore($page=1){
        $limit = 5;
        $start = $page*$limit;
        
        $whatshappening = $this->whatshappening_model->SearchByLimit($limit,$start,array('sh_status'=>1));
        $data['list_happening'] = $whatshappening;
        $data['page'] = $page+1;
        $this->load->view('whatshappening/loadmore', $data);
    }
    
    function addshout()
    { 
        LoginCheck(site_url('login'), current_url());
        
        $user_id = $this->session->userdata('user_id');       
        $user_detail = $this->member_model->userDetail(array('user_id' =>$user_id));
            
        if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
            _setError("Complete your profile first to perform this action");
            redirect(site_url('profile'));
            exit;
        }

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
            $user_sess_name = $this->session->userdata('name');
            
            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = $user_sess_name." has posted on Whats happening";
            $noti['noti_desc'] = substr($this->get_post('message')."...", 0,300);
            $noti['noti_link'] = site_url('whatshappening/view/'.$return);    
            $noti['noti_type'] = 'whatshappening';        
            AddNotification($noti);

            _setSuccess('Post Added in Whats Happening');
        }else{
             _setError('Unable to Add post please try again');
        }
        redirect(site_url('whats-happening'));
    }
    
    function view($happening_id){
        LoginCheck(site_url('login'), current_url());
        
        
        $happening = $this->whatshappening_model->GetById($happening_id);
        $data['happening'] = $happening;
        $this->load->view('whatshappening/view', $data);
    }
    
    function delete($happening_id){
        
        LoginCheck(site_url('login'), current_url());
        
        if($this->whatshappening_model->delete($happening_id)){
            redirect(site_url('whats-happening'));
            exit();
        }else{
            
        }
    }
}


/* End of file front.php */
/* Location: ./application/controllers/front.php */