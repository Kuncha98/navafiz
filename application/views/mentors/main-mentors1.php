
<?php
$session_user_id = $this->session->userdata('user_id');
?>

<div class="container-mid">
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <h2>Navafiz Mentors (<?=count($mentors_list)?>)</h2>
        </div>
        <div class="col-md-6 col-xs-6">
            <a href="<?=site_url('mentors/activity');?>" class="btn btn-outline-dark float-right" style="margin-left: 10px;">Mentors Activity</a>
            &nbsp;
            <a href="<?=site_url('blueuser/adduser');?>" target="_blank" class="btn btn-outline-success float-right" style="margin-left: 10px;">Add Blue User</a>
            &nbsp;
            <a href="<?=site_url('blueuser/listusers');?>" target="_blank" class="btn btn-outline-info float-right" style="margin-right: 10px;">View List of Blue User</a>
            &nbsp;
            <a href="<?=site_url('mentors/quick_job_applicants');?>" target="_blank" class="btn btn-outline-info float-right" style="margin-right: 10px;">List of Easy Jobs Candidates </a>
        </div>
    </div>
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <?php foreach ($mentors_list as $pro_details){?>
                <div class="col-md-6">
                    <div class="card">                
                        <div class="card-body">
                            <?php $member_img  = !empty($pro_details->m_avatar) ? $pro_details->m_avatar:'default.png'; ?>                    
                            <div class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');"></div>
                            <div class="userinfo">
                                <a href="<?=site_url('profile/'.$pro_details->m_id);?>" class="namedesig">
                                    <?=$pro_details->m_name?> 
                                </a>
                                <p>
                                    <?=$pro_details->m_profession?> <br>
                                    <?=  ucwords($pro_details->m_current_city);?> <br />
                                    <span style="color: green;font-weight: bold;font-size: 12px;">(<?= GetRoleName($pro_details->role_id);?>)</span>
                                </p>
                                <p style="font-size: 12px;">
                                    Last Login: <b style="color: #215374;"><?php echo date('d F Y g:i A', strtotime($pro_details->last_login_date));?></b>  
                                </p>
                                <div class="views text-center">


                                </div>
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
                                <div class="heading">Profession Category:</div>
                                <div class="detail">
                                    <?=GetCategoryName(intval($pro_details->m_category));?>
                                </div>
                                <?php 
                                if(in_array($session_user_id, CvReviewTeamList())){
                                ?>
                                    <div class="heading">Mobile Number:</div>
                                    <div cl20328ass="detail">
                                        <?=$pro_details->m_phone;?>
                                    </div>

<!--                                    <div class="heading">Email:</div>
                                    <div class="detail" onselectstart="return false"    >
                                        <?=$pro_details->m_email?>
                                    </div>-->
                                <?php }?>
                                <div class="heading">Profile Link:</div>
                                <div class="detail">
                                    <a href="<?=site_url('profile/'.$pro_details->m_id);?>"><?=site_url('profile/'.$pro_details->m_id);?></a>
                                </div>
                                <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                                <hr>
                                <a href="<?=site_url('mentors/usersby/'.$pro_details->m_id);?>">
                                    Candidates Assigned <b>(<?=CandidatesCountByMentor($pro_details->m_id);?>)</b>                        
                                </a>
                                <hr>
                                <a href="javascript:void(0);">
                                    Resume Approved <b>(<?=ResumeApprovedByMentor($pro_details->m_id);?>)</b>
                                </a>
                                <hr>
                                <a href="<?=site_url('testimonials');?>">
                                    Testimonails <b>(<?=TestimonialByUser($pro_details->m_id);?>)</b>
                                </a>
                                <hr>
                                <a href="<?=site_url('jobs');?>">
                                    Verified Jobs Posted <b>(<?=JobcountByUser($pro_details->m_id);?>)</b>
                                </a>
                                <hr>
                                <a href="<?=site_url('feed/user/'.$pro_details->m_id);?>">
                                    Activity  <b>(<?=FeedCountByUser($pro_details->m_id);?>)</b>                   
                                </a>
                                <br>
                                <br />
                                <?php }?>
                                <div class="heading">Mentor Actions:</div>
                                <div class="detail">
                                    <p>
                                        <a href="<?=site_url('track_steps/sheet/'.$pro_details->m_id.'#mchatbox');?>" class="btn btn-info col-12">Contact <?=$pro_details->m_name?></a>
                                    </p>                            
                                    <?php if(in_array($session_user_id, CvReviewTeamListForVoting())){?>
                                    <a href="<?=site_url('mentors/usersby/'.$pro_details->m_id);?>" class="btn btn-success col-12">Users By Mentor</a>
                                    <p>
                                        <?php if(in_array($pro_details->m_id, $votes_to_list)){?>
                                        <a href="<?=site_url('mentors/removesuper6/'.$pro_details->m_id);?>" class="btn btn-outline-success col-12">Revoke from Super 6</a>
                                        <?php 
                                        }else{?>
                                        <a href="<?=site_url('mentors/addsuper6/'.$pro_details->m_id);?>" class="btn btn-outline-success col-12">Add in Super 6</a>
                                        <?php }?>
                                    </p>
                                    <?php }?>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    <?php if(in_array($session_user_id, CvReviewTeamListForVoting())){?>
                    <?php $mylist = MySuper6List($pro_details->m_id); ?>
                    <?php if(count($mylist)>0){?>
                    <div class="card">
                        <div class="card-body">                    
                            <div class="row">
                                <div class="col-12 text-center">
                                    <b>My Recommendation for Super Six (<?=count($mylist);?>)</b>
                                </div>
                            </div>
                            <div class="row">
                                <?php                        
                                    foreach($mylist as $myvotes){
                                        $name = BasicInfoUser($myvotes)->m_name;?>
                                    <a href="javascript:void(0);" class="btn btn-outline-success col-12" style="margin-top: 6px;"><?=$name?></a>
                                <?php }?>                        
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php $mylist = RecivedRecommendation($pro_details->m_id); ?>
                    <?php if(count($mylist)>0){?>
                    <div class="card">
                        <div class="card-body">                    
                            <div class="row">
                                <div class="col-12 text-center">
                                    <b>Received Recommendation From (<?=count($mylist);?>)</b>
                                </div>
                            </div>                    
                            <div class="row">
                                <?php                        
                                    foreach($mylist as $myvotes){
                                        $name = BasicInfoUser($myvotes)->m_name;?>
                                        <a href="javascript:void(0);" class="btn btn-outline-success col-12" style="margin-top: 6px;"><?=$name?></a>                                
                                    <?php }?>                        
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php }?>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Admin Activity</div>
                <div class="card-body">
                      <div id="NotificationsData">
                         
                      </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>





<script>
 var limit = 50;
    window.onload = loadNotifications(30);    
    function loadNotifications(limit){
        
        var form_data = { 
            limit : limit,       
        };    
        
        $.ajax({
            url   : "<?php echo site_url('notifications/adminactivityajax')?>",
            type  : 'POST',
            data  : form_data,
            success : function(data){
                // alert(data);
                $("#profloading").hide();
                $('#NotificationsData').html(data);
            }
        }); 
    }
    
        function confirmDelete(id,url){        
        var ID = id ;
        var delete_url = url;  
        $.ajax({       
          url: delete_url,      
          type: "POST",    
          data: {type: 'Delete', 'id':ID,},
          success: function (data) {        
              if(data == 1){    
                  console.log("This record deleted successfully");
              }else if(data == 2){       
                  console.log("Not Found!");
              }   
          },
          error: function(error){       
              console.log("Something wrong!");              
          }              
        });
   }




</script>



