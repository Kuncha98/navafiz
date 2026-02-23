<?php $this->load->view('header.php'); ?>
<style>
.company-img {
	overflow: auto;
}
</style>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=125784917765132";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="page category-page">
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>
            <?=(isset($job->cv_title)) ? $job->cv_title : $this->session->userdata('name')?>
          </h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a> </li>
              <li class="active">Review Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="single-job-section" style="padding-bottom: 0;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="single-job-page">
              <div class="job-short-detail">
                <div> <br>
                  </span></span> Dear
                  Professionals,<br>
                  Kindly note
                  that this sample CV is only for general Guidelines. <br>
                  You are
                  required to be careful about following points in your Resume.
                  
                  &nbsp; <br>
                  <br>
                  <h3>Navafiz
                    Standards for CV Review
                    
                    &nbsp; </h3>
                  <br>
                  <b>{Headline} </b> &nbsp; <br>
                  1. Profession
                  (position you are looking for) must be shown on Top of your CV.
                  
                  &nbsp; <br>
                  2.
                  Availability/Visa Status shall be shown on Top of your CV.
                  
                  &nbsp; <br>
                  3. Contact
                  Details (Email, mobile) shall be on Top of your CV.
                  
                  &nbsp; <br>
                  4. Candidate
                  photo must be appropriate.
                  
                  &nbsp; <br>
                  <b>{Contents} </b> &nbsp; <br>
                  5. Skill
                  summary shall be shown for quick review of capabilities.
                  
                  &nbsp; <br>
                  6. All
                  Employment Dates and total years of experience must be provided.
                  
                  &nbsp; <br>
                  7. Tables and
                  Boxes shall not be used on CV.
                  
                  &nbsp; <br>
                  8. Header and
                  footer shall be used only for page numbering, and personal data shall not be in
                  header footer.
                  
                  &nbsp; <br>
                  9. CV shall
                  contain reasonable amount of key words related to profession.
                  
                  &nbsp; <br>
                  10. Soft
                  Skills shall be shown related to the field, if applicable.
                  
                  &nbsp; <br>
                  11.
                  Objectives (if shown), shall not be generic. Must be the actual and personal
                  professional objectives.
                  
                  &nbsp; <br>
                  12. Show your
                  Achievements below Job responsibilities or capabilities.
                  
                  &nbsp; <br>
                  13. Don’t
                  show Passport or other personal document numbers, unless required.
                  
                  &nbsp; <br>
                  14. There
                  shall be no Typing Mistake.
                  
                  &nbsp; <br>
                  <b>{Format} </b> &nbsp; <br>
                  15. Font
                  Sizes shall be appropriate, not too big or too small. Also don’t use much
                  variety of sizes or font types (Also mind the scale)
                  
                  &nbsp; <br>
                  16. CV Shall
                  not exceed more than 3 Pages.
                  
                  &nbsp; <br>
                  17. A
                  reasonable White Space shall be available on CV. It shall not be too congested.
                  Also reasonable margin shall be provided for filing.
                  
                  &nbsp; <br>
                  {Email and
                  Cover Letter}
                  
                  &nbsp; <br>
                  18.
                  "Email Address” must be Professional. Email addresses like, prince, rock,
                  playboy, etc. are not acceptable.
                  
                  &nbsp; <br>
                  19.
                  "Email Display Name” must be appropriate. Display names like Ch@nd**,
                  prince, rock, playboy, etc. are not acceptable.
                  
                  &nbsp; <br>
                  20. CV Soft
                  file name shall display your profession and Name. Generic names like, CV, new
                  CV, or just name are not acceptable.
                  
                  &nbsp; <br>
                  21. Cover
                  Letter shall be provided along with CV and shall be appropriate and not
                  generic.
                  
                  &nbsp; <br>
                  <br>
                  <h2>Here are links to download .......</h2>
                  <h2>Navafiz Standard CV format (PDF File).&nbsp;</h2>
                  <a href="http://www.navafiz.com/public-assets/Navafiz-Standard-cv-jan-2017.pdf" target="" rel="">http://www.navafiz.com/public-assets/Navafiz-Standard-cv-jan-2017.pdf</a><br>
                  <h2>Navafiz Standard CV format (Word File).&nbsp;</h2>
                  <a href="http://www.navafiz.com/public-assets/Navafiz-Standard-CV-jan-2017.docx" target="" rel="">http://www.navafiz.com/public-assets/Navafiz-Standard-CV-jan-2017.docx</a><br>
                  <br>
                  <br>
                  <h2>Navafiz Magazine (February 2014).&nbsp;</h2>
                  <a href="http://www.navafiz.com/public-assets/Navafiz-Magazine-Febuary-2014.pdf" target="" rel="">http://www.navafiz.com/public-assets/Navafiz-Magazine-Febuary-2014.pdf</a><br>
                  <br>
                  <br>
                  For more
                  tips, join Navafiz WhatsApp, Facebook, yahoo and LinkedIn Forum.
                  
                  &nbsp;
                  
                  &nbsp; </div>
                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                  <dl>
                    <dt>Member:</dt>
                    <dd>
                      <?=$job->m_name?>
                    </dd>
                    <dt>Title:</dt>
                    <dd>
                      <?=$job->cv_title?>
                    </dd>
                    <dt>CV:</dt>
                    <dd> <a href="<?=base_url()?>download/<?=$job->cv_member_cv?>" class="btn btn-theme"><i class="fa fa-download"></i>
                      <?=$job->cv_member_cv?>
                      </a> </dd>
                    <dt>Posted On:</dt>
                    <dd>
                      <?=date("M d, Y",$job->cv_add_date)?>
                    </dd>
                    <dt>Description</dt>
                    <dd>
                      <?=$job->cv_descr?>
                    </dd>
                  </dl>
                </div>
              </div>
             <!-- NOte: On click the review complete the cv will be hide from the review list.
              <form action="<?=base_url()?>updatecvreview" class="row" method="post" id="jobform">
                <input type="hidden" id="cv_id" name="cv_id" value="<?=$job->cv_id?>"/>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input value="Review Complete" class="btn btn-default" type="submit">
                  </div>
                </div>
              </form>-->
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                <!--              <form action="<?=base_url()?>job/upload_job_image" class="row" method="post" id="jobform">
-->
                <form action="<?=base_url()?>cv/upload_cv_review_response" class="row" method="post" id="responsejobform">
                  <input type="hidden" id="cvr_id" name="cvr_id" value="<?=$job->cv_id?>"/>
                  <div class="form-group">
                    <label>Upload Reviewed CV </label>
                    <span class="Errorclass" id="jobimagesms"></span>
                    <input type="file" id="cvfile"  name="cvfile">
                    <!-- <span><img id="j_image" src="<?=base_url()?>assets/uploads/jobs/" width="80" height="80" style="display:none"  /></span>-->
                    <table id="files">
                    </table>
                  </div>
                </form>
              </div>
              
              <?php
			  
			  if($reviewresponses!='empty') {
				  ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="heading-inner first-heading">
                  <p class="title">response of Uploaded CV</p>
                </div>
                <div class="resume-list">
                  <div class="table-responsive">
                    <table class="table  table-striped">
                      <thead class="thead-inverse">
                        <tr>
                          <th>CV Reviewed By </th>
                          <th>Date</th>
                          <th>Download</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
			
foreach(@$reviewresponses as $reviewresponse){ 


?>
                        <tr>
                          <td><h5>
                              <?=$reviewresponse->m_name?>
                            </h5></td>
                          <td><?=$reviewresponse->cvr_add_date?></td>
                          <td><a class="btn btn-primary" href="<?=base_url()?>downloadreview/<?=$reviewresponse->cvr_member_cv?>"> Download CV Review Report </a></td>
                        </tr>
                        <?php
}
				 
				  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <?
			  }
			  ?>
              
                            NOte: By clicking this button, Resume and Report will be deleted from website.
              <form action="<?=base_url()?>updatecvreview" class="row" method="post" id="jobform">
                <input type="hidden" id="cv_id" name="cv_id" value="<?=$job->cv_id?>"/>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input value="Review Complete" class="btn btn-default" type="submit">
                  </div>
                </div>
              </form>

              
              <?php /*?><div class="col-md-12 col-sm-12 col-xs-12">
            <div class="all-jobs-list-box">
            <?php if($reviewresponses!='empty') {
			
foreach(@$reviewresponses as $reviewresponse){ 


?>
              <div class="job-box">
             
                   
                  <div class="col-md-4 col-sm-4 col-xs-6"> 
                  <div class="job-type jt-remote-color">  <?=$reviewresponse->m_name?> </div>
                   </div>
				<div class="col-md-4 col-sm-4 col-xs-6"> 
                  <div class="job-type jt-remote-color">  <?=$reviewresponse->cvr_add_date?> </div>
                   </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <a href="<?=base_url()?>downloadreview/<?=$reviewresponse->cvr_member_cv?>" class="btn btn-primary btn-custom">Download CV</a>
                </div>
              </div>
              
              
          <?php
}
				  }
				  ?>    
              
              
              
              
              
              
              
              
            </div>
            
          </div><?php */?>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="widget">
              <div class="widget-heading"><span class="title">Latest CV</span></div>
              <ul class="related-post">
                <?php 
                 $p=1;
                 if($relatedjobs!='empty') {
                     foreach(@$relatedjobs as $relatedjob){?>
                <li> <a href="<?=base_url()?>review/<?=$relatedjob->cv_id?>">
                  <?=$relatedjob->cv_title?>
                  </a> <span><i class="fa fa-map-marker"></i>
                  <?=$relatedjob->m_name?>
                  </span> <span><i class="fa fa-calendar"></i>
                  <?=date("M d, Y",$relatedjob->cv_add_date)?>
                  </span> </li>
                <?php }}?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  <?
  if($this->session->userdata('user_id') != ""){
  ?>
  <section class="single-job-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="single-job-page">
              <div class="heading-inner">
                <p class="title">Comments</p>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="<?=base_url()?>review/savecomments" class="row" method="post" id="commentform">
                  <input type="hidden" id="review_id" name="review_id" value="<?=$job->cv_id?>"/>
                  <input type="hidden" id="com_type" name="com_type" value="review"/>
                  
                  <!--<div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Subject <span class="required">*</span></label>
                                        <input placeholder="" class="form-control" type="text">
                                    </div>
                                </div>-->
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group"> 
                      <!-- <label>Comments <span class="required">*</span></label>-->
                      <textarea cols="6" rows="8" class="form-control" name="comments" placeholder="Write your comments"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <input value="Submit" class="btn btn-default" type="submit">
                    <!--   <a href="#" class="btn btn-default"> Submit <i class="fa fa-angle-right"></i> </a>--> 
                  </div>
                </form>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="resume-box">
                  <div class="heading-inner">
                    <p class="title">Comments</p>
                  </div>
                  <?php 
    
    if($comments!='empty') {
	
    foreach(@$comments as $reviewcomment){ 

          

		
?>
                  <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="degree-info">
                      <div class="resume-icon"> <span class="icon-expand"></span> </div>
                      <h4>
                        <?=$reviewcomment->m_name?>
                      </h4>
                      <span>
                      <?=$reviewcomment->com_add_date?>
                      </span>
                      <p>
                        <?=$reviewcomment->com_comments?>
                      </p>
                    </div>
                  </div>
                  <?
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
  </section>
  <?
  }
  ?>
  <?php /*?><section class="single-job-section" style="padding-top: 0;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="single-job-page">
              <div class="heading-inner">
                <p class="title">Comments</p>
              </div>
              <div class="job-desc job-detail-boxes">
                <div class="fb-comments" data-href="<?=base_url()?>review/<?=$job->cv_id?>" data-numposts="5"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><?php */?>
  <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
  <script>
$(function () {
	
    $('#responsejobform').fileUploadUI({
        uploadTable: $('#files'),
        downloadTable: $('#files'),
		
        buildUploadRow: function (files, index) {
            return $('<tr><td><img src="<?=base_url()?>assets/frontend/images/small.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
				
			if(file.msg == "large size") {
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Errorclass">Size should be less than 2MB</span>');
				}
			else if(file.msg == "invalid type") {
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Errorclass">Only jpg,jpeg,png allowed</span>');
       	 		}
			else if(file.msg == "success") {
		
				$('#cvreviewfile').val(file.name);
			//	$('#j_image').show();
				<!--$('#j_image').attr('src','<?=base_url()?>assets/uploads/jobs/small_thumbs/'+file.name);-->
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Successclass">File upload successfully</span>');
       	 		}
		 	else {
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Errorclass">Due to internet Problem file not upload </span>');
       	 		}
		    
		
        }
    });
   
	

});
</script> 
</div>
