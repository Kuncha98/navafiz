
<form action="<?=base_url('admin/classified/save_product')?>"  class="form-horizontal form-bordered"  method="POST" enctype="multipart/form-data">
  <!--<form role="form" action="#" class="form-horizontal form-bordered">-->
  <input type="hidden" id="blog_image_name" value="" />
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Category:</label>
        <div class="col-sm-10">
            <select name="cat_id" class="form-control">
            <?php
			 
				 if($categories != "empty")
				 {
					 foreach($categories as $category)
					 {
				 ?>
            <option value="<?=$category->c_id?>">
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
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name" class="form-control" name="title" id="name" value="">
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
          <input type="file" id="pic" name="pic" class="form-control">
       </div>
<!--      <div class="form-group">
        <label class="col-sm-2 control-label">Short Description:</label>
        <div class="col-sm-10">
          <textarea class="limited form-control" cols="5" rows="5" name="short_descr" id="short_descr">
</textarea>
          <span id="limit-text" class="help-block">Field limited to 300 characters.</span> </div>
      </div>-->
      <div class="form-group">
        <label class="col-sm-2 control-label">Tags:</label>
        <div class="col-sm-10">
            <input type="text" id="tags2" name="pro_tags" class="tags form-control" value="" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
            <textarea class="editor form-control" rows="5" name="descr" id="descr"	 placeholder="Enter text ..."></textarea>
       
        </div>
      </div>
      <div class="form-actions text-right">
          <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </div>
</form>
