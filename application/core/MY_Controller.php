<?php
class MY_Controller extends CI_Controller {

   public $site_data;

    function __construct() {
        parent::__construct();
        
        /*session_start(); 
        $this->session->set_userdata('user_id', "");
        $this->session->set_userdata('login_id', "");            
        
        $user_session_data = array(
            'user_id'     => "",
            'login_id'=> "",                
        );
        $this->session->unset_userdata($user_session_data);   
        $this->session->sess_destroy();
        delete_cookie('navafiz_email');
        delete_cookie('navafiz_password');
        session_destroy();*/
        
        $this->load->model('admin_model');
        $this->site_data= $this->admin_model->getSettings();
        foreach($this->site_data as $c){
            $this->global_array[$c->option] = $c->value;
        }
   }
   
    public static function &get_instance()
    {
        return self::$instance;
    }
    
    public function get_post($key,$defaultValue='') {
        return !empty($this->input->post($key)) ? $this->input->post($key):$defaultValue;
    }   
    public function get_query($key,$defaultValue='') {
        return !empty($this->input->get($key)) ? $this->input->get($key):$defaultValue;
    }  
}
?>