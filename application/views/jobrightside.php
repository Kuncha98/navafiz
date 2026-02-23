<div class="col-md-3 col-sm-3 sidebar3" style="padding-top:20px;">
    <div style="margin:0 auto;">
    <script type="text/javascript">
        google_ad_client = "ca-pub-7633066101598672";
        google_ad_slot = "4047734544";
        google_ad_width = 300;
        google_ad_height = 250;
    </script>
    <!-- 300x250newsfun -->
    <script type="text/javascript"
    src="//pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
    </div>
  <div id="mycarousel12" class="carousel slide" >
    <div class="carousel-inner">
      <?php 
        $p=1;
        if($relatedjobs!='empty') {
            foreach(@$relatedjobs as $relatedjob){ 	
                if($p == 1 || $p == 5){?>
      <div class="item <?=($p == 1)?"active" : ""?>" data-id="<?=$p?>">
        <div id="demo-panel-network">
          <div class="panel-heading">
            <h3 class="panel-title">Related Jobs</h3>
          </div>
          <div class="panel-body">
            <?php
	}
	
										?>
            <div class="media pad-all">
              <div class="media-left" >
         
                <img alt="<?=$relatedjob->j_title?>" class="img-square" src="<?=base_url()?>assets/uploads/jobs/small_thumbs/<?=($relatedjob->j_image == "")?"default.png":$relatedjob->j_image?>" width="50">
               
                </span> </div>
              <div class="media-body">
                <p class="text-2x text-thin">
                  <?=$relatedjob->c_name?>
                </p>
                <p class="text-2x text-thin">
                  <?=$relatedjob->j_title?>
                </p>
              
              </div>
              <div class="form-group" style="border-bottom:1px solid #FFF; padding-bottom:12px;"> <a href="<?=base_url()?>job/<?=$relatedjob->j_id?>"  class="btn btn-primary">View Job</a> </div>
            </div>
            <?php
	//}
									  
									   if($p == 4 || $p == 8){
									   ?>
            <div class=""><a href="<?=base_url()?>jobs">Find Jobs</a></div>
          </div>
        </div>
      </div>
      <?php
									   }
$p++;
}
        if($p < 4 || $p < 8){
									   ?>
      <div class=""><a href="<?=base_url()?>jobs">Find Jobs</a></div>
    </div>
  </div>
</div>
<?php
}
					}
				?>
</div>
<div class="panel-footer">
<div class="accordion-inner">
<ul class="pagination">
<?php
    $i=0;
    for($b=1;$b<=8; $b=$b+4){?>
<li data-target="#mycarousel12" data-slide-to="<?php echo $i?>"> <a href="javascript: void(0);"><?php echo $i+1?></a> </li>
<?php $i++; }?>
</div>
</div>
</div>
</div>
