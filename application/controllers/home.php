<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->session_user_id = $this->user_id;
        // if($this->session_user_id>0){
        //     redirect(site_url('feed'));
        //     exit();
        // }
    }



    function index()
    {
        // Example: Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        // Randomly decide between old and new home views
        if (rand(0, 1)) {
            $this->load->view('feed/index');
        } else {
            $this->load->view('home/index-new');
        }
    }

    function new_index()
    {
        // Example: Check if user is logged in
        $user_id = $this->session->userdata('user_id');

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'home/index-2026'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }

    function draftPage()
    {
        // Example: Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        $this->load->view('home/draft/index');
    }

    function feature_counts()
    {
        // Example: Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        // Randomly decide between old and new home views
        if (!empty($user_id)) {
            $this->load->view('feed/feature_counts');
        } else {
            return redirect('login');
        }
    }

    function freelance()
    {
        // Example: Check if user is logged in
        $user_id = $this->session->userdata('user_id');

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'services/freelance'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }

    function hire_talent()
    {
        // Example: Check if user is logged in
        $user_id = $this->session->userdata('user_id');

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'services/hire_talent'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }

    function mentor()
    {
        // Example: Check if user is logged in
        $user_id = $this->session->userdata('user_id');

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'services/mentor'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }

    function find_job()
    {
        // Example: Check if user is logged in
        $user_id = $this->session->userdata('user_id');

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'services/find_job'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }

}