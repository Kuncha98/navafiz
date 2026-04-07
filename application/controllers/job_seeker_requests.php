<?php
defined('BASEPATH') or exit('No direct script access allowed');

class job_seeker_requests extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('job_seeker_requests_model');
        $this->load->model('profile_model');
    }

    public function submit()
    {
        // Form validation
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required');
        $this->form_validation->set_rules('current_location', 'Current Location', 'required');
        $this->form_validation->set_rules('applying_position', 'Position Applying For', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('preferred_country', 'Preferred Country', 'required');
        $this->form_validation->set_rules('availability', 'Availability', 'required');
        $this->form_validation->set_rules('experience', 'Total Years of Experience', 'required|integer');
        $this->form_validation->set_rules('last_job_title', 'Last Job Title', 'required');
        $this->form_validation->set_rules('highest_qualification', 'Highest Qualification', 'required');
        $this->form_validation->set_rules('cv', 'CV', 'callback_file_check_cv');

        // Conditional visa file
        if ($this->input->post('visaStatus') === 'yes') {
            $this->form_validation->set_rules('visa', 'Visa Copy', 'callback_file_check_visa');
        }

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->session->set_flashdata('error', validation_errors());
            redirect('services/find-a-job');
            return;
        } else {

            $cv_upload_data = $this->_upload_file('cv', 'cv_', 'pdf', 'navassets/uploads/cv/');

            $passport_upload_data = !empty($_FILES['passport']['name'])
                ? $this->_upload_file('passport', 'passport_', ['pdf', 'jpg', 'jpeg', 'png'], 'navassets/uploads/passport/')
                : null;

            $visa_upload_data = null;
            if ($this->input->post('visaStatus') === 'yes' && !empty($_FILES['visa']['name'])) {
                $visa_upload_data = $this->_upload_file('visa', 'visa_', ['pdf', 'jpg', 'jpeg', 'png'], 'navassets/uploads/visa/');
            }

            // Set skills
            $skills = $this->input->post('skills');
            $skills_string = is_array($skills) ? implode(',', $skills) : '';

            // Prepare data
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'mobile' => $this->input->post('mobile', TRUE),
                'email' => $this->input->post('email', TRUE),
                'nationality' => $this->input->post('nationality', TRUE),
                'current_location' => $this->input->post('current_location', TRUE),
                'applying_position' => $this->input->post('applying_position', TRUE),
                'category' => $this->input->post('category', TRUE),
                'preferred_country' => $this->input->post('preferred_country', TRUE),
                'expected_salary' => (int) $this->input->post('expected_salary', TRUE),
                'availability' => $this->input->post('availability', TRUE),
                'experience' => (int) $this->input->post('experience', TRUE),
                'last_job_title' => $this->input->post('last_job_title', TRUE),
                'skills' => $skills_string,
                'highest_qualification' => $this->input->post('highest_qualification', TRUE),
                'certificate' => $this->input->post('certificate', TRUE),
                'cv' => $cv_upload_data['file_name'],
                'passport' => $passport_upload_data['file_name'],
                'visa_status' => $this->input->post('visaStatus', TRUE),
                'visa' => $visa_upload_data['file_name'],
                'worked_in_gcc' => $this->input->post('worked_in_gcc', TRUE),
                'additional_notes' => $this->input->post('additional_notes', TRUE),
            );

            // Insert into DB
            if (!$this->db->insert('jb_job_seeker_requests', $data)) {
                $db_error = $this->db->_error_message();
                log_message('error', 'Job seeker insert failed: ' . $db_error);
                $this->session->set_flashdata('error', 'Something went wrong while saving your data. Please try again.');
                redirect('services/find-a-job');
                return;
            }

            // Success message
            $this->session->set_flashdata('success', 'Your application has been submitted successfully.');
            redirect('services/find-a-job');
        }
    }

    // File upload helper
    private function _upload_file($field_name, $prefix, $allowed_types, $upload_path)
    {
        if (empty($_FILES[$field_name]['name']))
            return null;

        $ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);
        if (is_array($allowed_types)) {
            if (!in_array(strtolower($ext), $allowed_types)) {
                $this->session->set_flashdata('error', ucfirst($field_name) . ' must be ' . implode(', ', $allowed_types) . ' file.');
                redirect('services/find-a-job');
                exit;
            }
        } else {
            if (strtolower($ext) !== $allowed_types) {
                $this->session->set_flashdata('error', ucfirst($field_name) . ' must be a ' . $allowed_types . ' file.');
                redirect('services/find-a-job');
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
            redirect('services/find-a-job');
            exit;
        }

        return $this->upload->data();
    }

    // Optional callbacks for CI validation
    public function file_check_cv()
    {
        if (empty($_FILES['cv']['name'])) {
            $this->form_validation->set_message('file_check_cv', 'CV is required.');
            return false;
        }
        return true;
    }

    public function file_check_visa()
    {
        if (empty($_FILES['visa']['name'])) {
            $this->form_validation->set_message('file_check_visa', 'Visa is required when Visa Status is Yes.');
            return false;
        }
        return true;
    }

    // Fetch all the form requests
    public function all_requests($page = 0)
    {
        require_role(array(2)); // 2 = Mentor

        // echo '<pre>';
        // print_r($this->session->all_userdata());
        // exit;
        $config = array();
        $config["base_url"] = site_url('job-seeker-request-list');
        $config["total_rows"] = $this->job_seeker_requests_model->get_total_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $data["records"] = $this->job_seeker_requests_model->get_all($config["per_page"], $page);
        $data["pagination"] = $this->pagination->create_links();

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/job_seeker_requests'; // content view
        $this->load->view('layouts/system/main_layout', $data);
    }

    // Fetch single record using IDs
    public function job_seeker_request_view($id = NULL)
    {
        require_role(array(2)); // 2 = Mentor

        if ($id == NULL || !is_numeric($id)) {
            show_404();
        }

        $record = $this->job_seeker_requests_model->get_by_id($id);

        if (!$record) {
            show_404();
        }

        $data["record"] = $record;

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/job_seeker_request_view'; // content view
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
        $request = $this->job_seeker_requests_model->get_by_id($id);

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

            $password = $this->create_user_from_job_seeker_request($request);

            // User exists
            if ($password === 'exists') {
                echo json_encode([
                    'success' => false,
                    'message' => "You're already registered with the provided email. Please login or use forgot password."
                ]);
                return;
            }

            // Failed to create user
            if ($password === false) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Error while creating user account for job seeker.'
                ]);
                return;
            }

            // Update status
            $updated = $this->job_seeker_requests_model->update_status($id, $status);

            if (!$updated) {
                echo json_encode([
                    'success' => false,
                    'message' => 'User created but failed to update status.'
                ]);
                return;
            }

            echo json_encode([
                'success' => true,
                'message' => 'Profile approved & account created successfully!',
                'data' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->mobile,
                    'status_text' => "Profile approved & member account created",
                    'password' => $password
                ]
            ]);
            return;
        }

        // Status reject
        if ($status == 3) {
            $updated = $this->job_seeker_requests_model->update_status($id, $status);

            echo json_encode([
                'success' => $updated,
                'message' => $updated ? 'Profile rejected' : 'Failed to reject'
            ]);
            return;
        }

        // Status submit
        if ($status == 1) {
            $updated = $this->job_seeker_requests_model->update_status($id, $status);

            echo json_encode([
                'success' => $updated,
                'message' => $updated ? 'Status set to submitted' : 'Update failed'
            ]);
            return;
        }

        // // Update status
        // $updated = $this->job_seeker_requests_model->update_status($id, $status);

        // if ($updated) {
        //     // If approved, create the user account
        //     if ($status == 2) {
        //         $password = $this->create_user_from_job_seeker_request($request);

        //         // User already exists
        //         if ($password === 'exists') {
        //             echo json_encode([
        //                 'success' => false,
        //                 'message' => "You're already registered with the provided email. Please login or use forgot password."
        //             ]);
        //             return;
        //         }

        //         // Insert failed
        //         if ($password === false) {
        //             echo json_encode([
        //                 'success' => false,
        //                 'message' => 'Error while creating user account for job seeker.'
        //             ]);
        //             return;
        //         }

        //         $status_text = "Profile approved & member account created";

        //         echo json_encode([
        //             'success' => true,
        //             'message' => 'Status updated successfully!',
        //             'data' => [
        //                 'name' => $request->name,
        //                 'email' => $request->email,
        //                 'phone' => $request->mobile,
        //                 'status_text' => $status_text,
        //                 'password' => $password
        //             ]
        //         ]);
        //     } elseif ($status == 3) {
        //         // $status_text = "Profile rejected";
        //         echo json_encode(['success' => false, 'message' => 'Profile rejected']);
        //     } else {
        //         $status_text = "Submitted";
        //     }


        // } else {
        //     echo json_encode(['success' => false, 'message' => 'Update failed']);
        // }
    }

    private function create_user_from_job_seeker_request($request)
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
                // Send email with the login credentials
                $this->send_registration_email($request->email, $password);
                return $password;
            } else {
                _setError("Error while creating user account for job seeker.");
                return false;
            }
        } else {
            _setError("You're already registered with the provided email. Please login or use forgot password.");
            return 'exists';
        }

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
