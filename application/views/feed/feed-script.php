<script>
    // function notinuse_loadfeed(page,ontop=0,user_id=0,title='All'){

    // //    alert(url);
    // //    console.log(url);
    //     $('.feedloader').show();
    //     console.log(ontop)
    //     $.ajax({
    //         type: "POST",        
    //         url: '<?= site_url('feed/loadfeed') ?>/'+page,
    //         data: {user_id:user_id},
    //         crossDomain:true,
    //         success: function (response){
    //             $('.feedloader').hide();
    //             if(ontop>0){
    //                 $('div.feed-list-box').html(response);
    //             }else{
    //                 $('div.feed-list-box').append(response);
    //             }            
    //             var newnum = +$("#page_id").val() + 1;
    //             console.log('new',newnum)
    //             $("#page_id").val(newnum);
    //             Appends();            
    //         },
    //         error : function(e){
    //             console.log(e)
    //         }        
    //     });
    // }

    // Existing loadfeed function modified to handle job_title
    function loadfeed(page, ontop = 0, user_id = 0, job_title = '') {
        $('.feedloader').show(); // Show loader
        console.log('Fetching feed for Job Title:', job_title); // Debugging log

        $.ajax({
            type: "POST",
            url: '<?= site_url('feed/loadfeed') ?>/' + page,
            data: {
                user_id: user_id,
                job_title: job_title // Send job_title to backend
            },
            crossDomain: true,
            success: function (response) {
                $('.feedloader').hide();

                if (ontop) {
                    // Replace the content for new filters
                    $('div.feed-list-box').html(response);
                } else {
                    // Append new content for "Load More"
                    $('div.feed-list-box').append(response);
                }

                // Update the page number for the next call
                var newnum = +$("#page_id").val() + 1;
                $("#page_id").val(newnum);

                // Bind click events again
                Appends(job_title);
            },
            error: function (e) {
                console.error('Error loading feed:', e);
            }
        });
    }
    function GetCommentByFeed(feed_id) {
        $('#commentsof_' + feed_id).html('');
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            //        url: '<?= base_url('feedcomments/loadfeedcomments') ?>/'+feed_id,
            url: base_url + 'feedcomments/loadfeedcomments/' + feed_id,
            data: { feed_id: feed_id },
            cache: false,
            timeout: 600000,
            success: function (data) {
                $('.topfeedloader').hide();
                $('#commentsof_' + feed_id).html(data);
                Appends();
            },
            error: function (e) {
            }
        });
    }

    function Appends(job_title) {
        // alert(job_title);
        $('a.load_more').off('click').on('click', function () {
            var page = $("#page_id").val();
            var reqest_user_id = $("#reqest_user_id").val();
            job_title = $("#job_title").val(); // Retrieve the current job title filter
            console.log('Load More Click - Job Title:', job_title); // Debugging log
            loadfeed(page, 0, reqest_user_id, job_title);
        });

        $('#deletefeed').on('click', function () {
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                //            url: '<?= base_url('feed/post') ?>',
                url: base_url + 'feedcomments/loadfeedcomments/feed/post',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    loadfeed(1, 1);
                    $('.topfeedloader').hide();
                },
                error: function (e) {
                }
            });
        });

        $('a.loadcomments').on('click', function () {
            feed_id = $(this).attr('feed_id');
            GetCommentByFeed(feed_id);
        });

        $('a.replytn').on('click', function () {
            comment_box = $(this).parent('div.clinks').children('.postcmtfrm').toggle();
        });

        $('a.postcomment').on('click', function () {
            comment_box = $(this).parent('div.commentbox').children('.commentxt');
            comment_txt = comment_box.val();
            feed_id = comment_box.attr('feed_id');
            parent_id = comment_box.attr('parent_id');
            feed_owner_id = comment_box.attr('feed_owner_id');

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '<?= base_url('feedcomments/post') ?>',
                //            url: base_url+'feedcomments/loadfeedcomments/feedcomments/post',
                data: { comment_txt: comment_txt, feed_id: feed_id, parent_id: parent_id, feed_owner_id: feed_owner_id },
                cache: false,
                timeout: 600000,
                success: function (data) {
                    GetCommentByFeed(feed_id)
                    Appends();
                },
                error: function (e) {
                }
            });

        });
    }
</script>