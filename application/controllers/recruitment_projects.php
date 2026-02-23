<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recruitment_projects extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('recruitment_projects_model','recruitment_model');        
        $this->session_user_id = $this->session->userdata('user_id');
    }
    
    function index(){
        $session_user_id = $this->session_user_id;
        if(in_array($session_user_id, CvReviewTeamList())){
        $all_members = $this->recruitment_model->GetAll();
        $data['members'] = $all_members;
        $this->load->view('recruitment_projects/list-recruitments',$data);
        }else{
            _setError("You don't have permission to access this page");
            
        }
    }
            
    function add(){
        $this->load->view('recruitment_projects/add');
    }
    
    function save(){
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone_no'] = $this->input->post('phone_no');
        
        $res = $this->recruitment_model->Search(array('email'=>$data['email'],'phone_no'=>$data['phone_no']));
        if(empty($res)){
            if($this->recruitment_model->Save($data)){
            _setSuccess("Successfully registered");
            }else{
                _setError('Error in registration');
            }
        }else{
             _setError('Already registered');
        }
        
        redirect(site_url('recruitment_projects'));
        exit();
    }
    
    function edit_recruitment($id){
        
        $details = $this->recruitment_model->GetById($id);
        $data['details'] = $details;
        $this->load->view('recruitment_projects/edit-recruitment',$data);
    }
    
    function update_recruitment($id){
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone_no'] = $this->input->post('phone_no');
        
        if($this->recruitment_model->Save($data,$id)){
            _setSuccess("Successfully Updated");
        }else{
                _setError('Error in updating');
        }
        
        redirect(site_url('recruitment_projects'));
        exit();
    }
    
    function delete_recruitment($id){
        
        _setSuccess('Record Deleted Successfully');
        $this->recruitment_model->Delete($id);
        redirect(site_url('recruitment_projects/'));
        exit();
    }
    
}