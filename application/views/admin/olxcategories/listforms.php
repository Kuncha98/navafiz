
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
     
      <td><?=$form->c_title?></td>
      
   <!-- <td><?=$form->slug?></td>-->
  
   <td><a href="javascript:void(0)" class='edit_status' id="<?php echo($form->c_id);?>" rel="<?php echo($form->c_status);?>"> <span class="status status-<?=($form->c_status == 0)? "danger": "default"?>"></span></a> &nbsp;&nbsp; <a href="javascript:void(0)" onClick="showEditForm(<?=$form->c_id?>)"><span><i class="icon-clipboard"></i></span></a>&nbsp;&nbsp; <a href="javascript:void(0)" onClick="delForm(<?=$form->c_id?>)"><span><i class="icon-remove5"></i></span></a></td>
  
  
     
    </tr>
    <?php
}
				  }
				  ?>
  </tbody>
</table>
