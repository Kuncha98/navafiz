<?php

class Jobs extends MY_Controller
{
    var $pages = 5;

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_job_model');
        $this->load->model('admin_slider_model');
        $this->load->model('member_model');
        $this->load->library('pagination');
        $this->load->model('job_model');

        //$this->load->model('admin_blog_model');


        $this->load->library('paging_front');


    }


    function index()
    {

        @$where = "jb_jobs.cat_id != 0";
        $limit = 20;
        // pagination settings
        $total_rows = $this->db->select('*')->from('jb_jobs')->where($where)->get()->num_rows();

        @$start = $this->uri->segment(4);

        $data['pp'] = $this->db->select('*')
            ->from('jb_jobs')
            ->join('jb_jobtitle', 'jb_jobs.j_title = jb_jobtitle.jt_id', 'left')
            ->join('jb_categories', 'jb_jobs.cat_id = jb_categories.c_id')
            ->join('jb_member', 'jb_jobs.j_addedby = jb_member.m_id', 'left')
            //->db->order_by("j_add_date", "DESC");
            //->join('user_info','user_info.id=news_mst.post_by')
            ->where($where)
            ->limit($limit, $start)
            ->order_by('jb_jobs.j_add_date', 'DESC')
            ->get()
            ->result_array();
        $this->session->set_userdata('current_url', current_url());

        $data['page_title'] = 'Jobs';
        $data['content_view'] = 'admin/jobs/sb-forms';
        $this->load->view('admin/sb-template', $data);


        // $this->load->view('admin/jobs/forms', $data);


    }
    
    function quick_jobs(){
        $jobs = $this->admin_job_model->GetQuickJobs();
        $data['forms'] = $jobs;
//        $this->load->view('admin/jobs/list_quick_jobs',$data);
        
        $data['page_title'] = 'Quick Jobs';
        $data['content_view'] = 'admin/jobs/list_quick_jobs';
        $this->load->view('admin/sb-template', $data);
       
       
    }
    
    function add_quick_job(){
        $data['page_title'] = 'Add Quick Jobs';
        $data['content_view'] = 'admin/jobs/add_quick_job';
        $this->load->view('admin/sb-template', $data);
    }
    
    function edit_quick_job($id){
        
        $data['forms'] = $this->admin_job_model->GetQuickJobById($id);
        
        $data['page_title'] = 'Edit Quick Jobs';
        $data['content_view'] = 'admin/jobs/edit_quick_job';
        $this->load->view('admin/sb-template', $data);
    }
    
    function save_quick_job(){
        
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['added_by'] = $this->session->userdata('user_id');
        $data['added_on'] = date('Y-m-d');
        $data['status'] = 1;
        
        $data = $this->admin_job_model->saveQuickJob($data);
        
        if(!empty($data)){
            _setSuccess('Successfully added job');
            redirect(base_url() . 'admin/jobs/quick_jobs');
            exit();
        }
       
    }
    function update_quick_job($id){
        
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['updated_by'] = $this->session->userdata('user_id');
        $data['updated_on'] = date('Y-m-d');
        $data['status'] = 1;
//        print_r($data);exit();
        $data = $this->admin_job_model->saveQuickJob($data,$id);
        
        
        if(!empty($data)){
            _setSuccess('Successfully updated job');
            redirect(base_url() . 'admin/jobs/quick_jobs');
            exit();
        }
       
    }
    
    
    function delete_quick_job($id){
        $this->db->where('quick_job_id', $id);
        $this->db->delete('jb_quick_job');
        _setSuccess('Sucessfully deleted job');
        redirect(base_url() . 'admin/jobs/quick_jobs');
        exit();
        //return true;
    }
                function addjobform()
    {
        $data['job_title'] = $this->job_model->GetJobTitle();

        $data['countries'] = $this->member_model->getCountries();
        $data['categories'] = $this->admin_job_model->getCategories(array('c_staus' => 1));


        $data['page_title'] = 'Jobs';
        $data['content_view'] = 'admin/jobs/sb-showaddform';
        $this->load->view('admin/sb-template', $data);

    }

    public function savejob()
    {



        if ($_FILES['pic']['name']) {

            $config = array();
            $config['upload_path'] = 'assets/uploads/jobs/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = false;
            $config['max_size'] = 1024;
            $config['remove_spaces'] = true;
            $config['max_filename'] = 10;
            $config['file_ext_tolower'] = true;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('pic')) {
                $error = $this->upload->display_errors();
                exit;

                $this->session->set_flashdata('exception', $error);
                redirect('admin/jobs');
            } else {
                //echo "aaa";
                // exit;
                $data1 = $this->upload->data();
                //$happenimage = $config['upload_path'].$data1['file_name'];
                $jobimage = $data1['file_name'];
                
            }

        } else {
            $jobimage = "";
        }
        
        $user_id = $this->input->post('user_id');
        
        $cat_id = $this->input->post('jobcat_id');
        $j_title = $this->input->post('jobtitle');
        $j_slug = clean(strtolower($this->input->post('jobslug')));
        $jobtitle2 = $this->input->post('jobtitle2');
        $j_tags = "";//$this->input->post('jobtags');
        $country_id = $this->input->post('jobcountry');
        $state = $this->input->post('jobstate');
        $j_location = $this->input->post('jobcity');
        $j_image = $jobimage;
        $j_descr = $this->input->post('jobdescr');
        $j_company = $this->input->post('jobcompany');
        $j_email_apply = $this->input->post('jobemailapply');
        //  $j_location = $this->input->post('location');

        if ($jobtitle2 != "")
            $j_title = $jobtitle2;

        //	if($this->input->post('actioncall')=="postjobdata"){
        $data = $this->admin_job_model->addForm(array('cat_id' => $cat_id, 'j_title' => $j_title, 'j_tags' => $j_tags, 'j_country_id' => $country_id, 'j_state' => $state, 'j_location' => $j_location, 'j_image' => $j_image, 'j_descr' => $j_descr, 'j_company' => $j_company, 'j_email_apply' => $j_email_apply, 'j_addedby' => $this->session->userdata('user_id'), 'j_status' => 1, 'j_add_date' => time()));

        if ($data) {
            $this->session->set_flashdata('msg', 'Job successfully post and will publish after admin approval!');
            redirect('admin/jobs');
        }
        //}

    }

    function editjob($id)
    {
        $data['form'] = $this->admin_job_model->getForms(array('j_id' => $id));
        $data['countries'] = $this->member_model->getCountries();
        $data['categories'] = $this->admin_job_model->getCategories(array('c_staus' => 1));

        $data['page_title'] = 'Edit Jobs';
        $data['content_view'] = 'admin/jobs/sb-showeditform';
        $this->load->view('admin/sb-template', $data);



        // $this->load->view('admin/jobs/showeditform', $data);
    }

    function updatejob()
    {


        //exit;
        if ($_FILES['pic']['name']) {

            $config = array();
            $config['upload_path'] = 'assets/uploads/jobs/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = false;
            $config['max_size'] = 1024;
            $config['remove_spaces'] = true;
            $config['max_filename'] = 10;
            $config['file_ext_tolower'] = true;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('pic')) {
                $error = $this->upload->display_errors();
                //exit;

                $this->session->set_flashdata('execption', $error);
                redirect('admin/jobs/editjob');
            } else {
                //echo "aaa";
                //	exit;
                $data1 = $this->upload->data();
                $jobimage = $data1['file_name'];
            }

        }
        /*else{
       $jobimage = $this->input->post('pic');
    }*/

        $id = $this->input->post('job_id');
        $cat_id = $this->input->post('jobcat_id');
        $j_title = $this->input->post('jobtitle');

        $jobtitle2 = $this->input->post('jobtitle2');


        $j_slug = $this->input->post('jobslug');
        // $j_slug =  clean(strtolower($this->input->post('jobtitle')));
        //exit;
        // $j_title2 = $this->input->post('jobtitle2');
        $j_tags = "";//$this->input->post('jobtags');
        $country_id = $this->input->post('jobcountry');
        $state = $this->input->post('jobstate');
        $j_location = $this->input->post('jobcity');
        $j_image = $jobimage;
        $j_descr = $this->input->post('jobdescr');
        $j_company = $this->input->post('jobcompany');
        $user_id = $this->input->post('user_id');
//       echo $user_id;
//        exit();
        $j_email_apply = $this->input->post('jobemailapply');

        if ($j_title == "")
            $j_title = $jobtitle2;


        // $this->session->userdata('admin_login_id')
        $this->admin_job_model->updateJob(array('id' => $id,'job_reference_by'=>$user_id, 'cat_id' => $cat_id, 'j_title' => $j_title, 'j_slug' => $j_slug, 'j_tags' => $j_tags, 'country_id' => $country_id, 'j_state' => $state, 'j_location' => $j_location, 'j_image' => $j_image, 'j_descr' => $j_descr, 'j_company' => $j_company, 'j_email_apply' => $j_email_apply, 'j_addedby' => $this->session->userdata('user_id'), 'j_add_date' => time()));

        //  $this->session->set_userdata('current_url',current_url());
        redirect($this->session->userdata('current_url'));
        //redirect(base_url().'admin/jobs');

    }

    public function jobunpublishd($id)
    {
        $this->db->set('j_status', 0)->where('j_id', $id)->update('jb_jobs');
        $this->session->set_flashdata('message', "Unpublish successfully.");


        redirect($this->session->userdata('current_url'));
    }

    public function jobpublishd($id)
    {
        //echo "aaaaaaaaaaaaaaaaaaaaa";
        //exit;
        $this->db->set('j_status', 1)->where('j_id', $id)->update('jb_jobs');
        $this->session->set_flashdata('message', "Publish successfully.");
        redirect($this->session->userdata('current_url'));
        //redirect("admin/jobs");
    }

    public function deletejob($id)
    {

        $this->db->where('j_id', $id);
//        $this->db->delete($this->table_name)
        $this->db->delete('jb_jobs');
        redirect($this->session->userdata('current_url'));
        //redirect('admin/jobs');
        //return true;
    }

    function categories()
    {
        $data['forms'] = $this->admin_job_model->getCategories(array('status' => 1));
        
        $data['page_title'] = 'Categories';
        $data['content_view'] = 'admin/categories/sb-forms';
        $this->load->view('admin/sb-template', $data);

//        $this->load->view('admin/categories/forms', $data);
    }

    function add_categories(){
        $data['c_name'] = $this->input->post('name');

        if($this->admin_job_model->addCategory($data)){
            _setSuccess("Categories added successfully");
            redirect('admin/jobs/categories');
        }else{
            _setError("Error Adding Categories");
            redirect('admin/jobs/categories');
        }

    }
    
    function add_cat_form(){
        $data['page_title'] = 'Categories';
        $data['content_view'] = 'admin/categories/sb-showaddform';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('admin/categories/showaddform', $data);
    }

    function update_categories($id){
        $data['c_name'] = $this->input->post('name');

        if($this->admin_job_model->editCategory($data,$id)){
            _setSuccess("Categories added successfully");
            redirect('admin/jobs/categories');
        }else{
            _setError("Error Adding Categories");
            redirect('admin/jobs/categories');
        }

    }


    function ajaxDataManagementCategories()
    {
        $data = array();
        if ($this->input->post('actioncall') == "showaddform") {
            //$data['instructors'] = $this->admin_blog_model->getForms(array('status' => 1,'table' => 'instructors'));
            $this->load->view('admin/categories/showaddform', $data);
        } elseif ($this->input->post('actioncall') == "addform") {
            $options = array(


                'c_name' => mysql_real_escape_string(trim($this->input->post('name'))),
                'c_add_date' => time()

            );
            echo $this->admin_job_model->addCategory($options);

        } elseif ($this->input->post('actioncall') == "listforms") {
            $data['forms'] = $this->admin_job_model->getCategories();
            $this->load->view('admin/categories/sb-listforms', $data);
        } elseif ($this->input->post('actioncall') == "showeditform") {
            $id = $this->input->post('id');

            $data['form'] = $this->admin_job_model->getCategories(array('c_id' => $id));
            $this->load->view('admin/categories/showeditform', $data);
        } elseif ($this->input->post('actioncall') == "editform") {
               $c_id = $this->input->post('id');
            $options = array(
                'name' => mysql_real_escape_string(trim($this->input->post('name')))

            );
            echo $page_id = $this->admin_job_model->editCategory($options,$c_id);
        } elseif ($this->input->post('actioncall') == "changeStatus") {
            $c_id = $this->input->post('id');
            $status_val = $this->input->post('status_val');
            $status = $this->admin_job_model->updateCategoryStatus($c_id, $status_val);
        } elseif ($this->input->post('actioncall') == "delform") {
            $id = $this->input->post('id');
            // $image_name = $this->admin_blog_model->getImageName($id);

            $course = $this->admin_job_model->delCategory(array('c_id' => $id));
        }


    }

    /*public function adminUploadJobImage()
            {
            $rand_str =  time();
            $config['upload_path']      = base_url().'assets/uploads/jobs/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']        = $rand_str;
            $this->load->library('upload', $config);

            $data = array('upload_data' => $this->upload->data());
            $file = $_FILES['jobfile'];
            $file_size = round($file['size']/1024);

           if ( ! $this->upload->do_upload('jobfile'))
                 {

                $error = array('error' => $this->upload->display_errors());
          print_r($error);
                 echo '{"msg":"invalid"}';
              }
          else if($file_size > $config['max_size'])
                {
              echo '{"msg":"error"}';
              }
          else
               {
              $data = array('upload_data' => $this->upload->data());
              $medium_thumb_image_path="./assets/uploads/jobs/small_thumbs/".$data['upload_data']['file_name'];
              copy("./assets/uploads/jobs/".$data['upload_data']['file_name'],$medium_thumb_image_path);
              resizeImg($medium_thumb_image_path, 100, 100);
              $options = array('');
               echo '{"name":"'.$data['upload_data']['file_name'].'","type":"'.$file['type'].'","size":"'.$file['size'].'"}';
            }
         }*/

    function ajaxDataManagementJobs()
    {
        if ($this->input->post('actioncall') == "showaddform") {

            $this->load->view('admin/jobs/showaddform', $data);
        } elseif ($this->input->post('actioncall') == "addform") {

            $options = array(
                'j_title' => mysql_real_escape_string(trim($this->input->post('title'))),
                'j_image' => mysql_real_escape_string(trim($this->input->post('jobimage'))),
                'cat_id' => mysql_real_escape_string(trim($this->input->post('cat_id'))),
                'j_descr' => $this->input->post('descr'),
                'j_add_date' => time()
            );
            echo $this->admin_job_model->addForm($options);
        } elseif ($this->input->post('actioncall') == "listforms") {

            /*	$data['forms'] = $this->admin_job_model->getForms();
                $this->load->view('admin/jobs/listforms', $data);*/


            $offset = 0;



            $page_id = $this->input->post('page_id');
            $limit = $this->input->post('limit');


            $data = array();
            if ($page_id != "")
                $offset = $limit * ($page_id - 1);
            else
                $offset = 0;
            echo $total = $this->admin_job_model->getTotalForms();
            //exit;
            $options = array('records' => $limit,
                'pages' => $this->pages,
                'page_no' => $page_id,
                'total' => $total);
            $paging = new paging_front($options);
            $paging_link = $paging->show_paging();
            $data['total_variables'] = $total;
            $data['limit_selected'] = $limit;
            //	$data['languages']   =  $this->admin_language_model->getLanguages();
            $data['forms'] = $this->admin_job_model->getForms(array('offset' => $offset, 'limit' => $limit));
            //$data['appointments'] = $this->admin_tasbeeh_model->getTasbeehReqs();

            $data['paging_link'] = $paging_link;

            $this->load->view('admin/jobs/listforms', $data);


        } elseif ($this->input->post('actioncall') == "showeditform") {
            $id = $this->input->post('id');
            $data['categories'] = $this->admin_job_model->getCategories(array('c_staus' => 1));
            $data['form'] = $this->admin_job_model->getForms(array('j_id' => $id));
            $this->load->view('admin/jobs/showeditform', $data);
        } elseif ($this->input->post('actioncall') == "editform") {
            $options = array(
                'j_id' => $this->input->post('id'),
                'title' => mysql_real_escape_string(trim($this->input->post('title'))),
                'j_image' => mysql_real_escape_string(trim($this->input->post('jobimage'))),
                'cat_id' => mysql_real_escape_string(trim($this->input->post('cat_id'))),
                'descr' => $this->input->post('descr'),
            );
            echo $page_id = $this->admin_job_model->editForm($options);
        } elseif ($this->input->post('actioncall') == "changeStatus") {
            $j_id = $this->input->post('j_id');
            $status_val = $this->input->post('status_val');
            $status = $this->admin_job_model->updateFormStatus($j_id, $status_val);
        } elseif ($this->input->post('actioncall') == "delform") {
            $id = $this->input->post('id');
            $jobs = $this->admin_job_model->delForm(array('j_id' => $id));
        }

    }


    function jobtitles()
    { 
        $data['forms'] = $this->admin_job_model->getJobTitles();
         
        $data['page_title'] = 'Job Titles';
        $data['content_view'] = 'admin/jobs/listjobtitles';
        $this->load->view('admin/sb-template', $data);
        
        
//        $this->load->view('admin/jobs/jobtitleform', $data);
    }
    
    
    function editjobtitle($id){
        
        $data['forms'] = $this->admin_job_model->getbyid($id);
        
        $data['page_title'] = 'Edit Job Titles';
        $data['content_view'] = 'admin/jobs/editjobtitleform';
        $this->load->view('admin/sb-template', $data);
        
    }
    
function updatejobtitle($id){
     $data['jt_title'] = $this->input->post('title');
     $data['jt_add_date'] = date("y-m-d");
     $this->admin_job_model->updatetitle($data,$id);
     redirect(base_url() . 'admin/jobs/jobtitles');
}

    function savejobtitle()
    {
        $title = $this->input->post('title');
        
        $this->admin_job_model->saveJobTitle(array('jt_title' => $title, 'jt_add_date' => date("y-m-d")));
        redirect(base_url() . 'admin/jobs/jobtitles');
    }

    function addjobtitle()
    {
        $data['page_title'] = 'Job Titles';
        $data['content_view'] = 'admin/jobs/jobtitleform';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('admin/jobs/jobtitleform', $data);
    }

    public function deletejobtitle($id)
    {
        //echo "dd".$id;
        //exit;
        $this->db->where('jt_id', $id);
        $this->db->delete($this->db->dbprefix('jobtitle'));
        redirect('admin/jobs/jobtitles');
        //return true;
    }

    public function unpublishd($id)
    {
        $this->db->set('jt_status', 0)->where('jt_id', $id)->update('jb_jobtitle');
        $this->session->set_flashdata('message', "Unpublish successfully.");
        redirect("admin/jobs/jobtitles");
    }

    public function publishd($id)
    {
        //	echo "aaaaaaaaaaaaaaaaaaaaa";
        //exit;projects
        $this->db->set('jt_status', 1)->where('jt_id', $id)->update('jb_jobtitle');
        $this->session->set_flashdata('message', "Publish successfully.");
        redirect("admin/jobs/jobtitles");
    }

    function settingdata()
    {

        $data['message'] = "Setting updated successfully";
        $config = $_REQUEST['delAnn2'];
        $size = sizeof($config);
        $x = 0;
        while ($x < $size) {
            $query = "UPDATE ka_config SET value='" . sql_safe($config[$x]) . "' where id='" . ($x + 1) . "'";
            mysql_query($query);
            echo mysql_error();
            $x++;
        } // end of while

        $this->load->view('admin/settings', $data);
    }


    function jobseekerstips()
    {
        

        $data['forms'] = $this->admin_job_model->getJobTips();
        
        $data['page_title'] = 'Job Seekers Tips';
        $data['content_view'] = 'admin/jobs/listjobseekerstips';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('admin/jobs/listjobseekerstips', $data);
    }


    function addjobseekerform()
    {
        $data['page_title'] = 'Job Seekers Tips';
        $data['content_view'] = 'admin/jobs/jobseekerform';
        $this->load->view('admin/sb-template', $data);
        
        $this->load->view('admin/jobs/jobseekerform', $data);
    }


    function savejobtips()
    {
        $title = $this->input->post('title');
        $descr = $this->input->post('descr');
        $this->admin_job_model->saveJobTips(array('st_title' => $title, 'st_descr' => $descr, 'st_add_date' => date("y-m-d")));
        redirect(base_url() . 'admin/jobs/jobseekerstips');
    }

    function editjobtips($id)
    {

        $data['form'] = $this->admin_job_model->getJobTips(array('id' => $id));
        $data['page_title'] = 'Job Seekers Tips';
        $data['content_view'] = 'admin/jobs/editjobseekerform';
        $this->load->view('admin/sb-template', $data);
        
//        $this->load->view('admin/jobs/editjobseekerform', $data);
    }

    public function deletejobseeker($id)
    {
        //echo "dd".$id;
        //exit;
        $this->db->where('st_id', $id);
        $this->db->delete($this->db->dbprefix('jobseekertips'));
        redirect('admin/jobs/jobseekerstips');
        //return true;
    }
    
    
    
    public function userList(){
  
    $postData = $this->input->post();
    $data = $this->admin_job_model->getMember($postData);

    echo json_encode($data);
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