<?php
$user_id = $this->session->userdata('user_id');
$name = $this->session->userdata('name');
$avatar = $this->session->userdata('avatar');

$is_logged = !empty($user_id);

if (!$avatar) {
    $avatar = 'default.png'; // fallback avatar
}
?>

<!-- Top Bar -->
<!-- <div class="top-bar">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <span><i class="fas fa-envelope"></i> <a class="ms-0" href="mailto:info@navafiz.com">
                    info@navafiz.com</a></span>
            <span class="ms-4"><i class="fas fa-phone-alt"></i> <a class="ms-0" href="tel:+971554465332">+971 55 446 5332</a></span>
        </div>
        <div>
            <a href="https://www.facebook.com/groups/JobPostMail"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/navafiz_management"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/company/navafiz"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</div> -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-4">
    <div class="container">
        <a class="navbar-brand p-0" href="<?= site_url('/'); ?>">
            <img id="mainLogo" src="<?= site_url() ?>jassets/draft/img/logo-invers.png" style="width: 150px;"
                alt="Logo" />
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Desktop Menu -->
        <div class="collapse navbar-collapse justify-content-between d-none d-lg-flex" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="<?= site_url('feed'); ?>"><i
                            class="fas fa-home"></i>Feed</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#JobSeekers" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-briefcase"></i> Job Seekers
                    </a>
                    <ul class="dropdown-menu" id="JobSeekers">
                        <li><a class="dropdown-item"
                                href="<?= $is_logged ? site_url('job-seeker-support-system') : site_url('user/login?return_url=' . current_url()) ?>">Job
                                Seekers
                                Support
                                System</a></li>
                        <li><a class="dropdown-item"
                                href="<?= $is_logged ? site_url('jobs') : site_url('user/login?return_url=' . current_url()) ?>">Featured
                                Jobs</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="<?= $is_logged ? site_url('find-job') : site_url('user/login?return_url=' . current_url()) ?>">Find
                                a Job</a>
                        </li>
                        <li><a class=" dropdown-item"
                                href="<?= $is_logged ? site_url('events') : site_url('user/login?return_url=' . current_url()) ?>">Events</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#Recruiters" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-file-alt"></i> Recruiters
                    </a>
                    <ul class="dropdown-menu" id="Recruiters">
                        <li><a class="dropdown-item"
                                href="<?= $is_logged ? site_url('recruiters-support-system') : site_url('user/login?return_url=' . current_url()) ?>">Recruiters
                                Support</a></li>
                        <li><a class="dropdown-item"
                                href="<?= $is_logged ? site_url('users_list/users_by_list/82') : site_url('user/login?return_url=' . current_url()) ?>">Featured
                                Profiles</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="<?= $is_logged ? site_url('professionals') : site_url('user/login?return_url=' . current_url()) ?>">Find
                                Professionals</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="<?= $is_logged ? site_url('place-job') : site_url('user/login?return_url=' . current_url()) ?>">Post
                                a Job</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#TrainerCoachMentor" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-users"></i> Trainer / Coach / Mentor
                    </a>
                    <ul class="dropdown-menu" id="TrainerCoachMentor">
                        <li><a class="dropdown-item"
                                href="<?= $is_logged ? site_url('mentors') : site_url('user/login?return_url=' . current_url()) ?>">Navafiz
                                Mentor</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav align-items-lg-center">
                <?php if ($is_logged): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('messages/' . $user_id) ?>">
                            <i class="me-0 fas fa-envelope"></i>
                            <?php $msg = TMessagesCountByUser($user_id); ?>
                            <?php if ($msg > 0) { ?>
                                <span class="badge badge-danger">
                                    <?= $msg ?>
                                </span>
                            <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('notifications/usernotifications/') ?>">
                            <i class="me-0 fas fa-bell"></i>
                            <?php $not = NotificationCountByUser($user_id); ?>
                            <?php if ($not > 0) { ?>
                                <span class="badge badge-danger"><?= $not ?></span>
                            <?php } ?>
                        </a>
                    </li>

                    <li class="nav-item dropdown user-dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= profile_picture($user_id); ?>" class="rounded-circle me-2" width="35" height="35"
                                style="object-fit:cover;">
                            <span>
                                <?= $name; ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="nav-list">
                                <?php
                                if (in_array($user_id, CvReviewTeamList())) {
                                    $team_notifications = NotificationByType(array('cvreview', 'events', 'event_message', 'company', 'testimonial', 'mentors', 'general_message', 'tsheet_message', 'registration', null)); ?>
                                    <a class="dropdown-item" href="<?= site_url('notifications'); ?>"> Activity Log for
                                        admin
                                        <b>(<?= !empty($team_notifications) ? count($team_notifications) : 0; ?>)</b></a>
                                <?php } ?>
                                <?php $public_notifications = NotificationByType(array('whatshappening', 'job', 'events', 'event_message', 'general_message', 'company', 'testimonial', 'general_message', 'registration')); ?>
                                <a class="dropdown-item"
                                    href="<?= site_url('notifications/notificationtype/whatshappening'); ?>">
                                    Activity Log
                                    <b>(<?= !empty($public_notifications) ? count($public_notifications) : 0; ?>)</b></a>

                                <div class="dropdown-divider"></div>
                            </li>
                            <li class="nav-list">
                                <a class="dropdown-item" href="<?= site_url('track_steps/sheet/' . $user_id) ?>">Tracking
                                    Sheet</a>
                                <a class="dropdown-item" href="<?= site_url('profile') ?>/<?= $user_id; ?>">View
                                    Profile</a>
                                <a class="dropdown-item" href="<?= site_url('edit-profile'); ?>">Edit Profile</a>
                                <a class="dropdown-item" href="<?= site_url('profile/username'); ?>">Change
                                    Username</a>
                                <a class="dropdown-item" href="<?= site_url('UpdateProfilePhoto'); ?>">Change
                                    Profile
                                    Picture</a>
                                <?php if (in_array($user_id, CvReviewTeamList())) { ?>
                                    <a class="dropdown-item" href="<?= site_url('profile/status'); ?>">Change Status</a>
                                <?php } ?>
                                <a class="dropdown-item" href="<?= site_url('user/change_password'); ?>">Change
                                    Password</a>
                                <a class="dropdown-item" href="<?= site_url('profile/AddCV'); ?>">Upload Resume</a>
                                <a class="dropdown-item" href="<?= site_url('summary-career'); ?>">Career
                                    Summary</a>
                                <a class="dropdown-item" href="<?= site_url('education'); ?>">Add Education</a>
                                <a class="dropdown-item" href="<?= site_url('skills'); ?>">Add Skills</a>
                                <a class="dropdown-item" href="<?= site_url('employment'); ?>">Add Experience</a>
                                <a class="dropdown-item"
                                    href="<?= site_url('job_portals/index/' . $session_user_id); ?>">Add Job
                                    Portals</a>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li class="nav-list">
                                <?php if (in_array($user_id, CvReviewTeamList())) { ?>
                                    <a class="dropdown-item" href="<?= site_url('mentors/activity'); ?>">Mentor
                                        Activity</a>
                                    <a class="dropdown-item" href="<?= site_url('blueuser/listusers'); ?>">View Blue
                                        User</a>
                                    <a class="dropdown-item" href="<?= site_url('blueuser/adduser'); ?>">Add Blue
                                        User</a>
                                    <a class="dropdown-item" href="<?= site_url('mentors/quick_job_applicants'); ?>">Easy Jobs
                                        Candidates</a>
                                    <a class="dropdown-item" href="<?= site_url('recruitment_projects/'); ?>">Recruitment
                                        Project
                                        Contacts</a>
                                    <a class="dropdown-item" href="<?= site_url('feed/pending'); ?>">View
                                        pending feed
                                        posts</a>
                                <?php } ?>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="<?= site_url('user/logout'); ?>">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-lg-3">
                        <a href="<?= site_url('user/login?return_url=' . current_url()); ?>" class="btn login-btn">Login</a>
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
            <a href="#" class="submenu-toggle">Services <span>+</span></a>
            <ul class="submenu">
                <li><a href="<?= site_url('services/hire-a-talent') ?>">Hire Talent</a>
                </li>
                <li><a href="<?= site_url('services/find-a-job') ?>">Find a Job</a></li>
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
            <p class="mb-0"><strong>Phone:</strong><br> <a class="ms-0" href="tel:+971554465332"> +971 55 446 5332</a>
            </p>
        </div>
        <div>
            <a href="https://www.linkedin.com/company/navafiz"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.facebook.com/groups/JobPostMail"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/navafiz_management"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div