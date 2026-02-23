 <!--<select class="form-control">
     <option value="active" <?=($faq->status == "active")?"selected":""?>>Active</option>
    <option value="inactive" <?=($faq->status == "inactive")?"selected":""?>>Inactive</option>
  </select>-->
<form role="form" action="#" class="form-horizontal form-bordered">
  <div class="panel panel-default">
    <!--<div class="panel-heading">
      <h6 class="panel-title"><i class="icon-menu"></i> Form bordered</h6>
    </div>-->
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Question:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Question" class="form-control" name="question" id="question" value="<?=$faq->question;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Answer:</label>
        <div class="col-sm-10">
          <textarea class="form-control" cols="5" rows="5" name="answer" id="answer"><?=$faq->answer?></textarea>
        </div>
      </div>
      <div class="form-actions text-right">
        <input type="button" class="btn btn-primary" value="Submit form" onclick="editFaq(<?=$faq->id?>)" /> 
      </div>
    </div>
  </div>
</form>


