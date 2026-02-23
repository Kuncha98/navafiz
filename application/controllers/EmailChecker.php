<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailChecker extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Member_model'); // Ensure correct case
        $this->load->library('email');
    }
    
    public function checkEmails() {
        $hostname = '{mail.navafiz.com:993/imap/ssl/novalidate-cert}INBOX';
        $username = 'usman@navafiz.com';
        $password = 'Navafiz@123.';

        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect to mail: ' . imap_last_error());

        $emails = imap_search($inbox, 'UNSEEN');

        if ($emails) {
            rsort($emails);

            foreach ($emails as $email_number) {
                $overview = imap_fetch_overview($inbox, $email_number, 0);
                $message  = imap_fetchbody($inbox, $email_number, 1);
                $from     = $overview[0]->from;
                $subject  = $overview[0]->subject;

                preg_match('/<(.*?)>/', $from, $matches);
                $senderEmail = isset($matches[1]) ? $matches[1] : $from;

                if (stripos($message, 'code') !== false || stripos($subject, 'code') !== false) {
                    $user = $this->Member_model->get_user_by_email($senderEmail);

                    if ($user && isset($user->m_verification)) {
                        $this->sendEmail($senderEmail, $user->m_verification);
                    }
                }

                imap_setflag_full($inbox, $email_number, "\\Seen");
            }
        }

        imap_close($inbox);
        echo "Email check completed.";
    }

    private function sendEmail($to, $code) {
        $this->load->library('email');
    
        $config = array(
            'protocol'    => 'smtp',
            'smtp_host'   => 'mail.navafiz.com',
            'smtp_port'   => 465, 
            'smtp_user'   => 'usman@navafiz.com',
            'smtp_pass'   => 'Navafiz@123.',
            'smtp_crypto' => 'ssl', 
            'mailtype'    => 'text',
            'charset'     => 'utf-8',
            'newline'     => "\r\n",
            'wordwrap'    => TRUE
        );
    
        $this->email->initialize($config); 
        $this->email->clear();
    
        
        $this->email->from('usman@navafiz.com', 'NAVAFIZ Support Team', FALSE);
        $this->email->to($to);
        $this->email->cc('info@navafiz.com');
        $this->email->subject('Your Activation Code');
        $this->email->message("Dear user,\n\nYour activation code is: $code\n\nBest regards,\nNAVAFIZ Support Team");
    
        if (!$this->email->send()) {
            log_message('error', 'Email failed: ' . $this->email->print_debugger());
            return false;
        }
        return true;
    }
}
