<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
//        AdminLoginCheck();
    }

    public function index(){

        $data['page_title'] = 'Dashboard';
        $data['content_view'] = 'admin/sb-dashboard';
        $this->load->view('admin/sb-template', $data);
        //$this->load->view('admin/template', $data);
    }

}


