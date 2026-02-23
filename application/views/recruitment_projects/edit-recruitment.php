<?php $this->load->view('include/header.php'); ?>
<style>
    #sub-form{
        margin-top: 130px; 
    }
</style>
<section id="sub-form">
<div class="container">
    <?php $this->load->view('notification/notification-messages'); ?>
    <form method="post" action="<?= site_url('recruitment_projects/update_recruitment/'.$details->id)?>">
     <div class="form-group">
         

        <div class="col-sm-6 mx-auto mt-4 mb-4">
            <input type="text" required="" placeholder="Enter Name" class="form-control" value="<?=$details->name?>" name="name">
        </div>

        <div class="col-sm-6 mx-auto mt-4 mb-4">
            <input type="email" required="" placeholder="Enter Email" class="form-control" value="<?=$details->email?>" name="email">
        </div>
   
        <div class="col-sm-6 mx-auto mt-4 mb-4">
            <input type="text" required="" placeholder="Enter Phone No" class="form-control" value="<?=$details->phone_no?>" name="phone_no">
        </div>
        <div class="col-sm-6 mx-auto mt-4 mb-4">
           <input type="submit" class="btn btn-success" name="Register">
        </div>
      </div>
    </form>
</div>
</section>
<?php $this->load->view('include/footer.php'); ?>