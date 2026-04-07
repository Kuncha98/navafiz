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
</style>

<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <a href="<?php echo site_url('form-requests/job-seeker-request-list'); ?>" class=""><i
                        class="fa fa-arrow-left me-2"></i>Go back</a>
                <p class="section-subtitle mt-3">Candidate Registration</p>
                <h3 class="section-title">
                    Job Seeker Application – <?php echo $record->name; ?>
                </h3>
            </div>


            <!-- <form method="post" action="<?= site_url('job_seeker_requests/change_request_status/' . $record->id); ?>">
                <?php
                // Decide background color based on current status
                $status = (int) $record->status;

                switch ($status) {
                    case 1:
                        $selectStyle = 'background-color: #ffc107; color: #212529;';
                        break;
                    case 2:
                        $selectStyle = 'background-color: #198754; color: #fff;';
                        break;
                    case 3:
                        $selectStyle = 'background-color: #dc3545; color: #fff;';
                        break;
                    default:
                        $selectStyle = 'background-color: #f8f9fa; color: #212529;';
                }
                ?>
                <select name="status" class="badge select-badge border-0" onchange="this.form.submit()"
                    style="<?= $selectStyle ?>">
                    <?php
                    $statusOptions = [
                        1 => 'Submit',
                        2 => 'Approved & registered as a member',
                        3 => 'Rejected'
                    ];

                    foreach ($statusOptions as $key => $label):
                        $selected = ($record->status == $key) ? 'selected' : '';

                        // Disable Submit if current status is Approved or Rejected
                        $disabled = '';
                        if (($record->status == 2 || $record->status == 3) && $key == 1) {
                            $disabled = 'disabled';
                        }
                        ?>
                        <option value="<?= $key; ?>" <?= $selected; ?>     <?= $disabled; ?>>
                            <?= $label; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form> -->

            <form class="job-seeker-status-form" data-id="<?= $record->id; ?>">
                <select name="status" class="badge select-badge border-0 job-seeker-status-select"
                    style="<?= $selectStyle ?>">
                    <?php foreach ($statusOptions as $key => $label):
                        $selected = ($record->status == $key) ? 'selected' : '';
                        $disabled = (($record->status == 2 || $record->status == 3) && $key == 1) ? 'disabled' : '';
                        ?>
                        <option value="<?= $key; ?>" <?= $selected; ?>     <?= $disabled; ?>>
                            <?= $label; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>

        <div id="statusAlert" class="alert alert-success d-none" role="alert"></div>

        <div class="modal fade" id="statusModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Status:</strong> <span id="m_status"></span></p>
                        <p><strong>Name:</strong> <span id="m_name"></span></p>
                        <p><strong>Phone:</strong> <span id="m_phone"></span></p>
                        <p><strong>Email:</strong> <span id="m_email"></span></p>
                        <p><strong>Password:</strong>
                            <span id="m_password" class="text-danger fw-bold"></span>
                        </p>

                        <div class="mt-3 p-3 bg-light rounded">
                            <p id="credential_message" style="white-space: pre-line;"></p>
                        </div>

                        <div class="text-start mt-3">
                            <!-- Copy Button -->
                            <button type="button" id="copy_btn"
                                class="btn rounded-3 btn-outline-secondary position-absolute top-0 end-0 m-2">
                                <i class="fas fa-copy"></i> Copy
                            </button>
                        </div>

                        <div class="text-end mt-3">
                            <a href="#" target="_blank" id="whatsapp_btn" class="btn btn-success rounded-3">
                                <i class="fab fa-whatsapp me-1"></i> Send via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form card -->
        <!-- <div class="submition-form-card">

            <h6 class="form-section-title">Basic Information</h6>
            <div class="row g-3 mb-4">
                <?php
                function personal_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                personal_fields('Email', $record->email);
                personal_fields('Mobile', $record->mobile);
                personal_fields('Nationality', ucwords($record->nationality));
                personal_fields('Current Location', ucwords($record->current_location));
                ?>
            </div>

            <h6 class="form-section-title">Target Job Details</h6>
            <div class="row g-3 mb-4">
                <?php
                function job_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                job_fields('Applying Position', ucwords($record->applying_position));
                job_fields('Category', ucwords(str_replace('_', ' ', $record->category)));
                job_fields('Preferred Country', ucwords($record->preferred_country));
                job_fields('Expected Salary', number_format($record->expected_salary));
                job_fields('Availability', ucwords(str_replace('_', ' ', $record->availability)));
                ?>
            </div>

            <h6 class="form-section-title">Experience</h6>
            <div class="row g-3 mb-4">
                <?php
                $skills_html = '';

                if (!empty($record->skills)) {
                    $skills = explode(',', $record->skills);

                    foreach ($skills as $skill) {
                        $skills_html .= '<span class="badge bg-primary me-1 mb-2">'
                            . htmlspecialchars(trim($skill))
                            . '</span>';
                    }
                }
                ?>
                <?php
                function exp_fields($label, $value, $is_html = false)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">';
                    if ($value) {
                        echo $is_html ? $value : htmlspecialchars($value);
                    } else {
                        echo '-';
                    }
                    echo '</div>
                            </div>
                         </div>';
                }

                exp_fields('Experience (Years)', $record->experience);
                exp_fields('Last Job Title', ucwords($record->last_job_title));
                exp_fields('Skills', $skills_html, true);
                ?>
            </div>

            <h6 class="form-section-title">Education / Certification</h6>
            <div class="row g-3 mb-4">
                <?php
                function edu_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                edu_fields('Highest Qualification', ucwords($record->highest_qualification));
                edu_fields('Trade / Technical Certificate', ucwords($record->certificate));
                ?>
            </div>

            <h6 class="form-section-title">Additional</h6>
            <div class="row g-3 mb-4">
                <?php
                function add_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                add_fields('Visa Status', ucfirst($record->visa_status));
                add_fields('Worked in GCC', ucfirst($record->worked_in_gcc));
                ?>
                <div class="col-12">
                    <div class="border rounded-3 p-3">
                        <small class="text-muted">Additional Notes</small>
                        <div class="fw-semibold">
                            <?php echo nl2br($record->additional_notes); ?>
                        </div>
                    </div>
                </div>
            </div>

            <h6 class="form-section-title">Uploaded Documents</h6>
            <div class="row g-3 mb-4">
                <?php
                function documentCard($title, $folder, $file)
                {

                    if (empty($file))
                        return;

                    $url = base_url($folder . $file);
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png']);

                    echo '<div class="col-md-4">
                            <div class="card shadow-sm h-100 border-0 rounded-3">
                                <div class="card-body text-center">';

                    echo '<h6 class="mb-3">' . $title . '</h6>';

                    if ($isImage) {
                        echo '<img src="' . $url . '" class="img-fluid rounded mb-3" style="max-height:200px; object-fit:cover;">';
                    } else {
                        echo '<div class="mb-3">
                                <i class="fas fa-file-pdf text-danger" style="font-size:48px;"></i>
                              </div>';
                    }

                    echo '<div class="d-grid gap-2">
                            <a href="' . $url . '" target="_blank" class="btn btn-outline-primary">
                                View
                            </a>
                            <a href="' . $url . '" download class="btn btn-primary">
                                Download
                            </a>
                          </div>';

                    echo '</div></div></div>';
                }

                documentCard('CV', 'navassets/uploads/cv/', $record->cv);
                documentCard('Passport', 'navassets/uploads/passport/', $record->passport);
                documentCard('Visa', 'navassets/uploads/visa/', $record->visa);
                ?>
            </div>
        </div> -->

        <div class="container-fluid p-0">

            <!-- SECTION CARD -->
            <?php
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
            ?>

            <!-- BASIC INFO -->
            <?php
            $basic_content =
                field_item('Email', $record->email, 'fa-envelope') .
                field_item('Mobile', $record->mobile, 'fa-phone') .
                field_item('Nationality', ucwords($record->nationality), 'fa-flag') .
                field_item('Current Location', ucwords($record->current_location), 'fa-map-marker-alt');

            section_card('Basic Information', 'fa-user', $basic_content);
            ?>

            <!-- JOB DETAILS -->
            <?php
            $job_content =
                field_item('Applying Position', ucwords($record->applying_position), 'fa-briefcase') .
                field_item('Category', ucwords(str_replace('_', ' ', $record->category)), 'fa-layer-group') .
                field_item('Preferred Country', ucwords($record->preferred_country), 'fa-globe') .
                field_item('Expected Salary', number_format($record->expected_salary), 'fa-money-bill-wave') .
                field_item('Availability', ucwords(str_replace('_', ' ', $record->availability)), 'fa-clock');

            section_card('Target Job Details', 'fa-bullseye', $job_content);
            ?>

            <!-- EXPERIENCE -->
            <?php
            $skills_html = '';
            if (!empty($record->skills)) {
                foreach (explode(',', $record->skills) as $skill) {
                    $skills_html .= '<span class="badge bg-primary-soft text-primary-custom me-1 mb-1">'
                        . htmlspecialchars(trim($skill)) . '</span>';
                }
            }

            $exp_content =
                field_item('Experience (Years)', $record->experience, 'fa-chart-line') .
                field_item('Last Job Title', ucwords($record->last_job_title), 'fa-user-tie') .
                '
        <div class="col-md-12">
            <div class="d-flex align-items-start">
                <i class="fas fa-tools text-primary-custom mt-1 me-2"></i>
                <div>
                    <div class="text-muted small">Skills</div>
                    <div>' . ($skills_html ?: '-') . '</div>
                </div>
            </div>
        </div>';

            section_card('Experience', 'fa-briefcase', $exp_content);
            ?>

            <!-- EDUCATION -->
            <?php
            $edu_content =
                field_item('Highest Qualification', ucwords($record->highest_qualification), 'fa-graduation-cap') .
                field_item('Certificate', ucwords($record->certificate), 'fa-certificate');

            section_card('Education / Certification', 'fa-graduation-cap', $edu_content);
            ?>

            <!-- ADDITIONAL -->
            <?php
            $add_content =
                field_item('Visa Status', ucfirst($record->visa_status), 'fa-id-card') .
                field_item('Worked in GCC', ucfirst($record->worked_in_gcc), 'fa-globe-asia') .
                '
        <div class="col-12">
            <div class="d-flex align-items-start">
                <i class="fas fa-sticky-note text-primary-custom mt-1 me-2"></i>
                <div>
                    <div class="text-muted small">Additional Notes</div>
                    <div class="fw-semibold">' . (!empty($record->additional_notes) ? nl2br($record->additional_notes) : '-') . '</div>
                </div>
            </div>
        </div>';

            section_card('Additional Information', 'fa-info-circle', $add_content);
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

                        modern_doc('CV', 'navassets/uploads/cv/', $record->cv);
                        modern_doc('Passport', 'navassets/uploads/passport/', $record->passport);
                        modern_doc('Visa', 'navassets/uploads/visa/', $record->visa);
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>