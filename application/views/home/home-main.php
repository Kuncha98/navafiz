<?php $this->load->view('include/header');?> 
<?php $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?> 
<div class="homepage" id="homepage">
    <div class="container-mid">
        <?php $this->load->view('notification/notification-messages');?>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <!-- Recruiters & Job Seekers____________________________________ -->
                <div class="card profile">
                    <div class="card-header">
                        <b>Recruiters & Job Seekers</b>        
                    </div>
                    <div class="card-body">
                        <div class="row mx-auto">
                            <div class="col-md-3 col-xs-12 p-lg-2 p-sm-0 p-1">
                              <div class="block text-center ">
                                  <?php if($user_id>0){?>
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
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('testimonials');?>">
                                <div class="block text-center">
                                    <i class="fas fa-trophy"></i>
                                    <h6 class="h6">Testimonials  / Success Stories</h6>
                                </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                            <a href="<?=site_url('page/about');?>">
                              <div class="block text-center ">
                                  <i class="fas fa-file-alt"></i>
                                  <h6 class="h6">About Us</h6>
                              </div>
                            </a>            
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('shoutbox');?>">
                                <div class="block text-center ">
                                    <i class="fas fa-comments"></i>
                                    <h6 class="h6">Discussion Board</h6>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
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
                <div class="row">
                    <div class="col-12">
                        <p>
                            &nbsp;
                        </p>
                    </div>
                </div>
                <div class="card profile">
                    <div class="card-header">
                        <b>Job Seekers</b>
                    </div>
                    <div class="card-body">
                        <div class="row px-2">
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                              <a href="<?=site_url('job-seeker-support-system');?>">
                                <div class="block text-center ">
                                  <i class="fas fa-info-circle"></i>
                                  <h6 class="h6">Support System</h6>
                                </div>
                              </a>
                            </div>  
                              <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                              <a href="<?=site_url('find-job');?>">
                                <div class="block text-center ">
                                  <i class="fas fa-search"></i>
                                  <h6 class="h6">Find Job</h6>
                                </div>
                              </a>
                            </div>
                              <div class="col-md-3 col-xs-12 p-lg-2 p-sm-0 p-1">
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
                <div class="row">
                    <div class="col-12">
                        <p>
                            &nbsp;
                        </p>
                    </div>
                </div>
                <div class="card profile">
                    <div class="card-header">
                        <b>Recruiters</b>
                    </div>
                    <div class="card-body">
                        <div class="row px-2">
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                              <a href="<?=site_url('recruiters-support-system');?>">
                                  <div class="block text-center">
                                      <i class="fas fa-info-circle"></i>
                                      <h6 class="h6">Recruiters Support</h6>
                                  </div>

                              </a> 
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('professionals');?>">
                                    <div class="block text-center">
                                        <i class="fas fa-search"></i>
                                        <h6 class="h6">Find Professionals</h6>
                                    </div>
                                </a> 
                           </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
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
                <div class="row">
                    <div class="col-12">
                        <p>
                            &nbsp;
                        </p>
                    </div>
                </div>
                <div class="card profile">
                    <div class="card-header">
                        <b>Trainer / Coach / Mentor</b>
                    </div>
                    <div class="card-body">
                        <div class="row px-2">
                            <div class="col-md-3 col-xs-12 p-lg-2 p-sm-0 p-1">              
                              <a href="<?=site_url('mentors');?>">
                                  <div class="block text-center">
                                    <i class="fas fa-user-tie"></i>
                                    <h6 class="h6">Navafiz Mentor</h6>
                                  </div>
                              </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                              <div class="block text-center">
                                <i class="fas fa-user"></i>
                                <h6 class="h6">Professional Trainers</h6>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>
                            &nbsp;
                        </p>
                    </div>
                </div>
                <div class="card profile">
                    <div class="card-header">
                        <b>Community</b>
                    </div>
                    <div class="card-body">
                        <div class="row px-2">
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                            <a href="<?=site_url('videos');?>">
                                <div class="block text-center">
                                    <i class="fab fa-youtube"></i>
                                    <h6 class="h6">Videos</h6>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('page/uae-labour-laws');?>">
                                <div class="block text-center">
                                  <i class="fas fa-gavel"></i>
                                  <h6 class="h6">Labour Laws</h6>                  
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('whats-happening');?>">
                                    <div class="block text-center">
                                        <i class="fas fa-question-circle"></i>
                                        <h6 class="h6">Happenings</h6>                
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('faqs');?>">
                                <div class="block text-center">                
                                      <i class="fas fa-info-circle"></i>
                                      <h6 class="h6">FAQ's</h6>                
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('page/basic-arabic-words');?>">
                                <div class="block text-center">
                                    <i class="fas fa-font"></i>
                                    <h6 class="h6">Arabic Words</h6>                    
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('page/important-contact-numbers-in-uae');?>">
                                    <div class="block text-center">
                                        <i class="fas fa-headset"></i>
                                        <h6 class="h6">Contacts</h6>                    
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('job/jobseekertips');?>">
                                    <div class="block text-center">
                                        <i class="fas fa-briefcase"></i>
                                        <h6 class="h6">Job Hunt Tip</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('page/interview-tips');?>">
                                    <div class="block text-center">
                                        <i class="far fa-comments"></i>
                                        <h6 class="h6">Interview Tips</h6>                    
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="<?=site_url('');?>">
                                <div class="block text-center">
                                    <i class="fas fa-hand-holding-heart"></i>
                                    <h6 class="h6">Blood Donors</h6>                    
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>
                            &nbsp;
                        </p>
                    </div>
                </div>
                <div class="card profile">
                    <div class="card-header">
                        <b>Downloads</b>
                    </div>
                    <div class="card-body">
                        <div class="row px-2">
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a data-fancybox="samplecv" href="<?=site_url('public-assets/Navafiz_Standard_CV_Updated_Nov_2019.pdf');?>">
                                <div class="block text-center">                    
                                    <i class="fas fa-file-alt"></i>
                                    <h6 class="h6">Sample CV</h6>                    
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>
                            &nbsp;
                        </p>
                    </div>
                </div>
                <div class="card profile">
                    <div class="card-header">
                        <b>Useful Links</b>
                    </div>
                    <div class="card-body">
                        <div class="row px-2">
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="https://gulfnews.com/" target="_blank" rel="nofollow">
                                <div class="block text-center">
                                    <i class="fas fa-newspaper"></i>
                                    <h6 class="h6">Gulf News</h6>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                                <a href="https://www.khaleejtimes.com/" target="_blank" rel="nofollow">
                                <div class="block text-center">
                                    <i class="fas fa-newspaper"></i>
                                    <h6 class="h6">Khaleej Times</h6>
                                </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="card profile">
                    <div class="card-header">
                        <b>Upcoming Events</b>
                    </div>
                    <div class="card-body">
                        <?php $upcomming_events = GetUpcomingEventsList();?>
                        <?php foreach($upcomming_events as $event){?>
                        <div class="event-item" style="border-bottom:solid 1px #ccc;margin: 12px 10px;">
                            <p>
                                <b><?=$event->title?></b> <br> 
                                <?=date("d F Y g:i A",  strtotime($event->event_date));?>                                
                            </p>
                            <p>
                                <?=$event->address?>
                            </p>
                            <p>
                                <a href="<?=site_url('event/view/'.$event->e_id);?>" class="btn btn-primary" style="background-color: #164885!important;border-color: #164885!important;">Register for Event</a>
                            </p>
                        </div>
                        <?php }?>
                    </div>                        
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4 mx-auto">
            <a href="<?=site_url('jobs/quick_jobs')?>" class="btn btn-outline-secondary col-12">Easy Job Apply</a>
        </div>
    </div>
    </div>
</div>
<?php $this->load->view('include/footer');?> 