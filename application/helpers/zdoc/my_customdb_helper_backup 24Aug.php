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
           3478, 
           7464,
           13089,
            7083,
            10262,
            8348,
            13073,
            3346,
            2068,
            11889,
            7445,
            11900,
            3967,
            9371,
            6227,
            9347,
            3816,
            10,
            4561,
            14631,
            3797
        );
}

?>