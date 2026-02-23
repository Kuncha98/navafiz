<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member2 extends CI_Controller {

   public function __construct(){

     parent::__construct();
    $this->load->helper('url');

     // Load model
     $this->load->model('admin_member_model');
    $this->load->model('member_model');
    $this->load->model('categories_model');
    $this->load->model('Profile_model','profile_model');
    $this->load->model('member_job_portals');

    $this->load->model('certification_model');
    $this->load->model('member_summary_career_model','summary_career_model');

    $this->load->model('members_data_model');

   }

   public function index(){

     // load view
       $data['page_title'] = 'List Members';
       $data['content_view'] = 'admin/members/index';
       $this->load->view('admin/sb-template', $data);
       
//     $this->load->view('members2/index');

   }

   public function empList(){

     // POST data
     $postData = $this->input->post();

     // Get data
     $data = $this->members_data_model->getEmployees($postData);

     echo json_encode($data);
  }
  
  public function edit_member($id){
      
       
      $data['categories'] = $this->categories_model->GetAll();
      $data['form'] =  $this->admin_member_model->getForms(array('m_id' => $id));  
      
      $data['page_title'] = 'Edit Members';
      $data['content_view'] = 'admin/members/showeditform';
      $this->load->view('admin/sb-template', $data);
      
  }
  
  public function delete_member($id){
      if($this->member_model->Delete_member($id)){
            _setSuccess('Member Deleted Successfully');

        }else{
            _setError('Error Deleting Member');
        }

        redirect(base_url('admin/member2'));
  }

}

?>