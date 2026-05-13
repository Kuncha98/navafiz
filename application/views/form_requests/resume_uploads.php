<div class="container py-4">

    <!-- Page header -->
    <div class="mb-4">
        <a href="<?php echo site_url('profile/' . $this->session->userdata('user_id')); ?>" class=""><i
                class="fa fa-arrow-left me-2"></i>Back to dashboard</a>
        <h3 class="page-title mt-3 mb-1">Resume Management</h3>
        <p class="text-muted mb-0">Review and manage all resumes submitted on the platform.</p>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 candidate-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Profession</th>
                    <th>Phone</th>
                    <th>Resume</th>
                    <th>Submitted</th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($records)) { ?>
                    <?php foreach ($records as $index => $row) { ?>
                        <tr>
                            <td>
                                <?= $index + 1 + $this->uri->segment(3) ?>
                            </td>
                            <!-- <td>
                                <a href="<?php echo site_url('form-requests/job-seeker-request-view/' . $row->id); ?>"
                                    class="text-decoration-none"><?php echo $row->name; ?></a>
                            </td> -->
                            <td>
                                <?php echo $row->name; ?>
                            </td>
                            <td>
                                <?php echo $row->profession; ?>
                            </td>
                            <td>
                                <?php echo $row->phone; ?>
                            </td>
                            <td>
                                <?php if (!empty($row->cv)): ?>
                                    <button class="btn btn-sm btn-outline-primary view-cv"
                                        data-file="<?= base_url('navassets/uploads/cv/' . $row->cv); ?>">
                                        Preview CV
                                    </button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo $row->created_at; ?>
                            </td>
                            <!-- <td>
                                <a href="<?php echo site_url('form-requests/job-seeker-request-view/' . $row->id); ?>"
                                    class="btn btn-sm btn-primary mb-1">View</a>
                            </td> -->
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="10" class="text-center">No resumes found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <?= $pagination; ?>
    </div>
</div>

<div class="modal fade" id="cvModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body p-0">
                <iframe id="cvFrame" src="" width="100%" height="700px"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.view-cv', function () {
        var file = $(this).data('file');
        $('#cvFrame').attr('src', file);
        $('#cvModal').modal('show');
    });
</script>