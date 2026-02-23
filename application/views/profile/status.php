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
            <form action="<?=base_url('profile/UpdateStatus/'.$profile->m_id)?>" id="memberpage" method="post">                
                <div class="card" style="margin-bottom: 30px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 col-xs-12 mx-auto">
                                <div class="form-group">                                    
                                    <label>Please Select Your Current Status</label>
                                    <select class="select-category form-control" name="role_id">
                                        <option value="0">Select Role</option>
                                        <?php foreach (GetUsersRoles() as $roles){?>
                                        <option <?=$profile->role_id==$roles->role_id ? 'selected=""':'';?> value="<?=$roles->role_id?>"><?=$roles->role_name?></option>
                                        <?php }?>                                        
                                    </select>
                                  </div>
                                <div class="form-group">  
                                    <input type="hidden" name="post_user_id" value="<?=$profile->m_id?>" />
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