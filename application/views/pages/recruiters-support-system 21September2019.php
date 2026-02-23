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
        <?php $this->load->view('notification/notification-messages');?>
        
        <div class="row-fluid">
            <style>
                p{
                    color: #4e4e4e;
                }
            </style>
            <h3> Recruiters Support System </h3>
            
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('place-job');?>">
                        <i class="icon-upload-alt"></i>
                        <div class="info">Post A Job</div>
                        <!--<div class="status">New User</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href='<?=site_url('professionals');?>'>
                        <i class="icon-search"></i>
                        <div class="info">Professional</div>
                        <div class="status">Active Job Seekers</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href='javascript:void(0);' onclick="alert('Coming Soon '); return false;">
                        <!--<i class="icon-search"></i>-->
                        <div class="info">Find Skills</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>
            </div>
            
            <div class="clearfix"></div>
            <!--END METRO STATES-->
        </div>
        <div class="space10"></div>
        <!--END METRO STATES-->
        </div>
    </div>
    <p style="color: #fff;">
        The Journey of a thousand miles starts with a single steps.
    </p>
    <p style="color: #fff;">
       Set your goal high, and don't stop till you get there.
    </p>
</section>    
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>