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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        function showToast(message) {
            $('#liveToast .toast-body').text(message);
            let toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.show();
        }

        $(document).on('change', '.job-seeker-status-select', function () {
            let form = $(this).closest('.job-seeker-status-form');
            let id = form.data('id');
            let status = $(this).val();

            $.ajax({
                url: "<?= site_url('job_seeker_requests/change_request_status'); ?>/" + id,
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
                            `Your Registration Credentials
                            Hello ${name},
                            Your registration has been approved. Here are your login credentials:
                                Email: ${email}
                                Password: ${password}
                            You can change your password later from your profile page.
                            Thank you`;

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
                            `Your Registration Credentials
                            Hello ${name},
                            Your registration has been approved. Here are your login credentials:
                                Email: ${email}
                                Password: ${password}
                            You can change your password later from your profile page.
                            Thank you`;

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
    </script>

</body>

</html>