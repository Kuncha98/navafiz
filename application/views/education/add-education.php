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
            <h2>Edit Education</h2>
            <?php } else{ ?>
            <h2>Add Education</h2>              
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal" method="post" action="<?=site_url(isset($result) ? 'education/updateEducation' : 'education/SaveEducation');?>">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Degree Level <span class="required">*</span></label>
                    <select class="select-category form-control" name="me_degree" id="degree">
                      <!--  <option label="Select Option"></option>-->
                      <option value="Matric <?= isset($result['me_degree']) && $result=='Matric'  ? "selected" :''?>">Matric</option>
                      <option value="Intermediate <?= isset($result['me_degree']) && $result=='Intermediate'  ? "selected" :''?>">Intermediate (FA/FSc, A-levels or equivalent)</option>
                      <option value="Bachelor <?= isset($result['me_degree']) && $result=='Bachelor'  ? "selected" :''?>">Bachelor's (BA, Bcom, BSc, Engieenring, MBBS etc.)</option>
                      <option value="Master <?= isset($result['me_degree']) && $result=='Master'  ? "selected" :''?>">Master's (MA, Mcom, MSc, M.Phil etc.)</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Completion Year <span class="required">*</span></label>
                    <input id="input_year" type="text" name="me_year" value="<?=isset($result['me_year']) ? $result['me_year']:'' ?>"  class="form-control" autocomplete="off" readonly=""/>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Detail <span class="required">*</span></label>
                    <textarea id="descr" name="me_descr" placeholder="" class="form-control"><?=set_value('me_descr',isset($result['me_descr']) ? $result['me_descr']:'');?></textarea>
                  </div>
                </div>
                <?php if(isset($result['me_id']) && $result['me_id']>0){?>
                      <input type="hidden" name="me_id" value="<?=$result['me_id'];?>">
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