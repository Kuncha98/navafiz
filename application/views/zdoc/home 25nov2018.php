<?php $this->load->view('header.php'); ?>

<body>
    <div class="page">
        
         <?php $this->load->view('pagetop.php'); ?>
        <div class="clearfix"></div>
        

        <!-- ---- HOME SLIDER ----- -->
        <section class="slider-container">
            <div class="slider-grid-3">
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="A Navafiz Job Board">

                        <!-- MAIN IMAGE -->
                        <img src="<?=base_url()?>assets/frontend/images/slider/5.jpg" alt="Jobs in UAE" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                        <!-- LAYER NR. 1 -->

                        <div class="tp-caption tt-slider-title sft" data-x="20" data-y="140" data-speed="1000" data-start="500" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999">Welcome to Navafiz </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tt-slider-subtitle sft" data-x="20" data-y="240" data-speed="1000" data-start="700" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999; font-size:22px; background:#FFF; color:#000; padding:10px;">Here all featured services are available for <strong>free</strong> & <strong>covers</strong> the <strong>following</strong>: </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tt-slider-small-text sft" data-x="20" data-y="310" data-speed="1000" data-start="900" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999">Job Seekers - can get Job lead, create online profile, have Free CV review/improvement, get the list of companies and an opportunity to connect with other<br> professionals on board.
                        
                        
                       
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption sft" data-x="20" data-y="420" data-speed="1000" data-start="1100" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999"> <a href="<?=base_url()?>jobs" class="tt-btn btn-default">View Jobs</a> </div>

                    </li>

                    <!-- SLIDE  -->
                    <li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Write a Resume">

                        <!-- MAIN IMAGE -->
                        <img src="<?=base_url()?>assets/frontend/images/slider/5.jpg" alt="job portal" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                        <!-- LAYER NR. 1 -->

                        <div class="tp-caption tt-slider-title sft" data-x="20" data-y="140" data-speed="1000" data-start="500" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999">Welcome to Navafiz<span style="font-size:24px;"> Connecting Professionals</span> </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tt-slider-subtitle sft" data-x="20" data-y="240" data-speed="1000" data-start="700" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999;  font-size:22px; background:#FFF; color:#000; padding:10px;">Here all featured services are available for <strong>free</strong> & <strong>covers</strong> the <strong>following</strong>: </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tt-slider-small-text sft" data-x="20" data-y="310" data-speed="1000" data-start="900" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999"> Recruiters or Hiring Managers - can make free Job Posting along with filtering search from the database.
                            <br>  
                            Volunteers – can share tips for Job Hunt, provide career advice, conduct training sessions and advise on do’s and don’ts for the job hunt.</div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption sft" data-x="20" data-y="420" data-speed="1000" data-start="1100" data-easing="Power4.easeOut" data-endspeed="300" style="z-index: 999"> <a href="<?=base_url()?>register" class="tt-btn btn-default">Register Now</a> </div>
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
                        <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$engjob->j_id?>/<?php echo $engjob->j_slug?>">
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
                       <a href="<?=base_url()?>job/<?=$engjob->j_id?>/<?php echo $engjob->j_slug?>" class="btn btn-primary btn-custom">View Detail</a>
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
                        <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$finacjob->j_id?>/<?php echo $finacjob->j_slug?>">
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
                      <a href="<?=base_url()?>job/<?=$finacjob->j_id?>/<?php echo $finacjob->j_slug?>" class="btn btn-primary btn-custom">View Detail</a>
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
                        <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$samajob->j_id?>/<?php echo $samajob->j_slug?>">
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
                        <a href="<?=base_url()?>job/<?=$samajob->j_id?>/<?php echo $samajob->j_slug?>" class="btn btn-primary btn-custom">View Detail</a>
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
                        <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$realjob->j_id?>/<?php echo $realjob->j_slug?>">
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
                        <a href="<?=base_url()?>job/<?=$realjob->j_id?>/<?php echo $realjob->j_slug?>" class="btn btn-primary btn-custom">View Detail</a>
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
              <span class="counter"><?php echo rand(999,3000)?></span>
              <h3> Views </h3>
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
   <h4 class="white-text"> Note: All jobs are removed from system after one month and all user profiles are removed from system after 3 month (until unless renewed). This is to maintain the freshness of data and keep the active users only.</h4>
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
            <div class="company-list-box" style="height:260px;"> <span class="company-list-img">
            <?php if($relatedprofile->m_avatar !="")   {?>
             <img src="<?=base_url()?>assets/uploads/members/<?=($relatedprofile->m_avatar == "")?"default.png":$relatedprofile->m_avatar?>" class="img-responsive" alt="<?=$relatedprofile->m_name?>">
            <?php }else{?>
                <img src="<?=base_url()?>assets/uploads/members/<?=($relatedprofile->m_avatar == "")?"default.png":$relatedprofile->m_avatar?>" class="img-responsive" alt="<?=$relatedprofile->m_name?>">
            <?php } ?>        
             </span>
              <div class="company-list-box-detail">
                <h5>
                  <?=$relatedprofile->m_name?>
                </h5>
                <p>
                  <?=substr($relatedprofile->m_profession,0,20)?>
                </p>
                <div class="ratings"> <?=$relatedprofile->m_city?></div>
              
             <!-- //===-->
             <div class="media-body"> 
                      <!-- <div class="pull-right">
                                                            <a href="<?=base_url()?>professional/<?=$relatedmember->m_id?>" class="btn btn-default btn-sm">View</a>
                                                        </div>-->
                     
                      <div><small><strong>Profession: </strong>
                        <?=$relatedprofile->m_profession?>
                        </small></div>
                      <div><small><strong>Current City:</strong>
                        <?=$relatedprofile->m_current_city?>
                        </small></div>
                      <div><small><strong>Employer:</strong>
                        <?=$relatedprofile->m_employer?>
                        </small></div>
                      <div><small><strong> Employment Status:</strong>
                        <?=$relatedprofile->employment_status?>
                        </small></div>
                      <div><small><strong>Visa Status:</strong>
                        <?=$relatedprofile->visa_status?>
                        </small></div>
                      <div><small><strong>Email:</strong>
                        <?=$relatedprofile->m_email?>
                        </small></div>
                    </div>
            <!--  //======-->
              
              
              
              
              
              
              
              
              
              
              
              
              
              
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
    </div>
</body>
</html>