<?php
#[\AllowDynamicProperties]
class Company_Model extends CI_Model {
    /** Utility Methods **/
   function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
  function saveAbuseJob($options = array()){
	  	$this->db->insert($this->db->dbprefix('abousejobs'),$options);
		//echo $this->db->last_query();
		//exit;
		return $id = $this->db->insert_id();
	  
  }
   function saveCompanies($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('companies'),$options);
		$id = $this->db->insert_id();
		return $id;
	
		}
  function addJob($options = array())
	 	{
			//print_r($options);
		$this->db->insert($this->db->dbprefix('jobs'),$options);
		//echo $this->db->last_query();
		//exit;
		$id = $this->db->insert_id();
		//return $id;
		$to          = 'navafiz-subscribe@yahoogroups.com';
        $subject     = "New Job oppurtunities ";
			$messageText .= '<html><body>';
        $messageText .= "Dear members,
      	<br><br><br>
        New job is post i.e ".$options['j_title']."!
      	<br><br>
      	Visit the navafiz.com for the detail 
      	<br>
      	Regards,
      	<br><br>
      	The Navafiz Team
      	<br><br>
      	*This message was sent by an automated mail server. Please do not reply.
      	<br>";

     $messageText .= "'</html></body>"; 
	   $config = array(
         'protocol'  => 'smtp',
        'smtp_host' => 'host256.hostmonster.com',		
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
      $this->email->from('register@navafiz.com');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($messageText);

      if($this->email->send()) {
		  $id = $this->db->insert_id();
		return $id;
     
          return 1;
      } else {
        show_error($this->email->print_debugger());
        return 0;
      }

	}
	
  function saveComments($options = array()){
  
		$this->db->insert($this->db->dbprefix('job_comments'),$options);
		$id = $this->db->insert_id();
		return $id;
		
    
      
     

	
  }
  function addCvReview($options = array()){
  
			//print_r($options);
		$this->db->insert($this->db->dbprefix('cvreview'),$options);
		//echo $this->db->last_query();
		//exit;
		$id = $this->db->insert_id();
		return $id;

	
  }
  
    function getCompanies($options = array()){

        if(!empty($options['limit'])){
            $this->db->limit($options['limit']);                 
        } else{
            $this->db->limit(25);
        } 
        
        // print_r($options);
        //if(isset($options['com_type']))
        $this->db->where('co_status', 1);  
        if(!empty($options['company_keyword'])){
            $key= $options['company_keyword'];
            $this->db->like('co_name',$key , 'after');
        }  
        if(!empty($options['category_id'])){
            $cat_id = $options['category_id'];
            $this->db->where('co_cat_id',$cat_id);            
        }   
        $this->db->select('*, jb_companies.added_on as company_added_on');
        $this->db->from($this->db->dbprefix('companies'));
        $this->db->join('jb_categories', 'jb_companies.co_cat_id = jb_categories.c_id');
        $this->db->order_by('jb_companies.added_on desc, jb_companies.updated_on desc');        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {                          
            return $query->result();
        }else{
            return 'empty';
        }            
    }
  function getTips($options = array()){
	  
	//print_r($options);
	
		$this->db->where('st_status', 1);                
        
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('jobseekertips'));
		//$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		//$this->db->join('jb_member', 'jb_job_comments.com_member_id = jb_member.m_id');
		//$this->db->join('jb_country', 'jb_jobs.country_id = jb_country.id');
		//$this->db->order_by("j_add_date", "DESC");
		$query = $this->db->get();
		//echo $this->db->last_query();
      //  exit;
		if ($query->num_rows() > 0) {                          
           // if(isset($options['j_id']) )
             //   return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     
  }
  function getJobs($options = array())
  		{
		if(isset($options['limit']) && isset($options['offset']))
            $this->db->limit($options['limit'],$options['offset']);
        if(isset($options['limit']))
            $this->db->limit($options['limit']);   	
        if(isset($options['j_id']))
            $this->db->where('j_id', $options['j_id']);
		 if(isset($options['user_id']))
            $this->db->where('j_addedby', $options['user_id']);
		
		if(isset($options['cat_id']) && $options['cat_id'] != 0)
            $this->db->where('cat_id', $options['cat_id']);	
		if(isset($options['status']))
            $this->db->where('j_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobs'));
		$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_jobs.j_addedby = jb_member.m_id','left');
		$this->db->join('jb_country', 'jb_jobs.country_id = jb_country.id');
		$this->db->order_by("j_add_date", "DESC");
		$query = $this->db->get();
		//echo $this->db->last_query();
        //exit;
		if ($query->num_rows() > 0) {                          
            if(isset($options['j_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }

 function getCVReviewResponses($options = array())
  		{
	
		if(isset($options['status']))
            $this->db->where('j_status', '1');             
         $this->db->where('cvr_review_id', $options['cv_id']); 
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('responsecvreview'));
		//$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_responsecvreview.cvr_member_id = jb_member.m_id','left');
		//$this->db->join('jb_country', 'jb_jobs.country_id = jb_country.id');
		//$this->db->order_by("j_add_date", "DESC");
		$query = $this->db->get();
		//echo $this->db->last_query();
        //exit;
		if ($query->num_rows() > 0) {                          
            if(isset($options['j_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
    function getTotalCvs($options = array()){
		
		if(isset($options['cat_id']) && $options['cat_id'] != "")
          $where = "where cat_id = ".$options['cat_id']." AND m_status = 1";
		else
		$where = "where m_status = 0";  
		//if(isset($options['status']))	
		//$where = "where j_status = 1";  
      // $query = $this->db->query("SELECT count(*) AS tot_job from `jb_jobs` where j_status=1");
	   $query = $this->db->query("SELECT count(*) AS tot_job from `jb_cvreview`".$where);
       $row = $query->row();
	  // echo $this->db->last_query();
       return $row->tot_job;
        }
	  function getCvs($options = array())
  		{
		if(isset($options['limit']) && isset($options['offset']))
            $this->db->limit($options['limit'],$options['offset']);
        if(isset($options['limit']))
            $this->db->limit($options['limit']);   	
        if(isset($options['cv_id']))
            $this->db->where('cv_id', $options['cv_id']);
		  if(isset($options['cat_id']) && $options['cat_id'] != 0)
            $this->db->where('cat_id', $options['cat_id']);	
		if(isset($options['cv_status']))
            $this->db->where('cv_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('cvreview'));
		//$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_cvreview.cv_member_id = jb_member.m_id','left');
	
		//$this->db->order_by("j_add_date", "DESC");
		$query = $this->db->get();
		//echo $this->db->last_query();
     //  exit;
		if ($query->num_rows() > 0) {                          
            if(isset($options['cv_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }

    function getTotalJobs($options = array()){
		
		if(isset($options['cat_id']) && $options['cat_id'] != "")
          $where = "where cat_id = ".$options['cat_id']." AND j_status = 1";
		else
		$where = "where j_status = 1";  
		//if(isset($options['status']))	
		//$where = "where j_status = 1";  
      // $query = $this->db->query("SELECT count(*) AS tot_job from `jb_jobs` where j_status=1");
	   $query = $this->db->query("SELECT count(*) AS tot_job from `jb_jobs`".$where);
       $row = $query->row();
	  // echo $this->db->last_query();
       return $row->tot_job;
        }	
		
  function getRelatedJobs($options = array())
  	{
		
	if(isset($options['cat_id']) && $options['cat_id'] != "")
            $this->db->where('cat_id', $options['cat_id']);  
      
    
            $this->db->where('j_status', 1);             
            
        $this->db->select('*');
		$this->db->from('jb_jobs');
		$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->limit(8,0);
		  
         $query = $this->db->get();
      // echo $this->db->last_query();
	  // exit;
         if ($query->num_rows() > 0) {                          
               
            return $query->result();
         }
         else
            return "empty";
     	
  	}
			
 
	  function getLatestCvs($options = array())
  		{
       /* if(isset($options['j_id']))
            $this->db->where('j_id', $options['j_id']);  */
         //if(isset($options['status']))
          //  $this->db->where('j_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('cvreview'));
	//	$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_cvreview.cv_member_id = jb_member.m_id','left');
		$this->db->order_by("cv_add_date", "DESC");
		$this->db->limit(6, 0);
		//$this->db->group_by("m_id", "DESC");
	    $query = $this->db->get();
       // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['j_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
 
  function getRecentJobs($options = array())
  		{
        if(isset($options['j_id']))
            $this->db->where('j_id', $options['j_id']);  
         //if(isset($options['status']))
            $this->db->where('j_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobs'));
		$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_jobs.j_addedby = jb_member.m_id','left');
		$this->db->order_by("j_add_date", "DESC");
		$this->db->limit(6, 0);
		//$this->db->group_by("m_id", "DESC");
	    $query = $this->db->get();
       // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['j_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
 
 
  function getRecentCatJobs($options = array())
  		{
        if($this->session->userdata('cat_id') != "")
            $this->db->where('cat_id', $this->session->userdata('cat_id'));  
         //if(isset($options['status']))
            $this->db->where('j_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobs'));
		$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_jobs.j_addedby = jb_member.m_id','left');
		$this->db->order_by("j_add_date", "DESC");
		$this->db->limit(10, 0);
		//$this->db->group_by("m_id", "DESC");
	    $query = $this->db->get();
       // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['j_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
        
  function getCategories($options = array())
  		{
        if(isset($options['c_id']))
            $this->db->where('c_id', $options['c_id']);  
        // if(isset($options['c_status']))
            $this->db->where('c_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('categories'));
		//$this->db->join('oc_instructors', 'oc_courses.c_instructor_id = oc_instructors.i_id');
	    $this->db->order_by("c_add_date", "DESC");
	    $query = $this->db->get();
       //  echo $this->db->last_query();
		// exit;
         if ($query->num_rows() > 0) {                          
            if(isset($options['c_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
	 
	 function delCategory($options = array())
	    {
		if(isset($options['c_id']))
            {
			$this->db->where('c_id', $options['c_id']);
            $this->db->delete($this->db->dbprefix('categories'));
	        }
        }
		

 function updateCategoryStatus($id,$status)
  	{
    if($status == 0)
	 	$fstatus = '1';
	else
		$fstatus = '0';
	$this->db->set('c_status',$fstatus);
	$this->db->where('c_id', $id);  
	 $this->db->update($this->db->dbprefix('categories')); 
	// echo $this->db->last_query(); 	
	 return $this->db->affected_rows();  				
	}			
	
	
	  function editCategory($options = array()){
		
		if(isset($options['name']))
			$this->db->set('c_name',$options['name']);
				
		$this->db->where('c_id', $options['c_id']);
		$this->db->update($this->db->dbprefix('categories'));
		$affected_rows = $this->db->affected_rows();
	//	echo $this->db->last_query();
		return  $affected_rows;
	} 
	
  function getForms($options = array())
  		{
        if(isset($options['j_id']))
            $this->db->where('j_id', $options['j_id']);  
         if(isset($options['status']))
            $this->db->where('j_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobs'));
		$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->order_by("j_add_date", "DESC");
		//$this->db->group_by("m_id", "DESC");
	    $query = $this->db->get();
       // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['j_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }	
	
 function updateFormStatus($id,$status)
  	{
    if($status == 0)
	 	$fstatus = '1';
	else
		$fstatus = '0';
	$this->db->set('j_status',$fstatus);
	$this->db->where('j_id', $id);  
	 $this->db->update($this->db->dbprefix('jobs')); 
	// echo $this->db->last_query(); 	
	 return $this->db->affected_rows();  				
	}	
	
	
	  function editForm($options = array()){
		
		if(isset($options['title']))
			$this->db->set('j_title',$options['title']);
			
		if(isset($options['cat_id']))
			$this->db->set('cat_id',$options['cat_id']);
		
		if(isset($options['descr']) && $options['descr'] !="")
			$this->db->set('j_descr',$options['descr']);
				
		$this->db->where('j_id', $options['j_id']);
		$this->db->update($this->db->dbprefix('jobs'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		return  $affected_rows;
	} 
function getImageName($id)
	 {
	 $query = $this->db->query("select c_image from oc_courses where c_id='".$id."'");
		 //$query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           if( $query->row('c_image') != ""){
		   
                return $query->row('c_image');
		   }
		   else
		 		    return "empty";  
           
         }
	 }	
function getModuleName($id)
	 {
	 $query = $this->db->query("select d_name from oc_modules where d_id='".$id."'");
		 //$query = $this->db->get();
        // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           if( $query->row('d_name') != ""){
		   
                return $query->row('d_name');
		   }
		   else
		 		    return "empty";  
           
         }
	 }		 
	function delForm($options = array())
	    {
		if(isset($options['j_id']))
            {
			$this->db->where('j_id', $options['j_id']);
            $this->db->delete($this->db->dbprefix('jobs'));
	        }
        }
		
		
		 function getModuleForms($options = array())
  		{
        if(isset($options['id']))
            $this->db->where('d_id', $options['id']);  
         if(isset($options['status']))
            $this->db->where('d_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('modules'));
		$this->db->join('oc_courses', 'oc_modules.course_id = oc_courses.c_id');
		//$this->db->join('oc_lessons', 'oc_modules.mo_id = oc_lessons.l_module_id','left');
	    $this->db->order_by("c_add_date", "DESC");
	    $query = $this->db->get();
      // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
	 
	  function addModuleForm($options = array(),$table)
	 	{
		$this->db->insert($this->db->dbprefix($table),$options);
		//echo $this->db->last_query();
		$id = $this->db->insert_id();
		return $id;
		}
		
	 
	
	
	 
	
}
?>
