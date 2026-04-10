<style>
    .text-primary-custom {
        color: #164885;
    }

    .bg-primary-soft {
        background-color: rgba(22, 72, 133, 0.1);
    }

    .field-item {
        padding: 10px 0;
        border-bottom: 1px solid #f1f1f1;
    }

    .field-item:last-child {
        border-bottom: none;
    }

    /* Document Card */
    .doc-card {
        border: 1px solid #f1f1f1;
        border-radius: 10px;
        padding: 15px;
        transition: 0.2s;
    }

    .doc-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .doc-preview img {
        max-height: 160px;
        object-fit: cover;
    }

    .doc-preview i {
        font-size: 48px;
    }





    .status-dropdown-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .manpower-supplier-status-select {
        appearance: none;
        width: 100%;
        padding: 10px 44px 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* Dropdown arrow */
    .status-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #555;
    }

    /* STATUS COLORS */
    .status-submitted {
        background: #fff3cd;
        color: #856404;
    }

    .status-approved {
        background: #d1e7dd;
        color: #0f5132;
    }

    .status-rejected {
        background: #f8d7da;
        color: #842029;
    }

    /* Hover effect */
    .manpower-supplier-status-select:hover {
        transform: scale(1.02);
    }

    /* Focus effect */
    .manpower-supplier-status-select:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
    }







    .nav-link-custom {
        text-decoration: none;
        color: #0d6efd;
        font-weight: 500;
        transition: 0.2s ease;
    }

    .nav-link-custom:hover {
        text-decoration: underline;
    }

    /* DISABLED STATE */
    .disabled-link {
        color: #adb5bd;
        /* grey */
        pointer-events: none;
        /* 🚫 disables click */
        cursor: not-allowed;
        text-decoration: none;
        opacity: 0.6;
    }

    @media (max-width: 576px) {
        .nav-text {
            display: none;
        }
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

<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page navigation -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <a href="<?php echo site_url('form-requests/manpower-supply-request-list'); ?>" class=""><i
                        class="fa fa-arrow-left me-2"></i>Go back</a>
            </div>
            <div class="d-flex align-items-center">
                <?php
                $prev_link = $prev_id
                    ? site_url('form-requests/manpower-supply-request-view/' . $prev_id)
                    : 'javascript:void(0)';

                $prev_class = $prev_id ? 'nav-link-custom' : 'nav-link-custom disabled-link';
                ?>

                <a href="<?= $prev_link; ?>" class="<?= $prev_class; ?>">
                    <i class="fas fa-chevron-left me-2"></i><span class="nav-text">Previous</span>
                </a>

                <div class="text-muted fw-semibold mx-1 mx-sm-4">
                    <?= $current_position; ?> /
                    <?= $total_records; ?>
                </div>

                <?php
                $next_link = $next_id
                    ? site_url('form-requests/manpower-supply-request-view/' . $next_id)
                    : 'javascript:void(0)';

                $next_class = $next_id ? 'nav-link-custom' : 'nav-link-custom disabled-link';
                ?>

                <a href="<?= $next_link; ?>" class="<?= $next_class; ?>">
                    <span class="nav-text">Next</span><i class="fas fa-chevron-right ms-2"></i>
                </a>
            </div>
        </div>

        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <p class="section-subtitle mt-3">Manpower Partner Registration</p>
                <h3 class="section-title">
                    Manpower Supply Company – <?php echo $record->company_name; ?>
                </h3>
            </div>

            <?php
            $status = (int) $record->status;

            $statusMap = [
                1 => ['label' => 'Submitted', 'class' => 'status-submitted'],
                2 => ['label' => 'Approved', 'class' => 'status-approved'],
                3 => ['label' => 'Rejected', 'class' => 'status-rejected']
            ];
            ?>

            <form class="manpower-supplier-status-form d-inline-block" data-id="<?= $record->id; ?>">

                <div class="status-dropdown-wrapper">

                    <select name="status"
                        class="manpower-supplier-status-select form-select border-0 <?= $statusMap[$status]['class']; ?>">

                        <?php foreach ($statusMap as $key => $item):
                            $selected = ($record->status == $key) ? 'selected' : '';
                            $disabled = (($record->status == 2 || $record->status == 3) && $key == 1) ? 'disabled' : '';
                            ?>

                            <option value="<?= $key; ?>" <?= $selected; ?>     <?= $disabled; ?>>
                                <?= $item['label']; ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                    <span class="status-icon">
                        <i class="fas fa-chevron-down"></i>
                    </span>

                </div>

            </form>
        </div>

        <div id="statusAlert" class="alert d-none mt-3" role="alert"></div>

        <!-- Form card -->
        <div class="container-fluid p-0">

            <?php
            // Reuse same helpers
            function section_card($title, $icon, $content)
            {
                echo '
    <div class="card border-0 shadow-sm mb-4 profile rounded-4">
        <div class="card-body p-2">
            <h6 class="fw-semibold text-primary-custom mb-3">
                <i class="fas ' . $icon . ' me-2"></i>' . $title . '
            </h6>
            <div class="row g-3">
                ' . $content . '
            </div>
        </div>
    </div>';
            }

            function field_item($label, $value, $icon = 'fa-angle-right')
            {
                return '
    <div class="col-md-3">
        <div class="d-flex align-items-start field-item">
            <i class="fas ' . $icon . ' text-primary-custom mt-1 me-2"></i>
            <div>
                <div class="text-muted small">' . $label . '</div>
                <div class="fw-semibold">' . ($value ?: '-') . '</div>
            </div>
        </div>
    </div>';
            }

            // Badge helper
            function csv_badges($csv, $class = 'bg-primary-soft text-primary-custom')
            {
                if (empty($csv))
                    return '-';

                $items = explode(',', $csv);
                $html = '';

                foreach ($items as $item) {
                    $html .= '<span class="badge ' . $class . ' me-1 mb-1">'
                        . htmlspecialchars(ucwords(str_replace('_', ' ', trim($item))))
                        . '</span>';
                }

                return $html;
            }
            ?>

            <!-- COMPANY BASIC -->
            <?php
            $company_content =
                field_item('Country of Operation', ucwords($record->country_of_operation), 'fa-globe') .
                field_item('City', ucwords($record->city), 'fa-map-marker-alt') .
                field_item('Registration Number', $record->company_registration_number, 'fa-id-card') .
                field_item('Year Established', $record->year_established, 'fa-calendar') .
                field_item('Company Type', ucwords(str_replace('_', ' ', $record->company_type)), 'fa-building');

            section_card('Company Basic Information', 'fa-building', $company_content);
            ?>

            <!-- LICENSE -->
            <?php
            $license_content =
                field_item('License Number', $record->recruitment_license_number, 'fa-id-badge') .
                field_item('Issuing Authority', $record->license_issuing_authority, 'fa-university') .
                field_item('Expiry Date', $record->license_expiry_date, 'fa-calendar-times') .
                field_item('Tax Number', $record->tax_registration_number, 'fa-file-invoice');

            section_card('License & Legal Verification', 'fa-balance-scale', $license_content);
            ?>

            <!-- CONTACT -->
            <?php
            $contact_content =
                field_item('Contact Person', ucwords($record->contact_person_name), 'fa-user') .
                field_item('Designation', ucwords($record->designation), 'fa-user-tie') .
                field_item('Mobile', $record->mobile_number, 'fa-phone') .
                field_item('WhatsApp', $record->whatsapp_number, 'fa-whatsapp') .
                field_item('Email', $record->email, 'fa-envelope') .
                field_item('Office Address', $record->office_address, 'fa-map');

            section_card('Contact Person', 'fa-address-book', $contact_content);
            ?>

            <!-- SUPPLY WORKERS -->
            <?php
            $workers_content =
                '
<div class="col-md-6">
    <div>
        <div class="text-muted small">Supply Countries</div>
        <div>' . csv_badges($record->supply_countries, 'bg-success') . '</div>
    </div>
</div>

<div class="col-md-6">
    <div>
        <div class="text-muted small">Source Countries</div>
        <div>' . csv_badges($record->source_countries, 'bg-info') . '</div>
    </div>
</div>

<div class="col-md-6">
    <div>
        <div class="text-muted small">Industries Served</div>
        <div>' . csv_badges($record->industries_served, 'bg-warning') . '</div>
    </div>
</div>

<div class="col-md-6">
    <div>
        <div class="text-muted small">Manpower Categories</div>
        <div>' . csv_badges($record->manpower_categories, 'bg-primary') . '</div>
    </div>
</div>
';

            section_card('Supply Workers', 'fa-users', $workers_content);
            ?>

            <!-- TRADE TESTING -->
            <?php
            $testing_html = csv_badges($record->testing_categories_available);

            $trade_content =
                field_item('Trade Testing Center', $record->trade_testing_center == 1 ? 'Yes' : 'No', 'fa-check-circle') .
                '
    <div class="col-md-12">
        <div>
            <div class="text-muted small">Testing Categories</div>
            <div>' . $testing_html . '</div>
        </div>
    </div>';

            section_card('Trade Testing Center', 'fa-tools', $trade_content);
            ?>

            <!-- ONLINE -->
            <?php
            $online_content =
                field_item('Website', $record->company_website, 'fa-globe') .
                field_item('LinkedIn', $record->linkedin_page, 'fa-linkedin') .
                field_item('Facebook', $record->facebook_page, 'fa-facebook');

            section_card('Online Presence', 'fa-share-alt', $online_content);
            ?>

            <!-- DOCUMENTS -->
            <div class="card border-0 shadow-sm profile mb-4 rounded-4">
                <div class="card-body p-2">
                    <h6 class="fw-semibold text-primary-custom mb-3">
                        <i class="fas fa-file-alt me-2"></i>Uploaded Documents
                    </h6>

                    <div class="row g-3">

                        <?php
                        function modern_doc($title, $folder, $file)
                        {
                            if (empty($file))
                                return;

                            $url = base_url($folder . $file);
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            $is_img = in_array($ext, ['jpg', 'jpeg', 'png']);

                            echo '
    <div class="col-md-4 col-sm-6">
        <div class="doc-card text-center h-100">

            <div class="doc-preview mb-2">';
                            if ($is_img) {
                                echo '<img src="' . $url . '" class="img-fluid rounded">';
                            } else {
                                echo '<i class="fas fa-file-pdf text-danger"></i>';
                            }
                            echo '</div>

            <div class="fw-semibold small mb-2">' . $title . '</div>

            <div class="d-flex gap-2">
                <a href="' . $url . '" target="_blank" class="btn rounded-3 btn-outline-primary w-100">View</a>
                <a href="' . $url . '" download class="btn rounded-3 btn-primary w-100">Download</a>
            </div>

        </div>
    </div>';
                        }

                        modern_doc('Testing Center', 'navassets/uploads/testing_center/', $record->testing_center_photos);
                        modern_doc('Recruitment License', 'navassets/uploads/recruitment_license/', $record->recruitment_license_file);
                        modern_doc('Company Certificate', 'navassets/uploads/company_certificate/', $record->company_registration_certificate);
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Status changes confirmation modal -->
<div class="modal fade" id="confirmStatusModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modern-modal border-0 shadow-lg">

            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-semibold">
                    Confirm Action
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <p id="confirmMessage" class="mb-0 text-muted">
                        Are you sure you want to continue?
                    </p>
                </div>
            </div>

            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light px-3 py-2" data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="button" class="btn btn-primary px-3 py-2 modern-btn" id="confirmStatusBtn">
                    Yes, Continue
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Created user details modal -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modern-modal border-0 shadow-lg">

            <!-- HEADER -->
            <div class="modal-header border-0">
                <div>
                    <h5 class="modal-title fw-semibold mb-1">User Details</h5>
                    <span id="m_status" class="status-badge"></span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body pt-2">

                <div class="info-group">
                    <div class="info-item">
                        <span class="label">Company Name</span>
                        <span id="m_company_name" class="value"></span>
                    </div>

                    <div class="info-item">
                        <span class="label">Contact Person Name</span>
                        <span id="m_name" class="value"></span>
                    </div>

                    <div class="info-item">
                        <span class="label">WhatsApp</span>
                        <span id="m_phone" class="value"></span>
                    </div>

                    <div class="info-item">
                        <span class="label">Email</span>
                        <span id="m_email" class="value"></span>
                    </div>

                    <div class="info-item">
                        <span class="label">Password</span>
                        <span id="m_password" class="value text-danger fw-semibold"></span>
                    </div>

                    <div class="info-item">
                        <span class="label">Profile Link</span>
                        <span id="m_profile_link" class="value text-primary fw-semibold"></span>
                    </div>
                </div>

                <!-- Credential Box -->
                <div class="credential-box mt-3">
                    <p id="credential_message" class="mb-0"></p>
                </div>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer border-0 d-flex">

                <button type="button" id="copy_btn" class="btn btn-light modern-btn px-3 py-2" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Copy">
                    <i class="fas fa-copy me-1"></i> Copy
                </button>

                <!-- <a href="#" target="_blank" id="whatsapp_btn" class="btn btn-success modern-btn">
                    <i class="fab fa-whatsapp me-1"></i> WhatsApp
                </a> -->

            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tooltipTrigger = document.querySelector('#copy_btn');
        const tooltip = new bootstrap.Tooltip(tooltipTrigger);
    });

    document.getElementById("copy_btn").addEventListener("click", function () {
        const text = document.getElementById("credential_message").innerText;

        navigator.clipboard.writeText(text).then(() => {
            const btn = this;

            // Change tooltip text
            btn.setAttribute("data-bs-original-title", "Copied!");

            const tooltipInstance = bootstrap.Tooltip.getInstance(btn);
            tooltipInstance.show();

            // Reset after 1.5s
            setTimeout(() => {
                tooltipInstance.hide();
                btn.setAttribute("data-bs-original-title", "Copy");
            }, 1500);
        });
    });
</script>

<script>
    $(document).ready(function () {
        initStatusHandler({
            selector: '.manpower-supplier-status-select',
            url: "<?= site_url('manpower_supply_requests/change_request_status'); ?>",

            autoReload: false, // because you use modal

            messages: {
                approve: "Are you sure? This will APPROVE and CREATE account.",
                reject: "Are you sure you want to REJECT?",
                submit: "Change status to Submitted?"
            },

            onApprove: function (res) {

                $('#m_company_name').text(res.data.company_name);
                $('#m_name').text(res.data.name);
                $('#m_email').text(res.data.email);
                $('#m_phone').text(res.data.phone);
                $('#m_status').text(res.data.status_text);
                $('#m_password').text(res.data.password);
                let profileLink = res.data.profile_link; // full URL
                $('#m_profile_link').html(
                    `<a href="${profileLink}" target="_blank" class="text-primary fw-semibold">${profileLink}</a>`
                );

                let message = `
Dear ${res.data.name},

We are pleased to inform you that your registration has been successfully completed
on behalf of ${res.data.company_name} (Manpower Supplier Company).

Your login credentials are as follows:

Email: ${res.data.email}
Password: ${res.data.password}

You can access your account and manage your company profile using the link below:
Navafiz Login: https://navafiz.com/login

For security reasons, we strongly recommend that you change your password upon your first login:
Change Password: https://navafiz.com/user/change_password

If you require any assistance, please feel free to contact our support team.

Thank you,
Navafiz Team
`;

                $('#credential_message').text(message);

                let encoded = encodeURIComponent(message);
                let phone = res.data.phone.replace(/[^0-9]/g, '');

                $('#whatsapp_btn').attr(
                    'href',
                    `https://api.whatsapp.com/send?phone=${phone}&text=${encoded}`
                );

                $('#statusModal').modal('show');
            }
        });
    });
</script>