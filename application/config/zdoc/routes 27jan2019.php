<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$route['default_controller'] = "front/jobs";
$route['default_controller'] = "front";
$route['admin'] = "admin/main";
$route['admin/main/login'] = "admin/main/login";

$route['admin/job/admin_upload_job_image'] = "admin/jobs/adminUploadJobImage";
$route['admin/jobs'] = "admin/jobs";
$route['admin/jobs'] = "admin/jobs";
$route['admin/ajaxDataManagementJobs'] = "admin/jobs/ajaxDataManagementJobs";

$route['admin/job/admin_upload_job_image'] = "admin/jobs/adminUploadJobImage";
$route['admin/companies'] = "admin/companies";
$route['admin/ajaxDataManagementJobs'] = "admin/jobs/ajaxDataManagementJobs";





$route['admin/categories'] = "admin/jobs/categories";
$route['admin/ajaxDataManagementCategories'] = "admin/jobs/ajaxDataManagementCategories";

$route['admin/videos'] = "admin/videos";
//$route['admin/ajaxDataManagementVideo'] = "admin/main/ajaxDataManagementVideo";

$route['admin/bcategories'] = "admin/blog/bcategories";
$route['admin/ajaxDataManagementBCategories'] = "admin/blog/ajaxDataManagementBCategories";

$route['admin/blog/blog_file'] = "admin/blog/uploadBlog";
$route['admin/blogs'] = "admin/blog";
$route['admin/ajaxDataManagementBlogs'] = "admin/blog/ajaxDataManagementBlogs";

$route['admin/faqs'] = "admin/main/faqs";
$route['admin/ajaxDataManagementFaq'] = "admin/main/ajaxDataManagementFaq";

$route['admin/classified'] = "admin/classified";
$route['admin/ajaxDataManagementClassified'] = "admin/classified/ajaxDataManagementClassified";

$route['admin/event'] = "admin/event";
$route['admin/ajaxDataManagementEvent'] = "admin/event/ajaxDataManagementEvent";

$route['admin/eventgallery'] = "admin/gallery";
$route['gallery/upload_gallery_image'] = "admin/gallery/upload_gallery_image";
$route['admin/ajaxDataManagementGallery'] = "admin/gallery/ajaxDataManagementGallery";

$route['admin/eventsubscriber'] = "admin/event/eventsubscriber";
$route['admin/ajaxDataManagementEventSubscriber'] = "admin/event/ajaxDataManagementEventSubscriber";




$route['admin/members'] = "admin/members/memberdata";
$route['admin/ajaxDataManagementMember'] = "admin/members/ajaxDataManagementMember";
$route['admin/member/excelexport'] = "admin/members/excelexport";
$route['admin/member/cv/(:any)'] = "admin/members/viewcv/$1";
$route['admin/member/excelexport/(:any)'] = "admin/members/memberexcelexport/$1";

$route['admin/pages'] = "admin/main/pages";
$route['admin/ajaxDataManagementPage'] = "admin/main/ajaxDataManagementPage";

$route['admin/imagelibrary'] = "admin/gallery";


$route['admin/settings'] = "admin/main/settings";
$route['admin/saveSettings'] = "admin/main/saveSettings";
$route['admin/logout'] = "admin/main/logout";




//$route['home'] = "front";
$route['home'] = "front/home";
$route['jobtitles'] = "front/jobtitles";
$route['login'] = "front/login";

$route['poll'] = "front/poll";
$route['pollresult'] = "front/pollresult";
$route['poll/referral/(:any)/(:any)'] = "front/pollreferralform/$1/$2";

//$route['userlogin'] = "front/userLogin";
$route['emailavailability'] = "front/emailAvailability";
$route['forgot'] = "front/forgotpassword";
$route['userforgotpassword'] = "front/updatepassword";
$route['faqs'] = "page/faqs";
$route['important-contact-numbers-in-uae'] = "page/important-contact-numbers-in-uae";

$route['event-in-uae'] = "event/events_citites";
$route['event-join/(:num)'] = "front/registerProgram/$1";

$route['fbuserlogin'] = "front/fbUserLogin";

$route['cronjobalert'] = "front/cronJobAlert";
$route['delemployer/(:any)'] = "front/delEmployer/$1";
$route['deleducation/(:any)'] = "front/delEducation/$1";

$route['membercv'] = "front/uploadCvForm";
$route['member/uploadcv'] = "front/uploadCv";
$route['profile'] = "front/profile";
$route['summary-career'] = "front/summary_career";
$route['AddMemberSummaryPoints'] = "front/AddMemberSummaryPoints";
$route['UpdateProfile'] = "front/UpdateProfile";
$route['reference'] = "front/referenceform";
$route['updateReference'] = "front/updateReference";


$route['member/uploadmemberimage'] = "front/uploadMemberImage";
$route['member/nintydaycron'] = "front/nintyDayCron";





$route['updateemployer'] = "front/updateEmployer";
$route['updateeducation'] = "front/updateEducation";
$route['SaveEducation'] = "front/SaveEducation";
$route['saveskill'] = "front/saveSkill";
$route['updatejob'] = "front/updateJob";
$route['savejob'] = "front/saveJob";


$route['skills'] = "front/skillform";
$route['postskills'] = "front/postSkills";

$route['events'] = "event";
$route['AddEventByUser'] = "event/AddEventByUser";
$route['eventsajax'] = "event/eventsajax";
$route['event/(:any)'] = "event/eventdetail/$1";
$route['about'] = "page";

$route['videos'] = "video/index";
$route['videoshow/(:any)'] = "video/videodetail/$1";

$route['jobs'] = "front/jobs";
$route['myjobs'] = "job/memberJobs";
$route['jobpost'] = "front/newJobPost";
$route['place-job'] = "job/place_job";

$route['updatejobdata'] = "job/updateJobData";
$route['postjobdata'] = "front/postJobData";
$route['job/upload_job_image'] = "front/uploadJobImage";
$route['postcv'] = "front/postCv";

$route['cvreviews'] = "front/cvReviews";
$route['cvsajax'] = "front/cvsajax";
$route['cvreview'] = "front/cvReviewForm";
$route['updatecvreview'] = "front/updateCvReview";
$route['job/report-abuse/(:any)'] = "job/reportAbuseForm/$1";
$route['job/sendabusereport'] = "job/sendAbuseReport";




//==========cv review==========================
$route['review/(:any)'] = "front/reviewdetail/$1";
$route['download/(:any)'] = "front/downloadcv/$1";
$route['postcvdata'] = "front/postCvData";
$route['cv/upload_cv_review'] = "front/uploadReviewCv";
$route['postcvreview'] = "front/postCvReview";


$route['cv/upload_cv_review_response'] = "front/uploadReviewCvResponse";
$route['downloadreview/(:any)'] = "front/downloadReviewcv/$1";
//$route['postcvreview'] = "front/postCvReview";
//==============================================


$route['job/edit/(:any)/(:any)'] = "job/editjob/$1/$2";
$route['job/(:any)'] = "front/jobdetail/$1";
$route['jobsajax'] = "front/jobsajax";
$route['job/twentydaycron'] = "front/twentyDayCron";
$route['job/savecomments'] = "job/saveComments";
$route['review/savecomments'] = "job/saveReviewComments";
$route['job/applyonline'] = "job/applyOnline";



$route['job/jobseekertips'] = "job/jobSeekerTips";
$route['professionals'] = "front/professionals";
/*$route['member/searchprofessionals'] = "front/searchProfessionals";*/
$route['member/searchprofessionals'] = "front/professionalsajax";
//$route['member/successstory'] = "member/professionalsajax";
$route['professionalsajax'] = "front/professionalsajax";
$route['professional/(:any)'] = "front/professionalDetail/$1";
$route['mycard/(:any)'] = "front/mycard/$1";


$route['classifieds'] = "classified";
$route['companies'] = "companies";

$route['company/newcompany'] = "companies/newcompanyform";
$route['company/savecompany'] = "companies/saveCompany";
$route['productajax'] = "classified/productajax";
$route['product/(:any)'] = "classified/productdetail/$1";
$route['postad'] = "classified/postad";
$route['product/uploadproductimage'] = "classified/uploadProductImage";
$route['product/uploadproductimage2'] = "classified/uploadproductimage2";

$route['postproductdata'] = "classified/postProductData";

$route['product/zoom_item_image'] = "classified/zoom_item_image";



$route['happen'] = "front/happen";
$route['member/uploadhappenimage'] = "front/uploadHappenImage";
$route['addshout'] = "front/addshout";


$route['register'] = "front/register";
$route['registeruser'] = "front/registerUser";
$route['accountverify/(:any)'] = "front/user_verify/$1";
$route['profile'] = "front/profile";
$route['profile/(:any)'] = "front/professionalDetail/$1";
$route['education'] = "front/educationform";
$route['employer'] = "front/UpdateEmployementHistory";
$route['social-media'] = "front/socialmediaform";
$route['updatesocial'] = "front/updatesocial";

$route['change-password'] = "front/changepasswordform";
$route['updatepassword'] = "front/updatedpassword";
//$route['addcomment'] = "front/addcomment";



$route['dashboard'] = "front/dashboard";
$route['page/(:any)'] = "page/index/$1";
$route['swot'] = "page/swot";
$route['my-profile'] = "page/my_profile";
$route['edit-profile'] = "page/edit_profile";
$route['UpdateProfilePhoto'] = "page/UpdateProfilePhoto";
$route['find-job'] = "page/find_job";
//$route['blogs'] = "front/blogs";
//$route['blog/(:any)'] = "front/blogdetail/$1";
//$route['category/(:any)'] = "front/blogcategory/$1";

$route['load'] = "front/load";
$route['publish'] = "front/publish";
$route['contact'] = "front/contact";
$route['sendcontact'] = "front/sendContact";
$route['social-media'] = "page/social_media";
$route['social-group/(:any)'] = "page/SocialGroupDetail/$1";
$route['join-social-group/(:any)'] = "page/JoinSocialGroup/$1";

$route['logout'] = "front/logout";
$route['404_override'] = '';
/* End of file routes.php */
/* Location: ./application/config/routes.php */