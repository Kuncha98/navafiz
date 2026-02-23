<?php $this->load->view('header.php'); ?>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/frontend/css/custom_paging.css" />
<body class="corporate">
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<?php $this->load->view('pagetop.php'); ?>

<div class="main">
<div class="container">
  <div class="col-md-12 col-sm-12">
  <ul class="breadcrumb">
    <li><a href="<?=base_url()?>">Home</a></li>
    <li class="active">Classified</li>
  </ul>
  </div>
    <?php if($this->session->userdata('user_id')!=''){?>
  <div class="col-md-2" style="float:right;">
     <a class="btn btn-primary" href="<?=base_url()?>postad">Post Ad</a>
  </div>
  <?php
	}
  ?>
  <div class="row margin-bottom-40">
    <div class="row">
    	
      <div id="profloading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/large.gif" alt="Loading..." /> </div>
      <div class="col-md-12 col-sm-12" id="loadData">
      
      </div>
    <?php /*?>  <?php $this->load->view('productrightside.php'); ?><?php */?>
    </div>
  </div>
</div>
<?php $this->load->view('footer.php'); ?>
<script>
	function loadProducts(page_id,limit){	
	$("#profloading").show();
	$('#page_id').val(page_id);
		
		$('#limit').val(limit);

		var form_data = {
			page_id  			: page_id, 
			
			limit	  			: limit, 
			action  			: 'show_products'
		};		
		$.ajax({
			url  	: "productajax",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
				$("#profloading").hide();
				$('#loadData').html(data);
			}
		});	
	}

	$(document).ready(function(){
			
		var page_id = 1;
		
		
		
		
		
		
		<?php /*?>var limit = '<?php echo $limit?>';<?php */?>
		var limit = '10';
		loadProducts(page_id,limit);

		
		$(document).on('click', '.paging_page', function(){
			
			var page_id				= 	this.id;
		
			var limit				= $("#limit").val();
		

			$('#page_id').val(page_id);
		
			$('#limit').val(limit);
			

			loadProducts(page_id,limit);
		});
		
		});
</script>
</body>
</html>