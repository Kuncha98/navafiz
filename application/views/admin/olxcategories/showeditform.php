<form role="form" action="javascript:void(0)" class="form-horizontal form-bordered">
<input type="hidden" id="imagefile" name="imagefile" value="" />
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name" class="form-control" name="name" id="name" value="<?=$form->c_title;?>">
        </div>
      </div>
      
      <div class="form-actions text-right">
        <input type="button" class="btn btn-primary" value="Submit" onclick="editForm(<?=$form->c_id?>)" />
      </div>
    </div>
  </div>
</form>
