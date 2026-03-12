<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class job_requests extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('job_requests_model');
    }

    public function submit()
    {
        // Form validation
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('contact_person', 'Contact Person', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('work_location', 'Work Location', 'required');
        $this->form_validation->set_rules('job_title', 'Job Title', 'required');
        $this->form_validation->set_rules('workers_required', 'Number of Workers', 'required|integer');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('employment_type', 'Employment Type', 'required');
        $this->form_validation->set_rules('joining_date', 'Expected Joining Date', 'required');
        $this->form_validation->set_rules('salary_min', 'Minimum Salary', 'required|integer');
        $this->form_validation->set_rules('salary_max', 'Maximum Salary', 'required|integer');
        $this->form_validation->set_rules('interview_type', 'Interview Type', 'required');
        $this->form_validation->set_rules('trade_test', 'Trade Test', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->session->set_flashdata('error', validation_errors());
            redirect('services/hire-a-talent');
            return;
        } else {

            // Set skills
            $skills = $this->input->post('skills');
            $skills_string = is_array($skills) ? implode(',', $skills) : '';

            // Prepare data
            $data = array(
                'company_name' => $this->input->post('company_name', TRUE),
                'contact_person' => $this->input->post('contact_person', TRUE),
                'mobile' => $this->input->post('mobile', TRUE),
                'email' => $this->input->post('email', TRUE),
                'work_location' => $this->input->post('work_location', TRUE),
                'job_title' => $this->input->post('job_title', TRUE),
                'workers_required' => $this->input->post('workers_required', TRUE),
                'category' => $this->input->post('category', TRUE),
                'employment_type' => $this->input->post('employment_type', TRUE),
                'joining_date' => $this->input->post('joining_date', TRUE),
                'education' => $this->input->post('education', TRUE),
                'experience' => $this->input->post('experience', TRUE),
                'skills' => $skills_string,
                'language' => $this->input->post('language', TRUE),
                'salary_min' => $this->input->post('salary_min', TRUE),
                'salary_max' => $this->input->post('salary_max', TRUE),
                'accommodation' => $this->input->post(index: 'accommodation') ? 1 : 0,
                'transport' => $this->input->post('transport') ? 1 : 0,
                'food' => $this->input->post('food') ? 1 : 0,
                'other_benefits' => $this->input->post('other_benefits', TRUE),
                'interview_type' => $this->input->post('interview_type', TRUE),
                'trade_test' => $this->input->post('trade_test', TRUE),
                'additional_notes' => $this->input->post('additional_notes', TRUE)
            );

            // Insert into DB
            if (!$this->db->insert('jb_job_requests', $data)) {
                $db_error = $this->db->_error_message();
                log_message('error', 'Job request insert failed: ' . $db_error);
                $this->session->set_flashdata('error', 'Something went wrong while saving your data. Please try again.');
                redirect('services/hire-a-talent');
                return;
            }

            // Success message
            $this->session->set_flashdata('success', 'Your application has been submitted successfully.');
            redirect('services/hire-a-talent');
        }
    }

    // Fetch all the form requests
    public function all_requests($page = 0)
    {
        require_role(array(2)); // 2 = Mentor

        $config = array();
        $config["base_url"] = site_url('job-request-list');
        $config["total_rows"] = $this->job_requests_model->get_total_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $data["records"] = $this->job_requests_model->get_all($config["per_page"], $page);
        $data["pagination"] = $this->pagination->create_links();

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/job_requests'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }

    // Fetch single record using IDs
    public function job_request_view($id = NULL)
    {
        require_role(array(2)); // 2 = Mentor

        if ($id == NULL || !is_numeric($id)) {
            show_404();
        }

        $record = $this->job_requests_model->get_by_id($id);

        if (!$record) {
            show_404();
        }

        $data["record"] = $record;

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/job_request_view'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }
}