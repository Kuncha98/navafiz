
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />

<?php
//print_r($forms);
//exit();
?>
               
<form action="<?=base_url('admin/recruitment_projects/update_recruitment').'/'.$forms->id?>" class="form-horizontal form-bordered mt-5" method="post" id="jobpage">
<div class="panel-body">
      
    <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-6">
            <input type="text" placeholder="Enter Title" class="form-control" name="name" id="title" value="<?=$forms->name?>">
        </div>
        <label class="col-sm-2 control-label">Email:</label>
        <div class="col-sm-6">
            <input type="email" placeholder="Enter Title" class="form-control" name="email" id="title" value="<?=$forms->email?>">
        </div>
        <label class="col-sm-2 control-label">Phone Number:</label>
        <div class="col-sm-6">
            <input type="text" placeholder="Enter Title" class="form-control" name="phone_no" id="title" value="<?=$forms->phone_no?>">
        </div>
        
      </div>
      
     
      
      <div class="form-actions ml-3">
        <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
</div>

</form>
        
 