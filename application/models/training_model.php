<?php
#[\AllowDynamicProperties]
class Training_model extends CI_Model {
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'courses';
        $this->table_id = 'id';
    }
    
    
    public function GetCoursesCategories(){
        $cat_results = $this->db->get('jb_courses_categories')->result();
        return $cat_results;
    }


    public function GetAll()
    {        
        $results = $this->db->get($this->table_name)->result();
        return $results;
    }
    
    public function GetAjaxCourses($cat_id){
        $query = $this->db->query('select c.*,'
                . 'm.m_id,m.m_name,m.m_avatar,m.m_profession,m.m_current_city '
                . 'from jb_courses c, jb_member m where c.added_by = m.m_id and c.category_id='.$cat_id);
        $ajaxcourses = $query->result();
        return $ajaxcourses;
    }
    
    public function GetAllCourses(){
       $query = $this->db->query('select c.*,'
                . 'm.m_id,m.m_name,m.m_avatar,m.m_profession,m.m_current_city '
                . 'from jb_courses c, jb_member m where c.added_by = m.m_id');
               
       $courses_list = $query->result();
       return $courses_list;
       

    }
    
    public function courseEnroll($data){
        $this->db->insert('jb_courses_enrollment', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function TotalRating($course_id) {
         $query = $this->db->query('(select rating from jb_courses_rating where rating=1) as rating_1 from jb_courses_rating where course_id = '.$course_id);
         $course_rating = $query->result();
         return $course_rating;
    }
    
    public function GetByIdDetail($id)
    {        
              $query = $this->db->query('select c.*,'
                      . '(select title from jb_courses_categories where id = c.category_id) as cat_title, '
                      . '(select count(rating) from jb_courses_rating where rating = 1) as rating_1, '
                      . '(select count(rating) from jb_courses_rating where rating = 2) as rating_2, '
                      . '(select count(rating) from jb_courses_rating where rating = 3) as rating_3, '
                      . '(select count(rating) from jb_courses_rating where rating = 4) as rating_4, '
                      . '(select count(rating) from jb_courses_rating where rating = 5) as rating_5, '
                      . '(select avg(rating) from jb_courses_rating where course_id = c.id) as avg_rating, '
                . 'm.m_id,m.m_fb,m.linkedin_profile_link,m.m_name,m.m_avatar,m.m_profession,m.m_current_city '
                . 'from jb_courses c, jb_member m where c.added_by = m.m_id and c.id='.$id);
               
       $course = $query->result();
       return $course;
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
    
    
    public function SearchCourse($where)
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
        
        $this->db->order_by('id', 'DESC');
        $results =  $this->db->get('jb_courses_enrollment')->result();
        
        return $results;
        
    }
    
    public function SearchCourseRating($where)
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
        
        $this->db->order_by('id', 'DESC');
        $results =  $this->db->get('jb_courses_rating')->result();
        
        return $results;
        
    }
    
    public function SaveCourseRating($data) {
        
        $this->db->insert('jb_courses_rating', $data);
        $id = $this->db->insert_id();            
        
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
