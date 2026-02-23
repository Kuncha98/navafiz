<?php $this->load->view('header.php'); ?>
<style>
    label{
        font-size: 12px !important;
    }
</style>
<body>
<div class="page category-page">
    <?php $this->load->view('pagetop.php'); ?>
    <div class="container">
        <?php $this->load->view('notification/notification-messages');?>
        <form action="<?=base_url('PostCvReview');?>" method="post" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 50px auto 0 auto;">
                <div class="row">                           
                  <h3>Submit CV for Review</h3>
                  <?php 
                  $i=1;
                  foreach($cvr_points as $cvrpiont){?>
                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong><?=$i?>. <?=$cvrpiont->question;?> ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="<?=$cvrpiont->id?>" id="option1" required="" value="<?=$cvrpiont->option_1?>"> <?=$cvrpiont->option_1?>
                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="<?=$cvrpiont->id?>" id="option2"  required="" value="<?=$cvrpiont->option_2?>"> <?=$cvrpiont->option_2?>
                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="<?=$cvrpiont->id?>" id="option3"  required="" value="<?=$cvrpiont->option_3?>"> <?=$cvrpiont->option_3?> 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                <?php 
                $i++;                
                  }?>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="form-group">
                      <label>CV Title *</label>
                      <input type="text" placeholder="CV Title" id="cvtitle" name="review_title" class="form-control" required>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <div class="form-group">
                    <label>Detials</label>
                    <textarea  name="user_comments" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">            
                    <div class="form-group">
                      <label>CV </label>
                      <span class="Errorclass" id="jobimagesms"></span>
                      <input type="file" id="cvfile"  name="resume_file" required="">
                      <span><img id="j_image" src="<?=base_url()?>assets/uploads/jobs/" width="80" height="80" style="display:none"  /></span>
                      <table id="files">
                      </table>
                    </div>
                  
                </div>
                </div>
            </div>            
            <div class="row">
                <button type="submit" class="btn btn-default col-md-8 col-sm-8 col-xs-10">Submit <i class="fa fa-angle-right"></i></button>
            </div>
        </form>
    </div>  
    <?php $this->load->view('footerbottom.php'); ?> 
</div>
</body>
</html>