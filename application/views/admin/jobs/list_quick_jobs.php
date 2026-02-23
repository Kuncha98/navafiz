


<a href="<?=base_url()?>admin/jobs/add_quick_job" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Quick Job</a>

<?php
$this->load->view('notification/notification-messages');
?>
<table class="table table-striped table-bordered" id="dataTable">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Added By</th>
      <th>Added Date</th>
      <th>Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
//    print_r($forms);
//    exit();
    if($forms!='empty') {
			
foreach(@$forms as $form){
    if(intval($form->added_by) > 0){
    $user = GetUserName($form->added_by);
?>
    <tr>
      <td><?=$form->title?></td>
      <td><?=$form->description?></td>
      <td><?=($form->added_by == 0)?"Admin":$user[0]->m_name?></td>
        <td><?=$form->added_on?></td>
      <td>
<!--          <a href="javascript:void(0)" class='edit_status' id="<?php echo($form->j_id);?>" rel="<?php echo($form->j_status);?>" title="change status">
              <span class="status status-<?=($form->j_status == 0)? "danger": "default"?>"></span>
          </a>-->
          <?=$form->status?>
         
      </td>
      <td>
          <a href="<?=site_url('admin/jobs/edit_quick_job/'.$form->quick_job_id)?>" class="btn btn-success">Edit</a>
      </td>
      <td>
          <a href="<?=site_url('admin/jobs/delete_quick_job/'.$form->quick_job_id)?>" onclick="return confirm ('Are yuou sure want to delete this job?');" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php }
}
				  }
				  ?>
  </tbody>
</table>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>