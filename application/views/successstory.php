<?php $this->load->view('include/header.php'); ?>
<style>
.panel-body ul {
	list-style: none !important;
}
</style>

  
  <section>
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12 mb-4">
  					<h2 class="text-center">My Achievements</h2>
  				</div>
  				<?php if(!empty($this->session->flashdata('msg'))){ ?>
  				<div class="form-group"> <span class="successmessage alert alert-success"><?php echo $this->session->flashdata('msg'); ?></span> </div> 
  				<?php } ?>
  				<p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
  				<div class="col-md-8 offset-2">
  					 <form class="form-horizontal" method="post" action="<?=base_url()?>member/updateStroy" id="memberpage">
	                  <div class="col-md-12 col-sm-12">
	                    <div class="form-group">
	                      <label>Subject <span class="required">*</span></label>
	                      <input type="text" id="subject" name="subject"  value="<?=(!isset($story->ss_subject)) ? "" : $story->ss_subject?>" class="form-control" required/>
	                    
	                    </div>
	                  </div>
	                  
	                  
	                  <div class="col-md-12 col-sm-12">
	                    <div class="form-group">
	                      <label>Detail <span class="required">*</span></label>
	                      <textarea type="text" id="descr" name="descr"  class="form-control" rows="10" required><?=(!isset($story->ss_descr)) ? "" : $story->ss_descr?></textarea>
	                    
	                    </div>
	                  </div>
	                  
	                  <div class="col-md-12 col-sm-12">
	                    <button class="btn btn-primary pull-right" type="submit"> Submit <i style="margin-top: 0; font-size: 14px; color: #fff;" class="fa fa-angle-right"></i></button>
	                  </div>
	                </form>
  				</div>
  			</div>
  		</div>
  </section>
  <?php $this->load->view('include/footer.php'); ?>
 
  <script>
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
