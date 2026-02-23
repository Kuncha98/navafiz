
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />


   

<a href="<?=base_url('admin/jobs/addjobseekerform')?>" class="btn btn-success m-4" id=""><i class="fa fa-plus"></i> Add Job Tips</a>
      
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Job Titles List</h6>
</div>
  <div class="card-body">
  <div class="table-responsive">
      
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Title</th>
      <th>Added Date</th>
      <th>Action</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
			
foreach(@$forms as $form){ 

?>
    <tr>
     
      <td><?=$form->st_title?></td>
      
        <td><?=date("M d-Y",strtotime($form->st_add_date))?></td>
      <td> <?php
      
	  if ($form->st_status == 0) {
                            ?>
                  <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/jobs/publishd/<?php echo $form->st_id; ?>">publish</a>
                  <?php
                            } else {
                            ?>
                  <a class="label label-success" title="Publishd" href="<?php echo base_url(); ?>admin/jobs/unpublishd/<?php echo $form->st_id; ?>">unpublish</a>
                  <?php
                            }
                            ?></td>
    
      <td>
          <a href="<?=base_url()?>admin/jobs/editjobtips/<?php echo($form->st_id);?>" class="btn btn-success" title="edit">Edit</a>
     </td>
     <td>
         <a href="<?=base_url()?>admin/jobs/deletejobseeker/<?php echo($form->st_id);?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this job tip?')" title="delete">Delete</a>
     </td>
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
 
