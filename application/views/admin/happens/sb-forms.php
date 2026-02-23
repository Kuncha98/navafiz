
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
 
    
      

      <ul class="nav nav-tabs">
          <li id="list"><a href="javascript:void(0)" class="btn btn-primary m-4" onclick="loadHappens(50)"><i class="fa fa-arrow-right"></i> Load More</a></li>
      </ul>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Happens List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
  <thead>
    <tr>
     <!-- <th>Image</th>-->
      <th>Image</th>
      <th>Member</th>
      <th>Message</th>
      <th>Added Date</th>
      <th>Status</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
			
foreach(@$forms as $form){ 

?>
    <tr>
      <td class="thumbnail" style="text-align:left"><img alt="" src="<?=base_url()?><?=($form->sh_image == "")?"assets/uploads/happens/noimage.png":$form->sh_image ?>" ></td>
      <td><?=$form->m_name?></td>
      <td><?=$form->message?></td>
     
        <td><?=$form->add_date?></td>
         <td> <?php
      
	  if ($form->sh_status == 0) {
                            ?>
                  <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/main/publishd/<?php echo $form->sh_id; ?>">publish</a>
                  <?php
                            } else {
                            ?>
                  <a class="label label-success" title="Publishd" href="<?php echo base_url(); ?>admin/main/unpublishd/<?php echo $form->sh_id; ?>">unpublish</a>
                  <?php
                            }
                            ?></td>
      <td>
          <a href="<?=base_url()?>admin/main/deletehappen/<?php echo($form->sh_id);?>" class="btn btn-danger" title="delete">Delete</a>
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