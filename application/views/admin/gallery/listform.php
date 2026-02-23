
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>#</th>
    
      <th>name</th>
      <th>Image</th>
   
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($cgallery!='empty') {
			
foreach(@$cgallery as $gallery){ 

?>
    <tr>
      <td><?=$gallery->id?></td>
     
      <td><?=$gallery->name?></td>
     
      <td><img src="<?=base_url()?>assets/uploads/gallery/small_thumbs/<?=$gallery->image?>?<?=time()?>" width="100" height="100" /></td>
     
      <td><!--<button class="btn btn-info" type="button" onClick="edit_cgalleryform(<?=$gallery->id?>)"><span><i class="icon-copy2"></i></span></button>-->
        <button class="btn btn-danger" type="button" onClick="del_cgallery(<?=$gallery->id?>)"><span><i class="icon-remove2"></i></span></button></td>
    </tr>
    <?php
}
				  }
				  ?>
  </tbody>
</table>
