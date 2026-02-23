
<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th>Image</th>
      <th>Category</th>
      <th>Name</th>
      <th>Added By</th>
       <th>Added Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
			
foreach(@$forms as $form){ 

?>
    <tr>
      <td class="thumbnail" style="text-align:left"><img alt="" src="<?=base_url()?>/assets/uploads/jobs/<?=($form->j_image == "")?"noimage.png":$form->j_image ?>" width="200" height="150"></td>
      <td><?=$form->c_name?></td>
      <td><?=substr($form->j_title,0,50)?></td>
      <td><?=($form->j_addedby == 0)?"Admin":$form->m_name?></td>
        <td><?=date("M d-Y",$form->j_add_date)?></td>
      <td><a href="javascript:void(0)" class='edit_status' id="<?php echo($form->j_id);?>" rel="<?php echo($form->j_status);?>" title="change status"> <span class="status status-<?=($form->j_status == 0)? "danger": "default"?>"></span></a> &nbsp;&nbsp; <a href="javascript:void(0)" onClick="showEditForm(<?=$form->j_id?>)" title="edit"><span><i class="icon-clipboard"></i></span></a>&nbsp;&nbsp; <a href="javascript:void(0)" onClick="delForm(<?=$form->j_id?>)" title="delete"><span><i class="icon-remove5"></i></span></a></td>
    </tr>
    <?php
}
				  }
				  ?>
  </tbody>
</table>
<div class="clear"></div>
<div align="center" style="padding:20px 0 10px 0px;"><?php echo($paging_link);?></div>
