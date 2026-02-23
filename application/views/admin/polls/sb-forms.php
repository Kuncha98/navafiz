
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />


<!--      <ul class="nav nav-tabs">
        <li id="list"><a href="<?=base_url()?>admin/resultpoll/" id="listForms"><i class="icon-checkbox-partial"></i> List Poll result</a></li>
      </ul>-->




<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Poll List</h6>
    </div>
<div class="card-body">
  <div class="table-responsive">
           
<table class="table table-striped table-bordered" >
  <thead>
    <tr>
     <!-- <th>Name</th>-->
      <th>Member</th>
      <th>Total</th>
     <!-- <th>Added By</th>-->
  <!--    <th>Added Date</th>
      <th>Status</th>
       <th>Action</th>-->
    </tr>
  </thead>
  <tbody>
  
   <?php
                    $sl = 1;
                    foreach ($pp as $row) {
						
						
						
                 //   $bgcolor = ($sl % 2 == 0) ? 'EEE' : 'CCC';                    
                ?>
  
    <?php /* if($forms!='empty') {
			
foreach(@$forms as $form){ 

	*/

?>
    <tr>
     <!-- <td class="thumbnail" style="text-align:left"><img alt="" src="<?=base_url()?>/assets/uploads/jobs/<?=($row['j_image'] == "")?"noimage.png":$row['j_image'] ?>" width="125" height="75"></td>-->
      <td><?=$row['m_name']?></td>
      <td><?=$row['total_count']?></td>
    
    <?php /*?>    <td><?php
      
	  if ($row['j_status'] == 0) {
                            ?>
                  <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/jobs/jobpublishd/<?php echo $row['j_id']; ?>">publish</a>
                  <?php
                            } else {
                            ?>
                  <a class="label label-success" title="UnPublishd" href="<?php echo base_url(); ?>admin/jobs/jobunpublishd/<?php echo $row['j_id']; ?>">unpublish</a>
                  <?php
                            }
                            ?></td><?php */?>
  <!--    <td><a href="<?=base_url()?>admin/jobs/editjob/<?php echo($row['j_id']);?>" title="edit"><span><i class="icon-clipboard"></i></span></a>&nbsp;&nbsp; <a href="<?=base_url()?>admin/jobs/deletejob/<?php echo($row['j_id']);?>" title="delete"><span><i class="icon-remove5"></i></span></a></td>-->
    </tr>
    <?php
}
				//  }
				  ?>
  </tbody>
</table>
      
     </div>
  </div>
</div>
