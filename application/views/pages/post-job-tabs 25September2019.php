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
            <h3>Where do you want to list?</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('whats-happening');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">As Received</div>
                        <div class="status">From Unverified Source</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('jobpost');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Verified Job</div>
                        <div class="status">Verified By Navafiz</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('jobpost');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Recruiters</div>
                        <div class="status">By Recruiters & Companies</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('myjobs');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Posted Jobs</div>
                        <div class="status">My Posted Jobs</div>
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