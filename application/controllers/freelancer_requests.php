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
    public function all_requests($page = 0)
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

        $data["record"] = $record;

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/freelancer_request_view'; // content view
        $this->load->view('layouts/system/main_layout', $data);
    }
}