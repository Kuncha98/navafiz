<form role="form" method="post" action="<?=site_url('admin/jobs/update_categories').'/'.$form->c_id?>" class="form-horizontal form-bordered">
<input type="hidden" id="imagefile" name="imagefile" value="" />
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name" class="form-control" name="name" id="name" value="<?=$form->c_name;?>">
        </div>
      </div>
      <div class="form-actions text-right">
        <input type="submit" class="btn btn-primary" value="Submit"  />
      </div>
    </div>
  </div>
</form>
