<?php $this->load->view('include/header.php'); ?>
<style>
.panel-body ul {
	list-style: none !important;
}
</style>

  <!--<div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div>-->

  <section class="dashboard-body">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         
          
          
        </div>
      </div>
    </div>
  </section>
    <section>
      <div class="container-mid">
        <div class="row">
          
          <div class="col-md-12">
              <div class="col-md-8 col-sm-12 col-xs-12">
                <h3 class="text-center">
                  My Posted Jobs
                </h3>
            <?php 
    
                if($memberjobs!='empty') {
              
                foreach(@$memberjobs as $memberjob){ 
                
            ?>
            
              <div class="all-jobs-list-box" style="border-bottom: 1px solid grey ;">
                <div class="job-box">
                  <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm mt-2">
                    <div class="comp-logo"> <a href="<?=base_url()?>job/<?=$memberjob->j_id?>"> <img style="max-height: 350px;" src="<?=base_url()?>/assets/uploads/jobs/<?=($memberjob->j_image == "")?"noimage.png":$memberjob->j_image ?>" class="img-responsive" alt="<?=$memberjob->j_title?>"></a> </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                    <div class="job-title-box"> <a href="<?=base_url()?>job/<?=$memberjob->j_id?>">
                      <div class="job-title"> <?=$memberjob->j_title?></div>
                      </a> <span class="comp-name"><?=$memberjob->c_name?></span></div>
                  </div>
                  <div class="col-md-2 col-sm-3 col-xs-6"> <a href="#">
                    <div class="job-type jt-remote-color"> <i class="fa fa-clock-o"></i> <?=date("M d-Y",$memberjob->j_add_date)?>  </div>
                    </a> </div>
                  <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                  <!--  <button class="btn btn-primary btn-custom">View Detail</button>-->
              <a href="<?=base_url()?>job/edit/<?=$memberjob->j_id?>/<?php echo $this->session->userdata('user_id')?>/<?=$memberjob->j_slug?>" class="btn btn-primary btn-custom mb-2">Edit</a>
                  </div>
                </div>
              </div>
              
              <?php 
              }
              }
              else{ ?>
                
                <div class="col-md-12 mt-5">
                  <h3 class="text-center">
                    "Still no job upload from you"
                  </h3>
                </div>
             <?php  }
              ?>
            </div>
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
