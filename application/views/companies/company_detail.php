<?php $this->load->view('include/header.php') ?>
<?php $session_user_id = $this->session->userdata('user_id');?>
<?php // echo "<pre>";print_r($result); ?>

<style type="text/css">
    .card{
        margin-bottom: 30px;
    }
  

  
  .col-md-2 button .fa-angle-right {
    margin-top: 0;
    font-size: 20px;
    vertical-align: bottom;
    margin-left: 4px;
    color: #fff;
  }
  .col-md-7 input{
    padding: .375rem 2.75rem;
  }


    .profile-list .skills a {
        background-color: #f1f1f1;
        border-radius: 5px;
        font-size: 16px;
        margin: 0 10px 10px 0;
        padding: 5px 20px;
        text-transform: uppercase;
    }
    
    .proimg{    
        border-radius: 8px !important;
        border: 2px solid #215374;
        display: block;
        width: 110px;
        height: 110px;
        float: left;
        margin-right: 20px;
        background-size: cover;
    }
    a{
        text-decoration: none;
        color: #000;
    }
    .picandinfo p{
        font-size: 13px;
    }
    .userinfo a{
        font-weight: bold;
        text-decoration: none;
        font-size: 13px;
    }
    .heading{
        font-weight: bold;
        font-size: 13px;
        border-bottom: 1px solid #ccc;
        margin-top: 0px;
        margin-bottom: 5px;
    }
    .detail{
        font-size: 13px;
        text-decoration: none;
    }

    .Heading-title-left h1
    {
      margin: 3% 0 5% 0;
    }
    .Heading-title-left h1::after {
        background-color: #242424;
        top: 100px;
        content: "";
        height: 1px;
        left: 0;
        margin: 0 auto;
        position: absolute;
        right: 0;
        width: 59px;
    }

    .Heading-title-left h1::before {
        background-color: #242424;
        top: 90px;
        content: "";
        height: 1px;
        left: 0;
        margin: 0 auto;
        position: absolute;
        right: 0;
        width: 99px;
     }
     
     @media screen and (max-width: 450px){
         .tabs_options a{
             max-width: 100%;
             display: block;
             margin-bottom: 9px;
         }
    }
    
    @media screen and (max-width: 400px){
        .tabs_options a{
            max-width: 100%;
            display: block;
            margin-bottom: 9px;
             
         }
    }
     

</style>
<div class="container">
    <h2 class="text-center mb-5"><?=$result[0]->co_name?> Details</h2>
    
    <div class="row">
       <div class="offset-1 col-lg-10">
            <div class="card">
               
                <?php if(isset($result[0]->co_logo)){ ?>
                <div class="text-center">
                    <img class="mt-3" src="<?= site_url($result[0]->co_logo)?>" alt="Card image cap" style="width: 170px;height: 130px;">
                </div>
                

                <?php } ?>
                <div class="card-body">
                  <h3 class="card-title text-center mb-5"><?=$result[0]->co_name?></h3>
                  <div class="row">
                      <div class="col-md-6">
                          <label><strong>Category:</strong></label>
                          <?php $co_cat = GetCategoryName($result[0]->co_cat_id) ?>
                          <?=$co_cat?>
                      </div>
                      <div class="col-md-6">
                          <label><strong>Address:</strong></label>
                          <?=$result[0]->co_address?>
                      </div>
                      <div class="col-md-6">
                          <label><strong>Phone:</strong></label>
                          <?=$result[0]->co_phone?>
                      </div>
                      <div class="col-md-6">
                          <label><strong>Mobile:</strong></label>
                          <?=$result[0]->co_mobile?>
                      </div>
                      <div class="col-md-6">
                          <label><strong>Fax:</strong></label>
                          <?=$result[0]->co_fax?>
                      </div>
                      <div class="col-md-6">
                          <label><strong>City:</strong></label>
                          <?=$result[0]->city?>
                      </div>
                      <div class="col-md-6">
                          <label><strong>Email:</strong></label>
                          <?=$result[0]->co_email?>
                      </div>
                      <div class="col-md-6">
                          <label><strong>Website:</strong></label>
                          <?=$result[0]->co_website?>
                      </div>
                      <div class="col-md-6">
                          <label><strong>Career Page:</strong></label>
                          <?=$result[0]->co_career_page?>
                      </div>
                      <div class="col-md-6">
                          <label><strong>Added By:</strong></label>
                          <?php if(isset($result[0]->user_id) && intval($result[0]->user_id) > 0){
                                $user = GetUserName($result[0]->user_id);echo $user[0]->m_name;
                                }
                            ?>
                      </div>
                      <?php if(in_array($session_user_id, CvReviewTeamList1())){?>
                      <div class="col-md-6">
                          <label><strong>Admin Remarks:</strong></label>
                          <?=$result[0]->admin_remarks?>
                      </div>
                      <?php }?>                      
                        <!--<div class="col-md-12 col-xs-12 p-lg-1 mt-3">
                        <?php // $url = urlencode(site_url($page_meta['og_url']));?>
                        <div class="text-center">
                            <a href="http://www.facebook.com/sharer.php?u=<?=$url?>" target="_blank" title="Facebook Share"><img src="<?=site_url('nassets/img/social-imgs/fb.png')?>" style="height:40px;width: 40px"></a>
                            <a href="http://www.facebook.com/sharer.php?u=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/insta.png')?>" style="height:70px;width: 80px"></a>
                            <a href="http://twitter.com/share?text=<?=$page_meta['title']?>&url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/tw.png')?>" style="height:40px;width: 40px" href></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/in.png')?>" style="height:40px;width: 40px"></a>
                            <a href="https://plus.google.com/share?url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/gg.png')?>" style="height:40px;width: 40px"></a>
                            <a href="https://www.youtube.com/channel/UCekQrDwBfQ6z6QnwSlbNDqA?sub_confirmation=1" target="_blank" rel="nofollow" class="text-center">
                                <img src="<?=site_url('nassets/img/social-imgs/youtube-subscribe.png');?>" class="img-fluid" style="height: 40px;" />
                            </a>
                        </div>
                      </div>-->
                  </div>
                  <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div> 
    </div>
    <?php if(in_array($session_user_id, CvReviewTeamList())){?>
    <div class="float-left">
        <a href="<?=site_url('companies/edit/'.$result[0]->co_id)?>" class="btn btn-outline-success mb-2" style="margin-left:6rem;">Edit Company</a>
    </div>
    <div class="float-right">
        <a href="<?=site_url('companies/delete_company/'.$result[0]->co_id)?>" class="btn btn-outline-danger mb-2" style="margin-right:6rem;" onclick="return confirm('Are you sure want to delete this company?')">Delete Company</a>
    </div>
    <?php } ?>
    
    
    
    
    <?php 
    
    if(isset($result[0]->user_id) && intval($result[0]->user_id) > 0){
        $user = GetUserName($result[0]->user_id);
    }
    
    ?>
    <?php if(isset($user[0]->m_id) && intval($user[0]->m_id) > 0) {?>
    <div class="col-md-12 mx-auto mt-5"><h2 class="text-center">Company Details Added By</h2></div>
    <div class="usercard">
    <div class="row mx-auto">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <div class="clearfix"></div>
            <div class="offset-md-4 col-md-5 col-sm-5 col-xs-12">
                <style>
                    .usercard{
                        margin-top:87px ​!important;
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
                <?php $member_img  = !empty($user[0]->m_avatar) ? $user[0]->m_avatar:'default.png'; ?>
                <div class="cardstyle1">
                    <div class="picandinfo">
                        <div class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');"></div>
                        <div class="userinfo">
                            <a href="#" class="namedesig">
                                <?= isset($user[0]->m_name) ? $user[0]->m_name : ''?>
                            </a>
                            <p>
                                <?= isset($user[0]->m_profession) ? $user[0]->m_profession : '' ?> <br>
                                <?=  isset($user[0]->m_current_city) ? ucwords($user[0]->m_current_city) : '';?>
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
                                $str_arr = explode(",",$user[0]->m_skills);			  
                                if($str_arr){?>              
                                <?php for($a= 0; $a< sizeof($str_arr); $a++){
                                    if($a>6 )
                                        break;
                                    ?>
                                <!--<a href="#"> <?= $str_arr[$a];?> , </a>-->
                                <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?=$str_arr[$a]?></span>
                                <?php                                                 
                                } }  ?>
                            </div>
                            <div class="heading">Academic Qualification:</div>
                            <div class="detail">
                                <?php
                                $qry= "select * from jb_member_education where me_member_id = '".$user[0]->m_id."' order by me_year desc limit 0,1 ";
                                $edu_results = $this->db->query($qry)->result();                                                
                                if($edu_results)
                                {
                                foreach($edu_results as $edu_result){?> 
                                <?=$edu_result->me_descr?>                                                
                                <?php break;} }?> 
                            </div>
                            <?php if(intval($session_user_id) > 0 && isset($session_user_id)){ 
                                    if(in_array($session_user_id, MentorsAndRecruiters())) {?>
                            <div class="heading">Mobile Number:</div>
                            <div class="detail">
                                <?= isset($user[0]->m_phone) ? : '' ;?>
                            </div>
                            <?php }  } ?>
                            <div class="heading">Email:</div>
                            <div class="detail">
                                <?= isset($user[0]->m_email) ? $user[0]->m_email : '' ?>
                            </div>
                            <div class="heading">Profile Link:</div>
                            <div class="detail">
                                <a href="<?=site_url('profile/'.$user[0]->m_id);?>"><?=site_url('profile/'.$user[0]->m_id);?></a>
                            </div>
                            <div class="heading">Profession Category:</div>
                            <div class="detail">
                                <?=GetCategoryName(intval($user[0]->m_category));?>
                            </div>
                            <div class="heading">Resume:</div>
                            <div class="detail">
                                <?php
                                $get_review_status = CVreviewStatusByUser($user[0]->m_id);
                                $review_status = isset($get_review_status->review_status) ? $get_review_status->review_status:'';
                                if($review_status=='review_done'){?>
                                Resume <img src="<?=site_url('assets/frontend/images/cvreview-approved.png');?>" width="18" style="vertical-align: top" />
                                <?php
                                }  
                                ?>
                            </div>                            
                        </div>
                    </div>                                
                </div>
            </div>
            
        </div>
    </div>
</div>
  <?php  } ?>
    
    
    <!--</div>-->
    <div class="row" id="loadData">
<?php    
if(!empty($members_by_company)) { ?>
   <div class="col-md-12 mx-auto mt-5"><h2 class="text-center">See All(<?=count($members_by_company)?>) Employees on Navafiz</h2></div>
   
<?php    foreach($members_by_company as $member){ 
    $get_user = GetUserDetails($member->user_id);
//    print_r($get_user);exit();
    ?>
<?php $member_img  = !empty($get_user->m_avatar) ? $get_user->m_avatar:'default.png'; ?>

<div class="col-md-4 col-xs-4">
    <div class="card">
        <div class="card-body">
            <div class="picandinfo">
                <a href="<?=site_url('profile/'.$get_user->m_id);?>" class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');">
                    <!--User Profile Picture-->
                </a>                
                <div class="userinfo">                            
                    <a href="<?=site_url('profile/'.$get_user->m_id);?>"><h5><?=$get_user->m_name?></h5></a>
                    <p>
                       <?=substr($get_user->m_profession,0,50)?> <br />
                       <?=$get_user->m_current_city?> <br />
                        Last Login: <?php echo DateTimeFormat($get_user->last_login_date); ?>						
                       <br />
                       <!--Mentor: <b><?=$get_user->mentor_id>0 ? BasicInfoUser($get_user->mentor_id)->m_name:' Not Assigend ';?></b>-->
                    </p>                                        
                </div>
                <div class="clearfix"></div>
                <div class="media-body">                         
                        <div class="heading">
                             Profession:
                        </div>
                        <div class="detail">
                            <?=$get_user->m_profession?>
                        </div>
                        <div class="heading">
                             Skills:
                        </div>
                        <div class="detail">
                            <?php $words = $get_user->m_skills; $str_words = explode (",", $words);?>
                            <?php foreach($str_words as $skill){ ?>
                              <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?=$skill?></span>
                            <?php } ?>
                        </div>
                    
                    <?php 
                    $user_cert = GetAllCert($get_user->m_id); 
                 
                    
                    ?>
                    <?php if(!empty($user_cert)){ ?>
                        <div class="heading">
                             Certification:
                        </div>
                    <?php foreach($user_cert as $cert){?>
                        <div class="detail">
                            <?=$cert->c_title;?>
                        </div>
                    <?php } ?>
                    <?php
                    } 
                    ?>
                        <div class="heading">Home Town:</div>
                        <div class="detail">
                            <?=$get_user->m_city;?>
                        </div>
                        <div class="heading">Employer:</div>
                        <div class="detail">
                            <?=$get_user->m_employer?>
                        </div>
                        <div class="heading">Employment Status:</div>
                        <div class="detail">
                            <?=$get_user->employment_status?>
                        </div>
                        <div class="heading">Visa Status:</div>
                        <div class="detail">
                            <?=$get_user->visa_status?>
                        </div>
                        <?php if(in_array($session_user_id, CvReviewTeamList())){?>
<!--                        <div class="heading">Email</div>
                        <div class="detail">
                            <?=$get_user->m_email?>
                        </div>-->
                        <div class="heading">Registered On:</div>
                        <div class="detail">
                            <?php echo DateTimeFormat($get_user->added_on);?>                            
                        </div>
                        <?php }?>
                </div>                            
            </div>
        </div>
    </div>    
</div>  
<?php } }?>
   </div>
</div>




<?php $this->load->view('include/footer.php') ?>