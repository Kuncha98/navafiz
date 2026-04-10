<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LastPageHook
{

    public function track_last_page()
    {
        $CI =& get_instance();

        // Only for logged in users
        if ($CI->session->userdata('user_id')) {

            // Current URI
            $current_url = current_url(); // full URL

            // Exclude login/logout pages
            $excluded = array(
                base_url('login'),
                base_url('user/logout')
            );

            if (!in_array($current_url, $excluded)) {
                $CI->session->set_userdata('last_page', $current_url);
            }
        }
    }
}
?>