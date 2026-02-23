<?php
$user_id = $this->session->userdata('user_id');
?>
<nav id="menu-1" class="mega-menu fa-change-black">
  <section class="menu-list-items container">
    <ul class="menu-logo">
        <li> <a href="<?=base_url()?>"> <img src="<?=base_url('assets/frontend/images/logo.png?logonew')?>" alt="logo" width="300" class="img-responsive"> </a> </li>
    </ul>
    <ul class="menu-links pull-right">
<!--      <li><a href="javascript:void(0)"> Home <i class="fa fa-angle-down fa-indicator"></i></a>
        <ul class="drop-down-multilevel">
          <li><a href="<?=base_url();?>">Home</a></li>
           <li><a href="<?=base_url()?>">Navafiz Team</a></li>
          <li><a href="<?=base_url('contact')?>">Contact Us</a></li>
          <li><a href="<?=base_url('page/about')?>">About Us</a></li>
          <li><a href="<?=base_url('member/successstories')?>">Testimonials</a></li>
        </ul>
      </li>
       <li><a href="<?=base_url()?>jobs"> Jobs</a></li>
      <li><a href="javascript:void(0)"> Recruiters <i class="fa fa-angle-down fa-indicator"></i></a>
        <ul class="drop-down-multilevel">
         
           <li><a href="<?php echo base_url()?>">Navafiz Team</a></li>
          <li><a href="<?=base_url('place-job')?>">Post A Job</a></li>
          <li><a href="<?=base_url('professionals')?>">Find Professionals</a></li>
        </ul>
      </li>
      <li><a href="<?=base_url()?>videos">VIDEOS </a></li>
      <li><a href="javascript:void(0)"> Job Seekers<i class="fa fa-angle-down fa-indicator"></i></a>
        <ul class="drop-down-multilevel">
         
           <li><a href="<?php echo base_url()?>">Navafiz Team</a></li>
          <li><a href="<?=base_url('find-job');?>">Find Jobs</a></li>
          <li><a href="<?=base_url('profile');?>">Build Online Profile</a></li>
          <li><a href="<?=base_url('cvreview');?>">Get Resume Reviewed</a></li>
          <li><a href="<?=base_url('job/jobseekertips');?>">Job Search Tips</a></li>
          <li><a href="<?=base_url('page/interview-tips');?>">Interview Tips</a></li>
           <li><a href="<?=base_url('member/successstories');?>">Success Stories</a></li>
        </ul>
      </li>
      <li><a href="javascript:void(0)"> Job Seekers Support System <i class="fa fa-angle-down fa-indicator"></i></a>
        <ul class="drop-down-multilevel">
          <li><a href="<?=base_url('page/mindset-and-attitude')?>">Step-1: Mindset & Attitude</a></li>
           <li><a href="<?php echo base_url()?>">Navafiz Team</a></li>
          <li><a href="<?=base_url('page/resume')?>">Step-2: Resume</a></li>
          <li><a href="<?=base_url('page/top-job-portals')?>">Step-3: Top 10 Job Portals</a></li>
          <li><a href="<?=base_url('page/recruitment-companies')?>">Step-4: Recruitment Companies</a></li>
          <li><a href="<?=base_url('companies')?>">Step-5: List of Companies</a></li>
          <li><a href="<?=base_url('page/social-media')?>">Step-6: Social Media</a></li>
          <li><a href="<?=base_url('page/job-search-card')?>">Step-7: Job Search Card</a></li>
          <li><a href="<?=base_url('page/references')?>">Step-8: References</a></li>
          <li><a href="<?=base_url('page/synergy')?>">Step-9: Synergy</a></li>
          <li><a href="<?=base_url('page/meet-with-expert')?>">Step-10: Meet with Expert</a></li>
        </ul>
      </li>
       <li><a href="javascript:void(0)"> Community <i class="fa fa-angle-down fa-indicator"></i></a>
        <ul class="drop-down-multilevel">
            <li><a href="<?=base_url('poll')?>">Poll</a></li>
            <li><a href="<?=base_url('videos')?>">Videos</a></li>
            <li><a href="<?=base_url('page/uae-labour-laws')?>">UAE Labour Laws</a></li>
               <li><a href="<?=base_url()?>happen">Shoutbox</a></li>
            <li><a href="<?=base_url('happen')?>">Whats happening</a></li>
            <li><a href="<?=base_url('faqs')?>">FAQs</a></li>
            <li><a href="<?=base_url('page/important-contact-numbers-in-uae')?>">Important contact numbers in UAE</a></li>
            <li><a href="<?=base_url('page/basic-arabic-words')?>">Basic Arabic Words</a></li>
            <li><a href="<?=base_url('event-in-uae')?>">Events</a></li>         
        </ul>
      </li>-->

    <?php if($this->session->userdata('user_id') ==''){?>
      <li class="no-bg login-btn-no-bg"><a href="<?=base_url('login');?>" class="btn btn-default"><i class="fa fa-upload"></i>Login</a></li>
      <li class="no-bg login-btn-no-bg"><a href="<?=base_url('register');?>" class="btn btn-default"><i class="fa fa-upload"></i>Register</a></li>
      
      <?php
        }else{
        ?>
      <li class="profile-pic">
        <a href="javascript:void(0)">                         
                        <span class="hidden-xs hidden-sm"><?php echo $this->session->userdata('name');?> </span><i class="fa fa-angle-down fa-indicator"></i> </a>
                        <ul class="drop-down-multilevel left-side">
                            <li><a href="<?=base_url('profile/'.$user_id)?>"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="<?=base_url('education')?>"><i class="fa fa-user"></i> My Education</a></li>
                            <li><a href="<?=base_url('skills')?>"><i class="fa fa-user"></i> My Skills</a></li>
                            <li><a href="<?=base_url('myjobs')?>"><i class="fa fa-user"></i> My Posts</a></li>
                            <li><a href="<?=base_url('reference')?>"><i class="fa fa-user"></i> My Reference</a></li>
                            <li><a href="<?=base_url('logout')?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
            <?php
		  }?>    
    
    </ul>
  </section>
  <marquee style="font-size:12px;">
  Each member's profile will expire after 90 days (if not updated, or not logged in).
  </marquee>
</nav>
