<?php
$session_user_id = $this->session->userdata('user_id');
$query = $this->db->select('role_id')
->where('m_id', $session_user_id) // assuming the user ID column is `id`
->get('jb_member'); // assuming your table name is `users`

if ($query->num_rows() > 0) {
$role_id = $query->row()->role_id;
// Now you have the role_id
} else {
// Handle case where user is not found
$role_id = 0;
} 
?>
<style>
    #flag-profile{
        margin: 0;
    }
</style>

<!--<div class="row">-->
        <div class="col-md-12 mx-auto"><h2 class="text-center"><?=$title?> (<?=count($professionals)?>)</h2></div>
    <!--</div>-->
<?php    
if($professionals!='empty') {        
    foreach(@$professionals as $professional){ 
    
    $list = GetUserList($professional->m_id);   
        ?>
    <?php 

$isFeaturedProfile = isFeaturedProfile($professional->m_id);
if(!empty($isFeaturedProfile)){
    $flag = 'yes';
}else{
    $flag = 'no';
}
?>
<?php $member_img  = !empty($professional->m_avatar) ? $professional->m_avatar:'default.png'; ?>

<div class="col-md-4 col-xs-4">
    <div class="card">
        <div class="card-body">
            <div class="picandinfo">
                <a href="<?=site_url('profile/'.$professional->m_id);?>" class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');">
                    <!--User Profile Picture-->
                </a>                
                <div class="userinfo">                            
                    <a href="<?=site_url('profile/'.$professional->m_id);?>">
                        <h5>
                            <?php if($professional->role_id == 2){ ?>
                                <!-- Mentor -->
                                <i class="fas fa-graduation-cap" style="color:#007bff; margin-right:6px;font-size: 20px;"></i>
                            <?php } ?>
                            <?=$professional->m_name?>
                        </h5>
                    </a>
                    <p>
                       <?=substr($professional->m_profession,0,50)?> <br />
                       <?=$professional->m_current_city?> <br />
                       <?php if($flag == 'yes'){ ?>
                                <i id="flag-profile" class="fas fa-star fa-1x"></i> <br />
                         <?php } ?>
                        Last Seen: <?php echo DateTimeFormat($professional->last_login_date); ?>						
                       <br />
                       <!--Mentor: <b></b>-->
                    </p>                                        
                </div>
                <div class="clearfix"></div>
                <div class="media-body">                         
                        <div class="heading">
                             Profession:
                        </div>
                        <div class="detail">
                            <?=$professional->m_profession?>
                            <?= isset($professional->profession1) && $professional->profession1 != "" ? ' | '.$professional->profession1 : ""; ?>
                            <?= isset($professional->profession2) && $professional->profession2 != "" ? ' | '.$professional->profession2 : ""; ?>
                            <?= isset($professional->profession3) && $professional->profession3 != "" ? ' | '.$professional->profession3 : ""; ?>
                            <?= isset($professional->profession4) && $professional->profession4 != "" ? ' | '.$professional->profession4 : ""; ?>
                            <?= isset($professional->profession5) && $professional->profession5 != "" ? ' | '.$professional->profession5 : ""; ?>
                        </div>
                        <div class="heading">
                             Skills:
                        </div>
                        <div class="detail">
                            <?php 
                                $words = $professional->m_skills; 
                                if (!empty(trim($words))) {
                                    $str_words = explode(",", $words);
                                    foreach ($str_words as $skill) { ?>
                                        <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1">
                                            <?= trim($skill) ?>
                                        </span>
                                    <?php } 
                                } else { ?>
                                    -
                            <?php } ?>
                        </div>
                        <div class="heading">
                             Matching Titles:
                        </div>
                        <div class="detail">
                            <?php if(isset($list) && !empty($list)){?>
                            <?php foreach($list as $u_list){ ?>
                            <a href="<?= site_url('users_list/users_by_list/'.$u_list->list_id)?>">
                                <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?=$u_list->name?></span>
                            </a>
                            <?php } } ?>
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
                        
                        
                        <?php if ($role_id == 2 || $role_id == 8) { ?>
                        <div class="heading">Visa Valid Till:</div>
                        <div class="detail">
                            <?=$professional->m_valid_till?>
                        </div>
                        <div class="heading">Job Preference City:</div>
                        <div class="detail">
                            <?=$professional->m_job_preference?>
                        </div>
                        <div class="heading">Current Designation:</div>
                        <div class="detail">
                            <?=$professional->m_current_design?>
                        </div>
                        <div class="heading">Desired Designation:</div>
                        <div class="detail">
                            <?=$professional->m_desired_design?>
                        </div>
                        <div class="heading">Current Salary:</div>
                        <div class="detail">
                            <?=$professional->m_current_salary?>
                        </div>
                        <div class="heading">Desired Salary:</div>
                        <div class="detail">
                            <?=$professional->m_expected_salary?>
                        </div>
                        <div class="heading">Field Background:</div>
                        <div class="detail">
                            <?=$professional->m_f_background?>
                        </div>
                        <div class="heading">Navafiz Profile Link:</div>

                        <div class="detail" style="display: flex; align-items: center; gap: 8px;">
                            <a class="profileLink" href="<?= site_url('profile/'.$professional->m_id); ?>" target="_blank">
                                <?= site_url('profile/'.$professional->m_id); ?>
                            </a>
                            <button onclick="copyLink(this)" title="Copy Link" style="border: none; background: none; cursor: pointer; font-size: 16px;">
                                📋
                            </button>
                            <span class="copyMsg" style="color: green; font-size: 14px; display: none;">Copied!</span>
                        </div>
                        <div class="heading">Notice Period:</div>
                        <div class="detail">
                            <?=$professional->m_notice_period?>
                        </div>
                        <div class="heading">Remarks:</div>
                        <div class="detail">
                            <?=$professional->m_add_remarks?>
                        </div>
                        <?php } ?>
                        
                        
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
                        <div class="heading">Mentor:</div>
                        <div class="detail">
                            <?php 
                            if($professional->mentor_id>0 && !empty(BasicInfoUser($professional->mentor_id))) {  
                            echo BasicInfoUser($professional->mentor_id)->m_name;
                            } else {
                            echo ' Not Assigend ';
                            } ?>                     
                        </div>
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