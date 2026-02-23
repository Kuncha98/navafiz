<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comming_soon extends CI_Controller {
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('member_model');
            $this->load->model('Profile_model','profile_model');
             $this->load->model('cvreview_points_model');
             $this->load->model('cvreview_model');
             $this->load->model('trackingsheet_chat');
             $this->load->model('member_job_portals');
             $this->load->model('member_recruiters');
             $this->load->model('employment_history_model');
             date_default_timezone_set('Asia/Dubai');
             $this->session_user_id = $this->session->userdata('user_id');            
            
        }
        
        function index()
        {
        
        $this->load->view('comming_soon');
        
        }
        
        
         public function Notify(){
            
             $name = $this->input->post('name');
             $email = $this->input->post('email');
             $message = $this->input->post('message');
             
             $to = $email;
                    $subject     = "Thanks you ".$name." for Contacting with Navafiz.";
                    $messageText .= '<html><body>';
                    $messageText .= "Dear ".$name.",                    
                    <br><br><br>
                    Thank you for Contacting with Navafiz.!
                    <br><br>
                    We will keep in touch with you.
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
                        
                        _setSuccess("An email has been sent to your email address");
                        redirect('comming_soon'); 
                        exit();
                                            
                    } else {
                        _setError("Please try again");
                        redirect('comming_soon'); 
                        exit();
                    }
            
             
           
        }
        
        

       
        
        
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */