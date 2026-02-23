<?php $this->load->view('header.php'); 
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
<body>
<div class="profile-picture-overly hidden">
    <img src="<?=site_url('assets/frontend/images/large.gif');?>" />
</div>
<div class="page category-page"> 
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
    <section class="dashboard-body">
      <div class="container">
        <div class="row">
            <div class="heading-inner first-heading">
                <p class="title">Update Profile Picture</p>
            </div>
            <?php $this->load->view('notification/notification-messages');?>
            <form action="<?=base_url('UpdateProfilePhoto')?>" method="post" id="profilephoto" enctype="multipart/form-data">  
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                
                <div class="profile-edit" style="padding: 20px; margin: 50px auto;border: solid 5px #ccc;">
                    <div style="width: 200px; margin: 0 auto;">
                        <a href="javascript:void(0);" style="position: relative;" onclick="javascript: document.getElementById('memberfile').click(); return false;">
                            <i class="btn btn-info btn-lg" style="position: absolute;top: -95px;right: -74px;">Change</i>
                            <img src="<?=site_url('assets/uploads/members/small_thumbs/'.$profile->m_avatar);?>">
                        </a>                            
                      <input type="file" name="memberfile" id="memberfile" style="visibility: hidden;margin: 0 auto;">
                    </div>                    
                </div>
                <div class="row">
                    <a href="<?=site_url('profile/'.$user_id);?>" class="btn btn-primary col-12">View Profile</a>
                </div>
            </div>
            <input type="hidden" name="current_file" value="<?=$profile->m_avatar?>" />
            <input type="hidden" name="post_file" value="1" />
            </form>
        </div>
      </div>
    </section>  
    <?php $this->load->view('footerbottom.php'); ?>
</div>

<script>
$(document).ready(function(){
    $('#memberfile').change(function(){
        $('div.profile-picture-overly').removeClass('hidden');
        $('#profilephoto').submit();
    });
});
</script>
</body>
</html>