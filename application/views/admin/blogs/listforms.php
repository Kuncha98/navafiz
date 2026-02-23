<form action='' method=''>
<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      
        <th># </th>
        <th>Image </th>
       <th>Category</th>
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
     
      <td><?=$form->blog_id?></td>
      <td><img src="<?=base_url()?>assets/uploads/blogs/small_thumbs/<?=($form->blog_image == "")? "default.jpg":$form->blog_image?>" width="200" height="100"/></td>
       <td><?=$form->blogc_title?></td>
      <td><?=$form->blog_title?></td>
    <!--   <td><?=$form->i_name?></td>-->
   <!-- <td><?=$form->slug?></td>-->
  
   <td><a href="javascript:void(0)" class='edit_status' id="<?php echo($form->blog_id);?>" rel="<?php echo($form->blog_status);?>" title="change status"> <span class="status status-<?=($form->blog_status == 0)? "danger": "default"?>"></span></a> &nbsp;&nbsp; <a href="javascript:void(0)" onClick="showEditForm(<?=$form->blog_id?>)" title="edit"><span><i class="icon-clipboard"></i></span></a>&nbsp;&nbsp; <a href="javascript:void(0)" onClick="delForm(<?=$form->blog_id?>)" title="delete"><span><i class="icon-remove5"></i></span></a></td>
  
  
     
    </tr>
    <?php
}
				  }
				  ?>
  </tbody>
</table>

  </form>
  