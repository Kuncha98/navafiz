<?php $this->load->view('include/header.php');?>
<style>
.panel-body ul {
	list-style: none !important;
}
</style>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">
					Post Story
				</h3>
			</div>
			<?php $this->load->view('notification/notification-messages');?>
			<div class="form-group"> <span class="errormessage"></span> </div>
                      <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
			<div class="col-md-8 offset-2">
				<form class="form-horizontal" method="post" action="<?=base_url('testimonials/post')?>" id="memberpage">
                              <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                  <label>Subject <span class="required">*</span></label>
                                  <input type="text" id="subject" name="title"  value="<?=isset($curr_achievment->title) ? $curr_achievment->title: ""; ?>" class="form-control" required/>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                  <label>Detail <span class="required">*</span></label>
                                  <textarea type="text" id="descr" name="description"  class="form-control" required><?=isset($curr_achievment->description) ? $curr_achievment->description: ""; ?></textarea>

                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <button class="btn btn-primary pull-right" id="saveButton" type="submit"> Submit <i style="margin-top: 0; font-size: 14px; color: #fff;" class="fa fa-angle-right"></i></button>
                              </div>
                              <input type="hidden" name="do_post" value="1">
                              <input type="hidden" name="achive_id" value="<?=isset($curr_achievment->id) ? $curr_achievment->id: 0; ?>">
                        </form>
			</div>
		</div>
	</div>
</section>

  <?php $this->load->view('include/footer.php'); ?>
 
  <script>
 $('#memberpage').on('submit', function() {
    $('#saveButton').prop('disabled', true);
});


  function updatePassword()
	{
		
		
	var error = "";
	var pwd 			= $('#pwd').val();
	var cpwd 			= $('#cpwd').val();
	
	
	
	if(pwd != cpwd){
error = "Both password should be same";
}
	if(error != "")
		{
			$(".errormessage").show();
			$(".errormessage").html(error);
		
	 	}
	
	
	else
	{	
	
	
		    $('#loading').show();
		var form_data = {
			
			pwd		    : pwd,
			actioncall  	: 'updatepassword'
		};
	$.ajax({
			url  	: "updatepassword",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
				
				//if(data == 0)
					//{
					$('#loading').hide();	
				 	$('#regmessage').html("Password updated successfully!");
					$(".errormessage").hide();
					$('#regmessage').show();
					//location.hash = "#profilearea";
					//$('#profilearea').offset().top - main-contect.offset().top + main-contect.scrollTop();
					$("html, body").animate({ scrollTop: $('#profilearea').offset().top }, 1000);
					//}
				
				}
		});
	}
	
	}
  
  
          
		
	 
	 	
	

       
          </script> 
