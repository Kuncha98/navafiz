<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companies extends MY_Controller
{
    var $limit = 15;
    var $offset = 0;
    var $pages = 7;
    var $config1 = array();
    public $global_array;

    function __construct()
    {
        parent::__construct();
        $this->load->model('notification_model');
        $this->load->model('member_model');
        $this->load->model('company_model');
        $this->load->model('companies_model');
        $this->load->model('employment_history_model');
        $this->load->model('manpower_job_quota_model');
        $this->session_user_id = $this->session->userdata('user_id');
    }

    function index()
    {

        $total_count = $this->companies_model->GetAllCount();
        $data['limit'] = 25;
        $data['categories'] = $this->companies_model->getCategories(array('c_staus' => 1));
        $data['total_count'] = $total_count;
        $this->load->view('companies/index', $data);
    }



    function companiesajax()
    {
        $data = array();
        $page_id = $this->input->post('page_id');
        $limit = $this->input->post('limit');
        $company_keyword = $this->input->post('company');
        $category = $this->input->post('category');

        $data = array();

        $data['limit_selected'] = $limit;
        $data['companies'] = $this->company_model->getCompanies(array('co_status' => 1, 'limit' => $limit, 'company_keyword' => $company_keyword, 'category_id' => $category));
        // echo json_encode($data['companies']);


        $this->load->view('companies/listcompanies', $data);
    }
    function addform()
    {
        $data['profile'] = $this->member_model->userDetail(array('user_id' => $this->session->userdata('user_id')));
        $this->load->view('companies/addform', $data);
    }

    function edit($company_id)
    {

        $user_info = $this->member_model->userDetail(array('user_id' => $this->session_user_id));
        $company_detail = $this->companies_model->GetById($company_id);

        $data['profile'] = $user_info;
        $data['company_detail'] = $company_detail;

        $this->load->view('companies/editform', $data);
    }

    function apply($company_id)
    {

        $this->load->model('companies_users_applylist', 'apply_list');

        $company_detail = $this->companies_model->GetById($company_id);
        if ($company_detail) {
            $career_link = !empty($company_detail->co_career_page) ? $company_detail->co_career_page : $company_detail->co_website;
            $data['user_id'] = $this->session_user_id;
            $data['company_id'] = $company_id;
            if ($this->apply_list->Save($data)) {
                if (!empty($career_link)) {
                    redirect($career_link);
                    exit;
                } else {
                    _setError("No information available to Apply");
                    redirect(site_url('companies'));
                    exit;
                }

            } else {
                _setError("Unable to Apply please try again");
                redirect(site_url('companies'));
            }
            exit;
        }



    }

    function save()
    {

        $post_company_id = intval($this->get_post('post_company_id', 0));

        if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) {

            //Image Libaray Config
            $logo_path = 'assets/uploads/companies/';
            $config = array('upload_path' => $logo_path, 'allowed_types' => 'jpeg|gif|jpg|png', 'file_name' => 'company-' . rand(0, 9999), 'overwrite' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('company_logo')) {

                $udata = array('upload_data' => $this->upload->data());
                $file_name = $udata['upload_data']['file_name'];
                $co_logo = $logo_path . $file_name;
                $post_data['co_logo'] = $co_logo;
            } else {

                _setError("There is some problem with uploading image");
                redirect(base_url($_POST['action']));
                exit();
            }
        }

        $cat_id = $this->input->post('cat_id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $phone = $this->input->post('phone');
        $fax = $this->input->post('fax');
        $city = $this->input->post('city');
        $address = $this->input->post('address');
        $website = $this->input->post('website');
        $keywords = $this->input->post('keywords');
        $admin_remarks = $this->input->post('admin_remarks');
        $co_career_page = $this->input->post('co_career_page');

        $post_data['co_cat_id'] = $cat_id;
        $post_data['co_name'] = $name;
        $post_data['co_email'] = $email;
        $post_data['co_phone'] = $phone;
        $post_data['co_fax'] = $fax;
        $post_data['city'] = $city;
        $post_data['co_address'] = $address;
        $post_data['co_tags'] = $keywords;
        $post_data['admin_remarks'] = $admin_remarks;
        $post_data['co_website'] = $website;
        $post_data['co_career_page'] = $co_career_page;
        $post_data['co_status'] = 1;
        if ($post_company_id > 0) {
            $post_data['edited_by'] = $this->session_user_id;
            $post_data['updated_on'] = datenow();
        } else {
            $post_data['user_id'] = $this->session_user_id;
            $post_data['added_on'] = datenow();
        }


        $result = $this->companies_model->Save($post_data, $post_company_id);

        if (intval($result) > 0) {

            $session_name = $this->session->userdata('name');

            $noti['user_id'] = $this->session_user_id;
            $noti['noti_title'] = $session_name . " has added a new company.";
            ;
            $noti['noti_desc'] = $session_name . " has added a new company.";
            $noti['noti_type'] = 'company';
            $noti['noti_link'] = site_url('companies/company_detail/' . $result);
            AddNotification($noti);

            _setSuccess('Request completed successfully');
        } else {
            _setError('Unable to add Company');
        }

        redirect(base_url($_POST['action']));
        exit();
    }

    function company_detail($id)
    {
        $result = $this->companies_model->Search(array('co_id' => $id));
        $members_by_company = $this->employment_history_model->Search(array('company_id' => $result[0]->co_id));
        if (!empty($result)) {
            $meta_title_name = !empty($result[0]->co_name) ? $result[0]->co_name : 'Company';
            $meta_img = !empty($result[0]->co_logo) ? 'assets/uploads/companies/' . $result[0]->co_logo : '';
            $meta_desc = !empty($result[0]->co_address) ? ' | ' . $result[0]->co_address : '';
            $page_metas = array(
                'title' => $meta_title_name,
                'description' => $meta_desc,
                'og_img' => $meta_img,
                'og_url' => 'companies/company_detail/' . $id,
            );

            $data['members_by_company'] = $members_by_company;
            $data['page_meta'] = $page_metas;
            $data['result'] = $result;
            $this->load->view('companies/company_detail', $data);
        }
    }

    function delete_company($id)
    {
        if (intval($id) > 0) {

            if ($this->companies_model->Delete($id)) {

                $res = $this->notification_model->Search(array('noti_link' => site_url('companies/company_detail/' . $id)));
                if (!empty($res)) {
                    //                   print_r($res);exit();
                    $this->notification_model->Delete($res[0]->noti_id);
                }
                _setSuccess('Company Deleted Successfully');
            } else {
                _setError('Error Deleting Company');
            }
            redirect(site_url('companies'));
            exit();
        }
    }

    function saveJob()
    {
        $year = $this->input->post('year');
        $yearto = $this->input->post('yearto');
        $detail = $this->input->post('detail');

        if ($this->input->post('actioncall') == "savejob") {
            echo $data = $this->member_model->addMemberJob(array('je_member_id' => $this->session->userdata('user_id'), 'je_name' => $employer, 'je_year' => $year, 'je_toyear' => $yearto, 'je_descr' => $detail));
        }
    }

    function saveReviewComments()
    {
        if ($this->session->userdata('user_id') != "") {
            $review_id = $this->input->post('review_id');
            $comments = $this->input->post('comments');
            $data['profile'] = $this->job_model->saveComments(array('com_member_id' => $this->session->userdata('user_id'), 'com_type' => "review", 'com_job_id' => $review_id, 'com_comments' => $comments, 'com_add_date' => date("Y-m-d")));
            redirect(base_url() . 'review/' . $review_id);
        }
    }


    function applyOnline()
    {

        $to = $this->input->post('jobb_email_apply');
        $job_id = $this->input->post('jobb_id');
        $job_title = $this->input->post('jobb_name');
        $name = $this->input->post('name');
        $message = $this->input->post('message');
        $messageText = "";
        $messageText .= '<html><body>';
        $messageText .= "Dear Mr/Mrs,
        <br>      
        " . $message . "     
        <br>
        <br>
        Regards,
        <br>
        " . $name . "
        <br><br>";
        $messageText .= "'</html></body>";

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com', //
            'smtp_port' => 465,
            'smtp_user' => SMTP_USER, //
            'smtp_pass' => SMTP_PASSWORD, //
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $this->load->library("email", $config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->from("register@navafiz.com");
        $this->email->to($to);
        $this->email->subject("Cv for the " . $job_title);
        $this->email->message($messageText);
        $path = FCPATH . "assets/uploads/cvs/" . $this->session->userdata('cv');
        $this->email->attach($path);

        if ($this->email->send()) {
            $this->session->set_flashdata('msg', 'Hurrah your successfully apply for the job!');
            redirect('job/' . $job_id);
        } else {
            show_error($this->email->print_debugger());
            $this->session->set_flashdata('errormsg', 'Due to technical reason your message not sent . Please try again!');
            redirect('job/' . $job_id);
            exit;
        }
    }

    function reportAbuseForm($id)
    {
        $data['job'] = $this->job_model->getJobs(array('j_id' => $id));
        $this->load->view('reportabuse', $data);
    }

    function sendAbuseReport()
    {
        $job_id = $this->input->post('job_id');
        $reason = $this->input->post('survey');
        $report = $this->job_model->saveAbuseJob(array('ja_job_id' => $job_id, 'ja_member_id' => $this->session->userdata('user_id'), 'ja_reason' => $reason, 'ja_add_date' => date("Y-m-d")));
        if ($report) {
            $this->session->set_flashdata('msg', 'Your request send successfully for this job!');
            redirect(base_url() . 'job/report-abuse/' . $job_id);
            exit;
        }
    }

    function companyAjaxlist()
    {
        $keyword = $this->input->post('keyword');
        $companies_list = $this->companies_model->GetByAjax($keyword);
        $data['companies_list'] = $companies_list;
        $this->load->view('profile/company-list', $data);
    }


    public function resume_upload()
    {
        $company_id = $this->input->post('company_id', TRUE);
        // $logged_company_id = $this->session->userdata('user_id');

        // if (!$company_id || $company_id != $logged_company_id) {
        //     echo json_encode(['status' => 'error', 'message' => 'Unauthorized access.']);
        //     return;
        // }


        // Validation
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('whatsapp', 'WhatsApp Number', 'required');
        $this->form_validation->set_rules('cv', 'CV', 'callback_file_check_cv');

        if ($this->form_validation->run() === FALSE) {
            $errors = validation_errors();
            echo json_encode(['status' => 'error', 'message' => $errors]);
            return;
        }

        // Upload CV
        $cv_upload_data = $this->_upload_file('cv', 'cv_', 'pdf', 'navassets/uploads/cv/', $company_id);

        if (!$cv_upload_data) {
            echo json_encode(['status' => 'error', 'message' => 'CV upload failed.']);
            return;
        }

        $data = [
            'company_id' => $company_id,
            'name' => $this->input->post('name', TRUE),
            'email' => $this->input->post('email', TRUE),
            'whatsapp' => $this->input->post('whatsapp', TRUE),
            'cv' => $cv_upload_data['file_name'],
        ];

        if ($this->manpower_job_quota_model->insert_resume($data)) {
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
    private function _upload_file($field_name, $prefix, $allowed_types, $upload_path, $company_id = null)
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

        $filename = $prefix . $company_id . '_' . time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;

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


}

/* End of file front.php */
/* Location: ./application/controllers/front.php */