<?php $this->load->view('include/header.php'); ?>
<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>   

<div class="container-mid">
    <div class="embed-responsive embed-responsive-21by9">
        <iframe class="embed-responsive-item" src="<?=base_url('webmail/')?>"></iframe>
    </div>
    <div class="clearfix"></div>
    <?php $this->load->view('include/footer.php'); ?>
</div>
</body>
</html>