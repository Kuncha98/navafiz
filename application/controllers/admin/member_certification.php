<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_certification extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('certification_model');
        $this->session_user_id = $user_id = $this->session->userdata('user_id');
        if(empty($this->session_user_id)){
            redirect(site_url('login'));
            exit();
        } 
    }
    
    function index($uri_user_id=0){  
       $data['forms'] = $this->certification_model->GetAll();
       
       $data['page_title'] = 'Certifications';
       $data['content_view'] = 'admin/certifications/sb-forms';
       $this->load->view('admin/sb-template', $data);

    }
    
    function add(){
        $data['forms'] = $this->certification_model->GetAll();
       
       $data['page_title'] = 'Add Certification';
       $data['content_view'] = 'admin/certifications/add_certification';
       $this->load->view('admin/sb-template', $data);
    }
    
//    
//    
//    function save($uri_user_id=0){
//        if($uri_user_id>0){
//            $data['uri_user_id'] = $uri_user_id;
//        }else{
//            $data['uri_user_id'] = '';
//        }
//        $this->load->view('certification/add-certification', $data);
//    }    

    function edit($id,$uri_user_id=0){
        if($uri_user_id>0){
            $data['uri_user_id'] = $uri_user_id;
        }else{
            $data['uri_user_id'] = '';
        }
        
        $certification = $this->certification_model->GetById($id);
        
        $data['result'] = (array)$certification;
        $data['page_title'] = 'Certifications';
        $data['content_view'] = 'admin/certifications/edit_certification';
        $this->load->view('admin/sb-template', $data);
       
//        $this->load->view('certification/add-certification',$data);
    }
    
    function updateCertification($uri_user=0)
    { 
        
        if($uri_user==0){
            $uri_user_id = $this->session->userdata('user_id');
        }else{
            $uri_user_id = $uri_user;
        }
        
        
        $id = $this->input->post('c_id');
        $title = $this->input->post('c_title');
        $description = $this->input->post('c_description');
        $duration = $this->input->post('c_duration');
        
          
        $config=array();
        $config['upload_path'] ='nassets/profile/courses-ceritificates/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;
        $this->upload->initialize($config);

        
       if(!empty($_FILES['img']['name'])){
            
             if($this->upload->do_upload('img')){
                $udata = array('upload_data' => $this->upload->data());                
                $c_img = $udata['upload_data']['file_name'];            
                $data['certification_file'] = $c_img;                
            }else{
                $errors = $this->upload->display_errors();
                echo "<pre>"; print_r($errors); echo "</pre>";
                exit;
            }
        }
        
        $data['user_id']=$uri_user_id;
        $data['c_title'] = $title;
        $data['c_description'] = $description;
        $data['c_duration'] = $duration; 
        
        $this->certification_model->Save($data,$id);
        _setSuccess("Certification Information Updated Successfully");
        redirect(site_url('admin/member_certification/'));
        exit;
    }
    
    function SaveCertification()
    {   
        $user_id = $this->input->post('user_id');
//        $m_name = $this->input->post('m_name');
        $c_title = $this->input->post('c_title');
        $c_description = $this->input->post('c_description');
        $c_duration = $this->input->post('c_duration');
            
        if($_FILES['img']['name']){
            
         
        $config=array();
        $config['upload_path'] ='nassets/profile/courses-ceritificates/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('img')) {
            echo $error =  $this->upload->display_errors();
            exit;
            $this->session->set_flashdata('execption',$error);
            redirect('admin/member_certification/SaveCertification');
        }
        else
        {                     
            $data1 = $this->upload->data();            
            $c_img = $data1['file_name'];
        
        }

    }else{
        $c_img = ""; 
    }
 
         
        
        if(!empty($c_title) && !empty($c_description) && !empty($c_duration)){
            $return =  $this->certification_model->Save(
                array(
                    
                    'user_id' =>$user_id,
                    'c_title' =>$c_title,
                    'c_description' =>$c_description,
                    'c_duration' =>$c_duration,
                    'certification_file'=> $c_img
                )
            );

            _setSuccess("Certification Information Updated Successfully");
                redirect(site_url('admin/member_certification/'));
                exit;
        }else{
            _setError('Please Provide complete certification info');
            redirect(site_url('admin/member_certification/'));
            exit();
        }

    }
    
    
   public function userList(){
  
    $postData = $this->input->post();
    $data = $this->certification_model->getUsers($postData);

    echo json_encode($data);
  }
    
    
   
    function delete($id){
        if($uri_user==0){
            $uri_user_id = $this->session->userdata('user_id');
        }else{
            $uri_user_id = $uri_user;
        }
        _setSuccess('Record Deleted Successfully');
        $this->certification_model->Delete($id);
        redirect(site_url('admin/member_certification/'));
        exit();
    }
    
  }

