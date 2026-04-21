<div class="container py-4">

    <!-- Page header -->
    <div class="mb-4">
        <a href="<?php echo site_url('profile/' . $this->session->userdata('user_id')); ?>" class=""><i
                class="fa fa-arrow-left me-2"></i>Back to dashboard</a>
        <h3 class="page-title mt-3 mb-1">Manpower Job Quota</h3>
        <p class="text-muted mb-0">Manage and allocate workforce requirements efficiently for your organization</p>
    </div>

    <div class="row" id="quota-container">

        <?php foreach ($records as $q): ?>

            <div class="col-md-4 mb-4">
                <div class="card quota-card h-100 shadow-sm">

                    <div class="card-body">

                        <!-- Status -->
                        <div class="d-flex justify-content-between mb-2">
                            <span class="badge <?= $q->status ? 'bg-success' : 'bg-secondary' ?>">
                                <?= $q->status ? 'Open' : 'Closed' ?>
                            </span>

                            <span class="text-muted small">
                                <?= date('d M Y', strtotime($q->created_at)) ?>
                            </span>
                        </div>

                        <!-- Job Title -->
                        <h5 class="fw-bold mb-2">
                            <?= $q->job_title ?>
                        </h5>

                        <div class="mb-3">
                            <span class="fw-bold text-success">
                                <?= number_format($q->total_salary) ?> AED
                            </span>
                            <span class="text-muted small">Total Salary</span>
                        </div>

                        <ul class="list-unstyled small my-3">
                            <li class="mb-1"><strong>No. workers req:</strong>
                                <?= $q->workers_required ?>
                            </li>
                            <li class="mb-1"><strong>Duty:</strong>
                                <?= $q->duty_hours ?> hrs
                            </li>
                            <li class="mb-1"><strong>Interview:</strong>
                                <?= ucfirst(str_replace('_', ' ', $q->interview_type)) ?>
                            </li>
                            <li class="mb-1"><strong>GCC Exp:</strong>
                                <?= ucfirst(str_replace('_', ' ', $q->gcc_experience)) ?>
                            </li>
                        </ul>

                        <!-- Benefits -->
                        <div class="mb-3">

                            <?php if ($q->accommodation): ?>
                                <span class="badge bg-light text-dark border">🏠 Accommodation</span>
                            <?php endif; ?>

                            <?php if ($q->transport): ?>
                                <span class="badge bg-light text-dark border">🚐 Transport</span>
                            <?php endif; ?>

                            <?php if ($q->food): ?>
                                <span class="badge bg-light text-dark border">🍽 Food</span>
                            <?php endif; ?>

                            <?php if ($q->overtime): ?>
                                <span class="badge bg-light text-dark border">⏱ OT</span>
                            <?php endif; ?>

                            <?php if ($q->joining_flight_ticket): ?>
                                <span class="badge bg-light text-dark border">✈ Ticket</span>
                            <?php endif; ?>

                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-white border-0 p-0 pt-2">
                        <a href="javascript:void(0)" class="btn btn-primary w-100 view-job-btn" data-id="<?= $q->id ?>">
                            View
                        </a>
                    </div>

                </div>
            </div>

        <?php endforeach; ?>

    </div>

    <!-- Load More Button -->
    <?php if (count($records) > 10): ?>
        <div class="text-center mt-3">
            <button id="loadMore" class="btn btn-outline-primary">
                Load More
            </button>
        </div>
    <?php endif; ?>
</div>


<div class="modal fade" id="jobViewModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content modern-modal border-0 shadow-lg">

            <!-- HEADER -->
            <div class="modal-header border-0">
                <div>
                    <h5 class="modal-title fw-semibold mb-1" id="job_title"></h5>
                    <span id="job_status" class="status-badge"></span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body pt-2">

                <div class="info-group">

                    <div class="info-item">
                        <span class="label">Salary</span>
                        <span id="job_salary" class="value"></span>
                    </div>

                    <div class="info-item">
                        <span class="label">Workers Required</span>
                        <span id="job_workers" class="value"></span>
                    </div>

                    <div class="info-item">
                        <span class="label">Duty Hours</span>
                        <span id="job_duty" class="value"></span>
                    </div>

                    <div class="info-item">
                        <span class="label">Interview</span>
                        <span id="job_interview" class="value"></span>
                    </div>

                    <div class="info-item">
                        <span class="label">GCC Experience</span>
                        <span id="job_gcc" class="value"></span>
                    </div>

                </div>

                <!-- Benefits -->
                <div class="mt-3" id="job_benefits"></div>

            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.view-job-btn', function () {

        let id = $(this).data('id');

        $('#jobViewModal').modal('show');

        // Reset
        $('#job_title, #job_salary, #job_workers, #job_duty, #job_interview, #job_gcc').text('Loading...');
        $('#job_benefits').html('');

        $.ajax({
            url: "<?= base_url('manpower_job_quota/job_quota_view/') ?>" + id,
            type: "GET",
            dataType: "json",
            success: function (res) {

                if (res.status) {

                    let d = res.data;

                    $('#job_title').text(d.job_title);
                    $('#job_salary').text(d.total_salary + ' AED');
                    $('#job_workers').text(d.workers_required);
                    $('#job_duty').text(d.duty_hours + ' hrs');
                    $('#job_interview').text(d.interview_type.replaceAll('_', ' '));
                    $('#job_gcc').text(d.gcc_experience.replaceAll('_', ' '));

                    // Status
                    if (d.status == 1) {
                        $('#job_status').text('Open').css({
                            background: 'rgba(25,135,84,0.1)',
                            color: '#198754'
                        });
                    } else {
                        $('#job_status').text('Closed').css({
                            background: 'rgba(108,117,125,0.1)',
                            color: '#6c757d'
                        });
                    }

                    // Benefits badges
                    let benefits = '';

                    if (d.accommodation == 1)
                        benefits += `<span class="badge bg-light text-dark border me-1">🏠 Accommodation</span>`;

                    if (d.transport == 1)
                        benefits += `<span class="badge bg-light text-dark border me-1">🚐 Transport</span>`;

                    if (d.food == 1)
                        benefits += `<span class="badge bg-light text-dark border me-1">🍽 Food</span>`;

                    if (d.overtime == 1)
                        benefits += `<span class="badge bg-light text-dark border me-1">⏱ OT</span>`;

                    if (d.joining_flight_ticket == 1)
                        benefits += `<span class="badge bg-light text-dark border me-1">✈ Ticket</span>`;

                    $('#job_benefits').html(benefits);

                } else {
                    $('#job_title').text('No data found');
                }
            },
            error: function () {
                alert('Something went wrong');
            }
        });
    });
</script>