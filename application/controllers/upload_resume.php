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

        // Upload CV
        $cv_upload_data = $this->_upload_file('cv', 'cv_', 'pdf', 'navassets/uploads/cv/');

        if (!$cv_upload_data) {
            echo json_encode(['status' => 'error', 'message' => 'CV upload failed.']);
            return;
        }

        $data = [
            'name' => $this->input->post('name', TRUE),
            'profession' => $this->input->post('profession', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'email' => $this->input->post('email', TRUE),
            'cv' => $cv_upload_data['file_name'],
            'created_at' => date('Y-m-d H:i:s'),
            'ip_address' => $this->input->ip_address()
        ];

        if ($this->upload_resume_model->insert_resume($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Your resume has been uploaded successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Something went wrong. Please try again.']);
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
