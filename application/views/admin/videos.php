
<ul class="nav nav-tabs">
    <li class="active"><a href="<?=base_url()?>admin/videos/videoform" class="btn btn-success m-4" id="addVideoForm"><i class="fa fa-plus"></i> Add Video </a></li>
<!--  <li><a href="<?=base_url()?>admin/videos/index" id="listVideos"><i class="icon-checkbox-unchecked"></i> List Videos</a></li>-->

</ul>



<div class="datatable" id="loadData">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Jobs List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                  <th>Name</th>
                  <th>Video Date</th>
                  <th>Image</th>
                  <th>Action</th>
                  <th>Edit</th>
                  <th>Delete</th>

            </tr>
	</thead>
    <tbody>
<?php if($videos!='empty') {
			
foreach(@$videos as $video){ 

?>
	<tr>
				                           
				                            
                    <td><?=$video->title?></td>
                    <td><?=$video->add_date?></td>
                    <td><img src="<?=$video->image?>" width="100" height="100" /></td>
                   
                    <td> <?php
      
	        if ($video->status == 'inactive') {
                            ?>
                  <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/videos/publishd/<?php echo $video->id; ?>">publish</a>
                  <?php
                            } else {
                            ?>
                  <a class="label label-success" title="Publishd" href="<?php echo base_url(); ?>admin/videos/unpublishd/<?php echo $video->id; ?>">unpublish</a>
                  <?php
                            }
                            ?></td>
				<td>
                                    <a href="<?=base_url()?>admin/videos/edit/<?php echo($video->id);?>" class="btn btn-success" title="edit">Edit</a>
                                </td>
                                <td>
                                    <a href="<?=base_url()?>admin/videos/delete/<?php echo($video->id);?>" title="delete" class="btn btn-danger">Delete</a>
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
</div>
