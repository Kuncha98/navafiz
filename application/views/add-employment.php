<?php $this->load->view('include/header'); ?>
<?php $session_user_id = $this->session->userdata('user_id');?>
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery.tagsinput.min.css">
<style type="text/css">
  .modal-dialog{
    max-width: 750px;
  }
.dropdown-menu{
    right: auto;
    min-width: auto;
  }
#companies-list{
	background-color:#FFF;
	border: solid 1px #ccc;
}
#companies-list li{
	padding: 8px 8px 8px 10px !important;
	border-bottom: solid 1px #ccc;
	font-size: 12px;	
}
#companies-list li:hover{
	background-color: #ccc !important;			
	color: #fff;
}
</style>
<?php 
	$user_id = $this->session->userdata('user_id');
?>
<div class="container">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-md-10 col-xs-12 mx-auto">
          <?php if(isset($emp_history_id) && $emp_history_id>0){?>
            <h2>Edit Employment History</h2>
            <?php } else{ ?>
            <h2>Add Employment History</h2>
            <?php } ?>
            <form class="form-horizontal" method="post" action="<?=site_url('employment/Save');?>">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Company <span class="required">*</span></label>
                        <div class="frmSearch">
                            <input type="text" class="form-control" name="company_name"  id="search-box" placeholder="Company Name" autocomplete="off" value="<?=isset($current_emphistory->company_name) ? $current_emphistory->company_name:''; ?>"   />
                            <input type="hidden" name="company_id" required="" id="company_id" value="<?=isset($current_emphistory->company_id) ? $current_emphistory->company_id:''; ?>">
                            <div id="suggesstion-box"></div>
                        </div>
                        <br>
                        <small>
                            <a href="#" class="btn btn-success" id="add_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">Click here to add new company (if not available)</a>
                        </small>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                                <label>From <span class="required">*</span></label>
                                <input type="text" class="form-control" id="datepicker" name="start_year" value="<?=isset($current_emphistory->start_year) ? $current_emphistory->start_year:'';?>" autocomplete="off" readonly="">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col-md-8 endyeardate">
										<label>To <span class="required">*</span></label>
										<input type="text" id="datepickerto" name="end_year" placeholder="" class="form-control" value="<?=isset($current_emphistory->end_year) ? $current_emphistory->end_year:''; ?>" autocomplete="off" readonly="" />                            			
                            		</div>
									<div class="col-md-3">
										<label>To Date</label>
											<input  type="checkbox" class="form-control to_date" name="to_date" value="To date"/>
									</div>
                            	</div>                                
                            </div>                
                        </div>							
                    </div>                   
                </div>
                <div class="col-md-12 col-sm-12">
                   <div class="form-group">
                       <label>Position / Designation<span class="required">*</span></label>
                       <input type="text" class="form-control" name="position_designation" value="<?=isset($current_emphistory->position_designation) ? $current_emphistory->position_designation:'';?>" required="">
                   </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Detail <span class="required">*</span></label>
                      <textarea id="jobdescr" name="description" placeholder="" cols="4" class="form-control" style="height: 200px;"><?=isset($current_emphistory->description) ? $current_emphistory->description:'';?></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-primary"> Save </button>
                </div>
                <?php if(isset($emp_history_id) && $emp_history_id>0){?>
                    <input type="hidden" name="emp_history_id" value="<?=$emp_history_id?>">
                <?php } ?>
            </form>           
        </div>
    </div>
</div>
<div class="modal fade" id="company_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="float-right" aria-hidden="true">&times;</span></button>
      <div class="modal-header">        
        <h4 class="modal-title" id="myModalLabel">Add Company</h4>
      </div>

      <div class="modal-body">
          <form action="<?=base_url('companies/save');?>" class="row" method="post" id="formd" enctype="multipart/form-data">            
            <?php if(isset($emp_history_id) && $emp_history_id>0){?>
            <input type="hidden" name="action" value="employment/add/<?= $emp_history_id;?>">
            <?php } else{ ?>
            <input type="hidden" name="action" value="employment/add">
            <?php } ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Category *</label>
                                <select id="cat_id" name="cat_id" class="questions-category form-control" required>
                                    <?php 
                                    $cat_results = $this->db->query("SELECT * FROM jb_categories where c_status =1")->result_array();                                      
                                    foreach ($cat_results as $cat_row){?>
                                    <option value="<?=$cat_row['c_id']?>">
                                    <?=$cat_row['c_name']?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Name *</label>
                                <input type="text" placeholder="Enter Name" id="name" name="name" class="form-control" required>
                            </div>
                        </div>                                
                        <div class="clearfix"></div> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mobile</label>
                                  <input type="text" placeholder="Enter Mobile" id="mobile" name="mobile" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Phone</label>
                               <input type="text" placeholder="Enter Phone" id="phone" name="phone" class="form-control">
                            </div>
                        </div>
                         <div class="clearfix"></div>  

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Email</label>
                                  <input type="text" placeholder="Enter Email" id="email" name="email" class="form-control">

                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Website</label>
                               <input type="text" placeholder="Enter Website" id="website" name="website" class="form-control">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Career Page</label>
                               <input type="text" placeholder="Enter Career page link" id="website" name="co_career_page" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" placeholder="Enter Fax" id="fax" name="fax" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>City</label>
                                  <input type="text" placeholder="Please Enter City" id="city" name="city" class="form-control">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Address *</label>
                                <input type="text" placeholder="Enter Address" class="form-control" id="address" value="" name="address">
                            </div>
                        </div>
                        <div class="clearfix"></div> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" id="tags" name="keywords" value="" class="form-control" data-role="tagsinput">
                            </div>
                        </div>   
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Image</label><span class="Errorclass" id="jobimagesms"></span>
                                <input type="file" id="company_logo"  name="company_logo"> 
                            </div>                                  
                        </div>
                        <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Admin Remarks</label>
                                <textarea name="admin_remarks" class="form-control"></textarea>
                            </div>
                        </div>
                        <?php }?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-primary pull-right">Submit <i class="fa fa-angle-right" style="margin-top: 0; font-size: 14px; color: #fff;"></i></button>
                           <!-- <button type="button" class="btn btn-default pull-right" onClick="postJob()">Post Job <i class="fa fa-angle-right"></i></button>-->
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('include/footer');?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>

$(document).ready(function(){

    $('#add_company').on('click', function(e){
        $('#company_modal').modal();        
    });

    $('#datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    $('#datepickerto').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    }); 
    
	$('.to_date').click(function() {
		if ($(this).prop("checked") == true) {
			$('.endyeardate').hide();
		} else if ($(this).prop("checked") == false) {
			$('.endyeardate').show();
		}
	});    
	
});


// AJAX call for autocomplete 
$(document).ready(function(){
  $("#search-box").keyup(function(){
  var key = $(this).val();

    $.ajax({
    type: "POST",
    url: "<?= site_url('companies/companyAjaxlist');?>",
    data: {keyword:key},
    crossDomain:true,
    beforeSend: function(){
      $("#search-box").css("background","#FFF url('<?php echo base_url('nassets/img/LoaderIcon.gif');?>') no-repeat 165px");
    },
    success: function(data){
     // alert(data);
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    }
    });
  });
    
});

</script> 
<script type="text/javascript" src="<?=base_url()?>assets/frontend/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript">
    $('#tags').tagsInput({
        width: 'auto'
    });
</script>s

<!-- CORE JS -->
<!--<script type="text/javascript" src="<?=base_url()?>assets/frontend/js/custom.js"></script> -->
