<?php $this->load->view('admin/header.php'); ?>
<script>
$(document).ready(function(){
	//init(0);
	var page_id = 1;
    var limit = 20;
	loadJobs(page_id,limit);
	$(document).on('click', '.paging_page', function()
		{
		var page_id				= 	this.id;
    	var limit				= $("#limit").val();
        
		$('#page_id').val(page_id);
    	$('#limit').val(limit);
    	loadJobs(page_id,limit);
   		});
	$('#showAddForm').on('click',function(){
		$("#loading").show();
		$("#sms-area").hide();
	var form_data = {
			ajax	 			: '1',
			actioncall  		: 'showaddform'
			};
	$.ajax({
			url  	: "<?php echo(base_url().'admin/ajaxDataManagementJobs'); ?>",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
			$( "#add" ).addClass("active" );
			$( "#list" ).removeClass("active" );	
			$('#loadData').html(data);
			}
		});			
	})

	$('#listForms').on('click',function(){
		$("#loading").show();
		$("#sms-area").hide();
		var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listforms'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementJobs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					$( "#add" ).removeClass("active" );
					$( "#list" ).addClass("active" );
					$('#loadData').html(data);
				}
			});			
		})
		$(document).on('click', '.edit_status', function(){
			
		 var set_status = "";
		 var rel_val = "";
			var j_id	= this.id;
			var status_val = $(this).attr('rel');
			if(status_val == 1)
				rel_val = 0;
			else
				rel_val = 1;
		
  		$(this).attr('rel',rel_val);
			var form_data = {
				ajax	 	: '1',
				actioncall  : 'changeStatus',
				j_id	:  j_id,
				status_val	:  status_val
			};	
			if(confirm('Are you sure to change the status of the service'))
			{	
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementJobs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					if(status_val == 1){
					set_status = "Inactive";
					rel_val = 'danger';
					
					$("#"+j_id+" > span.status").removeClass("status-default");
        $("#"+j_id+" > span.status").addClass("status-danger")
					}else{ 
					set_status = "Active";
					rel_val = 'default';
						$("#"+j_id+" > span.status").removeClass("status-danger");
        $("#"+j_id+" > span.status").addClass("status-default")
					}
								
				}
			});	
			}
		});	
	$(document).on('click', '.edit_service_form', function()
		{
			$("#loading").show();
		var form_data = {
				ajax	 		: '1',
				service_id			: this.id,
				actioncall  	: 'editserviceform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementJobs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					$('#loadData').html(data);
				}
			});				
		})	
		
	})
function init(val)
{
			var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listforms'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementJobs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$( "#list" ).addClass("active" );
					if(val == 1)
						{
						$("#sms-area").removeClass( "alert-danger" ); 	
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Data added successfully");	
						}
					else if(val == 2)
						{
						$("#sms-area").removeClass( "alert-danger" ); 	
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Data updated successfully");	
						}
					else if(val == 3)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Data deleted successfully");	
						page_id =   $('#page_id').val();

        limit = $('#limit').val();
						loadJobs(page_id,limit);
						}	
						$( "#add" ).removeClass("active" );
					$( "#list" ).addClass("active" );
						$('#loadData').html(data);	
				}
			});			
	
}
	 function loadJobs(page_id,limit){

		$("#loading").show();
        $('#page_id').val(page_id);

        $('#limit').val(limit);

        var form_data = {
            page_id  			: page_id,
            limit	  			: limit,
          	ajax	 			: '1',
			actioncall  		: 'listforms'
        };
        $.ajax({
            url  	: "<?php echo(base_url().'admin/ajaxDataManagementJobs'); ?>",
            type 	: 'POST',
            data 	: form_data,
            success : function(data){
				
				$("#loading").hide();
                $('#loadData').html(data);
            }
        });
    }

function addForm()
{
	var error = "";
			var cat_id 			= $('#cat_id').val();
			var title 	= $('#title').val();
				var jobimage 			= $('#jobimage').val();
			//var descr = CKEDITOR.instances['descr'].getData();	
			var descr =  $('#descr').val();
			
			if(cat_id == "")
		    	error = "Please select category";
			else if(title == "")
			error = "Please enter title";
			else if(descr == "")
			error = "Please enter description";
			
			
			 if(error != "")
			{
            $("#sms-area").show();
		    $("#sms-area").addClass( "alert-danger" );
		    $("#message").html(error);
	        }
        else
            {
				$("#loading").show();
			var form_data = {
				ajax	 		: '1',
				title	: title,
				cat_id			: cat_id,
				jobimage			: jobimage,
				descr			: descr,
				actioncall  	: 'addform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementJobs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					init(1);
				}
			});	
			}
	
}

function showEditForm(id)
{
	$("#loading").show();
	$("#sms-area").hide();
		var form_data = {
				ajax	 	: '1',
				id			: id,
				actioncall  : 'showeditform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementJobs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					$('#loadData').html(data);
				}
			});			
	
}
function editForm(id)
{
	var error = "";
		var cat_id 			= $('#cat_id').val();
			var title 	= $('#title').val();
				var jobimage 			= $('#jobimage').val();
			var descr = $('#descr').val();
			//var descr = CKEDITOR.instances['descr'].getData();	
			
			
			if(cat_id == "")
		    	error = "Please select category";
			else if(title == "")
			error = "Please enter title";
			else if(descr == "")
			error = "Please enter description";
			 if(error != "")
			{
            $("#sms-area").show();
		    $("#sms-area").addClass( "alert-danger" );
		    $("#message").html(error);
	        }
        else
            {
			
			$("#loading").show();
			var form_data = {
				ajax	 		: '1',
				id				: id,
				title	: title,
				cat_id			: cat_id,
				jobimage			: jobimage,
				descr			: descr,
				actioncall  	: 'editform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementJobs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					init(2);
				}
			});	
			}
	
}
 function delForm(id)
        {
		var form_data = {
			ajax	 			: '1',
			actioncall  		: 'delform',
			id			: id,
			};
		if(confirm('Are you sure to delete this data and its related data'))
			{
			$("#loading").show();
			$.ajax({
				url  	: "<?php echo(site_url().'admin/ajaxDataManagementJobs'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
				    init(3);
					}
				});
			}
		}

</script>
<body>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<?php $this->load->view('admin/page_top.php'); ?>
<div class="page-container"> 
  <?php $this->load->view('admin/left_side.php'); ?>
  <div class="page-content"> 
    <div class="page-header">
      <div class="page-title">
        <h3>Jobs </h3>
      </div>
       </div>
       <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin/jobs">Home</a></li>
        <li class="active">Jobs</li>
      </ul>
      <div class="visible-xs breadcrumb-toggle"> <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a> </div>
      
    </div>
  <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
        <li id="list"><a href="javascript:void(0)" id="listForms"><i class="icon-checkbox-partial"></i> List Jobs</a></li>
        <li id="add"><a href="javascript:void(0)" id="showAddForm"><i class="icon-checkbox-unchecked"></i> Add Job</a></li>
       
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
            <div class="datatable" id="loadData">
              
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