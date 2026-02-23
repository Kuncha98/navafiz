<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile2 extends CI_Controller {    
    
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
        $this->load->model('job_model');
        $this->load->model('profile_model','profile_model');
        $this->load->model('user_recommendation');
        $this->load->model('testimonials_model');
        $this->load->model('achievements_model');
        $this->load->model('socialgroups_subscribers');
        $this->load->model('education_model');
        $this->load->model('recruitment_question_model','recruitment_question');
        $this->load->model('recruitment_answer_model','recruitment_answer');
        $this->load->model('Points_model','points_model');
        $this->load->model('Assigned_question_model','assigned_question_model');
        
        $d = $this->front_model->getSettings();
        foreach($d as $c)
        {
            $this->global_array[$c->option] = $c->value;
        }
        
        $this->user_id = $this->session->userdata('user_id');
        $this->session_user_id = $this->user_id;
        
    }
    
    
    
    
  public function email($to, $subject, $messageText){      
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com', //
            'smtp_port' => 465,        
            'smtp_user' => SMTP_USER, //
            'smtp_pass' => SMTP_PASSWORD, //
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'newline' => '\r\n'
        );   
    
        $this->load->library("email",$config);
        $this->email->from('navafizweb@gmail.com','Navafiz Support');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($messageText);
        if($this->email->send()) {      
            return 1;
        } else {
            show_error($this->email->print_debugger());      
        }
    }
    
    
    
    
    function index()
    {
//        echo "hello";
//        exit();
        LoginCheck(site_url('login'), current_url());
        
        $data['countries'] = $this->member_model->getCountries();   
        $data['countpollrefer'] = $this->member_model->getPollMemberRefer();    
        $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));   
        $data['similarjobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>$this->session->userdata('cat_id'),'limit' =>4));
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->user_id));
        
        $this->load->view('profile/edit-profile-form', $data);
    
    }
    
    function save_question($id)
    {   
        $user_sess_name = $this->session->userdata('name');
        $data['question_id'] = $this->input->post('question_id');
        $data['user_id'] = $id;
        $data['type'] = 'by_profile';
        
        $res = $this->assigned_question_model->Search($data);
        if(empty($res)){
                
            if($this->assigned_question_model->Save($data)){
                $noti['user_id'] = $this->session_user_id;
                $noti['noti_title'] = $user_sess_name." Asked you a question on your profile for a Job";
                $noti['noti_desc'] = $user_sess_name." Asked you a question on your profile for a Job";
                $noti['noti_type'] = 'profile_question';
                $noti['notify_user_id'] = $id;
                $noti['noti_link'] = site_url("n/$id");
                AddNotification($noti);
                
                _setSuccess('Assigned Question successfully');            
            }else{
                _setError('Error Assigning Question');
            }           
        }else{
            _setError('Question Already Assigned');
        }      
       return redirect('n/'.$id);
        exit();
    }
    
    function del_profile($p_id){        
       LoginCheck(site_url('login'), current_url());
       $data['profile_details'] = $this->member_model->userDetail(array('user_id' =>$p_id));;
       $this->load->view('profile/delete_profile',$data);
    }
    
    function Delete($id){
//        echo $id;
        $this->load->model('member_summary_career_model','summary_career_model');
        $this->load->model('employment_history_model','employment_history_model');
        
        
        $details = $this->member_model->get_mem_profile($id);
        $member_id = $details['m_id'];
//        print_r($member_id);
//        exit();
        $testimonials = $this->testimonials_model->GetUser($id);
        if(!empty($testimonials)){
            //delete testimonial if exists
            $user_id_t = $testimonials->user_id;
            print_r($testimonials);
            exit();
            
            $del_tes = $this->testimonials_model->DeleteUser($user_id_t);
        }
        $achievements = $this->achievements_model->GetUser($id);
        if(!empty($achievements)){
            $user_id_a = $achievements->user_id;
            $del_ach = $this->achievements_model->DeleteUser($user_id_a);
        }
        $subscribers = $this->socialgroups_subscribers->GetUser($id);
        if(!empty($subscribers)){
            
             $user_id_s = $subscribers->user_id;
             $del_subs = $this->socialgroups_subscribers->DeleteUser($user_id_s); 
        }
        
        $m_summary = $this->summary_career_model->GetUser($id);
        if(!empty($m_summary)){
            //delete if exists
//             print_r($m_summary);
             $user_id_sm = $m_summary->m_id;
             $del_sum = $this->summary_career_model->DeleteUser($user_id_sm);
             
        }
        
        $employment_history = $this->employment_history_model->GetUser($id);
        if(!empty($employment_history)){
            //delete if exists
            $user_id_em = $employment_history->user_id;
            $del_emp = $this->employment_history_model->DeleteUser($user_id_em);
              
        }
        
        $mem_education = $this->education_model->GetUser($id);
        if(!empty($employment_history)){
            //delete if exists
            $user_id_ed = $mem_education->me_member_id;
            $del_edu = $this->education_model->DeleteUser($user_id_em);
            
        }
        
        $del_user_prof = $this->member_model->DeleteUser($member_id);
        
        _setSuccess("Profile Deleted Successfully");            
        redirect(site_url());
       
       
        
        
    }
    
    function Covid19_Effected(){
        
        $retun = LoginCheck(site_url('login'), current_url());        
        
        $data['profile'] = BasicInfoUser($this->user_id);
        $this->load->view('profile/covid-19-effected', $data);    
    
    }
    
    function doSaveCovid19Effected(){
        
        $this->load->model('covid_effected_model','covid_effected_model');
        
        $getcurrent = $this->covid_effected_model->Search(array('user_id'=>$this->session_user_id));
        
        if(count($getcurrent)>0){
            _setError("You already submitted your information");
            redirect(site_url('covid-19-effected'));
            exit;
        }
        
        $data['user_id'] = $this->session_user_id;
        $data['category_id'] = $this->get_post('category_id');
        $data['visa_status'] = $this->get_post('visa_status');
        $data['added_on'] = datenow();
        $this->covid_effected_model->Save($data);
        _setSuccess("You information Submmitted Successfully");
        redirect(site_url('covid-19-effected'));
        exit();
        
    }
    
    function submit_questions($user_id, $question_id=0){
        $answers = $this->input->post('q');
        
        foreach($answers as $key => $value){
            
//            echo $key;
//            echo $user_id;
//            echo $value;
//            exit();
            
            $data['user_id'] = $user_id;
            $data['question_id'] = $key;
            $data['answer_value'] = $value;
//            print_r($data);
            $result = $this->recruitment_answer->Search(array('user_id' => $user_id,'question_id' => $key));
            if(count($result)>0){
                
             $res = $this->recruitment_answer->DeleteAns($data['question_id'],$user_id);
            }
           
//            echo $res;
//            exit();
            if($this->recruitment_answer->Save($data)){
                _setSuccess("Answers Submitted Successfully");
            }else{
                _setError("Error Submitting Answers");
            }

           
        }
        
       redirect(site_url('n/'.$user_id));        
    }
    
    
    function n2($username)
    {   
        $uid = intval($username);
        $this->db->where('username', $username);
        if($uid>0){        
            $this->db->or_where('m_id', $uid); 
        }      
        
        $getrow = $this->db->get('jb_member')->row();        
        
        if(empty($getrow)){
            _setError('No Profile Exist with Provide data');
            redirect(site_url('login'));            
        }
        if($username==$getrow->username){
            $id = $getrow->m_id;
        }else if(!empty($getrow->username)){
            redirect(site_url('profile2/n2/'.$getrow->username));
            exit();
        }else{
            $id = $getrow->m_id;
        }
        
        
        $this->load->model('member_summary_career_model','summary_career_model');
        $this->load->model('employment_history_model','employment_history_model');
        $this->load->model('certification_model','certification_model');
        
        $member_summary_points = $this->summary_career_model->Search(array('m_id'=>$id));
        if(count($member_summary_points)>0){
            $member_summary_points = $member_summary_points[0];
        }else{
            $member_summary_points = array();
        } 
        //Update Profile Views
        $this->member_model->save_profile_views($id);        
        $pro = $this->member_model->userDetails($id);
        $profile = $pro[0];
        $certifications = $this->certification_model->Search(array('user_id'=>$id));
        $employment_history = $this->employment_history_model->Search(array('user_id'=>$id));        
        $relatedmembers = $this->member_model->getProfileRelatedMember(array('m_status' => 1,'cat_id' =>$profile->m_category,'profile_id'=> $profile->m_id));
        
//        $user_details = $this->member_model->userDetails($profile->m_id);
//        echo "<pre>";
//        print_r($user_details);
//        exit();
        
        
        $meta_title_name = !empty($profile->m_name) ? $profile->m_name : 'Navafiz';
        $meta_title_profession = !empty($profile->m_profession) ? ' | ' .$profile->m_profession : ''; 
        $meta_desc = !empty($member_summary_points->point_1) ? ' | '. $member_summary_points->point_1 : ''; 
        $meta_img = !empty($profile->m_avatar) ? 'assets/uploads/members/'.$profile->m_avatar : '';
        $meta_desc_city = !empty($profile->m_current_city) ? $profile->m_current_city : ''; 
        $page_metas = array(
            'title' => $meta_title_name . $meta_title_profession,
            'description' =>  $meta_desc_city . $meta_desc,
            'og_img' => $meta_img,
            'og_url' => 'profile/'.$id ,
        );
        
        
        $qry= "select * from jb_achievements where user_id = '".$profile->m_id."'";
        $ach_results = $this->db->query($qry)->result();
        
        $query = $this->db->query('select r.*, m.m_name,m.m_avatar,m.m_profession from jb_member m, jb_user_recommendation r where type="user_to_user" and r.recommend_by=m.m_id and r.user_id='.$profile->m_id);
        $recommand_list = $query->result();
        
        //Get Latest 10 Jobs
        $featured_jobs = $this->db->query('select * from jb_jobs where is_featured=1 order by is_featured')->result();
        
        $job_query = $this->db->query('select * from jb_jobs order by j_add_date DESC limit 0,30 ');
        $top_jobs = $job_query->result();
        $arr_merge = array_merge($featured_jobs,$top_jobs);
        $top10_jobs = array_map("unserialize", array_unique(array_map("serialize", $arr_merge)));
//        echo "<pre>";
//        print_r((($top10_jobs)));
//        exit();
        
        
        $questions = $this->recruitment_question->GetAll();        
  
        $ques_prof = $this->recruitment_question->getProfQuestions($profile->m_category,$profile->industry1,$profile->industry2,$profile->m_id);
        $recruitment_questions = $this->unique_multidim_array($ques_prof,'question_id');

        $data['questions'] = $questions;        
        $data['recruitment_questions'] = $recruitment_questions;
        $data['points'] = $this->points_model->GetUserPoints($profile->m_id);        
        $data['recruitment_answers'] = $this->recruitment_answer->GetAllByUser($profile->m_id);
        $data['u_name'] = $username;
        $data['page_meta'] = $page_metas;
        $data['relatedmembers'] = $relatedmembers;
        $data['profile'] = $profile;                
        $data['summary_points'] = $member_summary_points;
        $data['employment_history'] = $employment_history;
        $data['ach_results'] = $ach_results;
        $data['recommand_list'] = $recommand_list;
        $data['top10_jobs'] = $top10_jobs;
        $data['certifications'] = $certifications;
        $data['profile_id'] = $id;
        
        $this->load->view('profile/view-profile2', $data);
    
    }
    
    function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
   
    foreach($array as $val) {
//        print_r($val);
//        exit();
        if (!in_array($val->$key, $key_array)) {
            $key_array[$i] = $val->$key;
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}
    
    function status($user_id=''){        
        LoginCheck(site_url('login'), current_url());
        
        if(!in_array($this->session_user_id, CvReviewTeamList())){
            _setError('You Do not have permission to access this page');
            redirect(site_url('login'));
            exit();
        }
        
        $rid = empty($user_id) ? $this->session_user_id:$user_id;
        
        $data['profile'] = BasicInfoUser($rid);
        $this->load->view('profile/status', $data);    
    }
    
    function username(){        
        LoginCheck(site_url('login'), current_url());
        
        $data['profile'] = BasicInfoUser($this->session_user_id);
        $this->load->view('profile/username', $data);    
    }
    
    function checkusername(){        
        LoginCheck(site_url('login'), current_url());
        
        $username = $this->get_post('username');
        if(!empty($username)){
            $result = $this->profile_model->Search(array('username'=>$username));
            if(empty($result)){
                if($this->profile_model->Save(array('username'=>$username), $this->session_user_id)){
                    _setSuccess('Congratulation You have successfully updated your username');                    
                   $return['code']  = 1;
                   $return['message']  = "Congratulation You have successfully updated your username";
                }  
            }else{            
                $return['code']  = 0;
                $return['message']  = "Username already exists";
            }
        }else{
            $return['code']  = 0;
            $return['message']  = "Please enter username";
        }
        echo json_encode($return);
    }
    
    function UpdateStatus($user_id){        
        
        LoginCheck(site_url('login'), current_url());
        
        $add_data['role_id'] = $this->get_post('role_id');
        $this->profile_model->Save($add_data,$user_id);
        _setSuccess("Your Status is Updated");
        redirect(site_url('profile/status'));
        exit();
    }
    
    function UpdateProfile(){ 
        
        LoginCheck(site_url('login'), current_url());
        
        $name = $this->input->post('m_name');
        $gender = $this->input->post('gender');
        $m_category = $this->input->post('m_category');
        $industry1 = $this->input->post('industry1');
        $industry2 = $this->input->post('industry2');
        $country_id = $this->input->post('country_id');
        $m_profession = $this->input->post('m_profession');
        $m_employer = $this->input->post('m_employer');
        $m_phone = $this->input->post('m_phone');
        $m_experience = $this->input->post('m_experience');
        $uae_experience = $this->input->post('uae_experience');
        $m_nationality = $this->input->post('m_nationality');
        $employment_status = $this->input->post('employment_status');
        $m_current_country_id = $this->input->post('m_current_country_id');
        $m_current_city = $this->input->post('m_current_city');
        $m_city = $this->input->post('m_city');
        $m_married_status = $this->input->post('m_married_status');
        $m_driving_lisence = $this->input->post('m_driving_lisence');
        $m_languages = $this->input->post('m_languages');
        $visa_status = $this->input->post('visa_status');
        $role_id = $this->input->post('role_id');
        $linkedin_profile_link = $this->input->post('linkedin_profile_link');                   
        $youtube_cv_link = $this->input->post('youtube_cv_link');                   
        
        $add_data = array(
                        'm_name' =>$name,
                        'youtube_cv_link'=>$youtube_cv_link,
                        'gender' =>$gender,
                        'm_category' =>$m_category,
                        'industry1' =>$industry1,
                        'industry2' =>$industry2,
                        'm_profession' =>$m_profession,
                        'm_employer' =>$m_employer,
                        'm_experience' =>$m_experience,
                        'uae_experience' =>$uae_experience,
                        'm_nationality' =>$m_nationality,
                        'm_phone' =>$m_phone,
                        'employment_status' =>$employment_status,
                        'country_id' =>$country_id,
                        'm_current_country_id' =>$m_current_country_id,
                        'm_current_city' =>$m_current_city,
                        'm_city' =>$m_city,
                        'm_married_status' =>$m_married_status,
                        'm_driving_lisence' =>$m_driving_lisence,
                        'm_languages' =>$m_languages,
                        'visa_status' =>$visa_status,
                        'linkedin_profile_link' =>$linkedin_profile_link,
                        'profession1' => $this->get_post('profession1'),
                        'profession2' => $this->get_post('profession2'),
                        'profession3' => $this->get_post('profession3'),
                        'profession4' => $this->get_post('profession4'),
                        'profession5' => $this->get_post('profession5'),
                        'role_id' => $role_id,
                    );

        $return = $this->profile_model->Save($add_data,$this->user_id);

        if(intval($return)>0){
            _setSuccess('Profile Updated Successfully');
            redirect(site_url('profile'));
            exit();
        }else{
            _setError('Unable to Update Profile');
            redirect(site_url('profile'));
            exit();
        }
    }
    
    function UploadUserResume(){
        
        LoginCheck(site_url('login'), current_url());
        
        $data['profile'] = $this->member_model->userDetail(array('user_id' => $this->user_id));
        $this->load->view('profile/uploadcv', $data);
    }
    function DoUploadCv(){
        
        LoginCheck(site_url('login'), current_url());
        
        $file_ext=preg_split("/\./", $_FILES["cvfile"]["name"]);
        $file_ext1=$file_ext[count($file_ext)-1];
        $file_name = preg_replace('/\s/', '-', $this->session->userdata('name'))."_".$this->user_id.".".$file_ext1;
        
        if($file_ext1 == "doc"  || $file_ext1 == "docx" || $file_ext1 == "pdf")
        {
            $file_size = round($_FILES["cvfile"]['size']);  
            if($file_size > 2097152)
            {
                echo '{"msg":"large size"}';
            }
            else if(move_uploaded_file($_FILES["cvfile"]["tmp_name"],"./public-assets/cvreviews/".$file_name)) {
                $data =  $this->member_model->updateprofileAjax(array('m_id' =>$this->session->userdata('user_id'),'member_cv' =>$file_name));
                $this->session->set_flashdata('msg','CV upload successfully!');
                redirect('membercv');    
            }else{
                echo 2;
            }
        }
        else{
            echo '{"msg":"invalid type"}';   
        }
    }
    
    function ViewProfile($id){
        
        redirect(site_url('n/'.$id));
        exit();
        
        $this->load->model('member_summary_career_model','summary_career_model');
        $this->load->model('employment_history_model','employment_history_model');
        
        $member_summary_points = $this->summary_career_model->Search(array('m_id'=>$id));
        if(count($member_summary_points)>0){
            $member_summary_points = $member_summary_points[0];
        }else{
            $member_summary_points = array();
        } 
        
        $this->member_model->save_profile_views($id);        
        $profile = $this->member_model->userDetail(array('user_id' =>$id));
        $employment_history = $this->employment_history_model->Search(array('user_id'=>$id));        
        $relatedmembers = $this->member_model->getProfileRelatedMember(array('m_status' => 1,'cat_id' =>$profile->m_category,'profile_id'=> $profile->m_id));
        
        $meta_title_name = !empty($profile->m_name) ? $profile->m_name : 'Navafiz';
        $meta_title_profession = !empty($profile->m_profession) ? ' | ' .$profile->m_profession : ''; 
        $meta_desc = !empty($member_summary_points->point_1) ? ' | '. $member_summary_points->point_1 : ''; 
        $meta_img = !empty($profile->m_avatar) ? 'assets/uploads/members/'.$profile->m_avatar : '';
        $meta_desc_city = !empty($profile->m_current_city) ? $profile->m_current_city : ''; 
        $page_metas = array(
            'title' => $meta_title_name . $meta_title_profession,
            'description' =>  $meta_desc_city . $meta_desc,
            'og_img' => $meta_img,
            'og_url' => 'profile/'.$id ,
        );
        
        $data['page_meta'] = $page_metas;
        $data['relatedmembers'] = $relatedmembers;
        $data['profile'] = $profile;                
        $data['summary_points'] = $member_summary_points;
        $data['employment_history'] = $employment_history;
        $data['profile_id'] = $id;
        
        $this->load->view('profile/view-profile', $data);
       
    }
    
    function mycard($id)
    {
        $user_profile = $this->profile_model->GetById($id);
        
        if(empty($user_profile)){
            _setSuccess('Not data exist with provided information');
            redirect(site_url());
            exit();
        }
        
        $data['profile'] = $user_profile;
        $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_status' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $pro_details =   $this->member_model->getMembers(array('m_status' =>1,'id' =>$id));
        
        $meta_title_name = !empty($pro_details->m_name) ? $pro_details->m_name : 'Navafiz';
        $meta_title_profession = !empty($pro_details->m_profession) ? ' | ' .$pro_details->m_profession : '';         
        $meta_img = !empty($pro_details->m_avatar) ? 'assets/uploads/members/'.$pro_details->m_avatar : '';
        $meta_desc_city = !empty($pro_details->m_current_city) ? $pro_details->m_current_city : ''; 
        $page_metas = array(
            'title' => $meta_title_name . $meta_title_profession,
            'description' =>  $meta_desc_city,
            'og_img' => $meta_img,
            'og_url' => 'profile/'.$id ,
        );
        
        $data['pro_details'] = $pro_details;
        $data['card_user_id'] = $id;
        $this->load->view('profile/mycard', $data);
    }
    
    function downloadcv(){
        
        if(empty($this->session_user_id)){
            redirect(site_url());
            exit();
        }
        
        $filupload = $this->uri->segment(2);
        header('Content-type: application/pdf');
        header("Content-Disposition: attachment; filename=".$filupload);
        echo file_get_contents(base_url()."public-assets/cvreviews/".$filupload);
    }

    function exportpdf($user_id){
        
        $id = $user_id;
        $this->load->model('member_summary_career_model','summary_career_model');
        $this->load->model('employment_history_model','employment_history_model');
        $member_summary_points = $this->summary_career_model->Search(array('m_id'=>$id));
        if(count($member_summary_points)>0){
            $member_summary_points = $member_summary_points[0];
        }else{
            $member_summary_points = array();
        }        
        
        $profile = $this->member_model->userDetail(array('user_id' =>$id));
        $data['profile'] = $profile; 
        $data['summary_points'] = $member_summary_points;
        $data['employment_history'] = $this->employment_history_model->Search(array('user_id'=>$id));
        $data['profile_id'] = $id;
        
        $this->load->library('pdfgenerator');
        //echo $this->load->view('profile/pdf-profile', $data, true);
        $html = $this->load->view('profile/pdf-profile', $data, true);                
        $filename = 'navafiz_profile-'.time();
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

    }
    
    function Recommendation($userid){
        
        LoginCheck();
        $this->user_name = $this->session->userdata('username');
        
//        echo $userid;
//        exit();
        
        if($this->session_user_id==$userid){
            _setError("Not Allowed to Recommend Own Profile");
            redirect(site_url('profile/'.$userid));
            exit();
        }
        $session_name = $this->session->userdata('name');
        $getexist  = $this->user_recommendation->Search(array('user_id'=>$userid,'recommend_by'=>  $this->session_user_id));
//        print_r($getexist) ;
//        exit();
        if(empty($getexist)){ //checkk
//            echo "HERE";
//            exit();
            $user_details = $this->profile_model->GetById($userid);
            $username = $user_details->m_name;
            
            
            
            
            $this->user_recommendation->Save(array('user_id'=>$userid,'recommend_by'=>  $this->session_user_id,'type'=>'user_to_user'));  
            $inc_p['user_id']=$userid;
            $inc_p['points_type']='ProfileRecommendation';
            $inc_p['job_id']= 0;
            $inc_p['points_for']=$this->session_user_id;
            $inc_p['user_points']=ProfileRecommendation;
//            print_r($inc_p);
//            exit();
            AddUserPoint($inc_p);
            
            
            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = $this->user_name." has recommended ".$user_details->m_name." Profile" ;
            $noti['noti_desc'] = $this->user_name." has recommended ".$user_details->m_name." Profile" ;                   
            $noti['noti_type'] = 'recommendation';
            $noti['notify_user_id'] = $user_details->m_id;
            $noti['noti_link'] = site_url('n/'.$user_details->m_id);
//            print_r($noti);
//            exit();
            AddNotification($noti);
            
            
            $email = 'usman@useevs.com';            
            $to          = $email;
            $subject     = "Resume Upload";
            $messageText = '<html><body>';
            $messageText .= "Dear Admin,
            <br><br><br>
            $session_name has recomended $username!
            <br><br>
           
            Regards,
            <br><br>
            The Navafiz Team
            <br><br>
            *This message was sent by an automated mail server. Please do not reply.
            <br>";
            $messageText .= "</html></body>";
//            $this->email@($to,$subject,$messageText);
            
            
            
             $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com', //
                        'smtp_port' => 465,        
                        'smtp_user' => SMTP_USER, //
                        'smtp_pass' => SMTP_PASSWORD, //
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE        
                    );   

                    $config['newline'] = "\r\n";
                    $config['crlf']    = "\r\n";

                    $this->load->library("email",$config);
                    $this->email->set_mailtype("html");
                    $this->email->set_newline("\r\n");
                    $this->email->from('navafizweb@gmail.com', 'Navafiz');
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($messageText);
                    
//                    if($this->email->send()) {
//                        _setSuccess('Your CV Uploaded Successfully!');
//                        return 1;
//                       
//                    }else {
//                     show_error($this->email->print_debugger());      
//                    }
            
        }
        
        redirect(site_url('profile/'.$userid));
        exit();
    }
    
    function GetRecommendations(){                
        LoginCheck();
        
        $user_id  = $this->get_post('profile_id');                                
        $data['lists'] = $results;
        $this->load->view('profile/list-recommanders', $data);        
    }
    
    function MarkLinkedProfile($user_id=0){
        if($user_id>0){
            $query = $this->db->query('Update '.MEMBER_TABLE.' set linkedin_profile_is_approved=!linkedin_profile_is_approved, linkedin_profile_approved_by='.$this->session_user_id.' where m_id ='.$user_id);
            _setSuccess("Requested Completed Successfully");
        }
        
        redirect(site_url('track_steps/sheet/'.$user_id));
        exit();
    }
    
    function RecommendationForJob($profile_id){        
        LoginCheck();
        
        $job_id = $this->get_post('job_id');
        $type = $this->get_post('type');
        
        $getexist  = $this->user_recommendation->Search(array('user_id'=>$profile_id,'job_id'=>  $job_id));        
        
        if(empty($getexist)){
                       
            $rec['user_id'] = $profile_id;
            $rec['recommend_by'] = $this->session_user_id;
            $rec['job_id'] = $job_id;
            $rec['type'] = $type;            
            $rec['added_on'] = datenow();

            $this->user_recommendation->Save($rec);
            
            
            $data['user_id']=$rec['user_id'];
            $data['points_for']=$rec['recommend_by'];
            $data['points_type']='Recommendation';
            $data['user_points']= Recommendation;
            $data['job_id'] = $job_id;
            $data['updated_by'] = $rec['recommend_by'];
            AddUserPoint($data);
//            print_r($data);
//            "<br>";
//           echo $rest;
//           exit();
//            
            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = $get_user->m_name."  has Joined Navafiz Professional Community";
            $noti['noti_desc'] = "Welcome ".$get_user->m_name." via trackingsheet using view this notification";
            $noti['noti_type'] = 'registration';
            $noti['noti_link'] = site_url('track_steps/sheet/'.$get_user->m_id);
            AddNotification($noti);
        }
        
        redirect(site_url('job/'.$job_id));
        exit();
    }
    
    function AddCV(){
        
        $this->load->view('profile/add-cv');
        
    }
    
    function UplaodCV(){
            
        $file_ext=preg_split("/\./", $_FILES["resume_file"]["name"]);
        $file_ext1=$file_ext[count($file_ext)-1];
        $file_name = preg_replace('/\s/', '-', $this->session->userdata('name'))."_".$this->session->userdata('user_id').".".$file_ext1;

        $session_name = $this->session->userdata('name');
        $review_title = $this->get_post('review_title');
        $user_comments = $this->get_post('user_comments');

        $config = array('upload_path'=> 'public-assets/cvreviews/', 'allowed_types' => 'doc|docx|pdf','file_name'=>$file_name,'overwrite'=>TRUE);
        $this->load->library('upload', $config);                    
        $this->upload->initialize($config);

        if($this->upload->do_upload('resume_file')){
            
            $udata = array('upload_data' => $this->upload->data());                        
            $resume_file = $udata['upload_data']['file_name'];
            
            $this->profile_model->Save(array('member_cv'=>$resume_file),$this->user_id);
            
            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = "Uploaded Resume";
            $noti['noti_desc'] = $session_name." has uploaded Resume.";
            $noti['noti_type'] = 'cvreview';
            $noti['noti_link'] = site_url('profile/'.$this->user_id);
            AddNotification($noti);

            $data = array('upload_resume' => 1);
            
            /*$email = 'usman@useevs.com';            
            $to          = $email;
            $subject     = "Resume Upload";
            $messageText = '<html><body>';
            $messageText .= "Dear Admin,
            <br><br><br>
            $session_name.has upload resume!
            <br><br>
           
            Regards,
            <br><br>
            The Navafiz Team
            <br><br>
            *This message was sent by an automated mail server. Please do not reply.
            <br>";
            $messageText .= "</html></body>";
            //$this->email@($to,$subject,$messageText);
            
            $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com', //
                        'smtp_port' => 465,        
                        'smtp_user' => SMTP_USER, //
                        'smtp_pass' => SMTP_PASSWORD, //
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE        
                    );   

                    $config['newline'] = "\r\n";
                    $config['crlf']    = "\r\n";

                    $this->load->library("email",$config);
                    $this->email->set_mailtype("html");
                    $this->email->set_newline("\r\n");
                    $this->email->from('navafizweb@gmail.com', 'Navafiz');
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($messageText);
                    
                    if($this->email->send()) {
                        _setSuccess('Your CV Uploaded Successfully!');
                        return 1;
                       
                    }else {
                     show_error($this->email->print_debugger());      
                    }

                // _setSuccess('Please check your Email inbox/spam and enter the verification code to complete registration on Navafiz');
            */
            
            _setSuccess('Your CV Uploaded Successfully!');
            
        }else{
            $return = array('error' => $this->upload->display_errors());
            _setError($this->upload->display_errors());
        }
        
        redirect(site_url('profile/AddCV/'));
        exit;            
    }
    
    
 
    
    
    
}

/* End of file front.php */
/* Location: ./application/controllers/Profile.php */