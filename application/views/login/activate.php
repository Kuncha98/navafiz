<?php $this->load->view('include/header');?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 col-xs-12 mx-auto">
                    <?php $this->load->view('notification/notification-messages');?>
                    <form action="<?=base_url()?>user/user_verify" method="post" class="login_page">
                        <div class="form-group text-center">
                            <h2>
                                Navafiz Account Activation
                                <br />
                                <small>Don't miss your next opportunity. Sign Up to stay updated on your professional world.</small>
                            </h2>
                        </div>
                        <div class="form-group">
                            <label>Enter Code: <span class="required">*</span></label>
                            <input placeholder="Enter Code" name="m_verification" required  class="form-control" type="text">
                            <b class="btn-outline-danger">Note: If you face any trouble in getting code please contact on usman@navafiz.com</b> 
                            
                        </div>
                        <div class="loginbox-submit">
                            <input value="Verify" class="btn btn-success col-md-12" type="submit">
                        </div>
                    </form>
                    <br>
                    <div class="loginbox-signup">
                        <a class="btn btn-outline-success float-right" href="<?=base_url()?>user/login">Login</a>
                        <a class="btn btn-outline-danger float-left" href="<?=base_url()?>user/resend_code">Resend Code</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        