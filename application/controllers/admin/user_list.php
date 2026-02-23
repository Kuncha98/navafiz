<?php

class User_list extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_list_model');
//        $this->load->library('paging_front');
    }


    function index()
    {
        $data['forms'] = $this->user_list_model->GetAll();
        $data['page_title'] = 'Users List';
        $data['content_view'] = 'admin/user_list/index';
        $this->load->view('admin/sb-template', $data);
        
        
//        $this->load->view('admin/user_list/index', $data);
    }
    
    function add_user_list(){
        
        $data['page_title'] = 'Add User List';
        $data['content_view'] = 'admin/user_list/add_user_list';
        $this->load->view('admin/sb-template', $data);
    }
    
    function save_user_list(){
        $data['name'] = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $data['added_by'] = $this->session->userdata('user_id');
        $data['added_on'] = date('Y-m-d');
        $data['page_views'] = 0;
        if($this->user_list_model->Save($data)){
            _setSuccess('Successfully Added User List');
        }else{
            _setError('Error Adding User List');
        }
        redirect(site_url('admin/user_list'));
        exit();
    }
    
    function edit_user_list($id){
        $data['form'] =  $this->user_list_model->GetById($id);  
        
        $data['page_title'] = 'Edit User List';
        $data['content_view'] = 'admin/user_list/edit_user_list';
        $this->load->view('admin/sb-template', $data);
    }
    function update_user_list($id){
        $data['name'] = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $data['updated_by'] = $this->session->userdata('user_id');
        $data['updated_on'] = date('Y-m-d');
        if($this->user_list_model->Save($data,$id)){
            _setSuccess('Successfully Updated User List');
        }else{
            _setError('Error Updating User List');
        }
        redirect(site_url('admin/user_list'));
        exit();
    }
    
    function delete_user_list($id){
        if(!empty($id)){
            if($this->user_list_model->Delete($id)){
                _setSuccess('Successfully Deleted');
            }else{
                _setError('Error Deleting User List');
            }
            
            redirect(site_url('admin/user_list'));
            exit();
        }
    }


}

?>