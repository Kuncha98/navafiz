<?php $this->load->view('include/header');
$session_user_id= $this->session->userdata('user_id');
$get_review_status = CVreviewStatusByUser($profile->m_id);
$cvreviews_list = CvReviewTeamList();
?>
<style type="text/css">
    #flag-profile{
        margin-top: -12px;
        margin-bottom: 10px;
    }
    
    .profile p{
        margin: 0;
    }
    
    a{
        color: #215374;
    }
    .profile{        
        margin: 0 auto;
        text-align: center;           
    }
    .profile_img{
        border-radius: 50% !important;
        border: 3px solid #215374;
        display: block;
        width: 100px;
        height: 110px;
        background-size: cover;
        margin: 0px auto 5px auto;
    }
    .skills h4 a{
        color: #000;
    }    
    .buttons a{

        margin-bottom: 3px;
        display: block;
    }
    .summary {
        padding-top: 5%;
    } 

    .avatar img {
    width: 100%;
    max-width: 100%;
    height: auto;
    border: 0 none;
    border-radius: 1000px;
    }
    
    .btn-outline-secondary:hover{
        color: #fff;
    }
    .profile_views i{
        font-size: 16px !important;
    }
    
    .avatarpro{
        border-radius: 50% !important;
        border: 1px solid #215374;
        display: block;
        width: 60px;
        height: 70px;
        background-size: cover;
        margin: 0 0 0 10px;
    }
    .card{
        font-size: 14px;
        margin-bottom: 10px;
    }
    .card .card-body a.member_name{
        color: #215374;
    }
    .relatedprofiles .member_name{
        color: #215374;
        font-size: 12px;
    }
    .relatedprofiles .profile_img{
        border-radius: 50% !important;
        border: 1px solid #215374;
        display: block;
        width: 60px;
        height: 70px;
        background-size: cover;
        margin:0 0 0 10px;
    }
    
    #featured_flag .fa-star{
        position: absolute;
        right: 114px;
        top: -3px;
        color: #215374;
        /*color: #FFD700;*/
    }
    @media only screen and (max-width: 768px) {
        .views .fas{
            font-size: 16px !important;
            width: 20px !important;ss
        }
        .btn-outline-secondary{
            width: 100%;
            margin-bottom: 10px;
            padding: 15px 0;
        }        
    }    
</style>
<?php 

$isFeaturedProfile = isFeaturedProfile($profile->m_id);

    if(!empty($isFeaturedProfile)){
        $flag = 'yes';
    }else{
        $flag = 'no';
    }

?>
<?php $this->load->view('notification/notification-messages');?>
<div class="container-mid">        	
    <div class="row">
        <div class="col-md-3">
            <div class="card profile">                
                <div class="card-body">                    
                    <div class="profile_img rounded" style="background-image: url('<?=base_url()?>assets/uploads/members/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>');">
                        
                    </div>    
                    <?php if($flag == 'yes'){ ?>
                        <p class="text-center" id="flag-profile">
                            <i class="fas fa-star fa-2x"></i>
                        </p>
                    <?php } ?>
                    <p id="card-profile-name">
                        <b class="text-center">
                            <?=$profile->m_name?>
                            <br />
                            <?php if($profile->role_id>0){?>
                            (<?= GetRoleName($profile->role_id);?>)
                            <?php }?>
                        </b>
                    </p>
                    
                    
                    
                    <p class="text-center">
                        <?=$profile->m_profession?>
                        <br />
                        <?=($profile->m_current_city == "")? "---":$profile->m_current_city?>
                    </p>
                    <?php if($session_user_id == $profile->m_id){?>
                    <a href="<?= site_url('edit-profile')?>"><i style="font-size: 14px;" class="fas fa-edit mt-0"></i></a>
                    <?php } ?>
                    <hr>        
                    <div class="profile_views">
                        <i>Profile Views </i> <small><i class="fas fa-eye"></i></small> <i><b><?= $profile->m_profile_view;?></b></i>
                    </div>
                    
                    <hr>        
                    <i>Recommendations </i> <i><b>(<?=count($recommand_list)?>)</b></i>                                                      
                    <?php if(!empty($profile->last_login_date)){?>
                    <hr>  
                    <div class="views text-center">
                        <i style="color: #215374;">Last Seen: <?=DateTimeFormat($profile->last_login_date);?></i>
                    </div>
                    <?php }?>
                    
                    
                </div>                        
            </div>
            <p></p>
            
            <p></p>
            <div class="card text-center">
                <div class="card-header">
                    Skills  
                    <?php if($profile_id==$session_user_id){?>
                    <a href="<?=site_url('skills');?>"><i class="fas fa-edit mt-0" style="font-size: 16px;"></i></a> 
                    <?php }?>
                </div>
                <div class="card-body">
                    <?php
                    $str_arr = explode(",",$profile->m_skills);                               
                    if($str_arr){?>              
                    <?php for($a= 0; $a< sizeof($str_arr); $a++){?>
                    <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?=$str_arr[$a]?></span>
                    
                    <?php } }?>
                </div>       
            </div>        
             
            <div class="card" style="margin: 10px 0;">
                <div card-body>
                    <ul class="list-group text-center">
                        <?php if(isset($profile->m_expected_salary) && intval($profile->m_expected_salary) > 1 ){ 
                                if(in_array($session_user_id , IsFeaturedRecruiter())){
                        ?>
                            <li class="list-group-item">
                                <b>Expected Salary</b> 
                                <br />
                                <?=$profile->m_expected_salary;?>
                            </li>
                        <?php } } ?>
                        <li class="list-group-item">
                            <b>Experience</b> 
                            <br />
                            <?=$profile->m_experience;?>
                        </li>

                        <li class="list-group-item">
                            <b>U.A.E Experience</b> 
                            <br />
                            <?php if(!empty($profile->uae_experience)){?>
                            <?=$profile->uae_experience;?>
                            <?php }else{?>
                            --
                            <?php }?>
                        </li>
                        <li class="list-group-item">
                            <b>Industry</b> 
                            <br />
                            <?= GetCategoryName($profile->m_category);?>
                        </li>
                        <li class="list-group-item">
                            <b>Nationality</b> 
                            <br />
                            <?=($profile->m_nationality == "")? "---":$profile->m_nationality?>
                        </li>

                        <li class="list-group-item">
                            <b>Visa status</b> 
                            <br />
                            <?=($profile->visa_status == "")? "---":$profile->visa_status;?>
                        </li>
                        <li class="list-group-item">
                            <b>Qualification </b> 
                            <br />
                            <?php
                            $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."' order by me_year desc limit 0,1 ";
                            $edu_results = $this->db->query($qry)->result();
                            if($edu_results){
                            foreach($edu_results as $edu_result){?>
                            <?=$edu_result->me_degree;?> - <?=$edu_result->me_descr;?>
                            <?php break; }}?> 
                        </li>
                        <?php if(in_array($session_user_id , CvReviewTeamList())){?>
                        <li class="list-group-item">
                            <b>Email address: </b>
                            <?=($profile->m_email == "")? "---":$profile->m_email?>
                        </li>
                        <?php }?>  
                        <?php if(isset($profile->m_ph_no) || isset($profile->m_mobile) ){
                                if(in_array($session_user_id , CvReviewTeamList())){?>
                        <li class="list-group-item">
                            <b>Mobile Number: </b>
                            <?=($profile->m_ph_no == "") ? $profile->m_mobile :$profile->m_ph_no?>
                        </li>
                        <?php } }?>  
                        <?php if(isset($profile->m_driving_lisence)){ ?>
                        <li class="list-group-item">
                            <b>Driving License: </b>
                            <?=$profile->m_driving_lisence?>
                        </li>
                        <?php }?>  
                        
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header"><b>Other Matching Titles/Position</b></div>
                <div class="card-body">                    
                    <?php if(!empty($profile->profession1)){?>
                        <?=$profile->profession1;?>
                        <hr>
                    <?php }?>
                    <?php if(!empty($profile->profession2)){?>
                        <?=$profile->profession2;?>
                        <hr>
                    <?php }?>                    
                    <?php if(!empty($profile->profession3)){?>
                        <?=$profile->profession3;?>
                        <hr>
                    <?php }?>
                    <?php if(!empty($profile->profession4)){?>
                        <?=$profile->profession4;?>
                        <hr>
                    <?php }?>
                    <?php if(!empty($profile->profession4)){?>
                    <?=$profile->profession5;?>                        
                    <?php }?>
                </div>
            </div>
            
            
            <div class="card">
                <div class="card-header"><b>Industry Titles</b></div>
                <div class="card-body">                    
                    <?php if(isset($profile->m_category) && intval($profile->m_category) > 0){?>
                         <?php $industry1 = GetIndustry($profile->m_category);?>
                        <?=$industry1->c_name?>
                        <hr>
                    <?php }?>
                    <?php if(isset($profile->industry1) && intval($profile->industry1) > 0){?>
                        <?php $industry2 = GetIndustry($profile->industry1);?>
                        <?=$industry2->c_name?>
                        <hr>
                    <?php }?>                    
                    <?php if(isset($profile->industry2) && intval($profile->industry2) > 0){?>
                         <?php $industry3 = GetIndustry($profile->industry2);?>
                        <?=$industry3->c_name?>
                        <hr> 
                    <?php }?>
                   
                </div>
            </div>
            <?php // print_r($questions);exit();?>
            <?php if(in_array($session_user_id, CvReviewTeamList())){?>
              <div class="card">
                <div class="card-header"><b>Assign Questions To User</b></div>
                <div class="card-body">
                    <form method="post" action="<?=site_url('profile/save_question/'.$profile->m_id)?>">
                       <select class="form-control" style="font-size:12px" name="question_id">
                        <?php foreach($questions as $qes){  ?>
                           <option value="<?=$qes->id?>"><?=$qes->title?></option>
                        <?php } ?>
                      </select> 
                        <div class="text-center mt-3">
                            <input type="submit" class="btn btn-block btn-primary" value="Assign">    
                        </div>                        
                    </form>                    
                    
                </div>
            </div>
            <?php } ?>
            
            <?php if($profile_id==$session_user_id){?>            
                <div class="card">
                     <div class="card-header"><b>Profile Questions</b></div>
                     <div class="card-body"> 
                         <form id="question_form" action="<?=site_url('profile/submit_questions').'/'.$profile_id?>" method="post">                            
                            <?php $i=1; ?>
                            <?php foreach($recruitment_questions as $question){ ?>                                 
                            <?php 
                                $getquestion = GetQuestion($question->question_id);                                    
                                $getquestion = $getquestion[0];                                    
                            ?>
                            <div class="row">
                                 <div class="col-md-12 mb-3">
                                     <b><?=$i." - ".$getquestion->title?> </b>                                
                                 </div>
                                <div class="col-md-12 ">
                                     <label class="mr-3" for="opt_1<?=$getquestion->id?>">
                                         <input class="ques " id="opt_1<?=$getquestion->id?>" type="radio" name="q[<?=$getquestion->id?>]" class=" ml-2" value="<?=$getquestion->option_1?>" >                            
                                         <?=$getquestion->option_1?>
                                     </label>
                                     <div class="float-right mr-5">
                                         <label class="mr-3" for="opt_2<?=$getquestion->id?>">
                                             <input class="ques mr-2" id="opt_2<?=$getquestion->id?>" type="radio" name="q[<?=$getquestion->id?>]" class=" ml-3" value="<?=$getquestion->option_2?>" >
                                              <?=$getquestion->option_2?>
                                         </label>
                                     </div>                           
                                     <label class="mr-3" for="opt_3<?=$getquestion->id?>">
                                         <input class="ques mr-3" id="opt_3<?=$getquestion->id?>" type="radio" name="q[<?=$getquestion->id?>]" class=" ml-2" value="<?=$getquestion->option_3?>" >
                                         <?=$getquestion->option_3?>
                                     </label>
                                </div>
                            </div>
                             <hr>
                         <?php
                         $i++;
                         }
                         ?>
                       <div class="form-group">
                           <button type="submit" id="submt" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Submit </button>
                       </div>      
                        </form>

                     </div>
                 </div>
            <?php }?>
            <?php // if($session_user_id>0){?>
            <?php if($session_user_id > 0){
                $class = '';
            }else{
                $class = 'disabled';
            } ?>
            <div class="card">
                <div card-body>
                   
                    <div class="row">
                        <div class="col-md-6 col-xs-12 pb-1 pt-1">
                            <a href="<?=base_url('messages/'.$profile->m_id);?>" class="btn btn-outline-secondary col-12 <?= $class?>">
                                Message
                            </a>
                        </div>
                        
                        <div class="col-md-6 col-xs-12 pb-1 pt-1">
                            <a href="<?=base_url('track_steps/sheet/'.$profile->m_id);?>" class="btn btn-outline-secondary col-12 <?=$class?>">Trackingsheet</a>
                        </div>                        
                        <?php if(in_array(intval($session_user_id), CvReviewTeamList()) && in_array($profile->m_id, CvReviewTeamList())){?>
                        <div class="col-md-6 col-xs-12 pb-1 pt-1">                            
                            <a href="<?=base_url('teamactions/index/'.$profile->m_id);?>" class="btn btn-outline-secondary col-12 <?=$class?>">Team Actions</a>                            
                        </div>
                        <div class="col-md-6 col-xs-12 pb-1 pt-1">                            
                            <a href="<?=base_url('mentors/usersby/'.$profile->m_id);?>" class="btn btn-outline-secondary col-12 <?=$class?>">Users By Mentor</a>                            
                        </div>
                         
                        <?php }?>
                         <?php if(in_array(intval($session_user_id), CvReviewTeamList())){?>
                        <div class="col-md-12 col-xs-12 pb-1 pt-1">
                            <!--<a href="<?=base_url()?>profile/del_profile/<?=$profile->m_id?>" onclick="return confirm('Are you Sure you want to delete this?')" class="btn btn-outline-danger col-12">Delete Profile</a>-->                                                      
                        </div>
                         <?php }?>
                        <div class="col-md-12 col-xs-12 pb-1 pt-1">
                            <a href="<?=site_url('profile/Recommendation/'.$profile_id);?>" class="btn btn-outline-secondary col-12 recommedation <?=$class?>" style="margin-bottom: 10px;" onclick="Confirm('Are you sure you want to recommend this profile?');"><b>Recommend <?=$profile->m_name?></b></a>                            
                        </div>
                        <?php if(!empty($profile->member_cv)){ ?>
                        <div class="col-md-12 col-xs-12 pb-1 pt-1">
                            <a href="<?=base_url('public-assets/cvreviews/'.$profile->member_cv)?>" class="btn btn-outline-info col-12 <?=$class?>">Download CV</a>
                        </div>
                        <?php }?> 
                         <?php if($profile->youtube_cv_link != ""){ ?>
                        <div class="col-md-12 col-xs-12 pb-1 pt-1">
                            
                            <?php 
                              $sub_link = substr($profile->youtube_cv_link,32,11);
                            ?>
                            

                            <a href="" class="video btn btn-outline-info col-12 <?= $class ?>" data-video="https://youtube.com/embed/<?=$sub_link?>"
                                        data-toggle="modal" data-target="#videoModal">
                                      Youtube CV link
                            </a> 
                    </div>
                    <?php }?> 
                    <div class="col-md-12 col-xs-12 pb-1 pt-1"><a href="<?=base_url('profile/exportpdf/'.$profile->m_id);?>" class="btn btn-outline-success col-12 <?= $class ?>">Download Profile As PDF</a></div>
                    <div class="col-md-12 col-xs-12 pb-1 pt-1">
                        <div class="form-group">
                           
                            <input type="text" class="form-control" id="profile_url" style="opacity:0;position:absolute;">
                            <a href="javascript:void(0);" class="btn btn-outline-success col-12 <?= $class ?>" onclick="return myFunction();">Copy My Profile Link</a>

                        </div>
                    </div>
                    <?php
                        $whatsapp = !empty($profile->m_mobile) ? $profile->m_mobile: $profile->m_phone;
                    ?>
                    <?php if(in_array(intval($session_user_id), CvReviewTeamList())){?>
                        <div class="col-md-12 col-xs-12 pb-1 pt-1"><a href="https://api.whatsapp.com/send/?phone=<?=$whatsapp?>" class="btn btn-outline-success col-12" target="_blank">Contact via Whats App</a></div>
                    <?php }?>
                     <?php if($session_user_id>0){?>
                    <div class="col-md-12 col-xs-12 p-lg-1 mt-3">
                        <?php $url = urlencode(site_url($page_meta['og_url']));?>
                        <div class="text-center">
                            <a href="http://www.facebook.com/sharer.php?u=<?=$url?>" class="<?= $class ?>" target="_blank" title="Facebook Share"><img src="<?=site_url('nassets/img/social-imgs/fb.png')?>" style="height:40px;width: 40px"></a>
                            <!--<a href="http://www.facebook.com/sharer.php?u=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/insta.png')?>" style="height:70px;width: 80px"></a>-->
                            <a href="http://twitter.com/share?text=<?=$page_meta['title']?>&url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/tw.png')?>" style="height:40px;width: 40px" href></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/in.png')?>" style="height:40px;width: 40px"></a>
                            <a href="https://plus.google.com/share?url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/gg.png')?>" style="height:40px;width: 40px"></a>
                            <a href="https://www.youtube.com/channel/UCekQrDwBfQ6z6QnwSlbNDqA?sub_confirmation=1" target="_blank" rel="nofollow" class="text-center">
                                <img src="<?=site_url('nassets/img/social-imgs/youtube-subscribe.png');?>" class="img-fluid" style="height: 40px;" />
                            </a>
                        </div>
                    </div>
                     <?php } ?>
                       
                    <div class="col-md-12 col-xs-12 pb-1 pt-1"><a href="<?=site_url('feed')?>" class="btn btn-outline-success col-12 <?= $class ?>" target="_blank">See As Received Jobs</a></div>
                    <div class="col-md-12 col-xs-12 pb-1 pt-1"><a href="<?=site_url('jobs')?>" class="btn btn-outline-success col-12 <?= $class ?>" target="_blank">See Verified Jobs</a></div>
                    
                    </div>
                   
                </div>
            </div>
             <?php // }?>
          <script>
          if($('.ques').val()){
            console.log("Has value");
            }else{
                $('#submt').hide();
            }
          </script>
            
            
            
            <?php
//             print_r($recruitment_answers);                       
//             exit();
            ?>
            
            
            
            
            
            
            
            
            
            
            
        </div>
        
        <div class="col-md-6">
            <?php if(in_array($session_user_id, CvReviewTeamList())){?>
            <div class="row">
                <div class="col-md-12 col-xs-12">                    
                    <?php 
                     //echo '<img src="'.site_url('assets/frontend/images/cross.png').'" width="20" />'."CV not uploaded for Review."; 
                    if(isset($get_review_status->review_status)){?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        if($get_review_status->assign_user_to==0){
                            echo ''."CV uploaded & Waiting for Mentor assignment.";?>
                            <a href="<?=site_url('cvreport/'.$profile->m_id);?>" target="_blank">Check Report.</a>
                        <?php                            
                        }else if($get_review_status->assign_user_to>0 && $get_review_status->admin_comments==''){
                            echo ''."CV uploaded & Waiting Mentor Response. <b>".(GetUserDetails($get_review_status->assign_user_to)->m_name)."</b>";?>
                            <?php if(in_array(intval($session_user_id), $cvreviews_list)){?>
                            <a href="<?=site_url('cvreport/'.$profile->m_id);?>" target="_blank">Check Report.</a>
                            <?php }?>

                        <?php }else if($get_review_status->assign_user_to>0 && $get_review_status->admin_comments<>'' && $get_review_status->review_status<>'review_done'){
                            echo ''."Commented by Mentor."; ?> 
                        <br>
                        <?php if(in_array(intval($session_user_id), $cvreviews_list)){?>
                        <a href="<?=site_url('cvreport/'.$profile->m_id);?>" target="_blank">Check Report.</a>
                        <?php }?>
                        <br>
                        <a href="<?=site_url('mycvreport');?>" target="_blank">Check Your Own Report.</a>
                        <?php }?>
                        </div>
                    <?php }?>
                    <?php
                    if(!empty($get_review_status->review_status)){   
                     if($get_review_status->review_status=='review_done'){?> 
                        <div class="alert alert-secondary" role="alert">
                            Congrats Resume Approved by Navafiz Team.
                        </div>                                    
                    <?php } }?>                    
                </div>                
            </div>
            <?php }?>
            <style>
                #member_summ .summ_pts{
                    font-size: 16px
                }
            </style>
            <div class="row">
                <div class="col-md-12">
                    <div class="card profile" id="member_summ">
                        <div class="card-body">
                            <div class="wow fadeInDown">
                                <div style="text-align: justify;">
                                    <p class="text-center">
                                        <b>Summary of Career</b>                                        
                                        <?php if($profile_id==$session_user_id){?>
                                        <a href="<?=site_url('summary-career');?>" style="vertical-align: inherit;" class="btn btn-white btn-xs" title="Edit Summary of Career"><i class="fas fa-edit mt-0" style="font-size: 16px;"></i></a>
                                        <?php }?>
                                    </p>                                                                        
                                    <p>
                                        <?php if(!empty($summary_points->point_1)){?>     
                                        <p class="summ_pts">1. <?=isset($summary_points->point_1)? $summary_points->point_1:'';?></p>
                                        <hr>
                                        
                                        <?php }?>
                                        
                                        <?php if(!empty($summary_points->point_2)){?>     
                                       <p class="summ_pts"> 2. <?=isset($summary_points->point_2)? $summary_points->point_2:'';?></p>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_3)){?>     
                                        <p class="summ_pts">3. <?=isset($summary_points->point_3)? $summary_points->point_3:'';?></p>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_4)){?>     
                                        <p class="summ_pts">4. <?=isset($summary_points->point_4)? $summary_points->point_4:'';?></p>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_5)){?>     
                                        <p class="summ_pts">5. <?=isset($summary_points->point_5)? $summary_points->point_5:'';?></p>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_6)){?>     
                                        <p class="summ_pts">6. <?=isset($summary_points->point_6)? $summary_points->point_6:'';?></p>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_7)){?>     
                                        <p class="summ_pts">7. <?=isset($summary_points->point_7)? $summary_points->point_7:'';?></p>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_8)){?>     
                                        <p class="summ_pts">8. <?=isset($summary_points->point_8)? $summary_points->point_8:'';?></p>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_9)){?>     
                                        <p class="summ_pts">9. <?=isset($summary_points->point_9)? $summary_points->point_9:'';?></p>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_10)){?>     
                                        <p class="summ_pts">10. <?=isset($summary_points->point_10)? $summary_points->point_10:'';?></p>
                                        <hr>
                                        <?php }?>                                        
                                   </p>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <?php if($ach_results){?>
            <div class="row">                   
                <div class="col-md-12">
                    <h5 class="wow fadeInDown text-center" style="padding-top: 25px;"> 
                        Achievements
                        <?php if($profile_id==$session_user_id){?>
                            <a href="<?=site_url('achievements/userAchievements');?>" style="vertical-align: inherit;" class="btn btn-white btn-xs" title="Edit Achievements"><i class="fas fa-edit mt-0" style="font-size: 16px;"></i></a> </h5>                    
                        <?php }?>
                    
                    <?php foreach($ach_results as $ach_results){ ?>
                    <div class="card" style="margin-bottom: 15px;">
                        <div class="card-header">
                            <b><?=$ach_results->title;?></b>  
                                                         
                        </div>
                        <div class="card-body">                            
                            <p style="font-size:16px"><?=($ach_results->description == "")? "---": $ach_results->description;?></p> 
                            <br />
                            <?php if($profile_id==$session_user_id){?>
                                <a style="text-align: right;" href="<?=site_url('achievements/post/'.$ach_results->id);?>"><i style="font-size: 16px;" class="fas fa-edit"></i></a>
                            <?php }?>
                        </div>                        
                    </div>                    
                    <?php }?>                
                </div>
            </div>
            <?php }?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">                    
                    <h5 class="wow fadeInDown text-center" style="padding-top: 25px;">
                        Work Experience (Employment History)  
                        <?php if($profile_id==$session_user_id){?>
                        <a href="<?=site_url('employment');?>" style="vertical-align: inherit;" class="btn btn-white btn-xs" title="Edit Summary of Career"><i class="fas fa-edit mt-0" style="font-size: 16px;"></i></a>
                        <?php }?>
                    </h5>
                    <?php foreach($employment_history as $emp_history){?>                    
                    <div class="card" style="margin-bottom: 15px;">                        
                        <div class="card-body">
                            <p class="text-center">
                                Experience as <b><?=$emp_history->position_designation?></b>
                            </p>
                            <ul class="list-unstyled profile-about" style="list-style: none !important;">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">Employer</span> </div>
                                        <div class="col-sm-8">
                                            <?php
                                            $company_name = GetCompanyName(intval($emp_history->company_name));
                                            $company_id = GetCompanyName(intval($emp_history->company_id)); 
                                            ?>                       
                                            <p style="font-size:16px"><?= !empty($company_name) ? $company_name : $company_id  ;?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">From</span> </div>
                                            <div class="col-sm-8"><p style="font-size:16px"><?=DateFormat($emp_history->start_year);?></p></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">To</span> </div>
                                            <div class="col-sm-8"><p style="font-size:16px"><?=DateFormat($emp_history->end_year);?></p></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">Detail</span> </div>
                                        <div class="col-sm-8"><p style="font-size:16px"><?=nl2br($emp_history->description);?></p></div>
                                    </div>
                                </li>
                            </ul>
                            <?php if($profile_id==$session_user_id){?>
                                <a href="<?=site_url('employment/add/'.$emp_history->emp_history_id);?>" style="vertical-align: inherit;" class="btn btn-white btn-xs flaot-right"><i style="font-size: 16px;" class="fas fa-edit"></i></a>
                                <a href="<?=base_url('employment/delete/'.$emp_history->emp_history_id)?>" style="vertical-align: inherit;" onclick="return confirm('Are you Sure you want to delete this?')" class="btn btn-white btn-xs pull-right"><i style="font-size: 16px;" class=" fas fa-trash-alt"></i></a>
                            <?php }?>
                        </div>                        
                    </div>
                    <?php }?> 
                </div>
            </div>
            <div class="row">                   
                <div class="col-md-12">
                    <h5 class="wow fadeInDown text-center" style="padding-top: 25px;"> 
                        Academic Qualification
                        <?php if($profile_id==$session_user_id){?>
                            <a href="<?=site_url('education');?>" style="vertical-align: inherit;" class="btn btn-white btn-xs" title="Edit Summary of Career"><i class="fas fa-edit mt-0" style="font-size: 16px;"></i></a> </h5>                    
                        <?php }?>
                    <?php
                    $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."'";
                    $edu_results = $this->db->query($qry)->result();
                    if($edu_results){?>
                    <?php foreach($edu_results as $edu_result){ ?>
                    <div class="card" style="margin-bottom: 15px;">                        
                        <div class="card-body">                            
                            <p class="text-center">
                                <b><?=$edu_result->me_degree;?></b>  
                                <?=date('d F Y', strtotime($edu_result->me_year));?>
                            </p>
                            <?=($edu_result->me_descr == "")? "---": $edu_result->me_descr;?> 
                            <br />
                            <?php if($profile_id==$session_user_id){?>
                                <a style="text-align: right;" href="<?=site_url('education/edit/'.$edu_result->me_id);?>"><i style="font-size: 16px;" class="fas fa-edit"></i></a>
                            <?php }?>
                        </div>                        
                    </div>                    
                    <?php }?>
                <?php }?>
                </div>
            </div> 
            
            
            
            
            
     
            
            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">                    
                    <h5 class="wow fadeInDown text-center" style="padding-top: 25px;">
                                  Certifications  
                        <?php if($profile_id==$session_user_id){?>
                        <a href="<?=site_url('certification');?>" style="vertical-align: inherit;" class="btn btn-white btn-xs" title="Edit Summary of Career"><i class="fas fa-edit mt-0" style="font-size: 16px;"></i></a>
                        <?php }?>
                    </h5>
                    <?php foreach($certifications as $certificate){?>                    
                    <div class="card" style="margin-bottom: 15px;">                        
                        <div class="card-body">
                            <p class="text-center">
                                <b><?=$certificate->c_title?></b>
                            </p>
                            <ul class="list-unstyled profile-about" style="list-style: none !important;">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">Duration</span> </div>
                                        <div class="col-sm-8">                      
                                             <?=$certificate->c_duration?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">Description</span> </div>
					<div class="col-sm-8"><?=$certificate->c_description?></div>
                                    </div>
                                </li>
                            </ul>
                            <?php if($profile_id==$session_user_id){?>
                                <a href="<?=site_url('certification/edit/'.$certificate->c_id);?>" style="vertical-align: inherit;" class="btn btn-white btn-xs flaot-right"><i style="font-size: 16px;" class="fas fa-edit"></i></a>
                                <a href="<?=base_url('certification/delete/'.$certificate->c_id)?>" style="vertical-align: inherit;" onclick="return confirm('Are you Sure you want to delete this?')" class="btn btn-white btn-xs pull-right"><i style="font-size: 16px;" class=" fas fa-trash-alt"></i></a>
                            <?php }?>
                        </div>                        
                    </div>
                    <?php }?> 
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <a href="<?=site_url('feed/user/'.$profile_id);?>">
                        <?=$profile->m_name?>  Activity  <b>(<?=FeedCountByUser($profile_id);?>)</b>
                    </a>
                </div>
                <!--<div class="card-body text-center"> <a href="<?=site_url('profile_points/GetPoints/'.$profile_id);?>"> Total Points  <b>(<?=$points->user_points?>)</b></a>                   </div>-->
            </div>            
            <a href="<?=site_url('profile/Recommendation/'.$profile_id);?>" class="btn btn-outline-success col-12 recommedation" style="margin-bottom: 10px;" onclick="Confirm('Are you sure you want to recommend this profile?');"><b>Recommend <?=$profile->m_name?></b></a>
            <?php if($session_user_id>0 ){?>
               <?php  if(empty($profile->profile_mentors_approved)){ ?>
                <a href="<?=site_url('track_steps/profile_approval/'.$profile_id.'/'.$session_user_id);?>" class="btn btn-outline-success col-12 recommedation" style="margin-bottom: 10px;" onclick="Confirm('Are you sure you want to recommend this profile?');"><b>NAVAFIZ Profile Approval</b></a>
            <?php }else{ ?>
                
                <a href="#" class="btn btn-outline-success col-12 recommedation" style="margin-bottom: 10px;"><b>This profile is approved by Navafiz Mentors</b></a>

            <?php } ?>
            <?php } ?>

            <style>
               
            </style>
            <?php if(!empty($recommand_list)){?>
            <div class="card" style="margin-bottom: -10px;">
                <div class="card-header"><b>Profile Recommendations (<?=count($recommand_list)?>)</b></div>
            </div>            
            <?php foreach($recommand_list as $list){?>
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-3" style="padding-left: 0;">
                            <div class="avatarpro img-fluid" style="background-image: url('<?=site_url('assets/uploads/members/'.$list->m_avatar);?>');">                                                      
                                <!--Profile Picture-->
                            </div>
                        </div>
                        <div class="col-9" style="padding-left: 0;">                            
                            <a class="member_name" href="<?=site_url('profile/'.$list->recommend_by);?>"> <strong><?=$list->m_name?></strong> </a> <br />
                            <?=$list->m_profession?>                            
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php }?>
            
            
            <div class="card">
                <div class="card-header text-center"><a href="<?=site_url('profile_points/GetPoints/'.$profile_id)?>">Recruitment Support Activity <b>(<?=$points->user_points?>)</b></a></div>
                <div class="card-body">
                  <?php if($session_user_id>0){?>  
                    
                    <form action="<?=site_url('profile/RecommendationForJob/'.$profile_id)?>" method="post" class="mb-4">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 mx-auto">
                            <div class="form-group">
                            <label><b>Recommend <?=$profile->m_name?> for Recent Posted Jobs</b></label>
                            <select class="select-category form-control" name="job_id" required="">
                                <option value="">Select Job</option>                                
                                <?php foreach($top10_jobs as $tjob){?>
                                <option value="<?=$tjob->j_id?>"><?=$tjob->j_title?> | <?=$tjob->j_location?></option>
                                <?php }?>
                                <input type="hidden" name="type" value="for_job" />                                
                            </select>
                            </div>
                                
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Recommend </button>
                            </div>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                    <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                     <form action="<?=site_url('jobs/shortlist_from_profile/'.$profile->m_id)?>" method="post" class="mb-4">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 mx-auto">
                            <div class="form-group">
                            <label><b>Shortlist <?=$profile->m_name?> for Recent Posted Jobs</b></label>
                            <select class="select-category form-control" name="job_shortlist_id" required="">
                                <option value="">Select Job</option>                                
                                <?php foreach($top10_jobs as $tjob){?>
                                <option value="<?=$tjob->j_id?>"><?=$tjob->j_title?> | <?=$tjob->j_location?></option>
                                <?php }?>
                                <input type="hidden" name="type" value="for_job" />                                
                            </select>
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Shortlist <?=$profile->m_name?> </button>
                            </div>
                            </div>
                        </div>                        
                    </form>
                    <?php } ?>
                    
                    <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                     <form action="<?=site_url('profile/save_user_by_list/'.$profile->m_id)?>" method="post">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 mx-auto">
                            <div class="form-group">
                            <label><b>Add <?=$profile->m_name?> for User List</b></label>
                            <select class="select-category form-control" name="list_id" required="">
                                <option value="">Select User List</option>   
                                <?php // $user_list = sort($user_list);  ?>
                                <?php foreach($user_list as $list){?>
                                <option value="<?=$list->id?>"><?=$list->name?></option>
                                <?php }?>                              
                            </select>
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Add <?=$profile->m_name?> </button>
                            </div>
                            </div>
                            
                        </div>                        
                    </form>
                    
                    <?php }?> 
                </div>
            </div>
            
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">                    
                    <div class="card relatedprofiles">
                        <div class="card-header">
                            <?php // print_r(@$related_userlist);exit(); ?>
                            <b>Related UserList of <?php  foreach($user_list_id as $user_list){
                               
                        $user_list_name = GetUserListName($user_list->list_id); echo '('.@$user_list_name[0]->name.',)' ;?>  <?php } ?> Members</b>
                        </div>
                        <div class="card-body">                            
                            <?php // echo "<pre>";print_r($related_userlist);exit();
                            if(@$related_userlist[0]!='e' && @$related_userlist[0]!='NULL' && @$related_userlist[0] !== "empty"  && isset($related_userlist[0]) && !empty($related_userlist[0])) {
                                foreach(@$related_userlist[0] as $related_user){
//                                    print_r($related_user);exit();
                                    ?>     
                            
                                <div class="row">    
                                    <div class="col-md-12">
                                      <div class="row"> 
                                              <div class="col-md-3" style="padding-left: 0;">
                                                  <div class="profile_img img-fluid" style="background-image: url('<?=base_url()?>assets/uploads/members/<?=($related_user->m_avatar == "")?"default.png":$related_user->m_avatar?>');">                                                      
                                                      <!--Profile Picture-->
                                                  </div>
                                              </div>
                                              <div class="col-md-9" style="padding-left: 0;">
                                                  <div><a class="member_name" href="<?=base_url()?>profile/<?=$related_user->member_id?>"> <strong>
                                                    <?=$related_user->m_name?>
                                                    </strong> </a>
                                                  </div>
                                                  <div>
                                                      <small><strong>Profession: </strong>
                                                          <?=$related_user->m_profession?>
                                                      </small>
                                                  </div>
                                                  <div>
                                                      <small><strong>Current City:</strong>
                                                          <?=$related_user->m_current_city?>
                                                      </small>
                                                  </div>                                    
                                              </div>
                                        </div>
                                    </div> 
                                </div> 
                                <hr/>
                                <?php }?>
                            <?php }?>                          
                        </div>
                    </div>                   
                </div>
            
            
            <div class="card">                
                <div class="card-header">
                    <b>Mentor</b>
                </div>
                <div class="card-body">                    
                    <?php if(isset($profile->mentor_id)){
                        $mentor_detail = BasicInfoUser($profile->mentor_id);
                    } ?>
                    <?php if(isset($mentor_detail->m_name) && !empty($mentor_detail->m_name)){ ?>
                        <div class="row">
                            <div class="col-md-3">
                                <a  class="profile_link" href="<?=site_url('profile/'.$mentor_detail->m_id);?>">
                                    <div class="profile_img" style="background-image: url('<?=site_url('assets/uploads/members/'.$mentor_detail->m_avatar)?>'); width: 60px;height:60px;"></div>
                                </a>                                        
                            </div>
                            <div class="col-md-9">
                                <a class="profile_link" href="<?=site_url('profile/'.$mentor_detail->m_id);?>">
                                    <b style="color: #000;"><?=$mentor_detail->m_name?></b>
                                </a>                                        
                                <p>
                                    <?=$mentor_detail->m_profession?> <br>
                                    <?=($mentor_detail->m_current_city == "")? "---": ucwords($mentor_detail->m_current_city);?>
                                </p>
                                <?php if(!empty($mentor_detail->last_login_date)){?>
                                <div class="views">
                                    Last Login: <i style="color: #215374;"><?php echo date('d F Y g:i A', strtotime($mentor_detail->last_login_date));?></i>
                                </div>
                                <?php }?>
                            </div>
                        </div>                                
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-12">                                        
                                <a class="btn btn-outline-success col-12" href="<?=site_url('track_steps/sheet/'.$mentor_detail->m_id.'#mchatbox');?>" target="_blank">Contact with <?=$mentor_detail->m_name?></a>
                            </div>
                        </div>
                        <?php }else{?>
                        <b>Not yet Assigned</b>
                        <?php }?>
                </div>                        
            </div>
            <div class="card">
                <div class="card-header"><b>Profile Answers</b></div>
                <div class="card-body"> 
                    <?php $i = 1; ?>
                   <?php foreach($recruitment_answers as $answer){
                       
                      ?>
                    <?php if(!empty($answer->question_id)){?>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-12 mb-3">
                                <?php $ans = GetQuestion($answer->question_id)?> 
                                <?=$i." - ".$ans[0]->title?>
                            </div>
                           <div class="col-md-12">
                               <!--<div class="float-right mr-5">-->
                             <?=$answer->answer_value?>      
                               <!--</div>-->
                             
                           </div>
                        </div>
                      <hr>
                    <?php
                
                    }
                    $i++;
                    }
                    ?>
                     
                 </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">                    
                    <div class="card relatedprofiles">
                        <div class="card-header">
                            <b>Related Professionals</b>
                        </div>
                        <div class="card-body">                            
                            <?php 
                            $p=1;
                            if($relatedmembers!='empty' && !empty($relatedmembers)) {
                                foreach($relatedmembers as $relatedmember){?>                                
                                <div class="row">    
                                    <div class="col-md-12">
                                      <div class="row"> 
                                              <div class="col-md-3" style="padding-left: 0;">
                                                  <div class="profile_img img-fluid" style="background-image: url('<?=base_url()?>assets/uploads/members/<?=($relatedmember->m_avatar == "")?"default.png":$relatedmember->m_avatar?>');">                                                      
                                                      <!--Profile Picture-->
                                                  </div>
                                              </div>
                                              <div class="col-md-9" style="padding-left: 0;">
                                                  <div><a class="member_name" href="<?=base_url()?>profile/<?=$relatedmember->m_id?>"> <strong>
                                                    <?=$relatedmember->m_name?>
                                                    </strong> </a>
                                                  </div>
                                                  <div>
                                                      <small><strong>Profession: </strong>
                                                          <?=$relatedmember->m_profession?>
                                                      </small>
                                                  </div>
                                                  <div>
                                                      <small><strong>Current City:</strong>
                                                          <?=$relatedmember->m_current_city?>
                                                      </small>
                                                  </div>                                    
                                              </div>
                                        </div>
                                    </div> 
                                </div> 
                                <hr/>
                                <?php }?>
                            <?php }?>                          
                        </div>
                    </div>                   
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
        <iframe src="" frameborder="0" height="350" width="100%" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('include/footer');?>

<script>

 $(function(){
      // VIDEO PLAY MODAL
      $(".video").click(function(){
        var theModal = $(this).data("target"),
        videoSRC = $(this).attr("data-video"),
        videoSRCauto = videoSRC + "?modelbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
        $(theModal + ' iframe').attr('src',videoSRCauto);
        $(theModal + ' button.close').click(function(){
          $(theModal + ' iframe').attr('src', videoSRC);
        })
      })
    })
    
    
 function myFunction() {
    $('#profile_url').val('https://navafiz.com/profile/'+<?=$profile_id?>);
    /* Get the text field */
    var copyText = document.getElementById("profile_url");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    return false;
  }   

</script>