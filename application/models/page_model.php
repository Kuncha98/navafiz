<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
 #[\AllowDynamicProperties]
class Page_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data)
        {
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
        }

   function getPage($options = array())
	 	{
		if(isset($options['slug']))
            $this->db->where('slug', $options['slug']);
        if(isset($options['status']))
            $this->db->where('status', $options['status']); 

        $this->db->select('*');
		$this->db->from($this->db->dbprefix('page'));
		$this->db->order_by("add_date", "DESC");
		 
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0)
			 {                          
            if(isset($options['slug']))
                return $query->row(0);
            
            return $query->result();
         	}
         else
            return 'empty';
     	}
	 function getProgram($options = array())
	 	{
		if(isset($options['slug']))
            $this->db->where('slug', $options['slug']);
        if(isset($options['status']))
            $this->db->where('status', $options['status']); 

        $this->db->select('*');
		$this->db->from($this->db->dbprefix('degrees'));
		$this->db->order_by("add_date", "DESC");
		 
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0)
			 {                          
            if(isset($options['slug']))
                return $query->row(0);
            
            return $query->result();
         	}
         else
            return 'empty';
     	}	
	 
  
	   function getFaqs(){
         
      
       
        if(isset($options['status']))
            $this->db->where('status', 'active');             
            
        $this->db->select('*');
		$this->db->from('faq');
		 $this->db->order_by("add_date", "DESC");
		//$this->db->limit(4, 1);
		  
         $query = $this->db->get();
     
         if ($query->num_rows() > 0) {                          
         /*   if(isset($options['id']) || isset($options['login_id']))
                return $query->row(0);*/
            
            return $query->result();
         }
         else
            return 'empty';
     }
	
	
	
	
     
	 
	
	
	
	
	
	 
	   
	
	 
}
?>
