<?php $this->load->view('header.php'); ?>

<body class="corporate">
<?php $this->load->view('pagetop.php'); ?>
<div class="main">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="<?=base_url()?>">Home</a></li>
      <li class="active">Registration</li>
    </ul>
  
    <div class="row margin-bottom-40">
      <?php $this->load->view('leftside.php'); ?>
      
    
      <div class="col-md-8 col-sm-8">
        <h1>Forgot Password</h1>
         <div id="loadingforgot" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> </div>
        <p id="forgmessage" class="" style="display:none"> </p>
        <div class="content-form-page">
          <div class="row">
            <div class="col-md-7 col-sm-7">
             
              <form action="#" method="post" class="form-horizontal">
                <fieldset>
                  
                  
                  <div class="form-group">
                    <label for="email" class="col-lg-4 control-label labelcolor">Email:<span class="require">*</span></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="foremail" name="foremail">
                      <span id="foremailerrror"></span> </div>
                  </div>
                </fieldset>
                
                <div class="row">
                  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                    <button id="regbutton" type="button" class="btn btn-primary" onClick="forgotPassword()">Submit</button>
                    <!--<input type="submit" id="btnSearch" value="Search" onclick="return doSomething();" />-->
                <!--  <input type="button" class="btn btn-primary" id="submit-add-faq" name="submit-add-faq" value="Add"/>-->
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php $this->load->view('rightside.php'); ?>
    </div>
  </div>
</div>
<?php $this->load->view('footer.php'); ?>
</body>
</html>