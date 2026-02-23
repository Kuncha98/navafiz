<?php $this->load->view('header.php'); ?>
<style>
.panel-body ul {
	list-style: none !important;
}
</style>
<body>
<div class="page category-page"> 
<?php $this->load->view('pagetop.php'); ?>
<div class="clearfix"></div>
 
<section class="dashboard-body">
  <div class="row">
          <div class="col-md-12" style="padding: 0 10%;">
          <div class="widget-area no-padding blank">
             <!-- <h1>Whats happenings</h1>-->
              <div class="status-upload">
                  <form action="<?=base_url()?>addshout" class="form-horizontal" method="post" id="happenpage" enctype="multipart/form-data">
                  <input type="hidden" id="happenimage" name="happenimage" value="" />
                  <div class="form" style="padding: 20px">
                    <?php if($this->session->flashdata('msg')){?>
                    <div role="alert" class="form alert alert-success">
                      <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                      <?php echo $this->session->flashdata('msg'); ?> 
                    </div>
                    <?php } ?>
                    <div class="form-group">
                      <div class="col-md-12">
                        <textarea class="form-control todo-taskbody-taskdesc" id="posting_message" name="posting_message" required  rows="8" placeholder="Enter Message..."><?php if (isset($_POST['posting_user'])) echo $_POST['posting_message'];?></textarea>
                        <span id="shsmserror"></span> 
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <input type="file" id="pic"  name="pic"> </div>
                    </div>
                    <div class="form-group" style="margin-left:10px;">
                    <button  class="btn btn-success green col-md-12 col-xs-12" type="submit">Post</button>

                    </div>
                  </div>
                  </form>

              </div><!-- Status Upload  -->
          </div><!-- Widget Area -->

          <div class="all-jobs-list-box2">
                    <?php
                        $qry = "select * from `jb_shoutbox`
                                JOIN jb_member ON jb_shoutbox.sh_member_id = jb_member.m_id where sh_status = 1 ORDER BY add_date DESC"; //where add_date = '".date("Y-m-d",time())."' 
                       $vpb_check_items = mysql_query($qry);
                      if(mysql_num_rows($vpb_check_items) > 0)
                      {?>
                  <?php
                          while($vpb_rows = mysql_fetch_array($vpb_check_items)){?>  
                              <div class="job-box job-box-2">
                                <?php if($vpb_rows['sh_image'] != ""){?>
                                  <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                  <?php if($vpb_rows['sh_image'] != ""){?>
                                      <div class="comp-logo">
                                       <a style="padding: 0;border: none;" href="<?=base_url()?><?=$vpb_rows['sh_image']?>" target="_blank" class="thumbnail">
                                           <img src="<?=base_url('assets/uploads/members/'.$vpb_rows['sh_image']);?>" class="img-responsive">
                                       </a>
                                        <!--  <a href="#"><img src="<?=base_url()?>assets/uploads/happens/<?=$vpb_rows['sh_image']?>" class="img-responsive" alt="scriptsbundle"> </a>-->
                                      </div>
                                      <?php }?>  
                                  </div>
                                  <?php }?>
                                  <div class="col-md-10 col-sm-10 col-xs-12">
                                      <div class="job-title-box">
                                          <a href="<?=site_url('professional/'.$vpb_rows['sh_member_id']);?>">
                                              <div class="job-title"> <?=$vpb_rows['m_name']?></div>
                                          </a>
                                          <a href="#"><span class="comp-name"> <?=date('D, d F Y, H:i A',  strtotime($vpb_rows['add_date']));?></span></a>
                                        <!-- /* <a href="#" class="job-type jt-part-time-color">
                                              <i class="fa fa-clock-o"></i> Part Time
                                          </a>*/-->
                                      </div>
                                      <p> <?=$vpb_rows['message']?> </p>
                                  </div>
                                <!--  <div class="job-salary">
                                      <i class="fa fa-money"></i> $200 - $300
                                  </div>-->
                              </div>
                               <?php }
                                 }?>
                          </div>

                </div>
      </div>
</section>
  <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>


</div>
</body>
</html>