<?php
function sql_safe($sql){
	if(get_magic_quotes_gpc())$sql=stripslashes($sql);
	return @mysql_real_escape_string($sql);
}
function resizeImg($img, $w, $h, $force="proportion")
	{

		// The file

		$filename = $img;

		// Set a maximum height and width

		$width = $w;

		$height = $h;

		// Get new dimensions

		list($width_orig, $height_orig) = getimagesize($filename);
		

		$size = getimagesize($filename);
		$filetype = $size['mime'];
		if ($width_orig > $width && $height_orig > $height)

		{

			if ($force=="fix")

			{

				$width = $w;

				$height = $h;

			}

			else if ($force=="proportion")

			{

				if ($width_orig > $height_orig){	// if width is bigger	/

					$height = ($width / $width_orig) * $height_orig;

				}else if ($width_orig < $height_orig){	// if height is bigger	/

					$width = ($height / $height_orig) * $width_orig;

				}

			}

			else if ($force=="width")

			{

				if ($width_orig > $w){	// if width is bigger	/

					$width = $w;

					$height = ($width / $width_orig) * $height_orig;

				}else{

					$width = $width_orig;

					$height = $height_orig;

				}

			}

			else if ($force=="height")

			{

				if ($height_orig > $h){	// if width is bigger	/

					$height = $h;

					$width = ($height / $height_orig) * $width_orig;

				}else{

					$width = $width_orig;

					$height = $height_orig;

				}

			}

			

			// Resample

			$image_p = imagecreatetruecolor($width, $height);

						
			if($filetype == "image/png")
				{
				$image = @imagecreatefrompng($filename); 		
				}
			elseif($filetype == "image/gif")
				{
				$image = @imagecreatefromgif($filename);		
				}	
			else{
				$image = @imagecreatefromjpeg($filename);
				
				}
			//$image = imagecreatefromjpeg($filename);

			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

			imagejpeg($image_p, $img, 80);  //Saving The Image.

		}		

	}
function showOnlyDate($date_created){
	list($date, $time) = explode(" ", $date_created);
	echo $date;
}

function showOnlyTime($date_created){
	list($date, $time) = explode(" ", $date_created);
	echo $time;
}

function makeUIDate($dbdate){
	if(trim($dbdate) == '')
	return;
	return strftime("%d %b %Y", strtotime($dbdate));
}

function makeUITime($dbtime){
	 if(trim($dbtime) == '')
	  return;
	 list($hours, $minutes, $seconds) = explode(':',$dbtime);
	 $ampm = 'AM';
	 if($hours >12){$hours -= 12; $ampm = 'PM';} 
	 return($hours.':'.$minutes.' '.$ampm);
}

function randString($number){
	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= $number) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}
	return $pass;
}



function showRemainingTime($remaining_days, $remaining_time, $expiry_date, $deal_id){
// Define your target date here
//2011-02-28 14:27:21
	if($expiry_date==''){$expiry_date='2011-04-28 14:27:21';}
	$arr = explode(" ",$expiry_date);
	$rmdate = explode("-",$arr[0]);
	$rmtime = explode(":",$arr[1]);

	$targetYear  = $rmdate[0];
	$targetMonth = $rmdate[1];
	$targetDay   = $rmdate[2];
	$targetHour  = $rmtime[0];
	$targetMinute= $rmtime[1];
	$targetSecond= $rmtime[2];
// End target date definition

// Define date format
$dateFormat = "Y-m-d H:i:s";

$targetDate = mktime($targetHour,$targetMinute,$targetSecond,$targetMonth,$targetDay,$targetYear);
$actualDate = time();

$secondsDiff = $targetDate - $actualDate;

$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($remainingMinutes*60));

$targetDateDisplay = date($dateFormat,$targetDate);
$actualDateDisplay = date($dateFormat,$actualDate);

?>

<script type="text/javascript">
  var days = <?php echo $remainingDay; ?>  
  var hours = <?php echo $remainingHour; ?>  
  var minutes = <?php echo $remainingMinutes; ?>  
  var seconds = <?php echo $remainingSeconds; ?>  

function setCountDown ()
{
  seconds--;
  if (seconds < 0){
      minutes--;
      seconds = 59
  }
  if (minutes < 0){
      hours--;
      minutes = 59
  }
  if (hours < 0){
      days--;
      hours = 23
  }
 $("#remain_<?=$deal_id?>").html("<img src='<?=base_url()?>resources/front/images/clock.jpg' style='vertical-align:text-bottom; padding-right:10px;' /><span class='remain_time_1'>"+days+"</span><span class='remain_time_2'>D</span><span class='remain_time_1'>"+hours+"</span><span class='remain_time_2'>H</span><span class='remain_time_1'>"+minutes+"</span><span class='remain_time_2'>M</span>");
 
 
  setTimeout ( "setCountDown()", 1000 );
}
</script>

  <div id="remain_<?=$deal_id?>">
  <?php 
    echo "<img src='".base_url()."resources/front/images/clock.jpg' style='vertical-align:text-bottom; padding-right:10px;' />";
	echo "<span class='remain_time_1'>".$remainingDay."</span><span class='remain_time_2'>D</span>
	<span class='remain_time_1'>".$remainingHour."</span><span class='remain_time_2'>H</span>
	<span class='remain_time_1'>".$remainingMinutes."</span><span class='remain_time_2'>M</span>
	";
  ?>
  
  <?php //echo "$remainingDay days, $remainingHour hours, $remainingMinutes minutes, $remainingSeconds seconds";?></div>

<?php
}

///////////////////////////////////////

function SessCityID(){
	
	$CI =& get_instance();
    $CI->load->model('main_model');
	
	if($CI->uri->segment(2)=='deal_city'){
		$current_city_id = $CI->main_model->getCurrentCity(array('current_city_id' =>$CI->uri->segment(3), 'ip_address' =>$_SERVER['REMOTE_ADDR']));
	}else{
	
	  $current_city_id = $CI->main_model->getIfCityExists($_SERVER['REMOTE_ADDR']);
	  if($current_city_id==0){
		  $city_id_from_id = getCityIdFromIP();
		  $current_city_id = $CI->main_model->getCurrentCity(array('current_city_id' =>$city_id_from_id ,'ip_address' =>$_SERVER['REMOTE_ADDR']));
	  }
	}
	
    //$current_city_id = $CI->main_model->getIfCityExists($_SERVER['REMOTE_ADDR']);
		
	return $current_city_id;

}

function getCityIdFromIP(){
	
 $string = file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=89797aead3c19c2c968fc065d6a10dc83ab8ee9cc61d0f8dbccfbea85566bcfc&ip=".$_SERVER['REMOTE_ADDR']."&format=xml");
 $start = "<cityName>";
 $end = "</cityName>";
	
 $string = " ".$string;
 $ini = strpos($string,$start);
 if ($ini == 0) return "";
 $ini += strlen($start);
 $len = strpos($string,$end,$ini) - $ini;
 $city_name = substr($string,$ini,$len);
 
 $CI =& get_instance();
 $CI->load->model('main_model');
	
 return $city_id = $CI->main_model->getCityId($city_name);
 
}

function defaultCurrency(){
	
 $CI =& get_instance();
 $CI->load->model('main_model');
	
 return $CI->main_model->getDefaultCurrency();
 
}

function getSettingValue($identifier){
	
 $CI =& get_instance();
 $CI->load->model('main_model');
	
 return $CI->main_model->getSettingValueDB($identifier);
 
}

function getStoreCategoryName($language_id, $store_category_id, $title){
	
 $CI =& get_instance();
 $CI->load->model('stores_model');
	
 //return $CI->main_model->getDefaultCurrency();
 
   if($language_id==1){
	    $store_category_name = $title;
   }else{
	  $store_category_language = $CI->stores_model->getStoreCategoryLanguage($language_id, $store_category_id);
	  if($store_category_language!='empty'){
		  $store_category_name = $store_category_language->title;
	  }else{
		  $store_category_name = $title;
	  }
   }
  return stripslashes($store_category_name);
}

function getCategoryDescription($language_id, $store_category_id, $description){
	
 $CI =& get_instance();
 $CI->load->model('stores_model');
	
	 if($language_id==1){
	    $store_category_description = $description;
   }else{
	  $store_category_language = $CI->stores_model->getStoreCategoryLanguage($language_id, $store_category_id);
	
	  if($store_category_language!='empty'){
		   $store_category_description = $store_category_language->description;
	  }else{
		   $store_category_description = $description;
	  }
   }
  return stripslashes($store_category_description);
	
	 /* $store_category_language = $CI->stores_model->getStoreCategoryLanguage($language_id, $store_category_id);
	  if($store_category_language!='empty'){
		  $store_category_description = $store_category_language->description;
	  }else{
		  $store_category_description = $description;
	  }
	  
  return stripslashes($store_category_description);*/
}




function getParentCat($id){
	
 $CI =& get_instance();
 $CI->load->model('admin_cat_model');
 
	  $query = $CI->db->query("SELECT title from gl_cats where id =$id");
	 // echo $CI->db->last_query();
		if($query->num_rows() > 0){
			return $query->row('title');
}
}





function getDealORVoucherTitle($language_id, $deal_id, $title){
	
 $CI =& get_instance();
 $CI->load->model('deals_model');
 
	  $deal_language = $CI->deals_model->getDealLanguage($language_id, $deal_id);
	  if($deal_language!='empty'){
		  $deal_title = $deal_language->title;
	  }else{
		  $deal_title = $title;
	  }
//echo $this->db->last_query();
  return stripslashes($deal_title);
}

function print_arr($arr){

	print_r('<pre>');

	print_r($arr);

	print_r('</pre>');

}


function urlKey($text){

	$clean =  preg_replace('/[^\w\d_ -]/si', '', $text);///remove any special character
	$clean = preg_replace('/\s\s+/', ' ', $clean);///replacing multiple spaces to signle
	$clean = strtolower(str_replace(" ","-",$clean));///replace space with dash and making lower case
	return $clean;
}

function getHours($mints)
{
	return floor($mints/60);
}
function getHoursTime($mints)
{
	$hour = floor($mints/60); 
	if($hour > 12)
	{
		$hour-=12;
		return $hour;
	}
	else
	{
		return $hour;
	}
}
function getMints($mints)
{
	while($mints >= 60)
	{
		$mints-=60;
	}
	return $mints;
}
function getAmPm($hour)
{
	if($hour > 12)
	{
		return "pm";
	}
	else
	{
		return "am";
	}
}

	function getcountry($id)
{
	global $config;
	 $qry= "SELECT * FROM al_country
			   WHERE id= '".$id."' LIMIT 1"
			   ;
		$res = mysql_query($qry);
		$row = mysql_fetch_array($res);
		 $name = $row['country'];
		return $name;
}



function getTranslatorunreadMessages($id){
	$qry= "SELECT count(*) AS total FROM tr_assignment_messages
			   WHERE translator_id= '".$id."' LIMIT 1";
        $res = mysql_query($qry);
        $row = mysql_fetch_array($res);
        return $name = $row['total'];
	
	
}
function getAdminunreadMessages($id){
	$qry= "SELECT count(*) AS total FROM tr_assignment_messages
			   WHERE sender_id !=  0 AND as_status = 0  LIMIT 1";
        $res = mysql_query($qry);
        $row = mysql_fetch_array($res);
        return $name = $row['total'];
	
	
}

function assignmentType($id){
	$qry= "SELECT assign_type FROM tr_assignments
			   WHERE assign_id = ".$id;
        $res = mysql_query($qry);
        $row = mysql_fetch_array($res);
        return $name = $row['assign_type'];
	
	
}
function countTotalDraft()
		{
		$CI =& get_instance();
 $CI->load->model('admin_assignment_model');
 	
	    $query = $CI->db->query("SELECT count(*) AS total from tr_assignments where assign_status= 'draft'");
		//echo $CI->db->last_query();
		if ($query->num_rows() > 0) {                          
            return $query->row('total');
            }
		}	
function countTotalRejected()
		{
			$CI =& get_instance();
 $CI->load->model('admin_assignment_model');	
	    $query = $CI->db->query("SELECT count(*) AS total from tr_assignments where assign_status= 'rejected'");
		if ($query->num_rows() > 0) {                          
            return $query->row('total');
            }
		}

function countTotalPending()
		{
			$CI =& get_instance();
 $CI->load->model('admin_assignment_model');	
	    $query = $CI->db->query("SELECT count(*) AS total from tr_assignments where assign_status= 'pending'");
		if ($query->num_rows() > 0) {                          
            return $query->row('total');
            }
		}
function countTotalApproved()
		{
		$CI =& get_instance();
 $CI->load->model('admin_assignment_model');		
	    $query = $CI->db->query("SELECT count(*) AS total from tr_assignments where assign_status= 'approved'");
		if ($query->num_rows() > 0) {                          
            return $query->row('total');
            }
		}						
function countTotalCompleted()
		{
		$CI =& get_instance();
 $CI->load->model('admin_assignment_model');		
	    $query = $CI->db->query("SELECT count(*) AS total from tr_assignments where assign_status= 'completed'");
		if ($query->num_rows() > 0) {                          
            return $query->row('total');
            }
		}
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}								
function programMenu(){
                       
           $CI =& get_instance();  
		    $CI->load->model('front_model');	
        $CI->db->select('slug');
		$CI->db->from($CI->db->dbprefix('programs'));
		
		$CI->db->order_by("p_id", "ASC");
		//$this->db->limit(6, 0);
		  
         $query = $CI->db->get();
         //echo $this->db->last_query();
         if ($query->num_rows() > 0) {                          
           
            
            return $query->result();
         }
         else
            return 'empty';
     }	
     
function GetCompanyName($company_id){
                       
    $CI =& get_instance();  
    $CI->load->model('companies_model','companies');
    
    $company = $CI->companies->GetById($company_id);
    
    if(count($company)>0){
        $name = $company->co_name;
    }else{
        $name = '';
    }
    
    return $name;
}

function GetCompanyPicture($company_id){
                       
    $CI =& get_instance();  
    $CI->load->model('companies_model','companies');
    
    $company = $CI->companies->GetById($company_id);
    
    if(count($company)>0){
        $co_logo = $company->co_logo;
    }else{
        $co_logo = '';
    }
    
    return $co_logo;
}

function _setSuccess($message){
   $CI =& get_instance();
   $CI->session->set_flashdata('INF_MSG',$message); 
}
function _getSuccess(){
   $CI =& get_instance();
   return $CI->session->flashdata('INF_MSG');
}

function _setError($message){
   $CI =& get_instance();
   $CI->session->set_flashdata('ERR_MSG',$message);
}

function _getError(){
   $CI =& get_instance();
   return $CI->session->flashdata('ERR_MSG');
}

function _setWarning($message){
   $CI =& get_instance();
   $CI->session->flashdata('WRR_MSG',$message);
}


function GetCategoryName($company_id){
                       
    $CI =& get_instance();  
    $CI->load->model('categories_model','categories');
    
    $category = $CI->categories->GetById($company_id);
    
    if(count($category)>0){
        $name = $category->c_name;
    }else{
        $name = '';
    }
    
    return $name;
}

function GetUserDetails($user_id){
                       
    $CI =& get_instance();  
    $CI->load->model('user_model','user_model');
    
    $user = $CI->user_model->GetById($user_id);
    
    if(count($user)>0){
        return $user;
    }
}
function datenow(){
    return date('Y-m-d H:i:s');
}
?>