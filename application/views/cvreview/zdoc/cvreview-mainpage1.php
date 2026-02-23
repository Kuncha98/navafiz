<?php $this->load->view('header.php'); ?>

<body>
<div class="page category-page"> 
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <section class="home-box-tabs">
    <div class="container-fluid" style="background: #fff;">
        <div class="row-fluid">
            <h3>Navafiz Profile</h3>
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('professional/'.$user_id);?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">View Profile</div>
                        <div class="status">My Digital Resume</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('edit-profile');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Edit Profile</div>
                        <div class="status">Update Resume</div>
                    </a>
                </div>
            </div>
            
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
    </div>
</section>
  <?php $this->load->view('footerbottom.php'); ?>   
</div>
</body>
</html>