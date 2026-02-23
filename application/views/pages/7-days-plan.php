<?php $this->load->view('include/header.php'); ?>

<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    
  <div class="container">
    <?php $this->load->view('notification/notification-messages');?>
  
  <h3 class="pt-4 wow fadeInDown">7 Days Job Hunt Plan</h3>
            <div style="border-top: 4px solid #666;margin-bottom: 20px;"></div>
        
<h3 class="pt-4 wow fadeInDown">Day 1</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('mycvreport');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user"></i>
                <h6 class="h6">Cv Review</h6>
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('reference');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-book"></i>
                <h6 class="h6">References</h6>
          
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='javascript:void(0);'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-envelope"></i>
                <h6 class="h6">Professional Email</h6>
                <p>Coming Soon...</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('companies');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-intercom"></i>
                <h6 class="h6">50 Companies</h6>
                <p>Coming Soon...</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('shoutbox');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-users"></i>
                <h6 class="h6">Discussion Board</h6>
                <p>Navafiz Discussion Board</p>
              </div>
            </a>
          </div>
        </div>
<h3 class="pt-4 wow fadeInDown">Day 2</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="https://linkedin.com/feed/" target="Blank">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-linkedin"></i>
                <h6 class="h6">Linked In Profile</h6>
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('reference');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-book"></i>
                <h6 class="h6">5 New References</h6>
          
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('mycard/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="far fa-address-card"></i>
                <h6 class="h6">My Card</h6>
                <br>
                <br>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('companies');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-intercom"></i>
                <h6 class="h6">50 Companies</h6>
                <p>Coming Soon...</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('shoutbox');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-users"></i>
                <h6 class="h6">Discussion Board</h6>
                <p>Navafiz Discussion Board</p>
              </div>
            </a>
          </div>
        </div>
<h3 class="pt-4 wow fadeInDown">Day 3</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="https://www.bayt.com/en/uae/" target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user"></i>
                <h6 class="h6">Bayt Profile</h6>
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('reference');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-book"></i>
                <h6 class="h6">5 New References</h6>
          
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('companies');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-intercom"></i>
                <h6 class="h6">50 Companies</h6>
                <p>Coming Soon...</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('mycard/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-door-open"></i>
                <h6 class="h6">Door to Door</h6>
                <p>Visit Plan Map 1</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('shoutbox');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-users"></i>
                <h6 class="h6">Discussion Board</h6>
                <p>Navafiz Discussion Board</p>
              </div>
            </a>
          </div>
        </div>   

<h3 class="pt-4 wow fadeInDown">Day 4</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="https://www.indeed.ae/" target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user"></i>
                <h6 class="h6">Indeed Profile</h6>
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('reference');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-book"></i>
                <h6 class="h6">5 New References</h6>
          
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('companies');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-intercom"></i>
                <h6 class="h6">50 Companies</h6>
                <p>Coming Soon...</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('mycard/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-door-open"></i>
                <h6 class="h6">Door to Door</h6>
                <p>Visit Plan Map 1</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('shoutbox');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-users"></i>
                <h6 class="h6">Discussion Board</h6>
                <p>Navafiz Discussion Board</p>
              </div>
            </a>
          </div>
        </div>  

<h3 class="pt-4 wow fadeInDown">Day 5</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="javascript:void(0);">
              <div class="block text-center wow fadeInLeft">
                <i class="far fa-file-video"></i>
                <h6 class="h6">Video CV</h6>
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('reference');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-book"></i>
                <h6 class="h6">5 New References</h6>
          
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('skills');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-envelope"></i>
                <h6 class="h6">My Skills</h6>
                <br>
                <br>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('mycard/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-door-open"></i>
                <h6 class="h6">Door to Door</h6>
                <p>Vsit Plan Map</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('shoutbox');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-users"></i>
                <h6 class="h6">Discussion Board</h6>
                <p>Navafiz Discussion Board</p>
              </div>
            </a>
          </div>
        </div> 

<h3 class="pt-4 wow fadeInDown">Day 6</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="https://www.gulftalent.com/" target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user"></i>
                <h6 class="h6">Gulf Talent Profile</h6>
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('reference');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-book"></i>
                <h6 class="h6">5 New References</h6>
          
                <br>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('companies');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-intercom"></i>
                <h6 class="h6">50 Companies</h6>
                <p>Coming Soon...</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('mycard/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-door-open"></i>
                <h6 class="h6">Door to Door</h6>
                <p>Visit Plan Map 1</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('shoutbox');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-users"></i>
                <h6 class="h6">Discussion Board</h6>
                <p>Navafiz Discussion Board</p>
              </div>
            </a>
          </div>
        </div> 

<h3 class="pt-4 wow fadeInDown">Day 7</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="javascript:void(0);" target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="  fab fa-product-hunt"></i>
                <h6 class="h6">Interview</h6>
                <p>Preparation for Interview</p>
                
               
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="javascript:void(0);">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user-friends"></i>
                <h6 class="h6">Navafiz Team</h6>
          
                <p>Connection with Navafiz</p>
                
                
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('companies');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-intercom"></i>
                <h6 class="h6">50 Companies</h6>
                <p>Coming Soon...</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('mycard/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-door-open"></i>
                <h6 class="h6">Door to Door</h6>
                <p>Visit Plan Map 1</p>
                <br>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('shoutbox');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-users"></i>
                <h6 class="h6">Discussion Board</h6>
                <p>Navafiz Discussion Board</p>
              </div>
            </a>
          </div>
        </div>                                  
</div>    
<div class="clearfix"></div>
<?php $this->load->view('include/footer.php'); ?>
