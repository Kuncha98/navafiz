<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
 #[\AllowDynamicProperties]
class Admin_Page_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
    
	 
	function getPages($options = array())
		{
			//print_r($options);
        if(isset($options['status']))
            $this->db->where('status', '1');             
        if(isset($options['id']))
			  $this->db->where('id', $options['id']);   
			   
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('page'));
		 $this->db->order_by("add_date", "DESC");
		//$this->db->limit(4, 1);
		  
         $query = $this->db->get();
      //   echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
     
     function GetById($id){
         $page = $this->db->get_where('jb_page',array('id'=>$id))->row();
         return $page;
     }
     
     function updatepage($data,$id){
         $this->db->where('id', $id);
         $this->db->update('jb_page', $data);
     }
	
	
     function editPage($options = array()){
		// print_r($options);
		// exit;
		
		if(isset($options['name']))
			$this->db->set('name',$options['name']);
		if(isset($options['descr']))
			$this->db->set('description',$options['descr']);
		$this->db->where('id', $options['id']);
		$this->db->update($this->db->dbprefix('page'));
		$affected_rows = $this->db->affected_rows();
		echo $this->db->last_query();
		return  $affected_rows;
	} 	
	 
	  function addFaq($options = array()){
         $this->db->insert($this->db->dbprefix('faqs'),$options);
         $faq_id = $this->db->insert_id();
		// echo $this->db->last_query();
         return $faq_id;
    }
	
	
}
?>
