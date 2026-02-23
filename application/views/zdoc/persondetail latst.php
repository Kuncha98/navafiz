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
                        <h3><?php echo ucwords($profile->m_name);?></h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="about-image">
                              <?php
   if($profile->facebook_id !="")
   {
   ?>
                                
                                    <img src="http://graph.facebook.com/<?=$profile->facebook_id?>/picture?type=large" class="img-responsive" alt="">
    <?
   }else{
	   ?>
        <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" class="img-responsive" alt="" width="265">
       <?
   }
	?>                    
                              <!--  <img class="img-responsive" src="images/users/6.png" alt="">-->
                            </div>
                            <div class="resume-social">
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                   <!-- <li><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>-->
                                </ul>
                            </div>
                            <br>
                             <?php
		  	   if($this->session->userdata('user_id') == $profile->m_id){
         	?>
                            <div class="apply-job"> <a href="<?=base_url()?>profile" class="btn btn-default" ><i class="fa fa-upload"></i>Edit Profile</a>
             <a href="" class="btn btn-default bookmark"><i class="fa fa-star"></i> Download CV</a>
            
             </div>
             <?
			   }
			 ?>
                            
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">Personal Information of <?php echo ucwords($profile->m_name);?></p>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-icon">
                                                <span class="icon-profile-female"></span>
                                            </div>
                                            <div class="contact-info">
                                                <h4>Job Category: </h4>
                                                <p><?php echo ucwords($profile->c_name);?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-icon">
                                                <span class=" icon-envelope"></span>
                                            </div>
                                            <div class="contact-info">
                                                <h4>Current Employer: </h4>
                                                <p><a href="mailto:resume@user.com"><?=($profile->m_employer == "")? "---":$profile->m_employer?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-icon">
                                                <span class=" icon-phone"></span>
                                            </div>
                                            <div class="contact-info">
                                                <h4>Experience: </h4>
                                                <p><a href="tel:+9911154849901"><?=($profile->m_experience == "")? "---":$profile->m_experience;?> </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-icon">

                                                <span class="icon-calendar"></span>
                                            </div>
                                            <div class="contact-info">
                                                <h4>Nationality: </h4>
                                                <p><?=($profile->m_nationality == "")? "---":$profile->m_nationality?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-icon">
                                                <span class="icon-map-pin"></span>
                                            </div>
                                            <div class="contact-info">
                                                <h4>Employment status: </h4>
                                                <p><?=($profile->employment_status == "")? "---":$profile->employment_status;?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-icon">
                                                <span class="icon-flag"></span>
                                            </div>
                                            <div class="contact-info">
                                                <h4>Visa status: </h4>
                                                <p><?=($profile->visa_status == "")? "---":$profile->visa_status;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-icon">

                                                <span class="icon-calendar"></span>
                                            </div>
                                            <div class="contact-info">
                                                <h4>Current Location: </h4>
                                                <p><?=($profile->m_current_city == "")? "---":$profile->m_current_city?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-icon">
                                                <span class="icon-map-pin"></span>
                                            </div>
                                            <div class="contact-info">
                                                <h4>Email address: </h4>
                                                <p><?=($profile->m_email == "")? "---":$profile->m_email?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-icon">
                                                <span class="icon-flag"></span>
                                            </div>
                                            <div class="contact-info">
                                                <h4>Gender: </h4>
                                                <p><?=($profile->gender == "")? "---":$profile->gender?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="about-me"> I am <b><?php echo $profile->m_profession?></b><?php echo strip_tags($profile->m_intro)?> </p>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">Work Experience</p>
                                </div>
                                
                                 <?
				  $qry= "select * from jb_member_jobs where je_member_id = '".$profile->m_id."'";
				  $rs = mysql_query($qry);
				  if(mysql_num_rows($rs)>0)
				  {
				  while($row = mysql_fetch_array($rs))
				  {
					 
					  ?>
              <div class="row education-box">
                <div class="col-md-4 col-xs-12 col-sm-4">
                  <div class="resume-icon"> <span class="icon-clipboard"></span> </div>
                  <div class="insti-name">
                    <h4><?=$row['je_name']?></h4>
                    <span><?=$row['je_year']?></span> </div>
                </div>
                <div class="col-xs-12 col-md-8 col-sm-8">
                  <div class="degree-info">
                   <!-- <h4></h4>-->
                    <p><?=($row['je_descr'] == "")? "---":$row['je_descr'];?> </p>
                  </div>
                </div>
              </div>
              
                                  <? 
				  }
				  }
				  ?>
                                
                                
                                
                                
                                
                                
                                
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">Educational Information</p>
                                </div>
                                
                                
                                <?
				  $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."'";
				  $rs = mysql_query($qry);
				  if(mysql_num_rows($rs)>0)
				  {
				  while($row = mysql_fetch_array($rs))
				  {
					  ?>
              <div class="row education-box">
                <div class="col-md-4 col-xs-12 col-sm-4">
                  <div class="resume-icon"> <span class="icon-clipboard"></span> </div>
                  <div class="insti-name">
                    <h4><?=$row['me_degree']?></h4>
                    <span><?=$row['me_year']?></span> </div>
                </div>
                <div class="col-xs-12 col-md-8 col-sm-8">
                  <div class="degree-info">
                   <!-- <h4>Master of Business Administration</h4>-->
                    <p><?=($row['me_descr'] == "")? "---":$row['me_descr'];?> </p>
                  </div>
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
        </section>

          <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>


    </div>
</body>


</html>