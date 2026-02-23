
<script>
$(document).ready(function(){
	init(0);
	$('#addProductForm').on('click',function(){
			$("#sms-area").hide();
			var form_data = {
				ajax	 			: '1',
				actioncall  		: 'addgalleryform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementGallery'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					
					$('#loadData').html(data);
				}
			});			
		

	})
	
	
	$('#listProducts').on('click',function(){
		$("#sms-area").hide();
		//	var store_id 			= $('#store_id').val();
			var form_data = {
				ajax	 			: '1',
				//store_id			: store_id,
				actioncall  		: 'listgallery'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementGallery'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$('#loadData').html(data);
				}
			});			
		

	})
	$('#uploadProduct').on('click',function(){
	
		$("#sms-area").hide();
		//	var store_id 			= $('#store_id').val();
			var form_data = {
				ajax	 			: '1',
				//store_id			: store_id,
				actioncall  		: 'uploadbook'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementGallery'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$('#loadData').html(data);
				}
			});			
		

	})
		
		
	
		
		
})

function addGallery()
{
				var name 			= $('#name').val();
				
				 var gallery_image_name	= $('#gallery_image_name').val();
				var cat_id 			= $('#cat_id').val();
			var form_data = {
				name				: name,
				cat_id				: cat_id,
				
				gallery_image_name	: gallery_image_name,
				actioncall  		: 'addgallery'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementGallery'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(3);
					}
			});			
}



function init(val)
{
	
		
		//	var store_id 			= $('#store_id').val();
			var form_data = {
				ajax	 			: '1',
				//store_id			: store_id,
				actioncall  		: 'listgallery'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementGallery'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					
					if(val == 1)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Gallery updated successfully");	
						}
					if(val == 2)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Gallery deleted successfully");	
						}
					if(val == 3)
						{	
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Gallery added successfully");	
						}
						$('#loadData').html(data);	
				}
			});			
		

	
}
function edit_galleryform(cgallery_id)
{
		
		
		
			
			
			var form_data = {
				ajax	 			: '1',
				product_id			: product_id,
				actioncall  		: 'editgalleryform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementGallery'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$('#loadData').html(data);
				}
			});			
		

	
}
function editGallery(product_id)
{
		
	
	
				var name 			= $('#name').val();
				var cat_id 			= $('#cat_id').val();
				 var product_image_name	= $('#product_image_name').val();
				 	var descr 			= $('#descr').val();
				// var book_image_name	= $('#book_image_name').val();
				//var descr = CKEDITOR.instances['descr'].getData();	
			var form_data = {
				product_id				: product_id,
				name				: name,
				descr				: descr,
				cat_id	: cat_id,
				product_image_name	: product_image_name,
				actioncall  		: 'editproduct'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementGallery'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					
				init(1);
				}
			});			
	
}

function del_cgallery(id){
	
			
			var form_data = {
				ajax	 			: '1',
				actioncall  		: 'delgallery',
				id			: id,
			};	
			if(confirm('Are you sure to delete this gallery'))
				{	
			$.ajax({
				url  	: "<?php echo(site_url().'admin/ajaxDataManagementGallery'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(2);
				}
			});
				}
		}
</script> 

      <ul class="nav nav-tabs">
          <li class="active"><a href="<?php echo base_url()?>admin/gallery/add" id="addProductForm" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Picture </a></li>
        
      </ul>

            
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Images List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Id</th>
    
      
       <th>Image</th>
       <th>Status</th>
   
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($cgallery!='empty') {
			
foreach(@$cgallery as $gallery){ 

?>
    <tr>
      <td><?=$gallery->id?></td>
     
     <!-- <td><?=$gallery->name?></td>-->
     
      <td><img src="<?=base_url()?>assets/uploads/jobs/<?=$gallery->pic?>?<?=time()?>" width="100" height="100" /></td>
     <td><?php
      
	  if ($gallery->status == 0) {
                            ?>
                  <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/gallery/publishd/<?php echo $gallery->id; ?>">publish</a>
                  <?php
                            } else {
                            ?>
                  <a class="label label-success" title="Publishd" href="<?php echo base_url(); ?>admin/gallery/unpublishd/<?php echo $gallery->id; ?>">unpublish</a>
                  <?php
                            }
                            ?></td>
       <td>
      
           <a href="<?=base_url()?>admin/gallery/delete/<?php echo($gallery->id);?>" title="delete" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php
}
				  }
				  ?>
  </tbody>
</table>
</div>
</div>
</div>