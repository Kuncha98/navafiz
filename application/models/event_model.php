<?php
#[\AllowDynamicProperties]
class Event_Model extends CI_Model {
    
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'events';
        $this->table_id = 'e_id';
    }
    
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
  
  	 
    function getRecentEvents($options = array()){
        if(isset($options['e_id']))
            $this->db->where('e_id', $options['e_id']);  
         //if(isset($options['status']))
            $this->db->where('e_status', '1');             
            $this->db->select('*');
                $this->db->from($this->db->dbprefix('events'));
                //$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
                //$this->db->join('jb_member', 'jb_jobs.j_addedby = jb_member.m_id','left');
                $this->db->order_by("add_date", "DESC");
                $this->db->limit(4, 0);
                //$this->db->group_by("m_id", "DESC");
            $query = $this->db->get();
       // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['j_id']) )
                return $query->row(0);

            return $query->result();
         }
         else
            return 'empty';
    }
    
    function addJob($options = array()){
        $this->db->insert($this->db->dbprefix('jobs'),$options);		
    }
    
    function getEvents($options = array()){
        if(isset($options['limit']) && isset($options['offset']))
            $this->db->limit($options['limit'],$options['offset']);
        if(isset($options['limit']))
            $this->db->limit($options['limit']);   	
        if(isset($options['e_id']))
            $this->db->where('e_id', $options['e_id']);
        
		if(isset($options['e_status']))
                    $this->db->where('e_status', 1);             
                    $this->db->select('*');
                    $this->db->from($this->db->dbprefix('events'));
                    //$this->db->join('jb_categories', 'jb_events.cat_id = jb_categories.c_id');
                    //$this->db->join('jb_member', 'jb_events.j_addedby = jb_member.m_id','left');
                    $this->db->order_by("add_date", "DESC");
                    $query = $this->db->get();
                    //echo $this->db->last_query();
                if ($query->num_rows() > 0) {                          
            if(isset($options['e_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
    
    function getEventImages($options = array()){
        
        if(isset($options['e_id']))
            $this->db->where('event_id', $options['e_id']);
		  
          
		if(isset($options['status']))
            $this->db->where('status', 1);             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('gallery'));
		$this->db->join('jb_events', 'jb_gallery.event_id = jb_events.e_id');
		//$this->db->join('jb_member', 'jb_events.j_addedby = jb_member.m_id','left');
		$this->db->order_by("jb_gallery.add_date", "DESC");
		$query = $this->db->get();
		//echo $this->db->last_query();
        if ($query->num_rows() > 0) {                          
         //   if(isset($options['e_id']) )
           //     return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     
    }
    
    function getTotalEvents($options = array()){		
        if(isset($options['cat_id']) && $options['cat_id'] != "")
          $where = "where cat_id = ".$options['cat_id']." AND e_status = '1'";
		else
		$where = "where e_status = '1'";  
            // $query = $this->db->query("SELECT count(*) AS tot_job from `jb_jobs` where j_status=1");
	   $query = $this->db->query("SELECT count(*) AS tot_job from `jb_events`".$where);
            $row = $query->row();
            // echo $this->db->last_query();
            return $row->tot_job;
    }
    
    function delCategory($options = array()){
        if(isset($options['c_id'])){
            $this->db->where('c_id', $options['c_id']);
            $this->db->delete($this->db->dbprefix('categories'));
        }
    }	

    function updateCategoryStatus($id,$status){
        if($status == 0)
            $fstatus = '1';
	else
            $fstatus = '0';
            $this->db->set('c_status',$fstatus);
            $this->db->where('c_id', $id);  
            $this->db->update($this->db->dbprefix('categories')); 
            // echo $this->db->last_query(); 	
            
        return $this->db->affected_rows();  				
    }			
	
	
        function editCategory($options = array()){
		
		if(isset($options['name']))
			$this->db->set('c_name',$options['name']);
				
		$this->db->where('c_id', $options['c_id']);
		$this->db->update($this->db->dbprefix('categories'));
		$affected_rows = $this->db->affected_rows();
	//	echo $this->db->last_query();
		return  $affected_rows;
	} 
	
  function getForms($options = array())
  		{
        if(isset($options['j_id']))
            $this->db->where('j_id', $options['j_id']);  
         if(isset($options['status']))
            $this->db->where('j_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('jobs'));
		$this->db->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id');
		$this->db->order_by("j_add_date", "DESC");
		//$this->db->group_by("m_id", "DESC");
	    $query = $this->db->get();
       // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['j_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }	
	
 function updateFormStatus($id,$status)
  	{
    if($status == 0)
	 	$fstatus = '1';
	else
		$fstatus = '0';
	$this->db->set('j_status',$fstatus);
	$this->db->where('j_id', $id);  
	 $this->db->update($this->db->dbprefix('jobs')); 
	// echo $this->db->last_query(); 	
	 return $this->db->affected_rows();  				
	}	
	
	
	  function editForm($options = array()){
		
		if(isset($options['title']))
			$this->db->set('j_title',$options['title']);
			
		if(isset($options['cat_id']))
			$this->db->set('cat_id',$options['cat_id']);
		
		if(isset($options['descr']) && $options['descr'] !="")
			$this->db->set('j_descr',$options['descr']);
				
		$this->db->where('j_id', $options['j_id']);
		$this->db->update($this->db->dbprefix('jobs'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		return  $affected_rows;
	} 
function getImageName($id)
	 {
	 $query = $this->db->query("select c_image from oc_courses where c_id='".$id."'");
		 //$query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           if( $query->row('c_image') != ""){
		   
                return $query->row('c_image');
		   }
		   else
		 		    return "empty";  
           
         }
	 }	
function getModuleName($id)
	 {
	 $query = $this->db->query("select d_name from oc_modules where d_id='".$id."'");
		 //$query = $this->db->get();
        // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           if( $query->row('d_name') != ""){
		   
                return $query->row('d_name');
		   }
		   else
		 		    return "empty";  
           
         }
	 }		 
	function delForm($options = array())
	    {
		if(isset($options['j_id']))
            {
			$this->db->where('j_id', $options['j_id']);
            $this->db->delete($this->db->dbprefix('jobs'));
	        }
        }
		
		
		 function getModuleForms($options = array())
  		{
        if(isset($options['id']))
            $this->db->where('d_id', $options['id']);  
         if(isset($options['status']))
            $this->db->where('d_status', '1');             
            $this->db->select('*');
		$this->db->from($this->db->dbprefix('modules'));
		$this->db->join('oc_courses', 'oc_modules.course_id = oc_courses.c_id');
		//$this->db->join('oc_lessons', 'oc_modules.mo_id = oc_lessons.l_module_id','left');
	    $this->db->order_by("c_add_date", "DESC");
	    $query = $this->db->get();
      // echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }
	 
	  function addModuleForm($options = array(),$table)
	 	{
		$this->db->insert($this->db->dbprefix($table),$options);
		//echo $this->db->last_query();
		$id = $this->db->insert_id();
		return $id;
		}
		
	 
    
    
    public function GetAll()
    {        
        $results = $this->db->order_by($this->table_id, 'DESC')->get($this->table_name)->result();
        return $results;
    }
    
    
    public function GetById($id)
    {        
        $user = $this->db->get_where($this->table_name,array($this->table_id=>$id))->row();
        return $user;
    }
    
    public function GetByUserId($id)
    {        
        $user = $this->db->get_where($this->table_name,array('member_id'=>$id))->row();
        return $user;
    }
    
    public function Search($where)
    {        
        $orWhere = '';
        if(array_key_exists('order_status',$where))
        {                        
            if(!empty($where['order_status'])){
                $orWhere .= 'order_status = "'.$where['order_status'].'"';
            }  
            
            //$orWhere .= 'address_line_1 like "%'.$where['filter'].'%" or ';
            //$orWhere .= 'city  like "%'.$where['filter'].'%" or ';            
            unset($where['order_status']);
        }        
        
        $this->db->where($where);
            
        if($orWhere!=''){
            $this->db->where($orWhere);
        }
        
        $this->db->order_by($this->table_id, 'DESC');
        $results =  $this->db->get($this->table_name)->result();
        
        return $results;
        
    }
    public function CountSearch($where)
    {        
        $this->db->where($where);            
        $results = $this->db->count_all_results($this->table_name);
        
        //$results =  $this->db->get($this->table_name)->result();
        
        return $results;
        
    }
    
    public function Save($data,$id=0)
    {
        if($id==0){
            $this->db->insert($this->table_name, $data);
            $id = $this->db->insert_id();            
        }else{
            $this->db->where($this->table_id, $id);
            $this->db->update($this->table_name, $data);
        }
        
        return $id;
    }
    
    public function Delete($id){        
        
        $this->db->where($this->table_id,$id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }   
    
    public function DeleteByUserid($member_id){        
        
        $this->db->where('member_id',$member_id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }   

	
	 
	
}
?>
