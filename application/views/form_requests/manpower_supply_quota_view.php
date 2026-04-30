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
                <a href="<?php echo site_url('form-requests/manpower-supply-quota-list'); ?>" class=""><i
                        class="fa fa-arrow-left me-2"></i>Go back</a>
            </div>
            <div class="d-flex align-items-center">
                <?php
                $prev_link = $prev_id
                    ? site_url('form-requests/manpower-supply-quota-view/' . $prev_id)
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
                    ? site_url('form-requests/manpower-supply-quota-view/' . $next_id)
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
                <p class="section-subtitle mt-3">Manpower Jobs</p>
                <h3 class="section-title">
                    Job Title – <?php echo $record->job_title; ?>
                </h3>
            </div>

            <!-- <?php
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

            </form> -->
        </div>

        <div id="statusAlert" class="alert d-none mt-3" role="alert"></div>



        <!-- Form card -->
        <div class="container-fluid p-0">

            <?php
            // -------------------------------
// MANPOWER QUOTA SECTION
// -------------------------------
            

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


            // Format helpers
            function yes_no_badge($val)
            {
                return $val == 1
                    ? '<span class="badge bg-success-soft text-success">Yes</span>'
                    : '<span class="badge bg-secondary-soft text-muted">No</span>';
            }

            function format_text($text)
            {
                return $text ? ucwords(str_replace('_', ' ', $text)) : '-';
            }

            // BASIC JOB INFO
            $job_content =
                field_item('Workers Required', $record->workers_required, 'fa-users') .
                field_item('Duty Hours', $record->duty_hours . ' hrs', 'fa-clock') .
                field_item('Interview Type', format_text($record->interview_type), 'fa-user-check') .
                field_item('GCC Experience', format_text($record->gcc_experience), 'fa-globe');

            section_card('Job Information', 'fa-briefcase', $job_content);


            // SALARY DETAILS
            $salary_content =
                field_item('Basic Salary', $record->basic_salary . ' AED', 'fa-money-bill') .
                field_item('Total Salary', $record->total_salary . ' AED', 'fa-coins');

            section_card('Salary Details', 'fa-money-check-alt', $salary_content);


            // BENEFITS
            $benefits_content = '

<div class="col-md-12">
    <div class="d-flex flex-wrap gap-2">

        ' . ($record->accommodation ? '<span class="badge bg-light text-primary border">🏠 Accommodation</span>' : '') . '
        ' . ($record->transport ? '<span class="badge bg-light text-primary border">🚐 Transport</span>' : '') . '
        ' . ($record->food ? '<span class="badge bg-light text-primary border">🍽 Food</span>' : '') . '
        ' . ($record->overtime ? '<span class="badge bg-light text-primary border">⏱ Overtime</span>' : '') . '
        ' . ($record->joining_flight_ticket ? '<span class="badge bg-light text-primary border">✈ Ticket</span>' : '') . '

    </div>
</div>

<div class="col-md-12">
    <div>
        <div class="text-muted small">Other Benefits</div>
        <div class="fw-semibold">' . ($record->other_benefits ?: '-') . '</div>
    </div>
</div>
';

            section_card('Benefits', 'fa-gift', $benefits_content);


            // ADDITIONAL NOTES
            $notes_content = '
<div class="col-md-12">
    <div>
        <div class="text-muted small">Additional Notes</div>
        <div class="fw-semibold">' . ($record->additional_notes ?: '-') . '</div>
    </div>
</div>
';

            section_card('Additional Information', 'fa-sticky-note', $notes_content);


            // STATUS
            // $status_badge = $record->status == 1
            //     ? '<span class="badge bg-success-soft text-success">Open</span>'
            //     : '<span class="badge bg-secondary-soft text-muted">Closed</span>';

            // $status_content =
            //     field_item('Status', $status_badge, 'fa-toggle-on') .
            //     field_item('Created At', date('d M Y, h:i A', strtotime($record->created_at)), 'fa-calendar');

            // section_card('Status', 'fa-info-circle', $status_content);
            ?>
        </div>
    </div>
</section>