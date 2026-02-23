<?php $this->load->view('header.php'); ?>
<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">

<body class="corporate">
<?php $this->load->view('pagetop.php'); ?>
<div class="main">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="<?=base_url()?>">Home</a></li>
      <li><a href="<?=base_url()?>classifieds"></a>Classified</li>
      <li class="active">Classified Detail</li>
    </ul>
    <div class="row margin-bottom-40">
      <div class="col-md-12 col-sm-12">
        <div class="content-page" style="text-align:center !important;">
          <div class="row" style="text-align:center !important;">
            <div class="col-md-9 col-sm-9 blog-item" >
              <h3 style="margin-top:0">
                <?=$product->pro_title?>
              </h3>
              <img id="image_zoom" src="<?=base_url()?>assets/uploads/products/<?=$product->pro_image?>" class="col-md-12 img-responsive" alt="" style="text-align:center; margin-bottom:10px;" height="500" >
              
              <div class="row">
                <div class="col-md-12">
                  <ul class="list-inline blog-tags" style="text-align:center;">
                    <li> <img src="<?=base_url()?>assets/uploads/products/small_thumbs/<?=$product->pro_image?>" class="img-responsive" alt="" onClick="show_zoom_image(<?=$product->pro_id?>,'pro_image')" width="150" height="150"> </li>
                    <li> <img src="<?=base_url()?>assets/uploads/products/small_thumbs/<?=$product->pro_image2?>" class="img-responsive" alt=""  onclick="show_zoom_image(<?=$product->pro_id?>,'pro_image2')" width="150" height="150"> </li>
                  </ul>
                </div>
              
              </div>
              <div class="news-item-page">
                <p>
                  <?=$product->pro_descr?>
                </p>
              </div>
              <hr>
            </div>
            <?php //$this->load->view('blogrightside.php'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- BEGIN PRE-FOOTER -->
<?php $this->load->view('footer.php'); ?>
<script>
	function show_zoom_image(id,colu)
	{
		var form_data = {
			  ajax	 	: '1',
			  id	: id,
			  colu	: colu,
			  actioncall  : 'addUser'
		  };	
		  $.ajax({
			  url  	: "<?=base_url()?>product/zoom_item_image/",
			  type 	: 'POST',
			  data 	: form_data,
			  success : function(data){
			
				$('#image_zoom').attr('src','<?=base_url()?>assets/uploads/products/'+data);	
				//$('#image_zoom').attr('src','http://swapit.pk/code/beta/assets/images/'+data);	
				  }
		 	 });
	}
	</script>
</body>
</html>