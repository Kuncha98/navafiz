

<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />


      <ul class="nav nav-tabs">
        <!--<li id="list"><a href="<?=base_url()?>admin/companies/index" id="listForms"><i class="icon-checkbox-partial"></i> List Companies</a></li>-->
          <a href="<?=base_url()?>admin/companies/addcompanyform" id="showAddForm" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Company</a>
       
      </ul>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Companies List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
           
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <!--<th>Image</th>-->
      <th>Name</th>
      <th>Mobile</th>
      <th>Websites</th>
      <th>Added Date</th>
      <th>Status</th>
      <!--<th>Rank</th>-->
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
			
foreach(@$forms as $form){ 
    
?>
    <tr>
      <!--<td class="thumbnail" style="text-align:left"><img alt="" src="<?=base_url()?>/assets/uploads/jobs/<?=($form['j_image'] == "")?"noimage.png":$form['j_image'] ?>" width="200" height="150"></td>-->
      <td><?=$form['co_name']?></td>
      <td><?=$form['co_mobile']?></td>
      <td><?=$form['co_website']?></td>
        <td><?=$form['added_on']?></td>
         <td> <?php
      
	  if ($form['co_status'] == 0) {
                            ?>
                  <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/companies/publishd/<?php echo $form['co_id']; ?>">publish</a>
                  <?php
                            } else {
                            ?>
                  <a class="label label-success" title="Publishd" href="<?php echo base_url(); ?>admin/companies/unpublishd/<?php echo $form['co_id']; ?>">unpublish</a>
                  <?php
                            }
                            ?></td>
<!--         <td>
             <a href="<?=base_url()?>admin/jobs/jobtitlestatus/<?php echo($form->jt_id);?>" class='edit_status' id="<?php echo($form['jt_id']);?>" rel="<?php echo($form->jt_status);?>" title="change status"> <span class="status status-<?=($form->jt_status == 0)? "danger": "default"?>"></span></a>
         </td>-->
         <td>
             <a href="<?=base_url()?>admin/companies/editcompany/<?php echo($form['co_id']);?>" class="btn btn-success" title="edit">Edit</a>
         </td>
         <td>
             <a href="<?=base_url()?>admin/companies/deletecompany/<?php echo($form['co_id']);?>" title="delete" class="btn btn-danger">Delete</a>
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

              
     
     


