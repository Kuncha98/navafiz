
<?php
extract($_REQUEST);
?>
<script>
$(document).ready(function(){
	var page_id = 1;
    var limit = 30;
	//loadCustomers(page_id,limit);
	
		
	


	})
	

	
   
    function editSettings()
        {
			var data = $('input:text[name=delAnn2]');
			$.each(data, function(key, object) {

alert(object.value);
});
			//alert(data); //);
			console.log(data);
	    $("#loading").show();
		//var status 			= $("#status").prop('checked');
		    var name 			= $('#name').val();
			var email_address   = $('#email_address').val();
			var phone 			=  $('#phone').val();
			var mobile 			=  $('#mobile').val();
            var address 		=  $('#address').val();
			var form_data = {
				ajax	 		: '1',
				customer_id		: customer_id,
				name		    : name,
			//	status		    : status,
				email_address	: email_address,
				phone		    : phone,
                mobile	        : mobile,
                address			: address,
				actioncall  	: 'editcustomer'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementCustomers'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					init(1);
				}
			});			
	    }
   
  
</script>

<body>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />


      <?php
      
	  if(isset($message))
	  {
	   $this->load->model('admin_model');
	   $this->site_data 	= $this->admin_model->getSettings();
      ?>
	<div class="alert fade in block-inner alert-success" id="sms-area" ><?=$message?>
        <button data-dismiss="alert" class="close" type="button">×</button>
        <i class="icon-checkmark-circle"></i> <span id="message"></span> </div>
      <?php
	  }
	  ?>
     
            
<form role="form" action="<?=base_url()?>admin/saveSettings" method="post" class="form-horizontal form-bordered">

      
      <?php
	  	$x=1;
		foreach($settings as $da)
		{
	?>
      
      <div class="form-group">
        <label class="col-sm-2 control-label"><?=$da->option?></label>
        <div class="col-sm-4">
          <input type="text" placeholder="" class="form-control" name="delAnn2[]" id="delAnn2[]" value="<?=$da->value?>">
        </div>
      </div>
    
      
      <?php
	  $x++;
		}
	  ?>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" value="Save"/>
       <!-- <input type="reset" class="btn btn-danger" value="Cancel">-->
      
      </div>
   
</form>
