<?php
defined('BASEPATH') or exit('No direct script access allowed');

class premium_services extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('premium_services_model');
    }

    // Fetch all the service
    public function index()
    {
        $services = $this->premium_services_model->get_services();

        // Group services by category
        $grouped_services = [];
        foreach ($services as $service) {
            $grouped_services[$service->category_id]['category_name'] = $service->category_name;
            $grouped_services[$service->category_id]['services'][] = $service;
        }

        $data['grouped_services'] = $grouped_services;
        $data['content'] = 'premium_services/list';
        $this->load->view('layouts/website/website_layout', $data);
    }

}