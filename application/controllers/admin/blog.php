<?php

class Blog extends MY_Controller
{
    var $pages = 5;

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_blog_model');
        $this->load->library('paging_front');
    }


    function index()
    {
        $data = "";
        // $data['forms'] = $this->admin_course_model->getForms(array('status' => 1));
        $this->load->view('admin/blogs/forms', $data);
    }

    function ajaxDataManagementBlogs()
    {
        $data = "";
        if ($this->input->post('actioncall') == "showaddform") {
            $data['categories'] = $this->admin_blog_model->getBlogCForms(array('status' => 1));
            $this->load->view('admin/blogs/showaddform', $data);
        } elseif ($this->input->post('actioncall') == "addform") {

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
            echo $this->admin_blog_model->addForm($options);
        } elseif ($this->input->post('actioncall') == "listforms") {
            $data['forms'] = $this->admin_blog_model->getForms();
            $this->load->view('admin/blogs/listforms', $data);
        } elseif ($this->input->post('actioncall') == "showeditform") {
            $id = $this->input->post('id');
            $data['categories'] = $this->admin_blog_model->getBlogCForms(array('status' => 1));
            $data['form'] = $this->admin_blog_model->getForms(array('blog_id' => $id));
            $this->load->view('admin/blogs/showeditform', $data);
        } elseif ($this->input->post('actioncall') == "editform") {
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
            $data['sub'] = $this->admin_blog_model->delBlogTags(array('blog_id' => $this->input->post('id')));
            //$options['blog_tags'] = $this->admin_blog_model->getBlogTags(array('blog_id' => $this->input->post('id')));


            echo $page_id = $this->admin_blog_model->editForm($options);
        } elseif ($this->input->post('actioncall') == "changeStatus") {
            $blog_id = $this->input->post('id');
            $status_val = $this->input->post('status_val');
            $status = $this->admin_blog_model->updateFormStatus($blog_id, $status_val);
        } elseif ($this->input->post('actioncall') == "delselectedblogs") {
            $s_id = $this->input->post('ids');
            $ids_arr = explode(",", $s_id);
            for ($a = 0; $a < sizeof($ids_arr); $a++) {
                $image_name = $this->admin_blog_model->getImageName($ids_arr[$a]);
                if ($image_name != "empty") {
                    $file_path = FCPATH . '/assets/uploads/blogs/' . $image_name;
                    $file_path1 = FCPATH . '/assets/uploads/blogs/small_thumbs/' . $image_name;
                    if (is_file($file_path)) {
                        @unlink($file_path);
                    }
                    if (is_file($file_path1)) {
                        @unlink($file_path1);
                    }
                }


                $data['sub'] = $this->admin_blog_model->delForm(array('blog_id' => $ids_arr[$a]));
            }


        } elseif ($this->input->post('actioncall') == "delform") {
            $id = $this->input->post('id');
            $image_name = $this->admin_blog_model->getImageName($id);
            if ($image_name != "empty") {
                $file_path = FCPATH . '/assets/uploads/blogs/' . $image_name;
                $file_path1 = FCPATH . '/assets/uploads/blogs/small_thumbs/' . $image_name;
                if (is_file($file_path)) {
                    @unlink($file_path);
                }
                if (is_file($file_path1)) {
                    @unlink($file_path1);
                }
            }
            $course = $this->admin_blog_model->delForm(array('blog_id' => $id));
        }

    }

    function uploadBlog()
    {

        $rand_str = time();
        $config['upload_path'] = './assets/uploads/blogs/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['file_name'] = $rand_str;
        $this->load->library('upload', $config);

        $data = array('upload_data' => $this->upload->data());
        $file = $_FILES['blogfile'];
        $file_size = round($file['size'] / 1024);

        if (!$this->upload->do_upload('blogfile')) {

            $error = array('error' => $this->upload->display_errors());
            // print_r($error);
            echo '{"msg":"invalid"}';
        } else if ($file_size > $config['max_size']) {
            echo '{"msg":"error"}';
        } else {
            $data = array('upload_data' => $this->upload->data());
            $medium_thumb_image_path = "./assets/uploads/blogs/small_thumbs/" . $data['upload_data']['file_name'];
            copy("./assets/uploads/blogs/" . $data['upload_data']['file_name'], $medium_thumb_image_path);
            resizeImg($medium_thumb_image_path, 300, 200);
            $options = array('');
            echo '{"name":"' . $data['upload_data']['file_name'] . '","type":"' . $file['type'] . '","size":"' . $file['size'] . '"}';
        }
    }


    function bcategories()
    {
        $data = "";
        $data['forms'] = $this->admin_blog_model->getBlogCForms(array('status' => 1));
        $this->load->view('admin/blogcategories/forms', $data);
    }

    function ajaxDataManagementBCategories()
    {
        $data = "";
        if ($this->input->post('actioncall') == "showaddform") {
            //$data['instructors'] = $this->admin_blog_model->getForms(array('status' => 1,'table' => 'instructors'));
            $this->load->view('admin/blogcategories/showaddform', $data);
        } elseif ($this->input->post('actioncall') == "addform") {
            $options = array(


                'blogc_title' => mysql_real_escape_string(trim($this->input->post('name')))

            );
            echo $this->admin_blog_model->addBlogCForm($options);
        } elseif ($this->input->post('actioncall') == "listforms") {
            $data['forms'] = $this->admin_blog_model->getBlogCForms();
            $this->load->view('admin/blogcategories/listforms', $data);
        } elseif ($this->input->post('actioncall') == "showeditform") {
            $id = $this->input->post('id');

            $data['form'] = $this->admin_blog_model->getBlogCForms(array('blogc_id' => $id));
            $this->load->view('admin/blogcategories/showeditform', $data);
        } elseif ($this->input->post('actioncall') == "editform") {

            $options = array(
                'blogc_id' => $this->input->post('id'),
                'name' => mysql_real_escape_string(trim($this->input->post('name')))

            );
            echo $page_id = $this->admin_blog_model->editBlogCForm($options);
        } elseif ($this->input->post('actioncall') == "changeStatus") {
            $blogc_id = $this->input->post('id');
            $status_val = $this->input->post('status_val');
            $status = $this->admin_blog_model->updateBlogCFormStatus($blogc_id, $status_val);
        } elseif ($this->input->post('actioncall') == "delform") {
            $id = $this->input->post('id');
            // $image_name = $this->admin_blog_model->getImageName($id);

            $course = $this->admin_blog_model->delBlogCForm(array('blogc_id' => $id));
        }

    }


}