<?php $this->load->view('include/header');?>

<div class="container">
    <form action="<?=site_url('user/verification_code')?>" method="post">
        <div class="row">
            <div class="col-lg-4 col-sm-3 col-xs-3 mx-auto form-group">
                <label>Email</label>
                <input class="form-control" name="email" type="email" placeholder="Email">
                <input type="submit" class="mt-3 btn btn-outline-success">
            </div>
        </div>
    </form>
</div>

<?php $this->load->view('include/footer');?>
