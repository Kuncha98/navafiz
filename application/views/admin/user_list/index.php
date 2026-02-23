<ul class="nav nav-tabs">
    <ul class="nav nav-tabs">

       <li><a href="<?= site_url('admin/user_list/add_user_list')?>" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add New User List</a></li>
      
    </ul>
</ul>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Added By</th>
      <th>Added on</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
		
foreach(@$forms as $form){ 
 
//    exit();
?>
    <tr>
      <td><?=$form->id?></td>

      <td><?=$form->name?></td>
     
      <td><?=$form->description?></td>
      <td><?php $res = GetUserName($form->added_by);echo $res[0]->m_name ?></td>
      <td><?=$form->added_on?></td>
      
    <td><a href="<?=site_url('admin/user_list/edit_user_list/'.$form->id)?>" class="btn btn-success" title="edit">Edit</a></td>
    <td><a href="<?=site_url('admin/user_list/delete_user_list/'.$form->id)?>" onclick="return confirm('Are you sure want to delete ?');" class="btn btn-danger" title="delete">Delete</a></td>
        
    </tr>
    
    <?php
}
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