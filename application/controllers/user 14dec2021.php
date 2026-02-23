<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->model('profile_model');
         $this->load->library('twilio');
        $this->load->helper('bulksms_helper');
        $this->load->helper('cookie');
    }
    
    function index(){

    }
    
 
    
    function login2() {
//         $this->session->unset_userdata('access_token');
//
//        $this->session->unset_userdata('user_session_data');
//        exit();
        include_once APPPATH . "libraries/google-api-php-client/vendor/autoload.php";

        $google_client = new Google_Client();

        $google_client->setClientId('5398019094-2sdk8u5ba8ef3f19r18ubr12t6l7ol7m.apps.googleusercontent.com'); //Define your ClientID

        $google_client->setClientSecret('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'); //Define your Client Secret Key

//        $google_client->setRedirectUri('http://localhost:82/test/ncode/user/login'); //Define your Redirect Uri
        $google_client->setRedirectUri('https://navafiz.com/user/login2'); //Define your Redirect Uri

        $google_client->addScope('email');

        $google_client->addScope('profile');
        
        
        if(isset($_GET["code"]))
        {
         $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

         if(!isset($token["error"]))
         {
          $google_client->setAccessToken($token['access_token']);

          $this->session->set_userdata('access_token', $token['access_token']);

          $google_service = new Google_Service_Oauth2($google_client);

          $data = $google_service->userinfo->get();

          $current_datetime = date('Y-m-d H:i:s');
//          echo "<pre>";print_r($data) ;exit();

          $is_user_exists =  $this->profile_model->Search(array('m_email'=>$data['email']));
          
          $get_user = $this->profile_model->Search(array('oauth_uid'=>$data['id']));
          
          if(empty($is_user_exists)){
             if(empty($get_user)){
              $udata['m_name'] = $data['given_name'].' '.$data['family_name'];
              $udata['m_email'] = $data['email'];
              $udata['m_avatar'] = $data['picture'];
              $udata['oauth_uid'] = $data['id'];
              $user_id = $this->profile_model->Save($udata);
              if(intval($user_id) > 0){
                $get_user_detail = $this->profile_model->Search(array('m_id'=>$user_id));
                $user_session_data = array(
                                    'user_id' => $get_user_detail[0]->m_id,
                                    'email' => $get_user_detail[0]->m_email,
                                    'username' => $get_user_detail[0]->username,
                                    'login_type' => "normal",
                                    'cat_id' => $get_user_detail[0]->m_category,
                                    'name' => $get_user_detail[0]->m_name,
                                    'cv' => $get_user_detail[0]->member_cv,                                
                                    'avatar' => $get_user_detail[0]->m_avatar,
                                    'last_login_date' => $get_user_detail[0]->last_login_date,
                                );
                
                

                $this->session->set_userdata($user_session_data);
                $user_id = $this->session->userdata('user_id');

                $this->profile_model->Save(array('last_login_date'=> datenow()),$get_user_detail[0]->m_id);
                redirect(base_url('profile/'.intval($user_id)));
                
              }
            } 
          }else{
              $udata['m_name'] = $data['given_name'].' '.$data['family_name'];
              $udata['m_email'] = $data['email'];
              $udata['m_avatar'] = $data['picture'];
//              echo "<pre>";print_r($udata);exit();
              $this->profile_model->update_google_user($udata,$data['id']);
              $user_oauth = $this->profile_model->Search(array('oauth_uid'=>$data['id']));
//              echo $user_n_id;exit();
              $user_n_id = $user_oauth[0]->m_id;
              if(intval($user_n_id) > 0){
//                echo "here";echo $user_n_id;exit();
                $user_session_data = array(
                                    'user_id' => $user_oauth[0]->m_id,
                                    'email' => $user_oauth[0]->m_email,
                                    'username' => $user_oauth[0]->username,
                                    'login_type' => "normal",
                                    'cat_id' => $user_oauth[0]->m_category,
                                    'name' => $user_oauth[0]->m_name,
                                    'cv' => $user_oauth[0]->member_cv,                                
                                    'avatar' => $user_oauth[0]->m_avatar,
                                    'last_login_date' => $user_oauth[0]->last_login_date,
                                );

                $this->session->set_userdata($user_session_data);
                $user_id = $this->session->userdata('user_id');

                $this->profile_model->Save(array('last_login_date'=> datenow()),$user_oauth[0]->m_id);
                redirect(base_url('profile/'.intval($user_id)));
                
              }
          }
          
          
          
         }
        }
        $loginURL = '';
        if(!$this->session->userdata('access_token'))
        {
         $loginURL = $google_client->createAuthUrl();
         $data['loginURL'] = $loginURL;
         
         $this->load->view('login/login2', $data);
        }else{
            redirect(site_url());
//         $this->load->view('login/login',$data);
        } 
    }
    
    function authenticate()
    {   

        if($this->session->userdata('user_id') != ""){
            redirect(base_url());
        }else{
            
            $this->form_validation->set_rules('email', 'User Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            if(isset($_REQUEST['return_url'])){
                $this->session->set_userdata('return_url',$_REQUEST['return_url']);                
            }

            if ($this->form_validation->run() === FALSE )
            {   
//                $data['loginURL'] = "https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=5398019094-2sdk8u5ba8ef3f19r18ubr12t6l7ol7m.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%3A82%2Ftest%2Fncode%2Flogin&state&scope=email%20profile&approval_prompt=auto";
                $data['selected']="login";
                $this->load->view('login/login',$data);
            } else {
                    $login_type = $this->input->post('login_type');
                   
                        $email = $this->input->post('email');
                        $password = $this->input->post('password');
                        $remember_me = $this->input->post('remember_me');
                        $get_user =  $this->profile_model->Search(array('m_email' =>$email, 'm_password' =>$password));  
                        if(count($get_user)>0){

                        $get_user = $get_user[0];
                        if($get_user->m_status==1){
                        
                        
                            if(isset($remember_me) && !empty ($remember_me)){


                            $this->input->set_cookie('navafiz_email', $email, 10 * 30 * 24 * 60 * 60); /* Create cookie for store email */
                            $this->input->set_cookie('navafiz_password', $password, 10 * 30 * 24 * 60 * 60); /* Create cookie for password */


                                $user_session_data = array(
                                    'user_id' => $get_user->m_id,
                                    'email' => $get_user->m_email,
                                    'username' => $get_user->username,
                                    'login_type' => "normal",
                                    'cat_id' => $get_user->m_category,
                                    'name' => $get_user->m_name,
                                    'cv' => $get_user->member_cv,                                
                                    'avatar' => $get_user->m_avatar,
                                    'last_login_date' => $get_user->last_login_date,
                                );

                                $this->session->set_userdata($user_session_data);
                                $user_id = $this->session->userdata('user_id');



                                //Update Last login date
                                $this->profile_model->Save(array('last_login_date'=> datenow()),$get_user->m_id);

                                $return_url = $this->session->userdata('return_url');
                                $this->session->set_userdata('return_url','');
                                if(empty($return_url)){
                                    redirect(base_url('profile/'.intval($user_id)));
                                }else{
                                    redirect($return_url);
                                }
                                exit();
                            }
                            else{

                                delete_cookie('navafiz_email'); /* Delete email cookie */
                                delete_cookie('navafiz_password]'); /* Delete email cookie */    

                                $user_session_data = array(
                                'user_id' => $get_user->m_id,                            
                                'email' => $get_user->m_email,
                                'login_type' => "normal",
                                'cat_id' => $get_user->m_category,
                                'name' => $get_user->m_name,
                                'cv' => $get_user->member_cv,                            
                                'avatar' => $get_user->m_avatar,
                            );

                            $this->session->set_userdata($user_session_data);

                            $user_id = $this->session->userdata('user_id');
                            redirect(base_url('profile/'.intval($user_id)));
                            exit();
                            }
                        }else if($get_user->m_status==2){
                            _setError('Your Account is suspanded due to irrelevant activity');
                            redirect('user/login');
                            exit();
                        }else if($get_user->m_status==0){
                            _setError('Your Account is Expired/Not Activated, Please enter the verification code if you do not have it, Click on Resend code.');
                            redirect('user/verify');
                            exit();
                        }
                    }else{
                        _setError('Invalid Email or Password, Please enter the correct information');
                    }
                    redirect('user/login');
                    exit();
               
            }
        }
    }
    function login()
    {   
//        phpinfo();
//        echo $this->session->userdata('user_id');exit();
        
        if($this->session->userdata('user_id') != ""){
            redirect(base_url());
        }else{
            
            $this->form_validation->set_rules('email', 'User Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            if(isset($_REQUEST['return_url'])){
                $this->session->set_userdata('return_url',$_REQUEST['return_url']);                
            }

            if ($this->form_validation->run() === FALSE )
            {   
//                $data['loginURL'] = "https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=5398019094-2sdk8u5ba8ef3f19r18ubr12t6l7ol7m.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%3A82%2Ftest%2Fncode%2Flogin&state&scope=email%20profile&approval_prompt=auto";
                $data['selected']="login";
                $this->load->view('login/login',$data);
            } else {
                    $login_type = $this->input->post('login_type');
                   
                        $email = $this->input->post('email');
                        $password = $this->input->post('password');
                        $remember_me = $this->input->post('remember_me');
                        $get_user =  $this->profile_model->Search(array('m_email' =>$email, 'm_password' =>$password));  
                        if(count($get_user)>0){

                        $get_user = $get_user[0];
                        if($get_user->m_status==1){
                        
                        
                            if(isset($remember_me) && !empty ($remember_me)){


                            $this->input->set_cookie('navafiz_email', $email, 10 * 30 * 24 * 60 * 60); /* Create cookie for store email */
                            $this->input->set_cookie('navafiz_password', $password, 10 * 30 * 24 * 60 * 60); /* Create cookie for password */


                                $user_session_data = array(
                                    'user_id' => $get_user->m_id,
                                    'email' => $get_user->m_email,
                                    'username' => $get_user->username,
                                    'login_type' => "normal",
                                    'cat_id' => $get_user->m_category,
                                    'name' => $get_user->m_name,
                                    'cv' => $get_user->member_cv,                                
                                    'avatar' => $get_user->m_avatar,
                                    'last_login_date' => $get_user->last_login_date,
                                );

                                $this->session->set_userdata($user_session_data);
                                $user_id = $this->session->userdata('user_id');



                                //Update Last login date
                                $this->profile_model->Save(array('last_login_date'=> datenow()),$get_user->m_id);

                                $return_url = $this->session->userdata('return_url');
                                $this->session->set_userdata('return_url','');
//                                echo base_url();exit();
//                                $base_url = site_url();
//                                echo $base_url;
//                                echo "<br />";
//                                echo $return_url;
//                                exit();
                                if(empty($return_url)){
                                    redirect(base_url('profile/'.intval($user_id)));
                                }
                                if($return_url.'/' == site_url()) {
                                    redirect(base_url('feed'));
                                }else{
                                    redirect($return_url);
                                }
                                exit();
                            }
                            else{

                                delete_cookie('navafiz_email'); /* Delete email cookie */
                                delete_cookie('navafiz_password]'); /* Delete email cookie */    

                                $user_session_data = array(
                                'user_id' => $get_user->m_id,                            
                                'email' => $get_user->m_email,
                                'login_type' => "normal",
                                'cat_id' => $get_user->m_category,
                                'name' => $get_user->m_name,
                                'cv' => $get_user->member_cv,                            
                                'avatar' => $get_user->m_avatar,
                            );

                            $this->session->set_userdata($user_session_data);

                            $user_id = $this->session->userdata('user_id');
                            redirect(base_url('profile/'.intval($user_id)));
                            exit();
                            }
                        }else if($get_user->m_status==2){
                            _setError('Your Account is suspanded due to irrelevant activity');
                            redirect('user/login');
                            exit();
                        }else if($get_user->m_status==0){
                            _setError('Your Account is Expired/Not Activated, Please enter the verification code if you do not have it, Click on Resend code.');
                            redirect('user/verify');
                            exit();
                        }
                    }else{
                        _setError('Invalid Email or Password, Please enter the correct information');
                    }
                    redirect('user/login');
                    exit();
               
            }
        }
    }

    function register()
    {
        $this->form_validation->set_rules('regname', 'Name', 'trim|required');
        $this->form_validation->set_rules('regemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('regpwd', 'Password', 'trim|required|matches[regcpwd]');
        $this->form_validation->set_rules('regcpwd', 'Password Confirmation', 'required');
        if ( $this->form_validation->run() === FALSE ){
            _setError('Please enter all correct information');
            $data['selected']="login";
            $this->load->view('login/register',$data);
        } else {
            
            $name = $this->input->post('regname');
            $email = $this->input->post('regemail');
            $password = $this->input->post('regpwd');
            
            $reg['m_name'] = $name;
            $reg['m_email'] = $email;
            $reg['m_password'] = $password;  
            $reg['added_on'] = datenow();  
            
            $find_user = $this->profile_model->Search(array('m_email'=>$email));
            if(count($find_user)<1){
                $retun_id = $this->profile_model->Save($reg);
                if(count($retun_id)>0) {
                    
                    /*$noti['user_id'] = $retun_id;
                    $noti['noti_title'] = $name." Registered on navafiz pending for verification";
                    $noti['noti_desc'] = $name." Registered on navafiz pending for verification";
                    $noti['noti_type'] = 'registration';
                    AddNotification($noti);*/
                    
                    $m_verification = rand(10000 , 99999);
                    $to = $email;
                    $subject     = "Thanks you ".$name." for Registration with Navafiz One more step need to be completed";
                    $messageText = '<html><body>';
                    $messageText .= "Dear ".$name.",                    
                    <br><br><br>
                    Thank you for registering with Navafiz!
                    <br><br>
                    Your Verification code is
                    <br>
                    <b style='text-align: center;font-size: 30px;font-size: bold;'>".$m_verification."</b>
                    <br><br>
                    Or copy and paste the url in the browser: ".base_url()."user/verify/"."             
                    <br>
                    Regards,
                    <br><br>
                    The Navafiz Team
                    <br><br>
                    *This message was sent by an automated mail server. Please do not reply.
                    <br>";

                    $messageText .= "'</html></body>"; 
                    
//                    if(SendMail($to, $subject, $messageText)){
//                        echo "send";
//                        }else{
//                            echo "not";
//                        }
//                    exit();
//                    
//                    
//                    $config = Array(
//                        'protocol' => 'smtp',
//                        'smtp_host' => 'ssl://smtp.googlemail.com', //
//                        'smtp_port' => 465,        
//                        'smtp_user' => SMTP_USER, //
//                        'smtp_pass' => SMTP_PASSWORD, //
//                        'mailtype' => 'html',
//                        'charset' => 'iso-8859-1',
//                        'wordwrap' => TRUE        
//                    );   
//
//                    $config['newline'] = "\r\n";
//                    $config['crlf']    = "\r\n";
//
//                    $this->load->library("email",$config);
////                    $this->email->initialize($config);
//                    $this->email->set_mailtype("html");
//                    $this->email->set_newline("\r\n");
//                    
//                    $this->email->from('navafizweb@gmail.com', 'Navafiz');
//                    $this->email->to($to);
//                    $this->email->subject($subject);
//                    $this->email->message($messageText);

                    if(SendMailRegister($to, $subject, $messageText)) {
                        $retun = $this->profile_model->Save(array('m_verification'=>$m_verification),$retun_id);
                        if($retun>0){
                            _setSuccess('Please check your Email inbox/spam and enter the verification code to complete registration on Navafiz');                    
                            redirect('user/verify'); 
                            exit();
                        }else{
                            _setError("There is some problem with Website Adminstrator");
                            redirect('user/login'); 
                            exit();
                        }                    
                    } else {
                        _setError("Your registeration is completed for login check with Website Adminstrator");
                        redirect('user/login'); 
                        exit();
                    }                
                }
            }else{
                _setError("You're already registered with provided email, Please login or try forgot password");                
                redirect('user/register');     
                exit();
            }
            
            

        }
    }
    
    
    
    
    //SENDING SMS AFTER USER REGISTRATION...........................................
    
     function s_register()
    {
        $this->form_validation->set_rules('regname', 'Name', 'trim|required');
        $this->form_validation->set_rules('regemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('regpwd', 'Password', 'trim|required|matches[regcpwd]');
        $this->form_validation->set_rules('regcpwd', 'Password Confirmation', 'required');
         $this->form_validation->set_rules('reg_ph_no', 'Phone no', 'required');
        if ( $this->form_validation->run() === FALSE ){
            _setError('Please enter all correct information');
            $data['selected']="login";
            $this->load->view('login/sms_register',$data);
        } else {
            
            $name = $this->input->post('regname');
            $email = $this->input->post('regemail');
            $password = $this->input->post('regpwd');
            $ph_no = $this->input->post('reg_ph_no');
            $reg['m_name'] = $name;
            $reg['m_email'] = $email;
            $reg['m_password'] = $password;  
            $reg['m_ph_no'] = $ph_no;
            $reg['added_on'] = datenow();
            
            $m_verification = rand(10000 , 99999); //verfication code
            
            $find_user = $this->profile_model->Search(array('m_email'=>$email));
            
            if(count(array($find_user))<1){
                $retun_id = $this->profile_model->Save($reg);
                if(count($retun_id)>0) {
                    
                    /*$noti['user_id'] = $retun_id;
                    $noti['noti_title'] = $name." Registered on navafiz pending for verification";
                    $noti['noti_desc'] = $name." Registered on navafiz pending for verification";
                    $noti['noti_type'] = 'registration';
                    AddNotification($noti);*/
                    
                    
                    $to = $email;
                    $subject     = "Thanks you ".$name." for Registration with Navafiz One more step need to be completed";
                    $messageText = '<html><body>';
                    $messageText .= "Dear ".$name.",                    
                    <br><br><br>
                    Thank you for registering with Navafiz!
                    <br><br>
                    Your Verification code is
                    <br>
                    <b style='text-align: center;font-size: 30px;font-size: bold;'>".$m_verification."</b>
                    <br><br>
                    Or copy and paste the url in the browser: ".base_url()."user/verify/"."             
                    <br>
                    Regards,
                    <br><br>
                    The Navafiz Team
                    <br><br>
                    *This message was sent by an automated mail server. Please do not reply.
                    <br>";

                    $messageText .= "'</html></body>"; 
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com', //
                        'smtp_port' => 465,        
                        'smtp_user' => SMTP_USER, //
                        'smtp_pass' => SMTP_PASSWORD, //
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE        
                    );   

                    $config['newline'] = "\r\n";
                    $config['crlf']    = "\r\n";

                    $this->load->library("email",$config);
                    $this->email->set_mailtype("html");
                    $this->email->set_newline("\r\n");
                    $this->email->from('navafizweb@gmail.com', 'Navafiz');
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($messageText);

                    if($this->email->send()) {
                        $retun = $this->profile_model->Save(array('m_verification'=>$m_verification),$retun_id);
                        if($retun>0){
                            _setSuccess('Please check your Email inbox/spam and enter the verification code to complete registration on Navafiz');                    
                            redirect('user/verify'); 
                            exit();
                        }else{
                            _setError("There is some problem with Website Adminstrator");
//                            redirect('user/login'); 
//                            exit();
                        }                    
                    } else {
                        _setError("Your registeration is completed for login check with Website Adminstrator");
//                        redirect('user/login'); 
//                        exit();
                    }                
                }
            }else{
                _setError("You're already registered with provided email, Please login or try forgot password");                
//                redirect('user/s_register');     
//                exit();
            }
            
            
            //SEND SMS.........
            
            //Bulk sms 
            
            //  Bulk($phone_no, $u_name, $m_verification); 
            
            //Twilio Smsa
            
                $sms_sender = '+12564747336';
                $sms_reciever = $reg['m_ph_no'];
                $u_name = $reg['m_name'];
                $sms_message = 'Thank you '.$u_name.' for registering with navafiz your verfication code is '.$m_verification;
                $from = $sms_sender; //trial account twilio number
                $to = '+'.$sms_reciever; //sms recipient number
                $response = $this->twilio->sms($from, $to,$sms_message);

                if($response->IsError){

                _setError("Cannot send sms kindly check your provided your phone no");
                print_r($response);
                exit();
                redirect('user/s_register');
//                print_r($response);
                }
                else{
                     _setSuccess('Please check your Phone inbox and enter the verification code to complete registration on Navafiz');  
                redirect('user/verify');

             
//                print_r($response);
                
            }
            
            
            

        }
    }
    
    
    
    ///..................................................END SMS REGISTRATION.
    
    
    
    function get_verification_code(){
        $this->load->view('login/verification_code');
    }
    
    
    function verification_code(){
        
//        $query = $this->db->query('select list_id from jb_member_by_list where member_id = '.$id);
//        $user_list_cat = $query->result();
//        return $user_list_cat;
        $email = $this->input->post('email');
//        echo $email;exit();
        $query = $this->db->query('SELECT m_verification FROM jb_member WHERE m_email="'.$email.'"');
        $output = $query->row();
        
//        print_r($output);exit();
        if(!empty($output) && isset($output)){
            echo "<h1 style='margin-top:40px;text-align:center'>".$output->m_verification."</h1>";
        }else{
            echo "<h1 style='margin-top:40px;text-align:center'> This Email ".$email." Doesn't Exists </h1>";
        }
        
    }
    
    
    function verify() {
        $this->load->view('login/activate');
    }
    
    
    function change_password(){
        $this->load->view('login/change_password');
    }
    
    function change_pass() {
        $user_id = $this->session->userdata('user_id'); 
        
        
        
        $current_pass = $this->input->post('curr_pass');
        $new_pass = $this->input->post('new_pass');
        $confirm_pass = $this->input->post('con_pass');
        
        
        $get_user =  $this->profile_model->Search(array('m_id' =>$user_id, 'm_password'=>$current_pass));
        
        if(count($get_user)>0 && !empty($get_user)){
            $get_user = $get_user[0];
            if($new_pass == $confirm_pass){
                
                $data['m_password'] = $new_pass;
                $return = $this->profile_model->Save($data,$get_user->m_id);
                $this->session->unset_userdata('user_id');
                _setSuccess('Password change successfully please login again');
                redirect(site_url('user/login'));
                exit();
            }else{
                _setError('New password and confirm Password does not match');
                redirect(site_url('user/change_password'));
                exit();
            }
        }else{
            _setError('User not found try again');
            redirect(site_url('user/change_password'));
            exit();
        }
       
       
    }
    
    
    function user_verify()
    {
        $m_verification = $this->input->post('m_verification');
        $get_user =  $this->profile_model->Search(array('m_verification' =>$m_verification));        
        
        if(count($get_user)>0){
            $get_user = $get_user[0];
            
            $return = $this->profile_model->Save(array('m_status' =>1),$get_user->m_id);
            if($return>0){
                
                $user_session_data = array(
                    'user_id' => $get_user->m_id,                            
                    'email' => $get_user->m_email,
                    'login_type' => "normal",
                    'cat_id' => $get_user->m_category,
                    'name' => $get_user->m_name,
                    'cv' => $get_user->member_cv,                    
                    'avatar' => $get_user->m_avatar,
                    'last_login_date' => $get_user->last_login_date,
                );
                
                $noti['user_id'] = $get_user->m_id;
                $noti['noti_title'] = $get_user->m_name."  has Joined Navafiz Professional Community";
                $noti['noti_desc'] = "Welcome ".$get_user->m_name." via trackingsheet using view this notification";
                $noti['noti_type'] = 'registration';
                $noti['noti_link'] = site_url('track_steps/sheet/'.$get_user->m_id);
                AddNotification($noti);
                
                //Update Last login date
                $this->profile_model->Save(array('last_login_date'=> datenow()),$get_user->m_id);
                

                $this->session->set_userdata($user_session_data);
                $user_id = $this->session->userdata('user_id');
                
                //MentorAutoAssigned($user_id);                
                redirect(base_url('profile/'.intval($user_id)));
                exit();
                
            }else{
                _setError("Unable to complete this request please try again");          
                redirect(site_url());
                exit();
            }            
        }else{
            _setError("Invalid Verification code please enter a valid code or get new code");          
            redirect('user/verify');
            exit();
        }
    }   

    public function resend_code(){
        $this->load->view('login/resend-code');
    }

    function updatecode(){
        
        $email_address = $this->input->post('email');
        $get_user = $this->profile_model->Search(array('m_email'=>$email_address));
        if(count($get_user)>0){
            $get_user = $get_user[0];
            
            $m_verification = rand(10000 , 99999);            
            
            
            $this->profile_model->Save(array('m_verification'=>$m_verification),$get_user->m_id);
            
            $to          = $get_user->m_email;
            $subject     = "Activation Code";
            $messageText .= '<html><body>';
            $messageText .= "Dear ".$get_user->m_name.",
            <br><br><br>
            Thank you for registering with Navafiz!
            <br><br>
            Your Verification code is
            <br>
            <b style='text-align: center;font-size: 30px;font-size: bold;'>".$m_verification."</b>
            <br><br>
            Or copy and paste the url in the browser: ".base_url()."user/verify/"."             
            <br>
            Regards,
            <br><br>
            The Navafiz Team
            <br><br>
            *This message was sent by an automated mail server. Please do not reply.
            <br>";
            $this->email($to,$subject,$messageText);

            _setSuccess('Please check your Email inbox/spam and enter the verification code to complete registration on Navafiz');                                
            redirect('user/verify');
            exit();
            
        }else{
            _setError('No Account associate with provided email address');                        
            redirect('user/resend_code');
            exit();
        }
    }

    function logout(){
        session_start(); 
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
        redirect(site_url("/"));
        exit();
    }


    public function email($to, $subject, $messageText){      
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com', //
            'smtp_port' => 465,        
            'smtp_user' => SMTP_USER, //
            'smtp_pass' => SMTP_PASSWORD, //
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'newline' => '\r\n'
        );   
    
        $this->load->library("email",$config);
        $this->email->from('navafizweb@gmail.com','Navafiz Support');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($messageText);
        if($this->email->send()) {      
            return 1;
        } else {
            show_error($this->email->print_debugger());      
        }
    }
    
    function forgotpassword()
    {
        $this->load->view('login/forgotpassword');
    }
    
    function sendfpassword()
    {
        $email_address = $this->input->post('email');
        $data =  $this->member_model->forgotpassword(array('email' =>$email_address));
        if($data){
            _setSuccess('Please check your email for password!');            
            redirect('user/login');
            exit();
        }else{
            _setError('Email Address not exist!');            
            redirect('user/forgotpassword');
            exit();
        }
    }

}