<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');





class Api extends CI_Controller{

        function __construct()

    {

        parent::__construct();
        
//        header("Access-Control-Allow-Methods: GET, OPTIONS");
//        header("Access-Control-Allow-Methods: POST, OPTIONS");
//        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
//        header("Access-Control-Allow-Origin: *");
        
        $this->load->model('member_model');
        
        $this->load->model('feed_comments_model'); 

        $this->load->model('notification_model'); 
        
	$this->load->model('member_model');

	$this->load->model('job_model');

        $this->load->library('twilio');

	$this->load->model('profile_model');

        $this->load->model('education_model');
        $this->load->model('feed_model'); 

   }

   

   public function login(){

       

      $email = $this->input->post('email');

      $password = $this->input->post('password');

      if(!empty($email) && !empty($password)){

          

      $get_user =  $this->profile_model->Search(array('m_email' =>$email, 'm_password' =>$password));

    //echo "<pre>"; print_r($get_user);exit();      

    //echo json_encode($get_user);

      if(count($get_user) > 0){

          $get_user = $get_user[0];

          unset($get_user->m_password);

          if($get_user->m_status==1){

              /*$user_data['user_id'] = $get_user->m_id;

              $user_data['email'] = $get_user->m_email;

              $user_data['username'] = $get_user->username;

              $user_data['login_type'] = "normal";

              $user_data['m_category'] = $get_user->m_category;

              $user_data['m_name'] = $get_user->m_name;

              $user_data['member_cv'] = $get_user->member_cv;

              $user_data['m_avatar'] = $get_user->m_avatar;

              $user_data['last_login_date'] = $get_user->last_login_date;*/

              

              $return['Code']  = 1;

              $return['Message'] ="You logged in successfully" ;

              $return['Data'] = array('user_info' => $get_user);

         

          }else if($get_user->m_status==2){

              

              $return['Code']  = 0;

              $return['Message'] ="Your Account is suspanded due to irrelevant activity" ;

              $return['Data'] = new stdClass();

             

          }else if($get_user->m_status==0){

              $return['Code']  = 0;

              $return['Message'] ="Your Account is Expired/Not Activated" ;

              $return['Data'] = new stdClass();

             

          }

      }else{

             $return['Code']  = 0;

             $return['Message'] ="Invalid Email or Password, Please enter the correct information" ;

             $return['Data'] = new stdClass();

          

      }

      }else{

          

            $return['Code']  = 0;

            $return['Message'] ="All fields are required" ;

            $return['Data'] = new stdClass();

      }

      

      echo json_encode($return); 

   

   }
   public function login_user(){

       

      $email = $this->input->post('user_email');

      $password = $this->input->post('user_password');

      if(!empty($email) && !empty($password)){

          

      $get_user =  $this->profile_model->Search(array('m_email' =>$email, 'm_password' =>$password));

    //echo "<pre>"; print_r($get_user);exit();      

    //echo json_encode($get_user);

      if(count($get_user) > 0){

          $get_user = $get_user[0];

          unset($get_user->m_password);

          if($get_user->m_status==1){

              /*$user_data['user_id'] = $get_user->m_id;

              $user_data['email'] = $get_user->m_email;

              $user_data['username'] = $get_user->username;

              $user_data['login_type'] = "normal";

              $user_data['m_category'] = $get_user->m_category;

              $user_data['m_name'] = $get_user->m_name;

              $user_data['member_cv'] = $get_user->member_cv;

              $user_data['m_avatar'] = $get_user->m_avatar;

              $user_data['last_login_date'] = $get_user->last_login_date;*/

              

              $return['Code']  = 1;

              $return['Message'] ="You logged in successfully" ;

              $return['Data'] = array('user_info' => $get_user);

         

          }else if($get_user->m_status==2){

              

              $return['Code']  = 0;

              $return['Message'] ="Your Account is suspanded due to irrelevant activity" ;

              $return['Data'] = new stdClass();

             

          }else if($get_user->m_status==0){

              $return['Code']  = 0;

              $return['Message'] ="Your Account is Expired/Not Activated" ;

              $return['Data'] = new stdClass();

             

          }

      }else{

             $return['Code']  = 0;

             $return['Message'] ="Invalid Email or Password, Please enter the correct information" ;

             $return['Data'] = new stdClass();

          

      }

      }else{

          

            $return['Code']  = 0;

            $return['Message'] ="All fields are required" ;

            $return['Data'] = new stdClass();

      }

      

      echo json_encode($return); 

   

   }

   

   

   

    public function register(){

        

        $name = $this->input->post("name");

        $email = $this->input->post("email");

        $password = $this->input->post("password");    

        

        if(!empty($name) && !empty($email) && !empty($password)){

            

            $user['m_name'] = $name;

            $user['m_email'] = $email;

            $user['m_password'] = $password;

        

        

            $find_user = $this->profile_model->Search(array('m_email'=>$email));

            if(!empty($find_user)){

                $return['Code']  = 0;

                $return['Message'] ="You're already registered with provided email, Please login or try forgot password" ;

                $return['Data'] = new stdClass();

            }else{

                $retun_id = $this->profile_model->Save($user);        

            

            if($retun_id>0) {

                $m_verification = rand(10000 , 99999);

                $to = $email;

                $messageText = '';

                $subject     = "Thanks you ".$name." for Registration with Navafiz One more step need to be completed";

                $messageText .= '<html><body>';

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

                        $return['Code']  = 1;

                        $return['Message'] ="Please check your Email inbox/spam and enter the verification code to complete registration on Navafiz" ;

                        $return['Data'] = new stdClass();

                    }else{

                        $return['Code']  = 0;

                        $return['Message'] = "There is some problem with Website Adminstrator" ;

                        $return['Data'] = new stdClass();

                    }                    

                } else {

                    $return['Code']  = 0;

                    $return['Message'] ="Your registeration is completed for login check with Website Adminstrator" ;

                    $return['Data'] = new stdClass();

                }                

            }

            }

            

            

        }else{

            $return['Code']  = 0;

            $return['Message'] ="Please provide all required information" ;

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);                

   }

   

   

   function register_sms(){

       $ph_no = $this->input->post('ph_no');

       $name = $this->input->post('name');

       $m_verification = rand(10000 , 99999);

       

//       echo $ph_no;

//       exit();

       

       if(!empty($ph_no)){

                $sms_sender = '+1 256 474 7336';

                $sms_reciever = $ph_no;

                $u_name = $name;

                $sms_message = 'Thank you '.$u_name.' for registering with navafiz your verfication code is '.$m_verification;

                $from = $sms_sender; //trial account twilio number

                $to = '+'.$sms_reciever; //sms recipient number

                $response = $this->twilio->sms($from, $to,$sms_message);



                if($response->IsError){



                $return['code'] = 0;

                $return['message'] = 'Cannot send sms, please check your phone number';

                $return['Data'] = array('response'=>$response);

//                print_r($response);

                }

                else{

                $return['code'] = 1;

                $return['message'] = 'Please check your Phone inbox and enter the verification code to complete registration on Navafiz';

                $return['Data'] = new stdClass();

                     

            }

       }else{

           $return['code'] = 0;

           $return['message'] = 'Phone number cannot be empty';

           $return['Data'] = new stdClass();

       }

       echo json_encode($return);

   }

   

   

   

   public function verify_user($m_verification=''){

        

       if($m_verification==''){

            $m_verification = $this->input->post('m_verification');

        }

        

        if(!empty($m_verification)){

            $get_user =  $this->profile_model->Search(array('m_verification' =>$m_verification));

            

            if(count($get_user)>0){

                $get_user = $get_user[0];

                unset($get_user->m_password);

                $res = $this->profile_model->Save(array('m_status' =>1),$get_user->m_id);

                

                if($res>0){

                    //$this->profile_model->Save(array('last_login_date'=> datenow()),$get_user->m_id);

                    $return['Code']  = 1;

                    $return['Message'] = "Your account has been activated" ;

                    $return['Data'] = array('user_info'=>$get_user);

                }else{

                    $return['Code']  = 0;

                    $return['Message'] ="Unable to complete this request" ;

                    $return['Data'] = new stdClass();

                }

          }else{

            $return['Code']  = 0;

            $return['Message'] ="Invalid verification code" ;

            $return['Data'] = new stdClass();

          }

        

        }else{

            $return['Code']  = 0;

            $return['Message'] ="Please provide verification code to complete this request" ;

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);        

   }

   

   

   public function GetProfileData($user_id=0){

        if($user_id==0){

            $user_id = $this->get_post('user_id');

        }

        

        $cquery = $this->db->query('select c_name as label, c_id as value from jb_categories where c_status=1');

        $categories = $cquery->result();

        

        $cquery1 = $this->db->query('select country as label, id as value from jb_country');

        $countries = $cquery1->result();

        

       if(!empty($user_id)){

           

           

            $get_user = $this->db->query('

                    select m.*, 

                    (select c_name from jb_categories where c_id=m.m_category) as m_category_name, 

                    (select c_name from jb_categories where c_id=m.industry1) as industry1_name,

                    (select c_name from jb_categories where c_id=m.industry2) as industry2_name,

                    (select country from jb_country where id=m.m_current_country_id) as current_country_name,

                    (select country from jb_country where id=m.country_id) as country_name

                    from jb_member m where m.m_id='.$user_id.'

                ');

            

            $mem_data = $get_user->result();
            
            $query = $this->db->query('select r.*, m.m_name,m.m_avatar,m.m_profession from jb_member m, jb_user_recommendation r where type="user_to_user" and r.recommend_by=m.m_id and r.user_id='.$user_id);
            $recommand_list = $query->result();

           //$get_user =  $this->profile_model->Search(array('m_id' =>$user_id));            

            $mem_data = $mem_data[0];

           

//           echo "<pre>";

//           print_r($mem_data);

//           exit();

           

            /*$usercatqry = $this->db->query('select m_category_name from jb_categories where co_id='.$mem_data->m_category);

            $usercatresult = $usercatqry->row();               

            echo "<pre>"; print_r($usercatresult);exit();*/

            

           unset($mem_data->m_password);

            if(!empty($mem_data)){

                

                $return['Code']  = 1;

                $return['Message'] ="User data fetched successfully" ;

                $return['Data'] = array('user_info' => $mem_data, 'countries' => $countries, 'categories' => $categories,'recommendation'=>$recommand_list);

            }else{

                $return['Code']  = 0;

                $return['Message'] ="Failed to fetched data" ;

                $return['Data'] = new stdClass();

            }

       }else{

                $return['Code']  = 0;

                $return['Message'] ="User id cannot be null" ;

                $return['Data'] = new stdClass();

        }

        echo json_encode($return);

   }

   

   public function updateProfile(){

       

       $user_id = $this->input->post('user_id');

       

       if($user_id>0){

            $user_data['m_name'] = $this->input->post('m_name');

            $user_data['username'] = $this->input->post('username');
            
            $user_data['gender'] = $this->input->post('gender');

            $user_data['m_category'] = $this->input->post('m_category');

            $user_data['industry1'] = $this->input->post('industry1');

            $user_data['industry2'] = $this->input->post('industry2');

            $country = $this->input->post('country_id');
            if(empty($country)){
                $user_data['country_id'] = 0;
            }else{
                $user_data['country_id'] = $country;
            }
            
           
            $user_data['m_profession'] = $this->input->post('m_profession');

            $user_data['m_employer'] = $this->input->post('m_employer');

            $user_data['m_phone'] = $this->input->post('m_phone');

            $user_data['m_experience'] = $this->input->post('m_experience');

            $user_data['uae_experience'] = $this->input->post('uae_experience');

            $user_data['m_nationality'] = $this->input->post('m_nationality');

            $user_data['employment_status'] = $this->input->post('employment_status');

            $current_country_id = $this->input->post('m_current_country_id');
            
            if(empty($current_country_id)){
                $user_data['m_current_country_id'] = 0;
            }else{
                $user_data['m_current_country_id'] = $current_country_id;
            }
            
            $user_data['m_current_city'] = $this->input->post('m_current_city');

            $user_data['m_city'] = $this->input->post('m_city');

            $user_data['m_married_status'] = $this->input->post('m_married_status');

            $user_data['m_driving_lisence'] = $this->input->post('m_driving_lisence');

            $user_data['m_current_country_id'] = $this->input->post('m_current_country_id');

            $user_data['m_languages'] = $this->input->post('m_languages');

            $user_data['visa_status'] = $this->input->post('visa_status');

            $user_data['role_id'] = $this->input->post('role_id');

            $user_data['linkedin_profile_link'] = $this->input->post('linkedin_profile_link');

            $user_data['youtube_cv_link'] = $this->input->post('youtube_cv_link');

            $user_data['profession1'] = $this->input->post('profession1');

            $user_data['profession2'] = $this->input->post('profession2');

            $user_data['profession3'] = $this->input->post('profession3');

            $user_data['profession4'] = $this->input->post('profession4');

            $user_data['profession5'] = $this->input->post('profession5');

//            print_r($user_data);
//            exit();

            if($this->profile_model->Save($user_data,$user_id)){

                $return['Code']  = 1;

                $return['Message'] ="User data updated successfully" ;

                $return['Data'] = new stdClass();

            }else{

                $return['Code']  = 0;

                $return['Message'] ="Cannot updated user data" ;

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] ="User Id cannot be null" ;

            $return['Data'] = new stdClass();

        }

       



    echo json_encode($return);

    

   }

   

public function listJob(){

    $page_id = $this->input->post('page_id');
    $limit = 30;
        
        if(!empty($page_id)){
            $page_id = intval($page_id);     
        
       
            if($page_id>0){
                $start = ($page_id-1)*$limit;   
            }else{
                $start = 0;
            }
        
        $job_details = $this->job_model->searchJobs(array('j_status' =>1,'limit'=>$limit,'start'=>$start));

   

        if(!empty($job_details)){

       

            $return['Code']  = 1;

            $return['Message'] ="Jobs fetched successfully" ;

            $return['Data'] = array('jobs'=>$job_details);

        }else{

            $return['Code']  = 0;

            $return['Message'] ="Error fetching jobs" ;

            $return['Data'] = new stdClass();

            }
        }else{
            $return['Code']  = 0;

            $return['Message'] ="All fields are required" ;

            $return['Data'] = new stdClass();
        }

   

   echo json_encode($return);

}



public function addeducation(){

        $user_id = $this->input->post('user_id');

        $me_degree = $this->input->post('me_degree');

        $me_year = $this->input->post('me_year');

        $me_descr = $this->input->post('me_descr');

        

        if(!empty($me_degree) && !empty($me_degree) && !empty($me_year) && !empty($me_descr)){

            $data['me_member_id'] = $user_id;

            $data['me_degree'] = $me_degree;

            $data['me_year'] = $me_year;

            $data['me_descr'] = $me_descr;

            $this->education_model->Save($data);

            

            $return['Code']  = 1;

            $return['Message'] ="Educational information added successfully" ;

            $return['Data'] = new stdClass();

            

        }else{

            $return['Code']  = 0;

            $return['Message'] ="All fields are required" ;

            $return['Data'] = new stdClass();

        }

        echo json_encode($return);

}





public function editeducation(){

    $id = $this->input->post('edu_id');



    if(!empty($id)){

       $mem_education = $this->education_model->GetById($id);

     if(!empty($mem_education)){

        $return['Code']  = 1;

        $return['Message'] ="Fetched education successfully" ;

        $return['Data'] = array('education' => $mem_education);

     }else{

        $return['Code']  = 0;

        $return['Message'] ="Failed to fetch education" ;

        $return['Data'] = new stdClass();

     }    

    }else{

        $return['Code']  = 0;

        $return['Message'] ="Id cannot be null" ;

        $return['Data'] = new stdClass();

    }

    

    echo json_encode($return);

    

}



public function updateeducation(){

        

        $edu_id = $this->input->post('edu_id');

        $user_id = $this->input->post('user_id');

        $degree = $this->input->post('me_degree');

//        echo $degree;exit();

        $year = $this->input->post('me_year');

        $detail = $this->input->post('me_descr');

        if(isset($edu_id) && isset($user_id) && isset($degree) && isset($year) && isset($detail)){

            $data['me_degree'] = $degree;

            $data['me_year'] = $year;

            $data['me_descr'] =   $detail;

            $data['me_member_id'] =   $user_id;

            

            if($this->education_model->Save($data,$edu_id)){

                $return['Code']  = 1;

                $return['Message'] = "Education information updated successfully";

                $return['Data'] = new stdClass();

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Error updating educational information";

                $return['Data'] = new stdClass();

            }

        }else{

                $return['Code']  = 0;

                $return['Message'] = "All fields are required";

                $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

}





public function deleteeducation(){

    $id = $this->input->post('edu_id');

    if(!empty($id)){
        $data['me_id'] = $id;
        $query = $this->db->delete('jb_member_education',$data);
        if(!empty($query)){

            $return['Code']  = 1;

            $return['Message'] = "Educational information deleted successfully";

            $return['Data'] = new stdClass();

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Cannot delete eduactional information";

            $return['Data'] = new stdClass();

        }    

    }else{

            $return['Code']  = 0;

            $return['Message'] = "Educational information id cannot be null";

            $return['Data'] = new stdClass();

    }

    

    echo json_encode($return);

}



public function deletejob(){

    $id = $this->input->post('job_id');

    if(!empty($id)){

        if($this->job_model->Delete($id)){

            $return['Code']  = 1;

            $return['Message'] = "Job deleted successfully";

            $return['Data'] = new stdClass();

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Cannot delete Job";

            $return['Data'] = new stdClass();

        }    

    }else{

            $return['Code']  = 0;

            $return['Message'] = "Job id cannot be null";

            $return['Data'] = new stdClass();

    }

    

    echo json_encode($return);

}







public function job_detail(){

    

    $id = $this->input->post('job_id');

    

    if(!empty($id)){

         $job = $this->job_model->searchJob($id);

    

    $shortlist_can = $this->job_model->GetAll_can($id);

    $top_jobs = $this->job_model->get10jobs();

    $recommend_list = $this->job_model->recommended_list($id);

    $jobcomments = $this->job_model->getJobComments(array('j_status' =>1,'j_id' =>$id,'com_type' =>"job"));

    $relatedmembers = $this->member_model->getRelatedMember(array('m_status' => 1,'cat_id' =>$job[0]->cat_id));

    

    if(isset($job->j_status) && $job->j_status!=1){

          $return['Code']  = 0;

          $return['Message'] = "Job is Expired";

          $return['Data'] = new stdClass();

            

        }else{

          $return['Code']  = 1;

          $return['Message'] = "Job details fetched successfully";

          $return['Data'] = array('job' => $job, 'top_jobs' => $top_jobs, 'recommended_list' => $recommend_list, 'job_comments' => $jobcomments, 'related_members' => $relatedmembers);

        }

    }else{

          $return['Code']  = 0;

          $return['Message'] = "Job id cannot be null";

          $return['Data'] = new stdClass();

    }

    

   

        

        echo json_encode($return);

    

}



public function edit_job(){

        $id = $this->input->post('job_id');

       if(!empty($id)){

        $getjob = $this->job_model->GetById($id);

        $categories = $this->job_model->getCategories(array('c_staus' => 1));            

        $country_qry = "SELECT * FROM jb_country";

        $query = $this->db->query($country_qry);

        $country_list = $query->result();

       if(!empty($getjob)){

        $return['Code']  = 1;

        $return['Message'] = "Job details fetched successfully";

        $return['Data'] = array('job' => $getjob, 'categories' => $categories, 'country_list' => $country_list);

       }else{

           $return['Code']  = 0;

          $return['Message'] = "Error fetching job details";

          $return['Data'] = new stdClass();

       }

        

        

       }else{

          $return['Code']  = 0;

          $return['Message'] = "Job id cannot be null";

          $return['Data'] = new stdClass();

       }   

        echo json_encode($return);

}





public function update_job(){

     	$user_id = $this->input->post('user_id');

        $id = $this->input->post('job_id');

        if(!empty($id)){

        

        $config=array();

        $config['upload_path'] ='assets/uploads/jobs/';

        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $config['overwrite']     = false;

        $config['max_size']      = 1024;

        $config['remove_spaces'] = true;

        $config['max_filename']   = 10;

        $config['file_ext_tolower'] = true;

        $this->upload->initialize($config);

        

    if(!empty($_FILES['pic']['name'])){



     if($this->upload->do_upload('pic')){

        $udata = array('upload_data' => $this->upload->data());                

        $jobimage = $udata['upload_data']['file_name'];            

        $data['j_image'] = $jobimage;     

    }else{

        $errors = $this->upload->display_errors();

        echo "<pre>"; print_r($errors); echo "</pre>";

        exit;

    }

    }

    

        

        

        $data['j_id'] = $id;

        $data['j_addedby'] = $user_id;                

        $data['cat_id'] = $this->input->post('jobcat_id');

        $data['j_title'] = $this->input->post('jobtitle');

        $data['j_tags'] = $this->input->post('jobtags');

        $data['j_country_id'] = $this->input->post('jobcountry');

        $data['j_state'] = $this->input->post('jobstate');

        $data['j_location'] = $this->input->post('jobcity');

        $data['j_descr'] = $this->input->post('jobdescr');

        $data['j_company'] = $this->input->post('jobcompany');

        $data['j_email_apply'] = $this->input->post('jobemailapply');

        $data['job_reference_by'] = $this->input->post('job_reference_by');

        

        $save_image['pic'] = $data['j_image'];

        

        if($this->job_model->Save($data,$id)){

             $return['Code']  = 1;

             $return['Message'] = "Job updated successfully";

             $return['Data'] = new stdClass();

        }else{

             $return['Code']  = 0;

             $return['Message'] = "Cannot update job";

             $return['Data'] = new stdClass();

        }

        if($save_image['pic'] != ""){

           $this->job_model->saveImage($save_image);

        }

        

    }else{

        $return['Code']  = 0;

        $return['Message'] = "Job id cannot be null";

        $return['Data'] = new stdClass();

    }

    

    echo json_encode($return);

	

}



public function add_job(){

    

    $categories = $this->job_model->getCategories(array('c_staus' => 1));            

    $country_qry = "SELECT * FROM jb_country";

    $query = $this->db->query($country_qry);

    $country_result = $query->result();

    if(isset($categories) && isset($country_result)){

        $return['Code']  = 1;

        $return['Message'] = "Add Job";

        $return['Data'] = array('categories' => $categories, '$country_list' => $country_result);

    }else{

        $return['Code']  = 0;

        $return['Message'] = "Countries and categories cannot be null";

        $return['Data'] = new stdClass();

    }

    

    echo json_encode($return);

   

}





public function save_job(){

    

    $user_id = $this->input->post('user_id');

    if(!empty($user_id)){

        if($_FILES['pic']['name']){

        $config=array();

        $config['upload_path'] ='assets/uploads/jobs/';

        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $config['overwrite']     = false;

        $config['max_size']      = 1024;

        $config['remove_spaces'] = true;

        $config['max_filename']   = 10;

        $config['file_ext_tolower'] = true;

        $this->upload->initialize($config);



            if (!$this->upload->do_upload('pic')) {

            $return['Code']  = 0;

            $return['Message'] = "Cannot upload image";

            $return['Data'] = new stdClass();

            exit();

            }

            else

            {                     

                $datai1 = $this->upload->data();            

                $jobimage = $datai1['file_name'];

            }

        }else{

            $jobimage = '';

        }



        $data['j_addedby'] = $user_id;     

        $data['j_image'] = $jobimage;  

        $data['cat_id'] = $this->input->post('jobcat_id');

        $data['j_title'] = $this->input->post('jobtitle');

        $data['j_tags'] = $this->input->post('jobtags');

        $data['j_country_id'] = $this->input->post('jobcountry');

        $data['j_state'] = $this->input->post('jobstate');

        $data['j_location'] = $this->input->post('jobcity');

        $data['j_descr'] = $this->input->post('jobdescr');

        $data['j_company'] = $this->input->post('jobcompany');

        $data['j_email_apply'] = $this->input->post('jobemailapply');

        $data['job_reference_by'] = $this->input->post('job_reference_by');

        $data['j_status'] = 1;

        $data['j_add_date'] = time();

        

        $save_image['pic']=$data['j_image'];

        

        if($this->job_model->Save($data)){

            $return['Code']  = 1;

            $return['Message'] = "Job added successfully";

            $return['Data'] = new stdClass();

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Failed to add job";

            $return['Data'] = new stdClass();

        }

        

        if($save_image['pic'] != ""){

        $this->job_model->saveImage($save_image);

       }

    }else{

            $return['Code']  = 0;

            $return['Message'] = "User id cannot be null";

            $return['Data'] = new stdClass();

    }

      

    

        echo json_encode($return);

}





public function uploadcv(){

    $id = $this->input->post('user_id');
//    echo $id;
//    exit();
if(!empty($id)){

    $user_info = $this->profile_model->GetById($id);

    if(!empty($user_info)){

    $file_ext=preg_split("/\./", $_FILES["resume_file"]["name"]);

    $file_ext1=$file_ext[count($file_ext)-1];

    $file_name = preg_replace('/\s/', '-', $user_info->m_name)."_".$user_info->m_id.".".$file_ext1;

//    print_r($file_name);

//    echo $file_name;

//    exit();

    $config = array('upload_path'=> 'public-assets/cvreviews/', 'allowed_types' => 'doc|docx|pdf','file_name'=>$file_name,'overwrite'=>TRUE);

    $this->load->library('upload', $config);                    

    $this->upload->initialize($config);

    

    if($this->upload->do_upload('resume_file')){

            $udata = array('upload_data' => $this->upload->data());                        

            $resume_file = $udata['upload_data']['file_name'];

            

            $this->profile_model->Save(array('member_cv'=>$resume_file),$user_info->m_id);                    





            $data = array(

                'upload_resume' => 1

            );

            

            $return['Code']  = 1;

            $return['Message'] = "CV has been successfully uploaded";

            $return['Data'] = new stdClass();

            

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Cannot Upload CV";

            $return['Data'] = new stdClass();

        }

    

    }else{

    $return['Code']  = 0;

    $return['Message'] = "Cannot fetched user details";

    $return['Data'] = new stdClass();

    }

}else{

    $return['Code']  = 0;

    $return['Message'] = "User id cannot be null";

    $return['Data'] = new stdClass();

}

   echo json_encode($return); 

}





public function updateprofilePhoto(){

    $user_id = $this->input->post('user_id');

    

    if(!empty($user_id)){

        $user_detail = $this->member_model->userDetail(array('user_id' =>$user_id));

        $post_file = intval($this->get_post('post_file',0));

        

        $member_name = preg_replace('/\s*/', '', $user_detail->m_name);

        $member_name = strtolower($member_name);

        

        

        /******************************////

        /*$target_dir = "assets/uploads/apps/";

        $target_file = $target_dir . basename($_FILES["post_file"]["name"]);

        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



        // Check if image file is a actual image or fake image

        if(isset($_POST["submit"])) {

          $check = getimagesize($_FILES["post_file"]["tmp_name"]);

          if($check !== false) {

            echo "File is an image - " . $check["mime"] . ".";

            $uploadOk = 1;

          } else {

            echo "File is not an image.";

            $uploadOk = 0;

          }

        }



        // Check if file already exists

       /* if (file_exists($target_file)) {

          echo "Sorry, file already exists.";

          $uploadOk = 0;

        }



        // Check if $uploadOk is set to 0 by an error

        if ($uploadOk == 0) {

          echo "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file

        } else {

          if (move_uploaded_file($_FILES["post_file"]["tmp_name"], $target_file)) {

            echo $_FILES["post_file"]["tmp_name"];

            echo "<br />";

            echo $target_file;

            //echo "The file ". htmlspecialchars( basename( $_FILES["post_file"]["name"])). " has been uploaded.";            

          } else {

            echo "Sorry, there was an error uploading your file.";

          }

        }

        

        exit();

        /******************************////

        



        //$config = array('upload_path'=> 'assets/uploads/apps/', 'allowed_types' => 'gif|jpg|png|jpeg','file_name'=>$member_name.'-'.rand(0,9999),'overwrite'=>TRUE);

        $config = array('upload_path'=> 'assets/uploads/members/temp', 'allowed_types' => 'gif|jpg|png|jpeg','file_name'=>$member_name.'-'.rand(0,9999),'overwrite'=>TRUE);

        $this->load->library('upload', $config);                    

        $this->upload->initialize($config);



         if($this->upload->do_upload('post_file')){             

                $udata = array('upload_data' => $this->upload->data());                        

                $file_name = $udata['upload_data']['file_name'];

                $data['m_avatar'] = $file_name;

              if($this->member_model->Save($data,$user_id)){

                    $full_image_path="./assets/uploads/members/".$file_name;

                    copy("./assets/uploads/members/temp/".$file_name,$full_image_path);

                    resizeImg($full_image_path, 500, 500);



                    $medium_thumb_image_path="./assets/uploads/members/small_thumbs/".$file_name;

                    copy("./assets/uploads/members/".$file_name,$medium_thumb_image_path);

                    resizeImg($medium_thumb_image_path, 200, 200);

                    

                   $return['Code']  = 1;

                   $return['Message'] = "Image Uploaded successfully";

                   $return['Data'] = new stdClass();

              }else{

                  $return['Code']  = 0;

                  $return['Message'] = "Error uploading image";

                  $return['Data'] = new stdClass();

              }

            }else{

                /*$errors = $this->upload->display_errors();

                echo "<pre>"; print_r($errors); echo "</pre>";

                exit;*/                

                $return['Code']  = 0;

                $return['Message'] = "Server error, please try again later";

                $return['Data'] = new stdClass();

            }

    }else{

        $return['Code']  = 0;

        $return['Message'] = "User id cannot be null";

        $return['Data'] = new stdClass();

    }    

    

    echo json_encode($return);

}



    public function ListexpericencebyUser($user_id=0){



        if($user_id==0){

            $user_id = $this->get_post('user_id');

        }



        if($user_id>0){

            $this->db->select('*');

            $query = $this->db->get_where('jb_employment_history', array('user_id'=>$user_id));

            $results = $query->result();

            if(!empty($results)){

                $return['Code']  = 1;

                $return['Message'] = "User Experience";

                $return['Data'] = array('user_experience' => $results);

            }else{
                $return['Code']  = 1;

                $return['Message'] = "No User Experience";

                $return['Data'] = new stdClass();
            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "User id cannot be null";

            $return['Data'] = new stdClass();

        }    



        echo json_encode($return);

    }



    public function SaveUserExperience(){

        

        $user_id = $this->get_post('user_id');

        

        if($user_id>0){                        

            $company_name = $this->get_post('company_name');

            $company_id = $this->get_post('company_id');

            $start_year = $this->get_post('start_year');

            $end_year = $this->get_post('end_year');

            $description = $this->get_post('description');

            $position_designation = $this->get_post('position_designation');

            $to_date = $this->get_post('to_date','');		

            if (!empty($to_date)) {

                    $end_year = $to_date;

            }

            

            $data['user_id'] = $user_id;

            $data['company_name'] = $company_name;

            $data['company_id'] = $company_id;

            $data['position_designation'] = $position_designation;

            $data['start_year'] = $start_year;

            $data['end_year'] = $end_year;

            $data['description'] = $description;

            

            $query = $this->db->insert('employment_history', $data);

            

            if(!empty($query)){

                $return['Code']  = 1;

                $return['Message'] = "Emperience Addedd Successfully";

                $return['Data'] = new stdClass();

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Unable to add experience please try again";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    

    public function UpdateUserExperience(){

        

        $user_id = $this->get_post('user_id');

        $emp_history_id = intval($this->get_post('emp_history_id',0));

        

        if($user_id>0 && $emp_history_id>0){  

            

            $company_name = $this->get_post('company_name');

            $company_id = $this->get_post('company_id');

            $start_year = $this->get_post('start_year');

            $end_year = $this->get_post('end_year');

            $description = $this->get_post('description');

            $position_designation = $this->get_post('position_designation');

            $to_date = $this->get_post('to_date','');		

            if (!empty($to_date)) {

                $end_year = $to_date;

            }

            

            

            $data['user_id'] = $user_id;

            $data['company_name'] = $company_name;

            $data['company_id'] = $company_id;

            $data['position_designation'] = $position_designation;

            $data['start_year'] = $start_year;

            $data['end_year'] = $end_year;

            $data['description'] = $description;

            

            $this->db->where('emp_history_id', $emp_history_id);

            $query = $this->db->update('employment_history', $data);            

            if(!empty($query)){

                $return['Code']  = 1;

                $return['Message'] = "Experience Updated Successfully";

                $return['Data'] = new stdClass();

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Unable to add experience please try again";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }
    
public function deleteUserExperiance(){
    $id = $this->input->post('exp_id');
    if(!empty($id)){
        $data['emp_history_id'] = $id;
        $query = $this->db->delete('jb_employment_history',$data);
        
        if(!empty($query)){
            $return['Code']  = 1;
            $return['Message'] = "User experience deleted successfully";
            $return['Data'] = new stdClass();
        }else{
            $return['Code']  = 0;
            $return['Message'] = "Error deleting user experience";
            $return['Data'] = new stdClass();
        }
    }else{
        $return['Code']  = 0;
        $return['Message'] = "Please provide all the fields and try again";
        $return['Data'] = new stdClass();
    }
    
    echo json_encode($return);
}

    

    public function SearchCompanies($keyword=''){



        if($keyword==''){

            $keyword = $this->get_post('keyword');

        }



        if(!empty($keyword)){            

            $query ="SELECT * FROM jb_companies WHERE co_name like '" . $keyword . "%' ORDER BY co_name";

            $results = $this->db->query($query)->result();

            if(!empty($results)){

                $return['Code']  = 1;

                $return['Message'] = "Company List by Keyword";

                $return['Data'] = array('companies_list' => $results);

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Al Least required 1 company name";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Al Least required 1 company name";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    

    public function ListUserCourses($user_id = 0){

        if($user_id==0){

            $user_id = $this->get_post('user_id');

        }

        if($user_id>0){

            $this->db->select('*');

            $query = $this->db->get_where('jb_member_certification', array('user_id'=>$user_id));

            $results = $query->result();

            if(!empty($results)){

                $return['Code']  = 1;

                $return['Message'] = "User Courses List";

                $return['Data'] = array('user_courses' => $results);

            }else{

                $return['Code']  = 0;

                $return['Message'] = "No data found with provided information";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "User id cannot be null";

            $return['Data'] = new stdClass();

        }

        echo json_encode($return);

    }

    

    

    

    

    public function SaveUserCourses(){

        

        $user_id = $this->get_post('user_id');

        

        if($user_id>0){

            $c_title = $this->get_post('c_title');

            $c_description = $this->get_post('c_description');

            $c_duration = $this->get_post('c_duration');

           if($_FILES['certificate_file']['name']){

                $config=array();

                $config['upload_path'] ='nassets/profile/courses-ceritificates';

                $config['allowed_types'] = 'gif|jpg|jpeg|png';

                $config['overwrite']     = false;

                $config['max_size']      = 1024;

                $config['remove_spaces'] = true;

                $config['max_filename']   = 10;

                $config['file_ext_tolower'] = true;

                $this->upload->initialize($config);



            if (!$this->upload->do_upload('certificate_file')) {

            $return['Code']  = 0;

            $return['Message'] = "Cannot upload image";

            $return['Data'] = new stdClass();

            exit();

            }

            else

            {                     

                $datai1 = $this->upload->data();            

                $course_image = $datai1['file_name'];

            }

        }else{

            $jobimage = '';

        }

        

        $data['c_title'] = $c_title;     

        $data['c_description'] = $c_description;  

        $data['c_duration'] = $c_duration;

        $data['certification_file'] = $course_image;

        $data['user_id'] = $user_id;

        

        $query = $this->db->insert('jb_member_certification', $data);

        if(!empty($query)){

                $return['Code']  = 1;

                $return['Message'] = "Courses Addedd Successfully";

                $return['Data'] = new stdClass();

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Unable to add Courses please try again";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    

    

    public function UpdateUserCourses(){

        $user_id = $this->input->post('user_id');

        $c_id = $this->input->post('certificate_id');

        if(!empty($c_id)){

        

        $config=array();

        $config['upload_path'] ='nassets/profile/courses-ceritificates';

        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $config['overwrite']     = false;

        $config['max_size']      = 1024;

        $config['remove_spaces'] = true;

        $config['max_filename']   = 10;

        $config['file_ext_tolower'] = true;

        $this->upload->initialize($config);

        

    if(!empty($_FILES['certificate_file']['name'])){



        if($this->upload->do_upload('certificate_file')){

            $udata = array('upload_data' => $this->upload->data());                

            $c_file = $udata['upload_data']['file_name'];            

            $data['certification_file'] = $c_file;     

        }else{

            $errors = $this->upload->display_errors();

            echo "<pre>"; print_r($errors); echo "</pre>";

            exit;

        }

    }

    

        

        

        $data['c_id'] = $c_id;

        $data['user_id'] = $user_id;                

        $data['c_title'] = $this->input->post('c_title');     

        $data['c_description'] = $this->input->post('c_description');     

        $data['c_duration'] = $this->input->post('c_duration');     

        $data['updated_on'] = date('Y-m-d H:i:s');

        

        $this->db->where('c_id', $c_id);

        $query = $this->db->update('jb_member_certification', $data);

        

        if(!empty($query)){

             $return['Code']  = 1;

             $return['Message'] = "Courses updated successfully";

             $return['Data'] = new stdClass();

        }else{

             $return['Code']  = 0;

             $return['Message'] = "Cannot update courses";

             $return['Data'] = new stdClass();

        }

        

        

    }else{

        $return['Code']  = 0;

        $return['Message'] = "Please provide all fields";

        $return['Data'] = new stdClass();

    }

    

    echo json_encode($return);

    

    }
    
    
public function deleteUserCertification(){
    
    $cert_id = $this->input->post('certificate_id');
    if(!empty($cert_id)){
        
    $data['c_id'] = $cert_id;
    
    $query = $this->db->delete('jb_member_certification', $data);
        if(!empty($query)){

                    $return['Code']  = 1;

                    $return['Message'] = "Courses deleted successfully";

                    $return['Data'] = new stdClass();

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Unable to delete courses please try again";

            $return['Data'] = new stdClass();

        }
    
    }else{
            $return['Code']  = 0;

            $return['Message'] = "Please provide all fields";

            $return['Data'] = new stdClass();
    }
    
    echo json_encode($return);
}


    

    

    public function ListUserEducation($user_id=0){



        if($user_id==0){

            $user_id = $this->get_post('user_id');

        }

        

        if($user_id>0){

            $this->db->select('*');

            $query = $this->db->get_where('jb_member_education', array('me_member_id'=>$user_id));

            $results = $query->result();

            if(!empty($results)){

                $return['Code']  = 1;

                $return['Message'] = "User Education List";

                $return['Data'] = array('user_education' => $results);

            }else{

                $return['Code']  = 0;

                $return['Message'] = "No data found with provided information";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "User id cannot be null";

            $return['Data'] = new stdClass();

        }    

        echo json_encode($return);

    }

    

    public function SaveUserEducation(){

        

        $user_id = $this->get_post('user_id');

        

        if($user_id>0){                                                

            $me_degree = $this->get_post('me_degree');

            $me_year = $this->get_post('me_year');

            $me_descr = $this->get_post('me_descr');

            

            $data['me_member_id'] = $user_id;

            $data['me_degree'] = $me_degree;

            $data['me_year'] = $me_year;

            $data['me_descr'] = $me_descr;

                        

            $query = $this->db->insert('jb_member_education', $data);            

            if(!empty($query)){

                $return['Code']  = 1;

                $return['Message'] = "Education Addedd Successfully";

                $return['Data'] = new stdClass();

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Unable to add Education please try again";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    

    public function UpdateUserEducation(){

        

        $user_id = $this->get_post('user_id');

        

        if($user_id>0){        

            $me_id = $this->get_post('me_id');

            if($me_id>0){

                

                $me_degree = $this->get_post('me_degree');

                $me_year = $this->get_post('me_year');

                $me_descr = $this->get_post('me_descr');

                

                $data['me_member_id'] = $user_id;

                $data['me_degree'] = $me_degree;

                $data['me_year'] = $me_year;

                $data['me_descr'] = $me_descr;



                $this->db->where('me_id', $me_id);

                $query = $this->db->update('jb_member_education', $data);  

                if(!empty($query)){

                    $return['Code']  = 1;

                    $return['Message'] = "Education Addedd Successfully";

                    $return['Data'] = new stdClass();

                }else{

                    $return['Code']  = 0;

                    $return['Message'] = "Unable to add Education please try again";

                    $return['Data'] = new stdClass();

                }    

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Invalid Education ID";

                $return['Data'] = new stdClass();

            }            

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    

    

    public function UpdateUserSkills(){

        

        $user_id = $this->get_post('user_id');

        

        if($user_id>0){

            $m_skills = $this->get_post('m_skills');

            $data['m_skills'] = $m_skills;                

            $query = $this->profile_model->Save($data, $user_id);

            if(!empty($query)){

                $return['Code']  = 1;

                $return['Message'] = "Skills Updated Successfully";

                $return['Data'] = new stdClass();

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Unable to add Skills please try again";

                $return['Data'] = new stdClass();

            }                

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    

    public function ListUserCareerSummaryPoints($user_id=0){

        

        if($user_id==0){

            $user_id = $this->get_post('user_id');

        }

        

        if($user_id>0){

            $this->load->model('member_summary_career_model','summary_career_model');

            

            $member_summary_points = $this->summary_career_model->Search(array('m_id'=>$user_id));

            if(count($member_summary_points)>0){

                $member_summary_points = $member_summary_points[0];                

                $return['Code']  = 1;

                $return['Message'] = "Career Points";

                $return['Data'] = array('member_summary_points'=>$member_summary_points);

                

            }else{

                $return['Code']  = 0;

                $return['Message'] = "No Data Found";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    public function UpdateUserCareerSummary(){

        

        $user_id = $this->get_post('user_id');        

        if($user_id>0){            

            $this->load->model('member_summary_career_model','summary_career_model');        

            $data['point_1'] = $this->get_post('point_1');

            $data['point_2'] = $this->get_post('point_2');

            $data['point_3'] = $this->get_post('point_3');

            $data['point_4'] = $this->get_post('point_4');

            $data['point_5'] = $this->get_post('point_5');

            $data['point_6'] = $this->get_post('point_6');

            $data['point_7'] = $this->get_post('point_7');

            $data['point_8'] = $this->get_post('point_8');

            $data['point_9'] = $this->get_post('point_9');

            $data['point_10'] = $this->get_post('point_10');

            $data['m_id'] = $user_id;

            $data['added_on'] = date('Y-m-d H:i:s');

            

            $delexisting = $this->summary_career_model->DeleteUser($user_id);

            if($delexisting){

                $query = $this->summary_career_model->Save($data);

                if($query){

                    $return['Code']  = 1;

                    $return['Message'] = "Request Completed Successfully";

                    $return['Data'] = new stdClass();

                }else{

                    $return['Code']  = 0;

                    $return['Message'] = "Unable to complete request please try again";

                    $return['Data'] = new stdClass();

                }                

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Unable to complete request please try again";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    

    public function SaveCompany(){

        

        $this->load->model('companies_model');        

        $user_id = $this->input->post('user_id');

        if($user_id>0){

            

            if(isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])){             

                //Image Libaray Config

                $logo_path = 'assets/uploads/companies/';

                $config = array('upload_path'=> $logo_path, 'allowed_types' => 'jpeg|gif|jpg|png','file_name'=>'company-'.rand(0,9999),'overwrite'=>TRUE);

                $this->load->library('upload', $config);                    

                $this->upload->initialize($config);

                if($this->upload->do_upload('company_logo')){              

                    $udata = array('upload_data' => $this->upload->data());                        

                    $file_name = $udata['upload_data']['file_name'];

                    $co_logo = $logo_path.$file_name;

                    $post_data['co_logo'] = $co_logo;

                }

            }

            

            $cat_id = $this->input->post('cat_id');

            $name = $this->input->post('name');

            $email = $this->input->post('email');

            $mobile = $this->input->post('mobile');

            $phone = $this->input->post('phone');

            $fax = $this->input->post('fax');

            $address = $this->input->post('address');

            $website = $this->input->post('website');

            $keywords = $this->input->post('keywords');

            $co_career_page = $this->input->post('co_career_page');



            $post_data['co_cat_id'] = $cat_id;

            $post_data['co_name'] = $name;

            $post_data['co_email'] = $email;

            $post_data['co_phone'] = $phone;

            $post_data['co_fax'] = $fax;

            $post_data['co_address'] = $address;

            $post_data['co_tags'] = $keywords;

            $post_data['co_website'] = $website;

            $post_data['co_career_page'] = $co_career_page;

            $post_data['co_status'] = 1;

            $post_data['user_id'] = $user_id;        

            $post_data['added_on'] = datenow();

            

            $result = $this->companies_model->Save($post_data);            

            if($result){

                $return['Code']  = 1;

                $return['Message'] = "Reqest Completed Successfully";

                $return['Data'] = new stdClass();   

            }else{

                $return['Code']  = 0;

                $return['Message'] = "Unable to process request please try again";

                $return['Data'] = new stdClass();   

            }



        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();   

        }

        

        echo json_encode($return);

    }

    

    

    public function ListUserAchivements($user_id=0){

        

        if($user_id==0){

            $user_id = $this->get_post('user_id');

        }

        

        if($user_id>0){

            $this->load->model('achievements_model','achievements_model');

            

            $achivements_lists = $this->achievements_model->GetAllByID($user_id);

            if(count($achivements_lists)>0){                

                $return['Code']  = 1;

                $return['Message'] = "List loaded Successfully";

                $return['Data'] = array('achivements_list'=>$achivements_lists);                

            }else{

                $return['Code']  = 0;

                $return['Message'] = "No Data Found";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    

    public function SaveUserAchivement(){

        $user_id = $this->get_post('user_id');

        if($user_id>0){

            $this->load->model('achievements_model','achievements_model');

            

            $title = $this->get_post('title');

            $description = $this->get_post('description');

            

            $data['title'] = $title;

            $data['description'] = $description;

            $data['user_id'] = $user_id;

            $data['added_on'] = datenow();

            

            $query = $this->achievements_model->Save($data);

            

            if($query){                

                $return['Code']  = 1;

                $return['Message'] = "Request Completed Successfully";

                $return['Data'] = new stdClass();

            }else{

                $return['Code']  = 0;

                $return['Message'] = "No Data Found";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }

    

    public function UpdateUserAchivement(){

        $user_id = $this->get_post('user_id');

        if($user_id>0){

            $this->load->model('achievements_model','achievements_model');

            

            $achive_id = $this->get_post('achive_id');

            $title = $this->get_post('title');

            $description = $this->get_post('description');

            

            $data['title'] = $title;

            $data['description'] = $description;

            $data['user_id'] = $user_id;

            $data['added_on'] = datenow();

            

            $query = $this->achievements_model->Save($data,$achive_id);

            

            if($query){                

                $return['Code']  = 1;

                $return['Message'] = "Request Completed Successfully";

                $return['Data'] = new stdClass();

            }else{

                $return['Code']  = 0;

                $return['Message'] = "No Data Found";

                $return['Data'] = new stdClass();

            }

        }else{

            $return['Code']  = 0;

            $return['Message'] = "Please provide required data";

            $return['Data'] = new stdClass();

        }

        

        echo json_encode($return);

    }
    
    
    public function loadFeed(){
        
        
        $page_id = $this->input->post('page_id');
        $limit = 30;
        
        if(!empty($page_id)){
            $page_id = intval($page_id);     
        
       
            if($page_id>0){
                $start = ($page_id-1)*$limit;   
            }else{
                $start = 0;
            }
            
            $where['del_status'] = 1;
            $feed_list = $this->feed_model->SearchByLimit($where, $limit,$start);            
            
            foreach($feed_list as $afeed){
                $likescountquery = $this->db->query('select user_id from jb_feed_likes where feed_id='.$afeed->feed_id);
                $likescountresult = $likescountquery->result();                                            
                $afeed->feed_likes_users_list = $likescountresult;
            }
            
            $likescountquery = $this->db->query('select * from jb_feed_likes');
            $likescountresult = $likescountquery->result();            
            
            if(!empty($feed_list)){
                $return['Code']  = 1;
                $return['Message'] = "Feeds fetched successfully";
                $return['Data'] = array('feeds'=>$feed_list,'page_id'=>$page_id,'feed_likes_users_list'=>$likescountresult); 
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Failed To load feed";
                $return['Data'] = new stdClass();
            }
            
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        
        echo json_encode($return);
    }
    
    public function loadFeed_test(){
        
        
        $page_id = $this->input->post('page_id');
        $limit = 30;
        
        if(!empty($page_id)){
            $page_id = intval($page_id);     
        
       
            if($page_id>0){
                $start = ($page_id-1)*$limit;   
            }else{
                $start = 0;
            }
            
            $where['del_status'] = 1;
            $feed_list = $this->feed_model->SearchByLimit($where, $limit,$start);            
            
            foreach($feed_list as $afeed){
                $likescountquery = $this->db->query('select user_id from jb_feed_likes where feed_id='.$afeed->feed_id);
                $likescountresult = $likescountquery->result();                                            
                $afeed->feed_likes_users_list = $likescountresult;
            }
            
            $likescountquery = $this->db->query('select * from jb_feed_likes');
            $likescountresult = $likescountquery->result();            
            
            if(!empty($feed_list)){
                $return['Code']  = 1;
                $return['Message'] = "Feeds fetched successfully";
                $return['Data'] = array('feeds'=>$feed_list,'page_id'=>$page_id,'feed_likes_users_list'=>$likescountresult); 
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Failed To load feed";
                $return['Data'] = new stdClass();
            }
            
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        
        echo json_encode($return);
    }
    
    
    public function saveFeed(){
        
        if(isset($_FILES['feed_image']['name'])){
            
            $config = array('upload_path'=> feed_upload_path.'temp', 'allowed_types' => 'gif|jpg|png|jpeg','file_name'=>'feed-'.rand(0,99999),'overwrite'=>TRUE);
            $this->load->library('upload', $config);                    
            $this->upload->initialize($config);            
                
            if($this->upload->do_upload('feed_image')){
                $udata = array('upload_data' => $this->upload->data());                        
                $file_name = $udata['upload_data']['file_name'];
                
                $full_image_path='./'.feed_upload_path.$file_name;
                copy('./'.feed_upload_path."temp/".$file_name,$full_image_path);
                resizeImg($full_image_path, 800, 800);
            }else{
                //$error = array('error' => $this->upload->display_errors());
                //echo "<pre>"; print_r($error); echo "</pre>";exit;
                $file_name = '';                
            }
        }else{
            $file_name = '';
        }
        
        $feed_text = $this->get_post('feed_text');
        $user_id = $this->input->post('user_id');
        
        if((!empty($feed_text) || !empty($file_name)) && (!empty($user_id))){            
            $data['feed_text'] = $feed_text;
            $data['feed_image'] = $file_name;
            $data['user_id'] = $user_id;        
            $data['added_on'] = datenow();        
//            json_encode($data);exit();
            if($this->feed_model->Save($data)){
                $return['Code']  = 1;
                $return['Message'] = "Feed added successfully";
                $return['Data'] = new stdClass();
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error adding feed";
                $return['Data'] = new stdClass();
            }
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        } 
        
        echo json_encode($return);
    }
    
    
    public function view_feed(){
        $feed_id = $this->input->post('feed_id');
        if(!empty($feed_id)){
            $feed_id = intval($feed_id);
            
            $post = $this->feed_model->GetFeedById($feed_id);
            
            if(!empty($post)){
                $this->db->query('update jb_feed set feed_views=feed_views+1 where feed_id='.$feed_id);
                
                $this->db->select('jb_member.m_name,jb_feed_likes.user_id');
                $this->db->from('jb_feed_likes');
                $this->db->join('jb_member','jb_member.m_id = jb_feed_likes.user_id');
                $this->db->where('jb_feed_likes.feed_id',$post[0]['feed_id']);
                $query = $this->db->get();
                $feed_likes = $query->result_array();
                $feed_likes_users_list = $feed_likes;
                
                $this->db->select('jb_feed_comments.comment_id,jb_feed_comments.user_id,jb_feed_comments.comment_text,jb_feed_comments.parent_id,jb_feed_comments.added_on,jb_member.m_name,jb_member.m_avatar');
                $this->db->from('jb_feed_comments');
                $this->db->join('jb_member', 'jb_member.m_id=jb_feed_comments.user_id');
                $this->db->where('jb_feed_comments.feed_id',$post[0]['feed_id']);
                $query = $this->db->get();
                $comments = $query->result_array();
                $feed_comments = $comments;
//                print_r($post);
//                exit();
//                $post = $post[0];
                
                $return['Code']  = 1;
                $return['Message'] = "Feed fetched successfully";
                $return['Data'] = array('feed_detail'=>$post,'feed_id'=>$feed_id,'feed_comments'=>$feed_comments,'feed_likes_users_list'=>$feed_likes_users_list);
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error fetching feed";
                $return['Data'] = new stdClass();
            }
              
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        
        echo json_encode($return);
    }
    
    
    public function deleteFeed(){
        $feed_id = $this->input->post('feed_id');
        if(!empty($feed_id)){
            $feed_id = intval($feed_id);
            if($this->feed_model->Delete($feed_id)){
                $return['Code']  = 1;
                $return['Message'] = "Feed deleted successfully";
                $return['Data'] = new stdClass(); 
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error Deleting Feed";
                $return['Data'] = new stdClass();
            }
        }else{
           $return['Code']  = 0;
           $return['Message'] = "All fields are required";
           $return['Data'] = new stdClass(); 
        }
        echo json_encode($return);
    }
    
    public function listAllNotifications () {
        
        
        $page_id = $this->input->post('page_id');
        $limit = 30;
        
        if(!empty($page_id)){
            $page_id = intval($page_id);     
        
       
            if($page_id>0){
                $start = ($page_id-1)*$limit;   
            }else{
                $start = 0;
            }
            
            $team_noti = array('cvreview','events','event_message','company','testimonial','mentors','general_message','tsheet_message','registration');
            $notifications_list = $this->notification_model->ByTypeNoti($team_noti,$limit,$start);
//            print_r($notifications_list);
//            exit();
//            $feed_list = $this->feed_model->SearchByLimit($where, $limit,$start);
            if(!empty($notifications_list)){

                $return['Code']  = 1;
                $return['Message'] = "Notifications fetched successfully";
                $return['Data'] = array('notifications'=>$notifications_list,'page_id'=>$page_id); 
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Failed To load notification";
                $return['Data'] = new stdClass();
            }
            
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        
        echo json_encode($return);
    }
    
    
    public function ByUserNotification(){
        $user_id = $this->input->post('user_id');
        $page_id = $this->input->post('page_id');
        $limit = 20;
        if($page_id>0){
            $start = ($page_id-1)*$limit;   
        }else{
            $start = 0;
        }
        
        if(!empty($user_id)){
            
//            $profile = $this->member_model->userDetail(array('user_id' =>$user_id));

            $notifications = $this->notification_model->SearchLimitUserNoti(array('notify_user_id'=>$user_id),$limit,$start);
            if(!empty($notifications)){
                $this->db->query('Update jb_notification set read_flag="read" where  notify_user_id='.$user_id);
                
                $return['Code']  = 1;
                $return['Message'] = "Successfully fetched user notifications";
                $return['Data'] = array('UserNotification'=>$notifications);
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Failed to fetched user notifications";
                $return['Data'] = new stdClass();
            }
            
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        
        echo json_encode($return);
    }
    
    public function unReadNotification(){
        $user_id = $this->input->post('user_id');
        if(!empty($user_id)){
            $unReadNotification = $this->notification_model->unReadNoti(array('read_flag'=>'unread','notify_user_id'=>$user_id));
//            print_r($unReadNotification);
//            exit();
            $return['Code'] = 1;
            $return['Message'] = "Succesfully fetrched unread count notifications";
            $return['Data'] = array('unReadNotificationCounts'=>$unReadNotification);
            
        }else{
            $return['Code'] = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
            
        }
        echo json_encode($return);
    }
    
    public function ByTypeNotification(){
        
        $page_id = $this->input->post('page_id');
        $limit = 30;
        
        if(!empty($page_id)){
            $page_id = intval($page_id);     
        
       
            if($page_id>0){
                $start = ($page_id-1)*$limit;   
            }else{
                $start = 0;
            }
        
        
        if(!empty($page_id)){
            
            $public_noti = array('whatshappening','job','events','event_message','general_message','company','testimonial','general_message');
            $notifications = $this->notification_model->ByTypeNoti($public_noti,$limit,$start);
            
            if(!empty($notifications)){
                
                $return['Code']  = 1;
                $return['Message'] = "ByType notifications fetched successfully";
                $return['Data'] = array('byTypeNotifications'=>$notifications);
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error fetching ByType notifications";
                $return['Data'] = new stdClass();
            }
            
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        
        
      }
      echo json_encode($return);
    }
    
    
    
    public function deleteNotification(){
        $noti_id = $this->input->post('noti_id');
        if(intval($noti_id)>0){
            
            if($this->notification_model->Delete($noti_id)){
                $return['Code']  = 1;
                $return['Message'] = "Notification deleted successfully";
                $return['Data'] = new stdClass();
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error deleting notification";
                $return['Data'] = new stdClass();  
            }
            
            
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        
        echo json_encode($return);
    }
    
    
    public function ListSuccessStories(){
        $page_id = $this->input->post('page_id');
        $limit = 30;
        if(!empty($page_id)){
            
            if($page_id>0){
                $start = ($page_id-1)*$limit;   
            }else{
                $start = 0;
            }
            
//            $profile = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $stories = $this->member_model->getStoryLimit(array('ss_status' =>1),$limit,$start);
            if(!empty($stories)){
                $return['Code']  = 0;
                $return['Message'] = "Successfully fetched stories";
                $return['Data'] = array('stories'=>$stories);
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error fetching successstories";
                $return['Data'] = new stdClass();
            }
            
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        
        echo json_encode($return);
    }
    
    
    public function mentorsList() {
        
        $query = $this->db->query('Select * from jb_member where role_id in (1,2,5,6) order by last_login_date DESC');
        $mentors_list = $query->result();    
        
        if(!empty($mentors_list)){
            $return['Code']  = 0;
            $return['Message'] = "Successfully fetched mentors";
            $return['Data'] = array('mentors_list'=>$mentors_list);
        }else{
            $return['Code']  = 0;
            $return['Message'] = "Error fetching mentors";
            $return['Data'] = new stdClass();
        }
            
        
        
        echo json_encode($return);
    }
    
    
    public function UsersbyMentos() {
        $user_id = $this->input->post('user_id');
        
        $query = $this->db->query('select * from jb_member where mentor_id='.$user_id.' order by last_login_date desc');
        $users_uder_mentors = $query->result(); 
        
        if(!empty($users_uder_mentors)){
            $return['Code']  = 0;
            $return['Message'] = "Successfully fetched Users under mentors";
            $return['Data'] = array('mentors_list'=>$users_uder_mentors);
        }else{
            $return['Code']  = 0;
            $return['Message'] = "Error fetching Users under mentors";
            $return['Data'] = new stdClass();
        }
            
        
        
        echo json_encode($return);
    }
    
    
    public function ListProfessionals() {
        $page_id = $this->input->post('page_id');
        $limit = 30;
        if(!empty($page_id)){
            
            if($page_id>0){
                $offset = ($page_id-1)*$limit;   
            }else{
                $offset = 0;
            }
            
            $pdata['offset'] = $offset;
            $pdata['by_name'] = trim($this->get_post('by_name'));
            $pdata['by_skills'] = trim($this->get_post('by_skills'));
            $pdata['by_profession'] = trim($this->get_post('by_profession'));
            $pdata['m_nationality'] = trim($this->get_post('m_nationality'));
            $pdata['m_current_city'] = trim($this->get_post('m_current_city'));
            $pdata['s_catid'] = $this->get_post('s_catid');
            $pdata['register_on'] = $this->get_post('register_on');
            $pdata['m_phone'] = $this->get_post('m_phone');
            $pdata['m_email'] = $this->get_post('m_email');
            $pdata['status'] = 1;
            $pdata['limit'] = $limit;
            
            $professionals = $this->profile_model->SearchProfessionals($pdata);
            
            if(!empty($professionals)){
                $return['Code']  = 0;
                $return['Message'] = "Successfully fetched professionals list";
                $return['Data'] = array('professionals'=>$professionals);
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error fetching professionals list";
                $return['Data'] = new stdClass();
            }
            
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        
        echo json_encode($return);
    }
    
    
    public function postComment(){
        $user_id = $this->input->post('user_id');
        $comment_text = $this->input->post('comment_text');
        $feed_id = $this->input->post('feed_id');
        $feed_owner_id = $this->input->post('feed_owner_id');
        
        if(!empty($user_id) && !empty($feed_owner_id) && !empty($feed_id) && $comment_text != ''){
            
            $data['user_id'] = $user_id;
            $data['comment_text'] = $comment_text;
            $data['feed_id'] = $feed_id;
            $data['parent_id'] = $this->input->post('parent_id');
            $data['added_on'] = datenow(); 
            
//            print_r($data);
//            exit();
            
            $user_details = GetUserName($user_id);
            $noti['user_id'] = $user_id;
            $noti['noti_title'] = $user_details[0]->m_name." Posted a comment on your feed post.";
            $noti['noti_desc'] = $comment_text;
            $noti['noti_type'] = 'tsheet_message';
            $noti['notify_user_id'] = $feed_owner_id;
            $noti['noti_link'] = site_url("feed/view/$feed_id");
            AddNotification($noti);
            if($this->feed_comments_model->Save($data)){
                $return['Code']  = 1;
                $return['Message'] = "Successfully posted comment";
                $return['Data'] = new stdClass();
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error posting comment";
                $return['Data'] = new stdClass();
            }
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        echo json_encode($return);
    }
    
    public function replyComment(){
        $user_id = $this->input->post('user_id');
        $comment_text = $this->input->post('comment_text');
        $parent_id = $this->input->post('parent_id');
        $feed_id = $this->input->post('feed_id');
        $feed_owner_id = $this->input->post('feed_owner_id');
        if(!empty($user_id) && !empty($feed_owner_id) && !empty($feed_id) && $comment_text != ''){
            
            $user_details = GetUserName($user_id);
            $noti['user_id'] = $user_id;
            $noti['noti_title'] = $user_details[0]->m_name." Replied on your comment on your feed post.";
            $noti['noti_desc'] = $comment_text;
            $noti['noti_type'] = 'tsheet_message';
            $noti['notify_user_id'] = $feed_owner_id;
            $noti['noti_link'] = site_url("feed/view/$feed_id");
            AddNotification($noti);
            
            $data['user_id'] = $user_id;
            $data['comment_text'] = $comment_text;
            $data['parent_id'] = $parent_id;
            $data['feed_id'] = $feed_id;

        if($this->feed_comments_model->Save($data)){
                $return['Code']  = 1;
                $return['Message'] = "Successfully replied to a comment";
                $return['Data'] = new stdClass();
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error repling to a comment";
                $return['Data'] = new stdClass();
            }
    }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        echo json_encode($return);
    }
    
    
   public function appplyForJob(){
        
        $user_id = $this->input->post('user_id');
        $job_id = $this->input->post('job_id');
        
        if(!empty($user_id) && !empty($job_id)){
            $com_type = 'job';
            $comments = $this->input->post('comments');
            if($this->job_model->saveComments(array('com_member_id' =>$user_id,'com_type'=>$com_type,'com_job_id'=>$job_id,'com_comments'=>$comments,'com_add_date'=>date("Y-m-d")))){
               $user_details = GetUserName($user_id);
               $noti['user_id'] = $user_details[0]->m_id;
               $noti['noti_title'] = $user_details[0]->m_name." Applied for Job";
               $noti['noti_desc'] = $user_details[0]->m_name." Applied for Job";                    
               $noti['noti_type'] = 'job';
               $noti['noti_link'] = site_url('job/'.$job_id.'/#applyonlineform');
               AddNotification($noti); 
               
               $return['Code']  = 0;
               $return['Message'] = "Successfully applied for job";
               $return['Data'] = new stdClass();
               
            }else{
                $return['Code']  = 0;
                $return['Message'] = "Error applying for job";
                $return['Data'] = new stdClass();
            }
            
            
            
        }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
        }
        echo json_encode($return);
    }
    
    
    public function featuredJobs(){
       $job_id = $this->input->post('job_id');
       
       if(!empty($job_id)){
            $this->job_model->AddFeaturedJob($job_id);
            $return['Code']  = 1;
            $return['Message'] = "Successfully featured  job";
            $return['Data'] = new stdClass();
           
       }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
       }
       
       echo json_encode($return);
    }
    public function removeFeaturedJob(){
       $job_id = $this->input->post('job_id');
       
       if(!empty($job_id)){
            $this->job_model->RemoveFeaturedJob($job_id);
            $return['Code']  = 1;
            $return['Message'] = "Successfully unfeatured  job";
            $return['Data'] = new stdClass();
           
       }else{
            $return['Code']  = 0;
            $return['Message'] = "All fields are required";
            $return['Data'] = new stdClass();
       }
       
       echo json_encode($return);
    }
    
    
    public function listFeaturedJob(){

    $page_id = $this->input->post('page_id');
    $limit = 30;
        
        if(!empty($page_id)){
            $page_id = intval($page_id);     
        
       
            if($page_id>0){
                $start = ($page_id-1)*$limit;   
            }else{
                $start = 0;
            }
        
        $featured_job_details = $this->job_model->searchJobs(array('j_status' =>1,'limit'=>$limit,'start'=>$start,'is_featured'=>1));

   

        if(!empty($featured_job_details)){

       

            $return['Code']  = 1;

            $return['Message'] ="Jobs fetched successfully" ;

            $return['Data'] = array('jobs'=>$featured_job_details);

        }else{

            $return['Code']  = 0;

            $return['Message'] ="Error fetching jobs" ;

            $return['Data'] = new stdClass();

            }
        }else{
            $return['Code']  = 0;

            $return['Message'] ="All fields are required" ;

            $return['Data'] = new stdClass();
        }

   

   echo json_encode($return);

}



public function listQuickJob(){
    $page_id = $this->input->post('page_id');
    $limit = 30;
        
        if(!empty($page_id)){
            $page_id = intval($page_id);     
        
       
            if($page_id>0){
                $start = ($page_id-1)*$limit;   
            }else{
                $start = 0;
            }
        
        $Quick_jobs = $this->job_model->fetchQuickJobs(array('status' =>1,'limit'=>$limit,'start'=>$start,'is_featured'=>1));
        
         if(!empty($Quick_jobs)){

       

                $return['Code']  = 1;

                $return['Message'] ="Quick Jobs fetched successfully" ;

                $return['Data'] = array('jobs'=>$Quick_jobs);

        }else{

                $return['Code']  = 0;

                $return['Message'] ="Error fetching quick jobs" ;

                $return['Data'] = new stdClass();

        }
    
       }else{
            $return['Code']  = 0;

            $return['Message'] ="All fields are required" ;

            $return['Data'] = new stdClass();
       } 
    
    echo json_encode($return);
    
}

public function applyQuickJob(){
    $job_id = $this->input->post('job_id');
    $name = $this->input->post('name');
    $whatsapp_number = $this->input->post('whatsapp_number');
    $email = $this->input->post('email');
    
    if(!empty($job_id) && !empty($name) && !empty($whatsapp_number)){
        $search_job = $this->job_model->quickJobById(array('quick_job_id'=>$job_id));
        if(!empty($search_job)){
            $res = $this->job_model->searchQuickJob(array('whatsapp_number'=>$whatsapp_number,'job_id'=>$job_id,'name'=>$name));

            if(empty($res)){

                $data['job_id'] = $job_id;
                $data['name'] = $name;
                $data['whatsapp_number'] = $whatsapp_number;
                $data['email'] = $email;
                
                
                
                 
            
                if(isset($_FILES['resume_file']['name'])){



                    $file_ext=preg_split("/\./", $_FILES["resume_file"]["name"]);

                    $file_ext1=$file_ext[count($file_ext)-1];

                    $file_name = preg_replace('/\s/', '-', $name)."_".$job_id.".".$file_ext1;

                //    print_r($file_name);

                //    echo $file_name;

                //    exit();

                    $config = array('upload_path'=> 'public-assets/cvreviews/', 'allowed_types' => 'doc|docx|pdf','file_name'=>$file_name,'overwrite'=>TRUE);

                    $this->load->library('upload', $config);                    

                    $this->upload->initialize($config);



                    if($this->upload->do_upload('resume_file')){

                            $udata = array('upload_data' => $this->upload->data());                        

                            $resume_file = $udata['upload_data']['file_name'];
        //                    print_r($resume_file);
        //                    exit();
                            $data['resume'] = $resume_file;
                        }

                }

                if($this->job_model->applyQuickJob($data)){
                    $return['Code']  = 1;

                    $return['Message'] ="Successfully applied to this job" ;

                    $return['Data'] = new stdClass();
                }else{
                    $return['Code']  = 0;

                    $return['Message'] ="Error applying to this job" ;

                    $return['Data'] = new stdClass();
                }


                }else{
                    $return['Code']  = 0;

                    $return['Message'] ="Already applied to this job" ;

                    $return['Data'] = new stdClass();
                }
        }else{
            
            $return['Code']  = 0;

            $return['Message'] ="Could not find this job" ;

            $return['Data'] = new stdClass(); 
        }
        
    }else{
        $return['Code']  = 0;

        $return['Message'] ="All fields are required" ;

        $return['Data'] = new stdClass();
    }
    echo json_encode($return);
}

    function forgotPassword()
        {
            $email_address = $this->input->post('email');
            if(!empty($email_address)){
                $data =  $this->member_model->forgotpassword(array('email' =>$email_address));
                if($data){
                    $return['Code']  = 0;

                    $return['Message'] ="Password has been sent to your email" ;

                    $return['Data'] = new stdClass();
                }else{
                    $return['Code']  = 0;

                    $return['Message'] ="Email address does not exists" ;

                    $return['Data'] = new stdClass();
                }
            }else{
                $return['Code']  = 0;

                $return['Message'] ="All fields are required" ;

                $return['Data'] = new stdClass();
            }
           echo json_encode($return);
        }
        
        
        function feed_likes(){
            $user_id = $this->input->post('user_id');
            $feed_id = $this->input->post('feed_id');
            $like_count = 1;
            
            if(!empty($user_id) && !empty($feed_id)){
                $data['user_id'] = $user_id;
                $data['feed_id'] = $feed_id;
                $data['like_count'] = $like_count;
                $res = $this->feed_model->SearchLikes(array('user_id'=>$user_id,'feed_id'=>$feed_id));
                if(empty($res)){
                    if($this->feed_model->SaveLikes($data)){
                    $return['Code']  = 1;

                    $return['Message'] = "Successfully liked feed" ;

                    $return['Data'] = new stdClass();
                    }else {
                        $return['Code']  = 0;

                        $return['Message'] ="Error liking feed" ;

                        $return['Data'] = new stdClass();
                    }
                }else{
                    
                    $this->feed_model->deleteFeedLikes($user_id,$feed_id);
                    $return['Code']  = 0;

                    $return['Message'] = "Successfully unliked feed" ;

                    $return['Data'] = new stdClass(); 
                }
                
            }else{
                $return['Code']  = 0;

                $return['Message'] ="All fields are required" ;

                $return['Data'] = new stdClass();
            }
            echo json_encode($return);
        }
        
        
        function unlike_feed(){
            $user_id = $this->input->post('user_id');
            $feed_id = $this->input->post('feed_id');
            
            if(!empty($user_id) && !empty($feed_id)){
                
                $res = $this->feed_model->SearchLikes(array('user_id'=>$user_id,'feed_id'=>$feed_id));
                
                if(!empty($res)){
                    if($this->feed_model->deleteFeedLikes($user_id,$feed_id)){
                        $return['Code']  = 1;
                        $return['Message'] = "Successfully unliked feed" ;
                        $return['Data'] = new stdClass();
                    }else{
                        $return['Code']  = 0;
                        $return['Message'] = "Error unliking feed" ;
                        $return['Data'] = new stdClass();
                    }
                }else{
                    $return['Code']  = 0;
                    $return['Message'] = "This like does not exists in database" ;
                    $return['Data'] = new stdClass();
                }
            }else{
                $return['Code']  = 0;

                $return['Message'] ="All fields are required" ;

                $return['Data'] = new stdClass();
            }
            echo json_encode($return);
        }
        
        function addVerifiedJob(){
            $cquery = $this->db->query('select c_name as label, c_id as value from jb_categories where c_status=1');
            $categories = $cquery->result();
            $cquery1 = $this->db->query('select country as label, id as value from jb_country');
            $countries = $cquery1->result();
            if(!empty($categories) && !empty($countries)){
               
                
                $return['Code']  = 1;
                $return['Message'] = "Successfully fetched information" ;
                $return['Data'] = array('countries_list'=>$countries,'categories_list'=>$categories);
            }else{
                $return['Code']  = 1;
                $return['Message'] = "Error fetching information" ;
                $return['Data'] = new stdClass();
            }
            
             echo json_encode($return);       
                    
        }
        
        function postVerifiedJob(){
            
//            echo "In Verified POst";
//            exit();
            
            $job_added_by = $this->input->post('job_added_by');
            $job_title = $this->input->post('job_title');
            $job_details = $this->input->post('job_details');
            $job_category = $this->input->post('job_category');
            $job_country_id = $this->input->post('job_country_id');
            $job_city = $this->input->post('job_city');
            $job_reference_by = $this->input->post('job_reference_by');
            $company_name = $this->input->post('company_name');
            $apply_email = $this->input->post('apply_email');
            $job_skills = $this->input->post('job_skills');
//            $job_image = $this->input->post('job_image');
            
            if(!empty($job_added_by) && !empty($job_title) && !empty($job_details) && !empty($job_category) && !empty($job_country_id) && !empty($job_city) && !empty($apply_email)){
                $data['j_addedby'] = $job_added_by;
                $data['j_title'] = $job_title;
                $data['j_descr'] = $job_details;
                $data['cat_id'] = $job_category;
                $data['j_country_id'] = $job_country_id;
                $data['j_location'] = $job_city;
                $data['job_reference_by'] = $job_reference_by;
                $data['j_company'] = $company_name;
                $data['j_email_apply'] = $apply_email;
                $data['j_tags'] = $job_skills;
                $data['j_status'] = 1;
                $data['j_add_date'] = time();
                if(!empty($_FILES['pic']['name'])){
                    $config=array();

                    $config['upload_path'] ='assets/uploads/jobs/';

                    $config['allowed_types'] = 'gif|jpg|jpeg|png';

                    $config['overwrite']     = false;

                    $config['max_size']      = 3000;

                    $config['remove_spaces'] = true;

                    $config['max_filename']   = 10;

                    $config['file_ext_tolower'] = true;


                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('pic')){

                    $udata = array('upload_data' => $this->upload->data());                

                    $jobimage = $udata['upload_data']['file_name'];            

                    $data['j_image'] = $jobimage;     

                   }else{

                       $errors = $this->upload->display_errors();

                       echo "<pre>"; print_r($errors); echo "</pre>";

                       exit;

                    }
                }
               if($this->job_model->Save($data)){
                    $return['Code']  = 1;

                    $return['Message'] = "Successfully added verified job" ;

                    $return['Data'] = new stdClass();
               } 
                
            }else{
                $return['Code']  = 0;

                $return['Message'] ="All fields are required" ;

                $return['Data'] = new stdClass();
            }
            echo json_encode($return);
        }
        
        
        function userToken(){
            $user_id = $this->input->post('user_id');
            $user_token = $this->input->post('user_token');
            
            if(!empty($user_id) && !empty($user_token)){
                $data['user_token'] = $user_token;
                if($this->profile_model->Save($data,$user_id)){
                    $return['Code']  = 1;

                    $return['Message'] ="Token Saved against user_id" ;

                    $return['Data'] = new stdClass();
                }else{
                    $return['Code']  = 0;

                    $return['Message'] ="Error saving user token" ;

                    $return['Data'] = new stdClass();
                }
            }else{
                    $return['Code']  = 0;

                    $return['Message'] ="All fields are required" ;

                    $return['Data'] = new stdClass();
            }
            echo json_encode($return);
        }
        
        
        function sendPushNotification($to,$notif){
            $apiKey = 'AAAAc-L1jgs:APA91bEnUzCbtqIS_9aoh9w1cDzbQVEtXC_HoR1fvI_c_mdxkTEAR86mAPtpkst_WqVnJbAaLSmUaqTaEe_NvNr58ZS8SgmtBLXNU8pzCBL9oN5RhIjQpAKaRkGE4uSmVFdH6H8ZKz35';
            $ch = curl_init();
            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = json_encode(array('to'=>$to,'notification'=>$notif));
            
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,($fields));
            
            $headers = array();
            $headers[] = 'Authorization: key-'.$apiKey;
            $headers[] = 'Content-Type: application/json';
            
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
            
            $result = curl_exec($ch);
            if(curl_errno($ch)){
                echo "Error:". curl_error($ch);
            }
            curl_close($ch);
            
        }
}

?>