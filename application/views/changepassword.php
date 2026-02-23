<?php $this->load->view('include/header.php'); ?>
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
              Change Password
            </h3>
          </div>

           <div class="form-group"> <span class="errormessage"></span> </div>
               <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
        <div class="col-md-8 offset-2">
            <form class="form-horizontal" method="post" action="javascript:void(0)" id="memberpage">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>New Password <span class="required">*</span></label>
                      <input type="password" id="pwd" name="pwd" class="form-control" required/>
                    
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Confirm Password <span class="required">*</span></label>
                      <input type="password" id="cpwd" name="cpwd" class="form-control" required/>
                    
                    </div>
                  </div>
                  
                  
                  
                  <div class="col-md-12 col-sm-12">
                    <button class="btn btn-primary pull-right" onClick="updatePassword()"> Save <i style="margin-top: 0; font-size: 14px; color: #fff;" class="fa fa-angle-right"></i></button>
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
