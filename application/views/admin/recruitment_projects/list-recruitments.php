


<a href="<?=base_url()?>admin/recruitment_projects/add" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add New Recruitment Contact</a>

<?php
$this->load->view('notification/notification-messages');
?>
<table class="table table-striped table-bordered" id="dataTable">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone Number</th>
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

?>
    <tr>
      <td><?=$form->id?></td>
      <td><?=$form->name?></td>
      <td><?=$form->email?></td>
      <td><?=$form->phone_no?></td>
       <td>
          <a href="<?=site_url('admin/recruitment_projects/edit_recruitment/'.$form->id)?>" class="btn btn-success">Edit</a>
      </td>
      <td>
          <a href="<?=site_url('admin/recruitment_projects/delete_recruitment/'.$form->id)?>" onclick="return confirm ('Are yuou sure want to delete this job?');" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php
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