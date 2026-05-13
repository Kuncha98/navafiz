<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employment extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('employment_history_model');
        $this->load->model('companies_model','companies');
        
        $this->session_user_id = $user_id = $this->session->userdata('user_id');
        if(empty($this->session_user_id)){
            redirect(site_url('login'));
            exit();
        }
    }
    
    function index($emp_history_id=0){
        
        $current_emphistory = array();
        if($emp_history_id>0){            
            $current_emphistory = $this->employment_model->Search(array('emp_history_id'=>$emp_history_id));
            if(is_array($current_emphistory)){
                $current_emphistory = $current_emphistory[0];
            }
        }
        
        // $companies_list = $this->companies->GetAll();    
        $employment_history = $this->employment_history_model->Search(array('user_id'=> $this->session_user_id));    
        
        $data['employment_history'] = $employment_history; 
        $data['current_emphistory'] = $current_emphistory; 
        // $data['companies_list'] = $companies_list;
        $data['emp_history_id'] = $emp_history_id;
        // echo "<pre>";
        // print_r($current_emphistory);
        // die();
        $this->load->view('employment/employment-history',$data);

    
    }	
    
    function add($emp_history_id=0){
    
        $current_emphistory = array();
        if($emp_history_id>0){            
            $current_emphistory = $this->employment_history_model->Search(array('emp_history_id'=>$emp_history_id));
            if(is_array($current_emphistory)){
                $current_emphistory = $current_emphistory[0];
            }
        }
        // $companies_list = $this->companies->GetAll();    
        $employment_history = $this->employment_history_model->Search(array('user_id'=> $this->session_user_id));    
        $data['employment_history'] = $employment_history; 
        $data['current_emphistory'] = $current_emphistory; 
        $data['emp_history_id'] = $emp_history_id; 
        $this->load->view('employment/add-employment',$data);
    }
    
    function Save()
    { 
        // echo "<pre>";
        // print_r($_POST);
        // die();
        $emp_history_id = intval($this->get_post('emp_history_id',0));
        $company_name = $this->get_post('company_name');
        $company_id = $this->get_post('company_id');
        $start_year = $this->get_post('start_year');
        $end_year = $this->get_post('end_year');
        $description = $this->get_post('description');
        $position_designation = $this->get_post('position_designation');
        $to_date = $this->get_post('to_date','');		

        if (!empty($to_date)) {
                $end_year = $to_date;
        }
        if(empty($company_id)){
            _setError('Please select a valid company or add new company if not exist');
            redirect(site_url('employment/add'));
            exit();
        }	
        
        $data['user_id'] = $this->session_user_id;
        $data['company_name'] = $company_name;
        $data['company_id'] = $company_id;
        $data['position_designation'] = $position_designation;
        $data['start_year'] = $start_year;
        $data['end_year'] = $end_year;
        $data['description'] = $description;
        
        if($emp_history_id>0){
            $data['updated_on'] = date('Y-m-d H:i:s');
        }else{
            $data['added_on'] = date('Y-m-d H:i:s');
        }
        
        $return = $this->employment_history_model->Save($data,$emp_history_id);
        if($return>0){
            _setSuccess("Employment History Updated");
        }else{
            _setError("Unable to process request");
        }
        
        redirect(site_url('employment'));
        exit;
        
    }
    
    function delete($emp_history_id)
    {
        $return = $this->employment_history_model->Delete($emp_history_id);
        if($return>0){
            _setSuccess("Employment History Deleted");
        }else{
            _setError("Unable to process request");
        }        
        redirect(site_url('employment'));
        exit;
    }  
  }

/* End of file front.php */
/* Location: ./application/controllers/front.php */