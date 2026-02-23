<?php $this->load->view('include/header'); 
$user_id = $this->session->userdata('user_id');?>
<style>
    .card{
        margin-bottom: 30px;
        position: relative;
        font-size: 14px;        
    }
    .card:hover{
        background-color: rgba(204, 199, 199, 0.125);
    }
    .card .card-body{
        line-height: 25px;
    }
    .profile_img {
        border-radius: 50% !important;
        border: 3px solid #215374;
        display: block;
        width: 100px;
        height: 110px;
        background-size: cover;
        margin: 0px auto 5px auto;
    }
    .mentorname{
        position: absolute;
        right: 15px;
        top: 15px;
    }
    
    .testimonial-card a{
        color:#000000;
    }
    
    @media screen and (max-width: 450px){
        .tabs-navafiz a{
            padding-right: 68px;
            padding-left: 85px;
            margin-bottom: 13px;
        }
    }
    
    @media screen and (max-width: 400px){
        .tabs-navafiz a{
            padding-right: 68px;
            padding-left: 85px;
            margin-bottom: 13px;
        }
    }
    
</style>
<div class="container-mid">
  <div class="row"> 
    <div class="col-md-12 col-xs-12 text-center">
      <?php $this->load->view('notification/notification-messages');?>
        <div class="card">
            <div class="card-body">
                <div id="button_add_testimonails">
                    <a href="<?=base_url('testimonials/post');?>" class="btn btn-primary float-right" >Add Testimonial</a>
                </div>
                <div id="testimonails_heading">
                    <h2>Navafiz Success Stories</h2>
                    <b>Dear members, your success is our success, don't forget to share your happiness with us to motivate navafiz volunteers & other job seekers.</b> 
                </div>
                
                
            </div>
        </div>
        <div class="row mb-3 tabs-navafiz">
          <div class="col-md-6 col-sm-12">
            <a class="mr-3">Page Views: <i><?= $page_views ?></i></a>
            <a href="<?=site_url('find-job');?>" class="btn btn-primary mr-3">Find Job</a>                    
            <a href="<?=site_url('professionals');?>" class="btn btn-primary mr-3">Find Professionals</a>
            <a href="<?=site_url('event');?>" class="btn btn-primary">Events and Seminars</a>
           </div>
        </div>
          <div class="apply-job"> 
              
          </div>
          <div class="row">
            <?php if(count($achievements)>0) {
            foreach($achievements as $achievement){ 
            ?> 
              
            <div class="col-md-6">
                <?php
                    $user_detail = BasicInfoUser($achievement->user_id);
                    $user_picture = empty($user_detail->m_avatar) ? 'default.png' : $user_detail->m_avatar;
                    $mentor_info = BasicInfoUser($user_detail->mentor_id);                    
                ?> 
                <div class="testimonial-card">
                    <a href="<?=site_url('testimonials/testimonial_detail/'.$achievement->id);?>">
                        <div class="card" style="margin-bottom: 20px;">                                        
                            <div class="card-body text-center" id="prof_info">                               
                                <?php if(isset($mentor_info->m_name) && !empty($user_detail->m_id)){?>
                                <button class="btn btn-outline-success mentorname">Mentor: <b><?=$mentor_info->m_name?></b></button>                        
                                <?php }?>   
                                <span class="profile_img rounded" style="background-image: url('<?=site_url('assets/uploads/members/'.$user_picture);?>');"></span>
                                <b style="color: #215374;"><?= $user_detail->m_name. '  ' . '(' . $user_detail->m_profession . ')';?></b>
                                <br>
                                <b><?=$achievement->title?></b>                        
                                <p class="card-text"><?=$achievement->description?></p>
                                <p class="text-center"><?=DateFormat($achievement->added_on)?></p>
                                <?php if($user_id==$achievement->user_id){?>
                                <!--<a href="<?=base_url('testimonials/post/'.$achievement->id);?>" class="btn btn-primary">Edit</a>-->
                                <?php }?>
                                <?php if(in_array($user_id,  CvReviewTeamList())){?>
                                <a href="<?=base_url('testimonials/delete/'.$achievement->id);?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger">Delete</a>
                                <?php }?>
                            </div>
                        </div>
                    </a>
                </div>
           </div>
            <?php }}?>
        </div>
    </div>
  </div>
</div>
<?php $this->load->view('include/footer'); ?>