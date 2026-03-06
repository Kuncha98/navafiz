<div class="container py-4">

    <!-- Page header -->
    <div class="mb-4">
        <a href="<?php echo site_url('n/' . $this->session->userdata('username')); ?>" class=""><i
                class="fa fa-arrow-left me-2"></i>Back to dashboard</a>
        <h3 class="page-title mt-3 mb-1">Manage Pending Feed Posts</h3>
        <p class="text-muted mb-0">There is/are <?= $pending_count ?> pending post/s</p>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 candidate-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Posted by</th>
                    <th>Post</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($feeds)) { ?>
                    <?php foreach ($feeds as $index => $row) { ?>
                        <tr>
                            <td>
                                <?= $index + 1 ?>
                            </td>
                            <td>
                                <?php echo $row->user_name; ?>
                            </td>
                            <td>
                                <p class="feed-text">
                                    <?= nl2br($row->feed_text) ?>
                                </p>
                                <a href="javascript:void(0);" class="see-more">See more</a>
                            </td>
                            <td>
                                <?php if (!empty($row->feed_image)): ?>
                                    <img src="<?= base_url('nassets/feed/uploads/' . $row->feed_image) ?>" height="150px"
                                        width="auto">
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">Pending</span>
                            </td>
                            <td>
                                <?php echo $row->added_on; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('feed/approve/' . $row->feed_id) ?>" class="btn btn-sm btn-success mb-1">
                                    Approve
                                </a>

                                <a href="<?= site_url('feed/reject/' . $row->feed_id) ?>" class="btn btn-sm btn-danger mb-1">
                                    Reject
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="10" class="text-center">No pending posts found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <br>
        <?php echo $pagination; ?>
    </div>
</div>