<?php $cvreview_team = CvReviewTeamList();
if(count($cvreviews_list)>0){?>
<?php     
$cvr=1;
foreach ($cvreviews_list as $current_review){
$user_details = BasicInfoUser($current_review->member_id);
?>
<div class="col-md-4 col-xs-12 cvreviews_list">
    <div class="card cvreview_item" id="rownum<?=$current_review->review_id?>" style="<?=!empty($current_review->admin_comments) || $current_review->review_status == 'commented' ? 'background: #e4f9e3;':'';?> <?=$current_review->review_status == 'review_done' ? 'background: #91c6d2;':'';?>">
        <div class="card-body">
            <span class="num"></span>
            <span class="desc">
                <b>#<?=$cvr?></b> 
                <br>
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

                <form action="<?=site_url('cvreview/AssignCvReview')?>" class="assignfrm" method="post">
                    <div class="row">
                    <div class="col-md-8 col-xs-8">
                        <select name="assign_user_to"  class="form-control select2">
                            <option value="0">Select member</option> 
                            <?php foreach($cvreview_team as $team_member_id){?>
                            <option <?=$current_review->assign_user_to==$team_member_id ? 'selected="" ':'';?> value="<?=$team_member_id?>">
                                <?=BasicInfoUser($team_member_id)->m_name;?> - <?=GetUserDetails($team_member_id)->m_profession;?>
                                | Assigned - (<?=GetCvReviewCountbyUser($team_member_id);?> ) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>$team_member_id));?>
                            </option> 
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <button class="btn btn-success" type="submit">Assign</button>
                    </div>
                    <input type="hidden" name="review_id" value="<?=$current_review->review_id?>">
                    </div>
                </form>


                <p class="exper-advise">
                    <b>Expert Advise:</b><br ><?=nl2br($current_review->admin_comments);?>
                </p>

                <br>
                <a class="btn btn-info" href="<?=site_url('cvreport/'.$current_review->member_id);?>">View Details</a>
            </span>
        </div>
    </div>
</div>
<?php $cvr++; }}?>
<!--<ul class="cvreviews_list">    
    <li class="cvreview_item"  >
        
    </li>         
</ul>-->
<script>
$(document).ready(function(){
     //$('.select2').select2(); 
});
</script>