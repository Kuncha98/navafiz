<?php
error_reporting(1);
ini_set("display_error", "1");
ini_set("memory_limit", "1024M");
defined('BASEPATH') OR exit('No direct script access allowed');

class Importvendors extends CI_Controller {
    function mailtempschedule()
    {
        $this->load->model('projectone/control/template_model','ctemplate',true);
        $this->ctemplate->mailtempschedule();
    }


    function add_vendors($st=2){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');
        
        $storepath = FCPATH . '/vendorimport/vendors-list.xlsx';
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);        
        $objPHPExcel = $objReader->load($storepath);        
        
        $rowstart = $st;        
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); //Vendor (Vendor Name)
            $vendor_alternate_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(1) . $a)->getValue()); //Alt. vendor names 
            $text_field_11 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue()); //Brief description
            $vmo_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue()); //VMO contact
            $string_field_49 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(6) . $a)->getValue()); //Category
            $string_field_46 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue()); //Region
            $vendor_tin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue()); //TIN/EIN
            $date_field_3 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue()); //Start date
            $vendor_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue()); //Phone #
            $string_field_152 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(11) . $a)->getValue()); //Fax #
            $vendor_website = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue()); //Website URL
            $string_field_151 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue()); //Stock symbol
            $string_field_149 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue()); //Parent vendor
            $string_field_150 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(15) . $a)->getValue()); //Parent vendor notes
            $oracle_status = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(16) . $a)->getValue()); //Parent vendor status
            $string_field_22 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(17) . $a)->getValue()); //On OFAC list?
            $string_field_127 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(18) . $a)->getValue()); //OFAC first searched on
            $string_field_69 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(19) . $a)->getValue()); //OFAC last searched on
            $string_field_71 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(20) . $a)->getValue()); //Previous OFAC matches
            $string_field_72 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(21) . $a)->getValue()); //Potential OFAC matches
            $string_field_14 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(22) . $a)->getValue()); //Owner classification - DOB
            $string_field_74 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(23) . $a)->getValue()); //DOB - certification #
            $date_field_9 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(24) . $a)->getValue()); //DOB - completion date
            $string_field_76 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(25) . $a)->getValue()); //Owner classification - DVBE
            $string_field_77 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(26) . $a)->getValue()); //DVBE - certification #
            $date_field_10 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(27) . $a)->getValue()); //DVBE - completion date
            $text_field_13 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(28    ) . $a)->getValue()); //Owner classification - DBE
            $text_field_14 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(29) . $a)->getValue()); //DBE - certification #
            $date_field_11 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(30) . $a)->getValue()); //DBE - completion date
            $string_field_79 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(31) . $a)->getValue()); //Owner classification - HUBZone
            $string_field_80 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(32) . $a)->getValue()); //HUBZone - certification #
            $date_field_12 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(33) . $a)->getValue()); //HUBZone - completion date
            $string_field_82 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(34) . $a)->getValue()); //Owner classification - LGBTE
            $string_field_83 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(35) . $a)->getValue()); //LGBTE - certification #
            $date_field_13 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(36) . $a)->getValue()); //LGBTE - completion date
            $string_field_85 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(37) . $a)->getValue()); //Owner classification - MBE
            $string_field_86 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(38) . $a)->getValue()); //MBE - certification #
            $date_field_14 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(39) . $a)->getValue()); //MBE - completion date
            $string_field_142 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(40) . $a)->getValue()); //MBE - ethnicity
            $string_field_88 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(41) . $a)->getValue()); //Owner classification - SDVBE
            $string_field_89 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(42) . $a)->getValue()); //SDVBE - certification #
            $date_field_17 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(43) . $a)->getValue()); //SDVBE - completion date
            $string_field_91 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(44) . $a)->getValue()); //Owner classification - SDVOSB
            $string_field_92 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(45) . $a)->getValue()); //SDVOSB - certification #
            $date_field_18 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(46) . $a)->getValue()); //SDVOSB - completion date
            $string_field_94 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(47) . $a)->getValue()); //Owner classification - SBE
            $string_field_95 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(48) . $a)->getValue()); //SBE - certification #
            $date_field_19 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(49) . $a)->getValue()); //SBE - completion date
            $string_field_97 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(50) . $a)->getValue()); //Owner classification - SDBE
            $string_field_98 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(51) . $a)->getValue()); //SDBE - certification #
            $date_field_20 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(52) . $a)->getValue()); //SDVBE - completion date
            $string_field_146 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(53) . $a)->getValue()); //Owner classification - VOB
            $string_field_147 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(54) . $a)->getValue()); //VOB - certification #
            $string_field_148 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(55) . $a)->getValue()); //VOB - completion date
            $string_field_91 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(56) . $a)->getValue()); //Owner classification - VOSB
            $string_field_101 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(57) . $a)->getValue()); //VOSB - certification #
            $date_field_21 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(58) . $a)->getValue()); //VOSB - completion date
            $string_field_143 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(59) . $a)->getValue()); //Owner classification - WOSB
            $string_field_144 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(60) . $a)->getValue()); //WOSB - certification #
            $string_field_145 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(61) . $a)->getValue()); //WOSB - completion date
            $string_field_103 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(62) . $a)->getValue()); //Owner classification - WBE                         
            $string_field_104 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(63) . $a)->getValue()); //WBE - certification 
            $date_field_22 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(64) . $a)->getValue()); //WBE - completion date
            $string_field_47 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(65) . $a)->getValue()); //Market VP Approval
            $date_field_8 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(66) . $a)->getValue()); //Market VP Approval Date
            $date_field_2 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(67) . $a)->getValue()); //Request Date
            $date_field_1 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(68) . $a)->getValue()); //Need By Date
            $date_field_4 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(69) . $a)->getValue()); //Initial Oracle Process Date
            $string_field_48 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(70) . $a)->getValue()); //Oracle Pay Group
            $string_field_45 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(71) . $a)->getValue()); //Oracle ID
            $string_field_23 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(72) . $a)->getValue()); //MNS PROJECTS
            $string_field_106 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(73) . $a)->getValue()); //2020 TURF MCA
            $string_field_21 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(74) . $a)->getValue()); //MNS PAYMENT TERM
            $string_field_128 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(75) . $a)->getValue()); //1805 SCS
            $string_field_25 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(76) . $a)->getValue()); //1806 EPC
            $string_field_129 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(77) . $a)->getValue()); //1820 NSG
            $string_field_26 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(78) . $a)->getValue()); //Core Competency - Wireless
            $date_field_5 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(79) . $a)->getValue()); //Linked to MASTEC in AVETTA
            $date_field_6 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(80) . $a)->getValue()); //Linked to CORAL in AVETTA
            $string_field_130 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(81) . $a)->getValue()); //AVETTA PROFILE FEE
            $string_field_131 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(82) . $a)->getValue()); //AVETTA/PICS Certification
            $string_field_50 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(83) . $a)->getValue()); //AVETTA/PICS ID#
            $date_field_7 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(84) . $a)->getValue()); //AVETTA CERTIFIED FOR MASTEC
            $string_field_27 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(85) . $a)->getValue()); //Sub Info on File
            $string_field_132 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(86) . $a)->getValue()); //State(s) Covered
            $string_field_133 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(87) . $a)->getValue()); //Preferred Vendor
            $string_field_134 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(88) . $a)->getValue()); //D&B Number
            $string_field_135 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(89) . $a)->getValue()); //Legacy Company
            $string_field_136 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(90) . $a)->getValue()); //DOT #
            $string_field_137 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(91) . $a)->getValue()); //Westower Critical
            $string_field_138 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(92) . $a)->getValue()); //Self-Performing Crews
            $customer_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(93) . $a)->getValue()); //Customer Name
            $string_field_8 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(94) . $a)->getValue()); //Negotiated Project Pricing
            $string_field_6 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(95) . $a)->getValue()); //Oracle Supplier Site Setup
            $string_field_124 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(96) . $a)->getValue()); //MNS Region (S)
            $string_field_125 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(97) . $a)->getValue()); //MNS Region (O)
            $string_field_115 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(98) . $a)->getValue()); //Service Type & Scope Areas (S)
            $string_field_116 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(99) . $a)->getValue()); //Service Type & Scope Areas (O)
            $string_field_18 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(100) . $a)->getValue()); //Compliance Req. Exemptions
            $text_field_12 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(101) . $a)->getValue()); //Exemption Comments
            $string_field_108 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(102) . $a)->getValue()); //Finance/Factoring Institution
            $string_field_123 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(103) . $a)->getValue()); //Ethics?
            $string_field_140 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(104) . $a)->getValue()); //3rd party doc required
            $string_field_28 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(105) . $a)->getValue()); //NDA in place?
            $string_field_59 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(106) . $a)->getValue()); //Primary mailing - address, line 1
            $string_field_117 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(107) . $a)->getValue()); //Primary mailing - address, line 2
            $string_field_118 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(108) . $a)->getValue()); //Primary mailing - address, line 3
            $string_field_119 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(109) . $a)->getValue()); //Primary mailing - city
            $string_field_120 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(110) . $a)->getValue()); //Primary mailing - stat
            $string_field_121 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(111) . $a)->getValue()); //Primary mailing - province/territory
            $string_field_122 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(112) . $a)->getValue()); //Primary mailing - country
            $string_field_141 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(113) . $a)->getValue()); //Primary mailing - postal code
            $string_field_126 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(114) . $a)->getValue()); //Primary mailing - phone
            $string_field_153 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(115) . $a)->getValue()); //VendorRisk URL
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)==0){
                $vendor_data['vendor_name'] = $vendor_name;
                $vendor_data['vendor_alternate_name'] = $vendor_alternate_name;
                $vendor_data['text_field_11'] = $text_field_11;
                $vendor_data['vmo_contact'] = $vmo_contact;
                $vendor_data['string_field_46'] = $string_field_46;
                $vendor_data['vendor_tin'] = $vendor_tin;
                $vendor_data['date_field_3'] = $date_field_3;
                $vendor_data['vendor_phone'] = $vendor_phone;
                $vendor_data['string_field_152'] = $string_field_152;
                $vendor_data['vendor_website'] = $vendor_website;
                $vendor_data['string_field_151'] = $string_field_151;
                $vendor_data['string_field_149'] = $string_field_149;
                $vendor_data['string_field_150'] = $string_field_150;
                $vendor_data['oracle_status'] = $oracle_status;
                $vendor_data['string_field_22'] = $string_field_22;
                $vendor_data['string_field_127'] = $string_field_127;
                $vendor_data['string_field_69'] = $string_field_69;
                $vendor_data['string_field_71'] = $string_field_71;
                $vendor_data['string_field_72'] = $string_field_72;
                $vendor_data['string_field_14'] = $string_field_14;
                $vendor_data['string_field_74'] = $string_field_74;
                $vendor_data['date_field_9'] = $date_field_9;
                $vendor_data['string_field_76'] = $string_field_76;
                $vendor_data['string_field_77'] = $string_field_77;
                $vendor_data['date_field_10'] = $date_field_10;
                $vendor_data['text_field_13'] = $text_field_13;
                $vendor_data['text_field_14'] = $text_field_14;
                $vendor_data['date_field_11'] = $date_field_11;
                $vendor_data['string_field_79'] = $string_field_79;
                $vendor_data['string_field_80'] = $string_field_80;
                $vendor_data['date_field_12'] = $date_field_12;
                $vendor_data['string_field_82'] = $string_field_82;
                $vendor_data['string_field_83'] = $string_field_83;
                $vendor_data['date_field_13'] = $date_field_13;
                $vendor_data['string_field_85'] = $string_field_85;
                $vendor_data['string_field_86'] = $string_field_86;
                $vendor_data['date_field_14'] = $date_field_14;
                $vendor_data['string_field_142'] = $string_field_142;
                $vendor_data['string_field_88'] = $string_field_88;
                $vendor_data['string_field_89'] = $string_field_89;
                $vendor_data['date_field_17'] = $date_field_17;
                $vendor_data['string_field_91'] = $string_field_91;
                $vendor_data['string_field_92'] = $string_field_92;
                $vendor_data['date_field_18'] = $date_field_18;
                $vendor_data['string_field_94'] = $string_field_94;
                $vendor_data['string_field_95'] = $string_field_95;
                $vendor_data['date_field_19'] = $date_field_19;
                $vendor_data['string_field_97'] = $string_field_97;
                $vendor_data['string_field_98'] = $string_field_98;
                $vendor_data['date_field_20'] = $date_field_20;
                $vendor_data['string_field_146'] = $string_field_146;
                $vendor_data['string_field_147'] = $string_field_147;
                $vendor_data['string_field_148'] = $string_field_148;
                $vendor_data['string_field_91'] = $string_field_91;
                $vendor_data['string_field_101'] = $string_field_101;
                $vendor_data['date_field_21'] = $date_field_21;
                $vendor_data['string_field_143'] = $string_field_143;
                $vendor_data['string_field_144'] = $string_field_144;
                $vendor_data['string_field_145'] = $string_field_145;
                $vendor_data['string_field_103'] = $string_field_103;
                $vendor_data['string_field_104'] = $string_field_104;
                $vendor_data['date_field_22'] = $date_field_22;
                $vendor_data['string_field_47'] = $string_field_47;
                $vendor_data['date_field_8'] = $date_field_8;
                $vendor_data['date_field_2'] = $date_field_2;
                $vendor_data['date_field_1'] = $date_field_1;
                $vendor_data['date_field_4'] = $date_field_4;
                $vendor_data['string_field_48'] = $string_field_48;
                $vendor_data['string_field_45'] = $string_field_45;
                $vendor_data['string_field_23'] = $string_field_23;
                $vendor_data['string_field_106'] = $string_field_106;
                $vendor_data['string_field_21'] = $string_field_21;
                $vendor_data['string_field_128'] = $string_field_128;
                $vendor_data['string_field_25'] = $string_field_25;
                $vendor_data['string_field_129'] = $string_field_129;
                $vendor_data['string_field_26'] = $string_field_26;
                $vendor_data['date_field_5'] = $date_field_5;
                $vendor_data['date_field_6'] = $date_field_6;
                $vendor_data['string_field_130'] = $string_field_130;
                $vendor_data['string_field_131'] = $string_field_131;
                $vendor_data['string_field_150'] = $string_field_150;
                $vendor_data['date_field_7'] = $date_field_7;
                $vendor_data['string_field_27'] = $string_field_27;
                $vendor_data['string_field_132'] = $string_field_132;
                $vendor_data['string_field_133'] = $string_field_133;
                $vendor_data['string_field_134'] = $string_field_134;
                $vendor_data['string_field_135'] = $string_field_135;
                $vendor_data['string_field_136'] = $string_field_136;
                $vendor_data['string_field_137'] = $string_field_137;
                $vendor_data['string_field_138'] = $string_field_138;
                $vendor_data['customer_name'] = $customer_name;
                $vendor_data['string_field_8'] = $string_field_8;
                $vendor_data['string_field_6'] = $string_field_6;
                $vendor_data['string_field_124'] = $string_field_124;
                $vendor_data['string_field_125'] = $string_field_125;
                $vendor_data['string_field_115'] = $string_field_115;
                $vendor_data['string_field_116'] = $string_field_116;
                $vendor_data['string_field_18'] = $string_field_18;
                $vendor_data['text_field_12'] = $text_field_12;
                $vendor_data['string_field_108'] = $string_field_108;
                $vendor_data['string_field_132'] = $string_field_132;
                $vendor_data['string_field_140'] = $string_field_140;
                $vendor_data['string_field_28'] = $string_field_28;
                $vendor_data['string_field_59'] = $string_field_59;
                $vendor_data['string_field_117'] = $string_field_117;
                $vendor_data['string_field_118'] = $string_field_118;
                $vendor_data['string_field_119'] = $string_field_119;
                $vendor_data['string_field_120'] = $string_field_120;
                $vendor_data['string_field_121'] = $string_field_121;
                $vendor_data['string_field_122'] = $string_field_122;
                $vendor_data['string_field_141'] = $string_field_141;
                $vendor_data['string_field_126'] = $string_field_126;
                $vendor_data['string_field_153'] = $string_field_153;
                $vendor_data['string_field_153'] = $string_field_153;
                
                $query = $this->db->insert('mod_staffone_vendors', $vendor_data);
            }
            
            echo $a;         
            echo "<pre>"; print_r($vendor_data); echo "</pre>";
            echo "<br />";
            $end = $st+500;              
            if($a>$end)break;            
            //var_dump($results);                                    
            //echo "<br />";
            //echo "<br />";    
        }
    }
    
    function add_vendor_addresses($st=2){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');
        
        $storepath = FCPATH . '/vendorimport/vaddresses.xlsx';
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);        
        $objPHPExcel = $objReader->load($storepath);        
        
        $rowstart = $st;        
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); //Vendor
            $address_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue()); //Type
            $vendor_address_line1 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue()); //Address, line 1
            $vendor_address_line2 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue()); //Address, line 2
            $vendor_address_line3 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(5) . $a)->getValue()); //Address, line 3
            $vendor_city = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(6) . $a)->getValue()); //City
            $vendor_state = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue()); //State
            $province_territory = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue()); //Province/territory
            $vendor_country = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue()); //Country
            $vendor_postcode = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue()); //Postal code
            $address_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(11) . $a)->getValue()); //Phone #
            $county = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue()); //County
            $archived = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue()); //Archived?
            
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){
                $id_vendor = $results->id_vendor;
                
                $vendor_data['address_type'] = $address_type;
                $vendor_data['vendor_address_line1'] = $vendor_address_line1;
                $vendor_data['vendor_address_line2'] = $vendor_address_line2;
                $vendor_data['vendor_address_line3'] = $vendor_address_line3;
                $vendor_data['vendor_city'] = $vendor_city;
                $vendor_data['vendor_state'] = $vendor_state;
                $vendor_data['province_territory'] = $province_territory;
                $vendor_data['vendor_country'] = $vendor_country;
                $vendor_data['vendor_postcode'] = $vendor_postcode;
                $vendor_data['address_phone'] = $address_phone;
                $vendor_data['county'] = $county;
                $vendor_data['archived'] = $archived;                
                $vendor_data['id_vendor'] = $id_vendor;
                
                //$query = $this->db->insert('mod_staffone_vendors_addresses', $vendor_data);
            }
            
            echo $a;         
            echo "<pre>"; print_r($vendor_data); echo "</pre>";
            echo "<br />";
            $end = $st+500;              
            if($a>$end)break;            
            //var_dump($results);                                    
            //echo "<br />";
            //echo "<br />";    
        }
    }
    
    function add_vendors_contacts($st=2){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');
        
        $storepath = FCPATH . '/vendorimport/vcontacts.xlsx';
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);        
        $objPHPExcel = $objReader->load($storepath);        
        
        $rowstart = $st;        
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); //Vendor
            $contact_first_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(1) . $a)->getValue());  //First name      
            $contact_last_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue()); //Last name
            $contact_email = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue()); //Email        
            $contact_title = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue()); //Title
            $contact_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(5) . $a)->getValue()); //Work phone             
            $contact_alt_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(6) . $a)->getValue()); //Alt. phone
            $contact_mobile_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue()); //Mobile phone
            $contact_primary = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue()); //Primary?
            $contact_emergency = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue()); //Emergency?
            $contact_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(11) . $a)->getValue()); //Type
            $contact_document_request_email_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue()); //Document request email contact?
            $contact_notes = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue()); //Notes
            $contact_archived = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue()); //Archived?
            $contact_vendorrisk_url = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue()); //VendorRisk URL
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){
                $id_vendor = $results->id_vendor;
                
                $get_address = $this->db->get_where('mod_staffone_vendors_addresses', array('id_vendor' => $id_vendor,'address_type'=>'Primary'));
                $address_result = $get_address->row();
                
                $id_address = $address_result->id_address;
                
                if($id_address>0){
                    
                    $vendor_data['contact_first_name'] = $contact_first_name;
                    $vendor_data['contact_last_name'] = $contact_last_name;
                    $vendor_data['contact_email'] = $contact_email;
                    $vendor_data['contact_title'] = $contact_title;
                    $vendor_data['contact_phone'] = $contact_phone;                                
                    $vendor_data['contact_alt_phone'] = $contact_alt_phone;
                    $vendor_data['contact_mobile_phone'] = $contact_mobile_phone;
                    $vendor_data['contact_primary'] = $contact_primary;            
                    $vendor_data['contact_emergency'] = $contact_emergency;            
                    $vendor_data['contact_type'] = $contact_type;
                    $vendor_data['contact_document_request_email_contact'] = $contact_document_request_email_contact;
                    $vendor_data['contact_notes'] = $contact_notes;
                    $vendor_data['contact_archived'] = $contact_archived;                    
                    $vendor_data['contact_vendorrisk_url'] = $contact_vendorrisk_url;
                    $vendor_data['id_address'] = $id_address;                    
                    
                    $query = $this->db->insert('mod_staffone_vendors_address_contacts', $vendor_data);
                }
            }
            echo $a;         
            echo "<pre>"; print_r($vendor_data); echo "</pre>";
            echo "<br />";
            $end = $st+500;              
            if($a>$end)break;            
            //var_dump($results);                                    
            //echo "<br />";
            //echo "<br />";    
        }
    }
    
    function add_vendors_insurance_policies($st=2){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');
        
        $storepath = FCPATH . '/vendorimport/insurance/vendors-insurance-policies.xlsx';
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);        
        $objPHPExcel = $objReader->load($storepath);        
        
        $rowstart = $st;        
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); //Vendor
            $coverage_provider = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue());        
            $coverage_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue());        
            $carrier_limit = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue());                        
            $policy_number = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(15) . $a)->getValue());                        
            $expired_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(16) . $a)->getValue());                                    
            $contract = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(17) . $a)->getValue());                                    
            $notes = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(18) . $a)->getValue());
            $archived = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(19) . $a)->getValue());
            $issued_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(20) . $a)->getValue());
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){
                
                $id_vendor = $results->id_vendor;    
                $vendor_tin = $results->vendor_tin;
                
                $get_query1 = $this->db->get_where('mod_staffone_certificate_list', array('staffone_certificate_list_name' => $coverage_type));
                $results1 = $get_query1->row();
                
                if(count($results1)>0){
                    
                    $staffone_certificate_list_name = $results1->staffone_certificate_list_name;
                    
                    if(!empty(trim($policy_number)) && isset($results1->id_staffone_certificate_list)){
                        
                        $uploadPath = '/data/nexsysone/certificates/vendors/' . $id_vendor . '/'. $results1->id_staffone_certificate_list . '/';                        
                        $filetocopy = '/var/www/mastec/sample-document-for-vendors-management.pdf';                        
                        $fileInfo = pathinfo($filetocopy);
                        $fileExtension = $fileInfo['extension'];                        
                        $fileName = 'Dummy_' . $vendor_tin . '_' . str_replace(' ', '', $staffone_certificate_list_name) . '_' . time() . '.' . $fileExtension;
                        
                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        
                        if(copy($filetocopy, $uploadPath.$fileName)){                            
                            $copty['filetocopy'] = $filetocopy;
                            $copty['desti_file'] = $uploadPath.$fileName;
                        }
                        
                        $object = [
                            'id_staffone_certificate_list' => $results1->id_staffone_certificate_list,
                            'id_vendor' => $id_vendor,
                            'id_staffone_employee' => null,
                            'staffone_certificate_file_stored_filename' => $fileName,
                            'staffone_certificate_file_name' => $fileName,
                            'staffone_certificate_file_size' => '143 KB',
                            'staffone_certificate_file_uploaded' => 1,
                            'staffone_certificate_file_uploaded_by' => '7E49-00105',
                            'staffone_certificate_file_last_updated_by' => '7E49-00105'
                        ];
                        
                        $this->db->insert('mod_staffone_certificate_files', $object);
                        $id_staffone_certificate_file = $this->db->insert_id();
                        
                        $vendor_data['coverage_provider'] = $coverage_provider;
                        $vendor_data['coverage_type'] = $coverage_type;
                        $vendor_data['carrier_limit'] = $carrier_limit;
                        $vendor_data['policy_number'] = $policy_number;                        
                        $vendor_data['contract'] = $contract;            
                        $vendor_data['notes'] = $notes;
                        $vendor_data['archived'] = $archived;
                        $vendor_data['issued_date'] = date("Y-m-d", strtotime($issued_date));
                        $vendor_data['expired_date'] = date("Y-m-d", strtotime($expired_date));                        
                        $vendor_data['id_vendor'] = $id_vendor;
                        $vendor_data['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                        $vendor_data['id_staffone_certificate_file'] = $id_staffone_certificate_file;
                        $vendor_data['document_type'] = 'INSURANCE';
                        $vendor_data['last_updated'] = date('Y-m-d H:i:s');                        
                        
                        $query = $this->db->insert('mod_staffone_certificate_list_details', $vendor_data);
                        
                        if($query){
                            $get_query2 = $this->db->get_where('mod_staffone_certificates_sub_categories_certificates_lists', array('id_staffone_certificate_list' => $results1->id_staffone_certificate_list,'id_sub_category'=>92));
                            $results2 = $get_query2->result();                            
                            
                            if(count($results2)==0){   
                                $data2['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                                $data2['id_sub_category'] = 92;                                
                                $data2['mandatory'] = 0;                                
                                $this->db->insert('mod_staffone_certificates_sub_categories_certificates_lists', $data2);
                            }
                        }
                        
                        echo "<pre>"; print_r($vendor_data);
                        echo "<pre>"; print_r($object);
                        echo "<pre>"; print_r($results);
                    }
                }
            }
            
            echo $a;         
            echo "<br />";
            $end = $st+500;              
            if($a>$end)break;                             
            //var_dump($results);                                    
            //echo "<br />";
            //echo "<br />";    
        }
    }
    
    function add_vendors_contracts($st=3){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');
        
        $storepath = FCPATH . '/vendorimport/contracts/vendors-contracts.xlsx';
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);        
        $objPHPExcel = $objReader->load($storepath);        
        
        $id_sub_category = 93;
        $rowstart = $st;        
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue());  //Vendor
            $contracts_contract = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(1) . $a)->getValue()); //Contract
            $contracts_vmo_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue());  //VMO contact
            $contracts_department = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue()); //Department
            $contracts_status = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue()); //Status       
            $contracts_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(5) . $a)->getValue());  //Type      
            $contracts_brief_description = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(6) . $a)->getValue());//Brief description
            $contracts_parent_contract = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue());     //Parent contract
            $contracts_contract_signers_approvers = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue());//Contract signers/approvers
            $contracts_legal_review = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue());//Legal review
            $contracts_reviewed_by = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue());//Reviewed by
            $contracts_legal_review_notes = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(11) . $a)->getValue());//Legal review notes
            $contracts_vendor_point_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue());//Vendor point of contact
            $contracts_original_contract_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue());//Original contract date
            $contracts_start_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue());  //Start date
            $contracts_termination_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(15) . $a)->getValue()); //Termination date
            $contracts_termination_date_na = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(16) . $a)->getValue());//Termination date N/A?
            $contracts_notification_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(17) . $a)->getValue());//Notification date
            $contracts_notice_requirement = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(18) . $a)->getValue());//Notice requirement?
            $contracts_auto_renews = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(19) . $a)->getValue());//Auto-renews
            $contracts_auto_renewal_interval = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(20) . $a)->getValue());//Auto-renewal interval
            $contracts_name_contracting_party_correct = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(21) . $a)->getValue());//Name of contracting party correct
            $contracts_name_contracting_party_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(22) . $a)->getValue());//Name of contracting party details
            $contracts_services_clearly_defined = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(23) . $a)->getValue());//Services clearly defined
            $contracts_service_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(24) . $a)->getValue());//Service details
            $contracts_fees_payment_terms_clearly_defined = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(25) . $a)->getValue());//Fees & payment terms clearly defined
            $contracts_fees_payment_term_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(26) . $a)->getValue());//Fees & payment term details
            $contracts_right_terminate_without_cause = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(27) . $a)->getValue());//Right to terminate without cause
            $contracts_right_terminate_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(28) . $a)->getValue());//Right to terminate details
            $contracts_client_right_terminate_with_cause = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(29) . $a)->getValue());//Client right to terminate with cause
            $contracts_client_right_terminate_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(30) . $a)->getValue());//Client right to terminate details
            $contracts_non_compete = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(31) . $a)->getValue());//Non-compete
            $contracts_non_compete_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(32) . $a)->getValue());//Non-compete details
            $contracts_no_solicitation = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(33) . $a)->getValue());//No solicitation
            $contracts_no_solicitation_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(34) . $a)->getValue());//No solicitation details
            $contracts_no_hire = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(35) . $a)->getValue());//No hire
            $contracts_no_hire_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(36) . $a)->getValue());//No hire details
            $contracts_mutual_confidentiality = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(37) . $a)->getValue());//Mutual confidentiality
            $contracts_mutual_confidentiality_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(38) . $a)->getValue());//Mutual confidentiality details
            $contracts_vendor_confidentiality = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(39) . $a)->getValue());//Vendor confidentiality
            $contracts_vendor_confidentiality_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(40) . $a)->getValue());//Vendor confidentiality details
            $contracts_client_confidentiality = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(41) . $a)->getValue());//Client confidentiality
            $contracts_client_confidentiality_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(42) . $a)->getValue());//Client confidentiality details
            $contracts_limitation_of_liability = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(43) . $a)->getValue());//Limitation of liability
            $contracts_limitation_of_liability_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(44) . $a)->getValue());//Limitation of liability details
            $contracts_mutual_indemnification = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(45) . $a)->getValue());//Mutual indemnification
            $contracts_mutual_indemnification_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(46) . $a)->getValue());//Mutual indemnification details
            $contracts_vendor_indemnification = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(47) . $a)->getValue());//Vendor indemnification
            $contracts_vendor_indemnification_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(48) . $a)->getValue());//Vendor indemnification details
            $contracts_client_indemnification = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(49) . $a)->getValue());//Client indemnification
            $contracts_client_indemnification_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(50) . $a)->getValue());//Client indemnification details
            $contracts_jurisdiction = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(51) . $a)->getValue());//Jurisdiction
            $contracts_exclusive_jurisdiction = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(52) . $a)->getValue());//Exclusive jurisdiction
            $contracts_jurisdiction_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(53) . $a)->getValue());//Jurisdiction details
            $contracts_governing_law = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(54) . $a)->getValue());//Governing law
            $contracts_governing_law_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(55) . $a)->getValue());//Governing law details
            $contracts_dispute_resolution = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(56) . $a)->getValue());//Dispute resolution
            $contracts_dispute_resolution_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(57) . $a)->getValue());//Dispute resolution details
            $contracts_privacy_provision = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(58) . $a)->getValue());//Privacy provision
            $contracts_privacy_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(59) . $a)->getValue());//Privacy details
            $contracts_vendor_insurance_requirements_set_forth = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(60) . $a)->getValue());//Vendor insurance requirements set forth
            $contracts_vendor_insurance_requirements_set_forth_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(61) . $a)->getValue());//Vendor insurance requirements set forth details
            $contracts_notification_of_security_breaches = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(62) . $a)->getValue());//Notification of security breaches
            $contracts_notification_of_security_breach_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(63) . $a)->getValue());//Notification of security breach details
            $contracts_client_right_to_audit = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(64) . $a)->getValue());//Client right to audit
            $contracts_client_right_to_audit_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(65) . $a)->getValue());//Client right to audit details
            $contracts_vendor_use_of_subcontractors = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(66) . $a)->getValue());//Vendor use of subcontractors
            $contracts_vendor_use_of_subcontractors_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(67) . $a)->getValue());//Vendor use of subcontractors details
            $contracts_assignment_restricted = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(68) . $a)->getValue());//Assignment restricted
            $contracts_assignment_restricted_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(69) . $a)->getValue());//Assignment restricted details
            $contracts_fully_executed = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(70) . $a)->getValue());//Fully executed
            $contracts_fully_executed_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(71) . $a)->getValue());//Fully executed details
            $contracts_exclusionary_list_check = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(72) . $a)->getValue());//Exclusionary list check
            $contracts_exclusionary_list_check_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(73) . $a)->getValue());//Exclusionary list check details
            $contracts_business_continuity_disaster_recovery = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(74) . $a)->getValue());//Business continuity / disaster recovery
            $contracts_business_continuity_disaster_recovery_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(75) . $a)->getValue());//Business continuity / disaster recovery details
            $contracts_force_majeure = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(76) . $a)->getValue());//Force majeure
            $contracts_force_majeure_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(77) . $a)->getValue());//Force majeure details
            $contracts_notice_information_address_1 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(78) . $a)->getValue());//Notice information, address 1
            $contracts_notice_information_address_2 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(79) . $a)->getValue());//Notice information, address 2
            $contracts_notice_information_address_3 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(80) . $a)->getValue());//Notice information, address 3
            $contracts_notice_information_city = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(81) . $a)->getValue());//Notice information, city
            $contracts_notice_information_state = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(82) . $a)->getValue());//Notice information, state
            $contracts_notice_information_province = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(83) . $a)->getValue());//Notice information, province
            $contracts_notice_information_country = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(84) . $a)->getValue());//Notice information, country
            $contracts_notice_information_postal = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(85) . $a)->getValue());//Notice information, postal
            $contracts_notice_information_email = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(86) . $a)->getValue());//Notice information, email
            $contracts_notice_information_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(87) . $a)->getValue());//Notice information, phone
            $contracts_notice_information_fax = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(88) . $a)->getValue());//Notice information, fax
            $contracts_notice_information_attention = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(89) . $a)->getValue());//Notice information, attention
            $contracts_notice_information_copy_to = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(90) . $a)->getValue());//Notice information, copy to
            $contracts_payment_term_archive = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(91) . $a)->getValue());//Payment term (Archive)
            $contracts_payment_term_new = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(92) . $a)->getValue());//Payment term (NEW)
            $contracts_pricing = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(93) . $a)->getValue());//Pricing
            $contracts_home_state = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(94) . $a)->getValue());//Home state
            $contracts_email_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(95) . $a)->getValue());//Email contact
            $contracts_project_archive = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(96) . $a)->getValue());//Project (Archive)
            $contracts_mns_project_new = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(97) . $a)->getValue());//MNS Project (NEW)
            $contracts_contract_status = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(98) . $a)->getValue());//Contract Status
            $contracts_pricing_region_premium_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(99) . $a)->getValue());//Pricing region-Premium Margin
            $contracts_pricing_region_standard_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(100) . $a)->getValue());//Pricing region-Standard Margin
            $contracts_pricing_region_reduced_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(101) . $a)->getValue());//Pricing region-Reduced Margin
            $contracts_pricing_region_flat_fee = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(102) . $a)->getValue());//Pricing region-Flat Fee
            $contracts_turf_4_0_premium_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(103) . $a)->getValue());//TURF 4.0 - Premium Margin
            $contracts_turf_4_0_standard_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(104) . $a)->getValue());//TURF 4.0 - Standard Margin
            $contracts_turf_4_0_reduced_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(105) . $a)->getValue());//TURF 4.0 - Reduced Margin
            $contracts_turf_4_0_flat_fee = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(106) . $a)->getValue());//TURF 4.0 - Flat Fee
            $contracts_custom_email_reminder_schedule = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(107) . $a)->getValue());//Custom email reminder schedule
            $contracts_vendorrisk_url = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(108) . $a)->getValue());//VendorRisk URL
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){
                
                $id_vendor = $results->id_vendor;    
                $vendor_tin = $results->vendor_tin;
                
                $get_query1 = $this->db->get_where('mod_staffone_certificate_list', array('staffone_certificate_list_name' => $contracts_contract));
                $results1 = $get_query1->row();
                
                
                if(count($results1)>0){
                    
                    $staffone_certificate_list_name = $results1->staffone_certificate_list_name;
                    
                    if(isset($results1->id_staffone_certificate_list)){
                        
                        $uploadPath = '/data/nexsysone/certificates/vendors/' . $id_vendor . '/'. $results1->id_staffone_certificate_list . '/';                        
                        $filetocopy = '/var/www/mastec/sample-document-for-vendors-management.pdf';                        
                        $fileInfo = pathinfo($filetocopy);
                        $fileExtension = $fileInfo['extension'];                        
                        $fileName = 'Dummy_Contracts_' . $vendor_tin . '_' . str_replace(' ', '', $staffone_certificate_list_name) . '_' . time() . '.' . $fileExtension;
                        
                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        
                        if(copy($filetocopy, $uploadPath.$fileName)){                            
                            $copty['filetocopy'] = $filetocopy;
                            $copty['desti_file'] = $uploadPath.$fileName;
                        }
                        
                        $object = [
                            'id_staffone_certificate_list' => $results1->id_staffone_certificate_list,
                            'id_vendor' => $id_vendor,
                            'id_staffone_employee' => null,
                            'staffone_certificate_file_stored_filename' => $fileName,
                            'staffone_certificate_file_name' => $fileName,
                            'staffone_certificate_file_size' => '143 KB',
                            'staffone_certificate_file_uploaded' => 1,
                            'staffone_certificate_file_uploaded_by' => '7E49-00105',
                            'staffone_certificate_file_last_updated_by' => '7E49-00105'
                        ];
                        
                        $this->db->insert('mod_staffone_certificate_files', $object);
                        $id_staffone_certificate_file = $this->db->insert_id();
                        
                        $vendor_data['contracts_contract'] = $contracts_contract;
                        $vendor_data['contracts_vmo_contact'] = $contracts_vmo_contact;
                        $vendor_data['contracts_department'] = $contracts_department;
                        $vendor_data['contracts_status'] = $contracts_status;
                        $vendor_data['contracts_type'] = $contracts_type;
                        $vendor_data['contracts_brief_description'] = $contracts_brief_description;
                        $vendor_data['contracts_parent_contract'] = $contracts_parent_contract;
                        $vendor_data['contracts_contract_signers_approvers'] = $contracts_contract_signers_approvers;
                        $vendor_data['contracts_legal_review'] = $contracts_legal_review;
                        $vendor_data['contracts_reviewed_by'] = $contracts_reviewed_by;
                        $vendor_data['contracts_legal_review_notes'] = $contracts_legal_review_notes;
                        $vendor_data['contracts_vendor_point_contact'] = $contracts_vendor_point_contact;
                        $vendor_data['contracts_original_contract_date'] = !empty($contracts_original_contract_date) ? $contracts_original_contract_date:null;
                        $vendor_data['contracts_start_date'] = !empty($contracts_start_date) ? $contracts_start_date:null;
                        $vendor_data['contracts_termination_date'] = !empty($contracts_termination_date) ? $contracts_termination_date:null;
                        $vendor_data['contracts_termination_date_na'] = $contracts_termination_date_na;
                        $vendor_data['contracts_notification_date'] = !empty($contracts_notification_date) ? $contracts_notification_date:null;
                        $vendor_data['contracts_notice_requirement'] = $contracts_notice_requirement;
                        $vendor_data['contracts_auto_renews'] = $contracts_auto_renews;
                        $vendor_data['contracts_auto_renewal_interval'] = $contracts_auto_renewal_interval;
                        $vendor_data['contracts_name_contracting_party_correct'] = $contracts_name_contracting_party_correct;
                        $vendor_data['contracts_name_contracting_party_details'] = $contracts_name_contracting_party_details;
                        $vendor_data['contracts_services_clearly_defined'] = $contracts_services_clearly_defined;
                        $vendor_data['contracts_service_details'] = $contracts_service_details;
                        $vendor_data['contracts_fees_payment_terms_clearly_defined'] = $contracts_fees_payment_terms_clearly_defined;
                        $vendor_data['contracts_fees_payment_term_details'] = $contracts_fees_payment_term_details;
                        $vendor_data['contracts_right_terminate_without_cause'] = $contracts_right_terminate_without_cause;
                        $vendor_data['contracts_right_terminate_details'] = $contracts_right_terminate_details;
                        $vendor_data['contracts_client_right_terminate_with_cause'] = $contracts_client_right_terminate_with_cause;
                        $vendor_data['contracts_client_right_terminate_details'] = $contracts_client_right_terminate_details;
                        $vendor_data['contracts_non_compete'] = $contracts_non_compete;
                        $vendor_data['contracts_non_compete_details'] = $contracts_non_compete_details;
                        $vendor_data['contracts_no_solicitation'] = $contracts_no_solicitation;
                        $vendor_data['contracts_no_solicitation_details'] = $contracts_no_solicitation_details;
                        $vendor_data['contracts_no_hire'] = $contracts_no_hire;
                        $vendor_data['contracts_no_hire_details'] = $contracts_no_hire_details;
                        $vendor_data['contracts_mutual_confidentiality'] = $contracts_mutual_confidentiality;
                        $vendor_data['contracts_mutual_confidentiality_details'] = $contracts_mutual_confidentiality_details;
                        $vendor_data['contracts_vendor_confidentiality'] = $contracts_vendor_confidentiality;
                        $vendor_data['contracts_vendor_confidentiality_details'] = $contracts_vendor_confidentiality_details;
                        $vendor_data['contracts_client_confidentiality'] = $contracts_client_confidentiality;
                        $vendor_data['contracts_client_confidentiality_details'] = $contracts_client_confidentiality_details;
                        $vendor_data['contracts_limitation_of_liability'] = $contracts_limitation_of_liability;
                        $vendor_data['contracts_limitation_of_liability_details'] = $contracts_limitation_of_liability_details;
                        $vendor_data['contracts_mutual_indemnification'] = $contracts_mutual_indemnification;
                        $vendor_data['contracts_mutual_indemnification_details'] = $contracts_mutual_indemnification_details;
                        $vendor_data['contracts_vendor_indemnification'] = $contracts_vendor_indemnification;
                        $vendor_data['contracts_vendor_indemnification_details'] = $contracts_vendor_indemnification_details;
                        $vendor_data['contracts_client_indemnification'] = $contracts_client_indemnification;
                        $vendor_data['contracts_client_indemnification_details'] = $contracts_client_indemnification_details;
                        $vendor_data['contracts_jurisdiction'] = $contracts_jurisdiction;
                        $vendor_data['contracts_exclusive_jurisdiction'] = $contracts_exclusive_jurisdiction;
                        $vendor_data['contracts_jurisdiction_details'] = $contracts_jurisdiction_details;
                        $vendor_data['contracts_governing_law'] = $contracts_governing_law;
                        $vendor_data['contracts_governing_law_details'] = $contracts_governing_law_details;
                        $vendor_data['contracts_dispute_resolution'] = $contracts_dispute_resolution;
                        $vendor_data['contracts_dispute_resolution_details'] = $contracts_dispute_resolution_details;
                        $vendor_data['contracts_privacy_provision'] = $contracts_privacy_provision;
                        $vendor_data['contracts_privacy_details'] = $contracts_privacy_details;
                        $vendor_data['contracts_vendor_insurance_requirements_set_forth'] = $contracts_vendor_insurance_requirements_set_forth;
                        $vendor_data['contracts_vendor_insurance_requirements_set_forth_details'] = $contracts_vendor_insurance_requirements_set_forth_details;
                        $vendor_data['contracts_notification_of_security_breaches'] = $contracts_notification_of_security_breaches;
                        $vendor_data['contracts_notification_of_security_breach_details'] = $contracts_notification_of_security_breach_details;
                        $vendor_data['contracts_client_right_to_audit'] = $contracts_client_right_to_audit;
                        $vendor_data['contracts_client_right_to_audit_details'] = $contracts_client_right_to_audit_details;
                        $vendor_data['contracts_vendor_use_of_subcontractors'] = $contracts_vendor_use_of_subcontractors;
                        $vendor_data['contracts_vendor_use_of_subcontractors_details'] = $contracts_vendor_use_of_subcontractors_details;
                        $vendor_data['contracts_assignment_restricted'] = $contracts_assignment_restricted;
                        $vendor_data['contracts_assignment_restricted_details'] = $contracts_assignment_restricted_details;
                        $vendor_data['contracts_fully_executed'] = $contracts_fully_executed;
                        $vendor_data['contracts_fully_executed_details'] = $contracts_fully_executed_details;
                        $vendor_data['contracts_exclusionary_list_check'] = $contracts_exclusionary_list_check;
                        $vendor_data['contracts_exclusionary_list_check_details'] = $contracts_exclusionary_list_check_details;
                        $vendor_data['contracts_business_continuity_disaster_recovery'] = $contracts_business_continuity_disaster_recovery;
                        $vendor_data['contracts_business_continuity_disaster_recovery_details'] = $contracts_business_continuity_disaster_recovery_details;
                        $vendor_data['contracts_force_majeure'] = $contracts_force_majeure;
                        $vendor_data['contracts_force_majeure_details'] = $contracts_force_majeure_details;
                        $vendor_data['contracts_notice_information_address_1'] = $contracts_notice_information_address_1;
                        $vendor_data['contracts_notice_information_address_2'] = $contracts_notice_information_address_2;
                        $vendor_data['contracts_notice_information_address_3'] = $contracts_notice_information_address_3;
                        $vendor_data['contracts_notice_information_city'] = $contracts_notice_information_city;
                        $vendor_data['contracts_notice_information_state'] = $contracts_notice_information_state;
                        $vendor_data['contracts_notice_information_province'] = $contracts_notice_information_province;
                        $vendor_data['contracts_notice_information_country'] = $contracts_notice_information_country;
                        $vendor_data['contracts_notice_information_postal'] = $contracts_notice_information_postal;
                        $vendor_data['contracts_notice_information_email'] = $contracts_notice_information_email;
                        $vendor_data['contracts_notice_information_phone'] = $contracts_notice_information_phone;
                        $vendor_data['contracts_notice_information_fax'] = $contracts_notice_information_fax;
                        $vendor_data['contracts_notice_information_attention'] = $contracts_notice_information_attention;
                        $vendor_data['contracts_notice_information_copy_to'] = $contracts_notice_information_copy_to;
                        $vendor_data['contracts_payment_term_archive'] = $contracts_payment_term_archive;
                        $vendor_data['contracts_payment_term_new'] = $contracts_payment_term_new;
                        $vendor_data['contracts_pricing'] = $contracts_pricing;
                        $vendor_data['contracts_home_state'] = $contracts_home_state;
                        $vendor_data['contracts_email_contact'] = $contracts_email_contact;
                        $vendor_data['contracts_project_archive'] = $contracts_project_archive;
                        $vendor_data['contracts_mns_project_new'] = $contracts_mns_project_new;
                        $vendor_data['contracts_contract_status'] = $contracts_contract_status;
                        $vendor_data['contracts_pricing_region_premium_margin'] = $contracts_pricing_region_premium_margin;
                        $vendor_data['contracts_pricing_region_standard_margin'] = $contracts_pricing_region_standard_margin;
                        $vendor_data['contracts_pricing_region_reduced_margin'] = $contracts_pricing_region_reduced_margin;
                        $vendor_data['contracts_pricing_region_flat_fee'] = $contracts_pricing_region_flat_fee;
                        $vendor_data['contracts_turf_4_0_premium_margin'] = $contracts_turf_4_0_premium_margin;
                        $vendor_data['contracts_turf_4_0_standard_margin'] = $contracts_turf_4_0_standard_margin;
                        $vendor_data['contracts_turf_4_0_reduced_margin'] = $contracts_turf_4_0_reduced_margin;
                        $vendor_data['contracts_turf_4_0_flat_fee'] = $contracts_turf_4_0_flat_fee;
                        $vendor_data['contracts_custom_email_reminder_schedule'] = $contracts_custom_email_reminder_schedule;
                        $vendor_data['contracts_vendorrisk_url'] = $contracts_vendorrisk_url;                        
                        $vendor_data['document_type'] = 'CONTRACTS';
                        $vendor_data['id_vendor'] = $id_vendor;
                        $vendor_data['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                        $vendor_data['id_staffone_certificate_file'] = $id_staffone_certificate_file;                        
                        $vendor_data['last_updated'] = date('Y-m-d H:i:s');                        
                        
                        $query = $this->db->insert('mod_staffone_certificate_list_details', $vendor_data);
                        
                        if($query){
                            $get_query2 = $this->db->get_where('mod_staffone_certificates_sub_categories_certificates_lists', array('id_staffone_certificate_list' => $results1->id_staffone_certificate_list,'id_sub_category'=>$id_sub_category));
                            $results2 = $get_query2->result();                            
                            
                            if(count($results2)==0){   
                                $data2['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                                $data2['id_sub_category'] = $id_sub_category;  
                                $data2['mandatory'] = 0;                                
                                $this->db->insert('mod_staffone_certificates_sub_categories_certificates_lists', $data2);
                            }
                        }
                        
                        echo "<pre>"; print_r($vendor_data);
                        echo "<pre>"; print_r($object);
                        echo "<pre>"; print_r($results);
                    }
                }
            }
            
            echo $a;         
            echo "<br />";
            $end = $st+500;              
            if($a>$end)break;             
            //var_dump($results);                                    
            //echo "<br />";
            //echo "<br />";    
        }
    }
    
    
    
    function add_insrance_certificate_list_names(){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);
        
        require_once(APPPATH . 'libraries/PHPExcel.php');

        $storepath = FCPATH . '/vendorimport/insurance/insrance_certificate_list_names.xlsx';        
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);
        
        $objPHPExcel = $objReader->load($storepath);
        
        //echo "<pre>"; print_r($objPHPExcel); echo "</pre>";exit();
        
        $rowstart = 2;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {            
            $staffone_certificate_list_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue());        
            if(strlen($staffone_certificate_list_name)>0){                
                $get_query = $this->db->get_where('mod_staffone_certificate_list', array('staffone_certificate_list_name' => $staffone_certificate_list_name));
                $results = $get_query->result();
                
                if(count($results)==0){                    
                    $vendor_data['id_staffone_certificate_folder'] = 99;
                    $vendor_data['staffone_certificate_list_name'] = $staffone_certificate_list_name;
                    //$query = $this->db->insert('mod_staffone_certificate_list', $vendor_data);                                        
                    echo "<pre>"; print_r($vendor_data);
                    echo $row;
                    echo "<p>";
                }
            }
        }
    }
    function add_contracts_certificate_list_names(){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);
        
        require_once(APPPATH . 'libraries/PHPExcel.php');

        $storepath = FCPATH . '/vendorimport/contracts/contracts_certificate_list_names.xlsx';
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);
        
        $objPHPExcel = $objReader->load($storepath);
        
        //echo "<pre>"; print_r($objPHPExcel); echo "</pre>";exit();
        $id_staffone_certificate_folder = 99;
        $rowstart = 2;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {            
            $staffone_certificate_list_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue());        
            if(strlen($staffone_certificate_list_name)>0){                
                $get_query = $this->db->get_where('mod_staffone_certificate_list', array('staffone_certificate_list_name' => $staffone_certificate_list_name,'id_staffone_certificate_folder'=>$id_staffone_certificate_folder));
                $results = $get_query->result();
                
                if(count($results)==0){
                    $vendor_data['id_staffone_certificate_folder'] = $id_staffone_certificate_folder;
                    $vendor_data['staffone_certificate_list_name'] = $staffone_certificate_list_name;
                    //$query = $this->db->insert('mod_staffone_certificate_list', $vendor_data);                                        
                    echo "<pre>"; print_r($vendor_data);
                    echo $row;
                    echo "<p>";
                }
            }
        }
    }
    
    
    
    
    
    //OLD functions
    function updatevendor($st=2){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');

        $storepath = FCPATH . '/vendorimport/mastec-vendor-nov_01_2020.xlsx';
        
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);
        
        $objPHPExcel = $objReader->load($storepath);
        
        $rowstart = $st;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_tin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue());        
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue());        
            $Service_Type_Scope_Areas_S = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(98) . $a)->getValue());
            $Service_Type_Scope_Areas_O = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(99) . $a)->getValue());
            $string_field_115 = str_replace("-",'', $Service_Type_Scope_Areas_S);
            $string_field_116 = str_replace("-",'', $Service_Type_Scope_Areas_O);
            
            $string_field_115 = trim($string_field_115);
            $string_field_116 = trim($string_field_116);
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){
                $id_vendor = $results->id_vendor;
                //$vendor_data['id_vendor'] = $id_vendor;
                //$vendor_data['vendor_name'] = $vendor_name;
                $vendor_data['string_field_115'] = $string_field_115;
                $vendor_data['string_field_116'] = $string_field_116;
                
                $query = $this->db->update('mod_staffone_vendors', $vendor_data, array('id_vendor'=>$id_vendor));
            }            
            echo "<pre>"; print_r($vendor_data); echo "</pre>";            
            echo $a;         
            echo "<br />";
            $end = $st+500;              
            if($a>$end)break;            
        }
        
        
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
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); 
            $vendor_address_line1 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue());        
            $vendor_address_line2 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(5) . $a)->getValue());        
            $vendor_city = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue());                        
            $vendor_state = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue());                        
            $vendor_country = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue());
            $vendor_postcode = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(11) . $a)->getValue());
            $address_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue());
            
            /*echo "vendor_name =>". $vendor_name." | vendor_address_line1 =>".$vendor_address_line1." | vendor_address_line2 =>". $vendor_address_line2." | $vendor_city =>".
                    $vendor_city." | vendor_state =>".$vendor_state." | vendor_country =>".$vendor_country." | vendor_postcode =>".$vendor_postcode." | address_type =>".$address_type;*/
            
            //echo "<p>";
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){
                
                $id_vendor = $results->id_vendor;
                
                $vendor_data['vendor_address_line1'] = $vendor_address_line1;
                $vendor_data['vendor_address_line2'] = $vendor_address_line2;
                $vendor_data['vendor_city'] = $vendor_city;
                $vendor_data['vendor_state'] = $vendor_state;
                $vendor_data['vendor_country'] = $vendor_country;
                $vendor_data['vendor_postcode'] = $vendor_postcode;
                $vendor_data['address_type'] = $address_type;
                $vendor_data['id_vendor'] = $id_vendor;
                
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
    
    function addvendorcontacts(){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "10024M");
        set_time_limit(12000);

        require_once(APPPATH . 'libraries/PHPExcel.php');

        $storepath = FCPATH . '/contacts-list-3.xlsx';
        
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);
        
        $objPHPExcel = $objReader->load($storepath);
        
        $rowstart = 2;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); 
            $contact_first_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(1) . $a)->getValue());        
            $contact_last_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue());        
            $contact_email = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue());                        
            $contact_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(5) . $a)->getValue());                                    
            $contact_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(11) . $a)->getValue());
            $contact_title = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue());                                    
            $contact_alt_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(6) . $a)->getValue());                                    
            $contact_mobile_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue());
            $contact_primary = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue());
            $contact_emergency = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue());
            $contact_document_request_email_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue());            
            $contact_notes = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue());
            $contact_archived = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue());
            $contact_vendorrisk_url = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue());
                                    
            $get_vendor = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $vendor_result = $get_vendor->row();
            if(count($vendor_result)>0){
                
                $id_vendor = $vendor_result->id_vendor;
                
                $get_address = $this->db->get_where('mod_staffone_vendors_addresses', array('id_vendor' => $id_vendor,'address_type'=>'Primary'));
                $address_result = $get_address->row();
                
                $id_address = $address_result->id_address;
                if($id_address>0){
                    
                    $vendor_data['contact_first_name'] = $contact_first_name;
                    $vendor_data['contact_last_name'] = $contact_last_name;
                    $vendor_data['contact_email'] = $contact_email;
                    $vendor_data['contact_phone'] = $contact_phone;            
                    $vendor_data['contact_type'] = $contact_type;                                
                    $vendor_data['contact_title'] = $contact_title;
                    $vendor_data['contact_alt_phone'] = $contact_alt_phone;
                    $vendor_data['contact_mobile_phone'] = $contact_mobile_phone;
                    $vendor_data['contact_primary'] = $contact_primary;            
                    $vendor_data['contact_emergency'] = $contact_emergency;            
                    $vendor_data['contact_document_request_email_contact'] = $contact_document_request_email_contact;
                    $vendor_data['contact_notes'] = $contact_notes;
                    $vendor_data['contact_vendorrisk_url'] = $contact_vendorrisk_url;
                    $vendor_data['id_address'] = $id_address;                    

                    //echo "<pre>"; print_r($vendor_data); echo "</pre>";                                
                    $query = $this->db->insert('mod_staffone_vendors_address_contacts', $vendor_data);
                    
                    //$get_contact = $this->db->get_where('mod_staffone_vendors_address_contacts', array('id_address' => $id_address));
                    //$contact_result = $get_contact->row();                    
                    //if(count($contact_result)==0){}                                        
                }
                
                echo $row;
                echo "<p>";                
            }
            
            //if($row>10) break;            
            
            //var_dump($results);                        
            //echo "Tin Eid =>". $vendor_tin." | Vendor Name =>".$vendor_name." | Vendor Alt Name =>". $vendor_alternate_name." | Fax =>".$vendor_fax." | Phone =>".$vendor_phone." | Vendor Category =>".$vendor_category." | VMO Contact =>".$vmo_contact." | Regions =>".$regions." | Vendor Website =>".$vendor_website;            
            //echo "<br />";
            //echo "<br />";            
            
        }

    }
    
    function updatevendorbycustom(){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');

        $storepath = FCPATH . '/Vendors-list-new.xlsx';
        
        echo "<pre>"; print_r($storepath); echo "</pre>";
        exit();        
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);
        
        $objPHPExcel = $objReader->load($storepath);
        
        
        $rowstart = 2;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue());
            $text_field_11_Brief_description = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue());            
            $date_field_1_need_by_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(60) . $a)->getValue());            
            $date_field_2_request_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(59) . $a)->getValue());            
            $customer_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(84) . $a)->getValue());            
            $string_field_6_Oracle_Supplier_Site_Setup = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(86) . $a)->getValue());            
            $string_field_8_Negotiated_Project_Pricing = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(85) . $a)->getValue());            
            $string_field_9_MNS_Region_S = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(87) . $a)->getValue());            
            $string_field_10_MNS_Region_O = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(88) . $a)->getValue());            
            $string_field_18_Compliance_Requirements_Exemptions = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(91) . $a)->getValue());
            $string_field_21_MNS_Payment_Term = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(65) . $a)->getValue());
            $date_field_3_Start_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue());            
            $string_field_22_On_OFAC_list = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue());
            $date_field_4_Initial_Oracle_Process_Date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(61) . $a)->getValue());
            $string_field_23_MNS_PROJECTS = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(63) . $a)->getValue());
            $string_field_24_MNS_Division = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(66) . $a)->getValue());
            $string_field_25_1806_EPC = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(67) . $a)->getValue());
            $string_field_26_Core_Competency_Wireless = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(69) . $a)->getValue());            
            $date_field_5_Linked_to_MASTEC_in_AVETTA = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(70) . $a)->getValue());
            $date_field_6_Linked_to_CORAL_in_AVETTA = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(71) . $a)->getValue());
            $date_field_7_Avetta_Certified_For_Mastec = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(75) . $a)->getValue());
            $string_field_27_Sub_Info_on_File = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(76) . $a)->getValue());
            $string_field_28_NDA_in_place = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(97) . $a)->getValue());
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){
                
                $id_vendor = $results->id_vendor;
                //$vendor_data['vendor_name'] = $vendor_name;
                $vendor_data['text_field_11'] = $text_field_11_Brief_description;
                $vendor_data['date_field_1'] = $date_field_1_need_by_date;
                $vendor_data['date_field_2'] = $date_field_2_request_date;
                $vendor_data['customer_name'] = $customer_name;
                $vendor_data['string_field_6'] = $string_field_6_Oracle_Supplier_Site_Setup;
                $vendor_data['string_field_8'] = $string_field_8_Negotiated_Project_Pricing;
                $vendor_data['string_field_9'] = $string_field_9_MNS_Region_S;
                $vendor_data['string_field_10'] = $string_field_10_MNS_Region_O;
                $vendor_data['string_field_18'] = $string_field_18_Compliance_Requirements_Exemptions;
                $vendor_data['string_field_21'] = $string_field_21_MNS_Payment_Term;
                $vendor_data['date_field_3'] = $date_field_3_Start_date;                
                $vendor_data['string_field_22'] = $string_field_22_On_OFAC_list;
                $vendor_data['date_field_4'] = $date_field_4_Initial_Oracle_Process_Date;
                $vendor_data['string_field_23'] = $string_field_23_MNS_PROJECTS;
                $vendor_data['string_field_24'] = $string_field_24_MNS_Division;
                $vendor_data['string_field_25'] = $string_field_25_1806_EPC;
                $vendor_data['string_field_26'] = $string_field_26_Core_Competency_Wireless;
                $vendor_data['date_field_5'] = $date_field_5_Linked_to_MASTEC_in_AVETTA;
                $vendor_data['date_field_6'] = $date_field_6_Linked_to_CORAL_in_AVETTA;
                $vendor_data['date_field_7'] = $date_field_7_Avetta_Certified_For_Mastec;
                $vendor_data['string_field_27'] = $string_field_27_Sub_Info_on_File;
                $vendor_data['string_field_28'] = $string_field_28_NDA_in_place;
                
                $query = $this->db->update('mod_staffone_vendors', $vendor_data, array('id_vendor'=>$id_vendor));
                var_dump($query);
                echo "<p>";
                //$query = $this->db->insert('mod_staffone_vendors', $vendor_data);
            }
            
            //if ($a>500) break;
            //var_dump($results);                        
            //echo "Tin Eid =>". $vendor_tin." | Vendor Name =>".$vendor_name." | Vendor Alt Name =>". $vendor_alternate_name." | Fax =>".$vendor_fax." | Phone =>".$vendor_phone." | Vendor Category =>".$vendor_category." | VMO Contact =>".$vmo_contact." | Regions =>".$regions." | Vendor Website =>".$vendor_website;            
            //echo "<br />";
            //echo "<br />";            
            
        }

    }
    
    function updatevendorsaddresses(){
        
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
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); 
            $vendor_address_line1 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue());
            $province_territory = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue());
            $county = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue());
            $archived = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue());
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){
                
                $id_vendor = $results->id_vendor;
                $get_address = $this->db->get_where('mod_staffone_vendors_addresses', array('id_vendor' => $id_vendor));
                $address_result = $get_address->result();
                                                
                if(count($address_result)>0){
                    
                    foreach($address_result as $address){
                        if($address->vendor_address_line1==$vendor_address_line1){                            
                            
                            $id_address = $address->id_address;
                            
                            $vendor_data['province_territory'] = $province_territory;
                            $vendor_data['county'] = $county;
                            $vendor_data['archived'] = $archived;
                            
                            $query = $this->db->update('mod_staffone_vendors_addresses', $vendor_data, array('id_address'=>$id_address));                            
                            echo $row;
                            echo "<p>";                                                        
                        }
                    }
                }
            }
        }
    }
    
    function updatevendorcontacts(){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');

        $storepath = FCPATH . '/contacts-list-3.xlsx';
        
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);
        
        $objPHPExcel = $objReader->load($storepath);
        
        $rowstart = 2;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue()); 
            $contact_first_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(1) . $a)->getValue());        
            $contact_last_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue());        
            $contact_email = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue());                        
            $contact_title = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue());                        
            $contact_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(5) . $a)->getValue());                                    
            $contact_alt_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(6) . $a)->getValue());                                    
            $contact_mobile_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue());
            $contact_primary = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue());
            $contact_emergency = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue());
            $contact_document_request_email_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue());
            $contact_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(11) . $a)->getValue());
            $contact_notes = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue());
            $contact_archived = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue());
            $contact_vendorrisk_url = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue());
            
            $vendor_data['contact_email'] = $contact_email;
            $vendor_data['contact_title'] = $contact_title;
            $vendor_data['contact_alt_phone'] = $contact_alt_phone;
            $vendor_data['contact_mobile_phone'] = $contact_mobile_phone;
            $vendor_data['contact_primary'] = $contact_primary;            
            $vendor_data['contact_emergency'] = $contact_emergency;            
            $vendor_data['contact_document_request_email_contact'] = $contact_document_request_email_contact;
            $vendor_data['contact_notes'] = $contact_notes;
            $vendor_data['contact_vendorrisk_url'] = $contact_vendorrisk_url;
                             
            //$query = $this->db->insert('mod_staffone_vendors_address_contacts', $vendor_data);
            $query = $this->db->update('mod_staffone_vendors_address_contacts', $vendor_data, array('contact_email'=>$contact_email)); 
            echo "<pre>"; print_r($vendor_data);
            echo $row;
            echo "<p>";                
            
            //var_dump($results);                        
            //echo "Tin Eid =>". $vendor_tin." | Vendor Name =>".$vendor_name." | Vendor Alt Name =>". $vendor_alternate_name." | Fax =>".$vendor_fax." | Phone =>".$vendor_phone." | Vendor Category =>".$vendor_category." | VMO Contact =>".$vmo_contact." | Regions =>".$regions." | Vendor Website =>".$vendor_website;            
            //echo "<br />";
            //echo "<br />";            
            
        }

    }
    
    function update_vendorcateogry_forcertificates($start=0,$limit=1000){
        
        $clist_query = $this->db->get_where('mod_staffone_certificates_sub_categories_certificates_lists', array('mandatory' => 1));
        $clist_results = $clist_query->result();
        
        //echo "<pre>"; print_r($clist_results); echo "</pre>";        
        
        $vendors_query = $this->db->query('select id_vendor from mod_staffone_vendors limit '.$start.', '.$limit.' ');
        $vendors_results = $vendors_query->result();
                        
        foreach ($clist_results as $clist_result) {
            $c = 0;
            foreach ($vendors_results as $vendors_result) {
                $c++;
                $sub_cate_data['id_vendor'] = $vendors_result->id_vendor;
                $sub_cate_data['id_sub_category'] = $clist_result->id_sub_category;                
                echo "<pre>"; print_r($sub_cate_data); echo "</pre>";    
                
                $checkexist_qry = $this->db->get_where('mod_staffone_vendors_sub_categories', array('id_vendor' => $vendors_result->id_vendor,'id_sub_category'=>$clist_result->id_sub_category));
                $checkexist_results = $checkexist_qry->result();
                
                if(count($checkexist_results)==0){
                    $query = $this->db->insert('mod_staffone_vendors_sub_categories', $sub_cate_data);
                }        
                //$query = $this->db->update('mod_staffone_vendors_address_contacts', $vendor_data, array('contact_email'=>$contact_email));             
                echo $c;
            }
        }
    }
    
    function add_insurance_policies($st=2){
        
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
            $coverage_provider = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue());        
            $coverage_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue());        
            $carrier_limit = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(15) . $a)->getValue());                        
            $policy_number = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(16) . $a)->getValue());                        
            $expired_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(17) . $a)->getValue());                                    
            $contract = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(18) . $a)->getValue());                                    
            $notes = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(19) . $a)->getValue());
            $archived = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(20) . $a)->getValue());
            $issued_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(21) . $a)->getValue());
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            if(count($results)>0){                
                
                $id_vendor = $results->id_vendor;    
                $vendor_tin = $results->vendor_tin;    
                
                $get_query1 = $this->db->get_where('mod_staffone_certificate_list', array('staffone_certificate_list_name' => $coverage_type));
                $results1 = $get_query1->row();
                
                if(count($results1)>0){
                    
                    $staffone_certificate_list_name = $results1->staffone_certificate_list_name;
                    
                    if(!empty(trim($policy_number)) && isset($results1->id_staffone_certificate_list)){
                        
                        $uploadPath = '/data/nexsysone/certificates/vendors/' . $id_vendor . '/'. $results1->id_staffone_certificate_list . '/';                        
                        $filetocopy = '/var/www/mastec/sample-document-for-vendors-management.pdf';                        
                        $fileInfo = pathinfo($filetocopy);
                        $fileExtension = $fileInfo['extension'];                        
                        $fileName = 'ATTACH_Dummy_' . $vendor_tin . '_' . str_replace(' ', '', $staffone_certificate_list_name) . '_' . time() . '.' . $fileExtension;
                        
                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        
                        if(copy($filetocopy, $uploadPath.$fileName)){                            
                            $copty['filetocopy'] = $filetocopy;
                            $copty['desti_file'] = $uploadPath.$fileName;
                        }
                        
                        $object = [
                            'id_staffone_certificate_list' => $results1->id_staffone_certificate_list,
                            'id_vendor' => $id_vendor,
                            'id_staffone_employee' => null,
                            'staffone_certificate_file_stored_filename' => $fileName,
                            'staffone_certificate_file_name' => $fileName,
                            'staffone_certificate_file_size' => '143 KB',
                            'staffone_certificate_file_uploaded' => 1,
                            'staffone_certificate_file_uploaded_by' => '7E49-00105',
                            'staffone_certificate_file_last_updated_by' => '7E49-00105'
                        ];
                        
                        $this->db->insert('mod_staffone_certificate_files', $object);
                        $id_staffone_certificate_file = $this->db->insert_id();

                        $vendor_data['coverage_provider'] = $coverage_provider;
                        $vendor_data['coverage_type'] = $coverage_type;
                        $vendor_data['carrier_limit'] = $carrier_limit;
                        $vendor_data['policy_number'] = $policy_number;                        
                        $vendor_data['contract'] = $contract;            
                        $vendor_data['notes'] = $notes;
                        $vendor_data['archived'] = $archived;
                        $vendor_data['issued_date'] = date("Y-m-d", strtotime($issued_date));
                        $vendor_data['expired_date'] = date("Y-m-d", strtotime($expired_date));                        
                        $vendor_data['id_vendor'] = $id_vendor;
                        $vendor_data['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                        $vendor_data['id_staffone_certificate_file'] = $id_staffone_certificate_file;
                        $vendor_data['last_updated'] = date('Y-m-d H:i:s');
                        $vendor_data['document_type'] = 'INSURANCE';
                        
                        $query = $this->db->insert('mod_staffone_certificate_list_details', $vendor_data);
                        
                        if($query){
                            $get_query2 = $this->db->get_where('mod_staffone_certificates_sub_categories_certificates_lists', array('id_staffone_certificate_list' => $results1->id_staffone_certificate_list,'id_sub_category'=>92));
                            $results2 = $get_query2->result();                            
                            
                            if(count($results2)==0){   
                                $data2['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                                $data2['id_sub_category'] = 92;                                
                                $data2['mandatory'] = 0;                                
                                $this->db->insert('mod_staffone_certificates_sub_categories_certificates_lists', $data2);
                            }
                        }   
                        echo "<pre>"; print_r($vendor_data);
                        echo "<pre>"; print_r($object);
                        echo "<pre>"; print_r($results);
                        
                        //$query = $this->db->update('mod_staffone_certificate_list_details', $vendor_data, array('contact_email'=>$contact_email)); 
                        //echo "<pre>"; print_r($vendor_data);
                        //echo "<pre>"; print_r($results1);
                        echo $a;                        
                        $end = $st+500;
                        if($a>$end)break;
                        
                    }                    
                }
            }
            
            
            
            //var_dump($results);                        
            //echo "Tin Eid =>". $vendor_tin." | Vendor Name =>".$vendor_name." | Vendor Alt Name =>". $vendor_alternate_name." | Fax =>".$vendor_fax." | Phone =>".$vendor_phone." | Vendor Category =>".$vendor_category." | VMO Contact =>".$vmo_contact." | Regions =>".$regions." | Vendor Website =>".$vendor_website;            
            //echo "<br />";
            //echo "<br />";            
            
        }

    }
    
    function add_ctype(){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');

        $storepath = FCPATH . '/Ctype-list-1.xlsx';
        
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);
        
        $objPHPExcel = $objReader->load($storepath);
        
        $rowstart = 2;
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
                $staffone_certificate_list_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue());        
                
                $get_query = $this->db->get_where('mod_staffone_certificate_list', array('staffone_certificate_list_name' => $staffone_certificate_list_name));
                $results = $get_query->result();
                
                if(count($results)==0){
                    $vendor_data['id_staffone_certificate_folder'] = 98;
                    $vendor_data['staffone_certificate_list_name'] = $staffone_certificate_list_name;

                    $query = $this->db->insert('mod_staffone_certificate_list', $vendor_data);
                    
                    //$query = $this->db->update('mod_staffone_certificate_list_details', $vendor_data, array('contact_email'=>$contact_email)); 
                    echo "<pre>"; print_r($vendor_data);
                    echo $row;
                    echo "<p>";                    
                    
                }                
            }
            
            //var_dump($results);                        
            //echo "Tin Eid =>". $vendor_tin." | Vendor Name =>".$vendor_name." | Vendor Alt Name =>". $vendor_alternate_name." | Fax =>".$vendor_fax." | Phone =>".$vendor_phone." | Vendor Category =>".$vendor_category." | VMO Contact =>".$vmo_contact." | Regions =>".$regions." | Vendor Website =>".$vendor_website;            
            //echo "<br />";
            //echo "<br />";            

    }
    
    function add_contracts($st=2){
        
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
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue());  //Vendor
            $contracts_contract = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(1) . $a)->getValue()); //Contract
            $contracts_vmo_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue());  //VMO contact
            $contracts_department = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue()); //Department
            $contracts_status = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue()); //Status       
            $contracts_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(5) . $a)->getValue());  //Type      
            $contracts_brief_description = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(6) . $a)->getValue());//Brief description
            $contracts_parent_contract = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue());     //Parent contract
            $contracts_contract_signers_approvers = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue());//Contract signers/approvers
            $contracts_legal_review = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue());//Legal review
            $contracts_reviewed_by = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue());//Reviewed by
            $contracts_legal_review_notes = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(11) . $a)->getValue());//Legal review notes
            $contracts_vendor_point_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue());//Vendor point of contact
            $contracts_original_contract_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue());//Original contract date
            $contracts_start_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue());  //Start date
            $contracts_termination_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(15) . $a)->getValue()); //Termination date
            $contracts_termination_date_na = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(16) . $a)->getValue());//Termination date N/A?
            $contracts_notification_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(17) . $a)->getValue());//Notification date
            $contracts_notice_requirement = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(18) . $a)->getValue());//Notice requirement?
            $contracts_auto_renews = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(19) . $a)->getValue());//Auto-renews
            $contracts_auto_renewal_interval = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(20) . $a)->getValue());//Auto-renewal interval
            $contracts_name_contracting_party_correct = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(21) . $a)->getValue());//Name of contracting party correct
            $contracts_name_contracting_party_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(22) . $a)->getValue());//Name of contracting party details
            $contracts_services_clearly_defined = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(23) . $a)->getValue());//Services clearly defined
            $contracts_service_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(24) . $a)->getValue());//Service details
            $contracts_fees_payment_terms_clearly_defined = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(25) . $a)->getValue());//Fees & payment terms clearly defined
            $contracts_fees_payment_term_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(26) . $a)->getValue());//Fees & payment term details
            $contracts_right_terminate_without_cause = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(27) . $a)->getValue());//Right to terminate without cause
            $contracts_right_terminate_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(28) . $a)->getValue());//Right to terminate details
            $contracts_client_right_terminate_with_cause = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(29) . $a)->getValue());//Client right to terminate with cause
            $contracts_client_right_terminate_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(30) . $a)->getValue());//Client right to terminate details
            $contracts_non_compete = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(31) . $a)->getValue());//Non-compete
            $contracts_non_compete_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(32) . $a)->getValue());//Non-compete details
            $contracts_no_solicitation = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(33) . $a)->getValue());//No solicitation
            $contracts_no_solicitation_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(34) . $a)->getValue());//No solicitation details
            $contracts_no_hire = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(35) . $a)->getValue());//No hire
            $contracts_no_hire_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(36) . $a)->getValue());//No hire details
            $contracts_mutual_confidentiality = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(37) . $a)->getValue());//Mutual confidentiality
            $contracts_mutual_confidentiality_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(38) . $a)->getValue());//Mutual confidentiality details
            $contracts_vendor_confidentiality = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(39) . $a)->getValue());//Vendor confidentiality
            $contracts_vendor_confidentiality_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(40) . $a)->getValue());//Vendor confidentiality details
            $contracts_client_confidentiality = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(41) . $a)->getValue());//Client confidentiality
            $contracts_client_confidentiality_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(42) . $a)->getValue());//Client confidentiality details
            $contracts_limitation_of_liability = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(43) . $a)->getValue());//Limitation of liability
            $contracts_limitation_of_liability_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(44) . $a)->getValue());//Limitation of liability details
            $contracts_mutual_indemnification = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(45) . $a)->getValue());//Mutual indemnification
            $contracts_mutual_indemnification_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(46) . $a)->getValue());//Mutual indemnification details
            $contracts_vendor_indemnification = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(47) . $a)->getValue());//Vendor indemnification
            $contracts_vendor_indemnification_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(48) . $a)->getValue());//Vendor indemnification details
            $contracts_client_indemnification = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(49) . $a)->getValue());//Client indemnification
            $contracts_client_indemnification_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(50) . $a)->getValue());//Client indemnification details
            $contracts_jurisdiction = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(51) . $a)->getValue());//Jurisdiction
            $contracts_exclusive_jurisdiction = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(52) . $a)->getValue());//Exclusive jurisdiction
            $contracts_jurisdiction_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(53) . $a)->getValue());//Jurisdiction details
            $contracts_governing_law = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(54) . $a)->getValue());//Governing law
            $contracts_governing_law_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(55) . $a)->getValue());//Governing law details
            $contracts_dispute_resolution = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(56) . $a)->getValue());//Dispute resolution
            $contracts_dispute_resolution_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(57) . $a)->getValue());//Dispute resolution details
            $contracts_privacy_provision = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(58) . $a)->getValue());//Privacy provision
            $contracts_privacy_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(59) . $a)->getValue());//Privacy details
            $contracts_vendor_insurance_requirements_set_forth = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(60) . $a)->getValue());//Vendor insurance requirements set forth
            $contracts_vendor_insurance_requirements_set_forth_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(61) . $a)->getValue());//Vendor insurance requirements set forth details
            $contracts_notification_of_security_breaches = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(62) . $a)->getValue());//Notification of security breaches
            $contracts_notification_of_security_breach_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(63) . $a)->getValue());//Notification of security breach details
            $contracts_client_right_to_audit = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(64) . $a)->getValue());//Client right to audit
            $contracts_client_right_to_audit_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(65) . $a)->getValue());//Client right to audit details
            $contracts_vendor_use_of_subcontractors = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(66) . $a)->getValue());//Vendor use of subcontractors
            $contracts_vendor_use_of_subcontractors_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(67) . $a)->getValue());//Vendor use of subcontractors details
            $contracts_assignment_restricted = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(68) . $a)->getValue());//Assignment restricted
            $contracts_assignment_restricted_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(69) . $a)->getValue());//Assignment restricted details
            $contracts_fully_executed = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(70) . $a)->getValue());//Fully executed
            $contracts_fully_executed_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(71) . $a)->getValue());//Fully executed details
            $contracts_exclusionary_list_check = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(72) . $a)->getValue());//Exclusionary list check
            $contracts_exclusionary_list_check_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(73) . $a)->getValue());//Exclusionary list check details
            $contracts_business_continuity_disaster_recovery = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(74) . $a)->getValue());//Business continuity / disaster recovery
            $contracts_business_continuity_disaster_recovery_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(75) . $a)->getValue());//Business continuity / disaster recovery details
            $contracts_force_majeure = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(76) . $a)->getValue());//Force majeure
            $contracts_force_majeure_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(77) . $a)->getValue());//Force majeure details
            $contracts_notice_information_address_1 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(78) . $a)->getValue());//Notice information, address 1
            $contracts_notice_information_address_2 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(79) . $a)->getValue());//Notice information, address 2
            $contracts_notice_information_address_3 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(80) . $a)->getValue());//Notice information, address 3
            $contracts_notice_information_city = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(81) . $a)->getValue());//Notice information, city
            $contracts_notice_information_state = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(82) . $a)->getValue());//Notice information, state
            $contracts_notice_information_province = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(83) . $a)->getValue());//Notice information, province
            $contracts_notice_information_country = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(84) . $a)->getValue());//Notice information, country
            $contracts_notice_information_postal = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(85) . $a)->getValue());//Notice information, postal
            $contracts_notice_information_email = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(86) . $a)->getValue());//Notice information, email
            $contracts_notice_information_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(87) . $a)->getValue());//Notice information, phone
            $contracts_notice_information_fax = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(88) . $a)->getValue());//Notice information, fax
            $contracts_notice_information_attention = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(89) . $a)->getValue());//Notice information, attention
            $contracts_notice_information_copy_to = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(90) . $a)->getValue());//Notice information, copy to
            $contracts_payment_term_archive = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(91) . $a)->getValue());//Payment term (Archive)
            $contracts_payment_term_new = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(92) . $a)->getValue());//Payment term (NEW)
            $contracts_pricing = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(93) . $a)->getValue());//Pricing
            $contracts_home_state = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(94) . $a)->getValue());//Home state
            $contracts_email_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(95) . $a)->getValue());//Email contact
            $contracts_project_archive = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(96) . $a)->getValue());//Project (Archive)
            $contracts_mns_project_new = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(97) . $a)->getValue());//MNS Project (NEW)
            $contracts_contract_status = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(98) . $a)->getValue());//Contract Status
            $contracts_pricing_region_premium_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(99) . $a)->getValue());//Pricing region-Premium Margin
            $contracts_pricing_region_standard_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(100) . $a)->getValue());//Pricing region-Standard Margin
            $contracts_pricing_region_reduced_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(101) . $a)->getValue());//Pricing region-Reduced Margin
            $contracts_pricing_region_flat_fee = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(102) . $a)->getValue());//Pricing region-Flat Fee
            $contracts_turf_4_0_premium_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(103) . $a)->getValue());//TURF 4.0 - Premium Margin
            $contracts_turf_4_0_standard_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(104) . $a)->getValue());//TURF 4.0 - Standard Margin
            $contracts_turf_4_0_reduced_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(105) . $a)->getValue());//TURF 4.0 - Reduced Margin
            $contracts_turf_4_0_flat_fee = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(106) . $a)->getValue());//TURF 4.0 - Flat Fee
            $contracts_custom_email_reminder_schedule = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(107) . $a)->getValue());//Custom email reminder schedule
            $contracts_vendorrisk_url = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(108) . $a)->getValue());//VendorRisk URL
            
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
                        
                        $uploadPath = '/data/nexsysone/certificates/vendors/' . $id_vendor . '/'. $results1->id_staffone_certificate_list . '/';                        
                        $filetocopy = '/var/www/mastec/sample-document-for-vendors-management.pdf';                        
                        $fileInfo = pathinfo($filetocopy);
                        $fileExtension = $fileInfo['extension'];                        
                        $fileName = 'ATTACH_Dummy_' . $vendor_tin . '_' . str_replace(' ', '', $staffone_certificate_list_name) . '_' . time() . '.' . $fileExtension;
                        
                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        
                        if(copy($filetocopy, $uploadPath.$fileName)){                            
                            $copty['filetocopy'] = $filetocopy;
                            $copty['desti_file'] = $uploadPath.$fileName;
                        }
                        
                        $object = [
                            'id_staffone_certificate_list' => $results1->id_staffone_certificate_list,
                            'id_vendor' => $id_vendor,
                            'id_staffone_employee' => null,
                            'staffone_certificate_file_stored_filename' => $fileName,
                            'staffone_certificate_file_name' => $fileName,
                            'staffone_certificate_file_size' => '143 KB',
                            'staffone_certificate_file_uploaded' => 1,
                            'staffone_certificate_file_uploaded_by' => '7E49-00105',
                            'staffone_certificate_file_last_updated_by' => '7E49-00105'
                        ];
                        
                        $this->db->insert('mod_staffone_certificate_files', $object);
                        $id_staffone_certificate_file = $this->db->insert_id();
                        
                        
                        $vendor_data['contracts_contract'] = $contracts_contract;
                        $vendor_data['contracts_vmo_contact'] = $contracts_vmo_contact;
                        $vendor_data['contracts_department'] = $contracts_department;
                        $vendor_data['contracts_status'] = $contracts_status;
                        $vendor_data['contracts_type'] = $contracts_type;
                        $vendor_data['contracts_brief_description'] = $contracts_brief_description;
                        $vendor_data['contracts_parent_contract'] = $contracts_parent_contract;
                        $vendor_data['contracts_contract_signers_approvers'] = $contracts_contract_signers_approvers;
                        $vendor_data['contracts_legal_review'] = $contracts_legal_review;
                        //$vendor_data['contracts_reviewed_by'] = $contracts_reviewed_by;
                        //$vendor_data['contracts_legal_review_notes'] = $contracts_legal_review_notes;
                        $vendor_data['contracts_vendor_point_contact'] = $contracts_vendor_point_contact;
                        $vendor_data['contracts_original_contract_date'] = !empty($contracts_original_contract_date) ? $contracts_original_contract_date:null;
                        $vendor_data['contracts_start_date'] = !empty($contracts_start_date) ? $contracts_start_date:null;
                        $vendor_data['contracts_termination_date'] = !empty($contracts_termination_date) ? $contracts_termination_date:null;
                        $vendor_data['contracts_termination_date_na'] = $contracts_termination_date_na;
                        $vendor_data['contracts_notification_date'] = !empty($contracts_notification_date) ? $contracts_notification_date:null;
                        $vendor_data['contracts_notice_requirement'] = $contracts_notice_requirement;
                        $vendor_data['contracts_auto_renews'] = $contracts_auto_renews;
                        $vendor_data['contracts_auto_renewal_interval'] = $contracts_auto_renewal_interval;
                        //$vendor_data['contracts_name_contracting_party_correct'] = $contracts_name_contracting_party_correct;
                        //$vendor_data['contracts_name_contracting_party_details'] = $contracts_name_contracting_party_details;
                        //$vendor_data['contracts_services_clearly_defined'] = $contracts_services_clearly_defined;
                        //$vendor_data['contracts_service_details'] = $contracts_service_details;
                        //$vendor_data['contracts_fees_payment_terms_clearly_defined'] = $contracts_fees_payment_terms_clearly_defined;
                        //$vendor_data['contracts_fees_payment_term_details'] = $contracts_fees_payment_term_details;
                        //$vendor_data['contracts_right_terminate_without_cause'] = $contracts_right_terminate_without_cause;
                        //$vendor_data['contracts_right_terminate_details'] = $contracts_right_terminate_details;
                        //$vendor_data['contracts_client_right_terminate_with_cause'] = $contracts_client_right_terminate_with_cause;
                        //$vendor_data['contracts_client_right_terminate_details'] = $contracts_client_right_terminate_details;
                        //$vendor_data['contracts_non_compete'] = $contracts_non_compete;
                        //$vendor_data['contracts_non_compete_details'] = $contracts_non_compete_details;
                        $vendor_data['contracts_no_solicitation'] = $contracts_no_solicitation;
                        $vendor_data['contracts_no_solicitation_details'] = $contracts_no_solicitation_details;
                        $vendor_data['contracts_no_hire'] = $contracts_no_hire;
                        $vendor_data['contracts_no_hire_details'] = $contracts_no_hire_details;
                        $vendor_data['contracts_mutual_confidentiality'] = $contracts_mutual_confidentiality;
                        $vendor_data['contracts_mutual_confidentiality_details'] = $contracts_mutual_confidentiality_details;
                        $vendor_data['contracts_vendor_confidentiality'] = $contracts_vendor_confidentiality;
                        $vendor_data['contracts_vendor_confidentiality_details'] = $contracts_vendor_confidentiality_details;
                        $vendor_data['contracts_client_confidentiality'] = $contracts_client_confidentiality;
                        $vendor_data['contracts_client_confidentiality_details'] = $contracts_client_confidentiality_details;
                        $vendor_data['contracts_limitation_of_liability'] = $contracts_limitation_of_liability;
                        $vendor_data['contracts_limitation_of_liability_details'] = $contracts_limitation_of_liability_details;
                        $vendor_data['contracts_mutual_indemnification'] = $contracts_mutual_indemnification;
                        $vendor_data['contracts_mutual_indemnification_details'] = $contracts_mutual_indemnification_details;
                        $vendor_data['contracts_vendor_indemnification'] = $contracts_vendor_indemnification;
                        $vendor_data['contracts_vendor_indemnification_details'] = $contracts_vendor_indemnification_details;
                        $vendor_data['contracts_client_indemnification'] = $contracts_client_indemnification;
                        $vendor_data['contracts_client_indemnification_details'] = $contracts_client_indemnification_details;
                        $vendor_data['contracts_jurisdiction'] = $contracts_jurisdiction;
                        $vendor_data['contracts_exclusive_jurisdiction'] = $contracts_exclusive_jurisdiction;
                        $vendor_data['contracts_jurisdiction_details'] = $contracts_jurisdiction_details;
                        $vendor_data['contracts_governing_law'] = $contracts_governing_law;
                        $vendor_data['contracts_governing_law_details'] = $contracts_governing_law_details;
                        $vendor_data['contracts_dispute_resolution'] = $contracts_dispute_resolution;
                        $vendor_data['contracts_dispute_resolution_details'] = $contracts_dispute_resolution_details;
                        $vendor_data['contracts_privacy_provision'] = $contracts_privacy_provision;
                        $vendor_data['contracts_privacy_details'] = $contracts_privacy_details;
                        $vendor_data['contracts_vendor_insurance_requirements_set_forth'] = $contracts_vendor_insurance_requirements_set_forth;
                        $vendor_data['contracts_vendor_insurance_requirements_set_forth_details'] = $contracts_vendor_insurance_requirements_set_forth_details;
                        $vendor_data['contracts_notification_of_security_breaches'] = $contracts_notification_of_security_breaches;
                        $vendor_data['contracts_notification_of_security_breach_details'] = $contracts_notification_of_security_breach_details;
                        $vendor_data['contracts_client_right_to_audit'] = $contracts_client_right_to_audit;
                        $vendor_data['contracts_client_right_to_audit_details'] = $contracts_client_right_to_audit_details;
                        $vendor_data['contracts_vendor_use_of_subcontractors'] = $contracts_vendor_use_of_subcontractors;
                        $vendor_data['contracts_vendor_use_of_subcontractors_details'] = $contracts_vendor_use_of_subcontractors_details;
                        $vendor_data['contracts_assignment_restricted'] = $contracts_assignment_restricted;
                        $vendor_data['contracts_assignment_restricted_details'] = $contracts_assignment_restricted_details;
                        $vendor_data['contracts_fully_executed'] = $contracts_fully_executed;
                        $vendor_data['contracts_fully_executed_details'] = $contracts_fully_executed_details;
                        $vendor_data['contracts_exclusionary_list_check'] = $contracts_exclusionary_list_check;
                        $vendor_data['contracts_exclusionary_list_check_details'] = $contracts_exclusionary_list_check_details;
                        $vendor_data['contracts_business_continuity_disaster_recovery'] = $contracts_business_continuity_disaster_recovery;
                        $vendor_data['contracts_business_continuity_disaster_recovery_details'] = $contracts_business_continuity_disaster_recovery_details;
                        $vendor_data['contracts_force_majeure'] = $contracts_force_majeure;
                        $vendor_data['contracts_force_majeure_details'] = $contracts_force_majeure_details;
                        $vendor_data['contracts_notice_information_address_1'] = $contracts_notice_information_address_1;
                        $vendor_data['contracts_notice_information_address_2'] = $contracts_notice_information_address_2;
                        $vendor_data['contracts_notice_information_address_3'] = $contracts_notice_information_address_3;
                        $vendor_data['contracts_notice_information_city'] = $contracts_notice_information_city;
                        $vendor_data['contracts_notice_information_state'] = $contracts_notice_information_state;
                        $vendor_data['contracts_notice_information_province'] = $contracts_notice_information_province;
                        $vendor_data['contracts_notice_information_country'] = $contracts_notice_information_country;
                        $vendor_data['contracts_notice_information_postal'] = $contracts_notice_information_postal;
                        $vendor_data['contracts_notice_information_email'] = $contracts_notice_information_email;
                        $vendor_data['contracts_notice_information_phone'] = $contracts_notice_information_phone;
                        $vendor_data['contracts_notice_information_fax'] = $contracts_notice_information_fax;
                        $vendor_data['contracts_notice_information_attention'] = $contracts_notice_information_attention;
                        $vendor_data['contracts_notice_information_copy_to'] = $contracts_notice_information_copy_to;
                        $vendor_data['contracts_payment_term_archive'] = $contracts_payment_term_archive;
                        $vendor_data['contracts_payment_term_new'] = $contracts_payment_term_new;
                        $vendor_data['contracts_pricing'] = $contracts_pricing;
                        $vendor_data['contracts_home_state'] = $contracts_home_state;
                        $vendor_data['contracts_email_contact'] = $contracts_email_contact;
                        $vendor_data['contracts_project_archive'] = $contracts_project_archive;
                        $vendor_data['contracts_mns_project_new'] = $contracts_mns_project_new;
                        $vendor_data['contracts_contract_status'] = $contracts_contract_status;
                        $vendor_data['contracts_pricing_region_premium_margin'] = $contracts_pricing_region_premium_margin;
                        $vendor_data['contracts_pricing_region_standard_margin'] = $contracts_pricing_region_standard_margin;
                        $vendor_data['contracts_pricing_region_reduced_margin'] = $contracts_pricing_region_reduced_margin;
                        $vendor_data['contracts_pricing_region_flat_fee'] = $contracts_pricing_region_flat_fee;
                        $vendor_data['contracts_turf_4_0_premium_margin'] = $contracts_turf_4_0_premium_margin;
                        $vendor_data['contracts_turf_4_0_standard_margin'] = $contracts_turf_4_0_standard_margin;
                        $vendor_data['contracts_turf_4_0_reduced_margin'] = $contracts_turf_4_0_reduced_margin;
                        $vendor_data['contracts_turf_4_0_flat_fee'] = $contracts_turf_4_0_flat_fee;
                        $vendor_data['contracts_custom_email_reminder_schedule'] = $contracts_custom_email_reminder_schedule;
                        $vendor_data['contracts_vendorrisk_url'] = $contracts_vendorrisk_url;                        
                        $vendor_data['document_type'] = 'CONTRACTS';
                        $vendor_data['id_vendor'] = $id_vendor;
                        $vendor_data['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                        $vendor_data['id_staffone_certificate_file'] = $id_staffone_certificate_file;
                        
                        $query = $this->db->insert('mod_staffone_certificate_list_details', $vendor_data);
                        
                        $get_query2 = $this->db->get_where('mod_staffone_certificates_sub_categories_certificates_lists', array('id_staffone_certificate_list' => $results1->id_staffone_certificate_list,'id_sub_category'=>93));
                        $results2 = $get_query2->result();                            

                        if(count($results2)==0){   
                            $data2['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                            $data2['id_sub_category'] = 93;
                            $data2['mandatory'] = 0;
                            $this->db->insert('mod_staffone_certificates_sub_categories_certificates_lists', $data2);
                        }
                        
                        //$query = $this->db->update('mod_staffone_certificate_list_details', $vendor_data, array('contact_email'=>$contact_email)); 
                        echo "<pre>"; print_r($vendor_data);
                        echo "<pre>"; print_r($object);
                        echo "<pre>"; print_r($results);
                        //echo "<pre>"; print_r($results1);
                        echo $a;                        
                        $end = $st+500;
                        if($a>$end){break;}
                   }                    
                }
            }
            
            
            
            //var_dump($results);                        
            //echo "Tin Eid =>". $vendor_tin." | Vendor Name =>".$vendor_name." | Vendor Alt Name =>". $vendor_alternate_name." | Fax =>".$vendor_fax." | Phone =>".$vendor_phone." | Vendor Category =>".$vendor_category." | VMO Contact =>".$vmo_contact." | Regions =>".$regions." | Vendor Website =>".$vendor_website;            
            //echo "<br />";
            //echo "<br />";            
            
        }

    }
    
    function assignedcategoryforcontracts($start=0,$limit=1000){    
        
        $vendors_query = $this->db->query('select id_vendor from mod_staffone_vendors limit '.$start.', '.$limit.' ');
        $vendors_results = $vendors_query->result();
        
        $id_sub_category = 93;
        
        $c = $start;
        foreach ($vendors_results as $vendors_result) {
            $c++;
            $sub_cate_data['id_vendor'] = $vendors_result->id_vendor;
            $sub_cate_data['id_sub_category'] = $id_sub_category;                

            $checkexist_qry = $this->db->get_where('mod_staffone_vendors_sub_categories', array('id_vendor' => $vendors_result->id_vendor,'id_sub_category'=>$id_sub_category));
            $checkexist_results = $checkexist_qry->result();

            if(count($checkexist_results)==0){
                $query = $this->db->insert('mod_staffone_vendors_sub_categories', $sub_cate_data);
            }                    
            echo $c;
            echo "<pre>"; print_r($sub_cate_data); echo "</pre>";
        }

    }
    
    
    
    function check_vendors_contracts($st=3){
        
        error_reporting(1);
        ini_set("display_error", "1");
        ini_set("memory_limit", "1024M");
        set_time_limit(120);

        require_once(APPPATH . 'libraries/PHPExcel.php');
        
        $storepath = FCPATH . '/vendorimport/contracts/vendors-contracts.xlsx';
        $objReader = PHPExcel_IOFactory::createReaderForFile($storepath);
        $objReader->setReadDataOnly(false);        
        $objPHPExcel = $objReader->load($storepath);        
        
        $id_sub_category = 93;
        $rowstart = $st;        
        for ($a = $rowstart, $row = 0; $a <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $a++, $row++) {
            
            $vendor_name = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(0) . $a)->getValue());  //Vendor
            $contracts_contract = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(1) . $a)->getValue()); //Contract
            $contracts_vmo_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(2) . $a)->getValue());  //VMO contact
            $contracts_department = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(3) . $a)->getValue()); //Department
            $contracts_status = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(4) . $a)->getValue()); //Status       
            $contracts_type = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(5) . $a)->getValue());  //Type      
            $contracts_brief_description = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(6) . $a)->getValue());//Brief description
            $contracts_parent_contract = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(7) . $a)->getValue());     //Parent contract
            $contracts_contract_signers_approvers = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(8) . $a)->getValue());//Contract signers/approvers
            $contracts_legal_review = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(9) . $a)->getValue());//Legal review
            $contracts_reviewed_by = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(10) . $a)->getValue());//Reviewed by
            $contracts_legal_review_notes = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(11) . $a)->getValue());//Legal review notes
            $contracts_vendor_point_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(12) . $a)->getValue());//Vendor point of contact
            $contracts_original_contract_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(13) . $a)->getValue());//Original contract date
            $contracts_start_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(14) . $a)->getValue());  //Start date
            $contracts_termination_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(15) . $a)->getValue()); //Termination date
            $contracts_termination_date_na = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(16) . $a)->getValue());//Termination date N/A?
            $contracts_notification_date = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(17) . $a)->getValue());//Notification date
            $contracts_notice_requirement = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(18) . $a)->getValue());//Notice requirement?
            $contracts_auto_renews = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(19) . $a)->getValue());//Auto-renews
            $contracts_auto_renewal_interval = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(20) . $a)->getValue());//Auto-renewal interval
            $contracts_name_contracting_party_correct = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(21) . $a)->getValue());//Name of contracting party correct
            $contracts_name_contracting_party_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(22) . $a)->getValue());//Name of contracting party details
            $contracts_services_clearly_defined = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(23) . $a)->getValue());//Services clearly defined
            $contracts_service_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(24) . $a)->getValue());//Service details
            $contracts_fees_payment_terms_clearly_defined = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(25) . $a)->getValue());//Fees & payment terms clearly defined
            $contracts_fees_payment_term_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(26) . $a)->getValue());//Fees & payment term details
            $contracts_right_terminate_without_cause = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(27) . $a)->getValue());//Right to terminate without cause
            $contracts_right_terminate_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(28) . $a)->getValue());//Right to terminate details
            $contracts_client_right_terminate_with_cause = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(29) . $a)->getValue());//Client right to terminate with cause
            $contracts_client_right_terminate_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(30) . $a)->getValue());//Client right to terminate details
            $contracts_non_compete = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(31) . $a)->getValue());//Non-compete
            $contracts_non_compete_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(32) . $a)->getValue());//Non-compete details
            $contracts_no_solicitation = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(33) . $a)->getValue());//No solicitation
            $contracts_no_solicitation_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(34) . $a)->getValue());//No solicitation details
            $contracts_no_hire = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(35) . $a)->getValue());//No hire
            $contracts_no_hire_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(36) . $a)->getValue());//No hire details
            $contracts_mutual_confidentiality = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(37) . $a)->getValue());//Mutual confidentiality
            $contracts_mutual_confidentiality_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(38) . $a)->getValue());//Mutual confidentiality details
            $contracts_vendor_confidentiality = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(39) . $a)->getValue());//Vendor confidentiality
            $contracts_vendor_confidentiality_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(40) . $a)->getValue());//Vendor confidentiality details
            $contracts_client_confidentiality = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(41) . $a)->getValue());//Client confidentiality
            $contracts_client_confidentiality_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(42) . $a)->getValue());//Client confidentiality details
            $contracts_limitation_of_liability = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(43) . $a)->getValue());//Limitation of liability
            $contracts_limitation_of_liability_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(44) . $a)->getValue());//Limitation of liability details
            $contracts_mutual_indemnification = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(45) . $a)->getValue());//Mutual indemnification
            $contracts_mutual_indemnification_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(46) . $a)->getValue());//Mutual indemnification details
            $contracts_vendor_indemnification = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(47) . $a)->getValue());//Vendor indemnification
            $contracts_vendor_indemnification_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(48) . $a)->getValue());//Vendor indemnification details
            $contracts_client_indemnification = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(49) . $a)->getValue());//Client indemnification
            $contracts_client_indemnification_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(50) . $a)->getValue());//Client indemnification details
            $contracts_jurisdiction = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(51) . $a)->getValue());//Jurisdiction
            $contracts_exclusive_jurisdiction = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(52) . $a)->getValue());//Exclusive jurisdiction
            $contracts_jurisdiction_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(53) . $a)->getValue());//Jurisdiction details
            $contracts_governing_law = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(54) . $a)->getValue());//Governing law
            $contracts_governing_law_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(55) . $a)->getValue());//Governing law details
            $contracts_dispute_resolution = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(56) . $a)->getValue());//Dispute resolution
            $contracts_dispute_resolution_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(57) . $a)->getValue());//Dispute resolution details
            $contracts_privacy_provision = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(58) . $a)->getValue());//Privacy provision
            $contracts_privacy_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(59) . $a)->getValue());//Privacy details
            $contracts_vendor_insurance_requirements_set_forth = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(60) . $a)->getValue());//Vendor insurance requirements set forth
            $contracts_vendor_insurance_requirements_set_forth_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(61) . $a)->getValue());//Vendor insurance requirements set forth details
            $contracts_notification_of_security_breaches = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(62) . $a)->getValue());//Notification of security breaches
            $contracts_notification_of_security_breach_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(63) . $a)->getValue());//Notification of security breach details
            $contracts_client_right_to_audit = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(64) . $a)->getValue());//Client right to audit
            $contracts_client_right_to_audit_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(65) . $a)->getValue());//Client right to audit details
            $contracts_vendor_use_of_subcontractors = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(66) . $a)->getValue());//Vendor use of subcontractors
            $contracts_vendor_use_of_subcontractors_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(67) . $a)->getValue());//Vendor use of subcontractors details
            $contracts_assignment_restricted = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(68) . $a)->getValue());//Assignment restricted
            $contracts_assignment_restricted_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(69) . $a)->getValue());//Assignment restricted details
            $contracts_fully_executed = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(70) . $a)->getValue());//Fully executed
            $contracts_fully_executed_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(71) . $a)->getValue());//Fully executed details
            $contracts_exclusionary_list_check = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(72) . $a)->getValue());//Exclusionary list check
            $contracts_exclusionary_list_check_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(73) . $a)->getValue());//Exclusionary list check details
            $contracts_business_continuity_disaster_recovery = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(74) . $a)->getValue());//Business continuity / disaster recovery
            $contracts_business_continuity_disaster_recovery_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(75) . $a)->getValue());//Business continuity / disaster recovery details
            $contracts_force_majeure = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(76) . $a)->getValue());//Force majeure
            $contracts_force_majeure_details = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(77) . $a)->getValue());//Force majeure details
            $contracts_notice_information_address_1 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(78) . $a)->getValue());//Notice information, address 1
            $contracts_notice_information_address_2 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(79) . $a)->getValue());//Notice information, address 2
            $contracts_notice_information_address_3 = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(80) . $a)->getValue());//Notice information, address 3
            $contracts_notice_information_city = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(81) . $a)->getValue());//Notice information, city
            $contracts_notice_information_state = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(82) . $a)->getValue());//Notice information, state
            $contracts_notice_information_province = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(83) . $a)->getValue());//Notice information, province
            $contracts_notice_information_country = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(84) . $a)->getValue());//Notice information, country
            $contracts_notice_information_postal = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(85) . $a)->getValue());//Notice information, postal
            $contracts_notice_information_email = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(86) . $a)->getValue());//Notice information, email
            $contracts_notice_information_phone = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(87) . $a)->getValue());//Notice information, phone
            $contracts_notice_information_fax = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(88) . $a)->getValue());//Notice information, fax
            $contracts_notice_information_attention = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(89) . $a)->getValue());//Notice information, attention
            $contracts_notice_information_copy_to = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(90) . $a)->getValue());//Notice information, copy to
            $contracts_payment_term_archive = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(91) . $a)->getValue());//Payment term (Archive)
            $contracts_payment_term_new = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(92) . $a)->getValue());//Payment term (NEW)
            $contracts_pricing = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(93) . $a)->getValue());//Pricing
            $contracts_home_state = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(94) . $a)->getValue());//Home state
            $contracts_email_contact = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(95) . $a)->getValue());//Email contact
            $contracts_project_archive = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(96) . $a)->getValue());//Project (Archive)
            $contracts_mns_project_new = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(97) . $a)->getValue());//MNS Project (NEW)
            $contracts_contract_status = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(98) . $a)->getValue());//Contract Status
            $contracts_pricing_region_premium_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(99) . $a)->getValue());//Pricing region-Premium Margin
            $contracts_pricing_region_standard_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(100) . $a)->getValue());//Pricing region-Standard Margin
            $contracts_pricing_region_reduced_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(101) . $a)->getValue());//Pricing region-Reduced Margin
            $contracts_pricing_region_flat_fee = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(102) . $a)->getValue());//Pricing region-Flat Fee
            $contracts_turf_4_0_premium_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(103) . $a)->getValue());//TURF 4.0 - Premium Margin
            $contracts_turf_4_0_standard_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(104) . $a)->getValue());//TURF 4.0 - Standard Margin
            $contracts_turf_4_0_reduced_margin = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(105) . $a)->getValue());//TURF 4.0 - Reduced Margin
            $contracts_turf_4_0_flat_fee = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(106) . $a)->getValue());//TURF 4.0 - Flat Fee
            $contracts_custom_email_reminder_schedule = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(107) . $a)->getValue());//Custom email reminder schedule
            $contracts_vendorrisk_url = trim($objPHPExcel->getSheet(0)->getCell(PHPExcel_Cell::stringFromColumnIndex(108) . $a)->getValue());//VendorRisk URL
            
            $get_query = $this->db->get_where('mod_staffone_vendors', array('vendor_name' => $vendor_name));
            $results = $get_query->row();
            /*if(count($results)>0){                
                $id_vendor = $results->id_vendor;    
                $vendor_tin = $results->vendor_tin;
                
                $get_query1 = $this->db->get_where('mod_staffone_certificate_list', array('staffone_certificate_list_name' => $contracts_contract));
                $results1 = $get_query1->row();
                
                
                if(count($results1)>0){
                    
                    $staffone_certificate_list_name = $results1->staffone_certificate_list_name;
                    
                    if(isset($results1->id_staffone_certificate_list)){
                        
                        $uploadPath = '/data/nexsysone/certificates/vendors/' . $id_vendor . '/'. $results1->id_staffone_certificate_list . '/';                        
                        $filetocopy = '/var/www/mastec/sample-document-for-vendors-management.pdf';                        
                        $fileInfo = pathinfo($filetocopy);
                        $fileExtension = $fileInfo['extension'];                        
                        $fileName = 'Dummy_Contracts_' . $vendor_tin . '_' . str_replace(' ', '', $staffone_certificate_list_name) . '_' . time() . '.' . $fileExtension;
                        
                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        
                        if(copy($filetocopy, $uploadPath.$fileName)){                            
                            $copty['filetocopy'] = $filetocopy;
                            $copty['desti_file'] = $uploadPath.$fileName;
                        }
                        
                        $object = [
                            'id_staffone_certificate_list' => $results1->id_staffone_certificate_list,
                            'id_vendor' => $id_vendor,
                            'id_staffone_employee' => null,
                            'staffone_certificate_file_stored_filename' => $fileName,
                            'staffone_certificate_file_name' => $fileName,
                            'staffone_certificate_file_size' => '143 KB',
                            'staffone_certificate_file_uploaded' => 1,
                            'staffone_certificate_file_uploaded_by' => '7E49-00105',
                            'staffone_certificate_file_last_updated_by' => '7E49-00105'
                        ];
                        
                        $this->db->insert('mod_staffone_certificate_files', $object);
                        $id_staffone_certificate_file = $this->db->insert_id();
                        
                        $vendor_data['contracts_contract'] = $contracts_contract;
                        $vendor_data['contracts_vmo_contact'] = $contracts_vmo_contact;
                        $vendor_data['contracts_department'] = $contracts_department;
                        $vendor_data['contracts_status'] = $contracts_status;
                        $vendor_data['contracts_type'] = $contracts_type;
                        $vendor_data['contracts_brief_description'] = $contracts_brief_description;
                        $vendor_data['contracts_parent_contract'] = $contracts_parent_contract;
                        $vendor_data['contracts_contract_signers_approvers'] = $contracts_contract_signers_approvers;
                        $vendor_data['contracts_legal_review'] = $contracts_legal_review;
                        $vendor_data['contracts_reviewed_by'] = $contracts_reviewed_by;
                        $vendor_data['contracts_legal_review_notes'] = $contracts_legal_review_notes;
                        $vendor_data['contracts_vendor_point_contact'] = $contracts_vendor_point_contact;
                        $vendor_data['contracts_original_contract_date'] = !empty($contracts_original_contract_date) ? $contracts_original_contract_date:null;
                        $vendor_data['contracts_start_date'] = !empty($contracts_start_date) ? $contracts_start_date:null;
                        $vendor_data['contracts_termination_date'] = !empty($contracts_termination_date) ? $contracts_termination_date:null;
                        $vendor_data['contracts_termination_date_na'] = $contracts_termination_date_na;
                        $vendor_data['contracts_notification_date'] = !empty($contracts_notification_date) ? $contracts_notification_date:null;
                        $vendor_data['contracts_notice_requirement'] = $contracts_notice_requirement;
                        $vendor_data['contracts_auto_renews'] = $contracts_auto_renews;
                        $vendor_data['contracts_auto_renewal_interval'] = $contracts_auto_renewal_interval;
                        $vendor_data['contracts_name_contracting_party_correct'] = $contracts_name_contracting_party_correct;
                        $vendor_data['contracts_name_contracting_party_details'] = $contracts_name_contracting_party_details;
                        $vendor_data['contracts_services_clearly_defined'] = $contracts_services_clearly_defined;
                        $vendor_data['contracts_service_details'] = $contracts_service_details;
                        $vendor_data['contracts_fees_payment_terms_clearly_defined'] = $contracts_fees_payment_terms_clearly_defined;
                        $vendor_data['contracts_fees_payment_term_details'] = $contracts_fees_payment_term_details;
                        $vendor_data['contracts_right_terminate_without_cause'] = $contracts_right_terminate_without_cause;
                        $vendor_data['contracts_right_terminate_details'] = $contracts_right_terminate_details;
                        $vendor_data['contracts_client_right_terminate_with_cause'] = $contracts_client_right_terminate_with_cause;
                        $vendor_data['contracts_client_right_terminate_details'] = $contracts_client_right_terminate_details;
                        $vendor_data['contracts_non_compete'] = $contracts_non_compete;
                        $vendor_data['contracts_non_compete_details'] = $contracts_non_compete_details;
                        $vendor_data['contracts_no_solicitation'] = $contracts_no_solicitation;
                        $vendor_data['contracts_no_solicitation_details'] = $contracts_no_solicitation_details;
                        $vendor_data['contracts_no_hire'] = $contracts_no_hire;
                        $vendor_data['contracts_no_hire_details'] = $contracts_no_hire_details;
                        $vendor_data['contracts_mutual_confidentiality'] = $contracts_mutual_confidentiality;
                        $vendor_data['contracts_mutual_confidentiality_details'] = $contracts_mutual_confidentiality_details;
                        $vendor_data['contracts_vendor_confidentiality'] = $contracts_vendor_confidentiality;
                        $vendor_data['contracts_vendor_confidentiality_details'] = $contracts_vendor_confidentiality_details;
                        $vendor_data['contracts_client_confidentiality'] = $contracts_client_confidentiality;
                        $vendor_data['contracts_client_confidentiality_details'] = $contracts_client_confidentiality_details;
                        $vendor_data['contracts_limitation_of_liability'] = $contracts_limitation_of_liability;
                        $vendor_data['contracts_limitation_of_liability_details'] = $contracts_limitation_of_liability_details;
                        $vendor_data['contracts_mutual_indemnification'] = $contracts_mutual_indemnification;
                        $vendor_data['contracts_mutual_indemnification_details'] = $contracts_mutual_indemnification_details;
                        $vendor_data['contracts_vendor_indemnification'] = $contracts_vendor_indemnification;
                        $vendor_data['contracts_vendor_indemnification_details'] = $contracts_vendor_indemnification_details;
                        $vendor_data['contracts_client_indemnification'] = $contracts_client_indemnification;
                        $vendor_data['contracts_client_indemnification_details'] = $contracts_client_indemnification_details;
                        $vendor_data['contracts_jurisdiction'] = $contracts_jurisdiction;
                        $vendor_data['contracts_exclusive_jurisdiction'] = $contracts_exclusive_jurisdiction;
                        $vendor_data['contracts_jurisdiction_details'] = $contracts_jurisdiction_details;
                        $vendor_data['contracts_governing_law'] = $contracts_governing_law;
                        $vendor_data['contracts_governing_law_details'] = $contracts_governing_law_details;
                        $vendor_data['contracts_dispute_resolution'] = $contracts_dispute_resolution;
                        $vendor_data['contracts_dispute_resolution_details'] = $contracts_dispute_resolution_details;
                        $vendor_data['contracts_privacy_provision'] = $contracts_privacy_provision;
                        $vendor_data['contracts_privacy_details'] = $contracts_privacy_details;
                        $vendor_data['contracts_vendor_insurance_requirements_set_forth'] = $contracts_vendor_insurance_requirements_set_forth;
                        $vendor_data['contracts_vendor_insurance_requirements_set_forth_details'] = $contracts_vendor_insurance_requirements_set_forth_details;
                        $vendor_data['contracts_notification_of_security_breaches'] = $contracts_notification_of_security_breaches;
                        $vendor_data['contracts_notification_of_security_breach_details'] = $contracts_notification_of_security_breach_details;
                        $vendor_data['contracts_client_right_to_audit'] = $contracts_client_right_to_audit;
                        $vendor_data['contracts_client_right_to_audit_details'] = $contracts_client_right_to_audit_details;
                        $vendor_data['contracts_vendor_use_of_subcontractors'] = $contracts_vendor_use_of_subcontractors;
                        $vendor_data['contracts_vendor_use_of_subcontractors_details'] = $contracts_vendor_use_of_subcontractors_details;
                        $vendor_data['contracts_assignment_restricted'] = $contracts_assignment_restricted;
                        $vendor_data['contracts_assignment_restricted_details'] = $contracts_assignment_restricted_details;
                        $vendor_data['contracts_fully_executed'] = $contracts_fully_executed;
                        $vendor_data['contracts_fully_executed_details'] = $contracts_fully_executed_details;
                        $vendor_data['contracts_exclusionary_list_check'] = $contracts_exclusionary_list_check;
                        $vendor_data['contracts_exclusionary_list_check_details'] = $contracts_exclusionary_list_check_details;
                        $vendor_data['contracts_business_continuity_disaster_recovery'] = $contracts_business_continuity_disaster_recovery;
                        $vendor_data['contracts_business_continuity_disaster_recovery_details'] = $contracts_business_continuity_disaster_recovery_details;
                        $vendor_data['contracts_force_majeure'] = $contracts_force_majeure;
                        $vendor_data['contracts_force_majeure_details'] = $contracts_force_majeure_details;
                        $vendor_data['contracts_notice_information_address_1'] = $contracts_notice_information_address_1;
                        $vendor_data['contracts_notice_information_address_2'] = $contracts_notice_information_address_2;
                        $vendor_data['contracts_notice_information_address_3'] = $contracts_notice_information_address_3;
                        $vendor_data['contracts_notice_information_city'] = $contracts_notice_information_city;
                        $vendor_data['contracts_notice_information_state'] = $contracts_notice_information_state;
                        $vendor_data['contracts_notice_information_province'] = $contracts_notice_information_province;
                        $vendor_data['contracts_notice_information_country'] = $contracts_notice_information_country;
                        $vendor_data['contracts_notice_information_postal'] = $contracts_notice_information_postal;
                        $vendor_data['contracts_notice_information_email'] = $contracts_notice_information_email;
                        $vendor_data['contracts_notice_information_phone'] = $contracts_notice_information_phone;
                        $vendor_data['contracts_notice_information_fax'] = $contracts_notice_information_fax;
                        $vendor_data['contracts_notice_information_attention'] = $contracts_notice_information_attention;
                        $vendor_data['contracts_notice_information_copy_to'] = $contracts_notice_information_copy_to;
                        $vendor_data['contracts_payment_term_archive'] = $contracts_payment_term_archive;
                        $vendor_data['contracts_payment_term_new'] = $contracts_payment_term_new;
                        $vendor_data['contracts_pricing'] = $contracts_pricing;
                        $vendor_data['contracts_home_state'] = $contracts_home_state;
                        $vendor_data['contracts_email_contact'] = $contracts_email_contact;
                        $vendor_data['contracts_project_archive'] = $contracts_project_archive;
                        $vendor_data['contracts_mns_project_new'] = $contracts_mns_project_new;
                        $vendor_data['contracts_contract_status'] = $contracts_contract_status;
                        $vendor_data['contracts_pricing_region_premium_margin'] = $contracts_pricing_region_premium_margin;
                        $vendor_data['contracts_pricing_region_standard_margin'] = $contracts_pricing_region_standard_margin;
                        $vendor_data['contracts_pricing_region_reduced_margin'] = $contracts_pricing_region_reduced_margin;
                        $vendor_data['contracts_pricing_region_flat_fee'] = $contracts_pricing_region_flat_fee;
                        $vendor_data['contracts_turf_4_0_premium_margin'] = $contracts_turf_4_0_premium_margin;
                        $vendor_data['contracts_turf_4_0_standard_margin'] = $contracts_turf_4_0_standard_margin;
                        $vendor_data['contracts_turf_4_0_reduced_margin'] = $contracts_turf_4_0_reduced_margin;
                        $vendor_data['contracts_turf_4_0_flat_fee'] = $contracts_turf_4_0_flat_fee;
                        $vendor_data['contracts_custom_email_reminder_schedule'] = $contracts_custom_email_reminder_schedule;
                        $vendor_data['contracts_vendorrisk_url'] = $contracts_vendorrisk_url;                        
                        $vendor_data['document_type'] = 'CONTRACTS';
                        $vendor_data['id_vendor'] = $id_vendor;
                        $vendor_data['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                        $vendor_data['id_staffone_certificate_file'] = $id_staffone_certificate_file;                        
                        $vendor_data['last_updated'] = date('Y-m-d H:i:s');                        
                        
                        $query = $this->db->insert('mod_staffone_certificate_list_details', $vendor_data);
                        
                        if($query){
                            $get_query2 = $this->db->get_where('mod_staffone_certificates_sub_categories_certificates_lists', array('id_staffone_certificate_list' => $results1->id_staffone_certificate_list,'id_sub_category'=>$id_sub_category));
                            $results2 = $get_query2->result();                            
                            
                            if(count($results2)==0){   
                                $data2['id_staffone_certificate_list'] = $results1->id_staffone_certificate_list;
                                $data2['id_sub_category'] = $id_sub_category;  
                                $data2['mandatory'] = 0;                                
                                $this->db->insert('mod_staffone_certificates_sub_categories_certificates_lists', $data2);
                            }
                        }
                        
                        echo "<pre>"; print_r($vendor_data);
                        echo "<pre>"; print_r($object);
                        echo "<pre>"; print_r($results);
                    }
                }
            }*/
            
            echo $a;         
            echo "<br />";
            $end = $st+500;              
            if($a>$end)break;             
            //var_dump($results);                                    
            //echo "<br />";
            //echo "<br />";    
        }
    }
}

