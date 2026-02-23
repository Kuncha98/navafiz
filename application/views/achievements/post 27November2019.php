<?php $this->load->view('header.php');?>
<style>
.panel-body ul {
	list-style: none !important;
}
</style>
<body>
<div class="page category-page"> 
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
<section class="dashboard-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">            
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?php $this->load->view('notification/notification-messages');?>
                    <div class="heading-inner first-heading">
                      <p class="title">Post Achievement</p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                      <div class="form-group"> <span class="errormessage"></span> </div>
                      <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
                      <div class="profile-edit row boxed box-to-clone education-box">
                          <form class="form-horizontal" method="post" action="<?=base_url('achievements/post')?>" id="memberpage">
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
                                <button class="btn btn-default pull-right" type="submit"> Submit <i class="fa fa-angle-right"></i></button>
                              </div>
                              <input type="hidden" name="do_post" value="1">
                              <input type="hidden" name="achive_id" value="<?=isset($curr_achievment->id) ? $curr_achievment->id: 0; ?>">
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <?php $this->load->view('footerbottom.php'); ?>
 
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
</div>
</body>
</html>