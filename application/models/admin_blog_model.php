<?php
#[\AllowDynamicProperties]
class Admin_Blog_Model extends CI_Model {
    /** Utility Methods **/
   function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
  
         
  function getBlogCForms($options = array())
  		{
        if(isset($options['blogc_id']))
            $this->db->where('blogc_id', $options['blogc_id']);  
         if(isset($options['status']))
            $this->db->where('blogc_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('blog_category'));
		
	    $this->db->order_by("blogc_add_date", "DESC");
	    $query = $this->db->get();
       // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['blogc_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
  
   function addBlogCForm($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('blog_category'),$options);
		$id = $this->db->insert_id();
		return $id;
		}
    function editBlogCForm($options = array()){
		
		if(isset($options['name']))
			$this->db->set('blogc_title',$options['name']);
	
				
		$this->db->where('blogc_id', $options['blogc_id']);
		$this->db->update($this->db->dbprefix('blog_category'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		return  $affected_rows;
	} 
  
  
   function updateBlogCFormStatus($id,$status)
  	{
    if($status == 0)
	 	$fstatus = '1';
	else
		$fstatus = '0';
	$this->db->set('blogc_status',$fstatus);
	$this->db->where('blogc_id', $id);  
	 $this->db->update($this->db->dbprefix('blog_category')); 
	// echo $this->db->last_query(); 	
	 return $this->db->affected_rows();  				
	}	
  function delBlogCForm($options = array())
	    {
		if(isset($options['blogc_id']))
            {
			$this->db->where('blogc_id', $options['blogc_id']);
            $this->db->delete($this->db->dbprefix('blog_category'));
	        }
        }
		
  
  
  
  
  function getForms($options = array())
  		{
        if(isset($options['blog_id']))
            $this->db->where('blog_id', $options['blog_id']);  
         if(isset($options['status']))
            $this->db->where('blog_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('blogs'));
		$this->db->join('jb_blog_category', 'jb_blogs.blog_category_id = jb_blog_category.blogc_id');
	    $this->db->order_by("blog_add_date", "DESC");
	    $query = $this->db->get();
       //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['blog_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     } 
  
   function addForm($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('blogs'),$options);
		$id = $this->db->insert_id();
		//echo $this->db->last_query();
		 if($id != "" ){
			 $tag_arr = explode(",",$options['blog_tags']);
			 for($a=0;$a<sizeof($tag_arr); $a++)
			 {
				 
		$this->db->insert($this->db->dbprefix('blog_tags'),array('blog_id' => $id,'tag_name' => $tag_arr[$a]));
		echo $this->db->last_query();
			 }
			 }
		
		
		
		return $id;
		}
  
   
 function updateFormStatus($id,$status)
  	{
    if($status == 0)
	 	$fstatus = '1';
	else
		$fstatus = '0';
	$this->db->set('blog_status',$fstatus);
	$this->db->where('blog_id', $id);  
	 $this->db->update($this->db->dbprefix('blogs')); 
	// echo $this->db->last_query(); 	
	 return $this->db->affected_rows();  				
	}	
  function getImageName($id)
	 {
	 $query = $this->db->query("select blog_image from jb_blogs where blog_id='".$id."'");
		 //$query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           if( $query->row('blog_image') != ""){
		   
                return $query->row('blog_image');
		   }
		   else
		 		    return "empty";  
           
         }
	 }	
	function delForm($options = array())
	    {
		if(isset($options['blog_id']))
            {
			$this->db->where('blog_id', $options['blog_id']);
            $this->db->delete($this->db->dbprefix('blogs'));
	        }
        }
		
	
function delBlogTags($options = array())
	    {
		if(isset($options['blog_id']))
            {
			$this->db->where('blog_id', $options['blog_id']);
            $this->db->delete($this->db->dbprefix('blog_tags'));
	        }
        }
			
  function getBlogTags($options = array())
  {
	 /* $query = $this->db->query("select tag_name from jb_blog_tags where blog_id='".$options['blog_id']."'");
	  if ($query->num_rows() > 0)                          
               return  $query->result();
	  else
			    return "empty";  */
        
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('blog_tags'));
		$query = $this->db->get();
       //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
        
            return $query->result();
         }
         else
            return 'empty';
        
        
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
        

	
	
	  function editForm($options = array()){
		
		if(isset($options['blog_category_id']))
			$this->db->set('blog_category_id',$options['blog_category_id']);
		if(isset($options['blog_title']))
			$this->db->set('blog_title',$options['blog_title']);
		if(isset($options['blog_slug']))
			$this->db->set('blog_slug',$options['blog_slug']);
		if(isset($options['blog_short_description']))
			$this->db->set('blog_short_description',$options['blog_short_description']);	
		if(isset($options['blog_image']) && $options['blog_image'] !="")
			$this->db->set('blog_image',$options['blog_image']);
		if(isset($options['blog_description']) && $options['blog_description'] !="")
			$this->db->set('blog_description',$options['blog_description']);
		
	//print_r($options['blog_tags']);
		// exit;
		
		$this->db->where('blog_id', $options['blog_id']);
		$this->db->update($this->db->dbprefix('blogs'));
		$affected_rows = $this->db->affected_rows();
		
		//if(isset($options['blog_tags']))
			//$this->db->set('blog_tags',$options['blog_tags']);
		
		//$this->db->insert($this->db->dbprefix('blogs'),$options);
		//$id = $this->db->insert_id();
		//echo $this->db->last_query();
		 if($options['blog_tags'] != "" ){
			 $tag_arr = explode(",",$options['blog_tags']);
			 for($a=0;$a<sizeof($tag_arr); $a++)
			 {
				 
		$this->db->insert($this->db->dbprefix('blog_tags'),array('blog_id' => $options['blog_id'],'tag_name' => $tag_arr[$a]));
		echo $this->db->last_query();
			 }
		 }
		
		
		
		//echo $this->db->last_query();
		return  $affected_rows;
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
		$id = $this->db->insert_id();
		return $id;
		}
	  function editModuleForm($options = array()){
		
		if(isset($options['d_name']))
			$this->db->set('d_name',$options['d_name']);
		if(isset($options['d_type']))
			$this->db->set('d_type',$options['d_type']);
		if(isset($options['course_id']) && $options['course_id'] !="")
			$this->db->set('course_id',$options['course_id']);
		/*if(isset($options['module_id']) && $options['module_id'] !="")
			$this->db->set('module_id',$options['module_id']);*/
				
		$this->db->where('d_id', $options['id']);
		$this->db->update($this->db->dbprefix('modules'));
		$affected_rows = $this->db->affected_rows();
		echo $this->db->last_query();
		return  $affected_rows;
	} 
	  function getCourseModules($options = array())
  		{
        if(isset($options['course_id']))
            $this->db->where('course_id', $options['course_id']);  
		 if(isset($options['module_id']))
            $this->db->where('module_id', $options['module_id']);  	
         if(isset($options['status']))
            $this->db->where('d_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('modules'));
		//$this->db->join('oc_instructors', 'oc_courses.c_instructor_id = oc_instructors.i_id');
	    $this->db->order_by("d_add_date", "DESC");
	    $query = $this->db->get();
        // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           // if(isset($options['course_id']) )
            //    return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
	 
	 
	  function getLessonForms($options = array())
  		{
       // if(isset($options['lesson_id']))
          //  $this->db->where('l_id', $options['lesson_id']);  
         if(isset($options['status']))
            $this->db->where('d_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('modules'));
		$this->db->join('oc_lesson_slides', 'oc_modules.d_id = oc_lesson_slides.lesson_id');
		//$this->db->join('oc_modules', 'oc_lessons.l_module_id = oc_modules.mo_id');
		$this->db->join('oc_courses', 'oc_modules.course_id = oc_courses.c_id','left');
	    $this->db->order_by("d_add_date", "DESC");
	    $query = $this->db->get();
      //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['course_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
	 
	 
	  function getRequestForms($options = array())
  		{
        if(isset($options['id']))
            $this->db->where('d_id', $options['id']);  
         if(isset($options['status']))
            $this->db->where('d_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('member'));
		$this->db->join('oc_member_courses', 'oc_member.m_id = oc_member_courses.member_id');
		$this->db->join('oc_courses', 'oc_member_courses.course_id = oc_courses.c_id');
	    $this->db->order_by("mc_add_date", "DESC");
		 $this->db->group_by("m_id", "DESC");
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
	   function getTotalRequests(){
                       
            
      //   $query = $this->db->query("SELECT count(*) AS total from al_member where status = 'active'");
		$this->db->select('count(member_id)');
		 $this->db->distinct();
		$this->db->from($this->db->dbprefix('member_courses'));
		//$this->db->join('oc_member.m_id, oc_member_courses.member_id, = oc_member.m_id');
	//	$this->db->join('oc_courses', 'oc_modules.mo_id = oc_lessons.l_module_id','left');
	// $this->db->order_by("mc_add_date", "DESC");
		$this->db->group_by("member_id", "DESC");
	    $query = $this->db->get();
		  
         //$query = $this->db->get();
        echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           
                return $query->row('total');
            
           
         }
         
         
     }
}
?>
