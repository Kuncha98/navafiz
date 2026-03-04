<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <a href="<?php echo site_url('form-requests/job-seeker-request-list'); ?>" class=""><i
                        class="fa fa-arrow-left me-2"></i>Go back</a>
                <p class="section-subtitle mt-3">Job Seeker Request</p>
                <h3 class="section-title">Job Seeker Application -
                    <?php echo $record->name; ?>
                </h3>
            </div>


            <form method="post" action="<?= site_url('job_seeker_requests/change_request_status/' . $record->id); ?>">
                <div class="dropdown">
                    <button class="btn btn-sm 
        <?php
        // Button color matches current status
        switch ($record->status) {
            case 1:
                echo 'btn-warning text-dark';
                break; // Submit
            case 2:
                echo 'btn-success';
                break;          // Approved
            case 3:
                echo 'btn-danger';
                break;           // Rejected
            default:
                echo 'btn-light text-dark';
                break;
        }
        ?>" type="button" id="statusDropdown<?= $record->id ?>" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        $statusMap = [1 => 'Submit', 2 => 'Approved', 3 => 'Rejected'];
                        echo $statusMap[$record->status] ?? 'Unknown';
                        ?>
                        <i class="bi bi-caret-down-fill"></i>
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="statusDropdown<?= $record->id ?>">
                        <?php foreach ($statusMap as $key => $label): ?>
                            <?php
                            // Disable Submit if already Approved/Rejected
                            $disabled = '';
                            if (($record->status == 2 || $record->status == 3) && $key == 1) {
                                $disabled = 'disabled';
                            }

                            // Map badge classes for dropdown items
                            $badgeClass = match ($key) {
                                1 => 'bg-warning text-dark',
                                2 => 'bg-success text-white',
                                3 => 'bg-danger text-white',
                                default => 'bg-light text-dark'
                            };
                            ?>
                            <li>
                                <form method="post"
                                    action="<?= site_url('job_seeker_requests/change_request_status/' . $record->id) ?>">
                                    <input type="hidden" name="status" value="<?= $key ?>">
                                    <button type="submit" class="dropdown-item <?= $badgeClass ?>" <?= $disabled ?>>
                                        <?= $label ?>
                                    </button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </form>
        </div>

        <!-- Form card -->
        <div class="submition-form-card">

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
                personal_fields('Nationality', $record->nationality);
                personal_fields('Current Location', $record->current_location);
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

                job_fields('Applying Position', $record->applying_position);
                job_fields('Category', $record->category);
                job_fields('Preferred Country', $record->preferred_country);
                job_fields('Expected Salary', number_format($record->expected_salary));
                job_fields('Availability', $record->availability);
                ?>
            </div>

            <h6 class="form-section-title">Experience</h6>
            <div class="row g-3 mb-4">
                <?php
                function exp_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                exp_fields('Experience (Years)', $record->experience);
                exp_fields('Last Job Title', $record->last_job_title);
                exp_fields('Skills', $record->skills);
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

                edu_fields('Highest Qualification', $record->highest_qualification);
                edu_fields('Trade / Technical Certificate', $record->certificate);
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
        </div>
    </div>
</section>