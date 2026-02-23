<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends MY_Controller {
    var $limit  = 50; var $offset = 0; var $pages  = 7; var $config1 = array();
    public $global_array; 
    
    function __construct()
    {
        parent::__construct();
	$this->load->model('member_model');
	$this->load->model('job_model');
        $this->load->model('points_model');
        $this->load->model('members_interview_model');
        $this->load->model('user_recommendation');
        $this->load->model('user_recommendation');
	$this->load->library('paging_front');	
        $this->load->library('pagination');    
        $this->load->model('user_list_model');
        $this->load->model('users_by_list_model');
        
        $this->session_user_id = $this->session->userdata('user_id');

    }
    
    
    public function index(){
    
        LoginCheck(site_url('login'));
        
        $qry = "select *,count(cat_id) as cat_tot_jobs from jb_jobs JOIN jb_categories ON jb_jobs.cat_id = jb_categories.c_id 
                            where c_status = 1 AND j_status = 1 GROUP BY cat_id ORDER BY c_name ASC";
        $cat_list = $this->db->query($qry)->result();   
        
        $data['limit'] = $this->limit;
        $data['jobs'] = $this->job_model->getJobs(array('j_status' =>1));
        $data['cat_list'] = $cat_list;
        $this->load->view('jobs/index', $data);
    }
    
    function getlist()
    {
        LoginCheck(site_url('login'));
        
        $data = array();
        $page_id = $this->input->post('page_id');
        $cat_id = $this->input->post('cat_id');
        $limit = $this->input->post('limit');
        $data = array();
        if($page_id!="")
        $offset    = $limit * ($page_id-1);
        else	
        $offset = 0;

        // $total   =  $this->job_model->getTotalJobs(array('cat_id' =>$cat_id,'status' =>1));
        
        $options =  array('records' => $limit ,
            'pages'   => $this->pages,
            'page_no' => $page_id
                );
        $paging  = new paging_front($options);
        $paging_link     = $paging->show_paging();
        // $data['total_deals']   		= $total;
        $data['limit_selected'] 	= $limit;
        $data['jobs'] = $this->job_model->getJobs(array('cat_id' =>$cat_id,'status' =>1,'offset' =>$offset, 'limit' => $limit));

        $data['paging_link'] = $paging_link;
        $this->load->view('jobs/listjobs', $data);
    }
    
    
    
    function getfeaturedlist()
    {
        LoginCheck(site_url('login'));
        
        $data = array();
        $page_id = $this->input->post('page_id');
        $cat_id = $this->input->post('cat_id');
        $limit = $this->input->post('limit');
        $data = array();
        if($page_id!="")
        $offset    = $limit * ($page_id-1);
        else	
        $offset = 0;

//        $total   =  $this->job_model->getTotalJobs(array('cat_id' =>$cat_id,'status' =>1));
        
        $options =  array('records' => $limit ,
            'pages'   => $this->pages,
            'page_no' => $page_id,
                );
        $paging  = new paging_front($options);
        $paging_link     = $paging->show_paging();
//        $data['total_deals']   		= $total;
        $data['limit_selected'] 	= $limit;
        $data['jobs'] = $this->job_model->getFeaturedJobs(array('cat_id' =>$cat_id,'status' =>1,'offset' =>$offset, 'limit' => 200)); 

        $data['paging_link'] = $paging_link;
        $this->load->view('jobs/listfeaturedjobs', $data);
    }
    
    
    
    function getfeaturedlistnew()
{
    $data['jobs'] = $this->job_model->getFeaturedJobsnew();
    // Instead of loading a view, return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}

    
    function addFeaturedJob($id){
        $this->job_model->AddFeaturedJob($id);
        _setSuccess("Job Featured Successfully");
        redirect(site_url('jobs'));
        exit();
    }
    
    
    function removeFeatured($id){
        $this->job_model->RemoveFeaturedJob($id);
        _setSuccess("Job Unfeatured Successfully");
        redirect(site_url('jobs'));
        exit();
    }
    
    
    
    function jobdetail($id)
    {
        
        
        
        $job = $this->job_model->searchJob($id);
        if(empty($job)){
            _setError("This job does not exist or expired");
            redirect(site_url('login'));
            exit();
        }
        $rel_can = [];
        $list_res = $this->users_by_list_model->Search(array('job_id'=>$id));
        
        if(!empty($list_res)){
            foreach ($list_res as $list_r){
                $list_mem_res = $this->users_by_list_model->SearchListCan(array('list_id'=>$list_r->list_id));
                
                foreach($list_mem_res as $list){
                    if($list->member_id > 0 && $list->job_id == 0){
                        $user  = GetUserName($list->member_id);
                        if(!empty($user)){
                            $user = @$user[0];
                            $rel_can[]  = $user;
                        }

                    }
                }
            }
            
            $arr_related_can = array_map("unserialize", array_unique(array_map("serialize", $rel_can)));
//            $array = array_unique($rel_can);
//            $releted_can = $this->users_by_list_model->Search(array('list_id'=>$list_res[0]->list_id));
//            echo "<pre>"; print_r($arr_related_can);exit();
        } 
      
        $v_data['views'] = $job[0]->views + 1;
        $this->job_model->Save($v_data, $id);
        $shortlist_can = $this->job_model->GetAll_can($id);
        $interview_can = $this->members_interview_model->GetAll_mark_interview_can($id);
//        echo "<pre>";
//        print_r($interview_can);
//        exit();
        $data['interview_can'] = $interview_can;
        $data['shortlisted_can'] = $shortlist_can;        
        $data['job']=$job;
        if(isset($job->j_status) && $job->j_status!=1){
            _setError("Job is Expired");
            redirect(site_url('jobs'));
            exit();
            
        }
        
        $desc_share = strip_tags(substr($job[0]->j_descr,0,300));
        $page_metas = array(
            'title' => $job[0]->j_title,
            'description' =>  $desc_share,
            'og_img' => 'assets/uploads/jobs/'.$job[0]->j_image,
            'og_url' => 'job/'.$job[0]->j_id,
        );
        
        $top_jobs = $this->job_model->get10jobs();
//        "<pre>";
//        print_r($top_jobs);
//        exit();
        
        $user_list = $this->user_list_model->GetAll();
        
        $recommand_list = $this->job_model->recommended_list($id);
//                echo "<pre>";
//        print_r($recommand_list);
//        exit();
        
        $data['user_list'] = $user_list;
        $data['top_jobs'] = $top_jobs;
        $data['recommand_list'] = $recommand_list;        
        $data['page_meta'] = $page_metas;        
        $data['job'] = $job;
        $data['jobcomments'] = $this->job_model->getJobComments(array('j_status' =>1,'j_id' =>$id,'com_type' =>"job"));
        
        if(!empty($rel_can)){
            $data['relatedmembers'] = $arr_related_can;
        }else{
            $data['relatedmembers'] = $this->member_model->getRelatedMember(array('m_status' => 1,'cat_id' =>$data['job'][0]->cat_id));
        }
        
        
        $data['pagename'] = "job_detail";
        $this->load->view('jobs/jobdetail', $data);
        
    }
    
    
    function save_job_list($id) {
        $list_id = $this->input->post('list_id');
        $res = $this->users_by_list_model->Search(array('list_id'=>$list_id,'job_id'=>$id));
        if(empty($res)){
            $data['list_id'] = $list_id;
            $data['job_id'] = $id;
            $this->users_by_list_model->Save($data);
            _setSuccess('List added successfully');
        }else{
            _setError('Already added to this list');
        }
    
        redirect(site_url('job/'.$id));
    }
    
    function jobdetails($id)
    {
        
        
        $shortlist_can = $this->job_model->GetAll_can($id);
        $interview_can = $this->members_interview_model->GetAll_mark_interview_can($id);
//        echo "<pre>";
//        print_r($interview_can);
//        exit();
        $data['interview_can'] = $interview_can;
        $data['shortlisted_can'] = $shortlist_can;
        $job = $this->job_model->searchJob($id);
        $data['job']=$job;
        if(isset($job->j_status) && $job->j_status!=1){
            _setError("Job is Expired");
            redirect(site_url('jobs'));
            exit();
            
        }
        
        $desc_share = strip_tags(substr($job[0]->j_descr,0,300));
        $page_metas = array(
            'title' => $job[0]->j_title,
            'description' =>  $desc_share,
            'og_img' => 'assets/uploads/jobs/'.$job[0]->j_image,
            'og_url' => 'job/'.$job[0]->j_id,
        );
        
        $top_jobs = $this->job_model->get10jobs();
//        "<pre>";
//        print_r($top_jobs);
//        exit();
        
        $data['relatedmembers'] = $this->member_model->getRelatedMember(array('m_status' => 1,'cat_id' =>$data['job'][0]->cat_id));
        
        $recommand_list = $this->job_model->recommended_list($id);
//                echo "<pre>";
//        print_r($recommand_list);
//        exit();
        $data['top_jobs'] = $top_jobs;
        $data['recommand_list'] = $recommand_list;        
        $data['page_meta'] = $page_metas;        
        $data['job'] = $job;
        $data['jobcomments'] = $this->job_model->getJobComments(array('j_status' =>1,'j_id' =>$id,'com_type' =>"job"));
        	
        $data['pagename'] = "job_detail";
        $this->load->view('jobs/jobdetail2', $data);
        
    }
    
    function edit($id){	     
        
        $getjob = $this->job_model->GetById($id);
        $categories = $this->job_model->getCategories(array('c_staus' => 1));            
        $country_qry = "SELECT * FROM jb_country";
        $query = $this->db->query($country_qry);
        $country_result = $query->result();

        $data['categories'] = $categories;
        $data['country_result'] = $country_result;    
        $data['job'] = $getjob;
        $this->load->view('jobs/edit-job',$data);        
    }
    
function updatejob($id) {
    LoginCheck(site_url('login'), current_url());
    
    $config = array();
    $config['upload_path'] = 'assets/uploads/jobs/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['overwrite'] = false;
    $config['max_size'] = 1024;
    $config['remove_spaces'] = true;
    $config['max_filename'] = 10;
    $config['file_ext_tolower'] = true;
    $this->upload->initialize($config);
    
    $jobimage = ''; 
    
    if (!empty($_FILES['pic']['name'])) {
        if ($this->upload->do_upload('pic')) {
            $udata = array('upload_data' => $this->upload->data());
            $jobimage = $udata['upload_data']['file_name'];
            $data['j_image'] = $jobimage;
        } else {
            $errors = $this->upload->display_errors();
            echo "<pre>"; print_r($errors); echo "</pre>";
            exit;
        }
    } else if ($this->input->post('lib_file_selected') != "") {
        $jobimage = $this->input->post('lib_file_selected');
        $data['j_image'] = $jobimage;
    } else {
        $existing_job = $this->job_model->GetById($id); 
        $jobimage = $existing_job->j_image; 
        $data['j_image'] = $jobimage;
    }
    
    $job_id = $id;
    $cat_id = $this->input->post('jobcat_id');
    $j_title2 = $this->input->post('jobtitle2');
    $j_tags = $this->input->post('jobtags');
    $country_id = $this->input->post('jobcountry');
    $state = $this->input->post('jobstate');
    $j_location = $this->input->post('jobcity');
    $j_descr = $this->input->post('jobdescr');
    $j_company = $this->input->post('jobcompany');
    $j_email_apply = $this->input->post('jobemailapply');
    $job_reference_by = $this->input->post('job_reference_by');
    
    $data['job_reference_by'] = $job_reference_by;
    $data['j_id'] = $job_id;
    $data['cat_id'] = $cat_id;
    $data['j_title'] = $j_title2;
    $data['j_tags'] = $j_tags;
    $data['j_country_id'] = $country_id;
    $data['j_state'] = $state;
    $data['j_location'] = $j_location;
    $data['j_descr'] = $j_descr;
    $data['j_company'] = $j_company;
    $data['j_email_apply'] = $j_email_apply;
    $data['j_addedby'] = $this->session->userdata('user_id');
    
    $save_image['pic'] = $data['j_image'];
    $job_id = $this->job_model->Save($data, $id);
    
    if ($save_image['pic'] != "") {
        $this->job_model->saveImage($save_image);
    }
    
    _setSuccess('Updated job Successfully');
    redirect(site_url('job/' . $id));
    exit();
}
    
function addjob()
{

    LoginCheck(site_url('login'));
    
    $categories = $this->job_model->getCategories(array('c_staus' => 1));            
    $country_qry = "SELECT * FROM jb_country";
    $query = $this->db->query($country_qry);
    $country_result = $query->result();

    $data['categories'] = $categories;
    $data['country_result'] = $country_result;

    $this->load->view('jobs/add-job', $data);
    
}
    function savejob(){
              
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
    $j_title2 = $this->input->post('jobtitle2');
    $j_tags = $this->input->post('jobtags');
    $country_id = $this->input->post('jobcountry');
    $j_location = $this->input->post('jobcity');
    $j_image = $jobimage;
    $j_descr = $this->input->post('jobdescr');
    $j_company = $this->input->post('jobcompany');
    $j_email_apply = $this->input->post('jobemailapply');
    $job_reference_by = $this->input->post('job_reference_by');
    

    //if($j_title2 != "")
    $j_title = $j_title2;

    //if($this->input->post('actioncall')=="postjobdata"){
    $jobdata_arrg['cat_id'] = $cat_id;
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
    
    $save_image['pic']=$jobdata_arrg['j_image'];
    $data =  $this->job_model->Save($jobdata_arrg);
   
    if($save_image['pic'] != ""){
        $this->job_model->saveImage($save_image);
    }
    
    

    if($data){

        $user_id = $this->session->userdata('user_id');
        $session_name = $this->session->userdata('name');
        $noti['user_id'] = $this->session_user_id;
        $noti['noti_title'] = $session_name." Posted a new Verified Job.";
        $noti['noti_desc'] = $session_name." Posted a new Verified Job.";
        $noti['noti_type'] = 'job';                  
        $noti['noti_link'] = site_url('jobs/'.$data);
        AddNotification($noti);

        _setSuccess('Job Posted Successfully');
        redirect('jobs');		
        exit();
    }            

    }
    
    function delete($id){
//        echo "hello";
//        exit();
        $this->job_model->delForm(array('j_id' =>$id));
        _setSuccess("Job Deleted Successfully");
        redirect(site_url('jobs'));
        exit();
    }
    
    
    function recomm($id){
        $data['job_id'] = $id;
        $this->load->view('jobs/shortlist_job',$data);
    }
    
   public function userList(){
    // POST data
    $postData = $this->input->post();

    // Get data
    $data = $this->job_model->getUsers($postData);

    echo json_encode($data);
  }
  
  
  
  
  function RecommendCanForJob($job_id){
      LoginCheck();
        
    $user_id = $this->get_post('m_id');
    

    $getexist  = $this->user_recommendation->Search(array('user_id'=>$user_id,'job_id'=>  $job_id,'type'=>'for_job'));        

    if(empty($getexist)){

        $rec['user_id'] = $user_id;
        $rec['recommend_by'] = $this->session_user_id;
        $rec['job_id'] = $job_id;
        $rec['type'] = 'for_job';            
        $rec['added_on'] = datenow();
        $this->user_recommendation->Save($rec);
        _setSuccess('Successfully Recommended Candidate');
    }else{
        _setError('Member Already Recommended');
    }
    
    redirect(site_url('job/'.$job_id));
    exit();
  }
  
  function delete_recomm_can($user_id,$job_id) {
      if(isset($user_id)){
         if($this->user_recommendation->Delete_rec_can($user_id,$job_id)){
          
         _setSuccess("Interviewed Member Deleted Successfully");
             redirect(site_url('job/'.$job_id));
             exit();   
         }else{
             _setError("Error Deleting Interviewed Member");
            redirect(site_url('job/'.$job_id));
            exit();
         }
     }
  }
  
  function shortlisted_candidates($job_id){
      $short_by = $this->session_user_id;
        
        $data['job_id'] = $job_id;
        $this->form_validation->set_rules('m_id', 'Id', 'required');
        if($this->form_validation->run() == true){
            $user_id = $this->input->post('m_id');
            $data['user_id'] = $user_id;
            $updated_by = $short_by;
             
             $res = $this->job_model->search_shortlist_can($data);
                if(empty($res)){
//                $inc_p['user_id']=$user_id;
//                $inc_p['points_type']='Shortlist';
//                $inc_p['job_id']= $job_id;
//                $inc_p['points_for']=$short_by;
//                $inc_p['user_points']=Shortlist;
//                AddUserPoint($inc_p);

                  $data['updated_by'] = $updated_by;
                  $this->job_model->Save_shortlisted_member($data);
                  _setSuccess("Member Shortlisted Successfully");
                 redirect(site_url('job/'.$job_id));
                 exit();
      
            }else{
                _setError("Member Already Shortlisted");
                redirect(site_url('job/'.$job_id));
                exit();
            }
            
        
        }else{
            $this->load->view('jobs/shortlist',$data);
        }
     
      
  }
  
    function shortlist_from_profile($user_id){
      $short_by = $this->session_user_id;
      
      $job_id = $this->input->post('job_shortlist_id');
      $data['job_id'] = $job_id;
      $data['user_id'] = $user_id;
      $updated_by = $short_by;
      
      $res = $this->job_model->search_shortlist_can($data);
      if(empty($res)){
//            $inc_p['user_id']=$user_id;
//            $inc_p['points_type']='Shortlist';
//            $inc_p['job_id']= $job_id;
//            $inc_p['points_for']=$short_by;
//            $inc_p['user_points']=Shortlist;
//            AddUserPoint($inc_p);
          
          $data['updated_by'] = $updated_by;
          $this->job_model->Save_shortlisted_member($data);
          _setSuccess("Member Shortlisted Successfully");
          redirect(site_url('job/'.$job_id));
          exit();
      
      }else{
          _setError("Member Already Shortlisted");
          redirect(site_url('job/'.$job_id));
          exit();
      }
 }

function mark_interview_can($job_id){
    
    $user_id = $this->input->post('short_can_id');
    $remarks = $this->input->post('short_can_remarks');
    $status = $this->input->post('status');
    
    $s_data['user_id'] = $user_id;
    $s_data['job_id'] = $job_id;
    $updated_by = $this->session_user_id;
    
    $get_short_can = $this->job_model->search_shortlist_can($s_data); 

    if(!empty($get_short_can)){
        $s_data['remarks'] = $remarks;
        $s_data['status'] = $status;
        
        
        
        if($status == 'approve'){
            
            $s_data['updated_by'] = $this->session_user_id; 
            
            $this->job_model->Save_shortlisted_member($s_data,$get_short_can[0]->id);
            
            $res = $this->members_interview_model->Search(array('user_id'=>$user_id,'job_id'=>$job_id));
            if(empty($res)){
                $m_data['updated_by'] = $updated_by;
                $m_data['user_id'] = $user_id;
                $m_data['job_id'] = $job_id;
                
                $this->members_interview_model->Save($m_data);
                
                $getrecomander = $this->user_recommendation->Search(array('user_id'=>$user_id,'job_id'=>$job_id));
                if(isset($getrecomander[0]->recommend_by)){
                    $p_data = $this->points_model->Search(array('user_id'=>$user_id,'job_id'=>  $job_id,'points_type'=>'Shortlist','points_for'=>$getrecomander[0]->recommend_by));
                    if(empty($p_data)){
                        $inc_p['user_id']=$user_id;
                        $inc_p['points_type']='Shortlist';
                        $inc_p['job_id']= $job_id;
                        $inc_p['points_for']=$getrecomander[0]->recommend_by;
                        $inc_p['user_points']=Shortlist;
                        $inc_p['updated_by']=$updated_by;
                        AddUserPoint($inc_p);
                    }
                }else{
                   $this->db->select('updated_by');
                   $query = $this->db->get_where('jb_job_shortlist_members',array('user_id'=>$user_id,'job_id'=>$job_id));
                   $getshortlister = $query->row(); 
                   
                   if(isset($getshortlister->updated_by) && $getshortlister->updated_by>0){
                       $inc_p['user_id']=$user_id;
                       $inc_p['points_type']='MarkedInterviewed';
                       $inc_p['job_id']= $job_id;
                       $inc_p['points_for']=$getshortlister->updated_by;
                       $inc_p['user_points']=MarkedInterviewed;
                       $inc_p['updated_by']=$updated_by;
                       AddUserPoint($inc_p);
                   }            
               }

               _setSuccess("Marked Interview Successfully");

            }else{
                 _setError("Already marked this candidate for interview");
             }
        }else{
            $s_data['rejected_by'] = $this->session_user_id; 
            
            $this->job_model->Save_shortlisted_member($s_data,$get_short_can[0]->id);
        }
        
         redirect('job/'.$job_id);


        }
    
    
    
     
     
 }



 
    
  function shortlist_recommended_can($job_id){
      $updated_by = $this->session_user_id;
      $user_id = $this->input->post('rec_can_id');
      if(isset($job_id) && isset($user_id)){
        $update = $updated_by;
        $s_data['user_id'] = $user_id;
        $s_data['job_id'] = $job_id;
        
        
        $r_data['updated_by'] = $this->session_user_id;
//       print_r($s_data);exit();

        $res = $this->job_model->search_shortlist_can($s_data);        
        if(empty($res)){
            $s_data['updated_by'] = $updated_by;
            $remarks = $this->input->post('rec_can_remarks');
            $status = $this->input->post('status');
//            echo $status;exit();
            $getrecomander = $this->user_recommendation->Search(array('user_id'=>$user_id,'job_id'=>$job_id,'type'=>'for_job'));
//            echo "<pre>"; print_r($getrecomander);exit();
            
            if(isset($getrecomander[0]->recommend_by)){
                $r_data['user_id'] = $user_id;
                $r_data['job_id'] = $job_id;
                $r_data['remarks'] = $remarks;
                $r_data['status'] = $status;
                
//                print_r($r_data);exit();
                $this->user_recommendation->Save($r_data,$getrecomander[0]->rec_id);
                
                if($status == 'approve'){
//                    
                    $s_data['updated_by'] = $updated_by;
                    if($this->job_model->Save_shortlisted_member($s_data)){
                        
                       $p_data = $this->points_model->Search(array('user_id'=>$user_id,'job_id'=>  $job_id,'points_type'=>'Recommendation','points_for'=>$getrecomander[0]->recommend_by));
//                       print_r($p_data);echo "here";exit();
                        if(empty($p_data)){
                            $inc_p['user_id']=$user_id;
                            $inc_p['points_type']='Recommendation';
                            $inc_p['job_id']= $job_id;
                            $inc_p['points_for']=$getrecomander[0]->recommend_by;
                            $inc_p['user_points']=Recommendation;
                            $inc_p['updated_by']=$updated_by;
                            AddUserPoint($inc_p);
                            _setSuccess("Member Shortlisted Successfully");
                        } 
                    }
                }else{
                     _setError("Member Rejected Successfully");
                }
                
                
            }

     
      redirect(site_url('job/'.$job_id));
      exit();
      
      }else{
          _setError("Member Already Shortlisted");
          redirect(site_url('job/'.$job_id));
          exit();
      }
    }
  }
  
  
  function delete_shortlist_can($user_id,$job_id){
     if(isset($user_id)){
         if($this->job_model->Delete_can($user_id,$job_id)){
          
         _setSuccess("Shortlisted Member Deleted Successfully");
             redirect(site_url('job/'.$job_id));
             exit();   
         }else{
             _setError("Error Deleting Shortlisting Member");
            redirect(site_url('job/'.$job_id));
            exit();
         }
     }
 }
 
 
 
 
 function delete_interviewed_can($user_id,$job_id){
          if(isset($user_id)){
         if($this->members_interview_model->Delete_interview_can($user_id,$job_id)){
          
         _setSuccess("Interviewed Member Deleted Successfully");
             redirect(site_url('job/'.$job_id));
             exit();   
         }else{
             _setError("Error Deleting Interviewed Member");
            redirect(site_url('job/'.$job_id));
            exit();
         }
     }
 }
 
 
 
 function quick_jobs(){
     $data['quick_jobs'] = $this->job_model->fetchQuickJobs(array('status'=>1));
     $this->load->view('jobs/list_quick_job',$data);
 }
 function editApplicant(){
     $id = $this->input->post('applicant_id');
     $job_id = $this->input->post('job_id');
     $whatsapp = $this->input->post('whatsapp_number');
     $email = $this->input->post('email');
     $name = $this->input->post('name');
     
     if(isset($_FILES['app_resume']['name'])){

            $file_ext=preg_split("/\./", $_FILES["app_resume"]["name"]);

            $file_ext1=$file_ext[count($file_ext)-1];

            $file_name = preg_replace('/\s/', '-', $name)."_".$job_id.".".$file_ext1;

        //    print_r($file_name);

        //    echo $file_name;

        //    exit();

            $config = array('upload_path'=> 'public-assets/cvreviews/', 'allowed_types' => 'doc|docx|pdf','file_name'=>$file_name,'overwrite'=>TRUE);

            $this->load->library('upload', $config);                    

            $this->upload->initialize($config);



            if($this->upload->do_upload('app_resume')){

                    $udata = array('upload_data' => $this->upload->data());                        

                    $resume_file = $udata['upload_data']['file_name'];
//                    print_r($resume_file);
//                    exit();
                    $data['resume'] = $resume_file;
                }

            }
            
      $data['name'] = $name;
      $data['whatsapp_number'] = $whatsapp;
      $data['email'] = $email;
      echo "<pre>";
//      print_r($data);
//      exit();
      if($this->job_model->applyQuickJob($data,$id)){
          _setSuccess('Successfully updated applicant info');
      }else{
          _setError('Error updating aplicant info');
      }
      redirect(site_url('mentors/quick_job_applicants/'.$job_id));
      exit();
      
     
     
 }
function save_applicant_remarks(){
   $id = $this->input->post('applicant_id');
   $remarks = $this->input->post('remarks');
   $data['remarks'] = $remarks;
   if(!empty($id) && intval($id) > 0){
       if($this->job_model->SaveApplicantRemarks($data,$id)){
           echo "Successfully added remarks";
       }else{
           echo "Error adding remarks";
       }
   }else{
       echo "Invalid applicant id";
   }
}
 
 
 function appyQuickJob(){
     
     
     $data['job_id'] = $this->input->post('job_id');
     $data['name'] = $this->input->post('name');
     $email = $this->input->post('email');
     if(!empty($email)){
        $data['email'] = $email;
     }
      
     $data['job_id'] = $this->input->post('job_id');
     $data['whatsapp_number'] = $this->input->post('whatsapp_number');

     $res = $this->job_model->searchQuickJob(array('name'=>$data['name'],'whatsapp_number'=>$data['whatsapp_number'],'job_id'=>$data['job_id']));

     if(empty($res)){
         
         if(isset($_FILES['resume_file']['name'])){
          
            $file_ext=preg_split("/\./", $_FILES["resume_file"]["name"]);

            $file_ext1=$file_ext[count($file_ext)-1];

            $file_name = preg_replace('/\s/', '-', $data['name'])."_".$data['job_id'].".".$file_ext1;

        //    print_r($file_name);

        //    echo $file_name;

        //    exit();

            $config = array('upload_path'=> 'public-assets/cvreviews/', 'allowed_types' => 'doc|docx|pdf','file_name'=>$file_name,'overwrite'=>TRUE);

            $this->load->library('upload', $config);                    

            $this->upload->initialize($config);



            if($this->upload->do_upload('resume_file')){

                    $udata = array('upload_data' => $this->upload->data());                        

                    $resume_file = $udata['upload_data']['file_name'];
//                    print_r($resume_file);
//                    exit();
                    $data['resume'] = $resume_file;
                }

            }
//         echo "<pre>";
//         print_r($data);
//         exit();
         
        if($this->job_model->applyQuickJob($data)){
            _setSuccess('Successfully applied to this job');
            redirect(site_url('jobs/quick_jobs'));
            exit();
        }else{
            _setError('Error applying to this job');
            redirect(site_url('jobs/quick_jobs'));
            exit();
        }  
     }else{
         _setError('This applicant already applied to this job');
         redirect(site_url('jobs/quick_jobs'));
         exit();
     }
     
     
     
 }
 
 
    
    function closejob(){
        
        $closed_remarks = $this->get_post('closed_remarks');       
        $job_id = $this->get_post('job_id');        
        
        $data['closed_remarks'] = $closed_remarks;
        $data['closed_by'] = $this->session_user_id;
        $data['j_status'] = 2;
        $this->job_model->Save($data,$job_id);
        
        _setSuccess("Job Closed Successfully");
        redirect(site_url('job/'.$job_id));
        exit();
        
    }
    
    
    function getFeaturedJobsNew() {
        $featuredJobs = $this->job_model->getFeaturedJobsNew();
        // echo $featuredJobs;
        return $this->response->setJSON($featuredJobs);
    }
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */