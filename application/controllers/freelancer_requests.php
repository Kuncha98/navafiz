<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class freelancer_requests extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('freelancer_requests_model');
        $this->load->model('profile_model');
    }

    public function check_email_exists()
    {
        $email = $this->input->post('email', TRUE);

        if ($this->freelancer_requests_model->email_exists($email)) {
            echo json_encode(['exists' => true, 'message' => 'Request has been already submitted using this email.']);
        } else {
            echo json_encode(['exists' => false]);
        }
    }

    public function submit()
    {
        // Form validation
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('professional_title', 'Professional Title', 'required');
        $this->form_validation->set_rules('current_location', 'Current Location', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('experience', 'Total Experience', 'required|integer');
        $this->form_validation->set_rules('work_type', 'Work Type', 'required');
        $this->form_validation->set_rules('availability_type', 'Availability Type', 'required');
        $this->form_validation->set_rules('rate_type', 'Rate Type', 'required');
        $this->form_validation->set_rules('rate_amount', 'Rate Amount', 'required');
        $this->form_validation->set_rules('currency', 'Currency', 'required');
        $this->form_validation->set_rules('brief', 'Brief About You', 'required');
        $this->form_validation->set_rules('cv', 'CV', 'callback_file_check');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->session->set_flashdata('error', validation_errors());
            redirect('services/become-a-freelancer');
            return;
        } else {

            // Upload CV
            $cv_filename = null;

            if (!empty($_FILES['cv']['name'])) {
                // Get the original extension
                $ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);

                // Only allow PDF
                if (strtolower($ext) !== 'pdf') {
                    $this->session->set_flashdata('error', 'CV must be a PDF file.');
                    redirect('services/become-a-freelancer');
                    return;
                }

                // Unique filename with timestamp + random string
                $cv_filename = 'cv_' . time() . '_' . bin2hex(random_bytes(5)) . '.pdf';
                $config = array(
                    'upload_path' => 'navassets/uploads/cv/',
                    'allowed_types' => 'pdf',
                    'file_name' => $cv_filename,
                    'overwrite' => FALSE,
                    'max_size' => 5120 // 5MB
                );

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('cv')) {
                    $error_msg = $this->upload->display_errors('', '');
                    log_message('error', 'CV upload failed: ' . $error_msg); // Optional logging
                    $this->session->set_flashdata('error', 'CV upload failed: ' . $error_msg);
                    redirect('services/become-a-freelancer');
                    return;
                }

                // Uploaded file info
                $upload_data = $this->upload->data();
                $cv_filename = $upload_data['file_name'];
            }

            // Set skills
            $skills = $this->input->post('skills');
            $skills_string = is_array($skills) ? implode(',', $skills) : '';

            // Prepare data
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'professional_title' => $this->input->post('professional_title', TRUE),
                'current_location' => $this->input->post('current_location', TRUE),
                'mobile' => $this->input->post('mobile', TRUE),
                'email' => $this->input->post('email', TRUE),
                'experience' => $this->input->post('experience', TRUE),
                'skills' => $skills_string,
                'portfolio' => $this->input->post('portfolio', TRUE),
                'work_type' => $this->input->post('work_type', TRUE),
                'availability_type' => $this->input->post('availability_type', TRUE),
                'rate_type' => $this->input->post('rate_type', TRUE),
                'rate_amount' => $this->input->post('rate_amount', TRUE),
                'currency' => $this->input->post('currency', TRUE),
                'cv' => $cv_filename,
                'brief' => $this->input->post('brief', TRUE)
            );

            // Insert into DB
            if (!$this->db->insert('jb_freelancer_requests', $data)) {
                $db_error = $this->db->_error_message();
                log_message('error', 'Freelancer insert failed: ' . $db_error);
                $this->session->set_flashdata('error', 'Something went wrong while saving your data. Please try again.');
                redirect('services/become-a-freelancer');
                return;
            }

            // Success message
            $this->session->set_flashdata('success', 'Your application has been submitted successfully.');
            redirect('services/become-a-freelancer');
        }
    }

    // CV validation callback
    public function file_check()
    {
        if (isset($_FILES['cv']) && $_FILES['cv']['name'] != '') {
            $ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
            if ($ext != 'pdf') {
                $this->form_validation->set_message('file_check', 'The CV must be a PDF file.');
                return FALSE;
            }
            return TRUE;
        }
        return TRUE; // allow empty for optional
    }

    // Fetch all the form requests
    public function all_requests()
    {
        require_role(array(2)); // 2 = Mentor

        $config = init_pagination(
            'form-requests/freelancer-request-list',
            $this->freelancer_requests_model->get_total_count(),
            20,
            3
        );

        $data["records"] = $this->freelancer_requests_model->get_all(
            $config["per_page"],
            $this->uri->segment(3)
        );

        $data["pagination"] = $this->pagination->create_links();

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/freelancer_requests'; // content view
        $this->load->view('layouts/system/main_layout', $data);
    }

    // Fetch single record using IDs
    public function freelancer_request_view($id = NULL)
    {
        require_role(array(2)); // 2 = Mentor

        if ($id == NULL || !is_numeric($id)) {
            show_404();
        }

        $record = $this->freelancer_requests_model->get_by_id($id);

        if (!$record) {
            show_404();
        }

        // Get next & prev
        $next = $this->freelancer_requests_model->get_next($id);
        $prev = $this->freelancer_requests_model->get_prev($id);

        // Total records
        $total = $this->freelancer_requests_model->get_total_count();

        // Current position
        $current_position = $this->freelancer_requests_model->get_position($id);

        $data['next_id'] = $next ? $next->id : null;
        $data['prev_id'] = $prev ? $prev->id : null;

        $data['total_records'] = $total;
        $data['current_position'] = $current_position;

        $data["record"] = $record;

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/freelancer_request_view'; // content view
        $this->load->view('layouts/system/main_layout', $data);
    }

    // Update status
    public function change_request_status($id = NULL)
    {
        // Mentor-only access
        require_role(array(2));

        if ($id == NULL || !is_numeric($id)) {
            echo json_encode(['success' => false, 'message' => 'Invalid ID']);
            return;
        }

        $status = $this->input->post('status');
        // Validate status
        $valid_statuses = [1, 2, 3];

        if (!in_array($status, $valid_statuses)) {
            echo json_encode(['success' => false, 'message' => 'Invalid status']);
            return;
        }

        // Fetch current status and job seeker details
        $request = $this->freelancer_requests_model->get_by_id($id);

        if (!$request) {
            echo json_encode(['success' => false, 'message' => 'Request not found']);
            return;
        }

        if ($request->status == 2) {
            echo json_encode(['success' => false, 'message' => 'Already approved']);
            return;
        }

        if ($request->status == 3 && $status == 1) {
            echo json_encode(['success' => false, 'message' => 'Cannot revert rejected']);
            return;
        }

        // Status approve
        if ($status == 2) {

            $result = $this->create_user_from_freelancer_request($request);

            // User exists
            if (isset($result['status']) && $result['status'] === 'exists') {
                echo json_encode([
                    'success' => false,
                    'message' => "You're already registered with the provided email. Navafiz profile is " . $result['navafiz_profile_link']
                ]);
                return;
            }

            if ($result === false) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Error while creating user account.'
                ]);
                return;
            }

            $password = $result['password'];
            $email_failed = $result['email_failed'];
            $navafiz_profile_link = $result['navafiz_profile_link'];

            // Update status
            $updated = $this->freelancer_requests_model->update_status($id, $status);

            if (!$updated) {
                echo json_encode([
                    'success' => false,
                    'message' => 'User created but failed to update status.'
                ]);
                return;
            }

            echo json_encode([
                'success' => true,
                'message' => $email_failed
                    ? 'Profile approved & account created. Email failed, please send manually.'
                    : 'Profile approved & account created successfully!',
                'email_failed' => $email_failed,
                'data' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->mobile,
                    'status_text' => "Profile approved & member account created",
                    'password' => $password,
                    'profile_link' => $navafiz_profile_link
                ]
            ]);
            return;
        }

        // Status reject
        if ($status == 3) {
            $updated = $this->freelancer_requests_model->update_status($id, $status);

            echo json_encode([
                'success' => $updated,
                'message' => $updated ? 'Profile rejected' : 'Failed to reject'
            ]);
            return;
        }

        // Status submit
        if ($status == 1) {
            $updated = $this->freelancer_requests_model->update_status($id, $status);

            echo json_encode([
                'success' => $updated,
                'message' => $updated ? 'Status set to submitted' : 'Update failed'
            ]);
            return;
        }
    }

    private function create_user_from_freelancer_request($request)
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
            'm_name' => $request->name,
            'm_email' => $request->email,
            'm_password' => $password, // Hash the password before saving
            'role_id' => 4, // User role ID for job seekers
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

                // --- Generate unique profile link ---
                $base_slug = $this->generate_slug($request->name);
                $slug = $base_slug;
                $counter = 1;

                // Check uniqueness against BOTH username and navafiz_profile_link
                while ($this->profile_model->Search([], ['username' => $slug, 'navafiz_profile_link' => $slug])) {
                    $slug = $base_slug . '-' . $counter;
                    $counter++;
                }

                // Save profile link and username
                $this->profile_model->Save([
                    'username' => $slug, // optional: username same as slug
                    'navafiz_profile_link' => $slug
                ], $user_id);

                // Send email with the login credentials
                $email_status = $this->send_registration_email($request->email, $password);

                return [
                    'password' => $password,
                    'email_failed' => !$email_status, // true if failed
                    'navafiz_profile_link' => base_url('n/' . $slug)
                ];

            } else {
                _setError("Error while creating user account for job seeker.");
                return false;
            }
        } else {
            // _setError("You're already registered with the provided email. Please login or use forgot password.");
            // return 'exists';
            _setError("You're already registered with the provided email. Please login or use forgot password.");

            $existing_user = $find_user[0];

            return [
                'status' => 'exists',
                'navafiz_profile_link' => !empty($existing_user->navafiz_profile_link)
                    ? base_url('n/' . $existing_user->navafiz_profile_link)
                    : ''
            ];
        }

    }

    function generate_slug($name)
    {
        // Convert to lowercase
        $slug = strtolower($name);

        // Remove any non-alphanumeric characters except spaces
        $slug = preg_replace('/[^a-z0-9\s]+/', '', $slug);

        // Replace multiple spaces with single space
        $slug = preg_replace('/\s+/', ' ', $slug);

        // Trim spaces
        $slug = trim($slug);

        // Replace spaces with dash
        $slug = str_replace(' ', '-', $slug);

        return $slug;
    }

    private function send_registration_email($email, $password)
    {
        // Prepare email subject and message
        $subject = 'Your Registration Credentials';
        $messageText = '<html><body>';
        $messageText .= "Hello,<br><br>Your registration has been approved. Here are your login credentials:<br><br>";
        $messageText .= "<b>Email:</b> " . $email . "<br>";
        $messageText .= "<b>Password:</b> " . $password . "<br><br>";
        $messageText .= "You can change your password later from your profile page.<br><br>";
        $messageText .= "Thank you.<br><br>";
        $messageText .= "*This message was sent by an automated mail server. Please do not reply.<br><br>";
        $messageText .= "</body></html>";

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

        // return false;
        // Send the email and log success or failure
        if (!$this->email->send()) {
            log_message('error', 'Email sending failed to ' . $email);
            _setError("There was a problem sending the registration email.");
            return false;
        } else {
            log_message('info', 'Registration email sent to ' . $email);
            _setSuccess("Registration email sent successfully to $email.");
            return true;
        }
    }
}