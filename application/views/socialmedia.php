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
  <div class="clearfix"></div>
  
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Social Media</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a> </li>
              <li class="active">Social Media</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="dashboard-body">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="heading-inner first-heading">
              <p class="title">Add Social Media Information</p>
            </div>
             <div class="form-group"> <span class="successmessage"><?php echo $this->session->flashdata('msg'); ?></span> </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
               <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
              <div class="profile-edit row boxed box-to-clone education-box">
                <form class="form-horizontal" method="post" action="<?=base_url()?>updatesocial" id="memberpage">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Facebook <span class="required">*</span></label>
                      <input type="text" id="fb" name="fb" placeholder="Facebook URL" class="form-control" value="<?=$profile->m_fb?>"/>
                    
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Twitter <span class="required">*</span></label>
                      <input type="text" id="tw" name="tw" placeholder="Twitter URL" class="form-control"  value="<?=$profile->m_tw?>"/>
                    
                    </div>
                  </div>
                  
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>LinkedIn <span class="required">*</span></label>
                      <input type="text" id="lk" name="lk" placeholder="LinkedIn URL" class="form-control"  value="<?=$profile->m_lk?>"/>
                    
                    </div>
                  </div>
                  
                  <div class="col-md-12 col-sm-12">
                    <button class="btn btn-default pull-right" onClick="saveSocialMedia()"> Save <i class="fa fa-angle-right"></i></button>
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