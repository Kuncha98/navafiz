<?php 
$this->load->view('include/header'); 
$session_user_id = $this->session->userdata('user_id');
//echo $dob;exit();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php $this->load->view('notification/notification-messages');?>
        </div>
    </div>
<div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <form action="<?=base_url('profile/update_date_of_birth')?>" method="post" id="profilephoto" enctype="multipart/form-data">              
                
                <p><b>Update Your Date of Birth</b></p>
                <div class="form-group text-center">
                    <p> 
                        <input class="form-control col-3 mx-auto" type="date" name="dob" id="dob" value="<?=isset($dob) ? $dob : '' ?>" />
                    </p>    
                </div>
                <div class="text-center">
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

</div>

<?php $this->load->view('include/footer'); ?>