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
.row{
/*    color: red !important;*/
/*margin-right: 0 !important;*/
/*margin-left: 0 !important;*/
}
.resume-box .my-contact{
    margin-top: 3px !important;
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
                            <div class="profile-card" style="margin-top: 50px;padding: 0px;margin-bottom: 0px;"> 
                            <div class="user-image">      
                                <img src="<?=base_url()?>assets/uploads/members/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" class="img-responsive img-circle" alt="<?=$profile->m_name?>">      
                            </div>
                            <div class="card-body">
                              <h3>
                                <?=$profile->m_name?>
                              </h3>
                              <span class="title">
                              <?=$profile->m_profession?>
                              </span> </div>
                            

                          </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="resume-box">
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
                                                <h4>Qualification: 
                                                    <font style="font-size: 14px;">
                                                    <?php
                                                    $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."' order by me_year desc limit 0,1 ";
                                                    $rs = mysql_query($qry);
                                                    if(mysql_num_rows($rs)>0)
                                                    {
                                                    while($row = mysql_fetch_array($rs)){  ?>
                                                    <?=$row['me_degree']?> - <?=$row['me_year']?>
                                                    <?php break;} }?> 
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
                                                <h4>Nationality: 
                                                    <font style="font-size: 14px;">
                                                    <?=($profile->m_nationality == "")? "---":$profile->m_nationality?>
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
                                                <h4>Employment status: 
                                                    <font style="font-size: 14px;">
                                                    <?=($profile->employment_status == "")? "---":$profile->employment_status;?>
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
                                                <h4>Visa status: 
                                                    <font style="font-size: 14px;">
                                                    <?=($profile->visa_status == "")? "---":$profile->visa_status;?>
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
                                                <h4>Current Location: 
                                                    <font style="font-size: 14px;">
                                                    <?=($profile->m_current_city == "")? "---":$profile->m_current_city?>
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
                                                <h4>Email address: 
                                                    <font style="font-size: 14px;">
                                                    <?=($profile->m_email == "")? "---":$profile->m_email?>
                                                    </font>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <p>
                                <a href="<?=site_url('profile/'.$profile->m_id);?>">View Profile</a>
                                
                            </p>
                        </div>
                         <div class="col-md-12 col-sm-12 col-xs-12">
                        <!--<p class="about-me"> I am <b><?php echo $profile->m_profession?></b><?php echo strip_tags($profile->m_intro)?> </p>-->
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
                                        <div class="resume-icon"> 
                                            <?php if(is_numeric($row['je_name'])){?>
                                            <img src="<?=site_url(GetCompanyPicture($row['je_name']));?>" width="80">
                                            <?php }else{?>
                                            <span class="icon-clipboard"></span>
                                            <?php }?>
                                        </div>
                                        <div class="insti-name">
                                          <h4>
                                            <?php
                                            if(is_numeric($row['je_name'])){
                                                echo GetCompanyName($row['je_name']);
                                            }else{
                                                echo $row['je_name'];
                                            }
                                            ?>
                                          </h4>
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