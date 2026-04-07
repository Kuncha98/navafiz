<?php $this->load->view('include/header');
$session_user_id = $this->session->userdata('user_id');
$get_review_status = CVreviewStatusByUser($profile->m_id);
$cvreviews_list = CvReviewTeamList();

$query = $this->db->select('role_id')
    ->where('m_id', $session_user_id) // assuming the user ID column is `id`
    ->get('jb_member'); // assuming your table name is `users`

if ($query->num_rows() > 0) {
    $role_id = $query->row()->role_id;
    // Now you have the role_id
} else {
    // Handle case where user is not found
    $role_id = 0;
}
?>
<style type="text/css">
    #flag-profile {
        margin-top: -12px;
        margin-bottom: 10px;
    }

    .profile p {
        margin: 0;
    }

    a {
        color: #215374;
    }

    .profile {
        margin: 0 auto;
        text-align: center;
    }

    .profile_img {
        border-radius: 50% !important;
        border: 3px solid #215374;
        display: block;
        width: 100px;
        height: 110px;
        background-size: cover;
        margin: 0px auto 5px auto;
    }

    .skills h4 a {
        color: #000;
    }

    .buttons a {

        margin-bottom: 3px;
        display: block;
    }

    .summary {
        padding-top: 5%;
    }

    .avatar img {
        width: 100%;
        max-width: 100%;
        height: auto;
        border: 0 none;
        border-radius: 1000px;
    }

    .btn-outline-secondary:hover {
        color: #fff;
    }

    .profile_views i {
        font-size: 16px !important;
    }

    .avatarpro {
        border-radius: 50% !important;
        border: 1px solid #215374;
        display: block;
        width: 60px;
        height: 60px;
        background-size: cover;
        object-fit: cover;
    }

    .card {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .card .card-body a.member_name {
        color: #215374;
    }

    .relatedprofiles .member_name {
        color: #215374;
        font-size: 12px;
    }

    .relatedprofiles .profile_img {
        border-radius: 50% !important;
        border: 1px solid #215374;
        display: block;
        width: 60px;
        height: 70px;
        background-size: cover;
        margin: 0 0 0 10px;
    }

    #featured_flag .fa-star {
        position: absolute;
        right: 114px;
        top: -3px;
        color: #215374;
        /*color: #FFD700;*/
    }

    @media only screen and (max-width: 768px) {
        .views .fas {
            font-size: 16px !important;
            width: 20px !important;
        }

        .btn-outline-secondary {
            width: 100%;
            margin-bottom: 10px;
            padding: 15px 0;
        }
    }

    .more-points {
        display: none;
    }

    .more-lines {
        display: none;
    }

    .more-rec {
        display: none;
    }


    .profile {
        border-radius: 16px;
        transition: all 0.25s ease;
    }

    .profile:hover {
        /* transform: translateY(-5px); */
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1) !important;
    }

    .profile_img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-size: cover;
        background-position: center;
        border: 3px solid #164885;
    }

    /* Brand Color */
    .text-primary-custom {
        color: #164885;
    }

    .edit-icon {
        color: #164885;
    }

    .bg-primary-custom {
        background-color: #164885;
    }

    .bg-primary-custom-subtle {
        background-color: rgba(22, 72, 133, 0.1);
    }

    /* Icon buttons */
    .icon-btn {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #f1f3f5;
        color: #164885;
        transition: 0.2s;
        text-decoration: none;
    }

    .icon-btn:hover {
        background: #164885;
        color: #fff;
    }

    /* Smaller edit button */
    .icon-btn-sm {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #f1f3f5;
        color: #164885;
        transition: 0.2s;
        text-decoration: none;
    }

    .icon-btn-sm:hover {
        background: #164885;
        color: #fff;
    }

    /* Skill pills (modern minimal chips) */
    .skill-pill {
        background: rgba(22, 72, 133, 0.08);
        color: #164885;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 13px;
        font-weight: 500;
        transition: 0.2s;
        border: 1px solid transparent;
    }

    .skill-pill:hover {
        background: #164885;
        color: #fff;
        cursor: default;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .info-row {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .info-row i {
        color: #164885;
        font-size: 14px;
        margin-top: 3px;
        width: 18px;
        text-align: center;
    }

    .info-row span {
        display: block;
        font-size: 12px;
        color: #6c757d;
    }

    .info-row strong {
        font-size: 14px;
        color: #212529;
        font-weight: 600;
    }



    .profile-list {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .list-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .list-item i {
        color: #164885;
        font-size: 14px;
        min-width: 18px;
        text-align: center;
    }

    .list-item span {
        font-size: 14px;
        color: #212529;
    }


    .profile .form-select-sm {
        font-size: 14px;
        border-radius: 6px;
        border: 1px solid #ced4da;
    }

    .profile .btn-primary {
        background-color: #164885;
        border-color: #164885;
        transition: 0.2s;
    }

    .profile .btn-primary:hover {
        background-color: #0f3366;
        border-color: #0f3366;
    }





    .question-block {
        display: flex;
        flex-direction: column;
    }

    .options-list {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .options-list .form-check {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .options-list .form-check-input {
        width: 16px;
        height: 16px;
        margin-top: 0;
    }

    .options-list .form-check-label {
        font-size: 14px;
        color: #212529;
    }





    .timeline-item {
        position: relative;
        padding-left: 12px;
    }

    .timeline-item::before {
        content: "";
        position: absolute;
        left: 0;
        top: 6px;
        width: 6px;
        height: 6px;
        background-color: #164885;
        border-radius: 50%;
    }

    .timeline-item:hover {
        background: rgba(22, 72, 133, 0.05);
        border-radius: 6px;
        padding: 8px;
        margin: -8px;
        transition: 0.2s;
    }






    /* Modern button styling */
    .action-card {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .action-btn {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        border: 1px solid #ced4da;
        border-radius: 0.5rem;
        text-decoration: none;
        color: #495057;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .action-btn:hover {
        background-color: #f1f3f5;
        border-color: #adb5bd;
    }

    .action-btn i {
        min-width: 20px;
        text-align: center;
    }

    .action-primary {
        border-color: #0d6efd;
        color: #0d6efd;
    }

    .action-primary:hover {
        background-color: #0d6efd;
        color: #fff;
    }

    .action-success {
        border-color: #198754;
        color: #198754;
    }

    .action-success:hover {
        background-color: #198754;
        color: #fff;
    }

    .action-btn.disabled {
        opacity: 0.6;
        pointer-events: none;
    }




    .action-block {
        padding: 12px;
        border: 1px solid #eef1f4;
        border-radius: 8px;
        background: #fff;
        transition: all 0.2s ease;
    }

    .action-block:hover {
        background: rgba(22, 72, 133, 0.04);
        border-color: #dbe3ea;
    }

    .action-title {
        font-weight: 600;
        margin-bottom: 8px;
        color: #164885;
        font-size: 14px;
    }

    .btn-primary-custom {
        background-color: #164885;
        border-color: #164885;
        color: #fff;
    }

    .btn-primary-custom:hover {
        background-color: #123b6b;
        border-color: #123b6b;
    }






    .referral-box {
        background: rgba(22, 72, 133, 0.05);
        border: 1px dashed #164885;
        padding: 12px;
        border-radius: 8px;
    }

    .btn-primary-custom {
        background-color: #164885;
        border-color: #164885;
        color: #fff;
        font-weight: 500;
    }

    .btn-primary-custom:hover {
        background-color: #123b6b;
        border-color: #123b6b;
    }




    .mentor-item {
        transition: all 0.2s ease;
        padding: 6px;
        border-radius: 6px;
    }

    .mentor-item:hover {
        background: rgba(22, 72, 133, 0.05);
    }

    .mentor-avatar {
        width: 55px;
        height: 55px;
        border-radius: 10px;
        background-size: cover;
        background-position: center;
        background-color: #f1f3f5;
    }






    .info-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: #6c757d;
    }

    .info-row i {
        color: #164885;
    }

    .btn-primary-custom {
        background-color: #164885;
        border-color: #164885;
        color: #fff;
    }

    .btn-primary-custom:hover {
        background-color: #123b6b;
        border-color: #123b6b;
    }







    .info-card {
        background: #f8f9fb;
        border: 1px solid #eef1f4;
        padding: 12px;
        border-radius: 8px;
    }

    .info-title {
        font-weight: 600;
        color: #164885;
        font-size: 14px;
    }

    .info-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        margin-bottom: 6px;
        color: #6c757d;
    }

    .info-row i {
        color: #164885;
        width: 16px;
    }

    .modern-textarea {
        border-radius: 8px;
        border: 1px solid #dee2e6;
        font-size: 14px;
    }

    .modern-textarea:focus {
        border-color: #164885;
        box-shadow: 0 0 0 0.15rem rgba(22, 72, 133, 0.15);
    }

    .btn-primary-custom {
        background-color: #164885;
        border-color: #164885;
        color: #fff;
    }

    .btn-primary-custom:hover {
        background-color: #123b6b;
    }





    .action-item {
        display: flex;
        /* justify-content: space-between; */
        align-items: center;
        padding: 10px 12px;
        border-radius: 8px;
        text-decoration: none;
        color: #212529;
        font-size: 14px;
        transition: all 0.2s ease;
        margin-bottom: 6px;
    }

    .action-item:hover {
        background: rgba(22, 72, 133, 0.05);
        color: #164885;
    }

    .action-item i {
        color: #164885;
    }

    .action-item.highlight {
        background: rgba(22, 72, 133, 0.08);
        font-weight: 500;
    }

    .action-item.disabled {
        pointer-events: none;
        opacity: 0.7;
    }
</style>
<?php

$isFeaturedProfile = isFeaturedProfile($profile->m_id);

if (!empty($isFeaturedProfile)) {
    $flag = 'yes';
} else {
    $flag = 'no';
}

?>
<?php $this->load->view('notification/notification-messages'); ?>
<div class="container-mid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Card -->
            <div class="card profile border-0 shadow-sm">
                <div class="card-body text-center p-4">

                    <!-- Avatar -->
                    <div class="profile_img mx-auto mb-3"
                        style="background-image: url('<?= base_url() ?>assets/uploads/members/<?= ($profile->m_avatar == "") ? "default.png" : $profile->m_avatar ?>');">
                    </div>

                    <!-- Featured Flag -->
                    <?php if ($flag == 'yes') { ?>
                        <div class="mb-2 text-warning">
                            <i class="fas fa-star"></i>
                        </div>
                    <?php } ?>

                    <!-- Name + Role -->
                    <h5 class="fw-semibold mb-1 text-primary-custom">
                        <?php if ($profile->role_id == 2) { ?>
                            <i class="fas fa-graduation-cap me-1"></i>
                        <?php } ?>
                        <?= $profile->m_name ?>
                    </h5>

                    <?php if ($profile->role_id > 0) { ?>
                        <span
                            class="badge rounded-pill bg-primary-custom-subtle text-primary-custom mb-2 position-static px-3 py-2">
                            <?= GetRoleName($profile->role_id); ?>
                        </span>
                    <?php } ?>

                    <!-- Branding -->
                    <?php if ($profile->m_branding != '') { ?>
                        <div class="small text-muted mb-2">
                            <?= $profile->m_branding; ?>
                        </div>
                    <?php } ?>

                    <!-- Profession + City -->
                    <div class="text-muted small mb-3">
                        <?= $profile->m_profession ?><br />
                        <?= ($profile->m_current_city == "") ? "---" : $profile->m_current_city ?>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <?php if ($session_user_id == $profile->m_id) { ?>
                            <a href="<?= site_url('edit-profile') ?>" class="icon-btn">
                                <i class="fas fa-edit"></i>
                            </a>
                        <?php } ?>
                        <a href="javascript:void(0)" id="shareIcon" class="icon-btn">
                            <i class="fas fa-share-alt"></i>
                        </a>
                    </div>

                    <hr>

                    <!-- Stats -->
                    <div class="row text-center small g-0">
                        <div class="col">
                            <div><i class="fas fa-eye text-muted"></i></div>
                            <div class="fw-semibold">
                                <?= $profile->m_profile_view; ?>
                            </div>
                            <div class="text-muted">Views</div>
                        </div>

                        <?php if ($profile->role_id != 2): ?>
                            <div class="col">
                                <div><i class="fas fa-trophy text-muted"></i></div>
                                <div class="fw-semibold">
                                    <?= $reward_points ?? 0 ?>
                                </div>
                                <div class="text-muted">Points</div>
                            </div>
                        <?php endif; ?>

                        <div class="col">
                            <div><i class="fas fa-users text-muted"></i></div>
                            <div class="fw-semibold">
                                <?= count($recommand_list) ?>
                            </div>
                            <div class="text-muted">Recs</div>
                        </div>
                    </div>

                    <!-- Last Seen -->
                    <?php if (!empty($profile->last_login_date)) { ?>
                        <hr>
                        <div class="text-muted small">
                            Last seen:
                            <?= DateTimeFormat($profile->last_login_date); ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <!-- <div class="card profile">
                <div class="card-body">
                    <div class="profile_img rounded"
                        style="background-image: url('<?= base_url() ?>assets/uploads/members/<?= ($profile->m_avatar == "") ? "default.png" : $profile->m_avatar ?>');">

                    </div>
                    <?php if ($flag == 'yes') { ?>
                        <p class="text-center" id="flag-profile">
                            <i class="fas fa-star fa-2x"></i>
                        </p>
                    <?php } ?>
                    <p id="card-profile-name">
                        <b class="text-center">
                            <?php if ($profile->role_id == 2) { ?>
                                <i class="fas fa-graduation-cap"
                                    style="color:#007bff; margin-right:6px;font-size: 20px;"></i>
                            <?php } ?>
                            <?= $profile->m_name ?>
                            <br />
                            <?php if ($profile->role_id > 0) { ?>
                                (<?= GetRoleName($profile->role_id); ?>)
                            <?php } ?>
                        </b>
                        <br />
                        <?php if ($profile->m_branding != '') { ?>
                            <?= $profile->m_branding; ?>
                        <?php } ?>
                    </p>

                    <p class="text-center">
                        <?= $profile->m_profession ?>
                        <br />
                        <?= ($profile->m_current_city == "") ? "---" : $profile->m_current_city ?>
                    </p>
                    <?php if ($session_user_id == $profile->m_id) { ?>
                        <a href="<?= site_url('edit-profile') ?>"><i style="font-size: 14px;"
                                class="fas fa-edit mt-0"></i></a>
                    <?php } ?>
                    <a href="javascript:void(0)" id="shareIcon" title="Share Profile">
                        <i style="font-size: 14px;" class="fas fa-share-alt mt-0"></i>
                    </a>
                    <hr>
                    <div class="profile_views">
                        <i>Profile Views </i> <small><i class="fas fa-eye"></i></small>
                        <i><b><?= $profile->m_profile_view; ?></b></i>
                    </div>
                    <hr>
                    <?php if ($profile->role_id != 2): ?>
                        <div class="">
                            <i>Reward Points:</i>
                            <i><b><?= $reward_points ?? 0 ?></b></i>
                            <small><i class="fas fa-trophy mt-0" style="font-size: small;"></i></small>
                        </div>
                        <hr>
                    <?php endif; ?>


                    <i>Recommendations </i> <i><b>(<?= count($recommand_list) ?>)</b></i>
                    <?php if (!empty($profile->last_login_date)) { ?>
                        <hr>
                        <div class="views text-center">
                            <i style="color: #215374;">Last Seen: <?= DateTimeFormat($profile->last_login_date); ?></i>
                        </div>
                    <?php } ?>


                </div>
            </div> -->

            <?php
            function display_or_na($value)
            {
                return !empty($value) ? $value : 'N/A';
            }
            ?>

            <!-- Candidate Card -->
            <?php if ($role_id == 2 || $role_id == 8) { ?>
                <div class="card border-0 shadow-sm profile">
                    <div class="card-body p-4" style="background: #ecf1f5; border-radius: 16px;">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-semibold text-primary-custom mb-0">Candidate Details</h6>

                            <?php if ($profile_id == $session_user_id) { ?>
                                <a href="<?= site_url('edit-profile'); ?>" class="icon-btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            <?php } ?>
                        </div>

                        <div class="profile-info">

                            <div class="info-row"><i class="fas fa-city"></i>
                                <div class="text-left">
                                    <span>City of Job Preference</span>
                                    <strong><?= display_or_na($profile->m_job_preference); ?></strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-passport"></i>
                                <div class="text-left">
                                    <span>Visa Type</span>
                                    <strong><?= display_or_na($profile->visa_status); ?></strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-calendar-alt"></i>
                                <div class="text-left">
                                    <span>Visa Valid Till</span>
                                    <strong><?= display_or_na($profile->m_valid_till); ?></strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-briefcase"></i>
                                <div class="text-left">
                                    <span>Current Designation</span>
                                    <strong><?= display_or_na($profile->m_current_design); ?></strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-building"></i>
                                <div class="text-left">
                                    <span>Current Employer</span>
                                    <strong><?= display_or_na($profile->m_employer); ?></strong>
                                </div>
                            </div>

                            <?php if ($role_id == 2) { ?>
                                <div class="info-row"><i class="fas fa-dollar-sign"></i>
                                    <div class="text-left">
                                        <span>Current Salary</span>
                                        <strong><?= display_or_na($profile->m_current_salary); ?></strong>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="info-row"><i class="fas fa-user-tie"></i>
                                <div class="text-left">
                                    <span>Desired Designation</span>
                                    <strong><?= display_or_na($profile->m_desired_design); ?></strong>
                                </div>
                            </div>

                            <?php if ($role_id == 2) { ?>
                                <div class="info-row"><i class="fas fa-hand-holding-usd"></i>
                                    <div class="text-left">
                                        <span>Desired Salary</span>
                                        <strong><?= display_or_na($profile->m_expected_salary); ?></strong>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="info-row"><i class="fas fa-layer-group"></i>
                                <div class="text-left">
                                    <span>Field Background</span>
                                    <strong><?= display_or_na($profile->m_f_background); ?></strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-link"></i>
                                <div class="text-left">
                                    <span>Navafiz Profile</span>
                                    <strong>
                                        <?php if (!empty($profile->navafiz_profile_link)) { ?>
                                            <a href="<?= $profile->navafiz_profile_link ?>" target="_blank"
                                                class="link-primary-custom">View Profile</a>
                                        <?php } else {
                                            echo 'N/A';
                                        } ?>
                                    </strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fab fa-linkedin"></i>
                                <div class="text-left">
                                    <span>LinkedIn Profile</span>
                                    <strong>
                                        <?php if (!empty($profile->linkedin_profile_link)) { ?>
                                            <a href="<?= $profile->linkedin_profile_link ?>" target="_blank"
                                                class="link-primary-custom">View Profile</a>
                                        <?php } else {
                                            echo 'N/A';
                                        } ?>
                                    </strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-flag"></i>
                                <div class="text-left">
                                    <span>Nationality</span>
                                    <strong><?= display_or_na($profile->m_nationality); ?></strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-map-marker-alt"></i>
                                <div class="text-left">
                                    <span>Current Location</span>
                                    <strong><?= display_or_na($profile->m_current_city); ?></strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-hourglass-half"></i>
                                <div class="text-left">
                                    <span>UAE Experience</span>
                                    <strong><?= display_or_na($profile->uae_experience); ?></strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-clock"></i>
                                <div class="text-left">
                                    <span>Notice Period</span>
                                    <strong><?= display_or_na($profile->m_notice_period); ?></strong>
                                </div>
                            </div>

                            <div class="info-row"><i class="fas fa-sticky-note"></i>
                                <div class="text-left">
                                    <span>Additional Remarks</span>
                                    <strong class="d-block mt-1">
                                        <?= !empty($profile->m_add_remarks) ? nl2br($profile->m_add_remarks) : 'N/A'; ?>
                                    </strong>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>


            <!-- <?php if ($role_id == 2 || $role_id == 8) { ?>
                <div class="card">
                    <div class="card-header text-dark text-center"
                        style="border-bottom: 1px solid white; background-color: lightblue;">
                        Candidate Details
                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('edit-profile'); ?>">
                                <i class="fas fa-edit mt-0 ml-2 text-dark" style="font-size: 16px;"></i>
                            </a>
                        <?php } ?>
                    </div>

                    <div class="card-body text-dark" style="background-color: lightblue;">
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <strong>City of Job Preference:</strong> <?= display_or_na($profile->m_job_preference); ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Visa Type:</strong> <?= display_or_na($profile->visa_status); ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Visa Valid Till:</strong> <?= display_or_na($profile->m_valid_till); ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Current Designation:</strong> <?= display_or_na($profile->m_current_design); ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Current Employer:</strong> <?= display_or_na($profile->m_employer); ?>
                            </div>

                            <?php if ($role_id == 2) { ?>
                                <div class="col-md-12 mb-3">
                                    <strong>Current Salary:</strong> <?= display_or_na($profile->m_current_salary); ?>
                                </div>
                            <?php } ?>

                            <div class="col-md-12 mb-3">
                                <strong>Desired Designation Now:</strong> <?= display_or_na($profile->m_desired_design); ?>
                            </div>

                            <?php if ($role_id == 2) { ?>
                                <div class="col-md-12 mb-3">
                                    <strong>Desired Salary:</strong> <?= display_or_na($profile->m_expected_salary); ?>
                                </div>
                            <?php } ?>

                            <div class="col-md-12 mb-3">
                                <strong>Field Background:</strong> <?= display_or_na($profile->m_f_background); ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Navafiz Profile Link:</strong>
                                <?php if (!empty($profile->navafiz_profile_link)) { ?>
                                    <a href="<?= $profile->navafiz_profile_link ?>"
                                        target="_blank"><?= $profile->navafiz_profile_link ?></a>
                                <?php } else {
                                    echo 'N/A';
                                } ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>LinkedIn Profile Link:</strong>
                                <?php if (!empty($profile->linkedin_profile_link)) { ?>
                                    <a href="<?= $profile->linkedin_profile_link ?>"
                                        target="_blank"><?= $profile->linkedin_profile_link ?></a>
                                <?php } else {
                                    echo 'N/A';
                                } ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Nationality:</strong> <?= display_or_na($profile->m_nationality); ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Current Location:</strong>
                                <?= display_or_na($profile->m_current_city); ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Years of Experience in UAE:</strong> <?= display_or_na($profile->uae_experience); ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Notice Period:</strong> <?= display_or_na($profile->m_notice_period); ?>
                            </div>

                            <div class="col-md-12 mt-2">
                                <strong>Additional Remarks:</strong>
                                <p><?= !empty($profile->m_add_remarks) ? nl2br($profile->m_add_remarks) : 'N/A'; ?></p>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?> -->

            <!-- Skills Card -->
            <div class="card border-0 shadow-sm profile">
                <div class="card-body p-4">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 fw-semibold text-primary-custom">Skills</h6>

                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('skills'); ?>" class="icon-btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        <?php } ?>
                    </div>

                    <!-- Skills List -->
                    <div class="d-flex flex-wrap gap-2">
                        <?php
                        $words = $profile->m_skills ?? '';
                        $str_arr = !empty($words) ? explode(",", $words) : [];

                        if (!empty($str_arr)) {
                            foreach ($str_arr as $skill) {
                                ?>
                                <span class="skill-pill">
                                    <?= trim($skill) ?>
                                </span>
                                <?php
                            }
                        } else {
                            ?>
                            <span class="text-muted small">No skills added</span>
                        <?php } ?>
                    </div>

                </div>
            </div>

            <!-- <div class="card text-center">
                <div class="card-header">
                    Skills
                    <?php if ($profile_id == $session_user_id) { ?>
                        <a href="<?= site_url('skills'); ?>"><i class="fas fa-edit mt-0" style="font-size: 16px;"></i></a>
                    <?php } ?>
                </div>
                <div class="card-body">

                    <?php
                    $words = $profile->m_skills ?? '';
                    $str_arr = !empty($words) ? explode(",", $words) : [];
                    if ($str_arr) { ?>
                        <?php for ($a = 0; $a < sizeof($str_arr); $a++) { ?>
                            <span
                                style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;"
                                class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?= $str_arr[$a] ?></span>

                        <?php }
                    } ?>
                </div>
            </div> -->

            <!-- Profile Details Card -->
            <div class="card border-0 shadow-sm profile">
                <div class="card-body p-4">

                    <!-- Title -->
                    <h6 class="fw-semibold text-primary-custom text-left mb-3">Profile Details</h6>

                    <div class="profile-info">

                        <?php if (isset($profile->m_expected_salary) && intval($profile->m_expected_salary) > 1) {
                            if (in_array($session_user_id, IsFeaturedRecruiter())) { ?>
                                <div class="info-row">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <div class="text-left">
                                        <span>Expected Salary</span>
                                        <strong>
                                            <?= $profile->m_expected_salary; ?>
                                        </strong>
                                    </div>
                                </div>
                            <?php }
                        } ?>

                        <div class="info-row">
                            <i class="fas fa-briefcase"></i>
                            <div class="text-left">
                                <span>Experience</span>
                                <strong>
                                    <?= $profile->m_experience; ?>
                                </strong>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="text-left">
                                <span>U.A.E Experience</span>
                                <strong>
                                    <?= !empty($profile->uae_experience) ? $profile->uae_experience : '--'; ?>
                                </strong>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-industry"></i>
                            <div class="text-left">
                                <span>Industry</span>
                                <strong>
                                    <?= GetCategoryName($profile->m_category); ?>
                                </strong>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-flag"></i>
                            <div class="text-left">
                                <span>Nationality</span>
                                <strong>
                                    <?= ($profile->m_nationality == "") ? "---" : $profile->m_nationality ?>
                                </strong>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-id-card"></i>
                            <div class="text-left">
                                <span>Visa Status</span>
                                <strong>
                                    <?= ($profile->visa_status == "") ? "---" : $profile->visa_status; ?>
                                </strong>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-graduation-cap"></i>
                            <div class="text-left">
                                <span>Qualification</span>
                                <strong>
                                    <?php
                                    $qry = "select * from jb_member_education where me_member_id = '" . $profile->m_id . "' order by me_year desc limit 0,1 ";
                                    $edu_results = $this->db->query($qry)->result();
                                    if ($edu_results) {
                                        foreach ($edu_results as $edu_result) {
                                            echo $edu_result->me_degree . ' - ' . $edu_result->me_descr;
                                            break;
                                        }
                                    } else {
                                        echo "---";
                                    }
                                    ?>
                                </strong>
                            </div>
                        </div>

                        <?php if (in_array($session_user_id, CvReviewTeamList())) { ?>
                            <div class="info-row">
                                <i class="fas fa-envelope"></i>
                                <div class="text-left">
                                    <span>Email</span>
                                    <strong>
                                        <?= ($profile->m_email == "") ? "---" : $profile->m_email ?>
                                    </strong>
                                </div>
                            </div>

                            <div class="info-row">
                                <i class="fas fa-phone"></i>
                                <div class="text-left">
                                    <span>Mobile</span>
                                    <strong>
                                        <?php
                                        $phone = $profile->m_ph_no ?? $profile->m_mobile ?? "";
                                        echo !empty($phone) ? $phone : "---";
                                        ?>
                                    </strong>
                                </div>
                            </div>
                        <?php } ?>

                        <?php
                        $license = $profile->m_driving_lisence ?? "";
                        ?>
                        <div class="info-row">
                            <i class="fas fa-car"></i>
                            <div class="text-left">
                                <span>Driving License</span>
                                <strong>
                                    <?= !empty($license) ? $license : "---" ?>
                                </strong>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- <div class="card" style="margin: 10px 0;">
                <div card-body>
                    <ul class="list-group text-center">
                        <?php if (isset($profile->m_expected_salary) && intval($profile->m_expected_salary) > 1) {
                            if (in_array($session_user_id, IsFeaturedRecruiter())) {
                                ?>
                                <li class="list-group-item">
                                    <b>Expected Salary</b>
                                    <br />
                                    <?= $profile->m_expected_salary; ?>
                                </li>
                            <?php }
                        } ?>
                        <li class="list-group-item">
                            <b>Experience</b>
                            <br />
                            <?= $profile->m_experience; ?>
                        </li>

                        <li class="list-group-item">
                            <b>U.A.E Experience</b>
                            <br />
                            <?php if (!empty($profile->uae_experience)) { ?>
                                <?= $profile->uae_experience; ?>
                            <?php } else { ?>
                                --
                            <?php } ?>
                        </li>
                        <li class="list-group-item">
                            <b>Industry</b>
                            <br />
                            <?= GetCategoryName($profile->m_category); ?>
                        </li>
                        <li class="list-group-item">
                            <b>Nationality</b>
                            <br />
                            <?= ($profile->m_nationality == "") ? "---" : $profile->m_nationality ?>
                        </li>

                        <li class="list-group-item">
                            <b>Visa status</b>
                            <br />
                            <?= ($profile->visa_status == "") ? "---" : $profile->visa_status; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Qualification </b>
                            <br />
                            <?php
                            $qry = "select * from jb_member_education where me_member_id = '" . $profile->m_id . "' order by me_year desc limit 0,1 ";
                            $edu_results = $this->db->query($qry)->result();
                            if ($edu_results) {
                                foreach ($edu_results as $edu_result) { ?>
                                    <?= $edu_result->me_degree; ?> - <?= $edu_result->me_descr; ?>
                                    <?php break;
                                }
                            } ?>
                        </li>
                        <?php if (in_array($session_user_id, CvReviewTeamList())) { ?>
                            <li class="list-group-item">
                                <b>Email address: </b>
                                <?= ($profile->m_email == "") ? "---" : $profile->m_email ?>
                            </li>
                        <?php } ?>
                        <?php if (isset($profile->m_ph_no) || isset($profile->m_mobile)) {
                            if (in_array($session_user_id, CvReviewTeamList())) { ?>
                                <li class="list-group-item">
                                    <b>Mobile Number: </b>
                                    <?= ($profile->m_ph_no == "") ? $profile->m_mobile : $profile->m_ph_no ?>
                                </li>
                            <?php }
                        } ?>
                        <?php if (isset($profile->m_driving_lisence)) { ?>
                            <li class="list-group-item">
                                <b>Driving License: </b>
                                <?= $profile->m_driving_lisence ?>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div> -->


            <!-- Matching Titles Card -->
            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4">

                    <h6 class="fw-semibold text-primary-custom text-left mb-3">Other Matching Titles / Positions</h6>

                    <div class="profile-list">
                        <?php
                        $professions = array_filter([$profile->profession1, $profile->profession2, $profile->profession3, $profile->profession4, $profile->profession5]);
                        foreach ($professions as $index => $profession) { ?>
                            <div class="list-item">
                                <i class="fas fa-angle-right"></i>
                                <span><?= $profession ?></span>
                            </div>
                            <?php if ($index < count($professions) - 1)
                                echo '<hr class="my-2">'; ?>
                        <?php } ?>
                        <?php if (empty($professions)) { ?>
                            <span class="text-muted small text-left">No other natching titles / positions</span>
                        <?php } ?>
                    </div>

                </div>
            </div>

            <!-- <div class="card">
                <div class="card-header"><b>Other Matching Titles/Position</b></div>
                <div class="card-body">
                    <?php if (!empty($profile->profession1)) { ?>
                        <?= $profile->profession1; ?>
                        <hr>
                    <?php } ?>
                    <?php if (!empty($profile->profession2)) { ?>
                        <?= $profile->profession2; ?>
                        <hr>
                    <?php } ?>
                    <?php if (!empty($profile->profession3)) { ?>
                        <?= $profile->profession3; ?>
                        <hr>
                    <?php } ?>
                    <?php if (!empty($profile->profession4)) { ?>
                        <?= $profile->profession4; ?>
                        <hr>
                    <?php } ?>
                    <?php if (!empty($profile->profession4)) { ?>
                        <?= $profile->profession5; ?>
                    <?php } ?>
                </div>
            </div> -->


            <!-- Industry Titles Card -->
            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4">

                    <h6 class="fw-semibold text-primary-custom text-left mb-3">Industry Titles
                    </h6>

                    <div class="profile-list">
                        <?php
                        $industries = [];
                        if (isset($profile->m_category) && intval($profile->m_category) > 0)
                            $industries[] = GetIndustry($profile->m_category)->c_name;
                        if (isset($profile->industry1) && intval($profile->industry1) > 0)
                            $industries[] = GetIndustry($profile->industry1)->c_name;
                        if (isset($profile->industry2) && intval($profile->industry2) > 0)
                            $industries[] = GetIndustry($profile->industry2)->c_name;

                        foreach ($industries as $index => $industry) { ?>
                            <div class="list-item">
                                <i class="fas fa-angle-right"></i>
                                <span><?= $industry ?></span>
                            </div>
                            <?php if ($index < count($industries) - 1)
                                echo '<hr class="my-2">'; ?>
                        <?php } ?>
                        <?php if (empty($industries)) { ?>
                            <span class="text-muted small text-left">No industries</span>
                        <?php } ?>
                    </div>

                </div>
            </div>

            <!-- <div class="card">
                <div class="card-header"><b>Industry Titles</b></div>
                <div class="card-body">
                    <?php if (isset($profile->m_category) && intval($profile->m_category) > 0) { ?>
                        <?php $industry1 = GetIndustry($profile->m_category); ?>
                        <?= $industry1->c_name ?>
                        <hr>
                    <?php } ?>
                    <?php if (isset($profile->industry1) && intval($profile->industry1) > 0) { ?>
                        <?php $industry2 = GetIndustry($profile->industry1); ?>
                        <?= $industry2->c_name ?>
                        <hr>
                    <?php } ?>
                    <?php if (isset($profile->industry2) && intval($profile->industry2) > 0) { ?>
                        <?php $industry3 = GetIndustry($profile->industry2); ?>
                        <?= $industry3->c_name ?>
                        <hr>
                    <?php } ?>

                </div>
            </div> -->


            <!-- Question Assign Card -->
            <?php if (in_array($session_user_id, CvReviewTeamList())) { ?>
                <div class="card border-0 shadow-sm profile mb-3">
                    <div class="card-body p-4">

                        <!-- Header -->
                        <h6 class="fw-semibold text-primary-custom text-left mb-3">
                            Assign Questions To User
                        </h6>

                        <!-- Form -->
                        <form method="post" action="<?= site_url('profile/save_question/' . $profile->m_id) ?>">

                            <div class="mb-3">
                                <select class="form-select form-select-sm" name="question_id" style="font-size: 14px;">
                                    <?php foreach ($questions as $qes) { ?>
                                        <option value="<?= $qes->id ?>"><?= $qes->title ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4 w-100"
                                    style="background-color:#164885; border-color:#164885;">
                                    Assign
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            <?php } ?>

            <!-- <?php if (in_array($session_user_id, CvReviewTeamList())) { ?>
                <div class="card">
                    <div class="card-header"><b>Assign Questions To User</b></div>
                    <div class="card-body">
                        <form method="post" action="<?= site_url('profile/save_question/' . $profile->m_id) ?>">
                            <select class="form-control" style="font-size:12px" name="question_id">
                                <?php foreach ($questions as $qes) { ?>
                                    <option value="<?= $qes->id ?>"><?= $qes->title ?></option>
                                <?php } ?>
                            </select>
                            <div class="text-center mt-3">
                                <input type="submit" class="btn btn-block btn-primary" value="Assign">
                            </div>
                        </form>

                    </div>
                </div>
            <?php } ?> -->


            <!-- Questions Card -->
            <?php if ($profile_id == $session_user_id) { ?>
                <div class="card border-0 shadow-sm profile mb-3">
                    <div class="card-body p-4">

                        <!-- Header -->
                        <h6 class="fw-semibold text-primary-custom text-left mb-3">Profile Questions</h6>

                        <!-- Form -->
                        <form id="question_form" action="<?= site_url('profile/submit_questions') . '/' . $profile_id ?>"
                            method="post">

                            <ol class="question-list ps-3">
                                <?php foreach ($recruitment_questions as $question):
                                    $getquestion = GetQuestion($question->question_id);
                                    $getquestion = $getquestion[0];

                                    // Collect all options dynamically
                                    $options = [];
                                    for ($opt = 1; $opt <= 10; $opt++) {  // max 10 options, adjust if needed
                                        $opt_val = $getquestion->{'option_' . $opt} ?? null;
                                        if (!empty($opt_val)) {
                                            $options[] = $opt_val;
                                        }
                                    }
                                    ?>
                                    <li class="mb-3">

                                        <!-- Question Title -->
                                        <div class="fw-semibold mb-2 text-left">
                                            <?= htmlspecialchars($getquestion->title) ?>
                                        </div>

                                        <!-- Options -->
                                        <div class="d-flex flex-wrap gap-3 options-list">
                                            <?php foreach ($options as $index => $opt_val):
                                                $opt_id = "q{$getquestion->id}_opt{$index}";
                                                ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="q[<?= $getquestion->id ?>]"
                                                        id="<?= $opt_id ?>" value="<?= htmlspecialchars($opt_val) ?>">
                                                    <label class="form-check-label text-left" for="<?= $opt_id ?>">
                                                        <?= htmlspecialchars($opt_val) ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                    </li>
                                <?php endforeach; ?>
                            </ol>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary w-100 px-4"
                                    style="background-color:#164885; border-color:#164885;">
                                    Submit
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            <?php } ?>

            <!-- <?php if ($profile_id == $session_user_id) { ?>
                <div class="card">
                    <div class="card-header"><b>Profile Questions</b></div>
                    <div class="card-body">
                        <form id="question_form" action="<?= site_url('profile/submit_questions') . '/' . $profile_id ?>"
                            method="post">
                            <?php $i = 1; ?>
                            <?php foreach ($recruitment_questions as $question) { ?>
                                <?php
                                $getquestion = GetQuestion($question->question_id);
                                $getquestion = $getquestion[0];
                                ?>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <b><?= $i . " - " . $getquestion->title ?> </b>
                                    </div>
                                    <div class="col-md-12 ">
                                        <label class="mr-3" for="opt_1<?= $getquestion->id ?>">
                                            <input class="ques " id="opt_1<?= $getquestion->id ?>" type="radio"
                                                name="q[<?= $getquestion->id ?>]" class=" ml-2"
                                                value="<?= $getquestion->option_1 ?>">
                                            <?= $getquestion->option_1 ?>
                                        </label>
                                        <div class="float-right mr-5">
                                            <label class="mr-3" for="opt_2<?= $getquestion->id ?>">
                                                <input class="ques mr-2" id="opt_2<?= $getquestion->id ?>" type="radio"
                                                    name="q[<?= $getquestion->id ?>]" class=" ml-3"
                                                    value="<?= $getquestion->option_2 ?>">
                                                <?= $getquestion->option_2 ?>
                                            </label>
                                        </div>
                                        <label class="mr-3" for="opt_3<?= $getquestion->id ?>">
                                            <input class="ques mr-3" id="opt_3<?= $getquestion->id ?>" type="radio"
                                                name="q[<?= $getquestion->id ?>]" class=" ml-2"
                                                value="<?= $getquestion->option_3 ?>">
                                            <?= $getquestion->option_3 ?>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                $i++;
                            }
                            ?>
                            <div class="form-group">
                                <button type="submit" id="submt" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">
                                    Submit </button>
                            </div>
                        </form>

                    </div>
                </div>
            <?php } ?> -->
        </div>

        <div class="col-md-6">
            <?php if (in_array($session_user_id, CvReviewTeamList())) { ?>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <?php
                        //echo '<img src="'.site_url('assets/frontend/images/cross.png').'" width="20" />'."CV not uploaded for Review."; 
                        if (isset($get_review_status->review_status)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                if ($get_review_status->assign_user_to == 0) {
                                    echo '' . "CV uploaded & Waiting for Mentor assignment."; ?>
                                    <a href="<?= site_url('cvreport/' . $profile->m_id); ?>" target="_blank">Check Report.</a>
                                    <?php
                                } else if ($get_review_status->assign_user_to > 0 && $get_review_status->admin_comments == '') {
                                    echo '' . "CV uploaded & Waiting Mentor Response. <b>" . (GetUserDetails($get_review_status->assign_user_to)->m_name) . "</b>"; ?>
                                    <?php if (in_array(intval($session_user_id), $cvreviews_list)) { ?>
                                            <a href="<?= site_url('cvreport/' . $profile->m_id); ?>" target="_blank">Check Report.</a>
                                    <?php } ?>

                                <?php } else if ($get_review_status->assign_user_to > 0 && $get_review_status->admin_comments <> '' && $get_review_status->review_status <> 'review_done') {
                                    echo '' . "Commented by Mentor."; ?>
                                            <br>
                                    <?php if (in_array(intval($session_user_id), $cvreviews_list)) { ?>
                                                <a href="<?= site_url('cvreport/' . $profile->m_id); ?>" target="_blank">Check Report.</a>
                                    <?php } ?>
                                            <br>
                                            <a href="<?= site_url('mycvreport'); ?>" target="_blank">Check Your Own Report.</a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if (!empty($get_review_status) && $get_review_status->review_status == 'review_done') { ?>
                            <div class="alert alert-secondary" role="alert">
                                Congrats Resume Approved by Navafiz Team.
                            </div>
                        <?php } ?>

                        <!-- <?php if (!empty($pending_points)): ?>
                            <div class="alert alert-success" role="alert">

                                You have <strong><?= $pending_points ?></strong> reward points waiting to be claimed

                                <a href="<?= site_url('feed/claim_all_rewards') ?>" class="btn btn-primary mb-3"
                                    onclick="return confirm('Claim all rewards?');">
                                    Claim All
                                </a>

                                <?php foreach ($rewards as $reward): ?>
                                    <div class="reward-item">

                                        <?php if ($reward->action_type == 'daily_login'): ?>
                                            <small>You received +10 points for daily login</small>
                                        <?php elseif ($reward->action_type == 'post_approved'): ?>
                                            <small>You received +10 points for post approval</small>
                                        <?php endif; ?>

                                        <hr>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?> -->
                    </div>
                </div>
            <?php } ?>

            <?php if (!empty($pending_points)): ?>
                <div class="alert alert-success" role="alert">

                    <p>
                        You have <strong><?= $pending_points ?></strong> reward points waiting to be claimed
                    </p>

                    <!-- Hidden by default -->
                    <div id="rewardDetails" style="display:none;">
                        <?php foreach ($rewards as $reward): ?>
                            <ul class="reward-item">
                                <li>
                                    <?php if ($reward->action_type == 'daily_login'): ?>

                                        <small>
                                            You received +
                                            <?= $reward->points ?> points for daily login
                                            -
                                            <?= date('d M Y', strtotime($reward->created_at)) ?>
                                        </small>

                                    <?php elseif ($reward->action_type == 'post_approved'): ?>

                                        <?php
                                        if (!empty($reward->feed_text)) {
                                            $words = explode(' ', strip_tags($reward->feed_text));
                                            $text = count($words) > 3
                                                ? implode(' ', array_slice($words, 0, 3)) . '...'
                                                : implode(' ', $words);
                                        } else {
                                            $text = 'Post (deleted)';
                                        }
                                        ?>

                                        <small>
                                            You received +<?= $reward->points ?> points for post approval -
                                            <?= htmlspecialchars($text, ENT_QUOTES, 'UTF-8') ?>
                                        </small>

                                    <?php endif; ?>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    </div>

                    <a href="<?= site_url('feed/claim_all_rewards') ?>" class="btn btn-primary mb-2">
                        Claim All
                    </a>

                    <button onclick="toggleRewards()" class="btn btn-secondary mb-2">
                        More Details
                    </button>

                </div>
            <?php endif; ?>

            <?php
            if (!empty($profile->video_cv)) {
                // Parse the URL and get the video ID
                $url = $profile->video_cv;

                // Use regex to extract the video ID from different YouTube formats
                if (preg_match('/(youtu\.be\/|youtube\.com\/(watch\?v=|embed\/|shorts\/|v\/|.+\?v=))([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                    $video_id = $matches[3]; // Extracted video ID
                } else {
                    // If no valid video ID, handle error or provide fallback
                    $video_id = null;
                }

                if ($video_id) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card profile">
                                <div class="card-body">
                                    <iframe src="https://www.youtube.com/embed/<?= $video_id; ?>" width="100%" height="300"
                                        style="border:none;" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    echo "Invalid YouTube link.";
                }
            }
            ?>


            <!-- <div class="row">
                <div class="col-md-12">

                    <div class="card profile" id="member_summ">
                        <div class="card-body">
                            <div style="text-align: left;">
                                <p class="text-center">
                                    <b>Summary of Career</b>
                                    <?php if ($profile_id == $session_user_id) { ?>
                                        <a href="<?= site_url('summary-career'); ?>" style="vertical-align: inherit;"
                                            class="btn btn-white btn-xs" title="Edit Summary of Career">
                                            <i class="fas fa-edit mt-0" style="font-size: 16px;"></i>
                                        </a>
                                    <?php } ?>
                                </p>

                                <?php
                                $points = [];
                                for ($i = 1; $i <= 10; $i++) {
                                    if (!empty($summary_points->{'point_' . $i})) {
                                        $points[] = $summary_points->{'point_' . $i};
                                    }
                                }
                                ?>

                                <?php foreach ($points as $index => $point): ?>
                                    <div class="<?= $index >= 3 ? 'more-points' : ''; ?>">
                                        <p class="summ_pts">
                                            <?= ($index + 1) . '. ' . $point; ?>
                                        </p>
                                        <?php if ($index < count($points) - 1)
                                            echo '<hr>'; ?>
                                    </div>
                                <?php endforeach; ?>

                                <?php if (count($points) > 3): ?>
                                    <p class="text-right">
                                        <a href="javascript:void(0);" id="togglePoints" class="btn btn-sm btn-link">See
                                            More</a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <?php
            $points = [];
            for ($i = 1; $i <= 10; $i++) {
                if (!empty($summary_points->{'point_' . $i})) {
                    $points[] = $summary_points->{'point_' . $i};
                }
            }
            $total_points = count($points);
            ?>
            <div class="card border-0 shadow-sm profile mb-3" id="member_summ">
                <div class="card-body p-4">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0 fw-semibold text-primary-custom"><i class="fas fa-briefcase me-2"></i>Summary of
                            Career</h6>

                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('summary-career'); ?>" class="icon-btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        <?php } ?>
                    </div>

                    <!-- Check if there are points -->
                    <?php if ($total_points > 0): ?>
                        <!-- Summary Points as Numbered List -->
                        <div class="info-row">
                            <ol class="m-0 p-0 ps-3">
                                <?php foreach ($points as $index => $point): ?>
                                    <li class="<?= $index >= 3 ? 'more-points' : ''; ?>">
                                        <div class="summ_pts mb-1 text-left">
                                            <?= $point; ?>
                                        </div>
                                        <?php if ($index < $total_points - 1)
                                            echo '<hr class="my-3">'; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                        <!-- See More / See Less -->
                        <?php if ($total_points > 3): ?>
                            <div class="text-end mt-2">
                                <a href="javascript:void(0);" id="togglePoints" class="btn btn-sm btn-link">See More</a>
                            </div>
                        <?php endif; ?>

                    <?php else: ?>
                        <!-- No points available -->
                        <span class="text-muted small d-block text-left">
                            <?php if ($profile_id == $session_user_id): ?>
                                Please update your career summary.
                            <?php else: ?>
                                No summary of career available.
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>

                </div>
            </div>

            <?php
            $achievements = $ach_results ?? [];
            ?>
            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0 fw-semibold text-primary-custom">
                            <i class="fas fa-trophy me-2"></i>Achievements
                        </h6>

                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('achievements/userAchievements'); ?>" class="icon-btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        <?php } ?>
                    </div>

                    <?php if (!empty($achievements)): ?>

                        <div class="">

                            <?php foreach ($achievements as $index => $ach): ?>
                                <div class="info-row align-items-start">

                                    <!-- Content -->
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-start text-left">
                                            <strong class="text-dark">
                                                <?= $ach->title; ?>
                                            </strong>

                                            <?php if ($profile_id == $session_user_id): ?>
                                                <a href="<?= site_url('achievements/post/' . $ach->id); ?>" class="text-muted ms-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>

                                        <div class="text-muted small mt-1 text-left">
                                            <?= !empty($ach->description) ? $ach->description : "---"; ?>
                                        </div>
                                    </div>

                                </div>

                                <?php if ($index < count($achievements) - 1) { ?>
                                    <hr class="my-3">
                                <?php } ?>

                            <?php endforeach; ?>

                        </div>

                    <?php else: ?>
                        <span class="text-muted small d-block text-left">
                            <?php if ($profile_id == $session_user_id): ?>
                                You haven’t added achievements yet.
                                <a href="<?= site_url('achievements/userAchievements'); ?>" class="link-primary-custom">
                                    Add now
                                </a>.
                            <?php else: ?>
                                No achievements available.
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>

                </div>
            </div>


            <!-- <?php if ($ach_results) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class=" text-center" style="padding-top: 25px;">
                            Achievements
                            <?php if ($profile_id == $session_user_id) { ?>
                                <a href="<?= site_url('achievements/userAchievements'); ?>" style="vertical-align: inherit;"
                                    class="btn btn-white btn-xs" title="Edit Achievements"><i class="fas fa-edit mt-0"
                                        style="font-size: 16px;"></i></a>
                            </h5>
                        <?php } ?>

                        <?php foreach ($ach_results as $ach_results) { ?>
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-header">
                                    <b><?= $ach_results->title; ?></b>

                                </div>
                                <div class="card-body">
                                    <p style="font-size:16px">
                                        <?= ($ach_results->description == "") ? "---" : $ach_results->description; ?>
                                    </p>
                                    <br />
                                    <?php if ($profile_id == $session_user_id) { ?>
                                        <a style="text-align: right;"
                                            href="<?= site_url('achievements/post/' . $ach_results->id); ?>"><i
                                                style="font-size: 16px;" class="fas fa-edit"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?> -->

            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4 text-start">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-semibold text-primary-custom mb-0">
                            <i class="fas fa-briefcase me-2"></i>Work Experience
                        </h6>

                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('employment'); ?>" class="icon-btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        <?php } ?>
                    </div>

                    <?php if (!empty($employment_history)): ?>

                        <?php foreach ($employment_history as $index => $emp_history): ?>

                            <?php
                            $company_name = GetCompanyName(intval($emp_history->company_name));
                            $company_id = GetCompanyName(intval($emp_history->company_id));
                            $lines = array_filter(array_map('trim', explode("\n", $emp_history->description)));
                            ?>

                            <div class="mb-3">

                                <!-- Title Row -->
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="fw-semibold text-dark">
                                            <?= $emp_history->position_designation ?>
                                        </div>
                                        <div class="text-muted small">
                                            <?= !empty($company_name) ? $company_name : $company_id; ?>
                                        </div>
                                        <div class="text-muted small">
                                            <?= DateFormat($emp_history->start_year); ?> —
                                            <?= DateFormat($emp_history->end_year); ?>
                                        </div>
                                    </div>

                                    <?php if ($profile_id == $session_user_id) { ?>
                                        <div class="text-end">
                                            <a href="<?= site_url('employment/add/' . $emp_history->emp_history_id); ?>"
                                                class="text-muted me-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('employment/delete/' . $emp_history->emp_history_id) ?>"
                                                onclick="return confirm('Are you Sure you want to delete this?')"
                                                class="text-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>

                                <!-- Description -->
                                <?php if (!empty($lines)): ?>
                                    <div class="mt-2 description-container">

                                        <?php foreach ($lines as $i => $line): ?>
                                            <div class="list-item <?= $i >= 3 ? 'more-lines' : ''; ?>"
                                                style="<?= $i >= 3 ? 'display:none;' : ''; ?>">
                                                <i class="fas fa-angle-right text-primary-custom"></i>
                                                <span><?= htmlspecialchars($line); ?></span>
                                            </div>
                                        <?php endforeach; ?>

                                        <?php if (count($lines) > 3): ?>
                                            <div class="text-end mt-1">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-link toggle-desc p-0">
                                                    See More
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>

                            </div>

                            <?php if ($index < count($employment_history) - 1) { ?>
                                <hr class="my-3">
                            <?php } ?>

                        <?php endforeach; ?>

                    <?php else: ?>
                        <span class="text-muted small d-block text-left">
                            <?php if ($profile_id == $session_user_id): ?>
                                You haven’t added work experience yet.
                                <a href="<?= site_url('employment'); ?>" class="link-primary-custom">Add now</a>.
                            <?php else: ?>
                                No work experience available.
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>

                </div>
            </div>


            <!-- <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <h5 class=" text-center" style="padding-top: 25px;">
                        Work Experience (Employment History)
                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('employment'); ?>" style="vertical-align: inherit;"
                                class="btn btn-white btn-xs" title="Edit Summary of Career"><i class="fas fa-edit mt-0"
                                    style="font-size: 16px;"></i></a>
                        <?php } ?>
                    </h5>
                    <?php foreach ($employment_history as $emp_history) { ?>
                        <div class="card" style="margin-bottom: 15px;">
                            <div class="card-body">
                                <p class="text-center">
                                    Experience as <b><?= $emp_history->position_designation ?></b>
                                </p>
                                <ul class="list-unstyled profile-about" style="list-style: none !important;">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Employer</span> </div>
                                            <div class="col-sm-8">
                                                <?php
                                                $company_name = GetCompanyName(intval($emp_history->company_name));
                                                $company_id = GetCompanyName(intval($emp_history->company_id));
                                                ?>
                                                <p style="font-size:16px">
                                                    <?= !empty($company_name) ? $company_name : $company_id; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">From</span> </div>
                                            <div class="col-sm-8">
                                                <p style="font-size:16px"><?= DateFormat($emp_history->start_year); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">To</span> </div>
                                            <div class="col-sm-8">
                                                <p style="font-size:16px"><?= DateFormat($emp_history->end_year); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Detail</span> </div>
                                            <div class="col-sm-8">

                                                <?php

                                                $lines = array_filter(array_map('trim', explode("\n", $emp_history->description)));
                                                ?>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <?php if ($profile_id == $session_user_id) { ?>
                                    <a href="<?= site_url('employment/add/' . $emp_history->emp_history_id); ?>"
                                        style="vertical-align: inherit;" class="btn btn-white btn-xs flaot-right"><i
                                            style="font-size: 16px;" class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('employment/delete/' . $emp_history->emp_history_id) ?>"
                                        style="vertical-align: inherit;"
                                        onclick="return confirm('Are you Sure you want to delete this?')"
                                        class="btn btn-white btn-xs pull-right"><i style="font-size: 16px;"
                                            class=" fas fa-trash-alt"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div> -->

            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-semibold text-primary-custom mb-0">
                            <i class="fas fa-graduation-cap me-2"></i>Academic Qualification
                        </h6>

                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('education'); ?>" class="icon-btn-sm" title="Edit Academic Qualification">
                                <i class="fas fa-edit"></i>
                            </a>
                        <?php } ?>
                    </div>

                    <?php
                    $qry = "select * from jb_member_education where me_member_id = '" . $profile->m_id . "'";
                    $edu_results = $this->db->query($qry)->result();
                    ?>


                    <?php if (!empty($edu_results)): ?>
                        <div class="profile-list">

                            <?php foreach ($edu_results as $index => $edu_result) { ?>

                                <div class="list-item align-items-start">

                                    <!-- <i class="fas fa-graduation-cap text-primary-custom mt-1"></i> -->

                                    <div class="flex-grow-1 text-left">

                                        <!-- Degree + Date -->
                                        <div class="fw-semibold">
                                            <?= htmlspecialchars($edu_result->me_degree); ?>
                                        </div>

                                        <div class="text-muted small mb-1">
                                            <?= !empty($edu_result->me_year) ? date('d F Y', strtotime($edu_result->me_year)) : "---"; ?>
                                        </div>

                                        <!-- Description -->
                                        <div>
                                            <?= !empty($edu_result->me_descr) ? htmlspecialchars($edu_result->me_descr) : '<span class="text-muted">---</span>'; ?>
                                        </div>

                                    </div>

                                    <!-- Edit Icon -->
                                    <?php if ($profile_id == $session_user_id) { ?>
                                        <a href="<?= site_url('education/edit/' . $edu_result->me_id); ?>" class="ms-2 text-muted"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    <?php } ?>

                                </div>

                                <?php if ($index < count($edu_results) - 1) { ?>
                                    <hr class="my-3">
                                <?php } ?>

                            <?php } ?>

                        </div>

                    <?php else: ?>
                        <span class="text-muted small d-block text-left">
                            <?php if ($profile_id == $session_user_id): ?>
                                You haven’t added academic qualifications yet.
                                <a href="<?= site_url('education'); ?>" class="link-primary-custom">Add now</a>.
                            <?php else: ?>
                                No academic qualifications available.
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>

                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-12">
                    <h5 class=" text-center" style="padding-top: 25px;">
                        Academic Qualification
                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('education'); ?>" style="vertical-align: inherit;"
                                class="btn btn-white btn-xs" title="Edit Summary of Career"><i class="fas fa-edit mt-0"
                                    style="font-size: 16px;"></i></a>
                        </h5>
                    <?php } ?>
                    <?php
                    $qry = "select * from jb_member_education where me_member_id = '" . $profile->m_id . "'";
                    $edu_results = $this->db->query($qry)->result();
                    if ($edu_results) { ?>
                        <?php foreach ($edu_results as $edu_result) { ?>
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-body">
                                    <p class="text-center">
                                        <b><?= $edu_result->me_degree; ?></b>
                                        <?= date('d F Y', strtotime($edu_result->me_year)); ?>
                                    </p>
                                    <?= ($edu_result->me_descr == "") ? "---" : $edu_result->me_descr; ?>
                                    <br />
                                    <?php if ($profile_id == $session_user_id) { ?>
                                        <a style="text-align: right;"
                                            href="<?= site_url('education/edit/' . $edu_result->me_id); ?>"><i
                                                style="font-size: 16px;" class="fas fa-edit"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div> -->

            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-semibold text-primary-custom mb-0">
                            <i class="fas fa-briefcase me-2"></i>Certifications
                        </h6>

                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('certification'); ?>" class="icon-btn-sm" title="Manage Certifications">
                                <i class="fas fa-edit"></i>
                            </a>
                        <?php } ?>
                    </div>

                    <?php if (!empty($certifications)): ?>

                        <div class="profile-list">

                            <?php foreach ($certifications as $index => $certificate) { ?>

                                <div class="list-item align-items-start">

                                    <!-- Content -->
                                    <div class="flex-grow-1 text-left">

                                        <div class="mb-1">
                                            <span class="text-muted small">Name:</span>
                                            <strong><?= htmlspecialchars($certificate->c_title); ?></strong>
                                        </div>

                                        <div class="mb-1">
                                            <span class="text-muted small">Duration:</span>
                                            <strong><?= !empty($certificate->c_duration) ? htmlspecialchars($certificate->c_duration) : "---"; ?></strong>
                                        </div>

                                        <div>
                                            <span class="text-muted small">Description:</span><br>
                                            <strong><?= !empty($certificate->c_description)
                                                ? htmlspecialchars($certificate->c_description)
                                                : '<span class="text-muted">---</span>'; ?></strong>
                                        </div>

                                    </div>

                                    <!-- Actions -->
                                    <?php if ($profile_id == $session_user_id) { ?>
                                        <div class="ms-2 d-flex gap-2">

                                            <a href="<?= site_url('certification/edit/' . $certificate->c_id); ?>"
                                                class="text-muted" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="<?= base_url('certification/delete/' . $certificate->c_id); ?>"
                                                class="text-danger"
                                                onclick="return confirm('Are you sure you want to delete this?')" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                        </div>
                                    <?php } ?>

                                </div>

                                <?php if ($index < count($certifications) - 1) { ?>
                                    <hr class="my-3">
                                <?php } ?>

                            <?php } ?>

                        </div>

                    <?php else: ?>
                        <span class="text-muted small d-block text-left">
                            <?php if ($profile_id == $session_user_id): ?>
                                You haven’t added certificates yet.
                                <a href="<?= site_url('certification'); ?>" class="link-primary-custom">Add now</a>.
                            <?php else: ?>
                                No certificates available.
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>

                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <h5 class=" text-center" style="padding-top: 25px;">
                        Certifications
                        <?php if ($profile_id == $session_user_id) { ?>
                            <a href="<?= site_url('certification'); ?>" style="vertical-align: inherit;"
                                class="btn btn-white btn-xs" title="Edit Summary of Career"><i class="fas fa-edit mt-0"
                                    style="font-size: 16px;"></i></a>
                        <?php } ?>
                    </h5>
                    <?php foreach ($certifications as $certificate) { ?>
                        <div class="card" style="margin-bottom: 15px;">
                            <div class="card-body">
                                <p class="text-center">
                                    <b><?= $certificate->c_title ?></b>
                                </p>
                                <ul class="list-unstyled profile-about" style="list-style: none !important;">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Duration</span> </div>
                                            <div class="col-sm-8">
                                                <?= $certificate->c_duration ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Description</span> </div>
                                            <div class="col-sm-8"><?= $certificate->c_description ?></div>
                                        </div>
                                    </li>
                                </ul>
                                <?php if ($profile_id == $session_user_id) { ?>
                                    <a href="<?= site_url('certification/edit/' . $certificate->c_id); ?>"
                                        style="vertical-align: inherit;" class="btn btn-white btn-xs flaot-right"><i
                                            style="font-size: 16px;" class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('certification/delete/' . $certificate->c_id) ?>"
                                        style="vertical-align: inherit;"
                                        onclick="return confirm('Are you Sure you want to delete this?')"
                                        class="btn btn-white btn-xs pull-right"><i style="font-size: 16px;"
                                            class=" fas fa-trash-alt"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div> -->

        </div>

        <!-- End of the center section -->

        <div class="col-md-3">
            <!-- <div class="card">
                <div class="card-body text-center">
                    <a href="<?= site_url('feed/user/' . $profile_id); ?>">
                        <?= $profile->m_name ?> Activity <b>(<?= FeedCountByUser($profile_id); ?>)</b>
                    </a>
                </div>
                <div class="card-body text-center"> <a href="<?= site_url('profile_points/GetPoints/' . $profile_id); ?>"> Total Points  <b>(<?= $points->user_points ?>)</b></a>                   </div>
            </div>
            <a href="<?= site_url('profile/Recommendation/' . $profile_id); ?>"
                class="btn btn-outline-success col-12 recommedation" style="margin-bottom: 10px;"
                onclick="Confirm('Are you sure you want to recommend this profile?');"><b>Recommend
                    <?= $profile->m_name ?></b></a>
            <?php if ($session_user_id > 0) { ?>
                <?php if (empty($profile->profile_mentors_approved)) { ?>
                    <a href="<?= site_url('track_steps/profile_approval/' . $profile_id . '/' . $session_user_id); ?>"
                        class="btn btn-outline-success col-12 recommedation" style="margin-bottom: 10px;"
                        onclick="Confirm('Are you sure you want to recommend this profile?');"><b>NAVAFIZ Profile
                            Approval</b></a>
                <?php } else { ?>
                    <a href="#" class="btn btn-outline-success col-12 recommedation" style="margin-bottom: 10px;"><b>This
                            profile is approved by Navafiz Mentors</b></a>
                <?php } ?>
                <a href="<?= site_url('social-media'); ?>" class="btn btn-outline-success col-12"
                    style="margin-bottom: 10px;"><b>Join WhatsApp groups</b></a>
            <?php } ?> -->
            <?php if ($role_id == 9) { ?>
                <a href="<?= site_url('form-requests/manpower-supply-quota-list'); ?>" class="btn btn-primary col-12 mb-2">
                    Manpower Supply Job Quota
                </a>
            <?php } ?>

            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-3 text-start">

                    <!-- Activity -->
                    <a href="<?= site_url('feed/user/' . $profile_id); ?>" class="action-item justify-content-between">
                        <div>
                            <i class="fas fa-stream me-2"></i>
                            <?= $profile->m_name ?> Activity
                        </div>
                        <span class="badge bg-light text-dark position-static">
                            <?= FeedCountByUser($profile_id); ?>
                        </span>
                    </a>

                    <!-- Recommend -->
                    <a href="<?= site_url('profile/Recommendation/' . $profile_id); ?>" class="action-item"
                        onclick="return confirm('Are you sure you want to recommend this profile?');">

                        <div>
                            <i class="fas fa-thumbs-up me-2"></i>
                            Recommend <?= $profile->m_name ?>
                        </div>
                    </a>

                    <?php if ($session_user_id > 0): ?>

                        <!-- Approval -->
                        <?php if (empty($profile->profile_mentors_approved)): ?>
                            <a href="<?= site_url('track_steps/profile_approval/' . $profile_id . '/' . $session_user_id); ?>"
                                class="action-item text-success"
                                onclick="return confirm('Are you sure you want to approve this profile?');">

                                <div>
                                    <i class="fas fa-check-circle me-2"></i>
                                    Navafiz Profile Approval
                                </div>
                            </a>
                        <?php else: ?>
                            <div class="action-item disabled text-muted text-left">
                                <i class="fas fa-check-double me-2 text-success"></i>
                                Profile Approved by Mentors
                            </div>
                        <?php endif; ?>

                        <!-- WhatsApp -->
                        <a href="<?= site_url('social-media'); ?>" class="action-item">
                            <div>
                                <i class="fab fa-whatsapp me-2 text-success"></i>
                                Join WhatsApp Groups
                            </div>
                        </a>

                    <?php endif; ?>

                    <?php if ($role_id == 9): ?>
                        <!-- Special Action -->
                        <a href="<?= site_url('form-requests/manpower-supply-quota-list'); ?>"
                            class="action-item highlight">
                            <div>
                                <i class="fas fa-briefcase me-2"></i>
                                Manpower Supply Job Quota
                            </div>
                        </a>
                    <?php endif; ?>

                </div>
            </div>


            <?php if ($role_id == 2): ?>
                <div class="card border-0 shadow-sm profile mb-3">
                    <div class="card-body p-4">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="fw-semibold text-primary-custom mb-0">
                                <i class="fas fa-file-alt me-2"></i>Form Requests
                            </h6>
                        </div>

                        <!-- Description -->
                        <p class="text-muted small mb-3 text-left">Access all the important form requests relevant to your
                            role.</p>

                        <!-- List of Requests -->
                        <div class="profile-list text-left">

                            <a href="<?= site_url('form-requests/job-request-list'); ?>"
                                class="list-item justify-content-start text-decoration-none fw-semibold">
                                <i class="fas fa-briefcase text-primary-custom me-2"></i>
                                Job Requests
                                <i class="fas fa-chevron-right ms-auto text-muted"></i>
                            </a>

                            <hr class="my-2">

                            <a href="<?= site_url('form-requests/job-seeker-request-list'); ?>"
                                class="list-item justify-content-start text-decoration-none fw-semibold">
                                <i class="fas fa-user-tie text-primary-custom me-2"></i>
                                Job Seeker Requests
                                <i class="fas fa-chevron-right ms-auto text-muted"></i>
                            </a>

                            <hr class="my-2">

                            <a href="<?= site_url('form-requests/manpower-supply-request-list'); ?>"
                                class="list-item justify-content-start text-decoration-none fw-semibold">
                                <i class="fas fa-users-cog text-primary-custom me-2"></i>
                                Manpower Supply Company Registrations
                                <i class="fas fa-chevron-right ms-auto text-muted"></i>
                            </a>

                            <hr class="my-2">

                            <a href="<?= site_url('form-requests/mentor-request-list'); ?>"
                                class="list-item justify-content-start text-decoration-none fw-semibold">
                                <i class="fas fa-chalkboard-teacher text-primary-custom me-2"></i>
                                Mentor Requests
                                <i class="fas fa-chevron-right ms-auto text-muted"></i>
                            </a>

                            <hr class="my-2">

                            <a href="<?= site_url('form-requests/freelancer-request-list'); ?>"
                                class="list-item justify-content-start text-decoration-none fw-semibold">
                                <i class="fas fa-user-clock text-primary-custom me-2"></i>
                                Freelancer Requests
                                <i class="fas fa-chevron-right ms-auto text-muted"></i>
                            </a>

                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <!-- <?php if ($role_id == 2) { ?>
                <div class="card">
                    <div class="card-header">
                        <b>Form Requests</b>
                    </div>
                    <div class="card-body">
                        <p>
                            All the form requests
                        </p>
                        <a href="<?= site_url('form-requests/job-request-list'); ?>" class="btn btn-primary col-12 mb-2">
                            Job Requests
                        </a>
                        <a href="<?= site_url('form-requests/job-seeker-request-list'); ?>"
                            class="btn btn-primary col-12 mb-2">
                            Job Seeker Requests
                        </a>
                        <a href="<?= site_url('form-requests/manpower-supply-request-list'); ?>"
                            class="btn btn-primary col-12 mb-2">
                            Manpower Supply Company Registrations
                        </a>
                        <a href="<?= site_url('form-requests/mentor-request-list'); ?>" class="btn btn-primary col-12 mb-2">
                            Mentor Requests
                        </a>
                        <a href="<?= site_url('form-requests/freelancer-request-list'); ?>" class="btn btn-primary col-12">
                            Freelancer Requests
                        </a>
                    </div>
                </div>
            <?php } ?> -->


            <!-- <?php if (!empty($recommand_list)) { ?>
                <div class="card" style="margin-bottom: -10px;">
                    <div class="card-header"><b>Profile Recommendations (<?= count($recommand_list) ?>)</b></div>
                </div>
                <?php foreach ($recommand_list as $list) { ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mr-2">
                                    <img src="<?= site_url('assets/uploads/members/' . $list->m_avatar); ?>" alt=""
                                        class="avatarpro">
                                </div>
                                <div><a class="member_name" href="<?= site_url('profile/' . $list->recommend_by); ?>">
                                        <strong>
                                            <?= $list->m_name ?>
                                        </strong> </a> <br />
                                    <?= $list->m_profession ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?> -->

            <?php if (!empty($recommand_list)): ?>
                <div class="card border-0 shadow-sm profile mb-3 text-left">
                    <div class="card-body p-4">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-semibold text-primary-custom mb-0">
                                <i class="fas fa-user-friends me-2"></i>
                                Profile Recommendations (
                                <?= count($recommand_list) ?>)
                            </h6>
                        </div>

                        <!-- Recommendation List -->
                        <div class="recommendation-list">

                            <?php foreach ($recommand_list as $index => $list): ?>
                                <div class="mb-3 rec-item <?= $index >= 3 ? 'more-rec' : ''; ?>">
                                    <div class="d-flex align-items-center ">
                                        <!-- Avatar -->
                                        <div>
                                            <img src="<?= site_url('assets/uploads/members/' . $list->m_avatar); ?>"
                                                class="avatarpro"
                                                onerror="this.onerror=null; this.src='<?= base_url('navassets/img/user-avatar.jpg'); ?>';">
                                        </div>

                                        <!-- Name & Profession -->
                                        <div class="flex-grow-1 ms-2">
                                            <a href="<?= site_url('profile/' . $list->recommend_by); ?>"
                                                class="fw-semibold text-dark text-decoration-none member_name">
                                                <?= htmlspecialchars($list->m_name); ?>
                                            </a>
                                            <div class="text-muted small"><?= htmlspecialchars($list->m_profession); ?></div>
                                        </div>

                                    </div>
                                </div>
                                <!-- <?php if ($index < count($recommand_list) - 1): ?>
                        <hr class="my-2">
                        <?php endif; ?> -->
                            <?php endforeach; ?>

                            <?php if (count($recommand_list) > 3): ?>
                                <div class="text-center">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-link toggle-rec">
                                        Show All (<?= count($recommand_list) - 3 ?> more)
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <!-- <?php if (!empty($recommand_list)) { ?>
                <div class="card" style="margin-bottom: -10px;">
                    <div class="card-header">
                        <b>Profile Recommendations (
                            <?= count($recommand_list) ?>)
                        </b>
                    </div>
                </div>

                <div class="recommendation-container">
                    <?php foreach ($recommand_list as $index => $list) { ?>
                        <div class="card rec-item <?= $index >= 3 ? 'more-rec' : ''; ?>">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <img src="<?= site_url('assets/uploads/members/' . $list->m_avatar); ?>"
                                            class="avatarpro">
                                    </div>
                                    <div>
                                        <a class="member_name" href="<?= site_url('profile/' . $list->recommend_by); ?>">
                                            <strong>
                                                <?= $list->m_name ?>
                                            </strong>
                                        </a><br />
                                        <?= $list->m_profession ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (count($recommand_list) > 3) { ?>
                        <div class="text-center mb-2">
                            <a href="javascript:void(0);" class="btn btn-sm btn-link toggle-rec">
                                Show All (
                                <?= count($recommand_list) - 3 ?> more)
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?> -->




            <div class="card border-0 shadow-sm profile mb-3 text-left">
                <div class="card-body p-4">

                    <!-- Header -->
                    <h6 class="fw-semibold text-primary-custom mb-4">
                        <i class="fas fa-user-check me-2"></i>
                        Recruitment Support Activity
                        <span class="text-muted">(
                            <?= $points->user_points ?>)
                        </span>
                    </h6>

                    <?php if ($session_user_id > 0): ?>

                        <!-- Recommend for Job -->
                        <div class="action-block mb-4">
                            <div class="action-title">
                                <i class="fas fa-thumbs-up me-2"></i>
                                Recommend
                                <?= $profile->m_name ?>
                            </div>

                            <form action="<?= site_url('profile/RecommendationForJob/' . $profile_id) ?>" method="post">
                                <select class="form-select mb-2" name="job_id" required>
                                    <option value="">Select Job</option>
                                    <?php foreach ($top10_jobs as $tjob): ?>
                                        <option value="<?= $tjob->j_id ?>">
                                            <?= $tjob->j_title ?> |
                                            <?= $tjob->j_location ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <input type="hidden" name="type" value="for_job" />

                                <button type="submit" class="btn btn-primary-custom w-100">
                                    Recommend
                                </button>
                            </form>
                        </div>

                    <?php endif; ?>


                    <?php if (in_array($session_user_id, CvReviewTeamList())): ?>

                        <!-- Shortlist -->
                        <div class="action-block mb-4">
                            <div class="action-title">
                                <i class="fas fa-check-circle me-2"></i>
                                Shortlist
                                <?= $profile->m_name ?>
                            </div>

                            <form action="<?= site_url('jobs/shortlist_from_profile/' . $profile->m_id) ?>" method="post">
                                <select class="form-select mb-2" name="job_shortlist_id" required>
                                    <option value="">Select Job</option>
                                    <?php foreach ($top10_jobs as $tjob): ?>
                                        <option value="<?= $tjob->j_id ?>">
                                            <?= $tjob->j_title ?> |
                                            <?= $tjob->j_location ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <input type="hidden" name="type" value="for_job" />

                                <button type="submit" class="btn btn-outline-primary w-100">
                                    Shortlist
                                </button>
                            </form>
                        </div>

                        <!-- Add to User List -->
                        <div class="action-block">
                            <div class="action-title">
                                <i class="fas fa-list me-2"></i>
                                Add to User List
                            </div>

                            <form action="<?= site_url('profile/save_user_by_list/' . $profile->m_id) ?>" method="post">
                                <select class="form-select mb-2" name="list_id" required>
                                    <option value="">Select User List</option>
                                    <?php foreach ($user_list as $list): ?>
                                        <option value="<?= $list->id ?>">
                                            <?= $list->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <button type="submit" class="btn btn-outline-success w-100">
                                    Add
                                    <?= $profile->m_name ?>
                                </button>
                            </form>
                        </div>

                    <?php endif; ?>

                </div>
            </div>

            <!-- <div class="card">
                <div class="card-header text-center"><a
                        href="<?= site_url('profile_points/GetPoints/' . $profile_id) ?>">Recruitment Support Activity
                        <b>(<?= $points->user_points ?>)</b></a></div>
                <div class="card-body">
                    <?php if ($session_user_id > 0) { ?>

                        <form action="<?= site_url('profile/RecommendationForJob/' . $profile_id) ?>" method="post"
                            class="mb-4">
                            <div class="row">
                                <div class="col-md-12 col-xs-12 mx-auto">
                                    <div class="form-group">
                                        <label><b>Recommend <?= $profile->m_name ?> for Recent Posted Jobs</b></label>
                                        <select class="select-category form-control" name="job_id" required="">
                                            <option value="">Select Job</option>
                                            <?php foreach ($top10_jobs as $tjob) { ?>
                                                <option value="<?= $tjob->j_id ?>"><?= $tjob->j_title ?> |
                                                    <?= $tjob->j_location ?>
                                                </option>
                                            <?php } ?>
                                            <input type="hidden" name="type" value="for_job" />
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">
                                            Recommend </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    <?php if (in_array($session_user_id, CvReviewTeamList())) { ?>
                        <form action="<?= site_url('jobs/shortlist_from_profile/' . $profile->m_id) ?>" method="post"
                            class="mb-4">
                            <div class="row">
                                <div class="col-md-12 col-xs-12 mx-auto">
                                    <div class="form-group">
                                        <label><b>Shortlist <?= $profile->m_name ?> for Recent Posted Jobs</b></label>
                                        <select class="select-category form-control" name="job_shortlist_id" required="">
                                            <option value="">Select Job</option>
                                            <?php foreach ($top10_jobs as $tjob) { ?>
                                                <option value="<?= $tjob->j_id ?>"><?= $tjob->j_title ?> |
                                                    <?= $tjob->j_location ?>
                                                </option>
                                            <?php } ?>
                                            <input type="hidden" name="type" value="for_job" />
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">
                                            Shortlist <?= $profile->m_name ?> </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>

                    <?php if (in_array($session_user_id, CvReviewTeamList())) { ?>
                        <form action="<?= site_url('profile/save_user_by_list/' . $profile->m_id) ?>" method="post">
                            <div class="row">
                                <div class="col-md-12 col-xs-12 mx-auto">
                                    <div class="form-group">
                                        <label><b>Add <?= $profile->m_name ?> for User List</b></label>
                                        <select class="select-category form-control" name="list_id" required="">
                                            <option value="">Select User List</option>
                                            <?php // $user_list = sort($user_list);  
                                                ?>
                                            <?php foreach ($user_list as $list) { ?>
                                                <option value="<?= $list->id ?>"><?= $list->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Add
                                            <?= $profile->m_name ?> </button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    <?php } ?>
                </div>
            </div> -->


            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4 text-start">

                    <!-- Header -->
                    <h6 class="fw-semibold text-primary-custom mb-3">
                        <i class="fas fa-gift me-2"></i>
                        Give a Referral, Get a Reward
                    </h6>

                    <?php if ($session_user_id > 0):
                        $encode_ref_id = base64_encode($session_user_id);
                        $referral_link = "https://navafiz.com/user/register?referral_id=" . $encode_ref_id;
                        ?>

                        <!-- Message Box -->
                        <div class="referral-box mb-3">
                            <p class="mb-2 small text-muted">
                                <strong><?= UserInfo($session_user_id)->m_name; ?></strong> invites you to join Navafiz.com.
                            </p>

                            <p class="mb-2 small">
                                🎯 Get <strong>5 days FREE job support</strong> for your career search.
                            </p>

                            <p class="mb-0 small text-muted">
                                Need help? WhatsApp <strong>+971 56 348 7890</strong>
                            </p>
                        </div>

                    <?php endif; ?>

                    <?php
                    $session_user_id = $session_user_id ?? null;
                    $user = $session_user_id ? UserInfo($session_user_id) : null;
                    $m_name = (is_object($user) && isset($user->m_name)) ? $user->m_name : 'A friend';
                    $referral_link = $referral_link ?? '';
                    ?>

                    <!-- Action Button -->
                    <a href="javascript:void(0);" id="referralLink"
                        class="btn btn-primary-custom w-100 d-flex align-items-center justify-content-center gap-2"
                        data-link="<?= htmlspecialchars($m_name); ?> invites you to join Navafiz.com—get 5 days free job support. Join here: <?= htmlspecialchars($referral_link); ?>">

                        <i class="fas fa-share-alt"></i>
                        <span>Share Referral Link</span>
                    </a>

                    <!-- Copy Message -->
                    <span id="copyMessage" class="text-success small d-block mt-2 text-center" style="display:none;">
                        ✅ Referral link copied! Share and earn rewards.
                    </span>

                </div>
            </div>

            <!-- <div class="card">
                <div class="card-header">
                    <b>Give a referral, get a reward!</b>
                </div>
                <div class="card-body">
                    <?php if ($session_user_id > 0):
                        $encode_ref_id = base64_encode($session_user_id);
                        $referral_link = "https://navafiz.com/user/register?referral_id=" . $encode_ref_id;
                        ?>
                        <p>
                            <?php echo UserInfo($session_user_id)->m_name; ?> invites you to join Navafiz.com—enjoy 5 days
                            of free job support for your career search. For further assistance, Please Whatsapp
                            +971563487890
                        </p>
                    <?php endif; ?>

                    <?php
                    $session_user_id = $session_user_id ?? null;
                    $user = $session_user_id ? UserInfo($session_user_id) : null;

                    // Safely get name or fallback to generic text
                    $m_name = (is_object($user) && isset($user->m_name)) ? $user->m_name : 'A friend';
                    $referral_link = $referral_link ?? '';
                    ?>
                    <a href="javascript:void(0);" id="referralLink" class="btn btn-primary col-12"
                        data-link="<?php echo htmlspecialchars($m_name); ?> invites you to join Navafiz.com—enjoy 5 days of free job support for your career search while you join via below link: <?php echo htmlspecialchars($referral_link); ?> For further assistance, Please WhatsApp +971563487890">
                        Give a Referral <br />Get a Reward!
                    </a>
                    <span id="copyMessage" style="color: green; display: none; margin-left: 10px;">Referral code copied,
                        share for rewards!</span>
                </div>
            </div> -->


            <?php if (!empty($related_userlist)): ?>
                <div class="card border-0 shadow-sm profile mb-3 text-left">
                    <div class="card-body p-4">

                        <!-- Header -->
                        <h6 class="fw-semibold text-primary-custom mb-3">
                            <i class="fas fa-users me-2"></i>
                            Related Members
                            <?php foreach ($user_list_id as $user_list):
                                $user_list_name = GetUserListName($user_list->list_id);
                                ?>
                                <span class="text-muted small">(<?= @$user_list_name[0]->name ?>)</span>
                            <?php endforeach; ?>
                        </h6>

                        <?php if (@$related_userlist[0] != 'e' && @$related_userlist[0] != 'NULL' && @$related_userlist[0] !== "empty" && isset($related_userlist[0]) && !empty($related_userlist[0])): ?>

                            <?php foreach (@$related_userlist[0] as $index => $related_user): ?>

                                <div class="d-flex align-items-start related-item">

                                    <!-- Avatar -->
                                    <div>
                                        <img src="<?= site_url('assets/uploads/members/' . $related_user->m_avatar); ?>"
                                            class="avatarpro"
                                            onerror="this.onerror=null; this.src='<?= base_url('navassets/img/user-avatar.jpg'); ?>';">
                                    </div>

                                    <!-- Info -->
                                    <div class="flex-grow-1 ms-2">

                                        <a href="<?= base_url() ?>profile/<?= $related_user->member_id ?>"
                                            class="fw-semibold text-dark text-decoration-none">
                                            <?= $related_user->m_name ?>
                                        </a>

                                        <div class="text-muted small mt-1">
                                            <i class="fas fa-briefcase me-1"></i>
                                            <?= $related_user->m_profession ?>
                                        </div>

                                        <div class="text-muted small">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            <?= $related_user->m_current_city ?>
                                        </div>

                                    </div>

                                </div>

                                <?php if ($index < count($related_userlist[0]) - 1): ?>
                                    <hr class="my-3">
                                <?php endif; ?>

                            <?php endforeach; ?>

                        <?php else: ?>
                            <span class="text-muted small d-block text-center">
                                No related members found.
                            </span>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>



            <!-- <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">
                <div class="card relatedprofiles">
                    <div class="card-header">
                        <?php // print_r(@$related_userlist);exit(); 
                        ?>
                        <b>Related UserList of <?php foreach ($user_list_id as $user_list) {

                            $user_list_name = GetUserListName($user_list->list_id);
                            echo '(' . @$user_list_name[0]->name . ',)'; ?> <?php } ?>
                            Members</b>
                    </div>
                    <div class="card-body">
                        <?php // echo "<pre>";print_r($related_userlist);exit();
                        if (@$related_userlist[0] != 'e' && @$related_userlist[0] != 'NULL' && @$related_userlist[0] !== "empty" && isset($related_userlist[0]) && !empty($related_userlist[0])) {
                            foreach (@$related_userlist[0] as $related_user) {
                                //                                    print_r($related_user);exit();
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3" style="padding-left: 0;">
                                                <div class="profile_img img-fluid"
                                                    style="background-image: url('<?= base_url() ?>assets/uploads/members/<?= ($related_user->m_avatar == "") ? "default.png" : $related_user->m_avatar ?>');">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-9" style="padding-left: 0;">
                                                <div><a class="member_name"
                                                        href="<?= base_url() ?>profile/<?= $related_user->member_id ?>">
                                                        <strong>
                                                            <?= $related_user->m_name ?>
                                                        </strong> </a>
                                                </div>
                                                <div>
                                                    <small><strong>Profession: </strong>
                                                        <?= $related_user->m_profession ?>
                                                    </small>
                                                </div>
                                                <div>
                                                    <small><strong>Current City:</strong>
                                                        <?= $related_user->m_current_city ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div> -->


            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4 text-start">

                    <!-- Header -->
                    <h6 class="fw-semibold text-primary-custom mb-3">
                        <i class="fas fa-user-tie me-2"></i>Mentor
                    </h6>

                    <?php if (isset($profile->mentor_id)) {
                        $mentor_detail = BasicInfoUser($profile->mentor_id);
                    } ?>

                    <?php if (isset($mentor_detail->m_name) && !empty($mentor_detail->m_name)): ?>

                        <div class="d-flex align-items-start mentor-item">

                            <!-- Avatar -->
                            <div class="me-3">
                                <a href="<?= site_url('profile/' . $mentor_detail->m_id); ?>">
                                    <div class="mentor-avatar"
                                        style="background-image: url('<?= site_url('assets/uploads/members/' . $mentor_detail->m_avatar) ?>');">
                                    </div>
                                </a>
                            </div>

                            <!-- Info -->
                            <div class="flex-grow-1">

                                <!-- Name -->
                                <a href="<?= site_url('profile/' . $mentor_detail->m_id); ?>"
                                    class="fw-semibold text-dark text-decoration-none">
                                    <?= $mentor_detail->m_name ?>
                                </a>

                                <!-- Profession -->
                                <div class="text-muted small mt-1">
                                    <i class="fas fa-briefcase me-1"></i>
                                    <?= $mentor_detail->m_profession ?>
                                </div>

                                <!-- Location -->
                                <div class="text-muted small">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    <?= ($mentor_detail->m_current_city == "") ? "---" : ucwords($mentor_detail->m_current_city); ?>
                                </div>

                                <!-- Last Seen -->
                                <?php if (!empty($mentor_detail->last_login_date)): ?>
                                    <div class="text-muted small">
                                        <i class="fas fa-clock me-1"></i>
                                        Last Seen:
                                        <?= date('d M Y, g:i A', strtotime($mentor_detail->last_login_date)); ?>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </div>

                        <!-- Action -->
                        <div class="mt-3">
                            <a href="<?= site_url('track_steps/sheet/' . $mentor_detail->m_id . '#mchatbox'); ?>"
                                target="_blank"
                                class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center gap-2">

                                <i class="fas fa-comment-dots"></i>
                                Contact
                                <?= $mentor_detail->m_name ?>
                            </a>
                        </div>

                    <?php else: ?>

                        <div class="text-muted small ">
                            No mentor assigned yet.
                        </div>

                    <?php endif; ?>

                </div>
            </div>

            <!-- <div class="card">
                <div class="card-header">
                    <b>Mentor</b>
                </div>
                <div class="card-body">
                    <?php if (isset($profile->mentor_id)) {
                        $mentor_detail = BasicInfoUser($profile->mentor_id);
                    } ?>
                    <?php if (isset($mentor_detail->m_name) && !empty($mentor_detail->m_name)) { ?>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="profile_link" href="<?= site_url('profile/' . $mentor_detail->m_id); ?>">
                                    <div class="profile_img"
                                        style="background-image: url('<?= site_url('assets/uploads/members/' . $mentor_detail->m_avatar) ?>'); width: 60px;height:60px;">
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-9">
                                <a class="profile_link" href="<?= site_url('profile/' . $mentor_detail->m_id); ?>">
                                    <b style="color: #000;"><?= $mentor_detail->m_name ?></b>
                                </a>
                                <p>
                                    <?= $mentor_detail->m_profession ?> <br>
                                    <?= ($mentor_detail->m_current_city == "") ? "---" : ucwords($mentor_detail->m_current_city); ?>
                                </p>
                                <?php if (!empty($mentor_detail->last_login_date)) { ?>
                                    <div class="views">
                                        Last Login: <i
                                            style="color: #215374;"><?php echo date('d F Y g:i A', strtotime($mentor_detail->last_login_date)); ?></i>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-12">
                                <a class="btn btn-outline-success col-12"
                                    href="<?= site_url('track_steps/sheet/' . $mentor_detail->m_id . '#mchatbox'); ?>"
                                    target="_blank">Contact with <?= $mentor_detail->m_name ?></a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <b>Not yet Assigned</b>
                    <?php } ?>
                </div>
            </div> -->


            <?php
            $allowed_mentors = [10, 56672, 63519];

            if (in_array(intval($session_user_id), $allowed_mentors)) {
                ?>
                <div class="card border-0 shadow-sm profile mb-3">
                    <div class="card-body p-4 text-start">

                        <!-- Header -->
                        <h6 class="fw-semibold text-primary-custom mb-3">
                            <i class="fas fa-user-cog me-2"></i>
                            Assign / Change Mentor
                        </h6>

                        <form action="<?= site_url('track_steps/UpdateMentor/' . $profile_id); ?>" method="post">

                            <!-- Mentor Select -->
                            <div class="mb-3">
                                <label class="form-label small text-muted mb-1">
                                    Select Mentor
                                </label>

                                <select name="mentor_id" class="form-select" required>
                                    <option value="0">-- No Mentor Assigned --</option>
                                    <?php
                                    $mentors = $this->db->get_where('jb_member', ['role_id' => 2])->result();
                                    foreach ($mentors as $mentor) {
                                        $selected = ($profile->mentor_id == $mentor->m_id) ? 'selected' : '';
                                        echo '<option value="' . $mentor->m_id . '" ' . $selected . '>' . $mentor->m_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Assigned Date -->
                            <?php if (!empty($profile->mentor_assigned_date)): ?>
                                <div class="info-row mb-3">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>
                                        Assigned:
                                        <?= date('d M Y', strtotime($profile->mentor_assigned_date)); ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <!-- Role Toggle -->
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" name="is_mentor" id="is_mentor" value="1" class="form-check-input"
                                    <?= ($profile->role_id == 2) ? 'checked' : ''; ?>>

                                <label class="form-check-label small" for="is_mentor">
                                    Mark as Mentor
                                </label>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary-custom w-100">
                                <i class="fas fa-save me-1"></i> Update Mentor
                            </button>

                            <input type="hidden" name="redirect_url" value="/n/<?= $profile_id ?>" />

                        </form>

                    </div>
                </div>
            <?php } ?>


            <!-- <?php
            // Only allow specific mentors to see this section
            $allowed_mentors = [10, 56672, 63519];

            if (in_array(intval($session_user_id), $allowed_mentors)) { // Only these two can see and edit
                ?>
                <div class="card mb-3" style="background-color: lightblue;">
                    <div class="card-header"><b>Assign / Change Mentor</b></div>
                    <div class="card-body">
                        <form action="<?= site_url('track_steps/UpdateMentor/' . $profile_id); ?>" method="post">
                            <div class="form-group">
                                <label for="mentor_id"><b>Select Mentor</b></label>
                                <select name="mentor_id" id="mentor_id" class="form-control" required>
                                    <option value="0">-- No Mentor Assigned --</option>
                                    <?php
                                    // Fetch all mentors from jb_member where role_id = 2
                                    $mentors = $this->db->get_where('jb_member', ['role_id' => 2])->result();
                                    foreach ($mentors as $mentor) {
                                        $selected = ($profile->mentor_id == $mentor->m_id) ? 'selected' : '';
                                        echo '<option value="' . $mentor->m_id . '" ' . $selected . '>' . $mentor->m_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php if (!empty($profile->mentor_assigned_date)): ?>
                                <div class="form-group mt-3">
                                    <label><b>Assigned Date:</b></label>
                                    <span>
                                        <?= date('d M Y', strtotime($profile->mentor_assigned_date)); ?>
                                        Example output: 16 Oct 2025
                                    </span>
                                </div>
                            <?php endif; ?>
                            <div class="form-group mt-3">
                                <div class="form-check">
                                    <input type="checkbox" name="is_mentor" id="is_mentor" value="1"
                                        class="form-check-input" <?= ($profile->role_id == 2) ? 'checked' : ''; ?> />
                                    <label class="form-check-label" for="is_mentor"><b>Mentor</b></label>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" class="btn btn-outline-success col-12" value=" Update " />
                            </div>
                            <input type="hidden" name="redirect_url" value="/n/<?= $profile_id ?>" />
                        </form>
                    </div>
                </div>
            <?php } ?> -->


            <?php if (in_array(intval($session_user_id), CvReviewTeamList())) { ?>
                <div class="card border-0 shadow-sm profile mb-3">
                    <div class="card-body p-4 text-start">

                        <!-- Header -->
                        <h6 class="fw-semibold text-primary-custom mb-3">
                            <i class="fas fa-user-shield me-2"></i>
                            Admin Comments
                            <?php if (isset($profile->mentor_id) && $profile->mentor_id != 0): ?>
                                <span class="text-muted small">
                                    (
                                    <?= GetUserDetails($profile->mentor_id)->m_name ?>)
                                </span>
                            <?php endif; ?>
                        </h6>

                        <div class="text-muted small mb-3">
                            Only visible to Navafiz Mentors
                        </div>

                        <!-- Contact Info -->
                        <div class="info-card mb-4">
                            <div class="info-title mb-2">
                                <i class="fas fa-address-book me-2"></i>Contact Information
                            </div>

                            <div class="info-row">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:<?= $profile->m_email; ?>">
                                    <?= $profile->m_email; ?>
                                </a>
                            </div>

                            <div class="info-row">
                                <i class="fas fa-phone"></i>
                                <span>
                                    <?= $profile->m_phone; ?>
                                </span>
                            </div>

                            <div class="info-row">
                                <i class="fab fa-whatsapp text-success"></i>
                                <a href="https://wa.me/<?= preg_replace('/\D/', '', $profile->whatsapp_number); ?>"
                                    target="_blank">
                                    <?= $profile->whatsapp_number; ?>
                                </a>
                            </div>

                            <div class="info-row">
                                <i class="fab fa-linkedin text-info"></i>
                                <a href="<?= $profile->linkedin_profile_link; ?>" target="_blank">
                                    LinkedIn Profile
                                </a>
                            </div>
                        </div>

                        <!-- Form -->
                        <form action="<?= site_url('track_steps/PostAdminComment/' . $profile_id); ?>" method="post">

                            <!-- Comments -->
                            <div class="mb-3">
                                <label class="form-label small text-muted mb-1">
                                    Internal Notes
                                </label>

                                <textarea name="trackingsheet_admin_comments" class="form-control modern-textarea" rows="8"
                                    placeholder="Write internal comments..."><?= $profile->trackingsheet_admin_comments; ?></textarea>
                            </div>

                            <!-- Dismiss -->
                            <?php if ($profile_id == $user_id): ?>
                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" name="dismissed_by" value="1" class="form-check-input"
                                        id="dismissed_by" <?= $profile->dismissed_by > 0 ? 'checked' : ''; ?>>

                                    <label class="form-check-label small" for="dismissed_by">
                                        Dismiss this candidate
                                    </label>
                                </div>
                            <?php endif; ?>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary-custom w-100">
                                <i class="fas fa-save me-1"></i> Save Comments
                            </button>

                            <input type="hidden" name="redirect_url" value="/n/<?= $profile_id ?>" />

                        </form>

                    </div>
                </div>
            <?php } ?>

            <?php if ($profile->referral_id > 0): ?>
                <div class="card border-0 shadow-sm profile mb-3">
                    <div class="card-body p-3 text-start">

                        <div class="d-flex align-items-center">

                            <div class="me-2">
                                <i class="fas fa-user-friends text-primary-custom"></i>
                            </div>

                            <div>
                                <div class="text-muted small">Referred By</div>
                                <div class="fw-semibold">
                                    <?php $referral_detail = BasicInfoUser($profile->referral_id); ?>
                                    <?= $referral_detail->m_name; ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            <?php endif; ?>


            <!-- <?php if (in_array(intval($session_user_id), CvReviewTeamList())) { ?>
                <div class="card" style="background-color: lightblue;">
                    <div class="card-header"><b>Admin Comments
                            <?= isset($profile->mentor_id) && $profile->mentor_id != 0 ? '(' . GetUserDetails($profile->mentor_id)->m_name . ')' : ''; ?></b>
                        <br />(Only Visible to Navafiz Mentors)
                    </div>
                    <div class="card-body">
                        <div class="mt-4">
                            <h6 class="text-dark mb-3"><b>Contact Information</b></h6>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label><b>Email:</b></label>
                                    <p class="mb-0">
                                        <a href="mailto:<?= $profile->m_email; ?>" class="text-primary">
                                            <?= $profile->m_email; ?>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label><b>Mobile:</b></label>
                                    <p class="mb-0 text-muted"><?= $profile->m_phone; ?></p>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label><b>WhatsApp:</b></label>
                                    <p class="mb-0">
                                        <a href="https://wa.me/<?= preg_replace('/\D/', '', $profile->whatsapp_number); ?>"
                                            target="_blank" class="text-success">
                                            <?= $profile->whatsapp_number; ?>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label><b>LinkedIn:</b></label>
                                    <p class="mb-0">
                                        <a href="<?= $profile->linkedin_profile_link; ?>" target="_blank" class="text-info">
                                            <?= $profile->linkedin_profile_link; ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <form action="<?= site_url('track_steps/PostAdminComment/' . $profile_id); ?>" method="post">
                            <div class="form-group">
                                <textarea name="trackingsheet_admin_comments" class="form-control"
                                    rows="30"><?= $profile->trackingsheet_admin_comments; ?></textarea>
                            </div>
                            <?php if ($profile_id == $user_id) { ?>
                                <div class="form-check mb-4">
                                    <input type="checkbox" name="dismissed_by" <?= $profile->dismissed_by > 0 ? 'checked=""' : ''; ?> value="1" class="form-check-input" id="dismissed_by">
                                    <label class="form-check-label" for="dismissed_by"><b>Dismiss this Candidate</b></label>
                                </div>
                            <?php } ?>
                            <div class="form-group mt-3">
                                <input type="submit" class="btn btn-outline-success col-12" value=" Save " />
                            </div>
                            <input type="hidden" name="redirect_url" value="/n/<?= $profile_id ?>" />
                        </form>
                    </div>
                </div>
            <?php } ?>
            <?php if ($profile->referral_id > 0) { ?>
                <div class="card">
                    <div class="card-header">
                        <b>Refer By</b>
                    </div>
                    <div class="card-body">
                        <?php
                        $referral_detail = BasicInfoUser($profile->referral_id);
                        ?>
                        <h4><?= $referral_detail->m_name; ?></h4>
                    </div>
                </div>
            <?php } ?> -->





            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4 text-start">

                    <!-- Header -->
                    <h6 class="fw-semibold text-primary-custom mb-3">
                        <i class="fas fa-question-circle me-2"></i>
                        Profile Answers
                    </h6>

                    <?php if (!empty($recruitment_answers)): ?>

                        <ol class="ps-3 mb-0">

                            <?php foreach ($recruitment_answers as $index => $answer): ?>
                                <?php if (!empty($answer->question_id)):
                                    $ans = GetQuestion($answer->question_id);
                                    ?>

                                    <li class="mb-3">

                                        <!-- Question -->
                                        <div class="fw-medium text-dark">
                                            <?= $ans[0]->title ?>
                                        </div>

                                        <!-- Answer -->
                                        <div class="text-muted small mt-1">
                                            <i class="fas fa-angle-right me-1"></i>
                                            <?= !empty($answer->answer_value) ? $answer->answer_value : '---'; ?>
                                        </div>

                                    </li>

                                    <?php if ($index < count($recruitment_answers) - 1): ?>
                                        <hr class="my-2">
                                    <?php endif; ?>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </ol>

                    <?php else: ?>

                        <span class="text-muted small d-block text-center">
                            No answers available.
                        </span>

                    <?php endif; ?>

                </div>
            </div>


            <!-- <div class="card">
                <div class="card-header"><b>Profile Answers</b></div>
                <div class="card-body">
                    <?php $i = 1; ?>
                    <?php foreach ($recruitment_answers as $answer) {

                        ?>
                        <?php if (!empty($answer->question_id)) { ?>
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-12 mb-3">
                                    <?php $ans = GetQuestion($answer->question_id) ?>
                                    <?= $i . " - " . $ans[0]->title ?>
                                </div>
                                <div class="col-md-12">
                                    <div class="float-right mr-5">
                                    <?= $answer->answer_value ?>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <?php

                        }
                        $i++;
                    }
                    ?>

                </div>
            </div> -->

            <!-- Action Buttons -->
            <div class="card border-0 shadow-sm profile mb-3 text-left">
                <div class="card-body p-4">

                    <!-- Header -->
                    <h6 class="fw-semibold text-primary-custom mb-3">
                        <i class="fas fa-hand-pointer me-2"></i>Actions
                    </h6>

                    <!-- Action Groups -->
                    <div class="row g-3">

                        <!-- Primary Actions -->
                        <div class="col-12">
                            <div class="action-card">
                                <a href="<?= base_url('messages/' . $profile->m_id); ?>"
                                    class="action-btn <?= $session_user_id > 0 ? '' : 'disabled'; ?>">
                                    <i class="fas fa-envelope me-2"></i>Message
                                </a>
                                <a href="<?= base_url('track_steps/sheet/' . $profile->m_id); ?>"
                                    class="action-btn <?= $session_user_id > 0 ? '' : 'disabled'; ?>">
                                    <i class="fas fa-tasks me-2"></i>Tracking Sheet
                                </a>
                            </div>
                        </div>

                        <!-- Team & Mentor Actions -->
                        <?php if (in_array(intval($session_user_id), CvReviewTeamList()) && in_array($profile->m_id, CvReviewTeamList())): ?>
                            <div class="col-12">
                                <div class="action-card">
                                    <a href="<?= base_url('teamactions/index/' . $profile->m_id); ?>" class="action-btn">
                                        <i class="fas fa-users me-2"></i>Team Actions
                                    </a>
                                    <a href="<?= base_url('mentors/usersby/' . $profile->m_id); ?>" class="action-btn">
                                        <i class="fas fa-user-friends me-2"></i>Users By Mentor
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Recommendation -->
                        <div class="col-12">
                            <a href="<?= site_url('profile/Recommendation/' . $profile_id); ?>"
                                class="action-btn action-primary"
                                onclick="return confirm('Are you sure you want to recommend this profile?');">
                                <i class="fas fa-thumbs-up me-2"></i>Recommend <?= $profile->m_name ?>
                            </a>
                        </div>

                        <!-- CV / Profile Downloads -->
                        <div class="col-12">
                            <div class="action-card">
                                <?php if (!empty($profile->member_cv)): ?>
                                    <?php if ($role_id == 2): ?>
                                        <a href="<?= base_url('public-assets/cvreviews/' . $profile->member_cv) ?>"
                                            class="action-btn">
                                            <i class="fas fa-download me-2"></i>Download CV
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= base_url('need-access/' . $profile->m_id) ?>" class="action-btn">
                                            <i class="fas fa-lock me-2"></i>Download CV
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <a href="<?= base_url('need-access/' . $profile->m_id) ?>" class="action-btn">
                                    <i class="fas fa-file-pdf me-2"></i>Download Profile as PDF
                                </a>
                                <a href="javascript:void(0);" class="action-btn" onclick="copycurrenturl();">
                                    <i class="fas fa-link me-2"></i>Copy Profile Link
                                </a>
                            </div>
                        </div>

                        <!-- YouTube CV -->
                        <?php if ($profile->youtube_cv_link != ""): ?>
                            <?php $sub_link = substr($profile->youtube_cv_link, 32, 11); ?>
                            <div class="col-12">
                                <a href="#" class="action-btn" data-video="https://youtube.com/embed/<?= $sub_link ?>"
                                    data-toggle="modal" data-target="#videoModal">
                                    <i class="fab fa-youtube me-2"></i>YouTube CV
                                </a>
                            </div>
                        <?php endif; ?>

                        <!-- Contact WhatsApp -->
                        <?php $whatsapp = !empty($profile->m_mobile) ? $profile->m_mobile : $profile->m_phone; ?>
                        <?php if (in_array(intval($session_user_id), CvReviewTeamList())): ?>
                            <div class="col-12">
                                <a href="https://api.whatsapp.com/send/?phone=<?= $whatsapp ?>" target="_blank"
                                    class="action-btn action-success">
                                    <i class="fab fa-whatsapp me-2"></i>Contact via WhatsApp
                                </a>
                            </div>
                        <?php endif; ?>

                        <!-- Job Links -->
                        <div class="col-12">
                            <div class="action-card">
                                <a href="<?= site_url('feed') ?>" target="_blank" class="action-btn">
                                    <i class="fas fa-briefcase me-2"></i>See Received Jobs
                                </a>
                                <a href="<?= site_url('jobs') ?>" target="_blank" class="action-btn">
                                    <i class="fas fa-check-circle me-2"></i>See Verified Jobs
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>




            <!-- <?php if ($session_user_id > 0) {
                $class = '';
            } else {
                $class = 'disabled';
            } ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 pb-1 pt-1">
                            <a href="<?= base_url('messages/' . $profile->m_id); ?>"
                                class="btn btn-outline-secondary col-12 <?= $class ?>">
                                Message
                            </a>
                        </div>

                        <div class="col-md-12 col-xs-12 pb-1 pt-1">
                            <a href="<?= base_url('track_steps/sheet/' . $profile->m_id); ?>"
                                class="btn btn-outline-secondary col-12 <?= $class ?>">Trackingsheet</a>
                        </div>
                        <?php if (in_array(intval($session_user_id), CvReviewTeamList()) && in_array($profile->m_id, CvReviewTeamList())) { ?>
                            <div class="col-md-6 col-xs-12 pb-1 pt-1">
                                <a href="<?= base_url('teamactions/index/' . $profile->m_id); ?>"
                                    class="btn btn-outline-secondary col-12 <?= $class ?>">Team Actions</a>
                            </div>
                            <div class="col-md-6 col-xs-12 pb-1 pt-1">
                                <a href="<?= base_url('mentors/usersby/' . $profile->m_id); ?>"
                                    class="btn btn-outline-secondary col-12 <?= $class ?>">Users By Mentor</a>
                            </div>

                        <?php } ?>
                        <?php if (in_array(intval($session_user_id), CvReviewTeamList())) { ?>
                            <div class="col-md-12 col-xs-12 pb-1 pt-1">
                                <a href="<?= base_url() ?>profile/del_profile/<?= $profile->m_id ?>" onclick="return confirm('Are you Sure you want to delete this?')" class="btn btn-outline-danger col-12">Delete Profile</a>
                            </div>
                        <?php } ?>
                        <div class="col-md-12 col-xs-12 pb-1 pt-1">
                            <a href="<?= site_url('profile/Recommendation/' . $profile_id); ?>"
                                class="btn btn-outline-secondary col-12 recommedation <?= $class ?>"
                                style="margin-bottom: 10px;"
                                onclick="Confirm('Are you sure you want to recommend this profile?');"><b>Recommend
                                    <?= $profile->m_name ?></b></a>
                        </div>
                        <?php if (!empty($profile->member_cv)) { ?>
                            <div class="col-md-12 col-xs-12 pb-1 pt-1">

                                <?php if ($role_id == 2) { ?>
                                    <a href="<?= base_url('public-assets/cvreviews/' . $profile->member_cv) ?>"
                                        class="btn btn-outline-info col-12 <?= $class ?>">Download CV</a>
                                <?php } else { ?>
                                    <a href="<?= base_url('need-access/' . $profile->m_id) ?>"
                                        class="btn btn-outline-info col-12 <?= $class ?>">Download CV</a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($profile->youtube_cv_link != "") { ?>
                            <div class="col-md-12 col-xs-12 pb-1 pt-1">

                                <?php
                                $sub_link = substr($profile->youtube_cv_link, 32, 11);
                                ?>


                                <a href="" class="video btn btn-outline-info col-12 <?= $class ?>"
                                    data-video="https://youtube.com/embed/<?= $sub_link ?>" data-toggle="modal"
                                    data-target="#videoModal">
                                    Youtube CV link
                                </a>
                            </div>
                        <?php } ?>
                        <div class="col-md-12 col-xs-12 pb-1 pt-1"><a
                                href="<?= base_url('need-access/' . $profile->m_id) ?>"
                                class="btn btn-outline-success col-12 <?= $class ?>">Download Profile As PDF</a></div>
                        <div class="col-md-12 col-xs-12 pb-1 pt-1">
                            <div class="form-group">

                                <input type="text" class="form-control" id="profile_url"
                                    style="opacity:0;position:absolute;">
                                <a href="javascript:void(0);" class="btn btn-outline-success col-12 <?= $class ?>"
                                    onclick="return copycurrenturl();">Copy Profile Link</a>

                            </div>
                        </div>
                        <?php
                        $whatsapp = !empty($profile->m_mobile) ? $profile->m_mobile : $profile->m_phone;
                        ?>
                        <?php if (in_array(intval($session_user_id), CvReviewTeamList())) { ?>
                            <div class="col-md-12 col-xs-12 pb-1 pt-1"><a
                                    href="https://api.whatsapp.com/send/?phone=<?= $whatsapp ?>"
                                    class="btn btn-outline-success col-12" target="_blank">Contact via Whats App</a></div>
                        <?php } ?>
                        <?php if ($session_user_id > 0) { ?>
                            <div class="col-md-12 col-xs-12 p-lg-1 mt-3">
                                <?php $url = urlencode(site_url($page_meta['og_url'])); ?>
                                <div class="text-center">
                                    <a href="http://www.facebook.com/sharer.php?u=<?= $url ?>" class="<?= $class ?>"
                                        target="_blank" title="Facebook Share"><img
                                            src="<?= site_url('nassets/img/social-imgs/fb.png') ?>"
                                            style="height:40px;width: 40px"></a>
                                    <a href="http://www.facebook.com/sharer.php?u=<?= $url ?>" target="_blank"><img src="<?= site_url('nassets/img/social-imgs/insta.png') ?>" style="height:70px;width: 80px"></a>
                                    <a href="http://twitter.com/share?text=<?= $page_meta['title'] ?>&url=<?= $url ?>"
                                        target="_blank"><img src="<?= site_url('nassets/img/social-imgs/tw.png') ?>"
                                            style="height:40px;width: 40px" href></a>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= $url ?>"
                                        target="_blank"><img src="<?= site_url('nassets/img/social-imgs/in.png') ?>"
                                            style="height:40px;width: 40px"></a>
                                    <a href="https://plus.google.com/share?url=<?= $url ?>" target="_blank"><img
                                            src="<?= site_url('nassets/img/social-imgs/gg.png') ?>"
                                            style="height:40px;width: 40px"></a>
                                    <a href="https://www.youtube.com/channel/UCekQrDwBfQ6z6QnwSlbNDqA?sub_confirmation=1"
                                        target="_blank" rel="nofollow" class="text-center">
                                        <img src="<?= site_url('nassets/img/social-imgs/youtube-subscribe.png'); ?>"
                                            class="img-fluid" style="height: 40px;" />
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-md-12 col-xs-12 pb-1 pt-1"><a href="<?= site_url('feed') ?>"
                                class="btn btn-outline-success col-12 <?= $class ?>" target="_blank">See As Received
                                Jobs</a></div>
                        <div class="col-md-12 col-xs-12 pb-1 pt-1"><a href="<?= site_url('jobs') ?>"
                                class="btn btn-outline-success col-12 <?= $class ?>" target="_blank">See Verified
                                Jobs</a></div>

                    </div>

                </div>
            </div>
            <?php // }
            ?>
            <script>
                if ($('.ques').val()) {
                    console.log("Has value");
                } else {
                    $('#submt').hide();
                }
            </script> -->
            <!-- End Action Buttons -->

            <!-- Related Professionals -->
            <?php if (!empty($relatedmembers)): ?>
                <div class="card border-0 shadow-sm profile mb-3 text-left">
                    <div class="card-body p-4">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-semibold text-primary-custom mb-0">
                                <i class="fas fa-user-friends me-2"></i>
                                Related Professionals
                            </h6>
                        </div>

                        <!-- Recommendation List -->
                        <div class="recommendation-list">

                            <?php foreach ($relatedmembers as $index => $list): ?>
                                <div class="mb-3 rec-item <?= $index >= 3 ? 'more-rec' : ''; ?>">
                                    <div class="d-flex align-items-center ">
                                        <!-- Avatar -->
                                        <div>
                                            <img src="<?= site_url('assets/uploads/members/' . $list->m_avatar); ?>"
                                                class="avatarpro"
                                                onerror="this.onerror=null; this.src='<?= base_url('navassets/img/user-avatar.jpg'); ?>';">
                                        </div>

                                        <!-- Name & Profession -->
                                        <!-- <div class="flex-grow-1 ms-2">
                                            <a href="<?= site_url('profile/' . $list->recommend_by); ?>"
                                                class="fw-semibold text-dark text-decoration-none member_name">
                                                <?= htmlspecialchars($list->m_name); ?>
                                            </a>
                                            <div class="text-muted small"><?= htmlspecialchars($list->m_profession); ?></div>
                                        </div> -->

                                        <div class="flex-grow-1 ms-2">

                                            <a href="<?= site_url('profile/' . $list->recommend_by); ?>"
                                                class="fw-semibold text-dark text-decoration-none">
                                                <?= htmlspecialchars($list->m_name); ?>
                                            </a>

                                            <div class="text-muted small mt-1">
                                                <i class="fas fa-briefcase me-1"></i>
                                                <?= $list->m_profession ?>
                                            </div>

                                            <div class="text-muted small">
                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                <?= $list->m_current_city ?>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- <?php if ($index < count($relatedmembers) - 1): ?>
                        <hr class="my-2">
                        <?php endif; ?> -->
                            <?php endforeach; ?>

                            <?php if (count($relatedmembers) > 3): ?>
                                <div class="text-center">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-link toggle-rec">
                                        Show All (<?= count($relatedmembers) - 3 ?> more)
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            <?php endif; ?>



            <!-- <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">
                <div class="card relatedprofiles">
                    <div class="card-header">
                        <b>Related Professionals</b>
                    </div>
                    <div class="card-body">
                        <?php
                        $p = 1;
                        if ($relatedmembers != 'empty' && !empty($relatedmembers)) {
                            foreach ($relatedmembers as $relatedmember) { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3" style="padding-left: 0;">
                                                <div class="profile_img img-fluid"
                                                    style="background-image: url('<?= base_url() ?>assets/uploads/members/<?= ($relatedmember->m_avatar == "") ? "default.png" : $relatedmember->m_avatar ?>');">
                                                    Profile Picture
                                                </div>
                                            </div>
                                            <div class="col-md-9" style="padding-left: 0;">
                                                <div><a class="member_name"
                                                        href="<?= base_url() ?>profile/<?= $relatedmember->m_id ?>"> <strong>
                                                            <?= $relatedmember->m_name ?>
                                                        </strong> </a>
                                                </div>
                                                <div>
                                                    <small><strong>Profession: </strong>
                                                        <?= $relatedmember->m_profession ?>
                                                    </small>
                                                </div>
                                                <div>
                                                    <small><strong>Current City:</strong>
                                                        <?= $relatedmember->m_current_city ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div> -->
            <!-- End Related Professionals -->

        </div>
    </div>
</div>

<div class="modal fade" id="videoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <iframe src="" frameborder="0" height="350" width="100%" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('include/footer'); ?>

<script>
    $(function () {
        // VIDEO PLAY MODAL
        $(".video").click(function () {
            var theModal = $(this).data("target"),
                videoSRC = $(this).attr("data-video"),
                videoSRCauto = videoSRC + "?modelbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
            $(theModal + ' iframe').attr('src', videoSRCauto);
            $(theModal + ' button.close').click(function () {
                $(theModal + ' iframe').attr('src', videoSRC);
            })
        })
    })


    function copycurrenturl() {
        $('#profile_url').val(base_url + 'n/' + <?= $profile_id ?>);
        /* Get the text field */
        var copyText = document.getElementById("profile_url");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        return false;
    }

    document.getElementById("referralLink").addEventListener("click", function () {
        // Get the referral link from the data attribute
        var referralLink = this.getAttribute("data-link");
        // Create a temporary input element
        var tempInput = document.createElement("input");
        // Set its value to the referral link
        tempInput.value = referralLink;
        document.body.appendChild(tempInput);
        // Select and copy the content
        tempInput.select();
        document.execCommand("copy");
        // Remove the temporary input element
        document.body.removeChild(tempInput);
        // Show a "Copied!" message
        var copyMessage = document.getElementById("copyMessage");
        copyMessage.style.display = "inline";
        setTimeout(function () {
            copyMessage.style.display = "none";
        }, 2000);
    });

    document.getElementById("shareIcon").addEventListener("click", async () => {
        const shareData = {
            title: "Check out this profile!",
            text: "Have a look at this awesome profile:",
            url: "<?= site_url('profile/' . $profile->m_id) ?>"
        };

        if (navigator.share) {
            try {
                await navigator.share(shareData);
                console.log("Profile shared successfully!");
            } catch (err) {
                console.log("Error sharing:", err);
            }
        } else {
            // Fallback: copy link to clipboard
            navigator.clipboard.writeText(shareData.url);
            alert("Sharing not supported on this browser. Profile link copied!");
        }
    });
</script>

<!-- Show more/ show less in career summary -->
<script>
    $(document).ready(function () {
        $('#togglePoints').click(function () {
            var morePoints = $('.more-points');
            if (morePoints.is(':visible')) {
                // Hide extra points
                morePoints.slideUp();
                $(this).text('See More');
            } else {
                // Show extra points
                morePoints.slideDown();
                $(this).text('See Less');
            }
        });
    });
</script>

<!-- Show more/ show less in work experience details -->
<script>
    $(document).ready(function () {
        $('.toggle-desc').click(function () {
            var container = $(this).closest('.description-container');
            var moreLines = container.find('.more-lines');

            container.toggleClass('expanded');

            if (container.hasClass('expanded')) {
                moreLines.slideDown(200).css('display', 'flex');
                $(this).text('See Less');
            } else {
                moreLines.slideUp(200);
                $(this).text('See More');
            }
        });
    });
</script>
<!-- <script>
    $(document).ready(function () {
        $('.toggle-desc').click(function () {
            var container = $(this).closest('.description-container');
            var moreLines = container.find('.more-lines');

            if (moreLines.is(':visible')) {
                moreLines.slideUp();
                $(this).text('See More');
            } else {
                moreLines.slideDown();
                $(this).text('See Less');
            }
        });
    });
</script> -->


<!-- Show more/ show less in profile recommedation -->
<script>
    $(document).ready(function () {
        $('.toggle-rec').click(function () {
            var listContainer = $(this).closest('.recommendation-list');
            var hiddenItems = listContainer.find('.more-rec');

            if (hiddenItems.is(':visible')) {
                hiddenItems.hide(); // hide flex items
                $(this).text('Show All (' + hiddenItems.length + ' more)');
            } else {
                hiddenItems.css('display', 'flex'); // force flex when showing
                $(this).text('Show Less');
            }
        });
    });
</script>
<!-- <script>
    $(document).ready(function () {
        $('.toggle-rec').click(function () {
            var container = $(this).closest('.recommendation-container');
            var hiddenItems = container.find('.more-rec');

            if (hiddenItems.is(':visible')) {
                hiddenItems.slideUp();
                $(this).text('Show All');
            } else {
                hiddenItems.slideDown();
                $(this).text('Show Less');
            }
        });
    });
</script> -->

<script>
    function toggleRewards() {
        var el = document.getElementById('rewardDetails');

        if (el.style.display === 'none') {
            el.style.display = 'block';
        } else {
            el.style.display = 'none';
        }
    }
</script>