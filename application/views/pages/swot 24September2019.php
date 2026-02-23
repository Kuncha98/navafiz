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
            <h3>SWOT</h3>
            <p>
                A SWOT matrix is a framework for analyzing your strengths and weaknesses as well as the opportunities and threats that you face. This helps you focus on your strengths, minimize your weaknesses, and take the greatest possible advantage of opportunities available to you.
            </p>
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
        <div style="border-top: 5px solid #666;margin-bottom: 20px;"></div>
        <div class="row-fluid">
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="javascript:void(0);" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Mindset</div>
                        <!--<div class="status">  </div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Attitude</div>
                        <!--<div class="status">Area of Development</div>-->
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info"> Focus</div>
                        <!--<div class="status">21 December 2018</div>-->
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Gratitude</div>
                        <!--<div class="status">Coming Soon</div>-->
                    </a>
                </div>
                
            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div style="border-top: 5px solid #666;margin-bottom: 20px;"></div>
        <div class="row-fluid">
            <h3>Tips to #Connect with People.</h3>
            <ul style="font-size: 18px;line-height: 36px;s">
                <li>1- Smile and make eye contact. ...</li>
                <li>2- Use the person's name. ...</li>
                <li>3- Have open body language. ...</li>
                <li>4- Don't underestimate the value of good small talk. ...</li>
                <li>5- Make the person feel special as soon as you can. ...</li>
                <li>6- Ask questions. ...</li>
                <li>7- Keep things positive. ...</li>
                <li>8- Show that you've been listening.</li>                
            </ul>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div style="border-top: 3px solid #666;margin-bottom: 20px;"></div>
        <div class="row-fluid">
            <h3>Unwritten Social Rules.</h3>
            <ul style="font-size: 18px;line-height: 36px;s">
                <li>1- When you call someone two times in a row and they’re not picking up, stop blowing their phone.</li>
                <li>2- Cover your mouth when you Yawn, cough or sneeze.</li>
                <li>3- Give your roommate a heads up if you are bringing someone home with you.</li>
                <li>4- Mind your own business unless anything involves you directly.</li>
                <li>5- Don’t kiss someone if you have bad breath.</li>
                <li>6- Always try to be ten minutes early to every appointment or date.</li>
                <li>7- Reached office? Greet everyone.</li>
                <li>8- Don't jump in between of two people conversation.</li>                
                <li>9- Ask before taking photographs of anyone.</li>                
                <li>10 - Talk good and when required.</li>                
                <li>11- Say Thank you.</li>                
            </ul>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div style="border-top: 3px solid #666;margin-bottom: 20px;"></div>
        <div class="row-fluid">
            <h3>Some More Unwritten Social Rules.</h3>
            <ul style="font-size: 18px;line-height: 36px;s">
                <li>1. Don’t force people to share their secrets with you.</li>
                <li>2. The right side of the escalator is for standing, the left side is for walking.</li>
                <li>3. If a person asks mobile number of someone else, then take permission before sharing.</li>
                <li>4. Never ask anyone their salary, eye sight number, Age.</li>
                <li>5. If someone is not picking up your call or replying your message. Then wait for some time, they will catch you back when they become free, don’t make too many calls/texts.</li>
                <li>6. Don’t give advice, unless asked.</li>
                <li>7. Don’t yawn or use mobiles while in Navafiz Training Session or presentation.</li>
                <li>8. If someone is sharing their pain/problems with you, then don’t start telling yours.</li>
                <li>9. Don’t do personal talks with a person when you are sitting in a group. Try to do a conversation in which everyone can participate.</li>
                <li>10. Respect different political opinions.</li>
                <li>11.Don't be a lawyer for someone until unless you are assigned by him/her.</li>
                <li>12. Don't share classified (Sale, Purchase ) posts in Groups, until unless relevant to group subject.</li>
                <li>13. If you are part of a Team, Don't play roles, which are not assigned to you, without taking the Core/key members permissions.</li>
            </ul>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div style="border-top: 3px solid #666;margin-bottom: 20px;"></div>
        <div class="row-fluid">
            <h3>The signs of a toxic person include these and many more…</h3>
            <ul style="font-size: 18px;line-height: 36px;s">
                <li>1. You gossip a lot. Always saying negative about others.</li>
                <li>2. You compare yourself to others so much.</li>
                <li>3. You see people as a threat to your success.</li>
                <li>4. You feel bad when others are praised.</li>
                <li>5. You hardly mind your own business.</li>
                <li>6. You misuse their position or cast or creed or religious attire.</li>
                <li>7. You start judging people very quickly</li>
                <li>8. You don't like new ideas and like your own minds' status quo as the best for the whole world.</li>                
            </ul>
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