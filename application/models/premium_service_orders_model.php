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

    public function get_member_discount($user_id, $total)
    {
        $discount = 0;



        if (!$user_id) {
            return [
                'percent' => 0,
                'amount' => 0,
                'final' => $total
            ];
        }

        // Get member
        $member = $this->db
            ->where('m_id', $user_id)
            ->get('jb_member')
            ->row();

        if (!$member) {
            return [
                'percent' => 0,
                'amount' => 0,
                'final' => $total
            ];
        }

        /**
         * -----------------------------
         * 10% First Referred Purchase
         * -----------------------------
         */

        $this->db->where('user_id', $user_id);
        $this->db->where_in('status', ['paid', 'completed']);
        $count = $this->db->count_all_results('jb_premium_service_orders');



        if ($count == 0 && !empty($member->referral_id)) {
            $discount = 10;
        }



        /**
         * -----------------------------
         * 20% Referrer Reward
         * -----------------------------
         */

        $sql = "
        SELECT COUNT(DISTINCT m.m_id) as total
        FROM jb_member m
        JOIN jb_premium_service_orders o ON o.user_id = m.m_id
        WHERE m.referral_id = ?
        AND o.status IN ('paid','completed')
    ";

        $row = $this->db->query($sql, [$user_id])->row();

        if ($row && $row->total >= 2) {
            $discount = max($discount, 20);
        }

        $discount_amount = ($total * $discount) / 100;
        $final = $total - $discount_amount;

        return [
            'percent' => $discount,
            'amount' => $discount_amount,
            'final' => $final
        ];
    }
}