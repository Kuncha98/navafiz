<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <a href="<?php echo site_url('form-requests/mentor-request-list'); ?>" class=""><i
                        class="fa fa-arrow-left me-2"></i>Go back</a>
                <p class="section-subtitle mt-3">Mentorship Program Application</p>
                <h3 class="section-title">
                    Mentor Application – <?php echo $record->name; ?>
                </h3>
            </div>
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
                $language_html = '';

                if (!empty($record->languages_spoken)) {
                    $languages_spoken = explode(',', $record->languages_spoken);

                    foreach ($languages_spoken as $language) {
                        $language_html .= '<span class="badge bg-primary me-1 mb-2">'
                            . htmlspecialchars(trim($language))
                            . '</span>';
                    }
                }
                ?>
                <?php
                $available_html = '';

                if (!empty($record->available_at)) {

                    $dates = explode(',', $record->available_at);
                    $today = date('Y-m-d');

                    foreach ($dates as $date) {

                        $cleanDate = trim($date);
                        if (empty($cleanDate))
                            continue;

                        $timestamp = strtotime($cleanDate);
                        if (!$timestamp)
                            continue;

                        $isExpired = $timestamp < time();
                        $isToday = date('Y-m-d', $timestamp) === $today;

                        if ($isExpired) {
                            $badgeClass = 'bg-danger';
                        } elseif ($isToday) {
                            $badgeClass = 'bg-warning text-dark';
                        } else {
                            $badgeClass = 'bg-success';
                        }

                        $available_html .= '<span class="badge ' . $badgeClass . ' me-1 mb-2">'
                            . date('d M Y H:i', $timestamp)
                            . '</span>';
                    }
                }
                ?>
                <?php
                function job_fields($label, $value, $is_html = false)
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

                job_fields('Areas of Expertise', $record->expertise_areas);
                job_fields('Students', $record->students == 1 ? 'Yes' : 'No');
                job_fields('Job Seekers', $record->job_seekers == 1 ? 'Yes' : 'No');
                job_fields('Entrepreneurs', $record->entrepreneurs == 1 ? 'Yes' : 'No');
                job_fields('Professionals', $record->professionals == 1 ? 'Yes' : 'No');
                job_fields('Languages Spoken', $language_html, true);
                job_fields('Mentorship Type', ucwords(str_replace('_', ' ', $record->mentorship_type)));
                job_fields('Conducting Mode', ucwords(str_replace('_', ' ', $record->conducting_mode)));
                job_fields('Session Duration', number_format($record->session_duration));
                job_fields('Availability (Date & Time)', $available_html, true);
                ?>
            </div>

            <h6 class="form-section-title">Qualification</h6>
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