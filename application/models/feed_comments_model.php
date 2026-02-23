<?php
#[\AllowDynamicProperties]
class Feed_comments_model extends CI_Model {
    
    
    function __construct(){        
        $this->table_name = 'feed_comments';
        $this->table_id = 'comment_id';
    }
    
    public function GetAll()
    {        
        $results = $this->db->get($this->table_name)->result();
        return $results;
    }
    
    public function GetPostComments($feed_id)
    {
        $this->db->where(array('feed_id'=>$feed_id));
        $this->db->order_by('added_on', 'DESC');
        $parent_list =  $this->db->get($this->table_name)->result_array();
        
        $get_feed =  $this->db->query('select user_id from '.FEED_TABLE.' where feed_id='.$feed_id)->row();
        $feed_owner_id = isset($get_feed->user_id) && $get_feed->user_id>0 ? $get_feed->user_id:0; 
        
        
        $fullcomments_list = $this->generateTree($parent_list,0,$feed_owner_id);
        return $fullcomments_list;
    }
    
    public function generateTree($items = array(), $parent_id = 0, $feed_owner_id=0){
        
        $user_id = $this->session->userdata('user_id');
        $tree = '<ul class="clistul">';
        for($i=0, $ni=count($items); $i < $ni; $i++){
            if($items[$i]['parent_id'] == $parent_id){
                $Ubasicinfo = BasicInfoUser($items[$i]['user_id']);
                
                $m_name = isset($Ubasicinfo->m_name) ? $Ubasicinfo->m_name:'';
                $m_profession = isset($Ubasicinfo->m_profession) ? $Ubasicinfo->m_profession:'';
                $m_current_city = isset($Ubasicinfo->m_current_city) ? $Ubasicinfo->m_current_city:'';
                
                $user_picture = empty($Ubasicinfo->m_avatar) ? 'default.png' : $Ubasicinfo->m_avatar;
                $tree .= '<li class="comment">';
                $tree .= '<div class="row">';
                $tree .= '<div class="col-md-1 p-1 userdata">';
                $tree .= '<a class="userpic img-fluid" href="javscript:void(0)" style="background-image: url('.site_url("/assets/uploads/members/".$user_picture).')"></a>';                
                $tree .= '</div>';
                $tree .= '<div class="col-md-11 commenttxt">';
                $tree .= '<div class="commented-user-info">';
                $tree .= '<a href="'.site_url('profile/'.$items[$i]['user_id']).'">'.$m_name.'</a> | '.$m_profession.' | '.$m_current_city.' | <time><i>'.date('h:i a - d-M-Y', strtotime($items[$i]['added_on'])).'</i></time>';
                $tree .= '</div>';
                $tree .= '<div class="ctxt">';
                $tree .= '<p>';
                $tree .=    nl2br($items[$i]['comment_text']);
                $tree .= '</p>';
                $tree .= '</div>';                
                $tree .= '<div class="clinks">';                
                $tree .= '<a href="javascript:void();" comment_id="'.$items[$i]['comment_id'].'" class="clink replytn">Reply</a>';                
                $tree .= '<div class="row postcmtfrm" style="display:none;">';
                $tree .= '<div class="col-md-11 col-xs-11 commentbox">';
                $tree .= '<textarea class="form-control commentxt" feed_id="'.$items[$i]['feed_id'].'" parent_id="'.$items[$i]['comment_id'].'" feed_owner_id="'.$feed_owner_id.'" ></textarea>';
                $tree .= '<a class="btn btn-outline-secondary postcomment">Post</a>';        
                $tree .= '</div>';
                $tree .= '</div>';
                $tree .= '</div>';                
                $tree .= '</div>';                
                $tree .= '</div>';                                        
                $tree .= '';                
                $tree .= $this->generateTree($items, $items[$i]['comment_id'],$feed_owner_id);
                $tree .= '';                
                $tree .= '</li>';
            }
        }
        $tree .= '</ul>';
        return $tree;
    }

    public function GetAllThreads($parent_id=0)
    {        
        $this->db->select('*');
        $this->db->where('parent_id', $parent_id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows()>0)
        {
          $results=array();
          foreach ($query->result_array() as $row)
          {
            $results[]=$row;
            if ($sub_categories=$this->GetAllThreads($row['id']))
              $results=array_merge($results,$sub_categories);
            }
          return $results;
        } else
          return false;
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
