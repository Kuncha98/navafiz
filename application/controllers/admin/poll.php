<?php
class Poll extends MY_Controller {
  var $pages= 5;
  function __construct()
        {
        parent::__construct();
        $this->load->model('admin_job_model');
        $this->load->model('admin_slider_model');
		$this->load->model('member_model');
		$this->load->library('paging_front');
	
	}

			

function result()
	{

	@$where = "m_status = 1";
        $limit = 20;
        $total_rows = 2;
        @$start = $this->uri->segment(4);

        $data['pp'] = $this->db->select('m_name,count(*) as total_count')
        ->from('jb_member')
      	->join('jb_poll_answers', 'jb_member.m_id = jb_poll_answers.pr_refer_user_id ')
        ->where($where)
	->limit($limit,$start)
        ->get()
	->result_array(); 
        $this->session->set_userdata('current_url',current_url());
      
        $data['page_title'] = 'Poll';
        $data['content_view'] = 'admin/polls/sb-forms';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('admin/polls/forms',$data);
    
    }
	
function addjobform()
        {
        $data = "";
		$data['countries'] 	 	 = $this->member_model->getCountries();
		$data['categories'] = $this->admin_job_model->getCategories(array('c_staus' => 1));	
        $this->load->view('admin/jobs/showaddform',$data);
        }
public  function savejob()
        {
       
		 
	
	
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
		     $error =  $this->upload->display_errors();
			//exit;
			 
            $this->session->set_flashdata('execption',$error);
            redirect('jobpddddddddddddddddddddddddost');
        }
        else
        {
			//echo "aaa";
		//	exit;
         $data1 = $this->upload->data();
         //$happenimage = $config['upload_path'].$data1['file_name'];
		 $jobimage = $data1['file_name'];
        #------------resize image------------#
       /*   $this->load->library('image_lib');
          $config['image_library'] = 'gd2';
          //$config['source_image'] = $config['upload_path'].$data1['file_name'];
		  $config['source_image'] = $jobimage;
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['width']     = 150;
          $config['height']   = 150;

          $this->image_lib->clear();
          $this->image_lib->initialize($config);
          $this->image_lib->resize();*/
          #-------------resize image----------#
        }
    
		}
		else{
       $jobimage = ""; 
    }
	
		 $cat_id = $this->input->post('jobcat_id');
		 $j_title = $this->input->post('jobtitle');
		  $j_slug =  clean(strtolower($this->input->post('jobtitle')));
		 $jobtitle2 = $this->input->post('jobtitle2');
		 $j_tags = "";//$this->input->post('jobtags');
		  $country_id = $this->input->post('jobcountry');
		   $state = $this->input->post('jobstate');
		  $j_location = $this->input->post('jobcity');
		 $j_image = $jobimage;
		 $j_descr = $this->input->post('jobdescr');
		 $j_company = $this->input->post('jobcompany');
		 $j_email_apply = $this->input->post('jobemailapply');
	 	//  $j_location = $this->input->post('location');
	
	if($jobtitle2 != "")
	$j_title = $jobtitle2;
	
	//	if($this->input->post('actioncall')=="postjobdata"){
        $data =  $this->admin_job_model->addForm(array('cat_id' =>$cat_id,'j_title' =>$j_title,'j_tags' =>$j_tags,'j_country_id' =>$country_id,'j_state' =>$state,'j_location' =>$j_location,'j_image' =>$j_image, 'j_descr' =>$j_descr, 'j_company' =>$j_company, 'j_email_apply' =>$j_email_apply, 'j_addedby' => $this->session->userdata('user_id'),'j_add_date' =>time()));
		
		if($data){
			$this->session->set_flashdata('msg','Job successfully post and will publish after admin approval!');
			redirect('admin/jobs');		
		}
		//}
	       
		}
function editjob($id)
        {
        $data = "";
		//echo $this->session->userdata('current_url');
		//exit;
		$data['form'] = $this->admin_job_model->getForms(array('j_id' => $id));
		$data['countries'] 	 	 = $this->member_model->getCountries();
		$data['categories'] = $this->admin_job_model->getCategories(array('c_staus' => 1));	
        $this->load->view('admin/jobs/showeditform',$data);
        }
function updatejob()
        {
			
        $data = "";
		
	//exit;
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
		    $error =  $this->upload->display_errors();
			//exit;
			 
            $this->session->set_flashdata('execption',$error);
            redirect('admin/jobs/editjob');
        }
        else
        {
			//echo "aaa";
		//	exit;
         $data1 = $this->upload->data();
         $jobimage = $data1['file_name'];//$config['upload_path'].$data1['file_name'];
        #------------resize image------------#
      /*    $this->load->library('image_lib');
          $config['image_library'] = 'gd2';
          $config['source_image'] = $config['upload_path'].$data1['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['width']     = 150;
          $config['height']   = 150;*/
		  
		  
		  
		  

         // $this->image_lib->clear();
         // $this->image_lib->initialize($config);
        /*  $this->image_lib->resize()*/
          #-------------resize image----------#
        }
    
		}
		/*else{
       $jobimage = $this->input->post('pic'); 
    }*/
		
		$id = $this->input->post('job_id');
		 $cat_id = $this->input->post('jobcat_id');
		 $j_title = $this->input->post('jobtitle');
		 
		  $jobtitle2 = $this->input->post('jobtitle2');
		 
		 
		 
		 $j_slug =  $this->input->post('jobslug');
		// $j_slug =  clean(strtolower($this->input->post('jobtitle')));
		//exit;
		// $j_title2 = $this->input->post('jobtitle2');
		 $j_tags = "";//$this->input->post('jobtags');
		  $country_id = $this->input->post('jobcountry');
		   $state = $this->input->post('jobstate');
		  $j_location = $this->input->post('jobcity');
		 $j_image = $jobimage;
		 $j_descr = $this->input->post('jobdescr');
		 $j_company = $this->input->post('jobcompany');
		 $j_email_apply = $this->input->post('jobemailapply');
		 
		if($j_title == "")
	$j_title = $jobtitle2;
		 
		 
			// $this->session->userdata('admin_login_id')
   $this->admin_job_model->updateJob(array('id' =>$id,'cat_id' =>$cat_id,'j_title' =>$j_title,'j_slug' =>$j_slug,'j_tags' =>$j_tags,'country_id' =>$country_id,'j_state' =>$state,'j_location' =>$j_location,'j_image' =>$j_image, 'j_descr' =>$j_descr, 'j_company' =>$j_company, 'j_email_apply' =>$j_email_apply, 'j_addedby' => $this->session->userdata('user_id'),'j_add_date' =>time()));
       
	 //  $this->session->set_userdata('current_url',current_url());
	     redirect($this->session->userdata('current_url'));        
		 //redirect(base_url().'admin/jobs');        
		
			}				
	public function jobunpublishd($id){
    $this->db->set('j_status',0)->where('j_id',$id)->update('jb_jobs');
    $this->session->set_flashdata('message', "Unpublish successfully.");
  
  
    redirect($this->session->userdata('current_url'));
}

public function jobpublishd($id){
		//echo "aaaaaaaaaaaaaaaaaaaaa";
	//exit;
    $this->db->set('j_status',1)->where('j_id',$id)->update('jb_jobs');
    $this->session->set_flashdata('message', "Publish successfully.");
	redirect($this->session->userdata('current_url'));   
    //redirect("admin/jobs");
}
	
 public function deletejob($id) {
	 //echo "dd".$id;
	 //exit;
        $this->db->where('j_id', $id);
        $this->db->delete($this->db->dbprefix('jobs'));
		  redirect($this->session->userdata('current_url'));     
		//redirect('admin/jobs');
        //return true;
    }
			
function categories()
	{
		
		
    $data = "";
    $data['forms'] = $this->admin_job_model->getCategories(array('status' => 1));
	$this->load->view('admin/categories/forms',$data);
    }
	
function ajaxDataManagementCategories()
	{
	
    $data = "";
	if($this->input->post('actioncall')=="showaddform")
		{
		//$data['instructors'] = $this->admin_blog_model->getForms(array('status' => 1,'table' => 'instructors'));	
		$this->load->view('admin/categories/showaddform',$data);
		}
	elseif($this->input->post('actioncall')=="addform")
		{
		 $options = array(
		 			
			
			'c_name' => mysql_real_escape_string(trim($this->input->post('name'))),
			'c_add_date' => time()
			
			);	
		echo $this->admin_job_model->addCategory($options);
	   }
	   
	elseif ($this->input->post('actioncall') == "listforms")
		{
	  	$data['forms'] = $this->admin_job_model->getCategories();
	  	$this->load->view('admin/categories/listforms', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "showeditform")
	  	{
	  	$id = $this->input->post('id');
		
	  	$data['form'] = $this->admin_job_model->getCategories(array('c_id' => $id));
	  	$this->load->view('admin/categories/showeditform', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "editform")
	  	{
			
  		$options = array(
		  'c_id' => $this->input->post('id'),
		  'name' => mysql_real_escape_string(trim($this->input->post('name')))
		 
  		  );
	  	echo $page_id = $this->admin_job_model->editCategory($options);
  	   }
	elseif($this->input->post('actioncall')=="changeStatus")
		  {
		  $c_id = $this->input->post('id');
		  $status_val = $this->input->post('status_val');
		  $status   =  $this->admin_job_model->updateCategoryStatus($c_id, $status_val);
		  }	
	elseif($this->input->post('actioncall')=="delform")
		 {
		 $id = $this->input->post('id');   
		// $image_name = $this->admin_blog_model->getImageName($id);
		
		  $course        =  $this->admin_job_model->delCategory(array('c_id' => $id));           
		}		
		
    		
	}
/*public function adminUploadJobImage()
		{
		$rand_str =  time();
        $config['upload_path']      = base_url().'assets/uploads/jobs/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '10000';
        $config['file_name']        = $rand_str;
        $this->load->library('upload', $config);
	
		$data = array('upload_data' => $this->upload->data());
		$file = $_FILES['jobfile'];
		$file_size = round($file['size']/1024);
       
	   if ( ! $this->upload->do_upload('jobfile'))
	   	  {
			 
            $error = array('error' => $this->upload->display_errors());
	  print_r($error);   	
			 echo '{"msg":"invalid"}';
		  }
	  else if($file_size > $config['max_size'])
	  	  {
		  echo '{"msg":"error"}';
		  }
	  else
	  	 {
		  $data = array('upload_data' => $this->upload->data());
		  $medium_thumb_image_path="./assets/uploads/jobs/small_thumbs/".$data['upload_data']['file_name'];
		  copy("./assets/uploads/jobs/".$data['upload_data']['file_name'],$medium_thumb_image_path);
		  resizeImg($medium_thumb_image_path, 100, 100);		
		  $options = array('');
	 	  echo '{"name":"'.$data['upload_data']['file_name'].'","type":"'.$file['type'].'","size":"'.$file['size'].'"}';
	    }
 	}*/
	
function ajaxDataManagementJobs()
	{
    $data = "";
	if($this->input->post('actioncall')=="showaddform")
		{
		
		$this->load->view('admin/jobs/showaddform',$data);
		}
	elseif($this->input->post('actioncall')=="addform")
		{
			
		 $options = array(
		 	'j_title' => mysql_real_escape_string(trim($this->input->post('title'))),
			'j_image' => mysql_real_escape_string(trim($this->input->post('jobimage'))),
			'cat_id' => mysql_real_escape_string(trim($this->input->post('cat_id'))),
			'j_descr' => $this->input->post('descr'),
			'j_add_date' => time()
			);	
		echo $this->admin_job_model->addForm($options);
	   }
	   
	elseif ($this->input->post('actioncall') == "listforms")
		{
			
	  /*	$data['forms'] = $this->admin_job_model->getForms();
	  	$this->load->view('admin/jobs/listforms', $data);*/
		
			
            $offset=0;
			 			
				
				$data = "";
				
			$page_id = $this->input->post('page_id');
			$limit = $this->input->post('limit');
			
			
			$data = array();
			if($page_id!="")
			   $offset    = $limit * ($page_id-1);
			 else
			 $offset    = 0;  
			echo $total   =  $this->admin_job_model->getTotalForms();
			//exit;
			$options =  array('records' => $limit ,
						'pages'   => $this->pages,
						'page_no' => $page_id,
						'total'   => $total );
			 $paging          = new paging_front($options);
			 $paging_link     = $paging->show_paging();
			 $data['total_variables'] 	= $total;
			 $data['limit_selected'] 	= $limit;
         //	$data['languages']   =  $this->admin_language_model->getLanguages();	
             $data['forms'] = $this->admin_job_model->getForms(array('offset' =>$offset, 'limit' => $limit));
		     //$data['appointments'] = $this->admin_tasbeeh_model->getTasbeehReqs();
              
             $data['paging_link'] = $paging_link;
            
$this->load->view('admin/jobs/listforms',$data); 
                  
		
	  	}
  	elseif ($this->input->post('actioncall') == "showeditform")
	  	{
	  	$id = $this->input->post('id');
		$data['categories'] = $this->admin_job_model->getCategories(array('c_staus' => 1));	
	  	$data['form'] = $this->admin_job_model->getForms(array('j_id' => $id));
	  	$this->load->view('admin/jobs/showeditform', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "editform")
	  	{
  		$options = array(
		  'j_id' => $this->input->post('id'),
		 'title' => mysql_real_escape_string(trim($this->input->post('title'))),
		 'j_image' => mysql_real_escape_string(trim($this->input->post('jobimage'))),
			'cat_id' => mysql_real_escape_string(trim($this->input->post('cat_id'))),
			'descr' => $this->input->post('descr'),
  		  );
	  	echo $page_id = $this->admin_job_model->editForm($options);
  	   }
	elseif($this->input->post('actioncall')=="changeStatus")
		  {
		  $j_id = $this->input->post('j_id');
		  $status_val = $this->input->post('status_val');
		  $status   =  $this->admin_job_model->updateFormStatus($j_id, $status_val);
		  }	
	elseif($this->input->post('actioncall')=="delform")
		 {
		 $id = $this->input->post('id');   
		 $jobs        =  $this->admin_job_model->delForm(array('j_id' => $id));           
		}		
		
    }




function jobtitles()
        {
        $data = "";
        $this->load->view('admin/jobs/jobtitleform',$data);
        }

function savejobtitle()
        {
        $data = "";
		 $title = $this->input->post('title');
         $this->admin_job_model->saveJobTitle(array('jt_title' => $title,'jt_add_date' => date("y-m-d")));
         redirect(base_url().'admin/jobs/listjobtitles');        
		}
		
function listjobtitles()
        {
        $data = "";
		   
	  $data['forms'] = $this->admin_job_model->getJobTitles();
      $this->load->view('admin/jobs/listjobtitles',$data);
        }	
 public function deletejobtitle($id) {
	 //echo "dd".$id;
	 //exit;
        $this->db->where('jt_id', $id);
        $this->db->delete($this->db->dbprefix('jobtitle'));
		redirect('admin/jobs/listjobtitles');
        //return true;
    }
public function unpublishd($id){
    $this->db->set('jt_status',0)->where('jt_id',$id)->update('jb_jobtitle');
    $this->session->set_flashdata('message', "Unpublish successfully.");
    redirect("admin/jobs/listjobtitles");
}

public function publishd($id){
	//	echo "aaaaaaaaaaaaaaaaaaaaa";
	//exit;projects
    $this->db->set('jt_status',1)->where('jt_id',$id)->update('jb_jobtitle');
    $this->session->set_flashdata('message', "Publish successfully.");
    redirect("admin/jobs/listjobtitles");
}
				
function settingdata()
        {
   
	   $data['message'] = "Setting updated successfully";
	    	$config = $_REQUEST['delAnn2'];
	$size = sizeof($config);
	$x=0;
	while($x<$size){
	 $query="UPDATE ka_config SET value='".sql_safe($config[$x])."' where id='".($x+1)."'";
	  mysql_query($query); echo mysql_error();
	  $x++;
	} // end of while
	
	$this->load->view('admin/settings',$data);
        }


function jobseekerstips()
        {
        $data = "";
		   
	  $data['forms'] = $this->admin_job_model->getJobTips();
      $this->load->view('admin/jobs/listjobseekerstips',$data);
        }




function addjobseekerform()
        {
        $data = "";
        $this->load->view('admin/jobs/jobseekerform',$data);
        }


function savejobtips()
        {
        $data = "";
		 $title = $this->input->post('title');
		 $descr = $this->input->post('descr');
         $this->admin_job_model->saveJobTips(array('st_title' => $title,'st_descr' => $descr,'st_add_date' => date("y-m-d")));
         redirect(base_url().'admin/jobs/jobseekerstips');        
		}

function editjobtips($id)
        {
			
        $data = "";
		 $data['form'] = $this->admin_job_model->getJobTips(array('id' => $id));
        $this->load->view('admin/jobs/editjobseekerform',$data);
        }
		
 public function deletejobseeker($id) {
	 //echo "dd".$id;
	 //exit;
        $this->db->where('st_id', $id);
        $this->db->delete($this->db->dbprefix('jobseekertips'));
		redirect('admin/jobs/jobseekerstips');
        //return true;
    }





















 
   /*    function _check_login($login_id){

        if($this->input->post('login_id')){
            $user = $this->admin_model->getUsers(array($login_id,'password' => md5($this->input->post('password'))));    
            if($user) return true;
        }
        $this->form_validation->set_message('_check_login','Your username / password combination is invalid');
        return false;
    }*/

}