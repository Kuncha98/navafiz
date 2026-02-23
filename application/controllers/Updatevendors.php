<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatevendors extends CI_Controller 
{
    function mailtempschedule()
    {
        $this->load->model('projectone/control/template_model','ctemplate',true);
        $this->ctemplate->mailtempschedule();
    }
    
    function remove_contracts_files($st=2){        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "10024M");
        set_time_limit(500);

        require_once(APPPATH . 'libraries/PHPExcel.php');
        $storepath = FCPATH . '/Contracts-list.xlsx';
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);        
        $objPHPExcel = $objReader->load($storepath);
        $rowstart = $st;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); 
            $contracts_contract = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(1) . $a)->getValue());
            $contracts_vmo_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue());        
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){                
                $id_vendor = $results->id_vendor;    
                $vendor_tin = $results->vendor_tin;
                
                $get_query1 = $this->db->get_where('mod_staffone_certificate_list', array('staffone_certificate_list_name' => $contracts_contract));
                $results1 = $get_query1->row();
                
                if(count($results1)>0){
                    
                    if(isset($results1->id_staffone_certificate_list)){
                        
                        $staffone_certificate_list_name = $results1->staffone_certificate_list_name;
                        
                        $vendor_data['document_type'] = 'CONTRACTS';
                        $vendor_data['id_vendor'] = $id_vendor;
                        $query1 = $this->db->delete('mod_staffone_certificate_list_details', $vendor_data); 
                        $query2 = $this->db->delete('mod_staffone_certificate_list_details_log', $vendor_data);                         
                        echo "<p>";
                        var_dump($query1);
                        echo "<p>";
                        var_dump($query2);
                        echo "<p>";
                        echo "<pre>"; print_r($vendor_data); echo "</pre>";         
                        echo $a;                        
                        $end = $st+1000;
                        if($a>$end){break;}
                   }                    
                }
            }
        }
    }
    
    function remove_insurance_policies($st=2){        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "10024M");
        set_time_limit(500);

        require_once(APPPATH . 'libraries/PHPExcel.php');
        $storepath = FCPATH . '/Insurance-policies.xlsx';
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);        
        $objPHPExcel = $objReader->load($storepath);
        $rowstart = $st;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); 
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){                
                $id_vendor = $results->id_vendor;    
                $vendor_tin = $results->vendor_tin;
                
                $vendor_data['document_type'] = 'INSURANCE';
                $vendor_data['id_vendor'] = $id_vendor;
                
                $query1 = $this->db->delete('mod_staffone_certificate_list_details', $vendor_data); 
                $query2 = $this->db->delete('mod_staffone_certificate_list_details_log', $vendor_data);                         
                echo "<p>";
                var_dump($query1);
                echo "<p>";
                var_dump($query2);
                echo "<p>";                
                
                echo "<pre>"; print_r($vendor_data); echo "</pre>";         
                echo $a;                        
                $end = $st+1000;
                if($a>$end){break;}                
            }
        }
    }
    
    function remove_vendor_contacts($st=2){        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "10024M");
        set_time_limit(500);

        require_once(APPPATH . 'libraries/PHPExcel.php');
        $storepath = FCPATH . '/contacts-list-3.xlsx';
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);        
        $objPHPExcel = $objReader->load($storepath);
        $rowstart = $st;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); 
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){                       
                
                $id_vendor = $results->id_vendor;                
                
                $get_address = $this->db->get_where('mod_staffone_vendors_addresses', array('id_vendor' => $id_vendor));
                $address_result = $get_address->row();                
                $id_address = $address_result->id_address;
                if($id_address>0){
                    $vendor_data['id_address'] = $id_address;                    
                    $query1 = $this->db->delete('mod_staffone_vendors_address_contacts', $vendor_data);                     
                    echo "<p>";
                    var_dump($query1);
                    echo "<p>";
                    echo "<pre>"; print_r($vendor_data); echo "</pre>";                             
                }
                
                echo $a;                        
                echo "<br />";
                $end = $st+500;
                if($a>$end){break;}                
            }
        }
    }
}