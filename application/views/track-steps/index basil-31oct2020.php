<?php $this->load->view('include/header');
    $user_id = $this->session->userdata('user_id');
    $get_review_status = CVreviewStatusByUser($profile->m_id);
    $cvreviews_list = CvReviewTeamList();
?>
<style>
    a{
        color: #215374;
    }
    .profile_img{
        border-radius: 50% !important;
        border: 3px solid #215374;
        display: block;
        width: 100px;
        height: 110px;
        background-size: cover;
        margin: 0px auto 5px auto;
    }    
    .card{
        margin-bottom: 12px;
        font-size: 13px;    
    }
    .heading {
        font-weight: bold;
        font-size: 13px;
        border-bottom: 1px solid #ccc;    
        margin-bottom: 5px;
    }
    .card .heading a{
        color: #000;
        line-height:    30px;
    }
    .card .details{
        font-size: 14px;
    }
    .details{
        margin-bottom: 20px;
    }    
    .trackingsheet a.profile_link{
        color: #000;
        text-decoration: none;
    }
    @media only screen and (max-width: 768px) {
        .trackingsteps .card-body{
            height: auto;
            overflow: auto;
        }
    }

</style>
<?php $member_img  = !empty($pro_details->m_avatar) ? $pro_details->m_avatar:'default.png'; ?>
<div class="container-mid">    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-xs-12 text-center">
                    <h3>10 STEPS OF NAVAFIZ JOB HUNT SUPPORT SYSTEM</h3>                    
                    
                </div>
            </div>  
        </div>
    </div>    
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <div class="card text-center">                
                <div class="card-body">
                    <a href="<?=site_url('profile/'.$pro_details->m_id);?>" class="profile_img rounded" style="background-image: url('<?=base_url()?>assets/uploads/members/<?=($pro_details->m_avatar == "")?"default.png":$profile->m_avatar?>');">
                        <!--Profile Picture-->
                    </a>
                    <b>
                        <a href="<?=site_url('profile/'.$pro_details->m_id);?>"><?=$pro_details->m_name?></a>
                        <br />
                        <?php if($pro_details->role_id>0){?>                        
                        <?php }?>
                    </b>
                    <p>
                        <?=$pro_details->m_profession?>
                        <br />
                        <?=($pro_details->m_current_city == "")? "---":$pro_details->m_current_city?>
                    </p>
                    <hr>        
                    <i>Profile Views </i> <i class="fas fa-eye" style="font-size: 16px;margin: 0;"></i> <i><b><?= $pro_details->m_profile_view;?></b></i>
                    <hr>                                    
                    <?php if(!empty($profile->last_login_date)){?>
                    <div class="views text-center">
                        <i style="color: #215374;">Last Seen: <?=DateTimeFormat($profile->last_login_date);?></i>
                    </div>
                    <?php }?>
                    <hr>
                    <a href="<?=site_url('messages/'.$pro_details->m_id);?>" class="btn btn-outline-success col-12">Chat with <?=$pro_details->m_name?></a>                    
                </div>                        
            </div>
            
            <div class="card">                
                <div class="card-header">
                    <b>Mentor</b>
                </div>
                <div class="card-body">                    
                    <?php $mentor_detail = BasicInfoUser($profile->mentor_id); ?>
                    <?php if(isset($mentor_detail->m_name) && !empty($mentor_detail->m_name)){ ?>
                        <div class="row">
                            <div class="col-md-3">
                                <a  class="profile_link" href="<?=site_url('profile/'.$mentor_detail->m_id);?>">
                                    <div class="profile_img" style="background-image: url('<?=site_url('assets/uploads/members/'.$mentor_detail->m_avatar)?>'); width: 60px;height:60px;"></div>
                                </a>                                        
                            </div>
                            <div class="col-md-9">
                                <a class="profile_link" href="<?=site_url('profile/'.$mentor_detail->m_id);?>">
                                    <b style="color: #000;"><?=$mentor_detail->m_name?></b>
                                </a>                                        
                                <p>
                                    <?=$mentor_detail->m_profession?> <br>
                                    <?=($mentor_detail->m_current_city == "")? "---": ucwords($mentor_detail->m_current_city);?>
                                </p>
                                <?php if(!empty($mentor_detail->last_login_date)){?>
                                <div class="views">
                                    Last Login: <i style="color: #215374;"><?php echo date('d F Y g:i A', strtotime($mentor_detail->last_login_date));?></i>
                                </div>
                                <?php }?>
                            </div>
                        </div>                                
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-12">                                        
                                <a class="btn btn-outline-success col-12" href="<?=site_url('track_steps/sheet/'.$mentor_detail->m_id.'#mchatbox');?>" target="_blank">Contact with <?=$mentor_detail->m_name?></a>
                            </div>
                        </div>
                        <?php }else{?>
                            <?php if($user_id==$pro_details->m_id){?>
                            <a class="btn btn-outline-success col-12 float-right" href="<?=site_url('track_steps/requestformentor/'.$pro_details->m_id);?>" onclick="return confirm('Are you sure you want to confirm?');">Need a Mentor? Request for Mentor</a>                            
                            <?php }?>                            
                        <?php }?>                        
                        <a class="btn btn-outline-success col-12" style="margin-top: 10px;" href="<?=site_url('track_steps/requestjoinprojectuplift/'.$pro_details->m_id);?>" onclick="return confirm('Are you sure you want to Join?');">Request to Join Project Uplift</a>                        
                </div>                        
            </div>
            <div class="card">
                <div class="card-header">
                    <b>Basic Info</b>
                </div>
                <div class="card-body">                    
                    <div class="heading">
                        <a href="<?=site_url('skills');?>">Skills</a>                        
                    </div>
                    <div class="details">
                        <?php
                        $str_arr = explode(",",$profile->m_skills);
                        if(count($str_arr)>2){?>
                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                        <?php }else{?>
                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                        <?php }?> 
                    </div>
                    <div class="heading">
                        <a href="<?=site_url('edit-profile');?>">Profile Completion:</a>
                    </div>
                    <div class="details">
                        <?php    
                        if(empty($profile->m_profession) || empty($profile->m_current_city) || count($str_arr)<3){
                        ?>
                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />

                        <?php }else{?>
                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                        <?php }?> 
                    </div>                    
                    <div class="heading">
                        <a href="<?=site_url('achievements/userAchievements');?>">Achievements:</a>
                    </div>
                    <div class="details">
                        <?php
                        $qry= "select * from jb_achievements where user_id = '".$profile->m_id."'";
                        $ach_results = $this->db->query($qry)->result();
                        if($ach_results){?>
                            <?php foreach($ach_results as $ach_results){ ?>
                                <p><b><?=$ach_results->title;?></b></p>
                                <p><?=($ach_results->description == "")? "---": $ach_results->description;?></p>
                            <?php }?>
                            <?php }else{?>
                            <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                            <?php }?>
                    </div>                    
                </div>                    
            </div>
            <div class="card">
                <div class="card-header">
                    <b>Employment History</b>
                </div>
                <div class="card-body">
                    <div class="heading">
                        <a href="<?=site_url('employment-history');?>">Employment History: </a>
                    </div>
                    <div class="details">
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
        <div class="col-md-6 col-xs-12">
            <?php $this->load->view('notification/notification-messages');?>
            <div class="card">
                <div class="card-header">
                    <b>Step # 1 SWOT  <small>(Self Assessment)</small></b>
                </div>
                <div class="card-body">
                    <p> A SWOT matrix is a framework for analyzing your strengths and weaknesses as well as the opportunities and threats that you face. This helps you focus on your strengths, minimize your weaknesses, and take the greatest possible advantage of opportunities available to you.</p>
                    <p><a class="btn btn-outline-info" href="https://youtu.be/YUeVk6F__94" target="_blank">Watch Video about SWOT</a></p>
                    <hr>
                    <?php if(count($userswot_data)>0){?>
                    <?php foreach($userswot_data as $swot){?>
                    <div class="heading">
                        <a href="<?=site_url('swot');?>">
                            <?php 
                                echo $swot->type=='my-weeknesses' ? 'My Weeknesses':'';
                                echo $swot->type=='my-strengths' ? 'My Strengths':'';
                                echo $swot->type=='opportunities' ? 'Opportunities':'';
                                echo $swot->type=='my-threats' ? 'Threats':'';                                
                            ?>                            
                        </a>
                    </div>
                    <div class="details">
                        <?=$swot->desc;?>
                    </div>
                    <?php }}else{?>
                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                    <?php }?>
                    <p><a class="btn btn-outline-info" href="<?=site_url('swot');?>">Know about SWOT</a></p>
                    
                    <div class="alert alert-info text-center" role="alert" style="font-size: 14px;">
                        <p><b>There are layers to our personality waiting to be unleashed to fit the right career.</b></p>
                        <p>Navafiz Recommends the services of <a href="https://mypursuitpath.com/" rel="nofollow" target="_blank" class="alert-info"><b>www.MyPursuitPath.com</b></a> <br> for further detailed SWOT analysis & Self Exploration.</p>
                    </div>
                    
                    
                </div>                    
            </div>
            
            <div class="card">
                <div class="card-header">
                    <b>Step # 2 </b>
                </div>
                <div class="card-body">
                    <div class="heading">
                        <a href="<?=site_url('SubmitCvReview');?>">Read 21 Points:</a>
                    </div>
                    <div class="details">
                        <?php 
                        if(isset($profile->read_21_points)){
                            if($profile->read_21_points==1){
                        ?>
                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                        <?php } else{?> 
                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                        <?php
                        } }?>
                        &nbsp;&nbsp;<a class="btn btn-outline-info" href="<?=site_url('SubmitCvReview');?>">Read 21 Points:</a>
                    </div>
                    <div class="heading">
                        <a href="<?=site_url('cvreview');?>">Sample Resume</a>
                    </div>
                    <div class="details">
                        <?php 
                        if(isset($profile->sample_resume)){
                            if($profile->sample_resume==1){
                        ?>
                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                         <?php } else{?> 
                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                        <?php
                        } }?>
                        
                        &nbsp;&nbsp;<a class="btn btn-outline-info" data-fancybox data-type="iframe" href="<?=site_url('public-assets/Navafiz_Standard_CV_Updated_Nov_2019.pdf');?>">Sample Resume</a>
                    </div>
                    <div class="heading">
                        <a href="<?=site_url('cvreview');?>">Upload Resume:</a>
                    </div>
                    <div class="details">
                        <?php 
                        if(isset($profile->upload_resume)){
                            if($profile->upload_resume==1){
                        ?>
                        <a href="<?=site_url('public-assets/cvreviews/'.$profile->member_cv);?>" data-fancybox="fancybox"><img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" /></a>
                        <?php } else{?> 
                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                        <?php
                        } }?>
                        
                        &nbsp;&nbsp;<a class="btn btn-outline-info" href="<?=site_url('cvreview');?>">Upload Resume</a>
                    </div>
                    <div class="heading">
                        <a data-fancybox data-type="iframe" data-src="<?=site_url('public-assets/cvreviews/'.$profile->member_cv);?>" href="javascript:;"> View Resume</a>
                    </div>
                    <div class="details">
                        <a class="btn btn-outline-info" href="<?=site_url('public-assets/cvreviews/'.$profile->member_cv);?>" data-fancybox data-type="iframe">View Resume</a>
                    </div>
                    <div class="heading">
                        <a href="<?=site_url('SubmitCvReview');?>">Resume <small>(CV Quality Status)</small></a>
                    </div>
                    <div class="details">
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
                                <?php if(in_array(intval($user_id), $cvreviews_list)){?>
                                <a href="<?=site_url('cvreport/'.$profile->m_id);?>" target="_blank">Check Report.</a>
                                <?php }?>

                            <?php }else if($get_review_status->assign_user_to>0 && $get_review_status->admin_comments<>'' && $get_review_status->review_status<>'review_done'){
                                echo ''."Commented by Mentor."; ?> 
                            <br>
                            <?php if(in_array(intval($user_id), $cvreviews_list)){?>
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
            
            <div class="card">
                <div class="card-header">
                    <b>Step # 3 , 4, 5</b>
                </div>
                <div class="card-body">                    
                    <div class="heading">
                        <a href="<?=site_url('job_portals/view/'.$profile->m_id);?>">Job Portals: </a>
                    </div>
                    <div class="details">
                        You're Registered on (<?=$jobportal_count;?>) Job Portals                        
                        <a class="btn btn-outline-info" href="<?=site_url('job_portals/view/'.$profile->m_id);?>" target="_blank"><small>(Register on Top 10 Job Portals)</small></a>
                    </div>                    
                    <div class="heading">
                        <a href="<?=site_url('recruiters/view/'.$profile->m_id);?>">Recruiters</a>
                    </div>
                    <div class="details">
                        You have Reached (<?=$recruiters_count;?>) Recruiters
                        <a class="btn btn-outline-info" href="<?=site_url('job_portals/view/'.$profile->m_id);?>" target="_blank"><small>(Know more about Recruiters)</small></a>
                    </div>                    
                    <div class="heading">
                        <a href="<?=site_url('companies');?>" target="_blank">Companies:</a>
                    </div>
                    <div class="details">
                        <a class="btn btn-outline-info" href="<?=site_url('companies');?>" target="_blank"><small>(Apply via companies pages)</small></a>
                    </div>                    
                </div>                    
            </div>
            
            <div class="card">
                <div class="card-header">
                    <b>Step # 6, 7</b>
                </div>
                <div class="card-body">                    
                    <div class="heading">
                        <a href="<?=site_url('social-media');?>">Personal Branding</a>
                    </div>
                    <div class="details">                        
                        <a class="btn btn-outline-info" href="<?=site_url();?>" target="_blank"><small>Know about Personal Branding</small></a>
                    </div>                                        
                    <div class="heading">
                        <a href="<?=site_url('social-media');?>">Whatsapp Groups</a>
                    </div>
                    <div class="details">                        
                        <a class="btn btn-outline-info" href="<?=site_url('social-media');?>" target="_blank"><small>Know about Whatsapp Groups</small></a>
                    </div>                                        
                    <div class="heading">
                        <a href="<?=site_url('social-media');?>">LinkedIn Groups</a>
                    </div>
                    <div class="details">                        
                        <a class="btn btn-outline-info" href="<?=site_url('social-media');?>" target="_blank"><small>Know about LinkedIn Groups</small></a>
                    </div>                                        
                    <div class="heading">
                        <a href="<?=site_url('profile');?>">LinkedIn Profile</a>
                        
                        <?php 
                        if($profile->linkedin_profile_is_approved>0){?>
                        <img src="<?=site_url('assets/frontend/images/track_tick.png');?>" width="20" />
                        <?php } else{?> 
                        <img src="<?=site_url('assets/frontend/images/cross.png');?>" width="20" />
                        <?php } ?>
                    </div>
                    <div class="details">                        
                        <a href="<?=$profile->linkedin_profile_link;?>" target="_blank"><small><?=$profile->linkedin_profile_link;?></small></a>
                        
                        <?php if(in_array($user_id, CvReviewTeamList())){?>
                        <a href="<?=site_url('profile/MarkLinkedProfile/'.$sheet_user_id)?>" onclick="return confirm('Are you sure you want to do this?');" class="btn btn-outline-success float-right">
                            Mark <?=$profile->linkedin_profile_is_approved>0 ?  'DisApprove':'Approved';?>
                        </a>
                        <?php }?>
                        
                        <?php if($profile->linkedin_profile_approved_by>0){
                                $approver_info = BasicInfoUser($profile->linkedin_profile_approved_by);
                        ?>
                        <div class="alert alert-info">
                            <?=$profile->linkedin_profile_is_approved>0 ?  'Approved':'DisApprove';?> by                            
                            <a class="alert-link" href="<?=site_url('profile/'.$approver_info->m_id);?>"><?=$approver_info->m_name?></a>   
                        </div>
                        <?php }?>
                    </div>
                    <div class="heading">
                        <a href="<?=site_url('companies');?>">Door to Door</a>
                    </div>
                    <div class="details">                        
                        <a class="btn btn-outline-info" href="<?=site_url('companies');?>" target="_blank"><small>Know about Door to Door</small></a>
                    </div>                                                                                     
                    
                    <div class="alert alert-info text-center" role="alert" style="font-size: 14px;">
                        <p>
                            <b>Rainbow has seven colors to it which makes it a sight to enjoy!</b> <br>
                            Find out your unique colours and make your own rainbow to light up the sky.<br>
                            Navafiz Recommends <a href="https://mypursuitpath.com/" rel="nofollow" target="_blank" class="alert-info"><b>www.MyPursuitPath.com</b></a>
                            <br />For further assistance in designing your personal brand via LinkedIn optimization.
                        </p>
                        <p>
                            Let’s follow at <a href="https://mypursuitpath.com/" rel="nofollow" target="_blank" class="btn btn-outline-success">www.MyPursuitPath.com</a>
                        </p>
                        
                        

                        
                        
                        <!--<p><b>There are layers to our personality waiting to be unleashed to fit the right career.</b></p>-->
                        <!--<p>Navafiz Recommends the services of <a href="https://mypursuitpath.com/" rel="nofollow" target="_blank" class="alert-info"><b>www.MyPursuitPath.com</b></a> <br> for further detailed SWOT analysis & Self Exploration.</p>-->
                    </div>
                </div>                    
            </div>
            
            <div class="card">
                <div class="card-header">
                    <b>Step # 8, 9, 10</b>
                </div>
                <div class="card-body">                    
                    <div class="heading">
                        <a href="<?=site_url('professionals');?>">References</a>
                    </div>
                    <div class="details">                        
                        <a class="btn btn-outline-info" href="<?=site_url('professionals');?>" target="_blank"><small>Know about References</small></a>
                    </div>                                                                                     
                    <div class="heading">
                        <a href="#">Synergy</a>
                    </div>
                    <div class="details">                        
                        Coming Soon!
                    </div>
                    <div class="heading">
                        <a href="#">Attend Navafiz Guidance Session</a>
                    </div>
                    <div class="details">                        
                        <a class="btn btn-outline-info" href="<?=site_url();?>" target="_blank"><small>Know about Upcoming Events</small></a>
                    </div>
                    <div class="heading">
                        <a href="#">Meet the expert</a>
                    </div>
                    <div class="details">                        
                        <a href="<?=site_url('event-in-uae');?>" class="btn btn-outline-info"> Meet the expert</a>
                    </div>
                </div>                    
            </div>
            
            <!-- <div class="card">
                <div class="card-header text-center"><b>Messenger (Chat with <?=$pro_details->m_name?>)</b></div>                                
            </div>
            <div id="mchatbox">
                <div  class="chatbox SheetChatboxData" style="font-size: 12px;">
                    <?php //$this->load->view('shoutbox/trackingsheet_chat');?>
                </div>
            </div>-->
        </div>
        <div class="col-md-3 col-xs-12">
            <?php if(in_array($sheet_user_id, CvReviewTeamList())){?>
            <div class="card">
                <div class="card-header"><?=$profile->m_name?> Dashboard</div>
                <div class="card-body">                    
                    <a href="<?=site_url('mentors/usersby/'.$sheet_user_id);?>">
                        Candidates Assigned <b>(<?=CandidatesCountByMentor($sheet_user_id);?>)</b>                        
                    </a>
                    <hr>
                    <a href="javascript:void(0);">
                        Resume Approved <b>(<?=ResumeApprovedByMentor($sheet_user_id);?>)</b>
                    </a>
                    <hr>
                    <a href="<?=site_url('testimonials');?>">
                        Testimonails <b>(<?=TestimonialByUser($sheet_user_id);?>)</b>
                    </a>
                    <hr>
                    <a href="<?=site_url('jobs');?>">
                        Verified Jobs Posted <b>(<?=JobcountByUser($sheet_user_id);?>)</b>
                    </a>
                    <hr>
                    <a href="<?=site_url('feed/user/'.$sheet_user_id);?>">
                        Activity  <b>(<?=FeedCountByUser($sheet_user_id);?>)</b>                        
                    </a>
                    
                </div>
            </div>
            <?php }?>
            <?php if(in_array(intval($user_id), $cvreviews_list)){?>            
            <div class="card">                
                <div class="card-header"><b>Assign Mentor</b></div>
                <div class="card-body">                    
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
                        <button type="submit" class="btn btn-outline-success col-12">Submit</button>
                        <input type="hidden" name="to_member_id" value="<?=$sheet_user_id?>" />
                    </form>                    
                </div>
            </div>
            <div class="card">                
                <div class="card-header"><b>Admin Comments</b> <br />(Only Visible to Navafiz Mentors)</div>
                <div class="card-body">
                    <form action="<?=site_url('track_steps/PostAdminComment/'.$sheet_user_id);?>" method="post">                        
                        <div class="form-group">
                            <textarea name="trackingsheet_admin_comments" class="form-control" rows="7"><?=$profile->trackingsheet_admin_comments;?></textarea>                            
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="dismissed_by" <?=$profile->dismissed_by>0 ? 'checked=""':'';?> value="1" class="form-check-input" id="dismissed_by">
                            <label class="form-check-label" for="dismissed_by"><b>Dismiss this Candidate</b></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-success col-12" value=" Save " />
                        </div>
                        <input type="hidden" name="redirect_url" value="track_steps/sheet/<?=$sheet_user_id?>" />
                    </form>                    
                </div>
            </div>                
            <?php }?>
            
            <div class="card">
                <div class="card-header">
                    <b>Actions</b>
                </div>
                <div class="card-body">                    
                    <div class="heading">
                        <a href="<?=site_url('profile/'.$profile->m_id);?>">Profile Link</a>
                    </div>
                    <div class="details">                        
                        <a href="<?=site_url('profile/'.$profile->m_id);?>" target="_blank"><?=site_url('profile/'.$profile->m_id);?></a>
                    </div>                                                                                     
                    <div class="heading">
                        <a href="<?=site_url('mycard/'.$profile->m_id);?>">My Card</a>
                    </div>
                    <div class="details">                        
                        <a href="<?=site_url('mycard/'.$profile->m_id);?>" class="btn btn-outline-info">My Card</a>
                    </div>
                    <div class="heading">
                        <a href="<?=site_url('edit-profile');?>"> Edit Profile</a>
                    </div>
                    <div class="details">                        
                        <a  href="<?=site_url('edit-profile');?>" class="btn btn-outline-info"> Edit Profile</a>
                    </div>                    
                </div>                    
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){ 
    $('.assignfrm').change(function(){
        $(this).submit();
    });
    
    loadtrackingsheetchat(<?=$sheet_user_id?>);
});

function loadtrackingsheetchat(page){        
    $.ajax({
        type: "POST",        
        url: '<?=site_url('track_steps/GetTsheetChat');?>/'+page,
        data: {},
        success: function (response){                        
            $('div.SheetChatboxData').html(response);            
            SheetChatAppends();            
        },        
    });
}

function SheetChatAppends(){
    var PostSheetFrm = $('#PostSheetFrm');
    PostSheetFrm.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: PostSheetFrm.attr('method'),
            url: PostSheetFrm.attr('action'),
            data: PostSheetFrm.serialize(),
            success: function (data) {
                loadtrackingsheetchat(<?=$sheet_user_id?>);
                PostSheetFrm.hide();
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });    
    
    $('.replybtn').on('click', function(){
        var chat_id = $(this).attr('chat_id');        
        var chat_name = $(this).attr('chat_name');        
        $('#frm_parent_id').val(chat_id);        
        $('.message_text').val('Dear '+chat_name+', ');        
    });
    
    $('.deletebtn').on('click', function(d){
        d.preventDefault();
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({            
                url: $(this).attr('href'),
                data: {},
                success: function (data) {
                    loadtrackingsheetchat(<?=$sheet_user_id?>);
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        }
        
    });    
}
</script>
<?php $this->load->view('include/footer'); ?>
