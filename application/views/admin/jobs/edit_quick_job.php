
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />

<?php
//print_r($forms);
//exit();
?>
               
<form action="<?=base_url('admin/jobs/update_quick_job').'/'.$forms->quick_job_id?>" class="form-horizontal form-bordered mt-5" method="post" id="jobpage">
<div class="panel-body">
      
    <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-6">
            <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" value="<?=$forms->title?>">
        </div>
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-6">
            <textarea name="description" class="form-control" col="6" rows="4"><?=$forms->description?></textarea>
        </div>
      </div>
      
     
      
      <div class="form-actions ml-3">
        <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
</div>

</form>
        
 