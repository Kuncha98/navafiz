<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assigned_questions extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_model','categories_model');
        $this->load->model('Assigned_question_model','assigned_question_model');
        $this->load->model('Recruitment_question_model','question_model');
        $this->load->model('Recruitment_answer_model','answer_model');
        
        
        
        $this->session_user_id = $user_id = $this->session->userdata('user_id');
        if(empty($this->session_user_id)){
            redirect(site_url('login'));
            exit();
        } 
    }
    
    function index(){  
       $data['forms'] = $this->assigned_question_model->GetAll();
       
       $data['page_title'] = 'Assign Questions';
       $data['content_view'] = 'admin/assigned_questions/list_assigned_questions';
       $this->load->view('admin/sb-template', $data);
}
    
    function add_question(){
       $data['questions'] = $this->question_model->GetAll();
       $data['categories'] = $this->categories_model->GetAll();
//       $data['user_id'] = $this->input->post('user_id');
       $data['page_title'] = 'Assign Question';
       $data['content_view'] = 'admin/assigned_questions/add_question';
       $this->load->view('admin/sb-template', $data);
    }
    

  

    function edit_question($id){
        
        $data['forms'] = $this->question_model->GetAll();
        $assigned_question = $this->assigned_question_model->GetById($id);
        $data['categories'] = $this->categories_model->GetAll();
        
        $data['assigned_question'] = $assigned_question;
        $data['page_title'] = 'Edit Assign Question';
        $data['content_view'] = 'admin/assigned_questions/edit_question';
        $this->load->view('admin/sb-template', $data);
       
    }
    
    function update_question($id)
    { 
        $data['question_id'] = $this->input->post('question_id');
        $data['cat_id'] = $this->input->post('cat_id');
        $data['type'] = $this->input->post('type');
         $res = $this->assigned_question_model->Search(array('question_id'=>$data['question_id']));
         if(empty($res[0]->cat_id)){
//            echo "Not Exists";
//             print_r($res);
//             exit();
             $return = $this->assigned_question_model->Save($data,$id);
             if(count($return) > 0){
                 _setSuccess('Updated Question successfully');
             }else{
                 _setError('Error Assigning Question');
             } 
        }
        _setError("Cannot Update Question");
        redirect(site_url('admin/assigned_questions/'));
        exit;
    }
    
    function save_question()
    {   
        $data['question_id'] = $this->input->post('question_id');
        $data['cat_id'] = $this->input->post('cat_id');
        $data['type'] = 'by_category';        
        $res = $this->assigned_question_model->Search(array('question_id'=>$data['question_id']));        
        if(empty($res[0]->cat_id)){
//            echo "Not Exists";
//             print_r($res);
//             exit();
             $return = $this->assigned_question_model->Save($data);
             if(count($return) > 0){
                 _setSuccess('Assigned Question successfully');
             }else{
                 _setError('Error Assigning Question');
             } 
        }
        
        _setError('Cannot Assign Multiple Category To A Single Question');
        redirect(site_url('admin/assigned_questions'));
    }
    
    
   public function userList(){
  
    $postData = $this->input->post();
    $data = $this->question_model->getUsers($postData);

    echo json_encode($data);
  }
    
    
   
    function delete_question($q_id,$u_id){
        
      $res = $this->answer_model->Search(array('question_id'=>$q_id,'user_id' => $u_id));

        if(count($res)>0 ){
            $this->answer_model->DeleteAns($q_id,$u_id);
        }
        
        $this->assigned_question_model->Delete($q_id,$u_id);
        
        _setSuccess('Question Deleted Successfully');
        redirect(site_url('admin/assigned_questions/'));
        exit();
    }
    
  }

