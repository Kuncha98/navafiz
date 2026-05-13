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
error_reporting(0);
ini_set('display_errors', 0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Jobs in UAE: Jobs in Abu Dhabi, Ajman, Fujairah, Sharjah, Dubai, Ras al-Khaimah, Umm al-Qaiwain</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="author" content="Navafiz">
    <meta name="description"
        content="Navafiz is a Platform Based in UAE to bridge the gap between Job seekers and Job providers, by providing information and Networking. We are working in the UAE since early 2013.">

    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="2070991516541186" />
    <?php if (isset($pg_name) && ($pg_name == 'view-profile')) { ?>
        <meta name="robots" content="noindex, nofollow">
        <meta name="googlebot" content="noindex, nofollow">
    <?php } ?>
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
    <?php } else { ?>
        <meta property="og:url" content="<?= site_url(); ?>" />
        <meta property="og:image" content="<?= base_url('nassets/img/logo.png') ?>" />
        <meta property="og:title" content="Navafiz Job Portal Job " />
        <meta property="og:description"
            content="Navafiz is a Platform Based in UAE to bridge the gap between Job seekers and Job providers, by providing information and Networking. We are working in the UAE since early 2013." />

        <meta name="twitter:card" content="<?= base_url('nassets/img/logo.png') ?>">
        <meta name="twitter:title" content="Navafiz Job Portal Job ">
        <meta name="twitter:description"
            content="Navafiz is a Platform Based in UAE to bridge the gap between Job seekers and Job providers, by providing information and Networking. We are working in the UAE since early 2013.">
        <meta name="twitter:image" content="<?= base_url('nassets/img/logo.png') ?>">
        <!-- https://navafiz.com/nassets/img/logo.png -->
    <?php } ?>
    <link href="<?= site_url('nassets'); ?>/lib/animate/animate.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= site_url('nassets'); ?>/css/bs4.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('nassets'); ?>/css/custom-style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= site_url('nassets'); ?>/css/responsive.css?v14">


    <script src="<?= site_url('nassets'); ?>/js/js.js"></script>
    <script src="<?= site_url('nassets'); ?>/js/cdnjs.js"></script>
    <script src="<?= site_url('nassets'); ?>/js/bs4.js"></script>
    <script src="<?= site_url('nassets'); ?>/lib/wow/wow.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- /FancyBOx -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <!-- /AOS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">-->


    <!-- New styles from navassets 2026 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('navassets/css/core/variables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/utilities.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/navbar.css') ?>">

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('navassets/js/common.js') ?>" defer></script>
    <script src="<?= base_url('navassets/js/website.js') ?>" defer></script>
    <script src="<?= base_url('navassets/js/master-form.js') ?>" defer></script>

    <!-- End new styles from navassets 2026 -->

    <?php $user_id = $this->session->userdata('user_id') == '' ? 0 : $this->session->userdata('user_id'); ?>
    <?php $loggedin_name = $this->session->userdata('name') == '' ? 0 : $this->session->userdata('name'); ?>
    <?php $loggedin_email = $this->session->userdata('email') == '' ? 0 : $this->session->userdata('email'); ?>
    <?php $loggedin_avatar = $this->session->userdata('avatar') == '' ? 0 : $this->session->userdata('avatar'); ?>

    <style type="text/css">
        /*notification*/
        /* ----------------------------------------- Timeline ----------------------------------------- */
        .timeline {
            list-style: none;
            padding-left: 0;
            position: relative;
        }

        .timeline.timeline-sm:after {
            left: 12px;
        }

        .timeline li {
            position: relative;
            /*padding-left: 70px;*/
            margin-bottom: 20px;
        }

        .timeline li .timeline-date {
            display: inline-block;
            width: 100%;
            color: #a6a6a6;
            font-style: italic;
            font-size: 13px;
        }

        .timeline.timeline-advanced li {
            padding-top: 0;
        }

        .timeline.timeline-advanced li:after {
            background: #fff;
            border: 1px solid #29b6d8;
        }

        .timeline.timeline-advanced li:before {
            content: "";
            width: 52px;
            height: 52px;
            border: 10px solid #fff;
            position: absolute;
            left: 4px;
            top: -10px;
            border-radius: 50%;
            z-index: 12;
        }

        .timeline.timeline-advanced li .timeline-icon {
            color: #29b6d8;
        }

        .timeline.timeline-advanced li .timeline-date {
            width: 75px;
            position: absolute;
            right: 5px;
            top: 3px;
            text-align: right;
        }

        .timeline.timeline-advanced li .timeline-title {
            font-size: 17px;
            margin-bottom: 0;
            padding-top: 5px;
            font-weight: bold;
        }

        .timeline.timeline-advanced li .timeline-subtitle {
            display: inline-block;
            width: 100%;
            color: #a6a6a6;
        }

        .timeline.timeline-advanced li .timeline-content {
            margin-top: 10px;
            margin-bottom: 10px;
            padding-right: 70px;
        }

        .timeline.timeline-advanced li .timeline-content p {
            margin-bottom: 3px;
        }

        .timeline.timeline-advanced li .timeline-content .divider-dashed {
            padding-top: 0px;
            margin-bottom: 7px;
            width: 200px;
        }

        .timeline.timeline-advanced li .timeline-user {
            display: inline-block;
            width: 100%;
            margin-bottom: 10px;
        }

        .timeline.timeline-advanced li .timeline-user:before,
        .timeline.timeline-advanced li .timeline-user:after {
            content: " ";
            display: table;
        }

        .timeline.timeline-advanced li .timeline-user:after {
            clear: both;
        }

        .timeline.timeline-advanced li .timeline-user .timeline-avatar {
            border-radius: 50%;
            width: 32px;
            height: 32px;
            float: left;
            margin-right: 10px;
        }

        .timeline.timeline-advanced li .timeline-user .timeline-user-name {
            font-weight: bold;
            margin-bottom: 0;
        }

        .timeline.timeline-advanced li .timeline-user .timeline-user-subtitle {
            color: #a6a6a6;
            margin-top: -4px;
            margin-bottom: 0;
        }

        .timeline.timeline-advanced li .timeline-link {
            margin-left: 5px;
            display: inline-block;
        }

        .timeline-load-more-btn {
            margin-left: 70px;
        }

        .timeline-load-more-btn i {
            margin-right: 5px;
        }

        /* -----------------------------------------
           Dropdown
        ----------------------------------------- */
        .dropdown-menu {
            padding: 0 0 0 0;
            margin: 1rem 0 0;
            right: 15px;
            left: auto;
            min-width: 17rem;
        }


        .notification_dropdown .dropdown-menu {
            padding: 0 0 0 0;
            margin: 3.5rem 0 0;
            right: 15px;
            left: auto;
            min-width: 17rem;
            height: 240px;
            overflow: auto;
        }

        /*.notificationtype_dropdown .dropdown-menu{
            padding:0 0 0 0;
            margin: 1rem 0 0;
            right: 15px;
            left: auto;
            min-width: 17rem;
            height: 240px;
            overflow: auto;
        }*/
        a.dropdown-menu-header {
            background: #f7f9fe;
            font-weight: bold;
            border-bottom: 1px solid #e3e3e3;
        }

        /* .dropdown-menu>li a {
            padding: 0px 89px 10px 89px;
        } */

        /* -----------------------------------------
           Badge
        ----------------------------------------- */

        .badge {
            padding: 3px 5px 2px;
            position: absolute;
            top: 15px;
            right: auto;
            left: 10px;
            display: inline-block;
            min-width: 10px;
            font-size: 12px;
            font-weight: bold;
            color: #ffffff;
            line-height: 1;
            vertical-align: baseline;
            white-space: nowrap;
            text-align: center;
            border-radius: 10px;
        }

        .badge-danger {
            background-color: #db5565;
        }

        .navbar-login {
            width: 305px;
            padding: 10px;
            padding-bottom: 0px;
        }

        .navbar-login-session {
            padding: 10px;
            padding-bottom: 0px;
            padding-top: 0px;
        }

        .icon-size {
            font-size: 87px;
            margin-top: 0;
        }

        .headernav .profile_img {
            border-radius: 50% !important;
            border: 1px solid #215374;
            display: block;
            width: 90px;
            height: 100px;
            background-size: cover;
            margin: 17px auto 20px 2px;
        }

        .headernav li {}

        .headernav li.box {
            width: 80px;
            border: solid 1px #ccc;
            border-radius: 12px;
            padding: 0px 0px 14px 28px;
            margin: 0 8px 8px 0 !important;
        }

        .headernav li.pro {
            width: auto;
            padding: 12px;
            line-height: 50px;
        }

        .headernav li.pro ul li {
            line-height: 25px;
        }

        .mobleftnav {
            background-color: #164885 !important;
            margin: 0 20px 0 -20px;
            padding: 10px;
            border: none;
            border-radius: 6px;
        }

        .mobrightnav {}

        .headernav li.box a i {
            font-size: 20px;
        }

        .headernav a li.box i {
            font-size: 20px;
        }

        @media (max-width: 480px) {
            .mobleftnav {
                margin: 0 20px 0 -16px;
            }

            .navbar-brand img {
                max-width: 250px;
            }

            .mobrightnav {

                background-color: #red !important;
            }

            .headcontainer {
                margin: 0;
                padding: 0;
            }

            .headernav {
                width: 100%;
            }

            .headernav .profile_img {
                border-radius: 12px !important;
            }

            .headernav li.box {
                width: 100%;
                padding: 0;
            }

            .headernav li.box a i {
                margin: 0 !important;
            }

            .headernav li.box a span {
                display: inline-block !important;
                margin: 0px 0 0 15px;
            }

            .headernav li.box a {
                color: #215374;
                display: block;
                width: 100%;
                font-weight: bold;
                padding: 10px;
            }
        }
    </style>
    <script>
        var base_url = "<?php echo base_url(); ?>";
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PLWY694W29"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-PLWY694W29');
    </script>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('uploadResumeForm');
            const modal = new bootstrap.Modal(document.getElementById('uploadResumeModal'));
            const msgBox = document.getElementById('uploadResumeMsg');

            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent normal submission
                msgBox.innerHTML = ''; // Clear previous messages

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            msgBox.innerHTML = `<div class="alert alert-success">${data.message}</div>`;

                            // Close modal after 2 seconds
                            setTimeout(() => {
                                modal.hide();
                                form.reset();
                                document.getElementById('cvPreview').innerHTML = ''; // Clear file preview
                                document.getElementById('cvInitialState').style.display = 'block';
                                msgBox.innerHTML = ''
                            }, 2000);

                        } else if (data.status === 'error') {
                            msgBox.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        msgBox.innerHTML = `<div class="alert alert-danger">Something went wrong. Try again.</div>`;
                    });
            });
        });
    </script> -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const form = document.getElementById('uploadResumeForm');
            const modal = new bootstrap.Modal(document.getElementById('uploadResumeModal'));
            const msgBox = document.getElementById('uploadResumeMsg');
            const submitBtn = document.getElementById('resumeSubmitBtn');

            form.addEventListener('submit', async function (e) {

                e.preventDefault();

                // Prevent multiple clicks
                if (submitBtn.disabled) {
                    return;
                }

                msgBox.innerHTML = '';

                // Disable button
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Uploading...';

                // Get email field value
                const email = form.querySelector('[name="email"]').value;

                try {

                    // STEP 1: Check email exists
                    const emailCheckResponse = await fetch("<?= base_url('upload_resume/check_email_exists'); ?>", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            email: email
                        })
                    });

                    const emailCheckData = await emailCheckResponse.json();

                    // If email already exists
                    if (emailCheckData.exists) {
                        msgBox.innerHTML = `
                    <div class="alert alert-danger">
                        ${emailCheckData.message}
                    </div>
                `;
                        // Enable button again
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Upload';
                        return;
                    }

                    // STEP 2: Submit form if email does not exist
                    const formData = new FormData(form);

                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                    });

                    const data = await response.json();

                    if (data.status === 'success') {

                        msgBox.innerHTML = `
                    <div class="alert alert-success">
                        ${data.message}
                    </div>
                `;

                        setTimeout(() => {
                            modal.hide();
                            form.reset();

                            document.getElementById('cvPreview').innerHTML = '';
                            document.getElementById('cvInitialState').style.display = 'block';

                            msgBox.innerHTML = '';

                            // Enable button again
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = 'Upload';
                        }, 2000);

                    } else {

                        msgBox.innerHTML = `
                    <div class="alert alert-danger">
                        ${data.message}
                    </div>
                `;

                        // Enable button again
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Upload';
                    }

                } catch (err) {

                    console.error(err);

                    msgBox.innerHTML = `
                <div class="alert alert-danger">
                    Something went wrong. Try again.
                </div>
            `;

                    // Enable button again
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Upload';
                }

            });

        });
    </script>

</head>

<body class="bg_gradient">

    <?php $this->load->view('./layouts/navbar'); ?>

    <div class="container-mid headcontainer">

        <div style="margin-bottom: 40px;">
            <?php if ($session_user_id > 0) { ?>
                <?php $user_profile = BasicInfoUser($session_user_id); ?>
                <?php if (empty($user_profile->username)) { ?>
                    <!-- <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                <li>You've not Setup your Username, Setup your username its really important for your profile branding! <a href="<?= site_url('profile/username'); ?>">Click here to setup</a></li>
            </ul>
        </div> -->
                <?php } ?>
                <?php if (empty($user_profile->member_cv)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            <li>You have not Uploaded your Resume <a href="<?= site_url('profile/AddCV'); ?>">Click here to
                                    upload</a></li>
                        </ul>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

    </div>


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
                                <input type="text" class="form-control required-field" id="profession"
                                    name="profession">
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
                                        class="form-control d-none required-field" data-file-upload
                                        data-preview="cvPreview" data-initial="cvInitialState" data-max-size="5">

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