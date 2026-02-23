<?php $this->load->view('include/header-ind'); ?>

<link rel="stylesheet" href="<?=site_url('nassets/home')?>/css/style.css">

    <title>NAVAFIZ</title>
    <link rel="stylesheet" href="<?=site_url('nassets/home')?>/css/all.min.css">
    <link rel="stylesheet" href="<?=site_url('nassets/home')?>/css/animate.css">
    <!--<link rel="stylesheet" href="<?=site_url('nassets/home')?>/css/bootstrap.min.css">-->
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
<?php // $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?> 
    
<?php // $loggedin_name = $this->session->userdata('name') =='' ? 0: $this->session->userdata('name');?>
<?php // $loggedin_email = $this->session->userdata('email') =='' ? 0: $this->session->userdata('email');?>
<?php // $loggedin_avatar = $this->session->userdata('avatar') =='' ? 0: $this->session->userdata('avatar');?>

<!--    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 order-lg-1 col-sm-6">
                    <div class="logo">
                        <a href="#"><img src="<?=site_url('nassets/home')?>/images/logo.png" alt="NAVAFIZ"></a>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-1 col-md-0 order-lg-2 col-sm-0"></div>
                <div class="col-xl-3 col-lg-3 col-md-6 order-lg-4 col-sm-6">
                    <div class="login">
                        <ul>
                            <?php if($user_id>0){?>
                            <li><a href="#">Welcome: <?=$loggedin_name;?></a></li>
                            <?php }else{?>
                            <li><a href="<?=site_url('user/login');?>">Login</a></li>
                            <li><a href="<?=site_url('user/register');?>">Register</a></li>
                            <?php }?>                            
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-12 order-lg-3">
                    <div class="nav-custom">
                        <ul>
                            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                            <li><a href="#"><i class="fas fa-briefcase"></i> Jobs</a></li>
                            <li><a href="#"><i class="fas fa-users"></i> Professionals</a></li>
                            <li><a href="#"><i class="fas fa-users"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
        </div>    
    </div>-->
    <div class="section homepg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">                    
                    <div class="services">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                   <div class="headings">
                                        <h1>NAVAFIZ</h1>
                                        <h3>Support Systems for Professionals & Entrepreneurs</h3>
                                   </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <div class="service recruitmentbox">
                                        <div class="img-box">
                                            <img class="wow fadeInDown" src="<?=site_url('nassets/home')?>/images/recruit.png" alt="Recruitment">
                                        </div>
                                        <div class="text-wrap">
                                            <h3 class="wow fadeInLeft" data-wow-delay="1s">Recruitment Support System</h3>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Manpower Supply </p>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Recruitment</p>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Support in Talent Hunt</p>
                                            <a class="wow fadeInRight" data-wow-delay="2s" href="<?=site_url('recruiters-support-system');?>?return_url=<?=site_url('recruiters-support-system');?>"><span>Explore <i class="fas fa-ex fa-angle-double-right"></i></span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <div class="service jobseekerbox">
                                        <div class="img-box">
                                            <img class="wow fadeInDown" src="<?=site_url('nassets/home')?>/images/job.png" alt="Job">
                                        </div>
                                        <div class="text-wrap">
                                            <h3 class="wow fadeInLeft" data-wow-delay="1s">Job Seekers Support System</h3>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Guidance in Job Hunt</p>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Career Choices</p>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Better Job Placements</p>
                                            <a class="wow fadeInRight" data-wow-delay="2s" href="<?=site_url('job-seeker-support-system');?>"><span>Explore <i class="fas fa-ex fa-angle-double-right"></i></span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <div class="service careerbox">
                                        <div class="img-box">
                                            <img class="wow fadeInDown" src="<?=site_url('nassets/home')?>/images/career1.jpg" alt="Career">
                                        </div>
                                        <div class="text-wrap">
                                            <!--<h6 class="wow fadeIn" data-wow-delay="1s">Coming Soon</h6>-->
                                            <h3 class="wow fadeInLeft" data-wow-delay="1s">Career Development Support System</h3>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Training/Education</p>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Certifications</p>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Skill Enhancement & Personality Development</p>
                                            <a class="wow fadeInRight" data-wow-delay="2s" href="<?=site_url('training')?>"><span>Explore <i class="fas fa-angle-double-right"></i></span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <div class="service entrepreneurbox">
                                        <div class="img-box">
                                            <img class="wow fadeInDown" src="<?=site_url('nassets/home')?>/images/pic1.png" alt="Entrepreneur">
                                        </div>
                                        <div class="text-wrap">
                                            <!--<h6 class="wow fadeIn" data-wow-delay="1s">Coming Soon</h6>-->
                                            <h3 class="wow fadeInLeft" data-wow-delay="1s">Entrepreneur Support System</h3>
                                            <p class="wow fadeInDown" data-wow-delay="1.5s"><i class="fas fa-check-circle"></i> Assistance in Business Startups & Development</p>
                                            <a class="wow fadeInRight" data-wow-delay="2s" href="<?=site_url('entrepreneur')?>"><span>Explore <i class="fas fa-angle-double-right"></i></span></a>
                                        </div>
                                        <div class="clearfix"></div>
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
                </div>
            </div>
        </div>   
    </div>
    <div class="footer ft-home">
        <div class="container">
            <hr>
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <label for="theme">Select Theme:</label>
                    <select id="theme">
                        <option value="light">Light</option>
                        <option value="dark">Dark</option>
                    </select>                    
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                    <ul class="social">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=site_url('nassets/home')?>/js/bootstrap.min.js"></script>
    <script src="<?=site_url('nassets/home')?>/js/parallax.js"></script>
    <script src="<?=site_url('nassets/home')?>/js/wow.js"></script>
    <script>
        var scene = document.getElementById('scene');
        var parallax = new Parallax(scene);
    </script>
    <script>
        new WOW().init();
    </script>
    <script>
        $("#theme").change(function() {
            if ($(this).val() == 'dark') {
                $("body").addClass("dark");
                $("body").removeClass("light");
            } else if ($(this).val() == 'light') {
                $("body").removeClass("dark");
                $("body").addClass("light");
            }
        });
    </script>
    
<?php $this->load->view('include/footer')?>
