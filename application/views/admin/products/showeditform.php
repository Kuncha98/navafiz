
<script>
/*global $ */

$(function () {
    $('#blogForm').fileUploadUI({
        uploadTable: $('#files'),
        downloadTable: $('#files'),
		
        buildUploadRow: function (files, index) {
            return $('<tr><td><img src="<?=base_url()?>assets/uploads/blogs/small.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
			$('#blog_image_name').val(file.name);
			$('#l_image').attr('src','<?=base_url()?>assets/uploads/blogs/'+file.name);

        }
    });
   
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
$ans = $form->pro_descr;

$content = str_replace(array('\r\n', '\r', '\n'), "<br />", $ans); 
?>

<form action="<?=base_url('admin/classified/update_product').'/'.$form->pro_id?>" id="" class="form-horizontal form-bordered"  method="POST" enctype="multipart/form-data">
  <input type="hidden" id="blog_image_name" name="blog_image_name" value="" />
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name" class="form-control" name="name" id="name" value="<?=$form->pro_title?>">
        </div>
      </div>
        <?php
//        print_r($categories);
//        exit();
        ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Category:</label>
        <div class="col-sm-10">
            <select id="cat_id" name="cat_id" class="form-control">
            <?php
			 
				 if($categories != "empty")
				 {
					 foreach($categories as $category)
					 {
				 ?>
            <option value="<?=$category->c_id?>" <?=($form->pro_category_id == $category->c_id)? "selected" : ""?>>
            <?=$category->c_name?>
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
          <input type="text" placeholder="Enter Slug" class="form-control" name="slug" id="slug" value="<?=$form->pro_slug;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Image: </label>
        <div class="col-sm-10">
            <input type="file" id="blogfile" name="pic" name="pic" class="form-control">
          <img id="pic" src="<?=base_url()?>nassets/products_img/<?=$form->pro_image;?>" width="80" /> 
        </div>
      </div>
<!--      <div class="form-group">
        <label class="col-sm-2 control-label">Short Description:</label>
        <div class="col-sm-10">
          <textarea class="limited form-control" cols="5" rows="5" name="short_descr" id="short_descr"><?=$form->pro_descr;?></textarea>
          <span id="limit-text" class="help-block">Field limited to 300 characters.</span> </div>
      </div>-->
      <div class="form-group">
        <label class="col-sm-2 control-label">Tags:</label>
        <div class="col-sm-10">
            <input type="text" id="tags2" class="tags form-control" name="pro_tags" value="<?=$form->pro_tags;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
          <textarea class="editor form-control" name="descr" id="descr"	 placeholder="Enter text ..."><?=stripslashes($content)?>
</textarea>
         
        </div>
      </div>
      <div class="form-actions text-right">
        <input type="submit" class="btn btn-primary" value="Submit"  />
      </div>
    </div>
  </div>
</form>
