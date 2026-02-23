<?php $this->load->view('header.php');
$admin_id = $this->session->userdata('user_id');
?>
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
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="profile-card" style="margin-top: 50px;padding: 0px;margin-bottom: 0px;"> 
                        <div class="user-image">   
                            <img src="<?=base_url()?>assets/uploads/members/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" class="img-circle" alt="<?=$profile->m_name?>">      
                        </div>
                        <div class="card-body">
                          <h3>
                            <?=$profile->m_name?>
                          </h3>
                          <span class="title">
                          <?=$profile->m_profession?>
                          </span> 
                          <span class="title">
                          <?=($profile->m_current_city == "")? "---":$profile->m_current_city?>
                          </span> 
                        </div>                            

                      </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="resume-box">

                            <div class="row">
                                <div class="col-md-12 col-xs-12 col-sm-4">
                                    <div class="my-contact">
                                        <div class="contact-info">
                                            <h4> 
                                                <a href="<?=site_url('skills')?>">Skills</a>:
                                                <font style="font-size: 14px;">
                                                <?php
                                                $str_arr = explode(",",$profile->m_skills);			  
                                                if($str_arr){
                                                    ?>              
                                                <?php for($a= 0; $a< sizeof($str_arr); $a++){
                                                    if($a>6 ) break;?>
                                                    <a href="#"> <?=$str_arr[$a]?> , </a>
                                                <?php } }  ?>
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
                                            <h4>Qualification: 
                                                <font style="font-size: 14px;">
                                                <?php
                                                $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."' order by me_year desc limit 0,1 ";
                                                $rs = mysql_query($qry);
                                                if(mysql_num_rows($rs)>0)
                                                {
                                                while($row = mysql_fetch_array($rs)){  ?>
                                                <?=$row['me_degree']?> - <?=$row['me_descr']?>
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
                            <?php
                            if(in_array($admin_id, CvReviewTeamList())){
                            ?>
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
                            <?php }?>
                        </div>
                        <p>
                            <a href="<?=site_url('profile/'.$profile->m_id);?>">My Profile Link: <?=site_url('profile/'.$profile->m_id);?></a>

                        </p>
                    </div>
                     <div class="col-md-12 col-sm-12 col-xs-12">
                    <!--<p class="about-me"> I am <b><?php echo $profile->m_profession?></b><?php echo strip_tags($profile->m_intro)?> </p>-->
                  </div>           

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="resume-box">
                            <div class="heading-inner">
                                <p class="title">
                                    <a href="<?=site_url('summary-career');?>">Summary of Career </a>
                                    <a href="<?=site_url('summary-career');?>" class="btn btn-white btn-xs pull-right" style="font-size: 25px;" title="Edit Summary of Career"><i class="fa fa-pencil"></i></a>
                                    
                                </p>
                                <div class="clearfix"></div>

                                <p>1. <?=isset($summary_points->point_1)? $summary_points->point_1:'';?></p>
                                <p>2. <?=isset($summary_points->point_1)? $summary_points->point_2:'';?></p>
                                <p>3. <?=isset($summary_points->point_1)? $summary_points->point_3:'';?></p>
                                <p>4. <?=isset($summary_points->point_1)? $summary_points->point_4:'';?></p>
                                <p>5. <?=isset($summary_points->point_1)? $summary_points->point_5:'';?></p>
                                <p>6. <?=isset($summary_points->point_1)? $summary_points->point_6:'';?></p>
                                <p>7. <?=isset($summary_points->point_1)? $summary_points->point_7:'';?></p>
                                <p>8. <?=isset($summary_points->point_1)? $summary_points->point_8:'';?></p>
                                <p>9. <?=isset($summary_points->point_1)? $summary_points->point_9:'';?></p>
                                <p>10. <?=isset($summary_points->point_1)? $summary_points->point_10:'';?></p>

                            </div>

                            <div class="heading-inner">
                                <p class="title">
                                    <a href="<?=site_url('employment-history');?>">Work Experience (Employment History)</a>
                                </p>
                            </div>                                
                             <?php
                                foreach($employment_history as $emp_history){
                                ?>
                                <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-gray"> 
                                            <a href="<?=site_url('employment-history/'.$emp_history->emp_history_id);?>" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>
                                            <a href="<?=base_url('delete-employment-history/'.$emp_history->emp_history_id)?>" onclick="return confirm('Are you Sure you want to delete this?')" class="btn btn-white btn-xs pull-right"><i class="fa fa-remove"></i></a>
                                            Experience as <b><?=$emp_history->position_designation?></b>
                                        </div>
                                        <div class="panel-body">
                                        <ul class="list-unstyled profile-about" style="list-style: none !important;">
                                            <li>
                                              <div class="row">
                                                <div class="col-sm-4"><span class="text-muted">Employer</span> </div>
                                                <div class="col-sm-8">
                                                    <?=GetCompanyName(intval($emp_history->company_name));?>
                                                </div>
                                              </div>
                                            </li>
                                            <li>
                                              <div class="row">
                                                <div class="col-sm-4"><span class="text-muted">From</span> </div>
                                                <div class="col-sm-8"><?=$emp_history->start_year;?></div>
                                              </div>
                                            </li>
                                             <li>
                                              <div class="row">
                                                <div class="col-sm-4"><span class="text-muted">To</span> </div>
                                                <div class="col-sm-8"><?=$emp_history->end_year;?></div>
                                              </div>
                                            </li>

                                            <li>
                                              <div class="row">
                                                <div class="col-sm-4"><span class="text-muted">Detail</span> </div>
                                                <div class="col-sm-8"><?=nl2br($emp_history->description);?></div>
                                              </div>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                <?php }?>                             
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="resume-box">
                            <div class="heading-inner">
                                <p class="title">
                                    <a href="<?=site_url('education');?>">Educational Information</a>
                                </p>
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
                                 
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">
                                        <a href="<?=site_url('skills');?>">Skills</a>
                                    </p>
                                </div>
                                 <?php
                                $str_arr = explode(",",$profile->m_skills);			  
                                if($str_arr){?>              
                                <?php for($a= 0; $a< sizeof($str_arr); $a++){?>
                                <a href="#" class="btn btn-success" style="margin: 0 6px 10px 0;"> <?=$str_arr[$a]?> , </a>
                                <?php } }  ?>
                            </div>

                        </div>
                        <div class="clearfix"></div>

                        <br>
                         <?php //if($this->session->userdata('user_id') == $profile->m_id){?>
                        <div class="apply-job"> <a href="<?=base_url('edit-profile')?>" class="btn btn-default" ><i class="fa fa-upload"></i>Edit Profile</a>
                        <?php if($profile->member_cv != ""){ ?>
                            <a href="<?=base_url()?>download/<?=$profile->member_cv?>" class="btn btn-default bookmark"><i class="fa fa-star"></i> Download CV</a>
                        <?php } ?>   
                        <?php //} ?>    
                    </div>


                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('footerbottom.php'); ?>
    </div>
</body>


</html>