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
                        <a href="#" class="btn btn-primary w-100">
                            Collabrate on Hiring
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