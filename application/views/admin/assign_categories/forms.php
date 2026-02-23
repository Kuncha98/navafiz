
<ul class="nav nav-tabs">
    <ul class="nav nav-tabs">

        <li><a href="<?= site_url('admin/profile_questions/add_question')?>" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Assign New Category</a></li>
      
    </ul>
</ul>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Profile Questions List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Option 1</th>
      <th>Option 2</th>
      <th>Option 3</th>
      <th>Type</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
		
foreach($forms as $form){ 

?>
    <tr>
      <td><?=$form->id?></td>
      <td><?=$form->title?> </td>
      <td><?=$form->option_1?></td>
      <td><?=$form->option_2?></td>
      <td><?=$form->option_3?></td>
      <td><?=$form->type?></td>
      
      <td><a href="<?=site_url('admin/profile_questions/edit_question').'/'.$form->id?>" class="btn btn-success" title="edit">Edit</a></td>
      <td><a href="<?=site_url('admin/profile_questions/delete_question').'/'.$form->id?>" class="btn btn-danger" onClick="return confirm('Are you Sure want to delete this job portal?')">Delete</a></td>
        
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