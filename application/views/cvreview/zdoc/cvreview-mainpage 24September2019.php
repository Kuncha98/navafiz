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
            
            <h3>
                CV Review
            </h3>
            <?php $this->load->view('notification/notification-messages');?>
            <p style="color: #FF0000;">
               <b>Note 1:</b> Please complete your profile before cv review
            </p>
            <p style="color: #000000;">
                
                <b>Note-2</b>  : Navafiz is a Volunteer’s Platform, Due to large number of CV Reviews in Queue, your CV Review Report may take some extra time, <a href="<?=site_url('mycvreport');?>">check your CV Report</a> under Report Section after 4 days, remind in <a href="<?=site_url('shoutbox');?>">discussion Board</a> if Review Report is not received till 6 Days.
            </p>
            <p style="color: #000000;">
               <b>Note-3</b>  : As of now Navafiz CV Review System (Level-1) is focused on the overall view of Resume, sequence of information and some basic check points. 
                For (Level-2) Technical Review, you are required to consult with your relevant technical field expert.
            </p>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('SubmitCvReview/');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Upload Cv</div>
                        <div class="status">Upload Cv for Review</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('cvreview/CvreviewReport/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">My Cv Report</div>
                        <div class="status">My Cv Review Report</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('cvreviews-list');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Expert Advice</div>
                        <div class="status">Only for admins</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-blue">
                    <a data-original-title="" href="#" target="_blank" onclick="alert('Comming Soon'); return false;">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Self Report</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-blue">
                    <a data-original-title="" href="<?=site_url('shoutbox');?>" target="_blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Discussion Board</div>
                        <div class="status">Navafiz Discussion Board</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-blue">
                    <a data-original-title="" href="<?=site_url('public-assets/Navafiz-Standard-cv-jan-2017.pdf');?>" target="_blank">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Sample Resume</div>
                        <div class="status">Download Sample CV</div>
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