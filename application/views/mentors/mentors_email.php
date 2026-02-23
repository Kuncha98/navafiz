<?php
    $this->load->view('include/header');
    $session_user_id = $this->session->userdata('user_id');
?>


<div class="container">
    <div class="text-center">
        <h2>Mentors Email</h2>
    </div>
    <div class="row mt-4">
        <?php foreach($mentors_list as $mentor) {?>
        <div class="col-md-3">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <a href="<?= site_url('n/'.$mentor->m_id)?>"><?=$mentor->m_name?></a> 
                </div>
                <div class="card-body">
                    <?=$mentor->m_email?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<?php $this->load->view('include/footer'); ?>