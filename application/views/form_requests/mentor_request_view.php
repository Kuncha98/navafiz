<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <p class="section-subtitle">Recruitment Request</p>
                <h3 class="section-title">Mentor Application -
                    <?php echo $record->name; ?>
                </h3>
            </div>

            <a href="<?php echo site_url('form-requests/mentor-request-list'); ?>" class="btn border">Back to
                dashboard</a>
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

                personal_fields('Professional Title', $record->professional_title);
                personal_fields('Company / Industry', $record->company);
                personal_fields('Years of Experience', $record->experience);
                personal_fields('Email', $record->email);
                personal_fields('Mobile', $record->mobile);
                personal_fields('City / Country', $record->location);
                personal_fields('LinkedIn Profile', $record->linkednIn);
                ?>
            </div>

            <h6 class="form-section-title">Mentorship Focus</h6>
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

                job_fields('Areas of Expertise', $record->expertise_areas);
                job_fields('Students', $record->students);
                job_fields('Job Seekers', $record->job_seekers);
                job_fields('Entrepreneurs', $record->entrepreneurs);
                job_fields('Professionals', $record->professionals);
                job_fields('Languages Spoken', $record->languages_spoken);
                job_fields('Mentorship Type', $record->mentorship_type);
                job_fields('Conducting Mode', $record->conducting_mode);
                job_fields('Session Duration', number_format($record->session_duration));
                job_fields('Availability (Date & Time)', $record->availability);
                ?>
            </div>

            <h6 class="form-section-title">Interview Process</h6>
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

                edu_fields('Brief Bio', $record->personal_intro);
                edu_fields('Key Achievement', $record->key_achievement);
                edu_fields('Previous Mentoring', $record->previous_mentoring);
                edu_fields('Paid or Voluntary', $record->paid_type);
                ?>
            </div>

            <h6 class="form-section-title">Additional</h6>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <div class="border rounded-3 p-3">
                        <small class="text-muted">Why Do He Wants to Be a Mentor?</small>
                        <div class="fw-semibold">
                            <?php echo nl2br($record->additional_notes); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>