<?php $this->load->view('include/header');
$user_id = $this->session->userdata('user_id');
$get_review_status = CVreviewStatusByUser($profile->m_id);
$cvreviews_list = CvReviewTeamList();
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
    color: #000;
}
.trackingbox{
    padding: 20px;
}
.trackingbox .row,.borderbox .row{
    padding-top: 12px;
}
.borderbox{
    border: solid 1px #cdcdcd;
    background-color: #fcfcfc;
    border-radius: 7px;
    font-size: 13px;
}
.borderbox a.theading{
    color: #000;
    font-weight: bold;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h4>Job Search Support - Tracking Sheet</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-12 borderbox">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <b><?=$pro_details->m_name?></b>
                </div>
                <div class="col-lg-12 col-xs-12">
                    <?=$pro_details->m_profession?> <br>
                    <?=($profile->m_current_city == "")? "---": ucwords($profile->m_current_city);?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">Mentor </div>
                <div class="col-lg-8 col-xs-12">
                    
                    <?php
                    $mentor_detail = GetUserDetails($profile->mentor_id);
                    if(isset($mentor_detail->m_name) && !empty($mentor_detail->m_name)){
                    ?>
                    <a href="<?=site_url('profile/'.$mentor_detail->m_id)?>" target="_blank">
                        <?=$mentor_detail->m_name;?>
                    </a>
                    <?php }else{?>
                    <b>Not yet Assigned</b>
                    <?php }?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('skills');?>">Skills</a>
                </div>
                <div class="col-lg-8 col-xs-12">
                    <?php
                    $str_arr = explode(",",$profile->m_skills);
                    if(count($str_arr)>2){?>
                    <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                    <?php }else{?>
                    <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                    <?php }?> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('edit-profile');?>">Profile Completion:</a>
                </div>
                <div class="col-lg-8 col-xs-12">
                <?php    
                    if(empty($profile->m_profession) || empty($profile->m_current_city) || count($str_arr)<3){
                    ?>
                    <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                    
                    <?php }else{?>
                    <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                    <?php }?> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('SubmitCvReview');?>">Resume</a> <small>(CV Quality Status)</small>: </div>
                <div class="col-lg-8 col-xs-12">
                    <?php 
                    if(!isset($get_review_status->review_status)){
                        echo '<img src="'.site_url('assets/frontend/images/cross.png').'" width="20" />'."CV not uploaded for Review."; 
                    }else{

                        if($get_review_status->assign_user_to==0){
                            echo ''."CV uploaded & Waiting for Mentor assignment.";
                        }else if($get_review_status->assign_user_to>0 && $get_review_status->admin_comments==''){
                            echo ''."CV uploaded & Waiting Mentor Response. <b>".(GetUserDetails($get_review_status->assign_user_to)->m_name)."</b>";
                        }else if($get_review_status->assign_user_to>0 && $get_review_status->admin_comments<>'' && $get_review_status->review_status<>'review_done'){
                            echo ''."Commented by Mentor."; ?> 
                        <br>
                        <?php if(in_array(intval($user_id), $cvreviews_list,TRUE)){?>
                        <a href="<?=site_url('cvreport/'.$profile->m_id);?>" target="_blank">Check Report.</a>
                        <?php }?>
                        <br>
                        <a href="<?=site_url('mycvreport');?>" target="_blank">Check Your Own Report.</a>                        
                        
                    <?php
                        }else if($get_review_status->review_status=='review_done'){
                            echo ''."<b>Congrats Resume Approved by Navafiz Team.</b>";
                        }
                    }
                    ?>
                    <br />
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('employment-history');?>">Employment status: </a>
                </div>
                <div class="col-lg-8 col-xs-12">
                    <?php if($profile->employment_status == "employed"){?>
                    <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                    <?php }else{?>
                    <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                    <?php }?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('profile');?>">Mobile Number:</a>
                </div>
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
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('swot');?>">
                        <?= ucwords($swot->type)?>:  
                    </a>
                </div>
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
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('page/top-job-portals');?>">Job Portals: </a>
                </div>
                <div class="col-lg-8 col-xs-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('page/recruitment-companies');?>">Recruiters:</a>
                </div>
                <div class="col-lg-8 col-xs-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('companies');?>">Companies:</a>
                </div>
                <div class="col-lg-8 col-xs-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('social-media');?>">Social Media:</a>
                </div>
                <div class="col-lg-8 col-xs-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    Door to Door:
                </div>
                <div class="col-lg-8 col-xs-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('professionals');?>">References:</a>  
                </div>
                <div class="col-lg-8 col-xs-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    Synergy:
                </div>
                <div class="col-lg-8 col-xs-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <a class="theading" href="<?=site_url('event-in-uae');?>">Meet Experts: </a>
                </div>
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
                    <a href="<?=site_url('edit-profile');?>" class="btn btn-info"> Edit Profile</a>
                </div>
            </div>                                    
            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-4 col-xs-12">Card Link:  </div>
                <div class="col-lg-8 col-xs-12">
                    <a href="<?=site_url('mycard/'.$profile->m_id);?>" class="btn btn-info">My Card</a>
                </div>
            </div>                                    
            </div>
    </div>
    <?php    
    if(in_array(intval($user_id), $cvreviews_list,TRUE)){
    ?>
    <div class="row" style="margin-top: 40px;">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1>Assign Mentor</h1>
        </div>
    </div>
    <div class="row">
        <?php $this->load->view('notification/notification-messages');?>
    </div>
    <div class="row">       
        <form action="<?=site_url('cvreview/AssignMentor')?>" class="assignfrm" method="post">
            <div class="form-group">
                <label>Select Mentor</label>
                <select name="mentor_id"  class="form-control">
                    <option value="0">Select member</option> 
                    <?php foreach($cvreviews_list as $team_member_id){?>
                    <option value="<?=$team_member_id?>" <?=GetUserDetails($user_id)->mentor_id ==$team_member_id ? 'selected=""':''?>>
                        <?=GetUserDetails($team_member_id)->m_name;?> - <?=GetUserDetails($team_member_id)->m_profession;?>
                    </option> 
                    <?php }?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="to_member_id" value="<?=$card_user_id?>" />
        </form>
    </div>
    <?php }?>
</div>
<script>
  $(document).ready(function(){ 
      $('.assignfrm').change(function(){
         $(this).submit();
      });
  });
  </script>
<?php $this->load->view('include/footer'); ?>
