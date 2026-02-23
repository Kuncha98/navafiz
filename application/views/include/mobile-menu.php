<?php $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?> 
<?php $session_user_id = $user_id;?> 
<?php $loggedin_name = $this->session->userdata('name') =='' ? 0: $this->session->userdata('name');?>
<?php $loggedin_email = $this->session->userdata('email') =='' ? 0: $this->session->userdata('email');?>
<?php $loggedin_avatar = $this->session->userdata('avatar') =='' ? 0: $this->session->userdata('avatar');?>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.css" integrity="sha512-yg3olXA5aDt98qI2xFlJh8wTWtxH9g/P1sSEk03r0Y53ihjcNGmt/tgQml6NJjr6iBJ2hucn66BPYrtQLvpyPA==" crossorigin="anonymous" />



<style>
.nmob-menu {
    background-color: #30385a;
}
.nmob-menu p {
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

.nmob-menu a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}
.nmob-menu .navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.nmob-menu .navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.nmob-menu .line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.nmob-menu #sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: -250px;
    height: 100vh;
    z-index: 999;    
    background-color: #30385a;
    color: #fff;
    transition: all 0.3s;
    overflow-y: scroll;
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
}

.nmob-menu #sidebar.active {
    left: 0;
}

.mobmenuoverlay {
    position: fixed;
    width: 100%;
    height: 100vh;
    text-align: right;    
    background-color: rgba(0,0,0, 0.6);
    display: none;
    top: 0;
}
.mobmenuoverlay.active {
    display: block;
    opacity: 1;
}

.nmob-menu #sidebar .sidebar-header {
    padding: 10px;
    background: #30385a;
    color: #fff;    
    position: relative;
    height: 65px;
}
.nmob-menu .prohead{}
.nmob-menu .prohead .closemenu{
    position: absolute;
    right: 0px;
    top: -25px;
}
.nmob-menu .prohead .closemenu i{
    color: #fff;
    font-size: 35px;
}
.nmob-menu .prohead .pname{
    position: absolute;
    left: 69px;
    top: 21px;
}
.nmob-menu .prohead .editplink{
    position: absolute;
    left: 69px;
    top: 48px;
    font-size: 12px;
}
.nmob-menu .prohead .viewplink{
    position: absolute;
    left: 135px;
    top: 48px;
    font-size: 12px;
}
.nmob-menu .prohead .profile_photo{
    width: 50px;
    height: 50px;
    display: block;
    border: solid 2px #fff;
    position: absolute;
    left: 5px;
    top: 15px;
    border-radius: 50%;
    background-position: center center;
    background-size: cover;
}

.nmob-menu #sidebar ul.components {
    padding: 20px 5px;    
    font-size: 12px;
    font-weight: bold;
}

.nmob-menu #sidebar ul p {
    color: #fff;
    padding: 10px;
}
.nmob-menu #sidebar ul li ul{
    padding-left: 14px;
}
.nmob-menu #sidebar ul li {
    border-bottom: solid 1px #c0c0c0;
}
.nmob-menu #sidebar ul li ul li a{
    font-weight: normal;
}
.nmob-menu #sidebar ul li ul li:last-child{
    border: none;
}
.nmob-menu #sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
    position: relative;
}
.nmob-menu #sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}
.nmob-menu #sidebar ul li.active>a,.nmob-menu  a[aria-expanded="true"] {
    color: #fff;
    background: #30385a;
}

.nmob-menu a[data-toggle="collapse"] {
    position: relative;
}

.nmob-menu  .dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    font-size: 20px;
}
@media (max-width: 480px) {
    .nmob-menu .prohead .closemenu{
        top: -10px;
    }
}
</style>
<div class="nmob-menu">
    <nav  id="sidebar" class="pt-3">
        <div class="sidebar-header prohead">
            <a class="closemenu mt-3" href="javascritp:void(0)"><i class="fas fa-arrow-left"></i></a>
            <span class="profile_photo" style="background-image: url('<?=profile_picture($session_user_id);?>');"></span>
            <a class="pname" href="<?=site_url('profile');?>"><strong><?=$loggedin_name?></strong></a>            
            <a class="editplink" href="<?=site_url('edit-profile');?>">Edit Profile</a>            
            <a class="viewplink" href="<?= site_url('profile')?>/<?= $user_id;?>">View Profile</a>            
        </div>
        <div style="margin-top: 20px;">
            <?php 
                if(in_array($session_user_id, CvReviewTeamList())){
                    $team_notifications = NotificationByType(array('cvreview','events','event_message','company','testimonial','mentors','general_message','tsheet_message','registration',null));?>
            <a href="<?= site_url('notifications');?>" class="btn btn-outline-success col-12"> Activity Log for admin <b>(<?= !empty($team_notifications) ? count($team_notifications) : 0;?>)</b></a>
            <?php }?>
                    
            <?php $public_notifications = NotificationByType(array('whatshappening','job','events','event_message','general_message','company','testimonial','general_message','registration'));?>
            
            <a href="<?= site_url('notifications/notificationtype/whatshappening');?>" class="btn btn-outline-success col-12" style="margin-top: 10px;"> Activity Log <b>(<?= !empty($public_notifications) ? count($public_notifications) : 0;?>)</b></a>
            
            <a href="<?= site_url('profile/AddCV');?>" class="btn btn-success col-12" style="margin-top: 10px;">Upload Resume</a>
            
        </div>
        
        
        <ul class="list-unstyled components">            
            <?php if($session_user_id>0){?>
            <li class="active"> 
                <a class="dropdown-toggle" href="#Settings" data-toggle="collapse" aria-expanded="false">Settings</a>
                <ul class="collapse list-unstyled" id="Settings">                    
                    <li><a href="<?=site_url('profile/username');?>">Update Username</a></li>
                    <li><a href="<?=site_url('profile');?>">Edit Profile</a></li>                    
                    <li><a href="<?=site_url('UpdateProfilePhoto');?>">Edit Profile Picture</a></li>
                    <li><a href="<?=site_url('summary-career');?>">Career Summary</a></li>
                    <li><a href="<?=site_url('education');?>">Add Education</a></li>
                    <li><a href="<?=site_url('skills');?>">Add Skills</a></li>
                    <li><a href="<?=site_url('employment');?>">Add Experience</a></li>
                    <li><a href="<?=site_url('job_portals/index/'.$session_user_id);?>">Add Job Portals</a></li>
                    <li><a href="<?=site_url('change-password');?>">Change Password</a></li>
                </ul>
            </li>
            <?php }?>
            <li class="active"> 
                <a class="dropdown-toggle" href="#JobSeekers" data-toggle="collapse" aria-expanded="false">Job Seekers</a>
                <ul class="collapse list-unstyled" id="JobSeekers">
                    <li><a href="<?=site_url('job-seeker-support-system');?>">Support System</a></li>                    
                    <li><a href="<?=site_url('find-job');?>">Find Job</a></li>                    
                    <li><a href="<?=site_url('events');?>">Events</a></li>                                        
                </ul>
            </li>
            <li>      
                <a class="dropdown-toggle" href="#Recruiters" data-toggle="collapse" aria-expanded="false">Recruiters</a>
                <ul class="collapse list-unstyled" id="Recruiters">
                    <li><a href="<?=site_url('recruiters-support-system');?>">Recruiters Support</a></li>                    
                    <li><a href="<?=site_url('professionals');?>">Find Professionals</a></li>                    
                    <li><a href="<?=site_url('place-job');?>">Post a Job</a></li>                                        
                </ul>
            </li>
            <li>          
                <a class="dropdown-toggle" href="#TrainerCoachMentor" data-toggle="collapse" aria-expanded="false">Trainer / Coach / Mentor</a>
                <ul class="collapse list-unstyled" id="TrainerCoachMentor">
                    <li><a href="<?=site_url('mentors');?>">Navafiz Mentor</a></li>                    
                    <li><a href="<?=site_url('professionals');?>">Professional Trainers</a></li>                                        
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#Community" data-toggle="collapse" aria-expanded="false">Community</a>
                <ul class="collapse list-unstyled" id="Community">
                    <li><a href="<?=site_url('videos');?>">Videos</a></li>
                    <li><a href="<?=site_url('page/uae-labour-laws');?>">Labour Laws</a></li>                                        
                    <li><a href="<?=site_url('whats-happening');?>">Happenings</a></li>
                    <li><a href="<?=site_url('faqs');?>">FAQ's</a></li>
                    <li><a href="<?=site_url('page/basic-arabic-words');?>">Arabic Words</a></li>
                    <li><a href="<?=site_url('page/important-contact-numbers-in-uae');?>">Contacts</a></li>
                    <li><a href="<?=site_url('job/jobseekertips');?>">Job Hunt Tip</a></li>
                    <li><a href="<?=site_url('page/interview-tips');?>">Interview Tips</a></li>
                    <li><a href="<?=site_url('');?>">Blood Donors</a></li>                    
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#Downloads" data-toggle="collapse" aria-expanded="false">Downloads</a>
                <ul class="collapse list-unstyled" id="Downloads">
                    <li><a href="<?=site_url('public-assets/Navafiz_Standard_CV_Updated_Nov_2019.pdf');?>">Sample CV</a></li>                    
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#UsefulLinks" data-toggle="collapse" aria-expanded="false">Useful Links</a>
                <ul class="collapse list-unstyled" id="UsefulLinks">
                    <li><a href="https://gulfnews.com/" target="_blank" rel="nofollow">Gulf News</a></li>
                    <li><a href="https://www.khaleejtimes.com/" target="_blank" rel="nofollow">Khaleej Times</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#RecruitersSeekers" data-toggle="collapse" aria-expanded="false">Achievements</a>
                <ul class="collapse list-unstyled" id="RecruitersSeekers">
                    <li><a href="<?=site_url();?>">Testimonials  / Success Stories</a></li>                    
                    <li><a href="<?=site_url();?>">About Us</a></li>                    
                    <li><a href="<?=site_url();?>">Discussion Board</a></li>                    
                    <li><a href="<?=site_url();?>">Navafiz Collaborators</a></li>                    
                </ul>
            </li>
        </ul>        
    </nav>
</div>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js" integrity="sha512-Yk47FuYNtuINE1w+t/KT4BQ7JaycTCcrvlSvdK/jry6Kcxqg5vN7/svVWCxZykVzzJHaxXk5T9jnFemZHSYgnw==" crossorigin="anonymous"></script><script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('a.closemenu, .mobmenuoverlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.mobmenuoverlay').removeClass('active');
        });
        $('.nmob-menu #sidebar ul li a').on('click', function () {
            $('a.dropdown-toggle').attr('aria-expanded', 'false');
            $('a.dropdown-toggle').removeClass('collapsed');
        });

        $('.sidebarmenu').on('click', function () {
            $('#sidebar').addClass('active');
            $('.mobmenuoverlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
        
    });
</script>