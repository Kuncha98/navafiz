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
                <a href="<?php echo site_url('form-requests/manpower-supply-request-list'); ?>" class=""><i
                        class="fa fa-arrow-left me-2"></i>Go back</a>
                <p class="section-subtitle mt-3">Manpower Partner Registration</p>
                <h3 class="section-title">
                    Manpower Supply Company – <?php echo $record->company_name; ?>
                </h3>
            </div>


            <!-- <form method="post"
                action="<?= site_url('manpower_supply_requests/change_request_status/' . $record->id); ?>">
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


            <form class="manpower-supplier-status-form" data-id="<?= $record->id; ?>">
                <select name="status" class="badge select-badge border-0 manpower-supplier-status-select"
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
                // function csv_badges($csv, $class = 'bg-primary')
                // {
                //     if (empty($csv))
                //         return '';

                //     $items = explode(',', $csv);
                //     $html = '';

                //     foreach ($items as $item) {

                //         $item = ucwords(str_replace('_', ' ', trim($item)));

                //         $html .= '<span class="badge ' . $class . ' me-1 mb-2">'
                //             . htmlspecialchars($item)
                //             . '</span>';
                //     }

                //     return $html;
                // }
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
        </div> -->


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