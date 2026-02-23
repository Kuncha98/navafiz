<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title><? echo SITE_NAME ?></title>
<link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/londinium-theme.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/styles.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/icons.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/charts/sparkline.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/switch.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/uploader/plupload.queue.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/wysihtml5/toolbar.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/timepicker.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="full-width page-condensed">
<div class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-right"> <span class="sr-only">Toggle navbar</span> <i class="icon-grid3"></i> </button>
    <a class="navbar-brand" href="#" style="padding:0px;" ><img height="60" src="<?=base_url()?>assets/admin/images/logo.png" alt="<? echo SITE_NAME ?>"></a> </div>
</div>
<!-- /navbar --> 

<!-- Login wrapper -->
<div class="login-wrapper">
  <?php if($this->session->userdata('msg') != "") { 
 

 ?>
  <div class="bg-danger with-padding"><strong>Error: </strong><?php echo $this->session->userdata('msg'); ?></strong></div>
  <?php 
						$this->session->unset_userdata('msg');
						} ?>
  <form action="<?php echo(base_url().'admin/main/login'); ?>" method="post" id="login-form">
    <div class="popup-header"> <a href="#" class="pull-left"><i class="icon-user-plus"></i></a> <span class="text-semibold">Admin Login</span>
      <div class="btn-group pull-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></a> </div>
    </div>
    <div class="popup-header"> </div>
    <div class="well">
      <div class="form-group has-feedback">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" id="login_id" name="login_id">
        <i class="icon-users form-control-feedback"></i> </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        <i class="icon-lock form-control-feedback"></i> </div>
      <div class="row form-actions">
        <div class="col-xs-6"> </div>
        <div class="col-xs-6">
          <input type="submit" class="btn btn-primary" value="Login" />
        
        </div>
      </div>
    </div>
  </form>
</div>
<!-- /login wrapper --> 

<!-- Footer -->
<?php $this->load->view('admin/footer.php'); ?>
<!-- /footer -->

</body>
</html>