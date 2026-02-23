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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 50px auto 0 auto;">
                <div class="row">
                     <h3>CV  Review Report</h3>
                    <div class="profile-edit row boxed box-to-clone education-box">
                        <?php if($current_review){?>
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
                                    <div class="col-sm-8"><?=nl2br($current_review->user_comments);?></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label>Expert Advise - 
                                          <?php 
                                          if(!empty($current_review->updated_on)){
                                              echo date('d-m-Y', strtotime($current_review->updated_on));
                                          }                                          
                                          ?>
                                      </label>
                                    </div>
                                    <div class="col-sm-8"><?=nl2br($current_review->admin_comments);?></div>
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
                    <?php }else{?>
                    <div class="row" style="margin-top: 20px;">
                        <div class="apply-job"> <a href="<?=base_url('SubmitCvReview')?>" class="btn btn-default"  ><i class="fa fa-upload"></i>Submit CV for Review</a> </div>
                    </div>
                    <?php }?>
                </div>
                </div>
                
            </div>            
        </div>  
    <?php $this->load->view('footerbottom.php'); ?> 
</div>
</body>
</html>

