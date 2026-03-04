<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <p class="section-subtitle">Freelancer Request</p>
                <h3 class="section-title">Freelancer Application -
                    <?php echo $record->name; ?>
                </h3>
            </div>

            <a href="<?php echo site_url('form-requests/freelancer-request-list'); ?>" class="btn border">Back to
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

                personal_fields('Email', $record->email);
                personal_fields('Mobile', $record->mobile);
                personal_fields('Professional Title', $record->professional_title);
                personal_fields('Current Location', $record->current_location);
                ?>
            </div>

            <h6 class="form-section-title">Skills & Experience</h6>
            <div class="row g-3 mb-4">
                <?php
                function skill_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                skill_fields('Experience', $record->experience);
                skill_fields('Key Skills', $record->skills);
                skill_fields('Portfolio', $record->portfolio);
                ?>
            </div>

            <h6 class="form-section-title">Work Preferences</h6>
            <div class="row g-3 mb-4">
                <?php
                function work_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                work_fields('Work Type', $record->work_type);
                work_fields('Availability Type', $record->availability_type);
                ?>
            </div>

            <h6 class="form-section-title">Pricing</h6>
            <div class="row g-3 mb-4">
                <?php
                function price_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                price_fields('Rate Type', $record->rate_type);
                price_fields('Rate', $record->rate_amount);
                price_fields('Currency', $record->currency);
                ?>
            </div>

            <h6 class="form-section-title">Additional</h6>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <div class="border rounded-3 p-3">
                        <small class="text-muted">Short Introduction</small>
                        <div class="fw-semibold">
                            <?php echo nl2br($record->brief); ?>
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
                ?>
            </div>
        </div>
    </div>
</section>