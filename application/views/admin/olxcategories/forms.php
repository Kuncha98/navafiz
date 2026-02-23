<?php $this->load->view('admin/header.php'); ?>
<script>
$(document).ready(function(){
	init(0);
	$('#showAddForm').on('click',function(){
		$("#sms-area").hide();
		$("#loading").show();
		var form_data = {
			ajax	 			: '1',
			actioncall  		: 'showaddform'
			};
	$.ajax({
			url  	: "<?php echo(base_url().'admin/ajaxDataManagementOCategories'); ?>",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
			$("#loading").hide();
			$( "#add" ).addClass("active" );
			$( "#list" ).removeClass("active" );	
			$('#loadData').html(data);
			}
		});			
	})

	$('#listForms').on('click',function(){
		$("#sms-area").hide();
		$("#loading").show();
		var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listforms'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementOCategories'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					$( "#add" ).removeClass("active" );
					$( "#list" ).addClass("active" );
					$('#loadData').html(data);
				}
			});			
		})
		$(document).on('click', '.edit_status', function(){
			
		 var set_status = "";
		 var rel_val = "";
			var blogc_id	= this.id;
			var status_val = $(this).attr('rel');
			if(status_val == 1)
				rel_val = 0;
			else
				rel_val = 1;
		
  		$(this).attr('rel',rel_val);
			var form_data = {
				ajax	 	: '1',
				actioncall  : 'changeStatus',
				id	:  blogc_id,
				status_val	:  status_val
			};	
			if(confirm('Are you sure to change the status of the data'))
			{	
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementOCategories'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					if(status_val == 1){
					set_status = "Inactive";
					rel_val = 'danger';
					
					$("#"+blogc_id+" > span.status").removeClass("status-default");
        $("#"+blogc_id+" > span.status").addClass("status-danger")
					}else{ 
					set_status = "Active";
					rel_val = 'default';
						$("#"+blogc_id+" > span.status").removeClass("status-danger");
        $("#"+blogc_id+" > span.status").addClass("status-default")
					}
								
				}
			});	
			}
		});	
	$(document).on('click', '.edit_service_form', function()
		{
		$("#loading").show();	
		var form_data = {
				ajax	 		: '1',
				service_id			: this.id,
				actioncall  	: 'editserviceform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementOCategories'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
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
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementOCategories'); ?>",
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
					
			if(name == "")
		    	error = "Please enter name";
		
			 if(error != "")
			{
            $("#sms-area").show();
		    $("#sms-area").addClass( "alert-danger" );
		    $("#message").html(error);
	        }
        else
            {
			$("#loading").show();	
			var form_data = {
				ajax	 		: '1',
				name			: name,
				actioncall  	: 'addform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementOCategories'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					init(1);
				}
			});	
			}
	
}

function showEditForm(id)
{
		$("#loading").show();
	$("#sms-area").hide();
		var form_data = {
				ajax	 	: '1',
				id			: id,
				actioncall  : 'showeditform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementOCategories'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
						$("#loading").hide();
					$('#loadData').html(data);
				}
			});			
	
}
function editForm(id)
{
	var error = "";
			var name 			= $('#name').val();
			
			
			if(name == "")
		    	error = "Please enter name";
			
			
			 if(error != "")
			{
            $("#sms-area").show();
		    $("#sms-area").addClass( "alert-danger" );
		    $("#message").html(error);
	        }
        else
            {
			
				$("#loading").show();
			var form_data = {
				ajax	 		: '1',
				id				: id,
				name			: name,
				
				actioncall  	: 'editform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementOCategories'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
						$("#loading").hide();
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
				url  	: "<?php echo(site_url().'admin/ajaxDataManagementOCategories'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
				    init(3);
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
        <h3>Olx Categories </h3>
      </div>
       </div>
       <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin/jobs">Home</a></li>
        <li class="active">Olx Categories</li>
      </ul>
      <div class="visible-xs breadcrumb-toggle"> <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a> </div>
      
    </div>
  <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
        <li id="list"><a href="javascript:void(0)" id="listForms"><i class="icon-checkbox-partial"></i> List Categories</a></li>
        <li id="add"><a href="javascript:void(0)" id="showAddForm"><i class="icon-checkbox-unchecked"></i> Add Categories</a></li>
       
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
              <h6 class="panel-title"><i class="icon-paragraph-justify"></i> Olx Categories</h6>
            </div>
              <div id="loading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/admin/images/large.gif" alt="Loading..." /> </div>
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