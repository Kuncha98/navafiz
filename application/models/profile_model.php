<?php
#[\AllowDynamicProperties]
class Profile_model extends CI_Model
{

    function __construct()
    {
        $this->table_name = TABLE_PREFIX . 'member';
        $this->table_id = 'm_id';
    }


    function Is_already_register($id)
    {
        $this->db->where('oauth_uid', $id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_google_user($data, $id)
    {
        $this->db->where('oauth_uid', $id);
        $this->db->update($this->table_name, $data);
    }

    function Insert_user_data($data)
    {
        $this->db->insert($this->table_name, $data);
    }

    public function GetAll()
    {
        $results = $this->db->get($this->table_name)->result();
        return $results;
    }


    public function GetById($id)
    {
        $user = $this->db->get_where($this->table_name, array($this->table_id => $id))->row();
        return $user;
    }

    public function GetFullProfile($id)
    {
        $user = $this->db->get_where($this->table_name, array($this->table_id => $id))->row();
        return $user;
    }

    // public function Search($where)
    // {
    //     $orWhere = '';
    //     if (array_key_exists('m_status', $where)) {
    //         if (!empty($where['m_status'])) {
    //             $orWhere .= 'm_status = "' . $where['m_status'] . '"';
    //         }

    //         unset($where['m_status']);
    //     }

    //     $this->db->where($where);

    //     if ($orWhere != '') {
    //         $this->db->where($orWhere);
    //     }

    //     $this->db->order_by($this->table_id, 'DESC');
    //     $results = $this->db->get($this->table_name)->result();

    //     return $results;

    // }

    public function Search($where, $orWhere = [])
    {
        // Handle m_status
        if (array_key_exists('m_status', $where)) {
            if (!empty($where['m_status'])) {
                $this->db->where('m_status', $where['m_status']);
            }
            unset($where['m_status']);
        }

        // Apply AND conditions
        if (!empty($where)) {
            $this->db->where($where);
        }

        // Apply OR conditions safely
        if (!empty($orWhere)) {
            $or_clauses = [];
            foreach ($orWhere as $col => $val) {
                $or_clauses[] = "`$col` = " . $this->db->escape($val);
            }
            $this->db->where("(" . implode(" OR ", $or_clauses) . ")");
        }

        $this->db->order_by($this->table_id, 'DESC');
        $results = $this->db->get($this->table_name)->result();

        return $results;
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

    public function Delete($id)
    {

        $this->db->where($this->table_id, $id);
        if ($this->db->delete($this->table_name)) {
            return true;
        } else {
            return false;
        }
    }

    public function VerifyPassword($userId, $password)
    {
        $this->db->where('m_id', $userId);
        $user = $this->db->get('jb_member')->row();

        if ($user && $password == $user->m_password) {
            return true;
        }

        return false;
    }



    function SearchMentors($limit, $page_id)
    {
        $query = $this->db->query('Select * from ' . MEMBER_TABLE . ' where role_id in (1,2,5,6) order by last_login_date DESC limit ' . $limit);
        $mentors_list = $query->result();
        return $mentors_list;

    }

    function SearchProfessionals($options = array())
    {

        if (isset($options['limit']) && isset($options['offset']))
            $this->db->limit($options['limit'], $options['offset']);

        if (isset($options['limit'])) {
            $this->db->limit($options['limit']);
        }
        $this->db->where('m_status', 1);

        if (isset($options['s_catid']) && $options['s_catid'] != "") {
            $this->db->where('m_category', $options['s_catid']);
        }
        if (isset($options['register_on']) && $options['register_on'] == 'last_week') {
            $this->db->where('jb_member.added_on  >=', ' DATE_ADD(now(), INTERVAL -3 DAY)');
        }

        if (isset($options['by_skills']) && $options['by_skills'] != "") {
            $this->db->like('m_skills', $options['by_skills']);
        }
        if (isset($options['m_phone']) && $options['m_phone'] != "") {
            $this->db->like('m_phone', $options['m_phone']);
            $this->db->or_like('m_ph_no', $options['m_phone']);
        }
        if (isset($options['m_email']) && $options['m_email'] != "") {
            $this->db->like('m_email', $options['m_email']);
        }
        if (isset($options['by_profession']) && $options['by_profession'] != "") {
            $this->db->where("(m_profession = '" . $options['by_profession'] . "' 
                OR profession1 = '" . $options['by_profession'] . "' 
                OR profession2 = '" . $options['by_profession'] . "' 
                OR profession3 = '" . $options['by_profession'] . "' 
                OR profession4 = '" . $options['by_profession'] . "' 
                OR profession5 = '" . $options['by_profession'] . "')");
        }



        if (isset($options['by_name']) && $options['by_name'] != "") {
            $this->db->like('m_name', $options['by_name']);
        }

        if (isset($options['custom_filter1']) && $options['custom_filter2'] != "") {
            $this->db->like('m_skills', $options['custom_filter1']);
            $this->db->or_like('m_skills', $options['custom_filter2']);
        }
        if (isset($options['custom_filter1']) && $options['custom_filter2'] != "") {
            $this->db->like('m_profession', $options['custom_filter1']);
            $this->db->or_like('m_profession', $options['custom_filter2']);
        }

        if (isset($options['m_current_city']) && $options['m_current_city'] != "") {
            $this->db->like('m_current_city', $options['m_current_city'], 'before');
        }

        if (isset($options['m_nationality']) && $options['m_nationality'] != "") {
            $this->db->like('m_nationality', $options['m_nationality'], 'before');
        }

        $this->db->select('*');
        $this->db->from('jb_member');
        $this->db->join('jb_country', 'jb_member.country_id = jb_country.id', 'left');
        //         $this->db->join(('select list_id from jb_member_by_list where member_id=jb_member.m_id as list_ids'),'jb_member.m_id=jb_member_by_list.member_id','inner',NULL);
        if (isset($options['register_on']) && !empty($options['register_on'])) {
            $this->db->order_by("m_id desc");
        } else {
            $this->db->order_by("last_login_date desc");
        }

        $query = $this->db->get();
        //  echo $this->db->last_query();exit;
        return $query->result();

    }


    function getSearchKeyword($postData, $limit)
    {

        //        $response = array();
        $this->db->limit($limit);
        $this->db->select('*');
        $this->db->like('m_name', $postData);
        $this->db->or_like('m_email', $postData);
        $this->db->or_like('m_ph_no', $postData);
        $this->db->or_like('m_profession', $postData);
        $this->db->or_like('profession1', $postData);
        $this->db->or_like('profession2', $postData);
        $this->db->or_like('profession3', $postData);
        $this->db->or_like('profession4', $postData);
        $this->db->or_like('profession5', $postData);

        $records = $this->db->get('jb_member')->result();

        //        foreach($records as $row ){
//           $response[] = array("value"=>$row->m_id,"label"=>$row->m_name,"email"=>$row->m_email,"current_city"=>$row->m_current_city);
//        }



        return $records;
    }

    function getMembersData()
    {
        $this->db->select('*');
        $this->db->where('m_avatar IS NOT NULL');
        $this->db->where('m_avatar !=', '');
        $this->db->limit(3);
        $query = $this->db->get('jb_member');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
}
?>