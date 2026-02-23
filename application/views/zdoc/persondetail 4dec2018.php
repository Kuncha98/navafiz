<?php $this->load->view('header.php'); ?>
<style>
.profile-list .skills a {
    background-color: #f1f1f1;
    border-radius: 5px;
    font-size: 16px;
    margin: 0 10px 10px 0;
    padding: 5px 20px;
    text-transform: uppercase;
}
</style>
<body>
<div class="page category-page">
    <?php $this->load->view('pagetop.php'); ?>
    <div class="clearfix"></div>

        <div class="clearfix"></div>
        
        
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="about-image">
                                <img src="<?=base_url()?>assets/uploads/members/<?=($profile->m_avatar == "") ? "default.png":$profile->m_avatar;?>" class="img-responsive" alt="<?=$profile->m_name?>" width="265">                            
                            </div>
<!--                            <div class="resume-social">
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="<?=$profile->m_fb?>" class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?=$profile->m_tw?>" class="icoTwitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?=$profile->m_lk?>" class="icoGoogle" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>-->
                                                    
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="resume-box">
                                <div class="row">
                                    <div class="col-md-5 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-info">
                                                <h4> <?=$profile->m_name;?></h4>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-info">
                                                <h4> 
                                                    <font style="font-size: 14px;">
                                                    <?=$profile->m_profession?>
                                                    </font>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-info">
                                                <h4> Experience: 
                                                    <font style="font-size: 14px;">
                                                    <?=$profile->m_experience;?>
                                                    </font>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-info">
                                                <h4> Skills: 
                                                    <font style="font-size: 14px;">
                                                    <?php
                                                    $str_arr = explode(",",$profile->m_skills);			  
                                                    if($str_arr){?>              
                                                    <?php for($a= 0; $a< sizeof($str_arr); $a++){?>
                                                        <a href="#"> <?=$str_arr[$a]?> , </a>
                                                    <?php } }  ?>
                                                    </font>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-info">
                                                <h4> Academic Qualification: 
                                                    <font style="font-size: 14px;">
                                                    <?php
                                                    $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."'";
                                                    $rs = mysql_query($qry);
                                                    if(mysql_num_rows($rs)>0)
                                                    {
                                                    while($row = mysql_fetch_array($rs)){  ?>
                                                      <div class="row education-box">
                                                        <div class="col-md-12 col-xs-12 col-sm-4">                                                          
                                                          <div class="insti-name">
                                                            <h4><?=$row['me_degree']?> - <?=$row['me_year']?></h4>
                                                            <p><?=($row['me_descr'] == "")? "---":$row['me_descr'];?> </p>
                                                          </div>
                                                        </div>                                                        
                                                      </div>
                                                      <?php break;} }?>        
                                                    </font>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            
                                            <div class="contact-info">
                                                <h4>Nationality: </h4>
                                                <p><?=($profile->m_nationality == "")? "---":$profile->m_nationality?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            
                                            <div class="contact-info">
                                                <h4>Employment status: </h4>
                                                <p><?=($profile->employment_status == "")? "---":$profile->employment_status;?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
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
                                            <div class="contact-info">
                                                <h4>Current Location: </h4>
                                                <p><?=($profile->m_current_city == "")? "---":$profile->m_current_city?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-info">
                                                <h4>Email address: </h4>
                                                <p><?=($profile->m_email == "")? "---":$profile->m_email?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="my-contact">
                                            <div class="contact-info">
                                                <h4>Gender: </h4>
                                                <p><?=($profile->gender == "")? "---":$profile->gender?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="heading-inner">
                                    <p class="title">Skills</p>
                                </div>-->
                                <br><br>
                                <ul class="resume7 profile-list">
                                  <?php
                                    $str_arr = explode(",",$profile->m_skills);			  
                                    if($str_arr){?>              
                                    <li class="skills"> 
                                    <?php for($a= 0; $a< sizeof($str_arr); $a++){?>
                                        <a href="#"> <?=$str_arr[$a]?></a>
                                    <?php } }  ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                         <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="about-me"> I am <b><?php echo $profile->m_profession?></b><?php echo strip_tags($profile->m_intro)?> </p>
                      </div>           
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">Work Experience</p>
                                </div>                                
                                 <?php
				  $qry= "select * from jb_member_jobs where je_member_id = '".$profile->m_id."'";
				  $rs = mysql_query($qry);
				  if(mysql_num_rows($rs)>0)
				  {
				  while($row = mysql_fetch_array($rs)){?>
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
                                  <?php } } ?>                              
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">Educational Information</p>
                                </div>
                                <?php
				  $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."'";
				  $rs = mysql_query($qry);
				  if(mysql_num_rows($rs)>0)
				  {
				  while($row = mysql_fetch_array($rs)){  ?>
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
                                    <?php } }?>              
                            </div>
                            <br>
                             <?php if($this->session->userdata('user_id') == $profile->m_id){?>
                            <div class="apply-job"> <a href="<?=base_url()?>profile" class="btn btn-default" ><i class="fa fa-upload"></i>Edit Profile</a>
                            <?php if($profile->member_cv != ""){ ?>
                                <a href="<?=base_url()?>download/<?=$profile->member_cv?>" class="btn btn-default bookmark"><i class="fa fa-star"></i> Download CV</a>
                            <?php } ?>            
                            </div>
                            <?php } ?>    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
          <?php // $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>


    </div>
</body>


</html>