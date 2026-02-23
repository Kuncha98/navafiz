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

function CvReviewTeamList(){
    return array(
            10,
            3478,
            3346,
            2068,
            3797,
            11889,
            7083,
            11900,
            9570,
            3967,
            9371,
            6227,
            11962,
            12276,
            9347,
            7464,
            3816,
            4561,
            9528
        );
}

?>