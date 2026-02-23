
<script>
$(document).ready(function(){
	init(0);
	$('#addEventForm').on('click',function(){
			$("#sms-area").hide();
			var form_data = {
				ajax	 			: '1',
				actioncall  		: 'addeventform'
			};
			$.ajax({
				url  	: base_url+"admin/ajaxDataManagementEvent",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					
					$('#loadData').html(data);
				}
			});			
		

	})
	
	
	$('#listEvents').on('click',function(){
		$("#sms-area").hide();
		//	var store_id 			= $('#store_id').val();
			var form_data = {
				ajax	 			: '1',
				//store_id			: store_id,
				actioncall  		: 'listevents'
			};
			$.ajax({
				url  	: base_url+"admin/ajaxDataManagementEvent",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$('#loadData').html(data);
				}
			});			
		

	})
	
		
		//$('.edit_status').on('click','a',function(){
			$(document).on('click', '.edit_status', function(){
			
		 var set_status = "";
		 var rel_val = "";
			var news_id	= this.id;
			var status_val = $(this).attr('rel');
			if(status_val == 1)
				rel_val = 0;
			else
				rel_val = 1;
		
  		$(this).attr('rel',rel_val);
			var form_data = {
				ajax	 	: '1',
				actioncall  : 'changeFeatured',
				news_id	:  news_id,
				status_val	:  status_val
			};		
			$.ajax({
				url  	: base_url+"admin/ajaxDataManagementEvent",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					if(status_val == 1){
					set_status = "No";
					rel_val = 0;
					}else{ 
					set_status = "Yes";
					rel_val = 1;
					}
					
					
					$("#"+news_id).html(set_status);
					
					//$(".modal-window").show();
					
					
					//$('#sms').html('Prize code is now '+ set_status);
					//window.location.href = "<?php echo(base_url().'admin/prize'); ?>";
					
					
				}
			});	
		});


	
})

function addEvent()
{
				var name 			= $('#name').val();
				 var videodate	= $('#datepicker').val();
				 
			 var descr	= $('#descr').val();
				//var descr = CKEDITOR.instances['descr'].getData();	
				
			var form_data = {
				name				: name,
					eventdate				: videodate,
			
				descr	: descr,
				actioncall  		: 'addevent'
			};
			$.ajax({
				url  	: base_url+"admin/ajaxDataManagementEvent",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(3);
					/*$("#sms-area").show();
					$("#sms-area").addClass( "alert-success" );
					$("#message").html("Event added successfully");*/
					}
			});			
}



function init(val)
{
	
		
		//	var store_id 			= $('#store_id').val();
			var form_data = {
				ajax	 			: '1',
				//store_id			: store_id,
				actioncall  		: 'listevents'
			};
			$.ajax({
				url  	: base_url+"admin/ajaxDataManagementEvent",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					
					if(val == 1)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Event updated successfully");	
						}
					if(val == 2)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Event deleted successfully");	
						}
						if(val == 3)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Event added successfully");	
						}
						$('#loadData').html(data);	
				}
			});			
		

	
}
function edit_eventform(event_id)
{
		
		
		
			
			
			var form_data = {
				ajax	 			: '1',
				event_id			: event_id,
				actioncall  		: 'editeventform'
			};
			$.ajax({
				url  	: base_url+"admin/ajaxDataManagementEvent",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$('#loadData').html(data);
				}
			});			
		

	
}
function editEvent(event_id)
{
		
	
	
					var name 			= $('#name').val();
				 var videodate	= $('#datepicker').val();
				 
			 var descr	= $('#descr').val();
				//var descr = CKEDITOR.instances['descr'].getData();	
				
			var form_data = {
				event_id				: event_id,
				name				: name,
					eventdate				: videodate,
				
				descr	: descr,
				actioncall  		: 'editevent'
			};
			$.ajax({
				url  	: base_url+"admin/ajaxDataManagementEvent",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					
				init(1);
				}
			});			

		

	
}
function del_event(id){
	
			
			var form_data = {
				ajax	 			: '1',
				actioncall  		: 'delevent',
				event_id			: id,
			};
			if(confirm('Are you sure to delete this event'))
				{		
			$.ajax({
				url  	: base_url+"admin/ajaxDataManagementEvent",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(2);
				}
			});	
				}
		}
</script> 

    
    <!-- Page tabs -->
   
<!--      <ul class="nav nav-tabs">
        <li class="active"><a href="#" id="addEventForm"><i class="icon-checkbox-partial"></i> Add Event </a></li>
        <li><a href="#" id="listEvents"><i class="icon-checkbox-unchecked"></i> List Events</a></li>
       
      </ul>-->

    
       
           
            <div class="datatable" id="loadData">
              
            </div>
        
    

