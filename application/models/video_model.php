<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
 #[\AllowDynamicProperties]
class Video_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }


    function getTotalVideos($options = array()){
		if($options['search_by'] != "")
			 $query = $this->db->query("SELECT count(*) AS tot_video from `jb_video` where status='active' AND publish_year LIKe '".$options['search_by']."%' ");
		else	 
        	$query = $this->db->query("SELECT count(*) AS tot_video from `jb_video` where status='active'");
       //  echo $this->db->last_query();
        //  if ($query->num_rows() > 0){

        $row = $query->row();
        return $row->tot_video;
       }
	   function getTodayVideos(){
                       
            $today_date=date('Y m d');
         $query = $this->db->query("select count(*) AS total from jb_video where DATE_FORMAT( FROM_UNIXTIME( add_date ) , '%Y %m %d' ) ='$today_date'");
		//$this->db->from('member');
		
		  
         //$query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           
                return $query->row('total');
            
           
         }
         
         
     }
	 function updateVideoView($id)
	 {
		    $query = $this->db->query("UPDATE jb_video SET view = view+1
 				 WHERE id = '".$id."'");
		 
	 }
    function getVideos($options = array()){

        /*if(isset($options['login_id']))
            $this->db->where('login_id', $options['login_id']);

        if(isset($options['id']))
            $this->db->where('id', $options['id']);
        if(isset($options['status']))
            $this->db->where('status', 'active');

        $this->db->select('*');
		$this->db->from('book');*/
        $sql = "SELECT * FROM jb_video WHERE status = 'active' AND publish_year LIKe '".$options['search_by']."%'  ORDER BY id DESC LIMIT ".$options['offset']." , ".$options['limit']."";

        $query = $this->db->query($sql);
        //$query = $this->db->get();
      // echo $this->db->last_query();
        // exit;
        if ($query->num_rows() > 0) {
            if(isset($options['id']) || isset($options['login_id']))
                return $query->row(0);

            return $query->result();
        }
        else
            return 'empty';
    }
   function getAllVideos($options = array()){
                       
        
      
        
        if(isset($options['status']))
        $this->db->where('status', 'active');             
            
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('video'));
		
		
        $this->db->order_by('rand()');
         $query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
                  
           return $query->result();
         }
         else
            return 'empty';
     }
	        
   function geFeaturedVideos($options = array()){
         
      
        if(isset($options['featured']))
            $this->db->where('featured', $options['featured']);  
        if(isset($options['status']))
            $this->db->where('status', 'active');             
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('video'));
		$this->db->limit($options['limit'], 0);
		  
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

    function geLatestVideos($options = array()){



        if(isset($options['status']))
            $this->db->where('status', 'active');

        $this->db->select('*');
        $this->db->from($this->db->dbprefix('video'));
        $this->db->order_by("add_date", "DESC");
        $this->db->limit($options['limit'], 0);

        $query = $this->db->get();
       //   echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            /*   if(isset($options['id']) || isset($options['login_id']))
                   return $query->row(0);*/

            return $query->result();
        }
        else
            return 'empty';
    }


    function geViewedVideos($options = array()){
         
      
        
        
        if(isset($options['status']))
            $this->db->where('status', 'active');             
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('video'));
		 $this->db->order_by("view", "DESC");
		$this->db->limit($options['limit'], 0);
		  
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
    
	 function getVideo($id){

        /*if(isset($options['login_id']))
            $this->db->where('login_id', $options['login_id']);

        if(isset($options['id']))
            $this->db->where('id', $options['id']);
        if(isset($options['status']))
            $this->db->where('status', 'active');

        $this->db->select('*');
		$this->db->from('book');*/
		
        $sql = "SELECT * FROM jb_video WHERE id= '".$id."' AND status = 'active'";

        $query = $this->db->query($sql);
        
    //  echo  $this->db->last_query();
       
        if ($query->num_rows() > 0) {
           return $query->row(0);
		  // return $query->result();
        }
        else
            return 'empty';
    }
	 /*
	 
	 
	 */
	 
	
}
?>
