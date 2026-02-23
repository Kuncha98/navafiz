<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
 #[\AllowDynamicProperties]
class Admin_Gallery_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }

   function getCGallery()
   {
	    //$this->db->where('cat_id !=', 0);

        $this->db->select('*');
		$this->db->from($this->db->dbprefix('cgallery'));
		
		
		  
         $query = $this->db->get();
       //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           
            
            return $query->result();
         }
         
     
   }

    function getCats()
    {
       // $this->db->where('cat_id !=', 0);

        $this->db->select('*');
        $this->db->from($this->db->dbprefix('cgallery'));



        $query = $this->db->get();

        if ($query->num_rows() > 0) {


            return $query->result();
        }


    }
	 
   function getGallery($options = array()){
                       
       
 $sql = "SELECT * FROM jb_imagelibrary ORDER BY id DESC";
       $query = $this->db->query($sql);
         //$query = $this->db->get();
        //echo $this->db->last_query();
      
         if ($query->num_rows() > 0) {
            if(isset($options['id']) || isset($options['product_id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }

	 function getProduct($pid){
                       
       
 $sql = "SELECT * FROM ct_products WHERE id = $pid";
       $query = $this->db->query($sql);
       
         echo $this->db->last_query();
      
         if ($query->num_rows() > 0) {
           
                return $query->row(0);
            
           
         }
         else
            return 'empty';
     }
	  	
	 function getImageName($mag_id)
	{
		 
           
           
         $query = $this->db->query("select image from jb_gallery where id='".$mag_id."'");
		
         if ($query->num_rows() > 0) {                          
           if( $query->row('image') != ""){
		   
                return $query->row('image');
		   }
		   else
		 		    return "empty";  
           
         }
		 
         
         
     
	 }
	  function addForm($options = array()){
         $this->db->insert('jb_imagelibrary',$options);
         $tasbeeh_id = $this->db->insert_id();
		  return $tasbeeh_id;
    }

     function editProduct($options = array()){
	
		if(isset($options['name']))
			$this->db->set('name',$options['name']);
			if(isset($options['cat_id']))
			$this->db->set('cat_id',$options['cat_id']);
           if(isset($options['descr']))
               $this->db->set('description',$options['descr']);
		if(isset($options['product_image_name']) && $options['product_image_name'] != "" )
			$this->db->set('image',$options['product_image_name']);
		$this->db->where('id', $options['product_id']);
		$this->db->update($this->db->dbprefix('products'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		return  $affected_rows;
	} 	
	 function delGallery($options = array()){
		
        if(isset($options['gallery_id'])){
		
			
			$this->db->where('id', $options['gallery_id']);
            $this->db->delete('gallery');

			
			
        }
     } 	

	
}
?>
