<?php $this->load->view('include/header.php'); ?>
<?php $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?>    
<style>
    .card a{
        color: #164885;
    }
</style>
<div class="container-mid"> 
    <div class="card">
        <div class="card-header">Where do you want to list job?</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                  <a href="<?=site_url('feed');?>">
                    <div class="block text-center wow fadeInLeft">
                      <i class="fas fa-globe"></i>
                      <h6 class="h6">As Received</h6>
                      <p>From Unverified Source</p>
                    </div>
                  </a>  
                </div>
                <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                    <a href="<?=site_url('jobs/addjob');?>">
                      <div class="block text-center wow fadeInLeft">
                        <i class="fas fa-check-square"></i>
                        <h6 class="h6">Verified Job</h6>
                        <p>Verified By Navafiz</p>                        
                      </div>
                    </a>
                </div>
                <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                    <a href="<?=site_url('jobpost');?>">
                      <div class="block text-center wow fadeInLeft">
                        <i class="fas fa-info-circle"></i>
                        <h6 class="h6">Recruiters</h6>
                        <p>Recruiters & Companies</p>
                      </div>
                    </a>
                </div>
                <div class="col-md-3 col-xs-12 p-lg-2 p-1">
                    <a href="<?=site_url('myjobs');?>">
                      <div class="block text-center wow fadeInLeft">
                        <i class="fas fa-tasks"></i>
                        <h6 class="h6">Posted Jobs</h6>
                        <p>My Posted Jobs</p>                        
                      </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>    
<div class="clearfix"></div>
<?php $this->load->view('include/footer.php'); ?>