<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<?
$ans = $pages->description;

$content = str_replace(array('\r\n', '\r', '\n'), "<br />", $ans); 
?>
<form role="form" action="#" class="form-horizontal form-bordered">
  <div class="panel panel-default">
    
    <div class="panel-body">
    
    
      <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name" class="form-control" name="name" id="name" value="<?=$pages->name;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
          <textarea cols="5" rows="5" name="descr" id="descr"><?=stripslashes($content)?></textarea>
           <script>
                   if(CKEDITOR.instances['descr'])
   delete CKEDITOR.instances['descr'];
CKEDITOR.replace('descr');
                    </script> 
        </div>
      </div>
      <div class="form-actions text-right">
        <input type="button" class="btn btn-primary" value="Submit" onclick="editPage(<?=$pages->id?>)" /> 
      </div>
    </div>
  </div>
</form>

