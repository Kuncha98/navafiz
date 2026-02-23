<?php $this->load->view('include/header');?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12 text-center" style="margin-top: 10%;">            
            <?php $this->load->view('notification/notification-messages');?>
            <form action="<?=base_url()?>user/updatecode" method="post" class="login_page">
                <div class="form-group text-center">
                    <h2>
                        Navafiz Account Actionvation
                        <br />
                        <small>Please enter your email to activate Navafiz Account</small>
                    </h2>
                </div>
                <div class="form-group">                    
                    <input placeholder="Enter Email" name="email" required  class="form-control" type="text">
                </div>
                <div class="loginbox-submit">
                     <input value="Submit" class="btn btn-primary col-md-12" type="submit">
                </div>
            </form>
            <br>
            <br>
            <div class="loginbox-signup">
                <a class="btn btn-primary" href="<?=base_url()?>user/login">Login</a>
                <a class="btn btn-primary pull-right" href="<?=base_url()?>user/register">Register</a>
            </div>            
        </div>
    </div>
</div>

     