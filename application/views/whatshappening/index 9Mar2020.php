<?php $this->load->view('include/header'); 
$user_id = $this->session->userdata('user_id');
?>
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
<link href='<?= base_url()?>nassets/css/s-style.css' rel="stylesheet" > 
<body>
<div class="page category-page"> 
<div class="clearfix"></div>
<div class=" animatedParent abjad-world-bg">
    <div class="blog-content inner-page-content">
        <div class="container">
            <div class="blog-Posts">
                 <?php $this->load->view('notification/notification-messages');?>
                <div class="row">
                    <div class="col-md-3">
                        <div class='profile-box'>
                            <div class="first">
                            <div class="empty-b-bg">
                                <!--<i class="fas fa-check"></i>-->
                                &nbsp;
                            </div>
                            <div class="user-avatr" >
                            <?php if(isset($user_detail)): ?>
                                <img src="<?=site_url('assets/uploads/members/'.$user_detail->m_avatar);?>">
                            <?php else   :?>
                                <img src="<?=site_url('assets/uploads/members/user-placeholder.jpg');?>">
                            <?php endif;?>
                            </div>
                            <h4><a href="<?= site_url('profile/'.$user_detail->m_id) ?>"><?= $user_detail->m_name?></a></h4>
                            <h6><?= $user_detail->m_profession ?></h6>
                            </div>
                            <hr>
                                <a href="<?= site_url('profile/'.$user_detail->m_id) ?>" class="clearfix flex-box">
                                    <div class="col-md-6 col-sm-6 col-xs-6">Profile Views</div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 text-right i-color"><?= $user_detail->m_profile_view?></div>
                                </a>                                
                            <hr>                            
                        </div>
                        </div>
                    <div class="col-md-9">
                        
                        <div class="widget-area add-post-wg no-padding blank">
                           <!-- <h1>Whats happenings</h1>-->
                            <div class="status-upload">
                                <form action="<?=base_url('post-whats-happening')?>" class="form-horizontal" method="post" id="happenpage" enctype="multipart/form-data">
                                <div class="form">
                                  <div class="form-group">
                                    <div class="">
                                        <textarea class="form-control todo-taskbody-taskdesc" id="posting_message" name="message" required  placeholder="Start a post"></textarea>
                                      <span id="shsmserror"></span> 
                                    </div>
                                  </div>
                                  <div class="post-actions">
                                      <button  class="btn btn-success" type="submit">Post</button>
                                      <label for='pic' class="file-upload"><i class='fas fa fa-paperclip'></i></label>
                                      <input type="file" id="pic"  name="whats_image" class='d-none'> </div>
                                  
                                </div>
                                </form>

                            </div><!-- Status Upload  -->
                        </div><!-- Widget Area -->
                        <div class="row items-list">
                        <?php if($list_happening){
                        foreach ($list_happening as $happen){?>
                        <div class="col-md-12 col-sm-12">
                            <div class="blog-item animated fadeIn growHover go">
                                <div class="blog-Details">
                                    <div class="clearfix">
                                        <div class="pu-avatar">
                                            <a href="<?= site_url('profile/'.$happen->sh_member_id) ?>">
                                            <?php if(GetUserDetails($happen->sh_member_id)->m_avatar != ''): ?>
                                                <img src="<?=site_url('assets/uploads/members/small_thumbs/'. GetUserDetails($happen->sh_member_id)->m_avatar);?>">
                                            <?php else: ?>
                                                <img src="<?=site_url('assets/uploads/members/user-placeholder.jpg');?>">
                                            <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="post-author">
                                            <p class="p-name">  <?=  GetUserDetails($happen->sh_member_id)->m_name;?></p>
                                            <p class="p-profession"><?=  GetUserDetails($happen->sh_member_id)->m_profession;?></p>
                                            <p class="p-time" data-livestamp="<?= strtotime($happen->add_date) ?>"><?=date('d-M-Y - h:i a', strtotime($happen->add_date));?></p>
                                        </div>
                                    </div>
                                    <p class='p-details'><?= substr($happen->message, 0,300);?>
                                        <?= (strlen($happen->message) > 400)? " <a href=".site_url('whatshappening/view/'.$happen->sh_id)."> See more...</a>" : '';?>
                                    </p>
                                    <?php if($happen->sh_image != ''): ?>
                                        <div class="p-img"> <a href="<?= site_url('whatshappening/view/'.$happen->sh_id) ?>"><img src="<?=site_url('assets/uploads/happens/'. $happen->sh_image )?>" ></a></div>
                                    <?php endif; ?>
                                    <?php
                                    $liked=false;
                                    $comment = '';
                                    $shared = false;
                                    $post_meta = getPostLikeOfMember($happen->sh_id);
                                    $counts = getPostMetaCount($happen->sh_id);
                                    //print_r($post_meta);
                                    if(is_array($post_meta) && !empty($post_meta)):
                                        $liked=true;
                                    endif;?>
                                    <ul class="post-meta-count">                                        
                                        <li><?= $counts[1] ?> Comments</li></ul>
                                        <ul class="post-meta-box">
                                            <li><a href="javascript:;" class="openComment"><i class="fas fa-comment"></i> Comment</a></li>
                                            <?php if(in_array($user_id, CvReviewTeamList())){?>
                                                <li><a href="<?=site_url('whatshappening/delete/'.$happen->sh_id);?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></li>
                                            <?php }?>
                                            <!--<li class="<?= ($liked == true)? 'liked':'' ?>" ><a href="#." class="likePost" data-id='<?= $happen->sh_id ?>'><i class="fas fa-thumbs-up"></i> Like</a></li>-->                                            
                                            <!--<li><a href="#."><i class="fas fa-share"></i> Share</a></li>-->
                                        </ul>
                                        <div class="comment-box hide">
                                            <div class="write-comment">
                                                <div class="clearfix">
                                                    <div class="user-avatr" >
                                                    <?php if(isset($user_detail)): ?>
                                                        <img src="<?=site_url('assets/uploads/members/'.$user_detail->m_avatar);?>">
                                                    <?php else:?>
                                                        <img src="<?=site_url('assets/uploads/members/user-placeholder.jpg');?>">
                                                    <?php endif;?>
                                                    </div>
                                                    <div class="input-box">  
                                                        <input type="text" maxlength="500" placeholder="Add a comment..." class="comment-input" name='postComment' />
                                                        <input type="submit" data-id='<?= $happen->sh_id ?>' class="comment-btn hide" value="Post">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $commentsData = getAllComments($happen->sh_id);
                                            foreach($commentsData as $key=>$val){ ?>
                                             <div class="post-type comment">
                                                <div class="clearfix">
                                                    <div class="user-avatr" >
                                                        <?php if(isset($user_detail)): ?>
                                                            <img src="<?=site_url('assets/uploads/members/'.$user_detail->m_avatar);?>">
                                                        <?php else :?>
                                                            <img src="<?=site_url('assets/uploads/members/user-placeholder.jpg');?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="comment-details clearfix">
                                                        <h5><?= $val['m_name'] ?>.<span class="p-time pull-right" data-livestamp="<?= $val['created_at'] ?>"></span></h5>
                                                        <h6><?= $val['m_profession'] ?></h6>
                                                        <?= $val['description'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                             <?php //if(in_array($user_id, CvReviewTeamList())){?>
                           <!-- <a href="<? //=site_url('whatshappening/delete/'.$happen->sh_id);?>" class="btn" onclick="return confirm('Are you sure you want to delete this?');">Delete</a> -->
                             <?php //}?>
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
    </div>
</div>
<script src="<?= base_url()?>nassets/js/moment.js"></script>
<script src="<?= base_url()?>nassets/js/livestamp.min.js"></script>
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
    
    
    
    $('.likePost').click(function(event){
    event.preventDefault();
     var postId = $(this).data('id');
    // var like = true;
     $liked = true;
//     alert($liked);
     if($(this).parents('li').hasClass('liked'))
     {
         $(this).parents('li').removeClass('liked');
         $liked = false;
     }
     else
     {
         $(this).parents('li').addClass('liked');
     }
    // alert($liked);
     var data = { postId : postId, like : $liked };
        $.ajax({
        type: "POST",
        url: '<?=site_url('whatshappening/likePost');?>',
        data: data,
        success: function (response){
//            if($liked)
//            {
//              $liked.removeClass('liked');  
//            }
//            else
//            {
//                $liked.addClass('liked');  
//            }
            console.log(response);
//            $('div.items-list').append(response);
        },
        //dataType: dataType
      });
    });
    
        
    $('.comment-btn').click(function(event){
    event.preventDefault();
     var cmnt = $(this).siblings('.comment-input').val();
     var postId = $(this).data('id');
     var data = { postId : postId, cmnt:cmnt }
     var base_url = '<?php echo base_url();?>';

        $.ajax({
        type: "POST",
        url: '<?=site_url('whatshappening/commentPost');?>',
        data: data,
        success: function (response){
            console.log(response);
            $('.comment-input').val('');
            $data = jQuery.parseJSON(response);
            var html = '<div class="post-type comment"><div class="clearfix">\n\
    <div class="user-avatr"><img src="'+base_url+'/assets/uploads/members/'+$data['m_avatar']+'"></div>\n\
<div class="comment-details clearfix"><h5>'+$data['m_name']+'.<span class="p-time pull-right" data-livestamp="'+ $data['created_at'] +'"></span></h5><h6>'+$data['m_profession']+'</h6>'+$data['description']+'</div></div></div>';
//            console.log(response);
//            $('div.items-list').append(response);
$('.comment-box').append(html);
        },
        //dataType: dataType
      });
    });
    
    $( ".comment-input" ).keyup(function() {
    if($(this).val().length > 0)
    {
        $(this).siblings('.comment-btn').removeClass('hide');
    }
    else
    {
        $(this).siblings('.comment-btn').addClass('hide');
    }
});
    
    $('.openComment').click(function(){
        var box = $(this).parents('ul').next('.comment-box');
        if(box.hasClass('hide'))
        {
            box.removeClass('hide');
        }
        else
        {
             box.addClass('hide');
        }
        
    });
    
});
</script>
<?php $this->load->view('include/footer');?>
</div>
</body>
</html>