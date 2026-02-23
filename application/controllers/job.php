<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends MY_Controller {
    var $limit  = 15; var $offset = 0; var $pages  = 7; var $config1 = array();
	public $global_array; 
    function __construct(){
	parent::__construct();
	//$this->load->model('front_model');
	$this->load->model('member_model');
	$this->load->model('job_model');
	//$this->load->library('paging_front');	
        $this->session_user_id = $this->session->userdata('user_id');
        $this->session_user_name = $this->session->userdata('name');
    }
	

	function memberJobs()
	{
   $data = array();
  /* $data['limit'] = 12;
   $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
   $data['categories'] 	 = $this->job_model->getCategories(array('c_staus' => 1));	
   $data['professionals'] = $this->member_model->getMembers(array('m_status' => 1));
   $this->load->view('professionals', $data);*/
   
   
   
		$data = array();
		if($this->session->userdata('user_id') != "")
		{ 
		//$data['countries'] 	 	 = $this->member_model->getCountries();	
		//$data['categories'] 	 = $this->job_model->getCategories(array('c_staus' => 1));	
		//$data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
		$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
		$data['memberjobs'] = $this->job_model->getJobs(array('user_id' =>$this->session->userdata('user_id'),'j_status' =>1));
		$this->load->view('myjobs', $data);
		}
		else
		{
		redirect('/');
		}
	   
    }
	function editjob($id,$m_id=0)
	{
            
//            echo "IN Edit";
            echo $id;
            echo "<br>";
            echo $this->session->userdata('user_id');
//            exit();
		//echo $id;
		//exit;
//             $data = array();
  /* $data['limit'] = 12;
   $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
   $data['categories'] 	 = $this->job_model->getCategories(array('c_staus' => 1));	
   $data['professionals'] = $this->member_model->getMembers(array('m_status' => 1));
   $this->load->view('professionals', $data);*/
   
   
   
		$data = array();
		if($this->session->userdata('user_id') != "")
		{ 
	        $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
		$data['job'] = $this->job_model->getJobs(array('user_id' =>$this->session->userdata('user_id'),'j_id' =>$id));
		$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
		//$data['memberjobs'] = $this->job_model->getJobs(array('user_id' =>$this->session->userdata('user_id'),'j_status' =>1));
		$this->load->view('jobs/edit_job', $data);
		}
		else
		{
		redirect('/');
		}
	   
    }
function updateJobData()
{ 
    // Initialize the image variable
    $jobimage = "";

    // Check if an image is uploaded
    if (isset($_FILES['pic']['name']) && $_FILES['pic']['name']) {
        $config = array();
        $config['upload_path'] = 'assets/uploads/jobs/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite'] = false;
        $config['max_size'] = 1024; // 1MB max
        $config['remove_spaces'] = true;
        $config['max_filename'] = 10;
        $config['file_ext_tolower'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('pic')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('exception', $error);
            redirect('jobpost');
        } else {
            $data1 = $this->upload->data();
            $jobimage = $data1['file_name']; // Save the new image file name
        }
    } elseif ($this->input->post('lib_file_selected') != "") {
        $jobimage = $this->input->post('lib_file_selected'); // Use the library file if provided
    }

    // Collect other job data
    $job_id = $this->input->post('job_id');
    $cat_id = $this->input->post('jobcat_id');
    $j_title = $this->input->post('jobtitle');
    $j_title2 = $this->input->post('jobtitle2');
    $j_tags = $this->input->post('jobtags');
    $country_id = $this->input->post('jobcountry');
    $state = $this->input->post('jobstate');
    $j_location = $this->input->post('jobcity');
    $j_descr = $this->input->post('jobdescr');
    $j_company = $this->input->post('jobcompany');
    $j_email_apply = $this->input->post('jobemailapply');

    // Use the alternate job title if provided
    if ($j_title2 != "") {
        $j_title = $j_title2;
    }

    // Prepare update data
    $update_data = array(
        'job_id' => $job_id,
        'cat_id' => $cat_id,
        'j_title' => $j_title,
        'j_tags' => $j_tags,
        'j_country_id' => $country_id,
        'j_state' => $state,
        'j_location' => $j_location,
        'j_descr' => $j_descr,
        'j_company' => $j_company,
        'j_email_apply' => $j_email_apply,
        'j_addedby' => $this->session->userdata('user_id')
    );

    // Include 'j_image' only if a new image was uploaded
    if ($jobimage != "") {
        $update_data['j_image'] = $jobimage;
    }

    // Perform the update
    $data = $this->job_model->updateJob($update_data);

    // Check if update was successful
    if ($data) {
        $this->session->set_flashdata('msg', 'Job successfully updated');
        redirect('job/edit/' . $job_id . "/" . $this->session->userdata('user_id'));
    }
}

				
function saveJob()
	{ 
	$data="";
	
	$year = $this->input->post('year');
	$yearto = $this->input->post('yearto');
	$detail = $this->input->post('detail');
	// $location = $this->input->post('location');
		
    if($this->input->post('actioncall')=="savejob"){
        
		echo $data =  $this->member_model->addMemberJob(array('je_member_id' =>$this->session->userdata('user_id'),'je_name' =>$employer,'je_year' =>$year,'je_toyear' =>$yearto,'je_descr' =>$detail));
       }
	}

    function saveComments(){
        if($this->session->userdata('user_id') != ""){ 
            $data="";
            $job_id = $this->input->post('job_id');
            $com_type = $this->input->post('com_type');
            $comments = $this->input->post('comments');
            $data['profile'] = $this->job_model->saveComments(array('com_member_id' =>$this->session->userdata('user_id'),'com_type'=>$com_type,'com_job_id'=>$job_id,'com_comments'=>$comments,'com_add_date'=>date("Y-m-d")));
            
            $session_name = $this->session->userdata('name');
            
            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = $this->session_user_name." Applied for Job";
            $noti['noti_desc'] = $this->session_user_name." Applied for Job";                    
            $noti['noti_type'] = 'job';
            $noti['noti_link'] = site_url('job/'.$job_id.'/#applyonlineform');
            AddNotification($noti);
            
            if($com_type == "tips")
                redirect(base_url().'job/jobseekertips');		
            else
                redirect(base_url().'job/'.$job_id);		
            //$data['jobs'] = $this->job_model->getJobs(array('cv_status' =>1));
            //$this->load->view('cvreviews', $data);
        }
    }

    function saveReviewComments(){
      if($this->session->userdata('user_id') != ""){
            
        $review_id = $this->input->post('review_id');
        $comments = $this->input->post('comments');
        $data['profile'] = $this->job_model->saveComments(array('com_member_id' =>$this->session->userdata('user_id'),'com_type'=>"review",'com_job_id'=>$review_id,'com_comments'=>$comments,'com_add_date'=>date("Y-m-d")));

        redirect(base_url().'review/'.$review_id);		
        //$data['jobs'] = $this->job_model->getJobs(array('cv_status' =>1));
        //$this->load->view('cvreviews', $data);
        }
    }

    function jobSeekerTips(){
        //$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $data['tipscomments'] = $this->job_model->getTipsComments(array('com_status' =>1,'com_type' =>"tips"));

        //$data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_status' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $data['tips'] = $this->job_model->getTips(array('st_status' =>1));
        $this->load->view('jobseekerstips', $data);
    }

    function place_job(){

       $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
       $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
       $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));	
       $data['jobs'] = $this->job_model->getJobs(array('j_status' =>1));

        $this->load->view('pages/post-job-tabs', $data);   

    }
    function applyOnline(){
        
        $user_id = $this->session->userdata('user_id');
        
        $to= $this->input->post('jobb_email_apply');
        $job_id = $this->input->post('jobb_id');
        $job_title = $this->input->post('jobb_name');
        $name = $this->input->post('name');
        $message =$this->input->post('message');
        $member_resume =$this->input->post('member_resume');
        
        if($member_resume==''){
            _setError('Upload Your cv first to apply job');
            redirect('job/'.$job_id);
            exit;
        }
        
        $messageText = "";
        $messageText .= '<html><body>';
        $messageText .= "Dear Mr/Mrs,
        <br>
        ". $message."
        <br>
        Link to my Profile <a href='https://navafiz.com/profile/".$user_id."'>https://navafiz.com/profile/".$user_id."</a>
        ";
        $messageText .= "'</html></body>"; 

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
        $this->email->from("resume@navafiz.com");
        $this->email->to($to);
        $this->email->subject("Cv for the ".$job_title);
        $this->email->message($messageText);
        $path = FCPATH."public-assets/cvreviews/".$member_resume;
        $this->email->attach($path);
        
        if($this->email->send()) {
            _setSuccess('Job Applied Successfully');
            redirect('job/'.$job_id);
            exit;
        } else {
            show_error($this->email->print_debugger());
            
            _setError('Due to technical reason your message not sent . Please try again!');
            redirect('job/'.$job_id);
            exit;
        } 
    } 


    function reportAbuseForm($id){
	$data="";
	if($this->session->userdata('user_id') == "")
            redirect('jobs');
	else{
            $data['job'] = $this->job_model->getJobs(array('j_id' =>$id));
            $this->load->view('reportabuse', $data);
	}
    }

function sendAbuseReport(){
	
	
	$data="";
	
	 $job_id          = $this->input->post('job_id');
	  $reason          = $this->input->post('survey');
	 
	
	//print_r($data['profile']);
	if($reason == ""){
		 $this->session->set_flashdata('errormsg','You must check the radio button!');
			redirect(base_url().'job/report-abuse/'.$job_id);	
	}
	else{
	$report = $this->job_model->saveAbuseJob(array('ja_job_id' => $job_id,'ja_member_id' =>$this->session->userdata('user_id'),'ja_reason' => $reason, 'ja_add_date' => date("Y-m-d")));	
	if($report){
		 $this->session->set_flashdata('msg','Your request send successfully for this job!');
			redirect(base_url().'job/report-abuse/'.$job_id);	
		
	}
	}
	//$this->load->view('reportabuse', $data);
}


  }

/* End of file front.php */
/* Location: ./application/controllers/front.php */