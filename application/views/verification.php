<?php $this->load->view('header.php'); ?>
<body>
<div class="page category-page">
  <!--<div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div>-->
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <div class="search">
    <div class="container-fluid">
      <div class="row">
                                                
      </div>
    </div>
  </div>
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>User Verification</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="#">Home</a> </li>
              <li class="active">Verification</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="col-md-12 col-sm-12 col-xs-12">
           
              <h3 style="text-align:center;">Thanks for activating your account. Login to our site to see the jobs.</h3>
         
                          
                           <br><br>
                            
                            <p style="text-align:center">
                            <a href="<?=base_url()?>user/login" class="btn btn-default btn-lg" style="width:250px;" >
            Sign in now!
          </a></p>
          </div>
        
        </div>
      </div>
    </div>
  </section>
  
  
  
     <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
</div>
</body>

</html>