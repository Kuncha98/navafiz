<?php $this->load->view('header.php'); ?>

<body>
<div class="page category-page"> 
  <!--<div id="spinner">
            <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
                <h2>Please Wait.....</h2>
            </div>
        </div>-->
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Report Abuse Job</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a> </li>
              <li class="active">Abuse Job</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="contact-us ">
    <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-md-8 col-sm-12 col-xs-12">
          
           <?php
					if($this->session->flashdata('msg')){
				?>
                <div class="form-group">
                <div role="alert" class="form alert alert-success">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <?php echo $this->session->flashdata('msg'); ?> </div>
                        </div>
                <?
					}
					else if($this->session->flashdata('errormsg')){
				?>
                <div class="form-group">
                <div role="alert" class="form alert alert-danger">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <?php echo $this->session->flashdata('errormsg'); ?> </div>
                        </div>
                <?
					}
				?>
          
          
            <div class="Heading-title-left black small-heading">
              <h3>Contact us for Abuse Job</h3>
              <p>If you see a questionable job posting or any potential misuse of the navafiz.com site, please report the suspected fraud.</p>
            </div>
           <!-- <div class="form-group"> <span class="successmessage"><?php echo $this->session->flashdata('msg'); ?></span> </div>-->
            
             
         
            
            
          <!--  <div class="form-group"> <span class="errormessage"><?php echo $this->session->flashdata('errormsg'); ?></span> </div>-->
            <form class="row" action="<?=base_url()?>job/sendabusereport" method="post" class="login_page">
            <input type="hidden" id="job_id" name="job_id" value="<?=$job->j_id?>"/>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label>Job Title <span class="required">*</span></label>
                <h3>
                  <?=$job->j_title?>
                </h3>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <div class="form-group" style="margin-left:25px;"> 
                  
                  <!--<label for="radiobtn" class="col-sm-2 control-label">Subscribe for updates?</label>-->
                  
               <!--   <div class="col-sm-5">-->
                    <div class="radio radio-danger">
                      <input type="radio" name="survey"  id="Radios1" value="Report as spam/scam.">
                      <label style="margin-top:15px;"> Report as spam/scam. </label>
                    </div>
                    <div class="radio radio-danger">
                      <input type="radio"  name="survey" id="Radios1" value="Report as Inappropriate">
                      <label style="margin-top:15px;"> Report as Inappropriate.  </label>
                    </div>
                    <div class="radio radio-danger disabled">
                      <input type="radio" name="survey" id="Radios1" value="Contains violent or harmful content">
                      <label style="margin-top:15px;"> Contains violent or harmful content.  </label>
                    </div>
                    <div class="radio radio-danger disabled">
                      <input type="radio" name="survey" id="Radios1" value="Other">
                      <label style="margin-top:15px;"> Other  </label>
                    </div>
                   
                  </div>
               <!-- </div>-->
              </div>
              <div class="col-md-12 col-sm-12">
                <input value="Submit" class="btn btn-default btn-block" type="submit">
               
              </div>
              </form>
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