<style>
.Errorclass {
	color: #F00;
}
input[type='file'] {
	color: transparent;
}
.strike-under {
    display: block;
    margin-bottom: 1.5em;
    margin-top: 1.25em;
    position: relative;
    text-align: center;
}
.strike-under::before {
    border-top: 1px solid #ffffff;
    content: "";
    display: block;
    height: 1px;
    position: absolute;
    top: 50%;
    width: 100%;
    z-index: 1;
}
.strike-under span {
    background: #cccccc none repeat scroll 0 0;
    padding: 0 0.5em;
    position: relative;
    z-index: 5;
}
</style>
<script src="<?=base_url()?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?=base_url()?>resources/admin/js/uploader/jquery-ui.css">
<!--<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery-ui.min.js"></script>-->
<script type="text/javascript" src="<?=base_url()?>assets/frontend/uploader/jquery.fileupload.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/frontend/uploader/jquery.fileupload-ui.js"></script>
<script>
/*global $ */

$(function () {
    $('#cvpage').fileUploadUI({
        uploadTable: $('#files1'),
        downloadTable: $('#files1'),
			
        buildUploadRow: function (files, index) {
            return $('<tr><td><img src="<?=base_url()?>assets/fuploads/frontend/images/small.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
			$('#cvimage').val(file.name);
			$('#c_image').attr('src','<?=base_url()?>assets/uploads/cvs/'+file.name);

        }
    });
 });
</script>

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
	 FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '125784917765132',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', {fields: 'name,email,'},function(response) {
		
		  $.post("fbuserlogin", { 
        facedsfsdbookid: response.id, 
        emadfdfdil: response.email, 
        natghfghme: response.name, 
        });
		console.log(response);
    /*  console.log('Successful login for: ' + response.email);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.email + '!';*/
    });
  }
</script>

<div id="fb-root"></div>
<div class="col-md-2 col-sm-2 sidebar2">
  <?php if($this->session->userdata('user_id')!=''){?>
   <div class="form-group" style="padding-top:20px; padding-left:5px;">
  <img alt="" class="img-square" src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" width="100" style="border:2px solid #FFF;"> 
  </div>
 
  
  <div class="form-group">
    <label><strong>Name:</strong> <?=$profile->m_name?></label>
    <label><strong>Job Title:</strong> <?=$profile->m_profession?></label>
    <label><strong>Experience:</strong> <?=$profile->m_experience?></label>
    <span><hr /></span>
    <label><strong>Nationality:</strong> <?=$profile->m_nationality?></label>
    <label><strong>Location:</strong> <?=$profile->m_city?></label>
    <label><strong>Employer:</strong> <?=$profile->m_employer?></label>
  <!--  <label for="career-resume">Location: <?=$profile->m_city?></label>-->
  </div>
  
  <div class="form-group">
   <a href="<?=base_url()?>profile"  class="btn btn-primary" style="color:#fff">Eidt</a>
  </div> 
  </address>
  <form action="<?=base_url()?>member/uploadcv" class="login_page" method="post" action="#" id="cvpage" >
  <input type="hidden" id="cvimage" value="" />
  <div class="form-group">
    <?
	if($profile->member_cv != ""){
	?>
    <label for="">My CV</label>
    <?
	}
	else{
	?>
    <label for="">Upload Your CV</label>
    <?
	}
	?>
    <input type="file" id="cvfile" name="cvfile">
    <table id="files1">
    </table>
    <!--  <img id="c_image" src="<?=base_url()?>assets/uploads/cvs/" width="80" />-->
    <p class="help-block"> Word File only </p>
  </div>
  <button type="button" class="btn btn-primary" onClick="cvUpload()">Upload</button>
  </form>
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
  <p class="text-danger" id="sidebarloginsms" style="display:none">
               
              </p>
  <!-- BEGIN FORM-->
  <form action="#" method="post" class="login_page" onsubmit="event.preventDefault();loginUser();">
    <div class="form-group">
      <label for="career-name">Efgdgmail address</label>
      <input type="text" id="email" placeholder="Email address" class="form-control">
      <span  id="emailerror" class="Errorclass"></span> </div>
    <div class="form-group">
      <label for="career-name">Password</label>
      <input type="password" id="password" placeholder="Password" class="form-control">
    </div>
    <div class="form-group">
     
            <div id="loading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> </div>
    </div>
   
    <input type="button" class="btn btn-primary" value="Sign in" onClick="loginUser()">
  </form>
 
  <span class="strike-under"><span>or</span></span>
 
 <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">login fb
</fb:login-button>
 <span class="strike-under"><span>or</span></span>
  
  <p ><a class="btn btn-primary" href="<?=base_url()?>register">Register Here </a> </p>

  <?
   }
  ?>
  
</div>
