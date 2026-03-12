<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manpower_supply_requests extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email', 'session', 'pagination'));

        // $this->load->model('manpower_supply_requests_model');
    }

    public function submit()
    {
        // Form validation
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('country_of_operation', 'Country of Operation', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('company_registration_number', 'Company Registration Number', 'required');
        $this->form_validation->set_rules('year_established', 'Year Established', 'required|integer');
        $this->form_validation->set_rules('company_type', 'Company Type', 'required');

        $this->form_validation->set_rules('recruitment_license_number', 'Recruitment License Number', 'required');
        $this->form_validation->set_rules('license_issuing_authority', 'License Issuing Authority', 'required');
        $this->form_validation->set_rules('license_expiry_date', 'License Expiry Date', 'required');

        $this->form_validation->set_rules('contact_person_name', 'Contact Person Name', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('office_address', 'Office Address', 'required');

        $this->form_validation->set_rules('supply_countries[]', 'Supply Countries', 'required');
        $this->form_validation->set_rules('source_countries[]', 'Source Countries', 'required');
        $this->form_validation->set_rules('manpower_categories[]', 'Manpower Categories', 'required');
        $this->form_validation->set_rules('industries_served[]', 'Industries Served', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', validation_errors());
            redirect('services/supply-manpower');
            return;

        } else {

            /* Upload Files */

            $license_upload = !empty($_FILES['recruitment_license_file']['name'])
                ? $this->_upload_file('recruitment_license_file', 'license_', ['pdf', 'jpg', 'jpeg', 'png'], 'navassets/uploads/recruitment_license/')
                : null;

            $certificate_upload = !empty($_FILES['company_registration_certificate']['name'])
                ? $this->_upload_file('company_registration_certificate', 'certificate_', ['pdf', 'jpg', 'jpeg', 'png'], 'navassets/uploads/company_certificate/')
                : null;

            $testing_center_photos = $this->_upload_multiple_files(
                'testing_center_photos',
                'testing_',
                ['jpg', 'jpeg', 'png'],
                'navassets/uploads/testing_center/'
            );

            /* Multi select fields */

            $supply_countries = $this->input->post('supply_countries');
            $source_countries = $this->input->post('source_countries');
            $manpower_categories = $this->input->post('manpower_categories');
            $industries_served = $this->input->post('industries_served');

            /* Prepare data */

            $data = array(

                'company_name' => $this->input->post('company_name', TRUE),
                'country_of_operation' => $this->input->post('country_of_operation', TRUE),
                'city' => $this->input->post('city', TRUE),
                'company_registration_number' => $this->input->post('company_registration_number', TRUE),
                'year_established' => $this->input->post('year_established', TRUE),
                'company_type' => $this->input->post('company_type', TRUE),

                'recruitment_license_number' => $this->input->post('recruitment_license_number', TRUE),
                'license_issuing_authority' => $this->input->post('license_issuing_authority', TRUE),
                'license_expiry_date' => $this->input->post('license_expiry_date', TRUE),

                'recruitment_license_file' => $license_upload ? $license_upload['file_name'] : null,
                'company_registration_certificate' => $certificate_upload ? $certificate_upload['file_name'] : null,
                'tax_registration_number' => $this->input->post('tax_registration_number', TRUE),

                'contact_person_name' => $this->input->post('contact_person_name', TRUE),
                'designation' => $this->input->post('designation', TRUE),
                'mobile_number' => $this->input->post('mobile_number', TRUE),
                'whatsapp_number' => $this->input->post('whatsapp_number', TRUE),
                'email' => $this->input->post('email', TRUE),
                'office_address' => $this->input->post('office_address', TRUE),

                'supply_countries' => implode(',', $supply_countries),
                'source_countries' => implode(',', $source_countries),
                'manpower_categories' => implode(',', $manpower_categories),

                'trade_testing_center' => $this->input->post('trade_testing_center') ? 1 : 0,
                'testing_center_photos' => $testing_center_photos,

                'testing_categories_available' => $this->input->post('testing_categories_available', TRUE),
                'industries_served' => implode(',', $industries_served),

                'company_website' => $this->input->post('company_website', TRUE),
                'linkedin_page' => $this->input->post('linkedin_page', TRUE),
                'facebook_page' => $this->input->post('facebook_page', TRUE),

                'created_at' => date('Y-m-d H:i:s'),
                'status' => 1
            );

            /* Insert into DB */

            if (!$this->db->insert('jb_manpower_supply_requests', $data)) {

                $db_error = $this->db->_error_message();
                log_message('error', 'Manpower supply insert failed: ' . $db_error);

                $this->session->set_flashdata('error', 'Something went wrong while saving your data.');
                redirect('services/supply-manpower');
                return;
            }

            $this->session->set_flashdata('success', 'Your manpower supply registration has been submitted successfully.');
            redirect('services/supply-manpower');
        }
    }

    private function _upload_file($field_name, $prefix, $allowed_types, $upload_path)
    {
        if (empty($_FILES[$field_name]['name']))
            return null;

        $ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);

        if (!in_array(strtolower($ext), $allowed_types)) {
            $this->session->set_flashdata('error', ucfirst($field_name) . ' must be ' . implode(', ', $allowed_types));
            redirect('services/supply-manpower');
            exit;
        }

        $filename = $prefix . time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;

        $config = [
            'upload_path' => $upload_path,
            'allowed_types' => implode('|', $allowed_types),
            'file_name' => $filename,
            'overwrite' => FALSE,
            'max_size' => 5120
        ];

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field_name)) {

            $error_msg = $this->upload->display_errors('', '');

            $this->session->set_flashdata('error', ucfirst($field_name) . ' upload failed: ' . $error_msg);
            redirect('services/supply-manpower');
            exit;
        }

        return $this->upload->data();
    }

    private function _upload_multiple_files($field_name, $prefix, $allowed_types, $upload_path)
    {
        if (empty($_FILES[$field_name]['name'][0])) {
            return null;
        }

        $files = $_FILES[$field_name];
        $uploaded_files = [];

        foreach ($files['name'] as $key => $name) {

            if ($name == '')
                continue;

            $_FILES['temp_file']['name'] = $files['name'][$key];
            $_FILES['temp_file']['type'] = $files['type'][$key];
            $_FILES['temp_file']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['temp_file']['error'] = $files['error'][$key];
            $_FILES['temp_file']['size'] = $files['size'][$key];

            $ext = pathinfo($name, PATHINFO_EXTENSION);

            if (!in_array(strtolower($ext), $allowed_types)) {
                continue;
            }

            $filename = $prefix . time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;

            $config = [
                'upload_path' => $upload_path,
                'allowed_types' => implode('|', $allowed_types),
                'file_name' => $filename,
                'overwrite' => FALSE,
                'max_size' => 5120
            ];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('temp_file')) {
                $uploaded_files[] = $filename;
            }
        }

        return !empty($uploaded_files) ? implode(',', $uploaded_files) : null;
    }

    // Fetch all the form requests
    public function all_requests($page = 0)
    {
        require_role(array(2)); // 2 = Mentor

        $config = array();
        $config["base_url"] = site_url('mentor-request-list');
        $config["total_rows"] = $this->mentor_requests_model->get_total_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $data["records"] = $this->mentor_requests_model->get_all($config["per_page"], $page);
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

        $record = $this->mentor_requests_model->get_by_id($id);

        if (!$record) {
            show_404();
        }

        $data["record"] = $record;

        $data['title'] = 'NAVAFIZ Home';
        $data['content'] = 'form_requests/mentor_request_view'; // content view
        $this->load->view('layouts/website/website_layout', $data);
    }
}