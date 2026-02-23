<script>

$('#addMemberForm').on('click',function(){
		
	var form_data = {
			ajax	 			: '1',
			actioncall  		: 'showaddform'
			};
	$.ajax({
			url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
				$("#loading").hide();
			$( "#add" ).addClass("active" );
			$( "#list" ).removeClass("active" );	
			$('#loadData').html(data);
			}
		});			
	})
        
  
        
        

</script>
<style>
    .fa-fnt{
        font-size:12px;
    }
    #sts-change .red{
        color:red;
    }
    #sts-change .green{
        color:green;
    }
</style>
<ul class="nav nav-tabs">
    <ul class="nav nav-tabs">

       <li><a href="<?= site_url('admin/members/add_member')?>" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Member</a></li>
       <li><a href="<?=base_url()?>admin/member/excelexport" id="exportexcel" class="btn btn-primary m-4"><i class="fas fa-file-export"></i> Export</a></li>
       <li><a href="javascript:void(0)" id="" class="btn btn-info m-4 float-right" onclick="loadMembers(1,50)"><i class="fa fa-arrow-right"></i> Load More</a></li>
      
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
      <th>Id</th>
      <th>Name</th>
      <th>CV</th>
      <th>Email Address</th>
      <th>Gender</th>
      <th>Profile Picture</th>
      <th>Actions</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>View</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
		
foreach(@$forms as $form){ 
 
//    exit();
?>
    <tr>
      <td><?=$form->m_id?></td>

      <td><?=$form->m_name?></td>
      <td>
          <?=$form->member_cv?>
          <a href="<?=site_url('admin/members/AddCV').'/'.$form->m_id?>" class="btn btn-success mt-3" style="height: 27px;font-size: 11px;">Upload</a>
      </td>
      <td><?=$form->m_email?></td>
      <td><?=$form->gender?></td>
      <td>
          <img alt="" src="<?=base_url()?>assets/uploads/members/temp/<?=($form->m_avatar == "")?"default.png":$form->m_avatar ?>" width="125" height="75">
          <a class="btn btn-success m-0" style="height: 27px;font-size: 11px;" href="<?=site_url('admin/members/UpdateProfilePhoto').'/'.$form->m_id?>">update picture</a>
      </td>
     
      
        
        
      <td id="sts-change">
          <a href="javascript:void(0)" class='edit_status' id="<?php echo($form->m_id);?>" rel="<?php echo($form->m_status);?>" title="change status">
             <?php if($form->m_status == 0){ 
                 
             echo "<i class='fa-fnt fas red fa-circle fa-1x'></i>";
             }else{
              echo "<i class='fa-fnt fas green fa-circle fa-1x'></i>";
             }
              ?>
             </a> &nbsp;
         <?php
		 if($form->member_cv != "")
		 {
		 ?>
         <a href="<?=base_url()?>admin/member/cv/<?php echo($form->m_id);?>" title="Member CV"><span><i class="fa-fnt fas fa-eye"></i></span></a>
         <?php
		 }
		 else{
		 ?>
      
         <?php
		 }
		 ?>
           <a href="<?=base_url()?>admin/member/excelexport/<?php echo($form->m_id);?>" title="Export member"><span><i class="fa-fnt fas fa-user"></i></span></a>
           
           
         </td>
         <td><a href="javascript:void(0)" class="btn btn-success" onClick="showEditForm(<?=$form->m_id?>)" title="edit">Edit</a></td>
         <td><a href="javascript:void(0)" class="btn btn-danger" onClick="delForm(<?=$form->m_id?>)" title="delete">Delete</a></td>
         <td><a href="<?= site_url('admin/members/viewProfile/'.$form->m_id)?>" class="btn btn-info" title="view">View</a></td>
        
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