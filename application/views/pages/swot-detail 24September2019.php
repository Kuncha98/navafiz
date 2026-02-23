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
    <div class="container">
        <div class="row-fluid">
            <h3>SWOT</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('swot/my-strengths');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">My Strengths</div>
                        <!--<div class="status">  </div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('swot/my-weeknesses');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">My Weeknesses </div>
                        <div class="status">Area of Development</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('swot/opportunities');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info"> Opportunities</div>
                        <!--<div class="status">21 December 2018</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('swot/my-threats');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">My Threats</div>
                        <!--<div class="status">Coming Soon</div>-->
                    </a>
                </div>
                
            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div class="row text-center">
            <h3>
                <?php
                    echo ucwords($swot_type);
                ?>
            </h3>
            <p>
                <?php 
                    if(isset($myswot_data[0]->desc)){
                        echo nl2br($myswot_data[0]->desc);
                    }                    
                ?>
            </p>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div class="row">
            <form action="" method="post">
                <div class="col-12">
                    <p>
                        <textarea class="form-control" name="swot_desc" rows="10" required=""></textarea>
                    </p>
                    <p>
                    <b>Guidlines</b>
                </p>
                <?php
                if($swot_type=='my-strengths'){
                ?>
                <p>
                    Strengths are your internal, positive attributes and selling points. You have some control over these. Examples include:
                </p>
                <p>
                    Positive personal traits. <br>
                    Relevant skills, competencies, knowledge and work experience.<br>
                    A solid education.<br>
                    A strong network.<br>
                    Commitment, enthusiasm and passion for your field.<br>
                </p>
                <?php } else if($swot_type=='my-weeknesses'){?>
                <p>
                    Weaknesses are your internal negative attributes. You have some control over these as well. Examples include:
                </p>
                <p>
                    Negative personal characteristics and poor work habits. <br>
                    A lack of work experience or relevant experience.<br>
                    A lack of education.<br>
                    No network or a small one.<br>
                    A lack of career direction or focus.<br>
                    Weak professional or career-management skills.
                </p>
                <?php } else if($swot_type=='opportunities'){?>
                <p>Opportunities are uncontrollable external events that you can potentially leverage. Examples include:</p>
                <p>
                    Favourable industry trends.<br>
                    A booming economy.<br>
                    A specific job opening.<br>
                    An upcoming company project.<br>
                    Emerging demand for a new skill or expertise.<br>
                    Use of new technology.<br>
                    Referral to a high-powered contact.
                </p>
                <?php } else if($swot_type=='my-threats'){?>
                <p>Threats are uncontrollable external factors that may work against you and require you to take protective action. Examples include:</p>
                <p>
                    Industry restructuring and consolidation.<br>
                    Changing market requirements and their impact on your employer.<br>
                    Changing professional standards that you don't meet.<br>
                    Reduced demand for one of your skills.<br>
                    Evolving technologies you're unprepared for.<br>
                    The emergence of a competitor, either to your company or to you personally.<br>
                    A company decision maker who does not like or support you.<br>
                </p>
                <?php } ?>
                    <p>
                        <input type="submit" class="btn btn-success col-lg-12 col-xs-12">
                    </p>
                </div>
                
                <input type="hidden" name="swot_submit" value="1">
            </form>
        </div>
        <div class="row">
            <div class="col-lg-10 col-xs-12">
                

            </div>
        </div>
        
    </div>
</section>       
<div class="clearfix"></div>
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>