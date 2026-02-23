<?php $this->load->view('include/header'); 
$session_user_id = $this->session->userdata('user_id');
?>
<link href='<?= base_url()?>nassets/feed/css/feed-style.css?v=<?=time();?>' rel="stylesheet" > 
<link href='<?= base_url('nassets/feed/css/feed-responsive.css?v='.time().'')?>' rel="stylesheet"> 
<div class="container-mid feedpage">
    <div class="row">
        <div class="col-md-3 leftside d-none d-sm-block">
            <?php $this->load->view('include/leftfeed');?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?php $this->load->view('notification/notification-messages');?>
            <div class="feed-area">                                
                <div class="feed-list-box">
                    
                </div>        
                <div class="justify-content-center feedloader text-center">
                    <button class="btn btn-primary" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
                <!--<p class="text-center feedloader">
                    <img src="<?=site_url('nassets/feed/images/loader.gif');?>" />
                </p>-->
                <div class="row">        
                    <div class="col-sm-12 col-xs-12 padding-top-20 load_more_btn" style="margin-top: 25px;">
                        <a  href="javascript:void(0);" class="btn btn-success load_more col-sm-12 col-xs-12">Loadmore..</a>
                    </div>
                </div>
                <input type="hidden" id="page_id" class="page_id" name="page_id" value="1">
                <input type="hidden" id="reqest_user_id" class="reqest_user_id" name="reqest_user_id" value="<?=$request_user_id?>">
            </div>
        </div>
        <div class="col-md-3 col-xs-12 rightside d-none d-sm-block">
            <?php $this->load->view('include/rightfeed');?>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer');?>
<script>
$(document).ready(function () {
    
});

$(document).ready(function(){
    loadfeed(1,0,<?=$request_user_id?>);            
});

</script>
<?php $this->load->view('feed/feed-script');?>