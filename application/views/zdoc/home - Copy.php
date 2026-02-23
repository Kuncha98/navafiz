<?php $this->load->view('header.php'); ?>
<body>
<div id="fb-root"></div>
<div class="page">
  <?php /*?><div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div><?php */?>
  <?php $this->load->view('pagetop.php'); ?>
  
  
  
  <div class="clearfix"></div>
 
  <!--<section class="main-section parallex">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-12 col-md-offset-1 col-xs-12 nopadding">
          <div class="search-form-contaner">
            <h1 class="search-main-title"> 
                "You Can Have Everything in Life  You Want, If You Will Just Help Other People Get What They Want"
                <br> 
                Zig Ziglar
            </h1>
          
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <section class="slider-container">
            <div class="slider-grid-3">
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="A Mega Job Board">

                        <!-- MAIN IMAGE -->
                        <img src="<?=base_url()?>assets/frontend/images/slider/6.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                        <!-- LAYER NR. 1 -->

                        <div class="tp-caption tt-slider-title sft" data-x="20" data-y="140" data-speed="1000" data-start="500" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999">BULDING CAREER<span> LEADING TO SUCCESS</span> </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tt-slider-subtitle sft" data-x="20" data-y="240" data-speed="1000" data-start="700" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999">We take the sting out of building the perfect resume. </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tt-slider-small-text sft" data-x="20" data-y="310" data-speed="1000" data-start="900" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999">Etiam vel blandit dolor at vestibulum magna mauris faucibus consectetur
                            <br> ex ut faucibus. Aenean in feugiat quamorchestrate cooperative applications before out of the box content </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption sft" data-x="20" data-y="420" data-speed="1000" data-start="1100" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999"> <a href="#" class="tt-btn btn-default">View Jobs</a> </div>

                    </li>

                    <!-- SLIDE  -->
                    <li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Write a Resume">

                        <!-- MAIN IMAGE -->
                        <img src="images/slider/2.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                        <!-- LAYER NR. 1 -->

                        <div class="tp-caption tt-slider-title sft" data-x="20" data-y="140" data-speed="1000" data-start="500" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999">Jobs Opportunity<span> A mega Job Board</span> </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tt-slider-subtitle sft" data-x="20" data-y="240" data-speed="1000" data-start="700" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999">expertise you can trust </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tt-slider-small-text sft" data-x="20" data-y="310" data-speed="1000" data-start="900" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999">Etiam vel blandit dolor at vestibulum magna mauris faucibus consectetur
                            <br> ex ut faucibus. Aenean in feugiat quamorchestrate cooperative applications before out of the box content </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption sft" data-x="20" data-y="420" data-speed="1000" data-start="1100" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999"> <a href="#" class="tt-btn btn-default">Register Now</a> </div>
                    </li>
                </ul>
            </div>
        </section>
  <section class="cat-tabs cat-tab-index-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="cat-title">Browse Jobs</div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
              <div class="panel-heading"> 
                <!-- Tabs -->
                
                <ul class="nav panel-tabs">
                  <li> <a href="#tab1" data-toggle="tab"><i class="icofont icon-ribbon"></i><span class="hidden-xs hidden-sm">By Engineering </span></a> </li>
                  <li> <a href="#tab2" data-toggle="tab"><i class="icofont icon-layers"></i><span class="hidden-xs hidden-sm">By Finance & Accounts</span></a> </li>
                  <li class="active"> <a href="#tab3" data-toggle="tab"><i class="icofont icon-global"></i><span class="hidden-xs hidden-sm">By Sales & Marketing</span></a> </li>
               <!--   <li> <a href="#tab4" data-toggle="tab"><i class="icofont icon-linegraph"></i><span class="hidden-xs hidden-sm">By Management</span></a> </li>-->
                  <li> <a href="#tab5" data-toggle="tab"><i class="icofont icon-briefcase"></i><span class="hidden-xs hidden-sm">By Realestate</span></a> </li>
                </ul>
              </div>
            </div>
            <div class="panel-body">
              <div class="tab-content">
                <div class="tab-pane tab-pane animated fadeInUp" id="tab1" >
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <?php 
    $p=1;
    if($engjobs!='empty') {
	
    foreach(@$engjobs as $engjob){ 

            

		
?>
                    <div class="job-box">
                     
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$engjob->j_id?>">
                          <div class="job-title">
                            <?=$engjob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$engjob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$engjob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$engjob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                       <a href="<?=base_url()?>job/<?=$engjob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
                      </div>
                    </div>
                    <?php
									   }
	}
	   ?>
                  </div>
                </div>
                <div class="tab-pane animated fadeInDown" id="tab2">
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <?php 
    $p=1;
    if($finacjobs!='empty') {
	
    foreach(@$finacjobs as $finacjob){ 

            

		
?>
                    <div class="job-box">
                     
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$finacjob->j_id?>">
                          <div class="job-title">
                            <?=$finacjob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$finacjob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$finacjob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-remote-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$finacjob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                      <a href="<?=base_url()?>job/<?=$finacjob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
                      </div>
                    </div>
                    <?php
									   }
	}
	   ?>
                  </div>
                </div>
                <div class="tab-pane active animated fadeInLeft" id="tab3">
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <?php 
    $p=1;
    if($samajobs!='empty') {
	
    foreach(@$samajobs as $samajob){ 

            

		
?>
                    <div class="job-box">
                     
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$samajob->j_id?>">
                          <div class="job-title">
                            <?=$samajob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$samajob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$samajob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$samajob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <a href="<?=base_url()?>job/<?=$samajob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
                      </div>
                    </div>
                    <?php
									   }
	}
	   ?>
                  </div>
                </div>
                <?php /*?><div class="tab-pane animated fadeInRight" id="tab4">
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <?php 
    $p=1;
    if($managementjobs!='empty') {
	
    foreach(@$managementjobs as $managementjob){ 

            

		
?>
                    <div class="job-box">
                     
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$managementjob->j_id?>">
                          <div class="job-title">
                            <?=$managementjob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$managementjob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$managementjob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$managementjob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                         <a href="<?=base_url()?>job/<?=$managementjob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
                      </div>
                    </div>
                    <?php
									   }
	}
	   ?>
                  </div>
                </div><?php */?>
                <div class="tab-pane animated fadeInUp" id="tab5">
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <?php 
    $p=1;
    if($realjobs!='empty') {
	
    foreach(@$realjobs as $realjob){ 

            

		
?>
                    <div class="job-box">
                    
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$realjob->j_id?>">
                          <div class="job-title">
                            <?=$realjob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$realjob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$realjob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$realjob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <a href="<?=base_url()?>job/<?=$realjob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
                      </div>
                    </div>
                    <?php
									   }
	}
	   ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="facts">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-xs-6">
          <div class="fact-box">
            <div class="single-facts-area">
              <div class="facts-icon"> <i class="icon-megaphone"></i> </div>
              <span class="counter"><?=$totaljobs?></span>
              <h3>Jobs</h3>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xs-6">
          <div class="fact-box">
            <div class="single-facts-area">
              <div class="facts-icon"> <i class="icon-document"></i> </div>
              <span class="counter"><?=$totaljobs?></span>
              <h3> Resume </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xs-6">
          <div class="fact-box">
            <div class="single-facts-area">
              <div class="facts-icon"> <i class="icon-profile-male"></i> </div>
              <span class="counter"><?=$totalmembers?></span>
              <h3>Members</h3>
            </div>
          </div>
        </div>
     
      </div>
    </div>
  </section>
  <section class="featured-jobs">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="Heading-title black">
              <h1>Find Professionals</h1>
          
            </div>
          </div>
          <?php 
    $p=1;
    if($relatedprofiles!='empty') {
	
    foreach(@$relatedprofiles as $relatedprofile){ 

            

		
?>
          <div class="col-md-4 col-sm-6 col-xs-12"> 
          
          <a href="<?=base_url()?>professional/<?=$relatedprofile->m_id?>">
            <div class="company-list-box" style="height:130px;"> <span class="company-list-img">
              <?php
   if($relatedprofile->facebook_id !="")
   {
   ?>
             
             <img src="http://graph.facebook.com/<?=$relatedprofile->facebook_id?>/picture?type=large" class="img-responsive" alt=""> 
     <?
   }else{
	   ?>
            <img src="<?=base_url()?>assets/uploads/members/<?=($relatedprofile->m_avatar == "")?"default.png":$relatedprofile->m_avatar?>" class="img-responsive" alt="">
       <?
   }
	 ?>        
             </span>
              <div class="company-list-box-detail">
                <h5>
                  <?=$relatedprofile->m_name?>
                </h5>
                <p>
                  <?=substr($relatedprofile->m_profession,0,20)?>
                </p>
                <div class="ratings"> <?=$relatedprofile->m_city?></div>
                <!--<div class="ratings"> <i class="fa fa-star color"></i> <i class="fa fa-star color"></i> <i class="fa fa-star color"></i> <i class="fa fa-star-half-full color"></i> <i class="fa fa-star-o"></i><span class="badge"> 4.5</span> </div>-->
              </div>
            </div>
            </a> </div>
          <?php /*?><div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="featured-image-box">
                            <div class="img-box"><img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($relatedprofile->m_avatar == "")?"default.png":$relatedprofile->m_avatar?>" class="img-responsive center-block" alt=""></div>
                            <div class="content-area">
                                <div class="">
                                    <h4><a href="#"> <?=$relatedprofile->c_name?> </a></h4>
                                    <p> <?=$relatedprofile->m_name?> </p>
                                </div>
                                <div class="feature-post-meta"> <a href="#"> <i class="fa fa-clock-o"></i> 1 days ago</a> <a href="#" class="mata-detail part"><?=$relatedprofile->m_experience?> </a> </div>
                                <div class="feature-post-meta-bottom"> <span><?=$relatedprofile->m_city?><small>/ month</small></span> <a href="#" class="apply pull-right" > View Detail</a> </div>
                            </div>
                        </div>
                    </div><?php */?>
          <?php
									   }
	}
	   ?>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="load-more-btn">
              <a href="<?=base_url()?>professionals" class="btn-default"> View All <i class="fa fa-angle-right"></i> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /*?><div class="brand-logo-area clients-bg">
    <div class="clients-list">
      <div class="client-logo"> <a href="#"><img src="images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a> </div>
      <div class="client-logo"> <a href="#"><img src="images/clients/client_2.png" class="img-responsive"  alt="Brand Image" /></a> </div>
      <div class="client-logo"> <a href="#"><img src="images/clients/client_3.png" class="img-responsive"  alt="Brand Image" /></a> </div>
      <div class="client-logo"> <a href="#"><img src="images/clients/client_4.png" class="img-responsive"  alt="Brand Image" /></a> </div>
      <div class="client-logo"> <a href="#"><img src="images/clients/client_1.png" class="img-responsive"  alt="Brand Image" /></a> </div>
      <div class="client-logo"> <a href="#"><img src="images/clients/client_2.png" class="img-responsive"  alt="Brand Image" /></a> </div>
      <div class="client-logo"> <a href="#"><img src="images/clients/client_3.png" class="img-responsive"  alt="Brand Image" /></a> </div>
      <div class="client-logo"> <a href="#"><img src="images/clients/client_4.png" class="img-responsive"  alt="Brand Image" /></a> </div>
    </div>
  </div><?php */?>
  
    <?php $this->load->view('footer.php'); ?>
  
  
  
  
        
        
        
        
        
  
  <?php $this->load->view('footerbottom.php'); ?>
    <script type="text/javascript">
            /* ======= Revolution slider  Home Page Cleaning ======= */
            if ($('.slider-grid-3').length > 0) {
                jQuery(".slider-grid-3").revolution({
                    delay: 9000,
                    startwidth: 1170,
                    startheight: 620,
                    onHoverStop: "off",
                    hideThumbs: 1,
                    hideTimerBar: "on",
                    navigationType: "none",
                    navigationStyle: "preview3",
                    fullWidth: "on",
                    dottedOverlay: "custom",
                    fullScreen: "off",
                    fullScreenOffsetContainer: ""
                });
            }
        </script> 
  <script>
function statusChangeCallback(response) {
    if (response.status === 'connected') {
	      loginFacebookAPI();
    } else if (response.status === 'not_authorized') {
     
    } else {
     
     
    }
  }
function checkLoginState() {
	
	 FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

 window.fbAsyncInit = function() {
  FB.init({
    appId      : '125784917765132',
    cookie     : true,  
    xfbml      : true,  
    version    : 'v2.4' 
  });
  };
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function loginFacebookAPI() {
    FB.api('/me', {fields: 'name,email'},function(response) {
	
		   var postForm = {
              facebookid: response.id, 
			  email: response.email, 
        	  name: response.name
        };
       $.ajax({
            type      : 'POST', 
            url       : 'fbuserlogin', 
            data      : postForm,
              success   : function(data) {
                        if (data == 1) {
                            window.location.href = "/";
                            }
                            else if (data == 0) {
                            window.location.href = "/";
                            }	
                        }
            });
    });
  }
  

</script>

</div>
</body>
</html>