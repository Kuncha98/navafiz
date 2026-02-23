<!DOCTYPE html>
<html lang="en">



<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Navafiz is one of the best free job portal in UAE. Find best Jobs in UAE and all over the world, jobs listings and job opportunities on Navafiz.">
    <meta name="author" content="Navafiz">
    <title>Jobs in UAE: Jobs in Abu Dhabi, Ajman, Fujairah, Sharjah, Dubai, Ras al-Khaimah, Umm al-Qaiwain</title>
    <link rel="icon" href="<?=base_url()?>assets/frontend/images/favicon.ico" type="image/x-icon">

    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/bootstrap.min.css">

    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/mega_menu.min.css">

    <!-- ANIMATION -->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/animate.min.css">

    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/owl.style.css">

    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/style.css">

    <!-- FOR THIS PAGE ONLY -->
    <link href="<?=base_url()?>assets/frontend/css/select2.min.css" rel="stylesheet" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/et-line-fonts.css" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    <!-- JavaScripts -->
    <script src="js/modernizr.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="page category-page">
        
        <section class="login-page-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="login-container">
                            <div class="loginbox">
                                <img src="<?=base_url()?>assets/frontend/images/logo.png" alt="logo" class="img-responsive center-block">
                                <div class="loginbox-title">sign in using social accounts</div>
                                <ul class="social-network social-circle onwhite">
                                 <!--   <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>-->
                                  <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">login fb </fb:login-button>
                                 
                                </ul>
                                <div class="loginbox-or">
                                    <div class="or-line"></div>
                                    <div class="or">OR</div>
                                </div>
                                
                                   <div class="form-group" style="text-align:center;"> <span class="errormessage"><? echo validation_errors(); ?><?php echo $this->session->flashdata('msg'); ?></span> </div>
                                 <form action="<?=base_url()?>login" method="post" class="login_page">
                                <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input placeholder="" name="email" class="form-control" type="email"  required>
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    <input placeholder="" name="password" class="form-control" type="password"  required>
                                </div>
                                <div class="loginbox-forgot">
                                    <a href="<?=base_url()?>forgot">Forgot Password?</a>
                                </div>
                                <div class="loginbox-submit">
                                  
                                     <input value="Log In" class="btn btn-default btn-block" type="submit">
                                </div>
                                </form>
                                <div class="loginbox-signup">
                                    <a href="<?=base_url()?>register">Sign Up With Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

        <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/jquery-3.1.1.min.js"></script>
    
    <!-- JAVASCRIPT JS  --> 
    <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/jquery-migrate-1.2.1.min.js"></script>

        <!-- BOOTSTRAP CORE JS -->
        <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/bootstrap.min.js"></script>

        <!-- MEGA MENU -->
        <!--<script type="text/javascript" src="<?=base_url()?>assets/frontend/js/mega_menu.min.js"></script>-->

         

        <!-- JQUERY COUNTERUP -->
     <!--   <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/counterup.js"></script>-->

        <!-- JQUERY WAYPOINT -->
        <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/waypoints.min.js"></script>

        <!-- JQUERY REVEAL -->
        <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/footer-reveal.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/owl-carousel.js"></script>

        <!-- CORE JS -->
        <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/custom.js"></script>

        <script type="text/javascript">
            $(".full-page").height($(window).height());
            $(window).resize(function() {
                $(".full-page").height($(window).height());
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
                            window.location.href = "/newversion/profile";
                            }
                            else if (data == 0) {
                            window.location.href = "/newversion/login";
                            }	
                        }
            });
    });
  }
  

</script>  
    </div>
</body>



</html>