<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload_resume_model extends CI_Model
{
    protected $table = 'jb_resume_submissions';

    public function insert_resume($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Optional for later admin listing
    public function get_all_resumes()
    {
        return $this->db->order_by('created_at', 'DESC')->get($this->table)->result();
    }
}