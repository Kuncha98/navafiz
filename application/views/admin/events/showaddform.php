<script>
$(function() {
$( "#datepicker" ).datepicker();

$('.editor').wysihtml5({
	    stylesheets: "css/wysihtml5/wysiwyg-color.css"
	});


});
</script>

<form action="<?=base_url()?>news/upload_news_image" id="newsForm" class="form-horizontal form-bordered"  method="POST" enctype="multipart/form-data">
  <input type="hidden" id="news_image_name" value="" />
  <div class="panel panel-default"> 
    <!--<div class="panel-heading">
      <h6 class="panel-title"><i class="icon-menu"></i> Form bordered</h6>
    </div>-->
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="name" id="name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Date</label>
        <div class="col-sm-10">
       	<input type="text" class="form-control" id="datepicker" placeholder="Default datepicker">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
            <textarea class="editor form-control" name="descr" id="descr" rows="4" cols="50" placeholder="Enter text ..."></textarea>
         
        </div>
      </div>
      <div class="form-actions text-right">
        <input type="button" class="btn btn-primary" value="Submit" onclick="addEvent()" />
      </div>
    </div>
  </div>
</form>
