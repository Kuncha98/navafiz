<?php $this->load->view('include/header'); ?>
<style type="text/css">
  .dropdown-menu{
    right: auto;
    min-width: auto;
  }
</style>
<div class="container">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-12">
            <?php if(isset($result)){ ?>
            <h2>Edit Certification</h2>
            <?php } else{ ?>
            <h2>Add Certification</h2>              
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal" method="post" action="<?=site_url(isset($result) ? 'certification/updateCertification/'.$uri_user_id : 'certification/SaveCertification/'.$uri_user_id);?>" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Certification Title <span class="required">*</span></label>
                    <input id="input_title" type="text" name="c_title" value="<?=isset($result['c_title']) ? $result['c_title']:'' ?>"  class="form-control" autocomplete="off" />

                  </div>
                </div>
                 <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Certification Duration <span class="required">*</span></label>
                    <input id="input_duration" type="text" name="c_duration" value="<?=isset($result['c_duration']) ? $result['c_duration']:'' ?>"  class="form-control" autocomplete="off" />
                  </div>
                </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Certificate File<span class="">*</span></label>
                        <input type="file" id="img" name="img"  value="" class="form-control">
                    </div>
                  </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Certification Description <span class="required">*</span></label>
                    <textarea id="input_description" name="c_description" placeholder="" class="form-control"><?=set_value('c_description',isset($result['c_description']) ? $result['c_description']:'');?></textarea>
                  </div>
                </div>
               
                <?php if(isset($result['c_id']) && $result['c_id']>0){?>
                      <input type="hidden" name="c_id" value="<?=$result['c_id'];?>">
                  <?php }?> 
                <div class="col-md-12 col-sm-12">
                    <input type="submit" class="btn btn-primary col-md-12 col-xs-12" value="Save">
                </div>
              </form>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
$(document).ready(function(){    
    $('#input_year').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });    
});
  
   
    



   
</script> 
</div>
</body>
</html>