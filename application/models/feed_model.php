<?php
#[\AllowDynamicProperties]
class Feed_model extends CI_Model {
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'feed';
        $this->table_id = 'feed_id';
    }
    
    public function GetAll()
    {        
        $results = $this->db->order_by($this->table_id,'desc')->get($this->table_name)->result();
        return $results;
    }
    
    
    public function GetById($id)
    {        
        $user = $this->db->get_where($this->table_name,array($this->table_id=>$id))->row();
        return $user;
    }
    
    public function GetFeedById($id)
    {        
        $this->db->select('jb_member.m_id,jb_member.m_name,jb_member.m_avatar,jb_member.m_current_city,jb_member.m_profession,(select count(*) from jb_feed_likes where jb_feed.feed_id = jb_feed_likes.feed_id) as total_feed_likes,jb_feed.feed_id,jb_feed.feed_text,jb_feed.added_on as feed_added_date,jb_feed.user_id as feed_owner_id,jb_feed.feed_image');
        $this->db->from('jb_feed'); 
//        $this->db->join('jb_feed_comments', 'jb_feed_comments.feed_id=jb_feed.feed_id');
        $this->db->join('jb_member', 'jb_member.m_id=jb_feed.user_id');
        $this->db->where('jb_feed.feed_id',$id);
        $query = $this->db->get();
        return $query->result_array();
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
        $this->db->order_by('add_date', 'DESC');
        $results =  $this->db->get($this->table_name)->result();
        
        return $results;
        
    }
    
    public function deleteFeedLikes($user_id,$feed_id) {
        $this->db->where(array('user_id'=>$user_id,'feed_id'=>$feed_id));
        if($this->db->delete('jb_feed_likes')){
            return true;
        }else{
            return false;
        }
    }
    
    public function SearchLikes($where)
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
        $this->db->order_by('id', 'DESC');
        $results =  $this->db->get('jb_feed_likes')->result();
        
        return $results;
        
    }
    
    public function FeedLikesMembers(){
        $this->db->select('jb_feed_likes.id, jb_feed_likes.feed_id, jb_member.m_name,jb_member.m_id,jb_member.m_avatar');
        $this->db->from('jb_member');
        $this->db->join('jb_feed_likes','jb_member.m_id = jb_feed_likes.user_id','inner');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function SearchByLimit($where, $limit, $start) {        
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
    
    public function SaveLikes($data,$id=0){
        if($id==0){
            $this->db->insert('jb_feed_likes', $data);
            $id = $this->db->insert_id();            
        }else{
            $this->db->where('id', $id);
            $this->db->update('jb_feed_likes', $data);
        }
        
        return $id;
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
