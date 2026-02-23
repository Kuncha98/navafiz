<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Front extends MY_Controller 
    {    
        var $limit  = 15; 
        var $offset = 0; 
        var $pages  = 7; 
        var $config1 = array();    
        public $global_array;     
        function __construct()    
        {        
            parent::__construct();        
            $this->load->model('front_model');        
            $this->load->model('member_model');        
            $this->load->model('job_model');        
            $this->load->model('blog_model');        
            $this->load->model('profile_model','profile_model');        
            $this->load->library('paging_front');	        
            $this->load->library('pagination');             
            $this->perPage = 5;                  
            $this->session_user_id = $this->session->userdata('user_id');    
            
        }     
        
        function index(){		
            $data['totaljobs'] = $this->job_model->getTotalJobs();	
            $data['totalmembers'] = $this->member_model->getTotalMembers();	
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));	
            $data['recentjobs'] = $this->job_model->getRecentJobs(array('j_status' =>1));	
            $data['engjobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>9,'limit' =>8,'offset' =>0));	
            $data['finacjobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>1,'limit' =>8,'offset' =>0));	
            $data['samajobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>14,'limit' =>8,'offset' =>0));	
            $data['realjobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>33,'limit' =>8,'offset' =>0));	
            $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));    
            $page_metas = array(            
                'title' => 'GeoTech innovation Program’s Demo Day',            
                'description' => 'Celebrating innovation in the UAE space industry',            
                'og_img' => 'kryptolabs-fb-og-geotech.jpg',            
                'og_url' => 'general/geotech_demo_day',        
                );        
            $this->load->view('home/home-main', $data);    
            
        }	    
        
        function privacy_policy(){            
            $this->load->view('pages/privacy-policy');        
            
        }                        
        
        function terms_and_conditions(){            
            $this->load->view('pages/terms-and-conditions');        
            
        }           
        
        function homeold(){	            
            $data['totaljobs'] = $this->job_model->getTotalJobs();            
            $data['totalmembers'] = $this->member_model->getTotalMembers();            
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));            
            $data['recentjobs'] = $this->job_model->getRecentJobs(array('j_status' =>1));            
            $data['engjobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>9,'limit' =>8,'offset' =>0));            
            $data['finacjobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>1,'limit' =>8,'offset' =>0));            
            $data['samajobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>14,'limit' =>8,'offset' =>0));            
            $data['realjobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>33,'limit' =>8,'offset' =>0));            
            $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));            
            $data['pagename'] = "home";            
            $this->load->view('home/home', $data);    
            
        }	    
        function fbUserLogin(){   
            $email = $this->input->post('email');    
            $name = $this->input->post('name');    
            $facebook_id = $this->input->post('facebookid');    
            echo $data =  $this->member_model->registerAjax(array('facebook_id' =>$facebook_id,'m_name' =>$name,'m_email' =>$email, 'm_status' =>1));
            
        }      
        
        function poll(){	
            $data = array();	
            $data['answers'] = $this->front_model->getPollAnswers();	
            $this->load->view('poll', $data);}function pollreferralform(){		
            $data = array();	$data['answers'] = $this->front_model->getPollAnswers();	
            $this->load->view('poll', $data);
            
            }
            
            function pollresult(){		
                $data = array();	
                $ans = $this->input->post('checkboxpoll');	
                $refer_user_id = $this->input->post('refer_user_id');	
                $data =  $this->front_model->saveResult(array('question_id' =>1,'answer_id' =>$ans,'pr_refer_user_id' =>$refer_user_id,'pr_user_id' =>$this->session->userdata('user_id')));
                $data['total_poll_results'] = $this->front_model->getPollTotalResults();	
                $data['answers'] = $this->front_model->getPollResults();	
                $this->load->view('showresults', $data);
                
            }  
            
            function emailAvailability()	
            {	
                $email_address = $this->input->post('email');	
                if($this->input->post('actioncall')=="checkEmail")		
                    {		
                    echo $data =  $this->member_model->checkEmailAvailable(array('email' =>$email_address));       	
                    
                    }	
                    
                    }	        
            public function uploadReviewCvResponse()		
                    {		
                $file_ext=preg_split("/\./", $_FILES["cvfile"]["name"]);				
                $cv_id = $this->input->post('cvr_id');						
                $file_ext1=$file_ext[count($file_ext)-1];		
                $file_name = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','-', $file_ext[0])).time().".".$file_ext1;		
                if($file_ext1 == "doc"  || $file_ext1 == "docx" || $file_ext1 == "pdf")			
                    {			
                    $file_size = round($_FILES["cvfile"]['size']);			    
                    if($file_size > 2097152)				
                        {				
                        echo '{"msg":"large size"}';				
                        
                        }			
                        else if(move_uploaded_file($_FILES["cvfile"]["tmp_name"],"./public-assets/cvreviewresponse/".$file_name)) 
                            {				
                            $data =  $this->member_model->addCvResponse(array('cvr_review_id' =>$cv_id ,'cvr_member_id' =>$this->session->userdata('user_id'),'cvr_member_cv' =>$file_name,'cvr_add_date' =>date("Y-m-d")));
                            echo '{"name":"'.$file_name.'","type":"'.$file_ext1.'","msg":"success"}';
                            }else		   		
                                echo 2;		   	
                            }else			
                                echo '{"msg":"invalid type"}'; 	 	
                            }
        function updateCvReview(){				
            $cv_id = $this->input->post('cv_id');	   		
            $data =  $this->member_model->updateReviewStatus(array('cv_id' =>$cv_id));				
            redirect('cvreviews');								
        }	                    
        
        function registerUser()	{ 			 
            $name = $this->input->post('name');		 
            $email = $this->input->post('email');		 
            $password = $this->input->post('password');	 		
            if($this->input->post('actioncall')=="registeruser"){        
                echo $data =  $this->member_model->registerAjax(array('facebook_id' =>"",'m_name' =>$name,'m_email' =>$email, 'm_password' =>$password));
                }	
            }
            
            function referenceform(){    
                $data = array();    
                if($this->session->userdata('user_id') != ""){         
                    $data['countries'] = $this->member_model->getCountries();	        
                    $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));	        
                    $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	        
                    $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));        
                    $this->load->view('reference', $data);    
                }else{
                    redirect('/');
                }
                }
                
            function updateReference(){         
                    $name = $this->input->post('name');    
                    $occupation = $this->input->post('occupation');    
                    $relation = $this->input->post('relation');    
                    $data =  $this->member_model->updateReference(array('m_id' =>$this->session->userdata('user_id'),'name' =>$name,'occupation' =>$occupation,'relation' =>$relation));    
                    if($data){         
                        $this->session->set_flashdata('msg','Your reference updated successfully!');        
                        redirect(base_url().'reference');    
                    }}				
            function changepasswordform(){    
                $data = array();    
                if($this->session->userdata('user_id') != ""){
                    $data['countries'] = $this->member_model->getCountries();	        
                    $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));	        
                    $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	        
                    $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));        
                    $this->load->view('changepassword', $data);    
                    
                }    else    {        
                    redirect('/');    
                    
                }
                    
                }function updatedpassword(){         
                    $password = $this->input->post('pwd');    
                    if($this->input->post('actioncall')=="updatepassword"){        
                        echo $data =  $this->member_model->updateprofileAjax(array('m_id' =>$this->session->userdata('user_id'),'password' =>$password));    
                        
                    }
                    
                    }			
                    
             function nintyDayCron(){    
                 $dateeee = strtotime('-90 days');    
                 $qry="Delete from jb_member where m_last_login < '".$dateeee."' &&  m_last_login != '0'";    
                 $rs= mysql_query($qry);	}function twentyDayCron(){    $dateeee = strtotime('-30 days');    
                 $jobqry="select j_id,j_status from jb_jobs where j_add_date < '".$dateeee."' AND j_status = 1";    
                 $rs = mysql_query($jobqry); echo mysql_error();    while($row = mysql_fetch_array($rs))    {            
                     $qry1="update jb_jobs set j_status = 0 where j_id = '".$row['j_id']."'";        
                     $rs1= mysql_query($qry1);	    
                     
                 }}	
                 
            function skillform(){	    
                     if($this->session->userdata('user_id') == ""){        
                         redirect(site_url());	        
                         exit;    
                         
                     }        
                     $data['profile'] = 
                             $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));    
                     $this->load->view('skills', $data);        
                     
                     }
                     
            function summary_career(){    
                $user_id = $this->session->userdata('user_id');    
                if($user_id == ""){redirect('/');
                }    
                $this->load->model('member_summary_career_model','summary_career_model');        
                $member_summary_points = $this->summary_career_model->Search(array('m_id'=>$user_id));    
                if(count($member_summary_points)>0){
                    $member_summary_points = $member_summary_points[0];    
                    
                }else{        
                    $member_summary_points = array();    
                    
                }        
                $data['profile'] = $this->member_model->userDetail(array('user_id' =>$user_id));    
                $data['summary_points'] = (array) $member_summary_points;    
                $this->load->view('profile/summary-career', $data);}
                
            function AddMemberSummaryPoints(){    
                $this->load->model('member_summary_career_model','summary_career_model');    
                $user_id = $this->session->userdata('user_id');            
                $point_id = $this->get_post('point_id',0);    
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
                $delexisting = $this->summary_career_model->DeleteUser($user_id);    
                if($delexisting){        
                    $return = $this->summary_career_model->Save($data,$point_id);       
                    _setSuccess('Summary of Career Updated Successfully');    
                    
                }else{       
                    _setError("Unable to add");    
                    
                }        
                redirect(base_url('edit-profile'));    
                exit;
                
                }
            function saveSkill()	
                { 		
                $skillname = $this->input->post('skillname');	
                $experience = $this->input->post('experience');		   
                if($this->input->post('actioncall')=="saveskill"){        		
                    echo $data =  $this->member_model->addMemberSkill(array('ms_member_id' =>$this->session->userdata('user_id'),'ms_name' =>$skillname,'ms_experience' =>$experience));       
                    
                }	
                
                }
                
            function updateSkill(){
                $id = $this->input->post('id');
                $skillname = $this->input->post('name');	
                $experience = $this->input->post('experience');		    
                if($this->input->post('actioncall')=="updateskill"){        		
                    echo $data =  $this->member_model->updateMemberSkill(array('ms_id' =>$id,'ms_member_id' =>$this->session->userdata('user_id'),'ms_name' =>$skillname,'ms_experience' =>$experience));
                    }
                    }
                    
            function education(){
                $this->load->view('add-education');
                
            }
            function editEducation($id){ 
                $data['result'] = $this->member_model->getMemberByID($id);    
                $this->load->view('add-education',$data);
                
            }
            
            function deleteEducation($id){ 
                $this->member_model->deleteEducation($id);    
                redirect('education');
                
            }
            
            function educationform(){
                if($this->session->userdata('user_id') == ""){
                    redirect(site_url('login'));
                    exit();    
                    
                }
                $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
                $user_id = $this->session->userdata('user_id');
                $data['education'] = $this->member_model->getMemberEducation($user_id);
                $this->load->view('education', $data);
                
                }
            function SaveEducation(){
                $me_degree = $this->input->post('me_degree');
                $me_year = $this->input->post('me_year');
                $me_descr = $this->input->post('me_descr');
                if(!empty($me_degree) && !empty($me_year) && !empty($me_descr)){ 
                    $return =  $this->member_model->addMemberEducation(
                            array( 
                                'me_member_id' =>$this->session->userdata('user_id'),
                                'me_degree' =>$me_degree,
                                'me_year' =>$me_year,
                                'me_descr' =>$me_descr
                            )
                            );
                    _setSuccess("Educational Information Updated Successfully");
                    redirect(site_url('edit-profile'));
                    exit;
                    }else{
                        _setError('Please Provide complete education info');
                        redirect(site_url('education'));
                        exit();
                        }
                        }
            function updateEducation()	{
                $id = $this->input->post('me_id');	
                $degree = $this->input->post('me_degree');
                $year = $this->input->post('me_year');
                $detail = $this->input->post('me_descr');
                // $location = $this->input->post('location');
                $data = array(
                    'me_id' =>$id,
                    'me_member_id' =>$this->session->userdata('user_id'),
                    'me_degree' =>$degree,
                    'me_year' =>$year,
                    'me_descr' =>$detail);
                $this->member_model->updateMemberEducation($data);
                _setSuccess("Educational Information Updated Successfully");
                redirect(site_url('education'));            
                exit;	
                
            }	
            function updateJob(){
                $id = $this->input->post('id');
                $employer = $this->input->post('employer');
                $year = $this->input->post('year');    
                $toyear = $this->input->post('toyear');    
                $detail = $this->input->post('detail');        
                if($this->input->post('actioncall')=="updatejob"){        
                    echo $data =  $this->member_model->updateMemberJob(array('je_id' =>$id,'je_member_id' =>$this->session->userdata('user_id'),'je_name' =>$employer,'je_year' =>$year,'je_toyear' =>$toyear,'je_descr' =>$detail));    
                    
                }
                
                }			    
            function cronJobAlert()    
                {        
                $data['profile'] = $this->member_model->JobAlert();    
                
                }
                
            function cvsajax(){
                $data = array();        
                $data['jobs'] = $this->job_model->getCvs(array('cv_status' =>1));
                $this->load->view('listcvs', $data);    
                
            }    
            
            function jobPost(){
                $data=array();        
                $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
                $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));
                $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));
                $data['jobs'] = $this->job_model->getJobs(array('j_status' =>1));
                $this->load->view('jobs', $data);
                }
                
            function newJobPost(){
                $categories = $this->job_model->getCategories(array('c_staus' => 1));
                $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));
                $data['categories'] = $categories;
                $this->load->view('jobs/jobpost', $data);
                }	
            public function uploadJobImage(){
                $file_ext=preg_split("/\./", $_FILES["jobfile"]["name"]);    
                $file_ext1=$file_ext[count($file_ext)-1];    
                $file_name = $file_ext[0].time().".".$file_ext1;    
                if($file_ext1 == "jpg"  || $file_ext1 == "jpeg" || $file_ext1 == "png"){
                    $file_size = round($_FILES["jobfile"]['size']);	        
                    if($file_size > 2097152){            
                        echo '{"msg":"large size"}';        
                    }else if(move_uploaded_file($_FILES["jobfile"]["tmp_name"],"./assets/uploads/jobs/".$file_name)) {
                        $medium_thumb_image_path="./assets/uploads/jobs/small_thumbs/".$file_name;
                        copy("./assets/uploads/jobs/".$file_name,$medium_thumb_image_path);
                        resizeImg($medium_thumb_image_path, 200, 200);
                        echo '{"name":"'.$file_name.'","type":"'.$file_ext1.'","msg":"success"}';
                        }else{
                            echo 2;        
                        }
                        }
                    else{
                        echo '{"msg":"invalid type"}';
                        }
                        
                    }
            function reviewdetail($id){
                if($this->session->userdata('user_id') != ""){
                    $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
                    $data['job'] = $this->job_model->getCvs(array('j_status' =>1,'cv_id' =>$id));
                    $data['comments'] = $this->job_model->getJobComments(array('j_status' =>1,'cv_id' =>$id,'com_type' =>"review"));
                    $data['relatedjobs'] = $this->job_model->getLatestCvs();
                    $data['reviewresponses'] = $this->job_model->getCVReviewResponses(array('cv_id' =>$id));
                    $this->load->view('reviewdetail', $data);
                }else{
                    redirect('login');
                    }
                }
            function postCvReview(){
                $cat_id = $this->input->post('jobcat_id');    
                $cvtitle = $this->input->post('cvtitle');    
                $cvfile = $this->input->post('cvreviewfile');    
                $cvdescr = $this->input->post('cvdescr');    
                echo $data =  $this->job_model->addCvReview(array('cv_member_id' =>$this->session->userdata('user_id'),'cv_member_cv ' =>$cvfile,'cv_title' =>$cvtitle,'cv_descr' =>$cvdescr,'cv_add_date' =>time()));    
                if($data){
                    $this->session->set_flashdata('msg','Your CV  successfully post!');
                    redirect('cvreview');		    
                    
                }
                
                }        
                function postJobData(){             
                    if($_FILES['pic']['name']){        
                        $config=array();        
                        $config['upload_path'] ='assets/uploads/jobs/';        
                        $config['allowed_types'] = 'gif|jpg|jpeg|png';        
                        $config['overwrite'] = false;        
                        $config['max_size']      = 1024;        
                        $config['remove_spaces'] = true;        
                        $config['max_filename']   = 10;        
                        $config['file_ext_tolower'] = true;        
                        $this->upload->initialize($config);        
                        if (!$this->upload->do_upload('pic')) {
                            echo $error =  $this->upload->display_errors();            
                            exit;            
                            $this->session->set_flashdata('execption',$error);
                            redirect('jobpost');        
                        }else{
                            $data1 = $this->upload->data();
                            $jobimage = $data1['file_name'];
                            }
                        }else if($this->input->post('lib_file_selected') != ""){
                            $jobimage = $this->input->post('lib_file_selected');
                            }else{
                                $jobimage = "";     
                                
                            }    
                            $cat_id = $this->input->post('jobcat_id');        
                            $j_title2 = $this->input->post('jobtitle2');    
                            $j_tags = $this->input->post('jobtags');    
                            $country_id = $this->input->post('jobcountry');    
                            $j_location = $this->input->post('jobcity');    
                            $j_image = $jobimage;    
                            $j_descr = $this->input->post('jobdescr');    
                            $j_company = $this->input->post('jobcompany');    
                            $j_email_apply = $this->input->post('jobemailapply');    
                            $job_reference_by = $this->input->post('job_reference_by');        
                            $j_title = $j_title2;    
                            $jobdata_arrg = array(        
                                'cat_id' =>$cat_id,        
                                'j_title' =>$j_title,        
                                'j_tags' =>$j_tags,        
                                'j_country_id' =>$country_id,        
                                'j_location' =>$j_location,        
                                'j_image' =>$j_image,         
                                'j_descr' =>$j_descr,         
                                'j_company' =>$j_company,         
                                'j_email_apply' =>$j_email_apply,         
                                'job_reference_by' =>$job_reference_by,         
                                'j_addedby' => $this->session->userdata('user_id'),        
                                'j_status' => 1,        
                                'j_add_date' =>time());    
                            echo $data =  $this->job_model->addJob($jobdata_arrg);    
                            if($data){        
                                $user_id = $this->session->userdata('user_id');        
                                $session_name = $this->session->userdata('name');        
                                $noti['user_id'] = $this->session_user_id;        
                                $noti['noti_title'] = $session_name." Posted a new Verified Job.";        
                                $noti['noti_desc'] = $session_name." Posted a new Verified Job.";        
                                $noti['noti_type'] = 'job';                          
                                $noti['noti_link'] = site_url('job/'.$data);        
                                AddNotification($noti);        
                                $this->session->set_flashdata('msg','Job Posted Successfully');        
                                redirect('jobpost');		        
                                exit();    
                                
                            }            
                            
                            }                
                    function postSkills(){ 	            
                                $jobtags = $this->input->post('jobtags');            
                                $data =  $this->member_model->updateMemberSkill(array('m_skills' =>$jobtags));            
                                if(!empty($data)){                
                                    _setSuccess('Skills Updated Successfully ');                
                                    redirect(site_url('edit-profile'));                
                                    exit;            
                                    
                                }		
                                
                                }		
                                
                    function downloadReviewcv()	{		
                                    $filupload = $this->uri->segment(2);		
                                    header('Content-type: application/pdf');		
                                    header("Content-Disposition: attachment; filename=".$filupload);               
                                    echo file_get_contents(base_url()."public-assets/cvreviewresponse/".$filupload);	
                                    
                                }		   		
                    function professionals(){    
                                    $data = array();    
                                    $data['limit'] = 100;    
                                    $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));    
                                    $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));	    
                                    $data['professionals'] = $this->profile_model->Search(array('m_status' => 1));            
                                    $this->load->view('pages/professionals', 
                                            $data);    
                                    
                                }
                    function professionalsajax(){    
                        $data = array();    
                        $page_id = $this->input->post('page_id');    
                        $limit = $this->input->post('limit');	    
                        $s_catid = $this->input->post('s_catid');    
                        $s_skills = $this->input->post('s_skills');	   
                        $data['limit_selected'] 	= $limit;   
                        $data['professionals'] = $this->member_model->getMembers(array('cat_id' =>$s_catid,'profession' =>$s_skills,'status' =>1, 'limit' => $limit));   
                        $this->load->view('listprofessionals', $data);}              
                        
                    function searchProfessionals()	{   
                        $data = array();    
                        $s_location = $this->input->post('s_location');	
                        $s_catid = $this->input->post('s_catid');	
                        $s_skills = $this->input->post('s_skills');	
                        $data['search']= $this->input->post('s_skills');	
                        if($this->input->post('actioncall')=="searchprofessionals"){        
                            $data['professionals'] =  $this->member_model->getMembers(array('s_location' =>$s_location,'cat_id' =>$s_catid,'profession' =>$s_skills));
                            $this->load->view('listprofessionals', $data);	
                            
                        }   
                        }        
                    public function uploadMemberImage(){    
                        $m_id = $this->input->post('m_id');    
                        $current_file = $this->input->post('current_file');        
                        $file_ext=preg_split("/\./", $_FILES["memberfile"]["name"]);        
                        $file_ext1=$file_ext[count($file_ext)-1];    
                        $file_name = $file_ext[0].$this->session->userdata('user_id').".".$file_ext1;    
                        if($file_ext1 == "jpg"  || $file_ext1 == "jpeg" || $file_ext1 == "png")    {        
                            $file_size = round($_FILES["memberfile"]['size']);	        
                            if($file_size > 2097152){            
                                echo '{"msg":"large size"}';        
                                
                            }else if(move_uploaded_file($_FILES["memberfile"]["tmp_name"],"./assets/uploads/members/".$file_name)) {            
                                $medium_thumb_image_path="./assets/uploads/members/small_thumbs/".$file_name;            
                                copy("./assets/uploads/members/".$file_name,$medium_thumb_image_path);            
                                resizeImg($medium_thumb_image_path, 150, 150);            
                                try {                
                                    unlink('./assets/uploads/members/small_thumbs/'.$current_file);                
                                    unlink('./assets/uploads/members/'.$current_file);            
                                    
                                } catch (Exception $exc) {                
                                    echo $exc->getTraceAsString();            
                                    
                                }                        
                                $data['m_avatar'] = $file_name;                        
                                $return = $this->member_model->Save($data,$m_id);        
                                
                                }else{
                                    }            
                                    
                                }else{
                                    }
                                redirect(site_url('profile'));    
                                exit();
                                
                                }    
                    function happen()    {
                        if($this->session->userdata('user_id') == ""){            
                            redirect('login');        

                        }                
                        $user_detail = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
                        if(empty($user_detail->m_profession) || !$user_detail->m_current_city>0 || empty($user_detail->m_current_city) || substr_count($user_detail->m_skills, ",")<2){            
                            _setError("Complete your profile to access Social Media Groups");            
                            redirect(site_url('edit-profile'));            
                            exit;        

                        }        
                        $data['profile'] = $user_detail;        
                        $this->load->view('happen', $data);    

                        }				
                    function blogs()	
                        { 		
                        $data['categories'] = $this->blog_model->getCategories(array('blogc_status' =>1));
                        $data['recentposts'] = $this->blog_model->getRecentPosts(array('blog_status' =>1));
                        $data['randomtags'] = $this->blog_model->getRandomTags(array('blog_status' =>1));
                        $data['blogs'] = $this->blog_model->getBlogs(array('c_status' =>1));	
                        $this->load->view('blogs',$data);	
                        
                        }		
                        
                    function blogcategory($id)	{ 		
                        $data['categories'] = $this->blog_model->getCategoryBlogs(array('c_status' =>1,'blog_category' =>$id));
                        $this->load->view('blogcategory',$data);	
                        
                    }	
                    
                    function blogDetail($id)	
                    {                        
                        $data['categories'] = $this->blog_model->getCategories(array('blogc_status' =>1));            
                        $data['recentposts'] = $this->blog_model->getRecentPosts(array('blog_status' =>1));            
                        $data['blogcomments'] = $this->blog_model->getBlogComments(array('blog_id' =>$id,'blogcom_status' =>1)); 
                        $data['blog'] = $this->blog_model->getBlogDetail(array('c_status' =>1,'blog_id' =>$id));
                        $data['randomtags'] = $this->blog_model->getRandomTags(array('blog_status' =>1));
                        $data['pagename'] = "blog_detail";            
                        $this->load->view('blogdetail', $data);	
                        
                    }
                    
                    function load()	{
                        $this->load->view('load', $data);
                        }				
                    
                    function contact(){
                        $data = array();
                        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
                        $this->load->view('contact', $data);
                        }
                    function sendContact(){
                        $name = $this->input->post('name');
                        $email_from =$this->input->post('email');
                        $phone =$this->input->post('phone');
                        $subject =$this->input->post('subject');
                        $message =$this->input->post('message');
                        if(empty($name) || empty($email_from)){
                            $this->session->set_flashdata('errormsg','Please fill all required information');
                            redirect('contact');
                            exit;       
                            }
                            $messageText = "";
                            $to = "usman@navafiz.com";
                            $messageText .= '<html><body>';
                            $messageText .= "Dear Navafiz,                            "
                                    . "<br><br>                        "
                                    . "Email: ".$email_from.",                        "
                                    . "<br>                        "
                                    . "Phone: ".$phone.",                        "
                                    . "<br". $message."                        "
                                    . "<br><br>                          "
                                    . "Regards,<br>".$name." <br><br>";$messageText .= "'</html></body>";
                            $config = Array(        
                                'protocol' => 'smtp',        
                                'smtp_host' => 'ssl://smtp.googlemail.com',         
                                'smtp_port' => 465,                
                                'smtp_user' => SMTP_USER,         
                                'smtp_pass' => SMTP_PASSWORD,         
                                'mailtype' => 'html',        
                                'charset' => 'iso-8859-1',        
                                'wordwrap' => TRUE            
                                );          
                            $config['newline'] = "\r\n";    
                            $config['crlf']    = "\r\n";    
                            $this->load->library("email",$config);    
                            $this->email->set_mailtype("html");    
                            $this->email->set_newline("\r\n");    
                            $this->email->from("register@navafiz.com");    
                            $this->email->to($to);    
                            $this->email->subject($subject);    
                            $this->email->message($messageText);    
                            if($this->email->send()) {        
                                $this->session->set_flashdata('msg','Contact Request sent successfully!');        
                                redirect('contact');	        
                                exit;                
                                
                            } else {        
                                show_error($this->email->print_debugger());        
                                $this->session->set_flashdata('errormsg','Due to technical reason your message not sent . Please try again!');        
                                redirect('contact');        
                                exit;    
                                
                            }    
                            
                            }										
                            /*     function home(){
                             * $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));	    
                             * $this->load->view('home',$data);       		}*/	
                    function delEmployer($id)	{	
                        $je_id = $id;
                        $this->input->post('je_id');	
                        if($this->input->post('actioncall')=="delemployer"){    	
                            $data =  $this->member_model->removeEmployer(array('je_id' =>$je_id));		
                            if($data)			
                                redirect('employer');		
                        }	
                        
                        }
                    function delEducation($id)	{	
                        $me_id = $id;
                        $this->input->post('me_id');	
                        if($this->input->post('actioncall')=="deleducation"){    	
                            $data =  $this->member_model->removeEducation(array('me_id' =>$me_id));		
                        if($data)			
                            redirect('education');		
                        }	
                        
                        }
                function jobtitles()   {      
                    $qry = "select j_title from jb_jobs where j_status=1";      
                    $rzz = $this->db->query($qry)->result();      
                    $i=0;      
                    foreach ($rzz as $rz){         
                        $i++;         
                        echo $i." > ";         
                        echo $rz->j_title."<br /><br />";      

                    }   

                    }  
                            
                    /* End of file front.php *//* Location: ./application/controllers/front.php */
}
        