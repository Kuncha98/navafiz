
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />



<a href="<?=base_url()?>admin/jobs/addjobtitle" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Job Titles</a>
      
  
        
           
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
     
      <td><?=$form->jt_title?></td>
      
        <td><?=date("M d-Y",strtotime($form->jt_add_date))?></td>
      <td> <?php
      
	  if ($form->jt_status == 0) {
                            ?>
                  <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/jobs/publishd/<?php echo $form->jt_id; ?>">publish</a>
                  <?php
                            } else {
                            ?>
                  <a class="label label-success" title="Publishd" href="<?php echo base_url(); ?>admin/jobs/unpublishd/<?php echo $form->jt_id; ?>">unpublish</a>
                  <?php
                            }
                            ?></td>
      <!--<td>-->
      <td>
      <?php /*?><a href="<?=base_url()?>admin/jobs/jobtitlestatus/<?php echo($form->jt_id);?>" class='edit_status' id="<?php echo($form->jt_id);?>" rel="<?php echo($form->jt_status);?>" title="change status"> <span class="status status-<?=($form->jt_status == 0)? "danger": "default"?>"></span></a> <?php */?>&nbsp;&nbsp; <?php /*?><a href="<?=base_url()?>admin/jobs/updatejobtitle/<?php echo($form->jt_id);?>" onClick="showEditForm(<?=$form->jt_id?>)" title="edit"><span><i class="icon-clipboard"></i></span></a>&nbsp;&nbsp;<?php */?> 
      <a href="<?=base_url()?>admin/jobs/editjobtitle/<?php echo($form->jt_id);?>" title="edit" class="btn btn-success">Edit</a>
</td>
<td>
    <a href="<?=base_url()?>admin/jobs/deletejobtitle/<?php echo($form->jt_id);?>" title="delete" onclick="return confirm('Are you sure want to delete this job title?')" class="btn btn-danger">Delete</a>
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