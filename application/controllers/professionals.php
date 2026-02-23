<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professionals extends CI_Controller {
        var $limit  = 12; var $offset = 0; var $pages  = 7;
	public $global_array; 
        
	function __construct()
        {
            parent::__construct();
            $this->load->model('profile_model');
            $this->load->model('job_model');
            $this->load->model('member_model');
            $this->load->model('user_list_model');
            $this->load->model('users_by_list_model');
            $this->session_user_id = $this->session->userdata('user_id');            
            
        }
        
        
        function index(){
            LoginCheck(site_url('login'), current_url());
            $data = array();
            $data['limit'] = 30;                                    
            $this->load->view('professionals/main_professionals_view', $data);    
        }
        
        function search(){
            $data['value'] = 'professionals';
            $this->load->view('professionals/search',$data);
        }
        
        function search_form($limit){
//            echo $limit;exit();
            LoginCheck(site_url('login'), current_url());
            $search_keyword = $this->input->post('search_keyword');
            $search_id = $this->input->post('search_id');
            
            $data['search_keyword'] = $search_keyword;
            $data['limit'] = $limit;
            $data['search_id'] = $search_id;
            
            if($search_id == 1){
            
            $list_profiles = $this->profile_model->getSearchKeyword($search_keyword,$limit);
            
            
            $data['professionals'] = $list_profiles;
            $data['title'] = 'Professionals';
            
     
            $this->load->view('professionals/search_prof', $data);

            }else if ($search_id == 2) {
                $list_results = $this->job_model->jobSearchKeyword($search_keyword,$limit);
//                
                
                $data['jobs'] = $list_results;
                $data['title'] = 'Jobs';
                
                $this->load->view('professionals/search_job', $data);
            }else{
                redirect(site_url('search'));
            }
        }
        
        function searchKeywordAjax() {
            $search_keyword = $this->input->post('search_keyword');
            $limit = $this->input->post('limit');
            $search_id = $this->input->post('search_id');
//            echo $search_id;exit();
//            echo $limit;exit();
            $data['search_keyword'] = $search_keyword;
            $data['limit'] = $limit;
            $data['search_id'] = $search_id;
            
            if($search_id == 1){
                $list_profiles = $this->profile_model->getSearchKeyword($search_keyword,$limit);
//                echo "<pre>"; print_r($list_profiles);exit();
                
                $data['professionals'] = $list_profiles;
                $data['title'] = 'Professionals';

                $this->load->view('professionals/ajax_search_prof', $data);
            }else if($search_id == 2){
                $list_results = $this->job_model->jobSearchKeyword($search_keyword,$limit);
//                print_r($list_results); exit();
                
                $data['jobs'] = $list_results;
                $data['title'] = 'Jobs';
                
                $this->load->view('professionals/ajax_search_job', $data);
            }
        }
        
        function professionalsajax()
        {
            LoginCheck(site_url('login'), current_url());
            
            $data = array();
            $page_id = $this->input->post('page_id');
            $limit = $this->input->post('limit');            
            
            $pdata['by_name'] = trim($this->get_post('by_name'));
            $pdata['by_skills'] = trim($this->get_post('by_skills'));
            $pdata['by_profession'] = trim($this->get_post('by_profession'));
            $pdata['m_nationality'] = trim($this->get_post('m_nationality'));
            $pdata['m_current_city'] = trim($this->get_post('m_current_city'));
            $pdata['s_catid'] = $this->get_post('s_catid');
            $pdata['register_on'] = $this->get_post('register_on');
            $pdata['m_phone'] = $this->get_post('m_phone');
            $pdata['m_email'] = $this->get_post('m_email');
            $custom_filter1 = $this->get_post('custom_filter');
            $custom_filter2 = lcfirst($custom_filter1);
            $pdata['custom_filter1'] = $custom_filter1;
            $pdata['custom_filter2'] = $custom_filter2;
            $pdata['status'] = 1;
            $pdata['limit'] = $limit;
            
            $list_profiles = $this->profile_model->SearchProfessionals($pdata);
            
            $data['limit_selected'] = $limit;
            $data['professionals'] = $list_profiles;
           if($custom_filter1 == 'Nurs'){
               $data['title'] = "Nurses";
           }else if($custom_filter1 == 'Cashier'){
               $data['title'] = "Cashiers";
           }else if($custom_filter1 == 'Caregiver'){
               $data['title'] = "Caregivers";
           }else{
               $data['title'] = "Professionals";
           }
//            echo "<pre>";print_r($list_profiles);exit();
            $this->load->view('professionals/listprofessionals', $data);
        }
        
        public function users_by_list_json($list_id = '100') {
            $users_by_list = $this->users_by_list_model->Search(['list_id' => $list_id]);
        
            $members = [];
            foreach ($users_by_list as $user) {
                if ($user->member_id > 0) {
                    // Use your existing function
                    $profile = $this->member_model->get_mem_profile($user->member_id);
        
                    if ($profile) {
                        $members[] = [
                            'id'             => $user->id,
                            'member_id'      => $user->member_id,
                            'm_name'         => $profile['m_name'],
                            'm_profession'   => $profile['m_profession'],
                            'm_avatar'       => $profile['m_avatar'],
                            'm_skills'       => $profile['m_skills'],
                            'm_current_city' => $profile['m_current_city'],
                        ];
                    }
                }
            }
        
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['members' => $members]));
        }


        public function testimonials() {
            $this->load->model('testimonials_model');
            $this->load->model('member_model'); // to fetch user details
        
            $testimonials = $this->testimonials_model->GetAll();
        
            $result = [];
            foreach ($testimonials as $t) {
                // get member details from user_id
                $member = $this->member_model->get_mem_profile($t->user_id);
        
                $result[] = [
                    'id'          => $t->id,
                    'title'       => $t->title,
                    'description' => $t->description,
                    'added_on'    => date("M d, Y", strtotime($t->added_on)),
                    'name'        => $member['m_name'] ?? 'Anonymous',
                    'avatar'      => !empty($member['m_avatar'])
                                        ? site_url("assets/uploads/members/".$member['m_avatar'])
                                        : site_url("assets/uploads/members/default.png"),
                    'profession'  => $member['m_profession'] ?? '',
                ];
            }
        
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['testimonials' => $result]));
        }





        function searchProfessionals(){
            
            LoginCheck(site_url('login'), current_url());
            
            $data = array();
            $s_location = $this->input->post('s_location');
            $s_catid = $this->input->post('s_catid');
            $s_skills = $this->input->post('s_skills');
            $data['search']= $this->input->post('s_skills');
            
            if($this->input->post('actioncall')=="searchprofessionals"){
                
                $list_profiles = $this->profile_model->SearchProfessionals(array('s_location' =>$s_location,'cat_id' =>$s_catid,'profession' =>$s_skills,'m_phone'=>$m_phone,'m_email'=>$m_email));
                
                $data['professionals'] =  $list_profiles;
                $this->load->view('professionals/listprofessionals', $data);
            }
        }
        
        function nurseslist(){
            
            $data = array();                        
            $this->load->model('certification_model');
            $certifications = $this->certification_model->GetAll();           
            $data = array(); 
            $data['certifications'] =  $certifications;             
            $list_profiles = $this->db->query("Select * from ".MEMBER_TABLE." where `m_skills` LIKE '%Nurs%' or `m_profession` LIKE '%nurs%' order by last_login_date desc")->result();
            $data['title'] =  "Nurses List";
            $data['professionals'] =  $list_profiles;                      
            $data['listprofessionals'] =  'professionals/listprofessionals';                      
            $this->load->view('professionals/nurses-list', $data);            
        }
        
        function AjaxSearch($search_proff){
            
            $search1 = lcfirst($search_proff);
//            $search = $this->input->post('search_proff');
            $search2 = $search_proff;
            $this->load->model('certification_model');
            $certifications = $this->certification_model->GetAll();           

            $data['certifications'] =  $certifications;             
            $list_profiles = $this->db->query("Select * from ".MEMBER_TABLE." where `m_skills` LIKE '%$search1%' or `m_profession` LIKE '%$search2%' order by last_login_date desc")->result();
            if($search2 == "Nurs"){
                $data['title'] = "Nurses List";
            }else if($search2 == "Cashier"){
                $data['title'] = "Cashiers List";
            }else if($search2 == "Caregiver"){
                $data['title'] = "Caregivers List";
            }
            
            $data['professionals'] =  $list_profiles;                      
            $data['listprofessionals'] =  'professionals/listprofessionals';                      
            $this->load->view('professionals/ajax_nurses_list', $data); 
            }
                        
        
        
        function cashierlist(){
            
            $data = array();                        
            $this->load->model('certification_model');
            $certifications = $this->certification_model->GetAll();           
            $data = array(); 
            $data['certifications'] =  $certifications;             
            $list_profiles = $this->db->query("Select * from ".MEMBER_TABLE." where `m_skills` LIKE '%Cashier%' or `m_profession` LIKE '%Cashier%' order by last_login_date desc")->result();
            $data['title'] =  "Cashier";
            $data['professionals'] =  $list_profiles;                      
            $data['listprofessionals'] =  'professionals/listprofessionals';                      
            $this->load->view('professionals/nurses-list', $data);            
        }
        
        function civilengineerslist(){
            
            $data = array();                        
            $this->load->model('certification_model');
            $certifications = $this->certification_model->GetAll();           
            $data = array(); 
            $data['certifications'] =  $certifications;             
            $list_profiles = $this->db->query("Select * from ".MEMBER_TABLE." where `m_skills` LIKE '%Civil%' or `m_profession` LIKE '%Civil%' order by last_login_date desc")->result();
            $data['title'] =  "Civil Engineers";
            $data['professionals'] =  $list_profiles;                      
            $data['listprofessionals'] =  'professionals/listprofessionals';                      
            $this->load->view('professionals/nurses-list', $data);            
        }
        
        
        function professionalsajaxnew($list_id = '82') {
            $this->load->model('profile_model');
            $this->load->model('user_list_model');
            $this->load->model('users_by_list_model');

            $list_users = $this->user_list_model->GetAll();
        
            $users_by_list = $this->users_by_list_model->Search(array('list_id'=>$list_id));
            // Initialize an array to hold user data with profiles
            $user_profiles = array();
            
            // Fetch profile data for each user in the list
            foreach ($users_by_list as $user) {
                // Assuming the `user_id` is available in `$user`
                $profile_data = $this->profile_model->GetById($user->member_id);
                
                // Append the profile data to the user
                $user_profiles[] = array(
                    'profile' => $profile_data
                );
            }
    
            if(intval($list_id) > 0){
                $views = $this->user_list_model->GetById($list_id);
                if(!empty($views)){
                    $data['page_views'] = $views->page_views + 1;
                    $this->user_list_model->Save($data,$views->id);
                    $data['views'] = $views->page_views;
                }
                
            }
            
            $data['list_id'] = $list_id;
            $data['members'] = $user_profiles;
            $data['list_users'] = $list_users;
    
                $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }

}

/* End of file front.php */
/* Location: ./application/controllers/front.php */