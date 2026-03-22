<?php
defined('BASEPATH') or exit('No direct script access allowed');

class premium_services_checkout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('premium_services_model');
    }

    public function index()
    {
        $cart = $this->session->userdata('cart');

        // Redirect if cart is empty or not set
        if (empty($cart)) {
            redirect('cart');
            return;
        }

        $services = array_column($cart, 'id');

        // Extra safety (in case something breaks)
        if (empty($services)) {
            redirect('cart');
            return;
        }

        $this->db->where_in('service_id', $services);
        $fields = $this->db->get('jb_premium_service_custom_fields')->result();

        // group fields by service_id
        $grouped = [];
        foreach ($fields as $f) {
            $grouped[$f->service_id][] = $f;
        }

        $data['cart'] = $cart;
        $data['custom_fields'] = $grouped;

        $data['content'] = 'premium_services/checkout';
        $this->load->view('layouts/website/website_layout', $data);
    }

    public function place_order()
    {
        $cart = $this->session->userdata('cart');

        if (!$cart) {
            redirect('cart'); // safety
        }

        // Form validation
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('checkout');
            return;
        }


        // Load custom fields from DB

        $custom_fields_db = [];
        foreach ($cart as $item) {
            $custom_fields_db[$item['id']] = $this->db
                ->where('service_id', $item['id'])
                ->get('jb_premium_service_custom_fields')
                ->result();
        }

        $fields_post = $this->input->post('fields'); // text, textarea, date
        $fields_to_save = [];

        // Handle file uploads in custom fields
        foreach ($cart as $item) {
            if (!empty($custom_fields_db[$item['id']])) {
                foreach ($custom_fields_db[$item['id']] as $field) {

                    // FILE FIELDS
                    if ($field->field_type === 'file') {
                        $input_name = 'files_' . $item['id'] . '_' . $field->field_name;

                        if (isset($_FILES[$input_name]) && $_FILES[$input_name]['name']) {
                            $file_info = $_FILES[$input_name];
                            $ext = pathinfo($file_info['name'], PATHINFO_EXTENSION);

                            if (strtolower($ext) !== 'pdf') {
                                $this->session->set_flashdata('error', 'File for "' . $field->field_label . '" must be a PDF.');
                                redirect('checkout');
                                return;
                            }

                            $filename = 'file_' . time() . '_' . bin2hex(random_bytes(5)) . '.pdf';

                            $config = [
                                'upload_path' => 'navassets/uploads/premium_service_docs/',
                                'allowed_types' => 'pdf',
                                'file_name' => $filename,
                                'overwrite' => FALSE,
                                'max_size' => 5120 // 5MB
                            ];

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            if (!$this->upload->do_upload($input_name)) {
                                $error_msg = $this->upload->display_errors('', '');
                                $this->session->set_flashdata('error', 'File upload failed for "' . $field->field_label . '": ' . $error_msg);
                                redirect('checkout');
                                return;
                            }

                            $upload_data = $this->upload->data();
                            $fields_to_save[$item['id']][$field->field_name] = $upload_data['file_name'];
                        }
                    }

                    // NON-FILE FIELDS
                    else {
                        if (isset($fields_post[$item['id']][$field->field_name])) {
                            $fields_to_save[$item['id']][$field->field_name] = $fields_post[$item['id']][$field->field_name];
                        }
                    }
                }
            }
        }

        // Calculate total
        $total = 0;
        foreach ($cart as $item) {
            $total += ($item['price'] * $item['qty']);
        }

        // Insert order
        $order = [
            'customer_name' => $this->input->post('name'),
            'customer_email' => $this->input->post('email'),
            'customer_phone' => $this->input->post('phone'),
            'total_amount' => $total,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('jb_premium_service_orders', $order);
        $order_id = $this->db->insert_id();

        // Insert order items + custom fields
        foreach ($cart as $item) {
            $this->db->insert('jb_premium_service_order_items', [
                'order_id' => $order_id,
                'service_id' => $item['id'],
                'service_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['qty'],
                'subtotal' => $item['price'] * $item['qty']
            ]);

            if (!empty($fields_to_save[$item['id']])) {
                foreach ($fields_to_save[$item['id']] as $key => $value) {
                    $this->db->insert('jb_premium_service_order_item_meta', [
                        'order_id' => $order_id,
                        'service_id' => $item['id'],
                        'field_name' => $key,
                        'field_value' => $value
                    ]);
                }
            }
        }

        // Clear cart
        $this->session->unset_userdata('cart');

        // Redirect to success page
        redirect('checkout/success/' . $order_id);
    }

    public function success($order_id)
    {
        // if no order_id, redirect
        if (!$order_id) {
            redirect('cart');
            return;
        }

        // Get order details
        $data['order'] = $this->db
            ->where('id', $order_id)
            ->get('jb_premium_service_orders')
            ->row();

        // Get order items
        $data['items'] = $this->db
            ->where('order_id', $order_id)
            ->get('jb_premium_service_order_items')
            ->result();

        $data['content'] = 'premium_services/checkout_success';
        $this->load->view('layouts/website/website_layout', $data);
    }

}