<?php $this->load->view('header.php'); ?>
<body>
<div class="page">
<?php $this->load->view('pagetop.php'); ?>
<div class="clearfix"></div>
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
        <?php $this->load->view('notification/notification-messages');?>
        <div class="row-fluid">
            <h3>
                Edit Profile, Skills, Career Summary, Etc.<br />
                <small><b>Note:</b> In order to join Social Media Groups & Events User Profile information should be complete.</small>
            </h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('profile');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Profile</div>
                        <div class="status">Edit Basic information</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href="<?=site_url('UpdateProfilePhoto');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Profile Picture</div>
                        <div class="status">Update Profile Picture</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('summary-career');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Career Summary</div>
                        <div class="status">Edit Summary of Career</div>
                    </a>
                </div>
                
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('education');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Education</div>
                        <div class="status">Edit  Education</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('skills');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info"> Skills</div>
                        <div class="status">Edit Skills</div>
                    </a>
                </div>
                
            </div>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('employment-history');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Employment</div>
                        <div class="status">Update Employment History</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="#">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Certificate & Courses</div>
                        <div class="status">Coming Soon...</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="#">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Hobbies</div>
                        <div class="status">Coming Soon...</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Languages</div>
                        <div class="status">Coming Soon...</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('job_portals/index/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Job Portals</div>
                        <div class="status">Job Portals Profiles</div>
                    </a>
                </div>
            </div>
            
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div style="border-top: 3px solid #666;margin-bottom: 20px;"></div>
        <div class="row-fluid">
            <div class="metro-nav">
                <div class="metro-nav-block nav-block-orange">
                    <a data-original-title="" href="<?=site_url('reference');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Reference</div>
                        <div class="status">Edit Reference</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href='<?=site_url('social-media');?>'>
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Social Media</div>
                        <div class="status">Edit Social Media</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="<?=site_url('member/successstory');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info"> Success Story</div>
                        <div class="status">Edit Success Story</div>
                    </a>
                </div>
                
                
            </div>
            
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div style="border-top: 3px solid #666;margin-bottom: 20px;"></div>
        <div class="row-fluid">
            <div class="metro-nav">
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="<?=site_url('change-password');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info"> Change Password</div>
                        <div class="status">Edit Change Password</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="<?=site_url('myjobs');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">  My Posted Jobs</div>
                        <div class="status">Edit  My Posted Jobs</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="<?=site_url('SubmitCvReview');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">   Upload Cv</div>
                        <div class="status">   Upload Cv</div>
                    </a>
                </div>                
            </div>
        </div>
        <div class="clearfix"></div>
        <div style="border-top: 3px solid #666;margin-bottom: 20px;"></div>
        <div class="row-fluid">
            <div class="metro-nav">
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href='<?=site_url('shoutbox');?>'>
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Discussion Board</div>
                        <div class="status">Navafiz Discussion Board</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href='<?=site_url('profile/'.$user_id);?>'>
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">View Profile</div>
                        <div class="status">User Public Profile</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href='<?=site_url();?>'>
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Home</div>
                        <div class="status">Navigate to Home Page</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>       
<div class="clearfix"></div>
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>