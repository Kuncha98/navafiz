<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manpower_supply_requests extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('manpower_supply_requests_model');
        $this->load->model('profile_model');
    }

    public function submit()
    {
        // Form validation
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('country_of_operation', 'Country of Operation', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('company_registration_number', 'Company Registration Number', 'required');
        $this->form_validation->set_rules('year_established', 'Year Established', 'required|integer');
        $this->form_validation->set_rules('company_type', 'Company Type', 'required');

        $this->form_validation->set_rules('recruitment_license_number', 'Recruitment License Number', 'required');
        $this->form_validation->set_rules('license_issuing_authority', 'License Issuing Authority', 'required');
        $this->form_validation->set_rules('license_expiry_date', 'License Expiry Date', 'required');

        $this->form_validation->set_rules('contact_person_name', 'Contact Person Name', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('office_address', 'Office Address', 'required');

        $this->form_validation->set_rules('supply_countries[]', 'Supply Countries', 'required');
        $this->form_validation->set_rules('source_countries[]', 'Source Countries', 'required');
        $this->form_validation->set_rules('manpower_categories[]', 'Manpower Categories', 'required');
        $this->form_validation->set_rules('industries_served[]', 'Industries Served', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', validation_errors());
            redirect('services/supply-manpower');
            return;

        } else {

            /* Upload Files */

            $license_upload = !empty($_FILES['recruitment_license_file']['name'])
                ? $this->_upload_file('recruitment_license_file', 'license_', ['pdf', 'jpg', 'jpeg', 'png'], 'navassets/uploads/recruitment_license/')
                : null;

            $certificate_upload = !empty($_FILES['company_registration_certificate']['name'])
                ? $this->_upload_file('company_registration_certificate', 'certificate_', ['pdf', 'jpg', 'jpeg', 'png'], 'navassets/uploads/company_certificate/')
                : null;

            $testing_center_photos = $this->_upload_multiple_files(
                'testing_center_photos',
                'testing_',
                ['jpg', 'jpeg', 'png'],
                'navassets/uploads/testing_center/'
            );

            /* Multi select fields */

            $supply_countries = $this->input->post('supply_countries');
            $source_countries = $this->input->post('source_countries');
            $manpower_categories = $this->input->post('manpower_categories');
            $industries_served = $this->input->post('industries_served');

            /* Prepare data */

            $data = array(

                'company_name' => $this->input->post('company_name', TRUE),
                'country_of_operation' => $this->input->post('country_of_operation', TRUE),
                'city' => $this->input->post('city', TRUE),
                'company_registration_number' => $this->input->post('company_registration_number', TRUE),
                'year_established' => $this->input->post('year_established', TRUE),
                'company_type' => $this->input->post('company_type', TRUE),

                'recruitment_license_number' => $this->input->post('recruitment_license_number', TRUE),
                'license_issuing_authority' => $this->input->post('license_issuing_authority', TRUE),
                'license_expiry_date' => $this->input->post('license_expiry_date', TRUE),

                'recruitment_license_file' => $license_upload ? $license_upload['file_name'] : null,
                'company_registration_certificate' => $certificate_upload ? $certificate_upload['file_name'] : null,
                'tax_registration_number' => $this->input->post('tax_registration_number', TRUE),

                'contact_person_name' => $this->input->post('contact_person_name', TRUE),
                'designation' => $this->input->post('designation', TRUE),
                'mobile_number' => $this->input->post('mobile_number', TRUE),
                'whatsapp_number' => $this->input->post('whatsapp_number', TRUE),
                'email' => $this->input->post('email', TRUE),
                'office_address' => $this->input->post('office_address', TRUE),

                'supply_countries' => implode(',', $supply_countries),
                'source_countries' => implode(',', $source_countries),
                'manpower_categories' => implode(',', $manpower_categories),

                'trade_testing_center' => $this->input->post('trade_testing_center') ? 1 : 0,
                'testing_center_photos' => $testing_center_photos,

                'testing_categories_available' => $this->input->post('testing_categories_available', TRUE),
                'industries_served' => implode(',', $industries_served),

                'company_website' => $this->input->post('company_website', TRUE),
                'linkedin_page' => $this->input->post('linkedin_page', TRUE),
                'facebook_page' => $this->input->post('facebook_page', TRUE),

                'created_at' => date('Y-m-d H:i:s'),
                'status' => 1
            );

            /* Insert into DB */

            if (!$this->db->insert('jb_manpower_supply_requests', $data)) {

                $db_error = $this->db->_error_message();
                log_message('error', 'Manpower supply insert failed: ' . $db_error);

                $this->session->set_flashdata('error', 'Something went wrong while saving your data.');
                redirect('services/supply-manpower');
                return;
            }

            $this->session->set_flashdata('success', 'Your manpower supply registration has been submitted successfully.');
            redirect('services/supply-manpower');
        }
    }

    private function _upload_file($field_name, $prefix, $allowed_types, $upload_path)
    {
        if (empty($_FILES[$field_name]['name']))
            return null;

        $ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);

        if (!in_array(strtolower($ext), $allowed_types)) {
            $this->session->set_flashdata('error', ucfirst($field_name) . ' must be ' . implode(', ', $allowed_types));
            redirect('services/supply-manpower');
            exit;
        }

        $filename = $prefix . time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;

        $config = [
            'upload_path' => $upload_path,
            'allowed_types' => implode('|', $allowed_types),
            'file_name' => $filename,
            'overwrite' => FALSE,
            'max_size' => 5120
        ];

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field_name)) {

            $error_msg = $this->upload->display_errors('', '');

            $this->session->set_flashdata('error', ucfirst($field_name) . ' upload failed: ' . $error_msg);
            redirect('services/supply-manpower');
            exit;
        }

        return $this->upload->data();
    }

    private function _upload_multiple_files($field_name, $prefix, $allowed_types, $upload_path)
    {
        if (empty($_FILES[$field_name]['name'][0])) {
            return null;
        }

        $files = $_FILES[$field_name];
        $uploaded_files = [];

        foreach ($files['name'] as $key => $name) {

            if ($name == '')
                continue;

            $_FILES['temp_file']['name'] = $files['name'][$key];
            $_FILES['temp_file']['type'] = $files['type'][$key];
            $_FILES['temp_file']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['temp_file']['error'] = $files['error'][$key];
            $_FILES['temp_file']['size'] = $files['size'][$key];

            $ext = pathinfo($name, PATHINFO_EXTENSION);

            if (!in_array(strtolower($ext), $allowed_types)) {
                continue;
            }

            $filename = $prefix . time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;

            $config = [
                'upload_path' => $upload_path,
                'allowed_types' => implode('|', $allowed_types),
                'file_name' => $filename,
                'overwrite' => FALSE,
                'max_size' => 5120
            ];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('temp_file')) {
                $uploaded_files[] = $filename;
            }
        }

        return !empty($uploaded_files) ? implode(',', $uploaded_files) : null;
    }

    // Fetch all the form requests
    public function all_requests($page = 0)
    {
        require_role(array(2)); // 2 = Mentor

        $config = array();
        $config["base_url"] = site_url('manpower-supply-request-list');
        $config["total_rows"] = $this->manpower_supply_requests_model->get_total_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $data["records"] = $this->manpower_supply_requests_model->get_all($config["per_page"], $page);
        $data["pagination"] = $this->pagination->create_links();

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/manpower_supply_requests'; // content view
       $this->load->view('layouts/system/main_layout', $data);
    }

    // Fetch single record using IDs
    public function manpower_supply_request_view($id = NULL)
    {
        require_role(array(2)); // 2 = Mentor

        if ($id == NULL || !is_numeric($id)) {
            show_404();
        }

        $record = $this->manpower_supply_requests_model->get_by_id($id);

        if (!$record) {
            show_404();
        }

        $data["record"] = $record;

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/manpower_supply_request_view'; // content view
       $this->load->view('layouts/system/main_layout', $data);
    }

    // Update status
    public function change_request_status($id = NULL)
    {
        // Mentor-only access
        require_role(array(2));

        if ($id == NULL || !is_numeric($id)) {
            show_error('Invalid Request ID', 400);
            return;
        }

        $status = $this->input->post('status');

        // Validate status
        $valid_statuses = [1, 2, 3];
        if (!in_array($status, $valid_statuses)) {
            show_error('Invalid Status', 400);
            return;
        }

        // Fetch current status and job seeker details
        $request = $this->manpower_supply_requests_model->get_by_id($id);
        if (!$request) {
            show_error('Request not found', 404);
            return;
        }

        // Prevent any change if already approved
        if ($request->status == 2) {
            $this->session->set_flashdata('error', 'Approved request cannot be modified.');
            redirect('form-requests/manpower-supply-request-list');
            return;
        }

        // Prevent reverting Rejected → Submit
        if ($request->status == 3 && $status == 1) {
            $this->session->set_flashdata('error', 'Cannot revert a Rejected request back to Submit.');
            redirect('form-requests/manpower-supply-request-list');
            return;
        }

        // Update status
        $updated = $this->manpower_supply_requests_model->update_status($id, $status);

        if ($updated) {
            // If approved, create the user account
            if ($status == 2) {
                // Create user from job seeker request data
                $this->create_user_from_manpower_supplier_request($request);
                $this->session->set_flashdata('success', 'User registered for the manpower supplier successfully.');
            }

            $this->session->set_flashdata('success', 'Status updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update status.');
        }

        redirect('form-requests/manpower-supply-request-list'); // back to list
    }

    private function create_user_from_manpower_supplier_request($request)
    {
        // Auto-generate a random 8-character password (letters + digits)
        function generate_simple_password($length = 8)
        {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $chars[random_int(0, strlen($chars) - 1)];
            }
            return $password;
        }

        $password = generate_simple_password();

        // Prepare user data for insertion
        $user_data = [
            'm_name' => $request->contact_person_name,
            'm_email' => $request->email,
            'm_password' => $password, // Hash the password before saving
            'role_id' => 9, // User role ID for manpower suppliers
            'added_on' => datenow(),
            'm_status' => 1, // Activate immediately
            'm_avatar' => '',
            'video_cv' => ''
        ];

        $find_user = $this->profile_model->Search(['m_email' => $request->email]);
        if (count($find_user) < 1) {
            // Insert the user into the 'user' table
            $user_id = $this->profile_model->Save($user_data);

            if ($user_id > 0) {
                // Send email with the login credentials
                $this->send_registration_email($request->email, $request->contact_person_name, $request->company_name, $password);
            } else {
                _setError("Error while creating user account for manpower supplier.");
            }
        } else {
            _setError("You're already registered with the provided email. Please login or use forgot password.");
        }

    }

    private function send_registration_email($email, $contact_person_name, $company_name, $password)
    {
        // Prepare email subject and message
        $subject = 'Registration Successful – Login Credentials';

        $messageText = '
                        <html>

                        <body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

                            <p>Dear ' . $contact_person_name . ',</p>

                            <p>
                                We are pleased to inform you that your registration has been successfully completed
                                on behalf of <strong>' . $company_name . '</strong> (Manpower Supplier Company).
                            </p>

                            <p><strong>Your login credentials are as follows:</strong></p>

                            <p>
                                <strong>Email:</strong> ' . $email . '<br>
                                <strong>Password:</strong> ' . $password . '
                            </p>

                            <p>
                                You can access your account and manage your company profile using the link below:
                            </p>

                            <p>
                                <a href="https://navafiz.com/login" style="color: #1a73e8;">
                                   Navafiz Login
                                </a>
                            </p>

                            <p>
                                For security reasons, we strongly recommend that you change your password upon your first login.
                                You may do so using the following link:
                            </p>

                            <p>
                                <a href="https://navafiz.com/user/change_password" style="color: #1a73e8;">
                                    Navafiz Change Password
                                </a>
                            </p>

                            <p>
                                If you require any assistance, please feel free to contact our support team.
                            </p>

                            <p>Thank you,<br>
                                <strong>Navafiz Team</strong>
                            </p>

                            <hr style="border:none; border-top:1px solid #ddd;">

                            <p style="font-size: 12px; color: #777;">
                                This is an automated message. Please do not reply to this email.
                            </p>

                        </body>

                        </html>
                        ';

        // SMTP Configuration for sending email
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'localhost',
            'smtp_port' => 25,
            'smtp_user' => 'web.support@navafiz.com',
            'smtp_pass' => 'web.support123',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'crlf' => "\r\n"
        );

        // Load the email library and configure SMTP settings
        $this->load->library("email");

        $this->email->initialize($config);
        $this->email->clear(TRUE);
        $this->email->from('web.support@navafiz.com', 'Navafiz');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($messageText);

        // Send the email and log success or failure
        if (!$this->email->send()) {
            log_message('error', 'Email sending failed to ' . $email);
            _setError("There was a problem sending the registration email.");
        } else {
            log_message('info', 'Registration email sent to ' . $email);
            _setSuccess("Registration email sent successfully to $email.");
        }
    }
}