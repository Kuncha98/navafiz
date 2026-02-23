<?php $this->load->view('include/header.php'); ?>

<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    

<div class="container">
    <?php $this->load->view('notification/notification-messages');?>
  <h3 class="pt-4 wow fadeInDown">WhatsApp Groups</h3>
        

        <div class="row px-2">          
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/2');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-dollar-sign"></i>
                <h6 class="h6">Finance</h6>
               
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/3');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-shopping-cart"></i>
                <h6 class="h6">Sales</h6>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/4');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-chart-line"></i>
                <h6 class="h6">Marketing</h6>
               
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/5');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-boxes"></i>
                <h6 class="h6">Logistics</h6>
               
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/7');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-laptop-code"></i>
                <h6 class="h6">I.T</h6>
               
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/6');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-file-signature"></i>
                <h6 class="h6">HR & Admin</h6>
                <p>Only for HR & Public Relation</p>
               
                
              </div>
            </a>
          </div>
          
          
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/9');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-ambulance"></i>
                <h6 class="h6">HSE</h6>
                <p>Health Safety & Environment</p>
              </div>
            </a>
          </div>
          
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/17');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-briefcase"></i>
                <h6 class="h6">Entrepreneur / Business</h6>
               <p>Entrepreneur / Business Support</p>
                
              </div>
            </a>
          </div>

          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/12');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-utensils"></i>
                <h6 class="h6">Chef / Cook / Restaurant</h6>
                <p>Chef / Cook / Restaurant</p>
               
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="javascript:void(0);">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-graduation-cap"></i>
                <h6 class="h6">Education</h6>
               <p>&nbsp;</p>
               <p>&nbsp;</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/8');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-clinic-medical"></i>
                <h6 class="h6">Medical</h6>
               <p>&nbsp;</p>
               <p>&nbsp;</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/13');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-lock"></i>
                <h6 class="h6">Security</h6>
                <p>Security</p>
               
                
              </div>
            </a>
          </div>
        <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/11');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-car-side"></i>
                <h6 class="h6">Drivers</h6>
                <p>Only for Drivers</p>
               
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/15');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-whatsapp-square"></i>
                <h6 class="h6">Multan</h6>
               <p>Multan</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/16');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-whatsapp-square"></i>
                <h6 class="h6">Karachi</h6>
                <p>Karachi</p>
               
                
              </div>
            </a>
          </div>
          
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/18');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-whatsapp-square"></i>
                <h6 class="h6">Media</h6>
                <p>Media</p>
               
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/19');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-whatsapp-square"></i>
                <h6 class="h6">Lahore</h6>
                <p>Lahore</p>
               
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/22');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-whatsapp-square"></i>
                <h6 class="h6">1G Canada Jobs</h6>
                <p>NAVAFIZ 1G Canada Jobs</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/23');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-whatsapp-square"></i>
                <h6 class="h6">Legal Advice</h6>
                <p>Legal Advice</p>
              </div>
            </a>
          </div>
        </div>

        <div style="border-top: 4px solid #666;margin-bottom: 20px;"></div>

        <h3 class="pt-4 wow fadeInDown">Engineering Whats app Group</h3>
        

        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/1');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-plane"></i>
                <h6 class="h6">Aeronautical Eng.</h6>
                <p>Aerospace</p>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/1');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-flask"></i>
                <h6 class="h6">Chemical Eng.</h6>
               <br>
                <!-- <br> -->
                <p>&nbsp;</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/21');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-vihara"></i>
                <h6 class="h6">Civil Eng.</h6>
                <br>
                <p>&nbsp;</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/1');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-plug"></i>
                <h6 class="h6">Electrical/Electronics</h6>
                <p>Electrical/Electronics</p>
                <br>
              </div>
            </a>
          </div>
          
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/1');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-whatsapp-square"></i>
                <h6 class="h6">Eng. Management</h6>
                <p>Engineering management.</p>
               
                
              </div>
            </a>
          </div>          
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/14');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-archive "></i>
                <h6 class="h6">Mechanical/Piping Engineering</h6>
                <p>HVAC</p>               
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('social-group/20');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-archive"></i>
                <h6 class="h6">Instrument Engineers</h6>
                <p>&nbsp;</p>               
              </div>
            </a>
          </div>

        </div>
        <div style="border-top: 4px solid #666;margin-bottom: 20px;"></div>
        <h3 class="pt-4 wow fadeInDown">LinkedIn Groups & Pages</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="https://www.linkedin.com/groups/6536553/" target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-linkedin"></i>
                <h6 class="h6">LinkedIn</h6>
                <p>Navafiz Linkedin Group</p>
                
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('page/resume');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fab fa-linkedin-in"></i>
                <h6 class="h6">Influencers</h6>
               
                <p>LinkedIn Influencers</p>
                <br>
              </div>
            </a>
          </div>
          
        </div>
        <h3 class="pt-4 wow fadeInDown">Facebook Jobs Sharing Groups & Pages</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="https://www.facebook.com/Navafizdotcom/" target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="  fab fa-facebook-square"></i>
                <h6 class="h6">Facebook Page</h6>
                
                <br>
                <p>&nbsp;</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="https://www.facebook.com/groups/JobPostMail/?ref=share">
              <div class="block text-center wow fadeInLeft">
                <i class="  fab fa-facebook"></i>
                <h6 class="h6">Facebook Group</h6>
               
                <p>Navafiz Facebook Group</p>
               
              </div>
            </a>
          </div>
          
        </div>
        <h3 class="pt-4 wow fadeInDown"> Downloads</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="http://www.navafiz.com/public-assets/Navafiz_Standard_CV_Updated_Nov_2019.pdf" target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-file-download"></i>
                <h6 class="h6">Sample CV</h6>
                
              </div>
            </a>
          </div>
         
          
        </div>
        
</div> 
    
<div class="clearfix"></div>
<?php $this->load->view('include/footer.php'); ?>
</div>
</body>
</html>