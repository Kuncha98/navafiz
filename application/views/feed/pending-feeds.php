<h3>Pending Feed Posts (<?= $pending_count ?>)</h3>

<?php if (!empty($feeds)): ?>

    <?php foreach ($feeds as $feed): ?>

        <div class="card mb-3">
            <div class="card-body">

                <h6>Posted by: <?= $feed->user_name ?></h6>

                <p><?= nl2br($feed->feed_text) ?></p>

                <?php if (!empty($feed->feed_image)): ?>
                    <img src="<?= base_url('uploads/feed/' . $feed->feed_image) ?>" width="200">
                <?php endif; ?>

                <br><br>

                <span class="badge bg-warning text-dark">Pending</span>

                <br><br>

                <a href="<?= site_url('feed/approve/' . $feed->feed_id) ?>" class="btn btn-success btn-sm">
                    Approve
                </a>

                <a href="<?= site_url('feed/reject/' . $feed->feed_id) ?>" class="btn btn-danger btn-sm">
                    Reject
                </a>

            </div>
        </div>

    <?php endforeach; ?>

<?php else: ?>

    <p>No pending posts.</p>

<?php endif; ?>