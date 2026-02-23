<?php $this->load->view('include/header');?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-xs-12 mx-auto">            
                    <form action="<?=base_url()?>user/change_pass" method="post" class="login_page">                    
                        <div class="form-group text-center">
                            <h2>
                                Change Your Password
                            </h2>
                        </div>
                        <?php $this->load->view('notification/notification-messages');?>
                        <div class="form-group">
                            <label>Current Password: <span class="required">*</span></label>
                            <input type="password"  placeholder="Enter Current Password" name="curr_pass" required value="<?php echo set_value('regname');?>" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>New Password: <span class="required">*</span></label>
                            <input placeholder="Enter New Password" class="form-control" type="password" name="new_pass" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password: <span class="required">*</span></label>
                            <input placeholder="Confirm New Password" class="form-control" type="password" name="con_pass" required autocomplete="off">
                        </div>
                        <div class="loginbox-submit text-center">
                             <input value="Change Password" class="btn btn-success col-md-6 col-xs-12" type="submit">
                             <br>
                             <br>
                             <a class="btn btn-outline-dark" href="<?=base_url()?>user/login">Click here to Login</a>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>    
</div>        