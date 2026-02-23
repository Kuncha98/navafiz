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
          <h3>My Posted Jobs</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a> </li>
              <li class="active">My Posted Jobs</li>
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
            
          
          
          <div class="col-md-8 col-sm-12 col-xs-12">
            <?php 
    
    if($memberjobs!='empty') {
	
    foreach(@$memberjobs as $memberjob){ 

          

		
?>
  <div class="all-jobs-list-box">
    <div class="job-box">
      <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">
        <div class="comp-logo"> <a href="<?=base_url()?>job/<?=$memberjob->j_id?>"> <img src="<?=base_url()?>/assets/uploads/jobs/<?=($memberjob->j_image == "")?"noimage.png":$memberjob->j_image ?>" class="img-responsive" alt="<?=$memberjob->j_title?>"></a> </div>
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
  <a href="<?=base_url()?>job/edit/<?=$memberjob->j_id?>/<?php echo $this->session->userdata('user_id')?>/<?=$memberjob->j_slug?>" class="btn btn-primary btn-custom">Edit</a>
      </div>
    </div>
  </div>
  
  <?php 
	}
	}
	else{
		echo "Still no job upload from you";
	}
  ?>
  <?php /*?><div class="col-md-12 col-sm-12 col-xs-12 nopadding">
    <div class="pagination-box clearfix">
      <ul class="pagination">
        <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
      </ul>
    </div>
  </div><?php */?>
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