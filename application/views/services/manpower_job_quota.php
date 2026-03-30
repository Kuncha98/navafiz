<section class="submition-form-section py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <p class="section-subtitle">Submit your manpower job quota requirements to streamline workforce planning</p>
            <h2 class="section-title">Manpower Job Quota Submission</h2>
        </div>

        <!-- Form card -->
        <div class="submition-form-card">

            <?php
            $attributes = array(
                'id' => 'multiStepForm'
            );
            echo form_open_multipart('/services/manpower-job-quota/submit', $attributes);
            ?>

            <!-- Step progress -->
            <div class="step-progress">
                <div class="step active">
                    <p class="step-circle">1</p>
                    <p class="step-title">Position</p>
                </div>
                <div class="step">
                    <p class="step-circle">2</p>
                    <p class="step-title">Salary & Benefits</p>
                </div>
                <div class="step">
                    <p class="step-circle">3</p>
                    <p class="step-title">Interview & Submit</p>
                </div>
            </div>

            <!-- Step 01 -->
            <div class="form-step active" data-step="1">

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
                        <label for="duty_hours" class="form-label required-label">Duty Hours</label>
                        <input type="number" id="duty_hours" name="duty_hours" class="form-control required-field">
                    </div>
                </div>

                <!-- Actions -->
                <div class="text-end">
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>
            </div>

            <!-- Step 02 -->
            <div class="form-step" data-step="2">

                <h5 class="form-section-title">Salary & Benefits</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="basic_salary" class="form-label required-label">Basic Salary (AED)</label>
                        <input type="number" id="basic_salary" name="basic_salary" class="form-control required-field">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="total_salary" class="form-label required-label">Total Salary (AED)</label>
                        <input type="number" id="total_salary" name="total_salary" class="form-control required-field">
                    </div>
                    <div class="col-md-12 mb-3">
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

                        <div class="form-check form-check-inline">
                            <input class="form-check-input required-field" type="checkbox" id="overtime"
                                name="overtime">
                            <label for="overtime" class="form-check-label">Overtime</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input required-field" type="checkbox" id="joining_flight_ticket"
                                name="joining_flight_ticket">
                            <label for="joining_flight_ticket" class="form-check-label">Joining Flight Ticket</label>
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
                            <option value="online">Online</option>
                            <option value="in_person">In-person</option>
                            <option value="cv_selection">CV Selection</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="gcc_experience" class="form-label required-label">GCC Experience</label>
                        <select id="gcc_experience" name="gcc_experience" class="form-select required-field">
                            <option value="">Select Type</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="required">Required</option>
                            <option value="preferred">Preferred</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="additional_notes" class="form-label">Additional Notes</label>
                        <textarea id="additional_notes" name="additional_notes" rows="3"
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
<!-- 
CREATE TABLE `jb_manpower_job_quote` (
`id` int NOT NULL AUTO_INCREMENT,
`job_title` varchar(150) NOT NULL,
`workers_required` int NOT NULL,
`duty_hours` int NOT NULL,
`basic_salary` int NOT NULL,
`total_salary` int NOT NULL,
`accommodation` tinyint(1) DEFAULT '0',
`transport` tinyint(1) DEFAULT '0',
`food` tinyint(1) DEFAULT '0',
`overtime` tinyint(1) DEFAULT '0',
`joining_flight_ticket` tinyint(1) DEFAULT '0',
`other_benefits` text DEFAULT NULL,
`interview_type` varchar(50) NOT NULL,
`gcc_experience` varchar(10) NOT NULL,
`additional_notes` text DEFAULT NULL,
`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`status` tinyint(1) DEFAULT '1',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci; -->