<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">CV Reviews List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
    
      <th>Member Name</th>
      <th>Resume file</th>
      <th>Review Title</th>
      <th>Review Status</th>
      <th>Assign User To</th>
      <th>Admin Comments</th>
      <th>Commented By</th>
      <th>View Details</th>
    </tr>
  </thead>
  <tbody>
    <?php if($cvs!='empty') {
		
foreach($cvs as $cv){ 
//echo $cv->review_id;
?>
    <tr>
        <td>
            <?php 
            $user = GetUserName($cv->member_id); 
            if(!empty($user)){echo $user[0]->m_name;}else{echo "Member Not Exists";}
            ?>
        </td>
      <td>
          <?=$cv->resume_file?>
          <a href="<?=site_url('public-assets/cvreviews/'.$cv->resume_file);?>" target="_blank" class="btn btn-success mt-3" style="height: 27px;font-size: 11px;">View</a>
      </td>
      <td><?=$cv->review_title?></td>
      <td><?=$cv->review_status?></td>
      <td><?php $user = GetUserName($cv->assign_user_to);
       if(!empty($user)){
           echo $user[0]->m_name;}else{ echo "Member Not Exists";}
      ?>
      </td>
      <td><?=$cv->admin_comments?></td>
      <td><?php $user = GetUserName($cv->comment_by); 
      if(!empty($user)){echo $user[0]->m_name;}else{echo "Member Not Exists";}?></td>
     
      <td>
          <a href="<?=site_url('admin/cvreview/UpdateCvReview/'.$cv->member_id)?>" class="btn btn-success" style="height: 32px;font-size: 11px;">Details</a>
          <input type="hidden" name="review_id" value="<?=$cv->review_id?>">      
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