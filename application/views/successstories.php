<?php $this->load->view('header.php'); ?>

<body>
<div class="page category-page">
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <div class="clearfix"></div>
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Success Stories</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a> </li>
              <li class="active">Success Stories</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="categories-list-page light-grey">
 
    <div class="container">
      <div class="row">
 
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
       
          <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="apply-job"> <a href="<?=base_url()?>member/successstory" class="btn btn-default" >My Success Story</a>  </div>
            <?php if($stories) {
			
foreach(@$stories as $story){ 


?>
            <div class="profile-content">
              <div class="card">
                <div class="firstinfo"> 
               
                
                  <?php
   if($story->m_fb !="")
   {
   ?>
      <img src="http://graph.facebook.com/<?=$story->m_fb?>/picture?type=large" class="img-responsive img-circle" alt="<?php echo $story->m_name?>">
      <?php
   }else{
	   ?>
      <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($story->m_avatar == "")?"default.png":$story->m_avatar?>" class="img-responsive img-circle" alt="<?php echo $story->m_name?>">
      <?php
   }
	?>
                
                <!--<img src="images/users/11.jpg" alt="" class="img-circle img-responsive" />-->
                
                
                
                
                
                  <div class="profileinfo">
                    <h1> <a href="#">  <?=$story->ss_subject?> </a></h1>
                    <h3><?=$story->m_name?> </h3>
                    <p class="bio"><?=$story->ss_descr?></p>
                   <!-- <div class="profile-skills"> <span> wordpress </span> <span> css3 </span> <span> javascript </span> <span> php </span> <span> laravel </span> <span> woocommerce </span> </div>-->
                    <div class="hire-btn"> <a href="<?=base_url()?>professional/<?= $story->m_id?>" class="btn-default" > <i class="fa fa-location-arrow"></i> View Profile</a> </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            
              
                                <?php
}
							 }else{
								 ?>
                                 <div role="alert" class="alert alert-danger alert-dismissible">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <strong></strong> - No data exits! </div>
                                 <?php
							 }
								?>
                                
                                
            
            
            
            
            
          </div>
         
        </div>
      </div>
    </div>
  </section>
  
  <!-- JAVASCRIPT JS  -->
  <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
  <script type="text/javascript">
            (function($) {
                "use strict";
                $('#posts-masonry').imagesLoaded(function() {
                    $('#posts-masonry').isotope({
                        layoutMode: 'masonry',
                        transitionDuration: '0.3s'
                    });
                });
            })(jQuery);
        </script> 
</div>
</body>
</html>