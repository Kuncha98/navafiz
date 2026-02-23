<?php $this->load->view('header.php'); ?>

<body>
    <div class="page category-page">
        

              <?php $this->load->view('pagetop.php'); ?>
    <div class="clearfix"></div>


        
        <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Job Seeker Tips</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a> </li>
              <li class="active">Job Seeker Tips</li>
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
                        <!--<div class="col-md-9 col-sm-12 col-xs-12">
                            <h4 class="search-result-text">Showing 10 of 60 active job(s)</h4>
                        </div>-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="all-jobs-list-box2">
                             <?php if($tips!='empty') {
			
foreach(@$tips as $tip){ 


?>
                                <div class="job-box job-box-2">
                                    <!--<div class="col-md-2 col-sm-2 col-xs-12 hidden-sm hidden-xs">
                                        <div class="comp-logo">
                                            <a href="#"><img src="images/company/5.png" class="img-responsive" alt="scriptsbundle"> </a>
                                        </div>

                                    </div>-->
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> <?=$tip->st_title?></div>
                                            </a>
                                          <!--  <a href="#"><span class="comp-name">conversi Pvt. Ltd. United States </span></a>
                                            <a href="#" class="job-type jt-full-time-color">
                                                <i class="fa fa-clock-o"></i> Full time
                                            </a>-->
                                        </div>
                                        <p><?=$tip->st_descr?></p>
                                    </div>
                                    <div class="job-salary">
                                        <i class="fa fa-date"></i>  <?=$tip->st_add_date?>
                                    </div>
                                </div>
                                
                                <?
}
							 }else{
								 ?>
                                 <div role="alert" class="alert alert-danger alert-dismissible">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <strong></strong> - No data exits! </div>
                                 <?
							 }
								?>
                                
                                
                                
                                
                                
                            </div>
                            <?php /*?><div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li>
                                            <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><?php */?>
                        </div>

                    </div>
                </div>
                
                
                
                 <div class="heading"><span class="title">Comments </span></div>
                 
                 
                 <div class="comments-container ">
                 
                                <ul>
                                   <?php 
    
    if($tipscomments!='empty') {
	
    foreach(@$tipscomments as $tipscomment){ 

          

		
?>
                                    <li class="comment-box">
                                        <div class="col-md-2 col-sm-3 col-xs-3 comment-author-image">
                                        
                                         <?php
   if($tipscomment->facebook_id !="")
   {
   ?>
                                
                                    <img src="http://graph.facebook.com/<?=$tipscomment->facebook_id?>/picture?type=large" class="img-circle img-responsive" alt="<?=$tipscomment->m_name?>" width="90" height="90">
    <?
   }else{
	   ?>
        <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($tipscomment->m_avatar == "")?"default.png":$tipscomment->m_avatar?>" class="img-circle img-responsive" alt="<?=$tipscomment->m_name?>" width="90" height="90">
       <?
   }
	?>                    
                                        
                                        
                                           
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-9">
                                            <h4><?=$tipscomment->m_name?></h4>
                                            <div class="news-date">  <?=$tipscomment->com_add_date?></div>
                                            <p> <?=$tipscomment->com_comments?></p>
                                           <?php /*?> <div class="comment-reply">
                                                <h6><a href="#" class="active-color">Reply</a></h6>
                                            </div><?php */?>
                                        </div>
                                    </li>
                                   <?
	}
	}
	  ?>  
                                    
                                </ul>
                                 <?
  if($this->session->userdata('user_id') != ""){
  ?>
                                <div class="commentform">
                                    <form class="row" action="<?=base_url()?>job/savecomments" method="post">
                                       <input type="hidden" id="com_type" name="com_type" value="tips"/>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Comment <span class="required">*</span></label>
                                                <textarea cols="6" rows="8" placeholder="Write the comments" class="form-control" required name="comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Name <span class="required">*</span></label>
                                                <input type="text" placeholder="" class="form-control" value="<?php echo $this->session->userdata('name')?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="email" placeholder="" class="form-control"  value="<?php echo $this->session->userdata('email')?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <button class="btn btn-default pull-right">Publish Comment <i class="fa fa-angle-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <?
  }
								?>
                            </div>
                 
            </div>
            
            
            
        </section>
        
        
        
        
        
        
        
 

        
          <?php $this->load->view('footer.php'); ?>
            <?php $this->load->view('footerbottom.php'); ?>
    </div>
</body>


</html>