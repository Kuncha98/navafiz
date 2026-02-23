<?php $this->load->view('include/header.php'); ?>

<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    
  
  <div class="container">
 
  <h3 class="pt-4 wow fadeInDown">Navafiz Profile</h3>
        

        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url($user_id >0 ? 'mycard/'.$user_id :'login');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="far fa-id-card"></i>
                <h6 class="h6">My Card</h6>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('profile/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user"></i>
                <h6 class="h6">View Profile</h6>
               <p>My Digital Resume</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('edit-profile');?>' >
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user-alt"></i>
                <h6 class="h6">Edit Profile</h6>
                <p>Update Resume</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('teamactions/index/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user-friends"></i>
                <h6 class="h6">Team Actions</h6>
               <br>
              </div>
            </a>
          </div>
          
        </div>
</div> 


<div class="clearfix"></div>
<?php $this->load->view('include/footer.php'); ?>
