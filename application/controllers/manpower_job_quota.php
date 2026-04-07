<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manpower_job_quota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        $this->load->model('manpower_job_quota_model');
    }

    public function submit()
    {
        // Form validation
        $this->form_validation->set_rules('job_title', 'Job Title', 'required');
        $this->form_validation->set_rules('workers_required', 'Number of Workers', 'required|integer');
        $this->form_validation->set_rules('duty_hours', 'Duty Hours', 'required|integer');
        $this->form_validation->set_rules('basic_salary', 'Basic Salary', 'required|integer');
        $this->form_validation->set_rules('total_salary', 'Total Salary', 'required|integer');
        $this->form_validation->set_rules('interview_type', 'Interview Type', 'required');
        $this->form_validation->set_rules('gcc_experience', 'GCC Experience', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->session->set_flashdata('error', validation_errors());
            redirect('services/manpower-job-quota');
            return;
        } else {

            // Prepare data
            $data = array(
                'job_title' => $this->input->post('job_title', TRUE),
                'workers_required' => $this->input->post('workers_required', TRUE),
                'duty_hours' => $this->input->post('duty_hours', TRUE),
                'basic_salary' => $this->input->post('basic_salary', TRUE),
                'total_salary' => $this->input->post('total_salary', TRUE),
                'accommodation' => $this->input->post(index: 'accommodation') ? 1 : 0,
                'transport' => $this->input->post('transport') ? 1 : 0,
                'food' => $this->input->post('food') ? 1 : 0,
                'overtime' => $this->input->post('overtime') ? 1 : 0,
                'joining_flight_ticket' => $this->input->post('joining_flight_ticket') ? 1 : 0,
                'other_benefits' => $this->input->post('other_benefits', TRUE),
                'interview_type' => $this->input->post('interview_type', TRUE),
                'gcc_experience' => $this->input->post('gcc_experience', TRUE),
                'additional_notes' => $this->input->post('additional_notes', TRUE)
            );

            // Insert into DB
            if (!$this->db->insert('jb_manpower_job_quotas', $data)) {
                $db_error = $this->db->_error_message();
                log_message('error', 'Job quota insert failed: ' . $db_error);
                $this->session->set_flashdata('error', 'Something went wrong while saving your data. Please try again.');
                redirect('services/manpower-job-quota');
                return;
            }

            // Success message
            $this->session->set_flashdata('success', 'Your job quota has been submitted successfully.');
            redirect('services/manpower-job-quota');
        }
    }

    // Fetch all the form requests
    public function all_requests($page = 0)
    {
        require_role(array(9));

        $config = init_pagination(
            'form-requests/manpower-supply-quota-request-list',
            $this->manpower_job_quota_model->get_total_count(),
            20,
            3
        );

        $data["records"] = $this->manpower_job_quota_model->get_all(
            $config["per_page"],
            $this->uri->segment(3)
        );

        $data["pagination"] = $this->pagination->create_links();

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/manpower_supply_quota'; // content view
        $this->load->view('layouts/system/main_layout', $data);
    }

    // Fetch single record using IDs
    public function job_request_view($id = NULL)
    {
        require_role(array(2)); // 2 = Mentor

        if ($id == NULL || !is_numeric($id)) {
            show_404();
        }

        $record = $this->manpower_job_quota_model->get_by_id($id);

        if (!$record) {
            show_404();
        }

        $data["record"] = $record;

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/job_request_view'; // content view
        $this->load->view('layouts/system/main_layout', $data);
    }
}