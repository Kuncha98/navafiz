<?php $this->load->view('include/header'); 
$user_id = $this->session->userdata('user_id');
?>
<!--<link href='<?= base_url()?>nassets/css/s-style.css' rel="stylesheet" >--> 
<style type="text/css">
    .profile{        
        margin: 0 auto;
        text-align: center;           
    }
    .profile .profile_img{
        border-radius: 50% !important;
        border: 3px solid #215374;
        display: block;
        width: 150px;
        height: 170px;
        background-size: cover;
        margin: 0px auto 20px auto;
    }
    .card{
        margin-bottom: 20px;
    }
    .skills h4 a{
        color: #000;
    }    
    .buttons a{

        margin-bottom: 3px;
        display: block;
    }
    .summary {
        padding-top: 5%;
    } 

    .avatar img {
    width: 100%;
    max-width: 100%;
    height: auto;
    border: 0 none;
    border-radius: 1000px;
}

    @media only screen and (max-width: 768px) {
        .views .fas{
            font-size: 16px !important;
            width: 20px !important;
        }
    }    
</style>
<div class="container-mid">
<?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-md-3 leftside">
            <?php $this->load->view('whatshappening/leftside');?>
        </div>
        <div class="col-md-6 feedpage">
            <div class="card">
                <div class="card-body">
                    <form action="<?=base_url('post-whats-happening')?>" class="form-horizontal" method="post" id="happenpagefrm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="sr-only" for="message">post</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="What are you thinking?" required=""></textarea>
                        </div>
                        <div class="form-group" style="padding-left: 10px;">
                            <div class="row">
                                <div class="col-6">                                            
                                    <label for='pic' class="file-upload">
                                        <i class='btn btn-primary'>Upload Media</i>
                                    </label>
                                    <input type="file" id="pic"  name="whats_image" class='d-none'> 
                                </div>
                                <div class="col-6 text-right">  
                                    <button  class="btn btn-success" type="submit" style="width: 150px;text-align: center;">Post</button>                            
                                </div>
                            </div>
                        </div>                                
                    </form>
                </div>
            </div>                        
            <?php if($list_happening){?>
                <?php foreach ($list_happening as $happen){?>                
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <a href="<?= site_url('profile/'.$happen->sh_member_id) ?>">
                                    <?php if(GetUserDetails($happen->sh_member_id)->m_avatar != ''): ?>
                                        <img class="rounded-circle" width="50" src="<?=site_url('assets/uploads/members/small_thumbs/'. GetUserDetails($happen->sh_member_id)->m_avatar);?>">
                                    <?php else: ?>
                                        <img class="rounded-circle" width="45" src="<?=site_url('assets/uploads/members/user-placeholder.jpg');?>">
                                    <?php endif; ?>
                                    </a>                                    
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">
                                        <a href="<?=site_url('profile/'.$happen->sh_member_id);?>" style="color: black;">
                                        <?= BasicInfoUser($happen->sh_member_id)->m_name;?> 
                                        <small> -  <?=BasicInfoUser($happen->sh_member_id)->m_profession;?></small>
                                        </a>
                                    </div>
                                    <div class="h7 text-muted">                                         
                                        <?=date('d-M-Y - h:i a', strtotime($happen->add_date));?>
                                    </div>                                    
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="gedf-drop1">
                                        <?php if(in_array($user_id, CvReviewTeamList())){?>
                                        <a class="dropdown-item" href="<?=site_url('whatshappening/delete/'.$happen->sh_id);?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                                        <?php }?>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">                        
                        <div class="desc">
                            <?= substr(nl2br($happen->message), 0,500);?><a href="<?=site_url('whatshappening/view/'.$happen->sh_id)?>"> See more...</a>
                        </div>
                        <?php if($happen->sh_image != ''): ?>
                        <div class="img">
                            <img src="<?=site_url('assets/uploads/happens/'. $happen->sh_image )?>" class="img-fluid img-responsive" style="width: 100%;" >
                        </div>                        
                        <?php endif; ?>                        
                    </div>
                    <!--<div class="card-footer text-right">
                        <a href="#" class="card-link"><i class="fa fa-thumbs-o-up"></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        <!--<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                        <a href="#" class="btn btn-success">View</a>
                    </div>-->
                </div>                
                <?php }?>
            <?php }?>
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
        <div class="col-md-3 rightside">
            <?php $this->load->view('whatshappening/rightside');?>
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