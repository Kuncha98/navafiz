<?php
#[\AllowDynamicProperties]
class Admin_Olx_Model extends CI_Model {
    /** Utility Methods **/
   function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
  
         
  function getCategories($options = array())
  		{
        if(isset($options['c_id']))
            $this->db->where('c_id', $options['c_id']);  
         if(isset($options['status']))
            $this->db->where('c_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('product_category'));
		
	    $this->db->order_by("c_add_date", "DESC");
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
  
   function addCForm($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('product_category'),$options);
		$id = $this->db->insert_id();
		return $id;
		}
    function editCategry($options = array()){
		
		if(isset($options['name']))
			$this->db->set('c_title',$options['name']);
	
				
		$this->db->where('c_id', $options['c_id']);
		$this->db->update($this->db->dbprefix('product_category'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		return  $affected_rows;
	} 
  
  
   function updateCategoryStatus($id,$status)
  	{
    if($status == 0)
	 	$fstatus = '1';
	else
		$fstatus = '0';
	$this->db->set('c_status',$fstatus);
	$this->db->where('c_id', $id);  
	 $this->db->update($this->db->dbprefix('product_category')); 
	// echo $this->db->last_query(); 	
	 return $this->db->affected_rows();  				
	}	
  function delCategory($options = array())
	    {
		if(isset($options['c_id']))
            {
			$this->db->where('c_id', $options['c_id']);
            $this->db->delete($this->db->dbprefix('product_category'));
	        }
        }
		
  
  
  
  
  function getForms($options = array())
  		{
        if(isset($options['blog_id']))
            $this->db->where('blog_id', $options['blog_id']);  
         if(isset($options['status']))
            $this->db->where('blog_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('products'));
		$this->db->join('jb_product_category', 'jb_products.pro_category_id = jb_product_category.c_id');
		$this->db->join('jb_member', 'jb_products.member_id = jb_member.m_id');
	    //$this->db->order_by("blog_add_date", "DESC");
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
	$this->db->set('pro_status',$fstatus);
	$this->db->where('pro_id', $id);  
	 $this->db->update($this->db->dbprefix('products')); 
	// echo $this->db->last_query(); 	
	 return $this->db->affected_rows();  				
	}	
  function getImageName($id)
	 {
	 $query = $this->db->query("select pro_image from jb_products where pro_id='".$id."'");
		 //$query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           if( $query->row('pro_image') != ""){
		   
                return $query->row('pro_image');
		   }
		   else
		 		    return "empty";  
           
         }
	 }	
	function delForm($options = array())
	    {
		if(isset($options['pro_id']))
            {
			$this->db->where('pro_id', $options['pro_id']);
            $this->db->delete($this->db->dbprefix('products'));
			echo $this->db->last_query();
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

		
		
		
	
	
	 
	 
	 
	 
}
?>
