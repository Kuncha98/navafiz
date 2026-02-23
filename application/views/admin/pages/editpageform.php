

<?php
$ans = $pages->description;

$content = str_replace(array('\r\n', '\r', '\n'), "<br />", $ans); 
?>
<form role="form" method="post" action="<?=site_url('admin/main/updatepage').'/'.$pages->id?>" class="form-horizontal form-bordered">
  <div class="panel panel-default">
    
    <div class="panel-body">
    
    
      <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Enter Name" class="form-control" required name="name" value="<?=$pages->name;?>">
        </div>
      </div>
        
        <input type="hidden" placeholder="Enter Name" class="form-control" required name="slug" value="<?=$pages->slug;?>">
<!--        <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Enter Name" class="form-control" required="" name="name" id="name" value="<?=$pages->name;?>">
        </div>
      </div>-->
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
            <textarea cols="5" rows="5" class="form-control" name="descr"><?=stripslashes($content)?></textarea>
        </div>
      </div>
      <div class="form-actions mb-5">
        <input type="submit" class="btn btn-primary" value="Submit" /> 
      </div>
    </div>
  </div>
</form>

