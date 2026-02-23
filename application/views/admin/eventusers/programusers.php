<?php $this->load->view('admin/header.php'); ?>
<script>
$(document).ready(function(){
	init(0);
	
	$('#listPages').on('click',function(){
		var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listprogramusers'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementEventSubscriber'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$( "#add" ).removeClass("active" );
					$( "#list" ).addClass("active" );
					$('#loadData').html(data);
				}
			});			
		})
		
	})
function init(val)
{
			var form_data = {
				ajax	 			: '1',
				actioncall  		: 'listprogramusers'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementEventSubscriber'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$( "#list" ).addClass("active" );
					if(val == 1)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Page updated successfully");	
						}
					if(val == 2)
						{
						$("#sms-area").show();
						$("#sms-area").addClass( "alert-success" );
						$("#message").html("Page deleted successfully");	
						}
						$('#loadData').html(data);	
				}
			});			
	
}
function delProgramUser(id)
        {
			
		var form_data = {
			ajax	 			: '1',
			actioncall  		: 'delform',
			pu_id			: id,
			};
		if(confirm('Are you sure to delete this data and its related data'))
			{
			$("#loading").show();
			$.ajax({
				url  	: "<?php echo(site_url().'admin/ajaxDataManagementEventSubscriber'); ?>",
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

<!-- Navbar -->
<?php $this->load->view('admin/page_top.php'); ?>
<!-- /navbar --> 

<!-- Page container -->
<div class="page-container"> 
  
  <!-- Sidebar -->
  
  <?php $this->load->view('admin/left_side.php'); ?>
  
  <!-- /sidebar --> 
  
  <!-- Page content -->
  <div class="page-content"> 
    
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>Program Users </h3>
      </div>
      
      <!--<div id="reportrange" class="range">
        <div class="visible-xs header-element-toggle"> <a class="btn btn-primary btn-icon"><i class="icon-calendar"></i></a> </div>
        <div class="date-range"></div>
        <span class="label label-danger">9</span> </div>-->
    </div>
    <!-- /page header --> 
    
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin/slider">Home</a></li>
        <li class="active">Program Users</li>
      </ul>
      <div class="visible-xs breadcrumb-toggle"> <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a> </div>
      
    </div>
    
    <!-- /breadcrumbs line --> 
    
    <!-- Page tabs -->
    <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
        <li id="list"><a href="#" id="listPages"><i class="icon-checkbox-partial"></i> List Program Users</a></li>
      <!-- <li id="add"><a href="#" id="addFaqForm"><i class="icon-checkbox-unchecked"></i> Add Page</a></li>-->
       
      </ul>
      <div class="alert fade in block-inner" id="sms-area" style="display:none">
		                <button data-dismiss="alert" class="close" type="button">×</button>
		                <i class="icon-checkmark-circle"></i> <span id="message"></span>
		            </div>
      <div class="tab-content"> 
        
        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside"> 
          
          <!-- Striped and bordered datatable inside panel --> 
          <!-- <div id="data_block"></div>-->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-paragraph-justify"></i> Program Users</h6>
            </div>
            <div class="datatable" id="loadData">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page tabs --> 
    
    <!-- Footer -->
    <?php $this->load->view('admin/footer.php'); ?>
    <!-- /footer --> 
    
  </div>
  <!-- /page content --> 
  
</div>
<!-- /page container -->

</body>


</html>