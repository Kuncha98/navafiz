<?php
#[\AllowDynamicProperties]
class Job_Model extends CI_Model {
    /** Utility Methods **/
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'jobs';
        $this->table_id = 'j_id';
    }
    
    public function deleteOldJobs() {
        // Calculate the timestamp for 90 days ago
        $ninetyDaysAgo = time() - (90 * 24 * 60 * 60);
    
        // Delete records where the `j_add_date` is older than 90 days
        $this->db->where('j_add_date <', $ninetyDaysAgo);
        $this->db->delete($this->table_name);
    }

    
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
    
    function GetJobTitle(){
       $result = $this->db->query('select * from jb_jobtitle where jt_status =1')->result();
        return $result;
    }
    
    function GetJobTitleById($id){
        $j_title = $this->db->get_where($this->table_name,array($this->table_id=>$id))->row();
        return $j_title;
    }
    
    function updateJob($options = array()){
		if(isset($options['j_title']))
			$this->db->set('j_title',$options['j_title']);
			
		if(isset($options['cat_id']))
			$this->db->set('cat_id',$options['cat_id']);
		if(isset($options['j_tags']))
			$this->db->set('j_tags',$options['j_tags']);	
		if(isset($options['j_country_id']))
			$this->db->set('j_country_id',$options['j_country_id']);	
		if(isset($options['j_state']))
			$this->db->set('j_state',$options['j_state']);	
		if(isset($options['j_location']))
			$this->db->set('j_location',$options['j_location']);	
		if(isset($options['j_company']))
			$this->db->set('j_company',$options['j_company']);	
		if(isset($options['j_email_apply']))
			$this->db->set('j_email_apply',$options['j_email_apply']);						
		if(isset($options['j_image']) && $options['j_image'] != "")
			$this->db->set('j_image',$options['j_image']);	
		
		if(isset($options['j_descr']) && $options['j_descr'] !="")
			$this->db->set('j_descr',$options['descr']);
				
		$this->db->where('j_id', $options['job_id']);
		$this->db->update($this->db->dbprefix('jobs'));
		$affected_rows = $this->db->affected_rows();
		echo $this->db->last_query();
		return  $affected_rows;
	}
        
    function addJob($options = array()){
        //print_r($options);
        $this->db->insert($this->db->dbprefix('jobs'),$options);
        //echo $this->db->last_query();//exit;
        $id = $this->db->insert_id();
        // return $id;
        $to = 'navafizweb@gmail.com';
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
        $this->email->from('register@navafiz.com');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($messageText);

        if($this->email->send()) {
          $id = $this->db->insert_id();
            return $id;
            // return 1;
        }else{
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
  
   function getTipsComments($options = array())
  		{
	//print_r($options);
		if(isset($options['com_type']))
           $this->db->where('com_type', $options['com_type']);  
		  $this->db->where('com_status', $options['com_status']);  
        
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('job_comments'));
		//$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_job_comments.com_member_id = jb_member.m_id');
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
   function getJobComments($options = array())
  		{
	//print_r($options);
		if(isset($options['com_type']))
           $this->db->where('com_type', $options['com_type']);  
		
		if($options['com_type'] == "review")
			 $this->db->where('com_job_id', $options['cv_id']);  
		else
		$this->db->where('com_job_id', $options['j_id']);                
        
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('job_comments'));
		//$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_job_comments.com_member_id = jb_member.m_id');
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
  
  function searchJob($j_id){
           $job = $this->db->query("select jb_jobs.views,jb_jobs.j_id,jb_jobs.j_title,jb_jobs.cat_id,jb_jobs.j_status,jb_jobs.j_image,jb_jobs.j_state,jb_jobs.j_add_date,jb_jobs.j_addedby,jb_jobs.j_company,"
                . "jb_jobs.j_location,jb_jobs.j_email_apply,jb_jobs.job_reference_by,jb_jobs.j_descr,jb_categories.c_name,jb_country.country,jb_member.m_name from jb_jobs "
                . "inner join jb_country on jb_jobs.j_country_id = jb_country.id "
                . "inner join jb_categories on jb_jobs.cat_id = jb_categories.c_id "
                . "inner join jb_member on jb_jobs.j_addedby = jb_member.m_id where j_status=1 and j_id = $j_id")->result();
           return $job;
  }
  
  
  
  
  function getJobs($options = array()) {
    if (isset($options['limit']) && isset($options['offset'])) {
    $this->db->limit($options['limit'], $options['offset']);
    // echo "Offset: " . $options['offset'];
    }
    
    if (isset($options['limit'])) {
        $this->db->limit($options['limit']);
        // echo "Limit: " . $options['limit'];
    }
    
    if (isset($options['j_id'])) {
        $this->db->where('j_id', $options['j_id']);
        // echo "J_ID: " . $options['j_id'];
    }
    
    if (isset($options['user_id'])) {
        $this->db->where('j_addedby', $options['user_id']);
        // echo "User_id: " . $options['user_id'];
    }
    
    if (isset($options['cat_id']) && $options['cat_id'] !== '') {
        $this->db->where('cat_id', $options['cat_id']);
        // echo "Cat_id: " . $options['cat_id'];
    }


    if (isset($options['status'])) {
        $this->db->where('j_status', '1');
    }

    $this->db->select('*');
    $this->db->from('jb_jobs');
    $this->db->order_by("j_add_date", "DESC");

    $query = $this->db->get();

    if ($query->num_rows()) {
        if (isset($options['j_id'])) {
            return $query->row(0);
        }

        return $query->result();
    } else {
        return 'empty';
    }
}


     
     
  function searchJobs($options = array())
  		{


      
	if(isset($options['limit']) && isset($options['start']))
            $this->db->limit($options['limit'],$options['start']);
           	
        if(isset($options['j_id']))
            $this->db->where('j_id', $options['j_id']);
		 if(isset($options['user_id']))
            $this->db->where('j_addedby', $options['user_id']);
		
		if(isset($options['cat_id']) && $options['cat_id'] != 0)
            $this->db->where('cat_id', $options['cat_id']);	
		if(isset($options['is_featured']) && $options['is_featured'] != 0)
            $this->db->where('is_featured', $options['is_featured']);	
		if(isset($options['status']))
            $this->db->where('j_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobs'));
		//$this->db->join('jb_jobtitle', 'jb_jobs.j_title = jb_jobtitle.jt_id','left');
		$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_jobs.j_addedby = jb_member.m_id','left');
		$this->db->join('jb_country', 'jb_jobs.j_country_id = jb_country.id');
		
		$this->db->order_by("j_add_date", "DESC");
		$query = $this->db->get();
		/*echo $this->db->last_query();
        exit;*/
//                 echo "<br>";
//                    echo $options['j_id'];
//                    echo "<br>";
//                    echo $query->num_rows();
////                    exit();
		if ($query->num_rows()){ 
                   
            if(isset($options['j_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
     
     function saveQuickJob($data,$id=0){
    if($id==0){
            $this->db->insert('jb_quick_job', $data);
            $id = $this->db->insert_id();            
    }else{
        $this->db->where('quick_job_id', $id);
        $this->db->update('jb_quick_job', $data);
    }

    return $id;

    }
     function applyQuickJob($data,$id=0){
    if($id==0){
            $this->db->insert('jb_quick_job_applicants', $data);
            $id = $this->db->insert_id();            
    }else{
        $this->db->where('id', $id);
        $this->db->update('jb_quick_job_applicants', $data);
    }

    return $id;

    }
  function fetchQuickJobs($options = array())
  		{


      
	if(isset($options['limit']) && isset($options['start']))
            $this->db->limit($options['limit'],$options['start']);
           	
        if(isset($options['quick_job_id']))
            $this->db->where('quick_job_id', $options['quick_job_id']);
		
        if(isset($options['status']))
            $this->db->where('status', '1');             
            $this->db->select('jb_member.m_id,jb_member.m_avatar,jb_member.m_name,jb_quick_job.quick_job_id,jb_quick_job.title,jb_quick_job.description,jb_quick_job.added_on, '
                    . '(select count(id) from jb_quick_job_applicants as count_app where  job_id = jb_quick_job.quick_job_id) as applicants_count');
		$this->db->from($this->db->dbprefix('quick_job'));
		$this->db->join('jb_member', 'jb_quick_job.added_by = jb_member.m_id');
		
		$this->db->order_by("title", "ASC");
		$query = $this->db->get();

		if ($query->num_rows()){ 
                   
            if(isset($options['quick_job_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
  function fetchQuickJobsApplicants($options = array())
  		{


      
	if(isset($options['limit']) && isset($options['start']))
            $this->db->limit($options['limit'],$options['start']);
           	
        if(isset($options['quick_job_id']))
            $this->db->where('quick_job_id', $options['quick_job_id']);
		
                    
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('quick_job_applicants'));
		
		$this->db->order_by("id", "DESC");
		$query = $this->db->get();

		if ($query->num_rows()){ 
                   

                    return $query->result();
         }
         else
            return 'empty';
     }
     
    function delete_quick_applicant($id,$job_id){
        $where['id'] = $id;
        $where['job_id'] = $job_id;
        
        $this->db->where($where);
        if($this->db->delete('jb_quick_job_applicants'))
        {
            return true;
        }else{
            return false;
        }
    } 

    
    function getJobApplicants($options = array())
  		{


      
	if(isset($options['limit']) && isset($options['start']))
            $this->db->limit($options['limit'],$options['start']);
           	
        if(isset($options['job_id']))
            $this->db->where('job_id', $options['job_id']);
		
                    
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('quick_job_applicants'));
		
		
		$query = $this->db->get();

		if ($query->num_rows()){ 
                   

                    return $query->result();
         }
         else
            return 'empty';
     }
     
     
     
     
   function getFeaturedJobs($options = array())
    {
        $result = $this->db->query('select * from jb_jobs where is_featured =1')->result();
        return $result;
    }
   function getFeaturedJobsnew()
    {
        $result = $this->db->query('select * from jb_jobs where is_featured = 1')->result();
        return $result;
    }

    
   function RemoveFeaturedJob($id){
        $this->db->set('is_featured',0);
	$this->db->where('j_id', $id);  
	$this->db->update($this->db->dbprefix('jobs')); 
	
    }
   function AddFeaturedJob($id){
        $this->db->set('is_featured',1);
	$this->db->where('j_id', $id);  
	$this->db->update($this->db->dbprefix('jobs')); 
	
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
		echo "work";
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
	    $this->db->order_by("c_name", "ASC");
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
	
    function updateFormStatus($id,$status){
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
        
    function getImageName($id){
	 
        $query = $this->db->query("select c_image from oc_courses where c_id='".$id."'");
        if ($query->num_rows() > 0) {                          
           if( $query->row('c_image') != ""){
                return $query->row('c_image');
            }else{
                return "empty";
            }
         }
    }	
    function getModuleName($id){
	 
        $query = $this->db->query("select d_name from oc_modules where d_id='".$id."'");
        if ($query->num_rows() > 0) {
           if( $query->row('d_name') != ""){		   
                return $query->row('d_name');
            }else{
                return "empty";             
            }
        }
    }
         
    function delForm($options = array()){
        if(isset($options['j_id']) && intval($options['j_id'])>0){
            $this->db->where('j_id', $options['j_id']);
            $this->db->delete($this->db->dbprefix('jobs'));
        }
    }
    
    function getModuleForms($options = array()){
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
	 
    function addModuleForm($options = array(),$table){
        $this->db->insert($this->db->dbprefix($table),$options);
        //echo $this->db->last_query();
        $id = $this->db->insert_id();
        return $id;
    }
		
	 
    public function GetAll()
    {        
        $results = $this->db->order_by($this->table_id, 'DESC')->get($this->table_name)->result();
        return $results;
    }
    
    
    public function GetById($id)
    {        
        $user = $this->db->get_where($this->table_name,array($this->table_id=>$id))->row();
        return $user;
    }
    public function applicantJobById($j_id)
    {        
        $job_title = $this->db->get_where('jb_quick_job',array('quick_job_id'=>$j_id))->row();
        return $job_title;
    }
    public function GetByUserId($id)
    {        
        $user = $this->db->get_where($this->table_name,array('member_id'=>$id))->row();
        return $user;
    }
    
    public function Search($where)
    {        
        $orWhere = '';
        if(array_key_exists('order_status',$where))
        {                        
            if(!empty($where['order_status'])){
                $orWhere .= 'order_status = "'.$where['order_status'].'"';
            }  
            
            //$orWhere .= 'address_line_1 like "%'.$where['filter'].'%" or ';
            //$orWhere .= 'city  like "%'.$where['filter'].'%" or ';            
            unset($where['order_status']);
        }        
        
        $this->db->where($where);
            
        if($orWhere!=''){
            $this->db->where($orWhere);
        }
        
        $this->db->order_by($this->table_id, 'DESC');
        $results =  $this->db->get($this->table_name)->result();
        
        return $results;
        
    }
    public function quickJobById($where)
    {        
        $orWhere = '';
        if(array_key_exists('order_status',$where))
        {                        
            if(!empty($where['order_status'])){
                $orWhere .= 'order_status = "'.$where['order_status'].'"';
            }  
            
            //$orWhere .= 'address_line_1 like "%'.$where['filter'].'%" or ';
            //$orWhere .= 'city  like "%'.$where['filter'].'%" or ';            
            unset($where['order_status']);
        }        
        
        $this->db->where($where);
            
        if($orWhere!=''){
            $this->db->where($orWhere);
        }
        
        $this->db->order_by('quick_job_id', 'DESC');
        $results =  $this->db->get('jb_quick_job')->result();
        
        return $results;
        
    }
    
    
    public function searchQuickJob($where)
    {        
        $orWhere = '';
        if(array_key_exists('order_status',$where))
        {                        
            if(!empty($where['order_status'])){
                $orWhere .= 'order_status = "'.$where['order_status'].'"';
            }  
                        
            unset($where['order_status']);
        }        
        
        $this->db->where($where);
            
        if($orWhere!=''){
            $this->db->where($orWhere);
        }
        
        $this->db->order_by('id', 'DESC');
        $results =  $this->db->get('jb_quick_job_applicants')->result();
        
        return $results;
        
    }
    
  
     public function search_shortlist_can($where){
        $orWhere = '';
        
        $this->db->where($where);
            
        if($orWhere!=''){
            $this->db->where($orWhere);
        }
        
        $this->db->order_by('id', 'DESC');
        $results =  $this->db->get('jb_job_shortlist_members')->result();
        
        return $results;
    }
    
    
    
    public function CountSearch($where)
    {        
        $this->db->where($where);            
        $results = $this->db->count_all_results($this->table_name);
        
        //$results =  $this->db->get($this->table_name)->result();
        
        return $results;
        
    }
    
    function get10jobs(){
      $result = $this->db->query('select * from jb_jobs order by j_id DESC limit 10')->result();
//       $result = $this->db->order_by('j_id','DESC')->result();
      return $result;
       
    }
    
    function saveImage($data){
        $this->db->insert('jb_imagelibrary',$data);
    }
    
    public function Save($data,$id=0)
    {
        if($id==0){
            $this->db->insert($this->table_name, $data);
            $id = $this->db->insert_id();            
        }else{
            $this->db->where($this->table_id, $id);
            $this->db->update($this->table_name, $data);
        }
        
        return $id;
    }
    
    public function UpdateQuickJob($data,$id){
        $this->db->where('quick_job_id', $id);
        $this->db->update('jb_quick_job', $data);
    }
 
    
    public function SaveApplicantRemarks($data,$id=0)
    {
        if($id==0){
            $this->db->insert('jb_quick_job_applicants', $data);
            $id = $this->db->insert_id();            
        }else{
            $this->db->where('id', $id);
            $this->db->update('jb_quick_job_applicants', $data);
        }
        
        return $id;
    }
    
    
        public function Save_shortlisted_member($data,$id=0)
    {
            if($id == 0){
                $this->db->insert('jb_job_shortlist_members', $data);
                $id = $this->db->insert_id();
            }else{
                $this->db->where('id', $id);
                $this->db->update('jb_job_shortlist_members', $data);
            }
             
        
             return $id;
    }
    
    public function Delete($id){        
        
        $this->db->where($this->table_id,$id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }   
    
    public function DeleteByUserid($member_id){        
        
        $this->db->where('member_id',$member_id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }
    
    function getUsers($postData){

     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("m_name like '%".$postData['search']."%' ");

       $records = $this->db->get('jb_member')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->m_id,"label"=>$row->m_name,"email"=>$row->m_email,"current_city"=>$row->m_current_city,'profession'=>$row->m_profession);
       }

     }

     return $response;
  }
  
  function jobSearchKeyword($keyword,$limit) {
      
        $this->db->limit($limit);
        $this->db->select('*');
        $this->db->like('j_title', $keyword); 
        $this->db->or_like('j_tags', $keyword);
        $this->db->or_like('j_slug', $keyword);
        $this->db->or_like('j_state', $keyword);
        $this->db->or_like('j_location', $keyword);
        $this->db->or_like('j_descr', $keyword);
        $this->db->or_like('j_company', $keyword);
        $this->db->or_like('job_reference_by', $keyword);
        $this->db->or_like('j_email_apply', $keyword);

        $records = $this->db->get('jb_jobs')->result();
        
        return $records;
  }
  
  
    
    
  function Delete_can($u_id,$j_id){    
      $where['user_id'] = $u_id;
      $where['job_id'] = $j_id;
        $this->db->where($where);
         if($this->db->delete('jb_job_shortlist_members'))
        {
            return true;
        }else{
            return false;
        }   
    }
    
    function recommended_list($id){
        $query = $this->db->query('select r.*,  
                                    m.m_name,m.m_avatar,m.m_profession,member_cv,m.m_current_city, 
                                    (select m_name from jb_member where m_id=m.mentor_id) as mentor ,
                                    (select count(*) from jb_user_recommendation where type="user_to_user" and user_id=m.m_id) as recommendations,
                                    (select m_name from jb_member where m_id = r.updated_by) as rec_updated_by,
                                    (select m_name from jb_member where m_id=r.recommend_by) as recommend_by_name
                                    from jb_member m, jb_user_recommendation r where r.type="for_job" and r.user_id=m.m_id and r.job_id='.$id);
        $recommand_list = $query->result();
        return $recommand_list;
    }
    
    
    function GetAll_can($j_id){

         $query = $this->db->query('select s.*,'
                 . ' m.m_name,m.m_avatar,m.m_profession,m.m_current_city,'
                 . '(select m_name from jb_member where m_id = s.updated_by) as shortlisted_by,'
                 . '(select m_name from jb_member where m_id = s.rejected_by) as s_rejected_by,'
                 . '(select count(*) from jb_job_shortlist_members where updated_by = m.m_id) as shortlisters '
                 . 'from jb_member m, jb_job_shortlist_members s where s.user_id = m.m_id and s.job_id='.$j_id);
         $shortlisted = $query->result();
         return $shortlisted;

    }
    
    
    
    // function getFeaturedJobsNew() {
    //      $data = $this->db->where('is_featured', 1)
    //                 ->limit(6)
    //                 ->findAll();
    //             return $data;
    // }	
    
	 
	
}
?>
