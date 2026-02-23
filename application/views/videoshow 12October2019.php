<?php $this->load->view('header.php'); ?>
<body>
<div class="page category-page">
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <div class="clearfix"></div>
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Videos</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="#">Home</a> </li>
              <li><a href="#">Videos</a> </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="categories-list-page light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="posts-masonry" class="posts-masonry">
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="blog-post">
                  <div class="post-img">
                    <?
		echo $video->embed_code;
		
		?>
                  </div>
                
                  <h3 class="post-title"> <a href="#">
                    <?=$video->title?>
                    </a> </h3>
                 
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </section>
  <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a> 
  
  <!-- JAVASCRIPT JS  -->
  <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>