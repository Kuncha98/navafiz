
<script>
$(document).ready(function(){
	init(0);
	$('#addPageForm').on('click',function(){
	var form_data = {
			ajax	 			: '1',
			actioncall  		: 'addpageform'
			};
	$.ajax({
			url  	: "<?php echo(base_url().'admin/ajaxDataManagementPage'); ?>",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
			$( "#add" ).addClass("active" );
			$( "#list" ).removeClass("active" );	
			$('#loadData').html(data);
			}
		});			
	})

	$('#listPages').on('click',function(){
		var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listpages'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementPage'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$( "#add" ).removeClass("active" );
					$( "#list" ).addClass("active" );
					$('#loadData').html(data);
				}
			});			
		})
	
	$(document).on('click', '.edit_page_form', function()
		{
			
		var form_data = {
				ajax	 		: '1',
				page_id			: this.id,
				actioncall  	: 'editpageform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementPage'); ?>",
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
				actioncall  		: 'listpages'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementPage'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$( "#list" ).addClass("active" );
					if(val == 1)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Page updated successfully");	
						}
					if(val == 2)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Page deleted successfully");	
						}
						$('#loadData').html(data);	
				}
			});			
	
}



function editPage(page_id)
{
			var name 			= $('#name').val();
			//	var descr 			=  $('#descr').val();
			var descr = CKEDITOR.instances['descr'].getData();	
			//alert(descr);
			var form_data = {
				ajax	 		: '1',
				id				: page_id,
				name		: name,
				descr			: descr,
				actioncall  	: 'editpage'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementPage'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(1);
				}
			});			
	
}

</script>


     
        
        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside"> 

            
            <div class="datatable" id="loadData">
              <?php // $this->load->view('admin/pages/listpages') ?>
            </div>
         
        </div>
  
 
