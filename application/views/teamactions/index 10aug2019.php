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
                ?>
                <table width="95%" align="left" border="1">
                    <?php 
                    $cvr=1;
                    foreach ($cvreviews_list as $current_review){
                        $user_details = GetUserDetails($current_review->member_id);
                    ?>
                    <tr id="rownum<?=$current_review->review_id?>" style="<?=!empty($current_review->admin_comments) || $current_review->review_status == 'commented' ? 'background: #e4f9e3;':'';?> <?=$current_review->review_status == 'review_done' ? 'background: #91c6d2;':'';?>">
                        <td>
                            <b><?=$cvr?></b>                            
                        </td>
                        <td style="padding: 20px;">
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
                                <b>Expert Advise:</b><br ><?=nl2br($current_review->admin_comments);?>
                            </p>
                            
                            <br>
                            <a class="btn btn-default" href="<?=site_url('cvreport/'.$current_review->member_id);?>">View Details</a>
                        </td>
                    </tr>
                    <?php 
                    $cvr++; }?>                    
                </table>            
                <?php }?>
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