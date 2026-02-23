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
        <div class="col-md-12 mx-auto">
            <div class="alert alert-info">                
                <img src="<?=profile_picture($notify['user_id']);?>" class="profile_img" /> <strong><?=$notify['noti_title'];?></strong>
                <?php $UserDetails = GetUserDetails($notify['user_id']);?>
                <hr class="message-inner-separator">
                <p>
                    <?= word_limiter($notify['noti_desc'],40);?>
                </p>
                <p>
                    <?php if(isset($notify['noti_link']) && !empty($notify['noti_link'])){?>
                    <a href="<?=$notify['noti_link']?>" target="_blank">
                        <button type="button" class="btn btn-danger">View</button> <?=date('d-M-Y - h:i a', strtotime($notify['added_on']));?>
                    </a>
                    <?php }?>
                </p>
            </div>                
        </div>
        <?php }}?>
    </div>
<?php }?>

