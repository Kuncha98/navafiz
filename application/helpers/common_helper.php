<?php
function sql_safe($sql)
{
    if (get_magic_quotes_gpc())
        $sql = stripslashes($sql);
    return @mysql_real_escape_string($sql);
}

function resizeImg($img, $w, $h, $force = "proportion")
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
    if ($width_orig > $width && $height_orig > $height) {

        if ($force == "fix") {
            $width = $w;
            $height = $h;
        } else if ($force == "proportion") {
            if ($width_orig > $height_orig) {    // if width is bigger	/

                $height = ($width / $width_orig) * $height_orig;
            } else if ($width_orig < $height_orig) {    // if height is bigger	/

                $width = ($height / $height_orig) * $width_orig;
            }
        } else if ($force == "width") {

            if ($width_orig > $w) {    // if width is bigger	/

                $width = $w;

                $height = ($width / $width_orig) * $height_orig;
            } else {

                $width = $width_orig;

                $height = $height_orig;
            }
        } else if ($force == "height") {

            if ($height_orig > $h) {    // if width is bigger	/

                $height = $h;

                $width = ($height / $height_orig) * $width_orig;
            } else {

                $width = $width_orig;

                $height = $height_orig;
            }
        }



        // Resample

        $image_p = imagecreatetruecolor($width, $height);


        if ($filetype == "image/png") {
            $image = @imagecreatefrompng($filename);
        } elseif ($filetype == "image/gif") {
            $image = @imagecreatefromgif($filename);
        } else {
            $image = @imagecreatefromjpeg($filename);
        }
        //$image = imagecreatefromjpeg($filename);

        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        imagejpeg($image_p, $img, 80);  //Saving The Image.

    }
}
function showOnlyDate($date_created)
{
    list($date, $time) = explode(" ", $date_created);
    echo $date;
}
function DateFormat($date)
{
    if (isDate($date)) {
        return date('d F Y', strtotime($date));
    } else {
        return $date;
    }
}
function DateTimeFormat($date)
{
    if (isDate($date)) {
        return date('d F Y g:i A', strtotime($date));
    } else {
        return $date;
    }
}

function isDate($value)
{
    if (!$value) {
        return false;
    }

    try {
        new \DateTime($value);
        return true;
    } catch (\Exception $e) {
        return false;
    }
}

function getPostLikeOfMember($postId)
{
    $CI = &get_instance();
    $data = $CI->db->get_where('jb_shoutbox_meta', array('post_id' => $postId, 'meta_type' => 1, 'is_deleted' => 0, 'member_id' => $CI->session->userdata('user_id')))->row_array();
    return $data;
}

function addPostLikeOfMember($postId, $data)
{
    $CI = &get_instance();
    // $CI->load->model('whatshappening_meta_model');
    $data1 = $CI->db->get_where('jb_shoutbox_meta', array('post_id' => $postId, 'member_id' => $CI->session->userdata('user_id')))->row_array();
    if (is_array($data1) && !empty($data1)):
        $id = $CI->db->update('jb_shoutbox_meta', $data, $where = array('id' => $data1['id']));
    else:
        $CI->db->insert('jb_shoutbox_meta', $data);
        $id = $CI->db->insert_id();
    endif;

    return $id;
}

function isFeaturedProfile($user_id)
{
    $CI = &get_instance();
    $CI->load->model('users_by_list_model');
    $res = $CI->users_by_list_model->Search(array('member_id' => $user_id, 'list_id' => 82));
    return $res;
}

function my_array_unique($array, $keep_key_assoc = false)
{
    $duplicate_keys = array();
    $tmp = array();

    foreach ($array as $key => $val) {
        // convert objects to arrays, in_array() does not support objects
        if (is_object($val))
            $val = (array) $val;

        if (!in_array($val, $tmp))
            $tmp[] = $val;
        else
            $duplicate_keys[] = $key;
    }

    foreach ($duplicate_keys as $key)
        unset($array[$key]);

    return $keep_key_assoc ? $array : array_values($array);
}


function array_2d_to_1d($input_array)
{
    $output_array = array();

    for ($i = 0; $i < count(array($input_array)); $i++) {
        for ($j = 0; $j < count(array(@$input_array[$i])); $j++) {
            $output_array[] = @$input_array[$i][$j];
        }
    }

    return $output_array;
}


function GetIndustry($id)
{
    $CI = &get_instance();
    $CI->load->model('Categories_model', 'categories_model');
    $industry = $CI->categories_model->getById($id);
    return $industry;
}


function getAllComments($postId)
{
    $CI = &get_instance();

    $query = $CI->db->query("SELECT jb_shoutbox_meta.created_at,m_avatar,jb_member.m_profession,m_name,jb_shoutbox_meta.description from jb_shoutbox_meta  INNER JOIN jb_member on jb_member.m_id = jb_shoutbox_meta.member_id where meta_type=2 AND is_deleted = 0 AND post_id= '$postId'");
    //echo $CI->db->last_query();

    return $query->result_array();
}
function getCountryById($id)
{
    $CI = &get_instance();

    $query = $CI->db->query("SELECT * from jb_country where id= '$id'");
    //echo $CI->db->last_query();

    $res = $query->row();
    return $res;
}

function getCatgoryById($id)
{
    $CI = &get_instance();

    $query = $CI->db->query("SELECT * from jb_categories where c_id= '$id'");
    //echo $CI->db->last_query();

    $res = $query->row();
    return $res;
}

function getPostMetaCount($postId)
{
    $CI = &get_instance();

    $query = $CI->db->query("SELECT COUNT(*) as likes  from jb_shoutbox_meta WHERE meta_type='1' AND is_deleted = 0 AND post_id= '$postId'")->row_array();
    $query1 = $CI->db->query("SELECT COUNT(*) as comments  from jb_shoutbox_meta WHERE meta_type='2' AND is_deleted = 0 AND post_id= '$postId'")->row_array();
    $query2 = $CI->db->query("SELECT COUNT(*) as shares  from jb_shoutbox_meta WHERE meta_type='3' AND is_deleted = 0 AND post_id= '$postId'")->row_array();
    //echo $CI->db->last_query();
    $data = array($query['likes'], $query1['comments'], $query2['shares']);
    return $data;
}
function showOnlyTime($date_created)
{
    list($date, $time) = explode(" ", $date_created);
    echo $time;
}

function makeUIDate($dbdate)
{
    if (trim($dbdate) == '')
        return;
    return strftime("%d %b %Y", strtotime($dbdate));
}

function makeUITime($dbtime)
{
    if (trim($dbtime) == '')
        return;
    list($hours, $minutes, $seconds) = explode(':', $dbtime);
    $ampm = 'AM';
    if ($hours > 12) {
        $hours -= 12;
        $ampm = 'PM';
    }
    return ($hours . ':' . $minutes . ' ' . $ampm);
}

function randString($number)
{
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((float) microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= $number) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}



function showRemainingTime($remaining_days, $remaining_time, $expiry_date, $deal_id)
{
    // Define your target date here
    //2011-02-28 14:27:21
    if ($expiry_date == '') {
        $expiry_date = '2011-04-28 14:27:21';
    }
    $arr = explode(" ", $expiry_date);
    $rmdate = explode("-", $arr[0]);
    $rmtime = explode(":", $arr[1]);

    $targetYear = $rmdate[0];
    $targetMonth = $rmdate[1];
    $targetDay = $rmdate[2];
    $targetHour = $rmtime[0];
    $targetMinute = $rmtime[1];
    $targetSecond = $rmtime[2];
    // End target date definition

    // Define date format
    $dateFormat = "Y-m-d H:i:s";

    $targetDate = mktime($targetHour, $targetMinute, $targetSecond, $targetMonth, $targetDay, $targetYear);
    $actualDate = time();

    $secondsDiff = $targetDate - $actualDate;

    $remainingDay = floor($secondsDiff / 60 / 60 / 24);
    $remainingHour = floor(($secondsDiff - ($remainingDay * 60 * 60 * 24)) / 60 / 60);
    $remainingMinutes = floor(($secondsDiff - ($remainingDay * 60 * 60 * 24) - ($remainingHour * 60 * 60)) / 60);
    $remainingSeconds = floor(($secondsDiff - ($remainingDay * 60 * 60 * 24) - ($remainingHour * 60 * 60)) - ($remainingMinutes * 60));

    $targetDateDisplay = date($dateFormat, $targetDate);
    $actualDateDisplay = date($dateFormat, $actualDate);

    ?>

    <script type="text/javascript">
        var days = <?php echo $remainingDay; ?>
        var hours = <?php echo $remainingHour; ?>
        var minutes = <?php echo $remainingMinutes; ?>
        var seconds = <?php echo $remainingSeconds; ?>

        function setCountDown() {
            seconds--;
            if (seconds < 0) {
                minutes--;
                seconds = 59
            }
            if (minutes < 0) {
                hours--;
                minutes = 59
            }
            if (hours < 0) {
                days--;
                hours = 23
            }
            $("#remain_<?= $deal_id ?>").html("<img src='<?= base_url() ?>resources/front/images/clock.jpg' style='vertical-align:text-bottom; padding-right:10px;' /><span class='remain_time_1'>" + days + "</span><span class='remain_time_2'>D</span><span class='remain_time_1'>" + hours + "</span><span class='remain_time_2'>H</span><span class='remain_time_1'>" + minutes + "</span><span class='remain_time_2'>M</span>");


            setTimeout("setCountDown()", 1000);
        }
    </script>

    <div id="remain_<?= $deal_id ?>">
        <?php
        echo "<img src='" . base_url() . "resources/front/images/clock.jpg' style='vertical-align:text-bottom; padding-right:10px;' />";
        echo "<span class='remain_time_1'>" . $remainingDay . "</span><span class='remain_time_2'>D</span>
	<span class='remain_time_1'>" . $remainingHour . "</span><span class='remain_time_2'>H</span>
	<span class='remain_time_1'>" . $remainingMinutes . "</span><span class='remain_time_2'>M</span>
	";
        ?>

        <?php //echo "$remainingDay days, $remainingHour hours, $remainingMinutes minutes, $remainingSeconds seconds"; 
            ?>
    </div>

    <?php
}

///////////////////////////////////////

function SessCityID()
{

    $CI = &get_instance();
    $CI->load->model('main_model');

    if ($CI->uri->segment(2) == 'deal_city') {
        $current_city_id = $CI->main_model->getCurrentCity(array('current_city_id' => $CI->uri->segment(3), 'ip_address' => $_SERVER['REMOTE_ADDR']));
    } else {

        $current_city_id = $CI->main_model->getIfCityExists($_SERVER['REMOTE_ADDR']);
        if ($current_city_id == 0) {
            $city_id_from_id = getCityIdFromIP();
            $current_city_id = $CI->main_model->getCurrentCity(array('current_city_id' => $city_id_from_id, 'ip_address' => $_SERVER['REMOTE_ADDR']));
        }
    }

    //$current_city_id = $CI->main_model->getIfCityExists($_SERVER['REMOTE_ADDR']);

    return $current_city_id;
}

function getCityIdFromIP()
{

    $string = file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=89797aead3c19c2c968fc065d6a10dc83ab8ee9cc61d0f8dbccfbea85566bcfc&ip=" . $_SERVER['REMOTE_ADDR'] . "&format=xml");
    $start = "<cityName>";
    $end = "</cityName>";

    $string = " " . $string;
    $ini = strpos($string, $start);
    if ($ini == 0)
        return "";
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    $city_name = substr($string, $ini, $len);

    $CI = &get_instance();
    $CI->load->model('main_model');

    return $city_id = $CI->main_model->getCityId($city_name);
}

function getSettingValue($identifier)
{

    $CI = &get_instance();
    $CI->load->model('main_model');

    return $CI->main_model->getSettingValueDB($identifier);
}

function GetUserList($u_id)
{
    //    echo $u_id;exit();
    $CI = &get_instance();

    $query = $CI->db->query("select list_id,name from jb_member_by_list left join jb_users_list ON jb_users_list.id = jb_member_by_list.list_id where jb_member_by_list.member_id = " . $u_id . " ");
    $res = $query->result();
    return $res;
}

function getStoreCategoryName($language_id, $store_category_id, $title)
{

    $CI = &get_instance();
    $CI->load->model('stores_model');

    //return $CI->main_model->getDefaultCurrency();

    if ($language_id == 1) {
        $store_category_name = $title;
    } else {
        $store_category_language = $CI->stores_model->getStoreCategoryLanguage($language_id, $store_category_id);
        if ($store_category_language != 'empty') {
            $store_category_name = $store_category_language->title;
        } else {
            $store_category_name = $title;
        }
    }
    return stripslashes($store_category_name);
}

function getCategoryDescription($language_id, $store_category_id, $description)
{

    $CI = &get_instance();
    $CI->load->model('stores_model');

    if ($language_id == 1) {
        $store_category_description = $description;
    } else {
        $store_category_language = $CI->stores_model->getStoreCategoryLanguage($language_id, $store_category_id);

        if ($store_category_language != 'empty') {
            $store_category_description = $store_category_language->description;
        } else {
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


function print_arr($arr)
{

    print_r('<pre>');

    print_r($arr);

    print_r('</pre>');
}



function urlKey($text)
{

    $clean = preg_replace('/[^\w\d_ -]/si', '', $text); ///remove any special character
    $clean = preg_replace('/\s\s+/', ' ', $clean); ///replacing multiple spaces to signle
    $clean = strtolower(str_replace(" ", "-", $clean)); ///replace space with dash and making lower case
    return $clean;
}

function getHours($mints)
{
    return floor($mints / 60);
}
function getHoursTime($mints)
{
    $hour = floor($mints / 60);
    if ($hour > 12) {
        $hour -= 12;
        return $hour;
    } else {
        return $hour;
    }
}
function getMints($mints)
{
    while ($mints >= 60) {
        $mints -= 60;
    }
    return $mints;
}
function getAmPm($hour)
{
    if ($hour > 12) {
        return "pm";
    } else {
        return "am";
    }
}

function MentorsAndRecruiters()
{
    $CI = &get_instance();
    $query = $CI->db->query('Select m_id from jb_member where role_id in (2,6)');
    $data = $query->result();
    $return = array();
    if ($data) {
        foreach ($data as $user) {
            $return[] = $user->m_id;
        }
    }
    return $return;
}
function IsFeaturedRecruiter()
{
    $CI = &get_instance();

    $query = $CI->db->query('Select member_id from jb_member_by_list where list_id = 92');
    $data = $query->result();
    $return = array();
    if ($data) {
        foreach ($data as $user) {
            $return[] = $user->member_id;
        }
    }
    return $return;
}
function IsRecruiter()
{
    $CI = &get_instance();
    $query = $CI->db->query('Select m_id from jb_member where role_id = 6');
    $data = $query->result();
    $return = array();
    if ($data) {
        foreach ($data as $user) {
            $return[] = $user->m_id;
        }
    }
    return $return;
}

function countTotalApproved()
{
    $CI = &get_instance();
    $CI->load->model('admin_assignment_model');
    $query = $CI->db->query("SELECT count(*) AS total from tr_assignments where assign_status= 'approved'");
    if ($query->num_rows() > 0) {
        return $query->row('total');
    }
}
function countTotalCompleted()
{
    $CI = &get_instance();
    $CI->load->model('admin_assignment_model');
    $query = $CI->db->query("SELECT count(*) AS total from tr_assignments where assign_status= 'completed'");
    if ($query->num_rows() > 0) {
        return $query->row('total');
    }
}
function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
function programMenu()
{

    $CI = &get_instance();
    $CI->load->model('front_model');
    $CI->db->select('slug');
    $CI->db->from($CI->db->dbprefix('programs'));

    $CI->db->order_by("p_id", "ASC");
    //$this->db->limit(6, 0);

    $query = $CI->db->get();
    //echo $this->db->last_query();
    if ($query->num_rows() > 0) {


        return $query->result();
    } else
        return 'empty';
}

function GetCount($list_id)
{
    $CI = &get_instance();
    $CI->load->model('users_by_list_model');
    $users = $CI->users_by_list_model->Search(array('list_id' => $list_id));
    return count($users);
}

function GetCompanyName($company_id)
{

    $CI = &get_instance();
    $CI->load->model('companies_model', 'companies');

    $company = $CI->companies->GetById($company_id);

    if ($company) {
        $name = $company->co_name;
    } else {
        $name = '';
    }

    return $name;
}

function GetCompanyPicture($company_id)
{

    $CI = &get_instance();
    $CI->load->model('companies_model', 'companies');

    $company = $CI->companies->GetById($company_id);

    if ($company) {
        $co_logo = $company->co_logo;
    } else {
        $co_logo = '';
    }

    return $co_logo;
}

function isPurchased($pro_id)
{

    $CI = &get_instance();

    $CI->load->model('product');
    $CI->user_id = $CI->session->userdata('user_id');
    $member_orders = $CI->product->Search(array('buyer_id' => $CI->user_id, 'product_id' => $pro_id));
    return $member_orders;
}


function _setSuccess($message)
{
    $CI = &get_instance();
    $CI->session->set_flashdata('INF_MSG', $message);
}

function ReviewStudents($course_id)
{
    $CI = &get_instance();
    $CI->load->model('training_model');

    $res = $CI->training_model->SearchCourseRating(array('course_id' => $course_id));
    return $res;
}

function CheckRating($course_id, $user_id)
{
    $CI = &get_instance();
    $CI->load->model('training_model');

    $res = $CI->training_model->SearchCourseRating(array('student_id' => $user_id, 'course_id' => $course_id));
    if (!empty($res)) {
        return "found";
    } else {
        return "not_found";
    }
}


function _getSuccess()
{
    $CI = &get_instance();
    return $CI->session->flashdata('INF_MSG');
}
function _getWarning()
{
    $CI = &get_instance();
    return $CI->session->flashdata('WRR_MSG');
}

function _setError($message)
{
    $CI = &get_instance();
    $CI->session->set_flashdata('ERR_MSG', $message);
}

function _getError()
{
    $CI = &get_instance();
    return $CI->session->flashdata('ERR_MSG');
}

function _setWarning($message)
{
    $CI = &get_instance();
    $CI->session->flashdata('WRR_MSG', $message);
}

function GetTotalStudents($course_id)
{

    $CI = &get_instance();
    $CI->load->model('training_model');
    $students = $CI->training_model->SearchCourse(array('course_id' => $course_id));
    $t_students = count($students);
    return $t_students;
}


function GetCategoryName($company_id)
{

    $CI = &get_instance();
    $CI->load->model('categories_model', 'categories');

    $category = $CI->categories->GetById($company_id);

    if ($category) {
        $name = $category->c_name;
    } else {
        $name = '';
    }

    return $name;
}
function GetCategoryList()
{

    $CI = &get_instance();
    $CI->load->model('categories_model', 'categories');

    return $CI->categories->GetAll();
}

function GetAllCert($id)
{

    $CI = &get_instance();
    $CI->load->model('certification_model');

    return $CI->certification_model->GetAllCert($id);
}

function GetUserDetails($user_id)
{

    $CI = &get_instance();
    $CI->load->model('user_model', 'user_model');

    $user = $CI->user_model->GetById($user_id);

    if (isset($user->m_id) && $user->m_id) {
        return $user;
    }
}

function CVreviewStatusByType($type = array())
{
    $CI = &get_instance();
    $CI->load->model('Cvreview_model', 'cvreview_model');
    $count = $CI->cvreview_model->CountSearch($type);

    return $count;
}
function CVreviewStatusByUser($user_id)
{
    $CI = &get_instance();
    $CI->load->model('Cvreview_model', 'cvreview_model');
    $count = $CI->cvreview_model->GetByUserId($user_id);
    return $count;
}
function datenow()
{
    return date('Y-m-d H:i:s');
}

function linkify($value, $protocols = array('http', 'mail'), array $attributes = array())
{
    // Link attributes
    $attr = '';
    foreach ($attributes as $key => $val) {
        $attr .= ' ' . $key . '="' . htmlentities($val) . '"';
    }

    $links = array();

    // Extract existing links and tags
    $value = preg_replace_callback('~(<a .*?>.*?</a>|<.*?>)~i', function ($match) use (&$links) {
        return '<' . array_push($links, $match[1]) . '>';
    }, $value);

    // Extract text links for each protocol
    foreach ((array) $protocols as $protocol) {
        switch ($protocol) {
            case 'http':
            case 'https':
                $value = preg_replace_callback('~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attr) {
                    if ($match[1])
                        $protocol = $match[1];
                    $link = $match[2] ?: $match[3];
                    return '<' . array_push($links, "<a $attr href=\"$protocol://$link\">$link</a>") . '>';
                }, $value);
                break;
            case 'mail':
                $value = preg_replace_callback('~([^\s<]+?@[^\s<]+?\.[^\s<]+)(?<![\.,:])~', function ($match) use (&$links, $attr) {
                    return '<' . array_push($links, "<a $attr href=\"mailto:{$match[1]}\">{$match[1]}</a>") . '>';
                }, $value);
                break;
            case 'twitter':
                $value = preg_replace_callback('~(?<!\w)[@#](\w++)~', function ($match) use (&$links, $attr) {
                    return '<' . array_push($links, "<a $attr href=\"https://twitter.com/" . ($match[0][0] == '@' ? '' : 'search/%23') . $match[1] . "\">{$match[0]}</a>") . '>';
                }, $value);
                break;
            default:
                $value = preg_replace_callback('~' . preg_quote($protocol, '~') . '://([^\s<]+?)(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attr) {
                    return '<' . array_push($links, "<a $attr href=\"$protocol://{$match[1]}\">{$match[1]}</a>") . '>';
                }, $value);
                break;
        }
    }

    // Insert all link
    return preg_replace_callback('/<(\d+)>/', function ($match) use (&$links) {
        return $links[$match[1] - 1];
    }, $value);
}

function setNotification($user_id, $notify_user_id, $noti_title, $noti_desc = '', $noti_link = '')
{

    $CI = &get_instance();
    $sdata['user_id'] = $user_id;
    $sdata['notify_user_id'] = $notify_user_id;
    $sdata['noti_title'] = $noti_title;
    $sdata['noti_desc'] = $noti_desc;
    $sdata['noti_link'] = $noti_link;
    $sdata['added_on'] = date('Y-m-d H:i:s');

    $CI->load->model('notification_model');
    $CI->notification_model->save($sdata);
}

function sendNotificationToAdmin($data = array())
{

    $CI = &get_instance();
    $CI->load->model('notification_model');

    $query = $CI->db->query('Select m_id from jb_member where role_id in (1,2,5)');
    $result = $query->result();

    //    	 echo "<pre>";
    //	 print_r($data);exit();
    foreach ($result as $res) {
        //    echo "<pre>";print_r($res);exit();
        $sdata['user_id'] = isset($data['user_id']) ? $data['user_id'] : 0;
        $sdata['notify_user_id'] = $res->m_id;
        $sdata['noti_title'] = isset($data['noti_title']) ? $data['noti_title'] : '';
        $sdata['noti_desc'] = isset($data['noti_desc']) ? $data['noti_desc'] : '';
        $sdata['noti_link'] = isset($data['noti_link']) ? $data['noti_link'] : '';
        $sdata['noti_type'] = isset($data['noti_type']) ? $data['noti_type'] : NULL;
        $sdata['added_on'] = date('Y-m-d H:i:s');
        $CI->notification_model->save($sdata);
    }
}

function AddNotification($data = array())
{

    $CI = &get_instance();
    $sdata['user_id'] = isset($data['user_id']) ? $data['user_id'] : 0;
    $sdata['notify_user_id'] = isset($data['notify_user_id']) ? $data['notify_user_id'] : 0;
    $sdata['noti_title'] = isset($data['noti_title']) ? $data['noti_title'] : '';
    $sdata['noti_desc'] = isset($data['noti_desc']) ? $data['noti_desc'] : '';
    $sdata['noti_link'] = isset($data['noti_link']) ? $data['noti_link'] : '';
    $sdata['noti_type'] = isset($data['noti_type']) ? $data['noti_type'] : NULL;
    $sdata['added_on'] = date('Y-m-d H:i:s');
    // echo "<pre>";
    // print_r($sdata);
    // die();
    $CI->load->model('notification_model');
    $CI->notification_model->save($sdata);
}

function getNotification()
{
    $CI = &get_instance();
    $CI->load->model('notification_model');
    $data = $CI->notification_model->GetAll();
    return $data;
}

function GetQuickJobTitle($job_id)
{
    $CI = &get_instance();
    $CI->load->model('job_model');
    $job_title = $CI->job_model->applicantJobById($job_id);

    return $job_title;
}

function LatestJobsList()
{
    $CI = &get_instance();

    //Get Latest 10 Jobs
    $job_query = $CI->db->query('select * from ' . JOBS_TABLE . ' order by j_add_date DESC limit 0,15 ');
    $latest_jobs = $job_query->result();

    return $latest_jobs;
}


function top_members_by_last_login()
{
    $CI = &get_instance();

    $query = $CI->db->query('Select * from ' . MEMBER_TABLE . ' order by last_login_date DESC limit 0,15');
    $mentors_list = $query->result();


    return $mentors_list;
}

function SearchQuickMember($email)
{
    $CI = &get_instance();

    //Get Latest 10 Jobs
    $search_member = $CI->db->query("select * from " . MEMBER_TABLE . " where m_email = '" . $email . "' ");
    //    $query2 = $this->db->query("
    //    UPDATE jb_successstory SET ss_subject= '".$options['ss_subject']."',ss_descr= '".$options['ss_descr']."' WHERE ss_member_id = '".$options['ss_member_id']."'");
    $search_member = $search_member->result();

    return $search_member;
}

function getActivityList()
{
    $CI = &get_instance();
    $CI->load->model('notification_model');

    $limit = 10;
    $team_noti = array('cvreview', 'events', 'event_message', 'company', 'testimonial', 'mentors', 'general_message', 'tsheet_message', 'registration');
    $notifications = $CI->notification_model->ByType($team_noti, $limit);
    return $notifications;
}

function FeedRightActivityList()
{
    $CI = &get_instance();
    $CI->load->model('notification_model');

    $limit = 30;
    $public_noti = array('whatshappening', 'job', 'events', 'event_message', 'general_message', 'company', 'testimonial', 'general_message');
    $notifications = $CI->notification_model->ByType($public_noti, $limit);

    return $notifications;
}


function LatestCompaniesList()
{
    $CI = &get_instance();

    //Get Latest Companies
    $query = $CI->db->query('select * from ' . COMPANIES_TABLE . ' where co_status=1 ORDER BY added_on DESC, updated_on DESC limit 0,15 ');
    $results = $query->result();

    return $results;
}
function FeedCountByUser($user_id)
{
    $CI = &get_instance();

    $return = 0;

    $query = $CI->db->query('select count(*) as total from ' . FEED_TABLE . ' where user_id=' . $user_id);
    $results = $query->row();
    if ($results) {
        $return = $results->total;
    }
    return $return;
}

function CandidatesCountByMentor($user_id)
{
    $CI = &get_instance();

    $return = 0;
    $query = $CI->db->query('select count(*) as total from ' . MEMBER_TABLE . ' where mentor_id=' . $user_id);
    $results = $query->row();
    if ($results) {
        $return = $results->total;
    }
    return $return;
}

function ResumeApprovedByMentor($user_id)
{
    $CI = &get_instance();

    $return = 0;
    $query = $CI->db->query('select count(*) as total from ' . CVREVIEW_TABLE . ' where review_status="review_done" and assign_user_to=' . $user_id);

    $results = $query->row();
    if ($results) {
        $return = $results->total;
    }
    return $return;
}
function TestimonialByUser($user_id)
{
    $CI = &get_instance();

    $return = 0;
    //$query = $CI->db->query('select count(*) as total from '.TESTIMONIALS_TABLE.' where user_id='.$user_id);
    $query = $CI->db->query('select count(*) as total  from ' . TESTIMONIALS_TABLE . ' t, ' . MEMBER_TABLE . ' m where t.user_id = m.m_id and m.mentor_id=' . $user_id);
    $results = $query->row();

    if ($results) {
        $return = $results->total;
    }

    return $return;
}

function JobcountByUser($user_id)
{
    $CI = &get_instance();

    $return = 0;
    $query = $CI->db->query('select count(*) as total from ' . JOBS_TABLE . ' where j_addedby=' . $user_id);
    $results = $query->row();
    if ($results) {
        $return = $results->total;
    }

    return $return;
}

function NotificationByType($types)
{
    $CI = &get_instance();
    $return = array();
    $CI->db->where_in('noti_type', $types);
    $results = $CI->db->get('jb_notification')->result_array();
    return $results;
}
function NotificationCountByUser($user_id)
{
    $CI = &get_instance();
    $return = array();

    $query = $CI->db->query("SELECT count(*) as total from jb_notification where read_flag='unread' and  notify_user_id=" . $user_id);
    if ($query->num_rows() > 0) {
        return $query->row()->total;
    }
}

function TMessagesCountByUser($user_id)
{
    $CI = &get_instance();
    $return = array();

    $query = $CI->db->query("SELECT count(*) as total from jb_notification where read_flag='unread' and noti_type='tsheet_message' and  notify_user_id=" . $user_id);
    if ($query->num_rows() > 0) {
        return $query->row()->total;
    }
}
function NotificationListByUser($user_id)
{
    $CI = &get_instance();
    $return = array();

    $query = $CI->db->query("SELECT * from jb_notification where notify_user_id=" . $user_id);
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}

function getNotificationByType($type = Null)
{
    // function getNotificationByType(){
    $CI = &get_instance();
    $CI->load->model('notification_model');
    $data = $CI->notification_model->GetByNotiType($type);
    // $data = $CI->notification_model->GetByNotiType();
    return $data;
}

function checkCookie()
{

    $CI = &get_instance();
    $email = get_cookie('navafiz_email');
    $password = get_cookie('navafiz_password');


    if (!empty($email) && !empty($password) && isset($usman)) {
        $get_user = $CI->profile_model->Search(array('m_email' => $email, 'm_password' => $password));
        if (count($get_user) > 0) {
            $get_user = $get_user[0];
            if ($get_user->m_status == 1) {
                $CI->input->set_cookie('navafiz_email', $email, 10 * 30 * 24 * 60 * 60); /* Create cookie for store email */
                $CI->input->set_cookie('navafiz_password', $password, 10 * 30 * 24 * 60 * 60); /* Create cookie for password */

                $user_session_data = array(
                    'user_id' => $get_user->m_id,
                    'email' => $get_user->m_email,
                    'login_type' => "normal",
                    'cat_id' => $get_user->m_category,
                    'name' => $get_user->m_name,
                    'cv' => $get_user->member_cv,
                    'facebook_id' => $get_user->facebook_id,
                    'avatar' => $get_user->m_avatar,
                );
                $CI->session->set_userdata($user_session_data);
                $user_id = $CI->session->userdata('user_id');
                return $user_id;
            }
        }
    }
}

function profile_picture($user_id)
{
    $CI = &get_instance();
    $qry = $CI->db->query('select m_avatar from jb_member where m_id=' . $user_id);
    $result = $qry->result();
    if (isset($result[0]->m_avatar) && !empty(isset($result[0]->m_avatar))) {
        $img_name = $result[0]->m_avatar;
    } else {
        $img_name = 'default.png';
    }

    $return = base_url('assets/uploads/members/' . $img_name);
    return $return;
}

function BasicInfoUser($user_id)
{
    $CI = &get_instance();
    $qry = $CI->db->query('SELECT 
                            m_id,
                            username,
                            role_id,
                            m_name,
                            m_email,
                            m_profession,
                            m_category,
                            m_current_city,
                            m_branding,
                            gender,
                            m_avatar,
                            m_profile_view,
                            last_login_date,
                            mentor_id,
                            mentor_activity_text,
                            dismissed_by,
                            member_cv 
                          FROM ' . MEMBER_TABLE . ' 
                          WHERE m_id = ?', [$user_id]); // Use parameterized query

    $result = $qry->result();
    if (!empty($result) && !empty($result[0]->m_name)) {
        return $result[0];
    }
    return null;
}

function BasicInfoUser1($user_id)
{
    $CI = &get_instance();
    $qry = $CI->db->query('SELECT 
                            m_id,
                            username,
                            role_id,
                            m_name,
                            m_email,
                            m_profession,
                            m_category,
                            m_city,
                            m_employer,
                            employment_status,
                            visa_status,
                            added_on,
                            m_current_city,
                            gender,
                            m_avatar,
                            m_profile_view,
                            last_login_date,
                            mentor_id,
                            mentor_activity_text,
                            dismissed_by,
                            member_cv 
                          FROM ' . MEMBER_TABLE . ' 
                          WHERE m_id = ?', [$user_id]); // Use parameterized query

    $result = $qry->result();
    if (!empty($result) && !empty($result[0]->m_name)) {
        return $result[0];
    }
    return null;
}

function GetReferralProfile()
{
    $CI = &get_instance();
    $query = $CI->db->query('SELECT referral_id FROM ' . MEMBER_TABLE . ' WHERE referral_id != 0');
    if ($query) {
        return $query->result();
    }
    return null;
}

function GetJobTitle($j_id)
{
    $CI = &get_instance();
    $CI->load->model('job_model');

    $res = $CI->job_model->GetJobTitleById($j_id);
    return $res;
}

function GetUserName($id)
{
    $CI = &get_instance();
    $query = $CI->db->query('select * from jb_member where m_id=' . $id . '');
    $result = $query->result();
    return $result;
}
function GetUserJobTitles($id)
{
    $CI = &get_instance();
    $query = $CI->db->query('select m_profession, profession2, profession3, profession4, profession5 from jb_member where m_id=' . (int) $id); // It's good practice to cast the id to an integer for security.
    $result = $query->row();
    return $result;
}

function GetUserListName($id)
{
    $CI = &get_instance();

    if ($id === 'new') {
        return [(object) ['id' => 'new', 'name' => 'New Members']];
    }

    if (is_numeric($id)) {
        $query = $CI->db->get_where('jb_users_list', ['id' => $id]);
        return $query->result();
    }

    return [];
}


//function GetUserDetails($id){
//    $CI =& get_instance();
//    $query = $CI->db->query('select * from jb_member where m_id='.$id.'');
//    $result = $query->result();
//    return $result;
//}
function GetAnswerData($q_id, $user_id)
{
    $CI = &get_instance();
    $CI->load->model('recruitment_answer_model');

    $result = $CI->recruitment_answer_model->SearchQuestion(array('question_id' => $q_id, 'user_id' => $user_id));
    return $result;
}

function GetQuestion($q_id)
{
    $CI = &get_instance();
    $query = $CI->db->query('select * from jb_recruitment_profile_questions where id=' . $q_id . '');
    $result = $query->result();
    return $result;
}

function MySuper6List($user_id)
{
    $CI = &get_instance();
    $qry = $CI->db->query('select * from ' . MENTOR_SUPER6_TABLE . ' where vote_from=' . $user_id . ' ');
    $results = $qry->result();

    $myvotes_to_list = array();

    foreach ($results as $result) {
        $myvotes_to_list[] = $result->vote_to;
    }

    return $myvotes_to_list;
}

function RecivedRecommendation($user_id)
{
    $CI = &get_instance();
    $qry = $CI->db->query('select * from ' . MENTOR_SUPER6_TABLE . ' where vote_to=' . $user_id . ' ');
    $results = $qry->result();

    $myvotes_to_list = array();

    foreach ($results as $result) {
        $myvotes_to_list[] = $result->vote_from;
    }

    return $myvotes_to_list;
}
function link_it($text)
{
    $text = preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" >$3</a>", $text);
    $text = preg_replace("/(^|[\n ])([\w]*?)((www)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" >$3</a>", $text);
    $text = preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"ftp://$3\" >$3</a>", $text);
    $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\">$2@$3</a>", $text);
    return ($text);
}

function MentorAutoAssigned($user_id = 3797)
{
    $CI = &get_instance();

    if (intval($user_id) > 0) {
        $mentors_list = CvReviewTeamList();
        shuffle($mentors_list);

        $member_info = BasicInfoUser($user_id);
        foreach ($mentors_list as $mentor) {
            $qry = $CI->db->query('Select count(*) as total from jb_member where mentor_id=' . $mentor);
            $result = $qry->row();

            if (isset($result->total) && $result->total < 51) {
                $qry = $CI->db->query('update jb_member set mentor_id=' . $mentor . ',mentor_assigned_date="' . datenow() . '" where m_id=' . $user_id);

                $mentor_info = BasicInfoUser($mentor);
                $noti['user_id'] = $mentor_info->m_id;
                $noti['noti_title'] = $mentor_info->m_name . " Assigned as a mentor for " . $member_info->m_name;
                $noti['noti_desc'] = $mentor_info->m_name . " Assigned as a mentor for " . $member_info->m_name;
                $noti['noti_type'] = 'mentors';
                $noti['noti_link'] = site_url('profile/' . $user_id);
                AddNotification($noti);

                if (!empty($mentor_info->m_email)) {
                    $subject = 'You have been assigned as Mentor for ' . $member_info->m_name;
                    $message = "<p>Dear " . $mentor_info->m_name . ",</p>";
                    $message .= "<p>You have been assigned as Mentor for " . $member_info->m_name . " </p>";
                    $message .= "<p>1- Please remind the candidate if his profile is incomplete or Resume is not uploaded in the System.</p>";
                    $message .= "<p>2- Please review his resume, if uploaded in the system and approve or disapprove based on your analysis and comments.</p>";
                    $message .= "<p>3- If required you can assign someone else as Resume reviewer or Mentor for candidates. </p>";
                    $message .= "<p><a href='https://navafiz.com/track_steps/sheet/" . $user_id . "'>Checkout Profile completion via Trackingsheet</a></p>";
                    $message .= "<p>Thanks for being a great Mentor and supporting the professional community.</p>";
                    $message .= "<p>Regards, <br /> Navafiz System Generated Message. <br /> For any issues email to Neethu Anzar or Liaqat Ali</p>";
                    $message .= "<p>--</p>";
                    $message .= "<p>Message from www.navafiz.com</p>";
                    $message .= "#" . rand(0, 999999);
                    SendMail($mentor_info->m_email, $subject, $message);
                }
                break;
            }
        }
    }
}
function SendMail($to, $subject, $message, $from_email = 'support@navafiz.com')
{

    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com', //
        'smtp_port' => 465,
        'smtp_user' => SMTP_USER, //
        'smtp_pass' => SMTP_PASSWORD, //
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );

    $CI = &get_instance();
    $CI->load->library('email', $config);
    $CI->email->set_mailtype("html");
    $CI->email->from($from_email, 'Navafiz Support');
    $CI->email->reply_to($from_email);
    $to_emails = array($to, 'usman@useevs.com');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    if ($CI->email->send()) {
        return true;
    } else {
        //echo $CI->email->print_debugger();        
    }
}

function SendMailRegister($to, $subject, $message, $from_email = 'support@navafiz.com')
{
    $CI = &get_instance();

    $config = [
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.navafiz.com', // Replace with your cPanel email SMTP host
        'smtp_user' => 'register@navafiz.com', // Your full cPanel email address
        'smtp_pass' => 'Nav@123123.', // Your cPanel email password
        'smtp_port' => 587, // Or 587 if using TLS
        'smtp_crypto' => 'tls', // Use 'tls' for port 587
        'mailtype' => 'html', // Email format (HTML)
        'charset' => 'utf-8', // Character encoding
        'wordwrap' => true, // Word wrapping
    ];

    $CI->load->library('email', $config);
    $CI->email->set_mailtype("html");
    $CI->email->from($from_email, 'Navafiz Support');
    $CI->email->reply_to($from_email);
    //    $to_emails = array($to,'usman@useevs.com');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    if ($CI->email->send()) {
        return true;
    } else {
        echo $CI->email->print_debugger();
    }
}

function AddUserPoint($data)
{
    //        print_r($data);
    //        exit();
    $CI = &get_instance();
    $CI->load->model('Points_model');
    $res = $CI->Points_model->Save($data);
    //    echo $res;
    //    exit();

}

function UpdateUserPoint($data, $id)
{
    //        print_r($data);
    //        exit();
    $CI = &get_instance();
    $CI->load->model('Points_model');
    $res = $CI->Points_model->Save($data, $id);
    //    echo $res;
    //    exit();

}

// Check the user role from session user ID
function require_role($roles = array())
{
    $CI =& get_instance();
    $user_id = $CI->session->userdata('user_id');

    if (!$user_id) {
        redirect('login');
    }

    $query = $CI->db->select('role_id')
        ->where('m_id', $user_id)
        ->get('jb_member');

    if ($query->num_rows() == 0 || !in_array($query->row()->role_id, $roles)) {
        show_error('Unauthorized Access', 403);
    }
}

// Map status for request forms
function request_forms_status($status)
{
    // Map numeric status to name
    $statusMap = [
        1 => 'Submit',
        2 => 'Approved',
        3 => 'Rejected'
    ];

    // Map numeric status to badge class
    $classMap = [
        1 => 'badge bg-warning text-dark',
        2 => 'badge bg-success',
        3 => 'badge bg-danger'
    ];

    return [
        'name' => isset($statusMap[$status]) ? $statusMap[$status] : 'Unknown',
        'class' => isset($classMap[$status]) ? $classMap[$status] : 'badge bg-light text-dark'
    ];
}
?>