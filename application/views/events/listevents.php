<?php if($events!='empty') {

foreach(@$events as $event){ 
?>

<div class="row" style="border:1px solid #CCC; margin-left:4px; margin-bottom:10px; padding:10px;">
  <div class="col-md-8 col-sm-8" >
    <img src="<?=site_url('event/'.$event->e_id);?>" />
    <h4 style="font-weight:bold;"><a href="<?=base_url()?>event/<?=$event->e_id?>">
      <?=$event->title?>
      </a>  </h4>
    <ul class="blog-info">
      <li><i class="fa fa-calendar"></i>
        <?=date("d-M-Y l",strtotime($event->event_date));?>
      </li>     
    </ul>
  </div>
</div>
<?php
} }?>
<div class="clear"></div>
<div align="center" style="padding:20px 0 10px 0px;"><?php echo($paging_link);?></div>
