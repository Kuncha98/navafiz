<div class="container-mid">    
    <div class="row">
        <div class="col-md-4 mx-auto"><h2 class="text-center"><?=$pgtitle?> (<?=count($professionals)?>)</h2></div>
    </div>
    <div class="row">
        <?php $this->load->view($listprofessionals);?>
    </div>    
</div>