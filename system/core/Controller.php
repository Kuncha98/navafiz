<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
 #[\AllowDynamicProperties]
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
                
                date_default_timezone_set('Asia/Dubai');
                
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
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */