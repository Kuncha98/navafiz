<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feed extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('feed_model');
        $this->session_user_id = $this->session->userdata('user_id');
    }


    function index()
    {

        // LoginCheck(site_url('login'), current_url());        
        $user_id = $this->session->userdata('user_id');

        $data['data'] = "";
        $this->load->view('feed/index', $data);
    }

    function user($user_id)
    {
        LoginCheck(site_url('login'), current_url());

        $data['request_user_id'] = $user_id;
        $this->load->view('feed/user-feed', $data);
    }

    // function notinuse_loadfeed($page=1){
    //     $page = intval($page);
    //     $user_id = $this->get_post('user_id',0);
    //     $job_title = $this->get_post('job_title',0);
    //     LoginCheck(site_url('login'), current_url());        

    //     $limit = 20;
    //     if($page>1){
    //         $start = $page*$limit;
    //     }else{
    //         $start = 0;
    //     }

    //     $where['del_status'] = 1;
    //     if($user_id>0){
    //         $where['user_id'] = $user_id;        
    //     }

    //     $feed_list = $this->feed_model->SearchByLimit($where, $limit,$start);        
    //     $data['feed_list'] = $feed_list;
    //     $data['page_id'] = $page;
    //     $this->load->view('feed/feed-list', $data);
    // }

    function loadfeed($page = 1)
    {
        $page = intval($page);
        $user_id = $this->get_post('user_id', 0);
        $job_title = $this->get_post('job_title', ''); // Get the job title from the request

        $limit = 20;
        $start = ($page > 1) ? ($page - 1) * $limit : 0;

        $where['del_status'] = 1;
        $where['approval_status'] = 1;
        if ($user_id > 0) {
            $where['user_id'] = $user_id;
        }

        // Add filtering for job title if provided
        if (!empty($job_title) && $job_title !== 'All') {
            $where['feed_text LIKE'] = "%" . $job_title . "%";
        }

        // Fetching feed list based on the conditions
        $feed_list = $this->feed_model->SearchByLimit($where, $limit, $start);

        // Passing data to the view
        $data['feed_list'] = $feed_list;
        $data['page_id'] = $page;
        $this->load->view('feed/feed-list', $data);
    }


    function post()
    {
        LoginCheck(site_url('login'), current_url());

        if (isset($_FILES['feed_image']['name'])) {

            $config = array('upload_path' => feed_upload_path . 'temp', 'allowed_types' => 'gif|jpg|png|jpeg', 'file_name' => 'feed-' . rand(0, 99999), 'overwrite' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('feed_image')) {
                $udata = array('upload_data' => $this->upload->data());
                $file_name = $udata['upload_data']['file_name'];

                $full_image_path = './' . feed_upload_path . $file_name;
                copy('./' . feed_upload_path . "temp/" . $file_name, $full_image_path);
                resizeImg($full_image_path, 800, 800);
            } else {
                //$error = array('error' => $this->upload->display_errors());
                //echo "<pre>"; print_r($error); echo "</pre>";exit;
                $file_name = '';
            }
        } else {
            $file_name = '';
        }
        $feed_text = $this->get_post('feed_text');
        if (!empty($feed_text) || !empty($file_name)) {
            $data['feed_text'] = $feed_text;
            $data['feed_image'] = $file_name;
            $data['user_id'] = $this->session_user_id;
            $data['added_on'] = datenow();
            if ($this->session->userdata('role_id') == 2) { // mentor role
                $data['approval_status'] = 1;
            } else {
                $data['approval_status'] = 0;
            }

            if ($this->feed_model->Save($data)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function sharepost($id)
    {

        LoginCheck(site_url('login'), current_url());
        //          $id = $this->input->get_post('feed_id');
//          print_r($id);
//          exit();

        $feed_id = intval($id);
        $post = $this->feed_model->GetById($feed_id);
        $feed_text = $post->feed_text;
        $file_name = $post->feed_image;
        $user_id = $this->session_user_id;
        if (empty($file_name)) {
            $file_name = '';
        }

        if (!empty($feed_text) || !empty($file_name)) {
            $data['feed_text'] = $feed_text;
            $data['feed_image'] = $file_name;
            $data['user_id'] = $this->session_user_id;
            $data['added_on'] = datenow();

            if ($this->feed_model->Save($data)) {
                return true;
            } else {
                return false;
            }
        }

    }

    function view($feed_id)
    {
        // LoginCheck(site_url('login'), current_url());        
        $feed_id = intval($feed_id);

        $post = $this->feed_model->GetById($feed_id);

        $this->db->query('update ' . FEED_TABLE . ' set feed_views=feed_views+1 where feed_id=' . $feed_id);

        $page_metas = array(
            'title' => $post->feed_text,
            'description' => $post->feed_text,
            'og_img' => site_url('assets/uploads/jobs/New_Jo10.JPG'),
            'og_url' => 'feed/view/' . $feed_id,
        );

        $data['page_meta'] = $page_metas;

        $data['post'] = $post;
        $data['feed_id'] = $feed_id;
        $this->load->view('feed/view', $data);
    }

    function delete($feed_id)
    {
        LoginCheck(site_url('login'), current_url());
        $feed_id = intval($feed_id);

        $post = $this->feed_model->Delete($feed_id);
        _setSuccess("Your request completed successfully");
        redirect(site_url('feed'));
    }

    // Fetch pending posts only for mentor
    function pending_feed_posts()
    {
        LoginCheck(site_url('login'), current_url());

        // Only mentor allowed
        if ($this->session->userdata('role_id') != 2) {
            show_error('Unauthorized access');
        }

        $data['feeds'] = $this->feed_model->get_pending_feeds();
        $data['pending_count'] = count($data['feeds']);

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'feed/pending-feeds'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }

    // Approving posts by mentor
    function approve_post($feed_id)
    {
        LoginCheck(site_url('login'), current_url());

        if ($this->session->userdata('role_id') != 2) {
            show_error('Unauthorized');
        }

        $feed = $this->feed_model->GetById($feed_id);

        $data = array(
            'approval_status' => 1,
            'updated_on' => datenow(),
            'updated_by' => $this->session_user_id
        );

        $this->feed_model->Save($data, $feed_id);

        // reward points
        if ($feed->user_role != 2) // prevent mentor reward
        {
            $reward = [
                'user_id' => $feed->user_id,
                'feed_id' => $feed_id,
                'points' => 10,
                'action_type' => 'approved',
                'created_at' => datenow(),
                'created_by' => $this->session_user_id
            ];

            $this->feed_model->add_reward_points($reward);
        }


        redirect('feed/pending');
    }

    // Rejecting posts by mentor
    function reject_post($feed_id)
    {
        LoginCheck(site_url('login'), current_url());

        if ($this->session->userdata('role_id') != 2) {
            show_error('Unauthorized');
        }

        $feed = $this->feed_model->GetById($feed_id);

        $data = array(
            'approval_status' => 2,
            'updated_on' => datenow(),
            'updated_by' => $this->session_user_id
        );

        $this->feed_model->Save($data, $feed_id);

        // remove reward points
        $reward = [
            'user_id' => $feed->user_id,
            'feed_id' => $feed_id,
            'points' => -10,
            'action_type' => 'rejected',
            'created_at' => datenow(),
            'created_by' => $this->session_user_id
        ];

        $this->feed_model->add_reward_points($reward);

        redirect('feed/pending');
    }

}


/* End of file front.php */
/* Location: ./application/controllers/front.php */