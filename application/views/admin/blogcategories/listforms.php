
<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      
      <th>Name</th>
    
     <!-- <th>Slug</th>-->
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
			
foreach(@$forms as $form){ 

?>
    <tr> 
     
      <td><?=$form->blogc_title?></td>
      
   <!-- <td><?=$form->slug?></td>-->
  
   <td><a href="javascript:void(0)" class='edit_status' id="<?php echo($form->blogc_id);?>" rel="<?php echo($form->blogc_status);?>"> <span class="status status-<?=($form->blogc_status == 0)? "danger": "default"?>"></span></a> &nbsp;&nbsp; <a href="javascript:void(0)" onClick="showEditForm(<?=$form->blogc_id?>)"><span><i class="icon-clipboard"></i></span></a>&nbsp;&nbsp; <a href="javascript:void(0)" onClick="delForm(<?=$form->blogc_id?>)"><span><i class="icon-remove5"></i></span></a></td>
  
  
     
    </tr>
    <?php
}
				  }
				  ?>
  </tbody>
</table>
