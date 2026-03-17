<!-- Top Bar -->
<div class="top-bar">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <span><i class="fas fa-envelope"></i> <a class="ms-0" href="mailto:info@navafiz.com">
                    info@navafiz.com</a></span>
            <span class="ms-4"><i class="fas fa-phone-alt"></i> <a class="ms-0" href="tel:+971554465332"> +971 55 446
                    5332</a></span>
        </div>
        <div>
            <a href="https://www.facebook.com/groups/JobPostMail"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/navafiz_management"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/company/navafiz"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-4">
    <div class="container">
        <a class="navbar-brand p-0 m-0" href="<?= site_url() ?>">
            <img id="mainLogo" src="<?= site_url() ?>jassets/draft/img/logo-invers.png" style="width: 150px;"
                alt="Logo" />
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Desktop Menu -->
        <div class="collapse navbar-collapse justify-content-end d-none d-lg-flex" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center">
                <!-- <li class="nav-item"><a class="nav-link active" href="<?= site_url() ?>">Home</a></li> -->
                <li class="nav-item"><a class="nav-link" href="<?= site_url('about') ?>">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Opportunities
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= site_url('services/hire-a-talent') ?>">Hire Talents</a>
                        </li>
                        <li><a class="dropdown-item" href="<?= site_url('services/find-a-job') ?>">Find a Job</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('services/supply-manpower') ?>">Manpower
                                Suppliers</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('services/become-a-freelancer') ?>">Work as a
                                Freelancer
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="<?= site_url('services/become-a-mentor') ?>">Become a
                                Mentor
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="<?= site_url('premium-services') ?>">Premium
                        Services</a></li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Job Listing
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= site_url('jobs') ?>">Featured Jobs</a>
                        </li>
                        <li><a class="dropdown-item" href="<?= site_url('recruiters-support-system') ?>">Recruitment
                                Support</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('job-seeker-support-system') ?>">Job Seekers
                                Support
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="<?= site_url('users_list/users_by_list/82') ?>">Featured
                                Profiles
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="<?= site_url('feed') ?>">As Received
                                Jobs
                            </a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Candidates
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= site_url('users_list/users_by_list/82') ?>">See Featured
                                Profiles
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="<?= site_url('testimonials'); ?>">Testimonials</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="#">Blog</a></li> -->
                <li class="nav-item"><a class="nav-link" href="<?= site_url('contact') ?>">Contact</a></li>
                <!-- <li class="nav-item ms-lg-3">
                    <a href="<?= site_url('login') ?>" class="btn login-btn">Login</a>
                </li> -->

                <li class="nav-item ms-3">
                    <?php $cart = $this->session->userdata('cart'); ?>
                    <a class="nav-link position-relative" href="<?= site_url('cart') ?>" id="navbar-cart-link">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle"
                            id="cart-count">
                            <?= is_array($cart) ? count($cart) : 0 ?>
                        </span>
                    </a>
                </li>

                <?php if ($this->session->userdata('user_id')): ?>

                    <?php
                    $user_id = $this->session->userdata('user_id');
                    $name = $this->session->userdata('name');
                    $avatar = $this->session->userdata('avatar');

                    if (!$avatar) {
                        $avatar = 'default.png'; // fallback avatar
                    }
                    ?>

                    <li class="nav-item dropdown ms-lg-3 user-dropdown">

                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">

                            <img src="<?= base_url('assets/uploads/members/' . $avatar); ?>" class="rounded-circle me-2"
                                width="35" height="35" style="object-fit:cover;">

                            <span>
                                <?= $name; ?>
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <a class="dropdown-item" href="<?= site_url('profile') ?>/<?= $user_id; ?>">
                                    My Profile
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item text-danger" href="<?= site_url('logout'); ?>">
                                    Logout
                                </a>
                            </li>

                        </ul>

                    </li>

                <?php else: ?>

                    <li class="nav-item ms-lg-3">
                        <a href="<?= site_url('login') ?>" class="btn login-btn">Login</a>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div>
<div class="mobile-menu">
    <div class="mobile-menu-header">
        <span class="close-mobile-menu">&times;</span>
    </div>
    <ul class="mobile-menu-nav">

        <?php if ($this->session->userdata('user_id')): ?>

            <?php
            $name = $this->session->userdata('name');
            $avatar = $this->session->userdata('avatar');

            if (!$avatar) {
                $avatar = 'default.png';
            }
            ?>

            <li class="mobile-user-info">
                <div class="d-flex align-items-center">
                    <img src="<?= base_url('assets/uploads/members/' . $avatar); ?>" class="mobile-avatar">
                    <span class="mobile-username"><?= $name ?></span>
                </div>
            </li>

            <li><a href="<?= site_url('profile') ?>/<?= $user_id; ?>">My Profile</a></li>

        <?php endif; ?>

        <li><a href="<?= site_url() ?>">Home</a></li>
        <li><a href="<?= site_url('about') ?>">About</a></li>
        <li>
            <a href="#" class="submenu-toggle">Opportunities <span>+</span></a>
            <ul class="submenu">
                <li><a href="<?= site_url('services/hire-a-talent') ?>">Hire Talent</a>
                </li>
                <li><a href="<?= site_url('services/find-a-job') ?>">Find a Job</a></li>
                <li><a href="<?= site_url('services/find-a-job') ?>">Manpower Suppliers</a></li>
                <li><a href="<?= site_url('services/become-a-freelancer') ?>">Freelance
                        Work
                    </a>
                </li>
                <li><a href="<?= site_url('services/become-a-mentor') ?>">Become a
                        Mentor
                    </a>
                </li>
            </ul>
        </li>

        <li><a href="<?= site_url('premium-services') ?>">Premium Services</a></li>

        <li>
            <a href="#" class="submenu-toggle">Job Listing <span>+</span></a>
            <ul class="submenu">
                <li><a href="<?= site_url('jobs') ?>">Featured Jobs</a>
                </li>
                <li><a href="<?= site_url('recruiters-support-system') ?>">Recruitment
                        Support</a></li>
                <li><a href="<?= site_url('job-seeker-support-system') ?>">Job Seekers
                        Support
                    </a>
                </li>
                <li><a href="<?= site_url('users_list/users_by_list/82') ?>">Featured
                        Profiles
                    </a>
                </li>
                <li><a href="<?= site_url('feed') ?>">As Received
                        Jobs
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="submenu-toggle">Candidates<span>+</span></a>
            <ul class="submenu">
                <li><a href="<?= site_url('users_list/users_by_list/82') ?>">See Featured
                        Profiles
                    </a>
                </li>
            </ul>
        </li>
        <li><a href="<?= site_url('testimonials'); ?>">Testimonials</a></li>
        <!-- <li><a href="#">Blog</a></li> -->
        <li><a href="<?= site_url('contact') ?>">Contact</a></li>

        <?php if ($this->session->userdata('user_id')): ?>

            <li><a href="<?= site_url('logout') ?>" class="text-danger">Logout</a></li>

        <?php else: ?>

            <li><a href="<?= site_url('login') ?>">Login</a></li>

        <?php endif; ?>
    </ul>
    <div class="mobile-menu-contact">
        <div class="d-flex align-items-center"><i class="fa fa-map-marker"></i>
            <p class="mb-0"> <strong>Address:</strong><br> Business Village B, Deira, Dubai</p>
        </div>
        <div class="d-flex align-items-center"><i class="fa fa-envelope"></i>
            <p class="mb-0"><strong>Email:</strong><br> <a class="ms-0" href="mailto:info@navafiz.com">
                    info@navafiz.com</a></p>
        </div>
        <div class="d-flex align-items-center"><i class="fa fa-phone"></i>
            <p class="mb-0"><strong>Phone:</strong><br> <a class="ms-0" href="tel:+971554465332">+971 55 446 5332</a>
            </p>
        </div>
        <div>
            <a href="https://www.linkedin.com/company/navafiz"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.facebook.com/groups/JobPostMail"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/navafiz_management"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div