<?php
#[\AllowDynamicProperties]
class Admin_Member_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
   function addForm($options = array())
	 	{
			
		$this->db->insert($this->db->dbprefix('member'),$options);
                $id = $this->db->insert_id();
		//echo $this->db->last_query();
		return $id;
		}
   function getForms($options = array())
		
		{
      	if(isset($options['m_id']))
            $this->db->where('m_id', $options['m_id']);  
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('member'));
		$this->db->order_by("m_id", "DESC");
		 if(isset($options['limit']))
		$this->db->limit($options['limit']);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {                          
            if(isset($options['m_id']) && $options['m_id'] != "")
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
		}
                
                
    function updateMemberSkill($options = array(),$id)
    {
//        echo $id;
//       print_r($options);
//       exit();
        if(isset($options['m_skills']) && !empty($id)){
            $this->db->set('m_skills',$options['m_skills']);		
        $this->db->where('m_id', $id);
        $this->db->update($this->db->dbprefix('member'));
        }
        
        $affected_rows = $this->db->affected_rows();
        return  $affected_rows;
    }
   function checkEmailAvailable($options = array())
	{
	$query = $this->db->query("SELECT * from jb_member where m_email='".$options['email']."'");
    if ($query->num_rows() > 0)
		echo 1;	
	else
		echo 0;		
   	}	
 
	function getTotalMembers(){
        $query = $this->db->query("SELECT count(*) AS tot_book from `jb_member`");
        $row = $query->row();
        return $row->tot_book;
    	}
   function editForm($options = array() ,$id){
		if(isset($options['name']))
			$this->db->set('m_name',$options['name']);
		if(isset($options['role_id']))
                    $this->db->set('role_id',$options['role_id']);
                if(isset($options['m_category']))
                    $this->db->set('m_category',$options['m_category']);
                if(isset($options['industry1']))
                    $this->db->set('industry1',$options['industry1']);
                if(isset($options['industry2']))
                    $this->db->set('industry2',$options['industry2']);
                if(isset($options['m_profession']))
                    $this->db->set('m_profession',$options['m_profession']);
                if(isset($options['m_experience']))
                    $this->db->set('m_experience',$options['m_experience']);
                if(isset($options['uae_experience']))
                    $this->db->set('uae_experience',$options['uae_experience']);
                if(isset($options['m_employer']))
                    $this->db->set('m_employer',$options['m_employer']);
                if(isset($options['employment_status']))
                    $this->db->set('employment_status',$options['employment_status']);
                if(isset($options['m_nationality']))
                    $this->db->set('m_nationality',$options['m_nationality']);
                if(isset($options['m_current_country_id']))
                    $this->db->set('m_current_country_id',$options['m_current_country_id']);
                if(isset($options['m_city']))
                    $this->db->set('m_city',$options['m_city']);
                if(isset($options['m_phone']))
                    $this->db->set('m_phone',$options['m_phone']);
                if(isset($options['gender']))
                    $this->db->set('gender',$options['gender']);
                if(isset($options['m_current_city']))
                    $this->db->set('m_current_city',$options['m_current_city']);
                if(isset($options['m_current_country_id']))
                    $this->db->set('m_current_country_id',$options['m_current_country_id']);
                if(isset($options['m_married_status']))
                    $this->db->set('m_married_status',$options['m_married_status']);
                if(isset($options['m_driving_lisence']))
                    $this->db->set('m_driving_lisence',$options['m_driving_lisence']);
                if(isset($options['m_languages']))
                    $this->db->set('m_languages',$options['m_languages']);
                if(isset($options['linkedin_profile_link']))
                    $this->db->set('linkedin_profile_link',$options['linkedin_profile_link']);
                if(isset($options['youtube_cv_link']))
                    $this->db->set('youtube_cv_link',$options['youtube_cv_link']);
                if(isset($options['profession1']))
                    $this->db->set('profession1',$options['profession1']);
                if(isset($options['profession2']))
                    $this->db->set('profession2',$options['profession2']);
                if(isset($options['profession3']))
                    $this->db->set('profession3',$options['profession3']);
                if(isset($options['profession4']))
                    $this->db->set('profession4',$options['profession4']);
                if(isset($options['profession5']))
                    $this->db->set('profession5',$options['profession5']);
                if(isset($options['visa_status']))
                    $this->db->set('visa_status',$options['visa_status']);
                if(isset($options['status']))
                    $this->db->set('m_status',$options['status']);
                if(isset($options['m_fb']))
                    $this->db->set('m_fb',$options['m_fb']);
                
                
		if(isset($options['email_address']))
			$this->db->set('m_email',$options['email_address']);
		if(isset($options['phone']) != "")
			$this->db->set('m_phone_no',$options['phone']);	
		
		$this->db->where('m_id', $id);
		$this->db->update('jb_member');
		$affected_rows = $this->db->affected_rows();
	//	echo $this->db->last_query();
		return  $affected_rows;
	} 
 function memberExportExcel($options = array())
	 {
	 $filename = "MemberFile.xls"; 
	// ob_end_clean();
     if (ob_get_contents()) ob_end_clean();
	 header('Content-type: application/vnd.ms-excel');
     header("Content-Disposition: attachment; filename=\"$filename\""); 
   	$this->db->select('*');
	if(isset($options['member_id']))
			$this->db->where('m_id',$options['member_id']);
	$this->db->from($this->db->dbprefix('member'));
	$this->db->join('jb_categories', 'jb_member.m_category = jb_categories.c_id' ,'left');
    $query = $this->db->get();
	//	echo $this->db->last_query();
	$records = $query->result();
 	  
	$flag = false;
	echo "Name"."\t"."Email Address"."\t"."Facebook Id"."\t"."Gender"."\t"."Category"."\t"."Profession"."\t"."Employer"."\t"."Experience"."\t"."State"."\t"."City"."\t"."Nationality"."\t"."Phone"."\t"."CV Path"."\t"."Facebook"."\t"."Twitter"."\t"."LinkedIn". "\r\n";
	
	foreach($records as $record)//while($row = mysql_fetch_assoc($qur)) 
		{   
	$cv_path = base_url()."assets/uploads/cvs/";	
      if($record->member_cv != "")
	  $cv_path = $cv_path.$record->member_cv;
	  else
	  $cv_path = "";
	   echo $record->m_name."\t".$record->m_email."\t".trim($record->facebook_id)."\t".$record->gender."\t".$record->c_name."\t".$record->m_profession."\t".$record->m_employer."\t".$record->m_experience."\t".$record->m_state."\t".$record->m_city."\t".$record->m_nationality."\t".$record->m_phone."\t".$cv_path."\t".$record->m_fb."\t".$record->m_tw."\t".$record->m_lk."\t". "\r\n";
	  
	   
	   
	   
			}
	 }
function getCv($options = array())
{
  $this->db->select('member_cv');
	if(isset($options['id']))
	$this->db->where('m_id',$options['id']);
	$this->db->from($this->db->dbprefix('member'));
	$query = $this->db->get();
	$records = $query->row(0);
	
	//$cv_path = base_url()."assets/uploads/cvs/".$records->member_cv;
	$cv_path = "./assets/uploads/cvs/".$records->member_cv."";
	    $file_extension = strtolower(substr(strrchr($cv_path,"."),1));  
if (file_exists($cv_path))   
 {  
 
  	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($cv_path));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($cv_path));
    ob_clean();
    flush();
    readfile($cv_path);
    exit;
   
 };  
 switch( $file_extension )  
 {  
  case "pdf": $ctype="application/pdf"; break;  
  case "exe": $ctype="application/octet-stream"; break;  
  case "zip": $ctype="application/zip"; break;  
  case "doc": $ctype="application/msword"; break;  
  case "docx": $ctype="application/msword"; break;  
  case "xls": $ctype="application/vnd.ms-excel"; break;  
  case "xlsx": $ctype="application/vnd.ms-excel"; break;  
  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;  
  case "pptx": $ctype="application/vnd.ms-powerpoint"; break;  
  case "gif": $ctype="image/gif"; break;  
  case "png": $ctype="image/png"; break;  
  case "jpeg":  
  case "jpg": $ctype="image/jpg"; break;  
  default: $ctype="application/force-download";  
 }  
 header("Pragma: public"); // required  
 header("Expires: 0");  
 header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
 header("Cache-Control: private",false); // required for certain browsers   
 header("Content-Type: $ctype");  
 // change, added quotes to allow spaces in filenames, by Rajkumar Singh  
 header("Content-Disposition: attachment; filename=\"".basename($cv_path)."\";" );  
 header("Content-Transfer-Encoding: binary");  
 header("Content-Length: ".filesize($cv_path));  
 readfile("$cv_path");  
 exit();  
	   
	   
	   
			
	 
	
	
	
	
	
	
	
	
	
	
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
    
//public function GetAllPics()
//    {        
//        $results = $this->db->get('jb_member')->result();
//        return $results;
//    }   
  
    
    
public function GetAllSummary(){
    $results = $this->db->get('jb_member_summary_career')->result();
        return $results;
}     
    
	 
  function userDetail($options = array()){
     if(isset($options['user_id']))
            $this->db->where('id', $options['user_id']);  
                
     $this->db->select('*');
	 $this->db->from('member');
		
	$query = $this->db->get();
    if ($query->num_rows() > 0) {                          
              return $query->row(0);
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
	$this->db->set('m_status',$fstatus);
	$this->db->where('m_id', $id);  
	 $this->db->update($this->db->dbprefix('member')); 
	
	 return $this->db->affected_rows();  				
	}	
	
 function delForm($options = array()){
		
        if(isset($options['id'])){
			$this->db->where('m_id', $options['id']);
            $this->db->delete($this->db->dbprefix('member'));
 	       }
     } 
     
 function delskills($id){
	
        if(!empty($id)){
            $this->db->set('m_skills','');
            $this->db->where('m_id', $id);
	    $res = $this->db->update('jb_member');
            return $res;
        }
     } 
	
}
?>
