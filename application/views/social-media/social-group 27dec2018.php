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
            <h3>WhatsApp <?=$group_info->group_name;?> Group</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('social-group/engineering');?>"  target="_blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info"><?=$group_info->group_name;?></div>
                        <!--<div class="status"></div>-->
                    </a>
                </div>
            </div>            
            <div class="space10"></div>
            <!--END METRO STATES-->
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <a href="<?=site_url('join-social-group/'.$group_info->social_group_id)?>">
                    <button type="button" class="btn btn-success offset-1 col-sm-6 col-xs-12">Join Group</button>
                </a>            
            </div>
        </div>
        <div class="row-fluid">
            
            <?php
            foreach($group_subscribers as $subscriber){?>
            <b><?php echo UserInfo($subscriber->user_id)->m_name?></b> &nbsp;&nbsp;&nbsp;                    
            <?php } ?>                        
        </div>
        
    </div>
</section>       
<div class="clearfix"></div>
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>