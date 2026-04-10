<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class job_seeker_requests_model extends CI_Model
{
    private $table = 'jb_job_seeker_requests';

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

    // Get total count (for pagination)
    public function get_total_count()
    {
        return $this->db->count_all($this->table);
    }

    // Get paginated records (DESC by id)
    public function get_all($limit, $start)
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table, $limit, $start);
        return $query->result();
    }

    // Get single record by ID
    public function get_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    // Get next record by ID
    public function get_next($id)
    {
        // Next = older record (smaller id)
        return $this->db
            ->where('id <', $id)
            ->order_by('id', 'DESC')
            ->limit(1)
            ->get($this->table)
            ->row();
    }

    // Get next record by ID
    public function get_prev($id)
    {
        // Previous = newer record (bigger id)
        return $this->db
            ->where('id >', $id)
            ->order_by('id', 'ASC')
            ->limit(1)
            ->get($this->table)
            ->row();
    }

    // Get current record position by ID
    public function get_position($id)
    {
        return $this->db
            ->where('id >=', $id)
            ->count_all_results($this->table);
    }

    // Update request status
    public function update_status($id, $status)
    {
        // Ensure valid status
        $valid_statuses = [1, 2, 3];
        if (!in_array($status, $valid_statuses)) {
            return false;
        }

        $this->db->where('id', $id);
        return $this->db->update($this->table, ['status' => $status]);
    }
}