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
            <h3>Contact Us</h3>
          </div>
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a> </li>
                <li class="active">Contact Us</li>
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
                <div class="Heading-title-left black small-heading">
                  <h3>Get In Touch With us</h3>
                </div>
                <div class="form-group"> <span
                    class="successmessage"><?php echo $this->session->flashdata('msg'); ?></span> </div>
                <div class="form-group"> <span
                    class="errormessage"><?php echo $this->session->flashdata('errormsg'); ?></span> </div>
                <form class="row" action="<?= base_url() ?>sendcontact" method="post" class="login_page">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Name <span class="required">*</span></label>
                      <input placeholder="Enter name" name="name" class="form-control" type="text" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Email <span class="required">*</span></label>
                      <input placeholder="Enter email address" name="email" class="form-control" type="email" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Phone <span class="required">*</span></label>
                      <input placeholder="Enter mobile number" name="phone" class="form-control" type="text" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Subject <span class="required">*</span></label>
                      <input placeholder="Enter subject" name="subject" class="form-control" type="text" required>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Message <span class="required">*</span></label>
                      <textarea cols="6" rows="8" placeholder="Enter message" name="message" class="form-control"
                        required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <input value="Send Message" class="btn btn-default btn-block" type="submit">
                    <!--  <a href="#" class="btn btn-default"> Send Message <i class="fa fa-angle-right"></i> </a>-->
                  </div>
                </form>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="Heading-title-left black small-heading">
                  <h3>Contact Detail</h3>
                </div>
                <div class="contact_block-2">
                  <div class="content-block-box">
                    <div class="icon-box"> <i class="icon-map-pin"></i> </div>
                    <div class="detail-box">
                      <p>www.navafiz.com</p>
                    </div>
                  </div>
                </div>

                <div class="contact_block-2">
                  <div class="content-block-box">
                    <div class="icon-box"> <i class="icon-document"></i> </div>
                    <div class="detail-box">
                      <p><a href="mailto:hr@navafiz.com">hr@navafiz.com</a></p>
                    </div>
                  </div>
                </div>
                <div class="contact_block-2">
                  <div class="content-block-box">
                    <div class="icon-box"> <i class="icon-document"></i> </div>
                    <div class="detail-box">
                      <p><a href="tel:+971554465332"> +971 55 446 5332</a></p>
                    </div>
                  </div>
                </div>
                <ul class="social-network social-circle onwhite">
                  <li><a href="https://www.facebook.com/groups/JobPostMail" class="icoFacebook" title="Facebook"><i
                        class="fa fa-facebook"></i></a></li>
                  <!--  <li><a href="#" class="icoTwitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>-->
                  <li><a href="<?= $this->global_array['YOUTUBE'] ?>" class="icoGoogle" title="Google +"
                      target="_blank"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="https://www.linkedin.com/company/navafiz/" class="icoLinkedin" target="_blank"
                      title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
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