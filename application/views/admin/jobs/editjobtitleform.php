
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />

<?php
//print_r($forms);
//exit();
?>
               
<form action="<?=base_url('admin/jobs/updatejobtitle').'/'.$forms->jt_id?>" class="form-horizontal form-bordered mt-5" method="post" id="jobpage">
<div class="panel-body">
      
    <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" value="<?=$forms->jt_title?>">
        </div>
      </div>
      
     
      
      <div class="form-actions text-right">
        <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
</div>

</form>
        
 