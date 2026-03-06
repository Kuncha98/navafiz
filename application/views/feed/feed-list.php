<?php
$session_user_id = $this->session->userdata('user_id');
?>
<style>
.feed-item .views{
    font-weight: bold;
    color: #454545;
}
</style>
<?php if ($feed_list) { ?>
        <?php foreach ($feed_list as $happen) { ?>                    
            <div class="card feed-item">
                <div class="card-body">                        
                    <div class="post-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <a href="<?= site_url('profile/' . $happen->user_id) ?>">
                                    <?php
                                    if ($happen->m_avatar != ''): ?>
                                            <img class="rounded-circle" width="50" src="<?= site_url('assets/uploads/members/small_thumbs/' . $happen->m_avatar); ?>">
                                    <?php else: ?>
                                            <img class="rounded-circle" width="45" src="<?= site_url('assets/uploads/members/user-placeholder.jpg'); ?>">
                                    <?php endif; ?>
                                    </a>                                    
                                </div>
                                <div class="ml-2">
                                    <div class="m-0">
                                        <a href="<?= site_url('profile/' . $happen->user_id); ?>" class="post-user-info" style="color: black;">
                                            <span class="name"><?= $happen->m_name; ?></span>
                                            <small class="profession"> <?= $happen->m_profession; ?></small>
                                        </a>
                                    </div>
                                    <div class="h7 text-muted post-time">                                         
                                        <?= date('d-M-Y - h:i a', strtotime($happen->feed_added_on)); ?>
                                    </div>                                    
                                </div>
                            </div>                
                        </div>                
                    </div>
                    <hr>
                    <div class="desc">
                        <?php
                        $feed_text = link_it($happen->feed_text);
                        $feed_text = nl2br($feed_text); // Convert newlines to <br> tags
                        $limit = 400; // Set your character limit
                
                        // Check if the text exceeds the limit and truncate if necessary
                        if (strlen($feed_text) > $limit) {
                            $feed_text = substr($feed_text, 0, $limit) . '...'; // Add ellipsis for truncated text
                        }

                        echo $feed_text;
                        ?>
                
                        <p class="text-right">
                            <?php if (isset($session_user_id) && $session_user_id != 0): ?>
                                <a href="<?= site_url('feed/view/' . $happen->feed_id) ?>"> See more...</a>
                            <?php else: ?>
                                <a href="<?= site_url('login') ?>"> See more...</a>
                            <?php endif; ?>
                        </p>                
                    </div>
                    <?php if ($happen->feed_image != ''): ?>
                        <div class="img">
                            <a href="<?= site_url('feed/view/' . $happen->feed_id) ?>">
                                <img src="<?= site_url(feed_upload_path . $happen->feed_image) ?>" class="img-fluid img-responsive" style="width: 100%;" >
                            </a>                
                        </div>                        
                    <?php endif; ?>                                    
                    <hr>
                    <div class="feed-post-actions">
                        <?php if (isset($session_user_id) && $session_user_id != 0): ?>
                            <a href="javascript:void(0);" feed_id="<?= $happen->feed_id; ?>" class="btn btn-outline-secondary loadcomments"> <?= $happen->comments_count > 0 ? $happen->comments_count : ''; ?> Comments</a>
                        <?php else: ?>
                            <a href="<?= base_url('login'); ?>" class="btn btn-outline-secondary"> <?= $happen->comments_count > 0 ? $happen->comments_count : ''; ?> Comments</a>
                        <?php endif; ?>
                        <?php if (in_array($session_user_id, CvReviewTeamList())) { ?> 
                            <a href="<?= site_url('feed/delete/' . $happen->feed_id); ?>" class="btn" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                            <!--<a href="#" class="card-link">Like</a>-->
                        <?php } ?>
                        <a href="<?= site_url('track_steps/sheet/' . $happen->user_id . '/#mchatbox'); ?>" class="btn">Message</a>

                        <span class="views float-right">(<?= $happen->feed_views ?>) Views</span>
        <!--            </div>-->
                    <hr>            
        <!--            <a href="javascript:void(0);" onclick="return confirm('Are you sure you want to share this post?');" feed-id="<?= $happen->feed_id; ?>" class="btn btn-outline-secondary float-right sharepost btn-confirm">
                Share
            </a>-->
                    <!--<input id="fname" value="<?= $happen->feed_id; ?>" type="hidden">-->
                
         
          
             
                    </div>
                    <div class="feedcommentbox">
                        <div class="feedcommentslist" id="commentsof_<?= $happen->feed_id ?>">
                    
                        </div>                
                    </div>
                </div>        
            </div>    
        <?php } ?>    
<?php } ?>


<!--<button class="btn btn-default" id="btn-confirm">Confirm</button>-->

<!--<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Do you want to share this post?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si">Yes</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>-->





<script>
    
    
    
    
    
    $(document).ready(function () {
  
     $('.sharepost').on("click",function(){
//       alert("HELLO");
       var id =  $(this).attr("feed-id");
       console.log(id);
             $.ajax({
            type: "POST",
            url: '<?= base_url('feed/sharepost') ?>/'+id,
            data: id,
            timeout: 600000,
            crossDomain:true,
            success: function (data) {
                loadfeed(1,1);
                $('.topfeedloader').hide();
                
            },
            error: function (e) {
                console.log(e);
            }
        });
 
})
})
    
   
//var modalConfirm = function(callback){
//  
//  $(".btn-confirm").on("click", function(){
//    $("#mi-modal").modal('show');
//  });
//
//  $("#modal-btn-si").on("click", function(e){
//    callback(true);
////    e.stoppropagation()
//    $("#mi-modal").modal('hide');
//  });
//  
//  $("#modal-btn-no").on("click", function(){
//    callback(false);
//    $("#mi-modal").modal('hide');
//  });
//};
//
//
//modalConfirm(function(confirm){
//  if(confirm){
//    //Acciones si el usuario confirma
//     var id =  $("#fname").val();
//     console.log(id);
//  }else{
//    //Acciones si el usuario no confirma
//    $("#result").html("NO CONFIRMADO");
//  }
//});
    
// $(document).ready(function(){
//    loadfeed(1);            
//});     
                

</script>
<?php $this->load->view('feed/feed-script'); ?>