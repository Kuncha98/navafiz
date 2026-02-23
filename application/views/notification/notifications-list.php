<?php $session_user_id = $this->session->userdata('user_id');?>
<style>
hr.message-inner-separator
{
    clear: both;
    margin-top: 10px;
    margin-bottom: 13px;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.profile_img{
    border-radius: 50% !important;
    border: 1px solid #215374;
    width: 60px;
    display: inline-block;
}
</style>
<?php if(!empty($notifications)){?>        
    <div class="row">
        <?php foreach($notifications as $notify){
            if($notify['user_id']>0){
            ?>
        <div class="col-md-6 col-xs-12 mx-auto">
            <div class="alert alert-info">
                <?php  if(in_array($session_user_id, CvReviewTeamList())){ ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="confirmDelete('<?= $notify['noti_id'] ?>','<?= site_url('notifications/DeleteNotification/') ?>', true)">
                    ×
                </button>                                        
                <?php  }?>
                <img src="<?=profile_picture($notify['user_id']);?>" class="profile_img" /> <strong><?=$notify['noti_title'];?></strong>
                <?php $UserDetails = GetUserDetails($notify['user_id']);?>
                <p>
                    <span class="text-right pull-right"><?= $UserDetails->m_profession;?> | <?= GetCategoryName($UserDetails->m_category);?> | <?=date('d-M-Y - h:i a', strtotime($notify['added_on']));?></span>
                </p>                                                            
                <hr class="message-inner-separator">
                <p>
                    <?= word_limiter($notify['noti_desc'],40);?>
                </p>
                <p>
                    <?php if(isset($notify['noti_link']) && !empty($notify['noti_link'])){?>
                    <a href="<?=$notify['noti_link']?>" target="_blank">
                        <button type="button" class="btn btn-danger">View</button>
                    </a>
                    <?php }?>
                </p>
            </div>                
        </div>
        <?php }}?>
    </div>
<?php }?>


<!--<table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Notification Title</th>
                <th>Notification Description</th>
                <th>Notification Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if(!empty($notifications)){
                    foreach($notifications as $notify){?>      
                
                <tr>
                  
                  <td><?=$notify['noti_title'];?></td>
                  <td>
                  <?= word_limiter($notify['noti_desc'],40);?>
                      
                      <?php if(isset($notify['noti_link']) && !empty($notify['noti_link'])){?>
                      <a href="<?=$notify['noti_link']?>" target="_blank">See more</a>
                      <?php }?>
                  </td>
                  <td><?=date('d-M-Y - h:i a', strtotime($notify['added_on']));?></td>
                  <td>
                        
                   <a class="btn btn-danger Delete" onclick="confirmDelete('<?= $notify['noti_id'] ?>','<?= site_url('notifications/DeleteNotification/') ?>', true)" href="javascript:void(0);">
                        <i class="fas fa-trash-alt" aria-hidden="true" style="margin: 0;color: #fff;font-size: 16px;"></i>
                    </a> 
                  </td>
                </tr>
                <?php
               
                  }
                    }
                    else{
                ?>
                <h5>No Notification found.</h5>
                <?php } ?>
            </tbody>
          </table>-->