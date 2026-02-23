<?php $this->load->view('include/header.php'); ?>

  <section class="categories-list-page light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="posts-masonry" class="posts-masonry">
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="blog-post">
                  <div class="post-img">
                    <?php 
                  		echo $video->embed_code;
                  		
                  		?>
                  </div>
                
                  <h3 class="post-title"> 
                    <?=$video->title?>
                     </h3>
                 
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- JAVASCRIPT JS  -->
  <?php $this->load->view('include/footer.php'); ?>
