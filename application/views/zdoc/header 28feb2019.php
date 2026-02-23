<!DOCTYPE html>
<html lang="en">
<head>
<!--<meta charset="utf-8">-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Navafiz">
<meta name="description" content="Navafiz is one of the best free job portal in UAE. Find best Jobs in UAE and all over the world, jobs listings and job opportunities on Navafiz.">
<title>Jobs in UAE: Jobs in Abu Dhabi, Ajman, Fujairah, Sharjah, Dubai, Ras al-Khaimah, Umm al-Qaiwain</title>
<meta property="fb:app_id" content="125784917765132"/>
<?php
    if(isset($pagename)){ $pgname = $pagename;  }else{ $pgname = "";}
    if($pgname=="job_detail"){
    $desc_share = strip_tags(substr($job->j_descr,0,300));
    ?>    
    <meta property="og:url"           content="<?php echo base_url('job/'.$job->j_id);?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?=$job->j_title?>" />
    <meta property="og:description"   content="<?php echo $desc_share;?>" />
    <meta property="og:image"         content="<?=base_url()?>assets/uploads/jobs/<?=$job->j_image;?>" />
    <?php } else if($pgname=="blog_detail"){
    $desc_share = strip_tags(substr($blog->blog_description,0,300));
    ?>
    <meta property="og:url"           content="<?php echo base_url('blog/'.$blog->blog_id);?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?=$blog->blog_title?>" />
    <meta property="og:description"   content="<?php echo $desc_share;?>" />
    <meta property="og:image"         content="<?=base_url()?>assets/uploads/blogs/<?=$blog->blog_image?>" />
    <?php }else{?>
    <meta property="og:url"           content="<?=base_url()?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Navafiz Job Portal Job " />
    <meta property="og:description"   content="Navafiz is a Volunteer’s Platform Based in UAE to bridge the gap between Job seekers and Job providers, by providing information and Networking. We are working in the UAE since early 2013." />
    <meta property="og:image"         content="<?=base_url('public-assets/images/navafiz.jpg')?>" />
    <?php }?>
<!-- Favicons Icon -->
<link rel="icon" href="<?=base_url()?>assets/frontend/images/favicon.ico" type="image/x-icon">

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- BOOTSTRAPE STYLESHEET CSS FILES -->
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/bootstrap.min.css">

<!-- JQUERY SELECT CSS -->
<link href="<?=base_url()?>assets/frontend/css/select2.min.css" rel="stylesheet" />

<!-- JQUERY MENU CSS -->
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/mega_menu.min.css">

<!-- ANIMATION -->
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/animate.min.css">

<!-- OWl  CAROUSEL-->
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/owl.carousel.css">
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/owl.style.css">

<!--  REVOLUTION STYLE SETTING -->
<link href="<?=base_url()?>assets/frontend/js/revolution/css/settings.css" rel="stylesheet" type="text/css" />

<!-- TEMPLATE CORE CSS -->
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/style.css">


<!-- FONT AWESOME -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/frontend/css/font-awesome.min.css">

<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/et-line-fonts.css" type="text/css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/frontend/js/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<!-- JavaScripts -->
<script src="<?=base_url()?>assets/frontend/js/modernizr.js"></script>

<!-- JAVASCRIPT JS  -->
<script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery-3.1.1.min.js')?>"></script>


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102512560-1', 'auto');
  ga('send', 'pageview');

</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7617324068769111",
    enable_page_level_ads: true
  });
</script>
</head>
