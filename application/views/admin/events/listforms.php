<script>

$('#addEventForm').on('click',function(){
			$("#sms-area").hide();
			var form_data = {
				ajax	 			: '1',
				actioncall  		: 'addeventform'
			};
			$.ajax({
				url  	: base_url+"admin/ajaxDataManagementEvent",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					
					$('#loadData').html(data);
				}
			});			
		

	})

</script>


<a href="#" id="addEventForm" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Event </a>


<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Events List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>Title</th>
        <th>Event Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($events != 'empty') {

        foreach (@$events as $event) {
            ?>
            <tr>
                <td><?= $event->title ?></td>
                <td><?= date('d M Y', strtotime($event->event_date)); ?></td>
                <td> <button type="button" class="btn btn-success" onClick="edit_eventform(<?= $event->e_id ?>)">Edit</button> </td>
                <td> <button type="button" class="btn btn-danger" onClick="del_event(<?= $event->e_id ?>)">Delete</button> </td>
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
