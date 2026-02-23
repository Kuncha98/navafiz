<?php $this->load->view('include/header.php'); ?>

<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    

<div class="container-mid">
    <?php $this->load->view('notification/notification-messages');?>
  <h3 class="pt-4 wow fadeInDown">
  Edit Profile, Skills, Career Summary, Etc.<br />
                <small><b>Note:</b> In order to join Social Media Groups & Events User Profile information should be complete.</small>
    </h3>
        

        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('profile');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="far fa-edit"></i>
                <h6 class="h6">Profile</h6>
                <p>Edit Basic information</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('branding');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-tag"></i>
                <h6 class="h6">Branding</h6>
                <p>Branding Statement</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('UpdateProfilePhoto');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user-edit"></i>
                <h6 class="h6">Profile Picture</h6>
               <p>Update Profile Picture</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('summary-career');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fab fa-superpowers"></i>
                <h6 class="h6">Career Summary</h6>
                <p>Edit Summary of Career</p>
              </div>
            </a>
          </div>

          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('education');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user-graduate"></i>
                <h6 class="h6">Education</h6>
                <p>Edit  Education</p>
                <br>
              </div>
            </a>
          </div>

          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('skills');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-graduation-cap"></i>
                <h6 class="h6">Skills</h6>
                <p>Edit Skills</p>
                <br>
              </div>
            </a>
          </div>

          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('employment');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-history"></i>
                <h6 class="h6">Employment</h6>
                <p>Update Employment History</p>
              </div>
            </a>
          </div>

          <div class="col-md-2 col-4 p-lg-2 p-1">
              <a href="<?=site_url('certification')?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-certificate"></i>
                <h6 class="h6">Certificate & Courses</h6>
                <p>&nbsp;</p>
              </div>
            </a>
          </div>
            
          <div class="col-md-2 col-4 p-lg-2 p-1">
              <a href="<?=site_url('profile/update_dob')?>">
              <div class="block text-center wow fadeInLeft">
                <i class="far fa-calendar-alt"></i>
                <h6 class="h6">Date of Birth</h6>
                <p>Update Date of Birth</p>
              </div>
            </a>
          </div>

          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="#">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-puzzle-piece"></i>
                <h6 class="h6">Hobbies</h6>
                <p>Coming Soon...</p>
              </div>
            </a>
          </div>

          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="javascript:void(0);">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-language"></i>
                <h6 class="h6">Languages</h6>
                <p>Coming Soon...</p>
              </div>
            </a>
          </div>

          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('job_portals/index/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-suitcase"></i>
                <h6 class="h6">Job Portals</h6>
                <p>Job Portals Profiles</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('profile/status/'  );?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-suitcase"></i>
                <h6 class="h6">Status</h6>
                <p>Update Your Current Status</p>
              </div>
            </a>
          </div>
        </div>  
        <div style="border-top: 3px solid #666;margin-bottom: 20px;"></div>
        <div class="row">    
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('reference');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-atlas"></i>
                <h6 class="h6">Reference</h6>
                <p>Edit Reference</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-media');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-users"></i>
                <h6 class="h6">Social Media</h6>
                <p>Edit Social Media</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('member/successstory');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-book"></i>
                <h6 class="h6">Success Story</h6>
                <p>Edit Success Story</p>
              </div>
            </a>
          </div>
      </div>
      <div style="border-top: 3px solid #666;margin-bottom: 20px;"></div>
      <div class="row">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('change-password');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user-lock"></i>
                <h6 class="h6">Change Password</h6>
                <p>Edit Change Password</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('myjobs');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-arrow-right"></i>
                <h6 class="h6">My Posted Jobs</h6>
                <p>Edit  My Posted Jobs</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('SubmitCvReview');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-file-upload"></i>
                <h6 class="h6">Submit CV for Review</h6>
                <p>Submit CV for Review</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('profile/AddCV');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-file-upload"></i>
                <h6 class="h6">Upload CV</h6>
                <p>Upload Cv</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('profile/delProfile');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-trash"></i>
                <h6 class="h6">Delete Profile</h6>
                <p>Want to Delete your Profile?</p>
              </div>
            </a>
          </div>
      </div>
      <div style="border-top: 3px solid #666;margin-bottom: 20px;"></div>
          <div class="row">
              <div class="col-md-2 col-4 p-lg-2 p-1">
                <a href="<?=site_url('shoutbox');?>">
                  <div class="block text-center wow fadeInLeft">
                    <i class="fas fa-comments"></i>
                    <h6 class="h6">Discussion Board</h6>
                    <p>Navafiz Discussion Board</p>
                  </div>
                </a>
              </div>
              <div class="col-md-2 col-4 p-lg-2 p-1">
                <a href="<?=site_url('profile/'.$user_id);?>">
                  <div class="block text-center wow fadeInLeft">
                    <i class="  fas fa-user"></i>
                    <h6 class="h6">View Profile</h6>

                    <p>User Public Profile</p>
                    <br>
                  </div>
                </a>
              </div>

              <div class="col-md-2 col-4 p-lg-2 p-1">
                <a href="<?=site_url();?>">
                  <div class="block text-center wow fadeInLeft">
                    <i class="fas fa-home"></i>
                    <h6 class="h6">Home</h6>
                    <p>Navigate to Home Page</p>
                  </div>
                </a>
              </div>
          </div>
        </div>
</div> 
    
<div class="clearfix"></div>
<?php $this->load->view('include/footer.php'); ?>
