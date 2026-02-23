<?php
#[\AllowDynamicProperties]
class Recruitment_question_model extends CI_Model {
    /** Utility Methods **/
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'recruitment_profile_questions';
        $this->table_id = 'id';
    }
    
  
    

	 
    public function GetAll()
    {        
        $results = $this->db->order_by($this->table_id, 'DESC')->get($this->table_name)->result();
        return $results;
    }
    
    public function GetCatQuestion($prof1,$prof2,$prof3){
        $question = $this->db->query("SELECT question_id from jb_question_user_assigned where cat_id in ('".$prof1."','".$prof2."','".$prof3."')");
        $result_question = $question->result();
        return $result_question;
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
    
  
    
    function getProfileQuestion($user_id){
        $this->db->select('*');    
        $this->db->from('jb_recruitment_profile_questions');
        $this->db->join('jb_question_user_assigned', 'jb_recruitment_profile_questions.id = jb_question_user_assigned.question_id');
        $this->db->where('jb_question_user_assigned.user_id',$user_id);  
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    function getProfileQuestions($user_id){
        $this->db->select('question_id');    
        $this->db->from('jb_question_user_assigned');        
        $this->db->where('user_id',$user_id);  
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    
    function getProfQuestions($prof1,$prof2,$prof3,$user_id){

        $query = $this->db->query('select * from jb_question_user_assigned join jb_recruitment_profile_questions on jb_question_user_assigned.question_id = jb_recruitment_profile_questions.id '
                . 'where jb_question_user_assigned.cat_id in ('.$prof1.','.$prof2.','.$prof3.') or jb_question_user_assigned.user_id='.$user_id);

        $result = $query->result();        
        
        
//        $where = array('jb_question_user_assigned.cat_id'=>$prof1,'jb_question_user_assigned.cat_id'=>$prof2,'jb_question_user_assigned.cat_id'=>$prof3);
//        $this->db->select('*');
//        $this->db->from('jb_question_user_assigned');
//        $this->db->join('jb_recruitment_profile_questions','jb_question_user_assigned.question_id = jb_recruitment_profile_questions.id');
//        $this->db->or_where($where);
//        $query = $this->db->get();
//        $data = $query->result();
        return $result;
        
        
//        (select title from jb_recruitment_profile_questions where id=q.id) as question_title
        //        $query = $this->db->query('select r.*,  
//                                    m.m_name,m.m_avatar,m.m_profession,m.m_current_city, 
//                                    (select m_name from jb_member where m_id=m.mentor_id) as mentor ,
//                                    (select count(*) from jb_user_recommendation where type="user_to_user" and user_id=m.m_id) as recommendations,
//                                    (select m_name from jb_member where m_id=r.recommend_by) as recommend_by_name
//                                    from jb_member m, jb_user_recommendation r where r.type="for_job" and r.user_id=m.m_id and r.job_id='.$id);
//        $recommand_list = $query->result();
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
    
    
     
    
    public function DeleteByUserid($user_id){        
        
        $this->db->where('user_id',$member_id);
        if($this->db->delete($this->table_name))
        {
            return true;
        }else{
            return false;
        }   
    }

    
    

	
    
	 
	
}
?>
