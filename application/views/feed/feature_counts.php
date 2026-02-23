<?php $this->load->view('include/header'); ?>
<div class="container-mid">
  <h3 class="pt-4 wow fadeInDown"></h3>
        <div class="card">
    <div class="card-body">
        <div class="row px-2">
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts()?></i>
                      <h6 class="h6">Navafiz Professional's Community Members</h6>
                  </div>
            </div>
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                <a href="<?=site_url('users_list/new_members');?>">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('24-hours')?></i>
                      <h6 class="h6">Newly Registered Members</h6>
                  </div>
                </a>
            </div>
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('success_story');?></i>
                      <h6 class="h6">Success Stories</h6>
                  </div>
            </div>
        </div>        
        <div class="row px-2">
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('cv_reviewed');?></i>
                      <h6 class="h6">Resume Reviewed</h6>
                  </div>
            </div>
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('cvapproved');?></i>
                      <h6 class="h6">Resume Approved</h6>
                  </div>
            </div>
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=count(CvReviewTeamList());?></i>
                      <h6 class="h6">Navafiz Volunteers Team </h6>
                  </div>
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('total_jobs');?></i>
                      <h6 class="h6">Total Jobs</h6>
                  </div>
            </div>
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('totallogs');?></i>
                      <h6 class="h6">Activity Logs</h6>
                  </div>
            </div>
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('totalfeed');?></i>
                      <h6 class="h6">Total Home Feed Post</h6>
                  </div>
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('totalfeedcomments');?></i>
                      <h6 class="h6">Total Comments</h6>
                  </div>
            </div>
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('mentor_assigned');?></i>
                      <h6 class="h6">Mentors Assigned for Members (Last 7-Days)</h6>
                  </div>
            </div>
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('pending_mentor_assigned');?></i>
                      <h6 class="h6">New Members pending Mentor Assigned</h6>
                  </div>
            </div>
        </div>
        <div class="row px-2">
            <div class="col-md-4 col-xs-4 p-lg-1 p-sm-0">
                  <div class="block text-center">
                      <i class="fas"><?=GetWebsiteCounts('featured');?></i>
                      <h6 class="h6">Premium Members</h6>
                  </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->load->view('include/footer'); ?>
