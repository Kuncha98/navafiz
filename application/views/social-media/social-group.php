<?php $this->load->view('include/header');?>
<?php 
    $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id'); 
    $session_user_id = $user_id;
?>    
<style>
    .colborder{
        border: solid 1px #ccc;
        padding-top: 20px;
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
<div class="container-mid">
    <div class="row">
        <div class="col-md-12">
            <h3>WhatsApp <?=$group_info->group_name;?> Group</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-xs-12 colborder">
            <p>
                New members are Welcome in the group.  
                <br />
                The purpose of this group is to
                <br />
                <b>- know each other </b>
                <br />
                <b>- help each other </b>
                <br />
                <b>- Share Jobs (with each other).</b>
                <br />
                <b>- Share Links from Navafiz and Other Job sites & groups.</b>
                <br />
                <b>- Share Technical info.</b>
                <br />
                As an ice breaker, share the snapshot of <a href="<?=site_url('mycard/'.$user_id)?>">your Card</a>, as shown on Navafiz website. 
                <br />
                Also share the link of your Navafiz profile. 
                <br />
                Avoid irrelevant discussions or posts. 
                <br />
                Please follow group rules & help each other. 
                <br />
                Regards,
                <br />
                <b>Navafiz Admin</b>
            </p>
        </div>
        <div class="col-md-4 col-xs-12 colborder">
            <p>
                <b>Navafiz Recommendations 1 </b>
                <br />
                <br />
                Your first professional message to Recruiters, HR, volunteers or Navafiz, should be complete, concise, clear and relevant. 
                <br />
                You should provide your proper & short introduction.
                <br />
                <br />

                <b>Your Name</b>
                <br />
                <b>Profession</b>
                <br />
                <b>And current Location</b>
                <br />
                <br />

                (It's better if you use your <a href="<?=site_url('mycard/'.$user_id)?>">job search card</a>.)
                <br />
                <br />

                Clearly specify the purpose of contacting. 
                <br />

                Regards,
                <br />

                <br />
                <b>Navafiz Admin</b>
            </p>
        </div>
        <div class="col-md-4 col-xs-12 colborder">
            <p>
                <b>Navafiz Recommendations 2 </b>
                <br />
                <br />
                Your WhatsApp number has an impact. It is also one of your identity, related to your <b>Location</b>.
                <br />
                <br />
                If you are in UAE, <b>do you want people to misunderstand that you are not in UAE? </b>.
                <br />
                <br />
                Job seekers in UAE should use local WhatsApp number for job search.
                <br />
                <br />
                #Accessibility
                <br />
                #Location Status 
                <br />

                Regards,
                <br />

                <br />
                <b>Navafiz Admin</b>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center" style="padding: 50px 0;">            
            <a href="<?=site_url('join-social-group/'.$group_info->social_group_id)?>">
                <button type="button" class="btn btn-success offset-1 col-sm-6 col-xs-12">Join Group</button>
            </a>            
        </div>
    </div>    
    <div class="row" style="margin-top: 30px;padding-top: 40px;">
        <h3>Group Members (<?=count($group_subscribers);?>)</h3>
        <?php
        foreach($group_subscribers as $subscriber){
           $pro_details =  UserInfo($subscriber->user_id);
        ?>
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

        <?php } ?>                        
</div>    
</div>
<?php $this->load->view('include/footer'); ?>
