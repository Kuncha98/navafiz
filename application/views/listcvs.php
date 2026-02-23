<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="all-jobs-list-box">
    <?php if($jobs!='empty') {
			
foreach(@$jobs as $job){ 


?>
    <div class="job-box"> 
    
      <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
        <div class="job-title-box"> <a href="<?=base_url()?>professional/<?=$job->m_id?>">
          <div class="job-title">
            <?=$job->m_name?>
          </div>
          </a> </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 nopadding">
        <div class="job-title-box">
          <div class="job-title">
            <?=$job->cv_title?>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="job-type jt-remote-color"> <i class="fa fa-calender"></i>
          <?=date("M d-Y",$job->cv_add_date)?>
        </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-12 nopadding"> <a href="<?=base_url()?>review/<?=$job->cv_id?>" class="btn btn-primary btn-custom">Review CV</a> </div>
    </div>
    <?php
}
				  }
				  ?>
  </div>
</div>
