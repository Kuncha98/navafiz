<?php $this->load->view('header.php'); ?>
<style>
.panel-body ul {
    list-style: none !important;
}

.blog-H {
    background-color: #4887d2 !important;
    position: relative
}

.blog-H .blog-content {
    padding: 20px 0 100px
}

.blog-H .blog-content .blog-Posts {
    padding: 30px 0
}

.blog-H .blog-content .blog-Posts .blog-item {
    background: #fff
}

.blog-H .blog-content .blog-Posts .blog-item:hover {
    -webkit-box-shadow: 0 0 12px 5px rgba(36,83,138,0.6);
    -moz-box-shadow: 0 0 12px 5px rgba(36,83,138,0.6);
    box-shadow: 0 0 12px 5px rgba(36,83,138,0.6)
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Thumb {
    width: 100%;
    height: 200px;
    background-position: top center;
    background-repeat: no-repeat;
    background-size: cover;
    border-bottom: #ccc solid 1px;
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details {
    padding: 15px 30px 30px;
    position: relative;
    height: 205px;
    margin-bottom: 29px;
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details h4 {
    font-size: 22px;
    color: #182866
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details p {
    font-size: 16px;
    color: #666;
    margin-bottom: 20px
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details .read-More {
    padding: 10px 20px;
    border-radius: 5px;
    color: #fff;
    font-size: 14px;
    background-color: #182866;
    font-weight: 700;
    display: inline-block
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details .B-date {
    width: 60px;
    height: 60px;
    border-radius: 100%;
    background-color: #f57f3a;
    text-align: center;
    position: absolute;
    right: 15px;
    top: -40px;
    -webkit-box-shadow: 0 6px 6px 0 rgba(70,70,70,0.4);
    -moz-box-shadow: 0 6px 6px 0 rgba(70,70,70,0.4);
    box-shadow: 0 6px 6px 0 rgba(70,70,70,0.4)
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details .B-date .date {
    display: block;
    font-size: 20px;
    color: #fff;
    font-weight: 700;
    margin-top: 10px;
    line-height: 1
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details .B-date .month {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    color: #fff
}

.blog-H .action-BTN:hover {
    background-color: #89ba42;
    color: #fff
}
</style>
<body>
<div class="page category-page"> 
<?php $this->load->view('pagetop.php');
?>
<div class="clearfix"></div>
<div class="blog-H animatedParent abjad-world-bg">
    <div class="blog-content inner-page-content">
        <div class="container">
            <div class="blog-Posts">
                 <?php $this->load->view('notification/notification-messages');?>
                <div class="row">
                    <div class="col-md-12" style="padding: 0 10%;">
                        <div class="widget-area no-padding blank">
                           <!-- <h1>Whats happenings</h1>-->
                            <div class="status-upload">
                                <form action="<?=base_url('post-whats-happening')?>" class="form-horizontal" method="post" id="happenpage" enctype="multipart/form-data">
                                <div class="form" style="padding: 20px">
                                  <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="form-control todo-taskbody-taskdesc" id="posting_message" name="message" required  rows="8"  placeholder="Enter Message..."></textarea>
                                      <span id="shsmserror"></span> 
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-12">
                                      <input type="file" id="pic"  name="whats_image"> </div>
                                  </div>
                                  <div class="form-group" style="margin-left:10px;">
                                  <button  class="btn btn-success green col-md-12 col-xs-12" type="submit">Post</button>

                                  </div>
                                </div>
                                </form>

                            </div><!-- Status Upload  -->
                        </div><!-- Widget Area -->

                      </div>
                </div>
                <div class="row items-list">
                    <?php if($list_happening){
                        foreach ($list_happening as $happen){
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="blog-item animated fadeIn growHover go">
                            <a href="<?=site_url('whatshappening/view/'.$happen->sh_id);?>">
                                <div class="blog-Thumb" style="background-image:url(<?=site_url('assets/uploads/happens/'.$happen->sh_image)?>)"></div>
                                <div class="blog-Details">
                                    <div class="B-date">

                                        <span class="date"><?=date('d',strtotime($happen->add_date));?></span>
                                        <span class="month"><?=date('M',strtotime($happen->add_date));?></span>
                                    </div>
                                    <h4>
                                        <?=  GetUserDetails($happen->sh_member_id)->m_name;?>
                                    </h4>
                                    <p><?=  substr($happen->message, 0,100)." See more...";?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php }}?>                    
                    <div class="clearAll"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12 margin-bottom-10">
                        <?php if($page>2){
                        $pre = $page-1;
                        ?>
                        <a href="<?=site_url('whatshappening/index/'.$pre);?>" class="btn btn-success load_more col-sm-12 col-xs-12">Previous &laquo;</a>
                        <?php }?>
                    </div>
                    <div class="col-sm-12 col-xs-12 padding-top-20" style="margin-top: 25px;">
                        <a href="<?=site_url('whatshappening/index/'.$page);?>" class="btn btn-success load_more col-sm-12 col-xs-12">Next &raquo;</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.load_more').click(function(){
        var page = $(this).attr('page');
        $.ajax({
        type: "POST",
        url: '<?=site_url('whatshappening/loadmore');?>/'+page,
        data: {},
        success: function (response){
            $('div.items-list').append(response);
        },
        //dataType: dataType
      });
        
    });
});
</script>
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>