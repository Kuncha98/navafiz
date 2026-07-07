<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload_resume extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('upload_resume_model');
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));
        $this->load->library('upload');
        $this->load->model('profile_model');
    }

    public function index()
    {
        // Load view
        $this->load->view('upload_resume_form');
    }

    public function check_email_exists()
    {
        $email = $this->input->post('email', TRUE);

        if ($this->upload_resume_model->email_exists($email)) {
            echo json_encode(['exists' => true, 'message' => 'Resume has been already submitted using this email.']);
        } else {
            echo json_encode(['exists' => false]);
        }
    }

    public function submit()
    {
        // Validation
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('profession', 'Profession', 'required');
        $this->form_validation->set_rules('phone', 'WhatsApp Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('cv', 'CV', 'callback_file_check_cv');

        if ($this->form_validation->run() === FALSE) {
            $errors = validation_errors();
            echo json_encode(['status' => 'error', 'message' => $errors]);
            return;
        }

        $request = (object) [
            'name' => $this->input->post('name', TRUE),
            'email' => $this->input->post('email', TRUE),
            'phone' => $this->input->post('phone', TRUE)
        ];

        $result = $this->create_user_from_resume_submission($request);

        // Existing user
        if (isset($result['status']) && $result['status'] === 'exists') {

            echo json_encode([
                'status' => 'exists',
                'message' => "
                You're already registered with this email address.<br><br>

                Please login to upload/update your CV.<br><br>

                <a href='" . base_url('login') . "'>Login</a><br>
                <a href='" . base_url('forgot-password') . "'>Forgot Password?</a><br>
                <a href='" . base_url('n/' . $result['navafiz_profile_link']) . "' target='_blank'>View Profile</a>
            "
            ]);

            return;
        }

        // Account creation failed
        if ($result === false) {

            echo json_encode([
                'status' => 'error',
                'message' => 'Error while creating user account.'
            ]);

            return;
        }

        // Upload CV
        $cv_upload_data = $this->_upload_file('cv', 'cv_', 'pdf', 'navassets/uploads/cv/');

        if (!$cv_upload_data) {
            echo json_encode(['status' => 'error', 'message' => 'CV upload failed.']);
            return;
        }

        $resume_data = [
            'name' => $this->input->post('name', TRUE),
            'profession' => $this->input->post('profession', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'email' => $this->input->post('email', TRUE),
            'cv' => $cv_upload_data['file_name'],
            'profile_link' => $result['navafiz_profile_link'],
            'created_at' => date('Y-m-d H:i:s'),
            'ip_address' => $this->input->ip_address()
        ];

        $saved = $this->upload_resume_model->insert_resume($resume_data);

        if (!$saved) {

            echo json_encode([
                'status' => 'error',
                'message' => 'Account created but failed to save resume.'
            ]);

            return;
        }

        echo json_encode([
            'status' => 'success',
            'message' => $result['email_failed']
                ? 'Resume uploaded & account created. Email failed, please contact support.'
                : 'Resume uploaded successfully & account created.',
            'data' => [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'status_text' => "Profile approved & member account created",
                'password' => $result['password'],
                'profile_link' => base_url('n/' . $result['navafiz_profile_link'])
            ]
        ]);

        // if ($this->upload_resume_model->insert_resume($resume_data)) {
        //     echo json_encode(['status' => 'success', 'message' => 'Your resume has been uploaded successfully.']);
        // } else {
        //     echo json_encode(['status' => 'error', 'message' => 'Something went wrong. Please try again.']);
        // }
    }

    private function create_user_from_resume_submission($request)
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
            'm_ph_no' => $request->phone,
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
                    'navafiz_profile_link' => $slug
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

            // --- Generate unique profile link ---
            $base_slug = $this->generate_slug($existing_user->m_name);
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
            ], $existing_user->m_id);

            return [
                'status' => 'exists',
                'navafiz_profile_link' => $slug
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

    // File validation callback
    public function file_check_cv()
    {
        if (empty($_FILES['cv']['name'])) {
            $this->form_validation->set_message('file_check_cv', 'CV is required.');
            return false;
        }
        return true;
    }

    // File upload helper (reuse from your system)
    private function _upload_file($field_name, $prefix, $allowed_types, $upload_path)
    {
        if (empty($_FILES[$field_name]['name']))
            return null;

        $ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);
        if (is_array($allowed_types)) {
            if (!in_array(strtolower($ext), $allowed_types)) {
                $this->session->set_flashdata('error', ucfirst($field_name) . ' must be ' . implode(', ', $allowed_types) . ' file.');
                redirect('/#resume');
                exit;
            }
        } else {
            if (strtolower($ext) !== $allowed_types) {
                $this->session->set_flashdata('error', ucfirst($field_name) . ' must be a ' . $allowed_types . ' file.');
                redirect('/#resume');
                exit;
            }
        }

        $filename = $prefix . time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;

        $config = [
            'upload_path' => $upload_path,
            'allowed_types' => is_array($allowed_types) ? implode('|', $allowed_types) : $allowed_types,
            'file_name' => $filename,
            'overwrite' => FALSE,
            'max_size' => 5120
        ];

        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field_name)) {
            $error_msg = $this->upload->display_errors('', '');
            $this->session->set_flashdata('error', ucfirst($field_name) . ' upload failed: ' . $error_msg);
            redirect('/#resume');
            exit;
        }

        return $this->upload->data();
    }

    // Fetch all the form requests
    public function all_requests()
    {
        require_role(array(2)); // 2 = Mentor

        $config = init_pagination(
            'uploaded-resumes',
            $this->upload_resume_model->get_total_count(),
            20,
            2
        );

        $data["records"] = $this->upload_resume_model->get_all(
            $config["per_page"],
            $this->uri->segment(2)
        );

        $data["pagination"] = $this->pagination->create_links();

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/resume_uploads'; // content view
        $this->load->view('layouts/system/main_layout', $data);
    }
}
