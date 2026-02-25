document.addEventListener("DOMContentLoaded", () => {
    FormCore.init();
    FileUpload.init();
    ConditionalFields.init();
    MultipleDateTimeSelectField.init();
});

// Multi step form with validation
const FormCore = (() => {

    const form = document.getElementById("multiStepForm");
    const steps = [...document.querySelectorAll(".form-step")];
    const progressSteps = [...document.querySelectorAll(".step")];
    const nextBtns = document.querySelectorAll(".btn-next");
    const prevBtns = document.querySelectorAll(".btn-prev");

    let currentStep = 0;


    // Step control
    function showStep(step) {
        steps.forEach((s, i) => {
            s.classList.toggle("active", i === step);
            progressSteps[i].classList.toggle("active", i <= step);
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
                if (field.multiple) {
                    if (field.selectedOptions.length === 0) {
                        valid = false;
                        field.classList.add("is-invalid");
                    } else {
                        field.classList.remove("is-invalid");
                    }
                } else {
                    if (!field.value) {
                        valid = false;
                        field.classList.add("is-invalid");
                    } else {
                        field.classList.remove("is-invalid");
                    }
                }
            }

            // Text, email, number, textarea
            else if (["text", "email", "number"].includes(field.type) || field.tagName.toLowerCase() === "textarea") {
                if (!field.value.trim()) {
                    valid = false;
                    field.classList.add("is-invalid");
                } else {
                    field.classList.remove("is-invalid");
                }
            }
        });

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