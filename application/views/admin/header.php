<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title></title>
<link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/customstyle.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/styles.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/icons.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/admin/css/custom_paging.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/jquery.fancybox-1.3.4.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/front/stylesheet/custom_paging.css" />	
<link href="<?=base_url()?>assets/admin/css/uploadfilemulti.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery-ui.min.js"></script>




<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/wysihtml5/toolbar.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/switch.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>

<!--<script type="text/javascript" src="<?=base_url()?>assets/admin/js/ckeditor/ckeditor.js"></script>-->
<!--<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery.fileuploadmulti.min.js"></script>
-->
<link rel="stylesheet" href="<?=base_url()?>resources/admin/js/uploader/jquery-ui.css">
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/uploader/jquery.fileupload.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/uploader/jquery.fileupload-ui.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/application.js"></script>
<?php
$session_user_id= $this->session->userdata('user_id');
if(!in_array($session_user_id, CvReviewTeamList())){
    _setError("You don't have permission to access this page");
    redirect(site_url('feed'));
    exit();
}
?>
</head>