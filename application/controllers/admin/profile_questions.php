<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_questions extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_model','categories_model');
        $this->load->model('Recruitment_answer_model','answer_model');
        $this->load->model('Recruitment_question_model','question_model');
        $this->session_user_id = $user_id = $this->session->userdata('user_id');
        if(empty($this->session_user_id)){
            redirect(site_url('login'));
            exit();
        } 
    }
    
    function index($uri_user_id=0){  
       $data['forms'] = $this->question_model->GetAll();
       
       $data['page_title'] = 'Profile Questions';
       $data['content_view'] = 'admin/profile_questions/list_questions';
       $this->load->view('admin/sb-template', $data);

    }
    
    function add_question(){
        
       $data['categories'] = $this->categories_model->GetAll();
       $data['page_title'] = 'Add Question';
       $data['content_view'] = 'admin/profile_questions/add_question';
       $this->load->view('admin/sb-template', $data);
    }
    

  

    function edit_question($id){
        
        
        $question = $this->question_model->GetById($id);
        $data['categories'] = $this->categories_model->GetAll();
        
        $data['result'] = $question;
        $data['page_title'] = 'Certifications';
        $data['content_view'] = 'admin/profile_questions/edit_question';
        $this->load->view('admin/sb-template', $data);
       
    }
    
    function update_question($id)
    { 
        $data['title'] = $this->input->post('title');
        $data['option_1'] = $this->input->post('option_1');
        $data['option_2'] = $this->input->post('option_2');
        $data['option_3'] = $this->input->post('option_3');
     
        
        $this->question_model->Save($data,$id);
        _setSuccess("Question Information Updated Successfully");
        redirect(site_url('admin/profile_questions/'));
        exit;
    }
    
    function save_question()
    {   
        $data['title'] = $this->input->post('title');
        $data['option_1'] = $this->input->post('option_1');
        $data['option_2'] = $this->input->post('option_2');
        $data['option_3'] = $this->input->post('option_3');
            
        $return = $this->question_model->Save($data);
        if(count($return) > 0){
            _setSuccess('Question added successfully');
        }else{
            setError('Error Adding Question');
        }
        
        redirect(site_url('admin/profile_questions'));
        

    }
    
    
   public function userList(){
  
    $postData = $this->input->post();
    $data = $this->question_model->getUsers($postData);

    echo json_encode($data);
  }
  
//  function assign_categories(){
//      $data['page_title'] = 'List Assign Categories';
//       $data['content_view'] = 'admin/assign_categories/form';
//       $this->load->view('admin/sb-template', $data);
//  }
    
    
   
    function delete_question($id){
        
        
       $ans = $this->answer_model->Search(array('question_id' => $id));
       if(count($ans) > 0){
           $this->answer_model->DeleteQuestion($id);
       }
       $ques = $this->assigned_question_model->Search(array('question_id' => $id));
       if(count($ques) > 0){
         $this->assigned_question_model->DeleteAssignedQuestion($id);
       }
        
        $this->question_model->Delete($id);
        _setSuccess('Question Deleted Successfully');
        redirect(site_url('admin/profile_questions/'));
        exit();
    }
    
  }

