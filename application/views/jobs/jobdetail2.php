<?php $this->load->view('include/header'); ?>
<?php $session_user_id = $this->session->userdata('user_id');?>


<style>
    #shortlistedCan .dltshortList {
       position: absolute;
       top: 0px;
       right: 68px;
       color: red;
    }
    
    #shortlistedCan .mark_interview {
       position: absolute;
       right: 88px;
       top: -25px;
       color: greenyellow;
    }
    #shortlistedCan .mark_interview .fas{
      
       color: green;
    }
    
    #interview_can .dltinterview {
       position: absolute;
       top: 0px;
       right: 68px;
       color: red;
    }
    
    
</style>
<div class="d-flex justify-content-center">
<div class="row">
    
        <div class="col-md-6 col-xs-12 float-right mb-2">
            <a href="<?php echo base_url('jobs/edit/'.$job[0]->j_id);?>" class="btn btn-outline-success">Edit Job</a>
        </div>
        <div class="col-md-3 col-xs-12 float-right mb-2">
            <a href="<?php echo base_url('jobs/delete/'.$job[0]->j_id);?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
        </div>
        <div class="col-md-3 col-xs-12 float-right mb-2">
            <a href="<?php echo base_url('jobs/shortlist/'.$job[0]->j_id);?>" class="btn btn-outline-danger">Shortlist</a>
        </div>
    </div>
    
        
     </div>

    <div class="row">
        <div class="col-md-3 col-xs-12">
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
            
</div>
        <div class="col-md-6 col-xs-12">
            <?php $this->load->view('notification/notification-messages');?>
            <div class="container-mid">
    <?php if(in_array($session_user_id, CvReviewTeamList())){?>
    
    
    <?php }?>
    </div>
            <div class="card">
                <div class="card-header">
                    <h4><?=$job[0]->j_title?> </h4>
                    <?php if($job[0]->j_status==2){?>
                        <span class="btn btn-danger float-right">Job is closed</span>
                    <?php }?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if($job[0]->j_image != ""){?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="company-img"> <img src="<?=base_url()?>/assets/uploads/jobs/<?=$job[0]->j_image?>" alt="<?=$job[0]->j_title?>" style="max-width: 40%; "> </div>
                            </div>
                            <?php }?>
                            <p><?=$job[0]->j_descr?></p>                            
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-12"><b>Job Category:</b> <?=$job[0]->c_name?></div>
                        <div class="col-md-4 col-xs-12"><b>Job Country:</b> <?=$job[0]->country;?></div>
                        <div class="col-md-4 col-xs-12"><b>Job State:</b> <?=$job[0]->j_state;?></div>
                        <div class="col-md-4 col-xs-12"><b>Job City:</b> <?=$job[0]->j_location;?></div>
                        <div class="col-md-4 col-xs-12"><b>Company:</b> <?=($job[0]->j_company == "") ? "---" : $job[0]->j_company?></div>
                        <div class="col-md-4 col-xs-12"><b>Email for apply:</b> <?=($job[0]->j_email_apply == "")? "---" : $job[0]->j_email_apply?></div>
                        <div class="col-md-4 col-xs-12"><b>Posted On:</b> <?=date("M d, Y",$job[0]->j_add_date)?></div>
                        <div class="col-md-4 col-xs-12"><b>Job Added By:</b> <?=($job[0]->m_name == "") ? "Admin" : $job[0]->m_name?></div>
                        <div class="col-md-4 col-xs-12"><b>Job Reference By:</b> <?=($job[0]->m_name == "") ? "Admin" : $job[0]->job_reference_by;?></div>
                    </div>
                    <div class="mt-5 text-center">
                        <?php $url = urlencode(site_url($page_meta['og_url']));?>
                    
                        <a href="http://www.facebook.com/sharer.php?u=<?=$url?>" target="_blank" title="Facebook Share"><img src="<?=site_url('nassets/img/social-imgs/fb.png')?>" style="height:40px;width: 40px"></a>
                        <!--<a href="http://www.facebook.com/sharer.php?u=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/insta.png')?>" style="height:70px;width: 80px"></a>-->
                        <a href="http://twitter.com/share?text=<?=$page_meta['title']?>&url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/tw.png')?>" style="height:40px;width: 40px" href></a>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/in.png')?>" style="height:40px;width: 40px"></a>
                        <a href="https://plus.google.com/share?url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/gg.png')?>" style="height:40px;width: 40px"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>&nbsp;</p>
                </div>
            </div>
            <!--<div class="card profile">
                <div class="card-header"><b>Want To Apply For this Job?</b></div>
                <div class="card-body">
                    <?php if($this->session->userdata('user_id') != ""){?>
                    <div class="col-md-8 col-sm-8 col-xs-12" id="applyonlineform">
                      <div class="single-job-page">
                        <div class="col-md-12 col-sm-12 col-xs-12"><strong>Note: Before apply the job the cv should be uploaded. If still not upload the cv. <a href="<?=base_url('SubmitCvReview');?>" class="btn btn-primary" >Click to upload CV.</a></strong></div>
                        <br>
                        <br>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <form method="post" id="job-form" action="<?=base_url('job/applyonline');?>" enctype="multipart/form-data">
                            <input type="hidden" id="jobb_id" name="jobb_id" value="<?=$job->j_id?>"/>
                            <input type="hidden" id="jobb_name" name="jobb_name" value="<?=$job->j_title?>"/>
                            <input type="hidden" id="jobb_email_apply" name="jobb_email_apply" value="<?=$job->j_email_apply?>"/>
                            <div class="row clearfix">
                              <div class="column col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                  <input type="email" class="form-control" name="email"  placeholder="Email" required>
                                </div>
                              </div>
                              <div class="column col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <textarea name="message" rows="6" class="form-control" placeholder="Cover Letter" required></textarea>
                                </div>
                              </div>
                              <div class="col-md-12 col-xs-12">
                              <?php  if(empty($profile->member_cv)){?>
                                  <p style="color: #0092ef;">Your Resume is not Uploaded Please Upload your Resume first!</p>
                              <?php }?>                        
                              <div class="text-center">
                                  <input value="Submit" class="btn btn-primary" <?=empty($profile->member_cv) ? 'disabled="" ':''?> type="submit">
                              </div>
                              </div>
                            </div>
                            <input type="hidden" name="member_resume" value="<?=$profile->member_cv;?>">
                          </form>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                </div>
            </div>-->
            <div class="row">
                <div class="col-12">
                    <p>&nbsp;</p>
                </div>
            </div>
            
             <?php if(!empty($recommand_list)){?>
<!--            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><b>Recommended Candidates for this Job (<?=count($recommand_list)?>)</b></div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <?php foreach($recommand_list as $list){?>
                <div class="col-md-3 col-xs-12">
                    <div class="card">                        
                        <div class="card-body">
                            <div class="row"> 
                                <div class="col-3" style="padding-left: 0;">
                                    <div class="avatarpro img-fluid" style="background-image: url('<?=site_url('assets/uploads/members/'.$list->m_avatar);?>');">                                                      
                                        Profile Picture
                                    </div>
                                </div>
                                <div class="col-9" style="padding-left: 0;position: relative;">                            
                                    <a class="member_name" href="<?=site_url('profile/'.$list->user_id);?>"> <strong><?=$list->m_name?></strong> </a> <br />
                                    <?=$list->m_profession?><br />
                                    <?=$list->m_current_city?><br />
                                    <b>Recommendation (<?=$list->recommendations?>)</b><br />
                                    <?php if(isset($list->mentor) && !empty($list->mentor)){?>
                                    <b>Mentor:</b> <?=$list->mentor;?>
                                    <?php }?>  
                                    <a href="<?=site_url('jobs/shortlist_recommended_can').'/'.$list->job_id.'/'.$list->user_id?>" class="btn btn-outline-success float-right">Shortlist</a>
                                    <input type="hidden" name="short_id" id="short_id" value="<?php echo $list->user_id; ?>">
                                    <?php // echo $list->user_id; exit();?>
                                </div>

                          </div>
                        </div>
                    </div>
                <?php }?>
            </div>-->
            <?php } ?>   
                       <?php if(!empty($recommand_list)){?>             
            <div class="card profile" id="">
                <div class="card-header" style="background: #0056b3;color: #fff;"><h3>Recommended Candidates for this Job (<?=count($recommand_list)?>)</h3></div>
                <div class="card-body">
                    <ul class="">
                         <div class="row">
                            <?php foreach($recommand_list as $list){?>
                             <div class="col-md-4 col-xs-12">
                                 <div class="col-4" style="padding-left: 0;">
                                    <div class="avatarpro img-fluid" style="background-image: url('<?=site_url()?>assets/uploads/members/<?=($list->m_avatar == '') ?"default.png" : $list->m_avatar ?>');">                                                      
                                        <!--Profile Picture-->
                                    </div>
                                </div>
                                  <div class="col-8" style="padding-left: 0;position: relative;">                            
                                    <a class="member_name" href="<?=site_url('profile/'.$list->user_id);?>"> <strong><?=$list->m_name?></strong> </a> <br />
                                    <?=$list->m_profession?><br />
                                    <?=$list->m_current_city?><br />
                                    <b>Recommendation (<?=$list->recommendations?>)</b><br />
                                    <?php if(isset($list->mentor) && !empty($list->mentor)){?>
                                    <b>Mentor:</b> <?=$list->mentor;?>
                                    <?php }?>
                                    <b>Recommend by:</b> <a href="<?=site_url('profile/'.$list->recommend_by);?>"><?=$list->recommend_by_name;?></a>
                                    <?php // echo $list->user_id; exit();?>
                                </div>
                                <a href="<?=site_url('jobs/shortlist_recommended_can').'/'.$list->job_id.'/'.$list->user_id?>" class="btn btn-outline-success mt-3 mb-5">Shortlist</a>
                                <input type="hidden" name="short_id" id="short_id" value="<?php echo $list->user_id; ?>"> 
                             </div>
                            <?php } ?>
                         </div>
                    </ul>     
                </div>
            </div>                        
            <?php } ?>                    
                                    
                                    
                                    
                                    
                                    
                                    
           <?php if(!empty($shortlisted_can)){?>   
            <div class="card profile" id="">
                <div class="card-header" style="background: #0056b3;color: #fff;"><h3>Shortlisted Candidates (<?=count($shortlisted_can)?>)</h3></div>
                <div class="card-body">
                    <ul class="">
                         <div class="row">
                            <?php foreach($shortlisted_can as $list){?>
                             <div class="col-md-4 col-xs-12">
                                 <div class="col-4" style="padding-left: 0;">
                                    <div class="avatarpro img-fluid" style="background-image: url('<?=site_url()?>assets/uploads/members/<?=($list->m_avatar == '') ?"default.png" : $list->m_avatar ?>');">                                                      
                                        <!--Profile Picture-->
                                    </div>
                                </div>
                                <div class="col-8" style="padding-left: 0;position: relative;">                            
                                    <a class="member_name" href="<?=site_url('profile/'.$list->user_id);?>"> <strong><?=$list->m_name?></strong> </a> <br />
                                    <?=$list->m_profession?><br />
                                    <?=$list->m_current_city?><br />
                                    <b>Shortlisted by:</b> <a href="<?=site_url('profile/'.$list->updated_by);?>"><?=$list->shortlisted_by;?></a>
                                    
                                  
                                    
                                    <?php // echo $list->user_id; exit();?>
                                </div>
                                   <a href="<?=site_url('jobs/mark_interview_can').'/'.$list->user_id.'/'.$list->job_id?>" onclick="return confirm('Are you sure you want to mark interviewed this candidate?')" class="btn btn-outline-success mt-3 mb-1">Mark Interview</a><br>
                                   <a href="<?=site_url('jobs/delete_shortlist_can').'/'.$list->user_id.'/'.$list->job_id?>" onclick="return confirm('Are you sure you want to Delete this candidate?')" class="btn btn-outline-danger mb-5">Delete</a>
                                   <input type="hidden" name="short_id" id="short_id" value="<?php echo $list->user_id; ?>">
                             </div>
                            <?php } ?>
                         </div>
                    </ul>     
                </div>
            </div> 
            <?php } ?>
            
            
                                    
                                    
                                    
            <?php if(!empty($interview_can)){?>   
            <div class="card profile" id="">
                <div class="card-header" style="background: #0056b3;color: #fff;"><h3>Marked Interviewed Candidates (<?=count($interview_can)?>)</h3></div>                
                <div class="card-body">
                    <ul class="">
                         <div class="row">
                            <?php foreach($interview_can as $list){?>
                             <div class="col-md-4 col-xs-12">
                                 <div class="col-4" style="padding-left: 0;">
                                    <div class="avatarpro img-fluid" style="background-image: url('<?=site_url()?>assets/uploads/members/<?=($list->m_avatar == '') ?"default.png" : $list->m_avatar ?>');">                                                      
                                        <!--Profile Picture-->
                                    </div>
                                </div>
                                <div class="col-8" style="padding-left: 0;position: relative;">                            
                                    <a class="member_name" href="<?=site_url('profile/'.$list->user_id);?>"> <strong><?=$list->m_name?></strong> </a> <br />
                                    <?=$list->m_profession?><br />
                                    <?=$list->m_current_city?><br />
                                    <b>Marked Interviewed by:</b> <a href="<?=site_url('profile/'.$list->updated_by);?>"><?=$list->interviewed_by;?></a>
                                    
                                  
                                    
                                    <?php // echo $list->user_id; exit();?>
                                </div>
                                   
                                   <a href="<?=site_url('jobs/delete_interviewed_can').'/'.$list->user_id.'/'.$list->job_id?>" onclick="return confirm('Are you sure you want to Delete this candidate?')" class="btn btn-outline-danger mt-2 mb-5">Delete</a>
                                 
                             </div>
                            <?php } ?>
                         </div>
                    </ul>     
                </div>
            </div> 
            <?php } ?>                         
            
            
            
           
            <div class="row">
                <div class="col-12">
                    <p>&nbsp;</p>
                </div>
            </div>
            <div class="card profile" id="applyonlineform">
                <div class="card-header"><b>Comments </b></div>
                <div class="card-body">
                    <ul style="list-style: none;">
                    <?php     
                    if($jobcomments!='empty') {
                        foreach(@$jobcomments as $jobcomment){ 
                    ?>
                        <li class="comment-box">
                            <div class="col-md-2 col-sm-3 col-xs-3 comment-author-image">
                                
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-9">
                                <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($jobcomment->m_avatar == "")?"default.png":$jobcomment->m_avatar?>" class="img-circle img-responsive" alt="<?=$jobcomment->m_name?>" width="90" height="90">                                
                                <h4><a href="<?=site_url('profile/'.$jobcomment->m_id);?>"><?=$jobcomment->m_name?></a></h4>
                                <div class="news-date">  <?=$jobcomment->com_add_date?></div>
                                <p> <?=$jobcomment->com_comments?></p>
                            </div>
                        </li>
                        <?php } }?>  
                    </ul>
                    
                    <?php if($this->session->userdata('user_id') != ""){ ?>
                    <div class="commentform">
                        <form class="row" action="<?=base_url()?>job/savecomments" method="post">
                           <input type="hidden" id="com_type" name="com_type" value="job"/>
                           <input type="hidden" id="job_id" name="job_id" value="<?=$job[0]->j_id?>"/>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Comment <span class="required">*</span></label>
                                    <textarea cols="6" rows="8" placeholder="Write the comments" class="form-control" required name="comments"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" placeholder="" class="form-control" value="<?php echo $this->session->userdata('name')?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" placeholder="" class="form-control" value="<?php echo $this->session->userdata('email')?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <button class="btn btn-primary">Publish Comment</button>
                            </div>
                            
                        </form>
                    </div>
                    <?php }?>                    
                </div>
            </div>
            
            
            <!-- Latest Jobs -->
            
            
                     <div class="card profile">
                <div class="card-header"><b>Recent Jobs </b></div>
                <div class="card-body">
                    
                  
                    
                    <?php if($this->session->userdata('user_id') != ""){ ?>
                   
                     
                           <input type="hidden" id="com_type" name="com_type" value="job"/>
                           <input type="hidden" id="job_id" name="job_id" value="<?=$job[0]->j_id?>"/>
                            <!--<div class="col-md-12 col-sm-12">-->
                             
                         
                           <!--<div class=" mb-5">-->
                            <div class="col-md-12">
                                <div class="row">
                                    <?php foreach (@$top_jobs as $top_job){?>
                                    
                                    <div class="col-md-6">
                                        <div class="card">
                                           <div class="card-header">
                                               <a href="<?=site_url('jobs/delete/'.$top_job->j_id);?>" style="position: absolute;right: -7px; color:black;top: -17px;font-weight: bold;font-size: 30px;" onclick="return confirm('Are you sure you want to delete this?')">X</a>
                                               <img class="card-img-top" src="<?=base_url()?>/assets/uploads/jobs/<?=$top_job->j_image?>" style="max-width: 100%; background-size: cover; height:30%" onerror="this.style.display='none'" alt="Card image cap">
                                          </div>
                                    <div class="card-body">
                                        <h6 class="card-title mb-3"><?php echo $top_job->j_title ?><h6>
                                                <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class=""><?php echo date("M d, Y",$top_job->j_add_date) ?>
                                                </small>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <h6><?php echo $top_job->j_location ?></h6>
                                            </div>
                                            <div class="col-md-12">
                                                <small class="test"><?php echo $top_job->j_descr; ?></small>
                                            </div>
                                        </div>
                                                <a href="<?php echo base_url().'job/'.$top_job->j_id?>">
                                                  <button class="btn btn-success float-right m-1">View Details</button>
                                                </a>
                                    </div>
                                        </div>
                                        </div>
                                   
                                   
                                    <?php } ?>
                                </div>
                            </div>
<!--                               </div>-->
                                <!-- end of -->
                                
                            <style> 
                        .test{
                            display: block;
                            height: 110px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                             }
                            </style> 
                                
                          
                               <!--</div>-->
                  
                   
                    <?php }?>                    
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            <div class="col-md-4">
                <a href="<?=site_url('jobs');?>" class="btn btn-outline-success">See more Jobs</a>
            </div>
            
        </div>
        <div class="col-md-3 col-xs-12">
            <?php if($this->session->userdata('user_id') != ""){ ?>
            <a href="#applyonlineform" class="btn btn-outline-info col-12 s_scroll" >Apply For Position</a>
            <a href="<?=base_url()?>job/report-abuse/<?=$job[0]->j_id?>" class="btn btn-outline-danger col-12" style="margin-top: 10px;"> Report Abuse</a> 
            <?php }?>
            <?php if(in_array($session_user_id, CvReviewTeamList())){?>            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <form class="row" action="<?=site_url('jobs/closejob');?>" method="post">
                            <input type="hidden" id="com_type" name="com_type" value="job">
                            <input type="hidden" id="job_id" name="job_id" value="<?=$job[0]->j_id?>"/>
                             <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                     <label>Remarks for Job Close<span class="required">*</span></label>
                                     <textarea cols="6" rows="8" placeholder="Add Remarks to clsoe Job" class="form-control" required="" name="closed_remarks"><?=isset($job->closed_remarks) ? $job->closed_remarks:'';?></textarea>
                                 </div>
                             </div>                             
                             <div class="col-md-12 col-sm-12">
                                 <button type="submit" class="btn btn-primary">Close Job</button>
                             </div>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?=site_url('jobs/addFeaturedJob/'.$job[0]->j_id)?>" class="btn btn-outline-info col-12">Make Featured</a>
            <?php }?>
            <style>
                .avatarpro{
                    border-radius: 50% !important;
                    border: 1px solid #215374;
                    display: block;
                    width: 60px;
                    height: 70px;
                    background-size: cover;
                    margin: 0 0 0 10px;
                }
                .card{
                    font-size: 14px;
                    margin-bottom: 10px;
                }
                .card .card-body a.member_name{
                    color: #215374;
                }  
              
            </style>            
           
            <div class="card" style="margin:10px 0 -10px 0;">
                <div class="card-header"><b>Related Candidates</b></div>
            </div> 
             <?php 
            $p=1;
            if($relatedmembers!='empty') {
                foreach(@$relatedmembers as $relatedmember){?>
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-3" style="padding-left: 0;">
                            <div class="avatarpro img-fluid" style="background-image: url('<?=base_url()?>assets/uploads/members/<?=($relatedmember->m_avatar == "")?"default.png":$relatedmember->m_avatar?>');">                                                      
                                <!--Profile Picture-->
                            </div>
                        </div>
                        <div class="col-9" style="padding-left: 0;">                            
                            <a class="member_name" href="<?=site_url('profile/'.$relatedmember->m_id);?>"> <strong><?=$relatedmember->m_name?></strong> </a> <br />
                            <?=$relatedmember->m_profession?><br />
                            <?=$relatedmember->m_current_city?>
                        </div>
                  </div>
                </div>
            </div>
            <?php }?>
            <?php }?>            
    </div>
</div>

<?php $this->load->view('include/footer'); ?>