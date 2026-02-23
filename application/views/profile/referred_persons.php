<?php $this->load->view('include/header.php'); 
$profile_id= $this->session->userdata('user_id');
?>

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
     
     .picandinfo #delete-user{
        position: absolute;
        right: -6px;
        top: -20px;
        font-size: 27px;
     }
     
     #list_heading{
        width: 45%;
        background-color: #0056b3;
        padding: 10px 0px;
        margin-left: 0;
        color: #fff;
     }
     

</style>
<!-- Action Buttons -->
            <?php if($profile_id > 0){
                $class = '';
            }else{
                $class = 'disabled';
            } ?>
<div class="container">
    <?php $this->load->view('notification/notification-messages'); ?>
    <div id="list_heading">
        <h2 class="ml-5">List of Referred Persons</h2>
    </div>
    <div class="row mt-5">
    <?php 
    $detail = GetReferralProfile(); 
    if (!empty($referred_persons)) {
        foreach ($referred_persons as $list) {
            // Fetch user details
            $user = BasicInfoUser1($list->m_id);
            if ($user) {
                $member_img = !empty($user->m_avatar) ? $user->m_avatar : 'default.png'; 
    ?>
    <div class="col-md-4 col-xs-4">
        <div class="card">
            <div class="card-body">
                <div class="picandinfo">
                    <a href="<?= site_url('profile/' . $user->m_id); ?>" class="proimg" 
                       style="background-image: url('<?= base_url('assets/uploads/members/' . $member_img) ?>');">
                        <!--User Profile Picture-->
                    </a>
                    <div class="userinfo">                            
                        <a href="<?= site_url('profile/' . $user->m_id); ?>"><h5><?= htmlspecialchars($user->m_name) ?></h5></a>
                        <p>
                            <?= htmlspecialchars(substr($user->m_profession, 0, 50)) ?> <br />
                            <?= htmlspecialchars($user->m_current_city) ?> <br />
                            Last Login: <?= DateTimeFormat($user->last_login_date); ?>						
                        </p>                                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="media-body">                         
                        <div class="heading">Profession:</div>
                        <div class="detail"><?= htmlspecialchars($user->m_profession) ?></div>
                        
                        <div class="heading">Skills:</div>
                        <div class="detail">
                            <?php 
                            $skills = !empty($user->m_skills) ? explode(",", $user->m_skills) : [];
                            foreach ($skills as $skill) { ?>
                                <span class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?= htmlspecialchars($skill) ?></span>
                            <?php } ?>
                        </div>
                        
                        <div class="heading">Home Town:</div>
                        <div class="detail"><?= htmlspecialchars($user->m_city); ?></div>
                        
                        <div class="heading">Employer:</div>
                        <div class="detail"><?= htmlspecialchars($user->m_employer); ?></div>
                        
                        <div class="heading">Employment Status:</div>
                        <div class="detail"><?= htmlspecialchars($user->employment_status); ?></div>
                        
                        <div class="heading">Visa Status:</div>
                        <div class="detail"><?= htmlspecialchars($user->visa_status); ?></div>
                        
                        <div class="heading">Registered On:</div>
                        <div class="detail"><?= DateTimeFormat($user->added_on); ?></div>
                        
                        <?php if (isset($user->mentor_id) && $user->mentor_id > 0) { ?>
                        <div class="heading">Mentor:</div>
                        <div class="detail">
                            <?= htmlspecialchars(BasicInfoUser($user->mentor_id)->m_name); ?>
                        </div>
                        <?php } ?>
                    </div>                            
                </div>
            </div>
        </div>    
    </div> 
    <?php } } } else { ?>
    <p class="ml-5">No referral persons found.</p>
    <?php } ?>
    </div>
</div>

<script type="text/javascript">  
</script>
<?php $this->load->view('include/footer.php'); ?> 