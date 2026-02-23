<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blueuser extends CI_Controller {
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('member_model');
            $this->load->model('Profile_model','profile_model');
             $this->load->model('cvreview_points_model');
             $this->load->model('cvreview_model');
             $this->load->model('trackingsheet_chat');
             $this->load->model('member_job_portals');
             $this->load->model('member_recruiters');
             $this->load->model('employment_history_model');
             date_default_timezone_set('Asia/Dubai');
             $this->session_user_id = $this->session->userdata('user_id');            
            
        }
        
        public function adduser(){
            
            LoginCheck(site_url('login'), current_url());
            if(!in_array($this->session_user_id , CvReviewTeamList())){
                _setError("You Don't have permission to check this page.");
                redirect(site_url());
            }
            
            $this->load->view("blueuser/add-blueuser");
        }
        
        function saveuser(){

            if(!in_array($this->session_user_id , CvReviewTeamList())){
                _setError("You Don't have permission to check this page.");
                redirect(site_url());
            }
            
            $m_name = $this->input->post('m_name');
            $m_current_city = $this->input->post('m_current_city');
            $m_profession = $this->input->post('m_profession');
            $visa_status = $this->input->post('visa_status');
            $availability = $this->input->post('availability');
            $m_phone = $this->input->post('m_phone');
            $m_nationality = $this->input->post('m_nationality');
            $whatsapp_number = $this->input->post('whatsapp_number');
            $date_update_on = $this->input->post('date_update_on');
            $passport_file = $this->input->post('passport_file');
            $visa_file = $this->input->post('visa_file');
            $cancelled_visa_file = $this->input->post('cancelled_visa_file');
            $new_offer_letter_file = $this->input->post('new_offer_letter_file');
            $signed_offer_letter_file = $this->input->post('signed_offer_letter_file');
            $date_of_joining = $this->input->post('date_of_joining');
            $date_of_followup = $this->input->post('date_of_followup');
            $status_1 = $this->input->post('status_1');
            $status_2 = $this->input->post('status_2');
            $remark_2 = $this->input->post('remark_2');
            $remark_1 = $this->input->post('remark_1');            
            
            if(empty($date_of_joining)){
                $date_of_joining = '0000-00-00';
            }
            
            if(empty($date_of_followup)){
                $date_of_followup = '0000-00-00';
            }
            
            $config = array('upload_path'=> 'public-assets/cvreviews/', 'allowed_types' => 'jpg|gif|png|pdf|doc|docx','file_name'=>'blueuser_'.rand(0,9999));            
            $this->load->library('upload', $config);                    
            $this->upload->initialize($config);
            
            foreach ($_FILES as $filekey => $fileval){
                if(!empty($fileval['name'])){
                   if($this->upload->do_upload($filekey)){
                       $udata = array('upload_data' => $this->upload->data());                        
                       $data[$filekey] = $udata['upload_data']['file_name'];
                   }else{
                       //$return = array('error' => $this->upload->display_errors());
                   }
               }
            }            

            $data['m_name'] =$m_name;
            $data['m_nationality'] =$m_nationality;
            $data['m_current_city'] =$m_current_city;
            $data['m_profession'] =$m_profession;
            $data['visa_status'] =$visa_status;
            $data['availability'] =$availability;
            $data['m_phone'] =$m_phone;
            $data['whatsapp_number'] =$whatsapp_number;            
            $data['date_of_joining'] =$date_of_joining;
            $data['date_of_followup'] =$date_of_followup;
            $data['status_1'] =$status_1;
            $data['status_2'] =$status_2;
            $data['remark_2'] =$remark_2;
            $data['remark_1'] =$remark_1;
            $data['added_on'] = datenow();
            $data['data_added_by'] = $this->session_user_id;
            $data['role_id'] = 9;
            $data['m_status'] = 1;
            
            $blue_user_id = $this->profile_model->Save($data);
            
            if(intval($blue_user_id) > 0){
                if(!empty($m_profession) && !empty($data['member_cv'])){
                    $inc_p['user_id']=$blue_user_id;
                    $inc_p['job_id']=0;
                    $inc_p['points_type']='Blueuser';
                    $inc_p['points_for']=$this->session_user_id;
                    $inc_p['user_points']=Blueuser;
                    AddUserPoint($inc_p);
                }
            }
            
            
            redirect(site_url('blueuser/listusers'));
            exit();
        }
        
         public function edituser($user_id){
            
            LoginCheck(site_url('login'), current_url());
            if(!in_array($this->session_user_id , CvReviewTeamList())){
                _setError("You Don't have permission to check this page.");
                redirect(site_url());
            }
            
            $getuser = $this->profile_model->GetById($user_id);            
            
            $data['userinfo'] = $getuser;
            $this->load->view("blueuser/edit-blueuser",$data);
           
        }
        
         public function updateuser($user_id){
            
            LoginCheck(site_url('login'), current_url());
            if(!in_array($this->session_user_id , CvReviewTeamList())){
                _setError("You Don't have permission to check this page.");
                redirect(site_url());
            }
            
            $m_name = $this->input->post('m_name');
            $m_current_city = $this->input->post('m_current_city');
            $m_profession = $this->input->post('m_profession');
            $visa_status = $this->input->post('visa_status');
            $availability = $this->input->post('availability');
            $m_phone = $this->input->post('m_phone');
            $m_nationality = $this->input->post('m_nationality');
            $whatsapp_number = $this->input->post('whatsapp_number');
            $date_update_on = $this->input->post('date_update_on');
            $passport_file = $this->input->post('passport_file');
            $visa_file = $this->input->post('visa_file');
            $cancelled_visa_file = $this->input->post('cancelled_visa_file');
            $new_offer_letter_file = $this->input->post('new_offer_letter_file');
            $signed_offer_letter_file = $this->input->post('signed_offer_letter_file');
            $date_of_joining = $this->input->post('date_of_joining');
            $date_of_followup = $this->input->post('date_of_followup');
            $status_1 = $this->input->post('status_1');
            $status_2 = $this->input->post('status_2');
            $remark_2 = $this->input->post('remark_2');
            $remark_1 = $this->input->post('remark_1');
            
            $config = array('upload_path'=> 'public-assets/blueusersfiles/', 'allowed_types' => 'jpg|gif|png|pdf|doc|docx','file_name'=>'blueuser_'.rand(0,9999));            
            $this->load->library('upload', $config);                    
            $this->upload->initialize($config);
            
            foreach ($_FILES as $filekey => $fileval){
                if(!empty($fileval['name'])){
                   if($this->upload->do_upload($filekey)){
                       $udata = array('upload_data' => $this->upload->data());                        
                       $data[$filekey] = $udata['upload_data']['file_name'];
                   }else{
                       $return = array('error' => $this->upload->display_errors());
                   }
               }
            }
            
            $data['m_name'] =$m_name;
            $data['m_current_city'] =$m_current_city;
            $data['m_profession'] =$m_profession;
            $data['visa_status'] =$visa_status;
            $data['availability'] =$availability;
            $data['m_phone'] =$m_phone;
            $data['m_nationality'] =$m_nationality;
            $data['whatsapp_number'] =$whatsapp_number;            
            $data['date_of_joining'] =$date_of_joining;
            $data['date_of_followup'] =$date_of_followup;
            $data['status_1'] =$status_1;
            $data['status_2'] =$status_2;
            $data['remark_2'] =$remark_2;
            $data['remark_1'] =$remark_1;
            $data['updated_on'] = datenow();
            
            //$getuser = 
            $this->profile_model->Save($data,$user_id);   
            _setSuccess("Record updated successfully");            
            redirect(site_url('blueuser/listusers'));
        }

        function listusers(){
            
            LoginCheck(site_url('login'), current_url());
            
            if(!in_array($this->session_user_id , CvReviewTeamList())){
                _setError("You Don't have permission to check this page.");
                redirect(site_url());
            }
            
            $userslist = $this->profile_model->Search(array('role_id'=>9));            
            $data['userslist'] = $userslist;
            $this->load->view("blueuser/list-users", $data);
        }
        
        function delete($id){
            
            LoginCheck(site_url('login'), current_url());
            
            if(!in_array($this->session_user_id , CvReviewTeamList())){
                _setError("You Don't have permission to check this page.");
                redirect(site_url());
            }
            
            $userslist = $this->profile_model->Delete($id);            
            _setSuccess("Record Deleted Successfully");
            redirect(site_url('blueuser/listusers'));
            exit();
        }
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */