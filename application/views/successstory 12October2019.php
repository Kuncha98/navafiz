<?php $this->load->view('header.php'); ?>
<style>
.panel-body ul {
	list-style: none !important;
}
</style>
<body>
<div class="page category-page"> 
  <!--<div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div>-->
  <?php $this->load->view('pagetop.php'); ?>
  
  
  <section class="dashboard-body">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">            
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="heading-inner first-heading">
              <p class="title">My Achievements</p>
            </div>
               <div class="form-group"> <span class="successmessage"><?php echo $this->session->flashdata('msg'); ?></span> </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
             <div class="form-group"> <span class="errormessage"></span> </div>
               <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
              <div class="profile-edit row boxed box-to-clone education-box">
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
                    <button class="btn btn-default pull-right" type="submit"> Submit <i class="fa fa-angle-right"></i></button>
                  </div>
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