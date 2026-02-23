<?php
if(!empty($images) && $images!='empty'){
    foreach(@$images as $images){?>
    <div class="col-md-3">
            <a href="<?=base_url('uploads')?>/event_gallery/<?php echo $images->event_gallery_image;?>" data-fancybox="images" data-width="2048" data-height="1365"><img class="mb-2" src="<?=site_url('uploads')?>/event_gallery/<?php echo $images->event_gallery_image;?>" width="280" height="200" alt=""></a>
    </div>
<?php }} ?>		