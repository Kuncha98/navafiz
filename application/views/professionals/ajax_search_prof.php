<?php
$session_user_id = $this->session->userdata('user_id');
//print_r($professionals); exit;
?>

<div class="col-md-12 mx-auto"><h2 class="text-center">Search Results For "<?=$search_keyword?>"</h2></div>
<div class="col-md-12 mx-auto"><h2 class="text-center"><?php echo $title ?> (<?=count($professionals)?>)</h2></div>

<?php    
if($professionals!='empty') {        
    foreach(@$professionals as $professional){?>
<?php $member_img  = !empty($professional->m_avatar) ? $professional->m_avatar:'default.png'; ?>

<div class="col-md-4 col-xs-4">
    <div class="card">
        <div class="card-body">
            <div class="picandinfo">
                <a href="<?=site_url('profile/'.$professional->m_id);?>" class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');">
                    <!--User Profile Picture-->
                </a>                
                <div class="userinfo">                            
                    <a href="<?=site_url('profile/'.$professional->m_id);?>"><h5><?=$professional->m_name?></h5></a>
                    <p>
                       <?=substr($professional->m_profession,0,50)?> <br />
                       <?=$professional->m_current_city?> <br />
                        Last Login: <?php echo DateTimeFormat($professional->last_login_date); ?>						
                       <br />
                       <!--Mentor: <b><?=$professional->mentor_id>0 ? BasicInfoUser($professional->mentor_id)->m_name:' Not Assigend ';?></b>-->
                    </p>                                        
                </div>
                <div class="clearfix"></div>
                <div class="media-body">                         
                        <div class="heading">
                             Profession:
                        </div>
                        <div class="detail">
                            <?=$professional->m_profession?>
                        </div>
                        <div class="heading">
                             Skills:
                        </div>
                        <div class="detail">
                            <?php $words = $professional->m_skills; $str_words = explode (",", $words);?>
                            <?php foreach($str_words as $skill){ ?>
                              <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?=$skill?></span>
                            <?php } ?>
                        </div>
                    
                    <?php 
                    $user_cert = GetAllCert($professional->m_id); 
                 
                    
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
                            <?=$professional->m_city;?>
                        </div>
                        <div class="heading">Employer:</div>
                        <div class="detail">
                            <?=$professional->m_employer?>
                        </div>
                        <div class="heading">Employment Status:</div>
                        <div class="detail">
                            <?=$professional->employment_status?>
                        </div>
                        <div class="heading">Visa Status:</div>
                        <div class="detail">
                            <?=$professional->visa_status?>
                        </div>
                        <?php if(in_array($session_user_id, CvReviewTeamList())){?>
<!--                        <div class="heading">Email</div>
                        <div class="detail">
                            <?=$professional->m_email?>
                        </div>-->
                        <div class="heading">Registered On:</div>
                        <div class="detail">
                            <?php echo DateTimeFormat($professional->added_on);?>                            
                        </div>
                        <?php }?>
                </div>                            
            </div>
        </div>
    </div>    
</div>  

<?php } }else{?>
    

  <div role="alert" class="alert alert-danger alert-dismissible">
        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
        <strong></strong> - No data exits! 
  </div>
<?php }?>
    