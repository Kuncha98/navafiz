<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_education extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('education_model');
        $this->session_user_id = $user_id = $this->session->userdata('user_id');
        if(empty($this->session_user_id)){
            redirect(site_url('login'));
            exit();
        } 
    }
    
    function index(){        
        
//        $education_data = $this->education_model->GetAll();
        
//        $data['education'] = $education_data;
        $data['page_title'] = 'Education';
        $data['content_view'] = 'admin/education/ajaxeducation';
        $this->load->view('admin/sb-template', $data);

    }	
    function add(){
        $data['page_title'] = 'Education';
        $data['content_view'] = 'admin/education/add_education';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('education/add-education');
    }    

    function edit($id){        
        $education = $this->education_model->GetById($id);
        $data['result'] = (array)$education;
        $data['page_title'] = 'Edit Education';
        $data['content_view'] = 'admin/education/edit_education';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('education/add-education',$data);
    }
    
    function ajaxDataManagementEducation(){
        if($this->input->post('actioncall')=="listforms")
			 {
			
			$limit = $this->input->post('limit');
			
			
			$data = array();
//			$total   =  $this->education_model->getTotalMembers();
			

//			 $data['total_variables'] 	= $total;
			 $data['limit_selected'] 	= $limit;
         //	$data['languages']   =  $this->admin_language_model->getLanguages();	
             $data['education'] = $this->education_model->getForms(array('limit' => $limit));
		     //$data['appointments'] = $this->admin_tasbeeh_model->getTasbeehReqs();
              
//             $data['paging_link'] = $paging_link;
            
              $this->load->view('admin/education/sb-forms',$data); 
                  }
    }
    
    function updateEducation()
    { 
        $user_id = $this->input->post('user_id');
        if(!empty($user_id)){
            $data['me_member_id'] = $user_id;
        }
        $id = $this->input->post('me_id');
        $degree = $this->input->post('me_degree');
        $year = $this->input->post('me_year');
        $detail = $this->input->post('me_descr');
        
        $data['me_degree'] = $degree;
        $data['me_year'] = $year;
        $data['me_descr'] = $detail;
        
        $this->education_model->Save($data,$id);
        _setSuccess("Educational Information Updated Successfully");
        redirect(site_url('admin/member_education'));
        exit;
    }
    
    function SaveEducation()
    { 
        $user_id = $this->input->post('user_id');
        if(!empty($user_id)){
            $data['me_member_id'] = $user_id;
        }
        
        $me_degree = $this->input->post('me_degree');
        $me_year = $this->input->post('me_year');
        $me_descr = $this->input->post('me_descr');

        if(!empty($me_degree) && !empty($me_year) && !empty($me_descr)){
            $data['me_degree'] = $me_degree;
            $data['me_year'] = $me_year;
            $data['me_descr'] = $me_descr;
//            print_r($data);
//            exit();
            $return =  $this->education_model->Save($data);

            _setSuccess("Educational Information Saved Successfully");
                redirect(site_url('admin/member_education'));
                exit;
        }else{
            _setError('Please Provide complete education info');
            redirect(site_url('admin/member_education'));
            exit();
        }

    }
    
    
       public function userList(){
  
    $postData = $this->input->post();
    $data = $this->education_model->getUsers($postData);

    echo json_encode($data);
  }
   
    function delete($id){
        _setSuccess('Record Deleted Successfully');
        $this->education_model->Delete($id);
        redirect(site_url('admin/member_education'));
        exit();
    }
    
  }

/* End of file front.php */
/* Location: ./application/controllers/front.php */