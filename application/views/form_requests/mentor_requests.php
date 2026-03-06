<div class="container py-4">

    <!-- Page header -->
    <div class="mb-4">
        <a href="<?php echo site_url('n/' . $this->session->userdata('username')); ?>" class=""><i
                class="fa fa-arrow-left me-2"></i>Back to dashboard</a>
        <h3 class="page-title mt-3 mb-1">Manage Mentor Applications</h3>
        <p class="text-muted mb-0">View all the mentor applications</p>
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
                    <?php foreach ($records as $index => $row) { ?>
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
                                <?php echo ucwords(str_replace('_', ' ', $row->conducting_mode)) ?>
                            </td>
                            <td>
                                <?php echo ucwords(str_replace('_', ' ', $row->mentorship_type)) ?>
                            </td>
                            <td>
                                <?php if (!empty($row->available_at)): ?>

                                    <?php
                                    $dates = explode(',', $row->available_at);
                                    $today = date('Y-m-d');
                                    ?>

                                    <?php foreach ($dates as $date): ?>

                                        <?php
                                        $cleanDate = trim($date);

                                        if (empty($cleanDate))
                                            continue;

                                        $timestamp = strtotime($cleanDate);

                                        if (!$timestamp)
                                            continue; // skip invalid date
                        
                                        $isExpired = $timestamp < time();
                                        $isToday = date('Y-m-d', $timestamp) === $today;

                                        if ($isExpired) {
                                            $badgeClass = 'bg-danger';
                                        } elseif ($isToday) {
                                            $badgeClass = 'bg-warning text-dark';
                                        } else {
                                            $badgeClass = 'bg-success';
                                        }
                                        ?>

                                        <span class="badge <?= $badgeClass ?> me-1 mb-1">
                                            <?= date('d M Y H:i', $timestamp) ?>
                                        </span>

                                    <?php endforeach; ?>

                                <?php endif; ?>
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