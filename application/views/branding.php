<?php $this->load->view('include/header.php'); ?>
<link href="<?=base_url()?>assets/frontend/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery.tagsinput.min.css">
<style type="text/css">
    .sample-skills{
        border-bottom: 1px solid#000;
        padding-bottom: 10px;
        margin-bottom: 20px;
        margin-top: 30px;
    }
</style>
<div class="page category-page"> 
  <div class="clearfix"></div>
 
  <section class="dashboard-body">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="Heading-title-left black small-heading">
                    <h3>My Branding Statement</h3>

                </div>
                <div class="post-job2-panel">
                <div class="form-group"> <span class="errormessage"><?php echo validation_errors(); ?></span> </div>
                <div class="form-group"> <span class="successmessage"><?php echo $this->session->flashdata('msg'); ?></span> </div>
                 <form action="<?=base_url('postBranding')?>" class="row" method="post" id="formd">
                    <div class="clearfix"></div> 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="ol-md-12 col-sm-12 col-xs-12 sample-skills">
                                <b>Note:</b> Branding Statement should be relevant to your profession, must not exceed 200 characters.
                            </div>                            
                            </label>
                        </div>
                        <div class="form-group">                            
                            <textarea name="branding_statement" placeholder="Add Branding Statement" rows="3" style="resize: none;" class="form-control"><?=$profile->m_branding?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">Save <i style="font-size: 13px;margin-top: 0px;color:#fff;" class="fa fa-angle-right"></i></button>
                    </div>                                      
                </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('include/footer.php'); ?>
 


 <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/jquery.tagsinput.min.js"></script>
        <script type="text/javascript">
            $('#tags').tagsInput({
                width: 'auto'
            });
        </script>