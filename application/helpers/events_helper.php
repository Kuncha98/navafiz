<?php

function GetUpcomingEventsList(){
    $CI =& get_instance();
    $query = $CI->db->query('Select * from jb_events where event_date >= now() order by event_date asc');    
    $event_list = $query->result();
    return $event_list;
}

?>