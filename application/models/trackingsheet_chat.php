<?php
#[\AllowDynamicProperties]
class Trackingsheet_chat extends CI_Model {
    
    
    function __construct(){        
        $this->table_name = TABLE_PREFIX.'trackingsheet_chat';
        $this->table_id = 'id';
    }
    
    public function GetAll()
    {        
        $results = $this->db->get($this->table_name)->result();
        return $results;
    }
    
    public function GetChatList($sheet_user_id)
    {
        $this->db->where(array('sheet_user_id'=>$sheet_user_id));
        $this->db->order_by('added_on', 'DESC');
        $full_lists =  $this->db->get($this->table_name)->result_array();        
        
        $shoutbox_messages = $this->generateTree($full_lists);
        return $shoutbox_messages;
    }
    
    public function generateTree($items = array(), $parent_id = 0){
        $user_id = $this->session->userdata('user_id');
        $tree = '<ul class="list-group">';
        for($i=0, $ni=count($items); $i < $ni; $i++){
            if($items[$i]['parent_id'] == $parent_id){
                $Ubasicinfo = BasicInfoUser($items[$i]['user_id']);
                
                $m_name = isset($Ubasicinfo->m_name) ? $Ubasicinfo->m_name:'';
                $m_profession = isset($Ubasicinfo->m_profession) ? $Ubasicinfo->m_profession:'';
                $m_current_city = isset($Ubasicinfo->m_current_city) ? $Ubasicinfo->m_current_city:'';
                
                $user_picture = empty($Ubasicinfo->m_avatar) ? 'default.png' : $Ubasicinfo->m_avatar;
                $tree .= '<li class="list-group-item">';
                $tree .= '<div class="profile-avatar tiny pull-left" style="background-image: url(/assets/uploads/members/'.$user_picture.'"></div>';
                $tree .= '<h5 class="list-group-item-heading">';
                $tree .= '<a href="'.site_url('profile/'.$items[$i]['user_id']).'">'.$m_name.'</a> | '.$m_profession.' | '.$m_current_city.' | <time><i>'.date('h:i a - d-M-Y', strtotime($items[$i]['added_on'])).'</i></time>';
                $tree .= '</h5>';
                $tree .= '<p class="message-content">';
                if(in_array($user_id, CvReviewTeamList())){
                    $tree .=  '<a class="deletebtn" href="'.site_url('track_steps/deletechatmessage/'.$items[$i]['id'])."/".'"><span>×</span></a>';
                }
                $tree .=    nl2br($items[$i]['message']);
                $tree .= '<a class="replybtn s_scroll" id="replybtn" chat_id="'.$items[$i]['id'].'" chat_name="'.$m_name.'" href="#mchatbox">Reply</a>';
                $tree .= '</p>';
                $tree .= $this->generateTree($items, $items[$i]['id']);
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
