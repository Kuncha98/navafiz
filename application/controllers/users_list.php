<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_list extends CI_Controller {
    var $limit  = 20; var $offset = 0; var $pages  = 7;
    function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->model('user_list_model');
        $this->load->model('users_by_list_model');
        $this->user_id = $this->session->userdata('user_id');
        $this->session_user_id = $this->user_id;
    }
    
    public function new_members()
    {
        // Get all lists (for sidebar buttons)
        $list_users = $this->user_list_model->GetAll();
    
        // Fetch new members (last 24 hours) directly from jb_member
        $this->db->where('m_status', 1);
        $this->db->where('added_on >= NOW() - INTERVAL 1 DAY', null, false); // use MySQL time
        $this->db->order_by('m_id', 'DESC');
        $users_by_list = $this->db->get('jb_member')->result();
    
        // Prepare data for view
        $data['list_id'] = 'new'; // special marker
        $data['users_by_list'] = $users_by_list;
        $data['list_users'] = $list_users;
        $data['views'] = 0;
        $data['page_views'] = 0;
    
        $this->load->view('users_list/index', $data);
    }





    
    
    function users_by_list( $list_id = '34' ){
        $list_users = $this->user_list_model->GetAll();
        
        $users_by_list = $this->users_by_list_model->Search(array('list_id'=>$list_id));
        
        

        if(intval($list_id) > 0){
            $views = $this->user_list_model->GetById($list_id);
            if(!empty($views)){
                $data['page_views'] = $views->page_views + 1;
                $this->user_list_model->Save($data,$views->id);
                $data['views'] = $views->page_views;
            }
            
        }
//        echo "<pre>"; print_r($views->page_views);exit();
        
        $data['list_id'] = $list_id;
        $data['users_by_list'] = $users_by_list;
        $data['list_users'] = $list_users;
//        echo "<pre>";print_r($data);exit();
        $this->load->view('users_list/index',$data);
    }
    
    
    function jobs_by_list($list_id) {
        $list_users = $this->user_list_model->GetAll();
        $jobs_by_list = $this->users_by_list_model->Search(array('list_id'=>$list_id,'member_id'=>0));
        
        
        $data['list_id'] = $list_id;
        $data['jobs_by_list'] = $jobs_by_list;
        $data['list_users'] = $list_users;
        $this->load->view('users_list/jobs_list',$data);
        
    }
    
    function delete_user($list_id,$member_id){
//        echo $list_id;exit();
        $if_found = $this->users_by_list_model->Search(array('member_id'=>$member_id,'id'=>$list_id));
        if(!empty($if_found)){
            $this->users_by_list_model->Delete($list_id);
        }
        _setSuccess('Member Deleted Successfully');
        redirect(site_url('users_list/users_by_list/82'));
    }
    
    function hire_mentor($mentor_id, $user_id) {
        $user_data = $this->member_model->get_mem_profile($user_id);
        
        if ($user_data) {
            $update_data = array('mentor_id' => $mentor_id);
        
            $this->db->where('m_id', $user_id); 
            $update_status = $this->db->update('jb_member', $update_data);
            
            
            if ($update_status) {
                $this->session->set_flashdata('success_message', 'Mentor Hired Successfully');
                
                redirect(site_url('users_list/users_by_list/100'));
            } else {
                $this->session->set_flashdata('error_message', 'Something went wrong');
                
                redirect(site_url('users_list/users_by_list/100'));
            }
        } else {
            $this->session->set_flashdata('error_message', 'User not found');
            redirect(site_url('users_list/users_by_list/100'));
        }
    }



    
}

?>