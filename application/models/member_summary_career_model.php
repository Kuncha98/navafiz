<?php
#[\AllowDynamicProperties]
class Member_summary_career_model extends CI_Model {
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'member_summary_career';
        $this->table_id = 'id';
    }
    
    public function GetAll()
    {        
        $results = $this->db->get($this->table_name)->result();
        return $results;
    }
    
    
    public function GetById($id)
    {        
        $user = $this->db->get_where($this->table_name,array($this->table_id=>$id))->row();
        return $user;
    }
    
      public function GetUser($id)
    {        
        $user = $this->db->get_where($this->table_name,array('m_id'=>$id))->row();
        return $user;
    }
    
     function getFormsSummary($options = array())
		
		{
      	if(isset($options['id']))
            $this->db->where('id', $options['id']);  
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('member_summary_career'));
		$this->db->order_by("id", "DESC");
		 if(isset($options['limit']))
		$this->db->limit($options['limit']);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {                          
            if(isset($options['id']) && $options['id'] != "")
                return $query->row(0);
            
            return $query->result();
         }
         else
            return 'empty';
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
    
    public function Delete($id){        
        
        $this->db->where($this->table_id,$id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    } 
    
    
        public function DeleteUser($id){        
        
        $this->db->where('m_id',$id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    } 
}
?>
