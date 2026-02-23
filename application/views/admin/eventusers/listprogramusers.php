<!--<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/datatables.min.js"></script>
--><script type="text/javascript" src="<?=base_url()?>assets/admin/js/application.js"></script>
<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th>Program</th>
      <th>Name</th>
      <th>Email Address</th>
      <th>Cell Phone</th>
     <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($programusers!='empty') {
			
foreach(@$programusers as $programuser){ 

?>
    <tr>
      <td><?=$programuser->title?></td>
      <td><?=$programuser->m_name?></td>
      <td><?=$programuser->m_email?></td>
      <td><?=$programuser->m_phone?></td>
  
      <td><a href="#" onClick="delProgramUser(<?=$programuser->pu_id?>)"><span><i class="icon-remove5"></i></span></a></td>
    </tr>
    <?php
}
				  }
				 /* else
				  {*/
					  ?>
   <!-- <tr>
      <td colspan="6" style="background:#fdf7f7; font-weight:bold; text-align:center; color:#F00; ">No data exist!</td>
    </tr>-->
    <?php
				//  }
				  ?>
  </tbody>
</table>
