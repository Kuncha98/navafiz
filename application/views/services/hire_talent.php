<?= $this->extend('layouts/website/website_layout') ?>
<?= $this->section('content') ?>

<section class="submition-form-section py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <p class="section-subtitle">Recruitment Request</p>
            <h2 class="section-title">Hire Talent Request Form</h2>
        </div>

        <!-- Form card -->
        <div class="submition-form-card">
            <?= form_open('/services/hire-a-talent/submit', [
                'id' => 'multiStepForm',
                'enctype' => 'multipart/form-data'
            ]) ?>
            <?= csrf_field() ?>

            <!-- Step progress -->
            <div class="step-progress">
                <div class="step active">
                    <p class="step-circle">1</p>
                    <p class="step-title">Company & Position</p>
                </div>
                <div class="step">
                    <p class="step-circle">2</p>
                    <p class="step-title">Requirements & Salary</p>
                </div>
                <div class="step">
                    <p class="step-circle">3</p>
                    <p class="step-title">Interview & Submit</p>
                </div>
            </div>

            <!-- Step 01 -->
            <div class="form-step active" data-step="1">

                <h5 class="form-section-title">Company Details</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="company_name" class="form-label required-label">Company Name</label>
                        <input type="text" id="company_name" name="company_name" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contact_person" class="form-label required-label">Contact Person</label>
                        <input type="text" id="contact_person" name="contact_person"
                            class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mobile" class="form-label required-label">Mobile Number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label required-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="work_location" class="form-label required-label">Work Location (City/Country)
                        </label>
                        <input type="text" id="work_location" name="work_location" class="form-control required-field"
                            required>
                    </div>
                </div>

                <h5 class="form-section-title">Position Details</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="job_title" class="form-label required-label">Job Title</label>
                        <input type="text" id="job_title" name="job_title" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="workers_required" class="form-label required-label">Number of Workers
                            Required</label>
                        <input type="number" id="workers_required" name="workers_required"
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
                        <label for="employment_type" class="form-label required-label">Employment Type</label>
                        <select id="employment_type" name="employment_type" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option value="full_time">Full-time</option>
                            <option value="contract">Contract</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="joining_date" class="form-label required-label">Expected Joining Date</label>
                        <input type="date" id="joining_date" name="joining_date" class="form-control required-field">
                    </div>
                </div>

                <!-- Actions -->
                <div class="text-end">
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>
            </div>

            <!-- Step 02 -->
            <div class="form-step" data-step="2">

                <h5 class="form-section-title">Candidate Requirements</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="education" class="form-label">Education</label>
                        <input type="text" id="education" name="education" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="experience" class="form-label">Experience (Years + Field)</label>
                        <input type="text" id="experience" name="experience" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="skills" class="form-label">Key Skills Needed</label>
                        <input type="text" id="skills" name="skills" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="language" class="form-label">Language Requirement</label>
                        <input type="text" id="language" name="language" class="form-control">
                    </div>
                </div>

                <h5 class="form-section-title">Salary Range</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="salary_min" class="form-label required-label">Minimum Salary</label>
                        <input type="number" id="salary_min" name="salary_min" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="salary_max" class="form-label required-label">Maximum Salary</label>
                        <input type="number" id="salary_max" name="salary_max" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input required-field" type="checkbox" id="accommodation"
                                name="accommodation">
                            <label for="accommodation" class="form-check-label">Accommodation</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input required-field" type="checkbox" id="transport"
                                name="transport">
                            <label for="transport" class="form-check-label">Transportation</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input required-field" type="checkbox" id="food" name="food">
                            <label for="food" class="form-check-label">Food</label>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="other_benefits" class="form-label">Other Benefits</label>
                        <textarea id="other_benefits" name="other_benefits" rows="3" class="form-control"></textarea>
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
                        <label for="interview_type" class="form-label required-label">Interview Type</label>
                        <select id="interview_type" name="interview_type" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option>Online</option>
                            <option>In-person</option>
                            <option>CV Selection</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trade_test" class="form-label required-label">Trade Test Required
                        </label>
                        <select id="trade_test" name="trade_test" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="additional_notes" class="form-label">Additional Notes</label>
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

            <?= form_close() ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>