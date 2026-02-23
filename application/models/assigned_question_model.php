<?php
#[\AllowDynamicProperties]
class Assigned_question_model extends CI_Model {
    /** Utility Methods **/
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'question_user_assigned';
        $this->table_id = 'id';
    }
    
  
    public function GetAll()
    {        
        $results = $this->db->order_by($this->table_id, 'DESC')->get($this->table_name)->result();
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
    
    
   
    
  
    public function Delete($q_id,$user_id){        
         $where=array('user_id'=>$user_id,'question_id'=>$q_id);
        $this->db->where($where);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
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
    
    
    public function DeleteAssignedQuestion($id){        
        
        $this->db->where('question_id',$id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }

    
    

	
    
	 
	
}
?>
