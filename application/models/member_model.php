<?php
/**
 * Admin_Model
 *
 * @package Admin
 *
 */
#[\AllowDynamicProperties]
class Member_Model extends CI_Model
{
    /** Utility Methods **/
    function _required($required, $data)
    {
        foreach ($required as $field)
            if (!isset($data[$field]))
                return false;

        return true;
    }

    function addCvResponse($options = array())
    {
        $this->db->insert($this->db->dbprefix('responsecvreview'), $options);
        //	echo $this->db->last_query();
        $id = $this->db->insert_id();
        return $id;
    }

    function getForms($options = array())
    {
        if (isset($options['ss_id']))
            $this->db->where('ss_id', $options['ss_id']);
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('successstory'));
        $this->db->order_by("ss_id", "DESC");
        if (isset($options['limit']))
            $this->db->limit($options['limit']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            if (isset($options['ss_id']) && $options['ss_id'] != "")
                return $query->row(0);

            return $query->result();
        } else
            return 'empty';
    }




    function loginAjax($options = array())
    {

        $query = $this->db->query("SELECT * from jb_member where m_email='" . $options['email'] . "' and m_password='" . $options['password'] . "'  and m_status=1");

        if ($query->num_rows() > 0) {
            $user = $query->row();
            $query2 = $this->db->query("UPDATE jb_member SET m_last_login= '" . time() . "' WHERE m_id = '" . $user->m_id . "'");

            $user_session_data = array(
                'user_id' => $user->m_id,
                'email' => $user->m_email,
                'login_type' => "normal",
                'cat_id' => $user->m_category,
                'name' => $user->m_name,
                'cv' => $user->member_cv,
                'facebook_id' => $user->facebook_id,
                'avatar' => $user->m_avatar,
            );

            $this->session->set_userdata($user_session_data);
            return 1;
        } else {
            $query = $this->db->query("SELECT * from jb_member where m_email='" . $options['email'] . "' and m_password='" . $options['password'] . "'  and m_status=0");
            if ($query->num_rows() > 0) {

                return 2;
            } else {
                return 0;
            }
        }
    }
    function checkEmailAvailable($options = array())
    {
        $query = $this->db->query("SELECT * from jb_member where m_email='" . $options['email'] . "'");
        if ($query->num_rows() > 0)
            echo 1;
        else
            echo 0;
    }

    function registerProgram($options = array())
    {
        $query = $this->db->query("SELECT * from jb_event_subscribers where pu_event_id ='" . $options['pu_event_id'] . "'  AND pu_member_id='" . $this->session->userdata('user_id') . "'");
        if ($query->num_rows() > 0) {
            _setError('You already registered for this event');
            $return = 0;
        } else {

            $event_id = $options['event_id'];
            unset($options['event_id']);
            $this->db->insert($this->db->dbprefix('event_subscribers'), $options);
            $id = $this->db->insert_id();

            $user_sess_name = $this->session->userdata('name');
            $user_id = $this->session->userdata('user_id');
            $noti['user_id'] = $user_id;
            $noti['noti_title'] = $user_sess_name . " Booked a Seat to join the Event.";
            $noti['noti_desc'] = $user_sess_name . " Booked a Seat to join the Event.";
            $noti['noti_type'] = 'events';
            $noti['noti_link'] = site_url('event/view/' . $event_id);
            AddNotification($noti);

            _setSuccess("Event Registration completed successfully!");
            $return = 1;


        }

        return $return;
    }
    function registerAjax($options = array())
    {

        $query1 = $this->db->query("SELECT m_email from jb_member where m_email='" . $options['m_email'] . "'");
        if ($query1->num_rows() > 0) {
            return 0;
        } else {
            $this->db->query("INSERT INTO jb_member (m_name, m_email, m_password, m_add_date) VALUES ('" . $options['m_name'] . "', '" . $options['m_email'] . "', '" . $options['m_password'] . "',  '" . time() . "')");
            $user_id = $this->db->insert_id();
            $mail_send_text = rand(10000, 99999);
            $to = $options['m_email'];
            $subject = "Thanks " . $options['m_name'] . "";
            $messageText .= '<html><body>';
            $messageText .= "Dear " . $options['m_name'] . ",
            <br><br><br>
              Thank you for registering with Navafiz!
            <br><br>
            Here is your Registeration code '" . $mail_send_text . "' or copy and paste the url in the browser: " . base_url() . "user/verify/" . "
            <br>
            Regards,
            <br><br>
            The Navafiz Team
            <br><br>
            *This message was sent by an automated mail server. Please do not reply.
            <br>";

            $messageText .= "'</html></body>";
            $config = array(
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );

            $config['newline'] = "\r\n";
            $config['crlf'] = "\r\n";

            $this->load->library("email", $config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");
            $this->email->from('register@navafiz.com');
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($messageText);

            if ($this->email->send()) {
                $query = $this->db->query("UPDATE jb_member SET m_verification = '" . $mail_send_text . "' WHERE m_id = '" . $user_id . "'");
                if ($this->db->affected_rows()) {
                    return 1;
                }
            } else {
                show_error($this->email->print_debugger());
                return 0;
            }
        }
    }
    public function verifyLink($options = array())
    {
        $query = $this->db->query("SELECT * from jb_member where m_verification='" . $options['m_verification'] . "'");
        if ($query->num_rows() > 0) {
            $query = $this->db->query("UPDATE jb_member SET m_status = '1' WHERE m_verification = '" . $options['m_verification'] . "'");
            if ($this->db->affected_rows()) {
                return 1;
            }
        }
    }

    public function updateReviewStatus($options = array())
    {
        $query = $this->db->query("UPDATE jb_cvreview SET cv_status = '0' WHERE cv_id = '" . $options['cv_id'] . "'");
        if ($this->db->affected_rows())
            return 1;
    }
    function addShout($options = array())
    {
        $this->db->insert($this->db->dbprefix('shoutbox'), $options);
        //	echo $this->db->last_query();
        $id = $this->db->insert_id();
        return $id;
    }

    function addMemberSkill($options = array())
    {
        $this->db->insert($this->db->dbprefix('member_skills'), $options);
        //	echo $this->db->last_query();
        $id = $this->db->insert_id();
        return $id;
    }

    function updateMemberSkill($options = array())
    {
        if (isset($options['m_skills']))
            $this->db->set('m_skills', $options['m_skills']);
        $this->db->where('m_id', $this->session->userdata('user_id'));
        $this->db->update($this->db->dbprefix('member'));
        $affected_rows = $this->db->affected_rows();
        return $affected_rows;
    }

    function updateMemberBranding($options = array())
    {
        if (isset($options['m_branding'])) {
            $this->db->set('m_branding', $options['m_branding']);
        }

        $this->db->where('m_id', $this->session->userdata('user_id'));
        $this->db->update($this->db->dbprefix('member'));

        return $this->db->affected_rows();
    }
    function getMemberEducation($user_id)
    {

        $query = $this->db->select('*')
            ->from('member_education')
            ->where('me_member_id', $user_id)
            ->get();

        return $query->result();

    }
    function getMemberByID($id)
    {
        $query = $this->db->select('*')
            ->from('member_education')
            ->where('me_id', $id)
            ->get();

        return $query->row_array();
    }

    function get_mem_profile($id)
    {
        $query = $this->db->select('*')
            ->from('jb_member')
            ->where('m_id', $id)
            ->get();

        return $query->row_array();
    }


    function updateEducation($data)
    {
        $this->db->where('me_id', $data['me_id'])->update('member_education', $data);
    }
    function deleteEducation($id)
    {
        $this->db->where('me_id', $id)->delete('member_education');
    }
    function addMemberEducation($options = array())
    {
        $this->db->insert($this->db->dbprefix('member_education'), $options);
        //	echo $this->db->last_query();
        $id = $this->db->insert_id();
        return $id;
    }


    function updateMemberEducation($options = array())
    {


        //echo "mmmmmmmmmmmmm";
        //exit;
        if (isset($options['me_degree']))
            $this->db->set('me_degree', $options['me_degree']);

        if (isset($options['me_year']))
            $this->db->set('me_year', $options['me_year']);

        if (isset($options['me_descr']))
            $this->db->set('me_descr', $options['me_descr']);



        $this->db->where('me_id', $options['me_id']);
        $this->db->update($this->db->dbprefix('member_education'));
        $affected_rows = $this->db->affected_rows();
        //		echo $this->db->last_query();
        return $affected_rows;




    }

    function addMemberJob($options = array())
    {
        $this->db->insert($this->db->dbprefix('member_jobs'), $options);
        echo $this->db->last_query();
        $id = $this->db->insert_id();
        return $id;
    }

    function updateMemberJob($options = array())
    {


        //echo "mmmmmmmmmmmmm";
        //exit;
        if (isset($options['je_name']))
            $this->db->set('je_name', $options['je_name']);
        if (isset($options['je_year']))
            $this->db->set('je_year', $options['je_year']);
        if (isset($options['je_toyear']))
            $this->db->set('je_toyear', $options['je_toyear']);
        if (isset($options['je_descr']))
            $this->db->set('je_descr', $options['je_descr']);



        $this->db->where('je_id', $options['je_id']);
        $this->db->update($this->db->dbprefix('member_jobs'));
        $affected_rows = $this->db->affected_rows();
        //echo $this->db->last_query();
        return $affected_rows;




    }
    // MODEL (CPANEL SMTP – WORKING)
    function forgotpassword($options = array())
    {
        $query = $this->db->query("SELECT * FROM jb_member WHERE m_email='" . $options['email'] . "'");

        if ($query->num_rows() == 0) {
            return false;
        }

        $row = $query->row();

        if ($row->m_status == 2) {
            return false;
        }

        $this->load->library('email');

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

        $this->email->initialize($config);
        $this->email->clear(TRUE);

        $this->email->from('web.support@navafiz.com', 'Navafiz');
        $this->email->to($row->m_email);
        $this->email->subject('Forget password for navafiz account with name ' . $row->m_name);

        $message = "
        <html>
        <body>
            Dear {$row->m_name},<br><br>
            Your password information is:<br><br>
            <strong>Password:</strong> {$row->m_password}<br><br>
            Regards,<br>
            The Navafiz Team
        </body>
        </html>
    ";

        $this->email->message($message);

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
            exit;
        }

        return true;
    }




    function updateactivationcode($options = array())
    {
        $empty_arr = array();
        $query1 = $this->db->query("SELECT * from jb_member where m_email='" . $options['email'] . "'");
        if ($query1->num_rows() > 0) {
            $row = $query1->row(0);
            $mail_send_text = rand(10000, 99999);
            $this->db->query("UPDATE jb_member SET m_verification = '" . $mail_send_text . "' WHERE m_id = '" . $row->m_id . "'");
            return $row;
        } else {
            return 0;
        }
    }

    function JobAlert()
    {
        $today_date = date('Y m d');
        $query1 = $this->db->query("SELECT * from jb_jobs where DATE_FORMAT( FROM_UNIXTIME(j_add_date) , '%Y %m %d' ) ='$today_date'");
        if ($query1->num_rows() > 0) {
            $jobs = $query1->result();
            foreach ($jobs as $job) {
                $cat_id = $job->cat_id;
                //echo $job_title = $job->j_title;	
                //echo $job->j_title;
                $query2 = $this->db->query("SELECT * from jb_member where m_category ='" . $cat_id . "' AND m_status = 1");
                if ($query2->num_rows() > 0) {
                    $members = $query2->result();

                    foreach ($members as $member) {
                        $to = $member->m_email;
                        $subject = "Job Alert related to you " . $job->j_title;
                        $messageText = "Dear " . $member->m_name . ",
					    <br><br><br>
						New Jobs Matching your Profile" . $job->j_title . "
					    <br><br>
					    Please click the link to view the job detail or copy and paste the url in the browser: " . base_url() . "job/" . $job->j_id . "
					    <br>
					    Regards,
					    <br><br>
					    The Navafiz Team
					    <br><br>
					   *This message was sent by an automated mail server. Please do not reply.
					    <br>";


                        $config = array(
                            'protocol' => 'smtp',
                            'smtp_host' => 'host256.hostmonster.com',		//'ssl://smtp.secureserver.net',					//'ssl://ureserver.net',
                            'smtp_port' => 25,
                            'smtp_user' => 'register@navafiz.com',
                            'smtp_pass' => 'V(fJh()VT68F',
                            'mailtype' => 'html',
                            'charset' => 'iso-8859-1'
                        );





                        $config['newline'] = "\r\n";
                        $config['crlf'] = "\r\n";

                        $this->load->library("email", $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from('register@navafiz.com');
                        $this->email->to($to);
                        $this->email->subject($subject);
                        $this->email->message($messageText);

                        if ($this->email->send()) {
                            //$query = $this->db->query("UPDATE jb_member SET m_verification = '".$mail_send_text."' WHERE m_id = '".$user_id."'");
                            //if($this->db->affected_rows())
                            return 1;
                        } else {
                            show_error($this->email->print_debugger());
                            return 0;
                        }
                    }
                }
            }
            //	return 0;
        }
    }

    function updateReference($options = array())
    {
        if (isset($options['name']))
            $this->db->set('m_ref_name', $options['name']);
        if (isset($options['occupation']))
            $this->db->set('m_ref_occupation', $options['occupation']);
        if (isset($options['relation']))
            $this->db->set('m_ref_relation', $options['relation']);








        $this->db->where('m_id', $options['m_id']);
        $this->db->update($this->db->dbprefix('member'));
        $affected_rows = $this->db->affected_rows();
        //	echo $this->db->last_query();
        //	return  $affected_rows;
        return 1;


    }

    function updateprofileAjax($options = array())
    {

        $this->db->where('m_id', $options['m_id']);
        $this->db->update($this->db->dbprefix('member'), $options);
        $affected_rows = $this->db->affected_rows();
        return $affected_rows;
    }

    function getRelatedMember($options = array())
    {

        if (isset($options['cat_id']) && $options['cat_id'] != "")
            $this->db->where('m_category', $options['cat_id']);


        $this->db->where('m_status', 1);

        $this->db->select('*');
        $this->db->from('jb_member');
        $this->db->join('jb_categories', 'jb_member.m_category = jb_categories.c_id');
        $this->db->limit(8, 0);

        $query = $this->db->get();
        // echo $this->db->last_query();
        // exit;
        if ($query->num_rows() > 0) {

            return $query->result();
        } else
            return "empty";
    }

    function getProfileRelatedMember($options = array())
    {

        if (isset($options['cat_id']) && $options['cat_id'] != "") {

            $this->db->where('m_category', $options['cat_id']);
            $this->db->where('m_status', 1);
            $this->db->select('*');
            $this->db->from('jb_member');
            $this->db->join('jb_categories', 'jb_member.m_category = jb_categories.c_id');
            $this->db->where('m_id !=', $options['profile_id']);
            $this->db->order_by('rand()');
            $this->db->limit(6, 0);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return "empty";
            }
        }
    }

    function getUserListRelatedMembers($options = array())
    {

        if (isset($options['list_id']) && $options['list_id'] != "") {

            $this->db->where('list_id', $options['list_id']);
            $this->db->select('member_id,m_name,m_profession,m_current_city,m_avatar');
            $this->db->from('jb_member_by_list');
            $this->db->join('jb_member', 'jb_member_by_list.member_id = jb_member.m_id');
            $this->db->where('jb_member.m_id !=', $options['profile_id']);
            $this->db->order_by('rand()');
            $this->db->limit(6, 0);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return "empty";
            }
        }
    }


    function updateForm($options = array())
    {
        $this->db->query("update jb_member set member_cv = '" . $options['member_cv'] . "' WHERE m_id ='" . $this->session->userdata('user_id') . "'");


        echo "updated";

    }

    function updatepasswordAjax($options = array())
    {

        $ip_address = $_SERVER["REMOTE_ADDR"];

        $this->db->query("update al_member set password = '" . $options['password'] . "' WHERE id ='" . $options['user_id'] . "'");


        echo "updated";


    }


    function getPollMemberRefer($options = array())
    {
        $query = $this->db->query("SELECT count(*) AS tot_member from jb_poll_answers where pr_refer_user_id=" . $this->session->userdata('user_id') . "");
        $row = $query->row();
        return $row->tot_member;





        // }
    }
    function getTotalMembers($options = array())
    {
        /*  $query = $this->db->query("SELECT count(*) AS tot_member from `jb_member` where m_status=1");
          $row = $query->row();
          return $row->tot_member;
           // }*/


        if (isset($options['limit']) && isset($options['offset']))
            $this->db->limit($options['limit'], $options['offset']);

        if (isset($options['limit']))
            $this->db->limit($options['limit']);
        if (isset($options['status']))
            $this->db->where('m_status', 1);
        if (isset($options['cat_id']) && $options['cat_id'] != "")
            $this->db->where('m_category', $options['cat_id']);
        if (isset($options['profession']) && $options['profession'] != "")
            $this->db->like('m_profession', $options['profession']);

        if (isset($options['s_location']) && $options['s_location'] != "")
            $this->db->like('s_location', $options['s_location']);


        if (isset($options['id']))
            $this->db->where('m_id', $options['id']);
        if (isset($options['password']))
            $this->db->where('password', $options['password']);

        $this->db->select('count(*)  AS tot_member');
        $this->db->from('jb_member');
        $this->db->join('jb_country', 'jb_member.country_id = jb_country.id', 'left');

        $this->db->order_by("m_id", "DESC");
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            // if(isset($options['id']) || isset($options['login_id']))
            return $query->row('tot_member');

            //return $->tot_member;
        } else
            return "empty";




    }
    function getMembers($options = array())
    {

        if (isset($options['limit']) && isset($options['offset']))
            $this->db->limit($options['limit'], $options['offset']);

        if (isset($options['limit'])) {
            $this->db->limit($options['limit']);
        }
        $this->db->where('m_status', 1);
        if (isset($options['cat_id']) && $options['cat_id'] != "") {
            $this->db->where('m_category', $options['cat_id']);
        }

        if (isset($options['profession']) && $options['profession'] != "") {
            $this->db->like('m_profession', $options['profession']);
            $this->db->or_like('m_name', $options['profession']);
        }

        if (isset($options['s_location']) && $options['s_location'] != "") {
            $this->db->like('s_location', $options['s_location']);
        }

        if (isset($options['id'])) {
            $this->db->where('m_id', $options['id']);
        }

        if (isset($options['password'])) {
            $this->db->where('password', $options['password']);
        }

        $this->db->select('*');
        $this->db->from('jb_member');
        $this->db->join('jb_country', 'jb_member.country_id = jb_country.id', 'left');
        $this->db->order_by("rand ()");
        $query = $this->db->get();
        // echo $this->db->last_query($query);
        if ($query->num_rows() > 0) {
            if (isset($options['id']) || isset($options['login_id']))
                return $query->row(0);

            return $query->result();
        } else {
            return "empty";
        }
    }

    function getSearchMembers($options = array())
    {

        $this->db->where('m_status', 1);
        if (isset($options['cat_id'])) {
            $this->db->where('m_category', $options['cat_id']);
        }
        if (isset($options['profession'])) {
            $this->db->like('m_profession', $options['profession']);
        }

        $this->db->select('*');
        $this->db->from('jb_member');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return "empty";
        }
    }

    function userDetail($options = array())
    {

        if (isset($options['user_id'])) {
            $this->db->where('m_id', $options['user_id']);
        }
        $this->db->select('*');
        $this->db->from('jb_member');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return 'empty';
        }
    }
    function userListCat($id)
    {

        $query = $this->db->query('select list_id from jb_member_by_list where member_id = ' . $id);
        $user_list_cat = $query->result();
        return $user_list_cat;
    }


    function userDetailApi($options = array())
    {

        if (isset($options['user_id'])) {
            $this->db->where('m_id', $options['user_id']);
        }
        $this->db->select('m_name,m_email,gender,m_category,industry1,industry2,m_profession,m_experience,uae_experience,m_employer,employment_status,m_nationality,country_id,m_city,m_phone,'
            . 'visa_status,m_current_city,m_current_country_id,m_married_status,m_driving_lisence,m_languages,linkedin_profile_link,youtube_cv_link,profession1,profession2,profession3,profession4,profession5');
        $this->db->from('jb_member');
        //        $this->db->join('jb_categories', 'jb_member.m_category = jb_categories.c_id','left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return 'empty';
        }
    }



    public function save_profile_views($id)
    {
        $this->db->select('*');
        $this->db->from('jb_member');
        $this->db->where('m_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            $count = $result->m_profile_view + 1;
            $array = array(
                'm_profile_view' => $count
            );
            $this->db->where('m_id', $id);
            $this->db->update('jb_member', $array);

        } else {
            $array = array(
                'm_profile_view' => 1
            );
            $this->db->insert('m_member', $array);
        }
    }

    function getRelatedProfiles($options = array())
    {

        if (isset($options['cat_id']) && $options['cat_id'] != "" && $options['cat_id'] != 0)
            $this->db->where('m_category', $options['cat_id']);


        $this->db->where('m_status', 1);

        $this->db->select('*');
        $this->db->from('jb_member');
        $this->db->join('jb_categories', 'jb_member.m_category = jb_categories.c_id');
        $this->db->limit(20, 0);
        $this->db->where('jb_member.m_avatar is not null');
        $this->db->order_by('rand()');
        $query = $this->db->get();
        //  echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            // if(isset($options['id']) || isset($options['login_id']))
            //return $query->row(0);

            return $query->result();
        } else
            return "empty";
    }
    function removeEmployer($options = array())
    {
        if (isset($options['je_id'])) {
            $this->db->where('je_id', $options['je_id']);
            $this->db->delete($this->db->dbprefix('member_jobs'));
            return 1;
        }
    }
    function removeEducation($options = array())
    {
        if (isset($options['me_id'])) {
            $this->db->where('me_id', $options['me_id']);
            $this->db->delete($this->db->dbprefix('member_education'));
            return 1;
        }
    }


    function getCountries()
    {

        if (isset($options['country_id']))
            $this->db->where('country_id', $options['country_id']);


        $this->db->select('*');
        $this->db->from('jb_country');


        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            if (isset($options['country_id']) || isset($options['country_id']))
                return $query->row(0);

            return $query->result();
        } else
            return false;
    }


    function getStroy($options = array())
    {

        if (isset($options['ss_status']))
            $this->db->where('ss_status', $options['ss_status']);
        if (isset($options['user_id']))
            $this->db->where('ss_member_id', $options['user_id']);

        $this->db->select('*');
        $this->db->from($this->db->dbprefix('successstory'));
        $this->db->join('jb_member', 'jb_successstory.ss_member_id = jb_member.m_id');

        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            if (isset($options['user_id']))
                return $query->row(0);

            return $query->result();
        } else
            return false;
    }

    function getStoryLimit($options = array(), $limit, $start)
    {

        if (isset($options['ss_status']))
            $this->db->where('ss_status', $options['ss_status']);
        if (isset($options['user_id']))
            $this->db->where('ss_member_id', $options['user_id']);
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('successstory'));
        $this->db->join('jb_member', 'jb_successstory.ss_member_id = jb_member.m_id');

        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            if (isset($options['user_id']))
                return $query->row(0);

            return $query->result();
        } else
            return false;
    }

    function status_change_active($id)
    {

        if (!empty($id)) {
            $this->db->set('ss_status', 0);
            $this->db->where('ss_member_id', $id);
            $this->db->update('jb_successstory');
        }

    }


    function status_change_deactive($id)
    {
        //        echo $id;
//        exit();
        if (!empty($id)) {
            $this->db->set('ss_status', 1);
            $this->db->where('ss_member_id', $id);
            $this->db->update('jb_successstory');
        }

    }

    function SaveStory($data)
    {
        $this->db->insert('jb_successstory', $data);
        $id = $this->db->insert_id();
    }


    public function Delete_story($id)
    {

        $this->db->where('ss_id', $id);
        if ($this->db->delete('jb_successstory')) {
            return true;
        } else {
            return false;
        }
    }

    public function Delete_member($id)
    {

        $this->db->where('m_id', $id);
        if ($this->db->delete('jb_member')) {
            return true;
        } else {
            return false;
        }
    }

    function GetAllStories()
    {
        $results = $this->db->get('jb_successstory')->result();
        return $results;
    }
    function updateStory($options = array())
    {

        $query = $this->db->query("SELECT * from  jb_successstory where ss_member_id='" . $options['ss_member_id'] . "'");
        if ($query->num_rows() > 0) {
            $user = $query->row();
            $query2 = $this->db->query("UPDATE jb_successstory SET ss_subject= '" . $options['ss_subject'] . "',ss_descr= '" . $options['ss_descr'] . "' WHERE ss_member_id = '" . $options['ss_member_id'] . "'");
            //$query2->row(); 
            // echo $this->db->last_query();
            return 1;
            //redirect(base_url());
        } else {
            $this->db->insert($this->db->dbprefix('successstory'), $options);
            //	echo $this->db->last_query();
            $id = $this->db->insert_id();
            // return 0;
            //
        }



    }

    public function Save($data, $m_id = 0)
    {
        if ($m_id > 0) {
            $this->db->where('m_id', $m_id);
            $this->db->update('jb_member', $data);
            $member_id = $m_id;
        } else {
            $this->db->insert($data);
            $member_id = $this->db->insert_id();
        }
        return $member_id;
    }


    public function DeleteUser($member_id)
    {

        $this->db->where('m_id', $member_id);
        if ($this->db->delete('jb_member')) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user_by_email($email)
    {
        $this->db->where('m_email', $email);
        $query = $this->db->get('jb_member');
        return $query->row(); // Returns a single row object
    }


}
?>