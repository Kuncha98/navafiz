<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {    
	
    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('page_model');
        $this->load->model('member_model');
        $this->load->model('social_groups_model');
        $this->load->model('socialgroups_subscribers');
        $this->load->model('companies_model','companies');
        $this->load->model('employment_history_model','employment_history_model');

        $d = $this->front_model->getSettings();
        foreach($d as $c)
        {
            $this->global_array[$c->option] = $c->value;
        }
        $user_id = $this->session->userdata('user_id');
        if($user_id == ""){ redirect(site_url('login'));}
    }
    
    function EmploymentHistory($emp_history_id=0){
        
        $user_id = $this->session->userdata('user_id');
        
        $current_emphistory = array();
        if($emp_history_id>0){            
            $current_emphistory = $this->employment_history_model->Search(array('emp_history_id'=>$emp_history_id));
            if(count($current_emphistory>0)){
                $current_emphistory = $current_emphistory[0];
            }
        }
        $companies_list = $this->companies->GetAll();    
        $employment_history = $this->employment_history_model->Search(array('user_id'=>$user_id));    
        
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id'))); 
        $data['employment_history'] = $employment_history; 
        $data['current_emphistory'] = $current_emphistory; 
        $data['companies_list'] = $companies_list;
        $data['emp_history_id'] = $emp_history_id;
        $this->load->view('profile/employment-history', $data);

    }
    
    function UpdateEmploymentHistory()
    { 
        $user_id = $this->session->userdata('user_id');
        
        $emp_history_id = intval($this->get_post('emp_history_id',0));
        $company_name = $this->get_post('company_name');
        $start_year = $this->get_post('start_year');
        $end_year = $this->get_post('end_year');
        $description = $this->get_post('description');
        $position_designation = $this->get_post('position_designation');
        
        $data['user_id'] = $user_id;
        $data['company_name'] = $company_name;
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
        
        redirect(site_url('employment-history'));
        exit;
        
    }
    function DelEmpHistory($emp_history_id)
    {
        $return = $this->employment_history_model->Delete($emp_history_id);
        if($return>0){
            _setSuccess("Employment History Deleted");
        }else{
            _setError("Unable to process request");
        }        
        redirect(site_url('employment-history'));
        exit;
    }
	
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */