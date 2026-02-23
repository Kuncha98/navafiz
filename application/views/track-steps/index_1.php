
<?php $this->load->view('include/header');
    $user_id = $this->session->userdata('user_id');
    $get_review_status = CVreviewStatusByUser($profile->m_id);
    $cvreviews_list = CvReviewTeamList();
?>
<?php $member_img  = !empty($pro_details->m_avatar) ? $pro_details->m_avatar:'default.png'; ?>

<style>
.trackingsheet_admincomments{
    border: solid 1px #ccc;
    border-radius: 12px;
    padding: 10px;
} 
.assignmentorbox{
    border: solid 1px #ccc;
    border-radius: 12px;
    padding: 10px 20px;
}
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
    min-width: 375px;
}
.newborderbox{
    border: solid 1px #cdcdcd;
    background-color: #fcfcfc;
    border-radius: 7px;
    font-size: 13px;
    min-width: 375px;
    margin-bottom: 10px;
    padding: 10px 10px;
}
 a.theading{
    color: #000;
    line-height:    30px;
}
.proimg{
    border-radius: 8px !important;
    border: 2px solid #215374;
    display: block;
    width: 110px;
    height: 110px;
    float: left;
    margin-right: 20px;
    background-size: cover;
}

</style>
<div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="card profiel">
                        <div class="card-header">
                            <b>Bio</b>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card profiel">
                        <div class="card-header">
                            <b>Mentor</b>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card profiel">
                        <div class="card-header">
                            <b>Basic Info</b>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card profiel">
                        <div class="card-header">
                            <b>Step # 1</b>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card profiel">
                        <div class="card-header">
                            <b>Step # 2</b>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card profiel">
                        <div class="card-header">
                            <b>Step # 3 , 4, 5</b>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card profiel">
                        <div class="card-header">
                            <b>Step # 6</b>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="row text-center">        
                <div class="col-md-5 col-xs-12">
                    <b>Tracking Sheet</b>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">            
                    <div class="row">
                        <div class="col-md-4">
                            <div class="proimg" style="background-image: url('<?=site_url('assets/uploads/members/'.$member_img)?>');"></div>
                        </div>
                        <div class="col-md-6">
                            <b><?=$pro_details->m_name?></b>
                            <p>
                                <?=$pro_details->m_profession?> <br>
                                <?=($profile->m_current_city == "")? "---": ucwords($profile->m_current_city);?>
                            </p>
                        </div>

                        <div class="col-lg-12 col-xs-5">

                        </div>
                        <div class="col-lg-12 col-xs-5">

                        </div>
                    </div>
                </div>                
            </div>    
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">Mentor </div>
                        <div class="col-lg-8 col-xs-6">                    
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('skills');?>">Skills</a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
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
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('edit-profile');?>">Profile Completion:</a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
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
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('employment-history');?>">Employment History: </a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
                            <?php if(!empty($employment_history)){
                                foreach ($employment_history as $key => $row) {      
                            ?>
                            <?php
                            $company_name = GetCompanyName(intval($row->company_name));
                            $company_id = GetCompanyName(intval($row->company_id));
                            ?>
                            <p style="margin-top: 5px;"><strong><?= !empty($company_name) ? $company_name : $company_id  ;?></strong> <br>
                                <?= $row->start_year;?> <strong>to</strong> <?= $row->end_year;?> 
                            </p>
                            <?php } }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">
                    <div class="row">
                        <div class="col-12">
                            <b>Step # 1 </b>
                        </div>
                    </div>            
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('swot');?>">
                                SWOT <br>
                                <span style="font-size:12px; ">(Self Assessment)</span>
                            </a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
                            <?php if(isset($userswot_data[0]->desc) && !empty($userswot_data[0]->desc)){?>
                            <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                            <?php }else{?>
                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                            <?php }?>
                        </div>
                    </div>            
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">
                    <div class="row">
                        <div class="col-12">
                            <b>Step # 2 </b>
                        </div>
                    </div>            
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('SubmitCvReview');?>">Read 21 Points:</a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
                            <?php if(isset($profile->read_21_points)){
                                if($profile->read_21_points==1){
                            ?>
                            <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                             <?php } else{?> 
                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                            <?php
                            } }?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('cvreview');?>">Sample Resume</a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
                            <?php if(isset($profile->sample_resume)){
                                if($profile->sample_resume==1){
                            ?>
                            <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                             <?php } else{?> 
                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                            <?php
                            } }?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('cvreview');?>">Upload Resume:</a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
                            <?php if(isset($profile->upload_resume)){
                                if($profile->upload_resume==1){
                            ?>
                            <a href="<?=site_url('public-assets/cvreviews/'.$profile->member_cv);?>" data-fancybox="fancybox"><img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" /></a>
                             <?php } else{?> 
                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                            <?php
                            } }?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" data-fancybox data-type="iframe" data-src="<?=site_url('public-assets/cvreviews/'.$profile->member_cv);?>" href="javascript:;"> View Resume: </a>                            
                        </div>
                        <div class="col-lg-8 col-xs-5">
                            <a href="<?=site_url('public-assets/cvreviews/'.$profile->member_cv);?>" data-fancybox data-type="iframe">Click here to view</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('SubmitCvReview');?>">Resume</a> <small>(CV Quality Status)</small>: </div>
                        <div class="col-lg-8 col-xs-5">
                            <?php 
                            if(!isset($get_review_status->review_status)){
                                echo '<img src="'.site_url('assets/frontend/images/cross.png').'" width="20" />'."CV not uploaded for Review."; 
                            }else{
                                if($get_review_status->assign_user_to==0){
                                    echo ''."CV uploaded & Waiting for Mentor assignment.";?>
                                    <a href="<?=site_url('cvreport/'.$profile->m_id);?>" target="_blank">Check Report.</a>
                                <?php                            
                                }else if($get_review_status->assign_user_to>0 && $get_review_status->admin_comments==''){
                                    echo ''."CV uploaded & Waiting Mentor Response. <b>".(GetUserDetails($get_review_status->assign_user_to)->m_name)."</b>";?>
                                    <?php if(in_array(intval($user_id), $cvreviews_list,TRUE)){?>
                                    <a href="<?=site_url('cvreport/'.$profile->m_id);?>" target="_blank">Check Report.</a>
                                    <?php }?>

                                <?php }else if($get_review_status->assign_user_to>0 && $get_review_status->admin_comments<>'' && $get_review_status->review_status<>'review_done'){
                                    echo ''."Commented by Mentor."; ?> 
                                <br>
                                <?php if(in_array(intval($user_id), $cvreviews_list,TRUE)){?>
                                <a href="<?=site_url('cvreport/'.$profile->m_id);?>" target="_blank">Check Report.</a>
                                <?php }?>
                                <br>
                                <a href="<?=site_url('cvreport/'.$profile->m_id);?>" target="_blank">Check Your Own Report.</a>
                            <?php
                                }else if($get_review_status->review_status=='review_done'){
                                    echo ''."<b>Congrats Resume Approved by Navafiz Team.</b>";
                                }
                            }
                            ?>                                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">
                    <div class="row">
                        <div class="col-12">
                            <b>Step # 3 , 4, 5</b>
                        </div>
                    </div>                        
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('job_portals/view/'.$profile->m_id);?>">Job Portals: </a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
                            <?=$jobportal_count;?>
                            <a class="theading" href="<?=site_url('job_portals/view/'.$profile->m_id);?>" target="_blank"><small>(Click here to register on Top 10 Job Portals)</small></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('recruiters/view/'.$profile->m_id);?>">Recruiters:</a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
                            <?=$recruiters_count;?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-5">
                            <a class="theading" href="<?=site_url('companies');?>" target="_blank">Companies: <small>(Click here to Apply via companies pages)</small></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">
                    <div class="row">
                        <div class="col-12">
                            <b>Step # 6</b>
                        </div>
                    </div>            
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('social-media');?>">Personal Branding:</a>
                        </div>
                        <div class="col-lg-8 col-xs-5">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-xs-5">
                            <a class="theading" href="<?=site_url('social-media');?>">
                                Whatsapp Groups
                            </a>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-xs-5">
                            <a class="theading" href="<?=site_url('social-media');?>">
                                LinkedIn Groups
                            </a>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('profile');?>">
                                LinkedIn Profile:  
                            </a>
                        </div>
                        <div class="col-lg-8 col-xs-5">
                            <?=$profile->linkedin_profile_link;?>                                            
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">
                    <div class="row">
                        <div class="col-12">
                            <b>Step # 7</b>
                        </div>
                    </div>            
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('companies');?>">
                                Door to Door:
                            </a>
                        </div>
                        <div class="col-lg-8 col-xs-5">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">
                    <div class="row">
                        <div class="col-12">
                            <b>Step # 8, 9, 10</b>
                        </div>
                    </div>                         
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            <a class="theading" href="<?=site_url('professionals');?>">References:</a>
                        </div>
                        <div class="col-lg-8 col-xs-5">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">
                            Synergy:
                        </div>
                        <div class="col-lg-8 col-xs-5">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <a class="theading" href="<?=site_url('event-in-uae');?>">Attend Navafiz Guidance Session</a>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">Meet the expert:  </div>
                        <div class="col-lg-8 col-xs-5">
                            <a  href="<?=site_url('event-in-uae');?>" class="btn btn-info"> Meet the expert</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 newborderbox">
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">Profile Link:  </div>
                        <div class="col-lg-8 col-xs-5">
                            <a href="<?=site_url('profile/'.$profile->m_id);?>" target="_blank">
                                <?=site_url('profile/'.$profile->m_id);?>
                            </a>
                        </div>
                    </div>                              
                    <div class="row">
                        <div class="col-lg-4 col-xs-5">Edit Profile Link:  </div>
                        <div class="col-lg-8 col-xs-5">
                            <a href="<?=site_url('edit-profile');?>" class="btn btn-info"> Edit Profile</a>
                        </div>
                    </div>                            
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-lg-4 col-xs-5">Card Link:  </div>
                        <div class="col-lg-8 col-xs-5">
                            <a href="<?=site_url('mycard/'.$profile->m_id);?>" class="btn btn-info">My Card</a>
                        </div>
                    </div>   
                </div>
            </div>    
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="text-center">
                <b>Messenger (Chat box)</b>
            </div>
            <?php $this->load->view('shoutbox/trackingsheet_chat');?>
        </div>
    </div>
    <?php if(in_array(intval($user_id), $cvreviews_list,TRUE)){?>
    <div class="row">
        <div class="col-md-6">
            <div class="assignmentorbox">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h4>Assign Mentor</h4>
                    </div>
                </div>
                <div class="row">
                    <?php $this->load->view('notification/notification-messages');?>
                </div>
                <div class="row">       
                    <div class="col-md-12">
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
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="trackingsheet_admincomments">
                <div class="row"  style="margin-top: 40px;">
                    <div class="col-md-12">
                        <form action="<?=site_url('track_steps/PostAdminComment/'.$card_user_id);?>" method="post">
                            <label><h4>Admin Comments</h4></label>
                            <textarea name="trackingsheet_admin_comments" class="form-control" rows="7"><?=$profile->trackingsheet_admin_comments;?></textarea>

                            <input type="submit" class="btn btn-info mt-2" value=" Save " />
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
