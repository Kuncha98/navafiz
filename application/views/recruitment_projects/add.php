<?php $this->load->view('include/header.php'); ?>
<div class="container-mid">
    <?php $this->load->view('notification/notification-messages'); ?>
    <form method="post" action="<?= site_url('recruitment_projects/save')?>">
        <div class="row">
            <div class="col-md-12 col-xs-12 text-center">
                <h1>Recruitment Project Request</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="form-group">
                    <div class="col-sm-6 mx-auto mt-4 mb-4">
                        <input type="text" required="" placeholder="Enter Name" class="form-control" name="name">
                    </div>
                    <div class="col-sm-6 mx-auto mt-4 mb-4">
                        <input type="email" required="" placeholder="Enter Email" class="form-control" name="email">
                    </div>

                    <div class="col-sm-6 mx-auto mt-4 mb-4">
                        <input type="text" required="" placeholder="Enter Phone No" class="form-control" name="phone_no">
                    </div>
                    <div class="col-sm-6 mx-auto mt-4 mb-4">
                       <input type="submit" class="btn btn-success" name="Register">
                    </div>
                </div>
            </div>
        </div>
    </form>
         
        
</div>
<?php $this->load->view('include/footer.php'); ?>