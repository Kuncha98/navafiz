<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="profile-card"> 
    <!--<div class="banner">
        <img src="images/building.jpg" alt="" class="img-responsive">
    </div>-->
    <div class="user-image">      
        <img src="<?=base_url()?>assets/uploads/members/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" class="img-responsive img-circle" alt="<?=$profile->m_name?>">      
    </div>
    <div class="card-body">
      <h3>
        <?=$profile->m_name?>
      </h3>
      <span class="title">
      <?=$profile->m_profession?>
      </span> </div>
<!--    <ul class="social-network social-circle onwhite">
      <li><a href="<?=$profile->m_fb?>" target="_blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
      <li><a  href="<?=$profile->m_tw?>" target="_blank" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
      <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
      <li><a href="<?=$profile->m_lk?>" target="_blank" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
    </ul>-->
    
  </div>
    <div class="profile-nav">
      <div class="panel">
        <ul class="nav nav-pills nav-stacked">
            <li class=<?=($this->uri->segment(1) == "profile")? "active" : ""?>> <a href="<?=base_url()?>profile"> <i class="fa fa-user"></i> Profile</a> </li>
            <li class=<?=($this->uri->segment(1) == "summary-career")? "active" : ""?>> <a href="<?=base_url('summary-career')?>"> <i class="fa fa-user"></i> Summary of Career</a> </li>
            
            <li class=<?=($this->uri->segment(1) == "employer")? "active" : ""?>> <a href="<?=base_url()?>employer"> <i class="fa fa-file-o"></i>Employment History </a> </li>
            <li class=<?=($this->uri->segment(1) == "education")? "active" : ""?>> <a href="<?=base_url()?>education"> <i class="fa fa-edit"></i> Education</a> </li>
            <li class=<?=($this->uri->segment(1) == "skills")? "active" : ""?>> <a href="<?=base_url()?>skills"> <i class="fa fa-edit"></i> Skills</a> </li>

            <li class=<?=($this->uri->segment(1) == "reference")? "active" : ""?>> <a href="<?=base_url()?>reference"> <i class="fa fa-file-o"></i>Reference </a> </li>
            <li class=<?=($this->uri->segment(1) == "social-media")? "active" : ""?>> <a href="<?=base_url()?>social-media"> <i class="fa fa-file-o"></i>Social Media </a> </li>
            <li class=<?=($this->uri->segment(1) == "skills")? "active" : ""?>> <a href="<?=base_url()?>member/successstory"> <i class="fa fa-edit"></i> Success Story</a> </li>
            <li class=<?=($this->uri->segment(1) == "change-password")? "active" : ""?>> <a href="<?=base_url()?>change-password"> <i class="fa fa-file-o"></i>Change Password </a> </li>
            <li class=<?=($this->uri->segment(1) == "myjobs")? "active" : ""?>> <a href="<?=base_url()?>myjobs"> <i class="fa fa-user"></i> My Posted Jobs</a> </li>
            <li class=<?=($this->uri->segment(1) == "membercv")? "active" : ""?>> <a href="<?=base_url()?>membercv"> <i class="fa fa-user"></i> Upload Cv</a> </li>
            <!-- <li class=<?=($this->uri->segment(1) == "myjobs")? "active" : ""?>> <a href="<?=base_url()?>review/<?php echo $this->session->userdata('user_id') ?>"> <i class="fa fa-user"></i> Review My CV</a> </li>-->
        </ul>
      </div>
    </div>
</div>
    