<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class job_requests extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session'));
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
}