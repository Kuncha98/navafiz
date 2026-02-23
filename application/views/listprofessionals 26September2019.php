<div id="cats-masonry">
<?php if($professionals!='empty') {
		
foreach(@$professionals as $professional){ 

?>
  <div class="col-md-4 col-sm-6 col-xs-12"> <?php /*?><a href="#"><?php */?>
    <a href="<?=base_url()?>professional/<?=$professional->m_id?>">
    <div class="company-list-box"   style="height:260px;"> <span class="company-list-img">
     <?php if($professional->m_avatar !=""){ ?>
        <img src="<?=base_url()?>assets/uploads/members/<?=($professional->m_avatar == "")?"default.png":$professional->m_avatar?>" class="img-responsive" alt="<?=$professional->m_name?>">
     
     <?php }else{ ?>        
        <img src="<?=base_url()?>assets/uploads/members/<?=($professional->m_avatar == "")?"default.png":$professional->m_avatar?>" class="img-responsive" alt="<?=$professional->m_name?>">
    <?php }  ?>
      </span>
      <div class="company-list-box-detail">
                <h5>
                  <?=$professional->m_name?>
                </h5>
                <p>
                  <?=substr($professional->m_profession,0,20)?>
                </p>
                <div class="ratings"> <?=$professional->m_city?></div>
              
             <!-- //===-->
             <div class="media-body"> 
                      <!-- <div class="pull-right">
                                                            <a href="<?=base_url()?>professional/<?=$professional->m_id?>" class="btn btn-default btn-sm">View</a>
                                                        </div>-->
                     
                      <div><small><strong>Profession: </strong>
                        <?=$professional->m_profession?>
                        </small></div>
                      <div><small><strong>Current City:</strong>
                        <?=$professional->m_current_city?>
                        </small></div>
                      <div><small><strong>Employer:</strong>
                        <?=$professional->m_employer?>
                        </small></div>
                      <div><small><strong> Employment Status:</strong>
                        <?=$professional->employment_status?>
                        </small></div>
                      <div><small><strong>Visa Status:</strong>
                        <?=$professional->visa_status?>
                        </small></div>                      
                    </div>
            <!--  //======-->
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              </div>
    </div>
    </a>
    <?php /*?></a><?php */?> </div>
    <?php
}
			  }
			  
			   ?>
               <div class="clear"></div>

<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
              <div class="pagination-box clearfix">
              <?php echo($paging_link);?>
               <!-- <ul class="pagination">
                  <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                </ul>-->
              </div>
            </div>



  <!--<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="load-more-btn">
      <button class="btn-default"> Load More <i class="fa fa-refresh"></i> </button>
    </div>
  </div>-->
</div>
