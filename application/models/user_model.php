<?php
#[\AllowDynamicProperties]
class User_model extends CI_Model {
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'member';
        $this->table_id = 'm_id';
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
    
    public function DeleteByUserid($member_id){        
        
        $this->db->where($this->table_id,$member_id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }   
}
?>
