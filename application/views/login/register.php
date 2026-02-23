<?php $this->load->view('include/header');?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-xs-12 mx-auto">            
                    <form action="<?=base_url()?>user/register" method="post" class="login_page">                    
                        <div class="form-group text-center">
                            <h2>
                                Welcome Navafiz
                                <br />
                                <small>Don't miss your next opportunity. Sign Up to stay updated on your professional world.</small>
                            </h2>
                        </div>
                        <?php $this->load->view('notification/notification-messages');?>
                        <div class="form-group">
                            <label>Name: <span class="required">*</span></label>
                            <input type="text"  placeholder="Enter Name" name="regname" required value="<?php echo set_value('regname');?>" class="form-control" autocomplete="off">
                        </div>
                        <input type="hidden" name="referral_id" value="<?= isset($_GET['referral_id']) ? $_GET['referral_id'] : ''; ?>">

                        <div class="form-group">
                            <label>Email: <span class="required">*</span></label>
                            <input placeholder="" class="form-control" placeholder="Enter Email" style="text-transform: lowercase;" type="email" name="regemail" required value="<?php echo set_value('regemail');?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Password: <span class="required">*</span></label>
                            <input placeholder="" class="form-control" placeholder="Enter Password" type="password" name="regpwd" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password: <span class="required">*</span></label>
                            <input placeholder="" class="form-control" placeholder="Re-Enter Password" type="password" name="regcpwd" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6Ldgyo4rAAAAAIMRTw_sTC0clKYSFY-fZQ3zemJX"></div>
                        </div>
                        <div class="loginbox-submit text-center">
                             <input value="Register" class="btn btn-success col-md-6 col-xs-12" type="submit">
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