<script>
$(function () {
    $('#cvpage').fileUploadUI({
        uploadTable: $('#files1'),
        downloadTable: $('#files1'),
			
        buildUploadRow: function (files, index) {
            return $('<tr><td><img src="<?=base_url()?>assets/frontend/images/small.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
		
		if(file.msg == "large size") {
		$("#cvsms").show();
		$("#cvsms").html('<span class="Errorclass">Size should be less than 2MB</span>');
			
		}
		else if(file.msg == "invalid type") {
			$("#cvsms").show();
			$("#cvsms").html('<span class="Errorclass">Only doc,docx,pdf allowed</span>');
       	 }
		else if(file.msg == "success") {
			$('#cvimage').val(file.name);
			$('#c_image').attr('src','<?=base_url()?>assets/uploads/cvs/'+file.name);
			$("#cvsms").show();
		$("#cvsms").html('<span class="Successclass">File upload successfully</span>');
       	 }
		 else {
			$("#cvsms").show();
			$("#cvsms").html('<span class="Errorclass">Due to internet Problem file not upload </span>');
       	 }
		}
    });
 });
</script>
<script>
function statusChangeCallback(response) {
    if (response.status === 'connected') {
	      loginFacebookAPI();
    } else if (response.status === 'not_authorized') {
     
    } else {
     
     
    }
  }
function checkLoginState() {
	 FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

 window.fbAsyncInit = function() {
  FB.init({
    appId      : '125784917765132',
    cookie     : true,  
    xfbml      : true,  
    version    : 'v2.4' 
  });
  };
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function loginFacebookAPI() {
    FB.api('/me', {fields: 'name,email'},function(response) {
	
		   var postForm = {
              facebookid: response.id, 
			  email: response.email, 
        	  name: response.name
        };
       $.ajax({
            type      : 'POST', 
            url       : 'fbuserlogin', 
            data      : postForm,
              success   : function(data) {
                        if (data == 1) {
                            window.location.href = "/";
                            }
                            else if (data == 0) {
                            window.location.href = "/";
                            }	
                        }
            });
    });
  }
  

</script>

<div id="fb-root"></div>
<div class="col-md-2 col-sm-2 sidebar2">
    
  <?php if($this->session->userdata('user_id')!=''){?>
<div class="form-group right" style="padding-top:20px; padding-right:5px;float:right;"> <a href="<?=base_url()?>profile"  class="btn btn-primary" style="color:#fff">Edit Profile</a> </div>
  <div class="form-group" style="padding-top:20px; padding-left:5px;">
    <?php
   if($profile->facebook_id !="")
   {
   ?>
    <img alt="<?=$profile->m_name?>" class="img-square" src="http://graph.facebook.com/<?=$profile->facebook_id?>/picture?type=large" width="140" height="140" style="border:2px solid #FFF;">
    <?php
   }
   else
   {
   ?>
    <img alt="<?=$profile->m_name?>" class="img-square" src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" width="100" style="border:2px solid #FFF;">
    <?php
   }
  ?>
  </div>

  <div class="form-group">
    <label><strong>Name:</strong>
      <?=$profile->m_name?>
    </label>
    <br />
    <label><strong>Job Title:</strong>
      <?=$profile->m_profession?>
    </label>
    <br />
    <label><strong>Experience:</strong>
      <?=$profile->m_experience?>
    </label>
    <br />
    
     <label><strong>Employment Statyus:</strong>
      <?=ucfirst($profile->employment_status)?>
    </label>
    <br />
    
    <span>
    <hr />
    </span>
    <label><strong>Visa Status:</strong>
      <?=ucfirst($profile->visa_status)?>
    </label>
    <br />
    
    <label><strong>Nationality:</strong>
      <?=$profile->m_nationality?>
    </label>
    <br />
    <label><strong>Location:</strong>
      <?=$profile->m_city?>
    </label>
    <br />
    <label><strong>Employer:</strong>
      <?=$profile->m_employer?>
    </label>
    <br />
  </div>
  </address>
  <form action="<?=base_url()?>member/uploadcv" class="login_page" method="post" action="#" id="cvpage" >
  <input type="hidden" id="cvimage" value="" />
  <div class="form-group">
    <?php
	if($profile->member_cv != ""){
	?>
    <label for="">My CV</label>
    <?php
	}
	else{
	?>
    <label for="">Upload Your CV</label>
   <p id="cvsms" style="display:none"> </p>
    <input type="file" id="cvfile" name="cvfile">
    <table id="files1">
    </table>
    <p class="help-block"> Word,PDF File only </p>
    
     <button type="button" class="btn btn-primary" onClick="cvUpload()">Upload</button>
      <?php
	}
	?>
  </form>
  </div>
 
  <div class="form-group">
    <h4 class="padding-top-20" style="font-weight:bold;">My Social Links</h4>
    <label for="career-resume"><a href="<?=$profile->m_fb?>" target="_blank">Facebook</a></label>
    <br />
    <label for="career-resume"><a href="<?=$profile->m_tw?>" target="_blank">Twitter</a></label>
    <br />
    <label for="career-resume"><a href="<?=$profile->m_lk?>" target="_blank">Linked In</a></label>
  </div>
  <?php }
   else{
	   
	   
	   ?>
  <h2 class="padding-top-20">Login</h2>
  <p class="text-danger" id="sidebarloginsms" style="display:none"> </p>
  <!-- BEGIN FORM-->
  <form action="<?php echo base_url('userlogin');?>" method="post" class="login_page">
    <div class="form-group">
      <label for="career-name">Email address</label>
      <input type="text" id="email" name="email" placeholder="Email address" class="form-control">
      <span  id="emailerror" class="Errorclass"></span> </div>
    <div class="form-group">
      <label for="career-name">Password</label>
      <input type="password" id="password" name="password" placeholder="Password" class="form-control">
    </div>
    <div class="form-group">
      <div id="loading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> </div>
    </div>
      <input type="hidden" name="actioncall" value="userlogin">
      <input id="leftlogin" type="submit" class="btn btn-primary" value="Sign in">
  </form>
    <br />
  <span><a href="<?=base_url()?>forgot">Forgot Password</a></span>
  <span class="strike-under"><span>or</span></span>
  <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">login fb </fb:login-button>
  <div id="status"> </div>
  <span class="strike-under"><span>or</span></span>
  <p ><a class="btn btn-primary" href="<?=base_url()?>register">Register Here </a> </p>
  <?php
   }
  ?>
</div>
