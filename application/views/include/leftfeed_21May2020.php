<?php 
$session_user_id = $this->session->userdata('user_id');
$user_detail = BasicInfoUser($session_user_id);
?>
<style>

.profile_img{
    border-radius: 50% !important;
    border: 3px solid #215374;
    display: block;
    width: 115px;
    height: 130px;
    background-size: cover;
    margin: 0px auto 20px auto;
}
</style>
<div class="card profilebox">
    <div class="card-body text-center">        
        <div class="profile_img rounded" style="background-image: url('<?=base_url()?>assets/uploads/members/<?=($user_detail->m_avatar == "")?"default.png":$user_detail->m_avatar?>');">
            <!--Profile Picture-->
        </div>        
        <b>
            <?=$user_detail->m_name?>
            <br />
            <?php if($user_detail->role_id>0){?>
            (<?= GetRoleName($user_detail->role_id);?>)
            <?php }?>
        </b>
        <p>
            <?=$user_detail->m_profession?>
            <br />
            <?=($user_detail->m_current_city == "")? "---":$user_detail->m_current_city?>
        </p>
        <hr>        
        Profile Views
        <i class="fas fa-eye" style="font-size: 16px;margin: 0;"></i> <?= $user_detail->m_profile_view;?>
        <hr>        
        <div class="views">
            
        </div>                    
        <?php if(!empty($user_detail->last_login_date)){?>
        <div class="views text-center">
            Last Login<br>                        
            <i style="color: #215374;"><?=DateTimeFormat($user_detail->last_login_date);?></i>
        </div>
        <?php }?>        
    </div>
</div>
<div class="card">    
    <div class="card-body">
        <div class="row mx-auto">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <div class="block text-center ">
                  <?php if($session_user_id>0){?>
                  <a href="<?=site_url('logout');?>">
                      <i class="fas fa-user-tie"></i>
                      <h6 class="h6">
                          <?=$this->session->userdata('name');?> <br>
                          Logout
                      </h6>
                  </a>
                  <?php }else{?>
                  <a href="<?=site_url('user/login');?>">
                      <i class="fas fa-sign-in-alt"></i>
                      <h6 class="h6">Login</h6>
                  </a>
                  <?php }?>
              </div>
            </div>
        </div>
    </div>
</div>
<style>
	.sidenav{
	}
	.sidenav li{
	}
	.sidenav li a{
            color: rgba(0,0,0, .9);            
	}
</style>
<div class="card">
    <div class="card-header"><b>Recruiters & Job Seekers</b></div>    
    <ul class="list-group sidenav">
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
    </ul>
</div>
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
    </ul>
</div>

<div class="card">
    <div class="card-header">
        <b>Recruiters & Job Seekers</b>        
    </div>
    <div class="card-body">
        <div class="row mx-auto">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <div class="block text-center ">
                  <?php if($session_user_id>0){?>
                  <a href="<?=site_url('logout');?>">
                      <i class="fas fa-user-tie"></i>
                      <h6 class="h6">
                          <?=$this->session->userdata('name');?> <br>
                          Logout
                      </h6>
                  </a>
                  <?php }else{?>
                  <a href="<?=site_url('user/login');?>">
                      <i class="fas fa-sign-in-alt"></i>
                      <h6 class="h6">Login</h6>
                  </a>
                  <?php }?>
              </div>
            </div>
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
                <a href="<?=site_url('testimonials');?>">
                <div class="block text-center">
                    <i class="fas fa-trophy"></i>
                    <h6 class="h6">Testimonials  / Success Stories</h6>
                </div>
                </a>
            </div>

            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
            <a href="<?=site_url('page/about');?>">
              <div class="block text-center ">
                  <i class="fas fa-file-alt"></i>
                  <h6 class="h6">About Us</h6>
              </div>
            </a>            
            </div>
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
                <a href="<?=site_url('shoutbox');?>">
                <div class="block text-center ">
                    <i class="fas fa-comments"></i>
                    <h6 class="h6">Discussion Board</h6>
                </div>
                </a>
            </div>
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
                <a href="<?=site_url('pg/collaborators');?>">
                <div class="block text-center">
                    <i class="fas fa-handshake"></i>
                    <h6 class="h6">Navafiz Collaborators</h6>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <b>Job Seekers</b>
    </div>
    <div class="card-body">
		
		
		<hr>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('job-seeker-support-system');?>">
                <div class="block text-center ">
                  <i class="fas fa-info-circle"></i>
                  <h6 class="h6">Support System</h6>
                </div>
              </a>
            </div>  
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('find-job');?>">
                <div class="block text-center ">
                  <i class="fas fa-search"></i>
                  <h6 class="h6">Find Job</h6>
                </div>
              </a>
            </div>
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('events');?>">
                  <div class="block text-center">
                      <i class="fas fa-calendar-alt"></i>
                      <h6 class="h6">Events</h6>
                  </div>
              </a>
            </div>
          </div>
    </div>
</div>
<div class="card profile">
    <div class="card-header">
        <b>Recruiters</b>
    </div>
    <div class="card-body">
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('recruiters-support-system');?>">
                  <div class="block text-center">
                      <i class="fas fa-info-circle"></i>
                      <h6 class="h6">Recruiters Support</h6>
                  </div>

              </a> 
            </div>
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
                <a href="<?=site_url('professionals');?>">
                    <div class="block text-center">
                        <i class="fas fa-search"></i>
                        <h6 class="h6">Find Professionals</h6>
                    </div>
                </a> 
            </div>
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
                <a href="<?=site_url('place-job');?>">
                    <div class="block text-center">
                        <i class="fas fa-sign-in-alt"></i>
                        <h6 class="h6">Post a Job</h6>
                    </div>
                </a> 
           </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('professionals');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts()?></i>
                      <h6 class="h6">Navafiz Professional's Community Members</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('testimonials');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('success_story');?></i>
                      <h6 class="h6">Success Stories</h6>
                  </div>
              </a> 
            </div>
        </div>        
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="javascript:void(0);">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('cv_reviewed');?></i>
                      <h6 class="h6">Resume Reviewed</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="javascript:void(0);">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('cvapproved');?></i>
                      <h6 class="h6">Resume Approved</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('mentors');?>">
                  <div class="block text-center">
                      <i class="fas"><?=count(CvReviewTeamList());?></i>
                      <h6 class="h6">Navafiz Volunteers Team </h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="<?=site_url('jobs');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('total_jobs');?></i>
                      <h6 class="h6">Total Jobs</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="javascript:void(0);">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('totallogs');?></i>
                      <h6 class="h6">Activity Logs</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="javascript:void(0);">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('totalfeed');?></i>
                      <h6 class="h6">Total Home Feed Post</h6>
                  </div>
              </a> 
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-12 col-xs-12 p-lg-1 p-sm-0">
              <a href="javascript:void(0);">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('totalfeedcomments');?></i>
                      <h6 class="h6">Total Comments</h6>
                  </div>
              </a> 
            </div>
        </div>
    </div>
</div>
