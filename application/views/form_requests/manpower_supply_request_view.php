<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <a href="<?php echo site_url('form-requests/manpower-supply-request-list'); ?>" class=""><i
                        class="fa fa-arrow-left me-2"></i>Go back</a>
                <p class="section-subtitle mt-3">Manpower Partner Registration</p>
                <h3 class="section-title">
                    Manpower Supply Company – <?php echo $record->company_name; ?>
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
                        2 => 'Approved',
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
        </div>

        <!-- Form card -->
        <div class="submition-form-card">

            <h6 class="form-section-title">Company Basic Information</h6>
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

                company_fields('Country of Operation', ucwords($record->country_of_operation));
                company_fields('City', ucwords($record->city));
                company_fields('Company Registration Number', ucwords($record->company_registration_number));
                company_fields('Year Established', $record->year_established);
                company_fields('Company Type', ucwords(str_replace('_', ' ', $record->company_type)));
                ?>
            </div>

            <h6 class="form-section-title">License & Legal Verification</h6>
            <div class="row g-3 mb-4">
                <?php
                function license_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                license_fields('Recruitment License Number', ucwords($record->recruitment_license_number));
                license_fields('License Issuing Authority', ucwords($record->license_issuing_authority));
                license_fields('License Expiry Date', $record->license_expiry_date);
                license_fields('Tax Registration Number', ucwords($record->tax_registration_number));
                ?>
            </div>

            <h6 class="form-section-title">Contact Person</h6>
            <div class="row g-3 mb-4">
                <?php
                function contact_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                contact_fields('Contact Person Name', ucwords($record->contact_person_name));
                contact_fields('Designation', ucwords($record->designation));
                contact_fields('Mobile Number', $record->mobile_number);
                contact_fields('WhatsApp Number', $record->whatsapp_number);
                contact_fields('Email', $record->email);
                contact_fields('Office Address', $record->office_address);
                ?>
            </div>

            <h6 class="form-section-title">Supply Workers</h6>
            <div class="row g-3 mb-4">
                <?php
                function csv_badges($csv, $class = 'bg-primary')
                {
                    if (empty($csv))
                        return '';

                    $items = explode(',', $csv);
                    $html = '';

                    foreach ($items as $item) {

                        $item = ucwords(str_replace('_', ' ', trim($item)));

                        $html .= '<span class="badge ' . $class . ' me-1 mb-2">'
                            . htmlspecialchars($item)
                            . '</span>';
                    }

                    return $html;
                }
                ?>
                <?php
                function workers_fields($label, $value, $is_html = false)
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

                workers_fields('Supply Countries', csv_badges($record->supply_countries, 'bg-success'), true);
                workers_fields('Source Countries', csv_badges($record->source_countries, 'bg-info'), true);
                workers_fields('Major Industries Served', csv_badges($record->industries_served, 'bg-warning'), true);
                workers_fields('Categories of Manpower', csv_badges($record->manpower_categories, 'bg-warning'), true);
                ?>
            </div>

            <h6 class="form-section-title">Trade Testing Center</h6>
            <div class="row g-3 mb-4">
                <?php
                $testing_cat_html = '';

                if (!empty($record->testing_categories_available)) {
                    $testing_categories_available = explode(',', $record->testing_categories_available);

                    foreach ($testing_categories_available as $testing_category_available) {
                        $testing_cat_html .= '<span class="badge bg-primary me-1 mb-2">'
                            . htmlspecialchars(trim($testing_category_available))
                            . '</span>';
                    }
                }
                ?>
                <?php
                function trade_fields($label, $value, $is_html = false)
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

                trade_fields('Do you a Trade Testing Center?', ucwords($record->trade_testing_center == 1 ? 'Yes' : 'No'));
                trade_fields('Testing Categories Available', $testing_cat_html, true);
                ?>
            </div>

            <h6 class="form-section-title">Online Presence</h6>
            <div class="row g-3 mb-4">
                <?php
                function online_fields($label, $value)
                {
                    echo '<div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-muted">' . $label . '</small>
                                <div class="fw-semibold">' . ($value ?: '-') . '</div>
                            </div>
                          </div>';
                }

                online_fields('Company Website', ucfirst($record->company_website));
                online_fields('LinkedIn Page', ucfirst($record->linkedin_page));
                online_fields('Facebook Page', ucfirst($record->facebook_page));
                ?>
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

                documentCard('Testing Center', 'navassets/uploads/testing_center/', $record->testing_center_photos);
                documentCard('Recruitment License', 'navassets/uploads/recruitment_license/', $record->recruitment_license_file);
                documentCard('Company Registration Certificate', 'navassets/uploads/company_certificate/', $record->company_registration_certificate);
                ?>
            </div>
        </div>
    </div>
</section>