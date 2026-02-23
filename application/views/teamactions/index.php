<?php $this->load->view('include/header'); ?>
<style>
    .card{
        margin: 0 0 30px 0;
    }
</style>
<div class="container-mid" style="min-height: 500px;">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <?php if(count($cvreviews_list)>0){?>
            <?php 
            $cvr=1;
            foreach ($cvreviews_list as $current_review){
                $user_details = GetUserDetails($current_review->member_id);
            ?>
            <div class="col-md-3 col-xs-12">
                <div class="card" id="rownum<?=$current_review->review_id?>" style="<?=!empty($current_review->admin_comments) || $current_review->review_status == 'commented' ? 'background: #e4f9e3;':'';?> <?=$current_review->review_status == 'review_done' ? 'background: #91c6d2;':'';?>">
                    <div class="card-body">
                        <b>#<?=$cvr?></b>                                                
                        <a href="<?=site_url('profile/'.$current_review->member_id);?>" target="_blank">
                            <?=$user_details->m_name;?> | <?=$user_details->m_profession;?> | <?=$user_details->m_current_city;?> - <?=$current_review->member_id;?>
                        </a>
                        <br />
                        <?=$current_review->review_title;?>
                        <br>
                        <br>
                        <b>Submission Date:</b> <?=date('h:i a - d-M-Y', strtotime($current_review->added_on));?>
                        <br>
                        <b> Target Date: </b>
                        <?php
                        echo  date('h:i a - d-M-Y', strtotime($current_review->added_on. ' + 2 days'));
                        ?>
                        <br>
                        <b> Assigned To: </b>
                        <?php
                        if($current_review->assign_user_to>0){
                            $assigned_user_detail = GetUserDetails($current_review->assign_user_to);?>
                        <a href='<?=site_url('profile/'.$current_review->assign_user_to);?>'> 
                            <?=$assigned_user_detail->m_name;?> | <?php echo $assigned_user_detail->m_profession." | ".$assigned_user_detail->m_current_city." - ".$assigned_user_detail->m_id;?> 
                        </a> 
                        <?php }else{
                            echo "No One";
                        }          
                        ?>
                        <p class="exper-advise">
                            <b>Expert Advise:</b><br ><?=nl2br(substr($current_review->admin_comments, 0,100)."...");?>
                        </p>
                        <br>
                        <a class="btn btn-success" href="<?=site_url('cvreview/UpdateCvReview/'.$current_review->member_id);?>">View Details</a>
                    </div>
                </div>
            </div>
            <?php $cvr++; }?>                
        <?php }else{?>        
        <h4 class="mx-auto">There is no Cv Assigned for <?= BasicInfoUser($team_member_id)->m_name;?></h4>        
        <?php }?>
    </div>
</div>

<?php $this->load->view('include/footer'); ?>