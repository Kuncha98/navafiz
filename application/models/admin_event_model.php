<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
 #[\AllowDynamicProperties]
class Admin_Event_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
    
    public function Search($where)
    {        
        $orWhere = '';
        if(array_key_exists('status',$where))
        {                        
            if(!empty($where['status'])){
                $orWhere .= 'status = "'.$where['status'].'"';
            }              
            //$orWhere .= 'address_line_1 like "%'.$where['filter'].'%" or ';
            //$orWhere .= 'city  like "%'.$where['filter'].'%" or ';            
            unset($where['status']);
        }        
        
        $this->db->where($where);
            
        if($orWhere!=''){
            $this->db->where($orWhere);
        }
        $this->db->order_by('e_id', 'DESC');
        $results =  $this->db->get('jb_events')->result();
        return $results;
        
    }
    
    
  function addEvent($options = array()){
         $this->db->insert($this->db->dbprefix('events'),$options);
         $faq_id = $this->db->insert_id();
		 echo $this->db->last_query();
         return $faq_id;
    }
	  function getBook($options = array()){
                       
        if(isset($options['book_id']))
            $this->db->where('id', $options['book_id']);  
      
          
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('book'));
		
		
		  
         $query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           
                return $query->row(0);
            
           // return $query->result();
         }
         
     }
	 
   function getEvents($options = array()){
                       
       if(isset($options['event_id']))
            $this->db->where('e_id', $options['event_id']);  
      
        
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('events'));
		
		  
         $query = $this->db->get();  
/* $sql = "SELECT * FROM al_events";
       $query = $this->db->query($sql);*/
      /// echo $this->db->last_query(); 	
         if ($query->num_rows() > 0) {
            if(isset($options['event_id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }

  
	 

	 function updateFeaturedStatus($book_id,$featured_status)
  	{
   if($featured_status == 0)
	 	$fstatus = '1';
	else
		$fstatus = '0';
/*	$this->db->set('featured',$fstatus);
	$this->db->where('id', $book_id);  
	$this->db->update($this->db->dbprefix('book')); */
		$this->db->where('newsletter', 1);  
 		$this->db->select('*');
		$this->db->from($this->db->dbprefix('member'));
		$query = $this->db->get();	
	    foreach($query->result() as $row){
			/* $this->db->select('id,fullname,avatar');
			 $this->db->from($this->db->dbprefix('members'));
			 $this->db->where('id = ', $row->friend_id);
			$query2 = $this->db->get();
			$row2 = $query2->row();
			  $data['members'][$newsImageCount]['id'] = $row2->id;
			  $data['members'][$newsImageCount]['avatar'] = $row2->fullname;
			  $data['members'][$newsImageCount]['pic']  = $row2->avatar;
			  $newsImageCount++;*/
			
			
			$this->db->query("insert into `al_member_newsletter`  (newsletter_id, member_id,add_date) values('".$book_id."', '".$row->id."',".time().")"); 
			
			
		}
	  $this->db->query("update `al_newsletter`  set status='".$fstatus."' where id = '".$book_id."'"); 
	
	// echo $this->db->last_query(); 	
	 //return $this->db->affected_rows();  				
	}
	
	
	function updateEvent($options = array())
	{
		
		
		if(isset($options['title']))
			$this->db->set('title',$options['title']);
		if(isset($options['event_date']))
			$this->db->set('event_date',$options['event_date']);
		if(isset($options['descr']))
			$this->db->set('description',$options['descr']);
		
		
		
		$this->db->where('e_id', $options['event_id']);
		$this->db->update($this->db->dbprefix('events'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		return  $affected_rows;
	
	}
	function getProgramUsers($options = array()){
                       
        if(isset($options['status']))
            $this->db->where('e_status', 1);  
      
        if(isset($options['id']))
            $this->db->where('id', $options['id']);  
                  
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('member'));
		$this->db->join('jb_programuser', 'jb_member.m_id = jb_programuser.pu_member_id'); 
		$this->db->join('jb_events', 'jb_programuser.pu_event_id = jb_events.e_id');  
         $query = $this->db->get();
      //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return "empty";
     }
	  function delProgramUsers($options = array()){
		
        if(isset($options['pu_id'])){
			
			$this->db->where('pu_id', $options['pu_id']);
            $this->db->delete($this->db->dbprefix('programuser'));
			
			
 //echo $this->db->last_query();
 
 
        // return $faq_id;
			
			
        }
     }

    function GetCountries(){
        $query = $this->db->query('select * from jb_country');
        $res = $query->result();
        return $res;
    } 
    function delEvent($options = array()){
		
        if(isset($options['event_id'])){
			
			$this->db->where('e_id', $options['event_id']);
            $this->db->delete($this->db->dbprefix('events'));
			
			
 //echo $this->db->last_query();
 
 
        // return $faq_id;
			
			
        }
     } 	
	
}
?>
