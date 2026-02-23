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
  <section class="dashboard-body">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="heading-inner first-heading">
              <p class="title">My Employment History</p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding"> 
                <div class="profile-edit row boxed box-to-clone education-box">              
                <?php
                $qry= "select * from jb_member_jobs where je_member_id = '".$this->session->userdata('user_id')."'";
                $rs = mysql_query($qry);
                while($row = mysql_fetch_array($rs)){
                ?>
                <div class="panel panel-default" id="showjobdetails_<?php echo $row['je_id'] ?>">
                        <div class="panel-heading panel-heading-gray"> <a href="#showjobdetails_<?php echo $row['je_id'] ?>" class="showjobdetailClass btn btn-white btn-xs pull-right" id="editjobdetails_<?php echo $row['je_id'] ?>"><i class="fa fa-pencil"></i></a><a href="<?=base_url()?>delemployer/<?=$row['je_id']?>" class="btn btn-white btn-xs pull-right" <?php /*?>onClick="removeEmployer(<?php echo $row['je_id'] ?>)"<?php */?>><i class="fa fa-remove"></i></a>  Employer </div>
                        <div class="panel-body">
                          <ul class="list-unstyled profile-about">
                            <li>
                              <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Employer</span> </div>
                                <div class="col-sm-8">
                                    <?=GetCompanyName($row['je_name']);?>                                    
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="row">
                                <div class="col-sm-4"><span class="text-muted">From</span> </div>
                                <div class="col-sm-8"><?php echo $row['je_year'] ?></div>
                              </div>
                            </li>
                             <li>
                              <div class="row">
                                <div class="col-sm-4"><span class="text-muted">To</span> </div>
                                <div class="col-sm-8"><?php echo $row['je_toyear'] ?></div>
                              </div>
                            </li>
                            
                            <li>
                              <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Detail</span> </div>
                                <div class="col-sm-8"><?php echo $row['je_descr'] ?></div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    <div class="panel panel-default editjobdetailClass" id="maineditjobdetails_<?php echo $row['je_id'] ?>">
                        <div class="panel-heading panel-heading-gray"> <a href="javascript:void(0);" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>  Employer </div>
                        <div id="profile-about" class="panel-body">
                          <div class="form-group has-success" style="display:none;"> <span id="update-success"></span> </div>
                          <ul class="list-unstyled profile-about">
                            <?php // echo form_open('profile/editprofile'); ?>
                            <li>
                              <div class="row">
                                <div class="col-lg-4"><span class="text-muted">Employer</span> </div>
                               <div class="col-lg-8">
                                <input type="text" name="employer_<?php echo $row['je_id'] ?>" id="employer_<?php echo $row['je_id'] ?>" value="<?php echo $row['je_name'] ?>">

                            <span id="emailerrror"></span> </div>
                              </div>
                            </li>
                            <li>
                              <div class="row">
                                <div class="col-sm-4"><span class="text-muted">From</span> </div>
                                <div class="col-sm-8">
                                
                                
                                  <input type="text" name="jobyear_<?php echo $row['je_id'] ?>" id="jobyear_<?php echo $row['je_id'] ?>" value="<?php echo $row['je_year'] ?>">
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="row">
                                <div class="col-sm-4"><span class="text-muted">To</span> </div>
                                <div class="col-sm-8">
                                
                                
                                  <input type="text" name="jobtoyear_<?php echo $row['je_id'] ?>" id="jobtoyear_<?php echo $row['je_id'] ?>" value="<?php echo $row['je_toyear'] ?>">
                                </div>
                              </div>
                            </li>
                            
                            <li>
                              <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Detail</span> </div>
                                <div class="col-sm-8">
                                   <textarea class="form-control" id="jobdescr_<?php echo $row['je_id'] ?>" name="jobdescr_<?php echo $row['je_id'] ?>"><?php echo $row['je_descr'] ?></textarea>
                                 <?php /*?> <input type="text" name="detail_<?php echo $row['me_id'] ?>" id="detail_<?php echo $row['me_id'] ?>" value="<?php echo $row['me_descr'] ?>"><?php */?>
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="row">
                                <div class="col-sm-4" ><span class="text-muted"></span> </div>
                                <div class="col-sm-8">
                                  <input type="submit" class="btn btn-primary" name="editprofileinfo" id="updateAbout" value="Update" onClick="updateJobs(<?php echo $row['je_id'] ?>)"  >
                                </div>
                              </div>
                            </li>
                            <?php //echo form_close(); ?>
                          </ul>
                        </div>
                      </div>
            <!--  </div>-->
                <?php }?>
            </div>
                <div style="background-color: #666;width: 100%;height: 5px;"></div>
            <div class="profile-edit row boxed box-to-clone education-box">
                  <form class="form-horizontal" method="post" action="javascript:void(0)" id="memberpage">
                      <h1>Add Company</h1>  
                   <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Company <span class="required">*</span></label>
                            <select class="select-category form-control" id="jobemployer" name="jobemployer" required="">
                                <option value=""> Please Select </option>
                                <?php foreach($companies_list as $company){?>
                                   <option value="<?=$company->co_id?>"> <?=$company->co_name?> - <?=$company->co_address?> </option>
                               <?php }?>
                           </select>
                           <small><a href="<?=site_url('companies/addform')?>">Click here for new company</a> </small>
                        </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                     <div class="form-group">
                         <label>From <span class="required">*</span></label>
                         <input type="text" class="form-control" id="datepicker" name="datepicker" value="">
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                          <label>To <span class="required">*</span></label>
                          <input type="text" id="datepickerto" name="datepickerto" placeholder="" class="form-control"/>
                      </div>
                  </div>

                  <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Detail <span class="required">*</span></label>
                        <textarea id="jobdescr" name="jobdescr" placeholder="" class="form-control"></textarea>
                      </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                      <button class="btn btn-default pull-right" onClick="saveJob()"> Save <i class="fa fa-angle-right"></i></button>
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