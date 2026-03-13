<div class="container py-4">

    <!-- Page header -->
    <div class="mb-4">
        <a href="<?php echo site_url('n/' . $this->session->userdata('username')); ?>" class=""><i
                class="fa fa-arrow-left me-2"></i>Back to dashboard</a>
        <h3 class="page-title mt-3 mb-1">Employer Applications Management</h3>
        <p class="text-muted mb-0">Review and manage all job applications submitted by employers.</p>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 candidate-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Job Title</th>
                    <th>Workers</th>
                    <th>Category</th>
                    <th>Employment Type</th>
                    <th>Joining Date</th>
                    <th>Status</th>
                    <th>Submitted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($records)) { ?>
                    <?php foreach ($records as $index => $row) { ?>
                        <tr>
                            <td>
                                <?= $index + 1 ?>
                            </td>
                            <td>
                                <?php echo $row->company_name; ?>
                            </td>
                            <td>
                                <?php echo $row->job_title; ?>
                            </td>
                            <td>
                                <?php echo $row->workers_required; ?>
                            </td>
                            <td>
                                <?php echo ucwords(str_replace('_', ' ', $row->category)) ?>
                            </td>
                            <td>
                                <?php echo ucwords(str_replace('_', ' ', $row->employment_type)) ?>
                            </td>
                            <td>
                                <?php echo $row->joining_date; ?>
                            </td>
                            <td>
                                <?php $status = request_forms_status($row->status); ?>
                                <span class="<?= $status['class'] ?>">
                                    <?= $status['name']; ?>
                                </span>
                            </td>
                            <td>
                                <?php echo $row->created_at; ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('form-requests/job-request-view/' . $row->id); ?>"
                                    class="btn btn-sm btn-primary mb-1">View</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="10" class="text-center">No job requests found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <br>
        <?php echo $pagination; ?>
    </div>
</div>