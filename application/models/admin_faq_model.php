<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
 #[\AllowDynamicProperties]
class Admin_Faq_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
  
	 
   
        
  
	        
  
	 
	 function getFaqs(){
         
      
       
        if(isset($options['status']))
            $this->db->where('status', 'active');             
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('faq'));
		 $this->db->order_by("add_date", "DESC");
		//$this->db->limit(4, 1);
		  
         $query = $this->db->get();
        // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
         /*   if(isset($options['id']) || isset($options['login_id']))
                return $query->row(0);*/
            
            return $query->result();
         }
         else
            return 'empty';
     }
	 function getfaq($options = array()){
		
	   
         
       if(isset($options['faq_id']))
            $this->db->where('id', $options['faq_id']);  
       
        if(isset($options['status']))
            $this->db->where('status', 'active');             
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('faq'));
		 $this->db->order_by("add_date", "DESC");
		//$this->db->limit(4, 1);
		  
         $query = $this->db->get();
        // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
         /*   if(isset($options['id']) || isset($options['login_id']))
                return $query->row(0);*/
            
            return $query->row(0);
         }
         else
            return 'empty';
     
	   
	   
		
	}
	
	
     function editFaq($options = array()){
		if(isset($options['id']))
			$this->db->set('id',$options['id']);
		if(isset($options['question']))
			$this->db->set('question',$options['question']);
		if(isset($options['answer']))
			$this->db->set('answer',$options['answer']);
		$this->db->where('id', $options['id']);
		$this->db->update($this->db->dbprefix('faq'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		return  $affected_rows;
	} 	
	 
	 		 function delFaq($options = array()){
		
        if(isset($options['faq_id'])){
			//ist delete the user id form the child record table where user_id exist.
			
			$this->db->where('id', $options['faq_id']);
            $this->db->delete($this->db->dbprefix('faq'));
 //echo $this->db->last_query();
 
 
        // return $faq_id;
			
			
        }
     }
	  function addFaq($options = array()){
         $this->db->insert($this->db->dbprefix('faq'),$options);
         $faq_id = $this->db->insert_id();
		 echo $this->db->last_query();
         return $faq_id;
    }
	
	
}
?>
