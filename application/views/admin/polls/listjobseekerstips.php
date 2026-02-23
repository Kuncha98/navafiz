<?php $this->load->view('admin/header.php'); ?>

<body>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<?php $this->load->view('admin/page_top.php'); ?>
<div class="page-container"> 
  <?php $this->load->view('admin/left_side.php'); ?>
  <div class="page-content"> 
    <div class="page-header">
      <div class="page-title">
        <h3>Job Seekers Tips </h3>
      </div>
       </div>
       <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin/jobs">Home</a></li>
        <li class="active">Job Seeker Tips</li>
      </ul>
      <div class="visible-xs breadcrumb-toggle"> <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a> </div>
      
    </div>
  <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
        <li id="list"><a href="<?=base_url()?>admin/jobs/jobseekerstips" id="listForms"><i class="icon-checkbox-partial"></i> List Job Seeker Tips</a></li>
        <li id="add"><a href="<?=base_url()?>admin/jobs/addjobseekerform" id="showAddForm"><i class="icon-checkbox-unchecked"></i> Add Job Tips</a></li>
       
      </ul>
      <div class="alert fade in block-inner" id="sms-area" style="display:none">
		                <button data-dismiss="alert" class="close" type="button">×</button>
		                <i class="icon-checkmark-circle"></i> <span id="message"></span>
		            </div>
      <div class="tab-content"> 
        
        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside"> 
               
          <div class="panel panel-default">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-paragraph-justify"></i> Jobs</h6>
            </div>
               <div id="loading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/admin/images/large.gif" alt="Loading..." /> </div>
           
<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th>Title</th>
      <th>Added Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
			
foreach(@$forms as $form){ 

?>
    <tr>
     
      <td><?=$form->st_title?></td>
      
        <td><?=date("M d-Y",strtotime($form->st_add_date))?></td>
      <td> <?php
      
	  if ($form->st_status == 0) {
                            ?>
                  <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/jobs/publishd/<?php echo $form->st_id; ?>">publish</a>
                  <?php
                            } else {
                            ?>
                  <a class="label label-success" title="Publishd" href="<?php echo base_url(); ?>admin/jobs/unpublishd/<?php echo $form->st_id; ?>">unpublish</a>
                  <?php
                            }
                            ?></td>
      <td>
      
      <?php /*?><a href="<?=base_url()?>admin/jobs/jobtitlestatus/<?php echo($form->jt_id);?>" class='edit_status' id="<?php echo($form->jt_id);?>" rel="<?php echo($form->jt_status);?>" title="change status"> <span class="status status-<?=($form->jt_status == 0)? "danger": "default"?>"></span></a> <?php */?>&nbsp;&nbsp; <a href="<?=base_url()?>admin/jobs/editjobtips/<?php echo($form->st_id);?>" title="edit"><span><i class="icon-clipboard"></i></span></a>&nbsp;&nbsp; <a href="<?=base_url()?>admin/jobs/deletejobseeker/<?php echo($form->st_id);?>" title="delete"><span><i class="icon-remove5"></i></span></a></td>
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
    </div>
    <?php $this->load->view('admin/footer.php'); ?>
   
  </div>
 
</div>
</body>
</html>