<script>
$(document).ready(function(){
	init(0);
	$('#addFaqForm').on('click',function(){
		
	var form_data = {
			ajax	 			: '1',
			actioncall  		: 'addfaqform'
			};
	$.ajax({
			url  	: "<?php echo(base_url().'admin/ajaxDataManagementFaq'); ?>",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
			$('#loadData').html(data);
			}
		});			
	})

	$('#listFaqs').on('click',function(){
		var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listfaqs'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementFaq'); ?>",
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
				actioncall  		: 'listfaqs'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementFaq'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					
					if(val == 1)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("FAQ updated successfully");	
						}
					if(val == 2)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("FAQ deleted successfully");	
						}
						$('#loadData').html(data);	
				}
			});			
	
}
function addFaq()
{
				var question 			= $('#question').val();
				var answer 			=  $('#answer').val();
			var form_data = {
				question		: question,
				answer			: answer,
				actioncall  	: 'addfaq'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementFaq'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#sms-area").show();
					$("#sms-area").addClass( "alert-success" );
					$("#message").html("FAQ added successfully");
					}
			});			
}

function edit_faq(faq_id)
{
		var form_data = {
				ajax	 	: '1',
				faq_id		: faq_id,
				actioncall  : 'editfaqform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementFaq'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$('#loadData').html(data);
				}
			});			
	
}
function editFaq(faq_id)
{
			var question 			= $('#question').val();
				var answer 			=  $('#answer').val();
			var form_data = {
				ajax	 		: '1',
				id				: faq_id,
				question		: question,
				answer			: answer,
				actioncall  	: 'editfaq'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementFaq'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(1);
				}
			});			
	
}
function del_faq(id){
			
			var form_data = {
				ajax	 	: '1',
				actioncall  : 'delfaq',
				faq_id		: id,
			};
			if(confirm('Are you sure to delete this faq')) {		
			$.ajax({
				url  	: "<?php echo(site_url().'admin/ajaxDataManagementFaq'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(2);
				}
			});
			}
		}
</script>

<!--      <ul class="nav nav-tabs">
        <li class="active"><a href="#" id="listFaqs"><i class="icon-checkbox-partial"></i> List FAQs</a></li>
        <li><a href="#" id="addFaqForm"><i class="icon-checkbox-unchecked"></i> Add FAQ</a></li>
       
      </ul>-->

           
    <div class="datatable" id="loadData">

    </div>
