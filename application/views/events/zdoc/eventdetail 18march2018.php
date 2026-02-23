<?php $this->load->view('header.php');
$user_id = $this->session->userdata('user_id');
?>
<style type="text/css">
#share-buttons img {
	width: 35px;
	padding: 5px;
	border: 0;
	box-shadow: 0;
	display: inline;
}
</style>

<!--<pre><?php //  print_r($job);?></pre>-->
<body class="corporate">
<!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55d833f04de01283" async="async"></script>-->
<!--<div id="fb-root"></div>-->
<!--<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=125784917765132";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->
<?php // $this->load->view('pagetop.php'); ?>
<div class="main">
  <div class="container">
      <div class="row">
        <a href="<?=base_url();?>">
          <img src="<?=base_url()?>assets/frontend/images/logo.png" alt="logo" class="">
        </a>
      </div>
      <div class="row">
      <div class="col-md-7 col-sm-7" style="margin-top: 40px;">
        <div class="row mix-grid">        
          <div class="col-md-8 col-sm-8 mix category_1">
            <div class="mix-inner"> 
                <img class="img-responsive" src="<?=site_url('public-assets/events/'.$event->event_picture);?>" alt="">
            </div>
          </div>          
        </div>
        <h3> <strong> <?=$event->title?></strong> </h3>
        <div id="loadingsignup" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> </div>
        <div class="row front-lists-v1">
          <div class="col-md-6">
            <ul class="list-unstyled margin-bottom-20">
              <li><i class="fa fa-clock-o"></i><strong>Event date: </strong>
                <?=date("d F Y",  strtotime($event->event_date));?>
              </li>               
            </ul>
          </div>           
        </div>
        <p>
          <?=$event->description?>
        </p>
        
      </div>
    </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="<?=site_url('event-join/'.$event->e_id);?>">
                <button type="button" class="btn btn-default col-sm-12 col-xs-12 pull-right">Join Event <i class="fa fa-angle-right"></i></button>
            </a>            
        </div>
      </div>
      <div class="row">
        <h3 style="padding-left: 20px;">Participants (<?=count($event_subscribers);?>) </h3>
        <?php foreach ($event_subscribers as $subscriber){?>
            <div class="col-md-4 col-sm-6 col-xs-12"> 
                <div class="company-list-box" style="background-color: #D5D6ED;border-radius: 7px;">
                    <span class="company-list-img">
                        <a href="<?=site_url('professional/'.$subscriber->m_id);?>">
                            <?php $member_img  = !empty($subscriber->m_avatar) ? $subscriber->m_avatar:'default.png'; ?>
                            <img src="<?=base_url('assets/uploads/members/'.$member_img)?>" class="img-responsive" style="border-radius: 14px !important;border: 2px solid #215374;">
                        </a>                    
                    </span>
                    <div class="company-list-box-detail">
                        <h5> 
                            <a href="<?=site_url('professional/'.$subscriber->m_id);?>">
                                <?=$subscriber->m_name?>
                            </a>                        
                        </h5>
                        <p> <?=$subscriber->m_profession?> </p>
                        <div class="ratings"> <?=$subscriber->m_current_city?></div>
                        <div class="media-body"> 
                            <div>
                                <small> <strong> Skills:</strong> 
                                    <?php
                                    $str_arr = explode(",",$subscriber->m_skills);			  
                                    if($str_arr){?>              
                                    <?php for($a= 0; $a< sizeof($str_arr); $a++){
                                        if($a>6 )
                                            break;
                                        ?>
                                    <a href="#"> <?= $str_arr[$a];?> , </a>
                                    <?php                                                 
                                    } }  ?>
                                </small>
                            </div>
                            <div>
                                <small> <strong> Qualification:</strong> 
                                    <?php
                                    $qry= "select * from jb_member_education where me_member_id = '".$subscriber->m_id."' order by me_year desc limit 0,1 ";
                                    $rs = mysql_query($qry);
                                    if(mysql_num_rows($rs)>0)
                                    {
                                    while($row = mysql_fetch_array($rs)){  ?>
                                    <?=$row['me_descr']?> - <?=date('M Y', strtotime($row['me_year']));?>
                                    <?php break;} }?> 
                                </small>
                            </div>

                            <div>
                                <small><strong>Mobile Number:</strong>
                                  <?=$subscriber->m_phone;?>

                                </small>
                            </div>
                            <div>
                                <small>
                                    <strong>Email:</strong>
                                    <?=$subscriber->m_email?>
                                </small>
                            </div>
                            <div>
                                <a href="<?=site_url('profile/'.$event->e_id);?>"><?=site_url('profile/'.$event->e_id);?></a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>                      
            </div>    
        <?php }?>
    </div>
    <div class="row">
        <h2>Location</h2>
        <?php if($event->e_id==24){?>
        <p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3605.6054666503774!2d55.39648331441105!3d25.35101683166509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5bd460bcd1ff%3A0x167b9a99b15bb897!2sPakistan+Social+Centre!5e0!3m2!1sen!2sae!4v1549993930678" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </p>
        <?php }?>
        <?php if($event->e_id==23){?>
        <p>
            -<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3630.843165086157!2d54.36960511499562!3d24.490890384229527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e67443978101b%3A0xd18834adc44ecbf5!2sAl+Manal+Training+Center!5e0!3m2!1sen!2sae!4v1551377512222" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </p>
        <?php }?>
    </div>
    <div class="fb-comments" data-href="<?=base_url()?>event/<?=$event->e_id?>" data-numposts="5"></div>
  </div>    
</div>
<?php $this->load->view('footerbottom.php'); ?>
</body>
</html>