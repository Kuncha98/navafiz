<?php
#[\AllowDynamicProperties]
class Feed_model extends CI_Model
{

    function __construct()
    {
        $this->table_name = TABLE_PREFIX . 'feed';
        $this->table_id = 'feed_id';
    }

    public function GetAll()
    {
        $results = $this->db->order_by($this->table_id, 'desc')->get($this->table_name)->result();
        return $results;
    }


    public function GetById($id)
    {
        $user = $this->db->get_where($this->table_name, array($this->table_id => $id))->row();
        return $user;
    }

    public function GetFeedById($id)
    {
        $this->db->select('jb_member.m_id,jb_member.m_name,jb_member.m_avatar,jb_member.m_current_city,jb_member.m_profession,(select count(*) from jb_feed_likes where jb_feed.feed_id = jb_feed_likes.feed_id) as total_feed_likes,jb_feed.feed_id,jb_feed.feed_text,jb_feed.added_on as feed_added_date,jb_feed.user_id as feed_owner_id,jb_feed.feed_image');
        $this->db->from('jb_feed');
        //        $this->db->join('jb_feed_comments', 'jb_feed_comments.feed_id=jb_feed.feed_id');
        $this->db->join('jb_member', 'jb_member.m_id=jb_feed.user_id');
        $this->db->where('jb_feed.feed_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Search($where)
    {
        $orWhere = '';
        if (array_key_exists('status', $where)) {
            if (!empty($where['status'])) {
                $orWhere .= 'status = "' . $where['status'] . '"';
            }

            unset($where['status']);
        }

        $this->db->where($where);

        if ($orWhere != '') {
            $this->db->where($orWhere);
        }
        $this->db->order_by('add_date', 'DESC');
        $results = $this->db->get($this->table_name)->result();

        return $results;

    }

    public function deleteFeedLikes($user_id, $feed_id)
    {
        $this->db->where(array('user_id' => $user_id, 'feed_id' => $feed_id));
        if ($this->db->delete('jb_feed_likes')) {
            return true;
        } else {
            return false;
        }
    }

    public function SearchLikes($where)
    {
        $orWhere = '';
        if (array_key_exists('status', $where)) {
            if (!empty($where['status'])) {
                $orWhere .= 'status = "' . $where['status'] . '"';
            }

            unset($where['status']);
        }

        $this->db->where($where);

        if ($orWhere != '') {
            $this->db->where($orWhere);
        }
        $this->db->order_by('id', 'DESC');
        $results = $this->db->get('jb_feed_likes')->result();

        return $results;

    }

    public function FeedLikesMembers()
    {
        $this->db->select('jb_feed_likes.id, jb_feed_likes.feed_id, jb_member.m_name,jb_member.m_id,jb_member.m_avatar');
        $this->db->from('jb_member');
        $this->db->join('jb_feed_likes', 'jb_member.m_id = jb_feed_likes.user_id', 'inner');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function SearchByLimit($where, $limit, $start)
    {
        $this->db->where($where);
        $this->db->limit($limit, $start);
        $this->db->order_by('jb_feed.added_on', 'DESC');
        $this->db->select('jb_feed.*, jb_feed.added_on as feed_added_on,
        (select count(*) from jb_feed_likes where jb_feed.feed_id = jb_feed_likes.feed_id) as feed_likes, 
        (select count(*) from jb_feed_comments where jb_feed.feed_id = jb_feed_comments.feed_id) as comments_count, 
        jb_member.*');
        $this->db->from('jb_feed');
        $this->db->join('jb_member', 'jb_member.m_id = jb_feed.user_id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }


    public function Save($data, $id = 0)
    {
        if ($id == 0) {
            $this->db->insert($this->table_name, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->where($this->table_id, $id);
            $this->db->update($this->table_name, $data);
        }

        return $id;
    }

    public function SaveLikes($data, $id = 0)
    {
        if ($id == 0) {
            $this->db->insert('jb_feed_likes', $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            $this->db->update('jb_feed_likes', $data);
        }

        return $id;
    }

    public function Delete($id)
    {

        $this->db->where($this->table_id, $id);
        if ($this->db->delete($this->table_name)) {
            return true;
        } else {
            return false;
        }
    }

    // Fetch all the pending posts
    public function get_pending_feeds($limit, $offset)
    {
        $this->db->select('f.*, m.m_name as user_name');
        $this->db->from('jb_feed f');
        $this->db->join('jb_member m', 'm.m_id = f.user_id', 'left');
        $this->db->where('f.approval_status', 0);
        $this->db->where('f.del_status', 1);
        $this->db->order_by('f.feed_id', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result();
    }

    // Get the total count of pending posts
    public function count_pending_feeds()
    {
        $this->db->where('approval_status', 0);
        $this->db->where('del_status', 1);
        return $this->db->count_all_results('jb_feed');
    }

    // Add reward points
    public function add_reward_points($data)
    {
        $this->db->insert('jb_reward_points', $data);
    }

    // Fetch feed rewards
    public function get_feed_reward($feed_id)
    {
        $this->db->where('feed_id', $feed_id);
        return $this->db->get('jb_reward_points')->result();
    }

    // Fetch sum of all rewards
    public function get_total_points($user_id)
    {

        $this->db->select_sum('points');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', REWARD_STATUS_CLAIMED);
        $query = $this->db->get('jb_reward_points');

        // Get the row safely
        $row = $query->row();

        // Check if row exists and property is set
        if ($row && isset($row->points)) {
            // Return points as integer
            return (int) $row->points;
        }

        // If no row, return 0
        return 0;
    }

    // Check if user already received daily login reward today
    public function has_today_login_reward($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('action_type', 'daily_login');
        $this->db->where('DATE(created_at)', date('Y-m-d'));

        return $this->db->count_all_results('jb_reward_points') > 0;
    }

    // Create daily login reward
    public function create_daily_login_reward($user_id)
    {
        // prevent duplicates
        if ($this->has_today_login_reward($user_id)) {
            return false;
        }

        $data = [
            'user_id' => $user_id,
            'points' => 10,
            'action_type' => 'daily_login',
            'status' => REWARD_STATUS_PENDING,
            'created_at' => datenow(),
            'created_by' => $user_id
        ];

        return $this->db->insert('jb_reward_points', $data);
    }

    // Count pending login rewards
    // public function count_pending_login_rewards()
    // {
    //     $this->db->where('status', REWARD_STATUS_PENDING);
    //     $this->db->where('action_type', 'daily_login');
    //     return $this->db->count_all_results('jb_reward_points');
    // }

    // Get pending login rewards with user info
    // public function get_pending_login_rewards($limit, $offset)
    // {
    //     return $this->db
    //         ->select('jb_reward_points.*, users.name, users.email')
    //         ->join('users', 'users.id = jb_reward_points.user_id')
    //         ->where('jb_reward_points.status', REWARD_STATUS_PENDING)
    //         ->where('jb_reward_points.action_type', 'daily_login')
    //         ->limit($limit, $offset)
    //         ->order_by('jb_reward_points.created_at', 'DESC')
    //         ->get('jb_reward_points')
    //         ->result();
    // }


    // Fetch sum of pending rewards
    function get_pending_points($user_id)
    {
        $this->db->select_sum('points');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', REWARD_STATUS_PENDING);

        $result = $this->db->get('jb_reward_points')->row();

        return $result->points ? $result->points : 0;
    }

    // Fetch all the pending reward points
    // public function get_user_rewards($user_id)
    // {
    //     return $this->db
    //         ->where('user_id', $user_id)
    //         ->where('status', REWARD_STATUS_PENDING) // claimable
    //         ->order_by('created_at', 'DESC')
    //         ->get('jb_reward_points')
    //         ->result();
    // }
    public function get_user_rewards($user_id)
    {
        return $this->db
            ->select('jb_reward_points.*, jb_feed.feed_text')
            ->from('jb_reward_points')
            ->join('jb_feed', 'jb_feed.feed_id = jb_reward_points.feed_id', 'left')
            ->where('jb_reward_points.user_id', $user_id)
            ->where('jb_reward_points.status', REWARD_STATUS_PENDING)
            ->order_by('jb_reward_points.created_at', 'DESC')
            ->get()
            ->result();
    }

    // Fetch feed posts & jobs using match titles of the user
    public function searchFeedsAndJobsByProfessions($professions, $limit, $start)
    {
        // Stop if no professions
        if (empty($professions)) {
            return []; // return empty result
        }

        $feed_filter = "";
        $job_filter = "";

        if (!empty($professions)) {

            $feed_conditions = [];
            $job_conditions = [];

            foreach ($professions as $profession) {
                $profession = $this->db->escape_like_str($profession);

                // Feed condition
                $feed_conditions[] = "jb_feed.feed_text LIKE '%$profession%'";

                // Job condition
                $job_conditions[] = "
                jb_jobs.j_title LIKE '%$profession%' 
                OR jb_jobs.j_tags LIKE '%$profession%' 
                OR jb_jobs.j_descr LIKE '%$profession%'
            ";
            }

            // Combine with OR
            $feed_filter = "AND (" . implode(" OR ", $feed_conditions) . ")";
            $job_filter = "AND (" . implode(" OR ", $job_conditions) . ")";
        }

        $sql = "
            SELECT * FROM (

                (SELECT 
                    jb_feed.feed_id AS id,
                    NULL AS title,
                    jb_feed.feed_text AS description,
                    UNIX_TIMESTAMP(jb_feed.added_on) AS created_on,
                    'feed' AS source,
                    jb_member.m_id,
                    jb_member.m_name
                FROM jb_feed
                INNER JOIN jb_member 
                    ON jb_member.m_id = jb_feed.user_id
                WHERE 1=1 $feed_filter
                ORDER BY jb_feed.added_on DESC
                LIMIT 500)

                UNION ALL

                (SELECT 
                    jb_jobs.j_id AS id,
                    jb_jobs.j_title AS title,
                    jb_jobs.j_descr AS description,
                    jb_jobs.j_add_date AS created_on,
                    'job' AS source,
                    NULL AS m_id,
                    NULL AS m_name
                FROM jb_jobs
                WHERE 1=1 $job_filter
                ORDER BY jb_jobs.j_add_date DESC
                LIMIT 500)

            ) AS combined

            ORDER BY created_on DESC
            LIMIT $start, $limit
        ";
        // LIMIT $start, $limit

        return $this->db->query($sql)->result();
    }

    // Fetch limited records
    public function getLatestFeeds($limit = 12, $offset = 0)
    {
        $this->db->select('
        f.feed_id,
        f.user_id,
        f.feed_text,
        f.feed_image,
        f.feed_video,
        f.feed_link,
        f.feed_views,
        f.added_on,

        u.m_id,
        u.m_name,
        u.m_avatar,
        u.m_profession,

        (SELECT COUNT(*) 
         FROM jb_feed_likes fl 
         WHERE fl.feed_id = f.feed_id
        ) AS like_count,

        (SELECT COUNT(*) 
         FROM jb_feed_comments fc 
         WHERE fc.feed_id = f.feed_id
        ) AS comment_count
    ');

        $this->db->from('jb_feed f');
        $this->db->join('jb_member u', 'u.m_id = f.user_id', 'left');

        $this->db->where('f.del_status', 1);
        $this->db->where('f.approval_status', 1);

        $this->db->order_by('f.added_on', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result();
    }
}
?>