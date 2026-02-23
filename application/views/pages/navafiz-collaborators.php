<?php 
    $this->load->view('include/header');
    $session_user_id = $this->session->userdata('user_id');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <h2>Navafiz Collaborators</h2>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <p>&nbsp;</p>
        </div>
    </div>    
    <div class="row logos">
        <div class="col-md-4 col-xs-12">
            <a href="https://www.almanaltraining.ae/" rel="nofollow" target="blank">
                <img src="<?=site_url('uploads/collaborators/almanal.png');?>" class="img-fluid img-responsive" />
            </a>
        </div>
        <div class="col-md-4 col-xs-12">
            <a href="http://icpap.com.pk/" rel="nofollow" target="_blank">
                <img src="<?=site_url('uploads/collaborators/cpa.png');?>" class="img-fluid img-responsive" />
            </a>
        </div>
        <div class="col-md-4 col-xs-12">
            <a href="https://www.icmap.com.pk/" rel="nofollow" target="_blank">
                <img src="<?=site_url('uploads/collaborators/icma.png');?>" class="img-fluid img-responsive" />
            </a>
        </div>        
    </div>
</div>
<?php $this->load->view('include/footer'); ?>