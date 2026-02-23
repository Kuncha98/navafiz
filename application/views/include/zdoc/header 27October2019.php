
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