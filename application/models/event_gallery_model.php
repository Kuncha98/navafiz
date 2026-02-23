<?php
#[\AllowDynamicProperties]
class Event_gallery_model extends CI_Model {

	function addgallery($array){

		$this->db->insert('jb_event_gallery',$array);
	}

	function getImages($options = array())
  		{

        if(isset($options['limit'])){
              $this->db->limit($options['limit']);                 
          }  
	
           $this->db->where('event_id', $options['event_id']);  
		
		
		$this->db->select('*');
		$this->db->from('jb_event_gallery');
		
		$this->db->order_by('event_gallery_id desc');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {                          
           
            return $query->result();
         }
         else
            return 'empty';
     }
}