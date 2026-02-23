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
<?php
$ans = $form->blog_description;

$content = str_replace(array('\r\n', '\r', '\n'), "<br />", $ans); 
?>

<form action="<?=base_url('admin/blog/blog_file')?>" id="blogForm" class="form-horizontal form-bordered"  method="POST" enctype="multipart/form-data">
  <input type="hidden" id="blog_image_name" name="blog_image_name" value="" />
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name" class="form-control" name="name" id="name" value="<?=$form->blog_title?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Category:</label>
        <div class="col-sm-10">
          <select id="cat_id" class="form-control">
            <?php
			 
				 if($categories != "empty")
				 {
					 foreach($categories as $category)
					 {
				 ?>
            <option value="<?=$category->blogc_id?>" <?=($form->blog_category_id == $category->blogc_id)? "selected" : ""?>>
            <?=$category->blogc_title?>
            </option>
            <?php
					 }
				 }
				 ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Slug:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Slug" class="form-control" name="slug" id="slug" value="<?=$form->blog_slug;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Image: </label>
        <div class="col-sm-10">
          <input type="file" id="blogfile" name="blogfile">
          <div></div>
          <table id="files">
          </table>
          <img id="l_image" src="<?=base_url()?>assets/uploads/blogs/small_thumbs/<?=$form->blog_image;?>" width="80" /> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Short Description:</label>
        <div class="col-sm-10">
          <textarea class="limited form-control" cols="5" rows="5" name="short_descr" id="short_descr"><?=$form->blog_short_description;?></textarea>
          <span id="limit-text" class="help-block">Field limited to 300 characters.</span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tags:</label>
        <div class="col-sm-10">
          <input type="text" id="tags2" class="tags" value="<?=$form->blog_tags;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
          <textarea class="editor" name="descr" id="descr"	 placeholder="Enter text ..."><?=stripslashes($content);?>
</textarea>
          </textarea>
        </div>
      </div>
      <div class="form-actions text-right">
        <input type="button" class="btn btn-primary" value="Submit" onclick="editForm(<?=$form->blog_id?>)" />
      </div>
    </div>
  </div>
</form>
