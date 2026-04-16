<section class="submition-form-section py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <p class="section-subtitle">Share your expertise and guide professionals through mentorship opportunities
            </p>
            <h2 class="section-title">Mentor Application Form</h2>
        </div>

        <!-- Form card -->
        <div class="submition-form-card">
            <?php
            $attributes = array(
                'id' => 'multiStepForm'
            );
            echo form_open_multipart('/services/become-a-mentor/submit', $attributes);
            ?>

            <!-- Step progress -->
            <div class="step-progress">
                <div class="step active">
                    <p class="step-circle">1</p>
                    <p class="step-title">Basic Information</p>
                </div>
                <div class="step">
                    <p class="step-circle">2</p>
                    <p class="step-title">Mentorship</p>
                </div>
                <div class="step">
                    <p class="step-circle">3</p>
                    <p class="step-title">Interview & Submit</p>
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
                        <label for="professional_title" class="form-label required-label">Professional Title</label>
                        <input type="text" id="professional_title" name="professional_title"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="company" class="form-label required-label">Company / Industry</label>
                        <input type="text" id="company" name="company" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="experience" class="form-label required-label">Years of Experience</label>
                        <input type="number" id="experience" name="experience" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label required-label">City / Country</label>
                        <input type="text" id="location" name="location" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mobile" class="form-label required-label">Mobile Number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label required-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control required-field">
                        <small id="email-feedback" class="text-danger"></small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="linkedIn" class="form-label required-label">LinkedIn Profile
                        </label>
                        <input type="text" id="linkedIn" name="linkedIn" class="form-control required-field" required>
                    </div>
                </div>

                <!-- Actions -->
                <div class="text-end">
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>
            </div>

            <!-- Step 02 -->
            <div class="form-step" data-step="2">

                <h5 class="form-section-title">Mentorship Focus</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="expertise_areas" class="form-label required-label">Areas of Expertise (e.g., Career
                            Growth, Business, HR, Sales, Tech, Leadership)</label>
                        <input type="text" id="expertise_areas" name="expertise_areas"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label"> Who Do You Want to
                            Mentor?</label>
                        <div class="form-check">
                            <input class="form-check-input required-field" type="checkbox" id="students"
                                name="students">
                            <label for="students" class="form-check-label">Students</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input required-field" type="checkbox" id="job_seekers"
                                name="job_seekers">
                            <label for="job_seekers" class="form-check-label">Job Seekers</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input required-field" type="checkbox" id="entrepreneurs"
                                name="entrepreneurs">
                            <label for="entrepreneurs" class="form-check-label">Entrepreneurs</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input required-field" type="checkbox" id="professionals"
                                name="professionals">
                            <label for="professionals" class="form-check-label">Professionals</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="languages_spoken" class="form-label required-label">Languages Spoken</label>
                        <input type="text" id="languages_spoken" name="languages_spoken"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mentorship_type" class="form-label required-label">Mentorship Type</label>
                        <select id="mentorship_type" name="mentorship_type" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option value="one_on_one">One-on-One</option>
                            <option value="group_session">Group Session</option>
                            <option value="workshop">Workshop</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="conducting_mode" class="form-label required-label">Conducting Mode</label>
                        <select id="conducting_mode" name="conducting_mode" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option value="online">Online</option>
                            <option value="in_person">In-Person</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="session_duration" class="form-label required-label">Session Duration (In
                            minutes)</label>
                        <input type="number" id="session_duration" name="session_duration"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label required-label">
                            Availability (Date & Time)
                        </label>

                        <div id="availabilityWrapper">

                            <div class="availability-item row g-2 mb-2">

                                <div class="col-md-10">
                                    <input type="datetime-local" name="available_at[]"
                                        class="form-control required-field" required>
                                </div>

                                <div class="col-md-2 d-flex">
                                    <button type="button" class="btn btn-outline-danger w-100 remove-availability">
                                        Remove
                                    </button>
                                </div>

                            </div>

                        </div>

                        <button type="button" class="btn btn-outline-primary mt-2" id="addAvailability">
                            + Add Another Slot
                        </button>
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

                <h5 class="form-section-title">Interview Process</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="personal_intro" class="form-label">Brief Bio (100–150 words)</label>
                        <textarea id="personal_intro" name="personal_intro" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="key_achievement" class="form-label">Key Achievement (1–3 highlights)</label>
                        <textarea id="key_achievement" name="key_achievement" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="previous_mentoring" class="form-label required-label">Previous Mentoring
                            Experience</label>
                        <select id="previous_mentoring" name="previous_mentoring" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="paid_type" class="form-label required-label">Paid or Voluntary?</label>
                        <select id="paid_type" name="paid_type" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option>Paid</option>
                            <option>Voluntary</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="additional_notes" class="form-label">Why Do You Want to Be a Mentor?</label>
                        <textarea id="additional_notes" name="additional_notes" rows="4"
                            class="form-control"></textarea>
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



<!-- CREATE TABLE `jb_mentor_requests` (
`id` INT(11) NOT NULL AUTO_INCREMENT,

`name` VARCHAR(150) NOT NULL,
`professional_title` VARCHAR(150) NOT NULL,
`company` VARCHAR(150) NOT NULL,
`experience` INT(3) NOT NULL,
`location` VARCHAR(150) NOT NULL,
`mobile` VARCHAR(20) NOT NULL,
`email` VARCHAR(150) NOT NULL,
`linkedin` VARCHAR(255) NOT NULL,

`expertise_areas` VARCHAR(255) NOT NULL,
`students` TINYINT(1) DEFAULT 0,
`job_seekers` TINYINT(1) DEFAULT 0,
`entrepreneurs` TINYINT(1) DEFAULT 0,
`professionals` TINYINT(1) DEFAULT 0,
`languages_spoken` VARCHAR(255) NOT NULL,
`mentorship_type` VARCHAR(50) NOT NULL,
`conducting_mode` VARCHAR(50) NOT NULL,
`session_duration` INT(4) NOT NULL,
`available_at` TEXT NOT NULL,

`personal_intro` TEXT NULL,
`key_achievement` TEXT NULL,
`previous_mentoring` VARCHAR(10) NOT NULL,
`paid_type` VARCHAR(20) NOT NULL,
`additional_notes` TEXT NULL,

`created_at` DATETIME NOT NULL,
`status` TINYINT(1) DEFAULT 1,

PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#email').on('blur', function () {
            var email = $(this).val().trim();
            if (email != '') {
                $.ajax({
                    url: '<?php echo base_url("mentor_requests/check_email_exists"); ?>',
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