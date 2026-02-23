
<div class="col-md-3 col-sm-3 sidebar3" style="padding-top:20px;">
<div class="" style="margin-bottom: 12px;"><a class="btn btn-primary" href="<?=base_url()?>professionals">Find Professionals</a></div>
<div style="margin:0 auto;margin-bottom: 12px; ">
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
<br>
<div>
    <div class="fb-page" data-href="https://www.facebook.com/Navafizdotcom/" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Navafizdotcom/"><a href="https://www.facebook.com/Navafizdotcom/">Navafiz</a></blockquote></div></div>
</div>

<div id="mycarousel12" class="carousel slide" >
<?php 
    $p=1;
    if($relatedprofiles!='empty') {
	
    foreach(@$relatedprofiles as $relatedprofile){ 

            if($p == 1 || $p == 5)
            {

		
?>
      <div class="item <?=($p == 1)?"active" : ""?>" data-id="<?=$p?>">
        <div id="demo-panel-network">
          <div class="panel-heading">
            <h3 class="panel-title">Professional</h3>
          </div>
          <div class="panel-body">
            <?php
	}
	
										?>
            <div class="media pad-all">
              <div class="media-left" >
                <?php
   if($relatedprofile->facebook_id !="")
   {
   ?>
                <img alt="<?=$relatedprofile->m_name?>" class="img-circle" src="http://graph.facebook.com/<?=$relatedprofile->facebook_id?>/picture" width="50">
                <?php
   }
   else
   {
   ?>
                <img alt="<?=$relatedprofile->m_name?>" class="img-circle" src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($relatedprofile->m_avatar == "")?"default.png":$relatedprofile->m_avatar?>" width="50">
                <?php
   }
  ?>
                </span> </div>
              <div class="media-body">
                <p class="text-2x text-thin">
                  <?=$relatedprofile->m_name?>
                </p>
                <p class="text-2x text-thin">
                  <?=$relatedprofile->c_name?>
                </p>
                <p class="text-muted">
                  <?=$relatedprofile->m_experience?>
                </p>
                <p class="text-muted">
                  <?=$relatedprofile->m_city?>
                </p>
              </div>
              <div class="form-group" style="border-bottom:1px solid #FFF; padding-bottom:12px;"> <a href="<?=base_url('professional/'.$relatedprofile->m_id)?>"  class="btn btn-primary">Navafiz Profile: <?=base_url('professional/'.$relatedprofile->m_id)?></a> </div>
            </div>
            <?php
	//}
									  
									   if($p == 4 || $p == 8){
									   ?>
            <div class=""><a href="<?=base_url()?>professionals">Find Professionals</a></div>
          </div>
        </div>
      </div>
      <?php
									   }
$p++;
}
	   if($p < 4 || $p < 8){
									   ?>
      <div class=""><a  class="btn btn-primary" href="<?=base_url()?>professionals">Find Professionals</a></div>
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
                       for($b=1;$b<=8; $b=$b+4){ 
?>
<li data-target="#mycarousel12" data-slide-to="<?php echo $i?>"> <a href="javascript: void(0);"><?php echo $i+1?></a> </li>
<?php
						$i++; }?>
</div>
</div>
</div>
</div>
