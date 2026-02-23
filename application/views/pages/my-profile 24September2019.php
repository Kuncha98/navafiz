<?php $this->load->view('header.php'); ?>
<body>
<div class="page">
<?php $this->load->view('pagetop.php'); ?>
<div class="clearfix"></div>
<link href="<?=base_url()?>assets/metrolab/css/style.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/metrolab/css/style-responsive.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/metrolab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<style>
.home-box-tabs{
    padding: 0 0 60px 0 !important;
}
</style>
<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    
<section class="home-box-tabs">
    <div class="container-fluid" style="background: #fff;">
        <div class="row-fluid">
            <h3>Navafiz Profile</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url($user_id >0 ? 'mycard/'.$user_id :'login');?>">
                        <i class="icon-stackexchange"></i>
                        <div class="info">My Card</div>
                        <!--<div class="status">Unique Visitor</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('profile/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">View Profile</div>
                        <div class="status">My Digital Resume</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('edit-profile');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Edit Profile</div>
                        <div class="status">Update Resume</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('teamactions/index/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Team Actions</div>
                        <div class="status"></div>
                    </a>
                </div>
            </div>
            
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
    </div>
</section>       
<div class="clearfix"></div>
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>