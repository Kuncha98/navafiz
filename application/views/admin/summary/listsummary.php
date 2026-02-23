
<?php
//print_r($summary);
//exit();
?>
<a href="<?=site_url('admin/members/add_summary')?>" class="btn btn-success m-4"><i class="fa fa-plus"></i>Add Member Summary</a>
<a href="javascript:void(0)" class="btn btn-primary m-4" onclick="loadSummary(50)"><i class="fa fa-arrow-right"></i> Load More</a>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Members Summary List</h6>
</div>
<div class="card-body">
  <!--<div class="table-responsive">-->
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
     <tr>
       <th>Name</th>
       <th>Point 1</th>
       <th>Point 2</th>
       <th>Point 3</th>
       <th>Edit</th>
       <th>Delete</th>
      </tr>
    </thead>
  <tbody>

   <?php
    foreach($summary as $sum) {
       
    ?>
 <tr>
      <td>
          <?php $user = GetUserName($sum->m_id);
//                  print_r($user);
//          exit();
          ?>
          <?php if(!empty($user[0]->m_name)){
              echo $user[0]->m_name;
          }else{
              echo "Member Not Exists";
          }?>
      </td>
      <td><?=$sum->point_1?></td>
      <td><?=$sum->point_2?></td>
      <td><?=$sum->point_3?></td>
      
      <td><a href="<?=site_url('admin/members/edit_summary_career').'/'.$sum->m_id.'/'.$sum->id?>" class="btn btn-success" title="edit">Edit</a></td>
      <td> <a href="" title="delete" class="btn btn-danger" onclick=" return confirm('Are you sure want to delete this certificate?')">Delete</a></td>
    </tr>
    <?php
//     print_r($sum);
//        exit();
  }

	?>
  </tbody>
  </table>

   <!--</div>-->
  </div>
</div>



<script>
    
$(document).ready(function() {
    $('#dataTable').DataTable();
} );
 

</script>