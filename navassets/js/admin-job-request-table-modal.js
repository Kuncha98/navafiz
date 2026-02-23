document.addEventListener('click', function (e) {

    if (e.target.classList.contains('viewJobBtn')) {

        let jobId = e.target.getAttribute('data-id');

        fetch(`/admin/job-requests/show/${jobId}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(response => response.json())
            .then(res => {

                if (!res.status) {
                    alert(res.message);
                    return;
                }

                let job = res.data;

                let html = `
         <div>
            <h6 class="form-section-title">Company Details</h6>
            <div class="row g-3">
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Company:</strong> ${job.company_name}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Contact:</strong> ${job.contact_person}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Mobile:</strong> ${job.mobile}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Email:</strong> ${job.email}</p>
                </div>
            </div>
            <hr>
            <h6 class="form-section-title">Job Information</h6>
            <div class="row g-3">
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Title:</strong> ${job.job_title}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Workers Required:</strong> ${job.workers_required}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Category:</strong> ${job.category.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase())}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Employment Type:</strong> ${job.employment_type.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase())}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Joining Date:</strong> ${job.joining_date}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Status:</strong> ${job.status}</p>
                </div>
            </div>
            <hr>
            <h6 class="form-section-title">Salary & Benefits</h6>
            <div class="row g-3">
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Salary:</strong> AED ${job.salary_min} - AED ${job.salary_max}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Accommodation:</strong> ${job.accommodation == 1 ? 'Yes' : 'No'}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Transport:</strong>${job.transport == 1 ? 'Yes' : 'No'}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Food:</strong> ${job.food == 1 ? 'Yes' : 'No'}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Other Benefits:</strong> ${job.other_benefits ?? '-'}</p>
                </div>
            </div>
            <hr>
            <h6 class="form-section-title">Requirements</h6>
            <div class="row g-3">
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Education:</strong>${job.education ?? '-'}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Experience:</strong> ${job.experience ?? '-'}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Skills:</strong>${job.skills ?? '-'}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Language:</strong> ${job.language ?? '-'}</p>
                </div>
            </div>
            <hr>
            <h6 class="form-section-title">Interview Process</h6>
            <div class="row g-3">
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Type:</strong>${job.interview_type}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Trade Test:</strong> ${job.trade_test}</p>
                </div>
                <div class="col-md-6 m-0">
                    <p class="mb-2"><strong class="me-2">Notes:</strong>${job.additional_notes ?? '-'}</p>
                </div>
            </div>
        </div>
    `;

                document.getElementById('jobDetailContent').innerHTML = html;

                let modal = new bootstrap.Modal(document.getElementById('jobDetailModal'));
                modal.show();
            });
    }
});