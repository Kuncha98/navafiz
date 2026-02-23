<?php
$user_id = $this->session->userdata('user_id');
  if(empty($user_id)){
    $data = checkCookie();
    if(!empty($data)){
      if($data == $user_id){
        redirect(base_url('profile/'.intval($data)));
      }
    }
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
    <!-- <meta property="fb:app_id" content="125784917765132"/> -->

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
    <link rel="stylesheet" type="text/css" href="<?=site_url('nassets');?>/css/custom-style.css?v=2">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=site_url('nassets');?>/css/responsive.css?v2">
    
    
    <script src="<?=site_url('nassets');?>/js/js.js"></script>
    <script src="<?=site_url('nassets');?>/js/cdnjs.js"></script>
    <script src="<?=site_url('nassets');?>/js/bs4.js"></script>
    <script src="<?=site_url('nassets');?>/lib/wow/wow.min.js"></script>
    <!-- /AOS -->
    <?php $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?> 
    <?php $loggedin_name = $this->session->userdata('name') =='' ? 0: $this->session->userdata('name');?>
    <?php $loggedin_email = $this->session->userdata('email') =='' ? 0: $this->session->userdata('email');?>
    <?php $loggedin_avatar = $this->session->userdata('avatar') =='' ? 0: $this->session->userdata('avatar');?>

    <style type="text/css">
        /*notification*/
        /* -----------------------------------------
   Timeline
----------------------------------------- */
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
    </style> 
</head>
<body class="bg_gradient">
    <div class="container-mid">
        <nav class="navbar navbar-expand-md bg-light navbar-dark box-shadow px-4" style="margin-bottom: 40px;">
            <a class="navbar-brand text-dark wow fadeInDown" href="<?=site_url();?>" >
                <img src="<?=site_url('nassets');?>/img/logo.png" alt="Navafiz" >
            </a>
            <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color: #164885!important;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
                <ul class="navbar-nav">                    
                </ul>
                <div class="d-inline-block float-right">
                    <?php if($user_id>0){?>
                    <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="<?=site_url('profile');?>" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if(isset($loggedin_avatar) & !empty($loggedin_avatar)){ ?>
                              <img class='header-pic' src="<?=site_url('assets/uploads/members/small_thumbs/'.$loggedin_avatar);?>">
                          <?php }else{?>
                              <span class="fas fa-user-tie" style="font-size: 40px;"></span>
                          <?php }?> 
                        <strong><?=$loggedin_name?></strong>
                        <!-- <span class="fas fa-caret-down"></span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                          <?php if(isset($loggedin_avatar) & !empty($loggedin_avatar)){ ?>
                                            <img style="max-width: 75px;" src="<?=site_url('assets/uploads/members/small_thumbs/'.$loggedin_avatar);?>">
                                        <?php }else{?>
                                            <span class="fas fa-user-tie icon-size"></span>
                                        <?php }?>
                                            
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left">
                                            <a style="padding: 0;" href="<?= site_url('profile')?>/<?= $user_id;?>">
                                                <strong><?=$loggedin_name?></strong>
                                            </a>
                                        </p>
                                        <p class="text-left small"><?= $loggedin_email?></p>
                                        <p class="text-left">
                                            <a style="padding: 0;" class="btn btn-primary" href="<?= site_url('profile')?>/<?= $user_id;?>">
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
        </ul>
          

                    <!-- notification starts!!! -->
                    <!-- onclick="updateNotification();" -->
                    <div class="dropdown notification_dropdown" >

                        <a href="#"   role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                            <i class="fas fa-bell" style="font-size: 20px; float: left; color: black;margin-top: 20px;">
                            </i>
                        </a>
                        <?php 
                        $notifications = getNotification();?>
                        <span class="badge badge-danger"><?= !empty($notifications) ? count($notifications) : 0;?></span>
                        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a href="<?= site_url('notifications');?>" class="dropdown-menu-header">Notifications</a>
                            </li>
                            <ul class="timeline timeline-icons timeline-sm" style="margin:10px;width:95%;">
                             <?php 
                             
                             if(!empty($notifications)){
                              foreach($notifications as $notify)
                                {
                             ?>   
                                <li>
                                    <p>
                                        <?= $notify['noti_title'];?>
                                        <br />
                                         <!--<a href="<?= site_url().$notify['noti_link'];?>"><?= $notify['noti_title'];?></a>-->
                                        <span class="timeline-date"><?= Date('D m, h:i', strtotime($notify['added_on']));?></span>
                                    </p>
                                </li>
                              <?php 
                                }
                                  }
                                  else{
                              ?>
                              <h6>No Notification found.</h6>
                              <?php } ?>
                        </ul>
                            
                        </ul>
                        
                    </div>
                    <!-- Notification ends -->


                    <!--WhatsHappening Notification Type starts!!! -->
                    <!-- onclick="updateNotification();" -->
                    <div class="dropdown notification_dropdown" style=" left: 30px;">
                        <a href="#"   role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                            <i class="fas fa-bell" style="font-size: 20px; float: left; color: black;margin-top: 20px;">
                            </i>
                        </a>
                        <?php 
                        $notifications = getNotificationByType('whatshappening');?>
                        <span class="badge badge-danger" style="left:28px;"><?= !empty($notifications) ? count($notifications) : 0;?></span>
                        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a href="<?= site_url('notifications/notificationtype/whatshappening');?>" class="dropdown-menu-header">Notifications</a>
                            </li>
                            <ul class="timeline timeline-icons timeline-sm" style="margin:10px;width:95%;">
                             <?php 
                             
                             if(!empty($notifications)){
                              foreach($notifications as $notify)
                                {
                             ?>   
                                <li>
                                    <p>
                                        <?= $notify['noti_title'];?>
                                        <br />
                                         <!--<a href="<?= site_url().$notify['noti_link'];?>"><?= $notify['noti_title'];?></a>-->
                                        <span class="timeline-date"><?= Date('D m, h:i', strtotime($notify['added_on']));?></span>
                                    </p>
                                </li>
                              <?php 
                                }
                                  }
                                  else{
                              ?>
                              <h6>No Notification found.</h6>
                              <?php } ?>
                        </ul>
                            
                        </ul>
                        
                    </div>
                    <!--WhatsHappening Notification Type ends!!! -->

                    <!-- Job Notification Start -->
                    <div class="dropdown notification_dropdown" style=" left: 56px;">
                        <a href="#"   role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                            <i class="fas fa-bell" style="font-size: 20px; float: left; color: black;margin-top: 20px;">
                            </i>
                        </a>
                        <?php 
                        $notifications = getNotificationByType('job');?>
                        <span class="badge badge-danger" style="left:46px;"><?= !empty($notifications) ? count($notifications) : 0;?></span>
                        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a href="<?= site_url('notifications/notificationtype/job');?>" class="dropdown-menu-header">Notifications</a>
                            </li>
                            <ul class="timeline timeline-icons timeline-sm" style="margin:10px;width:95%;">
                             <?php 
                             
                             if(!empty($notifications)){
                              foreach($notifications as $notify)
                                {
                             ?>   
                                <li>
                                    <p>
                                        <?= $notify['noti_title'];?>
                                        <br />
                                         <!--<a href="<?= site_url().$notify['noti_link'];?>"><?= $notify['noti_title'];?></a>-->
                                        <span class="timeline-date"><?= Date('D m, h:i', strtotime($notify['added_on']));?></span>
                                    </p>
                                </li>
                              <?php 
                                }
                                  }
                                  else{
                              ?>
                              <h6>No Notification found.</h6>
                              <?php } ?>
                        </ul>
                            
                        </ul>


                        
                    </div>
                    <!-- Job Notification End -->

                    <!-- Message Icon -->
                    <div>
                      <a href="<?php echo site_url('track_steps/sheet/'.$user_id);?>"><i class="fas fa-envelope" style="font-size: 20px; float:right; color: black;margin-top: 20px;margin-right: 28px;"></i></a>
                    </div>
                    <!-- Message Icon ends -->
                    <?php }else{?>                    
                    <a href="<?=site_url();?>">
                        Home
                    </a>          
                    <br />
                    <a href="<?=site_url('user/login');?>">
                        Login
                    </a>            
                    <?php }?>
       
                    
                </div>
            </div>
        </nav>
    </div>




    <script type="text/javascript">

      // function updateNotification(){
        
      //   $.ajax({
      //     type:'POST',
      //     url:"<?php echo site_url('Notifications/updateNotification');?>",
      //     data:{read:'read'},
          
      //   });
       
      // }
    </script>