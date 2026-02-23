<?php $this->load->view('include/header');?>
<div class="container">    
    <div class="row">
        <div class="col-md-8 col-xs-12 mx-auto">
            <form action="<?=base_url('user/sendfpassword')?>" method="post" class="login_page">
                <div class="form-group text-center">
                    <h2>Forgot Passowrd</h2>
                </div>
                <?php $this->load->view('notification/notification-messages');?>
                <div class="form-group">
                    <input class="form-control" placeholder="Email address" type="email" name="email" required>
                    <div class="text-center">
                        <b class="btn-outline-danger">Note: If you face any trouble in getting code please contact usman@navafiz.com</b>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input value="Submit" class="btn btn-success col-8 mx-auto" type="submit">
                    <br>
                    <a href="<?=base_url()?>user/login">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer');?>
