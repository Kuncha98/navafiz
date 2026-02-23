
<script>
$(document).ready(function(){
	init(0);
	$('#showAddForm').on('click',function(){
		$("#loading").show();
		$("#sms-area").hide();
	var form_data = {
			ajax	 			: '1',
			actioncall  		: 'showaddform'
			};
	$.ajax({
			url  	: base_url+'admin/ajaxDataManagementCategories',
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
	$("#loading").show();
		$("#sms-area").hide();
		var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listforms'
			};
			$.ajax({
				url  	: base_url+'admin/ajaxDataManagementCategories',
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
				url  	: base_url+'admin/ajaxDataManagementCategories',
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
                                    location.reload();
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
				url  	: base_url+'admin/ajaxDataManagementCategories',
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
				url  	: base_url+'admin/ajaxDataManagementCategories',
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
				url  	: base_url+'admin/ajaxDataManagementCategories',
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
				url  	: base_url+'admin/ajaxDataManagementCategories',
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
			console.log(id);
			var form_data = {
				ajax	 		: '1',
				id				: id,
				name			: name,
				
				actioncall  	: 'editform'
			};
			$.ajax({
				url  	: base_url+'admin/ajaxDataManagementCategories',
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					init(2);
                                        console.log('updat');
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
				url  	: base_url+'admin/ajaxDataManagementCategories',
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
    <div class="" id="loadData">

    </div>

    
  
 
 
