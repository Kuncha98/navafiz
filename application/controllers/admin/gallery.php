<?php
class Gallery extends CI_Controller {
  var $pages= 5;
function __construct()
        {
        parent::__construct();
       	$this->load->model('admin_gallery_model');
			$this->load->model('admin_event_model');
		//$this->load->library('paging_front');
		}
  

	 function index()
        {
		 $data = array();
        $options['status'] = 'active';
        $data['cgallery']  =  $this->admin_gallery_model->getGallery(array('status' => 'active'));
       $data['page_title'] = 'Gallery';
        $data['content_view'] = 'admin/gallery/sb-forms';
        $this->load->view('admin/sb-template', $data);
//    	 $this->load->view('admin/gallery/forms',$data);
        }
	
	 function allimages()
        {
		$data = array();
		$options['status'] = 'active';
        $data['images']        =  $this->admin_gallery_model->getGallery(array('status' => '1'));
       
    	 $this->load->view('admin/gallery/allimages',$data);
        }
	
	function add()
        {
			
	$options['status'] = 'active';
        $data['cgallery']        =  $this->admin_gallery_model->getGallery(array('pic' => 'active'));
        $data['page_title'] = 'Add Image';
        $data['content_view'] = 'admin/gallery/sb-showaddform';
        $this->load->view('admin/sb-template', $data);
        
//    	 $this->load->view('admin/gallery/showaddform',$data);
        }
		
public  function savepic()
        {
       
		 
	
	
	$data=array();
	
		if($_FILES['pic']['name']){
			
	    $config=array();
        $config['upload_path'] ='assets/uploads/jobs/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = "";
        $config['file_ext_tolower'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('pic')) {
		     $error =  $this->upload->display_errors();
			//exit;
			 
            $this->session->set_flashdata('execption',$error);
            redirect('admin/gallery');
        }
        else
        {
			//echo "aaa";
		//	exit;
         $data1 = $this->upload->data();
         //$happenimage = $config['upload_path'].$data1['file_name'];
		 $pic = $data1['file_name'];
        #------------resize image------------#
       /*   $this->load->library('image_lib');
          $config['image_library'] = 'gd2';
          //$config['source_image'] = $config['upload_path'].$data1['file_name'];
		  $config['source_image'] = $jobimage;
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['width']     = 150;
          $config['height']   = 150;

          $this->image_lib->clear();
          $this->image_lib->initialize($config);
          $this->image_lib->resize();*/
          #-------------resize image----------#
        }
    
		}
		else{
       $pic = ""; 
    }
	
		 /*$cat_id = $this->input->post('jobcat_id');
		 $j_title = $this->input->post('jobtitle');
		  $j_slug =  clean(strtolower($this->input->post('jobtitle')));
		 $jobtitle2 = $this->input->post('jobtitle2');
		 $j_tags = "";
		  $country_id = $this->input->post('jobcountry');
		   $state = $this->input->post('jobstate');
		  $j_location = $this->input->post('jobcity');
		 $j_image = $jobimage;
		 $j_descr = $this->input->post('jobdescr');
		 $j_company = $this->input->post('jobcompany');
		 $j_email_apply = $this->input->post('jobemailapply');*/
	 	//  $j_location = $this->input->post('location');
	
	if($jobtitle2 != "")
	$j_title = $jobtitle2;
	
	//	if($this->input->post('actioncall')=="postjobdata"){
        $data =  $this->admin_gallery_model->addForm(array('pic' =>$pic));
		
		if($data){
			$this->session->set_flashdata('msg','Job successfully post and will publish after admin approval!');
			redirect('admin/gallery');		
		}
		//}
	       
		}


    public function upload_gallery_image()
    {
        $rand_str =  time();
        $config['upload_path']      = './assets/uploads/gallery/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '10000';
        $config['file_name']        = $rand_str;
        $this->load->library('upload', $config);

        $data = array('upload_data' => $this->upload->data());
        $file = $_FILES['bookfile'];
        $file_size = round($file['size']/1024);

        if ( ! $this->upload->do_upload('bookfile'))
        {

            $error = array('error' => $this->upload->display_errors());
            //  print_r($error);
            echo '{"msg":"invalid"}';
        }
        else if($file_size > $config['max_size'])
        {
            echo '{"msg":"error"}';
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $medium_thumb_image_path="./assets/uploads/gallery/small_thumbs/".$data['upload_data']['file_name'];
            copy("./assets/uploads/gallery/".$data['upload_data']['file_name'],$medium_thumb_image_path);
            resizeImg($medium_thumb_image_path, 300, 200);
            $options = array('');
            echo '{"name":"'.$data['upload_data']['file_name'].'","type":"'.$file['type'].'","size":"'.$file['size'].'"}';
        }
    }
    function ajaxDataManagementGallery(){
        $data= array();
        if($this->input->post('actioncall')=="addgalleryform"){
            $data['events'] = $this->admin_event_model->getEvents();
            $this->load->view('admin/gallery/showaddform',$data);
        }
        elseif($this->input->post('actioncall')=="addgallery"){


            $options =  array(
                'name'   => $this->input->post('name') ,
                'event_id'   => $this->input->post('cat_id') ,
                'image'     => $this->input->post('gallery_image_name'),
                'add_date'     => time()
            );


            echo $this->admin_gallery_model->addGallery($options);




        }

        elseif($this->input->post('actioncall')=="editgalleryform"){

            $product_id = $this->input->post('product_id');
            $data['cats'] = $this->admin_product_model->getCats();
            $data['products']        =  $this->admin_gallery_model->getProduct($product_id);

            $this->load->view('admin/showeditform',$data);
        }
        else if($this->input->post('actioncall')=="editgallery")
        {

            $options =  array(
                'product_id'   => $this->input->post('product_id') ,
                'name'   => $this->input->post('name') ,
                'product_image_name'     => $this->input->post('product_image_name'),
                'descr'   => $this->input->post('descr') ,

                //'add_date'     => time()
            );
            echo $page_id               = $this->admin_gallery_model->editGallery($options);
        }


        elseif($this->input->post('actioncall')=="listgallery"){

            $data['cgallery']        =  $this->admin_gallery_model->getGallery(array('status' => 'active'));

            $this->load->view('admin/gallery/listform',$data);
        }




        elseif($this->input->post('actioncall')=="delgallery")
        {
            $gallery_id = $this->input->post('id');
            $image_name = $this->admin_gallery_model->getImageName($gallery_id);

            if($image_name != "empty")
            {
               $file_path= FCPATH .'/assets/uploads/gallery/'.$image_name;
                $file_path1= FCPATH .'/assets/uploads/gallery/small_thumbs/'.$image_name;
                //
                if(is_file($file_path)) { @unlink($file_path);
                    @unlink($file_path1);
                }
            }
            //exit;
            $data['video']        =  $this->admin_gallery_model->delGallery(array('gallery_id' => $gallery_id));






        }

    }	
	




public function delete($id) {
	 //echo "dd".$id;
	 //exit;
        $this->db->where('id', $id);
        $this->db->delete($this->db->dbprefix('imagelibrary'));
		redirect('admin/imagelibrary');
        //return true;
    }
public function unpublishd($id){
    $this->db->set('status',0)->where('id',$id)->update('jb_imagelibrary');
    $this->session->set_flashdata('message', "Unpublish successfully.");
    redirect("admin/imagelibrary");
}

public function publishd($id){
	//	echo "aaaaaaaaaaaaaaaaaaaaa";
	//exit;projects
    $this->db->set('status',1)->where('id',$id)->update('jb_imagelibrary');
    $this->session->set_flashdata('message', "Publish successfully.");
    redirect("admin/imagelibrary");
}

	
	


}