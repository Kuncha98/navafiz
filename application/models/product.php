<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 #[\AllowDynamicProperties]
class Product extends CI_Model{ 
     
    function __construct() { 
        $this->proTable   = 'stripe_products'; 
        $this->ordTable = 'stripe_orders'; 
    } 
     
    /* 
     * Fetch products data from the database 
     * @param id returns a single record if specified, otherwise all records 
     */
    
    public function getProducts() {
        $this->db->select('*'); 
        $this->db->from('jb_users_list'); 
        $this->db->where('price >', '0');
        
        $this->db->order_by('name', 'asc'); 
        $query  = $this->db->get(); 
        
        $result = $query->result_array();
        return $result;
    }
    
    
    public function updateVal($data,$id)
    {
            $this->db->where('id', $id);
            $this->db->update('jb_users_list', $data);
        
        
    }
    
    
    public function GetById($id)
    {        
        $res = $this->db->get_where('jb_users_list',array('id'=>$id))->result_array();
        $result = $res[0];
//        print_r($result);exit();
        return $result;
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
        
        $this->db->order_by('buyer_id', 'DESC');
        $results =  $this->db->get($this->ordTable)->result();
        
        return $results;
        
    }
    
    public function getRows($id = ''){ 
        $this->db->select('*'); 
        $this->db->from($this->proTable); 
        $this->db->where('status', '1'); 
        if($id){ 
            $this->db->where('id', $id); 
            $query  = $this->db->get(); 
            $result = ($query->num_rows() > 0)?$query->row_array():array(); 
        }else{ 
            $this->db->order_by('name', 'asc'); 
            $query  = $this->db->get(); 
            $result = ($query->num_rows() > 0)?$query->result_array():array(); 
        } 
         
        // return fetched data 
        return !empty($result)?$result:false; 
    } 
     
    /* 
     * Fetch order data from the database 
     * @param id returns a single record 
     */ 
    public function getOrder($id){ 
        $this->db->select('r.*, p.name as product_name, p.price as product_price, p.currency as product_price_currency'); 
        $this->db->from($this->ordTable.' as r'); 
        $this->db->join('jb_users_list'.' as p', 'p.id = r.product_id', 'left'); 
        $this->db->where('r.id', $id); 
        $query  = $this->db->get(); 
        return ($query->num_rows() > 0)?$query->row_array():false; 
    } 
     
    /* 
     * Insert transaction data in the database 
     * @param data array 
     */ 
    public function insertOrder($data){ 
        $insert = $this->db->insert($this->ordTable,$data); 
        return $insert?$this->db->insert_id():false; 
    } 
     
}