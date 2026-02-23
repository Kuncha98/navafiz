<?php $this->load->view('include/header.php'); 
$user_id = $this->session->userdata('user_id');
?>
<style>
    .profile-picture-overly{
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        transition: .5s ease;
        background-color: rgba(0,0,0, 0.8);
        z-index: 99999;
    }
    .profile-picture-overly img{
        position: absolute;
        left: 50%;
        top: 50%;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php $this->load->view('notification/notification-messages');?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <form action="<?=base_url('UpdateProfilePhoto')?>" method="post" id="profilephoto" enctype="multipart/form-data">              
                <p>
                    <img src="<?=site_url('assets/uploads/members/small_thumbs/'.$profile->m_avatar);?>">
                </p>
                <p><b>Upload Your Profile photo</b></p>
                <p style="border: solid 5px #ccc;padding: 10px;"> 
                    <input type="file" name="memberfile" id="memberfile">
                </p>                                                                    
                <input type="hidden" name="current_file" value="<?=$profile->m_avatar?>" />
                <input type="hidden" name="post_file" value="1" />
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-xs-10 mx-auto">
            <a href="<?=site_url('profile/'.$user_id);?>" class="btn btn-primary col-12">View Profile</a>
        </div>        
    </div>
    <div class="profile-picture-overly">
        <img src="<?=site_url('assets/frontend/images/large.gif');?>" />
    </div>
</div>
<?php $this->load->view('include/footer.php'); ?>
<script>
$(document).ready(function(){
    $('div.profile-picture-overly').hide();
    $('#memberfile').change(function(){
        // $('div.profile-picture-overly').removeClass('hidden');
        $('div.profile-picture-overly').show();
        $('#profilephoto').submit();
    });
});
</script>
