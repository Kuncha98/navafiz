<?php $this->load->view('header.php'); ?>

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
            
            <div class="row">
                <?php
                if(count($cvreviews_list)>0){
                    $approved= 1;
                    $inprocess= 0;
                ?>
                <table width="95%" align="left" border="1">
                    <?php 
                    foreach ($cvreviews_list as $current_review){
                        $user_details = GetUserDetails($current_review->member_id);
                    ?>
                    <tr id="rownum<?=$current_review->review_id?>" style="<?=!empty($current_review->admin_comments) || $current_review->review_status == 'commented' ? 'background: #e4f9e3;':'';?> <?=$current_review->review_status == 'review_done' ? 'background: #91c6d2;':'';?>">
                        <td style="padding: 20px;">
                            <a href="<?=site_url('profile/'.$current_review->member_id);?>" target="_blank">
                                <?=$user_details->m_name;?> | <?=$user_details->m_profession;?> | <?=$user_details->m_current_city;?>
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
                            <b> Assign To: </b>
                            <?php
                            if($current_review->assign_user_to>0){
                                echo GetUserDetails($current_review->assign_user_to)->m_name;
                            }else{
                                echo "No One";
                            }          
                            ?>
                            
                            <br>
                            <a class="btn btn-default" href="<?=site_url('cvreport/'.$current_review->member_id);?>">View Details</a>
                        </td> 
                        <td align="right">
                            <form action="<?=site_url('cvreview/AssignCvReview')?>" class="assignfrm" method="post">
                                <select name="assign_user_to"  class="form-control">
                                    <option <?=$current_review->assign_user_to=='10' ? 'selected=""':'';?> value="10">Liaqat Ali</option> 
                                    <option <?=$current_review->assign_user_to=='3478' ? 'selected=""':'';?> value="3478">Amna Hussain</option>
                                    <option <?=$current_review->assign_user_to=='3346' ? 'selected=""':'';?> value="3346">Umair Sumbal</option>
                                    <option <?=$current_review->assign_user_to=='4561' ? 'selected=""':'';?> value="4561">Waseem Raja</option>
                                    <option <?=$current_review->assign_user_to=='3816' ? 'selected=""':'';?> value="3816">Faraz Ahmad</option>
                                </select>
                                <input type="hidden" name="review_id" value="<?=$current_review->review_id?>">
                            </form>
                            
                        </td>
                    </tr>
                    <?php 
                    }?>
                    
                </table>            
                <?php }?>
            </div>
            <div class="row" style="font-size: 14px;">
                <h4>
                    Total: <?= count($cvreviews_list);?> <br />
                    Approved: <?=CVreviewStatusByType(array('review_status'=>'review_done'));?> <br />
                    In Process: <?=CVreviewStatusByType(array('review_status'=>'commented'));?> <br />
                </h4>
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