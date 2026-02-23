<?php $this->load->view('include/header'); ?>
<?php $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?>    
<div class="container-mid"> 
    <h3 class="pt-4 wow fadeInDown">Recruiters Support System</h3>
    <div class="row px-2">
      <div class="col-md-2 col-4 p-lg-2 p-1">
        <a href="<?=site_url('place-job');?>">
          <div class="block text-center wow fadeInLeft">
            <i class="fas fa-sign-in-alt"></i>
            <h6 class="h6">Post a Job</h6>
            <br>
            <br>
          </div>
        </a>
      </div>
      <div class="col-md-2 col-4 p-lg-2 p-1">
        <a href="<?=site_url('professionals');?>">
          <div class="block text-center wow fadeInLeft">
            <i class="fas fa-user-graduate"></i>
            <h6 class="h6">Professionals</h6>
            <p>Active Job Seekers</p>
          </div>
        </a>
      </div>
      <div class="col-md-2 col-4 p-lg-2 p-1">
        <a href='javascript:void(0);' onclick="alert('Coming Soon '); return false;">
          <div class="block text-center wow fadeInLeft">
            <i class="fab fa-skyatlas"></i>
            <h6 class="h6">Find Skills</h6>
            <p>Coming Soon</p>
          </div>
        </a>
      </div>
        
      <div class="col-md-2 col-4 p-lg-2 p-1">
        <a href="<?=site_url('professionals');?>">
          <div class="block text-center wow fadeInLeft">
            <i class="fas fa-user"></i>
            <h6 class="h6">Recommend a Candidate</h6>
            <br>
            <br>
          </div>
        </a>
      </div>  
        
        
<!--        <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?= site_url('professionals')?>'>
          <div class="block text-center wow fadeInLeft">
            <i class="fas fa-user"></i>
            <h6 class="h6">Recommend a Candidate</h6>
          </div>
        </a>
      </div>-->
    </div>
</div> 
<?php $this->load->view('include/footer');?>
