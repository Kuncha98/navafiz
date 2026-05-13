<!-- Hero section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="hero-card">
            <h6 class="mb-3 text-uppercase">WELCOME TO NAVAFIZ</h6>
            <h1>Where Recruiters Find Professionals <br> & Professionals Find Jobs </h1>
            <p>
                Navafiz Management Consultancies, established in 2013, specializes in recruitment services in the
                U.A.E.
            </p>
            <a href="#services" class="btn btn-start">Get Started</a>
            <a href="<?= site_url('professionals') ?>" class="btn btn-start ms-sm-3 mt-3 mt-sm-0">Find Professionals</a>
            <a href="<?= site_url('feed'); ?>" class="btn btn-start ms-sm-3 mt-3 mt-sm-0">Find Jobs</a>
        </div>
    </div>
</section>

<!-- Services section -->
<section class="services-section" id="services">
    <div class="container position-relative z-1">

        <!-- Section header -->
        <div class="mb-4">
            <p class="section-subtitle">A complete workforce platform.</p>
            <h2 class="section-title">Connect. Hire. Grow.</h2>
        </div>

        <!--Nav pills -->
        <ul class="nav nav-pills services-tabs mb-5 flex-column flex-lg-row" id="servicesTab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#hire">
                    <i class="fas fa-credit-card"></i> Hire Talents
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#job">
                    <i class="fas fa-file-invoice-dollar"></i> Find a Job
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#manpower">
                    <i class="fas fa-users"></i> Manpower Suppliers
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#freelance">
                    <i class="fas fa-graduation-cap"></i> Work as a Freelancer
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#mentor">
                    <i class="fas fa-briefcase"></i> Become a Mentor
                </button>
            </li>

        </ul>

        <!-- Tab content -->
        <div class="tab-content">

            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="hire">

                <div class="service-content-wrapper">
                    <div class="row align-items-center g-5">

                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <h3 class="fw-bold mb-4">Find Verified Professionals Ready to Work</h3>
                            <p>
                                Access a growing network of skilled laborers and qualified professionals across
                                multiple industries. Whether you need short-term staff or long-term employees,
                                quickly connect with the right candidates.
                            </p>

                            <ul class="service-list mt-4">
                                <li>
                                    <p>Browse detailed professional profiles with verified skills</p>
                                </li>
                                <li>
                                    <p>Filter candidates by industry, experience, and availability</p>
                                </li>
                                <li>
                                    <p>Post job listings and receive direct applications</p>
                                </li>
                                <li>
                                    <p>Save, shortlist, and manage candidates efficiently</p>
                                </li>
                            </ul>

                            <a href="<?= site_url('/services/hire-a-talent') ?>" class="btn view-btn">Send a
                                request</a>
                        </div>

                        <div class="col-lg-6">
                            <div class="service-image-wrapper">
                                <img src="<?= base_url('navassets/img/homepage-bg.jpg') ?>" alt="">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Tab 2 -->
            <div class="tab-pane fade" id="job">
                <div class="service-content-wrapper">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <h3 class="fw-bold mb-4">Discover Career Opportunities That Match Your Skills</h3>
                            <p>Explore job openings from trusted employers and apply directly through the platform.
                                Build your professional profile and get noticed by recruiters actively hiring.</p>

                            <ul class="service-list mt-4">
                                <li>
                                    <p>Search jobs by category, location, and experience level</p>
                                </li>
                                <li>
                                    <p>Create a professional profile to attract recruiters</p>
                                </li>
                                <li>
                                    <p>Apply instantly to verified job postings</p>
                                </li>
                                <li>
                                    <p>Track applications and manage your career journey</p>
                                </li>
                            </ul>

                            <a href=" <?= site_url('/services/find-a-job') ?>" class="btn view-btn">Send a request</a>

                            <a href=" <?= site_url('/user/register') ?>" class="btn view-btn">Create a profile</a>

                            <button type="button" class="btn view-btn" data-bs-toggle="modal"
                                data-bs-target="#uploadResumeModal">
                                Upload Resume
                            </button>
                        </div>
                        <div class="col-lg-6">
                            <div class="service-image-wrapper">
                                <img src="<?= base_url('navassets/img/find-a-job.jpg') ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 3 -->
            <div class="tab-pane fade" id="manpower">
                <div class="service-content-wrapper">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <h3 class="fw-bold mb-4">Partner With Us to Supply Skilled Manpower</h3>
                            <p>Connect with companies and organizations seeking reliable manpower solutions.
                                Showcase your workforce capabilities and collaborate with trusted employers
                                looking for qualified personnel across various industries.</p>

                            <ul class="service-list mt-4">
                                <li>
                                    <p>Register your company and showcase your workforce expertise</p>
                                </li>
                                <li>
                                    <p>Connect with employers seeking reliable manpower supply partners</p>
                                </li>
                                <li>
                                    <p>Receive manpower requests across multiple industries</p>
                                </li>
                                <li>
                                    <p>Manage partnerships and grow your manpower supply network</p>
                                </li>
                            </ul>

                            <a href="<?= site_url('/services/supply-manpower') ?>" class="btn view-btn">Join as a
                                Manpower Partner</a>
                        </div>
                        <div class="col-lg-6">
                            <div class="service-image-wrapper">
                                <img src="<?= base_url('navassets/img/manpower-supply.jpg') ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 4 -->
            <div class="tab-pane fade" id="freelance">
                <div class="service-content-wrapper">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <h3 class="fw-bold mb-4">Find Flexible Assignments & Project-Based Work</h3>
                            <p>Connect with companies and individuals looking for freelance professionals. Whether
                                you're a consultant, technician, or specialist, find projects that fit your
                                schedule.</p>

                            <ul class="service-list mt-4">
                                <li>
                                    <p>Discover short-term and project-based assignments</p>
                                </li>
                                <li>
                                    <p>Negotiate terms directly with clients</p>
                                </li>
                                <li>
                                    <p>Build your freelance reputation and client base</p>
                                </li>
                            </ul>

                            <a href="<?= site_url('/services/become-a-freelancer') ?>" class="btn view-btn">Send a
                                request</a>
                        </div>
                        <div class="col-lg-6">
                            <div class="service-image-wrapper">
                                <img src="<?= base_url('navassets/img/freelancer.jpg') ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 5 -->
            <div class="tab-pane fade" id="mentor">
                <div class="service-content-wrapper">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <h3 class="fw-bold mb-4">Share Your Expertise & Guide Future Professionals</h3>
                            <p>Join as a mentor or trainer and support job seekers and professionals in advancing
                                their careers. Help others grow while expanding your own professional network.</p>

                            <ul class="service-list mt-4">
                                <li>
                                    <p>Connect with mentees seeking career guidance</p>
                                </li>
                                <li>
                                    <p>Offer structured training or one-on-one sessions</p>
                                </li>
                                <li>
                                    <p>Build credibility and professional recognition</p>
                                </li>
                                <li>
                                    <p>Build credibility and professional recognition</p>
                                </li>
                            </ul>

                            <a href="<?= site_url('/services/become-a-mentor') ?>" class="btn view-btn">Send a
                                request</a>
                        </div>
                        <div class="col-lg-6">
                            <div class="service-image-wrapper">
                                <img src="<?= base_url('navassets/img/mentor.jpg') ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process section -->
<section class="process-section" id="process">
    <div class="container position-relative z-1">
        <!-- Section header -->
        <div class="mb-4">
            <p class="section-subtitle">A complete workforce platform.</p>
            <h2 class="section-title">We Are Specialized In</h2>
        </div>

        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="process-card text-start">
                    <div class="d-flex align-items-center">
                        <div class="icon-box me-4">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="mb-0">Corporate</h3>
                    </div>
                    <ul class="service-list mt-4">
                        <li>
                            <p>Company Formation / Setup</p>
                        </li>
                        <li>
                            <p>PRO & HR Services</p>
                        </li>
                        <li>
                            <p>Documents Attestation Services</p>
                        </li>
                        <li>
                            <p>Sourcing & Procurement Consultant</p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="process-card text-start">
                    <div class="d-flex align-items-center">
                        <div class="icon-box me-4">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="mb-0">Financial</h3>
                    </div>
                    <ul class="service-list mt-4">
                        <li>
                            <p>TAX</p>
                        </li>
                        <li>
                            <p>Audit and Book Keeping</p>
                        </li>
                        <li>
                            <p>Bank Facilities</p>
                        </li>
                        <li>
                            <p>Corporate Bank Account Opening</p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="process-card text-start">
                    <div class="d-flex align-items-center">
                        <div class="icon-box me-4">
                            <i class="fas fa-crosshairs"></i>
                        </div>
                        <h3 class="mb-0">Recruitment</h3>
                    </div>
                    <ul class="service-list mt-4">
                        <li>
                            <p>Overseas & Local Recruitment</p>
                        </li>
                        <li>
                            <p>Blue Collar and White Collar Hiring</p>
                        </li>
                        <li>
                            <p>Providing candidates for all industries from around the world</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured candidates section -->
<section class="candidate-section" id="candidates">
    <div class="container position-relative z-1">
        <!-- Section header -->
        <div class="text-center mb-4">
            <p class="section-subtitle">Featured Candidates</p>
            <h2 class="section-title">Find Talent From The Featured Ones For Your Job</h2>
        </div>
        <div class="row g-4" id="featured-candidates-card">
            <!-- Job listings will be dynamically inserted here -->
        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-5">
            <a href="<?= site_url('professionals') ?>" class="btn view-btn">
                View All Candidates
            </a>
        </div>

    </div>
</section>

<!-- Testimonial section -->
<section class="testimonial-section" id="testimonial">
    <div class="container">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <p class="section-subtitle mb-1">Testimonials</p>
                <h2 class="section-title mb-0">What Our Users Say</h2>
            </div>

            <a href="<?= site_url('testimonials') ?>" class="btn view-btn">
                View All
            </a>
        </div>

        <!-- Carousel -->
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000000">

            <div class="carousel-inner">

                <?php
                $chunks = array_chunk($testimonials, 3);
                $active = true;

                foreach ($chunks as $chunk): ?>
                    <div class="carousel-item <?= $active ? 'active' : '' ?>">
                        <div class="row g-4">

                            <?php foreach ($chunk as $t):

                                $user = BasicInfoUser($t->user_id);
                                $name = $user->m_name ?? 'Anonymous';
                                $avatar = $user->m_avatar ?? '';
                                $initial = strtoupper(substr($name, 0, 1));
                                ?>

                                <div class="col-12 col-md-6 col-lg-4">

                                    <div class="testimonial-card h-100 p-4 shadow-sm border-0 d-flex flex-column">

                                        <!-- Title -->
                                        <div class="fw-semibold mb-2">
                                            <?= htmlspecialchars($t->title) ?>
                                        </div>

                                        <!-- Description -->
                                        <p class="testimonial-text mb-3">
                                            <?= substr(strip_tags($t->description), 0, 150) ?>...
                                        </p>

                                        <!-- User -->
                                        <div class="d-flex align-items-center mt-auto">

                                            <?php if (!empty($avatar)) { ?>
                                                <img src="<?= base_url('assets/uploads/members/' . $avatar); ?>"
                                                    class="rounded-circle me-2" width="42" height="42"
                                                    style="object-fit:cover; min-width: 42px"
                                                    onerror="this.onerror=null; this.src='<?= base_url('navassets/img/user-avatar.jpg'); ?>';">
                                            <?php } else { ?>
                                                <div class="avatar-circle me-3">
                                                    <?= $initial ?>
                                                </div>
                                            <?php } ?>

                                            <div>
                                                <div class="fw-semibold"><a href="<?= base_url('n/' . $user->m_id); ?>"
                                                        class="text-decoration-none text-black">
                                                        <?= htmlspecialchars($name) ?>
                                                    </a></div>
                                                <small class="text-muted">
                                                    <?= htmlspecialchars($user->m_profession ?? '') ?>
                                                </small>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>
                    </div>
                    <?php
                    $active = false;
                endforeach; ?>

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev custom-control" type="button" data-bs-target="#testimonialCarousel"
                data-bs-slide="prev">
                <span class="custom-arrow">
                    <i class="fas fa-chevron-left"></i>
                </span>
            </button>

            <button class="carousel-control-next custom-control" type="button" data-bs-target="#testimonialCarousel"
                data-bs-slide="next">
                <span class="custom-arrow">
                    <i class="fas fa-chevron-right"></i>
                </span>
            </button>

        </div>

    </div>
</section>

<!-- Feed Preview Section -->
<section class="feed-section" id="feed">
    <div class="container position-relative z-1">

        <!-- Header -->
        <div class="text-center mb-5">
            <p class="section-subtitle">Latest Updates</p>
            <h2 class="section-title">What People Are Sharing</h2>
        </div>
        <div class="feed-masonry">

            <?php if (!empty($feeds)): ?>
                <?php foreach ($feeds as $feed): ?>

                    <div class="feed-item">

                        <div class="feed-card">

                            <!-- Media -->
                            <?php if (!empty($feed->feed_image)): ?>
                                <div class="feed-media">
                                    <img src="<?= base_url('nassets/feed/uploads/' . $feed->feed_image) ?>" alt="Feed Image">
                                </div>
                            <?php endif; ?>

                            <!-- Body -->
                            <div class="feed-body">

                                <!-- User -->
                                <div class="feed-user">

                                    <img src="<?= base_url('assets/uploads/members/' . $feed->m_avatar); ?>"
                                        onerror="this.onerror=null; this.src='<?= base_url('navassets/img/user-avatar.jpg'); ?>';"
                                        width="42" height="42" style="object-fit:cover;border-radius:50%;">

                                    <div>
                                        <h6 class="mb-0">
                                            <?= $feed->m_name ?>
                                        </h6>
                                        <small>
                                            <?= date('d M Y', strtotime($feed->added_on)) ?>
                                        </small>
                                    </div>

                                </div>

                                <!-- Text -->
                                <p class="feed-text">
                                    <?= substr(strip_tags($feed->feed_text), 0, 250) ?>...
                                </p>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-5">
            <a href="<?= site_url('feed') ?>" class="btn view-btn">
                View All Posts
            </a>
        </div>

    </div>
</section>

<!-- Resume builder section -->
<section class="resume-section" id="resume">
    <div class="container position-relative z-1">
        <div class="row g-5 align-items-center">

            <!-- Image -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="image-wrapper">
                    <img src="navassets/img/resume-builder/resume-1.jpg" alt="Resume Image 1">
                    <img src="navassets/img/resume-builder/resume-2.jpg" alt="Resume Image 2">
                    <img src="navassets/img/resume-builder/resume-3.jpg" alt="Resume Image 3">
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-6">
                <div class="resume-content">
                    <!-- Section header -->
                    <div class="mb-4">
                        <p class="section-subtitle">Resume Builder</p>
                        <h2 class="section-title">Build Your Professional Resume With The Help Of Expert</h2>
                    </div>
                    <p class="resume-text">
                        Enhance your career prospects with a standout resume tailored to the U.A.E. and GCC job market.
                        Our expert resume writers specialize in crafting documents that highlight your skills,
                        experience, and achievements in a way that resonates with employers across the region. Whether
                        you're aiming for local or regional opportunities, we'll help you make a strong first
                        impression.
                    </p>
                    <a href="<?= site_url('premium-services') ?>" class="btn view-btn">Build</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact section -->
<section class="contact-section" id="contact">
    <div class="container position-relative z-1">
        <div class="row g-5">

            <!-- FAQ card -->
            <div class="col-12 col-lg-6">
                <!-- Section header -->
                <div class="mb-4">
                    <p class="section-subtitle">Faq</p>
                    <h2 class="section-title">Asked Any Questions</h2>
                </div>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How does Navafiz help employers find professionals?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>
                                    Navafiz allows employers and recruiters to browse verified professional profiles,
                                    post job listings, and connect directly with qualified candidates. Our platform
                                    makes it easy to filter by skills, experience, and industry to find the right talent
                                    quickly.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Is registration required to use the platform?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>
                                    Yes. Creating an account allows you to access full features such as posting jobs,
                                    applying for positions, managing applications, and connecting with professionals
                                    securely.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How can I apply for jobs on Navafiz?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>
                                    Job seekers can create a professional profile, upload their details, and apply
                                    directly to available job listings. Once applied, employers can review your profile
                                    and contact you for the next steps.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Can freelancers find short-term or project-based work?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>
                                    Yes. Freelancers can explore assignment-based opportunities and connect with
                                    businesses looking for short-term or specialized support. You can showcase your
                                    expertise and get matched with relevant projects.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact card -->
            <div class="col-12 col-lg-6">
                <div class="card contact-card">
                    <!-- Section header -->
                    <div>
                        <p class="section-subtitle">Let’s talk</p>
                        <h2 class="section-title">Get In Touch With us</h2>
                    </div>
                    <div class="form-group"> <span class="successmessage">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </span> </div>
                    <div class="form-group"> <span class="errormessage">
                            <?php echo $this->session->flashdata('errormsg'); ?>
                        </span> </div>
                    <form class="row g-3" action="<?= base_url() ?>sendcontact" method="post">
                        <div class="col-12 col-lg-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="col-12 col-lg-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" rows="3" id="message" name="message" required></textarea>
                        </div>
                        <div>
                            <button type="submit" value="Send Message" class="btn btn-submit">Submit Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CREATE TABLE `jb_resume_submissions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `profession` VARCHAR(150) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `cv` VARCHAR(255) NOT NULL,
  `status` TINYINT(1) DEFAULT 1,
  `created_at` DATETIME NOT NULL,
  `ip_address` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; -->

<!-- Upload Resume Modal -->
<div class="modal fade" id="uploadResumeModal" tabindex="-1" aria-labelledby="uploadResumeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadResumeModalLabel">Upload Your Resume</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card p-3">
                    <div id="uploadResumeMsg" class="mb-3"></div>

                    <?php
                    $attributes = array(
                        'id' => 'uploadResumeForm'
                    );
                    echo form_open_multipart('upload_resume/submit', $attributes); ?>
                    <div class="row g-3">
                        <div class="col-12 col-lg-6">
                            <label for="name" class="form-label required-label">Name</label>
                            <input type="text" class="form-control required-field" id="name" name="name">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="profession" class="form-label required-label">Profession</label>
                            <input type="text" class="form-control required-field" id="profession" name="profession">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="email" class="form-label required-label">E-mail</label>
                            <input type="email" class="form-control required-field" id="email" name="email">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="phone" class="form-label required-label">WhatsApp Number</label>
                            <input type="text" class="form-control required-field" id="phone" name="phone">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="cv" class="form-label required-label">CV / Resume</label>
                            <div class="upload-box" id="cvUploadBox">
                                <input type="file" name="cv" id="cv" accept=".pdf"
                                    class="form-control d-none required-field" data-file-upload data-preview="cvPreview"
                                    data-initial="cvInitialState" data-max-size="5">

                                <div class="upload-ui" data-trigger="cv">
                                    <div class="upload-initial" id="cvInitialState">
                                        <i class="fas fa-file-pdf text-danger"></i>
                                        <p class="mt-3 mb-1">Upload CV (PDF only)</p>
                                        <small class="text-muted">Max size: 5MB</small>
                                    </div>

                                    <!-- Preview will be injected here -->
                                    <div class="file-preview" id="cvPreview"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-end">
                        <button type="submit" id="resumeSubmitBtn" class="btn btn-primary">Upload</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .testimonial-section {
        background: #fff;
    }

    .testimonial-card {
        background: #f1f6fb;
        border-radius: 20px;
        transition: all 0.25s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .testimonial-text {
        font-size: 0.95rem;
        color: #555;
        line-height: 1.6;
    }

    .avatar-circle {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #0d6efd;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

    /* Mobile UX */
    @media (max-width: 576px) {

        /* .carousel-control-prev,
        .carousel-control-next {
            display: none;
        } */
    }

    /* Carousel controls custom style */
    /* Position buttons */
    #testimonialCarousel .custom-control {
        width: 40px;
        height: 40px;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1;
        /* always visible */
    }

    /* Left & right spacing */
    #testimonialCarousel .carousel-control-prev {
        left: -10px;
    }

    #testimonialCarousel .carousel-control-next {
        right: -10px;
    }

    /* Circle button */
    #testimonialCarousel .custom-arrow {
        width: 40px;
        height: 40px;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Icon */
    #testimonialCarousel .custom-arrow i {
        color: #fff;
        font-size: 14px;
    }

    /* Hover effect */
    #testimonialCarousel .custom-arrow:hover {
        background: rgba(0, 0, 0, 0.7);
    }








    .feed-masonry {
        column-count: 3;
        column-gap: 24px;
    }

    /* Tablet */
    @media (max-width: 992px) {
        .feed-masonry {
            column-count: 2;
        }
    }

    /* Mobile */
    @media (max-width: 576px) {
        .feed-masonry {
            column-count: 1;
        }
    }

    /* IMPORTANT FIX (this is what makes it masonry) */
    .feed-item {
        display: inline-block;
        width: 100%;
        margin-bottom: 24px;

        /* prevents breaking inside cards */
        break-inside: avoid;
        -webkit-column-break-inside: avoid;
        page-break-inside: avoid;
    }

    /* Card */
    .feed-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        transition: 0.3s ease;
    }

    .feed-card:hover {
        transform: translateY(-5px);
    }

    /* Image */
    .feed-media img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Body */
    .feed-body {
        padding: 16px;
    }

    /* User */
    .feed-user {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
    }

    /* Text */
    .feed-text {
        font-size: 14px;
        line-height: 1.6;
        color: #444;
    }
</style>