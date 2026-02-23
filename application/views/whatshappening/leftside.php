<?php 
$session_user_id = $this->session->userdata('user_id');
$user_detail = UserInfo($session_user_id);
?>
<div class="card profile">
    <div class="card-header">
        <b><?=$user_detail->m_name?></b>
    </div>
    <div class="card-body">
        <div class="profile_img" style="background-image: url('<?=base_url()?>assets/uploads/members/<?=($user_detail->m_avatar == "")?"default.png":$user_detail->m_avatar?>');">
            <!--Profile Picture-->
        </div>
        <p>
            <?=$user_detail->m_profession?>
            <br />
            <?=($user_detail->m_current_city == "")? "---":$user_detail->m_current_city?>
        </p>
        <div class="views">
            Profile Views
            <i class="fas fa-eye" style="font-size: 16px;"></i> <?= $user_detail->m_profile_view;?>
        </div>                    
        <?php if(!empty($user_detail->last_login_date)){?>
        <div class="views text-center">
            Last Login<br>                        
            <i style="color: #215374;"><?php echo date('d F Y g:i A', strtotime($user_detail->last_login_date));?></i>                        
        </div>
        <?php }?>
    </div>
</div>