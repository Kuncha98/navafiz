<?php $this->load->view('include/header.php'); ?>
<style>
    label{
        font-size: 12px !important;
    }
</style>
    <div class="container">
        <?php $this->load->view('notification/notification-messages');?>
        <form action="<?=base_url('PostCvReview');?>" method="post" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 50px auto 0 auto;">
                <div class="row">                           
                  <h3>Submit CV for Review</h3>
                  
                
                <div class="clearfix"></div>
                
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">            
                    <div class="form-group">
                      <label>CV </label>
                      <span class="Errorclass" id="jobimagesms"></span>
                      <input type="file" id="cvfile"  name="resume_file" >
                      <span><img id="j_image" src="<?=base_url()?>assets/uploads/jobs/" width="80" height="80" style="display:none"  /></span>
                      <table id="files">
                      </table>
                    </div>
                  
                </div>
                </div>
            </div>            
            <div class="row">
                <button type="submit" class="btn btn-primary col-md-4 col-sm-4 col-xs-8">Submit <i class="fa fa-angle-right" style="font-size: 16px;color:#fff;margin-top: 0;"></i></button>
            </div>
        </form>
    </div>  
    <?php $this->load->view('include/footer.php'); ?> 