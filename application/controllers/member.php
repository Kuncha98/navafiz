<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller {
    var $limit  = 15; var $offset = 0; var $pages  = 7; var $config1 = array();
    public $global_array; 
    
    function __construct(){
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('member_model');
        $this->load->model('job_model');
        $this->load->model('blog_model');
        $this->load->library('paging_front');	
    }
    function successstory(){
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        if($this->session->userdata('user_id') != ""){
            $data['story'] = $this->member_model->getStroy(array('user_id' =>$this->session->userdata('user_id')));
            $data['pagename'] = "home";
            $this->load->view('successstory', $data);
        }
        else{
            redirect(site_url());	
            exit();
        }
    }	
    
    function updateStroy(){
        $skillname = $this->input->post('subject');
        $descr = $this->input->post('descr');
        echo $data =  $this->member_model->updateStory(array('ss_member_id' =>$this->session->userdata('user_id'),'ss_subject' =>$skillname,'ss_descr' =>$descr));
        $this->session->set_flashdata('msg','Your success story update successfully!');
        redirect(base_url().'member/successstory');
        exit();
    }
    
     function successstories(){	
        $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
        $data['stories'] = $this->member_model->getStroy(array('ss_status' =>1));
        $data['pagename'] = "home";
        $this->load->view('successstories', $data);
    }
    
    function sendEmailUser(){
        
               $to = 'sikanderahmad930@gmail.com';
                    $subject     = "Thank you";
                    $messageText = '<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">'
                            . '<head>'
                            . '<meta charset="utf-8">'
                            . '<meta name="viewport" content="width=device-width,initial-scale=1">'
                            . '<meta name="x-apple-disable-message-reformatting">'
                            . '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">'
                            . '<title>Navafiz Email</title>'
                            . '<style>'
                            . 'table, td, div, h1, p {font-family: Arial, sans-serif;}'
                            . '@media screen and (max-width: 530px) {'
                            . '.unsub {display: block;padding: 8px;margin-top: 14px;border-radius: 6px;background-color: #555555;text-decoration: none !important;font-weight: bold;}'
                            . '}'
                            . '@media screen and (min-width: 531px) {'
                            . '.col-sml {max-width: 27% !important;}'
                            . '.col-lge {max-width: 73% !important;}'
                            . '}'
                            . '</style>'
                            . '</head>'
                            . '<body style="margin:0;padding:0;word-spacing:normal;background-color:#ffff;">';
                    $messageText .= ' <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;">'
                            . '<table role="presentation" style="width:100%;border:none;border-spacing:0;">'
                            . '<td align="center" style="padding:0;"><table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">'
                            . '<tr>'
                            . '<td style="padding:30px;background-color:#ffffff;"><a href="<?php echo site_url()?>" style="text-decoration:none;"><img src="https://navafiz.com/nassets/img/logo.png?v=1" width="165" alt="Logo" style="padding-left: 141px;margin-bottom: 30px;width:80%;max-width:344px;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>'
                            . '<h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">Hello John!</h1>'
                            . '<p style="margin:0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor.</p>'
                            . ' </td>'
                            . '</tr>'
                            . '<tr>'
                            . '<td style="padding:30px;background-color:#ffffff;">'
                            . ' <p style="margin:0;">Duis sit amet accumsan nibh, varius tincidunt lectus. Quisque commodo, nulla ac feugiat cursus, arcu orci condimentum tellus, vel placerat libero sapien et libero. Suspendisse auctor vel orci nec finibus.</p>'
                            . ' </td>'
                            . '</tr>'
                            . '<tr>'
                            . '<td style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">'
                            . '<div class="row">'
                            . '<div class="mx-auto">'
                            . '<a href="https://play.google.com/store/apps/details?id=navafiz.apk" target="_blank">'
                            . '<img src="https://navafiz.com/nassets/img/googleplaystore.png" class="img-fluid" width="200" />'
                            . '</a>'
                            . ' &nbsp;&nbsp;'
                            . '<a href="https://apps.apple.com/pk/app/navafiz/id1557617416" target="_blank">'
                            . '<img src="https://navafiz.com/nassets/img/applestore.png" class="img-fluid" width="200" />'
                            . '</a>'
                            . '</div></div></td></tr>'
                            . '<tr>'
                            . '<td style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">'
                            . ''
                            . ''
                            . ''
                            . '<ul style="display:inline-block;list-style:none;"><h5>About Navafiz</h5><li><a style="color:#fff;font-size: 8px" class="ftr" href="">About us</a></li><li><a style="color:#fff;font-size: 8px" class="ftr" href="">TV coverage</a></li></ul>'
                            . ''
                            . ''
                            . ''
                            . '<ul style="display:inline-block;list-style:none;"><h5>Jobs</h5><li><a style="color:#fff;font-size: 8px" class="ftr" href="">Find jobs</a></li><li><a style="color:#fff;font-size: 8px" class="ftr" href="">Register for Jobs</a></li></ul>'
                            . ''
                            . ''
                            . ''
                            . '<ul style="display:inline-block;list-style:none;"><h5>Discover</h5><li><a style="color:#fff;font-size: 8px" class="ftr" href="">Salaries</a></li><li><a style="color:#fff;font-size: 8px" class="ftr" href="">Courses</a></li></ul>'
                            . ''
                            . ''
                            . ''
                            . ' <ul style="display:inline-block;list-style:none;"><h5>For Employers</h5><li><a style="color:#fff;font-size: 8px" class="ftr" href="">Post a job</a></li><li><a style="color:#fff;font-size: 8px" class="ftr" href="">Search CV database</a></li></ul>'
                            . ''
                            . ''
                            . '</td>'
                            . '</tr>'
                            . '</table>'
                            . '</td>'
                            . '</tr>'
                            . ' </table>'
                            . ' </div>';

                    $messageText .= '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>'
                            . '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>'
                            . '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>'
                            . '</body></html>'; 
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
                       _setSuccess('Please check your Email inbox/spam and enter the verification code to complete registration on Navafiz');
                        echo "Email sent successfully ,,,";
                        exit();
                                         
                    } else {
                        _setError("Error sending email");
                        echo "Error sending email ,,,";
                        exit();
                    }
//        $this->load->view('send_email');
    }
      
}
