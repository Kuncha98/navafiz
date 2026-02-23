<?php

function shoutbox_post_message($data = array()){
    $CI =& get_instance();
    $CI->load->model('shoutbox_model');
    date_default_timezone_set('Asia/Dubai');
    return $CI->shoutbox_model->Save($data);    
}
function shoutbox_getall_messages(){
    $CI =& get_instance();
    $CI->load->model('shoutbox_model');
	
    return $CI->shoutbox_model->GetAll();    
}

function shoutbox_get_messages($data=array()){
    $CI =& get_instance();
    $CI->load->model('shoutbox_model');
	
    return $CI->shoutbox_model->Save($data);    
}
function shoutbox_delete_message($message_id){
    $CI =& get_instance();
    $CI->load->model('shoutbox_model');
    $message_id = intval($message_id);
    if($message_id>0){
        return $CI->shoutbox_model->Delete($message_id);    
    }    
}
    