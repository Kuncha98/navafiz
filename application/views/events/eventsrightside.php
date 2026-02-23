<div class="col-md-3 col-sm-3 sidebar3" style="padding-top:20px;">
  <br />
<div id="mycarousel12" class="carousel slide" >
<div class="carousel-inner">

  <?php 
    $p=1;
    if($latesevents!='empty') {
			
foreach(@$latesevents as $latesevent){ 
	
	
	
		
?>
  <div class="item <?=($p == 1)?"active" : ""?>" data-id="<?=$p?>">
    <div id="demo-panel-network">
      <div class="panel-heading">
        <h3 class="panel-title">Latest Events</h3>
      </div>
      <div class="panel-body">
        <?php
	
	
										?>
        <div class="media pad-all">
          
          <div class="media-body">
            <p class="text-2x text-thin">
              <?=$latesevent->title?>
            </p>
            <p class="text-2x text-thin">
              <?=date("d-M-Y l",$latesevent->add_date)?>
            </p>
           
          
          </div>
          <div class="form-group" style="border-bottom:1px solid #FFF; padding-bottom:12px;"> <a href="<?=base_url()?>event/<?=$latesevent->e_id?>"  class="btn btn-primary">View event</a> </div>
        </div>
      
       
      </div>
    </div>
  </div>
 <?php
}
	}
 ?>
			  
      </div>
    </div>
  </div>
			

</div>
<div class="panel-footer">
<div class="accordion-inner">
<ul class="pagination">
</div>
</div>
</div>
</div>
