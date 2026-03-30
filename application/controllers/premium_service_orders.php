<?php
defined('BASEPATH') or exit('No direct script access allowed');

class premium_service_orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        require_role(array(2));

        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('premium_service_orders_model');
    }

    // List Page
    public function index()
    {
        $data['orders'] = $this->premium_service_orders_model->get_orders();

        $data['content'] = 'premium_services/orders';
      $this->load->view('layouts/system/main_layout', $data);
    }

    // Detail Page
    public function view($id)
    {
        $order = $this->premium_service_orders_model->get_order($id);

        if (!$order) {
            show_404();
        }

        $items = $this->premium_service_orders_model->get_order_items($id);
        $meta = $this->premium_service_orders_model->get_order_meta($id);

        // group meta by service_id
        $grouped_meta = [];
        foreach ($meta as $m) {
            $grouped_meta[$m->service_id][] = $m;
        }

        $data = [
            'order' => $order,
            'items' => $items,
            'meta' => $grouped_meta
        ];

        $data['content'] = 'premium_services/order-view';
      $this->load->view('layouts/system/main_layout', $data);
    }

    // Status Update
    public function update_status($id = NULL)
    {
        // Mentor-only access
        require_role(array(2));

        // if ($id == NULL || !is_numeric($id)) {
        //     show_error('Invalid Request ID', 400);
        // }

        $status = $this->input->post('status');

        $this->premium_service_orders_model->update_status($id, $status);

        redirect('orders/view/' . $id);
    }

}