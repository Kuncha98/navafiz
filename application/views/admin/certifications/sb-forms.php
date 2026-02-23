
<?php 
//print_r($forms);
//exit();

?>

<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
   <ul class="nav nav-tabs">
    
       <li id="add" class="m-4"><a href="<?=base_url()?>admin/member_certification/add" id="showAddForm" class="btn btn-success"><i class="fa fa-plus"></i> Add Certification</a></li>

   </ul>


<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Certifications List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
     <tr>
       <th>Id</th>
       <th>Image</th>
       <th>Title</th>
       <th>Member Name</th>
       <th>Description</th>
       <th>Duration</th>
       <th>Edit</th>
       <th>Delete</th>
      </tr>
    </thead>
  <tbody>

   <?php
    foreach ($forms as $form) {
    ?>
 <tr>
      <td><?=$form->c_id?></td>
      <td class="thumbnail" style=""><img alt="" src="<?=base_url()?>nassets/profile/courses-ceritificates/<?=($form->certification_file == "")?"noimage.png":$form->certification_file ?>" width="125" height="75"></td>
      <td><?=$form->c_title?></td>
      <td>
          <?php $user = GetUserName($form->user_id) ?>
            <?=$user[0]->m_name?>
      </td>
      <td><?=$form->c_description?></td>
      <td><?=$form->c_duration?></td>
      <td><a href="<?=base_url()?>admin/member_certification/edit/<?php echo $form->c_id.'/'.$form->user_id;?>" class="btn btn-success" title="edit">Edit</a></td>
      <td> <a href="<?=base_url()?>admin/member_certification/delete/<?php echo $form->c_id?>" title="delete" class="btn btn-danger" onclick=" return confirm('Are you sure want to delete this certificate?')">Delete</a></td>
    </tr>
    <?php
  }

	?>
  </tbody>
  </table>

   </div>
  </div>
</div>

<script>


$(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>