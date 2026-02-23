<?php
#[\AllowDynamicProperties]
class Members_interview_model extends CI_Model {
    /** Utility Methods **/
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'member_marked_interview';
        $this->table_id = 'id';
    }
    
  
    

	 
    public function GetAll()
    {        
        $results = $this->db->order_by($this->table_id, 'DESC')->get($this->table_name)->result();
        return $results;
    }
    
    function GetAll_mark_interview_can($j_id){

         $query = $this->db->query('select i.*,'
                 . ' m.m_name,m.m_avatar,m.m_profession,m.m_current_city,'
                 . '(select m_name from jb_member where m_id = i.updated_by) as interviewed_by,'
                 . '(select count(*) from jb_member_marked_interview where updated_by = m.m_id) as interviewers '
                 . 'from jb_member m, jb_member_marked_interview i where i.user_id = m.m_id and i.job_id='.$j_id);
         $interviewed = $query->result();
         return $interviewed;

    }
    
    function GetAll_mark_can($j_id){        
        $users = $this->db->query('select * from jb_member_marked_interview where job_id = '.$j_id)->result();
        return $users;
    }
    
     function Delete_interview_can($u_id,$j_id){  
         $where['user_id'] = $u_id;
      $where['job_id'] = $j_id;
        $this->db->where($where);
         if($this->db->delete('jb_member_marked_interview'))
        {
            return true;
        }else{
            return false;
        }   
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
    
    
    public function GetUserPoints($id){
        $this->db->select_sum('user_points');
//        $this->db->select('user_points');
        $points = $this->db->get_where($this->table_name,array('points_for'=>$id))->row();
        return $points;
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
        $this->db->where('user_id',$user_id);
        $result = $this->db->get($this->table_name)->result();
        return $result;
    }
    
    public function DeleteByUserid($user_id){        
        
        $this->db->where('user_id',$user_id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }

    
    

	
    
	 
	
}
?>
