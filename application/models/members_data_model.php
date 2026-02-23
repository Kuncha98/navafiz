<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Members_data_model extends CI_Model {

   function getEmployees($postData=null){

     $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (m_name like '%".$searchValue."%' or m_email like '%".$searchValue."%') ";
     }

     ## Total number of records without filtering
     
     $this->db->select('count(*) as allcount');
//     $this->db->order_by("m_id", "desc");
     $records = $this->db->get('jb_member')->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     
     $records = $this->db->get('jb_member')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     ## Fetch records
     $this->db->select('*');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $this->db->order_by('m_id', 'DESC');
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get('jb_member')->result();

     $data = array();

     foreach($records as $record ){

        $data[] = array(
           "m_id" => $record->m_id,
           "m_name"=>$record->m_name,
           "member_cv"=>$record->member_cv,
           "m_email"=>$record->m_email,
           "m_avatar"=>$record->m_avatar
        );
     }

     ## Response
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );

     return $response;
   }

}