<?php

function UserInfo($user_id){
	
    $CI =& get_instance();
    $CI->load->model('profile_model');
	
    $UserInfo = $CI->profile_model->GetById($user_id);
    return $UserInfo;
}

function GetCvReviewCountbyUser($user_id){
    $CI =& get_instance();
    $CI->load->model('cvreview_model');
    
    $getreviews = $CI->cvreview_model->Search(array('assign_user_to'=>$user_id));
    
    return count($getreviews);
}

function LoginCheck($redirect_url='',$current_url='',$msg_type='',$msg_txt=''){
    $CI =& get_instance();
    
    $user_id = $CI->session->userdata('user_id');
    $user_id = $user_id;
    
    if(!$user_id>0 || empty($user_id)){
        if(!empty($current_url)){
            $CI->session->set_userdata('return_url',$current_url);
        }
        
        if(!empty($msg_type) && !empty($msg_txt)){
            $CI->session->set_flashdata($msg_type,$msg_txt); 
        }
        
        if(!empty($redirect_url)){
            redirect($redirect_url);
        }else{
            _setError("Please login to proceed");
            redirect(site_url('login'));
        }
        exit();
    }
}

function CvReviewTeamList1(){
    return array(            
            10,
            11,
            3816,
            3478, 
            7464,
            13089,
            7083,
            10262,
            8348,            
            3346,
            11889,
            7445,
            11900,
            3967,
            9371,
            6227,
            9347,            
            14631,
            13940,            
            3920,
            16451,
            7295,
            5871,
            3797,
            7850,
            10092,
            11530,
            15356,
            10321,
            10088,
            10563,
            11259,
            8261,
            2505,
            15174,
            8294,
            12654,
            4400,
            20328,
            9115,
            10636,
            21253,
            21254,
            17096,
            7212,
            5328,
            10757,
            22667,
            22044,
            18505,
            8292,
            2068,
            19336,
            20150,
            21551,
            21916,
            12910,
            17931,
            16741,
            25006,
            5328,
            24938,
            19295,
            9528,
            22770,
            24363,
            17584,
            25604
        );
}

function CvReviewTeamList(){
    $CI =& get_instance();
    $query = $CI->db->query('Select m_id from jb_member where role_id in (1,2,5)');
    $data = $query->result();
    $return = array();
    if($data){
        foreach ($data as $user) {
            $return[] = $user->m_id;
        }
    }
    return $return;
}

function CvReviewTeamListForVoting(){
    $CI =& get_instance();
    $query = $CI->db->query('Select m_id from jb_member where role_id in (1,2,5,6)');
    $data = $query->result();
    $return = array();
    if($data){
        foreach ($data as $user) {
            $return[] = $user->m_id;
        }
    }
    return $return;
}

function UserRecommandations($user_id=0){
    $CI =& get_instance();
    $return = 0;
    if($user_id>0){
        $query = $CI->db->query('Select count(*) as total from '.USER_RECOMMENDATION_TABLE.' where user_id='.$user_id);
        $data = $query->row();    
        
        if(isset($data->total)){
            $return = $data->total;
        }
    }
    return $return;
}
function TempTeamList(){
    return array(
            17594,
            12523,
            8236,
            15174
        );
}

?>