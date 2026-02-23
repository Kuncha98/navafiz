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
                            <?php 
			$i=1;
			
if($videos != "empty"){		


	
foreach(@$videos as $video){ 


      
      

			  ?>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="<?=base_url()?>videoshow/<?=$video->id?>">
                                                <img src="<?=$video->image;?>" alt="<?=$video->title?>" class="img-responsive">
                                            </a>
                                        </div>
                                      
                                        <h4 class="post-title">
                                <a href="<?=base_url()?>videoshow/<?=$video->id?>">
                                   <?=$video->title?>
                                </a>
                            </h4>
                                     
                                    </div>
                                </div>
                                
                            <?php
	$i++;
		
	}
	
	
}
				
				  ?>
    
                                
                                
                                
                                
                                
                                
                                
                            </div>
                            <!--<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li>
                                            <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>-->
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