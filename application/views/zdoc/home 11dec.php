<?php $this->load->view('header.php'); ?>
<body>
<div class="page">
<?php $this->load->view('pagetop.php'); ?>
<div class="clearfix"></div>
<?php     $this->load->view('home/home-box-tabs'); ?>    
<div class="clearfix"></div>

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
                      <div><small><strong>Skill: </strong>
                        <?php
                        $str_arr = explode(",",$relatedprofile->m_skills);			  
                        if($str_arr){?>              
                        <?php for($a= 0; $a< sizeof($str_arr); $a++){
                            if($a>6)
                                break;
                            ?>
                        <a href="#"> <?= $str_arr[$a];?> , </a>
                        <?php                                                 
                        } }  ?>
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
</div>
</body>
</html>