


 <input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
     <ul class="nav nav-tabs">
    
    <li id="add" class="m-4"><a href="<?=base_url()?>admin/jobs/addjobform" id="showAddForm" class="btn btn-success"><i class="fa fa-plus"></i> Add Job</a></li>

      </ul>


<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Jobs List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
     <tr>
       <th>Image</th>
       <th>Category</th>
       <th>Name</th>
       <th>Added By</th>
       <th>Added Date</th>
       <th>Status</th>
       <th>Edit</th>
       <th>Delete</th>
      </tr>
    </thead>
  <tbody>

   <?php
                    $sl = 1;
                    foreach ($pp as $row) {

						if(is_numeric($row['j_title']))
	$job_title = $row['jt_title'];
else
	$job_title = $row['j_title'];

                ?>
 <tr>
      <td class="thumbnail" style=""><img alt="" src="<?=base_url()?>/assets/uploads/jobs/<?=($row['j_image'] == "")?"noimage.png":$row['j_image'] ?>" width="125" height="75"></td>
      <td><?=$row['c_name']?></td>
      <td><?=substr($job_title,0,50)?></td>
      <td><?=($row['j_addedby'] == 0)?"Admin":$row['m_name']?></td>
      <td><?=date("M d-Y",$row['j_add_date'])?></td>
      <td>
      <?php
      if ($row['j_status'] == 0) {
                            ?>
                  <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/jobs/jobpublishd/<?php echo $row['j_id']; ?>">publish</a>
                  <?php
                    } else {
                  ?>
                  <a class="label label-success" title="UnPublishd" href="<?php echo base_url(); ?>admin/jobs/jobunpublishd/<?php echo $row['j_id']; ?>">unpublish</a>
                  <?php
                  }
                  ?>
      </td>
      <td><a href="<?=base_url()?>admin/jobs/editjob/<?php echo $row['j_id'];?>" class="btn btn-success" title="edit">Edit</a></td>
      <td> <a href="<?=base_url()?>admin/jobs/deletejob/<?php echo $row['j_id'];?>" title="delete" class="btn btn-danger">Delete</a></td>
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