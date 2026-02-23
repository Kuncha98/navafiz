<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends MY_Controller {
    var $limit  = 15; var $offset = 0; var $pages  = 7; var $config1 = array();
    public $global_array; 
    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('member_model');
        $this->load->model('job_model');
        $this->load->model('blog_model');
        $this->load->library('paging_front');	
    }
function index()
	{
	
	
		
	$data = "";
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
    $this->load->view('home', $data);
	}	
    function login()
    { 
        if($this->session->userdata('user_id') != ""){
                redirect(base_url());
        }else{		
            $this->form_validation->set_rules('email', 'User Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() === FALSE )
            {
                $data['selected']="login";
                $this->load->view('login',$data);
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $query =  $this->member_model->loginAjax(array('email' =>$email, 'password' =>$password));
                if($query) {	
                    redirect(base_url());
                    //redirect(base_url().'professional/'.$this->session->userdata('user_id'));
                    exit();
                } else {
                    $this->session->set_flashdata('msg','Email Address Or Password is wrong!');
                    redirect('login');			
                }

            }
        }
    }
function fbUserLogin()
	{
	$email = $this->input->post('email');
    $name = $this->input->post('name');
	$facebook_id = $this->input->post('facebookid');
	echo $data =  $this->member_model->registerAjax(array('facebook_id' =>$facebook_id,'m_name' =>$name,'m_email' =>$email, 'm_status' =>1));
	}

function register()
	{
	
	$this->form_validation->set_rules('regname', 'Name', 'trim|required');
	$this->form_validation->set_rules('regemail', 'Email', 'trim|required|valid_email');
	$this->form_validation->set_rules('regpwd', 'Password', 'trim|required|matches[regcpwd]');
	$this->form_validation->set_rules('regcpwd', 'Password Confirmation', 'required');
	if ( $this->form_validation->run() === FALSE )
		{
		$data['selected']	=	"login";
		$this->load->view('register',$data);
	} else {
		 $name = $this->input->post('regname');
    	 $email = $this->input->post('regemail');
	    
		 $password = $this->input->post('regpwd');
			
	//	$query =  $this->member_model->loginAjax(array('name' =>$name,'email' =>$email,'gender' =>$gender, 'password' =>$password));
	   $query =  $this->member_model->registerAjax(array('facebook_id' =>"",'m_name' =>$name,'m_email' =>$email, 'm_password' =>$password));
	  // echo "11111111111111111111111111111111111111111";
	 //  exit;
	   
	   
		if($query) {	
		
			$this->session->set_flashdata('msg','Please check your ibox/spam email for activation!');
			redirect('register');	
		} else {
			
			$this->session->set_flashdata('errormsg','Email already exist!');
			redirect('register');			
			}
			
		}
	
	
		
		
		

    }
function poll(){
	$data = "";
	/*if($this->session->userdata('user_id') != "")
		{ */
	$data['answers'] = $this->front_model->getPollAnswers();
	$this->load->view('poll', $data);
		/*}
		else
		{
		redirect('login');
		}*/
}
function pollreferralform(){
	
	$data = "";
	/*if($this->session->userdata('user_id') != "")
	    $this->session->set_userdata('back_url', current_url());*/

	
	/*if($this->session->userdata('user_id') != "")
		{ */
	$data['answers'] = $this->front_model->getPollAnswers();
	$this->load->view('poll', $data);
		/*}
		else
		{
		redirect('login');
		}*/

}
function pollresult(){
	
	//print_r($_POST);
	//exit;
	$data = "";
	$ans = $this->input->post('checkboxpoll');
	$refer_user_id = $this->input->post('refer_user_id');
	//$user_id = $this->input->post('user_id');
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
	
function registerProgram()
	{
	$event_id = $this->input->post('event_id');	
	//$email_address = $this->input->post('email');
	if($this->input->post('actioncall')=="registerprogram")
		{
			
		echo $data =  $this->member_model->registerProgram(array('pu_event_id' =>$event_id,'pu_member_id' =>$this->session->userdata('user_id'),'pu_add_date' =>time()));
       	}
	}
    function cvReviewForm(){
        
        $this->load->model('cvreview_points_model');
        $cvr_points = $this->cvreview_points_model->GetAll();
        
	$data = "";
        if($this->session->userdata('user_id') != "")
        { 
            $data['cvr_points'] = $cvr_points;
            $data['countries'] = $this->member_model->getCountries();	
            $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));	
            $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $this->load->view('cvreview', $data);
        }
        else
        {
            redirect('login');
        }
    }	
public function uploadReviewCv()
		{
		$file_ext=preg_split("/\./", $_FILES["cvfile"]["name"]);
		$file_ext1=$file_ext[count($file_ext)-1];
		$file_name = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','-', $file_ext[0])).time().".".$file_ext1;
		if($file_ext1 == "doc"  || $file_ext1 == "docx" || $file_ext1 == "pdf")
			{
			$file_size = round($_FILES["cvfile"]['size']);	
		    if($file_size > 2097152)
				{
				echo '{"msg":"large size"}';
				}
			else if(move_uploaded_file($_FILES["cvfile"]["tmp_name"],"./public-assets/cvreviews/".$file_name)) {
				 echo '{"name":"'.$file_name.'","type":"'.$file_ext1.'","msg":"success"}';
				}
			else
		   		echo 2;
		   	}
		else
			echo '{"msg":"invalid type"}'; 	
 	}
public function uploadReviewCvResponse()
		{
		$file_ext=preg_split("/\./", $_FILES["cvfile"]["name"]);
		
		$cv_id = $this->input->post('cvr_id');
		
		
		//exit;
		$file_ext1=$file_ext[count($file_ext)-1];
		$file_name = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','-', $file_ext[0])).time().".".$file_ext1;
		if($file_ext1 == "doc"  || $file_ext1 == "docx" || $file_ext1 == "pdf")
			{
			$file_size = round($_FILES["cvfile"]['size']);	
		    if($file_size > 2097152)
				{
				echo '{"msg":"large size"}';
				}
			else if(move_uploaded_file($_FILES["cvfile"]["tmp_name"],"./public-assets/cvreviewresponse/".$file_name)) {
				$data =  $this->member_model->addCvResponse(array('cvr_review_id' =>$cv_id ,'cvr_member_id' =>$this->session->userdata('user_id'),'cvr_member_cv' =>$file_name,'cvr_add_date' =>date("Y-m-d")));
				
				
				
				
				 echo '{"name":"'.$file_name.'","type":"'.$file_ext1.'","msg":"success"}';
				}
			else
		   		echo 2;
		   	}
		else
			echo '{"msg":"invalid type"}'; 	
 	}


function updateCvReview()
		{
			
	$cv_id = $this->input->post('cv_id');
	 //   if($this->input->post('actioncall')=="forgotpassword"){
	   		$data =  $this->member_model->updateReviewStatus(array('cv_id' =>$cv_id));
     //  		if($data){
				
		//		$this->session->set_flashdata('msg','Email Address not exist!');
				redirect('cvreviews');
		//	}
		
		//	}
		}	
function forgotpassword()
	{
   $data = "";
   $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));
   $this->load->view('forgotpassword', $data);
    }
function updatepassword()
		{
			
		$email_address = $this->input->post('email');
	 //   if($this->input->post('actioncall')=="forgotpassword"){
	   		$data =  $this->member_model->forgotpassword(array('email' =>$email_address));
       		if($data){
				$this->session->set_flashdata('msg','Please check your email for password!');
				redirect('forgot');
			}else{
				$this->session->set_flashdata('msg','Email Address not exist!');
				redirect('forgot');
			}
		
		//	}
		}		   		
function registerUser()
	{ 
	$data="";
		 $name = $this->input->post('name');
		 $email = $this->input->post('email');
		 $password = $this->input->post('password');
	 
		if($this->input->post('actioncall')=="registeruser"){
        echo $data =  $this->member_model->registerAjax(array('facebook_id' =>"",'m_name' =>$name,'m_email' =>$email, 'm_password' =>$password));
		}
	}
function user_verify()
  {
   $url_link = $this->uri->segment(2);
   $user =  $this->member_model->verifyLink(array('verification' =>$url_link));
    if($user)
    	{
     	$this->load->view('verification');
    	}
	else{
		$this->load->view('verification');
		}
  }		
function profile()
{
    $data = "";
    /*print_r($this->session->userdata);
    exit;*/
    if($this->session->userdata('user_id') != "")
    { 
        $data['countries'] 	 	 = $this->member_model->getCountries();	
        $data['countpollrefer'] 	= $this->member_model->getPollMemberRefer();	
        $data['categories'] 	 	= $this->job_model->getCategories(array('c_staus' => 1));	
        //$data['relatedprofiles'] 	= $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $data['similarjobs'] = $this->job_model->getJobs(array('j_status' =>1,'cat_id' =>$this->session->userdata('cat_id'),'limit' =>4));
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $this->load->view('profile', $data);
    }
    else
    {
        redirect('/');
        
    }
}
function updateprofile()
{ 
    $data="";
    $name = $this->input->post('name');
    $gender = $this->input->post('gender');
    $cat_id = $this->input->post('cat_id');
    $state = $this->input->post('state');
    $country_id = $this->input->post('country_id');
    $location = $this->input->post('location');
    $profession = $this->input->post('profession');
    $employer = $this->input->post('employer');
    $experience = $this->input->post('experience');
    $avatar = $this->input->post('avatar');
    $phone = $this->input->post('phone');
    $employment_status = $this->input->post('employment_status');
    $nationality = $this->input->post('nationality');
    $current_country_id = $this->input->post('current_country_id');
    $current_location = $this->input->post('current_location');
    $religion = $this->input->post('religion');
    $marital_status = $this->input->post('marital_status');
    $driving = $this->input->post('driving');
    $languages = $this->input->post('languages');
    $current_salary = $this->input->post('current_salary');
    $expected_salary = $this->input->post('expected_salary');
    $relocate = $this->input->post('relocate');
    $work_on_site = $this->input->post('work_on_site');
    $visa_status = $this->input->post('visa_status');
    
    $add_data = array(
                'm_id' =>$this->session->userdata('user_id'),
                'name' =>$name,
                'gender' =>$gender,
                'cat_id' =>$cat_id,
                'avatar' =>$avatar,
                'location' =>$location,
                'profession' =>$profession,
                'employer' =>$employer,
                'experience' =>$experience,
                'state' =>$state,
                'nationality' =>$nationality,
                'phone' =>$phone,
                'employment_status' =>$employment_status,
                'country_id' =>$country_id,
                'm_current_country_id' =>$current_country_id,
                'm_current_city' =>$current_location,
                'm_religion' =>$religion,
                'm_married_status' =>$marital_status,
                'm_driving_lisence' =>$driving,
                'm_languages' =>$languages,
                'm_current_salary' =>$current_salary,
                'm_expected_salary' =>$expected_salary,
                'm_relocate' =>$relocate,
                'm_onsite' =>$work_on_site,
                'visa_status' =>$visa_status
            );
    
    
    
    if($this->input->post('actioncall')=="updateprofile"){
        echo $data =  $this->member_model->updateprofileAjax($add_data);
    }
}
function updatesocial(){
	
    $data="";
    $fb = $this->input->post('fb');
    $tw = $this->input->post('tw');
    $lk = $this->input->post('lk');

    $data =  $this->member_model->updateprofileAjax(array('m_id' =>$this->session->userdata('user_id'),'fb' =>$fb,'tw' =>$tw,'lk' =>$lk));
    $this->session->set_flashdata('msg','Social media information updated successfully!');
    redirect('social-media');
    exit();
}

function referenceform()
{
    $data = "";
    if($this->session->userdata('user_id') != "")
    { 
        $data['countries'] = $this->member_model->getCountries();	
        $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));	
        $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $this->load->view('reference', $data);
    }
    else
    {
        redirect('/');
    }
}
		
function updateReference()
{ 
    $data="";
    $name = $this->input->post('name');
    $occupation = $this->input->post('occupation');
    $relation = $this->input->post('relation');

    $data =  $this->member_model->updateReference(array('m_id' =>$this->session->userdata('user_id'),'name' =>$name,'occupation' =>$occupation,'relation' =>$relation));
    if($data){
         $this->session->set_flashdata('msg','Your reference updated successfully!');
        redirect(base_url().'reference');
    }
}		
		
function changepasswordform()
{
    $data = "";
    if($this->session->userdata('user_id') != "")
    { 
        $data['countries'] 	 	 = $this->member_model->getCountries();	
        $data['categories'] 	 = $this->job_model->getCategories(array('c_staus' => 1));	
        $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $this->load->view('changepassword', $data);
    }
    else
    {
        redirect('/');
    }
}
function updatedpassword()
{ 
    $data="";
    $password = $this->input->post('pwd');

    if($this->input->post('actioncall')=="updatepassword"){
        echo $data =  $this->member_model->updateprofileAjax(array('m_id' =>$this->session->userdata('user_id'),'password' =>$password));
    }
}			
function nintyDayCron()
{
    $dateeee = strtotime('-90 days');
    $qry="Delete from jb_member where m_last_login < '".$dateeee."' &&  m_last_login != '0'";
    $rs= mysql_query($qry);	
}
function twentyDayCron()
{
    $dateeee = strtotime('-30 days');
    $jobqry="select j_id,j_status from jb_jobs where j_add_date < '".$dateeee."' AND j_status = 1";
    $rs = mysql_query($jobqry); echo mysql_error();
    while($row = mysql_fetch_array($rs))
    {    
        $qry1="update jb_jobs set j_status = 0 where j_id = '".$row['j_id']."'";
        $rs1= mysql_query($qry1);	
    }
}	


function employerform(){
	
    $data = "";
    $this->load->model('companies_model','companies');
    
    
    $companies_list = $this->companies->GetAll();
    
    if($this->session->userdata('user_id') != ""){ 
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id'))); 
        $data['companies_list'] = $companies_list;
        $this->load->view('employer', $data);
    }else{
        redirect('/');
    }
}
function skillform(){
	
   $data = "";
    if($this->session->userdata('user_id') != "")
		{ 
   $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
 //  $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));
   $this->load->view('skills', $data);
   	}
	else
		redirect('/');	
    
}

function summary_career(){
    $user_id = $this->session->userdata('user_id');
    if($user_id == ""){redirect('/');}
    $this->load->model('member_summary_career_model','summary_career_model');
    
    $member_summary_points = $this->summary_career_model->Search(array('m_id'=>$user_id));
    if(count($member_summary_points)>0){
        $member_summary_points = $member_summary_points[0];
    }else{
        $member_summary_points = array();
    }
    
    $data['profile'] = $this->member_model->userDetail(array('user_id' =>$user_id));
    $data['summary_points'] = (array) $member_summary_points;
    $this->load->view('summary-career', $data);
}
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
    
    $return = $this->summary_career_model->Save($data,$point_id);
    redirect(base_url('summary-career'));
    exit;
}

function saveSkill()
	{ 
	$data="";
	$skillname = $this->input->post('skillname');
	$experience = $this->input->post('experience');

		
    if($this->input->post('actioncall')=="saveskill"){
        
		echo $data =  $this->member_model->addMemberSkill(array('ms_member_id' =>$this->session->userdata('user_id'),'ms_name' =>$skillname,'ms_experience' =>$experience));
       }
	}	
function updateSkill()
	{ 
	$data="";
	$id = $this->input->post('id');
	$skillname = $this->input->post('name');
	$experience = $this->input->post('experience');
		
    if($this->input->post('actioncall')=="updateskill"){
        
		echo $data =  $this->member_model->updateMemberSkill(array('ms_id' =>$id,'ms_member_id' =>$this->session->userdata('user_id'),'ms_name' =>$skillname,'ms_experience' =>$experience));
       }
	}	
function educationform(){
	
   $data = "";
    if($this->session->userdata('user_id') != "")
		{ 
   $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
 //  $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));
   $this->load->view('education', $data);
   	}
	else
		redirect('/');	
    
}


function saveEducation()
	{ 
	$data="";
	$degree = $this->input->post('degree');
	$degree_year = $this->input->post('degree_year');
	$descr = $this->input->post('descr');
	// $location = $this->input->post('location');
		
    if($this->input->post('actioncall')=="saveeducation"){
        
		echo $data =  $this->member_model->addMemberEducation(array('me_member_id' =>$this->session->userdata('user_id'),'me_degree' =>$degree,'me_year' =>$degree_year,'me_descr' =>$descr));
       }
	}	
function updateEducation()
	{ 
	$data="";
	$id = $this->input->post('id');
	$degree = $this->input->post('degree');
	$year = $this->input->post('year');
	$detail = $this->input->post('detail');
	// $location = $this->input->post('location');
		
    if($this->input->post('actioncall')=="updateeducation"){
        
		echo $data =  $this->member_model->updateMemberEducation(array('me_id' =>$id,'me_member_id' =>$this->session->userdata('user_id'),'me_degree' =>$degree,'me_year' =>$year,'me_descr' =>$detail));
       }
	}	
function socialmediaform()
{
    $data = "";
    var_dump($this->session->userdata('user_id'));
    exit();
    
    
    if($this->session->userdata('user_id') != "")
    { 
        $data['countries'] = $this->member_model->getCountries();	
        $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));	
        $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $this->load->view('socialmedia', $data);
    }
    else
    {
        redirect('/');
    }
}
function uploadCvForm(){	
    $data = "";   
    if($this->session->userdata('user_id') != ""){ 
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        //  $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));
        $this->load->view('uploadcv', $data);
    }else{
        redirect('/');
    } 
}
public function uploadCv()
{

    $file_ext=preg_split("/\./", $_FILES["cvfile"]["name"]);
    $file_ext1=$file_ext[count($file_ext)-1];
    //$file_name = $file_ext[0].$this->session->userdata('user_id').".".$file_ext1;
    $file_name = $this->session->userdata('name')."_".time().".".$file_ext1;
    if($file_ext1 == "doc"  || $file_ext1 == "docx" || $file_ext1 == "pdf")
    {
        $file_size = round($_FILES["cvfile"]['size']);	
        if($file_size > 2097152)
        {
            echo '{"msg":"large size"}';
        }
        else if(move_uploaded_file($_FILES["cvfile"]["tmp_name"],"./public-assets/cvreviews/".$file_name)) {

            $data =  $this->member_model->updateprofileAjax(array('m_id' =>$this->session->userdata('user_id'),'m_cv' =>$file_name));
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
			
function saveJob()
{ 
    $data="";
    $employer = $this->input->post('employer');
    $year = $this->input->post('year');
    $yearto = $this->input->post('yearto');
    $detail = $this->input->post('detail');
    // $location = $this->input->post('location');

    if($this->input->post('actioncall')=="savejob"){
        echo $data =  $this->member_model->addMemberJob(array('je_member_id' =>$this->session->userdata('user_id'),'je_name' =>$employer,'je_year' =>$year,'je_toyear' =>$yearto,'je_descr' =>$detail));
    }
}
function updateJob()
{ 
    $data="";
    $id = $this->input->post('id');
    $employer = $this->input->post('employer');
    $year = $this->input->post('year');
    $toyear = $this->input->post('toyear');
    $detail = $this->input->post('detail');
    // $location = $this->input->post('location');

    if($this->input->post('actioncall')=="updatejob"){
        echo $data =  $this->member_model->updateMemberJob(array('je_id' =>$id,'je_member_id' =>$this->session->userdata('user_id'),'je_name' =>$employer,'je_year' =>$year,'je_toyear' =>$toyear,'je_descr' =>$detail));
    }
}	

		
    function cronJobAlert()
    {
        $data['profile'] = $this->member_model->JobAlert();
    }
    
    function cvReviews(){
        if($this->session->userdata('user_id') != ""){ 			
            $data="";
            $data['limit'] = $this->limit;
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
            $data['jobs'] = $this->job_model->getJobs(array('cv_status' =>1));
            $this->load->view('cvreviews', $data);
        }else{
            redirect(base_url('login'));	
        }
    }
function cvsajax()
{    
    $data = array();
    $data['jobs'] = $this->job_model->getCvs(array('cv_status' =>1));    
    $this->load->view('listcvs', $data);
}

function jobs(){
    $data['limit'] = $this->limit;
    $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
    $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	

    $data['jobs'] = $this->job_model->getJobs(array('j_status' =>1));
    $this->load->view('jobs', $data);
}	
function jobsajax()
{
    $data = "";
    $page_id = $this->input->post('page_id');
    $cat_id = $this->input->post('cat_id');
    $limit = $this->input->post('limit');
    $data = array();
    if($page_id!="")
     $offset    = $limit * ($page_id-1);
        else	
                $offset = 0;

        $total   =  $this->job_model->getTotalJobs(array('cat_id' =>$cat_id,'status' =>1));
    //   echo $total; exit;
        $options =  array('records' => $limit ,
            'pages'   => $this->pages,
            'page_no' => $page_id,
            'total'   => $total );
    $paging          = new paging_front($options);
    $paging_link     = $paging->show_paging();
    $data['total_deals']   		= $total;
    $data['limit_selected'] 	= $limit;
    $data['jobs'] = $this->job_model->getJobs(array('cat_id' =>$cat_id,'status' =>1,'offset' =>$offset, 'limit' => $limit));


    $data['paging_link'] = $paging_link;
    $this->load->view('listjobs', $data);
}

function jobPost()
{
    $data="";
    $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
    $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
    $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));	
    $data['jobs'] = $this->job_model->getJobs(array('j_status' =>1));
    $this->load->view('jobs', $data);
    
}	
function newJobPost()
{
    $data="";
    if($this->session->userdata('user_id') != "")
    { 
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $data['categories'] = $this->job_model->getCategories(array('c_staus' => 1));        
        $this->load->view('jobpost', $data);
    }
    else
    {
        redirect('login');
    }
}	


public function uploadJobImage(){
    
    $file_ext=preg_split("/\./", $_FILES["jobfile"]["name"]);
    $file_ext1=$file_ext[count($file_ext)-1];
    //$file_name = $file_ext[0].$this->session->userdata('user_id').".".$file_ext1;
    $file_name = $file_ext[0].time().".".$file_ext1;
    if($file_ext1 == "jpg"  || $file_ext1 == "jpeg" || $file_ext1 == "png")
    {
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
    }else{
        echo '{"msg":"invalid type"}'; 	    
    }

}

function reviewdetail($id)
{
    $data="";
    if($this->session->userdata('user_id') != "")
    { 
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $data['job'] = $this->job_model->getCvs(array('j_status' =>1,'cv_id' =>$id));
        $data['comments'] = $this->job_model->getJobComments(array('j_status' =>1,'cv_id' =>$id,'com_type' =>"review"));
        $data['relatedjobs'] = $this->job_model->getLatestCvs();
        $data['reviewresponses'] = $this->job_model->getCVReviewResponses(array('cv_id' =>$id));	
        //$data['pagename'] = "job_detail";

        $this->load->view('reviewdetail', $data);
    }else{
        redirect('login');
    }
}
function postCvReview()
{ 
    //print_r($_POST);
    //exit;
    $data="";
    $cat_id = $this->input->post('jobcat_id');
    $cvtitle = $this->input->post('cvtitle');
    $cvfile = $this->input->post('cvreviewfile');
    $cvdescr = $this->input->post('cvdescr');
    //  $j_location = $this->input->post('location');

    //if($this->input->post('actioncall')=="postjobdata"){
    echo $data =  $this->job_model->addCvReview(array('cv_member_id' =>$this->session->userdata('user_id'),'cv_member_cv ' =>$cvfile,'cv_title' =>$cvtitle,'cv_descr' =>$cvdescr,'cv_add_date' =>time()));

    if($data){
            $this->session->set_flashdata('msg','Your CV  successfully post!');
            redirect('cvreview');		
    }    
}
        
function postJobData(){ 
    
    $data="";
    if($_FILES['pic']['name']){
        $config=array();
        $config['upload_path'] ='assets/uploads/jobs/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
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
        }
        else
        {                     
            $data1 = $this->upload->data();            
            $jobimage = $data1['file_name'];
        }

    }else if($this->input->post('lib_file_selected') != ""){
        $jobimage = $this->input->post('lib_file_selected'); 
    }else{
        $jobimage = ""; 
    }

    $cat_id = $this->input->post('jobcat_id');
    //$j_title = $this->input->post('jobtitle');
    $j_title2 = $this->input->post('jobtitle2');
    $j_tags = $this->input->post('jobtags');
    $country_id = $this->input->post('jobcountry');
//    $state = $this->input->post('jobstate');
    $j_location = $this->input->post('jobcity');
    $j_image = $jobimage;
    $j_descr = $this->input->post('jobdescr');
    $j_company = $this->input->post('jobcompany');
    $j_email_apply = $this->input->post('jobemailapply');
    //  $j_location = $this->input->post('location');

    //if($j_title2 != "")
    $j_title = $j_title2;

    //if($this->input->post('actioncall')=="postjobdata"){
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
        'j_addedby' => $this->session->userdata('user_id'),
        'j_status' => 1,
        'j_add_date' =>time());
    echo $data =  $this->job_model->addJob($jobdata_arrg);

    if($data){
        $this->session->set_flashdata('msg','Job Posted Successfully');
        redirect('jobpost');		
        exit();
    }            
}
        
        function postSkills()
	{ 
	//print_r($_POST);
	//exit;
	$data="";
		 $jobtags = $this->input->post('jobtags');
		
		//  $j_location = $this->input->post('location');
	
	//	if($this->input->post('actioncall')=="postjobdata"){
        echo $data =  $this->member_model->updateMemberSkill(array('m_skills' =>$jobtags));
		
		if($data){
			$this->session->set_flashdata('msg','Skills successfully post and will publish after admin approval!');
			redirect('skills');		
		}
		//}
	}
	function downloadcv()
	{
		$filupload = $this->uri->segment(2);
		header('Content-type: application/pdf');
		header("Content-Disposition: attachment; filename=".$filupload);
               echo file_get_contents(base_url()."public-assets/cvreviews/".$filupload);
	}
	function downloadReviewcv()
	{
		$filupload = $this->uri->segment(2);
		header('Content-type: application/pdf');
		header("Content-Disposition: attachment; filename=".$filupload);
               echo file_get_contents(base_url()."public-assets/cvreviewresponse/".$filupload);
	}
	
	function postCv()
	{ 
		$data="";
		$cv = $this->input->post('cvimage');
		if($this->input->post('actioncall')=="postcv"){
        echo $data =  $this->member_model->updateForm(array('member_cv' =>$cv));
		}
	}

	
function jobdetail($id)
{
    $data="";
    //if($this->session->userdata('user_id') == "")
    //	redirect('login');
    //else{	
    $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
    $data['job'] = $this->job_model->getJobs(array('j_status' =>1,'j_id' =>$id));
    $data['jobcomments'] = $this->job_model->getJobComments(array('j_status' =>1,'j_id' =>$id,'com_type' =>"job"));
    //$data['relatedjobs'] = $this->job_model->getRelatedJobs(array('m_status' => 1,'cat_id' =>$data['job']->cat_id));	
    $data['relatedmembers'] = $this->member_model->getRelatedMember(array('m_status' => 1,'cat_id' =>$data['job']->cat_id));	
    $data['pagename'] = "job_detail";

    $this->load->view('jobdetail', $data);
    //}
}			
function professionals()
	{
   $data = "";
   $data['limit'] = 12;
   $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
   $data['categories'] 	 = $this->job_model->getCategories(array('c_staus' => 1));	
   $data['professionals'] = $this->member_model->getMembers(array('m_status' => 1));
   $this->load->view('professionals', $data);
    }
function professionalsajax()
	{
	$data = "";
    $page_id = $this->input->post('page_id');
    $limit = $this->input->post('limit');
	
	  //  $s_location = $this->input->post('s_location');
	$s_catid = $this->input->post('s_catid');
	$s_skills = $this->input->post('s_skills');
	//$data['search']= $this->input->post('s_skills');
	
    $data = array();
    if($page_id!="")
         $offset    = $limit * ($page_id-1);
	
   $total   =  $this->member_model->getTotalMembers(array('cat_id' =>$s_catid,'profession' =>$s_skills,'status' =>1));
   $options =  array('records' => $limit ,
                 'pages'   => $this->pages,
                 'page_no' => $page_id,
                 'total'   => $total );
   $paging      = new paging_front($options);
   $paging_link = $paging->show_paging();
   $data['total_deals']   		= $total;
   $data['limit_selected'] 	= $limit;
   $data['professionals'] = $this->member_model->getMembers(array('cat_id' =>$s_catid,'profession' =>$s_skills,'status' =>1,'offset' =>$offset, 'limit' => $limit));
   $data['paging_link'] = $paging_link;
   $this->load->view('listprofessionals', $data);
	}

    function professionalDetail($id)
    {
        if($this->session->userdata('user_id') == ""){
            redirect('/');
            
        }
        $this->load->model('member_summary_career_model','summary_career_model');
        $member_summary_points = $this->summary_career_model->Search(array('m_id'=>$id));
        
        if(count($member_summary_points)>0){
            $member_summary_points = $member_summary_points[0];
        }else{
            $member_summary_points = array();
        } 
        
        $data="";
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$id));
        $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_status' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $data['professional'] = $this->member_model->getMembers(array('m_status' =>1,'id' =>$id));
        $data['summary_points'] = $member_summary_points;
        $this->load->view('persondetail', $data);
    }
    
    function mycard($id)
    {
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$id));
        $data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_status' => 1,'cat_id' =>$this->session->userdata('cat_id')));	
        $pro_details =   $this->member_model->getMembers(array('m_status' =>1,'id' =>$id));
        $data['pro_details'] = $pro_details;
        $this->load->view('mycard', $data);
    }
    
function searchProfessionals()
	{
   $data = "";
    $s_location = $this->input->post('s_location');
	$s_catid = $this->input->post('s_catid');
	$s_skills = $this->input->post('s_skills');
	$data['search']= $this->input->post('s_skills');
	if($this->input->post('actioncall')=="searchprofessionals"){
        $data['professionals'] =  $this->member_model->getMembers(array('s_location' =>$s_location,'cat_id' =>$s_catid,'profession' =>$s_skills));
  
   $this->load->view('listprofessionals', $data);
	}
    }
public function uploadMemberImage()
{
    $m_id = $this->input->post('m_id');
    $current_file = $this->input->post('current_file');
    
    $file_ext=preg_split("/\./", $_FILES["memberfile"]["name"]);
    
    $file_ext1=$file_ext[count($file_ext)-1];
    $file_name = $file_ext[0].$this->session->userdata('user_id').".".$file_ext1;
    if($file_ext1 == "jpg"  || $file_ext1 == "jpeg" || $file_ext1 == "png")
    {
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
            //echo '{"name":"'.$file_name.'","type":"'.$file_ext1.'","msg":"success"}';
            
            $data['m_avatar'] = $file_name;            
            $return = $this->member_model->Save($data,$m_id);
        }else{
            
        }        
    }else{
        
    }
    
    //echo $this->db->last_query();
    redirect(site_url('profile'));
    exit();
}
    function happen()
    {
	$data = "";
		

	if($this->session->userdata('user_id') != "")
        { 
		$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $this->load->view('happen', $data);
        }
	else
        {
            redirect('login');
        }
    }


function addshout()
{ 

    $data = "";
    if($_FILES['pic']['name']){

        $config=array();
        $config['upload_path'] ='assets/uploads/happens/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('pic')) {
            echo $error =  $this->upload->display_errors();
            exit;
            $this->session->set_flashdata('execption',$error);
            redirect('happen');
        }
        else
        {
            //echo "aaa";
            //	exit;
            $data1 = $this->upload->data();
            $happenimage = $config['upload_path'].$data1['file_name'];
            #------------resize image------------#
            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $config['upload_path'].$data1['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width']     = 150;
            $config['height']   = 150;

            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            #-------------resize image----------#
        }

    }else{
        $happenimage = $this->input->post('pic'); 
    }
    
    $posting_message = $this->input->post('posting_message');

    // $this->session->userdata('admin_login_id')
    echo $data =  $this->member_model->addShout(
            array('sh_image' =>$happenimage,
                'message' =>$posting_message,
                'add_date' =>date("Y-m-d H:i:s"),
                'sh_member_id' =>$this->session->userdata('user_id'),
                'sh_status'=>1)
            );
    $this->session->set_flashdata('msg','Message send successfully.');
    redirect(base_url().'happen');        
    exit();

}
				
function blogs()
	{ 
	$data="";
	$data['categories'] = $this->blog_model->getCategories(array('blogc_status' =>1));
	$data['recentposts'] = $this->blog_model->getRecentPosts(array('blog_status' =>1));
	$data['randomtags'] = $this->blog_model->getRandomTags(array('blog_status' =>1));
	$data['blogs'] = $this->blog_model->getBlogs(array('c_status' =>1));
	$this->load->view('blogs',$data);
	}
	
	function blogcategory($id)
	{ 
	$data="";
	$data['categories'] = $this->blog_model->getCategoryBlogs(array('c_status' =>1,'blog_category' =>$id));
	
	$this->load->view('blogcategory',$data);
	}
	function blogDetail($id)
	{
            $data="";
            $data['categories'] = $this->blog_model->getCategories(array('blogc_status' =>1));
            $data['recentposts'] = $this->blog_model->getRecentPosts(array('blog_status' =>1));
            $data['blogcomments'] = $this->blog_model->getBlogComments(array('blog_id' =>$id,'blogcom_status' =>1));
            $data['blog'] = $this->blog_model->getBlogDetail(array('c_status' =>1,'blog_id' =>$id));
            $data['randomtags'] = $this->blog_model->getRandomTags(array('blog_status' =>1));
            $data['pagename'] = "blog_detail";
            $this->load->view('blogdetail', $data);
	}
function load()
	{
		$data="";
	$this->load->view('load', $data);	
		}	
	
	
	function contact()
        {
        $data = "";
		$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
		$this->load->view('contact', $data);
        }		
			
	
		
		
    function sendContact()
    {

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
        //        $to = "navafizdotcom@gmail.com";	
        $to = "useevs@gmail.com";	
        
        $messageText .= '<html><body>';
        $messageText .= "Dear Navafiz,
                            <br><br>
                        Email: ".$email_from.",
                        <br>
                        Phone: ".$phone.",
                        <br>
                        ". $message."

                        <br>
                        <br>
                          Regards,
                        <br>
                        ".$name."
                        <br><br>

                        ";

    $messageText .= "'</html></body>"; 


    $config = array(
     'protocol'  => 'smtp',
    'smtp_host' => 'mail.navafiz.com',		
    'smtp_port' => 25,
    'smtp_user' => 'register@navafiz.com',
    'smtp_pass' => 'V(fJh()VT68F',
    'mailtype'  => 'html',
    'charset'   => 'iso-8859-1'
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
		
		
		
		
	/*
     function home()
        {
		
		
		$data="";
		$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
	    $this->load->view('home',$data);
       
		}*/
	
function delEmployer($id)
	{
	$je_id = $id;//$this->input->post('je_id');
	//if($this->input->post('actioncall')=="delemployer"){
    	$data =  $this->member_model->removeEmployer(array('je_id' =>$je_id));
		if($data)
			redirect('employer');
		//}
	}
function delEducation($id)
	{
	$me_id = $id;//;$this->input->post('me_id');
	//if($this->input->post('actioncall')=="deleducation"){
    	$data =  $this->member_model->removeEducation(array('me_id' =>$me_id));
		//if($data)
			redirect('education');
		//}
	}
 
	
		
		
        function logout()
	{
            session_start(); 
            $this->session->set_userdata('user_id', "");
            $this->session->set_userdata('login_id', "");
            //$this->session->set_userdata('email', "");
            $user_session_data = array(
                'user_id'   	=> "",
                'login_id'=> "",
                //'email' 		=> "",
            );
            $this->session->unset_userdata($user_session_data);   
            $this->session->sess_destroy();

            redirect(site_url("/"));

    }
   function jobtitles()
   {
      $qry = "select j_title from jb_jobs where j_status=1";
      $rzz = $this->db->query($qry)->result();
      $i=0;
      foreach ($rzz as $rz){
         $i++;
         echo $i." > ";
         echo $rz->j_title."<br /><br />";
      }
   }
  }

/* End of file front.php */
/* Location: ./application/controllers/front.php */