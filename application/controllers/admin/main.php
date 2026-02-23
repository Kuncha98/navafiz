<?php

class Main extends MY_Controller
{
    var $pages = 5;

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
        $this->session_user_id = $this->session->userdata('user_id');
        if($this->session_user_id>0){
            redirect(site_url('admin/dashboard'));
            exit();
        }else{
            redirect(site_url('user/login'));
            exit();
        }
        // $this->load->view('admin/login');
    }

    function login()
    {
        $this->form_validation->set_rules('login_id', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('login_id');
            $password = $this->input->post('password');
            $query = $this->admin_model->login('jb_admin', array('username' => $username, 'password' => md5($password), 'status' => 1));
            if ($query->num_rows > 0) {
                $row = $query->row();
                $session_data = array(
                    'admin_login_id' => $row->username,
                    'admin_user_id' => $row->id,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                redirect('admin/jobs');
            } else {
                $this->session->set_userdata('msg', 'Username Or Password is wrong!');
                redirect('admin/main/login');
            }
        }

    }

    function pages()
    {
        $data['pages'] = $this->admin_page_model->getPages();
//        $this->load->view('admin/pages/listpages', $data);
            
        $data['page_title'] = 'Pages';
        $data['content_view'] = 'admin/pages/listpages';
        $this->load->view('admin/sb-template', $data);
        
//        $options['status'] = 'active';
//        $this->load->view('admin/pages/pages', $data);
    }
    
    function editpage($id){
        $data['pages'] = $this->admin_page_model->GetById($id);
        
        $data['page_title'] = 'Edit Page';
        $data['content_view'] = 'admin/pages/editpageform';
        $this->load->view('admin/sb-template', $data);
    }
    
    
    function updatepage($id){
        
          $options['name'] = $this->input->post('name');
          $options['description'] = $this->input->post('descr');
          $options['slug'] = $this->input->post('slug');
//          $option['modify_date'] = $this->input->post('');
//          print_r($options);
//          exit();
          $page_id = $this->admin_page_model->updatepage($options,$id);
          redirect('admin/main/pages');
            
    }

    public function Settings()
    {
        $data['settings'] = $this->admin_model->getSettings();

        $data['page_title'] = 'Settings';
        $data['content_view'] = 'admin/settings';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('admin/settings', $data);

    }

    public function saveSettings()
    {

        // get picture data


        $data['message'] = "Setting updated successfully";
        $config = $_REQUEST['delAnn2'];
        $data['settings'] = $this->admin_model->saveSettings($config);
        /*$size = sizeof($config);
        $x=0;
        while($x<$size){
         $query="UPDATE config SET value='".$config[$x]."' where id='".($x+1)."'";
          mysqli_query($query); echo mysqli_error();
          $x++;
        }*/ // end of while
        redirect('admin/settings');
        //$this->load->view('admin/settings',$data);


        /*
          $data = array(
              'title' => $this->input->post('title'),
              'page_slug' => $slug,
              'description' => $this->input->post('description'),
              'image_id' => $image,
              'video_url' => $this->get_youtube_id_from_url($this->input->post('videos')),
              'publishar_id' => $this->session->userdata('id'),
              'seo_keyword' => trim($this->input->post('meta_keyword')),
              'seo_description' => trim($this->input->post('meta_description')),
              'publish_date' => date("Y-m-d h:m:s")
          );

          $this->db->insert('pages',$data);
          $this->session->set_flashdata('message', display('page_add_msg'));
          redirect("admin/Page/Create_new_page");*/
    }

    function ajaxDataManagementPage()
    {

        $data = array();
        if ($this->input->post('actioncall') == "addpage1") {
            $options = array(
                'name' => $this->input->post('name'),
                'descr' => $this->input->post('descr')
            );
            echo $page_id = $this->admin_page_model->addPage($options);
        } elseif ($this->input->post('actioncall') == "editpage") {
            $options = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'descr' => $this->input->post('descr')
            );
            echo $page_id = $this->admin_page_model->editPage($options);
        } elseif ($this->input->post('actioncall') == "addpageform") {
            $this->load->view('admin/pages/addpageform', $data);
        } elseif ($this->input->post('actioncall') == "listpages") {
            $data['pages'] = $this->admin_page_model->getPages();
            $this->load->view('admin/pages/listpages', $data);
        } elseif ($this->input->post('actioncall') == "editpageform") {
            $page_id = $this->input->post('page_id');
            $data['pages'] = $this->admin_page_model->getPages(array('id' => $page_id));
            $this->load->view('admin/pages/editpageform', $data);
        } elseif ($this->input->post('actioncall') == "delpage") {
            $page_id = $this->input->post('page_id');
            $data['pages'] = $this->admin_page_model->delPage(array('page_id' => $page_id));
            //$this->load->view('admin/editpage',$data);                 
        }
    }


    function faqs()
    {
        $options['status'] = 'active';
        $data['faqs'] = $this->admin_faq_model->getFaqs();
        
        $data['page_title'] = 'FAQs';
        $data['content_view'] = 'admin/faqs/faqs';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('admin/faqs/faqs', $data);
    }
    
    function addfaq(){
        $data['page_title'] = 'Add FAQ';
        $data['content_view'] = 'admin/faqs/addfaqform';
        $this->load->view('admin/sb-template' ,$data);
        
//        $this->load->view('admin/faqs/addfaqform');
    }
    
    function savefaq(){
        
            $options = array(
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'add_date' => time()
            );
            $faq_id = $this->admin_faq_model->addFaq($options);
            redirect('admin/main/faqs');
    }

    function ajaxDataManagementFaq()
    {

        $data = array();
        if ($this->input->post('actioncall') == "addfaqform") {
            $this->load->view('admin/faqs/addfaqform', $data);
        } elseif ($this->input->post('actioncall') == "addfaq") {

            $options = array(
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'add_date' => time()
            );
            echo $faq_id = $this->admin_faq_model->addFaq($options);
        } elseif ($this->input->post('actioncall') == "listfaqs") {
            $data['faqs'] = $this->admin_faq_model->getFaqs();
            $this->load->view('admin/faqs/listfaqs', $data);
        } elseif ($this->input->post('actioncall') == "editfaqform") {
            $faq_id = $this->input->post('faq_id');
            $data['faq'] = $this->admin_faq_model->getfaq(array('faq_id' => $faq_id));
            $this->load->view('admin/faqs/editfaqform', $data);
        } elseif ($this->input->post('actioncall') == "editfaq") {
            $options = array(
                'id' => $this->input->post('id'),
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
            );
            echo $page_id = $this->admin_faq_model->editFaq($options);
        } elseif ($this->input->post('actioncall') == "delfaq") {
            $faq_id = $this->input->post('faq_id');
            $data['faqs'] = $this->admin_faq_model->delFaq(array('faq_id' => $faq_id));
        }

    }
    
    
    function ajaxDataManagementHappens(){
        if($this->input->post('actioncall')=="listforms")
			 {
			
			$limit = $this->input->post('limit');
			
			
			$data = array();
//			$total   =  $this->education_model->getTotalMembers();
			

//			 $data['total_variables'] 	= $total;
			 $data['limit_selected'] 	= $limit;
         //	$data['languages']   =  $this->admin_language_model->getLanguages();	
             $data['forms'] = $this->admin_model->getFormsHappens(array('limit' => $limit));

            
              $this->load->view('admin/happens/sb-forms',$data); 
                  }
    }

    function happens()
    {
//        $data['forms'] = $this->admin_model->getHappens(array());
        
        $data['page_title'] = 'Happens';
        $data['content_view'] = 'admin/happens/ajaxhappens';
        $this->load->view('admin/sb-template', $data);
//        $this->load->view('admin/happens/forms', $data);
    }

    public function deletehappen($id)
    {


        $query = $this->db->query("select sh_image from jb_shoutbox where sh_id='" . $id . "'");
        //$query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            if ($query->row('sh_image') != "") {

                $image_name = $query->row('sh_image');

                $file_path = FCPATH . '/assets/uploads/happens/' . $image_name;
                $file_path1 = FCPATH . '/assets/uploads/happens/small_thumbs/' . $image_name;
                //
                if (is_file($file_path)) {
                    @unlink($file_path);
                    @unlink($file_path1);
                }
            }


        }
        $this->db->where('sh_id', $id);
        $this->db->delete($this->db->dbprefix('shoutbox'));
        redirect('admin/main/happens');


    }


    public function unpublishd($id)
    {
        $this->db->set('sh_status', 0)->where('sh_id', $id)->update('jb_shoutbox');
        $this->session->set_flashdata('message', "Unpublish successfully.");
        redirect("admin/main/happens");
    }

    public function publishd($id)
    {
        //	echo "aaaaaaaaaaaaaaaaaaaaa";
        //exit;projects
        $this->db->set('sh_status', 1)->where('sh_id', $id)->update('jb_shoutbox');
        $this->session->set_flashdata('message', "Publish successfully.");
        redirect("admin/main/happens");
    }


    function logout()
    {

        $session_data = array(
            'login_id' => '',
            'user_id' => '',
            'last_login' => '',
            'logged_in' => false
        );
        $this->session->unset_userdata($session_data);
        $this->session->sess_destroy();
        redirect('feed');
    }


}