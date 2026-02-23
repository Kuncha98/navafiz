<?php $this->load->view('header.php'); ?>
<body>
<div class="page">
  <?php /*?><div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div><?php */?>
  <?php $this->load->view('pagetop.php'); ?>
  
  
  
  <div class="clearfix"></div>
  <div class="search">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="input-group">
            <div class="input-group-btn search-panel">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span id="search_concept">Filter By</span> <span class="caret"></span> </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">By Company</a></li>
                <li><a href="#">By Function</a></li>
                <li><a href="#">By City </a></li>
                <li><a href="#">By Salary </a></li>
                <li><a href="#">By Industry</a></li>
              </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control search-field" name="x" placeholder="Search term...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
            </span> </div>
        </div>
      </div>
    </div>
  </div>
  <section class="main-section parallex">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-12 col-md-offset-1 col-xs-12 nopadding">
          <div class="search-form-contaner">
            <h1 class="search-main-title"> Ten million success stories. Start yours today </h1>
            <form class="form-inline">
              <div class="col-md-4 col-sm-4 col-xs-12 nopadding">
                <div class="form-group">
                  <input type="text" class="form-control" name="keyword" placeholder="Search Keyword" value="">
                  <i class="icon-magnifying-glass"></i> </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                <div class="form-group">
                  <select class="select-category form-control">
                    <option label="Select Option"></option>
                    <option value="0">Customer Service</option>
                    <option value="1">Designer</option>
                    <option value="2">Developer</option>
                    <option value="3">Finance</option>
                    <option value="4">Human Resource</option>
                    <option value="5">Information Technology</option>
                    <option value="6">Marketing</option>
                    <option value="7">Others</option>
                    <option value="8">Sales</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                <div class="form-group">
                  <select class="select-location form-control">
                    <option value="">&nbsp;</option>
                    <option value="0">SriLanka</option>
                    <option value="1">Australia</option>
                    <option value="2">Bahrain</option>
                    <option value="3">Canada</option>
                    <option value="4">Denmark</option>
                    <option value="5">Germany</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                <div class="form-group form-action">
                  <button type="button" class="btn btn-default btn-search-submit">Search <i class="fa fa-angle-right"></i> </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
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
                  <li> <a href="#tab1" data-toggle="tab"><i class="icofont icon-ribbon"></i><span class="hidden-xs hidden-sm">By Information Techonolgy</span></a> </li>
                  <li> <a href="#tab2" data-toggle="tab"><i class="icofont icon-layers"></i><span class="hidden-xs hidden-sm">By Health Care</span></a> </li>
                  <li class="active"> <a href="#tab3" data-toggle="tab"><i class="icofont icon-global"></i><span class="hidden-xs hidden-sm">By Oil & Gas</span></a> </li>
                  <li> <a href="#tab4" data-toggle="tab"><i class="icofont icon-linegraph"></i><span class="hidden-xs hidden-sm">By Management</span></a> </li>
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
    if($recentjobs!='empty') {
	
    foreach(@$recentjobs as $recentjob){ 

            

		
?>
                    <div class="job-box">
                      <?php /*?><div class="col-md-1 col-sm-1 col-xs-12 nopadding hidden-xs hidden-sm">
                        <div class="comp-logo"> <img src="<?=base_url()?>/assets/uploads/jobs/<?=($recentjob->j_image == "")?"noimage.png":$recentjob->j_image ?>" class="img-responsive" alt="scriptsbundle"> </div>
                      </div><?php */?>
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="#">
                          <div class="job-title">
                            <?=$recentjob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$recentjob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$recentjob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$recentjob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                       <a href="<?=base_url()?>job/<?=$recentjob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
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
    if($recentjobs!='empty') {
	
    foreach(@$recentjobs as $recentjob){ 

            

		
?>
                    <div class="job-box">
                      <?php /*?><div class="col-md-1 col-sm-1 col-xs-12 nopadding hidden-xs hidden-sm">
                        <div class="comp-logo"> <img src="<?=base_url()?>/assets/uploads/jobs/<?=($recentjob->j_image == "")?"noimage.png":$recentjob->j_image ?>" class="img-responsive" alt="scriptsbundle"> </div>
                      </div><?php */?>
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="#">
                          <div class="job-title">
                            <?=$recentjob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$recentjob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$recentjob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-remote-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$recentjob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                      <a href="<?=base_url()?>job/<?=$recentjob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
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
    if($recentjobs!='empty') {
	
    foreach(@$recentjobs as $recentjob){ 

            

		
?>
                    <div class="job-box">
                      <?php /*?><div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                        <div class="comp-logo"> <img src="<?=base_url()?>/assets/uploads/jobs/<?=($recentjob->j_image == "")?"noimage.png":$recentjob->j_image ?>" class="img-responsive" alt="scriptsbundle"> </div>
                      </div><?php */?>
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="#">
                          <div class="job-title">
                            <?=$recentjob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$recentjob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$recentjob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$recentjob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <a href="<?=base_url()?>job/<?=$recentjob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
                      </div>
                    </div>
                    <?php
									   }
	}
	   ?>
                  </div>
                </div>
                <div class="tab-pane animated fadeInRight" id="tab4">
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <?php 
    $p=1;
    if($recentjobs!='empty') {
	
    foreach(@$recentjobs as $recentjob){ 

            

		
?>
                    <div class="job-box">
                      <?php /*?><div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                        <div class="comp-logo"> <img src="<?=base_url()?>/assets/uploads/jobs/<?=($recentjob->j_image == "")?"noimage.png":$recentjob->j_image ?>" class="img-responsive" alt="scriptsbundle"> </div>
                      </div><?php */?>
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="#">
                          <div class="job-title">
                            <?=$recentjob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$recentjob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$recentjob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$recentjob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                         <a href="<?=base_url()?>job/<?=$recentjob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
                      </div>
                    </div>
                    <?php
									   }
	}
	   ?>
                  </div>
                </div>
                <div class="tab-pane animated fadeInUp" id="tab5">
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <?php 
    $p=1;
    if($recentjobs!='empty') {
	
    foreach(@$recentjobs as $recentjob){ 

            

		
?>
                    <div class="job-box">
                      <?php /*?><div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                        <div class="comp-logo"> <img src="<?=base_url()?>/assets/uploads/jobs/<?=($recentjob->j_image == "")?"noimage.png":$recentjob->j_image ?>" class="img-responsive" alt="scriptsbundle"> </div>
                      </div><?php */?>
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="job-title-box"> <a href="#">
                          <div class="job-title">
                            <?=$recentjob->j_title?>
                          </div>
                          </a> <a href="#"><span class="comp-name">
                          <?=$recentjob->c_name?>
                          </span></a> </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-location"> <i class="fa fa-location-arrow"></i>
                          <?=$recentjob->j_location?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-6">
                        <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i>
                          <?=date("Y-m-d",$recentjob->j_add_date)?>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <a href="<?=base_url()?>job/<?=$recentjob->j_id?>" class="btn btn-primary btn-custom">View Detail</a>
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
        <div class="col-sm-6 col-md-3 col-xs-6">
          <div class="fact-box">
            <div class="single-facts-area">
              <div class="facts-icon"> <i class="icon-megaphone"></i> </div>
              <span class="counter">180</span>
              <h3>Jobs</h3>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-6">
          <div class="fact-box">
            <div class="single-facts-area">
              <div class="facts-icon"> <i class="icon-document"></i> </div>
              <span class="counter">175</span>
              <h3> Resume </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-6">
          <div class="fact-box">
            <div class="single-facts-area">
              <div class="facts-icon"> <i class="icon-profile-male"></i> </div>
              <span class="counter">20</span>
              <h3>Members</h3>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-6">
          <div class="fact-box">
            <div class="single-facts-area">
              <div class="facts-icon"> <i class="icon-toolbox"></i> </div>
              <span class="counter">2142</span>
              <h3>Company</h3>
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
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
            </div>
          </div>
          <?php 
    $p=1;
    if($relatedprofiles!='empty') {
	
    foreach(@$relatedprofiles as $relatedprofile){ 

            

		
?>
          <div class="col-md-4 col-sm-6 col-xs-12"> <a href="<?=base_url()?>professional/<?=$relatedprofile->m_id?>">
            <div class="company-list-box"> <span class="company-list-img"> <img src="<?=base_url()?>assets/uploads/members/<?=($relatedprofile->m_avatar == "")?"default.png":$relatedprofile->m_avatar?>" class="img-responsive" alt=""> </span>
              <div class="company-list-box-detail">
                <h5>
                  <?=$relatedprofile->m_name?>
                </h5>
                <p>
                  <?=substr($relatedprofile->m_profession,0,20)?>
                </p>
                <div class="ratings"> <i class="fa fa-star color"></i> <i class="fa fa-star color"></i> <i class="fa fa-star color"></i> <i class="fa fa-star-half-full color"></i> <i class="fa fa-star-o"></i><span class="badge"> 4.5</span> </div>
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
              <button class="btn-default"> View All <i class="fa fa-angle-right"></i> </button>
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
  <div class="fixed-footer">
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3 col-xs-12">
            <div class="footer_block"> <a href="index.html" class="f_logo"><img src="images/logo.png" class="img-responsive" alt="logo"></a>
              <p>Aoluptas sit aspernatur aut odit aut fugit, sed elits quias horisa hinoe magni  magni dolores eos qui ratione volust luptatem sequised .</p>
              <div class="social-bar">
                <ul>
                  <li><a class="fa fa-twitter" href="#"></a></li>
                  <li><a class="fa fa-pinterest" href="#"></a></li>
                  <li><a class="fa fa-facebook" href="#"></a></li>
                  <li><a class="fa fa-behance" href="#"></a></li>
                  <li><a class="fa fa-instagram" href="#"></a></li>
                  <li><a class="fa fa-linkedin" href="#"></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-2 col-xs-12">
            <div class="footer_block">
              <h4>Hot Links</h4>
              <ul class="footer-links">
                <li> <a href="#">Home</a> </li>
                <li> <a href="#">About Us</a> </li>
                <li> <a href="#">Privacy</a> </li>
                <li> <a href="#">Contact Us</a> </li>
                <li> <a href="#">Term & Conditions</a> </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-xs-12">
            <div class="footer_block dark_gry">
              <h4>Recent Posts</h4>
              <ul class="recentpost">
                <li> <span><a class="plus" href="#"><img src="images/footer/1.png" alt="" /><i>+</i></a></span>
                  <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                  <h3>Sep 15, 2016</h3>
                </li>
                <li> <span><a class="plus" href="#"><img src="images/footer/2.png" alt="" /><i>+</i></a></span>
                  <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                  <h3>Fab 10, 2016</h3>
                </li>
                <li> <span><a class="plus" href="#"><img src="images/footer/3.png" alt="" /><i>+</i></a></span>
                  <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                  <h3>Fab 10, 2016</h3>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-xs-12">
            <div class="footer_block">
              <h4>Contact Information</h4>
              <ul class="personal-info">
                <li><i class="fa fa-map-marker"></i> 3rd Floor,Link Arcade Model Town, BBL, USA.</li>
                <li><i class="fa fa-envelope"></i> Support@domain.com</li>
                <li><i class="fa fa-phone"></i> (0092)+ 124 45 78 678 </li>
                <li><i class="fa fa-clock-o"></i> Mon - Sun: 8:00 - 16:00</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <section class="footer-bottom-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="footer-bottom">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <p>Copyright ©2016  - Opportunities Job Directory Template - All rights Reserved. Made By <a href="http://themeforest.net/user/scriptsbundle"> ScriptsBundle </a></p>
                  <p>Reproduction of material from scriptsBundle without permission is strictly prohibited. </p>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                  <ul class="footer-menu">
                    <li> <a href="#">Jobs in australia</a> </li>
                    <li> <a href="#">Jobs in malaysia</a> </li>
                    <li> <a href="#">Jobs in england</a> </li>
                    <li> <a href="#">Jobs in saudi arabia</a> </li>
                    <li> <a href="#">Jobs in south africa</a> </li>
                    <li> <a href="#">Jobs in saudi Pakistan</a> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <div class="modal fade" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body login-container">
                      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>-->
                        <!--<div class="job-modal">
                            <h2>Want To Apply For this Job?</h2>
                        </div>-->
                       <!-- <div class="login-container">-->
                            <div class="loginbox">
                              <!--  <img src="images/logo.png" alt="logo" class="img-responsive center-block">-->
                                <div class="loginbox-title">sign in using social accounts</div>
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                <div class="loginbox-or">
                                    <div class="or-line"></div>
                                    <div class="or">OR</div>
                                </div>
                                  <form action="javascript:void(0);" method="post" class="login_page">
                                <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="email" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="password" id="password" name="password">
                                </div>
                                <div class="loginbox-forgot">
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <div class="loginbox-submit">
                                    <input type="button" class="btn btn-default btn-block" value="Login"  onClick="loginUser()">
                                </div>
                                  </form>
                                  <div class="loginbox-signup"> Sign Up With Email<a data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Sign up</a> </div>
                                <div class="">
                               <!-- <a data-toggle="modal" data-target="#registerModal" data-dismiss="modal"></i>Sign Upfsdfsd With Email</a>-->
                                   <!-- <a href="<?=base_url()?>register">Sign Up With Email</a>-->
                                </div>
                           <!-- </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        <div class="modal fade" id="registerModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="login-container">
                            <div class="loginbox">
                                <div class="loginbox-title">Sign Up using social accounts</div>
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                <div class="loginbox-or">
                                    <div class="or-line"></div>
                                    <div class="or">OR</div>
                                </div>
                                <div class="form-group">
                                    <label>Username: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="password">
                                </div>
                                <div class="loginbox-forgot">
                                    <input type="checkbox"> I accept <a href="#">Term and consitions?</a>
                                </div>
                                <div class="loginbox-submit">
                                    <input type="button" class="btn btn-default btn-block" value="Register">
                                </div>
                                <div class="loginbox-signup"> Already have account <a href="login.html">Sign in</a> </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
  
  <?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>