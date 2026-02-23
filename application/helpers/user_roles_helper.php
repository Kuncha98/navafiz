<?php

function GetUsersRoles(){
    $CI =& get_instance();
    $query = $CI->db->query('Select * from users_roles');
    $data = $query->result();
    return $data;
}

function GetRoleName($role_id){
    $CI =& get_instance();
    $query = $CI->db->query('Select role_name from users_roles where role_id='.$role_id);
    $data = $query->row();
    
    if(isset($data->role_name) && !empty($data->role_name)){
        $role_name = $data->role_name;
    }else{
        $role_name ='';
    }
    
    return $role_name;
}

function BlockUserCheck($user_id){
    $CI =& get_instance();
    date_default_timezone_set('Asia/Dubai');
    
    $query = $CI->db->query('Select m_status,username from jb_member where m_id='.$user_id);
    $data = $query->row();
    
    $date = datenow();        
    $CI->db->query('update jb_member set last_login_date="'.$date.'"  where m_id='.$user_id);
        
    if($data->m_status==2){
        _setError('Your Blocked');
        redirect(site_url('user/logout'));
    }   
}

function GetWebsiteCounts($case='All'){
    
    $CI =& get_instance();
    $return = 0;
    if($case=='All'){
        $query = $CI->db->query('Select count(*) as totalmembers from jb_member WHERE m_status = 1');        
        $data = $query->row();
        if(isset($data->totalmembers) && $data->totalmembers>0){
            $return = number_format($data->totalmembers);
        }    
    }
    if($case=='featured'){
        $query = $CI->db->query('Select count(*) as totalmembers from jb_member_by_list WHERE list_id = 82');        
        $data = $query->row();
        if(isset($data->totalmembers) && $data->totalmembers>0){
            $return = number_format($data->totalmembers);
        }    
    }
    if($case == 'mentor_assigned'){
        $query = $CI->db->query("
            SELECT COUNT(*) as totalmembers
            FROM jb_member
            WHERE m_status = 1 
              AND (mentor_id != 0 OR mentor_id IS NOT NULL)
              AND added_on >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
        ");        
        $data = $query->row();
        if(isset($data->totalmembers) && $data->totalmembers > 0){
            $return = number_format($data->totalmembers);
        }    
    }
    if($case=='24-hours'){
        $query = $CI->db->query('SELECT COUNT(*) as totalmembers FROM jb_member WHERE m_status = 1 AND added_on >= NOW() - INTERVAL 1 DAY');
        $data = $query->row();
        if(isset($data->totalmembers) && $data->totalmembers>0){
            $return = number_format($data->totalmembers);
        }    
    }
    if($case=='pending_mentor_assigned'){
        $query = $CI->db->query("
            SELECT COUNT(*) as totalmembers
            FROM jb_member
            WHERE m_status = 1
              AND (mentor_id = 0 OR mentor_id IS NULL)
              AND added_on >= NOW() - INTERVAL 1 DAY
        ");
        $data = $query->row();
        if(isset($data->totalmembers) && $data->totalmembers>0){
            $return = number_format($data->totalmembers);
        }    
    }
    if($case=='total_jobs'){
        $query = $CI->db->query('Select count(*) as totaljobs from jb_jobs');        
        $data = $query->row();
        if(isset($data->totaljobs) && $data->totaljobs>0){
            $return = number_format($data->totaljobs);
        }    
    }
    if($case=='totallogs'){
        $query = $CI->db->query('Select count(*) as totallogs from jb_notification');        
        $data = $query->row();
        if(isset($data->totallogs) && $data->totallogs>0){
            $return = number_format($data->totallogs);
        }    
    }
    if($case=='totalfeed'){
        $query = $CI->db->query('Select count(*) as totalfeed from jb_feed');        
        $data = $query->row();
        if(isset($data->totalfeed) && $data->totalfeed>0){
            $return = number_format($data->totalfeed);
        }    
    }
    
    if($case=='totalfeedcomments'){
        $query = $CI->db->query('Select count(*) as totalfeedcomments from jb_feed_comments');        
        $data = $query->row();
        if(isset($data->totalfeedcomments) && $data->totalfeedcomments>0){
            $return = number_format($data->totalfeedcomments);
        }    
    }
    if($case=='success_story'){
        $query = $CI->db->query('Select count(*) as totalsucces from jb_successstory');        
        $data = $query->row();
        if(isset($data->totalsucces) && $data->totalsucces>0){
            $data->totalsucces = $data->totalsucces+400;
            $return = number_format($data->totalsucces);
        }    
    }
    if($case=='cv_reviewed'){
        $query = $CI->db->query('Select count(*) as cvreviewed from jb_cvreview');        
        $data = $query->row();
        if(isset($data->cvreviewed) && $data->cvreviewed>0){
            $return = number_format($data->cvreviewed);
        }    
    }
    if($case=='cvapproved'){
        $query = $CI->db->query('Select count(*) as cvapproved from jb_cvreview where review_status="review_done"');        
        $data = $query->row();
        if(isset($data->cvapproved) && $data->cvapproved>0){
            $return = number_format($data->cvapproved);
        }    
    }
    
    return $return;
}
?>