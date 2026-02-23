<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Classified extends CI_Controller {
  var $pages= 5;
function Classified()
        {
        parent::__construct();
       	$this->load->model('member_model');
	   	$this->load->model('olx_model');
		 	$this->load->model('blog_model');
		$this->load->library('paging_front');
		}
 function index()
	{
	$data = "";
	if($this->session->userdata('user_id') != "")
		{ 
 	//$data['profile'] = $this->classified_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
	$data['products'] 	 = $this->olx_model->getProducts(array('pro_staus' => 1));	
	$this->load->view('classified',$data);	
	}
		else
		{
		redirect('/');
		}
	} 
	
function productajax()
	{
	$data = "";
    $page_id = $this->input->post('page_id');
    $limit = $this->input->post('limit');
	
	//$s_catid = $this->input->post('s_catid');
//	$s_skills = $this->input->post('s_skills');
		
    $data = array();
    if($page_id!="")
         $offset    = $limit * ($page_id-1);
	
   $total   =  $this->olx_model->getTotalProducts();
   $options =  array('records' => $limit ,
                 'pages'   => $this->pages,
                 'page_no' => $page_id,
                 'total'   => $total );
   $paging      = new paging_front($options);
   $paging_link = $paging->show_paging();
   $data['total_deals']   		= $total;
   $data['limit_selected'] 	= $limit;
//   $data['professionals'] = $this->member_model->getProducts(array('cat_id' =>$s_catid,'profession' =>$s_skills,'status' =>1,'offset' =>$offset, 'limit' => $limit));
     $data['products'] = $this->olx_model->getProducts(array('pro_status' =>1,'offset' =>$offset, 'limit' => $limit));

   $data['paging_link'] = $paging_link;
   $this->load->view('listproducts', $data);
	}
	
function postad()
	{
	$data = "";
 	$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
		$data['relatedprofiles'] = $this->member_model->getRelatedProfiles(array('m_staus' => 1,'cat_id' =>$this->session->userdata('cat_id')));
	$this->load->view('postad',$data);	
	}		
	
	public function uploadProductImage()
		{
		$file_ext=preg_split("/\./", $_FILES["productfile"]["name"]);
		$file_ext1=$file_ext[count($file_ext)-1];
		$file_name = $file_ext[0].$this->session->userdata('user_id').".".$file_ext1;
	   if($file_ext1 == "jpg"  || $file_ext1 == "jpeg" || $file_ext1 == "png")
			{
			$file_size = round($_FILES["productfile"]['size']);	
		    if($file_size > 2097152)
				{
				echo '{"msg":"large size"}';
				}
			else if(move_uploaded_file($_FILES["productfile"]["tmp_name"],"./assets/uploads/products/".$file_name)) {
				
				 $medium_thumb_image_path="./assets/uploads/products/small_thumbs/".$file_name;
		  		 copy("./assets/uploads/products/".$file_name,$medium_thumb_image_path);
		  		 resizeImg($medium_thumb_image_path, 200, 200);		
				
				 echo '{"name":"'.$file_name.'","type":"'.$file_ext1.'","msg":"success"}';
				}
			else
		   		echo 2;
		   }
		else
			echo '{"msg":"invalid type"}'; 	
			
}

function postProductData()
	{ 
	$data="";
		 $cat_id = $this->input->post('cat_id');
		 $protitle = $this->input->post('protitle');
		 $proimage = $this->input->post('proimage');
		  $proimage2 = $this->input->post('proimage2');
		 $j_descr = $this->input->post('descr');
		
	
		if($this->input->post('actioncall')=="postproductdata"){
 echo $data =  $this->olx_model->addProduct(array('pro_member_id' =>$this->session->userdata('user_id'),'pro_category_id' =>$cat_id,'pro_title' =>$protitle,'pro_image' =>$proimage,'pro_image2' =>$proimage2, 'pro_descr' =>$j_descr, 'pro_add_date'=>time()));
		}
	}
	
function productdetail($id)
	{
	$data="";
	
	$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
	$data['product'] = $this->olx_model->getProducts(array('pro_status' =>1,'pro_id' =>$id));
	
	 $data['categories'] = $this->blog_model->getCategories(array('blogc_status' =>1));
            $data['recentposts'] = $this->blog_model->getRecentPosts(array('blog_status' =>1));
            $data['blogcomments'] = $this->blog_model->getBlogComments(array('blog_id' =>$id,'blogcom_status' =>1));
            $data['blog'] = $this->blog_model->getBlogDetail(array('c_status' =>1,'blog_id' =>$id));
            $data['randomtags'] = $this->blog_model->getRandomTags(array('blog_status' =>1));	
			
	$this->load->view('classifieddetail', $data);
	}	
public function zoom_item_image() {
		
		//Variables Declaration and Initialization
		$data = "";
		$id       = $this->input->post('id');
		$colu       = $this->input->post('colu');
				
		echo $item_image = $this->olx_model->getItemImage($id,$colu);
		//$this->load->view('front_end/item_popup', $data,false);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
function products()
	{
	$data = "";
 	$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
	$data['products'] 	 = $this->olx_model->getProducts(array('pro_staus' => 1));	
	$this->load->view('olx',$data);	
	}





public function uploadproductimage2()
		{
			
		$file_ext=preg_split("/\./", $_FILES["productfile2"]["name"]);
		$file_ext1=$file_ext[count($file_ext)-1];
		$file_name = $file_ext[0].$this->session->userdata('user_id').".".$file_ext1;
	   if($file_ext1 == "jpg"  || $file_ext1 == "jpeg" || $file_ext1 == "png")
			{
			$file_size = round($_FILES["productfile2"]['size']);	
		    if($file_size > 2097152)
				{
				echo '{"msg":"large size"}';
				}
			else if(move_uploaded_file($_FILES["productfile2"]["tmp_name"],"./assets/uploads/products/".$file_name)) {
				
			 	 $small_thumb_image_path="./assets/uploads/products/small_thumbs/".$file_name;
				 $medium_thumb_image_path="./assets/uploads/products/medium_thumbs/".$file_name;
		  		 
				 copy("./assets/uploads/products/".$file_name,$small_thumb_image_path);
		  		 resizeImg($small_thumb_image_path, 150, 150);		
		  		copy("./assets/uploads/products/".$file_name,$medium_thumb_image_path);
		  		 resizeImg($medium_thumb_image_path, 300, 300);		
		  		
	 	// $data =  $this->member_model->updatCover(array('m_id' =>$this->session->userdata('user_id'),'m_cover' =>$file_name));
				
				 echo '{"name":"'.$file_name.'","type":"'.$file_ext1.'","msg":"success"}';
				}
			else
		   		echo 2;
		   }
		else
			echo '{"msg":"invalid type"}';
			
		
 	}	

/*function addproduct()
	{
echo "1111111111111111111111111111111111111111111111111111111";
	$protitle = $this->input->post('protitle');
	$pro_price = $this->input->post('proprice');
    $pro_cat_id = $this->input->post('pro_cat_id');
	$pro_descr = $this->input->post('pro_descr');
	$proimage = $this->input->post('proimage');
	$proimage2 = ($this->input->post('proimage2') == "")? "" :$this->input->post('proimage2') ;
	$pro_contact_name = $this->input->post('properson');
	$pro_contact_num = $this->input->post('pronumber');
	$pro_contact_city = $this->input->post('procity');
	$pro_contact_email = $this->input->post('proemail');
	echo $data =  $this->olx_model->addProduct(array('pro_mesdfsdfsdfsdmber_id' =>$this->session->userdata('user_id'),'pro_image' =>$proimage,'pro_image2' =>$proimage2,'pro_title' =>$protitle,'pro_price' =>$pro_price,'pro_category_id' =>$pro_cat_id,'pro_descr' =>$pro_descr,'pro_contact_name' =>$pro_contact_name,'pro_contact_num' =>$pro_contact_num,'pro_contact_city' =>$pro_contact_city,'pro_contact_email' =>$pro_contact_email,'pro_add_date' =>time()));
	
	}	*/
	

function memberProducts()
	{
		
	$data = "";
 	$data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
	if($this->uri->segment(2) != "")
		$data['products'] 	 = $this->olx_model->getProducts(array('pro_staus' => 1,'user_id' =>$this->uri->segment(2)));	
	else
		$data['products'] 	 = $this->olx_model->getProducts(array('pro_staus' => 1,'user_id' =>$this->session->userdata('user_id')));	
	$this->load->view('myolx',$data);	
	}
function unlink_file_image($property_id)
		{
			$query=$this->common_model->select_where('*','properties',array('property_id'=>$property_id));
			if($query->num_rows()>0){
			$row	=	$query->row_array();
			$img=$row['property_image'];			
			$original_path = PATH_DIR."uploads/properties/";
			$path=$original_path.$img;
			$smal = $original_path.'thumbs/s_'.$img;
			@unlink($path);
			@unlink($smal);
			}
		}

function removeProduct()
	{
	$pro_id = $this->uri->segment(3);
 	$data =  $this->olx_model->deleteProduct(array('pro_id' =>$pro_id));	
	//$this->common_model->delete_where(array('property_id'=>$property_id),'properties');
	$this->session->set_flashdata('flash_message','<div class="alert error_msg" style="width:92%; margin:0 0 16px 12px"><strong>Error: </strong>Property deleted successfully.</strong></div>');
	redirect('memberproducts');
	
	}































function ajaxDataManagementOlx()
	{
    $data = "";
	if($this->input->post('actioncall')=="showaddform")
		{
		$data['categories'] = $this->admin_olx_model->getBlogCForms(array('status' => 1));	
		$this->load->view('admin/blogs/showaddform',$data);
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
	  	$this->load->view('admin/blogs/listforms', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "showeditform")
	  	{
	  	$id = $this->input->post('id');
		$data['categories'] = $this->admin_olx_model->getBlogCForms(array('status' => 1));	
	  	$data['form'] = $this->admin_olx_model->getForms(array('blog_id' => $id));
	  	$this->load->view('admin/blogs/showeditform', $data);
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
	elseif($this->input->post('actioncall')=="delselectedblogs")
		{
		$s_id = $this->input->post('ids');   
		$ids_arr =  explode(",",$s_id);
		for($a=0;$a<sizeof($ids_arr); $a++)
			{
			$image_name = $this->admin_olx_model->getImageName($ids_arr[$a]);
		 	if($image_name != "empty")
		 		{
		    	$file_path= FCPATH .'/assets/uploads/blogs/'.$image_name;
		    	$file_path1= FCPATH .'/assets/uploads/blogs/small_thumbs/'.$image_name;
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
			 echo "fffffffffffffffffffffffff";
			 exit;
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
        $config['upload_path']      = './assets/uploads/blogs/';
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
		  $medium_thumb_image_path="./assets/uploads/blogs/small_thumbs/".$data['upload_data']['file_name'];
		  copy("./assets/uploads/blogs/".$data['upload_data']['file_name'],$medium_thumb_image_path);
		  resizeImg($medium_thumb_image_path, 300, 200);		
		  $options = array('');
	 	  echo '{"name":"'.$data['upload_data']['file_name'].'","type":"'.$file['type'].'","size":"'.$file['size'].'"}';
	    }
 	}
	




function ocategories()
	{
    $data = "";
    $data['forms'] = $this->admin_olx_model->getCategories(array('status' => 1));
	$this->load->view('admin/olxcategories/forms',$data);
    }
function ajaxDataManagementOCategories()
	{
    $data = "";
	if($this->input->post('actioncall')=="showaddform")
		{
		//$data['instructors'] = $this->admin_olx_model->getForms(array('status' => 1,'table' => 'instructors'));	
		$this->load->view('admin/olxcategories/showaddform',$data);
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
	  	$data['forms'] = $this->admin_olx_model->getCategories();
	  	$this->load->view('admin/olxcategories/listforms', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "showeditform")
	  	{
	  	$id = $this->input->post('id');
		
	  	$data['form'] = $this->admin_olx_model->getCategories(array('c_id' => $id));
	  	$this->load->view('admin/olxcategories/showeditform', $data);
	  	}
  	elseif ($this->input->post('actioncall') == "editform")
	  	{
			
  		$options = array(
		  'c_id' => $this->input->post('id'),
		  'name' => mysql_real_escape_string(trim($this->input->post('name')))
		 
  		  );
	  	echo $page_id = $this->admin_olx_model->editCategry($options);
  	   }
	elseif($this->input->post('actioncall')=="changeStatus")
		  {
		  $c_id = $this->input->post('id');
		  $status_val = $this->input->post('status_val');
		  $status   =  $this->admin_olx_model->updateCategoryStatus($c_id, $status_val);
		  }	
	elseif($this->input->post('actioncall')=="delform")
		 {
		 $id = $this->input->post('id');   
		// $image_name = $this->admin_olx_model->getImageName($id);
		
		  $course        =  $this->admin_olx_model->delCategory(array('c_id' => $id));           
		}		
		
    }	
	
	


}