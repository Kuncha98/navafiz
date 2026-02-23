<?php
class Classified extends CI_Controller {
  var $pages= 5;
function __construct()
        {
        parent::__construct();
       	$this->load->model('admin_olx_model');
        $this->load->model('Admin_classified_model');
        $this->load->model('categories_model');
		//$this->load->library('paging_front');
		}
  

function index()
	{
//    $data = "";
        $data['forms'] = $this->Admin_classified_model->GetAll(array('pro_status' => 1));
        
        $data['page_title'] = 'Products';
        $data['content_view'] = 'admin/products/sb-forms';
        $this->load->view('admin/sb-template' ,$data);
//	$this->load->view('admin/products/forms',$data);
    }
    
function update_product($id){
    
    
        $config=array();
        $config['upload_path'] ='nassets/products_img/';
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
                $c_img = $udata['upload_data']['file_name'];            
                $options['pro_image'] = $c_img; 
                
            }else{
                $errors = $this->upload->display_errors();
                echo "<pre>"; print_r($errors); echo "</pre>";
                exit;
            }
        }
        $options['pro_category_id'] = $this->input->post('cat_id');
        $options['pro_title'] = $this->input->post('name');
	$options['pro_slug'] = $this->input->post('slug');
	$options['pro_tags'] = $this->input->post('pro_tags');
	$options['pro_descr'] = $this->input->post('descr');
        
        $this->Admin_classified_model->Save($options,$id);
        redirect('admin/classified');
}


function add_product(){
        $status = 1;
        $data['categories'] = $this->categories_model->GetAll($status);

      
        $data['page_title'] = 'Products';
        $data['content_view'] = 'admin/products/showaddform';
        $this->load->view('admin/sb-template' ,$data);
}


function save_product(){
        $config=array();
        $config['upload_path'] ='nassets/products_img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;
        $this->upload->initialize($config);
        
        if($_FILES['pic']['name']){
            
       
        $config=array();
        $config['upload_path'] ='nassets/products_img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('pic')) {
            echo $error =  $this->upload->display_errors();
            exit;
            $this->session->set_flashdata('execption',$error);
            redirect('certification/SaveCertification');
        }
        else
        {               
            $data1 = $this->upload->data();            
            $c_img = $data1['file_name'];
            
        }

    }else{
        $c_img = "";
        
    }
        $user_id = $this->session->userdata('user_id');
    
        $options['pro_member_id'] = $user_id;
        $options['pro_image'] = $c_img;
        $options['pro_category_id'] = $this->input->post('cat_id');
        $options['pro_title'] = $this->input->post('title');
	$options['pro_slug'] = $this->input->post('slug');
	$options['pro_tags'] = $this->input->post('pro_tags');
	$options['pro_descr'] = $this->input->post('descr');
      
//        print_r($options);
//        exit();
        
        $this->Admin_classified_model->Save($options);
        redirect('admin/classified');
        
        
}


function delete_product($id){
    if(!empty($id)){
        if($this->Admin_classified_model->Delete($id)){
            _setSuccess("Record Deleted Successfully");
            redirect(site_url('admin/classified'));
        }else{
            _setError("Error Deleting Record");
            redirect(site_url('admin/classified')); 
        }
    }
   
}
    
    
    
function ajaxDataManagementClassified()
	{
    
	if($this->input->post('actioncall')=="showaddform")
		{
		$data['categories'] = $this->admin_olx_model->getBlogCForms(array('status' => 1));	
		$this->load->view('admin/products/showaddform',$data);
		}
	elseif($this->input->post('actioncall')=="addform")
		{
			
		 $options = array(
		 	
			'blog_category_id' => mysql_real_escape_string(trim($this->input->post('cat_id'))),
			'blog_title' => mysql_real_escape_string(trim($this->input->post('name'))),
			'blog_slug' => mysql_real_escape_string(trim($this->input->post('slug'))),
			'blog_tags' => mysql_real_escape_string(trim($this->input->post('tags'))),
			'blog_short_description' => mysql_real_escape_string(trim($this->input->post('short_descr'))),
			
			'blog_image' => $this->input->post('imagefile'),
			'blog_description' => $this->input->post('descr'),
			'blog_add_date' => time()
			);	
		echo $this->admin_olx_model->addForm($options);
	   }
	   
	elseif ($this->input->post('actioncall') == "listforms")
		{
	  	$data['forms'] = $this->admin_olx_model->getForms();
	  	$this->load->view('admin/products/listforms', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "showeditform")
	  	{
                $status = 1;
	  	$id = $this->input->post('id');
		$data['categories'] = $this->categories_model->GetAll($status);	
	  	$data['form'] = $this->Admin_classified_model->GetById($id);
	  	$this->load->view('admin/products/showeditform', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "editform")
	  	{
			//echo "fffffffffffffffffffffffffffffffffffffffffffffffffff";
			
  		$options = array(
		    'blog_id' => $this->input->post('id'),
			'blog_category_id' => mysql_real_escape_string(trim($this->input->post('cat_id'))),
			'blog_title' => mysql_real_escape_string(trim($this->input->post('name'))),
			'blog_tags' => mysql_real_escape_string(trim($this->input->post('tags'))),
			'blog_slug' => mysql_real_escape_string(trim($this->input->post('slug'))),
			'blog_short_description' => mysql_real_escape_string(trim($this->input->post('short_descr'))),
			
			'blog_image' => $this->input->post('imagefile'),
			'blog_description' => $this->input->post('descr')
  		  );
		$data['sub'] =  $this->admin_olx_model->delBlogTags(array('blog_id' => $this->input->post('id')));      
		//$options['blog_tags'] = $this->admin_olx_model->getBlogTags(array('blog_id' => $this->input->post('id')));	
		
		
	  	echo $page_id = $this->admin_olx_model->editForm($options);
  	   }
	elseif($this->input->post('actioncall')=="changeStatus")
		  {
		  $blog_id = $this->input->post('id');
		  $status_val = $this->input->post('status_val');
		  $status   =  $this->admin_olx_model->updateFormStatus($blog_id, $status_val);
		  }	
	elseif($this->input->post('actioncall')=="delselectedproducts")
		{
		$s_id = $this->input->post('ids');   
		$ids_arr =  explode(",",$s_id);
		for($a=0;$a<sizeof($ids_arr); $a++)
			{
			$image_name = $this->admin_olx_model->getImageName($ids_arr[$a]);
		 	if($image_name != "empty")
		 		{
		    	$file_path= FCPATH .'/assets/uploads/products/'.$image_name;
		    	$file_path1= FCPATH .'/assets/uploads/products/small_thumbs/'.$image_name;
		    	if(is_file($file_path)) { @unlink($file_path);
		  		}
		  	if(is_file($file_path1)) {
			   @unlink($file_path1);
		  	  }
		  	}
			
			
			$data['sub'] =  $this->admin_olx_model->delForm(array('blog_id' => $ids_arr[$a]));           
		}
		   
			
			
	
		                   
            }		  
	elseif($this->input->post('actioncall')=="delform")
		 {
		 $id = $this->input->post('id');   
		 $image_name = $this->admin_olx_model->getImageName($id);
		 if($image_name != "empty")
		 	{
		    $file_path= FCPATH .'/assets/uploads/products/'.$image_name;
		    $file_path1= FCPATH .'/assets/uploads/products/small_thumbs/'.$image_name;
		    if(is_file($file_path)) { @unlink($file_path);
		  	}
		  if(is_file($file_path1)) {
			   @unlink($file_path1);
		  	  }
		  }
		  $course        =  $this->admin_olx_model->delForm(array('pro_id' => $id));           
		}		
		
    }
function uploadBlog()
        {
	
		$rand_str =  time();
        $config['upload_path']      = './assets/uploads/products/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '10000';
        $config['file_name']        = $rand_str;
        $this->load->library('upload', $config);
	
		$data = array('upload_data' => $this->upload->data());
		$file = $_FILES['blogfile'];
		$file_size = round($file['size']/1024);
       
	   if ( ! $this->upload->do_upload('blogfile'))
	   	  {
			 
            $error = array('error' => $this->upload->display_errors());
	  // print_r($error);   	
			 echo '{"msg":"invalid"}';
		  }
	  else if($file_size > $config['max_size'])
	  	  {
		  echo '{"msg":"error"}';
		  }
	  else
	  	 {
		  $data = array('upload_data' => $this->upload->data());
		  $medium_thumb_image_path="./assets/uploads/products/small_thumbs/".$data['upload_data']['file_name'];
		  copy("./assets/uploads/products/".$data['upload_data']['file_name'],$medium_thumb_image_path);
		  resizeImg($medium_thumb_image_path, 300, 200);		
		  $options = array('');
	 	  echo '{"name":"'.$data['upload_data']['file_name'].'","type":"'.$file['type'].'","size":"'.$file['size'].'"}';
	    }
 	}
	




function bcategories()
	{
    $data = "";
    $data['forms'] = $this->admin_olx_model->getBlogCForms(array('status' => 1));
	$this->load->view('admin/blogcategories/forms',$data);
    }
function ajaxDataManagementBCategories()
	{
    $data = "";
	if($this->input->post('actioncall')=="showaddform")
		{
		//$data['instructors'] = $this->admin_olx_model->getForms(array('status' => 1,'table' => 'instructors'));	
		$this->load->view('admin/blogcategories/showaddform',$data);
		}
	elseif($this->input->post('actioncall')=="addform")
		{
		 $options = array(
		 			
			
			'blogc_title' => mysql_real_escape_string(trim($this->input->post('name')))
			
			);	
		echo $this->admin_olx_model->addBlogCForm($options);
	   }
	   
	elseif ($this->input->post('actioncall') == "listforms")
		{
	  	$data['forms'] = $this->admin_olx_model->getBlogCForms();
	  	$this->load->view('admin/blogcategories/listforms', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "showeditform")
	  	{
	  	$id = $this->input->post('id');
		
	  	$data['form'] = $this->admin_olx_model->getBlogCForms(array('blogc_id' => $id));
	  	$this->load->view('admin/blogcategories/showeditform', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "editform")
	  	{
			
  		$options = array(
		  'blogc_id' => $this->input->post('id'),
		  'name' => mysql_real_escape_string(trim($this->input->post('name')))
		 
  		  );
	  	echo $page_id = $this->admin_olx_model->editBlogCForm($options);
  	   }
	elseif($this->input->post('actioncall')=="changeStatus")
		  {
		  $blogc_id = $this->input->post('id');
		  $status_val = $this->input->post('status_val');
		  $status   =  $this->admin_olx_model->updateBlogCFormStatus($blogc_id, $status_val);
		  }	
	elseif($this->input->post('actioncall')=="delform")
		 {
		 $id = $this->input->post('id');   
		// $image_name = $this->admin_olx_model->getImageName($id);
		
		  $course        =  $this->admin_olx_model->delBlogCForm(array('blogc_id' => $id));           
		}		
		
    }	
	
	


}