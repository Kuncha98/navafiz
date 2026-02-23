<?php $this->load->view('admin/header.php'); ?>
  
<script>
/*global $ */

$(function () {
   
   
	
	/*	$('.tags').tagsInput({width:'100%'});
	$('.tags-autocomplete').tagsInput({
		width:'100%',
		//autocomplete_url:'tags_autocomplete.html'
	});*/

});
</script>
<body>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<?php $this->load->view('admin/page_top.php'); ?>
<div class="page-container"> 
  <?php $this->load->view('admin/left_side.php'); ?>
  <div class="page-content"> 
    <div class="page-header">
      <div class="page-title">
        <h3>Jobs </h3>
      </div>
       </div>
       <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin/jobs">Home</a></li>
        <li class="active">Job Seeker Tips</li>
      </ul>
      <div class="visible-xs breadcrumb-toggle"> <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a> </div>
      
    </div>
  <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
        <li id="list"><a href="<?=base_url()?>admin/companies/index" id="listForms"><i class="icon-checkbox-partial"></i> List Companies</a></li>
        <li id="add"><a href="<?=base_url()?>admin/companies/addcompanyform" id="showAddForm"><i class="icon-checkbox-unchecked"></i> Add Company</a></li>
       
      </ul>
      <div class="alert fade in block-inner" id="sms-area" style="display:none">
		                <button data-dismiss="alert" class="close" type="button">×</button>
		                <i class="icon-checkmark-circle"></i> <span id="message"></span>
		            </div>
      <div class="tab-content"> 
        
        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside"> 
               
          <div class="panel panel-default">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-paragraph-justify"></i> Jobs</h6>
            </div>
              <form action="<?=base_url()?>admin/companies/savecompanies" class="form-horizontal form-bordered" method="post" id="jobpage" enctype="multipart/form-data">
<input type="hidden" id="jobimage" name="jobimage" value="" />

<!--<form role="form" action="#" class="form-horizontal form-bordered">
<input type="hidden" id="imagefile" name="imagefile" value="" />-->
  <div class="panel panel-default">
    <div class="panel-body">
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Category:</label>
        <div class="col-sm-10">
            <select id="cat_id" name="cat_id" class="form-control">
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
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="name" id="name">
        </div>
      </div>
      
     
     <div class="form-group">
        <label class="col-sm-2 control-label">Logo:</label>
        <div class="col-sm-10">
           <input type="file" id="pic"  name="pic">
                  <!--<table id="files"></table>-->
               <!-- <img id="j_image" src="<?=base_url()?>assets/uploads/jobs/" width="80" style="display:none"  />-->
        </div>
      </div>
      
     
      
    
      
    <div class="form-group">
        <label class="col-sm-2 control-label">Mobile:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="mobile" id="mobile" value="">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Phone:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="phone" id="phone" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Fax:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="fax" id="fax" value="">
        </div>
      </div>
      
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Address:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="address" id="address" value="">
        </div>
      </div>
       
      <div class="form-group">
        <label class="col-sm-2 control-label">Keywods:</label>
        <div class="col-sm-10">
          <input type="text" id="tags2" name="keywords" class="tags" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Website:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="website" id="website" value="">
        </div>
      </div>
     
      <!--<div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
         <textarea class="editor" name="descr" id="descr" placeholder="Enter text ..."></textarea>
</textarea>
        
        </div>
      </div>-->
      
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
        <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </div>
</form>

              
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('admin/footer.php'); ?>

  </div>
 
</div>
</body>
</html>