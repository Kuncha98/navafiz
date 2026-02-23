<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
 #[\AllowDynamicProperties]
class Admin_Video_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }


    function getTotalVideos(){

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
    function getVideos($options = array()){

        /*if(isset($options['login_id']))
            $this->db->where('login_id', $options['login_id']);

        if(isset($options['id']))
            $this->db->where('id', $options['id']);
        if(isset($options['status']))
            $this->db->where('status', 'active');

        $this->db->select('*');
		$this->db->from('book');*/
       // $sql = "SELECT * FROM jb_video WHERE status = 'active' ORDER BY id DESC LIMIT ".$options['offset']." , ".$options['limit']."";
 $sql = "SELECT * FROM jb_video ORDER BY id DESC";
        $query = $this->db->query($sql);
        //$query = $this->db->get();
        //echo $this->db->last_query();
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
		
		
		  
         $query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
                  
            return $query->row();
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
		$this->db->limit(4, 1);
		  
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
     
     function getVideoById($id){
        $video = $this->db->get_where('jb_video',array('id'=>$id))->row();
        return $video;
     }
     
     function update_video($id,$data){
           $this->db->where('id', $id);
            $this->db->update('jb_video', $data);
     }
  
     function geLatestVideos($options = array()){



        if(isset($options['status']))
            $this->db->where('status', 'active');

        $this->db->select('*');
        $this->db->from($this->db->dbprefix('video'));
        $this->db->order_by("add_date", "DESC");
        $this->db->limit($options['limit'], 1);

        $query = $this->db->get();
        //  echo $this->db->last_query();
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
		$this->db->limit(4, 1);
		  
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
        
     // echo  $this->db->last_query();
       
        if ($query->num_rows() > 0) {
           return $query->row(0);
		  // return $query->result();
        }
        else
            return 'empty';
    }
	 function addVideo($options = array()){
         $this->db->insert($this->db->dbprefix('video'),$options);
         $faq_id = $this->db->insert_id();
		// echo $this->db->last_query();
         return $faq_id;
    }
	function updateFeaturedStatus($video_id,$featured_status)
  	{
    if($featured_status == 0)
	 	$fstatus = 'yes';
	else
		$fstatus = 'no';
	$this->db->set('featured',$fstatus);
	$this->db->where('id', $video_id);  
	 $this->db->update($this->db->dbprefix('video')); 
	 echo $this->db->last_query(); 	
	 return $this->db->affected_rows();  				
	}
	 
	 function delVideo($options = array()){
		
        if(isset($options['video_id'])){
			//ist delete the user id form the child record table where user_id exist.
			
			$this->db->where('id', $options['video_id']);
            $this->db->delete('jb_video');
 //echo $this->db->last_query();
 
 
        // return $faq_id;
			
			
        }
     }

}
?>
