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
            <h3>WhatsApp Groups</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('social-group/1');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Engineering</div>
                        <!--<div class="status"></div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('social-group/2');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Finance</div>
                        <!--<div class="status">Unique Visitor</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('social-group/3');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Sales</div>
                        <!--<div class="status">Unique Visitor</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('social-group/4');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Marketing</div>
                        <!--<div class="status">Sample Resume Formats</div>-->
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('social-group/5');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Logistics</div>
                        <!--<div class="status">Comments</div>-->
                    </a>
                </div>
            </div>
            
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('social-group/6');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">HR & Admin</div>
                        <div class="status">Only for HR & Public Relation</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href='<?=site_url('social-group/7');?>'  >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">I.T</div>
                        <!--<div class="status">Sales</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="<?=site_url('social-group/8');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Medical</div>
                        <!--<div class="status">Update</div>-->
                    </a>
                </div>

                
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('social-group/9');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">HSE</div>
                        <div class="status">Health Safety & Environment</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Education</div>
                        <!--<div class="status">Success Stories</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('social-group/11');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Drivers</div>
                        <div class="status">Only for Drivers</div>
                    </a>
                </div>                
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('social-group/12');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Chef / Cook / Restaurant</div>
                        <div class="status">Chef / Cook / Restaurant</div>
                    </a>
                </div>                
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('social-group/13');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Security</div>
                        <div class="status">Security</div>
                    </a>
                </div>                
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('social-group/15');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Multan</div>
                        <div class="status">Multan</div>
                    </a>
                </div>                
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('social-group/16');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Karachi</div>
                        <div class="status">Karachi</div>
                    </a>
                </div>                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('social-group/17');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Entrepreneur / Business </div>
                        <div class="status">Entrepreneur / Business Support</div>
                    </a>
                </div>                
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('social-group/18');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Media</div>
                        <div class="status">Media</div>
                    </a>
                </div>                
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="<?=site_url('social-group/19');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Lahore</div>
                        <div class="status">Lahore</div>
                    </a>
                </div>                

            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div style="border-top: 4px solid #666;margin-bottom: 20px;"></div>
            
        <div class="row-fluid">
            <h3>Engineering Whats app Group</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('social-group/1');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Aeronautical Eng.</div>
                        <div class="status">Aerospace/aeronautical</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('social-group/1');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Chemical Eng.</div>
                        <!--<div class="status">Unique Visitor</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('social-group/1');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Civil Eng.</div>
                        <!--<div class="status">Unique Visitor</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('social-group/1');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Electrical/Electronics</div>
                        <div class="status">Electrical/Electronics </div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('social-group/14');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Mechanical/Piping Engineering</div>
                        <div class="status">HVAC</div>
                    </a>
                </div>
            </div>
            
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('social-group/1');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Eng. Management</div>
                        <div class="status">Engineering management.</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href='<?=site_url('social-group/1');?>'>
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Instrument & Control</div>
                        <!--<div class="status">Sales</div>-->
                    </a>
                </div>
            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        
        <div style="border-top: 4px solid #666;margin-bottom: 20px;"></div>
        
        <div class="row-fluid">
            <h3> LinkedIn Groups & Pages</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-brown">
                    <a data-original-title="" href="https://www.linkedin.com/groups/6536553/" target="_blank">
                        <!--<i class="icon-remove-sign"></i>-->
                        <div class="info">LinkedIn</div>
                        <div class="status">Navafiz Linkedin Group</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-grey">
                    <a data-original-title="" href="<?=site_url('page/resume');?>">
                        <!--<i class="icon-external-link"></i>-->
                        <div class="info">Influencers</div>
                        <div class="status">LinkedIn Influencers</div>
                    </a>
                </div>
            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div class="row-fluid">
            <h3>  Facebook Jobs Sharing Groups & Pages  </h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="https://www.facebook.com/Navafizdotcom/">
                        <!--<i class="icon-calendar"></i>-->
                        <div class="info">Facebook Page</div>
                        <!--<div class="status">Step-7:</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-brown">
                    <a data-original-title="" href="https://www.facebook.com/groups/JobPostMail/?ref=share" target="_blank">
                        <!--<i class="icon-youtube-play"></i>-->
                        <div class="info">Facebook Group</div>
                        <div class="status">Navafiz Facebook Group</div>
                    </a>
                </div>
            </div>
            <div class="metro-nav">
            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div class="row-fluid">
            <h3>  Downloads  </h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="http://www.navafiz.com/public-assets/Navafiz-Standard-cv-jan-2017.pdf" target="_blank">
                        <i class="icon-download-alt"></i>
                        <div class="info">Sample CV</div>
                        <!--<div class="status">New Order</div>-->
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