<?php
#[\AllowDynamicProperties]
class Search_model extends CI_Model {
    /** Utility Methods **/
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'member';
        $this->table_id = 'm_id';
    }
    
  
    

	 
    public function GetAll()
    {        
        $results = $this->db->order_by('name', 'ASC')->get($this->table_name)->result();
        return $results;
    }
    
    
    public function GetById($id)
    {        
        $user = $this->db->get_where($this->table_name,array($this->table_id=>$id))->row();
        return $user;
    }
    public function GetByUserId($id)
    {        
        $user = $this->db->get_where($this->table_name,array('user_id'=>$id))->row();
        return $user;
    }
    
    function countFeaturedJob() {
        $query = $this->db->query('select count(j_id) as featured_job_count from jb_jobs where is_featured = 1');
        $query = $query->row();
        return $query;  
    }
    function randomPickFeaturedJob($total) {
        $query = $this->db->query('select * from jb_jobs where is_featured = 1 order by FLOOR(RAND()*('.$total.'-1+1))+1 LIMIT 1');
        $res = $query->row();
        return $res;
    }
    function countFeaturedMember() {
        $query = $this->db->query('select count(member_id) as member_count from jb_member_by_list where list_id = 87');
        $query = $query->row();
        return $query;
    }
    function randomPickFeaturedMember($total) {
        $query = $this->db->query('select * from jb_member_by_list where list_id = 87 order by FLOOR(RAND()*('.$total.'-1+1))+1 LIMIT 1');
        $res = $query->row();
        return $res;
    }
    
      function getSearchKeyword($postData,$limit){

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

        return $records;
    }
    
    function jobSearchKeyword($keyword,$limit) {
      
        $this->db->limit($limit);
        $this->db->select('*');
        $this->db->like('j_title', $keyword); 
        $this->db->or_like('j_tags', $keyword);
        $this->db->or_like('j_slug', $keyword);
        $this->db->or_like('j_state', $keyword);
        $this->db->or_like('j_location', $keyword);
        $this->db->or_like('j_descr', $keyword);
        $this->db->or_like('j_company', $keyword);
        $this->db->or_like('job_reference_by', $keyword);
        $this->db->or_like('j_email_apply', $keyword);

        $records = $this->db->get('jb_jobs')->result();
        
        return $records;
  }
    
    
    public function GetAllUserPoints($id){
        $user_pt = $this->db->get_where($this->table_name,array('points_for'=>$id))->result();
        return $user_pt;
        
    }
    
    
    public function SearchQuestion($where)
    {        
         $orWhere = '';
                
        
        $this->db->where($where);
        if($orWhere!=''){
            $this->db->where($orWhere);
        }
        
        $this->db->order_by($this->table_id, 'DESC');
        $results =  $this->db->get($this->table_name)->row();
        
        return $results;
    }
    
    public function Search($where)
    {        
        $orWhere = '';
        if(array_key_exists('order_status',$where))
        {                        
            if(!empty($where['order_status'])){
                $orWhere .= 'order_status = "'.$where['order_status'].'"';
            }  
            
            //$orWhere .= 'address_line_1 like "%'.$where['filter'].'%" or ';
            //$orWhere .= 'city  like "%'.$where['filter'].'%" or ';            
            unset($where['order_status']);
        }        
        
        $this->db->where($where);
            
        if($orWhere!=''){
            $this->db->where($orWhere);
        }
        
        $this->db->order_by($this->table_id, 'DESC');
        $results =  $this->db->get($this->table_name)->result();
        
        return $results;
        
    }
    
    
    
    
    public function CountSearch($where)
    {        
        $this->db->where($where);            
        $results = $this->db->count_all_results($this->table_name);
        
        //$results =  $this->db->get($this->table_name)->result();
        
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
    
    
   
    
  
    public function Delete($id){        
        
        $this->db->where($this->table_id,$id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    } 
    

    
    
    public function GetAllByUser($user_id){
        $this->db->where('member_id',$user_id);
        $result = $this->db->get($this->table_name)->result();
        return $result;
    }
    
    public function DeleteByUserid($user_id){        
        
        $this->db->where('member_id',$user_id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }

    
    

	
    
	 
	
}
?>
