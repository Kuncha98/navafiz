<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <a href="<?php echo site_url('form-requests/job-request-list'); ?>" class=""><i
                        class="fa fa-arrow-left me-2"></i>Go back</a>
                <p class="section-subtitle mt-3">Job Request</p>
                <h3 class="section-title">Job Application -
                    <?php echo $record->company_name; ?>
                </h3>
            </div>
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
                position_fields('Category', ucwords(str_replace('_', ' ', $record->category)));
                position_fields('Employment Type', ucwords(str_replace('_', ' ', $record->employment_type)));
                position_fields('Expected Joining Date', $record->joining_date);
                ?>
            </div>

            <h6 class="form-section-title">Candidate Requirements</h6>
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
                $language_html = '';

                if (!empty($record->language)) {
                    $language = explode(',', $record->language);

                    foreach ($language as $lang) {
                        $language_html .= '<span class="badge bg-primary me-1 mb-2">'
                            . htmlspecialchars(trim($lang))
                            . '</span>';
                    }
                }
                ?>
                <?php
                function can_fields($label, $value, $is_html = false)
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

                can_fields('Education', $record->education);
                can_fields('Experience (Years)', $record->experince);
                can_fields('Key Skills Needed', $skills_html, true);
                can_fields('Language Requirement', $language_html, true);
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
                sal_fields('Accommodation', $record->accommodation == 1 ? 'Yes' : 'No');
                sal_fields('Transportation', $record->transportation == 1 ? 'Yes' : 'No');
                sal_fields('Food', $record->food == 1 ? 'Yes' : 'No');
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

                int_fields('Interview Type', ucwords(str_replace('_', ' ', $record->interview_type)));
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