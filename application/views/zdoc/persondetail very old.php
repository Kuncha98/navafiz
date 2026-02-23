<?php $this->load->view('header.php'); ?>

<body>
<div class="page category-page">
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Profile</h3>
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
  <section class="resume2 resume7">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="col-md-3 col-sm-5 col-xs-12">
            <div class="profile-photo">
            
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
            
            
           <!-- <img src="images/users/14.jpg" alt="" class="img-responsive">--></div>
            <div class="resume-social">
              <ul class="social-network social-circle onwhite">
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-9 col-sm-7 col-xs-12">
            <div class="profile-info">
              <h1 class="profile-title"><?php echo ucwords($profile->m_name);?></h1>
              <h2 class="profile-position"><?php echo ucfirst($profile->m_profession);?></h2>
             <!-- <span style="float:right;">
              <a href="#applyonlineform" class="btn btn-default" ><i class="fa fa-upload"></i>Apply For Position</a>
             <a href="" class="btn btn-default bookmark"><i class="fa fa-star"></i> Report Abuse</a>
              </span>-->
            </div>
            <ul class="profile-list">
            <li class=""> <strong class="title">Job Category</strong> <span class="cont"><?=($profile->c_name == "")? "---":$profile->c_name;?></span> </li>
             <li class=""> <strong class="title">Current Employer</strong> <span class="cont"><?=($profile->m_employer == "")? "---":$profile->m_employer?> </span> </li>
               <li class=""> <strong class="title">Experience</strong> <span class="cont"><?=($profile->m_experience == "")? "---":$profile->m_experience;?> </span> </li>
               <li class=""> <strong class="title">Nationality:</strong> <span class="cont"><?=($profile->m_nationality == "")? "---":$profile->m_nationality?></span> </li>
              
                 <li class=""> <strong class="title">Employment status</strong> <span class="cont"><?=($profile->employment_status == "")? "---":$profile->employment_status;?> </span> </li>
                  <li class=""> <strong class="title">Visa status</strong> <span class="cont"><?=($profile->visa_status == "")? "---":$profile->visa_status;?></span> </li>
     <li class=""> <strong class="title">Current_location:</strong> <span class="cont"><?=($profile->m_current_city == "")? "---":$profile->m_current_city?></span> </li>              
            
             <li class=""> <strong class="title">Email address:</strong> <span class="cont"><?=($profile->m_email == "")? "---":$profile->m_email?></span> </li>              
            
     <li class=""> <strong class="title">Gender:</strong> <span class="cont"><?=($profile->gender == "")? "---":$profile->gender?></span> </li>              
            
            <!--  <li class=""> <strong class="title">Member Since</strong> <span class="cont">January, 09 1993</span> </li>
              <li class=""> <strong class="title">E-mail:</strong> <span class="cont"><a href="mailto:resume@user.com">resume@user.com</a></span> </li>
              <li class=""> <strong class="title">Phone:</strong> <span class="cont"><a href="tel:+9911154849901">+99 111 548 499 01</a></span> </li>
              <li class=""> <strong class="title">Address:</strong> <span class="cont">24P Street Makhdoomi, Belgium Netherlands </span> </li>-->
              <?php
			  $str_arr = explode(",",$profile->m_skills);
			  
			 if($str_arr){
			  ?>
              
              <li class="skills"> 
			  <?php
			  for($a= 0; $a< sizeof($str_arr); $a++){
			  ?>
              <a href="#"> <?=$str_arr[$a]?></a>
			  
              <?
			  }
			 }
			  ?>
              
              <!--<a href="#"> php developer</a><a href="#"> Graphic Designing</a><a href="#"> Photoshop</a>--> </li>
            </ul>
            <!--<h4><strong> About Me:</strong></h4>
                            
                            --> 
          </div>
          <div class="clearfix"></div>
          <!--<div class="col-md-12 col-sm-6 col-xs-12">
            <div class="heading-inner">
              <p class="title">About Me:</p>
            </div>
            <p> I am <b>Graphic Designer.</b> Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. Duis aute irure dolor in repreh. <b>Excepteur sint occaecat</b> cupidatat non proident. </p>
            <p> Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repreh. <b>Excepteur sint occaecat</b> cupidatat non proident. </p>
          </div>-->
          <!--<div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-area">
              <h4 class="contact-me-heading">Contact Me</h4>
              <form role="form">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" type="textarea" id="message" placeholder="Message" rows="2"></textarea>
                </div>
                <button type="button" id="submit" name="submit" class="btn btn-default pull-right">Send</button>
              </form>
            </div>
          </div>-->
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