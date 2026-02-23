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
$route['deleducation/(:any)'] = "front/delEducation/$1";

$route['membercv'] = "profile/UploadUserResume";
$route['member/uploadcv'] = "profile/DoUploadCv";
$route['summary-career'] = "front/summary_career";
$route['AddMemberSummaryPoints'] = "front/AddMemberSummaryPoints";

$route['reference'] = "front/referenceform";
$route['updateReference'] = "front/updateReference";


$route['member/uploadmemberimage'] = "front/uploadMemberImage";
$route['member/nintydaycron'] = "front/nintyDayCron";

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


$route['cvsajax'] = "front/cvsajax";
$route['job/report-abuse/(:any)'] = "job/reportAbuseForm/$1";
$route['job/sendabusereport'] = "job/sendAbuseReport";




//==========CV Review==========================
$route['cvreview'] = "cvreview";
$route['SubmitCvReview'] = "cvreview/SubmitCvReview";
$route['PostCvReview'] = "cvreview/postCvReview";
$route['cvreviews-list'] = "cvreview/CvReviewsList";
$route['UpdateCvReview/(:any)'] = "cvreview/UpdateCvReview/$1";
$route['cvreport/(:any)'] = "cvreview/UpdateCvReview/$1";
$route['mycvreport'] = "cvreview/CvreviewReport/";


$route['review/(:any)'] = "front/reviewdetail/$1";



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


$route['whats-happening'] = "whatshappening/index";
$route['post-whats-happening'] = "whatshappening/addshout";


$route['register'] = "front/register";
$route['registeruser'] = "front/registerUser";
$route['accountverify/(:any)'] = "front/user_verify/$1";

$route['education'] = "front/educationform";

//Profile 
$route['employment-history'] = "profile/EmploymentHistory";
$route['employment-history/(:any)'] = "profile/EmploymentHistory/$1";
$route['UpdateEmploymentHistory'] = "profile/UpdateEmploymentHistory";
$route['delete-employment-history/(:any)'] = "profile/DelEmpHistory/$1";
$route['edit-profile'] = "page/edit_profile";
$route['UpdateProfilePhoto'] = "page/UpdateProfilePhoto";
$route['my-profile'] = "page/my_profile";

$route['download/(:any)'] = "profile/downloadcv/$1";
$route['profile/(:any)'] = "front/professionalDetail/$1";
$route['UpdateProfile'] = "profile/UpdateProfile";


$route['change-password'] = "front/changepasswordform";
$route['updatepassword'] = "front/updatedpassword";
//$route['addcomment'] = "front/addcomment";



$route['dashboard'] = "front/dashboard";
$route['page/(:any)'] = "page/index/$1";
$route['swot'] = "page/swot";


$route['find-job'] = "page/find_job";
$route['job-seeker-support-sysetm'] = "page/Job_Seeker_Support_System";




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
$route['7-days-plan'] = 'page/seven_days_plan';


/* End of file routes.php */
/* Location: ./application/config/routes.php */