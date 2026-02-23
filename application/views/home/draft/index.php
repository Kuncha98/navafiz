<?php
$user_id = $this->session->userdata('user_id');
$session_user_id = $user_id;
  if(empty($user_id)){
    $data = checkCookie();
    if(!empty($data)){
      if($data == $user_id){
        redirect(base_url('profile/'.intval($data)));
      }
    }
  }
  if($session_user_id>0){
      BlockUserCheck($session_user_id);
  }  
?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<?php if(isset($page_meta['title']) && !empty($page_meta)){?>
		<meta property="og:url" content="<?=site_url($page_meta['og_url']);?>" />
        <meta property="og:image" content="http://navafiz.com/<?=$page_meta['og_img']?>"/> 
        <meta property="og:image:secure_url" content="<?=site_url($page_meta['og_img']);?>" /> 
        <meta property="og:title" content="<?=$page_meta['title'];?>" /> 
        <meta property="og:description" content="<?=$page_meta['description'];?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <meta name="twitter:card" content="<?=site_url($page_meta['og_img']);?>">
        <meta name="twitter:title" content="<?=$page_meta['title'];?>">
        <meta name="twitter:description" content="<?=$page_meta['description'];?>">
        <meta name="twitter:image" content="<?=site_url($page_meta['og_img']);?>">
    <?php }?>
		<!-- Site Title -->
		<title>Job Listing</title>
		
		<link rel="icon" type="image/png" href="<?=site_url()?>jassets/images/favicon.png">

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="<?=site_url()?>jassets/draft/css/linearicons.css">
			<link rel="stylesheet" href="<?=site_url()?>jassets/draft/css/font-awesome.min.css">
			<link rel="stylesheet" href="<?=site_url()?>jassets/draft/css/bootstrap.css">
			<link rel="stylesheet" href="<?=site_url()?>jassets/draft/css/magnific-popup.css">
			<link rel="stylesheet" href="<?=site_url()?>jassets/draft/css/nice-select.css">					
			<link rel="stylesheet" href="<?=site_url()?>jassets/draft/css/animate.min.css">
			<link rel="stylesheet" href="<?=site_url()?>jassets/draft/css/owl.carousel.css">
			<link rel="stylesheet" href="<?=site_url()?>jassets/draft/css/main.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            .candidate-card {
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .skill-text {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 200px; /* adjust as needed */
                display: inline-block;
                vertical-align: middle;
            }
            .truncate-text {
                display: block;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 200px; /* adjust based on card width */
            }
            .testimonial-card {
                height: 400px; /* ✅ force equal height */
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                text-align: center;
                padding: 20px;
                transition: transform 0.3s ease-in-out;
            }
            
            .testimonial-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            }
            
            .testimonial-message {
                font-style: italic;
                font-size: 15px;
                color: #555;
                line-height: 1.5;
                max-height: 120px;  /* ✅ prevents overflow */
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 5;   /* ✅ show max 5 lines */
                -webkit-box-orient: vertical;
            }
        </style>
		</head>
		<body>
		    <?php $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?> 
            <?php $loggedin_name = $this->session->userdata('name') =='' ? 0: $this->session->userdata('name');?>
            <?php $loggedin_email = $this->session->userdata('email') =='' ? 0: $this->session->userdata('email');?>
            <?php $loggedin_avatar = $this->session->userdata('avatar') =='' ? 0: $this->session->userdata('avatar');?>
            <input type="hidden" name="page_id" id="page_id" />
            <input type="hidden" name="limit" id="limit" />
            <input type="hidden" name="cat_id" id="cat_id" />

			<header id="header">
                <div class="container">
                    <div class="row align-items-center justify-content-between d-flex header-flex">
                  
                  <!-- Logo -->
                  <div id="logo">
                    <a href="index.html">
                      <!-- Use your dark logo version here -->
                      <img id="mainLogo" src="<?=site_url()?>jassets/draft/img/logo-invers.png" style="width: 130px;" alt="Logo" />
                    </a>
                  </div>					  
                        <ul class="nav-menu center-menu auth-buttons">
                    
                        <li class="menu-active">
                            <a href="<?=site_url()?>" class="ticker-btn1">Home</a>
                        </li>
                    
                        <!-- Job Listing Dropdown -->
                        <li class="nav-item">
                            <a href="#" class="ticker-btn1">
                                Job Listing <i class="ri-arrow-down-s-line" style="padding-left:5px;"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=site_url('jobs')?>" class="ticker-btn1">Featured Jobs</a></li>
                                <li><a href="<?=site_url('recruiters-support-system')?>" class="ticker-btn1">Recruitment Support</a></li>
                                <li><a href="<?=site_url('job-seeker-support-system')?>" class="ticker-btn1">Job Seekers Support</a></li>
                                <li><a href="<?=site_url('users_list/users_by_list/82')?>" class="ticker-btn1">Featured Profiles</a></li>
                                <li><a href="<?=site_url('feed')?>" class="ticker-btn1">As Received Jobs</a></li>
                            </ul>
                        </li>
                    
                        <!-- Candidates Dropdown -->
                        <li class="nav-item">
                            <a href="#" class="ticker-btn1">
                                Candidates <i class="ri-arrow-down-s-line" style="padding-left:5px;"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=site_url('users_list/users_by_list/82')?>" class="ticker-btn1">See Featured Profiles</a></li>
                                <li><a href="<?=site_url()?>" class="ticker-btn1">Candidates Dashboard</a></li>
                            </ul>
                        </li>
                    
                        <!-- Blog -->
                        <li class="nav-item">
                            <a href="<?= site_url(); ?>" class="ticker-btn1">
                                Blog
                            </a>
                        </li>
                        
                        <!-- Testimonial -->
                        <li class="nav-item">
                            <a href="<?= site_url('testimonials'); ?>" class="ticker-btn1">
                                Testimonial
                            </a>
                        </li>
                    
                        <!-- Contact -->
                        <li><a href="<?=site_url('contact')?>" class="ticker-btn1">Contact Us</a></li>
                    </ul>
                        <?php if($user_id > 0){ ?>
                            <div class="dropdown" style="position: relative; display: inline-block;">
                                <!-- Profile Icon -->
                                <button class="dropdown-toggle" style="background: none; border: none; cursor: pointer;">
                                    <img src="<?= profile_picture($session_user_id) ?>" 
                                         alt="Profile" 
                                         style="width:40px; height:40px; border-radius:50%; object-fit: cover;">
                                         <span style="margin:10px 0 0; font-weight:bold;"><?= $loggedin_name ?></span>
                                </button>
                            
                                <!-- Dropdown Menu -->
                                <div class="dropdown-menup" 
                                     style="display: none; position: absolute; right:0; left: 35px; background: #fff; border-radius:8px; 
                                            box-shadow: 0 4px 10px rgba(0,0,0,0.1); min-width:220px; z-index:1000;">
                            
                                    <!-- Role Based (CV Review Team, etc.) -->
                                    <?php if(in_array($session_user_id, CvReviewTeamList())){ ?>
                                        <hr style="margin:5px 0;">
                                        <a href="<?= site_url('profile/status');?>" class="btn btn-outline-secondary" style="margin:5px; display:block;">Change Status</a>
                                        <a href="<?= site_url('mentors/activity');?>" target="_blank" class="btn btn-outline-secondary" style="margin:5px; display:block;">Mentors Activity</a>
                                        <a href="<?= site_url('blueuser/adduser');?>" target="_blank" class="btn btn-outline-secondary" style="margin:5px; display:block;">Add Blue User</a>
                                        <a href="<?= site_url('blueuser/listusers');?>" target="_blank" class="btn btn-outline-secondary" style="margin:5px; display:block;">View Blue Users</a>
                                        <a href="<?= site_url('mentors/quick_job_applicants');?>" target="_blank" class="btn btn-outline-secondary" style="margin:5px; display:block;">Easy Jobs Candidates</a>
                                        <a href="<?= site_url('recruitment_projects/');?>" target="_blank" class="btn btn-outline-secondary" style="margin:5px; display:block;">Recruitment Projects</a>
                                    <?php } ?>
                            
                                    <!-- Common Options -->
                                    <hr style="margin:5px 0;">
                                        <a href="<?= site_url('profile/AddCV');?>" class="btn btn-outline-secondary" style="margin:5px; display:block;">Upload Resume</a>
                                        <a href="<?= site_url('edit-profile');?>" class="btn btn-outline-secondary" style="margin:5px; display:block;">Edit Profile</a>
                                        <a href="<?= site_url('profile/'.$user_id);?>" class="btn btn-outline-secondary" style="margin:5px; display:block;">View Profile</a>
                                        <a href="<?= site_url('user/change_password');?>" class="btn btn-outline-secondary" style="margin:5px; display:block;">Change Password</a>
                            
                                    <!-- Logout -->
                                        <a href="<?= site_url('user/logout');?>" class="btn btn-outline-danger" style="margin:5px; display:block;">Logout</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <!-- Right: Login/Register -->
                            <div class="auth-buttons">
                                <a class="ticker-btn1" href="<?= site_url('user/login?return_url='.current_url()); ?>">
                                    <i class="flaticon-padlock"></i> Login
                                </a>
                                <a class="ticker-btn" href="<?= base_url('user/register') ?>">
                                    <i class="flaticon-user"></i> Register
                                </a>
                            </div>
                        <?php } ?>
                </div>
                </div>
            </header>
			
			<!-- Start feature-cat Area -->
			<section class="feature-cat-area pt-100" id="category">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Job Opportunities in the UAE & GCC</h1>
								<p style="font-size: 16px;">Discover top job openings across the U.A.E. and the wider GCC region. Whether you're looking for a new career challenge or seeking to elevate your professional journey, our featured listings showcase the best opportunities across various industries in the Middle East.</p>
							</div>
						</div>
					</div>	
					<div class="container my-4">
                      <!-- Dynamic job cards will be loaded here -->
                      <div id="job-list-container"></div>
                    
                      <!-- Browse All Jobs button -->
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 justify-content-center align-items-center d-flex mt-5">
                            <a href="<?= base_url('jobs') ?>" 
                               class="btn text-light btn-lg w-100" 
                               style="background-color: #0C4A88; max-width: 300px; border-radius: 10px; font-size: 16px;">
                               <i class="fas fa-search mx-2"></i> Browse All Jobs
                            </a>
                        </div>
                        <div class="col-md-4"></div>
                      </div>
                    </div>

										  
				</div>	
			</section>
			<!-- End feature-cat Area -->
			
			<!-- Start feature-cat Area -->
			<section class="feature-cat-area pt-100" id="category">
                <div class="container">
                    <!-- Section Title -->
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-60 col-lg-10">
                            <div class="title text-center">
                                <h1 class="mb-10">Find Talent From The Featured Ones</h1>
                                <p style="font-size: 16px;">
                                    Tap into a curated selection of top-tier talent from across the U.A.E. and GCC region. 
                                    Whether you're hiring for key roles or niche skills, our featured candidates are ready to 
                                    meet the demands of the local market. Simplify your hiring process and connect with 
                                    exceptional professionals in the heart of the Middle East.
                                </p>
                            </div>
                        </div>
                    </div>  
            
                    <!-- Dynamic Candidates Section -->
                    <div class="container my-4">
                        <!-- Cards will be injected here -->
                        <div id="featured-candidates-box" class="row"></div>
            
                        <!-- View All Button -->
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 justify-content-center align-items-center d-flex mt-5">
                                <a href="<?= base_url() ?>professionals" class="btn text-light btn-lg w-100" style="background-color: #0C4A88; max-width: 300px; border-radius: 10px; font-size: 16px;">
                                    <i class="fas fa-search mx-2"></i> View All Talents
                                </a>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </section>

			<!-- End feature-cat Area -->

			<section class="mentor-section text-center my-5">
                <div class="container">
                    <h1 class="font-weight-bold text-light mb-2">Top Mentors</h1>
                    <p class="mb-5">Find Your Ideal Mentor From 900+ Top Experienced Mentors</p>
            
                    <div id="mentors-box" class="row justify-content-center">
                        <!-- Mentors will be injected here -->
                    </div>
            
                    <a href="<?= base_url() ?>users_list/users_by_list/100" class="btn view-all-btn mt-4">
                        <i class="fas fa-search"></i> View all Mentors
                    </a>
                </div>
            </section>

            <section class="mentor-section1 text-center my-5">
				<div class="container">
				  <h1 class="font-weight-bold mb-2">NAVAFIZ SERVICES</h1>
				  <p class="mb-5">Find Your Ideal Mentor From 900+ Top Experienced Mentors</p>
			  
				  <div class="row">
					<!-- Mentor Card -->
					<div class="col-12 col-sm-6 col-md-4 mb-4">
					  <div class="mentor-card">
						<img src="<?=site_url()?>jassets/draft/img/Office.png" alt="Mentor">
						<h5 style="color: #0C4A88;">Corporate</h5>
						<button class="btn-trial">Company Formation / SetupPRO & HR Services Documents
							Attestation Services Sourcing
							& Procurement Consultant.</button>
					  </div>
					</div>
					<!-- Repeat 3 More Cards -->
					<div class="col-12 col-sm-6 col-md-4 mb-4">
					  <div class="mentor-card">
						<img src="<?=site_url()?>jassets/draft/img/Success.png" alt="Mentor">
						<h5 style="color: #0C4A88;">Financial</h5>
						<button class="btn-trial">Audit and Book Keeping Bank
							Facilities Corporate Bank
							Account Opening.</button>
					  </div>
					</div>
					<div class="col-12 col-sm-6 col-md-4 mb-4">
					  <div class="mentor-card">
						<img src="<?=site_url()?>jassets/draft/img/Research.png" alt="Mentor">
						<h5 style="color: #0C4A88;">Recruitment</h5>
						<button class="btn-trial">Overseas & Local RecruitmentBlue Collar and White Collar HiringProviding candidates for all
							industries from around the world.</button>
					  </div>
					</div>
				  </div>
				  <div class="container">
                      <div class="row justify-content-center">
                        <!-- Mentor Card -->
                        <div class="col-12 col-sm-12 col-md-12 mb-4 text-center">
                          <img src="<?=site_url()?>jassets/draft/img/Services.png" 
                               alt="Mentor" 
                               class="img-fluid rounded">
                        </div>
                      </div>
                    </div>
				</div>
			  </section>


			  <div class="container my-5">
				<div class="video-section">
				  <div class="video-overlay"></div>
				  <div class="video-content">
					<span class="play-btn" data-toggle="modal" data-target="#videoModal"><i class="fas fa-play"></i></span>
					<h2 class="text-light">See How NAVAFIZ Helps<br>You To Hire Talent</h2>
				  </div>
				</div>
			  </div>
			  
			  <!-- Video Modal -->
			  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
				  <div class="modal-content bg-dark">
					<div class="modal-body p-0">
					  <video id="videoPlayer" class="w-100" controls autoplay>
						<source src="<?=site_url()?>jassets/draft/img/video/dubai_video.mp4" type="video/mp4">
						Your browser does not support HTML5 video.
					  </video>
					</div>
				  </div>
				</div>
			  </div>
				
			<!-- Start download Area -->
			<section class="download-area section-gap" id="app">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 download-right">
							<h1>Build Your Professional
								Resume With The
								Help Of Expert</h1>
							<p class="subs">
								Enhance your career prospects with a standout resume tailored to the U.A.E. and GCC job market. Our expert resume writers specialize in crafting documents that highlight your skills, experience, and achievements in a way that resonates with employers across the region. Whether you're aiming for local or regional opportunities, we'll help you make a strong first impression.
							</p>
							<button class="btn text-light" style="background-color: #0C4A88;">Our Resume Packages</button>						
						</div>
						<div class="col-lg-6 download-left">
							<img class="img-fluid" src="<?=site_url()?>jassets/draft/img/7221.png" alt="">
						</div>
					</div>
				</div>	
			</section>
			<!-- End download Area -->
			
			<section class="testimonials-section my-5">
              <div class="container">
                <h2 class="text-center font-weight-bold mb-4">What Our Clients Say</h2>
            
                <!-- Swiper Container -->
                <div class="swiper testimonials-swiper">
                  <div class="swiper-wrapper" id="testimonials-box">
                    <!-- AJAX testimonials will load here -->
                  </div>
            
                  <!-- Swiper Controls -->
                  <div class="swiper-pagination"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
                </div>
              </div>
            </section>



		
			<!-- start footer Area -->		
			<!-- Footer Start -->
            <footer class="footer text-white pt-5 pb-4" style="background-color: #0A4A8D;">
            	<div class="container">
            	  <div class="row">
            		
            		<!-- Logo and Description -->
            		<div class="col-12 col-sm-6 col-md-4 mb-4">
            		  <img src="<?=site_url()?>jassets/draft/img/logo-inverse-310x44.png" alt="NAVAFIZ Logo" style="width: 120px; background-color: white; border-radius: 6px;">
            		  <p class="mt-3" style="font-size: 14px; line-height: 1.6;">
            			Navafiz Management Consultancies, established in 2013, specializes in recruitment services for blue and white-collar roles across multiple industries in the U.A.E., GCC, USA, and Europe. We also offer a wide range of business services, including company formation, PRO & HR support, and procurement consulting.
            		  </p>
            		</div>
              
            		<!-- Company -->
            		<div class="col-md-2 mb-4">
            		  <h4 class="font-weight-bold text-light">Company</h4>
            		  <ul class="list-unstyled mt-3">
            			<li><a href="#" class="footer-link">About NAVAFIZ</a></li>
            			<li><a href="#" class="footer-link">Browse Jobs</a></li>
            			<li><a href="#" class="footer-link">Contact Us</a></li>
            			<li><a href="#" class="footer-link">Candidate Dashboard</a></li>
            		  </ul>
            		</div>
              
            		<!-- Resources -->
            		<div class="col-md-2 mb-4">
            		  <h4 class="font-weight-bold text-light">Resources</h4>
            		  <ul class="list-unstyled mt-3">
            			<li><a href="#" class="footer-link">Blog</a></li>
            			<li><a href="#" class="footer-link">Post A Job</a></li>
            			<li><a href="#" class="footer-link">Candidates</a></li>
            			<li><a href="#" class="footer-link">Privacy Policy</a></li>
            		  </ul>
            		</div>
              
            		<!-- Quick Contact -->
            		<div class="col-12 col-sm-6 col-md-4 mb-4">
            		  <h4 class="font-weight-bold text-light">Quick Contact</h4>
            		  <p class="mt-3" style="font-size: 14px;">
            			Office 204 Building No 11<br>
            			Damascus St. Al Qusais 2 - Dubai - UAE
            		  </p>
            		  <p style="font-size: 14px;">
            			<i class="fas fa-phone-alt mr-2"></i> 
            			<a href="tel:+97143635252" class="footer-link">+971 4363 5252</a> |
            			<a href="tel:+97142977879" class="footer-link ml-2">+971 4297 7879</a>
            		  </p>
            		  <p style="font-size: 14px;">
            			<i class="fas fa-envelope mr-2"></i> 
            			<a href="mailto:info@navafiz.com" class="footer-link">info@navafiz.com</a>
            		  </p>
            		</div>
            	  </div>
              
            	  <!-- Bottom Row -->
            	  <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3 mt-4">
            		<p class="mb-2 mb-md-0" style="font-size: 14px;">© 2025 NAVAFIZ. All Rights Reserved</p>
            		<div>
            		  <a href="#" class="footer-link mr-3">Privacy Policy</a>
            		  <a href="#" class="footer-link">Terms & Conditions</a>
            		</div>
            	  </div>
            	</div>
              </footer>
			<!-- End footer Area -->		

			<script src="<?=site_url()?>jassets/draft/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="<?=site_url()?>jassets/draft/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
			<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  			<script src="<?=site_url()?>jassets/draft/js/easing.min.js"></script>			
			<script src="<?=site_url()?>jassets/draft/js/hoverIntent.js"></script>
			<script src="<?=site_url()?>jassets/draft/js/superfish.min.js"></script>	
			<script src="<?=site_url()?>jassets/draft/js/jquery.ajaxchimp.min.js"></script>
			<script src="<?=site_url()?>jassets/draft/js/jquery.magnific-popup.min.js"></script>	
			<script src="<?=site_url()?>jassets/draft/js/owl.carousel.min.js"></script>			
			<script src="<?=site_url()?>jassets/draft/js/jquery.sticky.js"></script>
			<script src="<?=site_url()?>jassets/draft/js/jquery.nice-select.min.js"></script>			
			<script src="<?=site_url()?>jassets/draft/js/parallax.min.js"></script>		
			<script src="<?=site_url()?>jassets/draft/js/mail-script.js"></script>	
			<script src="<?=site_url()?>jassets/draft/js/main.js"></script>	
			<script>
				$('#videoModal').on('hidden.bs.modal', function () {
				  const video = document.getElementById('videoPlayer');
				  video.pause();
				  video.currentTime = 0;
				});
				window.addEventListener('scroll', function () {
				  const header = document.getElementById('header');
				  const logo = document.getElementById('mainLogo');
			  
				  if (window.scrollY > 50) {
					header.classList.add('scrolled');
					logo.src = '<?=site_url()?>jassets/draft/img/logo-invers.png'; // New logo on scroll
				  } else {
					header.classList.remove('scrolled');
					logo.src = '<?=site_url()?>jassets/draft/img/logo-invers.png'; // Original logo
				  }
				});
				
                  document.addEventListener("DOMContentLoaded", function(){
                      const toggle = document.querySelector(".dropdown-toggle");
                      const menu = document.querySelector(".dropdown-menup");
                      toggle.addEventListener("click", function(){
                          menu.style.display = menu.style.display === "block" ? "none" : "block";
                      });
                      document.addEventListener("click", function(e){
                          if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                              menu.style.display = "none";
                          }
                      });
                  });
                  $(document).ready(function () {
                        $.ajax({
                            url: 'jobs/getfeaturedlistnew',
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                var jobListContainer = $('#job-list-container');
                                var currentRow = $('<div class="row"></div>');
                    
                                $.each(data.jobs, function (index, job) {
                                    // Convert Unix timestamp to a Date object
                                    var date = new Date(job.j_add_date * 1000);
                    
                                    // Format the date as "X min ago" OR fallback to readable date
                                    var now = new Date();
                                    var diffMinutes = Math.floor((now - date) / 60000);
                                    var formattedDate = diffMinutes < 60 
                                        ? diffMinutes + " min ago" 
                                        : date.toLocaleDateString('en-US', {
                                            year: 'numeric',
                                            month: 'short',
                                            day: 'numeric'
                                        });
                    
                                    // Create card column
                                    var jobListing = $('<div class="col-12 col-sm-6 col-md-4 mb-4"></div>');
                    
                                    // Construct HTML with your card design
                                    var jobHtml = `
                                        <div class="job-card shadow-sm rounded p-3">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="badge job-badge px-2 py-1" style="font-size: 12px;">${formattedDate}</span>
                                                <i class="far fa-bookmark"></i>
                                            </div>
                                            <img src="<?= site_url() ?>assets/uploads/jobs/${job.j_image ? job.j_image : 'work-list.png'}" 
                                                 alt="Job Image" class="img-fluid rounded mb-3" style="max-height:150px; object-fit:cover;">
                                            
                                            <h5 class="mb-1">${job.j_title}</h5>
                                            <p class="text-muted mb-3" style="font-size: 14px;">${job.j_company}</p>
                                    
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="far fa-clock mr-2"></i>
                                                    <small class="text-muted">${job.j_type || "Full time"}</small>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-map-marker-alt mr-2" style="margin-left: 20px;"></i>
                                                    <small class="text-muted">${job.j_location}</small>
                                                </div>
                                                <a href="<?=base_url()?>job/${job.j_id}" class="btn btn-sm btn-primary ml-auto">Job Details</a>
                                            </div>
                                        </div>
                                    `;
                    
                                    jobListing.html(jobHtml);
                                    currentRow.append(jobListing);
                    
                                    if ((index + 1) % 3 === 0) {
                                        jobListContainer.append(currentRow);
                                        currentRow = $('<div class="row"></div>');
                                    }
                                });
                    
                                if (currentRow.children().length > 0) {
                                    jobListContainer.append(currentRow);
                                }
                            },
                            error: function (xhr, status, error) {
                                console.log(error);
                            }
                        });
                    });
                    
                    
                    $(document).ready(function () {
                        $.ajax({
                            url: 'professionals/professionalsajaxnew',
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                    
                                // Container for candidates
                                var featuredCandidatesContainer = $('#featured-candidates-box');
                                featuredCandidatesContainer.empty(); // clear previous data
                    
                                var currentRow = $('<div class="row justify-content-center"></div>');
                    
                                $.each(data.members.slice(0, 6), function (index, memberWrapper) {
                                    if (memberWrapper.profile && memberWrapper.profile.length !== 0) {
                                        var member = memberWrapper.profile;
                                        // Build image URL
                                        var imageUrl = member.m_avatar 
                                            ? `<?= site_url() ?>assets/uploads/members/${member.m_avatar}`
                                            : `<?= site_url() ?>assets/uploads/members/default.png`;
                                        var skills = member.m_skills ? member.m_skills.split(',').slice(0, 3).join(', ') : 'No skills listed';
                                
                                        var candidateHtml = `
                                            <div class="col-12 col-sm-6 col-md-4 mb-4 d-flex">
                                                <div class="candidate-card p-4 rounded shadow-sm bg-white w-100">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <span class="badge px-3 py-1 candidate-badge">Featured</span>
                                                        <i class="far fa-bookmark text-muted"></i>
                                                    </div>
                                
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-center mr-3">
                                                            <img src="${imageUrl}" class="rounded-circle mb-2" alt="Candidate"
                                                                 style="width:80px; height:80px; object-fit:cover;">
                                                            <h4 class="mb-0 font-weight-bold">${member.m_name || 'Name not available'}</h4>
                                                            <small class="text-muted">${member.m_profession || 'Profession not available'}</small>
                                                        </div>
                                
                                                        <div class="ml-3">
                                                            <p class="mb-2 truncate-text"><i class="fas fa-briefcase mr-2" style="font-size:25px;color:#0C4A88;"></i> ${member.m_profession || 'N/A'}</p>
                                                            <p class="mb-2"><i class="fas fa-history mr-2" style="font-size:25px;color:#0C4A88;"></i> ${member.uae_experience || 'Experience not available'}</p>
                                                            <p class="mb-2 truncate-text">
                                                                <i class="fas fa-gem mr-2" style="font-size:25px;color:#0C4A88;"></i> 
                                                                <span class="skill-text" title="${skills}">${skills}</span>
                                                            </p>
                                                            <p class="mb-3"><i class="fas fa-map-marker-alt mr-2" style="font-size:25px;color:#0C4A88;"></i> ${member.m_current_city || 'Location not available'}</p>
                                                            <a href="n/${member.m_id}" class="btn btn-sm" style="background-color:#0C4A88; color:white; width:137px;">Hire Me</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                
                                        currentRow.append(candidateHtml);
                                
                                        if ((index + 1) % 3 === 0) {
                                            featuredCandidatesContainer.append(currentRow);
                                            currentRow = $('<div class="row justify-content-center"></div>');
                                        }
                                    }
                                });
                    
                    
                                if (currentRow.children().length > 0) {
                                    featuredCandidatesContainer.append(currentRow);
                                }
                            },
                            error: function (xhr, status, error) {
                                console.log(error);
                            }
                        });
                    });
                    $(document).ready(function () {
                        $.ajax({
                            url: 'professionals/users_by_list_json/100',
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                var mentorsContainer = $('#mentors-box');
                                mentorsContainer.empty();
                        
                                $.each(data.members.slice(0, 4), function (index, mentor) {
                                    var imageUrl = mentor.m_avatar 
                                        ? `<?= site_url() ?>assets/uploads/members/${mentor.m_avatar}`
                                        : `<?= site_url() ?>assets/uploads/members/default.png`;
                        
                                    var mentorHtml = `
                                        <div class="col-md-3 mb-4 d-flex">
                                            <div class="mentor-card w-100">
                                                <img src="${imageUrl}" alt="Mentor"
                                                     class="img-fluid rounded mb-2"
                                                     style="height: 180px; width: 170px; object-fit: cover;">
                                                <h5>${mentor.m_name || 'Name not available'}</h5>
                                                <p>${mentor.m_profession || 'Profession not available'}</p>
                                                <button class="btn-trial">Book a Free Trial</button>
                                            </div>
                                        </div>
                                    `;
                        
                                    mentorsContainer.append(mentorHtml);
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching mentors:", error);
                                console.log("Response text:", xhr.responseText);
                            }
                        });
                    });
                    
                    $(document).ready(function () {
                        $.ajax({
                            url: 'professionals/testimonials',
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                var testimonialsContainer = $('#testimonials-box');
                                testimonialsContainer.empty();
                    
                                // take only 6 latest testimonials
                                $.each(data.testimonials.slice(0, 6), function (index, testimonial) {
                                    var testimonialHtml = `
                                        <div class="swiper-slide">
                                            <div class="testimonial-card shadow-sm rounded bg-white">
                                                <div>
                                                    <img src="${testimonial.avatar}" 
                                                         alt="${testimonial.name}" 
                                                         class="rounded-circle mb-3"
                                                         style="width:80px; height:80px; object-fit:cover;">
                                                    <h5 class="mb-2">${testimonial.title}</h5>
                                                    <p class="testimonial-message">"${testimonial.description}"</p>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">${testimonial.name}</h6>
                                                    <small class="text-muted">${testimonial.profession}</small><br>
                                                    <small class="text-muted">${testimonial.added_on}</small>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    testimonialsContainer.append(testimonialHtml);
                                });
                    
                                // Initialize Swiper after testimonials are added
                                new Swiper('.testimonials-swiper', {
                                    loop: true,
                                    slidesPerView: 3,
                                    spaceBetween: 30,
                                    autoplay: {
                                        delay: 4000,
                                        disableOnInteraction: false,
                                    },
                                    pagination: {
                                        el: '.swiper-pagination',
                                        clickable: true,
                                    },
                                    navigation: {
                                        nextEl: '.swiper-button-next',
                                        prevEl: '.swiper-button-prev',
                                    },
                                    breakpoints: {
                                        0: { slidesPerView: 1 },
                                        576: { slidesPerView: 2 },
                                        992: { slidesPerView: 3 }
                                    }
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching testimonials:", error);
                            }
                        });
                    });





            </script>
			  
		</body>
	</html>