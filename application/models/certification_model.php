<?php
#[\AllowDynamicProperties]
class Certification_model extends CI_Model {
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'member_certification';
        $this->table_id = 'c_id';
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
    
    

      public function GetUser($id)
    {        
        $user = $this->db->get_where($this->table_name,array('user_id'=>$id))->row();
        return $user;
    }
    
   function getUsers($postData){

     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("m_name like '%".$postData['search']."%' ");

       $records = $this->db->get('jb_member')->result();

       foreach($records as $row ){
           
           if(!empty($row->m_profession) && !empty($row->m_email)){
               $response[] = array("value"=>$row->m_id,"label"=>$row->m_name.'|'.$row->m_profession.'|'.$row->m_email);
           }
           else if(empty($row->m_profession)){
            $response[] = array("value"=>$row->m_id,"label"=>$row->m_name.'|'.$row->m_email);   
           }
           else if(empty($row->m_email)){
               $response[] = array("value"=>$row->m_id,"label"=>$row->m_name.'|'.$row->m_profession);
           }
          
       }

     }

     return $response;
  }
    
        public function GetAllCert($id)
    {        
         $user = $this->db->query('SELECT * FROM jb_member_certification where user_id = '.$id)->result();
         return $user;
    }
    
    
}
?>
