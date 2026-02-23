<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
class Member_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
  
  function addCvResponse($options = array())
 {
	$this->db->insert($this->db->dbprefix('responsecvreview'),$options);
//	echo $this->db->last_query();
		$id = $this->db->insert_id();
		return $id; 
 } 
  
	 
    function loginAjax($options = array()){
	
		 $query = $this->db->query("SELECT * from jb_member where m_email='".$options['email']."' and m_password='".$options['password']."'  and m_status=1");
        
		 if ($query->num_rows() > 0){
			
			$user =$query->row(); 
			
		 $query2 = $this->db->query("UPDATE jb_member SET m_last_login= '".time()."' WHERE m_id = '".$user->m_id."'");
		//	  $query2->row(); 
           // echo $this->db->last_query();
			$user_session_data = array(
                   'user_id'   	 => $user->m_id,
                   'email' 		 => $user->m_email,
				   'login_type'  => "normal",
				   'cat_id'   	 => $user->m_category,
				   'name'        => $user->m_name,
				   'cv'        => $user->member_cv,
				   'facebook_id'        => $user->facebook_id,
				   'avatar'        => $user->m_avatar,
                                     
             );
            $this->session->set_userdata($user_session_data);
           return 1;
            //redirect(base_url());
            }else{
                return 0;
				//redirect(base_url());
            }
	
     
	}
function checkEmailAvailable($options = array())
	{
	$query = $this->db->query("SELECT * from jb_member where m_email='".$options['email']."'");
    if ($query->num_rows() > 0)
		echo 1;	
	else
		echo 0;		
   	}
function registerProgram($options = array())
	{
	$query = $this->db->query("SELECT * from jb_programuser where pu_event_id ='".$options['pu_event_id']."'  AND pu_member_id='".$this->session->userdata('user_id')."'");
  //  echo $this->db->last_query();
    if ($query->num_rows() > 0)
		echo 0;	
	else{
		$this->db->insert($this->db->dbprefix('programuser'),$options);
			
			$id = $this->db->insert_id();
		echo 1;	
	}
	}
function registerAjax($options = array()){
	
	  if($options['facebook_id'] != "")
	  	{
		
		
			
		$query1 = $this->db->query("SELECT * from jb_member where m_email='".$options['m_email']."'");
      	if ($query1->num_rows() > 0){
			  $query = $this->db->query("UPDATE jb_member SET facebook_id= '".$options['facebook_id']."'
			  WHERE m_email = '".$options['m_email']."'");
			  
			  $user =$query1->row(); 
	        $user_session_data = array(
                   'user_id'   	 => $user->m_id,
                   'email' 		 => $user->m_email,
				   'login_type'  => $user->facebook_id,
				   'cat_id'   	 => $user->m_category,
				   'name'        => $user->m_name,
				   'facebook_id'        => $user->facebook_id,
                                     
             );
            $this->session->set_userdata($user_session_data);
			
			
		return 0;
			  
		}
		else{
			$this->db->insert($this->db->dbprefix('member'),$options);
			
			$id = $this->db->insert_id();
			
	        $user_session_data = array(
                   'user_id'   	 => $id,
                   'email' 		 => $options['m_email'],
				   'login_type'  => "facebook",
				   'cat_id'   	 => "",
				   'name'        => $options['m_name'],
				  
                                     
             );
            $this->session->set_userdata($user_session_data);
			
			
			return 1;
			//return $id;
			}
		
	  	}

	  else
	  
	  {
		 // echo "aaaaaaaaaaaaaaaaaaaaa";
	    $query1 = $this->db->query("SELECT m_email from jb_member where m_email='".$options['m_email']."'");
      	 if ($query1->num_rows() > 0){
			   echo "exitssssss";
			return 0;
		
		 }else{
			 
		// echo "bbbbbbbbbbbbbbbbbbbbbbb";
			$this->db->query("INSERT INTO jb_member (m_name, m_email, m_password, m_add_date) VALUES ('".$options['m_name']."', '".$options['m_email']."', '".$options['m_password']."',  '".time()."')"); 
			
	//	echo $this->db->last_query();
 // exit;
    $user_id = $this->db->insert_id();
	  
	  
      $mail_send_text = md5(uniqid(rand(), true));

      $to          = $options['m_email'];
      $subject     = "Thanks ".$options['m_name']."";
	  	$messageText .= '<html><body>';
      $messageText .= "Dear ".$options['m_name'].",
      <br><br><br>
        Thank you very much for registering in Navafiz!
      <br><br>
      Please click the link to activate  your account or copy and paste the url in the browser: ".base_url()."accountverify/".$mail_send_text."
      <br>
      Regards,
      <br><br>
      The Navafiz Team
      <br><br>
      *This message was sent by an automated mail server. Please do not reply.
      <br>";

   $messageText .= "'</html></body>"; 
	 $config = array(
        'protocol'  => 'smtp',
        'smtp_host' => 'host256.hostmonster.com',		
        'smtp_port' => 25,
        'smtp_user' => 'register@navafiz.com',
        'smtp_pass' => 'V(fJh()VT68F',
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1'
      );
	  
      $config['newline'] = "\r\n";
      $config['crlf']    = "\r\n";

      $this->load->library("email",$config);
	   $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");
      $this->email->from('register@navafiz.com');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($messageText);
//echo "cccccccccccccccccccccccccccccccccccccc";
	//exit;
      if($this->email->send()) {
        $query = $this->db->query("UPDATE jb_member SET m_verification = '".$mail_send_text."' WHERE m_id = '".$user_id."'");
        if($this->db->affected_rows()){
        
	   
		  return 1;
		}
	  } else {
        show_error($this->email->print_debugger());
       
	  
	  
	    return 0;
      }
    
	
		 
		 }
}
   }
     public function verifyLink($options = array())
  {
    $query = $this->db->query("SELECT * from jb_member where m_is_used = '0' AND m_verification='".$options['verification']."'");
   // echo $this->db->last_query();
	if ($query->num_rows() > 0) {
      $query = $this->db->query("UPDATE jb_member SET m_status = '1'  , m_is_used = '1' WHERE m_verification = '".$options['verification']."'");

      if($this->db->affected_rows())
        return 1;
    }
  }
  
 public function updateReviewStatus($options = array())
  {
  
  
	
      $query = $this->db->query("UPDATE jb_cvreview SET cv_status = '0' WHERE cv_id = '".$options['cv_id']."'");

      if($this->db->affected_rows())
        return 1;
    
  }
 function addShout($options = array())
 {
	$this->db->insert($this->db->dbprefix('shoutbox'),$options);
//	echo $this->db->last_query();
		$id = $this->db->insert_id();
		return $id; 
 }
 
  function addMemberSkill($options = array())
 {
	$this->db->insert($this->db->dbprefix('member_skills'),$options);
//	echo $this->db->last_query();
		$id = $this->db->insert_id();
		return $id; 
 }
 
  function updateMemberSkill($options = array())
   		{

	
//echo "mmmmmmmmmmmmm";
		//exit;
		if(isset($options['m_skills']))
			$this->db->set('m_skills',$options['m_skills']);		
			
			
		
		
				
		
		
		$this->db->where('m_id', $this->session->userdata('user_id'));
		$this->db->update($this->db->dbprefix('member'));
		$affected_rows = $this->db->affected_rows();
		echo $this->db->last_query();
		return  $affected_rows;
		
				
		
		 
		 }
 function addMemberEducation($options = array())
 {
	$this->db->insert($this->db->dbprefix('member_education'),$options);
//	echo $this->db->last_query();
		$id = $this->db->insert_id();
		return $id; 
 }
 
 function updateMemberEducation($options = array())
   		{

	
//echo "mmmmmmmmmmmmm";
		//exit;
		if(isset($options['me_degree']))
			$this->db->set('me_degree',$options['me_degree']);		
			
		if(isset($options['me_year']))
			$this->db->set('me_year',$options['me_year']);		
		
		if(isset($options['me_descr']))
			$this->db->set('me_descr',$options['me_descr']);		
				
		
		
		$this->db->where('me_id', $options['me_id']);
		$this->db->update($this->db->dbprefix('member_education'));
		$affected_rows = $this->db->affected_rows();
//		echo $this->db->last_query();
		return  $affected_rows;
		
				
		
		 
		 }
  
function addMemberJob($options = array())
	{
	$this->db->insert($this->db->dbprefix('member_jobs'),$options);
	echo $this->db->last_query();
	$id = $this->db->insert_id();
	return $id; 
 	}

  function updateMemberJob($options = array())
   		{


//echo "mmmmmmmmmmmmm";
		//exit;
		if(isset($options['je_name']))
			$this->db->set('je_name',$options['je_name']);		
		if(isset($options['je_year']))
			$this->db->set('je_year',$options['je_year']);		
		if(isset($options['je_toyear']))
			$this->db->set('je_toyear',$options['je_toyear']);	
		if(isset($options['je_descr']))
			$this->db->set('je_descr',$options['je_descr']);		
				
		
		
		$this->db->where('je_id', $options['je_id']);
		$this->db->update($this->db->dbprefix('member_jobs'));
		$affected_rows = $this->db->affected_rows();
		//echo $this->db->last_query();
		return  $affected_rows;
		
				
		
		 
		 }
function forgotpassword($options = array())
	{
	$empty_arr = array();  
    $query1 = $this->db->query("SELECT * from jb_member where m_email='".$options['email']."'");
     // echo $this->db->last_query();
	//exit;
	if ($query1->num_rows() > 0){
		$row = $query1->row(0);
		$mail_send_text = "";
	  $to          = $options['email'];
      $subject     = "Forget password ".$row->m_name."";
      $messageText = "Dear ".$row->m_name.",
	  <br>
	  <br>
	  Your password inforamtion is.\n\n
      
	  <br><br>
	  
       password: ".$row->m_password." 
      
     <br><br>
      
      Regards,
      
      The Navafiz Team
      
      *This message was sent by an automated mail server. Please do not reply.
      ";
     
	 $config = array(
        'protocol'  => 'smtp',
        'smtp_host' => 	'ssl://mail.navafiz.com',		//'ssl://smtp.secureserver.net',					//'ssl://ureserver.net',
        'smtp_port' => 465,
        'smtp_user' => 'register@navafiz.com',
        'smtp_pass' => 'TXC$Rl]0[vUM',
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1'
      );
	  
	  
	  
	  
	  
      $config['newline'] = "\r\n";
      $config['crlf']    = "\r\n";
	  
	  
	  

  $this->load->library("email",$config);
   $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");
      $this->email->from('register@navafiz.com');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($messageText);

      if($this->email->send()) {
      
         return 1;
      } else {
        show_error($this->email->print_debugger());
      
      }
    	
   }
   else{
	   
   	  echo 'false';
   }
	
	} 
	
   
function JobAlert()
	{
	$today_date=date('Y m d');
	$query1 = $this->db->query("SELECT * from jb_jobs where DATE_FORMAT( FROM_UNIXTIME(j_add_date) , '%Y %m %d' ) ='$today_date'");
    if ($query1->num_rows() > 0){
		$jobs = $query1->result();
		foreach($jobs as $job)
			{
			$cat_id = $job->cat_id;	
			//echo $job_title = $job->j_title;	
			//echo $job->j_title;
			$query2 = $this->db->query("SELECT * from jb_member where m_category ='".$cat_id."' AND m_status = 1");
				if ($query2->num_rows() > 0){
					$members = $query2->result();
					 
					foreach($members as $member)
						{
					 	$to       = $member->m_email;
					    $subject     ="Job Alert related to you ".$job->j_title;
					    $messageText = "Dear ".$member->m_name.",
					    <br><br><br>
						New Jobs Matching your Profile".$job->j_title."
					    <br><br>
					    Please click the link to view the job detail or copy and paste the url in the browser: ".base_url()."job/".$job->j_id."
					    <br>
					    Regards,
					    <br><br>
					    The Navafiz Team
					    <br><br>
					   *This message was sent by an automated mail server. Please do not reply.
					    <br>";

   
					   $config = array(
						'protocol'  => 'smtp',
						'smtp_host' => 	'host256.hostmonster.com',		//'ssl://smtp.secureserver.net',					//'ssl://ureserver.net',
						'smtp_port' => 25,
						'smtp_user' => 'register@navafiz.com',
						'smtp_pass' => 'V(fJh()VT68F',
						'mailtype'  => 'html',
						'charset'   => 'iso-8859-1'
					  );
					  
					   
					  
	  

					  $config['newline'] = "\r\n";
					  $config['crlf']    = "\r\n";
				
					  $this->load->library("email",$config);
					  $this->email->set_newline("\r\n");
					  $this->email->from('register@navafiz.com');
					  $this->email->to($to);
					  $this->email->subject($subject);
					  $this->email->message($messageText);
				
					  if($this->email->send()) {
						//$query = $this->db->query("UPDATE jb_member SET m_verification = '".$mail_send_text."' WHERE m_id = '".$user_id."'");
						//if($this->db->affected_rows())
						  return 1;
					  } else {
						show_error($this->email->print_debugger());
						return 0;
					  }
						}
					}
			}
	//	return 0;
	}
	}
  
  function updateReference($options = array())
   		{
	    if(isset($options['name']))
			$this->db->set('m_ref_name',$options['name']);
		if(isset($options['occupation']))
			$this->db->set('m_ref_occupation',$options['occupation']);
		if(isset($options['relation']) )
			$this->db->set('m_ref_relation',$options['relation']);	
	
		
		
		
		
		
		
				
		$this->db->where('m_id', $options['m_id']);
		$this->db->update($this->db->dbprefix('member'));
		$affected_rows = $this->db->affected_rows();
	//	echo $this->db->last_query();
	//	return  $affected_rows;
		return  1;
		
		 
		 }
  
	function updateprofileAjax($options = array())
   		{
	    if(isset($options['name']))
			$this->db->set('m_name',$options['name']);
		if(isset($options['gender']))
			$this->db->set('gender',$options['gender']);
		if(isset($options['cat_id']))
			$this->db->set('m_category',$options['cat_id']);		
		if(isset($options['avatar']) && $options['avatar'] != "" )
			$this->db->set('m_avatar',$options['avatar']);	
		if(isset($options['profession']))
			$this->db->set('m_profession',$options['profession']);
		if(isset($options['employer']))
			$this->db->set('m_employer',$options['employer']);
		if(isset($options['experience']))
			$this->db->set('m_experience',$options['experience']);		
		if(isset($options['country_id']))
			$this->db->set('country_id',$options['country_id']);
		if(isset($options['location']))
			$this->db->set('m_city',$options['location']);
		if(isset($options['state']))
			$this->db->set('m_state',$options['state']);
		if(isset($options['phone']))
			$this->db->set('m_phone',$options['phone']);
		if(isset($options['country_id']))
			$this->db->set('country_id',$options['country_id']);
		if(isset($options['nationality']))
			$this->db->set('m_nationality',$options['nationality']);	
		if(isset($options['employment_status']))
			$this->db->set('employment_status',$options['employment_status']);		
		
		if(isset($options['password']) && $options['password'] != "")
			$this->db->set('m_password',$options['password']);
		if(isset($options['fb']))
			$this->db->set('m_fb',$options['fb']);
		if(isset($options['tw']))
			$this->db->set('m_tw',$options['tw']);
			
		if(isset($options['lk']))
			$this->db->set('m_lk',$options['lk']);		
		if(isset($options['m_skills']))
			$this->db->set('m_skills',$options['m_skills']);	
		
		if(isset($options['previous_employers1']))
			$this->db->set('previous_employers1',$options['previous_employers1']);		
			
		if(isset($options['previous_employers2']))
			$this->db->set('previous_employers2',$options['previous_employers2']);		
		
		if(isset($options['previous_employers3']))
			$this->db->set('previous_employers3',$options['previous_employers3']);		
		
		if(isset($options['previous_employers4']))
			$this->db->set('previous_employers4',$options['previous_employers4']);		
		
		if(isset($options['previous_employers5']))
			$this->db->set('previous_employers5',$options['previous_employers5']);		
		
		
		if(isset($options['matric']))
			$this->db->set('matric',$options['matric']);		
			
		if(isset($options['fa']))
			$this->db->set('fa',$options['fa']);		
		
		if(isset($options['ba']))
			$this->db->set('ba',$options['ba']);		
		
		if(isset($options['masters']))
			$this->db->set('masters',$options['masters']);		
		
		if(isset($options['others']))
			$this->db->set('others',$options['others']);
		if(isset($options['m_current_country_id']))
			$this->db->set('m_current_country_id',$options['m_current_country_id']);
		if(isset($options['m_current_city']))
			$this->db->set('m_current_city',$options['m_current_city']);				
		if(isset($options['m_cv']))
			$this->db->set('member_cv',$options['m_cv']);	
		if(isset($options['m_religion']))
			$this->db->set('m_religion',$options['m_religion']);			
		if(isset($options['m_married_status']))
			$this->db->set('m_married_status',$options['m_married_status']);	
		if(isset($options['m_driving_lisence']))
			$this->db->set('m_driving_lisence',$options['m_driving_lisence']);		
		if(isset($options['m_languages']))
			$this->db->set('m_languages',$options['m_languages']);
		if(isset($options['m_current_salary']))
			$this->db->set('m_current_salary',$options['m_current_salary']);
		if(isset($options['m_expected_salary']))
			$this->db->set('m_expected_salary',$options['m_expected_salary']);
		if(isset($options['m_relocate']))
			$this->db->set('m_relocate',$options['m_relocate']);
		if(isset($options['m_onsite']))
			$this->db->set('m_onsite',$options['m_onsite']);						
			if(isset($options['m_intro']))
			$this->db->set('m_intro',$options['m_intro']);
                        
			$this->db->set('visa_status',$options['visa_status']);
		
		
		
		
		
				
		$this->db->where('m_id', $options['m_id']);
		$this->db->update($this->db->dbprefix('member'));
		$affected_rows = $this->db->affected_rows();
		echo $this->db->last_query();
		return  $affected_rows;
		 
		 }
  
    function getRelatedMember($options = array())
  	{
		
	if(isset($options['cat_id']) && $options['cat_id'] != "")
            $this->db->where('m_category', $options['cat_id']);  
      
    
            $this->db->where('m_status', 1);             
            
        $this->db->select('*');
		$this->db->from('jb_member');
		$this->db->join('jb_categories', 'jb_member.m_category = jb_categories.c_id');
		$this->db->limit(8,0);
		  
         $query = $this->db->get();
      // echo $this->db->last_query();
	  // exit;
         if ($query->num_rows() > 0) {                          
               
            return $query->result();
         }
         else
            return "empty";
     	
  	}
	 
    
	  function updateForm($options = array()){
	    	$this->db->query("update jb_member set member_cv = '".$options['member_cv']."' WHERE m_id ='".$this->session->userdata('user_id')."'"); 
		
			
			echo "updated";
		
		 }
	
      function updatepasswordAjax($options = array()){
	    
			$ip_address	= $_SERVER["REMOTE_ADDR"];

			$this->db->query("update al_member set password = '".$options['password']."' WHERE id ='".$options['user_id']."'"); 
			
			
			echo "updated";
		
			 
		 }
		 
	
function getPollMemberRefer($options = array()){
       $query = $this->db->query("SELECT count(*) AS tot_member from jb_poll_answers where pr_refer_user_id=".$this->session->userdata('user_id')."");
       $row = $query->row();
       return $row->tot_member;
	   
	   
	    

	   
        // }
}
  function getTotalMembers($options = array()){
     /*  $query = $this->db->query("SELECT count(*) AS tot_member from `jb_member` where m_status=1");
       $row = $query->row();
       return $row->tot_member;
        // }*/

          
		     if(isset($options['limit']) && isset($options['offset']))
            $this->db->limit($options['limit'],$options['offset']);
            
         if(isset($options['limit']))
            $this->db->limit($options['limit']);
		 if(isset($options['status']))	   	             
         $this->db->where('m_status', 1);  
		if(isset($options['cat_id']) && $options['cat_id'] != "")
            $this->db->where('m_category', $options['cat_id']);  
       if(isset($options['profession']) && $options['profession'] != "")
            $this->db->like('m_profession', $options['profession']);  
	  if(isset($options['s_location']) && $options['s_location'] != "")
            $this->db->like('s_location', $options['s_location']);  
    
           
	    if(isset($options['id']))
            $this->db->where('m_id', $options['id']);  
        if(isset($options['password']))
            $this->db->where('password', $options['password']);             
            
        $this->db->select('count(*)  AS tot_member');
		$this->db->from('jb_member');
		$this->db->join('jb_country', 'jb_member.country_id = jb_country.id','left');

		   $this->db->order_by("m_id", "DESC");
         $query = $this->db->get();
       //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           // if(isset($options['id']) || isset($options['login_id']))
                return $query->row('tot_member');
            
             //return $->tot_member;
         }
         else
            return "empty";
     



    }		 
   function getMembers($options = array()){
          
		     if(isset($options['limit']) && isset($options['offset']))
            $this->db->limit($options['limit'],$options['offset']);
            
         if(isset($options['limit']))
            $this->db->limit($options['limit']);   	             
         $this->db->where('m_status', 1);  
		if(isset($options['cat_id']) && $options['cat_id'] != "")
            $this->db->where('m_category', $options['cat_id']);  
       if(isset($options['profession']) && $options['profession'] != "")
            $this->db->like('m_profession', $options['profession']);  
	  if(isset($options['s_location']) && $options['s_location'] != "")
            $this->db->like('s_location', $options['s_location']);  
    
           
	    if(isset($options['id']))
            $this->db->where('m_id', $options['id']);  
        if(isset($options['password']))
            $this->db->where('password', $options['password']);             
            
        $this->db->select('*');
		$this->db->from('jb_member');
		$this->db->join('jb_country', 'jb_member.country_id = jb_country.id','left');

		   $this->db->order_by("m_id", "DESC");
         $query = $this->db->get();
      //   echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['id']) || isset($options['login_id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return "empty";
     }
	 function getSearchMembers($options = array()){
                       
         $this->db->where('m_status', 1);  
		if(isset($options['cat_id']))
            $this->db->where('m_category', $options['cat_id']);  
       if(isset($options['profession']))
            $this->db->like('m_profession', $options['profession']);  
	//  if(isset($options['s_location']))
         //   $this->db->like('j_location', $options['s_location']);  
    
           
	  
            
        $this->db->select('*');
		$this->db->from('jb_member');
		//$this->db->join('jb_member', 'jb_jobs.member_id = jb_member.m_id' ,'left');
		//$this->db->join('jb_member', 'jb_jobs.j_addedby = jb_member.m_id','left');
		  
         $query = $this->db->get();
       //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
       
            return $query->result();
         }
         else
            return "empty";
     }
	 
	 function userDetail($options = array()){
                       
        if(isset($options['user_id']))
            $this->db->where('m_id', $options['user_id']);  
      
            
        $this->db->select('*');
		$this->db->from('jb_member');
		$this->db->join('jb_categories', 'jb_member.m_category = jb_categories.c_id','left');
		
		  
         $query = $this->db->get();
   //  echo $this->db->last_query();
		 if ($query->num_rows() > 0) {                          
        
            return $query->row(0);
         }
         else
            return 'empty';
     }
    
	 function getRelatedProfiles($options = array())
	 {
                       
        if(isset($options['cat_id']) && $options['cat_id'] != "" && $options['cat_id'] != 0)
            $this->db->where('m_category', $options['cat_id']);  
      
    
            $this->db->where('m_status', 1);             
            
        $this->db->select('*');
		$this->db->from('jb_member');
		$this->db->join('jb_categories', 'jb_member.m_category = jb_categories.c_id');
		$this->db->limit(9,0);
		  
         $query = $this->db->get();
     //  echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           // if(isset($options['id']) || isset($options['login_id']))
                //return $query->row(0);
            
            return $query->result();
         }
         else
            return "empty";
     }
	function removeEmployer($options = array())
		{
		if(isset($options['je_id']))
            {
			$this->db->where('je_id', $options['je_id']);
            $this->db->delete($this->db->dbprefix('member_jobs'));
			return 1;
			}
		}
	function removeEducation($options = array())
		{
		if(isset($options['me_id']))
            {
			$this->db->where('me_id', $options['me_id']);
            $this->db->delete($this->db->dbprefix('member_education'));
			return 1;
			}
		}  
	 
	 
	  function getCountries()
	 	{
                       
        if(isset($options['country_id']))
            $this->db->where('country_id', $options['country_id']);  
    
            
        $this->db->select('*');
		$this->db->from('jb_country');
		
		  
         $query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['country_id']) || isset($options['country_id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return false;
     }
	 function getStroy($options = array()){
		 
		 
                       
        if(isset($options['ss_status']))
            $this->db->where('ss_status', $options['ss_status']);  
      if(isset($options['user_id']))
            $this->db->where('ss_member_id', $options['user_id']);  
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('successstory'));
		$this->db->join('jb_member', 'jb_successstory.ss_member_id = jb_member.m_id');
		  
         $query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
            if(isset($options['user_id']))
                return $query->row(0);
            
            return $query->result();
         }
         else
            return false;
     
	/*
		 $query = $this->db->query("SELECT * from  jb_successstory where ss_member_id='".$this->session->userdata('user_id')."'");
        // echo $this->db->last_query();
		 if ($query->num_rows() > 0){
			
		 if(isset($options['ss_member_id']))
               return $query->row(0);
            else
            return $query->result();
			
		
            }else{
			    return 0;
				
            }*/
	
     
	
	 
	 }
    function updateStory($options = array()){

        $query = $this->db->query("SELECT * from  jb_successstory where ss_member_id='".$this->session->userdata('user_id')."'");
        if ($query->num_rows() > 0){
            $user =$query->row(); 
            $query2 = $this->db->query("UPDATE jb_successstory SET ss_subject= '".$options['ss_subject']."',ss_descr= '".$options['ss_descr']."' WHERE ss_member_id = '".$this->session->userdata('user_id')."'");
            //$query2->row(); 
            // echo $this->db->last_query();
            return 1;
            //redirect(base_url());
       }else{
                           $this->db->insert($this->db->dbprefix('successstory'),$options);
    //	echo $this->db->last_query();
           $id = $this->db->insert_id();
          // return 0;
                           //
       }



    }
         
    public function Save($data,$m_id=0){
        if($m_id>0){
            $this->db->where('m_id',$m_id);
            $this->db->update('jb_member',$data);
            $member_id = $m_id;
        }else{
            $this->db->insert($data);
            $member_id = $this->db->insert_id();
        }
        return $member_id;
    }         
         
	
}
?>
