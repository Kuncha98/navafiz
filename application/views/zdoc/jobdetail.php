<?php $this->load->view('header.php'); ?>
<style>
.company-img {
    overflow: auto;
}
</style>
<body>
<div class="page category-page">
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <section class="single-job-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="single-job-page">
              <div class="job-short-detail">
                <div class="heading-inner">
                  <p class="title">Job Details</p>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                  <dl>
                    <dt>Job Title:</dt>
                    <dd>
                      <?=$job->j_title?>
                    </dd>
                    <dt>Job Category:</dt>
                    <dd>
                      <?=$job->c_name?>
                    </dd>
                    <dt>Job Country:</dt>
                    <dd>
                      <?=$job->country;?>
                    </dd>
                    <dt>Job State:</dt>
                    <dd>
                      <?=$job->j_state;?>
                    </dd>
                    <dt>Job City:</dt>
                    <dd>
                      <?=$job->j_location;?>
                    </dd>
                    <dt>Company:</dt>
                    <dd>
                      <?=($job->j_company == "") ? "---" : $job->j_company?>
                    </dd>
                    <dt>Email for apply:</dt>
                    <dd>
                      <?=($job->j_email_apply == "")? "---" : $job->j_email_apply?>
                    </dd>
                    <dt>Posted On:</dt>
                    <dd>
                      <?=date("M d, Y",$job->j_add_date)?>
                    </dd>
                    <dt>Job Added By:</dt>
                    <dd>
                      <?=($job->m_name == "") ? "Admin" : $job->m_name?>
                    </dd>
                  </dl>
                </div>
              </div>
              <div class="heading-inner">
                <p class="title">Job Description</p>
              </div>
              <div class="job-desc job-detail-boxes">
                <p>
                  <?=$job->j_descr?>
                </p>
              </div>
              <div class="b-socials full-socials">
                <?php
                $desc_share = strip_tags(substr($job->j_descr,0,300));?>
                <ul class="list-unstyled">
                  <li> <a href="mailto:?Subject=<?=$job->j_title?>&amp;Body=<?=$desc_share;?>"> <i class="fa fa-envelope fa-fw"></i>Email </a></li>
                  <li> <a href="https://twitter.com/share?url=<?=base_url()?>job/<?=$job->j_id?>&amp;text=<?=$job->j_title?>&amp;hashtags=simplesharebuttons" target="_blank"> <i class="fa fa-twitter fa-fw"></i>Tweet </a> </li>
                  
                  <!--<li><a href="https://www.facebook.com/"><i class="fa fa-facebook fa-fw"></i>Share</a></li>-->
                  <li><a href="http://www.facebook.com/sharer.php?u=<?=base_url()?>job/<?=$job->j_id?>" target="_blank"> <i class="fa fa-facebook fa-fw"></i>Share </a> </li>
                  <li> <a href="https://plus.google.com/share?url=<?=base_url()?>job/<?=$job->j_id?>" target="_blank"> <i class="fa fa-google-plus fa-fw"></i>Google+ </a></li>
                  <!-- <li><a href="http://pinterest.com/"><i class="fa fa-pinterest fa-fw"></i>Pinterest</a></li>-->
                  
                  <li> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=base_url()?>job/<?=$job->j_id?>" target="_blank"> <i class="fa fa-linkedin fa-fw"></i>Share </a></li>
                </ul>
              </div>
              <?php if($job->j_image != ""){?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="company-img"> <img src="<?=base_url()?>/assets/uploads/jobs/<?=$job->j_image?>" alt="<?=$job->j_title?>" width="600px;"> </div>
              </div>
              <?php }?>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <?php if($this->session->userdata('user_id') != ""){ ?>
            <div class="apply-job"> <a href="#applyonlineform" class="btn btn-default" ><i class="fa fa-upload"></i>Apply For Position</a> <a href="<?=base_url()?>job/report-abuse/<?=$job->j_id?>" class="btn btn-default bookmark"><i class="fa fa-star"></i> Report Abuse</a> </div>
            <?php }?>
            <div class="" id="followers">
              <ul class="list-group list-group-dividered list-group-full">
                <?php 
                $p=1;
                    if($relatedmembers!='empty') {
                        foreach(@$relatedmembers as $relatedmember){ 	
                   ?>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left"> <a class="avatar" href="<?=base_url('profile/'.$relatedmember->m_id)?>">                          
                          <img src="<?=base_url()?>assets/uploads/members/<?=($relatedmember->m_avatar == "")?"default.png":$relatedmember->m_avatar?>" class="img-responsive" alt="<?=$relatedmember->m_name?>">
                        <i></i> </a> 
                        </div>
                        <div class="media-body"> 
                        <div><a class="name" href="<?=base_url('profile/'.$relatedmember->m_id)?>"> <strong>
                          <?=$relatedmember->m_name?>
                          </strong> </a>
                        </div>
                        <div>
                            <small><strong>Profession: </strong>
                                <?=$relatedmember->m_profession?>
                            </small>
                        </div>
                        <div>
                            <small><strong>Current City:</strong>
                                <?=$relatedmember->m_current_city?>
                            </small>
                        </div>
                        <div>
                            <small><strong>Employer:</strong>
                            <?=$relatedmember->m_employer?>
                            </small>
                        </div>
                        <div>
                            <small><strong> Employment Status:</strong>
                            <?=$relatedmember->employment_status?>
                            </small>
                        </div>
                        <div>
                            <small><strong>Visa Status:</strong>
                            <?=$relatedmember->visa_status?>
                            </small>
                        </div>
                        <div>
                            <small><strong>Email:</strong>
                            <?=$relatedmember->m_email?>
                            </small></div>
                        </div>
                      </div>
                    </li>
                    <?php
                                                                               }

}
       
									   ?>
              </ul>
            </div>
           
          </div>
          <?php
                if($this->session->userdata('user_id') != ""){
                    
            ?>
          <div class="col-md-8 col-sm-8 col-xs-12" id="applyonlineform">
            <div class="single-job-page">
              <div class="heading-inner">
                <p class="title">Want To Apply For this Job?</p>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12"><strong>Note: Before apply the job the cv should be uploaded. If still not upload the cv. <a href="<?=base_url('SubmitCvReview');?>" class="btn btn-primary" >Click to upload CV.</a></strong></div>
              <br>
              <br>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <form method="post" id="job-form" action="<?=base_url('job/applyonline');?>" enctype="multipart/form-data">
                  <input type="hidden" id="jobb_id" name="jobb_id" value="<?=$job->j_id?>"/>
                  <input type="hidden" id="jobb_name" name="jobb_name" value="<?=$job->j_title?>"/>
                  <input type="hidden" id="jobb_email_apply" name="jobb_email_apply" value="<?=$job->j_email_apply?>"/>
                  <div class="row clearfix">
                    <div class="column col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" name="email"  placeholder="Email" required>
                      </div>
                    </div>
                    <div class="column col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <textarea name="message" rows="6" class="form-control" placeholder="Cover Letter" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                    <?php  if(empty($profile->member_cv)){?>
                        <p style="color: #0092ef;">Your Resume is not Uploaded Please Upload your Resume first!</p>
                    <?php }?>                        
                    <div class="text-center">
                        <input value="Submit" class="btn btn-default btn-block" <?=empty($profile->member_cv) ? 'disabled="" ':''?> type="submit">
                    </div>
                    </div>
                  </div>
                  <input type="hidden" name="member_resume" value="<?=$profile->member_cv;?>">
                </form>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <br>
    <div class="heading"><span class="title">Comments </span></div>
      <div class="comments-container ">
        <ul>
        <?php     
        if($jobcomments!='empty') {
            foreach(@$jobcomments as $jobcomment){ 
        ?>
            <li class="comment-box">
                <div class="col-md-2 col-sm-3 col-xs-3 comment-author-image">
                    <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($jobcomment->m_avatar == "")?"default.png":$jobcomment->m_avatar?>" class="img-circle img-responsive" alt="<?=$jobcomment->m_name?>" width="90" height="90">
                </div>
                <div class="col-md-10 col-sm-9 col-xs-9">
                    <h4><?=$jobcomment->m_name?></h4>
                    <div class="news-date">  <?=$jobcomment->com_add_date?></div>
                    <p> <?=$jobcomment->com_comments?></p>
                </div>
            </li>
            <?php } }?>  
        </ul>
        <?php if($this->session->userdata('user_id') != ""){ ?>
        <div class="commentform">
            <form class="row" action="<?=base_url()?>job/savecomments" method="post">
               <input type="hidden" id="com_type" name="com_type" value="job"/>
               <input type="hidden" id="job_id" name="job_id" value="<?=$job->j_id?>"/>
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
                        <input type="email" placeholder="" class="form-control" value="<?php echo $this->session->userdata('email')?>" disabled>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button class="btn btn-default pull-right">Publish Comment <i class="fa fa-angle-right"></i></button>
                </div>
            </form>
        </div>
        <?php }?>
    </div>
      
    </div>
  </section>
 
  <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>