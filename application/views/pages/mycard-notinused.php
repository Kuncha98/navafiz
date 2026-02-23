<style>
.profile-list .skills a {
    background-color: #f1f1f1;
    border-radius: 5px;
    font-size: 16px;
    margin: 0 10px 10px 0;
    padding: 5px 20px;
    text-transform: uppercase;
}
.resume-box .my-contact{
    margin-top: 3px !important;
}
</style>



<body>
<div class="page category-page">
    <?php $this->load->view('pagetop.php'); ?>
    <div class="clearfix"></div>
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="Heading-title-left black small-heading">
                            <h4>Job Search is about self marketing.</h4>

                            <p>Job Search Card helps to promote you on social media to highlight that you are looking for job .... it increase the chances of HR personals to contact you</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4 col-sm-6 col-xs-12"> 
                            
                            
                            
                                                  
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="profile-card" style="margin-top: 100px;padding: 0px;margin-bottom: 0px;"> 
                            <div class="user-image">      
                                <img src="<?=base_url()?>assets/uploads/members/<?=($pro_details->m_avatar == "")?"default.png":$pro_details->m_avatar?>" class="img-responsive img-circle" alt="<?=$pro_details->m_name?>">      
                            </div>
                            <div class="card-body">
                              <h3>
                                <?=$pro_details->m_name?>
                              </h3>
                              <span class="title">
                              <?=$pro_details->m_profession?>
                              </span> </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="resume-box">
                                        
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-4">
                                                <div class="my-contact">
                                                    <div class="contact-info">
                                                        <h4> Skills: 
                                                            <font style="font-size: 14px;">
                                                            <?php
                                                            $str_arr = explode(",",$profile->m_skills);			  
                                                            if($str_arr){?>              
                                                            <?php for($a= 0; $a< sizeof($str_arr); $a++){
                                                                if($a>6 )
                                                                    break;
                                                                ?>
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
                                                            <?=$row['me_descr']?> - <?=$row['me_year']?>
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
                                                        <h4>Mobile Number: 
                                                            <font style="font-size: 14px;">
                                                            <?=$profile->m_phone;?>
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
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-4">
                                                <div class="my-contact">
                                                    <div class="contact-info">
                                                        <a href="<?=site_url('professional/'.$profile->m_id);?>"><?=site_url('professional/'.$profile->m_id);?></a>
                                                    </div>
                                                </div>
                                            </div>                                    
                                        </div>
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div>
                    
                  </div>
                <a href="<?=site_url('edit-profile');?>" class="btn btn-default"><i class="fa fa-upload"></i>Edit Profile</a>
            </div>
        </section>

  <?php $this->load->view('footerbottom.php'); ?>


    </div>
</body>


</html>