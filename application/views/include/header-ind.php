<?php
$user_id = $this->session->userdata('user_id');
$session_user_id = $user_id;
  if(empty($user_id)){
    $data = checkCookie();
    if(!empty($data)){
      if($data == $user_id){
        redirect(base_url('profile/'.intval($data)));
      }
    }
  }
  if($session_user_id>0){
      BlockUserCheck($session_user_id);
  }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jobs in UAE: Jobs in Abu Dhabi, Ajman, Fujairah, Sharjah, Dubai, Ras al-Khaimah, Umm al-Qaiwain</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Navafiz">
    <meta name="description" content="Navafiz is a Volunteer’s Platform Based in UAE to bridge the gap between Job seekers and Job providers, by providing information and Networking. We are working in the UAE since early 2013.">
    
    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="2070991516541186" />
    <?php if(isset($page_meta['title']) && !empty($page_meta)){?>
        <meta property="og:url" content="<?=site_url($page_meta['og_url']);?>" />
        <meta property="og:image" content="<?=site_url($page_meta['og_img']);?>" /> 
        <meta property="og:title" content="<?=$page_meta['title'];?>" /> 
        <meta property="og:description" content="<?=$page_meta['description'];?>" />
    
        <meta name="twitter:card" content="<?=site_url($page_meta['og_img']);?>">
        <meta name="twitter:title" content="<?=$page_meta['title'];?>">
        <meta name="twitter:description" content="<?=$page_meta['description'];?>">
        <meta name="twitter:image" content="<?=site_url($page_meta['og_img']);?>">
    <?php }else{?>
        <meta property="og:url" content="<?=site_url();?>" />
        <meta property="og:image" content="<?=base_url('nassets/img/logo.png')?>" /> 
        <meta property="og:title" content="Navafiz Job Portal Job " /> 
        <meta property="og:description" content="Navafiz is a Volunteer’s Platform Based in UAE to bridge the gap between Job seekers and Job providers, by providing information and Networking. We are working in the UAE since early 2013." />
    
        <meta name="twitter:card" content="<?=base_url('nassets/img/logo.png')?>">
        <meta name="twitter:title" content="Navafiz Job Portal Job ">
        <meta name="twitter:description" content="Navafiz is a Volunteer’s Platform Based in UAE to bridge the gap between Job seekers and Job providers, by providing information and Networking. We are working in the UAE since early 2013.">
        <meta name="twitter:image" content="<?=base_url('nassets/img/logo.png')?>">
        <!-- https://navafiz.com/nassets/img/logo.png -->
    <?php }?>
    <link href="<?=site_url('nassets');?>/lib/animate/animate.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?=site_url('nassets');?>/css/bs4.css">
    <link rel="stylesheet" type="text/css" href="<?=site_url('nassets'); ?>/css/custom-style1.css?v=<?=time(); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=site_url('nassets');?>/css/responsive.css">
    
    
    
    
    <!-- /FancyBOx -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    
    <!-- /AOS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    
    <?php $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?> 
    <?php $loggedin_name = $this->session->userdata('name') =='' ? 0: $this->session->userdata('name');?>
    <?php $loggedin_email = $this->session->userdata('email') =='' ? 0: $this->session->userdata('email');?>
    <?php $loggedin_avatar = $this->session->userdata('avatar') =='' ? 0: $this->session->userdata('avatar');?>
    
    <script src="<?=site_url('nassets');?>/js/js.js"></script>
    <script src="<?=site_url('nassets');?>/js/cdnjs.js"></script>
    <script src="<?=site_url('nassets');?>/js/bs4.js"></script>
    <script src="<?=site_url('nassets');?>/lib/wow/wow.min.js"></script>
    <style type="text/css">
        /*notification*/
        /* ----------------------------------------- Timeline ----------------------------------------- */
        .timeline {
          list-style: none;
          padding-left: 0;
          position: relative;
        }

        .timeline.timeline-sm:after {
          left: 12px;
        }
        .timeline li {
          position: relative;
          /*padding-left: 70px;*/
          margin-bottom: 20px;
        }
        .timeline li .timeline-date {
          display: inline-block;
          width: 100%;
          color: #a6a6a6;
          font-style: italic;
          font-size: 13px;
        }
        .timeline.timeline-advanced li {
          padding-top: 0;
        }
        .timeline.timeline-advanced li:after {
          background: #fff;
          border: 1px solid #29b6d8;
        }
        .timeline.timeline-advanced li:before {
          content: "";
          width: 52px;
          height: 52px;
          border: 10px solid #fff;
          position: absolute;
          left: 4px;
          top: -10px;
          border-radius: 50%;
          z-index: 12;
        }
        .timeline.timeline-advanced li .timeline-icon {
          color: #29b6d8;
        }
        .timeline.timeline-advanced li .timeline-date {
          width: 75px;
          position: absolute;
          right: 5px;
          top: 3px;
          text-align: right;
        }
        .timeline.timeline-advanced li .timeline-title {
          font-size: 17px;
          margin-bottom: 0;
          padding-top: 5px;
          font-weight: bold;
        }
        .timeline.timeline-advanced li .timeline-subtitle {
          display: inline-block;
          width: 100%;
          color: #a6a6a6;
        }
        .timeline.timeline-advanced li .timeline-content {
          margin-top: 10px;
          margin-bottom: 10px;
          padding-right: 70px;
        }
        .timeline.timeline-advanced li .timeline-content p {
          margin-bottom: 3px;
        }
        .timeline.timeline-advanced li .timeline-content .divider-dashed {
          padding-top: 0px;
          margin-bottom: 7px;
          width: 200px;
        }
        .timeline.timeline-advanced li .timeline-user {
          display: inline-block;
          width: 100%;
          margin-bottom: 10px;
        }
        .timeline.timeline-advanced li .timeline-user:before,
        .timeline.timeline-advanced li .timeline-user:after {
          content: " ";
          display: table;
        }
        .timeline.timeline-advanced li .timeline-user:after {
          clear: both;
        }
        .timeline.timeline-advanced li .timeline-user .timeline-avatar {
          border-radius: 50%;
          width: 32px;
          height: 32px;
          float: left;
          margin-right: 10px;
        }
        .timeline.timeline-advanced li .timeline-user .timeline-user-name {
          font-weight: bold;
          margin-bottom: 0;
        }
        .timeline.timeline-advanced li .timeline-user .timeline-user-subtitle {
          color: #a6a6a6;
          margin-top: -4px;
          margin-bottom: 0;
        }
        .timeline.timeline-advanced li .timeline-link {
          margin-left: 5px;
          display: inline-block;
        }
        .timeline-load-more-btn {
          margin-left: 70px;
        }
        .timeline-load-more-btn i {
          margin-right: 5px;
        }
        /* -----------------------------------------
           Dropdown
        ----------------------------------------- */
         .dropdown-menu{
            padding:0 0 0 0;
            margin: 1rem 0 0;
            right: 15px;
            left: auto;
            min-width: 17rem;
        }


        .notification_dropdown .dropdown-menu{
            padding:0 0 0 0;
            margin: 3.5rem 0 0;
            right: 15px;
            left: auto;
            min-width: 17rem;
            height: 240px;
            overflow: auto;
        }

        /*.notificationtype_dropdown .dropdown-menu{
            padding:0 0 0 0;
            margin: 1rem 0 0;
            right: 15px;
            left: auto;
            min-width: 17rem;
            height: 240px;
            overflow: auto;
        }*/
        a.dropdown-menu-header {
            background: #f7f9fe;
            font-weight: bold;
            border-bottom: 1px solid #e3e3e3;
        }
        .dropdown-menu > li a {
            padding: 0px 89px 10px 89px;
        }

        /* -----------------------------------------
           Badge
        ----------------------------------------- */

        .badge{
            padding: 3px 5px 2px;
            position: absolute;
            top: 15px;
            right: auto;
            left: 10px;
            display: inline-block;
            min-width: 10px;
            font-size: 12px;
            font-weight: bold;
            color: #ffffff;
            line-height: 1;
            vertical-align: baseline;
            white-space: nowrap;
            text-align: center;
            border-radius: 10px;
        }
        .badge-danger {
            background-color: #db5565;
        }
         .navbar-login
        {
            width: 305px;
            padding: 10px;
            padding-bottom: 0px;
        }

        .navbar-login-session
        {
            padding: 10px;
            padding-bottom: 0px;
            padding-top: 0px;
        }

        .icon-size
        {
            font-size: 87px;
            margin-top: 0;
        }
        .headernav .profile_img{
            border-radius: 50% !important;
            border: 1px solid #215374;
            display: block;
            width: 90px;
            height: 100px;
            background-size: cover;
            margin: 17px auto 20px 2px;
        }
        .headernav li{
                        
        }
        .headernav li.box{
            width: 80px;
            border: solid 1px #ccc;
            border-radius: 12px;
            padding: 0px 0px 14px 28px;
            margin: 0 8px 8px 0 !important;
        }
        .headernav li.pro{
            width: auto;
            padding: 12px;
            line-height: 50px;   
        }
        .headernav li.pro ul li{
            line-height: 25px;
        }
        .mobleftnav{
            background-color: #164885!important;margin: 0 20px 0 -20px;padding: 10px;border: none;border-radius: 6px;
        }
        .mobrightnav{
            
        }
        .headernav li.box a i{
            font-size: 20px;
        }
        .headernav a li.box  i{
            font-size: 20px;
        }
        @media (max-width: 480px) {
            .mobleftnav{
                margin: 0 20px 0 -16px;
            }
            .navbar-brand img{
                max-width: 250px;
            }
            .mobrightnav{
                                
                background-color: #red!important;                
            }
            .headcontainer{
                margin: 0;
                padding: 0;
            }
            .headernav{
                width: 100%;                
            }
            .headernav .profile_img{
                border-radius: 12px !important;
            }
            .headernav li.box{
                width: 100%;
                padding: 0;
            }
            .headernav li.box a i{
                margin: 0 !important;
            }
            .headernav li.box a span{
                display: inline-block !important;
                margin: 0px 0 0 15px;
            }
            .headernav li.box a{
                color: #215374;                
                display: block;
                width: 100%;    
                font-weight: bold;
                padding: 10px;
            }
        }
    </style>
    <script>
    var base_url = "<?php echo base_url(); ?>";
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script> 
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PLWY694W29"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-PLWY694W29');
    </script>   
</head>
<body class="bg_gradient">
<div class="container-mid headcontainer">    
    <nav class="navbar navbar-expand-md bg-light navbar-dark box-shadow px-4">
        <?php if($user_id>0){?>
        <button class="sidebarmenu bg-dark mobleftnav" type="button"style="">
            <span class="navbar-toggler-icon"></span>
        </button>        
        <?php }?>        
        <a class="navbar-brand" href="<?=site_url('feed');?>">
            <img src="<?=site_url('nassets');?>/img/logo.png?v=1" alt="Navafiz">
        </a>
        <?php $this->load->view('include/mobile-menu');?>
        <button class="navbar-toggler bg-dark mobrightnav" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color: #164885!important;margin:0 -8px 0 0;padding: 10px;font-size: 16px;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <div style="width: 100%;">                    
                <ul class="nav navbar-nav navbar-right headernav" style="float: right;">
                    <?php if($user_id>0){?>
                    <li class="box d-block d-sm-none">                        
                        <div class="profile_img" style="background-image: url('<?=profile_picture($session_user_id);?>');width: 50px;height: 50px;float: left;margin: 0 10px 0 0;">
                            <!--Profile Picture-->
                        </div>                                                    
                        <a href="<?= site_url('profile')?>/<?= $user_id;?>" class="dropdown-toggle" data-toggle="dropdown" style="color: #215374;"><strong><?=$loggedin_name?></strong></a>
                    </li>
                    <?php }?>
                    <a href="<?php echo site_url();?>">
                        <li class="box" data-toggle="tooltip" data-placement="top" title="Home Page"> 
                            <i class="fas fa-home fasNav"></i>   
                            <span class="d-block d-sm-none">Home</span>                        
                        </li>
                    </a>
                    <a href="<?php echo site_url('find-job');?>">
                        <li class="box" data-toggle="tooltip" data-placement="top" title="Verified Jobs">  
                            <i class="fas fa-briefcase fasNav"></i>                                                            
                            <span class="d-block d-sm-none">Verified Jobs</span>
                            <span></span>                        
                        </li>
                    </a>
                    <a href="<?php echo site_url('professionals');?>">
                        <li class="box" data-toggle="tooltip" data-placement="top" title="Professionals">
                            <i class="fas fa-users fasNav"></i>
                            <span class="d-block d-sm-none">Professionals</span>                        
                        </li>                                                                    
                    </a>
                    <?php if($user_id>0){?>
                    <a href="<?php echo site_url('track_steps/sheet/'.$user_id);?>" >
                        <li class="box" data-toggle="tooltip" data-placement="top" title="Tracking Sheet">
                            <i class="fas fa-file-alt fasNav"></i>
                            <span class="d-block d-sm-none">Tracking Sheet</span>                        
                        </li>
                    </a>
                    <a href="<?php echo site_url('messages/'.$user_id);?>"  >
                        <li class="box" data-toggle="tooltip" data-placement="top" title="Messages">
                            <div class="dropdown notification_dropdown">
                                    <i class="fas fa-envelope fasNav"></i>
                                    <span class="d-block d-sm-none">Messages</span>
                                <?php $public_notifications = TMessagesCountByUser($session_user_id); ?>
                                <?php if($public_notifications > 0){?>
                                <span class="badge badge-danger"><?=$public_notifications?></span>
                                <?php }?>                            
                            </div>
                        </li>
                    </a>
                    <a href="<?= site_url('notifications/usernotifications/');?>" aria-expanded="true" >
                    <li class="box" data-toggle="tooltip" data-placement="top" title="Notifications">
                        <!--WhatsHappening Notification Type starts!!! -->
                        <div class="dropdown notification_dropdown">                            
                                <i class="fas fa-bell fasNav"></i>
                                <span class="d-block d-sm-none">Activity Log</span>                            
                            <?php $public_notifications = NotificationCountByUser($session_user_id); ?>
                            <?php if($public_notifications > 0){?>
                            <span class="badge badge-danger"><?=$public_notifications?></span>
                            <?php }?>                            
                        </div>
                        <!--WhatsHappening Notification Type ends!!! --> 
                    </li>  
                    </a>
                    <li class="box d-block d-sm-none">
                        <a href="<?=site_url('user/logout');?>" data-toggle="tooltip" data-placement="top" title="LogOut">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="d-block d-sm-none">Logout</span>
                        </a>
                    </li>
                    <li class="dropdown box pro d-none d-sm-block">
                        <div class="profile_img" style="background-image: url('<?=profile_picture($session_user_id);?>');width: 50px;height: 50px;float: left;margin: 0 10px 0 0;">
                            <!--Profile Picture-->
                        </div>                                                    
                        <a href="<?=site_url('profile');?>" class="dropdown-toggle" data-toggle="dropdown" style="color: #215374;"><strong><?=$loggedin_name?></strong></a>                        

                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-center">
                                                <div class="profile_img" style="background-image: url('<?=profile_picture($session_user_id);?>');">
                                                    <!--Profile Picture-->
                                                </div>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left">
                                                <a style="padding: 0;" href="<?= site_url('profile')?>/<?= $user_id;?>">
                                                    <strong><?=$loggedin_name?></strong>
                                                </a>
                                            </p>                                                
                                            <p class="text-left">
                                                <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                                                <a style="padding: 3px;margin:  0 0 6px 0" class="btn btn-outline-secondary col-12" href="<?=site_url('profile/status');?>" >Change Status</a> <br />
                                                <a style="padding: 3px;margin:  0 0 6px 0" href="<?=site_url('mentors/activity');?>" target="_blank" class="btn btn-outline-secondary col-12">Mentors Activity</a><br />
                                                     <a style="padding: 3px;margin:  0 0 6px 0" href="<?=site_url('blueuser/adduser');?>" target="_blank" class="btn btn-outline-secondary col-12">Add Blue User</a><br />
                                                     <a style="padding: 3px;margin:  0 0 6px 0" href="<?=site_url('blueuser/listusers');?>" target="_blank" class="btn btn-outline-secondary col-12">View List of Blue User</a><br />
                                                     <a style="padding: 3px;margin:  0 0 6px 0" href="<?=site_url('mentors/quick_job_applicants');?>" target="_blank" class="btn btn-outline-secondary col-12">Easy Jobs Candidates</a><br />
                                                     <a style="padding: 3px;margin:  0 0 6px 0" href="<?=site_url('recruitment_projects/');?>" target="_blank" class="btn btn-outline-secondary col-12">Recruitment Project Contacts</a><br />
                                                     <a style="padding: 3px;margin:  0 0 6px 0" class="btn btn-outline-secondary col-12" href="<?=site_url('edit-profile');?>">Edit Profile</a> <br />
                                                    <a style="padding: 3px;margin:  0 0 6px 0" class="btn btn-outline-secondary col-12" href="<?=site_url('profile/AddCV');?>">Upload Resume</a> <br />
                                                    <a style="padding: 3px;margin:  0 0 6px 0" class="btn btn-outline-secondary col-12" href="<?=site_url('edit-profile');?>">Edit Profile</a> <br />
                                                <?php } ?>
                                                <a style="padding: 3px;" class="btn btn-outline-secondary col-12" href="<?= site_url('profile')?>/<?= $user_id;?>">
                                                    &nbsp; View Profile &nbsp; 
                                                </a>
                                            </p>
                                           <!--  <p class="text-left">
                                                <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                            </p> -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <a href="<?=site_url('user/logout');?>" class="btn btn-danger btn-block">Logout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php }else{?>                    
                    <li class="box" style="padding: 10px;text-align: center;">
                        <a href="<?=site_url('user/login?return_url='.current_url());?>" style="color: #164885" data-toggle="tooltip" data-placement="top" title="" data-original-title="Signin into Navafiz">
                            <i class="fas fa-sign-in fasNav" aria-hidden="true"></i>
                            <b>Login</b>                                
                        </a>            
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>        
        
    </nav>
    <div style="margin-bottom: 40px;">
        <?php if($session_user_id>0){?>
        <?php $user_profile = BasicInfoUser($session_user_id);?>
        <?php if(empty($user_profile->username)){?>
        <!-- <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                <li>You've not Setup your Username, Setup your username its really important for your profile branding! <a href="<?=site_url('profile/username');?>">Click here to setup</a></li>
            </ul>
        </div> -->
        <?php }?>
        <?php if(empty($user_profile->member_cv)){?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                <li>You have not Uploaded your Resume <a href="<?=site_url('profile/AddCV');?>">Click here to upload</a></li>
            </ul>
        </div>
        <?php }?>
        <?php }?>
    </div>    
    
</div>

