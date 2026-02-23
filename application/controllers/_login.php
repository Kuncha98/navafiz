<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
  function __construct() {
    parent::__construct();
  }
  public function index(){
    if (isset($_GET['code']) AND !empty($_GET['code'])) {
      $code = $_GET['code'];
      // parsing the result to getting access token.
      parse_str($this->get_fb_contents("https://graph.facebook.com/oauth/access_token?client_id=125784917765132&redirect_uri=" . urlencode(base_url('login')) ."&client_secret=a8b3480e0cb9f52e00bee50456df4c24&code=" . urlencode($code)));
      redirect('login/index?access_token='.$access_token);
    }
    if(!empty($_GET['access_token'])) {
      // getting all user info using access token.
     // $fbuser_info = json_decode($this->get_fb_contents("https://graph.facebook.com/me?access_token=".$_GET['access_token']), true);
	    $fbuser_info = json_decode($this->get_fb_contents(" https://graph.facebook.com/10206536918597082 /feed?limit=1&locale=en_GB&access_token=".$_GET['access_token']."&fields=id,from,message,link,caption,icons,actions,privacy,status_type"), true);

	   echo "ssssssssssssssssssssssssssssssssssss";
	 
      // you can get all user info from print_r($fbuser_info);
	    echo $fbuser_info['first_name'];
		echo "<br>";
	    echo $fbuser_info['email'];
	  print_r($fbuser_info);
     exit;
	  if(!empty($fbuser_info['email'])) {
    echo $fbuser_info['first_name'];
    echo $fbuser_info['last_name'];
    echo $fbuser_info['email'];
    echo $fbuser_info['gender'];
    echo $fbuser_info['location']['name'];
    echo $fbuser_info['hometown']['name'];
    echo $fbuser_info['birthday'];
    // do your stuff.
    //save the data in db save session and redirect.
       }
       else{
         $this->session->set_flashdata('message', 'Error while facebook user information.');
     redirect(base_url());
     
	 echo "fffffffffffffffffffffffffffffffffffffffffffffffffffff";
	 exit;
	   }
    }
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login'); // loading default view.
    }
  }
   
/**
  * calling facebook api using curl and return response.
  */
  function get_fb_contents($url) {
    $curl = curl_init();
    curl_setopt( $curl, CURLOPT_URL, $url );
    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
    $response = curl_exec( $curl );
    curl_close( $curl );
    return $response;
  }
}