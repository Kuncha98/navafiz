<?php
#[\AllowDynamicProperties]
class Admin_Company_Model extends CI_Model {
    /** Utility Methods **/
   function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
  
   function saveCompanies($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('companies'),$options);
		$id = $this->db->insert_id();
		return $id;
	
		}
		
 function updateCompanies($options = array())
	 	{
		
		
		if(isset($options['co_cat_id']))
			$this->db->set('co_cat_id',$options['co_cat_id']);
			
		if(isset($options['co_logo']) && $options['co_logo'] != "")
			$this->db->set('co_logo',$options['co_logo']);
		if(isset($options['co_name']) )
			$this->db->set('co_name',$options['co_name']);	
		
		if(isset($options['co_mobile']))
			$this->db->set('co_mobile',$options['co_mobile']);
		if(isset($options['co_phone']))
			$this->db->set('co_phone',$options['co_phone']);
		if(isset($options['co_fax']))
			$this->db->set('co_fax',$options['co_fax']);
		if(isset($options['co_address']))
			$this->db->set('co_address',$options['co_address']);
		if(isset($options['co_tags']))
			$this->db->set('co_tags',$options['co_tags']);
		if(isset($options['co_website']))
			$this->db->set('co_website',$options['co_website']);
							
				
		$this->db->where('co_id', $options['co_id']);
		$this->db->update($this->db->dbprefix('companies'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		//exit;
		return  $affected_rows;
		
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
	    $this->db->order_by("jt_add_date", "DESC");
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
	
	
	  function editCategory($options = array()){
		
		if(isset($options['name']))
			$this->db->set('c_name',$options['name']);
				
		$this->db->where('c_id', $options['c_id']);
		$this->db->update($this->db->dbprefix('categories'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		return  $affected_rows;
	} 
	
  function getForms($options = array())
  		{
        if(isset($options['id']))
            $this->db->where('co_id', $options['id']);  
         if(isset($options['status']))
            $this->db->where('co_status', '1');   
		 if(isset($options['limit']) && isset($options['offset']))
		$this->db->limit($options['limit'],$options['offset'] );	          
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('companies'));
		$this->db->join('jb_categories', 'jb_companies.co_cat_id = jb_categories.c_id');
		$this->db->join('jb_member', 'jb_companies.user_id = jb_member.m_id','left');
		$this->db->order_by("jb_companies.added_on", "DESC");
		//$this->db->group_by("m_id", "DESC");
	    $query = $this->db->get();
     //   echo $this->db->last_query();
     // exit;
	     if ($query->num_rows() > 0) {                          
            if(isset($options['id']) )
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
		
		
		
	 
	
	 
	 
	 
	 	
	 
 function getTotalForms(){
        $query = $this->db->query("SELECT count(*) AS tot_book from jb_jobs");
        $row = $query->row();
        return $row->tot_book;
    	}

	 
	 function getJobTips($options = array())
	 	{
      /*  if(isset($options['c_id']))
            $this->db->where('c_id', $options['c_id']);  */
        // if(isset($options['status']))
          //  $this->db->where('jt_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobseekertips'));
		//$this->db->join('oc_instructors', 'oc_courses.c_instructor_id = oc_instructors.i_id');
	    $this->db->order_by("st_add_date", "DESC");
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
	 
	
	 function saveJobTips($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('jobseekertips'),$options);
		$id = $this->db->insert_id();
		return $id;
	
		}
		
		
}
?>
