<?php $this->load->view('include/header');
$user_id = $this->session->userdata('user_id');
?>
<style>
.cardstyle1{
        border: solid 1px #cdcdcd;
        background-color: #fcfcfc;
        border-radius: 7px;
        font-size: 13px;
        margin-bottom: 20px;
        position: relative;
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
    .mentorname{
        position: absolute;
        right: 15px;
        top: 15px;
    }
</style>
<div class="container-mid">
    <div class="row">
        <div class="col-12">
            <h4>Candidates Assigned  to (<?= BasicInfoUser($user_by)->m_name?> - (<?=count($users_uder_mentors)?>)</h4>
        </div>
    </div>
        <div class="row">
        <?php foreach ($users_uder_mentors as $pro_details){?>        
            <div class="col-md-4">
                <?php 
                $member_img  = !empty($pro_details->m_avatar) ? $pro_details->m_avatar:'default.png'; ?>
                <div class="cardstyle1" id="html-content-holder" style="border: solid 1px #cdcdcd;background-color: #fcfcfc;border-radius: 7px;font-size: 13px;">
                    <?php if($pro_details->dismissed_by>0){?>
                    <button class="btn btn-danger mentorname">Dismissed</button>
                    <?php }?>
                    <div class="picandinfo">
                        <a href="<?=site_url('profile/'.$pro_details->m_id);?>">
                            <div class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');"></div>
                        </a>                    
                        <div class="userinfo">
                            <a href="<?=site_url('profile/'.$pro_details->m_id);?>" class="namedesig">
                                <?=$pro_details->m_name?>
                            </a>
                            <p>
                                <?=$pro_details->m_profession?> <br>
                                <?=  ucwords($pro_details->m_current_city);?>
                            </p>
                            <p>
                                <b>Recommandations: </b> <?=UserRecommandations($pro_details->m_id)?>
                            </p>
                            <p style="font-size: 12px;">
                                Last Login: <b style="color: #215374;"><?=DateTimeFormat($pro_details->last_login_date);?></b>  
                            </p>
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
                        </div>
                    </div>                
                    <?php if(in_array($user_id, CvReviewTeamList())){?>
                    <div class="card">                
                        <div class="card-header"><b>Admin Comments</b></div>
                        <div class="card-body">
                            <form action="<?=site_url('track_steps/PostAdminComment/'.$pro_details->m_id);?>" method="post">                        
                                <textarea name="trackingsheet_admin_comments" class="form-control" rows="7"><?=$pro_details->trackingsheet_admin_comments;?></textarea>
                                <input type="submit" class="btn btn-info mt-2" value=" Save " />
                                <input type="hidden" class="btn btn-info mt-2" name="redirect_url" value="mentors/usersby/<?=$user_by?>" />
                            </form>                    
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>        
        <?php }?>
        </div>
    
    
        <?php if(!empty($recommended)){?>             
        <div class="row">        
            <div class="card profile col-12" id="shortlistedCan">
                <div class="card-header" style="background: #0056b3;color: #fff;"><h3>Recommended Candidates (<?=count($recommended)?>)</h3></div>
                <div class="card-body">
                    <ul class="">
                         <div class="row">
                            <?php foreach($recommended as $list){
                                  $user = GetUserDetails($list->user_id);
                                  if($user->m_avatar != ''){
                                      $img =  site_url('assets/uploads/members/'.$user->m_avatar);
    //                                      echo $img;
    //                                      exit();
                                  }else{
                                      $img =  site_url('assets/uploads/members/default.png');
    //                                      echo $img;
    //                                      exit();
                                  }
    //                                  print_r($user->m_avatar);
    //                                  exit();
                                ?>
                             <div class="col-md-3 col-xs-12 mb-4">
                                 <?php // echo $user->m_avatar;?>
                                 <div class="col-3" style="padding-left: 0;">
                                     <img class="avatarpro img-fluid rounded-circle mb-3" src="<?=$img?>" >                                                      
    <!--                                    Profile
                                    </div>-->
                                </div>
                                  <div class="col-9" style="padding-left: 0;position: relative;">                            
                                    <a class="member_name" href="<?=site_url('profile/'.$list->user_id);?>"> <strong><?=$user->m_name?></strong> </a> <br />
                                    <?=$user->m_profession?><br />
                                    <?=$user->m_current_city?><br />

                                    <?php if(isset($list->mentor) && !empty($list->mentor)){?>
                                    <b>Mentor:</b> <?=$list->mentor;?>
                                    <?php }?>  

                                    <input type="hidden" name="short_id" id="short_id" value="<?php echo $list->user_id; ?>">
                                    <?php // echo $list->user_id; exit();?>
                                </div>
                             </div>
                            <?php } ?>
                         </div>
                    </ul>     
                </div>
            </div>                        
        </div>                        
        <?php } ?>         
        <?php if(!empty($shortlisted)){?>             
        <div class="row">
            <div class="card profile col-12" id="shortlistedCan">
                <div class="card-header" style="background: #0056b3;color: #fff;"><h3>Shortlisted Candidates (<?=count($shortlisted)?>)</h3></div>            
                <div class="card-body">
                    <ul class="">
                         <div class="row">
                            <?php foreach($shortlisted as $list){
                                  $user = GetUserDetails($list->user_id);
                                  if($user->m_avatar != ''){
                                      $img = site_url('assets/uploads/members/'.$user->m_avatar);
                                  }else{
                                      $img = site_url('assets/uploads/members/default.png');
                                  }
    //                                  print_r($user->m_avatar);
    //                                  exit();
                                ?>
                             <div class="col-md-3 col-xs-12 mb-4">
                                 <?php // echo $user->m_avatar;?>
                                 <div class="col-3" style="padding-left: 0;">
                                     <img class="avatarpro rounded-circle img-fluid mb-3" src="<?=$img?>" >                                                      
    <!--                                    Profile
                                    </div>-->
                                </div>
                                  <div class="col-9" style="padding-left: 0;position: relative;">                            
                                    <a class="member_name" href="<?=site_url('profile/'.$list->user_id);?>"> <strong><?=$user->m_name?></strong> </a> <br />
                                    <?=$user->m_profession?><br />
                                    <?=$user->m_current_city?><br />

                                    <?php if(isset($list->mentor) && !empty($list->mentor)){?>
                                    <b>Mentor:</b> <?=$list->mentor;?>
                                    <?php }?>  

                                    <input type="hidden" name="short_id" id="short_id" value="<?php echo $list->user_id; ?>">
                                    <?php // echo $list->user_id; exit();?>
                                </div>
                             </div>
                            <?php } ?>
                         </div>
                    </ul>     
                </div>
            </div>
        </div>
        <?php } ?> 
        <hr>
        <?php if(!empty($mark_interview)){?>             
        <div class="row">
            <div class="card profile col-12" id="shortlistedCan">
                <div class="card-header" style="background: #0056b3;color: #fff;"><h3>Marked Interview Candidates (<?=count($mark_interview)?>)</h3></div>                        
                <div class="card-body">
                    <ul class="">
                         <div class="row">
                            <?php foreach($mark_interview as $list){
                                  $user = GetUserDetails($list->user_id);
                                  if($user->m_avatar != ''){
                                      $img = site_url('assets/uploads/members/'.$user->m_avatar);
                                  }else{
                                      $img = site_url('assets/uploads/members/default.png');
                                  }
    //                                  print_r($user->m_avatar);
    //                                  exit();
                                ?>
                             <div class="col-md-3 col-xs-12 mb-4">
                                 <?php // echo $user->m_avatar;?>
                                 <div class="col-3" style="padding-left: 0;">
                                     <img class="avatarpro rounded-circle img-fluid mb-3" src="<?=$img?>" >                                                      
    <!--                                    Profile
                                    </div>-->
                                </div>
                                  <div class="col-9" style="padding-left: 0;position: relative;">                            
                                    <a class="member_name" href="<?=site_url('profile/'.$list->user_id);?>"> <strong><?=$user->m_name?></strong> </a> <br />
                                    <?=$user->m_profession?><br />
                                    <?=$user->m_current_city?><br />

                                    <?php if(isset($list->mentor) && !empty($list->mentor)){?>
                                    <b>Mentor:</b> <?=$list->mentor;?>
                                    <?php }?>  

                                    <input type="hidden" name="short_id" id="short_id" value="<?php echo $list->user_id; ?>">
                                    <?php // echo $list->user_id; exit();?>
                                </div>
                             </div>
                            <?php } ?>
                         </div>
                    </ul>     
                </div>
            </div>
        </div>
        <?php } ?>                     
        <!--</div>-->
    </div>
</div>
<?php $this->load->view('include/footer'); ?>