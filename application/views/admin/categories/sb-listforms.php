<style>
    #sts-change .red{
        color:red;
    }
    #sts-change .green{
        color:green;
    }
</style>


      <ul class="nav nav-tabs">
      
          <li id="add"><a href="<?=base_url()?>admin/jobs/add_cat_form" class="btn btn-success m-4" id=""><i class="fa fa-plus"></i> Add Categories</a></li>
       
      </ul>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Companies List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
  <thead>
    <tr>
      <th>Name</th>
      <th>Change Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
<?php if($forms!='empty') {
  foreach(@$forms as $form){ 

    
?>
    <tr>
      <td><?=$form->c_name?></td>
      <td id="sts-change">
          <a href="javascript:void(0)" class='edit_status' id="<?php echo($form->c_id);?>" rel="<?php echo($form->c_status);?>" title="change status"> 
              <?php if($form->c_status == 0){ 
                 
             echo "<i class='fas red fa-circle'></i>";
             }else{
              echo "<i class='fas green fa-circle'></i>";
             }
              ?>
            
          </a>
      </td>
      <td>
          <a href="javascript:void(0)" class="btn btn-success" onClick="showEditForm(<?=$form->c_id?>)" title="edit">
              Edit
          </a>
      </td> 
      <td>
          <a href="javascript:void(0)" class="btn btn-danger" onClick="delForm(<?=$form->c_id?>)" title="delete">
              Delete
          </a>
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
