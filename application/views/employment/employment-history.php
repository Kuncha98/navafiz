<?php $this->load->view('include/header');?>
<?php $user_id = $this->session->userdata('user_id');?>
<div class="container-mid">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-md-12">
          <a href="<?= site_url('employment/add')?>" class="btn btn-primary ">Add Employment History</a>
          <a href="<?=site_url('profile/'.$user_id);?>" class="btn btn-primary" style="margin: 30px 16px;">View Profile</a>
        </div>
    </div>    
    <?php if($emp_history_id==0){?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12">                    
            <h5 class="wow fadeInDown text-center" style="padding-top: 25px;">Work Experience (Employment History) </h5>
            <?php foreach($employment_history as $emp_history){?>                    
            <div class="card" style="margin-bottom: 15px;">
                <div class="card-header">
                    Experience as <b><?=$emp_history->position_designation?></b>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled profile-about" style="list-style: none !important;">
                        <li>
                            <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Employer</span> </div>
                                <div class="col-sm-8">
                                <?php
                                $company_name = GetCompanyName(intval($emp_history->company_name));
                                $company_id = GetCompanyName(intval($emp_history->company_id)); 
                                ?>                       
                                <?= !empty($company_name) ? $company_name : $company_id  ;?>                                             
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
                    <a href="<?=site_url('employment/add/'.$emp_history->emp_history_id);?>" style="vertical-align: inherit;" class="btn btn-white btn-xs flaot-right"><i style="font-size: 16px;" class="fas fa-edit"></i></a>
                    <a href="<?=base_url('employment/delete/'.$emp_history->emp_history_id)?>" style="vertical-align: inherit;" onclick="return confirm('Are you Sure you want to delete this?')" class="btn btn-white btn-xs pull-right"><i style="font-size: 16px;" class=" fas fa-trash-alt"></i></a>
                </div>                        
            </div>
            <?php }?> 
        </div>
    </div>
    <?php }?>          
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php if(!empty($current_emphistory)){?>             
                <div class="heading-inner first-heading">
                  
                    <h5 class="wow fadeInDown text-center" style="padding-top: 25px;padding-bottom: 25px;">Edit Employment History </h5>
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
                       <div class="frmSearch">
                          <input type="text" name="company_name" class="form-control" value="<?= $current_emphistory->company_name;?>"   id="search-box" placeholder="Company Name"  autocomplete="off"/>
                          <input type="hidden" name="company_id" id="company_id">
                          <div id="suggesstion-box"></div>
                            <!-- value="<?=$company->co_name?> - <?=$company->co_address?>" -->
                       </div>
                       <br>
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
                      <button type="submit" class="btn btn-primary col-md-8 col-sm-8 col-xs-12"> Save </button>
                  </div>
                      <input type="hidden" name="emp_history_id" value="<?=$emp_history_id?>">
                  </form>
                </div>
                <?php } ?>          
        </div>
      </div>
    </div>  
<?php $this->load->view('include/footer'); ?>  
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
        
        $("#search-box").keyup(function(){
            var key = $(this).val();

            $.ajax({
            type: "POST",
            url: base_url+"companies/companyAjaxlist",
            data: {keyword:key},
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
 
</script> 