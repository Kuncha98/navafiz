<?php $this->load->view('include/header.php'); ?>


        
<!--         <section class="categories-list-page light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="posts-masonry" class="posts-masonry">
    
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

<section>
    <div class="container-mid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center"></h3>
            </div>

        <?php 
            
            if($videos != "empty"){     
              $i=1;  
            foreach(@$videos as $video){ 
                ?>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div>
                          <div class="card" style="margin-bottom: 15px;" >
                            <a href="<?=base_url()?>videoshow/<?=$video->id?>">
                                <img class="card-img-top" src="<?=$video->image;?>" alt="<?=$video->title?>" style="width:100%">
                            </a>    
                            <div class="card-body" style="height: 70px;">
                              <h5 class="card-title">
                                <a href="<?=base_url()?>videoshow/<?=$video->id?>">
                                   <?=$video->title?>
                                </a>
                               </h5>

                              
                            </div>
                          </div>  
                    </div>
                </div>
                                
                <?php
                       $i++;
                      }
                    } 
                ?>
               
                </div>
            </div>
        </section>

        
        <!-- JAVASCRIPT JS  -->
    <?php $this->load->view('include/footer.php'); ?>
  