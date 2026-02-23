<?php $this->load->view('admin/header.php'); ?>
<script>
$(document).ready(function(){
	init(0);
	$('#showAddForm').on('click',function(){
		$("#sms-area").hide();
	var form_data = {
			ajax	 			: '1',
			actioncall  		: 'showaddform'
			};
	$.ajax({
			url  	: "<?php echo(base_url().'admin/ajaxDataManagementBlogs'); ?>",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
			$( "#add" ).addClass("active" );
			$( "#list" ).removeClass("active" );	
			$('#loadData').html(data);
			}
		});			
	})

	$('#listForms').on('click',function(){
		$("#sms-area").hide();
		var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listforms'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementBlogs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$( "#add" ).removeClass("active" );
					$( "#list" ).addClass("active" );
					$('#loadData').html(data);
				}
			});			
		})
		$(document).on('click', '.edit_status', function(){
			
		 var set_status = "";
		 var rel_val = "";
			var blog_id	= this.id;
			var status_val = $(this).attr('rel');
			if(status_val == 1)
				rel_val = 0;
			else
				rel_val = 1;
		
  		$(this).attr('rel',rel_val);
			var form_data = {
				ajax	 	: '1',
				actioncall  : 'changeStatus',
				id	:  blog_id,
				status_val	:  status_val
			};	
			if(confirm('Are you sure to change the status of the service'))
			{	
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementBlogs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					if(status_val == 1){
					set_status = "Inactive";
					rel_val = 'danger';
					
					$("#"+blog_id+" > span.status").removeClass("status-default");
        $("#"+blog_id+" > span.status").addClass("status-danger")
					}else{ 
					set_status = "Active";
					rel_val = 'default';
						$("#"+blog_id+" > span.status").removeClass("status-danger");
        $("#"+blog_id+" > span.status").addClass("status-default")
					}
								
				}
			});	
			}
		});	
	$(document).on('click', '.edit_service_form', function()
		{
			
		var form_data = {
				ajax	 		: '1',
				service_id			: this.id,
				actioncall  	: 'editserviceform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementBlogs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$('#loadData').html(data);
				}
			});				
		})	
		
	})
function init(val)
{
			var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listforms'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementBlogs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$( "#list" ).addClass("active" );
					if(val == 1)
						{
						$("#sms-area").removeClass( "alert-danger" ); 	
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Data added successfully");	
						}
					else if(val == 2)
						{
						$("#sms-area").removeClass( "alert-danger" ); 	
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Data updated successfully");	
						}
					else if(val == 3)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Data deleted successfully");	
						}	
						$( "#add" ).removeClass("active" );
					$( "#list" ).addClass("active" );
						$('#loadData').html(data);	
				}
			});			
	
}
function addForm()
{
	var error = "";
			var name 			= $('#name').val();
			var cat_id 			= $('#cat_id').val();
			var slug 			= $('#slug').val();
			var short_descr 	= $('#short_descr').val();
			var imagefile 		=  $('#blog_image_name').val();
			var descr = CKEDITOR.instances['descr'].getData();	
			
			if(cat_id == "")
			error = "Please select category";
			else if(name == "")
		    	error = "Please enter name";
			else if(slug == "")
		    error = "Please enter slug";
						else if(short_descr == "")
			error = "Please enter short description";
			
			else if(descr == "")
			error = "Please enter description";	
			 if(error != "")
			{
            $("#sms-area").show();
		    $("#sms-area").addClass( "alert-danger" );
		    $("#message").html(error);
	        }
        else
            {
				
			var form_data = {
				ajax	 		: '1',
				cat_id	: cat_id,
				slug			: slug,
				short_descr			: short_descr,
				name			: name,
				imagefile	: imagefile,
				descr			: descr,
				actioncall  	: 'addform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementBlogs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(1);
				}
			});	
			}
	
}

function showEditForm(id)
{
	$("#sms-area").hide();
		var form_data = {
				ajax	 	: '1',
				id			: id,
				actioncall  : 'showeditform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementBlogs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$('#loadData').html(data);
				}
			});			
	
}
function editForm(id)
{
	var error = "";
		var name 			= $('#name').val();
			var cat_id 			= $('#cat_id').val();
			var slug 			= $('#slug').val();
			var short_descr 	= $('#short_descr').val();
			var imagefile 		=  $('#blog_image_name').val();
			var descr = CKEDITOR.instances['descr'].getData();	
			
			
			if(cat_id == "")
			error = "Please select category";
			else if(name == "")
		    	error = "Please enter name";
			else if(slug == "")
		    error = "Please enter slug";
						else if(short_descr == "")
			error = "Please enter short description";
			
			else if(descr == "")
			error = "Please enter description";	
			 if(error != "")
			{
            $("#sms-area").show();
		    $("#sms-area").addClass( "alert-danger" );
		    $("#message").html(error);
	        }
        else
            {
			
			
			var form_data = {
				ajax	 		: '1',
				id				: id,
			cat_id	: cat_id,
				slug			: slug,
				short_descr			: short_descr,
				name			: name,
				imagefile	: imagefile,
				descr			: descr,
				actioncall  	: 'editform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementBlogs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(2);
				}
			});	
			}
	
}
 function delForm(id)
        {
		var form_data = {
			ajax	 			: '1',
			actioncall  		: 'delform',
			id			: id,
			};
		if(confirm('Are you sure to delete this data and its related data'))
			{
			$("#loading").show();
			$.ajax({
				url  	: "<?php echo(site_url().'admin/ajaxDataManagementBlogs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
				    init(3);
					}
				});
			}
		}
function checkAllFields(ref)
{
	
var chkAll = document.getElementById('checkAll');
var checks = document.getElementsByName('delAnn2[]');


var boxLength = checks.length;
var allChecked = false;
var totalChecked = 0;
	if ( ref == 1 )
	{
		if ( chkAll.checked == true )
		{
			for ( i=0; i < boxLength; i++ )
				if (checks[i].disabled == true){
					checks[i].checked = false;	
				}
				else {
					checks[i].checked = true;
				}
		}
		else
		{
			for ( i=0; i < boxLength; i++ )
			checks[i].checked = false;
		}
	}
	else
	{
		for ( i=0; i < boxLength; i++ )
		{
			if ( checks[i].checked == true )
			{
			allChecked = true;
			continue;
			}
			else
			{
			allChecked = false;
			break;
			}
		}
		if ( allChecked == true )
		chkAll.checked = true;
		else
		chkAll.checked = false;
	}
	for ( j=0; j < boxLength; j++ )
	{
		if ( checks[j].checked == true )
		totalChecked++;
	}
}
function delSelected()
	{
	var v = $('input:checkbox:checked').map(function() {
    return this.value;
	}).get().join(",");
	var form_data = {
			ajax	 			: '1',
			actioncall  		: 'delselectedblogs',
			ids			: v,
		};	
	if(confirm('Are you sure to delete these Subscriber'))
			{		
		$.ajax({
			url  	: "<?php echo(site_url().'admin/ajaxDataManagementBlogs'); ?>",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
			init(2);
			}
			});
		}
	}
</script>
<body>
<?php $this->load->view('admin/page_top.php'); ?>
<div class="page-container"> 
  <?php $this->load->view('admin/left_side.php'); ?>
  <div class="page-content"> 
    <div class="page-header">
      <div class="page-title">
        <h3>Blogs </h3>
      </div>
       </div>
       <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin/slider">Home</a></li>
        <li class="active">Blogs</li>
      </ul>
      <div class="visible-xs breadcrumb-toggle"> <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a> </div>
      
    </div>
  <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
        <li id="list"><a href="#" id="listForms"><i class="icon-checkbox-partial"></i> List Blogs</a></li>
        <li id="add"><a href="#" id="showAddForm"><i class="icon-checkbox-unchecked"></i> Add Blog</a></li>
       
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
              <h6 class="panel-title"><i class="icon-paragraph-justify"></i> Blogs</h6>
            </div>
            <div class="datatable" id="loadData">
              
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