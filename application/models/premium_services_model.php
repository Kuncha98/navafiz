<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class premium_services_model extends CI_Model
{
    private $table = 'jb_premium_services';

    public function __construct()
    {
        parent::__construct();
    }

    // Get total count (for pagination)
    public function get_services()
    {
        $this->db->select('s.*, c.name AS category_name'); // select all service fields + category name
        $this->db->from($this->table . ' s');              // services table alias as 's'
        $this->db->join('jb_premium_service_categories c', 'c.id = s.category_id', 'left'); // join category table
        $this->db->where('s.status', 1);
        $this->db->order_by('c.name', 'ASC'); // optional: order by category name
        $this->db->order_by('s.name', 'ASC'); // optional: order services by name
        $query = $this->db->get();
        return $query->result();
    }

    public function get_service($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row();
    }
}