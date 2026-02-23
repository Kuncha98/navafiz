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
                                <li><a href="<?=base_url()?>">Home</a> </li>
                                <li class="active">Contact Us 5</li>
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
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="Heading-title-left black small-heading">
                                    <h3>Contact Detail</h3>
                                </div>
                                <div class="contact_block-2">
                                    <div class="content-block-box">
                                        <div class="icon-box">
                                            <i class="icon-map-pin"></i>
                                        </div>
                                        <div class="detail-box">
                                            <p>navafiz.com</p>
                                            <p>UAE</p>
                                           
                                        </div>
                                    </div>

                                </div>
                                <?php /*?><div class="contact_block-2">
                                    <div class="content-block-box">
                                        <div class="icon-box">
                                            <i class=" icon-phone"></i>
                                        </div>
                                        <div class="detail-box">
                                            <p><b class="pull-left">Help Line</b><a href="tel:+99 333 1234567" class="pull-right">+99 333 1234567</a></p>
                                            <p><b class="pull-left">Enquires</b><a href="tel:+99 333 1234567" class="pull-right">+91 456 3692587</a></p>
                                            <p><b class="pull-left">Fax</b><a href="tel:+99 333 1234567" class="pull-right">+93 798 7412589</a></p>
                                        </div>
                                    </div>

                                </div><?php */?>
                                <div class="contact_block-2">
                                    <div class="content-block-box">
                                        <div class="icon-box">
                                            <i class="icon-document"></i>
                                        </div>
                                        <div class="detail-box">
                                           <!-- <p><a href="mailto:contact@scriptsbundle.com">contact@scriptsbundle.com</a></p>
                                            <p><a href="mailto:resume@user.com">admin@scriptsbundle.com</a></p>-->
                                            <p><a href="mailto:#">
										navafiz@navafiz.com </a></p>
                                        </div>
                                    </div>

                                </div>
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="<?=$this->global_array['FACEBOOK_ADDRESS']?>" class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="<?=$this->global_array['YOUTUBE']?>" class="icon-youtube" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="<?=$this->global_array['LINKEDIN_ADDRESS']?>" class="icoLinkedin" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
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