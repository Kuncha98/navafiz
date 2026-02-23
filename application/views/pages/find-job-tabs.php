<?php $this->load->view('include/header.php'); ?>

<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    
<style>
    .col-md-4{
        margin-bottom: 30px;
    }
    .card .card-body a{
        color: #164885;
    }
</style>
<div class="container-mid"> 
    <div class="card">
        <div class="card-header">
            <b style="font-size: 20px;">9 Ways to find Jobs</b>            
            <?php if(in_array($user_id, CvReviewTeamList())){ ?> 
            <a href="<?=site_url('place-job');?>" class="btn btn-success float-right">Post a Job</a>
            <?php } ?>
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-4 col-xs-12">
                  <a href="<?=site_url('jobs');?>">
                    <div class="block text-center ">
                      <i class="fas fa-check-square"></i>
                      <h6 class="h6">Verified Job</h6> 
                      <p>Verified By Navafiz</p>                      
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href="<?=site_url('feed');?>">
                    <div class="block text-center ">
                      <i class="fas fa-atlas"></i>
                      <h6 class="h6">As Received</h6>                
                      <p>From Unverified Source</p>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href='https://www.linkedin.com/company/navafiz/' target="_blank">
                    <div class="block text-center ">
                      <i class="fab fa-linkedin"></i>
                      <h6 class="h6">LinkedIn</h6>
                      <p>Navafiz Linkedin Page</p>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href="<?=site_url('jobs/quick_jobs');?>">
                    <div class="block text-center ">
                      <i class="fas fa-sticky-note"></i>
                      <h6 class="h6">Easy Apply Jobs</h6> 
                      <p>Verified By Navafiz</p>                      
                    </div>
                  </a>
                </div>
                
                <div class="col-md-4 col-xs-12">
                  <a href='<?=site_url('jobs');?>'>
                    <div class="block text-center ">
                      <i class="fas fa-info-circle"></i>
                      <h6 class="h6">Recruiters</h6>
                      <p>By Recruiters & Companies</p>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href='https://www.linkedin.com/groups/6536553/' target="_blank">
                    <div class="block text-center ">
                      <i class="fab fa-linkedin"></i>
                      <h6 class="h6">LinkedIn</h6>
                      <p>Navafiz Linkedin Group</p>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href='https://www.facebook.com/NavafizSupportSystems' target="_blank">
                    <div class="block text-center ">
                      <i class="fab fa-facebook-f"></i>
                      <h6 class="h6">Facebook</h6>
                      <p>Navafiz Facebook Page</p>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href='https://www.facebook.com/groups/JobPostMail/' target="_blank">
                    <div class="block text-center ">
                      <i class="fab fa-facebook-square"></i>
                      <h6 class="h6">Facebook</h6>
                      <p>Facebook Group</p>                      
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href='<?=site_url('social-media');?>' target="_blank">
                    <div class="block text-center ">
                      <i class="fab fa-whatsapp-square"></i>
                      <h6 class="h6">Social Media</h6>
                      <p>Whatsapp Group</p>
                    </div>
                  </a>
                </div>
              </div>
        </div>
    </div>
</div> 
<?php $this->load->view('include/footer.php'); ?>
</div>
</body>
</html>