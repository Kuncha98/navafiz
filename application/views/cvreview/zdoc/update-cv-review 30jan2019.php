<?php $this->load->view('header.php'); ?>
<style>
    label{
        font-size: 12px !important;
    }
</style>
<body>
<div class="page category-page">
    <?php $this->load->view('pagetop.php'); ?>
    <div class="container">
        <?php $this->load->view('notification/notification-messages');?>
        <form action="<?=base_url('UpdateCvReview/'.$review_id);?>" method="post" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 50px auto 0 auto;">
                <div class="row">
                     <h3>CV  Review Report</h3>
                    <div class="profile-edit row boxed box-to-clone education-box">
                        <div class="panel panel-default" id="showdetails_4119">
                            <div class="panel-heading panel-heading-gray"> 
                                <a href="<?=site_url('profile/'.$current_review->member_id);?>" target="_blank">
                                 <?=GetUserDetails($current_review->member_id)->m_name;?>
                                </a>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled" style="list-style: none !important;">
                                <li>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label>Title</label>
                                    </div>
                                    <div class="col-sm-8"><?=$current_review->review_title?></div>
                                  </div>
                                </li>
                                
                                <li>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label>Self Review - <?=date('d-m-Y', strtotime($current_review->added_on));?></label>
                                    </div>
                                    <div class="col-sm-8"><?=$current_review->user_comments?></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label>Expert Advise - <?=date('d-m-Y', strtotime($current_review->added_on));?></label>
                                    </div>
                                    <div class="col-sm-8"><?=$current_review->admin_comments?></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label>Resume</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <a href="<?=site_url('public-assets/cvreviews/'.$current_review->resume_file);?>">
                                            View
                                        </a>                                            
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                    </div>
                </div>
                    
                </div>
                <div class="row">                           
                    <h3>Update CV  Review</h3>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <div class="form-group">
                        <label>Comments</label>
                        <textarea  name="admin_comments" class="form-control" style="height: 300px; " required></textarea>
                      </div>
                    </div>
                </div>
            </div>            
            <div class="row">
                <button type="submit" class="btn btn-default col-md-8 col-sm-8 col-xs-10">Submit <i class="fa fa-angle-right"></i></button>
            </div>
            <input type="hidden" name="do_post" value="1">
        </form>
        <div class="row">
            <style>
                ul{
                    margin: 20px;
                }
                ul li{
                    margin-bottom: 20px;
                }
            </style>
        <ul>
            <?php 
            $i=1;
            foreach($cvr_points as $cvrpiont){?>
            <li><strong><?=$i?>. <?=$cvrpiont->question;?> ?</strong></li>
            <?php $i++; }?>
        </ul>
        </div>
        <pre>
            <?php print_r($current_review);?>
        </pre>
    </div>  
    <?php $this->load->view('footerbottom.php'); ?> 
</div>
</body>
</html>