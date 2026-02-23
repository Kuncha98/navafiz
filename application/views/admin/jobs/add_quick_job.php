
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<?php

?>
<form action="<?=base_url()?>admin/jobs/save_quick_job" class="form-horizontal form-bordered" method="post" id="jobpage">



    <div class="panel-body">
      
      
    <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-6">
          <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" value="">
        </div>
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-6">
            <textarea name="description" class="form-control" col="6" rows="4" placeholder="Type Description..."></textarea>
        </div>
      </div>
      <div class="form-actions mb-5">
        <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
    </div>

</form>