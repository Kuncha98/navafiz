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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navafiz </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/frontend/css/select2.min.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" type="text/css" href="<?= site_url('nassets'); ?>/css/custom-style.css?v=<?= time(); ?>"> -->

    <link rel="stylesheet" href="<?= base_url('navassets/css/core/variables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/components.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/utilities.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/home.css') ?>">

    <?php $user_id = $this->session->userdata('user_id') == '' ? 0 : $this->session->userdata('user_id'); ?>
    <?php $loggedin_name = $this->session->userdata('name') == '' ? 0 : $this->session->userdata('name'); ?>
    <?php $loggedin_email = $this->session->userdata('email') == '' ? 0 : $this->session->userdata('email'); ?>
    <?php $loggedin_avatar = $this->session->userdata('avatar') == '' ? 0 : $this->session->userdata('avatar'); ?>

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Navbar -->
    <?php $this->load->view('layouts/navbar'); ?>

    <!-- Main content -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if (isset($content))
        $this->load->view($content); ?>

    <!-- Footer -->
    <?php $this->load->view('layouts/website/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?= base_url() ?>assets/frontend/js/select2.min.js"></script>
    <script src="<?= base_url('navassets/js/common.js') ?>"></script>
    <script src="<?= base_url('navassets/js/website.js') ?>"></script>
    <script src="<?= base_url('navassets/js/master-form.js') ?>"></script>

    <script>
        document.querySelector('.contact-card form').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('<?= base_url("send-contact") ?>', {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: data.message
                        });
                        this.reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: Object.values(data.errors || { error: data.message }).join('\n')
                        });
                    }
                })
                .catch(err => console.error(err));
        });
    </script>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'professionals/professionalsajaxnew', // Your controller method
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data.members); // Check data in console

                    var featuredCandidatesContainer = $('#featured-candidates-card');
                    featuredCandidatesContainer.empty(); // Clear previous content

                    // var currentRow = $('<div class="row g-4"></div>'); // New row

                    $.each(data.members, function (index, memberWrapper) {
                        if (memberWrapper.profile && memberWrapper.profile.length !== 0) {
                            var member = memberWrapper.profile;

                            // Avatar URL
                            var avatarUrl = `<?= site_url() ?>assets/uploads/members/${member.m_avatar}`;

                            // Skills split into badges (limit to first 3)
                            var skills = member.m_skills ? member.m_skills.split(',').slice(0, 3) : [];

                            // Build skill badges HTML
                            var skillsHtml = '';
                            skills.forEach(function (skill) {
                                skillsHtml += `<span class="badge skill-badge border me-1 me-2 mb-2">${skill}</span>`;
                            });

                            // Candidate card HTML
                            var candidateCard = $(`
                        <div class="col-lg-4 col-md-6">
                            <div class="card candidate-card position-relative">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar-wrapper me-3">
                                          <img src="${avatarUrl}" class="candidate-avatar" alt="${member.m_name}" onerror="this.onerror=null; this.src='navassets/img/user-avatar.jpg';">
                                        </div>
                                        <h6>${member.m_name || 'Name not available'}</h6>
                                    </div>
                                    <small class="text-muted">${member.m_profession || 'Profession not available'}</small>

                                    <ul class="list-unstyled small my-3">
                                        <li class="mb-1"><strong>Location:</strong> ${member.m_current_city || 'Location not available'}</li>
                                        <li><strong>Experience:</strong> ${member.uae_experience || 'Experience not available'}</li>
                                    </ul>

                                    <div>${skillsHtml}</div>
                                </div>
                                <!-- Hover Button -->
                                <div class="card-hover-action">
                                    <a href="n/${member.m_id}" class="btn btn-primary w-100">View Profile</a>
                                </div>
                            </div>
                        </div>
                    `);

                            featuredCandidatesContainer.append(candidateCard);

                        }

                    });


                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>

    <!-- Fetch skills from csv to forms -->
    <!-- <script>
        $(document).ready(function () {

            const select = $('#skills');

            // 🔹 Initialize Select2
            select.select2({
                placeholder: "Enter or select your skills",
                tags: true,
                tokenSeparators: [','],
                width: '100%'
            });

            // 🔹 Load skills from CSV file
            fetch("<?= base_url('assets/skills.csv') ?>")
                .then(response => response.text())
                .then(csvText => {
                    // Split CSV lines, remove header, trim whitespace
                    let lines = csvText.split(/\r?\n/).map(line => line.trim()).filter(Boolean);
                    if (lines[0].toLowerCase() === 'skills') lines.shift();

                    // Remove duplicates
                    const skills = [...new Set(lines)];

                    // Add each as Select2 option
                    skills.forEach(skill => {
                        const newOption = new Option(skill, skill, false, false);
                        select.append(newOption);
                    });

                    // Refresh Select2 after adding all skills
                    select.trigger('change');
                })
                .catch(err => console.error('Error loading CSV:', err));

            // 🔹 Enforce word/character limits for new entries
            select.on('select2:selecting', function (e) {
                const text = e.params.args.data.text.trim();
                const wordCount = text.split(/\s+/).length;
                const charCount = text.length;

                if (wordCount > 7) {
                    alert("❌ Please limit skill names to 7 words maximum.");
                    e.preventDefault();
                    return false;
                }
                if (charCount > 40) {
                    alert("❌ Please limit skill names to 40 characters maximum.");
                    e.preventDefault();
                    return false;
                }
            });

            // 🔹 Prevent duplicate skills being added manually
            select.on('select2:select', function (e) {
                const added = e.params.data.text.trim().toLowerCase();
                const allOptions = select.find('option').map(function () {
                    return $(this).val().trim().toLowerCase();
                }).get();

                // If duplicate found (other than this one), remove it
                const count = allOptions.filter(v => v === added).length;
                if (count > 1) {
                    alert("⚠️ That skill is already in your list.");
                    select.find(`option[value='${e.params.data.id}']`).remove();
                    select.trigger('change');
                }
            });

        });
    </script> -->
    <script>
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
    </script>

    <script>
        $(document).on("click", ".add-to-cart", function () {

            let id = $(this).data("id");

            var $button = $(this);
            // var serviceId = $button.data('service-id');

            // Get service name for notification
            var serviceName = $button.closest('.service-list-item').find('h6').first().text();

            $.ajax({
                url: '<?= base_url("cart/add") ?>',
                type: 'POST',
                data: { service_id: id },
                dataType: 'json',
                success: function (res) {
                    if (res && res.status === 'success') {
                        // Show notification above accordion
                        var notificationHtml = '“' + serviceName + '” has been added to your cart. ' +
                            '<a class="btn btn-primary cart-btn ms-2" href="<?= base_url("cart") ?>">' +
                            'View Cart <i class="fas fa-shopping-cart ms-1"></i></a>';

                        $('#cart-notification').html(notificationHtml).fadeIn();
                        setTimeout(function () { $('#cart-notification').fadeOut(); }, 3000);

                        // Update navbar cart count
                        if (res.cart) {
                            $('#cart-count').text(Object.keys(res.cart).length);
                        }

                    } else {
                        console.error('Unexpected response:', res);
                        alert('Error adding to cart.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', status, error);
                    alert('Something went wrong.');
                }
            });
        });
    </script>


    <script>
        function initStatusHandler(config) {

            let selectedStatus = null;
            let selectedForm = null;
            let isConfirmed = false;

            const selector = config.selector || '.status-select';
            const url = config.url;

            // Store previous values
            $(selector).each(function () {
                $(this).data('previous', $(this).val());
            });

            // CHANGE EVENT
            $(document).on('change', selector, function () {

                selectedForm = $(this).closest('form');
                selectedStatus = $(this).val();

                let message = "";

                if (selectedStatus == 2) {
                    message = config.messages?.approve || "Are you sure to approve?";
                } else if (selectedStatus == 3) {
                    message = config.messages?.reject || "Are you sure to reject?";
                } else {
                    message = config.messages?.submit || "Change status?";
                }

                $('#confirmMessage').text(message);
                $('#confirmStatusModal').modal('show');
            });

            // CONFIRM CLICK
            $('#confirmStatusBtn').off('click').on('click', function () {

                isConfirmed = true;

                let id = selectedForm.data('id');
                let select = selectedForm.find(selector);

                $('#confirmStatusModal').modal('hide');

                select.prop('disabled', true).css('opacity', '0.6');

                let previousStatus = select.data('previous');

                $.ajax({
                    url: url + '/' + id,
                    type: "POST",
                    data: { status: selectedStatus },
                    dataType: "json",

                    success: function (res) {

                        showAlert(res.message, res.email_failed ? 'warning' : (res.success ? 'success' : 'danger'));

                        if (!res.success) {
                            revertSelect(select, previousStatus);
                            return;
                        }

                        // ✅ Update UI instantly
                        updateSelectUI(select, selectedStatus);
                        select.data('previous', selectedStatus);

                        // APPROVE FLOW
                        if (selectedStatus == 2 && res.data && config.onApprove) {
                            config.onApprove(res);
                            return;
                        }

                        // Optional reload
                        if (config.autoReload) {
                            setTimeout(() => location.reload(), 2000);
                        }
                    },

                    error: function (xhr) {
                        let message = parseError(xhr);
                        showAlert(message, 'danger');
                        revertSelect(select, previousStatus);
                    }
                });
            });

            // MODAL CLOSE (cancel case)
            $('#confirmStatusModal').on('hidden.bs.modal', function () {

                if (!isConfirmed && selectedForm) {
                    let select = selectedForm.find(selector);
                    let previousStatus = select.data('previous');
                    updateSelectUI(select, previousStatus);
                }

                isConfirmed = false;
            });


            // HELPERS
            function updateSelectUI(select, status) {
                select.val(status);
                select.prop('disabled', false).css('opacity', '1');

                select.removeClass('status-submitted status-approved status-rejected');

                if (status == 2) select.addClass('status-approved');
                else if (status == 3) select.addClass('status-rejected');
                else select.addClass('status-submitted');
            }

            function revertSelect(select, previousStatus) {
                updateSelectUI(select, previousStatus);
            }

            function parseError(xhr) {
                try {
                    let res = JSON.parse(xhr.responseText);
                    return res.message || 'Something went wrong';
                } catch {
                    return xhr.responseText || 'Server error';
                }
            }

            function showAlert(message, type = 'success') {
                let alertBox = $('#statusAlert');

                alertBox
                    .removeClass('d-none alert-success alert-danger alert-warning')
                    .addClass('alert-' + type)
                    .text(message)
                    .fadeIn();

                // setTimeout(() => alertBox.fadeOut(), 5000);
            }
        }
    </script>


    <!-- <script>
        let selectedStatus = null;
        let selectedForm = null;
        let isConfirmed = false;

        $('.job-seeker-status-select').each(function () {
            $(this).data('previous', $(this).val());
        });

        $(document).on('change', '.job-seeker-status-select', function () {

            selectedForm = $(this).closest('.job-seeker-status-form');
            selectedStatus = $(this).val();

            let message = "";

            if (selectedStatus == 2) {
                message = "Are you sure? This will APPROVE the profile and CREATE a user account.";
            } else if (selectedStatus == 3) {
                message = "Are you sure you want to REJECT this request?";
            } else {
                message = "Change status to Submitted?";
            }

            $('#confirmMessage').text(message);
            $('#confirmStatusModal').modal('show');

        });


        // CONFIRM BUTTON CLICK
        $('#confirmStatusBtn').on('click', function () {
            isConfirmed = true;

            let id = selectedForm.data('id');

            $('#confirmStatusModal').modal('hide');

            // Disable select during processing
            let select = selectedForm.find('.job-seeker-status-select');
            select.prop('disabled', true).css('opacity', '0.6');

            let previousStatus = select.data('previous') || select.val();

            $.ajax({
                url: "<?= site_url('job_seeker_requests/change_request_status'); ?>/" + id,
                type: "POST",
                data: { status: selectedStatus },
                dataType: "json",

                success: function (res) {

                    if (res.email_failed) {
                        showAlert(res.message, 'warning');
                    } else {
                        showAlert(res.message, res.success ? 'success' : 'danger');
                    }

                    if (!res.success) {
                        select.val(previousStatus);

                        select.removeClass('status-submitted status-approved status-rejected');

                        if (previousStatus == 2) {
                            select.addClass('status-approved');
                        } else if (previousStatus == 3) {
                            select.addClass('status-rejected');
                        } else {
                            select.addClass('status-submitted');
                        }

                        select.prop('disabled', false).css('opacity', '1');
                        return;
                    }

                    select.val(selectedStatus);

                    select.data('previous', selectedStatus);

                    select.removeClass('status-submitted status-approved status-rejected');

                    if (selectedStatus == 2) {
                        select.addClass('status-approved');
                    } else if (selectedStatus == 3) {
                        select.addClass('status-rejected');
                    } else {
                        select.addClass('status-submitted');
                    }

                    // APPROVED → show modal + reload
                    if (selectedStatus == 2 && res.data) {

                        $('#m_name').text(res.data.name);
                        $('#m_email').text(res.data.email);
                        $('#m_phone').text(res.data.phone);
                        $('#m_status').text(res.data.status_text);
                        $('#m_password').text(res.data.password);

                        let message =
                            `Your Registration Credentials

                            Hello ${res.data.name},

                            Your registration has been approved. Here are your login credentials:

                            Email: ${res.data.email}
                            Password: ${res.data.password}

                            Login: www.navafiz.com

                            You can change your password later.

                            Thank you`;

                        $('#credential_message').text(message);

                        let encoded = encodeURIComponent(message);
                        let phone = res.data.phone.replace(/[^0-9]/g, '');

                        $('#whatsapp_btn').attr(
                            'href',
                            `https://api.whatsapp.com/send?phone=${phone}&text=${encoded}`
                        );

                        $('#statusModal').modal('show');

                        return;
                    }

                    // Reload after short delay (better UX)
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },

                error: function (xhr) {

                    let message = 'Something went wrong. Please try again.';

                    try {
                        // Try to parse JSON response
                        let res = JSON.parse(xhr.responseText);

                        if (res.message) {
                            message = res.message;
                        }
                    } catch (e) {
                        // If not JSON, fallback to raw response (useful for debugging)
                        if (xhr.responseText) {
                            message = xhr.responseText;
                        }
                    }

                    showAlert(message, 'danger');

                    select.prop('disabled', false).css('opacity', '1');

                    select.val(previousStatus);

                    select.removeClass('status-submitted status-approved status-rejected');

                    if (previousStatus == 2) {
                        select.addClass('status-approved');
                    } else if (previousStatus == 3) {
                        select.addClass('status-rejected');
                    } else {
                        select.addClass('status-submitted');
                    }

                    // Reload after short delay (better UX)
                    setTimeout(() => {
                        location.reload();
                    }, 5000);
                }
            });
        });

        $(document).ready(function () {

            $('#statusModal').on('hidden.bs.modal', function () {
                location.reload();
            });

        });


        // ALERT HELPER FUNCTION
        function showAlert(message, type = 'success') {

            let alertBox = $('#statusAlert');

            alertBox
                .removeClass('d-none alert-success alert-danger alert-warning')
                .addClass('alert-' + type)
                .text(message)
                .fadeIn();

            setTimeout(() => {
                alertBox.fadeOut();
            }, 5000);
        }

        $('#confirmStatusModal').on('hidden.bs.modal', function () {

            if (!isConfirmed && selectedForm) {

                let select = selectedForm.find('.job-seeker-status-select');
                let previousStatus = select.data('previous');

                select.val(previousStatus);

                select.removeClass('status-submitted status-approved status-rejected');

                if (previousStatus == 2) {
                    select.addClass('status-approved');
                } else if (previousStatus == 3) {
                    select.addClass('status-rejected');
                } else {
                    select.addClass('status-submitted');
                }
            }

            isConfirmed = false; // reset
        });

    </script> -->

    <!-- 
    <script>
        function showToast(message) {
            $('#liveToast .toast-body').text(message);
            let toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.show();
        }

        // $(document).on('change', '.job-seeker-status-select', function () {
        //     let form = $(this).closest('.job-seeker-status-form');
        //     let id = form.data('id');
        //     let status = $(this).val();

        //     $.ajax({
        //         url: "<?= site_url('job_seeker_requests/change_request_status'); ?>/" + id,
        //         type: "POST",
        //         data: { status: status },
        //         dataType: "json",
        //         success: function (res) {

        //             if (!res.success) {
        //                 alert(res.message);
        //                 return;
        //             }

        //             // 👉 If REJECTED → reload page
        //             if (status == 3) {
        //                 location.reload();

        //                 // Show alert
        //                 $('#statusAlert')
        //                     .removeClass('d-none')
        //                     .addClass('alert-danger')
        //                     .text(res.message)
        //                     .fadeIn();

        //                 // Auto hide after 5 sec
        //                 setTimeout(() => {
        //                     $('#statusAlert').fadeOut();
        //                 }, 5000);

        //                 return;
        //             }

        //             // 👉 If APPROVED → show alert + modal
        //             if (status == 2) {

        //                 // Fill modal
        //                 $('#m_name').text(res.data.name);
        //                 $('#m_email').text(res.data.email);
        //                 $('#m_phone').text(res.data.phone);
        //                 $('#m_status').text(res.data.status_text);
        //                 $('#m_password').text(res.data.password);

        //                 let name = res.data.name;
        //                 let email = res.data.email;
        //                 let phone = res.data.phone;
        //                 let password = res.data.password;

        //                 // ✅ Create message
        //                 let message =
        //                     `Your Registration Credentials
        //                     Hello ${name},
        //                     Your registration has been approved. Here are your login credentials:
        //                         Email: ${email}
        //                         Password: ${password}
        //                     You can change your password later from your profile page.
        //                     Thank you`;

        //                 // Show message in modal
        //                 $('#credential_message').text(message);

        //                 // ✅ Encode for WhatsApp
        //                 let encodedMessage = encodeURIComponent(message);

        //                 // Clean phone (remove spaces, +, etc if needed)
        //                 let whatsappNumber = phone.replace(/[^0-9]/g, '');

        //                 let whatsappURL = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=${encodedMessage}`;

        //                 // Set button link
        //                 $('#whatsapp_btn').attr('href', whatsappURL);

        //                 // Show modal
        //                 $('#statusModal').modal('show');

        //                 showToast('Profile approved & WhatsApp ready!');
        //             }

        //             // 👉 Optional: for Submit (1) → reload
        //             if (status == 1) {
        //                 location.reload();
        //             }
        //         }
        //     });
        // });


        $(document).on('change', '.manpower-supplier-status-select', function () {
            let form = $(this).closest('.manpower-supplier-status-form');
            let id = form.data('id');
            let status = $(this).val();

            $.ajax({
                url: "<?= site_url('manpower_supply_requests/change_request_status'); ?>/" + id,
                type: "POST",
                data: { status: status },
                dataType: "json",
                success: function (res) {

                    if (!res.success) {
                        alert(res.message);
                        return;
                    }

                    // 👉 If REJECTED → reload page
                    if (status == 3) {
                        location.reload();

                        // Show alert
                        $('#statusAlert')
                            .removeClass('d-none')
                            .addClass('alert-danger')
                            .text(res.message)
                            .fadeIn();

                        // Auto hide after 5 sec
                        setTimeout(() => {
                            $('#statusAlert').fadeOut();
                        }, 5000);

                        return;
                    }

                    // 👉 If APPROVED → show alert + modal
                    if (status == 2) {

                        // Fill modal
                        $('#m_name').text(res.data.name);
                        $('#m_email').text(res.data.email);
                        $('#m_phone').text(res.data.phone);
                        $('#m_status').text(res.data.status_text);
                        $('#m_password').text(res.data.password);

                        let name = res.data.name;
                        let email = res.data.email;
                        let phone = res.data.phone;
                        let password = res.data.password;

                        // ✅ Create message
                        let message =
                            "Hello Aakif Humaid,\n\n" +

                            "*Your Registration Credentials*\n\n" +

                            "Your registration has been approved. Here are your login details:\n\n" +

                            "*Email:* aakif.overseas@crspvtltd.com\n" +
                            "*Password:* Mdb6druR\n\n" +

                            "*Login Here:*\n" +
                            "https://www.navafiz.com\n\n" +

                            "You can change your password later from your profile page.\n\n" +

                            "Thank you";

                        // `Your Registration Credentials
                        // Hello ${name},
                        // Your registration has been approved. Here are your login credentials:
                        //     Email: ${email}
                        //     Password: ${password}
                        // You can change your password later from your profile page.
                        // Thank you`;

                        // Show message in modal
                        $('#credential_message').text(message);

                        // ✅ Encode for WhatsApp
                        let encodedMessage = encodeURIComponent(message);

                        // Clean phone (remove spaces, +, etc if needed)
                        let whatsappNumber = phone.replace(/[^0-9]/g, '');

                        let whatsappURL = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=${encodedMessage}`;

                        // Set button link
                        $('#whatsapp_btn').attr('href', whatsappURL);

                        // Show modal
                        $('#statusModal').modal('show');

                        showToast('Profile approved & WhatsApp ready!');
                    }

                    // 👉 Optional: for Submit (1) → reload
                    if (status == 1) {
                        location.reload();
                    }
                }
            });
        });

        // ✅ Copy message
        $(document).on('click', '#copy_btn', function () {
            let text = $('#credential_message').text();

            navigator.clipboard.writeText(text).then(function () {
                showToast('Message copied to clipboard!');
            });
        });


        // ✅ WhatsApp button click toast
        $(document).on('click', '#whatsapp_btn', function () {
            showToast('Opening WhatsApp...');
        });
    </script> -->

</body>

</html>