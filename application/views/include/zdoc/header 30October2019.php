
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
    top: 5px;
    right: auto;
    left: 22px;
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
                    <a href="<?=site_url('profile');?>">
                        <span class="align-middle text-dark px-2">
                            <?php if(isset($user_detail)){ ?>
                                <img class='header-pic' src="<?=site_url('assets/uploads/members/small_thumbs/'.$user_detail->m_avatar);?>">
                            <?php }else{?>
                                <i class="fas fa-user-tie"></i> 
                            <?php }?>
                            <?=$loggedin_name?></span>
                    </a>            
                    <br />
                    <a href="<?=site_url('user/logout');?>">
                        Logout
                    </a>

                    <!-- notification starts!!! -->
                    <div class="dropdown" style="padding: 13px">
                        <a href="#" onclick="updateNotification();"  role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                            <i class="fas fa-bell" style="font-size: 20px; float: left; color: black;margin-top: 0;">
                            </i>
                        </a>
                        <?php $notifications = getNotification();?>
                        <span class="badge badge-danger"><?= !empty($notifications) ? count($notifications) : 0;?></span>
                        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a href="<?= site_url('Notifications');?>" class="dropdown-menu-header">Notifications</a>
                            </li>
                            <ul class="timeline timeline-icons timeline-sm" style="margin:10px;width:95%;">
                             <?php 
                             
                             if(!empty($notifications)){
                              foreach($notifications as $notify)
                                {
                             ?>   
                                <li>
                                    <p>
                                         <a href="<?= site_url().$notify['noti_link'];?>"><?= $notify['noti_title'];?></a>
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

      function updateNotification(){
        
        $.ajax({
          type:'POST',
          url:"<?php echo site_url('notifications/updateNotification');?>",
          data:{read:'read'},
          
        });
       
      }
    </script>