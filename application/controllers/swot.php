<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Swot extends MY_Controller {
    function __construct()
    {
        parent::__construct();
	$this->load->model('member_model');
	$this->load->model('job_model');
	$this->load->library('paging_front');	
        $this->load->library('pagination');     
        $this->load->model('swot_model');
        $this->user_id = $this->session->userdata('user_id');
    }
    
    
    public function index(){
    
        LoginCheck(site_url('login'));
        
        $user_detail = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            
        if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city)){
            redirect(site_url('profile'));
            exit;
        }

        $data['profile'] = $user_detail;
        $data['pagename'] = "home";
        $this->load->view('pages/swot', $data);
    }
    
    function edit(){
        LoginCheck(site_url('login'), current_url());
        
        $userswot_data = $this->swot_model->Search(array('member_id'=>$this->user_id));        
        $my_strengths = '';
        $my_weeknesses = '';
        $opportunities = '';
        $my_threats = '';
        foreach ($userswot_data as $sdata){
            if($sdata->type=='my-strengths'){
                $my_strengths = $sdata->desc;
            }
            if($sdata->type=='my-weeknesses'){
                $my_weeknesses = $sdata->desc;
            }
            if($sdata->type=='opportunities'){
                $opportunities = $sdata->desc;
            }
            if($sdata->type=='my-threats'){
                $my_threats = $sdata->desc;
            }
        }
        
        $data['my_strengths'] = $my_strengths;
        $data['my_weeknesses'] = $my_weeknesses;
        $data['opportunities'] = $opportunities;
        $data['my_threats'] = $my_threats;                
        $this->load->view('swot/index', $data);            
    }
    
    function save(){
        LoginCheck(site_url('login'), current_url());
      
        $my_strengths = $this->get_post('my_strengths');
        $my_weeknesses = $this->get_post('my_weeknesses');
        $opportunities = $this->get_post('opportunities');
        $my_threats = $this->get_post('my_threats');        
        
        $data['desc'] = $my_strengths;
        $data['member_id'] = $this->user_id;
        $data['type'] = 'my-strengths';
        $data['added_on'] = datenow();
        $this->swot_model->Delete(array('type'=>'my-strengths','member_id'=>$this->user_id));
        $this->swot_model->Save($data);
        
        $data['desc'] = $my_weeknesses;
        $data['member_id'] = $this->user_id;
        $data['type'] = 'my-weeknesses';
        $data['added_on'] = datenow();
        $this->swot_model->Delete(array('type'=>'my-weeknesses','member_id'=>$this->user_id));
        $this->swot_model->Save($data);
        
        $data['desc'] = $opportunities;
        $data['member_id'] = $this->user_id;
        $data['type'] = 'opportunities';
        $data['added_on'] = datenow();
        $this->swot_model->Delete(array('type'=>'opportunities','member_id'=>$this->user_id));
        $this->swot_model->Save($data);
        
        $data['desc'] = $my_threats;
        $data['member_id'] = $this->user_id;
        $data['type'] = 'my-threats';
        $data['added_on'] = datenow();
        $this->swot_model->Delete(array('type'=>'my-threats','member_id'=>$this->user_id));
        $this->swot_model->Save($data);
        
        _setSuccess("Swot is updated successfully");
        redirect(site_url('track_steps/sheet/'.$this->user_id));
        exit();        
    }
    
    function swot_type($type){
        LoginCheck(site_url('login'), current_url());

        $myswot_data = $this->swot_model->Search(array('type'=>$type,'member_id'=>$this->user_id));

        $swot_submit = intval($this->get_post('swot_submit',0));
        if($swot_submit>0){

            $data['desc'] = $this->get_post('swot_desc');
            $data['member_id'] = $this->user_id;
            $data['type'] = $type;
            $data['added_on'] = datenow();

            $this->swot_model->Delete(array('type'=>$type,'member_id'=>$this->user_id));
            $this->swot_model->Save($data);

            redirect(site_url('swot/'.$type));
            exit;
        }

        $data['swot_type'] = $type;
        $data['myswot_data'] = $myswot_data;
        $data['pagename'] = "home";
        $this->load->view('pages/swot-detail', $data);            
    }
    
}