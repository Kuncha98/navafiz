<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Education extends MY_Controller {
    
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
        
        $education_data = $this->education_model->Search(array('me_member_id'=>$this->session_user_id));
        $data['education'] = $education_data;
        $this->load->view('education/education', $data);

    }	
    function add(){
        $this->load->view('education/add-education');
    }    

    function edit($id){        
        $education = $this->education_model->GetById($id);
        $data['result'] = (array)$education;
        $this->load->view('education/add-education',$data);
    }
    
    function updateEducation()
    { 
        $user_id = $this->input->post('user_id');
        $id = $this->input->post('me_id');
        $degree = $this->input->post('me_degree');
        $year = $this->input->post('me_year');
        $detail = $this->input->post('me_descr');
        
        $data = array(
            'me_member_id' =>$this->session->userdata('user_id'),
            'me_degree' =>$degree,
            'me_year' =>$year,
            'me_descr' =>$detail); 
        
        $this->education_model->Save($data,$id);
        _setSuccess("Educational Information Updated Successfully");
        redirect(site_url('education'));
        exit;
    }
    
    function SaveEducation()
    { 
        $me_degree = $this->input->post('me_degree');
        $me_year = $this->input->post('me_year');
        $me_descr = $this->input->post('me_descr');
        if(!empty($me_degree) && !empty($me_year) && !empty($me_descr)){
            
            
            $return =  $this->education_model->Save(
                array(
                    'me_member_id' =>$this->session->userdata('user_id'),
                    'me_degree' =>$me_degree,
                    'me_year' =>$me_year,
                    'me_descr' =>$me_descr,
                    'me_add_date'=>date('Y-m-d H:i:s')
                )
            );

            _setSuccess("Educational Information Saved Successfully");
                redirect(site_url('education'));
                exit;
        }else{
            _setError('Please Provide complete education info');
            redirect(site_url('education'));
            exit();
        }

    }
   
    function delete($id){
        _setSuccess('Record Deleted Successfully');
        $this->education_model->Delete($id);
        redirect(site_url('education'));
        exit();
    }
    
  }

/* End of file front.php */
/* Location: ./application/controllers/front.php */