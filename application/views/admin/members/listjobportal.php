<ul class="nav nav-tabs">
    <ul class="nav nav-tabs">

        <li><a href="<?= site_url('admin/members/add_job_portal')?>" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Member job portal</a></li>
        <li><a href="javascript:void(0)" id="" class="btn btn-primary m-4" onclick="loadJobPortal(50)"><i class="fa fa-arrow-right"></i> Load More</a></li>
    </ul>
</ul>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Members List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Name</th>
      <th>Navafiz</th>
      <th>Bayt</th>
      <!--<th>Monstergolf</th>-->
      <th>Gulftalent</th>
      <!--<th>NaukriGul</th>-->
<!--      <th>Dubbizle</th>
      <th>Worldwideworker</th>
      <th>Gotogulf</th>
      <th>KhaleejTimes</th>-->
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
		
foreach(@$forms as $form){ 
 if(!empty($form->user_id)){
//    exit();
?>
    <tr>
      <td><?php 
      $user = GetUserName($form->user_id);
      echo $user[0]->m_name;
      ?></td>
      <td>
          <?=$form->navafiz?>
      </td>
      <td><?=$form->bayt?></td>
      <!--<td><?=$form->monstergulf?></td>-->
      <td><?=$form->gulftalent?></td>
      <!--<td><?=$form->naukrigulf?></td>-->
<!--      <td><?=$form->dubizzle?></td>
      <td><?=$form->indeed?></td>
      <td><?=$form->worldwideworker?></td>
      <td><?=$form->gotogulf?></td>
      <td><?=$form->khaleejtimes?></td>-->
      <td><a href="<?=site_url('admin/members/edit_job_portal').'/'.$form->user_id?>" class="btn btn-success" title="edit">Edit</a></td>
      <td><a href="<?=site_url('admin/members/delete_job_portal')?>" class="btn btn-danger" onClick="return confirm('Are you Sure want to delete this job portal?')">Delete</a></td>
        
    </tr>
    
    <?php
}
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