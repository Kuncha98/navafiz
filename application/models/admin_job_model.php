<?php
#[\AllowDynamicProperties]
class Admin_Job_Model extends CI_Model {
    /** Utility Methods **/
   function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
  
   function saveJobTitle($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('jobtitle'),$options);
		$id = $this->db->insert_id();
		return $id;
	
		}
 function getJobTitles($options = array())
	 	{
      /*  if(isset($options['c_id']))
            $this->db->where('c_id', $options['c_id']);  */
        // if(isset($options['status']))
          //  $this->db->where('jt_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobtitle'));
		//$this->db->join('oc_instructors', 'oc_courses.c_instructor_id = oc_instructors.i_id');
	    $this->db->order_by("jt_title", "ASC");
	    $query = $this->db->get();
        // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
          /*  if(isset($options['c_id']) )
                return $query->row(0);*/
            
            return $query->result();
         }
         else
            return 'empty';
     }
     
     
     function GetQuickJobs(){
        $result = $this->db->query('select * from jb_quick_job where status = 1 order by quick_job_id DESC')->result();
        return $result;
    }
		
  function addCategory($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('categories'),$options);
		$id = $this->db->insert_id();
		return $id;
	
		}
  function addForm($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('jobs'),$options);
		$id = $this->db->insert_id();
		return $id;
	
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
        
  function getCategories($options = array())
  		{
        if(isset($options['c_id']))
            $this->db->where('c_id', $options['c_id']);  
         if(isset($options['status']))
            $this->db->where('c_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('categories'));
		//$this->db->join('oc_instructors', 'oc_courses.c_instructor_id = oc_instructors.i_id');
	    $this->db->order_by("c_name", "ASC");
	    $query = $this->db->get();
        // echo $this->db->last_query();
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
	
	
	function editCategory($options , $id){
                if(isset($options) && !empty($id)){
                    $this->db->where('c_id', $id);
                    $this->db->update('jb_categories', $options);
                    $affected_rows = $this->db->affected_rows();
                        //echo $this->db->last_query();
                    return  $affected_rows;
                }
            
	} 
	
  function getForms($options = array())
  		{
        if(isset($options['j_id']))
            $this->db->where('j_id', $options['j_id']);  
         if(isset($options['status']))
            $this->db->where('j_status', '1');   
		 if(isset($options['limit']) && isset($options['offset']))
		$this->db->limit($options['limit'],$options['offset'] );	          
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobs'));
		$this->db->join('jb_jobtitle', 'jb_jobs.j_title = jb_jobtitle.jt_id','left');
		$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_jobs.j_addedby = jb_member.m_id','left');
		$this->db->order_by("j_add_date", "DESC");
		//$this->db->group_by("m_id", "DESC");
	    $query = $this->db->get();
      //  echo $this->db->last_query();
      // exit;
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
		if(isset($options['j_image']) && $options['j_image'] != "")
			$this->db->set('j_image',$options['j_image']);	
		
		if(isset($options['descr']) && $options['descr'] !="")
			$this->db->set('j_descr',$options['descr']);
				
		$this->db->where('j_id', $options['j_id']);
		$this->db->update($this->db->dbprefix('jobs'));
		$affected_rows = $this->db->affected_rows();
		echo $this->db->last_query();
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
	 
function delForm($options = array())
    {
        if(isset($options['j_id']))
    {
                $this->db->where('j_id', $options['j_id']);
    $this->db->delete($this->db->dbprefix('jobs'));
        }
}

function getbyid($id){
    $title = $this->db->get_where('jb_jobtitle',array('jt_id'=>$id))->row();
    return $title;
}

function getQuickJobById($id){
    $data = $this->db->get_where('jb_quick_job',array('quick_job_id'=>$id))->row();
    return $data;
}

function updatetitle($data,$id){
    $this->db->where('jt_id',$id);
    $this->db->update('jb_jobtitle', $data);
}
        
        
        
		
		
		
	 
	
	 
	 
	 
	 	
	 
 function getTotalForms(){
        $query = $this->db->query("SELECT count(*) AS tot_book from jb_jobs");
        $row = $query->row();
        return $row->tot_book;
    	}

	 
	 function getJobTips($options = array())
	 	{
        if(isset($options['id']))
            $this->db->where('st_id', $options['id']);  
        // if(isset($options['status']))
          //  $this->db->where('jt_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobseekertips'));
		//$this->db->join('oc_instructors', 'oc_courses.c_instructor_id = oc_instructors.i_id');
	    $this->db->order_by("st_add_date", "DESC");
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
	 
	
	 function saveJobTips($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('jobseekertips'),$options);
		$id = $this->db->insert_id();
		return $id;
	
		}
		  
		 function updateJob($options = array()){
		
			$this->db->set('j_status',1);
		if(isset($options['cat_id']))
			$this->db->set('cat_id',$options['cat_id']);
			
		if(isset($options['j_title']))
			$this->db->set('j_title',$options['j_title']);
		if(isset($options['j_slug']))
			$this->db->set('j_slug',$options['j_slug']);	
		if(isset($options['country_id']) )
			$this->db->set('j_country_id',$options['country_id']);
		if(isset($options['j_state']) )
			$this->db->set('j_state',$options['j_state']);
	if(isset($options['j_location']) )
			$this->db->set('j_location',$options['j_location']);
			if(isset($options['j_image']) )
			$this->db->set('j_image',$options['j_image']);
			if(isset($options['j_company']) )
			$this->db->set('j_company',$options['j_company']);
			
			if(isset($options['j_email_apply']) )
			$this->db->set('j_email_apply',$options['j_email_apply']);			
		
		if(isset($options['j_descr']) && $options['j_descr'] !="")
			$this->db->set('j_descr',$options['j_descr']);
				
		$this->db->where('j_id', $options['id']);
		$this->db->update($this->db->dbprefix('jobs'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		//exit;
		return  $affected_rows;
	}
        
        
        
        
        
    function getMember($postData){

     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("m_name like '%".$postData['search']."%' ");

       $records = $this->db->get('jb_member')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->m_id,"label"=>$row->m_name);
       }

     }
		
}



}


?>
