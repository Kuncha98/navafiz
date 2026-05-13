<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload_resume_model extends CI_Model
{
    protected $table = 'jb_resume_submissions';

    public function __construct()
    {
        parent::__construct();
    }

    // Check email exists
    public function email_exists($email)
    {
        return $this->db->where('email', $email)
            ->get($this->table)
            ->num_rows() > 0;
    }

    public function insert_resume($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Get total count (for pagination)
    public function get_total_count()
    {
        return $this->db->count_all($this->table);
    }

    // Optional for later admin listing
    // public function get_all_resumes()
    // {
    //     return $this->db->order_by('created_at', 'DESC')->get($this->table)->result();
    // }

    // Get paginated records (DESC by id)
    public function get_all($limit, $start)
    {
        // $this->db->where('status !=', 2);
        // $this->db->where('status IS NOT NULL', null, false);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table, $limit, $start);
        return $query->result();
    }
}