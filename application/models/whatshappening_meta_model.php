<?php
#[\AllowDynamicProperties]
class whatshappening_meta_model extends CI_Model {
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'shoutbox_meta';
        $this->table_id = 'id';
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
//        $this->db->join($this->table_name1, $this->table_name1.'.m_id = '.$this->table_name.'.sh_member_id');
        $results =  $this->db->get($this->table_name)->result();
        
        return $results;
        
    }
    
    public function SearchByLimit($limit, $start, $where)
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
        
        $this->db->limit($limit, $start);
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
}
?>
