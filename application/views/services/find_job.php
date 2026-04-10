<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <p class="section-subtitle">Create your profile to explore job opportunities with our partner companies</p>
            <h2 class="section-title">Job Seeker Registration Form</h2>
        </div>

        <!-- Form card -->
        <div class="submition-form-card">
            <?php
            $attributes = array(
                'id' => 'multiStepForm'
            );
            echo form_open_multipart('/services/find-a-job/submit', $attributes);
            ?>

            <!-- Step progress -->
            <div class="step-progress">
                <div class="step active">
                    <p class="step-circle">1</p>
                    <p class="step-title">Personal & Job Info</p>
                </div>
                <div class="step">
                    <p class="step-circle">2</p>
                    <p class="step-title">Experience & Education</p>
                </div>
                <div class="step">
                    <p class="step-circle">3</p>
                    <p class="step-title">Documents</p>
                </div>
                <div class="step">
                    <p class="step-circle">4</p>
                    <p class="step-title">Account & Submit</p>
                </div>
            </div>

            <!-- Step 01 -->
            <div class="form-step active" data-step="1">

                <h5 class="form-section-title">Basic Information</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label required-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="mobile" class="form-label required-label">Mobile Number</label>
                        <div class="d-flex">
                            <select id="country_code" name="country_code"
                                class="form-control required-field w-25 rounded-end-0">
                                <option value="">Select Country</option>
                            </select>
                            <input type="number" id="mobile" name="mobile"
                                class="form-control required-field rounded-start-0 border-start-0"
                                placeholder="Enter number without country code">
                        </div>
                        <small id="mobile-feedback" class="text-danger"></small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label required-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control required-field">
                        <small id="email-feedback" class="text-danger"></small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nationality" class="form-label required-label">Nationality</label>
                        <select id="nationality" name="nationality" class="form-control required-field">
                            <option value="">Select Nationality</option>
                        </select>
                        <!-- <input type="text" id="nationality" name="nationality" class="form-control required-field"> -->
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="current_location" class="form-label required-label">Current Location (City &
                            Country)
                        </label>
                        <input type="text" id="current_location" name="current_location"
                            class="form-control required-field" required>
                    </div>
                </div>

                <h5 class="form-section-title">Target Job Details</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="applying_position" class="form-label required-label">Position Applying For</label>
                        <input type="text" id="applying_position" name="applying_position"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label d-block required-label">Category</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input required-field" type="radio" id="blue_collar" name="category"
                                value="blue_collar">
                            <label for="blue_collar" class="form-check-label">Blue Collar</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input required-field" type="radio" id="white_collar"
                                name="category" value="white_collar">
                            <label for="white_collar" class="form-check-label">White Collar</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="preferred_country" class="form-label required-label">Preferred Country (UAE / KSA /
                            Other)</label>
                        <input type="text" id="preferred_country" name="preferred_country"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="expected_salary" class="form-label">Expected Salary (AED)</label>
                        <input type="number" id="expected_salary" name="expected_salary" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="availability" class="form-label required-label">Availability</label>
                        <select id="availability" name="availability" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option value="immediate">Immediate</option>
                            <option value="30_days">Within 30 Days</option>
                            <option value="notice_period">Notice Period</option>
                        </select>
                    </div>
                </div>

                <!-- Actions -->
                <div class="text-end">
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>
            </div>

            <!-- Step 02 -->
            <div class="form-step" data-step="2">

                <h5 class="form-section-title">Experience</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="experience" class="form-label required-label">Total Years of Experience</label>
                        <input type="number" id="experience" name="experience" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_job_title" class="form-label required-label">Last Job Title</label>
                        <input type="text" id="last_job_title" name="last_job_title"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="skills" class="form-label">Key Skills</label>
                        <!-- <select id="skills" name="skills[]" multiple="multiple" class="form-select" autofocus>
                            <?php
                            foreach ($saved_skills as $skill) {
                                echo '<option value="' . trim($skill) . '" selected>' . trim($skill) . '</option>';
                            }
                            ?>
                        </select> -->
                        <select id="skills" name="skills[]" multiple autofocus class="form-select select2-field"
                            data-placeholder="Enter or select skills" data-tags="true"
                            data-csv="<?= base_url('assets/skills.csv') ?>" data-validate="skills">

                            <!-- Preload saved skills -->
                            <?php
                            foreach ($saved_skills as $skill) {
                                echo '<option value="' . trim($skill) . '" selected>' . trim($skill) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <h5 class="form-section-title">Education / Certification (If Any)</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="highest_qualification" class="form-label required-label">Highest
                            Qualification</label>
                        <input type="text" id="highest_qualification" name="highest_qualification"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="certificate" class="form-label">Trade / Technical Certificate</label>
                        <input type="text" id="certificate" name="certificate" class="form-control">
                    </div>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="wizard-btn btn-prev" data-prev>Previous</button>
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>
            </div>

            <!-- Step 03 -->
            <div class="form-step" data-step="3">
                <h5 class="form-section-title">Documents Upload</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="cv" class="form-label required-label">CV / Resume</label>

                        <div class="upload-box" id="cvUploadBox">

                            <input type="file" name="cv" id="cv" accept=".pdf"
                                class="form-control d-none required-field" data-file-upload data-preview="cvPreview"
                                data-initial="cvInitialState" data-max-size="5">

                            <div class="upload-ui" data-trigger="cv">
                                <div class="upload-initial" id="cvInitialState">
                                    <i class="fas fa-file-pdf text-danger"></i>
                                    <p class="mt-3 mb-1">Upload CV (PDF only)</p>
                                    <small class="text-muted">Max size: 5MB</small>
                                </div>

                                <!-- Preview will be injected here -->
                                <div class="file-preview" id="cvPreview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="passport" class="form-label">Passport Copy</label>

                        <div class="upload-box" id="passportUploadBox">

                            <input type="file" name="passport" id="passport" accept=".jpg,.jpeg,.png,.pdf"
                                class="form-control d-none" data-file-upload data-preview="passportPreview"
                                data-initial="passportInitialState" data-max-size="5">

                            <div class="upload-ui" data-trigger="passport">
                                <div class="upload-initial" id="passportInitialState">
                                    <i class="fas fa-id-card text-primary"></i>
                                    <p class="mt-3 mb-1">Upload Passport Copy</p>
                                    <small class="text-muted">JPG, PNG, PDF • Max 5MB</small>
                                </div>

                                <!-- Preview will be injected here -->
                                <div id="passportPreview" class="file-preview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="visaStatus" class="form-label required-label">Are you currently in
                            UAE/KSA?</label>
                        <select id="visaStatus" name="visaStatus" class="form-select required-field"
                            data-toggle-target="#visaUploadWrapper" data-toggle-value="yes">
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3 d-none" id="visaUploadWrapper">
                        <label for="visa" class="form-label required-label">Visa Copy</label>

                        <div class="upload-box" id="visaUploadBox">

                            <input type="file" name="visa" id="visa" accept=".jpg,.jpeg,.png,.pdf"
                                class="form-control d-none conditional-required" data-file-upload
                                data-preview="visaPreview" data-initial="visaInitialState" data-max-size="5">

                            <div class="upload-ui" data-trigger="visa">
                                <div class="upload-initial" id="visaInitialState">
                                    <i class="fas fa-id-card text-primary"></i>
                                    <p class="mt-3 mb-1">Upload Visa Copy</p>
                                    <small class="text-muted">JPG, PNG, PDF • Max 5MB</small>
                                </div>

                                <!-- Preview will be injected here -->
                                <div id="visaPreview" class="file-preview"></div>

                            </div>
                        </div>
                    </div>

                </div>

                <h5 class="form-section-title">Additional Notes</h5>
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <label for="worked_in_gcc" class="form-label required-label">Have you worked in GCC before?
                            (Yes / No –
                            Country)</label>
                        <input type="text" id="worked_in_gcc" name="worked_in_gcc" class="form-control required-field">
                    </div>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="wizard-btn btn-prev" data-prev>Previous</button>
                    <button type="submit" class="wizard-btn btn-next">Submit</button>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</section>

<!-- CREATE TABLE `jb_job_seeker_requests;` (
`id` INT NOT NULL AUTO_INCREMENT,
`name` VARCHAR(150) NOT NULL,
`mobile` VARCHAR(20) NOT NULL,
`email` VARCHAR(150) NOT NULL,
`nationality` VARCHAR(100) NOT NULL,
`current_location` VARCHAR(150) NOT NULL,
`applying_position` VARCHAR(150) NOT NULL,
`category` ENUM('blue_collar','white_collar') NOT NULL,
`preferred_country` VARCHAR(100) NOT NULL,
`expected_salary` INT DEFAULT NULL,
`availability` VARCHAR(50) NOT NULL,
`experience` INT NOT NULL,
`last_job_title` VARCHAR(150) NOT NULL,
`skills` VARCHAR(255) DEFAULT NULL,
`highest_qualification` VARCHAR(150) NOT NULL,
`certificate` VARCHAR(150) DEFAULT NULL,
`cv` VARCHAR(255) DEFAULT NULL,
`passport` VARCHAR(255) DEFAULT NULL,
`visa_status` ENUM('yes','no') DEFAULT 'no',
`visa` VARCHAR(255) DEFAULT NULL,
`worked_in_gcc` VARCHAR(255) DEFAULT NULL,
`additional_notes` TEXT DEFAULT NULL,
`created_at` DATETIME NOT NULL,
`status` TINYINT(1) DEFAULT 1,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci; -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#email').on('blur', function () {
            var email = $(this).val().trim();
            if (email != '') {
                $.ajax({
                    url: '<?php echo base_url("job_seeker_requests/check_email_exists"); ?>',
                    type: 'POST',
                    data: { email: email },
                    dataType: 'json',
                    success: function (response) {
                        if (response.exists) {
                            $('#email-feedback').text(response.message);
                            $('#email').addClass('is-invalid');
                        } else {
                            $('#email-feedback').text('');
                            $('#email').removeClass('is-invalid');
                        }
                    },
                    error: function () {
                        $('#email-feedback').text('Error checking email.');
                    }
                });
            } else {
                $('#email-feedback').text('');
                $('#email').removeClass('is-invalid');
            }
        });

        // Load JSON files
        $.getJSON('../navassets/json/dial-codes.json', function (data) {
            $.each(data, function (index, country) {
                $('#country_code').append(
                    $('<option></option>')
                        .val(country.dial_code)
                        .text(country.dial_code + ' (' + country.name + ')')
                );
            });
        });

        $.getJSON('../navassets/json/nationalities.json', function (data) {
            $.each(data, function (index, country) {
                $.each(data, function (index, nationalities) {
                    $('#nationality').append(
                        $('<option></option>')
                            .val(nationalities.nationality)
                            .text(nationalities.nationality)
                    );
                });
            });
        });

        // Optional: validation
        function validateMobile() {
            var country = $('#country_code option:selected').val();
            var mobile = $('#mobile').val().trim();
            var regex = /^\d+$/;

            if (!country) {
                $('#mobile-feedback').text('Please select a country');
                $('#mobile').addClass('is-invalid');
                return false;
            }

            if (!regex.test(mobile)) {
                $('#mobile-feedback').text('Mobile number should contain only digits');
                $('#mobile').addClass('is-invalid');
                return false;
            }

            $('#mobile-feedback').text('');
            $('#mobile').removeClass('is-invalid');
            return true;
        }

        $('#mobile, #country_code').on('blur change', validateMobile);

        $('form').on('submit', function (e) {
            if (!validateMobile()) {
                e.preventDefault();
                alert('Please fix your mobile number before submitting.');
            }
        });
    });
</script>