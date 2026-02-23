<?php $this->load->view('header.php'); 
    $user_id = $this->session->userdata('user_id');
?>

<body>
<div class="page category-page">
<?php $this->load->view('pagetop.php'); ?>
<section class="categories-list-page light-grey"> 
  <div class="container">
    <div class="row"> 
      <div class="col-md-12 col-sm-12 col-xs-12 nopadding">       
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php $this->load->view('notification/notification-messages');?>
         <div class="apply-job"> <a href="<?=base_url('achievements/post')?>" class="btn btn-default" >Add Achievement</a>  </div>
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
                          <a href="<?=base_url('achievements/post/'.$achievement->id);?>" class="btn-default" > <i class="fa fa-edit"></i> Edit</a>
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
          <?php }}?>           
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('footerbottom.php'); ?>
<script type="text/javascript">
$(document).ready(function()){
    /*$('#posts-masonry').imagesLoaded(function() {
        $('#posts-masonry').isotope({
            layoutMode: 'masonry',
            transitionDuration: '0.3s'
        });
    });*/
});
</script> 
</div>
</body>
</html>