<?php $this->load->view('include/header'); ?>
<?php $session_user_id = $this->session->userdata('user_id');?>
<?php
//print_r($job_applicants);
?>

<div class="container">
    <?php $this->load->view('notification/notification-messages'); ?>
    
</div>



<?php $this->load->view('include/footer'); ?>