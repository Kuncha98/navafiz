<?php if($products!='empty') {
		
foreach(@$products as $product){ 

?>

<!--<div class="col-md-2 col-sm-3 gallery-item" style=" margin-left:auto; margin-right:auto; text-align:center;">
  
  <img alt="" src="<?=base_url()?>assets/uploads/products/<?=($product->pro_image == "")?"default.png":$product->pro_image?>" width="165" height="165" class="img-responsive" style="display:inline;">
 
  <div class="col-md-4 col-sm-4" style="min-height:10px; padding-top:8px; padding-bottom:8px; text-align:center; background:#f0f0f0; margin-bottom:10px; width:165px; min-height:70px;"> <span>
    <?=ucwords(substr($product->m_name,0,15))?>
    </span>
    <p style="min-height:18px;">
      <?=substr($product->pro_title,0,20)?>
    </p>
    
    <a href="<?=base_url()?>product/<?=$product->pro_id?>" class="btn btn-primary">View Detail</a> </div>
</div>-->
<div class="col-md-2 col-sm-2 gallery-item" style=" margin-left:auto; margin-right:auto; text-align:center;">
  <div>
  <img alt="<?=$product->pro_title?>" src="<?=base_url()?>assets/uploads/products/<?=($product->pro_image == "")?"default.png":$product->pro_image?>" width="250" height="180" class="img-responsive" style="display:inline;">
 </div>
 <div style="background:#f0f0f0; margin-bottom:10px;"><p><?=ucwords(substr($product->m_name,0,15))?></p>
 <p> <?=substr($product->pro_title,0,20)?></p>
  <a href="<?=base_url()?>product/<?=$product->pro_id?>" class="btn btn-primary">View Detail</a></div>
  
</div>




<?php
}
			  }
			  
			   ?>
<div class="clear"></div>
<div align="center" style="padding:20px 0 10px 0px;"><?php echo($paging_link);?></div>