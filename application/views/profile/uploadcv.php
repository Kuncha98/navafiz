<?php $this->load->view('header.php'); ?>
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
            <div class="heading-inner first-heading">
              <p class="title">Add CV</p>
            </div>
            <div class="form-group"> <span class="successmessage"><?php echo $this->session->flashdata('msg'); ?></span> </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
              <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
              <div class="profile-edit row boxed box-to-clone education-box">
                <form action="<?=base_url()?>member/uploadcv" class="form-horizontal" method="post" id="cvpage" enctype="multipart/form-data" >
                  <input type="hidden" id="cvimage" value="" />
                  <div class="col-md-12 col-sm-12">
                    
                    <div class="form-group">
                       <?php	if($profile->member_cv != ""){?>
                        <label for="">My CV</label>
                        <?php }?>
                    </div>
                    
                    <div class="form-group">
                      
                      
                      <label>CV(Word or PDF Document) <span class="required">*</span></label>
                      <p id="cvsms" style="display:none"> </p>
                      <input type="file" id="cvfile" name="cvfile">
                      <table id="files1">
                      </table>
                      
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <button class="btn btn-default pull-right" onClick="cvUpload()"> Save <i class="fa fa-angle-right"></i></button>
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
  function saveSocialMedia()
	{
		
		
	var error = "";
	var fb 			= $('#fb').val();
	var tw 			= $('#tw').val();
	var lk 			= $('#lk').val();
	
	
	

	if(error != "")
		{
			$("#Errorclass").show();
		
	 	}
	
	
	else
	{	
	
	
		    $('#loading').show();
		var form_data = {
			
			fb		    : fb,
			tw		    : tw,
			lk		    : lk,
		   	actioncall  	: 'updatesocial'
		};
	$.ajax({
			url  	: "updatesocial",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
				
				//if(data == 0)
					//{
					$('#loading').hide();	
				 	$('#regmessage').html("Social media updated successfully!");
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