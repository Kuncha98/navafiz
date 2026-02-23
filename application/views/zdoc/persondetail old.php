<?php $this->load->view('header.php'); ?>

<body>
    <div class="page category-page">
        <!--<div id="spinner">
            <div class="spinner-img">
                <img alt="Opportunities Preloader" src="images/loader.gif" />
                <h2>Please Wait.....</h2>
            </div>
        </div>-->

            <?php $this->load->view('pagetop.php'); ?>
    <div class="clearfix"></div>


        <!--<div class="search">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept">Filter By</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">By Company</a></li>
                                    <li><a href="#">By Function</a></li>
                                    <li><a href="#">By City </a></li>
                                    <li><a href="#">By Salary </a></li>
                                    <li><a href="#">By Industry</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control search-field" name="x" placeholder="Search term...">
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Resume</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">resume</li>
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
                        
                        <div class="profile-card">
                               <!-- <div class="banner">
                                    <img src="images/building.jpg" alt="" class="img-responsive">
                                </div>-->
                                <div class="user-image">
                                    <?php
   if($profile->facebook_id !="")
   {
   ?>
                                
                                    <img src="http://graph.facebook.com/<?=$profile->facebook_id?>/picture?type=large" class="img-responsive img-circle" alt="">
    <?
   }else{
	   ?>
        <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" class="img-responsive img-circle" alt="">
       <?
   }
	?>                                
                            
                                </div>
                                <div class="card-body">
                                    <h3><?php echo ucwords($profile->m_name);?></h3>
                                    <span class="title"><?php echo ucfirst($profile->m_profession);?></span>
                                    <span class="title">Job Category :<?=($profile->c_name == "")? "---":$profile->c_name;?></span>
                                    <span class="title">Current Employer:<?=($profile->m_employer == "")? "---":$profile->m_employer?> </span>
                                    <span class="title">Gender:<?=($profile->gender == "")? "---":$profile->gender?></span>
                                    <span class="title">Nationality:<?=($profile->m_nationality == "")? "---":$profile->m_nationality?></span>
                                    <span class="title">Experience:<?=($profile->m_experience == "")? "---":$profile->m_experience;?> </span>
                                    <span class="title">Employment status:<?=($profile->employment_status == "")? "---":$profile->employment_status;?> </span>
                                <span class="title">Visa status:<?=($profile->visa_status == "")? "---":$profile->visa_status;?>  </span>
                                </div>
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="<?=($profile->m_fb == "")? "---":$profile->m_fb;?> " class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?=($profile->m_tw == "")? "---":$profile->m_tw;?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                   <!-- <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>-->
                                    <li><a href=" <?=($profile->m_lk == "")? "---":$profile->m_lk;?> " class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        
                            <?php /*?><div class="profile-photo">
                             <?php
   if($profile->facebook_id !="")
   {
   ?>
                                
                                    <img src="http://graph.facebook.com/<?=$profile->facebook_id?>/picture?type=large" class="img-responsive img-circle" alt="">
    <?
   }else{
	   ?>
        <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" class="img-responsive img-circle" alt="">
       <?
   }
	?>                                
                            
                            
                            
                            
                            
                            </div><?php */?>
                            
                        </div>
                        <div class="col-md-9 col-sm-7 col-xs-12">
                            <?php /*?><div class="profile-info">
                                <h1 class="profile-title"><?php echo ucwords($profile->m_name);?></h1>
                                <h2 class="profile-position"><?php echo ucfirst($profile->m_profession);?></h2></div><?php */?>
                         
                         
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
                                        <div class="resume-icon">
                                            <span class="icon-clipboard"></span>
                                        </div>
                                        <div class="insti-name">
                                            <h4><?=$row['je_name']?></h4>
                                            <span><?=$row['je_year']?></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                           <!-- <h4>principal software engineer</h4>-->
                                            <p> <?=($row['je_descr'] == "")? "---":$row['je_descr'];?> </p>
                                        </div>
                                    </div>
                                </div>
                                
                                  <? 
				  }
				  }
				  ?>
                            </div>
                         
                         
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
                                        <div class="resume-icon">
                                            <span class="icon-clipboard"></span>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Insitute of Managment</h4>
                                            <span><?=$row['me_year']?> </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$row['me_degree']?></h4>
                                            <p><?=($row['me_descr'] == "")? "---":$row['me_descr'];?>  </p>
                                        </div>
                                    </div>
                                </div>
                                  <? 
				  }
				  }
				  ?>



                               
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <?php /*?><div class="col-md-8 col-sm-6 col-xs-12">
                        	<div class="heading-inner">
                                <p class="title">About Me:</p>
                            </div>
                            <p>
                                I am <b>Graphic Designer.</b> Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. Duis aute irure dolor in repreh. <b>Excepteur sint occaecat</b> cupidatat non proident.
                            </p>
                            <p>
                                Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repreh. <b>Excepteur sint occaecat</b> cupidatat non proident.
                            </p>
                        </div><?php */?>
                        <?php /*?><div class="col-md-4 col-sm-6 col-xs-12">
                        	
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
                        </div><?php */?>
                        <?php /*?><div class="col-md-12 col-sm-12 col-xs-12">
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
                                        <div class="resume-icon">
                                            <span class="icon-clipboard"></span>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Insitute of Managment</h4>
                                            <span><?=$row['me_year']?> </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$row['me_degree']?></h4>
                                            <p><?=($row['me_descr'] == "")? "---":$row['me_descr'];?>  </p>
                                        </div>
                                    </div>
                                </div>
                                  <? 
				  }
				  }
				  ?>
                               
                              
                            </div>
                        </div><?php */?>
                        
                        <?php /*?><div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="heading-inner">
                                <p class="title">Skills That I have</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 92%;">
                                            <span class="sr-only">92% Complete</span>
                                        </div>
                                        <span class="progress-type">HTML / HTML5</span>
                                        <span class="progress-completed">92%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="10" style="width: 90%">
                                            <span class="sr-only">38% Complete (success)</span>
                                        </div>
                                        <span class="progress-type">PHP / MySQL</span>
                                        <span class="progress-completed">90%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                        <span class="progress-type">CSS / CSS3</span>
                                        <span class="progress-completed">80%</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete (info)</span>
                                        </div>
                                        <span class="progress-type">Java</span>
                                        <span class="progress-completed">20%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (warning)</span>
                                        </div>
                                        <span class="progress-type">JavaScript / jQuery</span>
                                        <span class="progress-completed">85%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                        <span class="progress-type">CSS / CSS3</span>
                                        <span class="progress-completed">80%</span>
                                    </div>
                                </div>
                            </div>
                        </div><?php */?>
                        

                    </div>
                </div>
            </div>
        </section>

         <?php $this->load->view('footer.php'); ?>
       <?php $this->load->view('footerbottom.php'); ?>

    </div>
</body>



</html>