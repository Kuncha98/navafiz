<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <p class="section-subtitle">Job Request</p>
                <h3 class="section-title">Job Application -
                    <?php echo $record->company_name; ?>
                </h3>
            </div>

            <a href="<?php echo site_url('form-requests/job-request-list'); ?>" class="btn border">Back to
                dashboard</a>
        </div>

        <!-- Form card -->
        <div class="submition-form-card">

            <h6 class="form-section-title">Company Details</h6>
            <div class="row g-3 mb-4">
                <?php
                function company_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                company_fields('Contact Person', $record->contact_person);
                company_fields('Mobile', $record->mobile);
                company_fields('Email', $record->email);
                company_fields('Work Location (City/Country)', $record->work_location);
                ?>
            </div>

            <h6 class="form-section-title">Position Details</h6>
            <div class="row g-3 mb-4">
                <?php
                function position_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                position_fields('Job Title', $record->job_title);
                position_fields('Number of Workers Required', $record->workers_required);
                position_fields('Category', $record->category);
                position_fields('Employment Type', $record->employment_type);
                position_fields('Expected Joining Date', $record->joining_date);
                ?>
            </div>

            <h6 class="form-section-title">Candidate Requirements</h6>
            <div class="row g-3 mb-4">
                <?php
                function can_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                can_fields('Education', $record->education);
                can_fields('Experience (Years)', $record->experince);
                can_fields('Key Skills Needed', $record->skills);
                can_fields('Language Requirement', $record->language);
                ?>
            </div>

            <h6 class="form-section-title">Salary Range</h6>
            <div class="row g-3 mb-4">
                <?php
                function sal_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                sal_fields('Minimum Salary', $record->salary_min);
                sal_fields('Maximum Salary', $record->salary_max);
                sal_fields('Accommodation', $record->accommodation);
                sal_fields('Transportation', $record->transportation);
                sal_fields('Food', $record->food);
                sal_fields('Other Benifits', $record->other_benifits);
                ?>
            </div>

            <h6 class="form-section-title">Interview Process</h6>
            <div class="row g-3 mb-4">
                <?php
                function int_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                int_fields('Interview Type', $record->interview_type);
                int_fields('Trade Test Required', $record->trade_test);
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
        </div>
    </div>
</section>