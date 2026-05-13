<?php $this->load->view('include/header');
$session_user_id = $this->session->userdata('user_id');
?>
<link href='<?= base_url() ?>nassets/feed/css/feed-style.css?v=<?= time(); ?>' rel="stylesheet">
<link href='<?= base_url('nassets/feed/css/feed-responsive.css?v=' . time() . '') ?>' rel="stylesheet">
<div class="container-mid feedpage">
    <div class="row">
        <div class="col-md-3 leftside d-none d-sm-block">
            <?php $this->load->view('include/leftfeed'); ?>
        </div>

        <div class="col-md-6 col-xs-12">
            <?php $this->load->view('notification/notification-messages'); ?>
            <!--<div class="form-group">-->
            <!--    <div class="row">-->
            <!--        <div class="col-md-12 col-xs-12">                                    -->
            <!--            <a href="<?= base_url() ?>profile/AddCV" class="btn btn-outline-success col-12">-->
            <!--                Upload Resume-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div id="showAlert" class="alert d-none mt-3" role="alert"></div>

            <div class="card">
                <div class="card-body post_feed_box" style="position: relative;">
                    <form action="javascript:void(0);" class="form-horizontal" method="post" id="feedfrm"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="sr-only" for="message">post</label>
                            <?php $placehod = "Share your Professional thoughts, here. Use this Social Media platform wisely for your Personal Branding. Show your Communication and content creating skills.Share Jobs or valuable content  for the professional community."; ?>
                            <textarea class="form-control" id="message" name="feed_text" rows="4"
                                placeholder="<?= $placehod; ?>" required=""></textarea>
                        </div>
                        <div class="form-group" style="padding-left: 10px;">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <label for='feed_image' class="file-upload">
                                        <i class='btn btn-primary'>Upload Media</i>
                                    </label>
                                    <input type="file" id="feed_image" name="feed_image" class="d-none">
                                </div>
                                <div class="col-md-6 col-xs-12 text-right postbtn">
                                    <button class="btn btn-success col-md-6 col-xs-12" id="feedbtnSubmit"
                                        type="submit">Post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center topfeedloader">
                        <img src="<?= site_url('nassets/feed/images/loader.gif'); ?>" />
                    </div>
                </div>
            </div>
            <div class="feed-area">
                <div class="row p-1">
                    <div class="col-md-4 mb-2">
                        <a href="javascript:void(0)" onclick="loadJobTitle()" class="btn btn-primary col-12">All</a>
                    </div>
                    <input type="hidden" id="job_title" value="All">
                    <?php
                    $matchjobtitles = GetUserJobTitles($session_user_id);
                    if ($matchjobtitles): // Check if result is not empty
                        foreach ($matchjobtitles as $key => $title): // Loop through the job titles
                            if (!empty($title)):
                                ?>
                                <div class="col-md-4 mb-2">
                                    <!-- On click, pass the job title to loadfeed function -->
                                    <a href="javascript:void(0);" class="btn btn-primary col-12"
                                        onclick="loadJobTitle('<?= htmlspecialchars($title) ?>')"><?= htmlspecialchars($title) ?></a>
                                </div>
                                <?php
                            endif;
                        endforeach;
                    else:
                        ?>
                        <!--<p>No job titles found.</p> -->
                    <?php endif; ?>

                </div>
                <div class="feed-list-box">

                </div>
                <div class="justify-content-center feedloader text-center">
                    <button class="btn btn-primary" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
                <!--<p class="text-center feedloader">
                    <img src="<?= site_url('nassets/feed/images/loader.gif'); ?>" />
                </p>-->
                <div class="row">
                    <div class="col-sm-12 col-xs-12 padding-top-20 load_more_btn" style="margin-top: 25px;">
                        <?php if (isset($session_user_id) && $session_user_id != 0): ?>
                            <a href="javascript:void(0);" class="btn btn-success load_more col-sm-12 col-xs-12">Load
                                more..</a>
                        <?php else: ?>
                            <a href="<?= base_url('login') ?>" class="btn btn-success load_more col-sm-12 col-xs-12">Load
                                more..</a>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="hidden" id="page_id" class="page_id" name="page_id" value="1">
            </div>
        </div>

        <div class="col-md-3 col-xs-12 rightside d-none d-sm-block">
            <?php $this->load->view('include/rightfeed'); ?>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>
<script>
    function showAlert(message, type = 'success') {
        let alertBox = $('#showAlert');

        alertBox
            .removeClass('d-none alert-success alert-danger alert-warning')
            .addClass('alert-' + type)
            .text(message)
            .fadeIn();

        // Optional auto hide
        setTimeout(() => alertBox.fadeOut(), 4000);
    }
</script>

<script>
    $(document).ready(function () {
        $("#feedbtnSubmit").click(function (event) {
            $('.topfeedloader').show();
            //stop submit the form, we will post it manually.
            event.preventDefault();
            // Get form
            var form = $('#feedfrm')[0];

            // Create an FormData object 
            var data = new FormData(form);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: base_url + 'feed/post',
                data: data,
                processData: false,
                contentType: false,
                crossDomain: true,
                cache: false,
                timeout: 600000,
                // success: function (data) {
                //     loadfeed(1, 1);
                //     $('.topfeedloader').hide();
                //     form.reset();
                // },

                success: function (res) {
                    let response;

                    try {
                        response = JSON.parse(res);
                    } catch (e) {
                        showAlert('Invalid server response', 'danger');
                        return;
                    }

                    $('.topfeedloader').hide();

                    if (response.success) {
                        showAlert(response.message, 'success');
                        loadfeed(1, 1);
                        form.reset();
                    } else {
                        showAlert(response.message, 'danger');
                    }
                },
                error: function () {
                    $('.topfeedloader').hide();
                    showAlert('Network error. Please try again.', 'danger');
                }
            });

        });

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

    /*$(window).scroll(function(){
        if($(window).scrollTop() == $(document).height() - $(window).height()) {
            page = $("#page_id").val();
            loadfeed(page);
        }    
    });*/
    // Automatically filter feed if job_title is passed in URL
    $(document).ready(function () {
        const params = new URLSearchParams(window.location.search);
        const jobTitle = params.get('job_title');
        if (jobTitle) {
            $("#job_title").val(jobTitle);
            loadJobTitle(jobTitle); // call your existing filter function
        }
    });

</script>
<?php $this->load->view('feed/feed-script'); ?>