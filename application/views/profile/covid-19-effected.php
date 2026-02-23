<?php 
$this->load->view('include/header'); 
$session_user_id = $this->session->userdata('user_id');
?>
<div class="container-mid">    
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('include/leftfeed'); ?>
        </div>
        <div class="col-md-6 col-xs-12">                              
            <?php $this->load->view('notification/notification-messages');?>
            <form action="<?=base_url('profile/doSaveCovid19Effected/')?>" id="memberpage" method="post">                
                <div class="card" style="margin-bottom: 30px;">
                    <div class="card-body">
                        <div class="row" style="margin-bottom: 25px;">
                            <div class="col-md-11 col-xs-12 mx-auto text-center">
                                <h3>Unemployed due to Covid-19 crisis?? <br /> Register to get hired</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 mx-auto">
                                <div class="form-group">                                    
                                    <label>Visa Status</label>
                                    <input type="text" placeholder="" class="form-control" name="visa_status" required="">
                                </div>
                                <?php //echo "<pre>"; print_r(GetCategoryList()); ?>
                                <div class="form-group">                                    
                                    <label>Please Select Your Current Status</label>
                                    <select class="select-category form-control" name="category_id" required="">
                                        <option value="">Category</option>    
                                        <?php foreach (GetCategoryList() as $category){?>
                                            <option value="<?=$category->c_id?>"><?=$category->c_name?></option>
                                        <?php }?>
                                        
                                    </select>
                                  </div>
                                <div class="form-group">                                      
                                    <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Save </button>
                                </div>                                
                            </div>                            
                        </div>
                    </div>
                </div>                
              </form>
        </div>
        <div class="col-md-3">
            <?php $this->load->view('include/rightfeed'); ?>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>
<script>
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
</script>