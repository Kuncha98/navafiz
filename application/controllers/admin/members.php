<?php
class Members extends MY_Controller {
  var $pages= 5;
  function __construct()
        {
        parent::__construct();
        //$this->load->model('admin_model');
       $this->load->model('admin_slider_model');
		$this->load->model('admin_member_model');
                $this->load->model('member_model');
                $this->load->model('categories_model');
                $this->load->model('Profile_model','profile_model');
                $this->load->model('member_job_portals');
                
                $this->load->model('certification_model');
                $this->load->model('member_summary_career_model','summary_career_model');
		$this->load->library('paging_front');
		}
      function memberdata()
        {
		 
            $data['forms'] =  $this->admin_member_model->getForms(array());

            $data['page_title'] = 'List Members';
            $data['content_view'] = 'admin/members/sb-forms';
            $this->load->view('admin/sb-template', $data);
                 
//		 $this->load->view('admin/members/forms',$data);
        }
        
        
      function viewProfile($id){
        
        $this->load->model('employment_history_model','employment_history_model');
        $member_summary_points = $this->summary_career_model->Search(array('m_id'=>$id));
        if(count($member_summary_points)>0){
            $member_summary_points = $member_summary_points[0];
        }else{
            $member_summary_points = array();
        }
        
        $profile = $this->member_model->userDetail(array('user_id' =>$id));
        $certifications = $this->certification_model->Search(array('user_id'=>$id));
        $employment_history = $this->employment_history_model->Search(array('user_id'=>$id));
        $qry= "select * from jb_achievements where user_id = '".$profile->m_id."'";
        $ach_results = $this->db->query($qry)->result();
        $query = $this->db->query('select r.*, m.m_name,m.m_avatar,m.m_profession from jb_member m, jb_user_recommendation r where type="user_to_user" and r.recommend_by=m.m_id and r.user_id='.$profile->m_id);
        $recommand_list = $query->result();
        
        $data['certifications'] = $certifications;
        $data['employment_history'] = $employment_history;
        $data['ach_results'] = $ach_results;
        $data['summary_points'] = $member_summary_points;
        $qry= "select * from jb_member_education where me_member_id = '".$id."'";
        $edu_results = $this->db->query($qry)->result();
        $data['edu_results'] = $edu_results;
        $data['profile'] = $profile;
        $data['recommand_list'] = $recommand_list;
        $data['page_title'] = 'Members Details';
        $data['content_view'] = 'admin/members/view-profile';
        $this->load->view('admin/sb-template', $data);
//        $this->load->view('admin/members/view-profile',$data);        
        
        
        
      }  
        
        
                
        
    function change_status($id){
        
        $story = $this->member_model->getStroy(array('user_id' =>$id));
        if($story->ss_status == 1){
            $this->member_model->status_change_active($id);
            
        }else{
            $this->member_model->status_change_deactive($id);
        }
        _setSuccess('Status Changed Successfully');
        redirect(site_url('admin/members/success_stories'));
    }
        
    
    
    
    function ajaxDataManagementStories(){
        if($this->input->post('actioncall')=="listforms")
			 {
			
			$limit = $this->input->post('limit');
			
			
			$data = array();
//			$total   =  $this->education_model->getTotalMembers();
			

//			 $data['total_variables'] 	= $total;
			 $data['limit_selected'] 	= $limit;
         //	$data['languages']   =  $this->admin_language_model->getLanguages();	
             $data['stories'] = $this->member_model->getForms(array('limit' => $limit));

            
              $this->load->view('admin/members/liststories',$data); 
                  }
    }

    
        
        function success_stories(){
            
//        $data['stories'] = $this->member_model->GetAllStories(array('ss_status' =>1));
        
        $data['page_title'] = 'Success Stories';
        $data['content_view'] = 'admin/members/ajaxstories';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('successstories', $data);
        }
        
        function edit_story($id){
        
        $data['story'] = $this->member_model->getStroy(array('user_id' =>$id));
        
        $data['page_title'] = 'Edit Success Stories';
        $data['content_view'] = 'admin/members/editstory';
        $this->load->view('admin/sb-template', $data);
        
        }
        
        function update_story($id){
        $skillname = $this->input->post('subject');
        $descr = $this->input->post('descr');
        echo $data =  $this->member_model->updateStory(array('ss_member_id' =>$id,'ss_subject' =>$skillname,'ss_descr' =>$descr));
        _setSuccess('Your success story update successfully!');
        redirect(base_url('admin/members/success_stories'));
        exit();
        }
        
        
        function add_story(){
            
           $data['page_title'] = 'Edit Success Stories';
           $data['content_view'] = 'admin/members/addstory';
           $this->load->view('admin/sb-template', $data); 
        }
        
        function save_story(){
            
        $data['ss_subject'] = $this->input->post('subject');
        $data['ss_member_id'] = $this->input->post('user_id');
        $data['ss_descr'] = $this->input->post('descr');
        $data['ss_status'] = 1;
        
        $data =  $this->member_model->SaveStory($data);
        _setSuccess('Your success story update successfully!');
        redirect(base_url('admin/members/success_stories'));
        exit();
        }
        
        
        
        function delete_story($id){
            if($this->member_model->Delete_story($id)){
                _setSuccess('Success Story Deleted Successfully');
                
            }else{
                _setError('Error Deleting Success Story');
            }
            
            redirect(base_url('admin/members/success_stories'));
        }
        
        function ajaxDataManagementSummary(){
//            echo "hello";
//            exit();
        if($this->input->post('actioncall')=="listforms")
			 {
			
			$limit = $this->input->post('limit');
			
			
			$data = array();
//			$total   =  $this->education_model->getTotalMembers();
			

//			 $data['total_variables'] 	= $total;
			 $data['limit_selected'] 	= $limit;
         //	$data['languages']   =  $this->admin_language_model->getLanguages();	
             $data['summary'] = $this->summary_career_model->getFormsSummary(array('limit' => $limit));

            
              $this->load->view('admin/summary/listsummary',$data); 
                  }
    }
    
        function members_summary(){
//            $data['summary'] = $this->admin_member_model->GetAllSummary();
            
            $data['page_title'] = 'Summary';
            $data['content_view'] = 'admin/summary/ajaxsummary';
            $this->load->view('admin/sb-template', $data);

        }
        
        
        function edit_summary_career($id){
            $member_summary_points = $this->summary_career_model->Search(array('m_id'=>$id));
            if(count($member_summary_points)>0){
                $member_summary_points = $member_summary_points[0];
            }else{
                $member_summary_points = array();
            }

            $data['summary_points'] = (array) $member_summary_points;
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$id));
            $data['page_title'] = 'Summary';
            $data['content_view'] = 'admin/summary/editsummary';
            
            $this->load->view('admin/sb-template', $data);

//            $this->load->view('profile/summary-career', $data);
}



public function userList(){
  
    $postData = $this->input->post();
    $data = $this->certification_model->getUsers($postData);

    echo json_encode($data);
  }


function add_summary(){
    
    
    $data['page_title'] = 'Add Summary';
    $data['content_view'] = 'admin/summary/addsummary';
    $this->load->view('admin/sb-template', $data);
}

function member_skills(){
    
           $limit = 500;
			
			
            $data = array();
            $total = $this->admin_member_model->getTotalMembers();
	    
            $data['total_variables'] = $total;
            $data['limit_selected'] = $limit;
	
            $data['forms'] = $this->admin_member_model->getForms(array('limit' => $limit));
//	    $this->load->view('admin/members/listforms',$data);
    
            $data['page_title'] = 'Members Skills';
            $data['content_view'] = 'admin/member_skills/listskills';
            $this->load->view('admin/sb-template', $data);
}

function edit_skill($id){
    
    $data['profile'] = $this->member_model->userDetail(array('user_id' =>$id));
    
    
    $data['page_title'] = 'Edit Members Skill';
    $data['content_view'] = 'admin/member_skills/editskill';
    $this->load->view('admin/sb-template', $data);
}

function add_skill(){
    $data['page_title'] = 'Add Members Skill';
    $data['content_view'] = 'admin/member_skills/addskill';
    $this->load->view('admin/sb-template', $data);
}


function save_skill(){
    $jobtags = $this->input->post('jobtags');
    $user_id = $this->input->post('user_id');

    
    $data =  $this->admin_member_model->updateMemberSkill(array('m_skills' =>$jobtags),$user_id);
    
    if(count($data)>0){
                _setSuccess('Skills Added Successfully ');
                redirect(site_url('admin/members/member_skills'));
                exit;
            }
}

function ajaxDataManagementJobPortal(){
    if($this->input->post('actioncall')=="listforms")
			 {
			
			$limit = $this->input->post('limit');
			
			
			$data = array();
//			$total   =  $this->education_model->getTotalMembers();
			

//			 $data['total_variables'] 	= $total;
			 $data['limit_selected'] 	= $limit;
         //	$data['languages']   =  $this->admin_language_model->getLanguages();	
             $data['forms'] = $this->member_job_portals->getFormsJobPortal(array('limit' => $limit));

            
              $this->load->view('admin/members/listjobportal',$data); 
                  }
}


function list_job_portal(){
//    $data['forms'] = $this->member_job_portals->GetAll();
   
       
    $data['page_title'] = 'Members Job Portals';
    $data['content_view'] = 'admin/members/ajaxjobportal';
    $this->load->view('admin/sb-template', $data);
   
}

function edit_job_portal($user_id){
         $user_job_portal = $this->member_job_portals->Search(array('user_id'=>$user_id));
        if(count($user_job_portal)>0){
            $user_job_portal = $user_job_portal[0];
            $portal_id = isset($user_job_portal->id) ? $user_job_portal->id:0;
        }
        
        $data['user_id'] = $user_id;
        $data['user_job_portal'] = $user_job_portal;
//        $this->load->view('job_portals/index',$data);
        
        $data['page_title'] = 'Edit Members Job Portals';
        $data['content_view'] = 'admin/members/editjobportal';
        $this->load->view('admin/sb-template', $data);
    
    
    
    
}


function add_job_portal(){
    $data['page_title'] = 'Add Members Job Portals';
    $data['content_view'] = 'admin/members/addjobportal';
    $this->load->view('admin/sb-template', $data);
}

function save_job_portal(){
    $is_post = intval($this->get_post('is_post',0));        
    $user_id = $this->get_post('userid');
    
    if($is_post>0){
        $post_data['navafiz'] = $this->get_post('navafiz');
        $post_data['bayt'] = $this->get_post('bayt_link');
        $post_data['monstergulf'] = $this->get_post('monstergulf');
        $post_data['gulftalent'] = $this->get_post('gulftalent');
        $post_data['naukrigulf'] = $this->get_post('naukrigulf');
        $post_data['dubizzle'] = $this->get_post('dubizzle');
        $post_data['indeed'] = $this->get_post('indeed');
        $post_data['worldwideworker'] = $this->get_post('worldwideworker');
        $post_data['gotogulf'] = $this->get_post('gotogulf');
        $post_data['khaleejtimes'] = $this->get_post('khaleejtimes');
        $post_data['user_id'] = $user_id;

        
        $post_data['added_on'] = datenow();
        $this->member_job_portals->Save($post_data);
        
        _setSuccess("Job Portals Added Successfully");
        redirect(site_url('admin/members/list_job_portal'));
        exit;
    }
    
    
   
}




function update_job_portal(){
    
    $is_post = intval($this->get_post('is_post',0));        
    $user_id = intval($this->get_post('user_id'));        
    $user_job_portal = $this->member_job_portals->Search(array('user_id'=>$user_id));
        if(count($user_job_portal)>0){
            $user_job_portal = $user_job_portal[0];
            $portal_id = isset($user_job_portal->id) ? $user_job_portal->id:0;
        }   
    if($is_post>0){
        $post_data['navafiz'] = $this->get_post('navafiz');
        $post_data['bayt'] = $this->get_post('bayt_link');
        $post_data['monstergulf'] = $this->get_post('monstergulf');
        $post_data['gulftalent'] = $this->get_post('gulftalent');
        $post_data['naukrigulf'] = $this->get_post('naukrigulf');
        $post_data['dubizzle'] = $this->get_post('dubizzle');
        $post_data['indeed'] = $this->get_post('indeed');
        $post_data['worldwideworker'] = $this->get_post('worldwideworker');
        $post_data['gotogulf'] = $this->get_post('gotogulf');
        $post_data['khaleejtimes'] = $this->get_post('khaleejtimes');
        $post_data['user_id'] = $user_id;

        if($portal_id>0){
            $post_data['updated_on'] = datenow();
            $this->member_job_portals->Save($post_data,$portal_id);
        }else{
            $post_data['added_on'] = datenow();
            $this->member_job_portals->Save($post_data);
        }
    }
        _setSuccess("Job Portals Updated Successfully");
        redirect(site_url('admin/members/list_job_portal'));
        exit;
}

function delete_skill($id){
    
    if($this->admin_member_model->delskills($id)){
        _setSuccess('Skills Deleted Successfully ');
        redirect(site_url('admin/members/member_skills'));
        
    }else{
        _setError('Error Deleting Skills');
        redirect(site_url('admin/members/member_skills'));
    }
}
        
function postSkills($id)
	{ 	
            $jobtags = $this->input->post('jobtags');
//            print_r($jobtags);
//            exit();
            $data =  $this->admin_member_model->updateMemberSkill(array('m_skills' =>$jobtags),$id);
           
            if(count($data)>0){
                _setSuccess('Skills Updated Successfully ');
                redirect(site_url('admin/members/member_skills'));
                exit;
            }	
	}

function Add_summary_points(){
    
    $data['point_1'] = $this->get_post('point_1');
    $data['point_2'] = $this->get_post('point_2');
    $data['point_3'] = $this->get_post('point_3');
    $data['point_4'] = $this->get_post('point_4');
    $data['point_5'] = $this->get_post('point_5');
    $data['point_6'] = $this->get_post('point_6');
    $data['point_7'] = $this->get_post('point_7');
    $data['point_8'] = $this->get_post('point_8');
    $data['point_9'] = $this->get_post('point_9');
    $data['point_10'] = $this->get_post('point_10');
    $data['added_on'] = date('Y-m-d H:i:s');
    $data['m_id'] = $this->input->post('user_id');
    
//    print_r($data);
//    exit();
    $return = $this->summary_career_model->Save($data);
    _setSuccess('Summary of Career Updated Successfully');
    redirect(base_url('admin/members/members_summary'));
    exit;
}



    function AddMemberSummaryPoints($user_id){
    
    $point_id = $this->get_post('point_id',0);
//    echo $point_id;
//    exit();
    $data['point_1'] = $this->get_post('point_1');
    $data['point_2'] = $this->get_post('point_2');
    $data['point_3'] = $this->get_post('point_3');
    $data['point_4'] = $this->get_post('point_4');
    $data['point_5'] = $this->get_post('point_5');
    $data['point_6'] = $this->get_post('point_6');
    $data['point_7'] = $this->get_post('point_7');
    $data['point_8'] = $this->get_post('point_8');
    $data['point_9'] = $this->get_post('point_9');
    $data['point_10'] = $this->get_post('point_10');
    $data['m_id'] = $user_id;
    if($point_id>0){
        $data['updated_on'] = date('Y-m-d H:i:s');
    }else{
        $data['added_on'] = date('Y-m-d H:i:s');
    }
    
    $return = $this->summary_career_model->Save($data,$point_id);
    _setSuccess('Summary of Career Updated Successfully');
    redirect(base_url('admin/members/members_skills'));
    exit;
}


function delete_summary($id){
    if($this->summary_career_model->Delete($id)){
        _setSuccess('Successfully deleted');
    }else{
        _setSuccess('Error deleting member summary');
    }
    redirect(site_url('admin/members/members_summary'));
}


        
        
        function UpdateProfilePhoto($id){
            
            $user_id  = $id;
            
            
            
            $user_detail = $this->member_model->userDetail(array('user_id' =>$user_id));
            
            $post_file = intval($this->get_post('post_file',0));
            
            
            if($post_file>0){
            
                //Get member name to atttach it with image name
                $member_name = preg_replace('/\s*/', '', $user_detail->m_name);
                $member_name = strtolower($member_name);
                
                $current_file = $this->get_post('current_file');
                
                //Image Libaray Config
                $config = array('upload_path'=> 'assets/uploads/members/temp', 'allowed_types' => 'gif|jpg|png|jpeg','file_name'=>$member_name.'-'.rand(0,9999),'overwrite'=>TRUE);
                $this->load->library('upload', $config);                    
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('memberfile')){
                    $udata = array('upload_data' => $this->upload->data());                        
                    $file_name = $udata['upload_data']['file_name'];
                    $data['m_avatar'] = $file_name;
                    $return = $this->member_model->Save($data,$user_id);
                    
                    $full_image_path="./assets/uploads/members/".$file_name;
                    copy("./assets/uploads/members/temp/".$file_name,$full_image_path);
                    resizeImg($full_image_path, 500, 500);
                    
                    $medium_thumb_image_path="./assets/uploads/members/small_thumbs/".$file_name;
                    copy("./assets/uploads/members/".$file_name,$medium_thumb_image_path);
                    resizeImg($medium_thumb_image_path, 200, 200);
                    try {
                        @unlink('./assets/uploads/members/small_thumbs/'.$current_file);
                        @unlink('./assets/uploads/members/'.$current_file);
                    } catch (Exception $exc) {
                        //echo $exc->getTraceAsString();
                    }                    
                    _setSuccess('Profile Picture Updated Successfully');

                }else{
                    //$return = array('error' => $this->upload->display_errors());
                    _setError('Unable to Upload Photo Please try again later');
                }
                
                redirect(site_url('admin/member2'));
                exit;
            }
            
                $data['profile'] = $user_detail;
                $data['page_title'] = 'Update Profile Picture';
                $data['content_view'] = 'admin/members/update_pic';
                $this->load->view('admin/sb-template', $data);
            
           
//            $data['pagename'] = "home";
//            $this->load->view('admin/members/update_pic', $data);
        }
        
        function AddCV($id){
       
        $user_id  = $id;
        $user_detail = $this->member_model->userDetail(array('user_id' =>$user_id));
            
        $data['user_data'] = $user_detail;    
        $data['page_title'] = 'Upload CV';
        $data['content_view'] = 'admin/members/add-cv';
        $this->load->view('admin/sb-template', $data);
        }
    
    
    
        function UplaodCV($id){
        
        $user_id  = $id;
            
        $user_detail = $this->member_model->userDetail(array('user_id' =>$user_id));
            
        $file_ext=preg_split("/\./", $_FILES["resume_file"]["name"]);
        $file_ext1=$file_ext[count($file_ext)-1];
        $file_name = preg_replace('/\s/', '-', $user_detail->m_name)."_".$user_detail->m_id.".".$file_ext1;

        
        $review_title = $this->get_post('review_title');
        $user_comments = $this->get_post('user_comments');

        $config = array('upload_path'=> 'public-assets/cvreviews/', 'allowed_types' => 'doc|docx|pdf','file_name'=>$file_name,'overwrite'=>TRUE);
        $this->load->library('upload', $config);                    
        $this->upload->initialize($config);

        if($this->upload->do_upload('resume_file')){
            $udata = array('upload_data' => $this->upload->data());                        
            $resume_file = $udata['upload_data']['file_name'];
            
            $this->profile_model->Save(array('member_cv'=>$resume_file),$user_detail->m_id);                    

            $noti['user_id'] = $id;
            $noti['noti_title'] = "Uploaded Resume";
            $noti['noti_desc'] = $user_detail->m_name." has uploaded Resume.";
            $noti['noti_type'] = 'cvreview';
            $noti['noti_link'] = site_url('profile/'.$id);
            AddNotification($noti);

            $data = array(
                'upload_resume' => 1
            );
            
            
            
            $email = 'usman@useevs.com';            
            $to          = $email;
            $subject     = "Resume Upload";
            $messageText = '<html><body>';
            $messageText .= "Dear Admin,
            <br><br><br>
            $user_detail->m_name.has upload resume!
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
                    
                    if($this->email->send()) {
                        _setSuccess('Your CV Uploaded Successfully!');
                        return 1;
                       
                    }else {
                     show_error($this->email->print_debugger());      
                    }
     
            _setSuccess('Your CV Uploaded Successfully!');
            
        }else{
            $return = array('error' => $this->upload->display_errors());
            _setError($this->upload->display_errors());
        }
        
        redirect(site_url('admin/members/memberdata'));
        exit();            
    }
    
    
        
        
        
        function add_member(){
            $data['categories'] = $this->categories_model->GetAll();
            
            $data['page_title'] = 'Add Members';
            $data['content_view'] = 'admin/members/showaddform';
            $this->load->view('admin/sb-template', $data);
            
        }
        
        
        function update_member($id){
            $options =  array(
                'role_id' => $this->input->post('role_id'),
                'm_category' => $this->input->post('m_category'),
                'industry1' => $this->input->post('industry1'),
                'industry2' => $this->input->post('industry2'),
                'm_profession' => $this->input->post('m_profession'),
                'm_experience' => $this->input->post('m_experience'),
                'uae_experience' => $this->input->post('uae_experience'),
                'm_employer' => $this->input->post('m_employer'),
                'employment_status' => $this->input->post('employment_status'),
                'm_nationality' => $this->input->post('m_nationality'),
                'm_current_country_id' => $this->input->post('m_current_country_id'),
                'm_city' => $this->input->post('m_city'),
                'm_phone' => $this->input->post('m_phone'),
                'gender' => $this->input->post('gender'),
                'm_current_city' => $this->input->post('m_current_city'),
                'm_current_country_id' => $this->input->post('m_current_country_id'),
                'm_married_status' => $this->input->post('m_married_status'),
                'm_driving_lisence' => $this->input->post('m_driving_lisence'),
                'm_languages' => $this->input->post('m_languages'),
                'linkedin_profile_link' => $this->input->post('linkedin_profile_link'),
                'youtube_cv_link' => $this->input->post('youtube_cv_link'),
                'profession1' => $this->input->post('profession1'),
                'profession2' => $this->input->post('profession2'),
                'profession3' => $this->input->post('profession3'),
                'profession4' => $this->input->post('profession4'),
                'profession5' => $this->input->post('profession5'),
                'visa_status' => $this->input->post('visa_status'),
                'status'   => $this->input->post('m_status') ,
                'm_fb'   => $this->input->post('m_fb') ,
                'name'   => $this->input->post('name') ,
                'email_address'   => $this->input->post('email_address') ,
                'gender'   => $this->input->post('gender') ,
                  );
                $member_id = $this->admin_member_model->editForm($options,$id);
                
                redirect('admin/member2');
        }
        
        function save_member(){
                $options =  array(
                'm_status' => $this->input->post('m_status'),   
                'role_id' => $this->input->post('role_id'),
                'm_category' => $this->input->post('m_category'),
                'industry1' => $this->input->post('industry1'),
                'industry2' => $this->input->post('industry2'),
                'm_profession' => $this->input->post('m_profession'),
                'm_experience' => $this->input->post('m_experience'),
                'uae_experience' => $this->input->post('uae_experience'),
                'm_employer' => $this->input->post('m_employer'),
                'employment_status' => $this->input->post('employment_status'),
                'm_nationality' => $this->input->post('m_nationality'),
                'm_current_country_id' => $this->input->post('m_current_country_id'),
                'm_city' => $this->input->post('m_city'),
                'm_phone' => $this->input->post('m_phone'),
                'gender' => $this->input->post('gender'),
                'm_current_city' => $this->input->post('m_current_city'),
                'm_current_country_id' => $this->input->post('m_current_country_id'),
                'm_married_status' => $this->input->post('m_married_status'),
                'm_driving_lisence' => $this->input->post('m_driving_lisence'),
                'm_languages' => $this->input->post('m_languages'),
                'linkedin_profile_link' => $this->input->post('linkedin_profile_link'),
                'youtube_cv_link' => $this->input->post('youtube_cv_link'),
                'profession1' => $this->input->post('profession1'),
                'profession2' => $this->input->post('profession2'),
                'profession3' => $this->input->post('profession3'),
                'profession4' => $this->input->post('profession4'),
                'profession5' => $this->input->post('profession5'),
                'visa_status' => $this->input->post('visa_status'),
                'm_fb'   => $this->input->post('m_fb') ,
                'm_name'   => $this->input->post('name') ,
                'm_email'   => $this->input->post('email_address') ,
                'gender'   => $this->input->post('gender') ,
                  );
                      $member_id  = $this->admin_member_model->addForm($options);
                      redirect('admin/member2');
        }
        
		function ajaxDataManagementMember()
		{
	  
		if($this->input->post('actioncall')=="listforms")
		{
			
                  $offset=0;
			 
				
				
			$page_id = $this->input->post('page_id');
			$limit = $this->input->post('limit');
			
			
			$data = array();
			$total   =  $this->admin_member_model->getTotalMembers();
			
//			$options =  array('records' => $limit ,
//						'pages'   => $this->pages,
//						'page_no' => $page_id,
//						'total'   => $total );
//			 $paging          = new paging_front($options);
//			 $paging_link     = $paging->show_paging();
			 $data['total_variables'] 	= $total;
			 $data['limit_selected'] 	= $limit;
         //	$data['languages']   =  $this->admin_language_model->getLanguages();	
             $data['forms'] = $this->admin_member_model->getForms(array('limit' => $limit));
		     //$data['appointments'] = $this->admin_tasbeeh_model->getTasbeehReqs();
              
//             $data['paging_link'] = $paging_link;
            
              $this->load->view('admin/members/listforms',$data); 
                  }	
	
	 elseif($this->input->post('actioncall')=="checkEmail")
	{
	$email_address = $this->input->post('email');
	if($this->input->post('actioncall')=="checkEmail")
		{
		echo $data =  $this->admin_member_model->checkEmailAvailable(array('email' =>$email_address));
       	}
	}   
				  
				  
	  elseif($this->input->post('actioncall')=="changestatus")
		  {
		  $m_id = $this->input->post('m_id');
		  $status_val = $this->input->post('status_val');
		  $status   =  $this->admin_member_model->updateFormStatus($m_id, $status_val);
		  }		  
		elseif($this->input->post('actioncall')=="showaddform")
			{
		    $id = $this->input->post('id');   
		    $this->load->view('admin/members/showaddform');                 
            }
		elseif($this->input->post('actioncall')=="addform")
			{
			$options =  array(
                     'm_status'   => $this->input->post('status') ,
					 'm_name'   => $this->input->post('name') ,
					 'm_email'   => $this->input->post('email_address') ,
					 'm_password'   => $this->input->post('password') ,
					 'm_phone'   => $this->input->post('phone') ,
					 'gender'   => $this->input->post('gender') ,
					  );
                      $member_id  = $this->admin_member_model->addForm($options);
                      echo $member_id;
                      exit();
                      redirect('admin/members');
			}		
		elseif($this->input->post('actioncall')=="showeditform")
			{
				//echo "ffffffffffffffffffff";
				//exit;
				
		    $id = $this->input->post('member_id'); 
                    $data['categories'] = $this->categories_model->GetAll();
		    $data['form'] =  $this->admin_member_model->getForms(array('m_id' => $id));           
                    $this->load->view('admin/members/showeditform',$data);                 
            }
		elseif($this->input->post('actioncall')=="editform")
			{
			$options =  array(
                                        'id' => $this->input->post('id') ,
                                        'role_id' => $this->input->post('role_id'),
				        'status'   => $this->input->post('status') ,
					'name'   => $this->input->post('name') ,
					'email_address'   => $this->input->post('email_address') ,
					'password'   => $this->input->post('password') ,
					'phone'   => $this->input->post('phone') ,
					'gender'   => $this->input->post('gender') ,
					  );
            echo $member_id  = $this->admin_member_model->editForm($options);
			}	
	   elseif($this->input->post('actioncall')=="memberView"){
		    $member_id = $this->input->post('member_id');   
		   $data['member']        =  $this->admin_member_model->getForms(array('id' => $member_id));           
           $this->load->view('admin/memberview',$data);                 
          }		
	/*  elseif($this->input->post('actioncall')=="viewcv"){
		    $member_id = $this->input->post('member_id');   
		   $data['member']        =  $this->admin_member_model->getCv(array('id' => $member_id));           
           $this->load->view('admin/memberview',$data);                 
          }		*/	  	
		elseif($this->input->post('actioncall')=="delform")
	 		{
		    $id = $this->input->post('id');
			
			echo $this->admin_member_model->delForm(array('id' => $id));           
            }			
	  

		}

function viewcv($member_id)
	{
	//$member_id = $this->input->post('member_id');   
	$data['member']        =  $this->admin_member_model->getCv(array('id' => $member_id));           
    $this->load->view('admin/memberview',$data);        
   	}	


   function excelexport()
	{
	
echo $user = $this->admin_member_model->memberExportExcel();    
   	}	


   function memberexcelexport($id)
	{
		// $con = mysql_connect("localhost","root","");
    //mysql_select_db("dental");


   /* $sql = "select * from dt_appointments";
    $qur = mysql_query($sql);

  function cleanData($str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }*/

echo $user = $this->admin_member_model->memberExportExcel(array('member_id' => $id));    
   /* $filename = "AuditReport.xls"; 
    header("Content-Type: text/plain");
    header("Content-Disposition: attachment; filename=\"$filename\""); 
    header("Content-Type: application/vnd.ms-excel;charset=UTF-16LE");

$flag = false;
while($row = mysql_fetch_assoc($qur)) 
{   
    echo "Hello";
    if(!$flag)
    {
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
        array_walk($row, 'cleanData');
        echo implode("\t", array_values($row)) . "\r\n";
}
		*/
		}	















	
	
	
	
	
 

	
	
	
 


   


































//======================== END TRANSLATOR CONTROLLER ================================


		
//========================START FETCH CLIENT LIST FOR AUTOCOMPLETE================	


  function logout()
	{
     $session_data = array(
               'login_id'   => '',
               'user_id'    => '',
               'last_login' => '',
               'logged_in'  => false
         );
        $this->session->unset_userdata($session_data);   
        $this->session->sess_destroy();
        redirect('admin/');            
    	}
    function _check_login($login_id){

        if($this->input->post('login_id')){
            $user = $this->admin_model->getUsers(array($login_id,'password' => md5($this->input->post('password'))));    
            if($user) return true;
        }
        $this->form_validation->set_message('_check_login','Your username / password combination is invalid');
        return false;
    }

}