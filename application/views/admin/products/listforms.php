<style>
    .fa-fnt{
        font-size:12px;
    }
    #sts-change .red{
        color:red;
    }
    #sts-change .green{
        color:green;
    }
</style>

<a href="<?=site_url('admin/classified/add_product')?>" class="btn btn-success m-4"><i class="fa fa-plus"></i>Add Product</a>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Products List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      
        <th>Id </th>
        <th>Image </th>
        <th>Member </th>
        <th>Name</th>
        <th>Category</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
			
foreach(@$forms as $form){ 
//print_r($form->pro_member_id);
//exit();
?>
    <tr> 
     
      <td><?=$form->pro_id?></td>
      <td><img src="<?=base_url()?>nassets/products_img/<?=($form->pro_image == "")? "default.jpg":$form->pro_image?>" width="200" height="100"/></td>
      
       <td><?php $user = GetUserName($form->pro_member_id);
     ?>
       <?php if(isset($user[0]->m_name)){ 
            $name = $user[0]->m_name;

       }else{
           $name = 'Member not Exists';
       }?>
           <?=$name?>
       </td>
       <td><?=$form->pro_title?></td>
      <td>
          <?php $cat = GetCategoryName($form->pro_category_id);?>
          <?=$cat?>
      </td>
     <td id="sts-change">
         <a href="javascript:void(0)" class='edit_status' id="<?php echo($form->pro_id);?>" rel="<?php echo($form->pro_status);?>" title="change status">
             <?php if($form->pro_status == 0){ 
                 
             echo "<i class='fa-fnt fas red fa-circle fa-1x'></i>";
             }else{
              echo "<i class='fa-fnt fas green fa-circle fa-1x'></i>";
             }
              ?>
             </a> &nbsp;
             
        <!--<a href="javascript:void(0)" class='edit_status' id="<?php echo($form->pro_id);?>" rel="<?php echo($form->pro_status);?>" title="change status"> <span class="status status-<?=($form->pro_status == 0)? "danger": "default"?>"></span></a>--> 
        
     </td>
     <td>
         <a href="javascript:void(0)" onClick="showEditForm(<?=$form->pro_id?>)" class="btn btn-success" title="edit">Edit</a>
     </td>
     <td>
         <a href="<?=site_url('admin/classified/delete_product').'/'.$form->pro_id?>" onclick="return confirm('Are you sure to delete this product')" class="btn btn-danger" title="delete">Delete</a>
     </td>
     </tr>
    <?php
}
    }else{
        echo "EMpty";
       }
     ?>
  </tbody>
</table>
      
 </div>
</div>
</div>

  