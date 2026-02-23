<?php
#[\AllowDynamicProperties]
class notification_model extends CI_Model {
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'notification';
        $this->table_id = 'noti_id';
    }
    
    public function GetAll($limit=Null)
    {     
        if(!empty($limit)){
            $this->db->limit($limit);
        }   
        $where = 'noti_type is NULL';
        $this->db->order_by('noti_id','desc');
        $this->db->where($where);
        $results = $this->db->get($this->table_name)->result_array();
        return $results;
    }
    
    public function SearchLimit($where = array(),$limit=null)
    {     
        $return = array();
        if(!empty($limit)){
            $this->db->limit($limit);
        }   
        
        $this->db->where($where);      
        $this->db->order_by($this->table_id, 'DESC');
        $results =  $this->db->get($this->table_name)->result_array();
        
        return $results;              
    }
    
    public function SearchLimitUser($where = array(),$limit,$start)
    {     
        $return = array();
        if(!empty($limit)){
            $this->db->limit($limit,$start);
        }   
        
        $this->db->where($where);      
        $this->db->order_by($this->table_id, 'DESC');
        $results =  $this->db->get($this->table_name)->result_array();
        
        return $results;              
    }
    public function SearchLimitUserNoti($where = array(),$limit,$start)
    {     
        
        if(!empty($limit)){
            $this->db->limit($limit,$start);
        }
        
        $this->db->select('jb_member.m_name,jb_member.m_id,jb_member.m_avatar,jb_notification.noti_id,jb_notification.user_id,jb_notification.notify_user_id,jb_notification.noti_title,jb_notification.read_flag,'
                . 'jb_notification.noti_desc,'
                . 'jb_notification.noti_link,jb_notification.noti_type,jb_notification.added_on');
        $this->db->from('jb_notification'); 
        $this->db->join('jb_member', 'jb_member.m_id=jb_notification.user_id');
        
        $this->db->where($where);      
        $this->db->order_by($this->table_id, 'DESC');
        $results =  $this->db->get()->result_array();
        
        return $results;              
    }
    
    public function unReadNoti($where = array()){
        $this->db->select('noti_id,notify_user_id,user_id,count(read_flag) as unread_notifications');
        $this->db->where($where);
        $this->db->from('jb_notification');
        $this->db->order_by($this->table_id, 'DESC');
        $results =  $this->db->get()->result();
        
        return $results;
    }
    
    public function ByType($types = array(),$limit=null)
    {     
        $return = array();
        if(!empty($limit)){
            $this->db->limit($limit);
        }   
        $this->db->order_by('noti_id','desc');
        $this->db->where_in('noti_type', $types);
        $results = $this->db->get('jb_notification')->result_array();    
        return $results;                
    }
    
    public function ByTypeNoti($types = array(),$limit,$start)
    {     
        $return = array();
        if(!empty($limit)){
            $this->db->limit($limit,$start);
        }   
        $this->db->order_by('noti_id','desc');
        $this->db->where_in('noti_type', $types);
        $results = $this->db->get('jb_notification')->result_array();    
        return $results;                
    }

    public function GetByNotiType($type,$limit=Null){

        if(!empty($limit)){
            $this->db->limit($limit);
        }
        $this->db->order_by('added_on','desc');
        $this->db->where('noti_type',$type);
        $results = $this->db->get($this->table_name)->result_array();
        return $results;   
    }
    
    public function GetById($id)
    {        
        $user = $this->db->get_where($this->table_name,array($this->table_id=>$id))->row();
        return $user;
    }
    
    public function Search($where)
    {        
        $orWhere = '';
        if(array_key_exists('status',$where))
        {                        
            if(!empty($where['status'])){
                $orWhere .= 'status = "'.$where['status'].'"';
            }  
            
            unset($where['status']);
        }        
        
        $this->db->where($where);
            
        if($orWhere!=''){
            $this->db->where($orWhere);
        }
        
        $this->db->order_by($this->table_id, 'DESC');
        $results =  $this->db->get($this->table_name)->result();
        
        return $results;
        
    }
    
    public function Save($data,$id=0)
    {
        if($id==0){
            $this->db->insert($this->table_name, $data);
            $id = $this->db->insert_id();            
        }else{
            $this->db->where($this->table_id, $id);
            $this->db->update($this->table_name, $data);
        }
        
        return $id;
    }

    public function updateNotification($data){

        $this->db->where('read_flag','unread');
        $this->db->update($this->table_name,$data);
    }
    
    public function Delete($id){        
        
        $this->db->where($this->table_id,$id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }   
}
?>
