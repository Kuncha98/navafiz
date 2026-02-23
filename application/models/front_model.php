<?php
#[\AllowDynamicProperties]
class Front_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
 
	 
	function getSlider()
		{
        $this->db->where('s_status', '1');   
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('slider'));
		$this->db->order_by("s_add_date", "DESC");
		$query = $this->db->get();
         if ($query->num_rows() > 0) {                          
            if(isset($options['s_id']))
                return $query->row(0);
            
            return $query->result();
         	}
         else
            return 'empty';
     	}
		
	function saveResult($options = array()){
		
		 $query = $this->db->query("SELECT * from jb_poll_answers where pr_user_id='".$this->session->userdata('user_id')."'");
        
		 if ($query->num_rows() > 0){
			//return 0;
			 
		 }else{
		
			$this->db->insert($this->db->dbprefix('poll_answers'),$options);
		 }
		//echo $this->db->last_query();
		//exit;
		//return $id = $this->db->insert_id();
	}
	function getPollAnswers()
		{
        //$this->db->where('s_status', '1');   
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('answers'));
		$this->db->order_by("id", "ASC");
		$query = $this->db->get();
		// echo $this->db->last_query();
      //  exit;
		 if ($query->num_rows() > 0) {                          
            if(isset($options['s_id']))
                return $query->row(0);
            
            return $query->result();
         	}
         else 
            return 'empty';
     	}
        function getPollTotalResults(){
		
	 $this->db->select('count(answer_id)  AS tot_count');
		$this->db->from('jb_answers');
		$this->db->join('jb_poll_answers', 'jb_answers.id = jb_poll_answers.answer_id');

		  // $this->db->order_by("m_id", "DESC");
         $query = $this->db->get();	
		// echo $this->db->last_query();
		   if ($query->num_rows() > 0) {                          
           // if(isset($options['id']) || isset($options['login_id']))
               return $query->row('tot_count');
            
             //return $->tot_member;
         }
         else
            return "empty";
	/*	
	$poll_results = DB::table('poll_results')
		->select('*',DB::raw('count(answer_id) as count'))
         ->Join('poll_answers', 'poll_results.answer_id', '=', 'poll_answers.pans_id')
				->groupBy('poll_results.answer_id')
				
            	->get();*/
		
		}
	    function getPollResults(){
			/*$total_poll_results = DB::table('poll_results')
		->select('*',DB::raw('count(answer_id) as count'))
            	//->leftJoin('teams', 'points.po_team_id', '=', 'teams.id')
				//->groupBy('answer')
			//->join('points as t2', 'schedules.sc_team_b', '=', 't2.id' )
          	->count(); */
	 $this->db->select('count(answer_id)  AS tot_count,answer');
		$this->db->from('jb_answers');
		$this->db->join('jb_poll_answers', 'jb_answers.id = jb_poll_answers.answer_id');
$this->db->group_by("jb_poll_answers.answer_id", "DESC");
		  // $this->db->order_by("m_id", "DESC");
         $query = $this->db->get();	
		// echo $this->db->last_query();
		   if ($query->num_rows() > 0) {                          
           // if(isset($options['id']) || isset($options['login_id']))
               return $query->result();
            
             //return $->tot_member;
         }
         else
            return "empty";
	/*	
	$poll_results = DB::table('poll_results')
		->select('*',DB::raw('count(answer_id) as count'))
         ->Join('poll_answers', 'poll_results.answer_id', '=', 'poll_answers.pans_id')
				->groupBy('poll_results.answer_id')
				
            	->get();*/
		}
		
	  function getFeaturedProject($options = array()){
                       
          if(isset($options['project_id']))
            $this->db->where('p_id', $options['project_id']);  
         if(isset($options['status']))
            $this->db->where('p_status', '1');             
          
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('projects'));
		$this->db->join('ka_project_images', 'ka_projects.p_id = ka_project_images.project_id'); 
		 $this->db->order_by("p_add_date", "DESC");
		$this->db->limit(4, 0);
		  
         $query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['slug']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }	
		       
   function getServices($options = array()){
                       
          if(isset($options['service_id']))
            $this->db->where('s_id', $options['service_id']);  
         if(isset($options['s_status']))
            $this->db->where('s_status', '1');             
        /*   if(isset($options['parent_id']))
		  $this->db->where('parent_id !=', 0);*/
		    if(isset($options['slug']))
            $this->db->where('slug', str_replace("-"," ",$options['slug']));     
		    
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('services'));
		
		 $this->db->order_by("s_add_date", "DESC");
		//$this->db->limit(6, 0);
		  
         $query = $this->db->get();
       //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['slug']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }	
	 function getClients($options = array()){
                       
          if(isset($options['client_id']))
            $this->db->where('c_id', $options['client_id']);  
          if(isset($options['c_status']))
            $this->db->where('c_status', '1');             
       		    
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('clients'));
		
		 $this->db->order_by("c_add_date", "DESC");
		//$this->db->limit(6, 0);
		  
         $query = $this->db->get();
       //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['client_id']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }		
		
		
		
  function getPortfolio($options = array()){
                       
          if(isset($options['p_id']))
            $this->db->where('p_id', $options['p_id']);  
       //  if(isset($options['status']))
            $this->db->where('p_status', '1');             
          
		    if(isset($options['slug']))
            $this->db->where('slug', str_replace("-"," ",$options['slug']));     
		    
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('projects'));
		
		 $this->db->order_by("p_add_date", "DESC");
		//$this->db->limit(6, 0);
		  
         $query = $this->db->get();
   //   echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['slug']) )
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
     }	
		
		
	   function addContact($options = array()){
		   
		    
		   
		    $from          = $options['email'];
      $subject     = "Quote from this Cell Phone ". $options['phone']."";
      $messageText = "Dear admin,
      <br><br><br>
        ".$options['message'].";
      <br>
      Regards,
      <br><br>
      ".$options['name']."
      <br><br>
     
      <br>";

    
	$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com', //
            'smtp_port' => 465,        
            'smtp_user' => SMTP_USER, //
            'smtp_pass' => SMTP_PASSWORD, //
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE        
        );   

      $config['newline'] = "\r\n";
      $config['crlf']    = "\r\n";
/**/
      $this->load->library("email",$config);
      $this->email->set_newline("\r\n");
      $this->email->from($from);
      $this->email->to('navafizweb@gmail.com');
      $this->email->subject($subject);
      $this->email->message($messageText);

      if($this->email->send()) {
		  return 1;
   
      
      } 
		   
		   
      
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




		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
	 
	
}
?>
