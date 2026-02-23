<?php $this->load->view('header.php');
$user_id = $this->session->userdata('user_id');

$get_review_status = CVreviewStatusByUser($profile->m_id);
//echo "<pre>"; print_r($get_review_status); echo "</pre>";
?>
 <?php $member_img  = !empty($pro_details->m_avatar) ? $pro_details->m_avatar:'default.png'; ?>
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
                            <h1>Job Search Support - Tracking Sheet</h1>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="profile-card" style="margin-top: 100px;padding: 0px;margin-bottom: 0px;"> 
                                <div class="user-image">      
                                    <img src="<?=base_url()?>assets/uploads/members/<?=$member_img?>" class="img-responsive img-circle" alt="<?=$pro_details->m_name?>">
                                </div>
                                <div class="card-body">
                                  <h3>
                                    <?=$pro_details->m_name?>
                                  </h3>
                                  <span class="title">
                                    <?=$pro_details->m_profession?> <br>
                                    <?=($profile->m_current_city == "")? "---": ucwords($profile->m_current_city);?>
                                  </span> 
                                </div>
                                <div class="resume-box" style="padding: 10px;">
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
                                        <div class="col-md-8 col-xs-12 col-sm-4">
                                            <div class="my-contact">
                                                <div class="contact-info">
                                                    <h4> Profile Completion: 
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
                                                    <h4>CV Quality Status: 
                                                        <?php
                                                        if($get_review_status->review_status=='commented'){
                                                            echo "In Process";
                                                        }else if($get_review_status->review_status=='review_inprocess'){
                                                            echo "Approved";
                                                        }else{
                                                            echo "Not Submitted";
                                                        }
                                                        ?>
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
                                                    <a href="<?=site_url('profile/'.$profile->m_id);?>"><?=site_url('profile/'.$profile->m_id);?></a>
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
                    
                  </div>
                
            </div>
        </section>

  <?php $this->load->view('footerbottom.php'); ?>


    </div>
</body>


</html>