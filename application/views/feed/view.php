<?php $this->load->view('include/header'); 
$session_user_id = $this->session->userdata('user_id');
?>
<link href='<?= base_url()?>nassets/feed/css/feed-style.css?v=1' rel="stylesheet" > 
<link href='<?= base_url('nassets/feed/css/feed-responsive.css?v=1')?>' rel="stylesheet"> 

<div class="container-mid feedview">
<?php $this->load->view('notification/notification-messages'); ?>

    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-md-3 leftside d-none d-sm-block">
            <?php $this->load->view('include/leftfeed'); ?>
        </div>

        <!-- Middle Section -->
        <div class="col-md-6">
            <!-- Job Title Buttons -->
            <div class="row p-1">
                <div class="col-md-4 mb-2">
                    <a href="<?= base_url('feed?job_title=All') ?>" class="btn btn-primary col-12">All</a>
                </div>
                <input type="hidden" id="job_title" value="All">
                <?php 
                $matchjobtitles = GetUserJobTitles($session_user_id);
                if ($matchjobtitles):
                    foreach ($matchjobtitles as $key => $title):
                        if (!empty($title)):
                ?>
                        <div class="col-md-4 mb-2">
                            <a href="<?= base_url('feed?job_title='.urlencode($title)) ?>" 
                               class="btn btn-primary col-12">
                               <?= htmlspecialchars($title) ?>
                            </a>
                        </div>
                <?php 
                        endif;
                    endforeach;
                endif;
                ?>
            </div>

            <!-- Feed / Job Details Card -->
            <div class="card feed-item mt-3">
                <div class="card-body">
                    <div class="post-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <a href="<?= site_url('profile/'.$post->user_id) ?>">
                                    <?php 
                                        $post_by = BasicInfoUser($post->user_id);
                                        if ($post_by->m_avatar != ''): ?>
                                            <img class="rounded-circle" width="50"
                                                 src="<?= site_url('assets/uploads/members/small_thumbs/'. $post_by->m_avatar); ?>">
                                        <?php else: ?>
                                            <img class="rounded-circle" width="45"
                                                 src="<?= site_url('assets/uploads/members/user-placeholder.jpg'); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">
                                        <a href="<?= site_url('profile/'.$post->user_id); ?>" style="color: black;">
                                            <?= $post_by->m_name; ?>
                                            <small> - <?= $post_by->m_profession; ?></small>
                                        </a>
                                    </div>
                                    <div class="h7 text-muted">
                                        <?= date('d-M-Y - h:i a', strtotime($post->added_on)); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="desc">
                        <?= nl2br(link_it($post->feed_text)); ?>
                    </div>

                    <?php if ($post->feed_image != ''): ?>
                        <div class="img mt-2">
                            <img src="<?= site_url(feed_upload_path. $post->feed_image) ?>"
                                 class="img-fluid img-responsive" style="width: 100%;">
                        </div>
                    <?php endif; ?>

                    <hr>
                    <?php if ($session_user_id > 0): ?>
                        <div class="feed-post-actions">
                            <?php if (in_array($session_user_id, CvReviewTeamList())): ?>
                                <a href="<?= site_url('feed/delete/'.$post->feed_id); ?>"
                                   class="btn btn-outline-dark"
                                   onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                            <?php endif; ?>
                            <a href="<?= site_url('track_steps/sheet/'.$post->user_id.'/#mchatbox'); ?>"
                               class="btn btn-outline-dark">Message</a>
                        </div>

                        <div class="feedcommentbox">
                            <hr>
                            <div class="feedcommentslist" id="commentsof_<?= $feed_id ?>"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="col-md-3 rightside">
            <?php $this->load->view('include/rightfeed'); ?>
        </div>
    </div>
</div>

<?php $this->load->view('include/footer');?>
<script>
$(document).ready(function () {    
    GetCommentByFeed(<?=$feed_id?>);
});
$(document).ready(function () {
    // Initialize feed on page load
    var page = $("#page_id").val();
    loadfeed(page);

    // Function to load feed based on the selected job title
    window.loadJobTitle = function (job_title = 'All') {
        var page = 1; // Reset to the first page for new filters
        $("#page_id").val(page); // Update hidden input with the new page number
        $("#job_title").val(job_title); // Store the selected job title in a hidden field
        console.log('Loading job title:', job_title); // Debugging log
        loadfeed(page, 1, 0, job_title); // Call the AJAX function
    };
});
</script>
<?php $this->load->view('feed/feed-script');?>