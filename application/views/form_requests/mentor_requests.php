<div class="container py-4">

    <!-- Page header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h3 class="page-title mb-1">Manage Mentor Applications</h3>
            <p class="text-muted mb-0">View all the mentor applications</p>
        </div>

        <a href="<?php echo site_url('n/' . $this->session->userdata('username')); ?>" class="btn border">Back to
            dashboard</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 candidate-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Exp.</th>
                    <th>Location</th>
                    <th>Sess. Duration</th>
                    <th>Cond. Mode</th>
                    <th>Ment. Type</th>
                    <th>Ava. slots</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($records)) { ?>
                    <?php foreach ($records as $row) { ?>
                        <tr>
                            <td>
                                <?= $index + 1 ?>
                            </td>
                            <td>
                                <?php echo $row->name; ?>
                            </td>
                            <td>
                                <?php echo $row->experience; ?>
                            </td>
                            <td>
                                <?php echo $row->location; ?>
                            </td>
                            <td>
                                <?php echo $row->session_duration; ?> Mins
                            </td>
                            <td>
                                <?php echo $row->conducting_mode; ?>
                            </td>
                            <td>
                                <?php echo $row->mentorship_type; ?>
                            </td>
                            <td>
                                <?php echo $row->available_at; ?>
                            </td>
                            <td>
                                <?php
                                $statusClass = match ($row->status) {
                                    '1' => 'badge bg-warning text-dark',
                                    '2' => 'badge bg-success',
                                    '3' => 'badge bg-danger',
                                    '4' => 'badge bg-secondary',
                                    default => 'badge bg-light text-dark'
                                };
                                ?>
                                <span class="<?= $statusClass ?>">
                                    <?php echo $row->category; ?>
                                </span>
                            </td>
                            <td>
                                <?php echo $row->created_at; ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('form-requests/mentor-request-view/' . $row->id); ?>"
                                    class="btn btn-sm btn-primary mb-1">View</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="10" class="text-center">No candidates found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <br>
        <?php echo $pagination; ?>
    </div>
</div>