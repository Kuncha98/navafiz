<form role="form" action="<?=site_url('admin/main/savefaq')?>" method="post" class="form-horizontal form-bordered">
  <div class="panel panel-default">
    
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Question:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Question" class="form-control" name="question" id="question">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Answer:</label>
        <div class="col-sm-10">
          <textarea class="form-control" cols="5" rows="5" name="answer" id="answer"></textarea>
        </div>
      </div>
      <div class="form-actions text-right">
        <input type="submit" class="btn btn-primary" value="Submit form" /> 
      </div>
    </div>
  </div>
</form>
