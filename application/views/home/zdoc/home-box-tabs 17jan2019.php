<link href="<?=base_url()?>assets/metrolab/css/style.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/metrolab/css/style-responsive.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/metrolab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<style>
    .home-box-tabs{
        padding: 0 0 60px 0 !important;
        
    }
</style>
<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    
<section class="home-box-tabs">
    <div class="container-fluid" style="background: #fff;">
        <div class="row-fluid">
            <h3>Recruiters &  Job Seekers</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <?php if($this->session->userdata('user_id') ==''){?>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('login');?>">
                        <i class="icon-key"></i>
                        <div class="info">Login</div>
                        <!--<div class="status">Unique Visitor</div>-->
                    </a>
                </div>
                <?php }else{?>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('logout');?>">
                        <i class="icon-user"></i>
                        <div class="info">Log out</div>
                        <div class="status"><?=$this->session->userdata('name');?></div>
                    </a>
                </div>
                <?php }?>

                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url($user_id >0 ? 'my-profile/' :'login');?>">
                        <i class="icon-file"></i>
                        <div class="info">My Profile</div>
                        <div class="status">My Digital Resume</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url($user_id >0 ? 'mycard/'.$user_id :'login');?>">
                        <i class="icon-stackexchange"></i>
                        <div class="info">My Card</div>
                        <!--<div class="status">Unique Visitor</div>-->
                    </a>
                </div>

                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('find-job');?>">
                        <i class="icon-search"></i>
                        <div class="info">Find Job</div>
                        <div class="status">Verified Jobs</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('place-job');?>">
                        <i class="icon-upload-alt"></i>
                        <div class="info">Post A Job</div>
                        <!--<div class="status">New User</div>-->
                    </a>
                </div>
                
            </div>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href='<?=site_url('professionals');?>'>
                        <i class="icon-search"></i>
                        <div class="info">Professional</div>
                        <div class="status">Active Job Seekers</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('page/resume');?>">
                        <i class="icon-bar-chart"></i>
                        <div class="info">CV Review</div>
                        <!--<div class="status">Update</div>-->
                    </a>
                </div>

                
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('page/interview-tips');?>">
                        <!--<i class="icon-tasks"></i>-->
                        <div class="info">Interview Tips</div>
                        <!--<div class="status">Stock</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('member/successstories');?>">
                        <i class="icon-flag-checkered"></i>
                        <div class="info">Testimonials</div>
                        <div class="status">Success Stories</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('page/resume');?>">
                        <i class="icon-download-alt"></i>
                        <div class="info">Downloads</div>
                        <div class="status">Sample Resume Formats</div>
                    </a>
                </div>

            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div class="row-fluid">
            <h3> Job Seekers Support System </h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-brown">
                    <a data-original-title="" href="<?=site_url('swot');?>">
                        <!--<i class="icon-remove-sign"></i>-->
                        <div class="info">MY SWOT</div>
                        <div class="status">Self Assessment</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-grey">
                    <a data-original-title="" href="<?=site_url('page/resume');?>">
                        <!--<i class="icon-external-link"></i>-->
                        <div class="info">Resume</div>
                        <div class="status">Step-2:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('page/top-job-portals');?>">
                        <!--<i class="icon-eye-open"></i>-->
                        <div class="info">Job Portals</div>
                        <div class="status">Step-3:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="<?=site_url('page/recruitment-companies');?>">
                        <!--<i class="icon-bar-chart"></i>-->
                        <div class="info">Recruiters</div>
                        <div class="status">Step-4:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('companies');?>">
                        <!--<i class="icon-ribbon"></i>-->
                        <div class="info"> Companies</div>
                        <div class="status">Step-5:</div>
                    </a>
                </div>
            </div>
            <div class="metro-nav">



                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('social-media');?>">
                        <!--<i class="icon-tasks"></i>-->
                        <div class="info"> Social Media</div>
                        <div class="status">Step-6: WhatsApp Groups</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url($user_id >0 ? 'mycard/'.$user_id :'login');?>">
                        <!--<i class="icon-envelope"></i>-->
                        <div class="info">Door to Door</div>
                        <div class="status">Step-7:</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-orange">
                    <a data-original-title="" href="<?=site_url('professionals');?>">
                        <!--<i class="icon-user"></i>-->
                        <div class="info"> References</div>
                        <div class="status">Step-8:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href='<?=site_url('professionals');?>'>
                        <!--<i class="icon-tags"></i>-->
                        <div class="info">Synergy</div>
                        <div class="status">Step-9:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('event-in-uae');?>">
                        <!--<i class="icon-comsments-alt"></i>-->
                        <div class="info"> Meet Experts</div>
                        <div class="status">Step-10:</div>
                    </a>
                </div>
            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div class="row-fluid">
            <h3>  Community  </h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('event-in-uae');?>">
                        <i class="icon-calendar"></i>
                        <div class="info">Events</div>
                        <!--<div class="status">Step-7:</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-brown">
                    <a data-original-title="" href="<?=site_url('videos');?>">
                        <i class="icon-youtube-play"></i>
                        <div class="info">Videos</div>
                        <!--<div class="status">Step-1:</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-block-grey">
                    <a data-original-title="" href="<?=site_url('page/uae-labour-laws');?>">
                        <i class="icon-legal"></i>
                        <div class="info">Labour Laws</div>
                        <!--<div class="status">Step-2:</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('happen');?>">
                        <i class="icon-map-marker"></i>
                        <div class="info">Happenings</div>
                        <!--<div class="status">Step-3:</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="<?=site_url('faqs');?>">
                        <i class="icon-question"></i>
                        <div class="info">FAQ's</div>
                        <!--<div class="status">Step-4:</div>-->
                    </a>
                </div>                
            </div>
            <div class="metro-nav">

                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('page/basic-arabic-words');?>">
                        <i class="icon-font"></i>
                        <div class="info"> Arabic Words</div>
                        <!--<div class="status">Step-6:</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('page/important-contact-numbers-in-uae');?>">
                        <i class="icon-book"></i>
                        <div class="info">Contacts</div>
                        <!--<div class="status">Step-5:</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('job/jobseekertips');?>">
                        <!--<i class="icon-ribbon"></i>-->
                        <div class="info">Job Hunt Tip</div>
                        <!--<div class="status">New Order</div>-->
                    </a>
                </div>
                
            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div class="row-fluid">
            <h3>  Downloads  </h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="http://www.navafiz.com/public-assets/Navafiz-Standard-cv-jan-2017.pdf" target="_blank">
                        <i class="icon-download-alt"></i>
                        <div class="info">Sample CV</div>
                        <!--<div class="status">New Order</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-grey">
                    <a data-original-title="" href="<?=site_url('admin');?>">
                        <i class="icon-key"></i>
                        <div class="info">Admin</div>
                        <!--<div class="status">New Order</div>-->
                    </a>
                </div>
                

            </div>
            
                
            </div>
            <div class="space10"></div>
            
            
            <!--END METRO STATES-->
        </div>
    </div>
</section>    