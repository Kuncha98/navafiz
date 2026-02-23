<?php $this->load->view('header');
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
                        
                        <div class="col-md-4 col-sm-6 col-xs-12" style="margin: 0 auto;">
                            <div class="profile-card" style="margin-top: 100px;padding: 0px;margin-bottom: 0px;"> 
                                <div class="user-image">      
                                    <img src="<?=base_url()?>assets/uploads/members/<?=$member_img?>" class="img-responsive img-circle">
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
                                                        if(count($str_arr)>3){?>
                                                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                                        <?php }else{?>
                                                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                                        <?php }?>                                                        
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
                                                        <?php if(!empty($profile->m_experience)>0){?>
                                                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                                        <?php }else{?>
                                                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                                        <?php }?> 
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
                                                        <?php if(isset($get_review_status->review_status) && $get_review_status->review_status=='commented'){?>
                                                            <img src="<?=site_url('assets/frontend/images/inprocess-icon.png');?>" width="20" />
                                                        <?php }else if(isset($get_review_status->review_status) && $get_review_status->review_status=='review_done'){?>
                                                            <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                                        <?php }else{?>
                                                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                                        <?php }?>
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
                                                        <?php if($profile->m_nationality == ""){?>
                                                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                                        <?php }else{?>
                                                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                                        <?php }?>
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
                                                        <?php if($profile->employment_status == "employed"){?>
                                                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                                        <?php }else{?>
                                                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                                        <?php }?>
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
                                                        <?php if($profile->m_phone == ""){?>
                                                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                                        <?php }else{?>
                                                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                                        <?php }?>                                                        
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>                                    
                                    </div>                                    
                                    
                                    <?php foreach($userswot_data as $swot){?>   
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 col-sm-4">
                                            <div class="my-contact">
                                                <div class="contact-info">
                                                                                                     
                                                    <h4><?=  ucwords($swot->type)?>: 
                                                        <?php if($swot->desc == ""){?>
                                                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                                        <?php }else{?>
                                                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                                        <?php }?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
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
                        <a href="<?=site_url('edit-profile');?>" class="btn btn-default"><i class="fa fa-upload"></i> Edit Profile</a>
                        <a href="<?=site_url('mycard/'.$profile->m_id);?>" class="btn btn-default">My Card</a>
                    </div>
                    
                  </div>
                
            </div>
        </section>

  <?php $this->load->view('footerbottom.php'); ?>


    </div>
</body>


</html>