<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <p class="section-subtitle">Apply to join our network of independent professionals and freelancers</p>
            <h2 class="section-title">Freelancer Registration Form</h2>
        </div>

        <!-- Form card -->
        <div class="submition-form-card">
            <?php
            $attributes = array(
                'id' => 'multiStepForm'
            );
            echo form_open_multipart('/services/become-a-freelancer/submit', $attributes);
            ?>

            <!-- Step progress -->
            <div class="step-progress">
                <div class="step active">
                    <p class="step-circle">1</p>
                    <p class="step-title">Personal Info</p>
                </div>
                <div class="step">
                    <p class="step-circle">2</p>
                    <p class="step-title">Skills & Pricing</p>
                </div>
                <div class="step">
                    <p class="step-circle">3</p>
                    <p class="step-title">Documents & Submit</p>
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
                        <label for="professional_title" class="form-label required-label">Professional Title (e.g.
                            Electrician,
                            Graphic Designer, Accountant)</label>
                        <input type="text" id="professional_title" name="professional_title"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="current_location" class="form-label required-label">Current Location (City &
                            Country)
                        </label>
                        <input type="text" id="current_location" name="current_location"
                            class="form-control required-field" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mobile" class="form-label required-label">Mobile Number (WhatsApp)</label>
                        <input type="text" id="mobile" name="mobile" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label required-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control required-field">
                        <small id="email-feedback" class="text-danger"></small>
                    </div>
                </div>

                <!-- Actions -->
                <div class="text-end">
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>
            </div>

            <!-- Step 02 -->
            <div class="form-step" data-step="2">
                <h5 class="form-section-title">Skills & Experience</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="experience" class="form-label required-label">Total Years of Experience</label>
                        <input type="number" id="experience" name="experience" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="skills" class="form-label">Key Skills</label>
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
                    <div class="col-md-6 mb-3">
                        <label for="portfolio" class="form-label">Portfolio / Work Samples Link</label>
                        <input type="text" id="portfolio" name="portfolio" class="form-control">
                    </div>
                </div>

                <h5 class="form-section-title">Work Preferences</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="work_type" class="form-label required-label">Work Type</label>
                        <select id="work_type" name="work_type" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option value="remote">Remote</option>
                            <option value="on_site">On-site</option>
                            <option value="both">Both</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="availability_type" class="form-label required-label">Availability Type</label>
                        <select id="availability_type" name="availability_type" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option value="full_time">Full-Time</option>
                            <option value="part_time">Part-Time</option>
                            <option value="project_based">Project-Based</option>
                        </select>
                    </div>
                </div>

                <h5 class="form-section-title">Pricing</h5>
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <label for="rate_type" class="form-label required-label">Rate Type</label>
                        <select name="rate_type" class="form-select required-field">
                            <option value="">Select</option>
                            <option value="hourly">Hourly</option>
                            <option value="project">Project</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="rate_amount" class="form-label required-label">Rate Amount</label>
                        <input type="number" step="0.01" name="rate_amount" class="form-control required-field">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="currency" class="form-label required-label">Currency</label>
                        <select name="currency" class="form-select required-field">
                            <option value="USD">USD</option>
                            <option value="LKR">LKR</option>
                        </select>
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
                                    <p class="mt-3 mb-1">Upload your CV (PDF only)</p>
                                    <small class="text-muted">Max size: 5MB</small>
                                </div>

                                <!-- Preview will be injected here -->
                                <div class="file-preview" id="cvPreview"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="form-section-title">Short Introduction</h5>
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <label for="brief" class="form-label required-label">Brief About You (100–150
                            words)</label>
                        <textarea id="brief" name="brief" rows="3" class="form-control required-field"></textarea>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#email').on('blur', function () {
            var email = $(this).val().trim();
            if (email != '') {
                $.ajax({
                    url: '<?php echo base_url("freelancer_requests/check_email_exists"); ?>',
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