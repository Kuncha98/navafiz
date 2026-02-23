<?php $this->load->view('include/header.php'); ?>

  
<?php /*?>  <p>
  <?=$page->description?> </p><?php */?>
  <?php
    if($this->uri->segment(2) != "about"){
  
  ?>
  <section class="about-us">
    <div class="container-mid">
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
  
  
     <?php $this->load->view('include/footer.php'); ?>
