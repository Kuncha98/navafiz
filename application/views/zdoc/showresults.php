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
                        <h3>Poll</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li><a href="#">Poll</a> </li>
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
                        <h1>Which is the best job search website in UAE ?</h1>
                        
                            <div id="posts-masonry" class="posts-masonry">
                             
                            
<?php if($answers!='empty') {
			
foreach(@$answers as $answer){ 


?>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= round(($answer->tot_count * 100)/$total_poll_results,0)?>%;"> <span class="sr-only"><?= round(($answer->tot_count * 100)/$total_poll_results,0)?>% Complete</span> </div>
  <span class="progress-type"><?= $answer->answer?></span> <span class="progress-completed"><?= round(($answer->tot_count * 100)/$total_poll_results,0)?>%</span> </div>
<?
}
			  }
			 ?> 
                                
                                
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
