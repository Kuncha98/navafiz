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
            <h3>Where do you want to find?</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('whats-happening');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">As Received</div>
                        <div class="status">From Unverified Source</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('jobs');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Verified Job</div>
                        <div class="status">Verified By Navafiz</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('jobs');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Recruiters</div>
                        <div class="status">By Recruiters & Companies</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="https://www.linkedin.com/groups/6536553/" target="_blank">
                        <!--<i class="icon-remove-sign"></i>-->
                        <div class="info">LinkedIn</div>
                        <div class="status">Navafiz Linkedin Group</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="https://www.facebook.com/Navafizdotcom/" target="_blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Facebook</div>
                        <div class="status">Navafiz Facebook Page</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="https://www.facebook.com/groups/JobPostMail/" target="_blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Facebook Group</div>
                        <div class="status">Facebook Group</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('social-media');?>" target="_blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Social Media</div>
                        <div class="status">Whatsapp Group</div>
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