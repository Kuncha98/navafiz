
<script>
$(document).ready(function(){
	//init(0);
        limit1 = 0;
	var page_id = 1;
        var limit = 50;
	loadMembers(page_id,limit);
	$(document).on('click', '.paging_page', function()
		{
		var page_id				= 	this.id;
    	var limit				= $("#limit").val();
        
		$('#page_id').val(page_id);
    	$('#limit').val(limit);
    	loadMembers(page_id,limit);
   		});
	$('#addMemberForm').on('click',function(){
		
	var form_data = {
			ajax	 			: '1',
			actioncall  		: 'showaddform'
			};
	$.ajax({
			url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
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
                      var form_data = {
				ajax	 			: '1',
				 page_id  			: page_id,
            limit	  			: limit,
				actioncall  		: 'listforms'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					$('#loadData').html(data);
				}
			});			
		})
		
			$(document).on('click', '.edit_status', function(){
			
		 var set_status = "";
		 var rel_val = "";
			var m_id	= this.id;
                        console.log(m_id);
			var status_val = $(this).attr('rel');
			if(status_val == 1)
				rel_val = 0;
			else
				rel_val = 1;
		
  		$(this).attr('rel',rel_val);
			var form_data = {
				ajax	 	: '1',
				actioncall  : 'changestatus',
				m_id	:  m_id,
				status_val	:  status_val
			};	
			if(confirm('Are you sure to change the status of the member'))
			{	
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
                                    location.reload();
					if(status_val == 1){
					set_status = "Inactive";
					rel_val = 'danger';
					
					$("#"+m_id+" > span.status").removeClass("status-default");
        $("#"+m_id+" > span.status").addClass("status-danger")
					}else{ 
					set_status = "Active";
					rel_val = 'default';
						$("#"+m_id+" > span.status").removeClass("status-danger");
        $("#"+m_id+" > span.status").addClass("status-default")
					}
								
				}
			});	
			}
		});	

			
	
		
		
	})
	 function loadMembers(page_id,limit){
       
	$("#loading").show();
//        $('#page_id').val(page_id);
//        
//        $('#limit').val(limit);
        
        limit1 = limit1+limit;
        console.log(limit1);
        var form_data = {
            page_id  			: page_id,
            limit	  			: limit1,
          	ajax	 			: '1',
			actioncall  		: 'listforms'
        };
        $.ajax({
            url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
            type 	: 'POST',
            data 	: form_data,
            success : function(data){
				
				$("#loading").hide();
                $('#loadData').html(data);
            }
        });
    }

function init(val)
{
			var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listforms'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					
					if(val == 1)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Data added successfully");	
						}
					if(val == 2)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Data updated successfully");	
						}	
					if(val == 2)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Data deleted successfully");	
						page_id =   $('#page_id').val();

                                           limit = $('#limit').val();
						loadMembers(page_id,limit);
						}
						$('#loadData').html(data);	
				}
			});			
	
}

function showEditForm(member_id)
{
	$("#loading").show();
		var form_data = {
				ajax	 			: '1',
				member_id			:  member_id,
				actioncall  		: 'showeditform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					$('#loadData').html(data);
				}
			});			
	
}
function addForm()
{
		var error = "";
			var name 			= $('#name').val();
			var email_address 	=  $('#email_address').val();
			var password 		=  $('#password').val();
			var phone 			=  $('#phone').val();
			var gender 			=  $('#gender').val();	
			
		
			
			if(name == "")
			error = "Please enter name";
			else if(email_address == "")
		    	error = "Please enter email address";
			else if(password == "")
		    	error = "Please enter password";
			else if(phone == "")
			error = "Please enter phone";
			
			else if(gender == "")
			error = "Please select gender";	
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
				status		  : 1,
				name		  : name,
				email_address : email_address,
				password	  : password,
				phone		  : phone,
				gender		  : gender,
				actioncall    : 'addform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					init(1);
				}
			});	
			}
	
}


function editForm(member_id)
{
	$("#loading").show();
			var status 			= $('#status').val();
			var name 			= $('#name').val();
			var email_address 	=  $('#email_address').val();
			var password 		=  $('#password').val();
			var phone 			=  $('#phone').val();
			var gender 			=  $('#gender').val();	
			var form_data = {
				ajax	 		: '1',
				member_id		: member_id,
				status		: status,
				name		: name,
				email_address	: email_address,
				password		: password,
				phone			: phone,
				gender			: gender,
				actioncall  	: 'editform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					init(1);
				}
			});			
	
}

function delForm(id){
			
			var form_data = {
				ajax	 		: '1',
				actioncall  	: 'delform',
				id				: id,
			};
			if(confirm('Are you sure to delete this data and its related data'))
				{	
				$("#loading").show();	
				$.ajax({
					url  	: "<?php echo(site_url().'admin/ajaxDataManagementMember'); ?>",
					type 	: 'POST',
					data 	: form_data,
					success : function(data){
						$("#loading").hide();
						init(2);
						}
					});
				}
		}
</script>
<body>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />



    <div class="" id="loadData">

    </div>
