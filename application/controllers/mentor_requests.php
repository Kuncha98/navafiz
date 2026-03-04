<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mentor_requests extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('Mentor_requests_model');
    }

    public function submit()
    {
        // Form validation
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('professional_title', 'Professional Title', 'required|trim');
        $this->form_validation->set_rules('company', 'Company / Industry', 'required|trim');
        $this->form_validation->set_rules('experience', 'Years of Experience', 'required|integer');
        $this->form_validation->set_rules('location', 'Location', 'required|trim');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('linkedIn', 'LinkedIn Profile', 'required|trim');

        $this->form_validation->set_rules('expertise_areas', 'Areas of Expertise', 'required|trim');
        $this->form_validation->set_rules('languages_spoken', 'Languages Spoken', 'required|trim');
        $this->form_validation->set_rules('mentorship_type', 'Mentorship Type', 'required');
        $this->form_validation->set_rules('conducting_mode', 'Conducting Mode', 'required');
        $this->form_validation->set_rules('session_duration', 'Session Duration', 'required|integer');

        $this->form_validation->set_rules('previous_mentoring', 'Previous Mentoring Experience', 'required');
        $this->form_validation->set_rules('paid_type', 'Paid or Voluntary', 'required');



        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->session->set_flashdata('error', validation_errors());
            redirect('services/become-a-mentor');
            return;
        } else {

            $availability_array = $this->input->post('available_at');
            if (empty($availability_array) || !is_array($availability_array)) {
                $this->session->set_flashdata('error', 'Please add at least one availability slot.');
                redirect('services/become-a-mentor');
                return;
            }

            $availability_string = is_array($availability_array) ? implode(',', $availability_array) : '';

            // Prepare data
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'professional_title' => $this->input->post('professional_title', TRUE),
                'company' => $this->input->post('company', TRUE),
                'experience' => $this->input->post('experience', TRUE),
                'location' => $this->input->post('location', TRUE),
                'mobile' => $this->input->post('mobile', TRUE),
                'email' => $this->input->post('email', TRUE),
                'linkedin' => $this->input->post('linkedIn', TRUE),

                'expertise_areas' => $this->input->post('expertise_areas', TRUE),
                'students' => $this->input->post('students') ? 1 : 0,
                'job_seekers' => $this->input->post('job_seekers') ? 1 : 0,
                'entrepreneurs' => $this->input->post('entrepreneurs') ? 1 : 0,
                'professionals' => $this->input->post('professionals') ? 1 : 0,
                'languages_spoken' => $this->input->post('languages_spoken', TRUE),
                'mentorship_type' => $this->input->post('mentorship_type', TRUE),
                'conducting_mode' => $this->input->post('conducting_mode', TRUE),
                'session_duration' => $this->input->post('session_duration', TRUE),
                'available_at' => $availability_string,

                'personal_intro' => $this->input->post('personal_intro', TRUE),
                'key_achievement' => $this->input->post('key_achievement', TRUE),
                'previous_mentoring' => $this->input->post('previous_mentoring', TRUE),
                'paid_type' => $this->input->post('paid_type', TRUE),
                'additional_notes' => $this->input->post('additional_notes', TRUE),
            );

            // Insert into DB
            if (!$this->db->insert('jb_mentor_requests', $data)) {
                $db_error = $this->db->_error_message();
                log_message('error', 'Mentor insert failed: ' . $db_error);
                $this->session->set_flashdata('error', 'Something went wrong while saving your data. Please try again.');
                redirect('services/become-a-mentor');
                return;
            }

            // Success message
            $this->session->set_flashdata('success', 'Your application has been submitted successfully.');
            redirect('services/become-a-mentor');
        }
    }

    // Fetch all the form requests
    public function all_requests($page = 0)
    {
        require_role(array(2)); // 2 = Mentor

        $config = array();
        $config["base_url"] = site_url('mentor-request-list');
        $config["total_rows"] = $this->Mentor_requests_model->get_total_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $data["records"] = $this->Mentor_requests_model->get_all($config["per_page"], $page);
        $data["pagination"] = $this->pagination->create_links();

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/mentor_requests'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }

    // Fetch single record using IDs
    public function mentor_request_view($id = NULL)
    {
        require_role(array(2)); // 2 = Mentor

        if ($id == NULL || !is_numeric($id)) {
            show_404();
        }

        $record = $this->Mentor_requests_model->get_by_id($id);

        if (!$record) {
            show_404();
        }

        $data["record"] = $record;

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/mentor_request_view'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }
}