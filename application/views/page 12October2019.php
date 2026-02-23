<?php $this->load->view('header.php'); ?>
<body>
<div class="page category-page">
  <!--<div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div>-->
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <div class="search">
    <div class="container-fluid">
      <div class="row">
                                                
      </div>
    </div>
  </div>
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3><?=$page->name?></h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a> </li>
              <li class="active"><?=$page->name?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php /*?>  <p>
  <?=$page->description?> </p><?php */?>
  <?php
  	if($this->uri->segment(2) != "about"){
  
  ?>
  <section class="about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="col-md-12 col-sm-12 col-xs-12">
          
            <p> <?=$page->description?> </p>
          </div>
         
        </div>
      </div>
    </div>
  </section>
  <?php
	}else
	{
	?>	
       <?php  echo $page->description; 
        
	}

  ?>
  
  
     <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
</div>
</body>

</html>