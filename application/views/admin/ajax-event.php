 <option>-Select Event-</option>
<?php foreach($events as $event){ ?>
<option value="<?=$event->e_id?>"> <?=$event->title?> </option>
<?php } ?>