<section class="submition-form-section py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <p class="section-subtitle">Partner with us to provide skilled workforce solutions</p>
            <h2 class="section-title">Manpower Supply Company Registration</h2>
        </div>

        <!-- Form card -->
        <div class="submition-form-card">

            <?php
            $attributes = array(
                'id' => 'multiStepForm'
            );
            echo form_open_multipart('/services/supply-manpower/submit', $attributes);
            ?>

            <!-- Step progress -->
            <div class="step-progress">

                <div class="step active">
                    <p class="step-circle">1</p>
                    <p class="step-title">Company Info</p>
                </div>

                <div class="step">
                    <p class="step-circle">2</p>
                    <p class="step-title">License & Contact</p>
                </div>

                <div class="step">
                    <p class="step-circle">3</p>
                    <p class="step-title">Manpower Supply</p>
                </div>

                <div class="step">
                    <p class="step-circle">4</p>
                    <p class="step-title">Testing Facilities</p>
                </div>

                <div class="step">
                    <p class="step-circle">5</p>
                    <p class="step-title">Online Presence</p>
                </div>

            </div>


            <!-- STEP 1 -->
            <div class="form-step active" data-step="1">

                <h5 class="form-section-title">Company Basic Information</h5>

                <div class="row mb-4">

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Company Name</label>
                        <input type="text" name="company_name" class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Country of Operation</label>
                        <input type="text" name="country_of_operation" class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">City</label>
                        <input type="text" name="city" class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Company Registration Number</label>
                        <input type="text" name="company_registration_number" class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Year Established</label>
                        <input type="number" name="year_established" class="form-control required-field" data-min="1900"
                            data-max="2100" oninput="if(this.value.length > 4) this.value = this.value.slice(0,4);"
                            data-max-length="4" placeholder="YYYY">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Company Type</label>
                        <select name="company_type" class="form-select required-field">
                            <option value="">Select</option>
                            <option value="recruitment_agency">Recruitment Agency</option>
                            <option value="manpower_supply_company">Manpower Supply Company</option>
                            <option value="hr_consultancy">HR Consultancy</option>
                        </select>
                    </div>

                </div>

                <div class="text-end">
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>

            </div>

            <!-- STEP 2 -->
            <div class="form-step" data-step="2">

                <h5 class="form-section-title">License & Legal Verification</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="recruitment_license_number" class="form-label required-label">Recruitment License
                            Number</label>
                        <input type="text" id="recruitment_license_number" name="recruitment_license_number"
                            class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="license_issuing_authority" class="form-label required-label">License Issuing
                            Authority</label>
                        <input type="text" id="license_issuing_authority" name="license_issuing_authority"
                            class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="license_expiry_date" class="form-label required-label">License Expiry Date</label>
                        <input type="date" id="license_expiry_date" name="license_expiry_date"
                            class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tax_registration_number" class="form-label">Tax Registration Number</label>
                        <input type="text" id="tax_registration_number" name="tax_registration_number"
                            class="form-control">
                    </div>
                </div>

                <h5 class="form-section-title">Upload Documents</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="recruitment_license_file" class="form-label required-label">Recruitment
                            License</label>

                        <div class="upload-box" id="recruitmentLicenseUploadBox">

                            <input type="file" name="recruitment_license_file" id="recruitment_license_file"
                                accept=".pdf" class="form-control d-none required-field" data-file-upload
                                data-preview="recruitmentLicensePreview" data-initial="recruitmentLicenseInitialState"
                                data-max-size="5">

                            <div class="upload-ui" data-trigger="recruitment_license_file">
                                <div class="upload-initial" id="recruitmentLicenseInitialState">
                                    <i class="fas fa-file-pdf text-danger"></i>
                                    <p class="mt-3 mb-1">Upload Recruitment License (PDF only)</p>
                                    <small class="text-muted">Max size: 5MB</small>
                                </div>

                                <div class="file-preview" id="recruitmentLicensePreview"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="company_registration_certificate" class="form-label required-label">Company
                            Registration
                            Certificate</label>

                        <div class="upload-box" id="companyRegCertUploadBox">
                            <input type="file" name="company_registration_certificate"
                                id="company_registration_certificate" accept=".pdf"
                                class="form-control d-none required-field" data-file-upload
                                data-preview="companyRegCertPreview" data-initial="companyRegCertInitialState"
                                data-max-size="5">

                            <div class="upload-ui" data-trigger="company_registration_certificate">
                                <div class="upload-initial" id="companyRegCertInitialState">
                                    <i class="fas fa-file-pdf text-danger"></i>
                                    <p class="mt-3 mb-1">Upload Company Registration Certificate (PDF only)</p>
                                    <small class="text-muted">Max size: 5MB</small>
                                </div>

                                <div class="file-preview" id="companyRegCertPreview"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="form-section-title">Contact Person</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="contact_person_name" class="form-label required-label">Contact Person Name</label>
                        <input type="text" id="contact_person_name" name="contact_person_name"
                            class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="designation" class="form-label required-label">Designation</label>
                        <input type="text" id="designation" name="designation" class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="mobile_number" class="form-label required-label">Mobile Number</label>
                        <input type="text" id="mobile_number" name="mobile_number" class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
                        <input type="text" id="whatsapp_number" name="whatsapp_number" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label required-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control required-field">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="office_address" class="form-label required-label">Office Address</label>
                        <textarea id="office_address" name="office_address"
                            class="form-control required-field"></textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="wizard-btn btn-prev" data-prev>Previous</button>
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>
            </div>

            <!-- STEP 3 -->
            <div class="form-step" data-step="3">

                <h5 class="form-section-title">Countries They Supply Workers To</h5>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="supply_countries" class="form-label required-label">Countries You Supply Workers To
                            (Multi
                            Select)</label>
                        <select id="supply_countries" name="supply_countries[]" multiple="multiple"
                            class="form-select required-field select2-field" data-placeholder="Select supply countries"
                            autofocus>
                            <option value="uae">UAE</option>
                            <option value="saudi_arabia">Saudi Arabia</option>
                            <option value="qatar">Qatar</option>
                            <option value="kuwait">Kuwait</option>
                            <option value="oman">Oman</option>
                            <option value="bahrain">Bahrain</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="source_countries" class="form-label required-label">Source Countries
                            (Multi
                            Select)</label>
                        <select id="source_countries" name="source_countries[]" multiple="multiple"
                            class="form-select required-field select2-field" data-placeholder="Select source countries"
                            autofocus>
                            <option value="india">India</option>
                            <option value="pakistan">Pakistan</option>
                            <option value="nepal">Nepal</option>
                            <option value="sri_lanka">Sri Lanka</option>
                            <option value="bangladesh">Bangladesh</option>
                            <option value="philippines">Philippines</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="industries_served" class="form-label required-label">Major Industries Served
                            (Multi
                            Select)</label>
                        <select id="industries_served" name="industries_served[]" multiple="multiple"
                            class="form-select required-field select2-field" data-placeholder="Select industries"
                            autofocus>
                            <option value="construction">Construction</option>
                            <option value="oil_gas">Oil & Gas</option>
                            <option value="hospitality">Hospitality</option>
                            <option value="manufacturing">Manufacturing</option>
                            <option value="facility_management">Facility Management</option>
                        </select>
                    </div>
                </div>

                <h5 class="form-section-title">Categories of Manpower Available</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="manpower_categories_blue" class="form-label">Categories of Manpower
                            Available - Blue Collar
                            (Multi
                            Select)</label>
                        <select id="manpower_categories_blue" name="manpower_categories[]" multiple="multiple"
                            class="form-select select2-field" data-placeholder="Select blue collar categories"
                            autofocus>
                            <option value="mason">Mason</option>
                            <option value="carpenter">Carpenter</option>
                            <option value="steel_fixer">Steel Fixer</option>
                            <option value="electrician">Electrician</option>
                            <option value="plumber">Plumber</option>
                            <option value="painter">Painter</option>
                            <option value="helpers">Helpers</option>
                            <option value="drivers">Drivers</option>
                            <option value="welders">Welders</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="manpower_categories_white" class="form-label">Categories of Manpower
                            Available - White Collar
                            (Multi
                            Select)</label>
                        <select id="manpower_categories_white" name="manpower_categories[]" multiple="multiple"
                            class="form-select select2-field" data-placeholder="Select white collar categories"
                            autofocus>
                            <option value="engineers">Engineers</option>
                            <option value="supervisors">Supervisors</option>
                            <option value="accountants">Accountants</option>
                            <option value="sales_staff">Sales Staff</option>
                            <option value="office_admin">Office Admin</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="wizard-btn btn-prev" data-prev>Previous</button>
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>
            </div>

            <!-- STEP 4 -->
            <div class="form-step" data-step="4">

                <h5 class="form-section-title">Trade Testing Center</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label d-block required-label">Do you a Trade Testing Center?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input required-field" type="radio" id="trade_testing_center_yes"
                                name="trade_testing_center" value="1">
                            <label for="trade_testing_center_yes" class="form-check-label">Yes</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input required-field" type="radio" id="trade_testing_center_no"
                                name="trade_testing_center" value="0">
                            <label for="trade_testing_center_no" class="form-check-label">No</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="testing_categories_available" class="form-label">Testing Categories
                            Available</label>
                        <input type="text" id="testing_categories_available" name="testing_categories_available"
                            class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="testing_center_photos" class="form-label">Upload Testing
                            Center Photo</label>

                        <div class="upload-box" id="testinfCenterUploadBox">
                            <input type="file" name="testing_center_photos[]" id="testing_center_photos"
                                accept=".jpg,.jpeg,.png,.pdf" class="form-control d-none" data-file-upload
                                data-preview="testinfCenterPreview" data-initial="testinfCenterInitialState"
                                data-max-size="5">

                            <div class="upload-ui" data-trigger="testing_center_photos">
                                <div class="upload-initial" id="testinfCenterInitialState">
                                    <i class="fas fa-file-pdf text-danger"></i>
                                    <p class="mt-3 mb-1">Upload Testing
                                        Center Photo</p>
                                    <small class="text-muted">JPG, PNG, PDF • Max 5MB</small>
                                </div>

                                <div class="file-preview" id="testinfCenterPreview"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="wizard-btn btn-prev" data-prev>Previous</button>
                    <button type="button" class="wizard-btn btn-next" data-next>Next</button>
                </div>
            </div>


            <!-- STEP 5 -->
            <div class="form-step" data-step="5">

                <h5 class="form-section-title">Online Presence</h5>
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Company Website</label>
                        <input type="text" name="company_website" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">LinkedIn Page</label>
                        <input type="text" name="linkedin_page" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Facebook Page</label>
                        <input type="text" name="facebook_page" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="wizard-btn btn-prev" data-prev>Previous</button>
                    <button type="submit" class="wizard-btn btn-next">Submit</button>
                </div>

            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
    </div>
</section>



<!-- CREATE TABLE `jb_manpower_supply_requests` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`company_name` VARCHAR(150) NOT NULL,
`country_of_operation` VARCHAR(100) NOT NULL,
`city` VARCHAR(100) NOT NULL,
`company_registration_number` VARCHAR(100) NOT NULL,
`year_established` YEAR NOT NULL,
`company_type` VARCHAR(50) NOT NULL,
`recruitment_license_number` VARCHAR(100) NOT NULL,
`license_issuing_authority` VARCHAR(150) NOT NULL,
`license_expiry_date` DATE NOT NULL,
`recruitment_license_file` VARCHAR(255) DEFAULT NULL,
`company_registration_certificate` VARCHAR(255) DEFAULT NULL,
`tax_registration_number` VARCHAR(100) DEFAULT NULL,
`contact_person_name` VARCHAR(150) NOT NULL,
`designation` VARCHAR(100) NOT NULL,
`mobile_number` VARCHAR(20) NOT NULL,
`whatsapp_number` VARCHAR(20) DEFAULT NULL,
`email` VARCHAR(150) NOT NULL,
`office_address` TEXT NOT NULL,
`supply_countries` TEXT NOT NULL,
`source_countries` TEXT NOT NULL,
`manpower_categories` TEXT NOT NULL,
`trade_testing_center` TINYINT(1) DEFAULT 0,
`testing_center_photos` TEXT DEFAULT NULL,
`testing_categories_available` TEXT DEFAULT NULL,
`industries_served` TEXT DEFAULT NULL,
`company_website` VARCHAR(255) DEFAULT NULL,
`linkedin_page` VARCHAR(255) DEFAULT NULL,
`facebook_page` VARCHAR(255) DEFAULT NULL,
`created_at` DATETIME NOT NULL,
`status` TINYINT(1) DEFAULT 1,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; -->