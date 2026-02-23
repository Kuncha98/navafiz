
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importvendors1 extends CI_Controller {
    function mailtempschedule()
    {
        $this->load->model('projectone/control/template_model','ctemplate',true);
        $this->ctemplate->mailtempschedule();
    }




    function addvendorsaddresses(){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');

        $storepath = FCPATH . '/Vendors-list-2.xlsx';
        
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);
        
        $objPHPExcel = $objReader->load($storepath);
        
        $rowstart = 2;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {


            $address_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue()); //Type
            $vendor_address_line1 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue());//Address, line 1
            $vendor_address_line2 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue());//Address, line 2        
            $vendor_city = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(6) . $a)->getValue());//City                        
            $vendor_state = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue());//State    
            $province_territory = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue());//Province/territory                        
            $vendor_country = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue());//Country
            $vendor_postcode = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue());//Postal Code
            $county = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue());//County
            $archived = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue());//Archived?
            

            /*echo "vendor_name =>". $vendor_name." | vendor_address_line1 =>".$vendor_address_line1." | vendor_address_line2 =>". $vendor_address_line2." | $vendor_city =>".
                    $vendor_city." | vendor_state =>".$vendor_state." | vendor_country =>".$vendor_country." | vendor_postcode =>".$vendor_postcode." | address_type =>".$address_type;*/
            
            //echo "<p>";
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){
                
                $id_vendor = $results->id_vendor;
                
                $vendor_data['address_type'] = $address_type;
                $vendor_data['vendor_address_line1'] = $vendor_address_line1;
                $vendor_data['vendor_address_line2'] = $vendor_address_line2;
                $vendor_data['vendor_city'] = $vendor_city;
                $vendor_data['vendor_state'] = $vendor_state;
                $vendor_data['province_territory'] = $province_territory;
                $vendor_data['vendor_country'] = $vendor_country;
                $vendor_data['vendor_postcode'] = $vendor_postcode;
                $vendor_data['county'] = $county;
                $vendor_data['archived'] = $archived;
         
                
                //echo "<pre>"; print_r($vendor_data); echo "</pre>";                                
                //dev$query = $this->db->insert('mod_staffone_vendors_addresses', $vendor_data);
                echo $row;
                echo "<p>";                
            }
            
            //if($row>2) break;            
            
            //var_dump($results);                        
            //echo "Tin Eid =>". $vendor_tin." | Vendor Name =>".$vendor_name." | Vendor Alt Name =>". $vendor_alternate_name." | Fax =>".$vendor_fax." | Phone =>".$vendor_phone." | Vendor Category =>".$vendor_category." | VMO Contact =>".$vmo_contact." | Regions =>".$regions." | Vendor Website =>".$vendor_website;            
            //echo "<br />";
            //echo "<br />";            
            
        }

    }
}