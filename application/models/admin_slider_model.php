<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
 #[\AllowDynamicProperties]
class Admin_Slider_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
	
	 function addSlide($options = array())
	 	{
		if(isset($options['s_image']) && $options['s_image'] != "" ){
			$arr = explode(",", $options['s_image']);
		if(sizeof($arr)>1){
			for($a=0;$a<sizeof($arr); $a++)
				{
				$data = array(
               		's_name' => $options['s_name'],
               		's_image' => $arr[$a],
               		's_add_date' => time()
           		 );
			$this->db->insert('slider', $data); 	
				}
			}
			else{
				  $this->db->insert($this->db->dbprefix('slider'),$options);
			$faq_id = $this->db->insert_id();
			return $faq_id;
			}
		 }
			
     	
		
		
    	}
	function getTotalSlides($options = array())
   		{ $query = $this->db->query("SELECT count(*) AS total from ka_slider Where s_status = 1");
		 if ($query->num_rows() > 0)
		 	{                          
            return $query->row('total');
         	}}
	
	function getSlides($options = array())
		{
        if(isset($options['s_status']) && $options['s_status'] != "" )
            $this->db->where('s_status', $options['s_status']);             
        if(isset($options['slide_id']))
			$this->db->where('s_id',$options['slide_id']);   
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('slider'));
		//$this->db->join('dt_locations', 'dt_members.location_id = dt_locations.group_id'); 
		$this->db->order_by("s_id", "ASC");
		 if(isset($options['limit']) && isset($options['offset']))
		$this->db->limit($options['limit'],$options['offset'] );
	    $query = $this->db->get();
      //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['slide_id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
         }
	
	

	 
		
	 function editSlide($options = array()){
		if(isset($options['s_status']))
			$this->db->set('s_status',$options['s_status']);
		if(isset($options['s_name']))
			$this->db->set('s_name',$options['s_name']);
		if(isset($options['s_image']) && $options['s_image'] )
			$this->db->set('s_image',$options['s_image']);
		
			
		
		$this->db->where('s_id', $options['slide_id']);
		$this->db->update($this->db->dbprefix('slider'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		
		
		
		//echo $this->db->last_query();
		return  $affected_rows;
	}
	
	
	
	
	//array('assignment_id' => $this->input->post('assignment_id'),'translator_id' => $this->input->post('translator_id'),'admin_id' => $this->input->post('admin_id')));
   

		
		 function updateSlideStatus($s_id,$status)
  	{
    if($status == 0)
	 	$fstatus = '1';
	else
		$fstatus = '0';
	$this->db->set('s_status',$fstatus);
	$this->db->where('s_id', $s_id);  
	 $this->db->update($this->db->dbprefix('slider')); 
	// echo $this->db->last_query(); 	
	 return $this->db->affected_rows();  				
	}	
	
	
	function delSlide($options = array())
	    {
		if(isset($options['slide_id']))
            {
			$this->db->where('s_id', $options['slide_id']);
            $this->db->delete($this->db->dbprefix('slider'));
		//	echo $this->db->last_query();
             }
        }
	
	
		
	}
?>
