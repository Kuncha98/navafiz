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
                    $approved= 0;
                    $inprocess= 0;
                ?>
                <table width="95%" align="left" border="1">
                    <?php 
                    foreach ($cvreviews_list as $current_review){
                    ?>
                    <tr style="<?=!empty($current_review->admin_comments) || $current_review->review_status == 'commented' ? 'background: #e4f9e3;':'';?> <?=$current_review->review_status == 'review_done' ? 'background: #91c6d2;':'';?>">
                        <td style="padding: 20px;">
                            <a href="<?=site_url('profile/'.$current_review->member_id);?>" target="_blank">
                                <?=GetUserDetails($current_review->member_id)->m_name;?>
                            </a>
                            <br />
                            <?=$current_review->review_title;?>
                            <br>
                            <a class="btn btn-default" href="<?=site_url('cvreport/'.$current_review->member_id);?>">View Details</a>
                        </td>                   
                    </tr>
                    <?php 
                    
                        if($current_review->review_status=='review_done'){
                            $approved = $approved++;
                        }
                        
                        if($current_review->review_status=='commented'){
                            $inprocess = $inprocess++;
                        }
                    }?>
                    
                </table>            
                <?php }?>
            </div>
            <div class="row" style="font-size: 14px;">
                <h4>
                Total: <?=count($cvreviews_list);?> <br />
                Approved: <?=count($approved);?> <br />
                In Process: <?=count($approved);?> <br />
                </h4>
            </div>
        </div>
          
      </div>
    </div>
  </section>
  <?php $this->load->view('footerbottom.php'); ?>   
</div>
</body>
</html>