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
            echo json_encode([
                'success' => false,
                'message' => validation_errors()
            ]);
            return;
        }

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
            echo json_encode([
                'success' => false,
                'message' => 'Something went wrong. Please try again.'
            ]);
            return;
        }

        // Get inserted ID
        $insert_id = $this->db->insert_id();

        // Build view link
        $view_link = base_url('form-requests/manpower-supply-quota-view/' . $insert_id);

        // Success message
        echo json_encode([
            'success' => true,
            'message' => 'Your job quota has been submitted successfully.',
            'data' => [
                'id' => $insert_id,
                'view_link' => $view_link
            ]
        ]);

    }

    // Fetch all the form requests
    public function all_requests($page = 0)
    {
        require_role(array(10, 2));

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
    public function job_quota_view($id = NULL)
    {
        require_role(array(10, 2));

        if ($id == NULL || !is_numeric($id)) {
            show_404();
        }

        $record = $this->manpower_job_quota_model->get_by_id($id);

        if (!$record) {
            show_404();
        }

        // Get next & prev
        $next = $this->manpower_job_quota_model->get_next($id);
        $prev = $this->manpower_job_quota_model->get_prev($id);

        // Total records
        $total = $this->manpower_job_quota_model->get_total_count();

        // Current position
        $current_position = $this->manpower_job_quota_model->get_position($id);

        $data['next_id'] = $next ? $next->id : null;
        $data['prev_id'] = $prev ? $prev->id : null;

        $data['total_records'] = $total;
        $data['current_position'] = $current_position;

        $data["record"] = $record;

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/manpower_supply_quota_view'; // content view
        $this->load->view('layouts/system/main_layout', $data);
    }
}