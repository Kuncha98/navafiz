
<script>
$(document).ready(function(){
        limit1 = 0;
        var limit = 50;
        console.log('hersssse');
	loadStories(limit);

	
	
$('#listForms').on('click',function(){
                      var form_data = {
				ajax	 			: '1',
				 page_id  			: page_id,
            limit	  			: limit,
				actioncall  		: 'listforms'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/members/ajaxDataManagementStories'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					$('#loadData').html(data);
				}
			});			
		})
		
	
	})
function loadStories(limit){
       
	$("#loading").show();
//        $('#page_id').val(page_id);
//        
//        $('#limit').val(limit);
        
        limit1 = limit1+limit;
        console.log(limit1);
        var form_data = {
            limit	  			: limit1,
          	ajax	 			: '1',
			actioncall  		: 'listforms'
        };
        $.ajax({
            url  	: "<?php echo(base_url().'admin/members/ajaxDataManagementStories'); ?>",
            type 	: 'POST',
            data 	: form_data,
            success : function(data){
				
		$("#loading").hide();
                $('#loadData').html(data);
            }
        });
    }







</script>
<body>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />



    <div class="" id="loadData">
      
    </div>


