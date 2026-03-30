<div class="container py-4">

    <!-- Page header -->
    <div class="mb-4">
        <a href="<?php echo site_url('profile/' . $this->session->userdata('user_id')); ?>" class=""><i
                class="fa fa-arrow-left me-2"></i>Back to dashboard</a>
        <h3 class="page-title mt-3 mb-1">Job Seeker Applications Management</h3>
        <p class="text-muted mb-0">Review and manage all job seeker registrations submitted on the platform.</p>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 candidate-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Current Location</th>
                    <th>E-mail</th>
                    <th>Exp.</th>
                    <th>Skills</th>
                    <th>App. Position</th>
                    <th>Category</th>
                    <th>Pref. Country</th>
                    <th>Availability</th>
                    <th>Highest Qual.</th>
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
                                <?php echo $row->current_location; ?>
                            </td>
                            <td>
                                <?php echo $row->email; ?>
                            </td>
                            <td>
                                <?php echo $row->experience; ?> Yrs
                            </td>
                            <td>
                                <?php
                                $skills = explode(',', $row->skills);
                                if (!empty($skills)):
                                    foreach ($skills as $skill):
                                        ?>
                                        <span class="badge skill-badge border me-1 mb-2">
                                            <?php echo htmlspecialchars(trim($skill)); ?>
                                        </span>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </td>
                            <td>
                                <?php echo $row->applying_position; ?>
                            </td>
                            <td>
                                <?php echo ucwords(str_replace('_', ' ', $row->category)) ?>
                            </td>
                            <td>
                                <?php echo $row->preferred_country; ?>
                            </td>
                            <td>
                                <?php echo ucwords(str_replace('_', ' ', $row->availability)) ?>
                            </td>
                            <td>
                                <?php echo $row->highest_qualification; ?>
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
                                <a href="<?php echo site_url('form-requests/job-seeker-request-view/' . $row->id); ?>"
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