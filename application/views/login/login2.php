<?php $this->load->view('include/header'); ?>
<style>
    div.password{
        position: relative;
    }
    div.password a{
        position: absolute;
        right: -10px;
        top: -28px;
        width: 10%;
    }
    div.password a i{
        font-size: 35px;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-xs-12 mx-auto">    
                    <div class="loginbox" style="margin-top: 50px;">                
                        <div class="form-group text-center">
                            <h2>
                                Welcome NAVAFIZ
                                <br />
                                <small>Don't miss your next opportunity. Sign in to stay updated on your professional world.</small>
                            </h2>
                            <p></p>
                        </div>
                        <?php $this->load->view('notification/notification-messages');?>
                        <div class="form-group" style="text-align:center;"> <span class="errormessage">
                            <?php echo validation_errors(); ?><?php echo $this->session->flashdata('msg'); ?></span> 
                        </div>
                        <form action="<?=base_url()?>user/authenticate" method="post" class="login_page">
                            <div class="form-group">
                                <input placeholder="Email" name="email" class="form-control" type="email" value="<?= !empty(get_cookie('navafiz_email')) ? get_cookie('navafiz_email') : '' ?>"  required>
                            </div>                            
                            <div class="form-group">
                                <input placeholder="Password" name="password" class="form-control" value="<?= !empty(get_cookie('navafiz_password')) ? get_cookie('navafiz_password') : '' ?>" type="password"  required>                        
                                <label for="remember-me">
                                    <input type="checkbox" name="remember_me" value="1" checked="" id="remember-me">
                                    Remember me
                                </label> 
                                <br/>
                                
                            </div>
                            <div class="loginbox-submit text-center">
                                 <input value="Log In" class="btn btn-success col-md-8 col-xs-12" type="submit">
                                 <br><br>
                                 <a class="btn btn-outline-success forgotpassword" href="<?=base_url('user/forgotpassword')?>">Forgot Password?</a>                    
                                 <a class="btn btn-outline-secondary registerbtn" href="<?=base_url('user/register')?>">Register on Navafiz</a>
                                 <!--<a class="btn btn-outline-primary" href="<?=base_url('user/change_password')?>">Change Password</a>-->
                                 <!--<a id="google_sign_in" class="btn btn-outline-primary" href="">Sign in with Google</a>-->
                                 <p>
                                    <a id="google_sign_in" href="<?php echo $loginURL?>">
                                        <img class="mt-3" src="<?=site_url('assets/frontend/images/google.jpg')?>" style="width: 185px;">
                                    </a>
                                </p>
                           </div>                     
                        </form>                
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
    

});
</script>