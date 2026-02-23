<?php
$user_id = $this->session->userdata('user_id');
$session_user_id = $user_id;
if (empty($user_id)) {
    $data = checkCookie();
    if (!empty($data)) {
        if ($data == $user_id) {
            redirect(base_url('profile/' . intval($data)));
        }
    }
}
if ($session_user_id > 0) {
    BlockUserCheck($session_user_id);
}
?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links of CSS files -->
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/flaticon.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/aos.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/animate.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/meanmenu.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/remixicon.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/odometer.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/fancybox.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/selectize.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/metismenu.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/simplebar.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/dropzone.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/style.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/navbar.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/footer.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/dashboard.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/dark.css">
    <link rel="stylesheet" href="<?= site_url() ?>jassets/css/responsive.css">
    <?php if (isset($page_meta['title']) && !empty($page_meta)) { ?>
        <meta property="og:url" content="<?= site_url($page_meta['og_url']); ?>" />
        <meta property="og:image" content="http://navafiz.com/<?= $page_meta['og_img'] ?>" />
        <meta property="og:image:secure_url" content="<?= site_url($page_meta['og_img']); ?>" />
        <meta property="og:title" content="<?= $page_meta['title']; ?>" />
        <meta property="og:description" content="<?= $page_meta['description']; ?>" />

        <meta name="twitter:card" content="<?= site_url($page_meta['og_img']); ?>">
        <meta name="twitter:title" content="<?= $page_meta['title']; ?>">
        <meta name="twitter:description" content="<?= $page_meta['description']; ?>">
        <meta name="twitter:image" content="<?= site_url($page_meta['og_img']); ?>">
    <?php } ?>

    <link rel="icon" type="image/png" href="<?= site_url() ?>jassets/images/favicon.png">
    <style>
        .round {
            display: none !important;
        }

        .buy-now-btn {
            display: none !important;
        }

        .img-width {
            width: 150px;
        }

        #professional-content {
            margin-left: 60px;
        }

        #professional-image {
            max-width: 31%;
        }

        .default-btn1 {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff !important;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .default-btn1:hover {
            background: linear-gradient(135deg, #0056b3, #003f7f);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @media screen and (max-width: 768px) {

            #professional-content {
                margin-left: 0px;
            }

            #professional-image {
                width: 23%;
            }

            .hero-heading {
                font-size: 60px;
                /* default for large screens */
            }
        }

        @media (max-width: 768px) {

            /* tablets */
            .hero-heading {
                font-size: 40px;
            }
        }

        @media (max-width: 480px) {

            /* mobile */
            .hero-heading {
                font-size: 38px;
            }
        }
    </style>
</head>

<body>
    <?php $user_id = $this->session->userdata('user_id') == '' ? 0 : $this->session->userdata('user_id'); ?>
    <?php $loggedin_name = $this->session->userdata('name') == '' ? 0 : $this->session->userdata('name'); ?>
    <?php $loggedin_email = $this->session->userdata('email') == '' ? 0 : $this->session->userdata('email'); ?>
    <?php $loggedin_avatar = $this->session->userdata('avatar') == '' ? 0 : $this->session->userdata('avatar'); ?>
    <input type="hidden" name="page_id" id="page_id" />
    <input type="hidden" name="limit" id="limit" />
    <input type="hidden" name="cat_id" id="cat_id" />



    <!-- Start Preloader Area -->
    <div class="preloader-area" style="display:none">
        <div class="spinner">
            <div class="inner">
                <div class="disc"></div>
                <div class="disc"></div>
                <div class="disc"></div>
            </div>
        </div>
    </div>
    <!-- End Preloader Area -->

    <!-- Start Header Area -->
    <header class="main-header-area" style="background-color: #fff;">
        <!-- Start Topbar Area -->
        <div class="topbar-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <ul class="topbar-social-list">
                            <li>
                                <a href="https://www.facebook.com/groups/JobPostMail" target="_blank"><i
                                        class="flaticon-facebook" style="color:black"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/navafiz_management?igsh=MTNyMGY5eWkydjh4YQ=="
                                    target="_blank"><i class="flaticon-instagram" style="color:black"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/navafiz" target="_blank"><i
                                        class="flaticon-linkedin" style="color:black"></i></a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/" target="_blank"><i class="fi fi-ro-book"
                                        style="color:black"></i></a>
                            </li>
                        </ul>
                    </div>
                    <?php if ($user_id > 0) { ?>
                        <div class="col-lg-7 col-md-6">
                            <ul class="topbar-action">
                                <li>
                                    <h3 style="color:#3a3b3c"><i class="flaticon-star"
                                            style="margin-right: 10px; margin-top: 10px;"></i>Welcome <?= $loggedin_name ?>
                                    </h3>
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-7 col-md-6">
                            <ul class="topbar-action">
                                <li>
                                    <a href="<?= site_url('user/login?return_url=' . current_url()); ?>"
                                        style="color:#3a3b3c;"><i class="flaticon-padlock"
                                            style="margin-right: 10px; color:#000;"></i>Log In</a>
                                </li>

                                <li>
                                    <a href="<?= base_url('user/register') ?>" style="color:#3a3b3c"><i
                                            class="flaticon-user" style="margin-right: 10px; color: #000;"></i>Register</a>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- End Topbar Area -->

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="<?= site_url() ?>">
                                <img src="<?= site_url() ?>jassets/images/logo-inverse-310x44.png" class="white-logo"
                                    alt="logo">
                                <!--<img src="<?= site_url() ?>jassets/images/logo.png" class="black-logo" alt="logo">-->
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-navbar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="<?= site_url() ?>">
                            <img src="<?= site_url() ?>jassets/images/logo-inverse-310x44.png" class="white-logo"
                                alt="logo">
                            <img src="<?= site_url() ?>jassets/images/logo-inverse-310x44.png" class="black-logo"
                                alt="logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent"
                            style="padding-top:30px !important">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>" class="nav-link active" style="color:#3a3b3c">
                                        Home
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= site_url() ?>" class="nav-link" style="color:#3a3b3c">
                                        Job Listing
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?= site_url('jobs') ?>" class="nav-link"
                                                style="color:#3a3b3c">Featured Jobs</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?= site_url('recruiters-support-system') ?>" class="nav-link"
                                                style="color:#3a3b3c">Recruitment Support</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?= site_url('job-seeker-support-system') ?>" class="nav-link"
                                                style="color:#3a3b3c">Job Seekers Support</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?= site_url('users_list/users_by_list/82') ?>" class="nav-link"
                                                style="color:#3a3b3c">Featured Profiles</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?= site_url('feed') ?>" class="nav-link" style="color:#3a3b3c">As
                                                Received Jobs</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= site_url() ?>" class="nav-link" style="color:#3a3b3c">
                                        Candidates
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?= site_url('users_list/users_by_list/82') ?>" class="nav-link"
                                                style="color:#3a3b3c">See Featured Profiles</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?= site_url() ?>" class="nav-link"
                                                style="color:#3a3b3c">Candidates
                                                Dashboard</a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="nav-item">
                                    <a href="<?= site_url() ?>" class="nav-link" style="color:#3a3b3c">
                                        Blog
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?= site_url() ?>" class="nav-link" style="color:#3a3b3c">Blog</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= site_url('testimonials') ?>" class="nav-link active"
                                        style="color:#3a3b3c">
                                        Testimonials
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= site_url('contact') ?>" class="nav-link"
                                        style="color:#3a3b3c">Contact</a>
                                </li>
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="<?= site_url('profile/AddCV'); ?>" class="default-btn1">Upload Resume <i
                                            class="flaticon-resume"></i></a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->
    </header>
    <!-- End Header Area -->

    <!-- Start Main Banner Area -->
    <div class="main-banner-area-with-bg-image">
        <div class="container-fluid">
            <div class="main-banner-content-with-search" data-speed="0.06" data-revert="true">
                <h1 class="hero-heading" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500">HAVE TALENT?
                    <br> MEET OPPORTUNITY
                </h1>

                <form class="banner-search-form" style="display:none;">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label><i class="flaticon-edit"></i></label>
                                <input class="form-control" type="text" placeholder="Keywords">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label><i class="flaticon-placeholder"></i></label>
                                <select class="selectize-filter">
                                    <option value="1">Location</option>
                                    <option value="2">Canada</option>
                                    <option value="3">Japan</option>
                                    <option value="4">Germany</option>
                                    <option value="5">Switzerland</option>
                                    <option value="6">Australia</option>
                                    <option value="7">United States</option>
                                    <option value="8">New Zealand</option>
                                    <option value="9">United Kingdom</option>
                                    <option value="10">Sweden</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label><i class="flaticon-list"></i></label>
                                <select class="selectize-filter">
                                    <option value="1">Category</option>
                                    <option value="2">Assurance</option>
                                    <option value="3">Banking</option>
                                    <option value="4">Copyright</option>
                                    <option value="5">Design</option>
                                    <option value="6">Finance</option>
                                    <option value="7">IT Sector</option>
                                    <option value="8">Management</option>
                                    <option value="9">Photography</option>
                                    <option value="10">Software</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <button type="submit" class="search-btn">Search A Job <i
                                    class="ri-search-line"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Main Banner Area -->

    <!-- Start Featured Job List Area -->
    <div class="job-list-area pb-100 pt-100">
        <div class="container">
            <div class="section-title">
                <h2>Featured Job Opportunities in the U.A.E. & GCC</h2>
                <p>Discover top job openings across the U.A.E. and the wider GCC region. Whether you're looking for a
                    new career challenge or seeking to elevate your professional journey, our featured listings showcase
                    the best opportunities across various industries in the Middle East.</p>
            </div>

            <div class="row">
                <div id="job-list-container">
                    <!-- Job listings will be dynamically inserted here -->
                </div>
            </div>

            <div class="browse-jobs-btn">
                <a href="<?= base_url('jobs') ?>" class="default-btn">Browse All Jobs <i
                        class="flaticon-list-1"></i></a>
            </div>
        </div>
    </div>
    <!-- End Featured Job List Area -->

    <!-- Start Featured Candidate List Area -->
    <div class="job-list-area pb-100 pt-100">
        <div class="container">
            <div class="section-title">
                <h2>Find Talent From The Featured Ones For Your Job</h2>
                <p>Tap into a curated selection of top-tier talent from across the U.A.E. and GCC region. Whether you're
                    hiring for key roles or niche skills, our featured candidates are ready to meet the demands of the
                    local market. Simplify your hiring process and connect with exceptional professionals in the heart
                    of the Middle East.</p>
            </div>

            <div class="row" style="margin-bottom:100px;">
                <div id="featured-candidates-box">
                    <!-- Job listings will be dynamically inserted here -->
                </div>
            </div>

            <div class="browse-jobs-btn">
                <a href="<?= base_url() ?>professionals" class="default-btn">View All Candidates <i
                        class="flaticon-list-1"></i></a>
            </div>
        </div>
    </div>
    <!-- End Featured Candidate List Area -->

    <!-- Start About Area -->
    <!--<div class="about-area ptb-100">-->
    <!--    <div class="container">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-lg-6 col-md-12">-->
    <!--                <div class="about-image" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500">-->
    <!--                    <img src="<?= site_url() ?>jassets/images/about/IMG-20241002-WA0005 (1).jpg" alt="image">-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-6 col-md-12">-->
    <!--                <div class="about-content" data-aos="fade-left" data-aos-delay="70" data-aos-duration="700">-->
    <!--                    <h3>Our Mission</h3>-->
    <!--                    <p>Our mission is to provide corporate services of a superior quality. The responsive, personal attention we provide for each client, regardless how large or small, is the key to our approach.</p>-->
    <!--                    <p><img class="mx-3" src="<?= site_url() ?>jassets/images/tick.jpg" alt="tick" style="width:17px">Providing high-quality services</p>-->
    <!--                    <p><img class="mx-3" src="<?= site_url() ?>jassets/images/tick.jpg" alt="tick" style="width:17px">Sharing professional experience</p>-->
    <!--                    <p><img class="mx-3" src="<?= site_url() ?>jassets/images/tick.jpg" alt="tick" style="width:17px">Offering full support to all our clients</p>-->

    <!--                    <div class="row text-center">-->
    <!--                        <div class="col-lg-6 col-sm-6 col-md-6 col-6">-->
    <!--                            <div class="about-fun-fact">-->
    <!--                                <h3>-->
    <!--                                    <span class="odometer" data-count="230">00</span>-->
    <!--                                    <span class="sign-icon">+</span>-->
    <!--                                </h3>-->
    <!--                                <p class="text-center">Satisfied Clients</p>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="col-lg-6 col-sm-6 col-md-6 col-6">-->
    <!--                            <div class="about-fun-fact">-->
    <!--                                <h3>-->
    <!--                                    <span class="odometer" data-count="38">00</span>-->
    <!--                                    <span class="sign-icon">+</span>-->
    <!--                                </h3>-->
    <!--                                <p class="text-center">Team Members</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row text-center">-->
    <!--                        <div class="col-lg-6 col-sm-6 col-md-6 col-6">-->
    <!--                            <div class="about-fun-fact">-->
    <!--                                <h3>-->
    <!--                                    <span class="odometer" data-count="1850"></span>-->
    <!--                                    <span class="sign-icon"></span>-->
    <!--                                </h3>-->
    <!--                                <p class="text-center">Successful Cases</p>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="col-lg-6 col-sm-6 col-md-6 col-6">-->
    <!--                            <div class="about-fun-fact">-->
    <!--                                <h3>-->
    <!--                                    <span class="odometer" data-count="99">00</span>-->
    <!--                                    <span class="sign-icon">%</span>-->
    <!--                                </h3>-->
    <!--                                <p class="text-center">Satisfaction Rate</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--<div class="about-btn">-->
    <!--    <a href="about-us.html" class="default-btn">More About Us <i class="flaticon-plus"></i></a>-->
    <!--</div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- End About Area -->

    <!-- Start Partner Area -->
    <div class="partner-area bg-F5F5F5 ptb-100 d-none">
        <div class="container">
            <div class="partner-slides owl-carousel owl-theme">
                <div class="image-box">
                    <a href="index-2.html" target="_blank"><img
                            src="<?= site_url() ?>jassets/images/partner/partner-1.png" alt="image"></a>
                </div>

                <div class="image-box">
                    <a href="index-2.html" target="_blank"><img
                            src="<?= site_url() ?>jassets/images/partner/partner-2.png" alt="image"></a>
                </div>

                <div class="image-box">
                    <a href="index-2.html" target="_blank"><img
                            src="<?= site_url() ?>jassets/images/partner/partner-3.png" alt="image"></a>
                </div>

                <div class="image-box">
                    <a href="index-2.html" target="_blank"><img
                            src="<?= site_url() ?>jassets/images/partner/partner-4.png" alt="image"></a>
                </div>

                <div class="image-box">
                    <a href="index-2.html" target="_blank"><img
                            src="<?= site_url() ?>jassets/images/partner/partner-5.png" alt="image"></a>
                </div>

                <div class="image-box">
                    <a href="index-2.html" target="_blank"><img
                            src="<?= site_url() ?>jassets/images/partner/partner-6.png" alt="image"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner Area -->

    <!-- Start Job Seeker Area -->
    <div class="job-seeker-area pt-100 pb-75">
        <div class="container">
            <div class="section-title">
                <h2>NAVAFIZ Services</h2>
                <!--<p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>-->
            </div>

            <div class="row justify-content-center text-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-job-seeker-card">
                        <div class="seeker-image">
                            <img class="img-width" src="<?= site_url() ?>jassets/images/job-seeker/icon1.png"
                                alt="image">
                        </div>
                        <h3>Corporate</h3>
                        <br>
                        <p>Company Formation / Setup <br>
                            PRO & HR Services <br>
                            Documents Attestation Services<br>
                            Sourcing & Procurement Consultant</p>

                        <div class="step">Step 1</div>
                    </div>

                    <div class="seeker-arrow-icon">
                        <img src="<?= site_url() ?>jassets/images/job-seeker/layer-1.png" alt="image">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-job-seeker-card">
                        <div class="seeker-image">
                            <img class="img-width" src="<?= site_url() ?>jassets/images/job-seeker/icon2.png"
                                alt="image">
                        </div>
                        <h3>Financial</h3><br>
                        <p>TAX <br>
                            Audit and Book Keeping<br>
                            Bank Facilities <br>
                            Corporate Bank Account Opening</p>

                        <div class="step">Step 2</div>
                    </div>

                    <div class="seeker-arrow-icon">
                        <img src="<?= site_url() ?>jassets/images/job-seeker/layer-2.png" alt="image">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-job-seeker-card">
                        <div class="seeker-image">
                            <img class="img-width" src="<?= site_url() ?>jassets/images/job-seeker/icon3.png"
                                alt="image">
                        </div>
                        <h3>Recruitment</h3><br>
                        <p>
                            Overseas & Local Recruitment<br>
                            Blue Collar and White Collar Hiring <br>
                            Providing candidates for all industries from around the world. <br>
                        </p>
                        <div class="step">Step 3</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Job Seeker Area -->

    <!-- Start Play Video Area -->
    <div class="play-video-area pb-100">
        <div class="container">
            <div class="play-video-inner-box-image">
                <img src="<?= site_url() ?>jassets/images/play-video/IMG-20241002-WA0004.jpg" alt="image">

                <div class="video-content">
                    <div class="play-btn">
                        <a href="https://www.youtube.com/watch?v=ieh5pq4rMU4" class="video-btn popup-youtube">
                            <i class="flaticon-play-button-arrowhead"></i>
                        </a>
                    </div>
                    <h3>See How NAVAFIZ Helps <br> You To Hire Talent</h3>

                    <div class="layer-shape">
                        <img src="<?= site_url() ?>jassets/images/play-video/layer.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Play Video Area -->

    <!-- Start Overview Area -->
    <div class="overview-area pb-100">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="overview-content">
                        <h3>Build Your Professional Resume With The Help Of Expert</h3>
                        <p>
                            Enhance your career prospects with a standout resume tailored to the U.A.E. and GCC job
                            market. Our expert resume writers specialize in crafting documents that highlight your
                            skills, experience, and achievements in a way that resonates with employers across the
                            region. Whether you're aiming for local or regional opportunities, we'll help you make a
                            strong first impression.
                        </p>
                        <div class="overview-btn">
                            <a href="dashboard-submit-resume.html" class="default-btn">Our Resume Packages <i
                                    class="flaticon-list-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="overview-image">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-4">
                                <div class="image" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500">
                                    <img src="<?= site_url() ?>jassets/images/overview/overview-1.jpg" alt="image">
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-4 col-md-4 col-4">
                                <div class="image" data-aos="fade-down" data-aos-delay="70" data-aos-duration="700">
                                    <img src="<?= site_url() ?>jassets/images/overview/overview-2.jpg" alt="image">
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-4 col-md-4 col-4">
                                <div class="image" data-aos="fade-left" data-aos-delay="90" data-aos-duration="900">
                                    <img src="<?= site_url() ?>jassets/images/overview/overview-3.jpg" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="overview-shape">
            <img src="<?= site_url() ?>jassets/images/overview/shape.png" alt="image">
        </div>
    </div>
    <!-- End Overview Area -->

    <!-- Start Pricing Area -->
    <!--<div class="pricing-area pb-75">-->
    <!--    <div class="container">-->
    <!--        <div class="section-title">-->
    <!--            <h2>Our Affordable Pricing Plans</h2>-->
    <!--            <p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>-->

    <!--            <div class="section-layer-shape">-->
    <!--                <img src="<?= site_url() ?>jassets/images/layer-shape.png" alt="image">-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div class="row justify-content-center align-items-center">-->
    <!--            <div class="col-lg-4 col-md-6">-->
    <!--                <div class="single-pricing-table">-->
    <!--                    <div class="pricing-icon">-->
    <!--                        <i class="flaticon-rocket-launch"></i>-->

    <!--                        <div class="back-icon">-->
    <!--                            <i class="flaticon-rocket-launch"></i>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="pricing-header">-->
    <!--                        <h3>Starter</h3>-->
    <!--                    </div>-->

    <!--                    <div class="price">$99 <span>/Month</span></div>-->

    <!--                    <ul class="pricing-features-list">-->
    <!--                        <li>Unlimited Working Hours</li>-->
    <!--                        <li>Unlimited Projects</li>-->
    <!--                        <li><del>Unlimited Design Variation</del></li>-->
    <!--                        <li><del>Unlimited Domains</del></li>-->
    <!--                    </ul>-->

    <!--                    <div class="pricing-btn">-->
    <!--                        <a href="#" class="default-btn">Get Started <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-4 col-md-6">-->
    <!--                <div class="single-pricing-table active">-->
    <!--                    <div class="pricing-icon">-->
    <!--                        <i class="flaticon-shuttle"></i>-->

    <!--                        <div class="back-icon">-->
    <!--                            <i class="flaticon-shuttle"></i>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="pricing-header">-->
    <!--                        <h3>Advanced</h3>-->
    <!--                    </div>-->

    <!--                    <div class="price">$150 <span>/Month</span></div>-->

    <!--                    <ul class="pricing-features-list">-->
    <!--                        <li>Unlimited Working Hours</li>-->
    <!--                        <li>Unlimited Projects</li>-->
    <!--                        <li>Unlimited Design Variation</li>-->
    <!--                        <li><del>Unlimited Domains</del></li>-->
    <!--                    </ul>-->

    <!--                    <div class="pricing-btn">-->
    <!--                        <a href="#" class="default-btn">Get Started <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                    </div>-->

    <!--                    <span class="most-popular">Most Popular</span>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-4 col-md-6">-->
    <!--                <div class="single-pricing-table">-->
    <!--                    <div class="pricing-icon">-->
    <!--                        <i class="flaticon-spaceship"></i>-->

    <!--                        <div class="back-icon">-->
    <!--                            <i class="flaticon-spaceship"></i>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="pricing-header">-->
    <!--                        <h3>Premium</h3>-->
    <!--                    </div>-->

    <!--                    <div class="price">$250 <span>/Month</span></div>-->

    <!--                    <ul class="pricing-features-list">-->
    <!--                        <li>Unlimited Working Hours</li>-->
    <!--                        <li>Unlimited Projects</li>-->
    <!--                        <li>Unlimited Design Variation</li>-->
    <!--                        <li>Unlimited Domains</li>-->
    <!--                    </ul>-->

    <!--                    <div class="pricing-btn">-->
    <!--                        <a href="#" class="default-btn">Get Started <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- End Pricing Area -->

    <!-- Start Mobile App Area -->
    <!--<div class="mobile-app-area">-->
    <!--    <div class="container-fluid">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-lg-6 col-md-12">-->
    <!--                <div class="mobile-app-image left-image">-->
    <!--                    <div class="row justify-content-center">-->
    <!--                        <div class="col-lg-4 col-sm-4 col-md-4 col-4">-->
    <!--                            <div class="image" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500">-->
    <!--                                <img src="<?= site_url() ?>jassets/images/mobile-app/app-1.png" alt="image">-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="col-lg-4 col-sm-4 col-md-4 col-4">-->
    <!--                            <div class="image" data-aos="fade-down" data-aos-delay="70" data-aos-duration="700">-->
    <!--                                <img src="<?= site_url() ?>jassets/images/mobile-app/app-2.png" alt="image">-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="col-lg-4 col-sm-4 col-md-4 col-4">-->
    <!--                            <div class="image" data-aos="fade-left" data-aos-delay="90" data-aos-duration="900">-->
    <!--                                <img src="<?= site_url() ?>jassets/images/mobile-app/app-3.png" alt="image">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-6 col-md-12">-->
    <!--                <div class="mobile-app-content left-content">-->
    <!--                    <h3>Download Our Mobile Apps To Stay Up To Date</h3>-->
    <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->

    <!--                    <ul class="mobile-app-btn-list">-->
    <!--                        <li><a href="index.html" class="playstote-btn">Download From Playstote <i class="ri-google-play-line"></i></a></li>-->
    <!--                        <li><a href="index.html" class="applestore-btn">Download From Applestore <i class="ri-app-store-line"></i></a></li>-->
    <!--                    </ul>-->

    <!--                    <div class="layer-shape">-->
    <!--                        <img src="<?= site_url() ?>jassets/images/mobile-app/layer.png" alt="image">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <!--    <div class="mobile-app-shape-2">-->
    <!--        <img src="<?= site_url() ?>jassets/images/mobile-app/shape.png" alt="image">-->
    <!--    </div>-->
    <!--</div>-->
    <!-- End Mobile App Area -->

    <!-- Start Blog Area -->
    <!--<div class="blog-area ptb-100">-->
    <!--    <div class="container-fluid">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-lg-6 col-md-12">-->
    <!--                <div class="blog-item-box left-box">-->
    <!--                    <div class="content">-->
    <!--                        <h3>Read Our Article To Get <br> Tips & Tricks</h3>-->

    <!--                        <div class="layer-shape">-->
    <!--                            <img src="<?= site_url() ?>jassets/images/blog/layer.png" alt="image">-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="blog-slides owl-carousel owl-theme">-->
    <!--                        <div class="blog-single-card">-->
    <!--                            <div class="blog-image">-->
    <!--                                <a href="blog-details.html"><img src="<?= site_url() ?>jassets/images/blog/blog-1.jpg" alt="image"></a>-->
    <!--                            </div>-->

    <!--                            <div class="blog-content">-->
    <!--                                <h3>-->
    <!--                                    <a href="blog-details.html">NAVAFIZ Will Help You To Hire In Month By Following Tips</a>-->
    <!--                                </h3>-->
    <!--                                <span><i class="flaticon-calendar"></i> 24th February</span>-->

    <!--                                <a href="blog-details.html" class="blog-btn">Read Article <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="blog-single-card">-->
    <!--                            <div class="blog-image">-->
    <!--                                <a href="blog-details.html"><img src="<?= site_url() ?>jassets/images/blog/blog-2.jpg" alt="image"></a>-->
    <!--                            </div>-->

    <!--                            <div class="blog-content">-->
    <!--                                <h3>-->
    <!--                                    <a href="blog-details.html">Whatever You Do, Make Sure It Will Make You Happy</a>-->
    <!--                                </h3>-->
    <!--                                <span><i class="flaticon-calendar"></i> 25th February</span>-->

    <!--                                <a href="blog-details.html" class="blog-btn">Read Article <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="blog-single-card">-->
    <!--                            <div class="blog-image">-->
    <!--                                <a href="blog-details.html"><img src="<?= site_url() ?>jassets/images/blog/blog-3.jpg" alt="image"></a>-->
    <!--                            </div>-->

    <!--                            <div class="blog-content">-->
    <!--                                <h3>-->
    <!--                                    <a href="blog-details.html">Points To Be Considered Before Accept Job Offer!</a>-->
    <!--                                </h3>-->
    <!--                                <span><i class="flaticon-calendar"></i> 26th February</span>-->

    <!--                                <a href="blog-details.html" class="blog-btn">Read Article <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="blog-single-card">-->
    <!--                            <div class="blog-image">-->
    <!--                                <a href="blog-details.html"><img src="<?= site_url() ?>jassets/images/blog/blog-4.jpg" alt="image"></a>-->
    <!--                            </div>-->

    <!--                            <div class="blog-content">-->
    <!--                                <h3>-->
    <!--                                    <a href="blog-details.html">How To Perform Well In A Group Discussion?</a>-->
    <!--                                </h3>-->
    <!--                                <span><i class="flaticon-calendar"></i> 27th February</span>-->

    <!--                                <a href="blog-details.html" class="blog-btn">Read Article <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="blog-single-card">-->
    <!--                            <div class="blog-image">-->
    <!--                                <a href="blog-details.html"><img src="<?= site_url() ?>jassets/images/blog/blog-5.jpg" alt="image"></a>-->
    <!--                            </div>-->

    <!--                            <div class="blog-content">-->
    <!--                                <h3>-->
    <!--                                    <a href="blog-details.html">3 Common Hiring Mistakes & How To Avoid Them</a>-->
    <!--                                </h3>-->
    <!--                                <span><i class="flaticon-calendar"></i> 28th February</span>-->

    <!--                                <a href="blog-details.html" class="blog-btn">Read Article <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="blog-single-card">-->
    <!--                            <div class="blog-image">-->
    <!--                                <a href="blog-details.html"><img src="<?= site_url() ?>jassets/images/blog/blog-6.jpg" alt="image"></a>-->
    <!--                            </div>-->

    <!--                            <div class="blog-content">-->
    <!--                                <h3>-->
    <!--                                    <a href="blog-details.html">General Working Rules For An Ideal Employer</a>-->
    <!--                                </h3>-->
    <!--                                <span><i class="flaticon-calendar"></i> 21th February</span>-->

    <!--                                <a href="blog-details.html" class="blog-btn">Read Article <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="blog-single-card">-->
    <!--                            <div class="blog-image">-->
    <!--                                <a href="blog-details.html"><img src="<?= site_url() ?>jassets/images/blog/blog-7.jpg" alt="image"></a>-->
    <!--                            </div>-->

    <!--                            <div class="blog-content">-->
    <!--                                <h3>-->
    <!--                                    <a href="blog-details.html">Important Things To Look For In A Great Resume</a>-->
    <!--                                </h3>-->
    <!--                                <span><i class="flaticon-calendar"></i> 20th February</span>-->

    <!--                                <a href="blog-details.html" class="blog-btn">Read Article <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="blog-single-card">-->
    <!--                            <div class="blog-image">-->
    <!--                                <a href="blog-details.html"><img src="<?= site_url() ?>jassets/images/blog/blog-8.jpg" alt="image"></a>-->
    <!--                            </div>-->

    <!--                            <div class="blog-content">-->
    <!--                                <h3>-->
    <!--                                    <a href="blog-details.html">Work Hard, Have Fun, And Make Your History</a>-->
    <!--                                </h3>-->
    <!--                                <span><i class="flaticon-calendar"></i> 11th February</span>-->

    <!--                                <a href="blog-details.html" class="blog-btn">Read Article <i class="ri-arrow-right-s-line"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-6 col-md-12">-->
    <!--                <div class="blog-large-image right-image">-->
    <!--                    <img src="<?= site_url() ?>jassets/images/blog/blog-large.jpg" alt="image">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- End Blog Area -->

    <!-- Start Footer Area -->
    <footer class="footer-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="widget-logo">
                            <a href="<?= site_url() ?>"><img class="footer-logo"
                                    src="<?= site_url() ?>jassets/images/logo-inverse-310x44.png" alt="image"></a>
                        </div>
                        <p>Navafiz Management Consultancies, established in 2013, specializes in recruitment services
                            for blue and white-collar roles across multiple industries in the U.A.E., GCC, USA, and
                            Europe. We also offer a wide range of business services, including company formation, PRO &
                            HR support, and procurement consulting.</p>

                        <ul class="widget-social-links">
                            <li><span>Follow:</span></li>

                            <li>
                                <a href="https://www.facebook.com/groups/JobPostMail/" target="_blank">
                                    <i class="flaticon-facebook"></i>
                                </a>
                            </li>

                            <!--<li>-->
                            <!--    <a href="https://twitter.com/" target="_blank">-->
                            <!--        <i class="flaticon-twitter"></i>-->
                            <!--    </a>-->
                            <!--</li>-->

                            <li>
                                <a href="https://www.instagram.com/navafiz_management?igsh=MTNyMGY5eWkydjh4YQ=="
                                    target="_blank">
                                    <i class="flaticon-instagram"></i>
                                </a>
                            </li>

                            <li>
                                <a href="https://www.linkedin.com/company/navafiz" target="_blank">
                                    <i class="flaticon-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget ps-5">
                        <h3>Company</h3>

                        <ul class="quick-links">
                            <li><a href="<?= site_url() ?>">About NAVAFIZ</a></li>
                            <li><a href="<?= site_url() ?>jobs">Browse Jobs</a></li>
                            <li><a href="<?= site_url() ?>testimonials">Testimonials</a></li>
                            <li><a href="<?= site_url() ?>contact">Contact Us</a></li>
                            <li><a href="<?= site_url() ?>feed">Candidate Dashboard</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Resources</h3>

                        <ul class="quick-links">
                            <li><a href="<?= site_url() ?>">Blog</a></li>
                            <li><a href="<?= site_url() ?>jobs/addjob">Post A Job</a></li>
                            <li><a href="<?= site_url() ?>professionals">Candidates</a></li>
                            <li><a href="<?= site_url() ?>">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Quick Contact</h3>

                        <ul class="widget-info">
                            <li>
                                <i class="flaticon-a"></i>
                                Office 204 Building No 11 Damascus St. Al Qusais 2 - Dubai - UAE
                            </li>

                            <li>
                                <i class="flaticon-p"></i>
                                <a href="tel:+97143635252">+971 4363 5252</a>
                            </li>

                            <li>
                                <i class="flaticon-p"></i>
                                <a href="tel:+97142977879">+97142977879</a>
                            </li>

                            <li>
                                <i class="flaticon-e"></i>
                                <a href="mailto:info@navafiz.com">info@navafiz.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <div class="container">
                <p><i class="ri-copyright-line"></i>
                    <script>document.write(new Date().getFullYear())</script> NAVAFIZ. All Rights Reserved
                </p>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class="ri-arrow-up-line"></i>
    </div>
    <!-- End Go Top Area -->

    <!-- Links of JS files -->
    <script src="<?= site_url() ?>jassets/js/jquery.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/jquery.meanmenu.js"></script>
    <script src="<?= site_url() ?>jassets/js/owl.carousel.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/jquery.appear.js"></script>
    <script src="<?= site_url() ?>jassets/js/odometer.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/fancybox.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/selectize.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/TweenMax.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/aos.js"></script>
    <script src="<?= site_url() ?>jassets/js/metismenu.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/simplebar.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/dropzone.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/sticky-sidebar.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/form-validator.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/contact-form-script.js"></script>
    <script src="<?= site_url() ?>jassets/js/wow.min.js"></script>
    <script src="<?= site_url() ?>jassets/js/main.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'jobs/getfeaturedlistnew',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Get the container div
                    var jobListContainer = $('#job-list-container');

                    // Create a new row element
                    var currentRow = $('<div class="row"></div>');

                    // Iterate through the data and create job listings
                    $.each(data.jobs, function (index, job) {
                        // Convert Unix timestamp to a Date object
                        var date = new Date(job.j_add_date * 1000); // Multiply by 1000 to convert from seconds to milliseconds

                        // Format the date as 'Month Day, Year'
                        var formattedDate = date.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });

                        // Create a new job listing div
                        var jobListing = $('<div class="col-lg-4 col-md-6"></div>');

                        // Construct the job listing HTML based on the job data
                        var jobHtml = `
                    <div class="single-job-list-card">
                        <div class="job-information">
                            <div class="company-logo">
                                <a href="<?= base_url() ?>job/${job.j_id}"><img src="<?= site_url() ?>assets/uploads/jobs/work-list.png" alt="Job Image" style='max-width:55px;'></a>
                            </div>
                            <h3><a href="<?= base_url() ?>job/${job.j_id}">${job.j_title}</a></h3>
                            <span>${job.j_company}</span>
                            <div class="bookmark-btn">
                                <i class="ri-bookmark-line"></i>
                            </div>
                            <div class="hover-bookmark-btn">
                                <i class="ri-bookmark-fill"></i>
                            </div>
                        </div>
                        <ul class="job-tag-list">
                            <li>Featured</li>
                        </ul>
                        <ul class="location-information">
                            <li><i class="ri-time-line"></i> ${formattedDate}</li>
                            <li><i class="ri-map-pin-line"></i> ${job.j_location}</li>
                        </ul>
                        <div class="job-btn">
                            <a href="<?= base_url() ?>job/${job.j_id}" class="default-btn">Apply Jobs <i class="flaticon-list-1"></i></a>
                        </div>
                    </div>
                `;

                        // Set the HTML for the job listing div
                        jobListing.html(jobHtml);

                        // Append the job listing to the current row
                        currentRow.append(jobListing);

                        // If we've added three job listings to the current row, append it to the container and create a new row
                        if ((index + 1) % 3 === 0) {
                            jobListContainer.append(currentRow);
                            currentRow = $('<div class="row"></div>');
                        }
                    });

                    // If there are any remaining job listings in the last row, append it to the container
                    if (currentRow.children().length > 0) {
                        jobListContainer.append(currentRow);
                    }
                },
                error: function (xhr, status, error) {
                    // Handle errors here if the AJAX request fails
                    console.log(error);
                }
            });
        });




        $(document).ready(function () {
            $.ajax({
                url: 'professionals/professionalsajaxnew', // Replace with the actual URL of your controller method
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data.members); // Check the structure of data.members in the console

                    // Get the container div for featured candidates
                    var featuredCandidatesContainer = $('#featured-candidates-box');

                    // Create a new row element
                    var currentRow = $('<div class="row"></div>');

                    // Iterate through the data and create candidate listings
                    $.each(data.members, function (index, memberWrapper) {
                        // Check if the member's profile exists
                        if (memberWrapper.profile && memberWrapper.profile.length !== 0) {
                            var member = memberWrapper.profile; // Access the profile data

                            // Check if the image URL exists and is valid
                            var imageUrl = `<?= site_url() ?>assets/uploads/members/${member.m_avatar}`;
                            var img = new Image();
                            img.src = imageUrl;

                            img.onload = function () {
                                // Image exists, append the member to the container

                                // Limit the skills to the first 3
                                var skills = member.m_skills ? member.m_skills.split(',').slice(0, 3).join(', ') : 'No skills listed';

                                // Create a new candidate listing div
                                var candidateListing = $('<div class="col-lg-4 col-md-6 my-5"></div>');

                                // Construct the candidate listing HTML based on the member data
                                var candidateHtml = `
                            <div class="single-job-list-card" style="display: flex; flex-direction: column; justify-content: flex-start; height: 100%;">
                                <div class="job-information">
                                    <div class="company-logo">
                                        <a href="n/${member.m_id}"><img src="<?= site_url() ?>assets/uploads/members/${member.m_avatar}" alt="Candidate Image" style='max-width:55px;border-radius: 16px;border: 1px solid #164885;'></a>
                                    </div>
                                    <h3><a href="n/${member.m_id}">${member.m_name || 'Name not available'}</a></h3>
                                    <span>${member.m_profession || 'Profession not available'}</span>
                                    <div class="bookmark-btn">
                                        <i class="ri-bookmark-line"></i>
                                    </div>
                                    <div class="hover-bookmark-btn">
                                        <i class="ri-bookmark-fill"></i>
                                    </div>
                                </div>
                                <ul class="job-tag-list">
                                    <li>Featured</li>
                                </ul>
                                <ul class="location-information">
                                    <li><i class="ri-time-line"></i> ${skills}</li>
                                    <li><i class="ri-map-pin-line"></i> ${member.m_current_city || 'Location not available'}</li>
                                    <li><i class="ri-map-pin-line"></i> ${member.uae_experience || 'Experience not available'}</li>
                                </ul>
                                <div class="job-btn">
                                    <a href="n/${member.m_id}" class="default-btn">Hire Me <i class="flaticon-list-1"></i></a>
                                </div>
                            </div>
                        `;

                                // Set the HTML for the candidate listing div
                                candidateListing.html(candidateHtml);

                                // Append the candidate listing to the current row
                                currentRow.append(candidateListing);

                                // If we've added three candidates to the current row, append it to the container and create a new row
                                if ((index + 1) % 3 === 0) {
                                    featuredCandidatesContainer.append(currentRow);
                                    currentRow = $('<div class="row"></div>'); // Start a new row
                                }
                            };

                            img.onerror = function () {
                                console.log('Image does not exist for ' + (member.m_name || 'Unknown'));
                            };
                        } else {
                            console.log('No profile found for member at index ' + index);
                        }
                    });

                    // If there are any remaining candidates in the last row, append it to the container
                    if (currentRow.children().length > 0) {
                        featuredCandidatesContainer.append(currentRow);
                    }
                },
                error: function (xhr, status, error) {
                    // Handle errors here if the AJAX request fails
                    console.log(error);
                }
            });
        });

    </script>


    </script>

</body>

</html>