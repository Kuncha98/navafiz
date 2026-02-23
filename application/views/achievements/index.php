<?php $this->load->view('include/header.php'); 
    $user_id = $this->session->userdata('user_id');
?>
<style type="text/css">
  /* ---- PROFILE CARD USERS ---- */

.profile-content {
  position: relative;
  animation: animatop 0.9s cubic-bezier(0.425, 1.14, 0.47, 1.125) forwards;
  margin-bottom:30px;
}

.profile-content .card {
  padding: 20px;
  padding-bottom:30px;
  border-radius: 0;
  background-color: white;
  position: relative;
  overflow: hidden;
  box-shadow:0 0 4px 2px rgba(0, 0, 0, 0.1);
}
.profile-content .card:after {
  content: '';
  display: block;
  width: 190px;
  height: 300px;
 /* background-color: #337ab7;*/
  position: absolute;
 /* animation: rotatemagic 0.75s cubic-bezier(0.425, 1.04, 0.47, 1.105) 1s both;*/
}
.profile-content .firstinfo {
  z-index: 2;
  position: relative;
}
.profile-content .firstinfo img {
  float:left;
  width: 160px;
  height: 120px;
  margin-right:20px;
}
.profile-content .firstinfo .profileinfo {
  padding: 0px 20px;
}
.profile-content .firstinfo .profileinfo h1 {
  font-size: 24px;
  margin:0;
}
.profile-content .firstinfo .profileinfo h1 a:hover {
  color:#337ab7;  
}
.profile-content .firstinfo .profileinfo h3 {
  font-size: 20px;
  color: #337ab7;
  margin:0;
}
.profile-content .firstinfo .profileinfo p.bio {
  color: #5A5A5A;
  line-height: 1.2;
  font-style: initial;
/*  padding:10px 0; Rizwan */
}
.profile-content .profile-skills span {
  position:relative;
  overflow: hidden;
  background-color:transparent;
  color:#337ab7;
  border:1px solid #337ab7;
  font-size:14px;
  padding:5px 10px;
  border-radius:2px;
  margin-right:5px;
  margin-bottom:5px;
  cursor:pointer;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease- 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.profile-content .profile-skills span:hover {
  background-color:#337ab7;
  color:#FFF;
  border:1px solid #337ab7;
}

.profile-content  .hire-btn {
  position:absolute;
  display:none;
  top:20px;
  right:30px; 
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease- 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.profile-content .hire-btn a {
  margin:0;
  font-weight:600;
  font-size:16px;
  text-transform:capitalize;  
}
.profile-content .hire-btn a i {
  margin-right:5px; 
}
.profile-content:hover .hire-btn {
  display:block;  
}

.btn-default {
  background-color: #29aafe;
  color: #FFF;
  border-radius: 0;
  padding: 10px 30px;
  margin-top: 30px;
  font-weight:600;
  border: 1px solid #29aafe;
  text-transform:uppercase;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease- 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.btn-default:hover {
  background-color: #2088cb;
  color: #FFF;
  border: 1px solid #2088cb;
}
.btn-default i {
  margin-left:10px; 
}

.apply-job {
  position: relative;
  overflow: hidden;
}
.apply-job a {
  margin: 0;
  margin-bottom: 30px;
  display: block;
  font-size: 16px;
}
.apply-job a i {
  margin-right: 10px;
  margin-left:0;
}
.apply-job a.bookmark {
  margin: 0;
  margin-bottom: 30px;
  display: block;
  font-size: 16px;
  background-color: #242424;
  border: 1px solid #242424;
}
.apply-job a.bookmark:hover {
  background-color: transparent;
  color: #242424;
}
</style>
<section class="categories-list-page light-grey"> 
  <div class="container">
    <div class="row"> 
      <div class="col-md-12 col-sm-12 col-xs-12 nopadding">       
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php $this->load->view('notification/notification-messages');?>
          <div class="apply-job"> <a href="<?=base_url('achievements/post')?>" class="btn btn-default" >Add Achievement</a>  
          </div>
             <?php if(count($achievements)>0) {     
          foreach($achievements as $achievement){ 
          ?>
          <div class="profile-content">
            <div class="card">
              <div class="firstinfo">
                  <?php
                    $user_detail = GetUserDetails($achievement->user_id);
                    $user_picture = empty($user_detail->m_avatar) ? 'default.png' : $user_detail->m_avatar;
                  ?>
                  <img src="<?=site_url('assets/uploads/members/'.$user_picture);?>" alt="" class="img-circle img-responsive" />
                  <div class="profileinfo">
                      <h1> <a href="#">  <?=$achievement->title?> </a></h1>
                      <h3>
                          <a href="<?=base_url('profile/'.$achievement->user_id);?>" target="_blank">
                              <?=$user_detail->m_name;?>
                          </a>                          
                      </h3>
                      <p class="bio"><?=$achievement->description?></p>                   
                      <?php if($user_id==$achievement->user_id){?>
                      <div class="hire-btn" style="display: block;"> 
                          <a href="<?=base_url('achievements/post/'.$achievement->id);?>" class="btn-default" > <i class="fa fa-edit" style="margin-top: 0; font-size: 14px; color: #fff;"></i> Edit</a>
                      </div>
                      <?php }?>
                      <?php if(in_array($user_id,array(10,3797))){?>
                      <div class="hire-btn" style="top: 70px;display:block;"> 
                          <a href="<?=base_url('achievements/delete/'.$achievement->id);?>" class="btn-default" onclick="return confirm('Are you sure you want to delete?')" > Delete</a>
                      </div>
                      <?php }?>
                  </div>
              </div>
            </div>
          </div>
          <?php }
            }?> 
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('include/footer.php'); ?>