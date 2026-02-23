<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
 #[\AllowDynamicProperties]
class Admin_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
   function login($table,$where)
        {
	   	$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		//echo "ffffffffffffffffffffff";
		//echo $this->db->last_query();
		//exit;
		return $this->db->get();
	    }
	 
   
	 	 function getSettings(){
	 
          
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('config'));
		
		  
         $query = $this->db->get();
      //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           
            
            return $query->result();
         }
         else
            return false;
     
	 }
         
         function getFormsHappens($options = array())
		
		{
      	if(isset($options['id']))
            $this->db->where('id', $options['id']);  
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('shoutbox'));
		$this->db->join('jb_member', 'jb_shoutbox.sh_member_id = jb_member.m_id');
                $this->db->order_by("add_date", "DESC");
		 if(isset($options['limit']))
		$this->db->limit($options['limit']);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {                          
            if(isset($options['id']) && $options['id'] != "")
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
		}
                
                
                
     function saveSettings($config){
 		$size = sizeof($config);
 		$x=0;
		while($x<$size){
			// $query="UPDATE config SET value='".$config[$x]."' where id='".($x+1)."'";
			$this->db->set('value',$config[$x]);
 		//	$this->db->set('s_descr',$options['descr']);
			$this->db->where('id', ($x+1));
			$this->db->update($this->db->dbprefix('config'));
		$x++;
		}
	}   
     function getUsers($options = array()){
                       
        if(isset($options['login_id']))
            $this->db->where('username', $options['login_id']);  
      
        if(isset($options['id']))
            $this->db->where('id', $options['id']);  
        if(isset($options['password']))
            $this->db->where('password', $options['password']);             
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('admin'));
		
		  
         $query = $this->db->get();
      //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['id']) || isset($options['login_id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return false;
     }
	 
	  function getImageName($id)
	 {
	 $query = $this->db->query("select sh_image from jb_shoutbox where sh_id='".$id."'");
		 //$query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           if( $query->row('sh_image') != ""){
		   
                return $query->row('sh_image');
		   }
		   else
		 		    return "empty";  
           
         }
	 }
	  
	      function getHappens($options = array()){
                       
        if(isset($options['login_id']))
            $this->db->where('username', $options['login_id']);  
      
        if(isset($options['id']))
            $this->db->where('id', $options['id']);  
        if(isset($options['password']))
            $this->db->where('password', $options['password']);             
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('shoutbox'));
		$this->db->join('jb_member', 'jb_shoutbox.sh_member_id = jb_member.m_id');
		
		   $this->db->order_by("add_date", "DESC");
         $query = $this->db->get();
      //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['id']) || isset($options['login_id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return false;
     }
}
?>
