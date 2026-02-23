<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {
    function __construct() {
        parent::__construct();
       $this->load->model('training_model');
       $this->load->helper('date');
       $this->session_user_id = $user_id = $this->session->userdata('user_id');
        if(empty($this->session_user_id)){
            redirect(site_url('login'));
            exit();
        }
    }
    
 
    
 public function index(){
     
     $data['courses_cat'] = $this->training_model->GetCoursesCategories();
     $data['courses'] = $this->training_model->GetAllCourses();
     
//     $cat_id =1;
//     $data['courses_list'] = $this->training_model->GetAjaxCourses($cat_id);
//     
//     echo "<pre>";
//     print_r($data['courses_list']);
//     exit();
     
     $this->load->view('training/index',$data);
 }
 
 
 public function enroll($id){
     LoginCheck();
     $course_id = $id;
     $user_id = $this->session_user_id;
     
     $data['student_id'] = $user_id;
     $data['course_id'] = $course_id;
     
     if($this->training_model->courseEnroll($data)){
         _setSuccess('Enrolled Successfully');
     }else{
         _setError('Error Enrolling in Coiurse');
     }
     redirect(site_url('training/courseDetail/'.$id));
 }
 
 public function add_course(){
     $courses_cat = $this->training_model->GetCoursesCategories();
     $data['courses_cat'] = $courses_cat;
     $this->load->view('training/add-course',$data);
 }
 public function save_course(){
     $data['title'] = $this->get_post('title');
     $data['price'] = $this->get_post('price');
     $data['category_id'] = $this->get_post('category_id');
     $data['description'] = $this->get_post('description');
     $data['added_by'] = $this->session_user_id;
     $data['max_students'] = $this->get_post('max_students');
     $data['about_instructor'] = $this->get_post('about_instructor');
     $data['language'] = $this->get_post('language');
     $date = $this->get_post('enrollment_date');
     
     $myDateTime = DateTime::createFromFormat('Y-m-d', $date);
//     $formattedweddingdate = $myDateTime->format('d-m-Y');
     
//     $date = date_format($date,"Y/m/d");
     
     $data['last_date_to_enroll'] = $myDateTime->format('Y-m-d');;
     $data['skill_level'] = $this->get_post('skill_level');
     $data['added_on'] = date('Y-m-d');
     $data['duration'] = $this->get_post('duration');
    
     
     if($_FILES['img']['name']){
                   
        $config=array();
        $config['upload_path'] ='assets/uploads/courses';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 2000;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('img')) {
            echo $error =  $this->upload->display_errors();
            exit;
            $this->session->set_flashdata('execption',$error);
            redirect('training/add_course');
        }
        else
        {                     
            $data1 = $this->upload->data();            
            $c_img = $data1['file_name'];
        
        }

    }else{
        $c_img = ""; 
    }
    $data['course_image'] = $c_img;
    if($this->training_model->Save($data)){
        _setSuccess('Courses Added Successfully');
        
    }else{
        _setError('Error Adding Course');
    }
    redirect(site_url('training'));
    exit();
    
 }
 
 public function course_rating($course_id) {
    LoginCheck(); 
    $user_id = $this->session_user_id;
    $data['rating'] = $this->input->post('rating');
    $data['comments'] = $this->input->post('comment');
    $data['student_id'] = $user_id;
    $data['course_id'] = $course_id;
    
//    print_r($data);exit();
    $res = $this->training_model->SearchCourseRating(array('student_id'=>$user_id,'course_id'=>$course_id));
    if(empty($res)){
        if($this->training_model->SaveCourseRating($data)){
            _setSuccess("Thank you for your feedback");
        }else{
            _setError('Error saving your feedback');
        }
        
    }else{
        _setError('You have alreay given your feedback');
    }
    redirect(site_url('training/courseDetail/'.$course_id));
    exit();
    
 }
 
 
 public function trainingajax($cat_id){
     
     
     $data['courses'] = $this->training_model->GetAjaxCourses($cat_id);
     $this->load->view('training/list-courses',$data);
     
     
     
 }
 
 public function courseDetail($course_id){
     if(!empty($course_id)){
        
//        $res = $this->training_model->TotalRating($course_id); 
         
        $user_id = $this->session_user_id;
        $res = $this->training_model->SearchCourse(array('student_id'=>$user_id,'course_id'=>$course_id));
        if(!empty($res)){
            $data['course_taken'] = "taken";
        }else{
            $data['course_taken'] = "not-taken";
        }
        $course = $this->training_model->GetByIdDetail($course_id);
        $data['course'] = $course[0];
//        print_r($data['course_taken']);exit();
        $this->load->view('training/course-details',$data);
     }
 }
 
 
   
}


