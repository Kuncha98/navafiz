<?php $this->load->view('header.php'); ?>

<style>
.panel-body ul {
  list-style: none !important;
}
</style>
<body>
<div class="page category-page"> 
  <!--<div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div>-->
  <?php //$this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
 
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Reference</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url();?>">Home</a> </li>
              <li class="active">Reference</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="dashboard-body">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="heading-inner first-heading">
              <p class="title">Reference</p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
             <div class="form-group"> <span class="errormessage"></span> </div>
               <?php
          if($this->session->flashdata('msg')){
        ?>
                <div role="alert" class="form alert alert-success">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <?php echo $this->session->flashdata('msg'); ?> </div>
                <?php
          }
        ?>
              <div class="profile-edit row boxed box-to-clone education-box">
                <form class="form-horizontal" method="post" action="<?=base_url()?>updateReference" id="memberpage">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Name <span class="required">*</span></label>
                      <input type="text" id="name" name="name"  value="<?=$profile->m_ref_name;?>" class="form-control" required/>
                    
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Occupation <span class="required">*</span></label>
                      <input type="text" id="occupation" name="occupation" value="<?=$profile->m_ref_occupation;?>" class="form-control" required/>
                    
                    </div>
                  </div>
                  
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Relation <span class="required">*</span></label>
                      <input type="text" id="relation" name="relation"  value="<?=$profile->m_ref_relation;?>" class="form-control" required/>
                    
                    </div>
                  </div>
                  
                  <div class="col-md-12 col-sm-12">
                    <button class="btn btn-default pull-right" type="submit"> Submit <i class="fa fa-angle-right"></i></button>
                  </div>
                </form>
              </div>
             
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <?php $this->load->view('footerbottom.php'); ?>
 
  <script>
  function updatePassword()
  {
    
    
  var error = "";
  var pwd       = $('#pwd').val();
  var cpwd      = $('#cpwd').val();
  
  
  
  if(pwd != cpwd){
error = "Both password should be same";
}
  if(error != "")
    {
      $(".errormessage").show();
      $(".errormessage").html(error);
    
    }
  
  
  else
  { 
  
  
        $('#loading').show();
    var form_data = {
      
      pwd       : pwd,
      actioncall    : 'updatepassword'
    };
  $.ajax({
      url   : "updatepassword",
      type  : 'POST',
      data  : form_data,
      success : function(data){
        
        //if(data == 0)
          //{
          $('#loading').hide(); 
          $('#regmessage').html("Password updated successfully!");
          $(".errormessage").hide();
          $('#regmessage').show();
          //location.hash = "#profilearea";
          //$('#profilearea').offset().top - main-contect.offset().top + main-contect.scrollTop();
          $("html, body").animate({ scrollTop: $('#profilearea').offset().top }, 1000);
          //}
        
        }
    });
  }
  
  }
  
  
          
    
   
    
  

       
          </script> 
</div>
</body>
</html>