<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job_requests_model extends CI_Model
{
    private $table = 'jb_job_requests';

    public function __construct()
    {
        parent::__construct();
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
}