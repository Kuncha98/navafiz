<?php $this->load->view('include/header.php'); ?>
<link href="<?= base_url() ?>assets/frontend/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/jquery.tagsinput.min.css">
<style type="text/css">
    .sample-skills {
        border-bottom: 1px solid#000;
        padding-bottom: 10px;
        margin-bottom: 20px;
        margin-top: 30px;
    }
</style>
<div class="page category-page">
    <div class="clearfix"></div>

    <section class="dashboard-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="Heading-title-left black small-heading">
                            <h3>My Skills</h3>
                        </div>
                        <div class="post-job2-panel">
                            <div class="form-group"> <span
                                    class="errormessage"><?php echo validation_errors(); ?></span> </div>
                            <div class="form-group"> <span
                                    class="successmessage"><?php echo $this->session->flashdata('msg'); ?></span> </div>
                            <form action="<?= base_url('postskills') ?>" class="row" method="post" id="formd">
                                <div class="clearfix"></div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="ol-md-12 col-sm-12 col-xs-12 sample-skills">
                                            <b>Note:</b> Skills should be relevant to your profession, And should be
                                            mentioned as single or two words (Not like detailed description).
                                        </div>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <select id="jobtags" name="jobtags[]" multiple="multiple" class="form-control"
                                            style="width:100%;" autofocus>
                                            <!-- Preload saved skills -->
                                            <?php
                                            $saved_skills = !empty($profile->m_skills) ? explode(',', $profile->m_skills) : [];
                                            foreach ($saved_skills as $skill) {
                                                echo '<option value="' . trim($skill) . '" selected>' . trim($skill) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">Save <i
                                            style="font-size: 13px;margin-top: 0px;color:#fff;"
                                            class="fa fa-angle-right"></i></button>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="ol-md-12 col-sm-12 col-xs-12 sample-skills">
                                            <b>Note:</b> Skills should be relevant to your profession, And should be
                                            mentioned as single or two words (Not like detailed description).
                                        </div>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="ol-md-6 col-sm-6 col-xs-12 sample-skills">
                                            <strong>For Example Accounts/Finance Skills</strong>
                                            <br />
                                            <br />
                                            1. Financial Analysis <br />
                                            2. Budgeting <br />
                                            3. P&L Accountability <br />
                                            4. Financial Reporting <br />
                                            5. Financial Forecasting <br />
                                            6. VAT <br />
                                            7. Tax Accounting including VAT <br />
                                            8. Book Keeping <br />
                                            9. Variance Analysis <br />
                                            10. EBTIDA reporting <br />
                                            11. Internal Controls <br />
                                            12. Contract management <br />
                                            13. IFRS reporting <br />
                                            14. GAAP reporting <br />
                                            15. Voucher management <br />
                                            16. ERP Implication <br />
                                            17. 18 ERP Implementation <br />
                                            18. RFP reviews <br />
                                            19. Costing<br />
                                            20. Cash Management <br />
                                            21. Depreciation <br />
                                            22. CAPEX Management <br />
                                            23. Petty cash management <br />
                                            24. Cheque management <br />
                                            25. Analytical skills <br />
                                        </div>
                                        <div class="ol-md-6 col-sm-6 col-xs-12 sample-skills">
                                            <strong>Information Technology Skill</strong>
                                            <br />
                                            <br />
                                            1. Web Development<br />
                                            2. Web Designing<br />
                                            3. Front-end developer <br />
                                            4. Back-end developer <br />
                                            5. Java J2ee <br />
                                            6. C++<br />
                                            7. PHP & Mysql<br />
                                            8. Rect Js<br />
                                            9. Bootstrap<br />
                                            10. HTML5<br />
                                            11. CSS3<br />
                                            12. Angular Js<br />
                                            13. Asp.net<br />
                                            14. VB<br />
                                            15. C#<br />
                                            16. Sql<br />
                                        </div>
                                        <div class="ol-md-6 col-sm-6 col-xs-12 sample-skills">
                                            <strong>HSE Skills</strong>
                                            <br />
                                            <br />
                                            01. Developing safe operating procedures<br />
                                            02. Inspection <br />
                                            03. Incident investigation <br />
                                            04. Conducting Training<br />
                                            05. Knowledge of local and international HSE laws <br />
                                            06. Implementation of safety procedures.<br />
                                            07. Risk and COSHH assessment <br />
                                            08. Safety Audit<br />
                                            09. Monitoring activities with respect to standard procedures.<br />
                                            10. Making HSE plan<br />
                                            11. Visual and verbal communication of hazards<br />
                                            12. Awareness of local regulations related to HSE<br />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="ol-md-6 col-sm-6 col-xs-12 sample-skills">
                                            <strong>Office administrator: commonly desired skills.</strong>
                                            <br />
                                            <br />
                                            1- Filing / paper management.<br />
                                            2- Bookkeeping. <br />
                                            3- Typing. <br />
                                            4- Equipment handling.<br />
                                            5- Customer service skills. <br />
                                            6- Research skills<br />
                                            7- MS Excel<br />
                                            8- MS Word<br />
                                            9- MS PowerPoint<br />
                                        </div>
                                        <div class="ol-md-6 col-sm-6 col-xs-12 sample-skills">
                                            <strong>Example of Electrical Engineer Skills</strong>
                                            <br />
                                            <br />
                                            1-  Circuit Design.<br />
                                            2-  Instrumentation and Electrical Measurements<br />
                                            3- Designing feedback control<br />
                                            4- Management hot components<br />
                                            5- Working with Radio Frequency (RF)<br />
                                            6- Equipment selection.<br />
                                            7- Autocad drawing making<br />
                                            8- Reading / making of electrical drawings, <br />
                                            9- wiring diagram<br />
                                            10- Design calculations<br />
                                            11- Use of various meters for low voltage, medium voltage & high
                                            voltage.<br />
                                            12- Programmable logic controllers programming,<br />
                                            13- SCADA system<br />
                                            14- Technical troubleshooting.<br />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="ol-md-6 col-sm-6 col-xs-12 sample-skills">
                                            <strong>Architect And Interior Design skills.</strong>
                                            <br />
                                            <br />
                                            1- Architectural Designing.<br />
                                            2- Interior Designing. <br />
                                            3- Typing. <br />
                                            4- Landscape Designing.<br />
                                            5- Architectural Demonstration. <br />
                                            6- Shop Drawings<br />
                                            7- Drafting Skills<br />
                                            8- 3d Rendering <br />
                                        </div>
                                        <div class="ol-md-6 col-sm-6 col-xs-12 sample-skills">
                                            <strong>Phlebotomist skills (Examples).</strong>
                                            <br />
                                            <br />
                                            1- Blood drawing,<br />
                                            2- Performing blood culture,<br />
                                            3- Venipuncture,<br />
                                            4- Neonatal heel sticks,<br />
                                            5- Capillary punctures,<br />
                                            6- Phlebotomy equipment,<br />
                                            7- Hand-Eye Coordination,<br />
                                            8- Infection-control,<br />
                                            9- Phlebotomy safety procedures,<br />
                                            10- Anatomy,<br />
                                            11- Physiology,<br />
                                            12-  Infection control,<br />
                                            13-  Specimen processing,<br />
                                            14-  First-aid,<br />
                                            15-  Centrifugation,<br />
                                        </div>
                                    </div>
                                    <br />

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('include/footer.php'); ?>

<script>
    $(document).ready(function () {

        const select = $('#jobtags');

        // 🔹 Initialize Select2
        select.select2({
            placeholder: "Enter or select your skills",
            tags: true,
            tokenSeparators: [','],
            width: '100%'
        });

        // 🔹 Load skills from CSV file
        fetch('assets/skills.csv')
            .then(response => response.text())
            .then(csvText => {
                // Split CSV lines, remove header, trim whitespace
                let lines = csvText.split(/\r?\n/).map(line => line.trim()).filter(Boolean);
                if (lines[0].toLowerCase() === 'skills') lines.shift();

                // Remove duplicates
                const skills = [...new Set(lines)];

                // Add each as Select2 option
                skills.forEach(skill => {
                    const newOption = new Option(skill, skill, false, false);
                    select.append(newOption);
                });

                // Refresh Select2 after adding all skills
                select.trigger('change');
            })
            .catch(err => console.error('Error loading CSV:', err));

        // 🔹 Enforce word/character limits for new entries
        select.on('select2:selecting', function (e) {
            const text = e.params.args.data.text.trim();
            const wordCount = text.split(/\s+/).length;
            const charCount = text.length;

            if (wordCount > 7) {
                alert("❌ Please limit skill names to 7 words maximum.");
                e.preventDefault();
                return false;
            }
            if (charCount > 40) {
                alert("❌ Please limit skill names to 40 characters maximum.");
                e.preventDefault();
                return false;
            }
        });

        // 🔹 Prevent duplicate skills being added manually
        select.on('select2:select', function (e) {
            const added = e.params.data.text.trim().toLowerCase();
            const allOptions = select.find('option').map(function () {
                return $(this).val().trim().toLowerCase();
            }).get();

            // If duplicate found (other than this one), remove it
            const count = allOptions.filter(v => v === added).length;
            if (count > 1) {
                alert("⚠️ That skill is already in your list.");
                select.find(`option[value='${e.params.data.id}']`).remove();
                select.trigger('change');
            }
        });

    });
</script>