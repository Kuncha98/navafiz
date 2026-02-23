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
.trackingbox{
    padding: 20px;
}
.trackingbox .row{
    padding-top: 12px;
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
                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 0 auto;">
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
                                <div class="trackingbox">
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Skills </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <?php
                                            $str_arr = explode(",",$profile->m_skills);
                                            if(count($str_arr)>3){?>
                                            <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                            <?php }else{?>
                                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                            <?php }?> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Profile Completion: </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <?php if(!empty($profile->m_experience)>0){?>
                                            <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                            <?php }else{?>
                                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                            <?php }?> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Resume <small>(CV Quality Status)</small>: </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <?php 
                                            if(!isset($get_review_status->review_status)){
                                                echo '<img src="'.site_url('assets/frontend/images/cross.png').'" width="20" />'."CV not uploaded for Review."; 
                                            }else{

                                                if($get_review_status->assign_user_to==0){
                                                    echo ''."CV uploaded & Waiting for Mentor assignment.";
                                                }else if($get_review_status->assign_user_to>0 && $get_review_status->admin_comments==''){
                                                    echo ''."CV uploaded & Waiting Mentor Response. <b>".(GetUserDetails($get_review_status->assign_user_to)->m_name)."</b>";
                                                }else if($get_review_status->assign_user_to>0 && $get_review_status->admin_comments<>''){
                                                    echo ''."Commented by Mentor. Check your Report.";
                                                }else if($get_review_status->review_status=='review_status'){
                                                    echo ''."Resume Approved by Navafiz Team.";                                                    
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Employment status: </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <?php if($profile->employment_status == "employed"){?>
                                            <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                            <?php }else{?>
                                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Mobile Number:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <?php if($profile->m_phone == ""){?>
                                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                            <?php }else{?>
                                            <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                            <?php }?> 
                                        </div>
                                    </div>
                                    <?php foreach($userswot_data as $swot){?> 
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12"><?=  ucwords($swot->type)?>:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <?php if($swot->desc == ""){?>
                                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                                            <?php }else{?>
                                            <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                                            <?php }?>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Job Portals:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Recruiters:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Companies:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Social Media:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Door to Door:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">References:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Synergy:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Meet Experts:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Profile Link:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <a href="<?=site_url('profile/'.$profile->m_id);?>" target="_blank">
                                                <?=site_url('profile/'.$profile->m_id);?>
                                            </a>
                                        </div>
                                    </div>                                    
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">LinkedIn Profile:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <?=$profile->linkedin_profile_link;?>                                            
                                        </div>
                                    </div>                                    
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Edit Profile Link:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <a href="<?=site_url('edit-profile');?>" class="btn btn-default col-lg-12 col-xs-12"><i class="fa fa-upload"></i> Edit Profile</a>
                                        </div>
                                    </div>                                    
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">Card Link:  </div>
                                        <div class="col-lg-8 col-xs-12">
                                            <a href="<?=site_url('mycard/'.$profile->m_id);?>" class="btn btn-default col-lg-12 col-xs-12">My Card</a>
                                        </div>
                                    </div>                                    
                                </div>                                
                            </div>                            
                          </div>
                        </div>
                        
                    </div>
                    
                  </div>
                
            </div>
        </section>

  <?php $this->load->view('footerbottom.php'); ?>


    </div>
</body>


</html>