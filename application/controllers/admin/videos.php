<?php
class Videos extends MY_Controller {
  var $pages= 5;
  function __construct()
        {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('admin_slider_model');
		$this->load->model('admin_page_model');
		$this->load->model('admin_video_model');
			$this->load->model('admin_faq_model');
		$this->load->library('paging_front');
		}
   function index()
        {

		 $options['status'] = 'active';
		 $data['videos'] =  $this->admin_video_model->getVideos($options);
                 
                 $data['page_title'] = 'Videos';
                 $data['content_view'] = 'admin/videos';
                 $this->load->view('admin/sb-template', $data);
//		 $this->load->view('admin/videos',$data); 
	    }
  function videoform()
        {
                 $data = array();
		 $options['status'] = 'active';
                 
                 $data['page_title'] = 'Videos';
                 $data['content_view'] = 'admin/sb-addvideoform';
                 $this->load->view('admin/sb-template', $data);
//		 $this->load->view('admin/addvideoform',$data);   
	}
 function savevideo()
        {
			
			//print_r($_POST);
	
		$video_id = explode("v=", $this->input->post('vlink'));
		$trimmed = explode(" ", $video_id[1]);
		$final = explode("&", $trimmed[0]);
		//echo "11".$trimmed[0]."<br>";
		//echo "22".$final[0]."<br>";
		//exit;
		 $image_url = "http://img.youtube.com/vi/".$final[0]."/hqdefault.jpg";
			//exit;				
		$options =  array(
                    'title'   => $this->input->post('title') ,
                  	'image'     => $image_url, 
					'embed_code'     => $this->input->post('ecode'),
					'add_date'     => date("Y-m-d")
                 ); 
		
		
		 $this->admin_video_model->addVideo($options);
		redirect(base_url().'admin/videos');  
		
	
			
	}		
 function edit($id)
        {
        $video = $this->admin_video_model->getVideoById($id);

         $options['status'] = 'active';

         $data['video'] = $video;
//                 print_r($video);
//                 exit();
         $data['page_title'] = 'Videos';
         $data['content_view'] = 'admin/sb-editvideoform';
         $this->load->view('admin/sb-template', $data);

    }
            
            
function update_video($id){
                $video_id = explode("v=", $this->input->post('vlink'));
		$trimmed = explode(" ", $video_id[1]);
		$final = explode("&", $trimmed[0]);
		//echo "11".$trimmed[0]."<br>";
		//echo "22".$final[0]."<br>";
		//exit;
		 $image_url = "http://img.youtube.com/vi/".$final[0]."/hqdefault.jpg";
			//exit;				
		$options =  array(
                    'title'   => $this->input->post('title') ,
                  	'image'     => $image_url, 
					'embed_code'     => $this->input->post('ecode'),
					'add_date'     => date("Y-m-d")
                 );
                
                
		 $this->admin_video_model->update_video($id,$options);
		 redirect(base_url().'admin/videos');  
}



public function delete($id) {
	 //echo "dd".$id;
	 //exit;
        $this->db->where('id', $id);
        $this->db->delete($this->db->dbprefix('video'));
		redirect('admin/videos');
        //return true;
    }
public function unpublishd($id){
    $this->db->set('status','inactive')->where('id',$id)->update('jb_video');
    $this->session->set_flashdata('message', "Unpublish successfully.");
    redirect("admin/videos");
}

public function publishd($id){
	//	echo "aaaaaaaaaaaaaaaaaaaaa".$id;
	//exit;
    $this->db->set('status','active')->where('id',$id)->update('jb_video');
    $this->session->set_flashdata('message', "Publish successfully.");
    redirect("admin/videos");
}		
 





  	function ajaxDataManagementVideo(){
	  $data= array();
	  if($this->input->post('actioncall')=="addvideoform"){
		 
               
                $this->load->view('admin/addvideoform',$data);                 
            }
	if($this->input->post('actioncall')=="addvideo"){
	
							
		$video_id = explode("v=", $this->input->post('vlink'));
		$trimmed = explode(" ", $video_id[1]);
		$final = explode("&", $trimmed[0]);
		$image_url = "http://img.youtube.com/vi/".$final[0]."/maxresdefault.jpg";
							
		$options =  array(
                    'title'   => $this->input->post('title') ,
                    'place'     => $this->input->post('place'),
					'image'     => $image_url, 
					'embed_code'     => $this->input->post('ecode'),
					'publish_year'     => date("Y-m-d", strtotime($this->input->post('videodate'))),
				/*	'descr'     => $this->input->post('descr'),*/
					'add_date'     => time()
                 ); 
		
		
		echo $this->admin_video_model->addVideo($options);
		
		
	
			
	}
		 if($this->input->post('actioncall')=="listvideos"){
		 
                $data['videos']        =  $this->admin_video_model->getVideos();           
               
                $this->load->view('admin/listvideos',$data);                 
            }	
			 if($this->input->post('actioncall')=="editbookform"){
		 
                $video_id = $this->input->post('video_id');   
			   $data['video']        =  $this->admin_video_model->getVideos(array('video_id' => $video_id));           
               
                $this->load->view('admin/editbookform',$data);                 
            }	
			 elseif($this->input->post('actioncall')=="changeFeatured"){
			
       
  $video_id = $this->input->post('video_id');
       $status_val = $this->input->post('status_val');
	//   exit;
         $status   =  $this->admin_video_model->updateFeaturedStatus($video_id, $status_val);
//$this->load->view('admin/graphic_view',$data);	
   //   $data['row']	=	$this->prize_model->getResults();
	   // $this->load->view('admin/prize_view',$data);
    
		}
		elseif($this->input->post('actioncall')=="delvideo")
	 		{
		    $video_id = $this->input->post('id');   
			$data['video']        =  $this->admin_video_model->delVideo(array('video_id' => $video_id));           
            //$this->load->view('admin/editpage',$data);                 
            }	
	  
}
 function faqs()
        {
		$data = array();
		$options['status'] = 'active';
		$data['faqs']        =  $this->admin_faq_model->getFaqs(); 
		$this->load->view('admin/faqs/faqs',$data);
        }

	 function ajaxDataManagementFaq()
        {
			
		$data=array();
	    if($this->input->post('actioncall')=="addfaqform")
            {
		    $this->load->view('admin/faqs/addfaqform',$data);
            }
		elseif($this->input->post('actioncall')=="addfaq")
            {
				
			$options =  array(
                    'question'   => $this->input->post('question') ,
                    'answer'     => $this->input->post('answer'),
					'add_date'     => time()
                 ); 
            echo $faq_id = $this->admin_faq_model->addFaq($options);
			}	
		elseif($this->input->post('actioncall')=="listfaqs")
            {
		    $data['faqs']        =  $this->admin_faq_model->getFaqs();
            $this->load->view('admin/faqs/listfaqs',$data);
            }	
		elseif($this->input->post('actioncall')=="editfaqform")
            {
		    $faq_id = $this->input->post('faq_id');
		    $data['faq']        =  $this->admin_faq_model->getfaq(array('faq_id' => $faq_id));
            $this->load->view('admin/faqs/editfaqform',$data);
            }	
		elseif($this->input->post('actioncall')=="editfaq")
			{
			$options =  array(
                   'id'                   => $this->input->post('id') ,
				     'question'   => $this->input->post('question') ,
                    'answer'     => $this->input->post('answer'),
                  );
            echo $page_id               = $this->admin_faq_model->editFaq($options);
			}		
		elseif($this->input->post('actioncall')=="delfaq")
            {
		    $faq_id = $this->input->post('faq_id');
			$data['faqs']        =  $this->admin_faq_model->delFaq(array('faq_id' => $faq_id));
            }

	    }
 
function happens()
        {
        $data = array();
		   
	  $data['forms'] = $this->admin_model->getHappens(array());
      $this->load->view('admin/happens/forms',$data);
        }
	
	 public function deletehappen($id) {
	
        
		
		 $query = $this->db->query("select sh_image from jb_shoutbox where sh_id='".$id."'");
		 //$query = $this->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           if( $query->row('sh_image') != ""){
		   
               $image_name = $query->row('sh_image');

 $file_path= FCPATH .'/assets/uploads/happens/'.$image_name;
			 $file_path1= FCPATH .'/assets/uploads/happens/small_thumbs/'.$image_name;
			//
			if(is_file($file_path)) { @unlink($file_path);
			@unlink($file_path1);
			}		   }
		   
           
         }
		   $this->db->where('sh_id', $id);
        $this->db->delete($this->db->dbprefix('shoutbox'));
		redirect('admin/main/happens');
			
			
			
           
		   
			
			
	
		                   
            
		
      
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	





































  function logout()
	{
		
     $session_data = array(
               'login_id'   => '',
               'user_id'    => '',
               'last_login' => '',
               'logged_in'  => false
         );
        $this->session->unset_userdata($session_data);   
        $this->session->sess_destroy();
        redirect('admin/');            
 	}
 

}