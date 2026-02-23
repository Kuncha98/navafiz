<?php $this->load->view('include/header'); ?>
<div class="container-mid">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <h3>Job Seekers Support System</h3>
      <p>
        What is your job search strategy?
      </p> 

      <p>Now a day’s people usually search jobs online, via different websites, they use social media, LinkedIn, personal references, and so on …. …..</p>

      <p>Maybe you are also trying with some similar methods …… But if you are still not getting result then you might not be trying the right way ….. Or not in an organized way ……</p>

      <p>Here in Navafiz ….. We have developed a System ….. A System to take you on board …… A step by step process to find the hidden job ……. Let’s knock the every door ….. And open every window ….
      </p>
    </div>
  </div>
  <h3 class="pt-4 wow fadeInDown"></h3>
        <div class="row px-2">
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('swot');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-info-circle"></i>
                
                <h6 class="h6">MY SWOT</h6>
                <p>Self Assesment</p>
              </div>
            </a>
          </div>  
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('cvreview');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-file"></i>
                <h6 class="h6">Resume</h6>
                <p>Step-2:</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('page/top-job-portals');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-address-card"></i>
                <h6 class="h6">Job Portals</h6>
                <p>Step-3:</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('page/recruitment-companies');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-file-signature"></i>
                <h6 class="h6">Recruiters</h6>
                <p>Step-4:</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('companies');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-building"></i>
                <h6 class="h6">Companies</h6>
                <p>Step-5:</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('social-media');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-whatsapp"></i>
                <h6 class="h6">Social Media</h6>
                <p>Step-6:</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url(!empty($session_user_id) ? 'mycard/'.$session_user_id :'login');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-door-open"></i>
                <h6 class="h6">Door to Door</h6>
                <p>Step-7:</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('professionals');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-book"></i>
                <h6 class="h6">References</h6>
                <p>Step-8:</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('professionals');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user-plus"></i>
                <h6 class="h6">Synergy</h6>
                <p>Step-9:</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('event-in-uae');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-handshake"></i>
                <h6 class="h6">Meet Experts</h6>
                <p>Step-10:</p>
              </div>
            </a>
          </div>
            
        </div>

        <div class="clearfix"></div>
            <div style="border-top: 5px solid #666;margin: 15px 0px 20px 0;"></div>

        <div class="row px-2">
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url(!empty($session_user_id) ? 'my-profile/' :'login');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user"></i>
                <h6 class="h6">My Profile</h6>
                <p>My Digital Resume</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('event-in-uae');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="far fa-calendar-alt"></i>
                <h6 class="h6">Events</h6>
               
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('shoutbox');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-users"></i>
                <h6 class="h6">Discussion Board</h6>
                <p>Navafiz Discussion Board</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('find-job');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-search"></i>
                <h6 class="h6">Find Job</h6>
                <p>Verified Jobs</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('track_steps/sheet/'.$session_user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-file-signature"></i>
                <h6 class="h6">Tracking Sheet</h6>
                <p>Job Hunt Strategy</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('7-days-plan');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-clock"></i>
                <h6 class="h6">7 Days Plan</h6>
                <p>7 Days Job Search Plan</p>

              </div>
            </a>
          </div> 
        </div>
            <div class="clearfix"></div>
            <div style="border-top: 5px solid #666;margin: 15px 0px 20px 0;"></div>
            <div class="col-md-2 col-12 p-lg-2 p-1">
            <a href="<?=site_url('jobs/quick_jobs');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-running"></i>
                <h6 class="h6">Easy Jobs</h6>
                <p>Apply Easy Jobs</p>

              </div>
            </a>
          </div> 
</div>
<?php $this->load->view('include/footer'); ?>
