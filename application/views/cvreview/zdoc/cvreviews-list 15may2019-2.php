<?php $this->load->view('header.php'); 
$cvreview_team = CvReviewTeamList();
?>

<body>
<div class="page category-page"> 
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <section class="categories-list-page light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
            <?php $this->load->view('notification/notification-messages');?>
            <h1>Cv Review System</h1>
            <div class="row" style="font-size: 14px;">
                <div class="col-md-12" style="padding-left: 20px;">
                    <style>
                        ul.counters li{
                            font-weight: bold;
                            border: solid 1px #ccc;
                            padding: 3px 10px;
                        }
                        ul.counters li.line{
                            border-top: 1px solid #ccc;
                        }
                        p.exper-advise{
                            line-height: 18px;
                        }
                        ul.cvreviews_list{
                            
                        }
                        ul.cvreviews_list li{
                            padding: 20px;
                        }
                        ul.cvreviews_list li span{
                            display: block;
                        }
                    </style>
                    
                    
                    <ul class="counters">
                        <li class="list-group-item">Total: <?= count($cvreviews_list);?> </li>
                        <li class="list-group-item">Approved: <?=CVreviewStatusByType(array('review_status'=>'review_done'));?> </li>
                        <li class="list-group-item">In Process: <?=CVreviewStatusByType(array('review_status'=>'commented'));?> </li>
                        <li class="list-group-item">Not Assigned: <?=GetCvReviewCountbyUser(0);?> </li>
                        <?php 
                            foreach($cvreview_team as $team_member_id){
                        ?>
                        <li class="list-group-item">
                            <a href="<?=site_url('profile/'.$team_member_id)?>">
                                <?=  GetUserDetails($team_member_id)->m_name?> 
                            </a>
                                | Assigned - (<?=GetCvReviewCountbyUser($team_member_id);?> ) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>$team_member_id));   ?> - Approved (<?=CVreviewStatusByType(array('review_status'=>'review_done','assign_user_to'=>$team_member_id)); ?>) - Pending (<?=CVreviewStatusByType(array('review_status'=>'review_inprocess','assign_user_to'=>$team_member_id)); ?>)
                            
                            </li>
                            
                        <?php }?>
                        <li class="line"></li>
                        
                    </ul>
                    <?php 
                       /* echo "<b>Liaqat Ali (".GetCvReviewCountbyUser(10).") Assigned</b> <br />";
                        echo "<b>Amna Hussain (".GetCvReviewCountbyUser(3478).") Assigned </b> <br />";
                        echo "<b>Umair Sumbal (".GetCvReviewCountbyUser(3346).") Assigned</b> <br />";
                        echo "<b>Waseem Raja (".GetCvReviewCountbyUser(4561).") Assigned</b> <br />";
                        echo "<b>Faraz Ahmad (".GetCvReviewCountbyUser(3816).") Assigned</b> <br />";
                        echo "<b>Rana Shahid (".GetCvReviewCountbyUser(11889).") Assigned</b> <br />";
                        echo "<b>Salman Ali (".GetCvReviewCountbyUser(7083).") Assigned</b> <br />";
                        echo "<b>Hassan Mohiuddin (".GetCvReviewCountbyUser(9570).") Assigned</b> <br />";
                        echo "<b>Nouman (".GetCvReviewCountbyUser(11900).") Assigned</b> <br />";
                        echo "<b>Muhammad Waqar (".GetCvReviewCountbyUser(3967).") Assigned</b> <br />";
                        echo "<b>Imamuddin (".GetCvReviewCountbyUser(9371).") Assigned</b> <br />";
                        echo "<b>Azam Ilyas (".GetCvReviewCountbyUser(6227).") Assigned</b> <br />";
                        echo "<b>Fahad Sayeed (".GetCvReviewCountbyUser(11962).") Assigned</b> <br />";*/
                    ?>

                </div>
                
            </div>
            <div class="row">
                <?php
                if(count($cvreviews_list)>0){
                ?>
                <ul class="cvreviews_list">
                    <?php 
                    $cvr=1;
                    foreach ($cvreviews_list as $current_review){
                        $user_details = GetUserDetails($current_review->member_id);
                    ?>
                    <li class="cvreview_item"  id="rownum<?=$current_review->review_id?>" style="<?=!empty($current_review->admin_comments) || $current_review->review_status == 'commented' ? 'background: #e4f9e3;':'';?> <?=$current_review->review_status == 'review_done' ? 'background: #91c6d2;':'';?>">
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
                                <select name="assign_user_to"  class="form-control">
                                    <option value="0">Select member</option> 
                                    <?php foreach($cvreview_team as $team_member_id){?>
                                    <option <?=$current_review->assign_user_to==$team_member_id ? 'selected="" ':'';?> value="<?=$team_member_id?>">
                                        <?=GetUserDetails($team_member_id)->m_name;?> - <?=GetUserDetails($team_member_id)->m_profession;?>
                                        | Assigned - (<?=GetCvReviewCountbyUser($team_member_id);?> ) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>$team_member_id));?>
                                    </option> 
                                    <?php }?>
                                </select>
                                <input type="hidden" name="review_id" value="<?=$current_review->review_id?>">
                            </form>
                            <p class="exper-advise">
                                <b>Expert Advise:</b><br ><?=nl2br($current_review->admin_comments);?>
                            </p>
                            
                            <br>
                            <a class="btn btn-default" href="<?=site_url('cvreport/'.$current_review->member_id);?>">View Details</a>
                        </span>
                    </li>                
                <?php $cvr++; }}?>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </section>
  <script>
  $(document).ready(function(){ 
      $('.assignfrm').change(function(){
         $(this).submit();
      });
  });
  </script>
  <?php $this->load->view('footerbottom.php'); ?>   
</div>
</body>
</html>