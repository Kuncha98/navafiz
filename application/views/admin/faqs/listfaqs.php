<script>


//	init(0);
//	$('#addFaqForm').on('click',function(){
//		
//	var form_data = {
//			ajax	 			: '1',
//			actioncall  		: 'addfaqform'
//			};
//	$.ajax({
//			url  	: "<?php echo(base_url().'admin/ajaxDataManagementFaq'); ?>",
//			type 	: 'POST',
//			data 	: form_data,
//			success : function(data){
//			$('#loadData').html(data);
//			}
//		});			
//	})

	


</script>

<a href="<?=site_url('admin/main/addfaq')?>" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add FAQ</a>


<div class="card shadow">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">FAQs List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Question</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if($faqs!='empty') {
	
          foreach(@$faqs as $faq){ 
?>
            <tr>
                <td><?=$faq->id?></td>
                <td><?=substr($faq->question,0,100)?></td>
                <td><?=$faq->status?></td>
                <td><button class="btn btn-success" type="button" onClick="edit_faq(<?=$faq->id?>)">Edit</button></td>
                <td><button class="btn btn-danger" type="button" onClick="del_faq(<?=$faq->id?>)">Delete</button></td>
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