
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Member Profile List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
     <tr>
       <th>Id</th>
       <th>Image</th>
       <th>Member Name</th>
       <th>Edit</th>
       <th>Delete</th>
      </tr>
    </thead>
  <tbody>

   <?php
    foreach ($forms as $form) {
    ?>
 <tr>
      <td><?=$form->m_id?></td>
      <td class="thumbnail" style=""><img alt="" src="<?=base_url()?>assets/uploads/members/temp/<?=($form->m_avatar == "")?"default.png":$form->m_avatar ?>" width="125" height="75"></td>
     
      <td>
          <?php // $user = GetUserName($form->user_id) ?>
            <?=$form->m_name?>
      </td>
      
      <td><a href="<?=base_url()?>admin/member_certification/edit/<?php echo $form->m_id?>" class="btn btn-success" title="edit">Edit</a></td>
      <td> <a href="<?=base_url()?>admin/member_certification/delete/<?php echo $form->m_id?>" title="delete" class="btn btn-danger" onclick=" return confirm('Are you sure want to delete this profile picture?')">Delete</a></td>
    </tr>
    <?php
  }

	?>
  </tbody>
  </table>

   </div>
  </div>
</div>