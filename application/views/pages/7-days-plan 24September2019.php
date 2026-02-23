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
            <h3>7 Days Job Hunt Plan</h3>
            <div style="border-top: 4px solid #666;margin-bottom: 20px;"></div>
            <h3>Day 1</h3>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('mycvreport');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info"> Cv Review</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('reference');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">References</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Professional Email</div>
                        <div class="status">Coming Soon...</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('companies');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">50 Companies</div>
                        <div class="status">Coming Soon...</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('shoutbox');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Discussion Board</div>
                        <div class="status">Navafiz Discussion Board</div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <h3>Day 2</h3>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="https://linkedin.com/feed/" target="Blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Linked In Profile</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('reference');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">5 New References</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('mycard/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">My Card </div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('companies');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">50 Companies</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('shoutbox');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Discussion Board</div>
                        <div class="status">Navafiz Discussion Board</div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <h3>Day 3</h3>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="https://www.bayt.com/en/uae/" target="_blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Bayt Profile</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('reference');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">5 New References</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('companies');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">50 Companies</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('mycard/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Door to Door</div>
                        <div class="status">Visit Plan Map 1</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('shoutbox');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Discussion Board</div>
                        <div class="status">Navafiz Discussion Board</div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <h3>Day 4</h3>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="https://www.indeed.ae/" target="_blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Indeed Profile</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('reference');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">5 New References</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('companies');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">50 Companies</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('mycard/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Door to Door </div>
                        <div class="status">Visit Plan Map 2</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('shoutbox');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Discussion Board</div>
                        <div class="status">Navafiz Discussion Board</div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <h3>Day 5</h3>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Video CV</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('reference');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">5 New References</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('skills');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">My Skills</div>
                        <!--<div class="status">I can Teach</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('mycard/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Door to Door</div>
                        <div class="status">Vsit Plan Map 3</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('shoutbox');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Discussion Board</div>
                        <div class="status">Navafiz Discussion Board</div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <h3>Day 6</h3>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="https://www.gulftalent.com/" target="_blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Gulf Talent Profile</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('reference');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">5 New References</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('companies');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">50 Companies Emails</div>
                        <!--<div class="status">Coming Soon...</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('mycard/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Door to Door</div>
                        <div class="status">Visit Plan Map-1234</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('shoutbox');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Discussion Board</div>
                        <div class="status">Navafiz Discussion Board</div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <h3>Day 7</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Interview</div>
                        <div class="status">Preparation for Interview</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="javascript:void(0);" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Navafiz Team </div>
                        <div class="status">Connection with Navafiz</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('companies');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">50 Companies</div>
                        <div class="status">Email to 50 Companies.</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('mycard/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Door to Door</div>
                        <div class="status">Map Plan 5</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('shoutbox');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Discussion Board</div>
                        <div class="status">Navafiz Discussion Board</div>
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