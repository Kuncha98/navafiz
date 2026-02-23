<?php

class Members_by_list extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('users_by_list_model');
        $this->load->model('user_list_model');
//        $this->load->library('paging_front');
    }


    function index()
    {
        $data['forms'] = $this->users_by_list_model->GetAll();
        
//        print_r($data['user_list']);exit();
        
        $data['page_title'] = 'Users By List';
        $data['content_view'] = 'admin/users_by_list/index';
        $this->load->view('admin/sb-template', $data);
        
        
//        $this->load->view('admin/user_list/index', $data);
    }
    
    function add_user_by_list(){
        $data['user_list'] = $this->user_list_model->GetAll();
        
        $data['page_title'] = 'Add Member By List';
        $data['content_view'] = 'admin/users_by_list/add_by_list';
        $this->load->view('admin/sb-template', $data);
    }
    
    function save_user_by_list(){
        $data['list_id'] = $this->input->post('list_id');
        $data['member_id'] = $this->input->post('m_id');
        
        $res = $this->users_by_list_model->Search(array('list_id'=>$data['list_id'],'member_id'=>$data['member_id']));
        
        if(empty($res)){
            if($this->users_by_list_model->Save($data)){
              _setSuccess('Successfully Added By User List');
            }else{
                _setError('Error Adding User By List');
            }  
        }else{
            _setError('Already Added User By List'); 
        }
        
        
        redirect(site_url('admin/members_by_list'));
        exit();
    }
    
    function edit_user_by_list($id){
        $data['user_list'] = $this->user_list_model->GetAll();
        $data['form'] =  $this->users_by_list_model->GetById($id);  
        
        $data['page_title'] = 'Edit User By List';
        $data['content_view'] = 'admin/users_by_list/edit_by_list';
        $this->load->view('admin/sb-template', $data);
    }
    
    function update_user_by_list($id){
        $data['list_id'] = $this->input->post('list_id');
        $data['member_id'] = $this->input->post('m_id');
        
//        $res = $this->users_by_list_model->Search(array('list_id'=>$data['list_id'],'member_id'=>$data['member_id']));
        
        
        if($this->users_by_list_model->Save($data,$id)){
            _setSuccess('Successfully Updated User By List');
        }else{
            _setError('Error Updating User By List');
        }
        
        
        
        redirect(site_url('admin/members_by_list/'));
        exit();
    }
    
    
    function delete_user_by_list($id){
        if(!empty($id)){
            if($this->users_by_list_model->Delete($id)){
                _setSuccess('Successfully Deleted');
            }else{
                _setError('Error Deleting Members By List');
            }
            
            redirect(site_url('admin/members_by_list'));
            exit();
        }
    }


}

?>