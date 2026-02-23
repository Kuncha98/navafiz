<?php $session_user_id = $this->session->userdata('user_id');?>

<style>
.sidenav{
}
.sidenav li{
}
.sidenav li a{
    color: rgba(0,0,0, .9);            
}
.carousel-control-next, #latestjobscarosal .carousel-control-prev{
    margin: -12px;
    font-size: 20px;
    font-weight: normal;
}
.carousel-control-next-icon, .carousel-control-prev-icon{
    border: solid 2px rgba(0,0,0, 0.60);
    padding: 12px;
    background-color: rgba(0,0,0, 0.60);
    font-size: 20px;
}
</style>
<div class="card">
    <div class="card-header">
        <a href="<?=site_url('jobs');?>" style="color: #242426;">
            <b>NAVAFIZ LATEST VERIFIED JOBS</b>
        </a>        
    </div>
</div>
<div id="latestjobscarosal" class="carousel slide" data-ride="carousel" style="margin-top: -10px;">
    <div class="carousel-inner">
      <?php 
      $latest_jobs = LatestJobsList();
      $ji=1;
      foreach($latest_jobs as $job){?>
            <div class="carousel-item <?=$ji==1 ? 'active':''?>">
                <div class="card">            
                    <a href="<?=base_url()?>job/<?=$job->j_id?>/<?php echo $job->j_slug?>" style="color: #242426;">
                        <div class="img" style="width: 100%;height: 200px;background:#ccc url('<?=base_url()?>/assets/uploads/jobs/<?=($job->j_image == "")?"noimage.png":$job->j_image ?>?v=1') center center;background-size: cover;"></div>
                        <div class="card-body" style="font-size: 13px;">                    
                            <b><?=$job->j_title?></b>
                            <hr>                                        
                            <b><?=$job->j_location;?></b>  <span class="float-right"><b><?=date("M d-Y",$job->j_add_date)?></b></span>
                            <p>
                                <?=  substr(strip_tags($job->j_descr, '<>'), 0,200);?>                    
                            </p>                            
                        </div>
                    </a>            
                </div>                
            </div>
       <?php $ji++;
       }?>
    </div>
    <a class="carousel-control-prev" href="#latestjobscarosal" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#latestjobscarosal" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="card">
    <div class="card-header">
        <a href="<?=site_url('events');?>" style="color: #242426;">
            <b>Upcoming Events</b>
        </a>
        
    </div>
    <div class="card-body">
        <?php $upcomming_events = GetUpcomingEventsList();?>
        <?php foreach($upcomming_events as $event){?>
        <div class="event-item text-center" style="border-bottom:solid 1px #ccc;margin: 12px 10px;">
            <p>
                <b><?=$event->title?></b> <br> 
            </p>
            <p class="text-center">                
                <b><?=date("d F Y g:i A",  strtotime($event->event_date));?></b><br>
                <?=$event->date_note;?>
            </p>
            <p>
                <?=$event->address?>
            </p>
            <p>
                <a href="<?=site_url('event/view/'.$event->e_id);?>" class="btn btn-primary" style="background-color: #164885!important;border-color: #164885!important;">Register for Event</a>
            </p>
        </div>
        <?php }?>
    </div>                        
</div>

<div class="card">
    <div class="card-header">
        <a href="<?=site_url('companies');?>" style="color: #242426;">
            <b>Latest Companies</b>
        </a>        
    </div>
</div>
<div id="latestcompaniesslider" class="carousel slide" data-ride="carousel" style="margin-top: -10px;">
    <div class="carousel-inner">
      <?php 
      $latest_companies = LatestCompaniesList();
      //echo "<pre>"; print_r($latest_companies);
      $ji=1;
      foreach($latest_companies as $company){?>
            <div class="carousel-item <?=$ji==1 ? 'active':''?> ">
                <div class="card <?=$company->co_id;?>">            
                    <a href="<?=site_url('companies/company_detail/'.$company->co_id)?>" style="color: #242426;">
                        <div class="img" style="width: 100%;height: 200px;background:#ccc url('<?=base_url(($company->co_logo == "")?"noimage.png":$company->co_logo)?>') center center;background-size: cover;"></div>
                        <div class="card-body" style="font-size: 13px;">                    
                            <b><?=$company->co_name?></b>
                            <hr>                                        
                            <?=$company->co_address;?> 
                        </div>
                    </a>            
                </div>                
            </div>
       <?php $ji++;
      }?>
    </div>
    <a class="carousel-control-prev" href="#latestcompaniesslider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#latestcompaniesslider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<div class="card">    
    <div class="card-body">
        <a href="https://www.youtube.com/channel/UCekQrDwBfQ6z6QnwSlbNDqA?sub_confirmation=1" target="_blank" class="fancybox" fancybox><img src="<?=site_url('nassets/img/youtubelive.jpg');?>" class="img-fluid" /></a>
    </div>                        
</div>

<div class="card">
    <div class="card-header">
        <a href="<?=site_url('notifications/notificationtype/whatshappening');?>" style="color: #242426;">
            <b>Recruitment Support Activity</b>
        </a>
        
    </div>
    <div class="card-body">
       <?php 
       $notifications = FeedRightActivityList();
       ?>
        
        <?php foreach($notifications as $notify){
            if($notify['user_id']>0){
            ?>
        <div class="col-md-12 col-xs-12 mx-auto">
            <div class="alert alert-info">                
                <?php $UserDetails = GetUserDetails($notify['user_id']);?>
                <img src="<?=profile_picture($notify['user_id']);?>" class="profile_img" /><strong><?= !empty($UserDetails->m_name) ? $UserDetails->m_name : 'No Name' ?></strong> <strong><?=$notify['noti_title'];?></strong>
                
                <p>
                    <span class="text-right pull-right">
                        <?= 
                            (!empty($UserDetails) && !empty($UserDetails->m_profession)) 
                                ? $UserDetails->m_profession 
                                : 'No Profession' 
                        ?> | <?= 
                            (!empty($UserDetails) && !empty(GetCategoryName($UserDetails->m_category))) 
                                ? GetCategoryName($UserDetails->m_category) 
                                : 'No Category' 
                        ?> | <?= date('d-M-Y - h:i a', strtotime($notify['added_on'])); ?>
                    </span>

                </p>                                                            
                <hr class="message-inner-separator">
                <p>
                    <?php echo $notify['noti_desc'];
//                    print_r($word);
//                    exit();?>
                </p>
                <p>
                    <?php if(isset($notify['noti_link']) && !empty($notify['noti_link'])){?>
                    <a href="<?=$notify['noti_link']?>" target="_blank">
                        <button type="button" class="btn btn-danger">View</button>
                    </a>
                    <?php }?>
                </p>
            </div>                
        </div>
        <?php }}?>
    </div>                        
</div>









<div class="card">
    <div class="card-header"><b>Trainer / Coach / Mentor</b></div>    
    <ul class="list-group sidenav">
        <li class="list-group-item">
            <a href="<?=site_url('mentors');?>">Navafiz Mentor</a>
        </li>	
        <li class="list-group-item">
            <a href="javascript:void(0);">Professional Trainers</a>
        </li>	        
    </ul>
</div>
<div class="card">
    <div class="card-header"><b>Community</b></div>    
    <ul class="list-group sidenav">
        <li class="list-group-item">
            <a href="<?=site_url('videos');?>">Videos</a>
        </li>	
        <li class="list-group-item">
            <a href="<?=site_url('page/uae-labour-laws');?>">Labour Laws</a>            
        </li>	        
        <li class="list-group-item">
            <a href="<?=site_url('whats-happening');?>">Happenings</a>            
        </li>	        
        <li class="list-group-item">
            <a href="<?=site_url('faqs');?>">FAQ's</a>            
        </li>	        
        <li class="list-group-item">
            <a href="<?=site_url('page/basic-arabic-words');?>">Arabic Words</a>            
        </li>	        
        <li class="list-group-item">
            <a href="<?=site_url('page/important-contact-numbers-in-uae');?>">Contacts</a>            
        </li>	        
        <li class="list-group-item">
            <a href="<?=site_url('job/jobseekertips');?>">Job Hunt Tip</a>
        </li>	        
        <li class="list-group-item">
            <a href="<?=site_url('page/interview-tips');?>">Interview Tips</a>
        </li>	        
        <li class="list-group-item">
            <a href="javascript:void(0);">Blood Donors</a>
        </li>	        
    </ul>
</div>
<div class="card">
    <div class="card-header"><b>Downloads</b></div>    
    <ul class="list-group sidenav">
        <li class="list-group-item">
            <a data-fancybox="samplecv" href="<?=site_url('public-assets/Navafiz_Standard_CV_Updated_Nov_2019.pdf');?>">Sample CV</a>
        </li>	        
    </ul>
</div>
<div class="card">
    <div class="card-header"><b>Useful Links</b></div>    
    <ul class="list-group sidenav">
        <li class="list-group-item">
            <a href="https://gulfnews.com/" target="_blank" rel="nofollow">Gulf News</a>
        </li>	        
        <li class="list-group-item">
            <a href="https://www.khaleejtimes.com/" target="_blank" rel="nofollow">Khaleej Times</a>
        </li>	        
        <li class="list-group-item">
            <a href="https://www.thenationalnews.com/" target="_blank" rel="nofollow">The National</a>
        </li>	        
    </ul>
</div>
<style>
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

</style> 
<div class="card" style="margin:10px 0 -10px 0;">
<div class="card-header"><b>Navafiz Last Logged in Members</b></div>
</div> 
<?php 
$last_login_member_list = top_members_by_last_login();
$ji=1;
foreach($last_login_member_list as $lmember){?>
<div class="card">
<div class="card-body">
    <div class="row"> 
        <div class="col-3" style="padding-left: 0;">
            <div class="avatarpro img-fluid" style="background-image: url('<?=base_url()?>assets/uploads/members/<?=($lmember->m_avatar == "")?"default.png":$lmember->m_avatar?>');">                                                      
                <!--Profile Picture-->
            </div>
        </div>
        <div class="col-9" style="padding-left: 0;">                            
            <a class="member_name" href="<?=site_url('profile/'.$lmember->m_id);?>"> <strong><?=$lmember->m_name?></strong> </a> <br />
            <?=$lmember->m_profession?><br />
            <?=$lmember->m_current_city?><br />
              
               <i style="color: #215374;">Last Seen: <?=DateTimeFormat($lmember->last_login_date);?></i>
             
        </div>

  </div>
</div>
</div>
<?php }?>
