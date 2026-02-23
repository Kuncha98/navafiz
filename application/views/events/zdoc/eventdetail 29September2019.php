<?php 
$this->load->view('include/header');
$session_user_id = $this->session->userdata('user_id');
?>
<style type="text/css">
    #share-buttons img {
        width: 35px;
        padding: 5px;
        border: 0;
        box-shadow: 0;
        display: inline;
    }
    
    .cardstyle1{
        border: solid 1px #cdcdcd;
        background-color: #fcfcfc;
        border-radius: 7px;
        font-size: 13px;
    }
    .cardstyle1 .picandinfo{
        padding: 20px;
        font-size: 13px;
    }
    .cardstyle1 .picandinfo .proimg{    
        border-radius: 8px !important;
        border: 2px solid #215374;
        display: block;
        width: 110px;
        height: 110px;
        float: left;
        margin-right: 20px;
        background-size: cover;
    }
    .cardstyle1 a{
        text-decoration: none;
        color: #000;
    }
    .cardstyle1 .picandinfo p{
        font-size: 13px;
    }
    .cardstyle1 .picandinfo .userinfo a{
        font-weight: bold;
        text-decoration: none;
        font-size: 13px;
    }
    .heading{
        font-weight: bold;
        font-size: 13px;
        border-bottom: 1px solid #ccc;
        margin-top: 20px;
        margin-bottom: 5px;
    }
    .detail{
        font-size: 13px;
        text-decoration: none;
    }
</style>
<div class="container">      
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <img class="img-fluid" src="<?=site_url('public-assets/events/'.$event->event_picture);?>" alt="">
        </div>
        <div class="col-md-6 col-xs-6">
            <h3> <strong> <?=$event->title?></strong> </h3>
            <p>
                Event date: </strong> <?=date("d F Y",  strtotime($event->event_date));?>
            </p>
            <p>
                <?=$event->description?>
            </p>
            <p>
                <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                    <a href="<?=site_url('event/delete/'.$event->e_id)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                <?php }?>
            </p>
            <h2>Location</h2>
            <p>
                <a class="btn btn-success" href="<?=$event->location?>" target="_blank">Click here for location</a>
            </p>
            <p>
                <a href="<?=site_url('event-join/'.$event->e_id);?>">
                    <button type="button" class="btn btn-primary col-sm-12 col-xs-12 pull-right">
                        Free Register  
                        <small>some seats are left (<?=count($event_subscribers);?>) are interested</small>
                    </button>
                </a>            
            </p>            
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Participants (<?=count($event_subscribers);?>) </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="row">      
      <?php foreach ($event_subscribers as $pro_details){?>
          <?php $member_img  = !empty($pro_details->m_avatar) ? $pro_details->m_avatar:'default.png'; ?>
          <div class="col-md-4 col-xs-12">
              <div class="cardstyle1">
                  <div class="picandinfo">
                      <div class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');"></div>
                      <div class="userinfo">
                          <a href="#" class="namedesig">
                              <?=$pro_details->m_name?>
                          </a>
                          <p>
                              <?=$pro_details->m_profession?> <br>
                              <?=  ucwords($pro_details->m_current_city);?>
                          </p>
                          <p class="ratings"> </p>
                      </div>
                      <div class="clearfix"></div>
                      <div class="media-body"> 
                          <div class="heading">
                               Skills:
                          </div>
                          <div class="detail">
                              <?php
                              $str_arr = explode(",",$pro_details->m_skills);			  
                              if($str_arr){?>              
                              <?php for($a= 0; $a< sizeof($str_arr); $a++){
                                  if($a>6 )
                                      break;
                                  ?>
                              <a href="#"> <?= $str_arr[$a];?> , </a>
                              <?php                                                 
                              } }  ?>
                          </div>
                          <div class="heading">Qualification:</div>
                          <div class="detail">
                              <?php
                              $qry= "select * from jb_member_education where me_member_id = '".$pro_details->m_id."' order by me_year desc limit 0,1 ";
                              $edu_results = $this->db->query($qry)->result();                                                
                              if($edu_results)
                              {
                              foreach($edu_results as $edu_result){?> 
                              <?=$edu_result->me_descr?>                                                
                              <?php break;} }?> 
                          </div>
                          <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                          <div class="heading">Mobile Number:</div>
                          <div class="detail">
                              <?=$pro_details->m_phone;?>
                          </div>
                          <?php }?>
                          <div class="heading">Email:</div>
                          <div class="detail">
                              <?=$pro_details->m_email?>
                          </div>
                          <div class="heading">Profile Link:</div>
                          <div class="detail">
                              <a href="<?=site_url('profile/'.$pro_details->m_id);?>"><?=site_url('profile/'.$pro_details->m_id);?></a>
                          </div>
                          <div class="heading">Profession Category:</div>
                          <div class="detail">
                              <?=GetCategoryName(intval($pro_details->m_category));?>
                          </div>                      
                      </div>
                  </div>                                
              </div>
          </div>
      <?php }?>
    </div>    
    <div class="row">
        <div class="fb-comments" data-href="<?=base_url()?>event/<?=$event->e_id?>" data-numposts="5"></div>
    </div>
</div>    
<?php $this->load->view('include/footer'); ?>