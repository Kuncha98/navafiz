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
            <h3>Events / Meetups & Training Sessions</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('event/14');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Abu Dhabi</div>
                        <div class="status">2 Feb 2019 </div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('event/15');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Dubai</div>
                        <div class="status">08 Feb Friday</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('event/15');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Sharjah</div>
                        <div class="status">08 Feb Friday</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Al Ain</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Ajman</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>

                
                
            </div>
            <div class="metro-nav">
                <div class="metro-nav-block nav-block-orange">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Ras Al Khaimah</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href='javascript:void(0);'>
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Fujairah</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Umm al-Quwain</div>
                        <div class="status">Coming Soon</div>
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