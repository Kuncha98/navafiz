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
    <?php $this->load->view('notification/notification-messages');?>
    <div class="card">
        <div class="card-header">
            <form action="<?=base_url('profile/UploadCV');?>" method="post" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="row">                                               
                    <div class="col-md-12 col-sm-12 col-xs-12">            
                        <div class="form-group">
                            <h3>Upload Your Resume</h3>                            
                            <p>
                                <input type="file"  name="resume_file" required="">
                            </p>
                            <p>
                                <input type="text" class="form-control" id="profile_url" style="opacity:0;position:absolute;" readonly>
                            </p>
                            <input type="submit" class="btn btn-success col-md-6 col-xs-12 mx-auto" value=" &nbsp;&nbsp; Save &nbsp;&nbsp;">
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