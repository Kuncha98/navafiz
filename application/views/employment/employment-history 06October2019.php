<?php $this->load->view('header.php'); ?>

<style>
.panel-body ul {
	list-style: none !important;
}
<?php
    $user_id = $this->session->userdata('user_id');
?>
</style>
<body>
<div class="page category-page">
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <section class="dashboard-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <a href="<?= site_url('add-employment-history')?>" class="btn btn-primary ">Add Employment History</a>
              <a href="<?=site_url('profile/'.$user_id);?>" class="btn btn-primary" style="margin: 30px 16px;">View Profile</a>
            
            </div>
        </div>
        
        <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <?php $this->load->view('notification/notification-messages');?>
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding"> 
            <?php if($emp_history_id==0){?>
                <div class="profile-edit row boxed box-to-clone education-box">              
                    <?php
                    foreach($employment_history as $emp_history){
                    ?>
                    <div class="panel panel-default">
                            <div class="panel-heading panel-heading-gray"> 
                                <a href="<?=site_url('employment-history/'.$emp_history->emp_history_id);?>" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>
                                <a href="<?=base_url('delete-employment-history/'.$emp_history->emp_history_id)?>" onclick="return confirm('Are you Sure you want to delete this?')" class="btn btn-white btn-xs pull-right"><i class="fa fa-remove"></i></a>
                                Experience as <b><?=$emp_history->position_designation?></b>
                            </div>
                            <div class="panel-body">
                              <ul class="list-unstyled profile-about">
                                <li>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="text-muted">Employer</span> </div>
                                    <div class="col-sm-8">
                                        <?=GetCompanyName(intval($emp_history->company_name));?>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="text-muted">From</span> </div>
                                    <div class="col-sm-8"><?=$emp_history->start_year;?></div>
                                  </div>
                                </li>
                                 <li>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="text-muted">To</span> </div>
                                    <div class="col-sm-8"><?=$emp_history->end_year;?></div>
                                  </div>
                                </li>

                                <li>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="text-muted">Detail</span> </div>
                                    <div class="col-sm-8"><?=nl2br($emp_history->description);?></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                    <?php }?>
                </div>
            <?php }?>   

            <?php if(!empty($current_emphistory)){?>             
                <div class="heading-inner first-heading">
                    <p class="title">Edit Employment History</p>
                </div>
                <div class="profile-edit row boxed box-to-clone education-box">
                  <form class="form-horizontal" method="post" action="<?=site_url('UpdateEmploymentHistory');?>">
                   <div class="col-md-12 col-sm-12">
                     <div class="form-group">
                         <label>Position / Designation<span class="required">*</span></label>
                         <input type="text" class="form-control" name="position_designation" value="<?=isset($current_emphistory->position_designation) ? $current_emphistory->position_designation:'';?>" required="">
                     </div>
                  </div>
                    <div class="col-md-12 col-sm-12">
                     <div class="form-group">
                       <label>Company <span class="required">*</span></label>
                       <select class="select-category form-control" name="company_name" required="">
                           <option value="">Please Select</option>
                          <?php foreach($companies_list as $company){?>
                           <option <?=isset($current_emphistory->company_name) && intval($current_emphistory->company_name)==$company->co_id ? 'selected=""' :'';?>  value="<?=$company->co_id?>" > <?=$company->co_name?> - <?=$company->co_address?> </option>
                          <?php }?>
                      </select>
                       <small><a class="btn btn-success" href="<?=site_url('companies')?>">Click here to add new company (if not available in dropdown)</a> </small>
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                     <div class="form-group">
                         <label>From <span class="required">*</span></label>
                         <input type="text" class="form-control" id="datepicker" name="start_year" value="<?=isset($current_emphistory->start_year) ? $current_emphistory->start_year:'';?>">
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                          <label>To <span class="required">*</span></label>
                          <input type="text" id="datepickerto" name="end_year" placeholder="" class="form-control" value="<?=isset($current_emphistory->end_year) ? $current_emphistory->end_year:'';?>" />
                      </div>
                  </div>

                  <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Detail <span class="required">*</span></label>
                        <textarea id="jobdescr" name="description" placeholder="" cols="4" class="form-control" style="height: 200px;"><?=isset($current_emphistory->description) ? $current_emphistory->description:'';?></textarea>
                      </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                      <button type="submit" class="btn btn-default col-md-8 col-sm-8 col-xs-12"> Save <i class="fa fa-angle-right"></i></button>
                  </div>
                      <input type="hidden" name="emp_history_id" value="<?=$emp_history_id?>">
                  </form>
                </div>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   
  <?php $this->load->view('footerbottom.php'); ?>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<script>
  $(document).ready(function(){

	$('#datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
	});

	$('#datepickerto').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
});	

    $(".editdetailClass").hide();
    $(".editjobdetailClass").hide();
    $(".maineditdetailClass").hide();

});
  
  
    $('.add-box').on('click', function(e) {
        e.preventDefault();
        var newElem = $(this).parent().find('.box-to-clone:first').clone();
        newElem.find('input').val('');
        newElem.prependTo($(this).parent()).show();
        var height = $(this).prev('.box-to-clone').outerHeight(true);
        $("html, body").stop().animate({
            scrollTop: $(this).offset().top - height
        }, 600);
    });
		
	 
    $(document).on('click', '.showjobdetailClass', function(){
		
		data = this.id;
		ids = data.split("_"); 
		id = ids[1];
		
	$("#showjobdetails_"+id).hide();

	$("#maineditjobdetails_"+id).show();
	
	
$('#jobyear_'+id).datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
});
$('#jobtoyear_'+id).datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
});

	
		
		
		
	
	});
	$(document).on('click', '.showdetailClass', function(){
		
		data = this.id;
		ids = data.split("_"); 
		id = ids[1];
		
	$("#showdetails_"+id).hide();

	$("#maineditdetails_"+id).show();
		$('#year_'+id).datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
});
	
		
		
	
	});



function editmstat(val)

{

	document.getElementById('editmstatus').value = val;

}
	 
 function removeEmployer(je_id)
	{
 	$("#loading").show();
	var form_data = {
			ajax	 		: '1',
			je_id	: je_id,
			actioncall  	: 'delemployer'
		};
	$.ajax({
			//url  	: site_url+"deleducation",
			//url  	: "http://localhost/newnavafiz/delemployer",
			url  	: "http://navafiz.com/newversion/delemployer",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
				//$("#loading").hide();
					//alert(data);
			//	$("#loading").hide();
				//window.location.reload();
				
				//$("#showdetails_"+me_id).hide();
				}
			});	
	}         
          </script> 
</div>
</body>
</html>