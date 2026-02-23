<?php 
$session_user_id = $this->session->userdata('user_id');
if($session_user_id>0){
    $user_detail = BasicInfoUser($session_user_id);
}
?>
<style>

.profile_img{
    border-radius: 50% !important;
    border: 3px solid #215374;
    display: block;
    width: 100px;
    height: 110px;
    background-size: cover;
    margin: 0px auto 5px auto;
}
.sidenav{
}
.sidenav li{
}
.sidenav li a{
    color: rgba(0,0,0, .9);            
}
</style>
<?php if(isset($hide_left_profile) && $hide_left_profile>0){?>
<?php }else{?>    
    <?php if($session_user_id>0){?>
<div class="card profilebox">
    <div class="card-body text-center">
        <a href="<?=site_url('profile/'.$user_detail->m_id);?>" style="color: #215374;">
            <div class="profile_img rounded" style="background-image: url('<?=base_url()?>assets/uploads/members/<?=($user_detail->m_avatar == "")?"default.png":$user_detail->m_avatar?>');">
                <!--Profile Picture-->
            </div>        
            <b>
                <?=$user_detail->m_name?>
                <br />
                <?php if($user_detail->role_id>0){?>
                (<?= GetRoleName($user_detail->role_id);?>)
                <?php }?>
            </b> <br />
                <?php if($user_detail->m_branding != ''){?>
                <?= $user_detail->m_branding;?>
                <?php }?>
            <p>
                <?=$user_detail->m_profession?>
                <br />
                <?=($user_detail->m_current_city == "")? "---":$user_detail->m_current_city?>
            </p>
            <hr>        
            <i>Profile Views </i> <i class="fas fa-eye" style="font-size: 16px;margin: 0;"></i> <i><b><?= $user_detail->m_profile_view;?></b></i>
            <hr>
            <?php if(!empty($user_detail->last_login_date)){?>
            <div class="views text-center">
                <i style="color: #215374;">Last Seen: <?=DateTimeFormat($user_detail->last_login_date);?></i>
            </div>
            <?php }?>        
        </a>
        <?php if(in_array($user_detail->m_id, CvReviewTeamList())){?>        
        <hr>
        <p>
            <a class="btn btn-outline-success col-12" href="<?=site_url('mentors/usersby/'.$user_detail->m_id);?>"> Assigned Job Seekers </a>
        </p>
        <?php }?>
        <?php // if(in_array($user_detail->m_id, CvReviewTeamList())){?>   
         <!--<a href="<?=site_url('admin/jobs')?>" class="btn btn-block btn-outline-primary">Aministration Panel</a>-->
        <?php // } ?>
    </div>    
</div>
    <?php }?>
<?php }?>    
<div class="card">
    <div class="card-header"><b>Job Seekers</b></div>    
    <ul class="list-group sidenav">
        <li class="list-group-item">
            <a href="<?=site_url('job-seeker-support-system');?>">Support System</a>
        </li>	
        <li class="list-group-item">
            <a href="<?=site_url('find-job');?>">Find Job</a>
        </li>	
        <li class="list-group-item">
            <a href="<?=site_url('events');?>">Events</a>
        </li>	    	
    </ul>
</div>
<div class="card">
    <div class="card-header"><b>Recruiters</b></div>    
    <ul class="list-group sidenav">
        <li class="list-group-item">
            <a href="<?=site_url('recruiters-support-system');?>">Recruiters Support</a>
        </li>	
        <li class="list-group-item">
            <a href="<?=site_url('professionals');?>">Find Professionals</a>
        </li>	
        <li class="list-group-item">
            <a href="<?=site_url('place-job');?>">Post a Job</a>
        </li>	 
        <li class="list-group-item">
            <a href="<?=site_url('testimonials');?>">Testimonials  / Success Stories</a>
        </li>	
        <li class="list-group-item">
            <a href="<?=site_url('page/about');?>">About Us</a>
        </li>	
        <li class="list-group-item">
            <a href="<?=site_url('shoutbox');?>">Discussion Board</a>
        </li>	
        <li class="list-group-item">
            <a href="<?=site_url('pg/collaborators');?>">Navafiz Collaborators</a>
        </li>	
        <li class="list-group-item">
            <?php if($session_user_id>0){?>            
            <a href="<?=site_url('logout');?>" class="btn btn-outline-danger col-12"> Logout </a>
            <?php }else{?>            
                <a href="<?=site_url('user/login');?>" class="btn btn-outline-dark col-12">Login</a>
            <?php }?>
        </li>	
    </ul>
</div>

<div class="card">
    <div class="card-body">
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts()?></i>
                      <h6 class="h6">Navafiz Professional's Community Members</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
                <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('24-hours')?></i>
                      <h6 class="h6">Newly Registered Members</h6>
                  </div>
                 </a>
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('success_story');?></i>
                      <h6 class="h6">Success Stories</h6>
                  </div>
              </a> 
            </div>
        </div>        
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('cv_reviewed');?></i>
                      <h6 class="h6">Resume Reviewed</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('cvapproved');?></i>
                      <h6 class="h6">Resume Approved</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=count(CvReviewTeamList());?></i>
                      <h6 class="h6">Navafiz Volunteers Team </h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('total_jobs');?></i>
                      <h6 class="h6">Total Jobs</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('totallogs');?></i>
                      <h6 class="h6">Activity Logs</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('totalfeed');?></i>
                      <h6 class="h6">Total Home Feed Post</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('feature_counts');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('totalfeedcomments');?></i>
                      <h6 class="h6">Total Comments</h6>
                  </div>
              </a> 
            </div>
        </div>
    </div>
</div>
