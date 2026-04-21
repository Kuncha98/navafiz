<?php $this->load->view('include/header');
$session_user_id = $this->session->userdata('user_id');

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






    .upload-box {
        border: 2px dashed #16488540;
        border-radius: 12px;
        transition: 0.3s ease;
        background: #fff;
        cursor: pointer;
    }

    .upload-box:hover {
        border-color: #164885;
        background: #f1f6fb;
    }

    .upload-ui {
        padding: 30px;
        text-align: center;
    }

    .upload-ui i {
        font-size: 36px;
    }

    .upload-ui p {
        font-size: 1rem;
    }

    .upload-ui small {
        font-size: 0.85rem;
    }

















    .feed-item {
        background: #f9fafb;
        border: 1px solid #eee;
        transition: 0.2s ease;
    }

    .feed-item:hover {
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    }

    .bg-primary-soft {
        background: rgba(13, 110, 253, 0.1);
    }

    .bg-success-soft {
        background: rgba(25, 135, 84, 0.1);
    }

    .feed-content {
        font-size: 14px;
        color: #333;
        line-height: 1.5;
        text-align: left;
    }

    .see-more {
        display: inline-block;
        margin-left: 5px;
        cursor: pointer;
    }

















    /* Modal container */
    .modern-modal {
        border-radius: 16px;
        padding: 10px;
    }

    /* Icon circle */
    .icon-box {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    /* Typography tweaks */
    .modal-title {
        font-size: 1.1rem;
        letter-spacing: 0.2px;
    }

    .modal-body p {
        font-size: 0.95rem;
        line-height: 1.5;
    }

    /* Buttons */
    .modern-btn {
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .modern-btn:hover {
        transform: translateY(-1px);
        /* box-shadow: 0 6px 14px rgba(13, 110, 253, 0.25); */
    }

    /* Cancel button */
    .btn-light {
        border-radius: 10px;
        background: #f8f9fa;
        border: 1px solid #e5e7eb;
    }

    .btn-light:hover {
        background: #f1f3f5;
    }

    /* Modal base */
    .modern-modal {
        border-radius: 16px;
        padding: 10px;
    }

    /* Status badge */
    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        font-size: 12px;
        border-radius: 5px;
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
        font-weight: 500;
    }

    /* Info group */
    .info-group {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    /* Each row */
    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 12px;
        background: #f9fafb;
        border-radius: 10px;
    }

    /* Labels */
    .label {
        font-size: 0.85rem;
        color: #6c757d;
    }

    /* Values */
    .value {
        font-size: 0.9rem;
        font-weight: 500;
        color: #212529;
    }

    /* Credential message */
    .credential-box {
        background: #f1f3f5;
        padding: 12px;
        border-radius: 10px;
        font-size: 0.9rem;
        white-space: pre-line;
    }

    /* Buttons */
    .modern-btn {
        border-radius: 10px;
        padding: 6px 14px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .modern-btn:hover {
        transform: translateY(-1px);
    }

    /* Light button */
    .btn-light {
        border: 1px solid #e5e7eb;
        background: #fff;
    }

    .btn-light:hover {
        background: #f8f9fa;
    }
</style>

<div class="container-mid">
    <div class="row">

        <!-- LEFT COLUMN -->
        <div class="col-md-3">

            <!-- Company Card -->
            <div class="card profile border-0 shadow-sm">
                <div class="card-body text-center p-4">

                    <!-- Avatar -->
                    <div class="profile_img mx-auto mb-3"
                        style="background-image: url('<?= base_url() ?>assets/uploads/members/<?= ($company->logo == "") ? "default.png" : $company->logo ?>');">
                    </div>

                    <!-- Name + Role -->
                    <h5 class="fw-semibold mb-1 text-primary-custom">
                        <?= $company->company_name ?>
                    </h5>

                    <span
                        class="badge rounded-pill bg-primary-custom-subtle text-primary-custom mb-2 position-static px-3 py-2">
                        <?= $company->company_type ?>
                    </span>

                    <!-- Profession + City -->
                    <div class="text-muted small mb-3">
                        <?= $company->city ?>,
                        <?= $company->country_of_operation ?>
                    </div>

                    <hr>

                    <!-- Last Seen -->
                    <div class="text-muted small">
                        Established: <strong>
                            <?= $company->year_established ?>
                        </strong>
                    </div>

                </div>
            </div>


            <!-- Contact Card -->
            <div class="card border-0 shadow-sm profile">
                <div class="card-body p-4 text-left">

                    <h6 class="fw-semibold text-primary-custom mb-3">Contact Details</h6>

                    <div class="profile-info ">

                        <div class="info-row">
                            <i class="fas fa-user"></i>
                            <div>
                                <span>Contact Person</span>
                                <strong>
                                    <?= $company->contact_person_name ?>
                                </strong>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-id-badge"></i>
                            <div>
                                <span>Designation</span>
                                <strong>
                                    <?= $company->designation ?>
                                </strong>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-phone"></i>
                            <div>
                                <span>Mobile</span>
                                <strong>
                                    <?= $company->mobile_number ?>
                                </strong>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <span>Email</span>
                                <strong>
                                    <?= $company->email ?>
                                </strong>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <span>Address</span>
                                <strong>
                                    <?= $company->office_address ?>
                                </strong>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!-- CENTER COLUMN -->
        <div class="col-md-6">

            <!-- Company Details -->
            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4 text-left">

                    <h6 class="fw-semibold text-primary-custom mb-3">
                        <i class="fas fa-info-circle me-2"></i>Company Details
                    </h6>

                    <div class="row">

                        <div class="col-12 col-sm-6 info-row mb-3">
                            <i class="fas fa-id-card"></i>
                            <div>
                                <span>Registration No</span>
                                <strong>
                                    <?= $company->company_registration_number ?>
                                </strong>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 info-row mb-3">
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <span>Tax No</span>
                                <strong>
                                    <?= $company->tax_registration_number ?? "---" ?>
                                </strong>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 info-row mb-3">
                            <i class="fas fa-certificate"></i>
                            <div>
                                <span>License No</span>
                                <strong>
                                    <?= $company->recruitment_license_number ?>
                                </strong>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 info-row mb-3">
                            <i class="fas fa-university"></i>
                            <div>
                                <span>Issuing Authority</span>
                                <strong>
                                    <?= $company->license_issuing_authority ?>
                                </strong>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 info-row mb-3">
                            <i class="fas fa-calendar"></i>
                            <div>
                                <span>License Expiry</span>
                                <strong>
                                    <?= $company->license_expiry_date ?>
                                </strong>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Operations -->
            <?php
            function csv_badges($csv, $class = 'bg-primary-soft text-primary-custom')
            {
                if (empty($csv))
                    return '-';

                $items = explode(',', $csv);
                $html = '';

                foreach ($items as $item) {
                    $html .= '<span class="badge ' . $class . ' me-1 mb-1 position-static px-3 py-2 text-white">'
                        . htmlspecialchars(ucwords(str_replace('_', ' ', trim($item))))
                        . '</span>';
                }

                return $html;
            }
            ?>
            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4 text-left">

                    <h6 class="fw-semibold text-primary-custom mb-3">
                        <i class="fas fa-globe me-2"></i>Operations
                    </h6>

                    <div class="profile-info">

                        <div class="info-row">
                            <i class="fas fa-plane-departure"></i>
                            <div>
                                <span class="mb-2">Supply Countries</span>

                                <div class="d-flex flex-wrap">
                                    <?= csv_badges($company->supply_countries, 'bg-success') ?>
                                </div>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-plane-arrival"></i>
                            <div>
                                <span class="mb-2">Source Countries</span>
                                <div class="d-flex flex-wrap">
                                    <?= csv_badges($company->source_countries, 'bg-info') ?>
                                </div>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-users"></i>
                            <div>
                                <span class="mb-2">Manpower Categories</span>
                                <div class="d-flex flex-wrap">
                                    <?= csv_badges($company->manpower_categories, 'bg-warning') ?>
                                </div>
                            </div>
                        </div>

                        <div class="info-row">
                            <i class="fas fa-industry"></i>
                            <div>
                                <span class="mb-2">Industries Served</span>
                                <div class="d-flex flex-wrap">
                                    <?= csv_badges($company->industries_served, 'bg-primary') ?>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-3">

            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-3 text-start">
                    <?php if ($session_user_id > 0): ?>
                        <!-- WhatsApp -->
                        <a href="<?= site_url('social-media'); ?>" class="action-item">
                            <div>
                                <i class="fab fa-whatsapp me-2 text-success"></i>
                                Join WhatsApp Groups
                            </div>
                        </a>

                    <?php endif; ?>

                    <?php if ($role_id == 10): ?>
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

            <!-- Testing Center -->
            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4 text-left">

                    <h6 class="fw-semibold text-primary-custom mb-3">
                        <i class="fas fa-vials me-2"></i>Trade Testing Center
                    </h6>

                    <?php if ($company->trade_testing_center == 1): ?>

                        <div class="text-success mb-2">Available</div>

                        <div class="text-muted small">
                            <?= $company->testing_categories_available ?>
                        </div>

                    <?php else: ?>
                        <div class="text-muted small">Not Available</div>
                    <?php endif; ?>

                </div>
            </div>

            <!-- Online Presence -->
            <div class="card border-0 shadow-sm profile mb-3">
                <div class="card-body p-4 text-left">

                    <h6 class="fw-semibold text-primary-custom mb-3">
                        <i class="fas fa-link me-2"></i>Online Presence
                    </h6>

                    <div class="profile-list">

                        <?php if (!empty($company->company_website)) { ?>
                            <a href="<?= $company->company_website ?>" target="_blank" class="action-item">
                                <i class="fas fa-globe me-2"></i> Website
                            </a>
                        <?php } ?>

                        <?php if (!empty($company->linkedin_page)) { ?>
                            <a href="<?= $company->linkedin_page ?>" target="_blank" class="action-item">
                                <i class="fab fa-linkedin me-2"></i> LinkedIn
                            </a>
                        <?php } ?>

                        <?php if (!empty($company->facebook_page)) { ?>
                            <a href="<?= $company->facebook_page ?>" target="_blank" class="action-item">
                                <i class="fab fa-facebook me-2"></i> Facebook
                            </a>
                        <?php } ?>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<?php $this->load->view('include/footer'); ?>