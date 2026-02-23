<?php $this->load->view('include/header.php'); 
$profile_id= $this->session->userdata('user_id');
?>

<style>
    label{
        font-size: 12px !important;
    }
</style>
<!-- Action Buttons -->
            <?php if($profile_id > 0){
                $class = '';
            }else{
                $class = 'disabled';
            } ?>
<div class="container">
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
</div>


<div class="container">
    <?php $this->load->view('notification/notification-messages'); ?>
    <div class="card">
        <div class="card-header">
            <form action="<?= base_url('profile/deleteProfile'); ?>" method="post" enctype="multipart/form-data">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h3>Enter your Password</h3>
                                <p align="center">
                                    <input type="password" class="form-control col-md-6" style="margin-bottom: -10px" name="password" placeholder="Confirm your password" required="">
                                </p>
                                <a class="forgotpassword pr-5" href="<?=base_url('user/forgotpassword')?>" style="margin-right:338px;">Forgot Password?</a> <br>                   
                                <input type="submit" class="btn btn-success col-md-4 col-xs-12 mx-auto text-center mt-3" value=" &nbsp;&nbsp; Confirm &nbsp;&nbsp;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function copycurrenturl() {
            $('#profile_url').val(base_url+'n/'+<?=$profile_id?>);
            /* Get the text field */
            var copyText = document.getElementById("profile_url");
        
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
        
            /* Copy the text inside the text field */
            document.execCommand("copy");
        
            /* Alert the copied text */
            return false;
      }   
</script>
<?php $this->load->view('include/footer.php'); ?> 