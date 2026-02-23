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
            <h3> Job Seekers Support System </h3>
            <p>
                what is your job search strategy? ,
            </p>
            <p>
                Now a day’s people usually search jobs online, via different websites, they use social media, LinkedIn, personal references, and so on …. …..
            </p>
            <p>
                Maybe you are also trying with some similar methods …… But if you are still not getting result then you might not be trying the right way ….. Or not in an organized way ……
            </p>
            <p>
                Here in Navafiz ….. We have developed a System ….. A System to take you on board …… A step by step process to find the hidden job ……. Let’s knock the every door ….. And open every window ….
            </p>
            
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-brown">
                    <a data-original-title="" href="<?=site_url('swot');?>">
                        <!--<i class="icon-remove-sign"></i>-->
                        <div class="info">MY SWOT</div>
                        <div class="status">Self Assessment</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-grey">
                    <a data-original-title="" href="<?=site_url('cvreview');?>">
                        <!--<i class="icon-external-link"></i>-->
                        <div class="info">Resume</div>
                        <div class="status">Step-2:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('page/top-job-portals');?>">
                        <!--<i class="icon-eye-open"></i>-->
                        <div class="info">Job Portals</div>
                        <div class="status">Step-3:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="<?=site_url('page/recruitment-companies');?>">
                        <!--<i class="icon-bar-chart"></i>-->
                        <div class="info">Recruiters</div>
                        <div class="status">Step-4:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="<?=site_url('companies');?>">
                        <!--<i class="icon-ribbon"></i>-->
                        <div class="info"> Companies</div>
                        <div class="status">Step-5:</div>
                    </a>
                </div>
            </div>
            <div class="metro-nav">



                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('social-media');?>">
                        <!--<i class="icon-tasks"></i>-->
                        <div class="info"> Social Media</div>
                        <div class="status">Step-6: WhatsApp Groups</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url($user_id >0 ? 'mycard/'.$user_id :'login');?>">
                        <!--<i class="icon-envelope"></i>-->
                        <div class="info">Door to Door</div>
                        <div class="status">Step-7:</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-orange">
                    <a data-original-title="" href="<?=site_url('professionals');?>">
                        <!--<i class="icon-user"></i>-->
                        <div class="info"> References</div>
                        <div class="status">Step-8:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href='<?=site_url('professionals');?>'>
                        <!--<i class="icon-tags"></i>-->
                        <div class="info">Synergy</div>
                        <div class="status">Step-9:</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('event-in-uae');?>">
                        <!--<i class="icon-comsments-alt"></i>-->
                        <div class="info"> Meet Experts</div>
                        <div class="status">Step-10:</div>
                    </a>
                </div>
            </div>
            <div class="space10"></div>
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