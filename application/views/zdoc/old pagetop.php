<nav id="menu-1" class="mega-menu fa-change-black">
    <section class="menu-list-items container">
      <ul class="menu-logo">
        <li> <a href="<?=base_url()?>"> <img src="<?=base_url()?>assets/frontend/images/logo.png" alt="logo" class="img-responsive"> </a> </li>
      </ul>
      <ul class="menu-links pull-right">
        <li> <a href="<?=base_url()?>"> Home </a>
          
        </li>
        <li><a href="<?=base_url()?>jobs"> Jobs <!--<i class="fa fa-angle-down fa-indicator"></i>--></a>
          
        </li>
        <li><a href="<?=base_url()?>professionals">  Find Professionals <!--i class="fa fa-angle-down fa-indicator"></i>--></a>
          
        </li>
        <li><a href="<?=base_url()?>page/about"> About us <!--<i class="fa fa-angle-down fa-indicator"></i>--></a>
          
        </li>
        <li><a href="<?=base_url()?>contact"> Contact us <!--<i class="fa fa-angle-down fa-indicator"></i>--></a>
          
        </li>
     
         <?php if($this->session->userdata('user_id') ==''){?>
        
   
          
        <li class="no-bg login-btn-no-bg"><a href="<?=base_url()?>login" class="btn btn-default"><i class="fa fa-upload"></i>Login</a></li>
         <li class="no-bg login-btn-no-bg"><a href="<?=base_url()?>register" class="btn btn-default"><i class="fa fa-upload"></i>Register</a></li>
<?
		   }
		   else{
?>
 <li><a href="<?=base_url()?>jobpost"> Post a Job </a>
          
        </li>
         <li><a href="<?=base_url()?>happen"> Whats Happenning </a>
          
        </li>
		  <li><a href="<?=base_url()?>cvreviews"> CV Review</a>
          
        </li>

<li class="profile-pic">
                        <a href="javascript:void(0)"> 
                        
                         <?php
   if($this->session->userdata('facebook_id') !="")
   {
   ?>
                        
                        <img src="http://graph.facebook.com/<?=$profile->facebook_id?>/picture?type=large" alt="user-img" class="img-circle" width="36">
    <?
   }
   else{
	   ?>
       <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" alt="user-img" class="img-circle" width="36">
       <?
   }
   
	?>                    
                        
                        <span class="hidden-xs hidden-sm"><?php echo $this->session->userdata('name');?> </span><i class="fa fa-angle-down fa-indicator"></i> </a>
                        <ul class="drop-down-multilevel left-side">
                            <li><a href="<?=base_url()?>profile"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="<?=base_url()?>logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <?
		   }
					?>
     
      </ul>
    </section>
     <marquee style="font-size:12px;">Each member profile shall expire after 90 days (if not updated, or not logged in). </marquee>
  </nav>
 