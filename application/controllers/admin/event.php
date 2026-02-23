<?php
class Event extends CI_Controller {
  var $pages= 5;
function __construct()
        {
        parent::__construct();
       	$this->load->model('admin_event_model');
       	$this->load->model('event_subscribers_model');
       	
		//$this->load->library('paging_front');
		}
  

	 function index()
        {
		
                 
        $data['page_title'] = 'Events';
        $data['content_view'] = 'admin/events/sb-forms';
        $this->load->view('admin/sb-template' ,$data);
        
        }
        function ajaxDataManagementEvent(){
	  $data= array();
	  if($this->input->post('actioncall')=="addeventform"){
		 
              
                $this->load->view('admin/events/showaddform',$data);                 
            }
	if($this->input->post('actioncall')=="addevent"){
		$options =  array(
                    'title'   => $this->input->post('name') ,
                    'event_date'     =>  strtotime($this->input->post('eventdate')),
					'description '     => $this->input->post('descr'),
					'add_date'     => time()
                 ); 
		
		echo $this->admin_event_model->addEvent($options);
		
		
	
			
	}
		 if($this->input->post('actioncall')=="listevents"){
		 
                $data['events']        =  $this->admin_event_model->getEvents();           
               
                $this->load->view('admin/events/listforms',$data);                 
            }	
			 if($this->input->post('actioncall')=="editeventform"){
		 
                $event_id = $this->input->post('event_id');   
			   $data['events']        =  $this->admin_event_model->getEvents(array('event_id' => $event_id));           
               
                $this->load->view('admin/events/showeditform',$data);                 
            }	
			if($this->input->post('actioncall')=="editevent"){
		$options =  array(
                    'event_id'   => $this->input->post('event_id') ,
					'title'   => $this->input->post('name') ,
                    'event_date'     =>  strtotime($this->input->post('eventdate')),
					'descr'     => $this->input->post('descr')
					
                 ); 
		
		echo $this->admin_event_model->updateEvent($options);
		
		
	
			
	}
			 elseif($this->input->post('actioncall')=="changeFeatured"){
			
       
  $video_id = $this->input->post('video_id');
       $status_val = $this->input->post('status_val');
	//   exit;
         $status   =  $this->admin_video_model->updateFeaturedStatus($video_id, $status_val);
//$this->load->view('admin/events/graphic_view',$data);	
   //   $data['row']	=	$this->prize_model->getResults();
	   // $this->load->view('admin/events/prize_view',$data);
    
		}
		elseif($this->input->post('actioncall')=="delevent")
	 		{
		    $event_id = $this->input->post('event_id');   
			$data['video']        =  $this->admin_event_model->delEvent(array('event_id' => $event_id));           
            //$this->load->view('admin/events/editpage',$data);                 
            }	
	  
}	
	
        function eventsubscriber(){
		$data = array();
		
		$this->load->view('admin/eventusers/programusers',$data);
        }
	
	 function ajaxDataManagementEventSubscriber()
        {
			
	    $data=array();
	 
	  
			
	  if($this->input->post('actioncall')=="listprogramusers")
	  		{
		    $data['programusers']        =  $this->admin_event_model->getProgramUsers(array('status' => 1));           
            $this->load->view('admin/eventusers/listprogramusers',$data);                 
            }	
	
	 if($this->input->post('actioncall')=="delform")
	 		{
		    $pu_id = $this->input->post('pu_id');   
			$data['pages']        =  $this->admin_event_model->delProgramUsers(array('pu_id' => $pu_id));           
            //$this->load->view('admin/editpage',$data);                 
            }	
		}
                
                
         function selectEvent(){
            
            $countries = $this->admin_event_model->GetCountries();

            $data['countries'] = $countries; 
            $data['page_title'] = 'Select Event';
            $data['content_view'] = 'admin/events/select-event';
            $this->load->view('admin/sb-template' ,$data);
            
         }
         
         function ajax_event($city_id){
            $events = $this->admin_event_model->Search(array('city_id'=>$city_id));
            $data['events'] = $events;
            $this->load->view('admin/events/ajax-event',$data);
         }
         
         
         function sendEventEmail(){
            $event_id = $this->input->post('event_id');
            $event = $this->admin_event_model->Search(array('e_id'=>$event_id));

            $img = site_url('public-assets/events/'.$event[0]->event_picture);

            $event_subscribers = $this->event_subscribers_model->Search(array('pu_event_id'=>$event_id));
            
            foreach($event_subscribers as $event_s){
                
                $user_details = GetUserName($event_s->pu_member_id);
//               $user_details[0]->m_email
                $email = 'sikanderahmad930@gmail.com';
                $name = $user_details[0]->m_name;
                if(!empty($email)){
                    $to = $email;
                    $subject     = "Hello ".$name." !!";
                    $messageText = '<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Event Email</title>
    </head>

    <body>
    <style>
        #main{
            width: 50%;
        }
    </style>
        <div id="main_sec">
            <table border="0" cellspacing="0" cellpadding="0" style="margin:0 auto">
                <tr>
                    <td align="center"><img src=" '.$img.' " alt="" srcset=""></td>
                </tr>

                <tr align="center">
                    <td ><h2 style="color:#7ed5f2;">'.$event[0]->title.'</h2></td>
                </tr>

                <table width="59%"  border="0" cellspacing="0" cellpadding="0" style="margin:0 auto">
                    <tr>
                        <td><p>Hello '.$name.',</p></td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                Join Us on '.$event[0]->event_date.' at '.$event[0]->address.'.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="color:#7ed5f2;">Register Today</h3>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <h3>Here is What You Can Learn</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                <li>How to select tghe right on-site management software</li>
                                <li>Best Practice on how to provide streamlined check-in, badge printing and more.</li>
                                <li>Solutions to improve event experiances for attendees and event organizers</li>

                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Logistics</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>The Event will be held on '.$event[0]->event_date.' at '.$event[0]->address.'</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>If you register today, we will send the recording as an added bonus for free</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p> <br />  </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <a href="'.site_url('event/view/'.$event[0]->e_id).'" style="color: white; padding: 10px;background: #7ed5f2;text-decoration: none;">Save Your Seat Today!</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p> <br />  </p>
                        </td>
                    </tr>
                </table>



            </table>
        </div>

    </body>
    </html>';
                    
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
                         _setSuccess("Email(s) sent successfully");
                         
                                         
                    } else {
                        _setError("Error sending email");
                    }
                    redirect(site_url('admin/event/selectEvent'));
                    exit();
                }
            }
            
            
            
            
            
         }






	
	


}