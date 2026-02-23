<!--<link rel="stylesheet" href="<?=base_url()?>resources/admin/js/uploader/jquery-ui.css">
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/uploader/jquery.fileupload.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/uploader/jquery.fileupload-ui.js"></script>-->

<script>
/*global $ */

$(function () {
    
	$('.limited').inputlimiter({
		
		limit: 300,
		boxId: 'limit-text',
		boxAttach: false
	});
		$('.tags').tagsInput({width:'100%'});
	$('.tags-autocomplete').tagsInput({
		width:'100%',
		//autocomplete_url:'tags_autocomplete.html'
	});
$('.editor').wysihtml5({
	    stylesheets: "css/wysihtml5/wysiwyg-color.css"
	});
});
</script>

<form action="<?=base_url()?>admin/blog/blog_file" id="blogForm" class="form-horizontal form-bordered"  method="POST" enctype="multipart/form-data">
  <!--<form role="form" action="#" class="form-horizontal form-bordered">-->
  <input type="hidden" id="blog_image_name" value="" />
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Category:</label>
        <div class="col-sm-10">
          <select id="cat_id" class="form-control">
            <?
			 
				 if($categories != "empty")
				 {
					 foreach($categories as $category)
					 {
				 ?>
            <option value="<?=$category->blogc_id?>">
            <?=$category->blogc_title?>
            </option>
            <?
					 }
				 }
				 ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name" class="form-control" name="name" id="name" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Slug:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Slug" class="form-control" name="slug" id="slug" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Image: </label>
        <div class="col-sm-10">
          <input type="file" id="blogfile" name="blogfile">
          <div></div>
          <table id="files">
          </table>
          <img id="l_image" src="<?=base_url()?>assets/uploads/blogs/" width="80" /> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Short Description:</label>
        <div class="col-sm-10">
          <textarea class="limited form-control" cols="5" rows="5" name="short_descr" id="short_descr">
</textarea>
          <span id="limit-text" class="help-block">Field limited to 300 characters.</span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Skills required for job:</label>
        <div class="col-sm-10">
          <input type="text" id="tags2" class="tags" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
          <textarea class="editor" name="descr" id="descr"	 placeholder="Enter text ..."></textarea>
          </textarea>
        </div>
      </div>
      <div class="form-actions text-right">
        <input type="button" class="btn btn-primary" value="Submit" onclick="addForm()" />
      </div>
    </div>
  </div>
</form>
