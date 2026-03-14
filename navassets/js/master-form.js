// document.addEventListener("DOMContentLoaded", () => {
//     FormCore.init();
//     FileUpload.init();
//     ConditionalFields.init();
//     MultipleDateTimeSelectField.init();
//     select2.init();
// });

function initMasterForm() {
    if (typeof FormCore !== "undefined") FormCore.init();
    if (typeof FileUpload !== "undefined") FileUpload.init();
    if (typeof ConditionalFields !== "undefined") ConditionalFields.init();
    if (typeof MultipleDateTimeSelectField !== "undefined") MultipleDateTimeSelectField.init();
    if (typeof select2 !== "undefined") select2.init();
}

// Wait for full page load
window.addEventListener('load', initMasterForm);

// Multi step form with validation
const FormCore = (() => {

    const form = document.getElementById("multiStepForm");
    if (!form) return {}; // Exit if multi-step form not present
    const steps = [...document.querySelectorAll(".form-step")];
    const progressSteps = [...document.querySelectorAll(".step")];
    const nextBtns = document.querySelectorAll(".btn-next");
    const prevBtns = document.querySelectorAll(".btn-prev");

    let currentStep = 0;


    // Step control
    function showStep(step) {
        steps.forEach((s, i) => {
            s.classList.toggle("active", i === step);
            if (progressSteps[i]) {
                progressSteps[i].classList.toggle("active", i <= step);
            }
        });
    }

    function validateStep(step) {
        const container = steps[step];
        let valid = true;

        const fields = container.querySelectorAll(".required-field");
        const radioGroups = new Set();

        fields.forEach(field => {
            // Skip hidden wrapper (except file)
            const wrapperHidden = field.closest(".d-none");
            if (wrapperHidden && field.type !== "file") return;

            // Radio buttons
            if (field.type === "radio") {
                if (radioGroups.has(field.name)) return;
                radioGroups.add(field.name);

                const radios = container.querySelectorAll(`input[name="${field.name}"]`);
                const checked = [...radios].some(r => r.checked);

                radios.forEach(r => {
                    const wrapper = r.closest(".form-check");
                    if (wrapper) wrapper.classList.toggle("text-danger", !checked);
                });

                if (!checked) valid = false;
            }

            // File upload
            else if (field.type === "file") {
                if (!field.files.length) {
                    valid = false;
                    field.closest(".upload-box").classList.add("border-danger");
                } else {
                    field.closest(".upload-box").classList.remove("border-danger");
                }
            }

            // Select (single or multi)
            else if (field.tagName.toLowerCase() === "select") {
                let hasValue;
                if (field.multiple) {
                    hasValue = field.selectedOptions.length > 0;
                } else {
                    hasValue = field.value !== "";
                }

                const select2Box = $(field).next('.select2-container').find('.select2-selection')[0];

                if (!hasValue) {
                    valid = false;
                    field.classList.add("is-invalid");
                    if (select2Box) {
                        select2Box.classList.add("is-invalid");
                    }
                } else {
                    field.classList.remove("is-invalid");
                    if (select2Box) {
                        select2Box.classList.remove("is-invalid");
                    }
                }

                // Remove error when user changes value
                field.addEventListener("change", () => {
                    field.classList.remove("is-invalid");
                    if (select2Box) {
                        select2Box.classList.remove("is-invalid");
                    }
                }, { once: true });

            }

            // Email validation
            else if (field.type === "email") {

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!field.value.trim() || !emailRegex.test(field.value.trim())) {
                    valid = false;
                    field.classList.add("is-invalid");
                } else {
                    field.classList.remove("is-invalid");
                }

                field.addEventListener("input", () => {
                    field.classList.remove("is-invalid");
                }, { once: true });

            }

            // Text, email, number, textarea, date
            else if (["text", "email", "number", "date"].includes(field.type) || field.tagName.toLowerCase() === "textarea") {
                if (!field.value.trim()) {
                    valid = false;
                    field.classList.add("is-invalid");
                } else {
                    // const min = field.dataset.min ? parseInt(field.dataset.min) : null;
                    // const max = field.dataset.max ? parseInt(field.dataset.max) : null;
                    // const maxLength = field.dataset.maxLength ? parseInt(field.dataset.maxLength) : null;

                    // // Max length validation
                    // if (maxLength !== null && value.length > maxLength) {
                    //     valid = false;
                    //     field.classList.add("is-invalid");
                    // }

                    // // Number range validation
                    // else if (field.type === "number" && (min !== null || max !== null)) {

                    //     const num = parseInt(value);

                    //     if ((min !== null && num < min) || (max !== null && num > max)) {
                    //         valid = false;
                    //         field.classList.add("is-invalid");
                    //     } else {
                    //         field.classList.remove("is-invalid");
                    //     }

                    // } else {
                    field.classList.remove("is-invalid");
                    // }
                }

                field.addEventListener("input", () => {
                    field.classList.remove("is-invalid");
                }, { once: true });
            }
        });

        // document.querySelectorAll('[data-max-length]').forEach(field => {

        //     const maxLength = parseInt(field.dataset.maxLength);

        //     field.addEventListener('input', function () {

        //         // Remove non-numeric characters for number inputs
        //         if (field.type === "number") {
        //             field.value = field.value.replace(/[^0-9]/g, '');
        //         }

        //         // Enforce max length
        //         if (field.value.length > maxLength) {
        //             field.value = field.value.slice(0, maxLength);
        //         }

        //     });

        // });

        return valid;
    }

    nextBtns.forEach(btn => {
        btn.addEventListener("click", e => {
            if (btn.type === "submit") return;

            if (!validateStep(currentStep)) return;

            currentStep = Math.min(currentStep + 1, steps.length - 1);
            showStep(currentStep);
        });
    });

    prevBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            currentStep = Math.max(currentStep - 1, 0);
            showStep(currentStep);
        });
    });

    form.addEventListener("submit", e => {
        if (!validateStep(currentStep)) {
            e.preventDefault();
            alert("Please fill all required fields in this step.");
        }
    });

    showStep(currentStep);

})();


// File upload field
const FileUpload = (() => {
    console.log('working')
    const fileInputs = document.querySelectorAll("[data-file-upload]");

    fileInputs.forEach(input => {
        const preview = document.getElementById(input.dataset.preview);
        const initial = document.getElementById(input.dataset.initial);
        const uploadUI = input.closest(".upload-box").querySelector(".upload-ui");
        const maxSizeMB = parseInt(input.dataset.maxSize || 5);

        // Click on UI opens file dialog
        uploadUI.addEventListener("click", () => input.click());

        input.addEventListener("change", () => {
            preview.innerHTML = "";

            if (!input.files.length) return;

            const file = input.files[0];

            if (file.size > maxSizeMB * 1024 * 1024) {
                alert(`File must be under ${maxSizeMB} MB`);
                input.value = "";
                return;
            }

            const size = (file.size / 1024 / 1024).toFixed(2);
            let icon = "fa-file text-secondary";
            if (file.type.includes("pdf")) icon = "fa-file-pdf text-danger";
            if (file.type.includes("image")) icon = "fa-file-image text-primary";

            preview.innerHTML = `
            <div class="file-preview-card position-relative">
                <div class="d-flex align-items-center">
                    <i class="fas ${icon} me-3"></i>
                    <div>
                        <p class="mb-0">${file.name}</p>
                        <small class="text-muted">${size} MB</small>
                    </div>
                </div>
                <button type="button" class="remove-file btn btn-sm text-danger position-absolute top-0 end-0">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            `;

            if (initial) initial.style.display = "none";

            // Remove file handler
            preview.querySelector(".remove-file").addEventListener("click", e => {
                e.stopPropagation();
                input.value = "";
                preview.innerHTML = "";
                if (initial) initial.style.display = "block";
            });
        });
    });
})();


// Conditional field
const ConditionalFields = (() => {
    const toggles = document.querySelectorAll("[data-toggle-target][data-toggle-value]");

    toggles.forEach(select => {

        const targetSelector = select.dataset.toggleTarget;
        const targetValue = select.dataset.toggleValue;
        const target = document.querySelector(targetSelector);

        if (!target) return;

        function toggle() {
            if (select.value === targetValue) {
                target.classList.remove("d-none");

                // Add required-field to any inputs inside target
                target.querySelectorAll(".conditional-required").forEach(el => {
                    el.classList.add("required-field");
                });
            } else {
                target.classList.add("d-none");

                // Remove required-field and reset inputs
                target.querySelectorAll(".conditional-required").forEach(el => {
                    el.classList.remove("required-field");
                    if (el.type === "file" || el.type === "select-one" || el.type === "text") {
                        el.value = "";
                    }
                    if (el.type === "file") {
                        const preview = document.getElementById(el.dataset.preview);
                        const initial = document.getElementById(el.dataset.initial);
                        if (preview) preview.innerHTML = "";
                        if (initial) initial.style.display = "block";
                    }
                });
            }
        }

        // Initial toggle
        toggle();

        // Listen for changes
        select.addEventListener("change", toggle);

    });
})();

// Multiple Date Time Select field
const MultipleDateTimeSelectField = (() => {
    const wrapper = document.getElementById("availabilityWrapper");
    const addBtn = document.getElementById("addAvailability");

    if (!wrapper || !addBtn) return;

    addBtn.addEventListener("click", function () {

        const firstItem = document.querySelector(".availability-item");
        const clone = firstItem.cloneNode(true);

        clone.querySelector("input").value = "";

        wrapper.appendChild(clone);
    });

    document.addEventListener("click", function (e) {

        if (!e.target.classList.contains("remove-availability")) return;

        const items = document.querySelectorAll(".availability-item");

        if (items.length === 1) return; // prevent deleting last one

        e.target.closest(".availability-item").remove();
    })
})();

// Select2 multi select field
const select2 = (() => {

    function multiSelectField() {
        $('.select2-field').each(function () {

            const $el = $(this);

            // Prevent reinitialization
            if ($el.hasClass('select2-hidden-accessible')) return;

            const config = {
                width: '100%',
                placeholder: $el.data('placeholder') || 'Select option',
                allowClear: true,
                tags: $el.data('tags') === true || $el.data('tags') === "true",
                tokenSeparators: [',']
            };

            $el.select2(config);

            // Add form-control class to Select2 UI
            $el.next('.select2-container').find('.select2-selection')
                .addClass('form-control');

            // Load CSV if defined
            const csv = $el.data('csv');
            if (csv) loadCSVOptions($el, csv);

            // Apply validation if needed
            const validate = $el.data('validate');
            if (validate === 'skills') initSkillValidation($el);

        });

    }

    // Load skills CSV into Select2
    function loadCSVOptions($select, url) {

        fetch(url)
            .then(res => res.text())
            .then(csv => {

                let rows = csv
                    .split(/\r?\n/)
                    .map(v => v.trim())
                    .filter(Boolean);

                // Prevent crash if CSV empty
                if (rows.length === 0) return;

                // Remove header
                if (rows[0].toLowerCase() === 'skills') rows.shift();

                const unique = [...new Set(rows)];

                const existingValues = $select.find('option')
                    .map(function () { return $(this).val(); })
                    .get();

                unique.forEach(item => {
                    if (!existingValues.includes(item)) {
                        const option = new Option(item, item, false, false);
                        $select.append(option);
                    }
                });

                $select.trigger('change');

            })
            .catch(err => console.error('CSV load error:', err));

    }

    // Skills validation
    function initSkillValidation($select) {

        // Prevent duplicate binding
        $select.off('select2:selecting');
        $select.off('select2:select');

        $select.on('select2:selecting', function (e) {

            const text = e.params.args.data.text.trim();
            const wordCount = text.split(/\s+/).length;
            const charCount = text.length;

            if (wordCount > 7) {
                alert("❌ Maximum 7 words allowed.");
                e.preventDefault();
                return false;
            }

            if (charCount > 40) {
                alert("❌ Maximum 40 characters allowed.");
                e.preventDefault();
                return false;
            }

        });

        $select.on('select2:select', function (e) {

            const added = e.params.data.text.trim().toLowerCase();

            const values = $select.find('option')
                .map(function () {
                    return $(this).val().trim().toLowerCase();
                }).get();

            const count = values.filter(v => v === added).length;

            if (count > 1) {
                alert("⚠️ Duplicate skill detected.");
                $select.find(`option[value="${e.params.data.id}"]`).remove();
                $select.trigger('change');
            }

        });

    }

    multiSelectField();

})();