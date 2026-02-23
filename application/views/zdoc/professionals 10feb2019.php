<?php $this->load->view('header.php'); ?>

<body>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<div class="page category-page">
  <!--<div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div>-->
   <?php $this->load->view('pagetop.php'); ?>
 
  <div class="clearfix"></div>
 
  <section class="breadcrumb-search parallex">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 nopadding">
            <div class="search-form-contaner">
              <form class="form-inline">
                <div class="col-md-7 col-sm-7 col-xs-12 nopadding">
                  <div class="form-group">
                    <input type="text" class="form-control" id="s_skills" name="s_skills" placeholder="Search Keyword" value="">
                    <i class="icon-magnifying-glass"></i> </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                  <div class="form-group">
                    <select class="select-category form-control" id="s_catid">
                      <option label="Select Option"></option>
                       <?
			 
				 if($categories != "empty")
				 {
					 foreach($categories as $category)
					 {
				 ?>
                      <option value="<?=$category->c_id?>"> <?=$category->c_name?></option>
                      <?
					 }
				 }
				 ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                  <div class="form-group form-action">
                    <button type="button" class="btn btn-default btn-search-submit" onClick="searchProfessionals()">Search <i class="fa fa-angle-right"></i> </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="categories">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="Heading-title black">
              <h1>Professionals</h1>
             <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>-->
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding" id="loadData"> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
   <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
  
  <!-- FOR THIS PAGE ONLY --> 
  <script src="js/imagesloaded.js"></script> 
  <script src="js/isotope.min.js"></script> 
  <script type="text/javascript">
            (function($) {
                "use strict";
                $('#cats-masonry').imagesLoaded(function() {
                    $('#cats-masonry').isotope({
                        layoutMode: 'masonry',
                        transitionDuration: '0.3s'
                    });
                });
            })(jQuery);
        </script> 
  
  <!-- CORE JS --> 
  <script type="text/javascript" src="js/custom.js"></script> 
</div>
</body>
<script>
	function loadProfessionals(page_id,limit){	
	$("#profloading").show();
	$('#page_id').val(page_id);
		
		$('#limit').val(limit);

		var form_data = {
			page_id  			: page_id, 
			
			limit	  			: limit, 
			action  			: 'show_professionals'
		};		
		$.ajax({
			url  	: "professionalsajax",
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
		
		
		
		
		
		
		var limit = '<?php echo $limit?>';
		
		loadProfessionals(page_id,limit);

		
		$(document).on('click', '.paging_page', function(){
	//	$('.paging_page').on('click',function(){
			
			var page_id				= 	this.id;
		
			var limit				= $("#limit").val();
		

			$('#page_id').val(page_id);
		
			$('#limit').val(limit);
			

			loadProfessionals(page_id,limit);
		});
		
		});
</script>
</html>