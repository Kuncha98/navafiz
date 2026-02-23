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
              <p class="title">Add Education</p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
              <div class="profile-edit row boxed box-to-clone education-box">
                <form class="form-horizontal" method="post" action="javascript:void(0)" id="memberpage">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Degree Level <span class="required">*</span></label>
                      <select class="select-category form-control" name="degree" id="degree">
                        <!--  <option label="Select Option"></option>-->
                        <option value="Matric">Matric</option>
                        <option value="Intermediate">Intermediate (FA/FSc, A-levels or equivalent)</option>
                        <option value="Bachelor">Bachelor's (BA, Bcom, BSc, Engieenring, MBBS etc.)</option>
                        <option value="Master">Master's (MA, Mcom, MSc, M.Phil etc.)</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>To <span class="required">*</span></label>
                      <input type="month" id="educationyear" name="educationyear" placeholder="" class="form-control"/>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Detail <span class="required">*</span></label>
                      <textarea id="descr" name="descr" placeholder="" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <button class="btn btn-default col-md-12 col-sm-12 col-xs-12" onClick="saveEducation()"> Save <i class="fa fa-angle-right"></i></button>
                  </div>
                </form>
              </div>
              <br>
              <div class="profile-edit row boxed box-to-clone education-box">
                <?php
		$qry= "select * from jb_member_education where me_member_id = '".$this->session->userdata('user_id')."'";
                $rs = mysql_query($qry);
                while($row = mysql_fetch_array($rs)){
                ?>
                 
                <div class="panel panel-default" id="showdetails_<?php echo $row['me_id'] ?>">
                  <div class="panel-heading panel-heading-gray"> <a href="#showdetails_<?php echo $row['me_id'] ?>" class="showdetailClass btn btn-white btn-xs pull-right" id="editeducationdetails_<?php echo $row['me_id'] ?>"><i class="fa fa-pencil"></i></a><a href="<?=base_url()?>deleducation/<?=$row['me_id']?>" class="btn btn-white btn-xs pull-right" <?php /*?>onClick="removeEducation(<?php echo $row['me_id'] ?>)"<?php */?>><i class="fa fa-remove"></i></a> Education </div>
                  <div class="panel-body">
                    <ul class="list-unstyled profile-about">
                      <li>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Degree Level</label>
                          </div>
                          <div class="col-sm-8"><?php echo $row['me_degree'] ?></div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Year</label>
                          </div>
                          <div class="col-sm-8"><?php echo $row['me_year'] ?></div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Detail</label>
                          </div>
                          <div class="col-sm-8"><?php echo $row['me_descr'] ?></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="panel panel-default maineditdetailClass" id="maineditdetails_<?php echo $row['me_id'] ?>">
                  <div class="panel-heading panel-heading-gray"> <a href="javascript:void(0);" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a> Education </div>
                  <div id="profile-about" class="panel-body">
                    <div class="form-group has-success" style="display:none;"> <span id="update-success"></span> </div>
                    <ul class="list-unstyled profile-about">
                      <?php // echo form_open('profile/editprofile'); ?>
                      <li>
                        <div class="row">
                          <div class="col-lg-4">
                            <label>Degree Level</label>
                          </div>
                          <div class="col-lg-8">
                            <select name="degree_<?php echo $row['me_id'] ?>" id="degree_<?php echo $row['me_id'] ?>">
                              <option value="Matric" <?=($row['me_degree'] == "Matric")?"selected":""?>>Matric</option>
                              <option value="Intermediate" <?=($row['me_degree'] == "Intermediate")?"selected":""?>>Intermediate (FA/FSc, A-levels or equivalent)</option>
                              <option value="Bachelor" <?=($row['me_degree'] == "Bachelor")?"selected":""?>>Bachelor's (BA, Bcom, BSc, Engieenring, MBBS etc.)</option>
                              <option value="Master" <?=($row['me_degree'] == "Master")?"selected":""?>>Master's (MA, Mcom, MSc, M.Phil etc.)</option>
                              <option value="Other" <?=($row['me_degree'] == "Other")?"selected":""?>>Other</option>
                            </select>
                            <span id="emailerrror"></span> </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Year</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text"  class="form-control" name="year_<?php echo $row['me_id'] ?>" id="year_<?php echo $row['me_id'] ?>" value="<?php echo $row['me_year'] ?>">
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Detail</label>
                          </div>
                          <div class="col-sm-8">
                            <textarea class="form-control"  id="descr_<?php echo $row['me_id'] ?>" name="descr_<?php echo $row['me_id'] ?>"><?php echo $row['me_descr'] ?></textarea>
                            <?php /*?> <input type="text" name="detail_<?php echo $row['me_id'] ?>" id="detail_<?php echo $row['me_id'] ?>" value="<?php echo $row['me_descr'] ?>"><?php */?>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <div class="col-sm-4" ><span class="text-muted"></span> </div>
                          <div class="col-sm-8">
                            <input type="submit" class="btn btn-primary" name="editprofileinfo" id="updateAbout" value="Update" onClick="updateEducaton(<?php echo $row['me_id'] ?>)"  >
                          </div>
                        </div>
                      </li>
                      <?php //echo form_close(); ?>
                    </ul>
                  </div>
                </div>
                <?php } ?>
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
    $('#educationyear').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });	

	/*$('#datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
	});

	$('#datepicker1').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
});	*/


    $(".editdetailClass").hide();
	 $(".editjobdetailClass").hide();
	 $(".maineditdetailClass").hide();
	$('#datetimepicker1').datetimepicker();
	

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
	 
 function removeEducation(me_id)
	{
		//alert(me_id);
 	$("#loading").show();
	var form_data = {
			ajax	 		: '1',
			me_id	: me_id,
			actioncall  	: 'deleducation'
		};
	$.ajax({
			
			
			url  	: "http://navafiz.com/newversion/deleducation",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
				
				}
			});	
	}         
          </script> 
</div>
</body>
</html>