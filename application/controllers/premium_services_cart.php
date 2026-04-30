<?php
defined('BASEPATH') or exit('No direct script access allowed');

class premium_services_cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('premium_services_model');
        $this->load->model('premium_service_orders_model');
    }

    // public function index()
    // {
    //     $data['cart'] = $this->session->userdata('cart');

    //     $data['content'] = 'premium_services/cart';
    //     $this->load->view('layouts/website/website_layout', $data);
    // }

    public function index()
    {
        $data['cart'] = $this->session->userdata('cart');

        $total = 0;

        if (!empty($data['cart'])) {
            foreach ($data['cart'] as $item) {
                $total += $item['price'] * $item['qty'];
            }
        }

        $user_id = $this->session->userdata('user_id');

        $data['pricing'] = $this->premium_service_orders_model->get_member_discount($user_id, $total);

        $data['content'] = 'premium_services/cart';
        $this->load->view('layouts/website/website_layout', $data);
    }

    public function add()
    {
        $id = $this->input->post('service_id');

        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Missing service ID'
            ]);
            return;
        }

        $service = $this->premium_services_model->get_service($id);

        if (!$service) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Service not found'
            ]);
            return;
        }

        $cart = $this->session->userdata('cart') ?? [];

        if (isset($cart[$id])) {
            // Only increase if allowed
            if ($service->allow_quantity) {
                $cart[$id]['qty'] += 1;
            }
        } else {
            $cart[$id] = [
                'id' => $service->id,
                'name' => $service->name,
                'price' => $service->price,
                'qty' => 1,
                'allow_quantity' => $service->allow_quantity ?? 0
            ];
        }

        $this->session->set_userdata('cart', $cart);

        // Return cart array for JS
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'cart' => $cart
        ]);
    }

    public function remove($id)
    {
        $cart = $this->session->userdata('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        $this->session->set_userdata('cart', $cart);

        redirect('cart');
    }

    public function update()
    {
        $cart = $this->session->userdata('cart');

        foreach ($_POST['qty'] as $id => $qty) {
            if (isset($cart[$id])) {
                $cart[$id]['qty'] = max(1, (int) $qty);
            }
        }

        $this->session->set_userdata('cart', $cart);

        redirect('cart');
    }

}