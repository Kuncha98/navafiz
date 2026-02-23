<?php
#[\AllowDynamicProperties]
class Companies_model extends CI_Model {
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'companies';
        $this->table_id = 'co_id';
    }
    
    public function GetAll()
    {        
        $results = $this->db->get($this->table_name)->result();
        return $results;
    }
    
    public function GetAllCount()
    {        
        $query = $this->db->query("SELECT count(*) as total_companies FROM ".$this->table_name);
        $data =  $query->row();        
        $return = isset($data->total_companies) && $data->total_companies>0 ? trim($data->total_companies):0;
        return $return;        
    }
    
    public function GetByAjax($keyword)
    {        
        
        if(!empty($keyword)) {
        $query ="SELECT * FROM jb_companies WHERE co_name like '" . $keyword . "%' ORDER BY co_name";
        $results = $this->db->query($query)->result();
        
        return $results;
        }
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

    function getCategories($options = array()){
        if(isset($options['c_id']))
            $this->db->where('c_id', $options['c_id']);  
            // if(isset($options['c_status']))
            $this->db->where('c_status', '1');             
            $this->db->select('*');
            $this->db->from($this->db->dbprefix('categories'));
            //$this->db->join('oc_instructors', 'oc_courses.c_instructor_id = oc_instructors.i_id');
            $this->db->order_by("c_name", "ASC");
            $query = $this->db->get();
            //  echo $this->db->last_query();
            // exit;
            if ($query->num_rows() > 0) {                          
               if(isset($options['c_id']) )
                   return $query->row(0);

               return $query->result();
            }else{
                return 'empty';
            }
     }  
}
?>
