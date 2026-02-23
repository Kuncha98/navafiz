<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
define('SITE_NAME', 'Navafiz');
define('TABLE_PREFIX', 'jb_');
define('feed_upload_path', 'nassets/feed/uploads/');

define('Recommendation', 5);
define('CVReview', 5);
define('Shortlist', 5);
define('Blueuser', 1);
define('ProfileRecommendation', 5);
define('MarkedInterviewed', 10);



/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('RECAPTCHA_PUBLIC_KEY',	'6LfpMsISAAAAANEVsBetR_x8jcKZQhSpdrqWjzXY');
define('RECAPTCHA_PRIVATE_KEY', '6LfpMsISAAAAAHB4NQ-uMGoLTv7qM6wAgd3WkXwB');
define('SMTP_USER', 'navafizweb@gmail.com');
define('SMTP_PASSWORD', 'dxb@321321');


// Important Database Tables
define('FEED_TABLE', 'jb_feed');
define('JOBS_TABLE', 'jb_jobs');
define('COMPANIES_TABLE', 'jb_companies');
define('USER_RECOMMENDATION_TABLE', 'jb_user_recommendation');
define('MEMBER_TABLE', 'jb_member');
define('CVREVIEW_TABLE', 'jb_cvreview');
define('TESTIMONIALS_TABLE', 'jb_testimonials');
define('MENTOR_SUPER6_TABLE', 'jb_mentors_super6');
/* End of file constants.php */
/* Location: ./application/config/constants.php */