<?php $this->load->view('header.php'); ?>

<body>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<input type="hidden" name="cat_id" id="cat_id" />
<div class="page category-page">
  <!--<div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div>-->
         <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
 
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Jobs</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a> </li>
              <li class="active">Jobs</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="categories-list-page light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <!--<div class="col-md-8 col-sm-12 col-xs-12">
            <h4 class="search-result-text">Showing 10 of 60 available job(s)</h4>
          </div>-->
          <div class="col-md-4 col-sm-12 col-xs-12">
            <aside>
              <div class="widget">
                <div class="widget-heading"><span class="title">Hot Categories</span></div>
                <ul class="categories-module">
                 <?
  $qry = "select *,count(cat_id) as cat_tot_jobs from jb_jobs
  JOIN jb_categories ON jb_jobs.cat_id = jb_categories.c_id
  where c_status = 1 AND j_status = 1
  GROUP BY cat_id ORDER BY c_name ASC";
  $rs = mysql_query($qry);
  while($row = mysql_fetch_array($rs)){
  ?>
                  <li class="jobcats" id="<?=$row['c_id']?>"> <a href="javascript:void(0);">  <?=$row['c_name']?> <span>(<?=$row['cat_tot_jobs']?>)</span> </a> </li>
                 <?
  }
		?>
                </ul>
              </div>
           
            </aside>
          </div>
            <div class="" id="load_ajax_jobs"> </div>
          
          
          
          
          
          
          
          
          
          
          
          
        </div>
      </div>
    </div>
  </section>
 
   <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
  <script>
	function loadJobs(cat_id,page_id,limit){	
	$("#loadingjobs").show();
	//var cat_id	= $("#cat_id").val();
		$('#page_id').val(page_id);
		
		$('#limit').val(limit);
//alert(page_id);
//alert(limit);
		var form_data = {
			page_id  			: page_id, 
			cat_id  			: cat_id, 
			limit	  			: limit, 
			action  			: 'show_jobs'
		};		
		$.ajax({
			url  	: "jobsajax",
			type 	: 'POST',
			data 	: form_data,
			success : function(data){
			//	alert(data);
				$("#loadingjobs").hide();
				$('#load_ajax_jobs').html(data);
				$("html, body").animate({ scrollTop: $('.header').offset().top }, 1000);
			}
		});	
	}

	$(document).ready(function(){
		var page_id = 1;
		var limit = '<?php echo $limit?>';
		loadJobs('',page_id,limit);
		$(document).on('click', '.paging_page', function(){
		
			var page_id				= 	this.id;
		var cat_id	= $("#cat_id").val();
			var limit				= $("#limit").val();
			$('#page_id').val(page_id);
			
		
			$('#limit').val(limit);
			

			loadJobs(cat_id,page_id,limit);
		});
		
			$(document).on('click', '.jobcats', function(){
		//alert(this.id);
			var cat_id				= 	this.id;
			var page_id				= 1;//$("#page_id").val();
			var limit				= <?php echo $limit?>;//$("#limit").val();
			$('#page_id').val(page_id);
			$('#page_id').val(page_id);
			$('#cat_id').val(cat_id);
			$('#limit').val(limit);
			loadJobs(cat_id,page_id,limit);
		});
		
		
		
		});
</script>
</div>
</body>
</html>