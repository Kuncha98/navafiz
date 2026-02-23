


<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Pages List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Name</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
<?php if($pages!='empty') {
			
foreach(@$pages as $page){ 

?>
    <tr>
      <td><?=$page->name?></td>
    
      <td> <a href="<?=site_url('admin/main/editpage').'/'.$page->id?>" class="btn btn-success">Edit</a> </td>
      
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
