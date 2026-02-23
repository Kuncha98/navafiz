<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=SITE_NAME?></title>


    <title><?=SITE_NAME?> Administration Panel</title>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php // $this->load->view('admin/includes/headcss');?>
    <?php $this->load->view('admin/includes/sb-headscripts');?>
    <!-- Favicon-->
    <link rel="icon" href="<?=site_url('favicon.png');?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>



    <!-- Custom fonts for this template-->
    <link href="<?=site_url('nassets/admin/sb-admin');?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=site_url('nassets/admin/sb-admin');?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
   <link href="<?php echo base_url('nassets/admin/sb-admin/css/style.css')?>?v=2" rel="stylesheet">
   
   <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
     
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!--Datatable JS--> 
     <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   
</head>

<body id="page-top">


    <!-- Page Wrapper -->


      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <?php $this->load->view('admin/includes/leftside-new2');?>

        <!--End Side Navbar -->
        <div id="content-wrapper" class="d-flex flex-column" style="width: 100%">
            <div id="content">
             <?php $this->load->view('admin/includes/sb-header');?>

          <!-- Page Header-->
          <div class="container-fluid" >
              <div class="breadcrumb-holder align-items-stretch" style="margin-top: 5px;">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('admin/Dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item active"><?=isset($page_title) ? $page_title:'';?></li>
                </ul>
              </div>
          <header class="page-header">
              <h2 class="h3 mb-0 text-gray-800"><?=$page_title;?></h2>
          </header>

          <?php $this->load->view($content_view);?>
          </div>

          <?php $this->load->view('admin/includes/sb-footer');?>
          </div>
          </div>
        </div>



        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary" href="<?=site_url('admin/logout');?>">Logout</a>
                      </div>
                  </div>
              </div>
       </div>

    <script src="<?=site_url('nassets/admin/sb-admin/');?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=site_url('nassets/admin/sb-admin/');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="<?=site_url('nassets/admin/sb-admin/');?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=site_url('nassets/admin/sb-admin/');?>/js/sb-admin-2.min.js"></script>

<!--    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>-->
<script src="<?=site_url('nassets/admin/sb-admin/');?>/vendor/datatables/jquery.dataTables.min.js"></script>

<script src="<?=site_url('nassets/admin/sb-admin/');?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
<script src="<?=site_url('nassets/admin/sb-admin/');?>/js/demo/datatables-demo.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

</body>

</html>