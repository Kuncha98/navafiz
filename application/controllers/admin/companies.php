<?php
class Companies extends MY_Controller {
  var $pages= 5;
  function __construct()
        {
        parent::__construct();
        $this->load->model('admin_company_model');
		 $this->load->library('pagination');
      //  $this->load->model('admin_slider_model');
		//$this->load->model('admin_member_model');
		//$this->load->model('admin_page_model');
		
		//$this->load->model('admin_blog_model');
		
		
		//$this->load->library('paging_front');
	
	
		}

			

function index()
	{

	
 	@$where = "co_status = 1";
        $limit = 20;
        // pagination settings
        $total_rows = $this->db->select('*')->from('jb_companies')->where($where)->get()->num_rows();

        @$start = $this->uri->segment(4);

        $data['forms'] = $this->db->select('*')
        ->from('jb_companies')
        ->where($where)
        ->limit($limit,$start)
        ->order_by('added_on','DESC')
        ->get()
        ->result_array(); 
        $this->session->set_userdata('current_url',current_url());

        $data['page_title'] = 'Companies';
        $data['content_view'] = 'admin/companies/sb-forms';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('admin/companies/forms',$data);
    }
    
function addcompanyform()
	{
		
		
    $data['categories'] = $this->admin_company_model->getCategories(array('c_staus' => 1));
    
    $data['page_title'] = 'Add Company';
    $data['content_view'] = 'admin/companies/sb-showaddform';
    $this->load->view('admin/sb-template', $data);

//    $this->load->view('admin/companies/showaddform-o',$data);
	
    }
function savecompanies()
        {
        $data = "";
		
	//exit;
		if($_FILES['pic']['name']){
			
	    $config=array();
        $config['upload_path'] ='assets/uploads/companies/';
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
            redirect('admin/companies/addcompanyform');
        }
        else
        {
			//echo "aaa";
		//	exit;
         $data1 = $this->upload->data();
         $co_logo = $config['upload_path'].$data1['file_name'];
        #------------resize image------------#
          $this->load->library('image_lib');
          $config['image_library'] = 'gd2';
          $config['source_image'] = $config['upload_path'].$data1['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['width']     = 160;
          $config['height']   = 120;

          $this->image_lib->clear();
          $this->image_lib->initialize($config);
          $this->image_lib->resize();
          #-------------resize image----------#
        }
    
		}
		else{
       $co_logo = $this->input->post('pic'); 
    }
		
		
		 $cat_id = $this->input->post('cat_id');
		  $name = $this->input->post('name');
		   $mobile = $this->input->post('mobile');
		    $phone = $this->input->post('phone');
			 $fax = $this->input->post('fax');
			  $address = $this->input->post('address');
			   $website = $this->input->post('website');
			    $keywords = $this->input->post('keywords');
			// $this->session->userdata('admin_login_id')
   $this->admin_company_model->saveCompanies(array('co_cat_id' => $cat_id,'co_logo' => $co_logo,'co_name' => $name,'co_mobile' => $mobile,'co_phone' => $phone,'co_fax' => $fax,'co_address' => $address,'co_tags' => $keywords,'co_website' => $website,'co_status' => 1,'added_on' => date("y-m-d")));
         redirect(base_url().'admin/companies');        
		}	


function editcompany($id)
	{
     $data['form'] = $this->admin_company_model->getForms(array('id' => $id));
    $data['categories'] = $this->admin_company_model->getCategories(array('c_staus' => 1));
    
    
    $data['page_title'] = 'Edit Company';
    $data['content_view'] = 'admin/companies/sb-showeditform';
    $this->load->view('admin/sb-template', $data);

    
//    $this->load->view('admin/companies/showeditform',$data);
	
    }
function updatecompanies()
        {
        $data = "";
		
	//exit;
		if($_FILES['pic']['name']){
			
	    $config=array();
        $config['upload_path'] ='assets/uploads/companies/';
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
            redirect('admin/companies/addcompanyform');
        }
        else
        {
			//echo "aaa";
		//	exit;
         $data1 = $this->upload->data();
         $co_logo = $config['upload_path'].$data1['file_name'];
        #------------resize image------------#
          $this->load->library('image_lib');
          $config['image_library'] = 'gd2';
          $config['source_image'] = $config['upload_path'].$data1['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['width']     = 160;
          $config['height']   = 120;

          $this->image_lib->clear();
          $this->image_lib->initialize($config);
          $this->image_lib->resize();
          #-------------resize image----------#
        }
    
		}
		else{
       $co_logo = $this->input->post('pic'); 
    }
		
		$id = $this->input->post('id');
		 $cat_id = $this->input->post('cat_id');
		  $name = $this->input->post('name');
		   $mobile = $this->input->post('mobile');
		    $phone = $this->input->post('phone');
			 $fax = $this->input->post('fax');
			  $address = $this->input->post('address');
			   $website = $this->input->post('website');
			    $keywords = $this->input->post('keywords');
			// $this->session->userdata('admin_login_id')
   $this->admin_company_model->updateCompanies(array('co_id' => $id,'co_cat_id' => $cat_id,'co_logo' => $co_logo,'co_name' => $name,'co_mobile' => $mobile,'co_phone' => $phone,'co_fax' => $fax,'co_address' => $address,'co_tags' => $keywords,'co_website' => $website,'co_status' => 1,'co_add_date' => date("y-m-d")));
         redirect(base_url().'admin/companies');        
		}	





function jobtitles()
        {
        $data = "";
        $this->load->view('admin/companies/jobtitleform',$data);
        }

function savejobtitle()
        {
        $data = "";
		 $title = $this->input->post('title');
         $this->admin_job_model->saveJobTitle(array('jt_title' => $title,'jt_add_date' => date("y-m-d")));
         redirect(base_url().'admin/companies/listjobtitles');        
		}
		
/*function listjobtitles()
        {
        $data = "";
		   
	  $data['forms'] = $this->admin_job_model->getJobTitles();
      $this->load->view('admin/companies/listjobtitles',$data);
        }*/	
 public function deletecompany($id) {
	 //echo "dd".$id;
	 //exit;
        $this->db->where('co_id', $id);
        $this->db->delete($this->db->dbprefix('companies'));
		redirect('admin/companies');
        //return true;
    }
public function unpublishd($id){
    $this->db->set('co_status',0)->where('co_id',$id)->update('jb_companies');
    $this->session->set_flashdata('message', "Unpublish successfully.");
    redirect("admin/companies");
}

public function publishd($id){
	//	echo "aaaaaaaaaaaaaaaaaaaaa";
	//exit;projects
    $this->db->set('co_status',1)->where('co_id',$id)->update('jb_companies');
    $this->session->set_flashdata('message', "Publish successfully.");
    redirect("admin/companies");
}
				
function settingdata()
        {
   
	   $data['message'] = "Setting updated successfully";
	    	$config = $_REQUEST['delAnn2'];
	$size = sizeof($config);
	$x=0;
	while($x<$size){
	 $query="UPDATE ka_config SET value='".sql_safe($config[$x])."' where id='".($x+1)."'";
	  mysql_query($query); echo mysql_error();
	  $x++;
	} // end of while
	
	$this->load->view('admin/settings',$data);
        }


function jobseekerstips()
        {
        $data = "";
		   
	  $data['forms'] = $this->admin_job_model->getJobTips();
      $this->load->view('admin/companies/listjobseekerstips',$data);
        }




function addjobseekerform()
        {
        $data = "";
        $this->load->view('admin/companies/jobseekerform',$data);
        }


function savejobtips()
        {
        $data = "";
		 $title = $this->input->post('title');
		 $descr = $this->input->post('descr');
         $this->admin_job_model->saveJobTips(array('st_title' => $title,'st_descr' => $descr,'st_add_date' => date("y-m-d")));
         redirect(base_url().'admin/companies/jobseekerstips');        
		}
 public function deletejobseeker($id) {
	 //echo "dd".$id;
	 //exit;
        $this->db->where('st_id', $id);
        $this->db->delete($this->db->dbprefix('jobseekertips'));
		redirect('admin/companies/jobseekerstips');
        //return true;
    }





















 
   /*    function _check_login($login_id){

        if($this->input->post('login_id')){
            $user = $this->admin_model->getUsers(array($login_id,'password' => md5($this->input->post('password'))));    
            if($user) return true;
        }
        $this->form_validation->set_message('_check_login','Your username / password combination is invalid');
        return false;
    }*/

}