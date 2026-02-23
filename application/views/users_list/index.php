<?php $this->load->view('include/header'); ?>
<?php $session_user_id = $this->session->userdata('user_id');
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

<?php // $use = IsFeaturedRecruiter(); print_r($use);exit();?>
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
<div class="container-mid">
    <?php if ($this->session->flashdata('success_message')): ?>
        <div class="alert alert-success" id="success-message">
            <?php echo $this->session->flashdata('success_message'); ?>
        </div>
    <?php endif; ?>
    
    <?php if ($this->session->flashdata('error_message')): ?>
        <div class="alert alert-danger" id="error-message">
            <?php echo $this->session->flashdata('error_message'); ?>
        </div>
    <?php endif; ?>

    <?php
        $list_title = GetUserListName($list_id);
        $list_title = @$list_title[0]->name;
    ?>
    <div id="list_heading">
        <h2 class="ml-5"><?=$list_title?>-</h2>
        <h3 class="ml-5">Professionals in UAE-Found ACTIVE</h3>
        <?php if($list_id == 'new') { ?>
        <h4 class="ml-5">During Last 24 Hours</h4>
        <?php } else { ?>
        <h4 class="ml-5">During Last 30 Days</h4>
        <?php } ?>
        <?php if(isset($views)){ ?>
        <p class="ml-5">Page View(s): <i> <?= isset($views) ? $views : ''?></i></p>
        <?php } ?>
    </div>
    
    
    
    <div class="row mt-4">
        <div class="col-md-10 col-xs-12">
            <div class="row">
                <?php
                    if($users_by_list != 'empty'){
            //            echo "<pre>";print_r($users_by_list);exit();
                    foreach ($users_by_list as $list) {
            
                if ($list_id == 'new') {
                    // Direct member row from jb_member
                    $user = [$list];
                } else {
                    // Normal user list entries
                    if (intval($list->list_id) > 0 && isset($list->member_id)) {
                        $user = GetUserName($list->member_id);
                    } else {
                        continue; // skip invalid rows
                    }
                }
            
                $member_img = !empty($user[0]->m_avatar) ? $user[0]->m_avatar : 'default.png';
                ?>
        <?php if(isset($user[0]->m_id)){ ?>        
        <div class="col-md-4 col-xs-4">
            <div class="card">
                <div class="card-body">
                    <div class="picandinfo">
                        <?php if (in_array($session_user_id, CvReviewTeamList())): ?>
                            <?php if ($list_id == 'new'): ?>
                                <!-- Delete directly by member ID -->
                                <a href="<?=site_url('users_list/delete_new_member/'.$user[0]->m_id)?>" 
                                   onclick="return confirm('Are you sure you want to delete this new member?')" 
                                   id="delete-user">X</a>
                            <?php else: ?>
                                <!-- Old behavior for saved lists -->
                                <a href="<?=site_url('users_list/delete_user/'.$list->id.'/'.$list->member_id)?>" 
                                   onclick="return confirm('Are you sure you want to delete this?')" 
                                   id="delete-user">X</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <a href="<?=site_url('profile/'.$user[0]->m_id);?>" class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');">
                            <!--User Profile Picture-->
                        </a>                
                        <div class="userinfo">                            
                            <a href="<?=site_url('profile/'.$user[0]->m_id);?>">
                                <h5>
                                    <?php if($user[0]->role_id == 2){ ?>
                                        <!-- Mentor -->
                                        <i class="fas fa-graduation-cap" style="color:#007bff; margin-right:6px;font-size: 20px;"></i>
                                    <?php } ?>
                                    <?=$user[0]->m_name?>
                                </h5>
                            </a>
                            <p>
                               <?=substr($user[0]->m_profession,0,50)?> <br />
                               <?=$user[0]->m_current_city?> <br />
                                Last Seen: <?php echo DateTimeFormat($user[0]->last_login_date); ?>						
                               <br />
                               <!--Mentor: <b><?=$user[0]->mentor_id>0 ? BasicInfoUser($user[0]->mentor_id)->m_name:' Not Assigend ';?></b>-->
                            </p>                                        
                        </div>
                        <div class="clearfix"></div>
                        <div class="media-body">                         
                                <div class="heading">
                                     Profession:
                                </div>
                                <div class="detail">
                                    <?=$user[0]->m_profession?>
                                </div>
                                <div class="heading">
                                     Skills:
                                </div>
                                <div class="detail">
                                    <?php 
                                    $words = $user[0]->m_skills ?? ''; // Ensure it's a string
                                    $str_words = !empty($words) ? explode(",", $words) : []; // Prevent passing NULL
                                    ?>
                                    <?php foreach($str_words as $skill){ ?>
                                      <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?=$skill?></span>
                                    <?php } ?>
                                </div>

                            <?php 
                            $user_cert = GetAllCert($user[0]->m_id); 


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
                                    <?=$user[0]->m_city;?>
                                </div>
                                <div class="heading">Employer:</div>
                                <div class="detail">
                                    <?=$user[0]->m_employer?>
                                </div>
                                <div class="heading">Employment Status:</div>
                                <div class="detail">
                                    <?=$user[0]->employment_status?>
                                </div>
                                <div class="heading">Visa Status:</div>
                                <div class="detail">
                                    <?=$user[0]->visa_status?>
                                </div>
                                <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                                <div class="heading">Email</div>
                                <div class="detail">
                                    <?=$user[0]->m_email?>
                                </div>
                                <?php if ($role_id == 2 || $role_id == 8) { ?>
                                    <div class="heading">Visa Valid Till:</div>
                                    <div class="detail">
                                        <?=$user[0]->m_valid_till?>
                                    </div>
                                    <div class="heading">Job Preference City:</div>
                                    <div class="detail">
                                        <?=$user[0]->m_job_preference?>
                                    </div>
                                    <div class="heading">Current Designation:</div>
                                    <div class="detail">
                                        <?=$user[0]->m_current_design?>
                                    </div>
                                    <div class="heading">Desired Designation:</div>
                                    <div class="detail">
                                        <?=$user[0]->m_desired_design?>
                                    </div>
                                    <div class="heading">Current Salary:</div>
                                    <div class="detail">
                                        <?=$user[0]->m_current_salary?>
                                    </div>
                                    <div class="heading">Desired Salary:</div>
                                    <div class="detail">
                                        <?=$user[0]->m_expected_salary?>
                                    </div>
                                    <div class="heading">Field Background:</div>
                                    <div class="detail">
                                        <?=$user[0]->m_f_background?>
                                    </div>
                                    <div class="heading">Navafiz Profile Link:</div>
                                    <div class="detail">
                                        <?=$user[0]->navafiz_profile_link?>
                                    </div>
                                    <div class="heading">Notice Period:</div>
                                    <div class="detail">
                                        <?=$user[0]->m_notice_period?>
                                    </div>
                                    <div class="heading">Remarks:</div>
                                    <div class="detail">
                                        <?=$user[0]->m_add_remarks?>
                                    </div>
                                <?php } ?>
                                <?php if(in_array($session_user_id, IsFeaturedRecruiter())){ ?>
                                <div class="heading">Mobile</div>
                                <div class="detail">
                                    <?= isset($user[0]->m_mobile) ? $user[0]->m_mobile : $user[0]->m_ph_no ?>
                                </div> 
                                <?php } } ?>
                                <div class="heading">Registered On:</div>
                                <div class="detail">
                                    <?php echo DateTimeFormat($user[0]->added_on);?>                            
                                </div>
                                <?php if(isset($user[0]->m_driving_lisence)){ ?>
                                <div class="heading">Driving License:</div>
                                <div class="detail">
                                    <?=$user[0]->m_driving_lisence?>                            
                                </div>
                                <?php } ?>
                                <?php if(isset($user[0]->mentor_id)){ ?>
                                <div class="heading">Mentor:</div>
                                <div class="detail">
                                    <?=$user[0]->mentor_id>0 ? BasicInfoUser($user[0]->mentor_id)->m_name:'';?>
                                </div>
                                <?php } ?>
                                <div class="heading">Mentor:</div>
                                <div class="detail">
                                    <?php 
                                    if($user[0]->mentor_id>0 && !empty(BasicInfoUser($user[0]->mentor_id))) {  
                                    echo BasicInfoUser($user[0]->mentor_id)->m_name;
                                    } else {
                                    echo ' Not Assigend ';
                                    } ?>                     
                                </div>
                        </div>                            
                    </div>
                </div>
            </div>    
        </div> 
        <?php   
            }
        }
        }else{?>
            
        <?php }
        ?>
            </div>
        </div>
<!--        <div class="col-md-2 col-xs-12">
            
        </div>-->
            
        <div class="col-md-2 col-xs-12">
            <div class="row mb-3 text-center">
                <div class="col-12">
                    <a href="<?=site_url('users_list/jobs_by_list/'.$list_id);?>" class="btn btn-primary mr-3">Find Matching Jobs</a>                   
                </div>
            </div>
            <div class="row mb-3 text-center">
                <div class="col-12">
                    <a href="<?=site_url('professionals');?>" class="btn btn-primary mr-3">Find More Candidates</a>                   
                </div>
            </div>
            <h5 class="text-center mb-3">Filter By List Name</h5>
            <div class="row">
              <?php
                if($list_users != 'empty'){
                foreach($list_users as $list){ ?>
                <div class="col-md-12 col-xs-12 mb-2 m-0"> 
                    <?php $count = GetCount($list->id); ?>
                    <?php $list_id==$list->id ? $list_title = $list->name : ''?>
                    <a href="<?=site_url('users_list/users_by_list/'.$list->id)?>" class="btn <?=$list_id==$list->id ? 'btn-secondary':'btn-outline-secondary';?> col-12"><?=$list->name?>  (<?=$count?>) </a>
                </div>
                <?php } }?>  
                <?php 
                $this->db->where('m_status', 1);
                $this->db->where('added_on >= NOW() - INTERVAL 1 DAY', null, false); // use MySQL time
                $new_count = $this->db->count_all_results('jb_member');
                ?>
                <div class="col-md-12 col-xs-12 mb-2 m-0">
                    <a href="<?=site_url('users_list/new_members')?>"
                       class="btn <?=$list_id=='new' ? 'btn-secondary':'btn-outline-secondary';?> col-12">
                       New Members (last 24 hours) (<?=$new_count?>)
                    </a>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
    var timeoutDuration = 5000; 

    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'none'; // Hide success message
        }
    }, timeoutDuration);

    setTimeout(function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.style.display = 'none'; // Hide error message
        }
    }, timeoutDuration);
</script>


<?php $this->load->view('include/footer'); ?>

