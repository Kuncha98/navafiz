<?php
#[\AllowDynamicProperties]
class Olx_Model extends CI_Model {
    /** Utility Methods **/
   function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
  
    function getTotalProducts(){
       $query = $this->db->query("SELECT count(*) AS tot_member from `jb_products` where pro_status=1");
       $row = $query->row();
       return $row->tot_member;
        // }




    }
  function getItemImage($id,$colu) {
			
		$query = $this->db->query("SELECT $colu from jb_products where pro_id = '".$id."'");
		
		
		//echo $this->db->last_query();
         if ($query->num_rows() > 0){
			 $row = $query->row();
			 
			
			 if($colu == 'pro_image')
	         	return $row->pro_image;
			// else if($colu == 'pro_image2')
			 //	return $row->pro_image2;
			 else 
			 	return $row->pro_image2;
			 
		 }else
            return 'empty';
			
		}
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 
         
  function getCats($options = array())
  		{
        if(isset($options['c_id']))
            $this->db->where('c_id', $options['c_id']);  
         if(isset($options['c_status']))
            $this->db->where('c_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('olx_category'));
		
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
function addProduct($options = array())
 	{
	
	
	$this->db->insert($this->db->dbprefix('products'),$options);
	echo $this->db->last_query();
	$id = $this->db->insert_id();
	//if($id)
		//{
		//$this->db->query("insert into `so_activity`  (ac_member_id,content_id,content_type,ac_add_date) values('".$options['member_id']."', '".$id."','Product',".time().")"); 
		//}
	
	
	return $id;
	}
 
 
  
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
         
  function getProducts($options = array())
  		{
        if(isset($options['pro_id']))
            $this->db->where('pro_id', $options['pro_id']);  
         if(isset($options['pro_status']))
            $this->db->where('pro_status', '1');             
        if(isset($options['user_id']))
            $this->db->where('member_id', $options['user_id']);	
		
		$this->db->select('*');
		
		
		
		$this->db->from($this->db->dbprefix('products'));
				$this->db->join('jb_member', 'jb_products.pro_member_id = jb_member.m_id');

	    $this->db->order_by("pro_add_date", "DESC");
	    $query = $this->db->get();
       // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['pro_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
  
  
   
  

		
  
  
  
  
  function getForms($options = array())
  		{
        if(isset($options['blog_id']))
            $this->db->where('blog_id', $options['blog_id']);  
         if(isset($options['status']))
            $this->db->where('blog_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('products'));
		$this->db->join('so_olx_category', 'so_products.pro_category_id = so_olx_category.c_id');
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
  

   
  function getImageName($id)
	 {
	 $query = $this->db->query("select pro_image from so_products where pro_id='".$id."'");
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
	
		
	
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
        

	
	
	  

		
		
		
	 
	
	 
	 
	 
	 
}
?>
