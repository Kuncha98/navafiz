<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class premium_service_orders_model extends CI_Model
{
    private $table = 'jb_premium_service_orders';

    public function __construct()
    {
        parent::__construct();
    }

    // Get status pending count
    public function get_status_pending_count()
    {
        $this->db->where('status', 'pending');
        return $this->db->count_all_results($this->table);
    }

    // Get total count (for pagination)
    public function get_orders()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get('jb_premium_service_orders')
            ->result();
    }

    public function get_order($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('jb_premium_service_orders')
            ->row();
    }

    public function get_order_items($order_id)
    {
        return $this->db
            ->where('order_id', $order_id)
            ->get('jb_premium_service_order_items')
            ->result();
    }

    public function get_order_meta($order_id)
    {
        return $this->db
            ->where('order_id', $order_id)
            ->get('jb_premium_service_order_item_meta')
            ->result();
    }

    public function update_status($order_id, $status)
    {
        return $this->db
            ->where('id', $order_id)
            ->update('jb_premium_service_orders', [
                'status' => $status
            ]);
    }
}