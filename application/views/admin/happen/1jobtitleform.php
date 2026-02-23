<!--<link rel="stylesheet" href="<?=base_url()?>resources/admin/js/uploader/jquery-ui.css">
<script type="text/javascript" src="<?=base_url()?>assets/frontend/uploader/jquery.fileupload.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/frontend/uploader/jquery.fileupload-ui.js"></script>-->
<script>
/*global $ */
	
$(function () {
    $('#jobpage').fileUploadUI({
        uploadTable: $('#files'),
        downloadTable: $('#files'),
		
        buildUploadRow: function (files, index) {
            return $('<tr><td><img src="<?=base_url()?>assets/admin/images/small.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
			$('#jobimage').val(file.name);
			$('#j_image').show();
			$('#j_image').attr('src','<?=base_url()?>assets/uploads/jobs/'+file.name);

        }
    });
   
	$('.editor').wysihtml5({
	    stylesheets: "css/wysihtml5/wysiwyg-color.css"
	});

});
</script>


  <form action="<?=base_url()?>admin/job/admin_upload_job_image" class="form-horizontal form-bordered" method="post" action="#" id="jobpage">
<input type="hidden" id="jobimage" name="jobimage" value="" />

<!--<form role="form" action="#" class="form-horizontal form-bordered">
<input type="hidden" id="imagefile" name="imagefile" value="" />-->
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
              <option value="<?=$category->c_id?>">
              <?=$category->c_name?>
              </option>
              <?
					 }
				 }
				 ?>
            </select>
        </div>
      </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" value="">
        </div>
      </div>
      
     
     <div class="form-group">
        <label class="col-sm-2 control-label">Image:</label>
        <div class="col-sm-10">
           <input type="file" id="jobfile"  name="jobfile">
                  <table id="files"></table>
                <img id="j_image" src="<?=base_url()?>assets/uploads/jobs/" width="80" style="display:none"  />
        </div>
      </div>
      
     
      
    
      
      <!--<div class="form-group transdata" >
        <label class="col-sm-2 control-label">Image:</label>
        <div class="col-sm-10">
          <div id="mulitplefileuploader">Upload</div>
           <span style="color:#060"><strong>Recommended size 400 by 200</strong></span>
          <span>
         
          </span> </div>
      </div>-->
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
         <textarea class="editor" name="descr" id="descr" placeholder="Enter text ..."></textarea>
</textarea>
        
        </div>
      </div>
      
      <?php /*?><div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
          <textarea cols="5" rows="5" name="descr" id="descr">
</textarea>
          <script>
                   if(CKEDITOR.instances['descr'])
   delete CKEDITOR.instances['descr'];
CKEDITOR.replace('descr');
                    </script> 
        </div>
      </div><?php */?>
      
      
      <div class="form-actions text-right">
        <input type="button" class="btn btn-primary" value="Submit" onclick="addForm()" />
      </div>
    </div>
  </div>
</form>
