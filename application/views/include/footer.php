<style>
    footer .main-footer h4 {
        border-bottom: 1px solid #999;
        margin-bottom: 15px;
        padding-bottom: 15px;
    }

    .main-footer {
        color: #fff;
        background: #636464;
        padding: 30px 0;
    }

    footer .main-footer li {
        font-size: 13px;
    }

    .ftr {
        color: #ffffff;
        font-family: Arial, Helvetica, sans-serif;
        line-height: 2.1;
        font-weight: lighter;
        padding-bottom: 13px;
        font-size: 12px;
    }

    a:hover {
        color: #999;
    }

    .fa-facebook-square {
        color: #ffffff
    }

    footer .main-footer li {
        font: 13px;
    }

    ul {
        margin-bottom: 20px;
    }

    h4 {
        font-family: "Proxima Nova SemiBold", Arial, Helvetica, sans-serif;
        line-height: 1.1;
        font-weight: 600;
        font-size: 16px;
    }

    .fa-twitter-square {
        color: #ffffff;
    }

    .float-wat {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        /*background-color:#25d366;*/
        /*color:#FFF;*/
        text-align: center;
        font-size: 30px;
        /*box-shadow: 2px 2px 3px #999;*/
        z-index: 100;
    }

    .my-float {
        margin-top: 16px;
    }

    /*For Whatsapp Chat*/
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    /* The popup chat - hidden by default */
    .chat-popup {
        display: none;
        position: fixed;
        bottom: 100px;
        right: 50px;
        border: 3px solid #f1f1f1;
        z-index: 9;
        border-radius: 50%;
    }

    /* Add styles to the form container */
    .form-container {
        width: 380px;
        background-color: white;
    }

    .cancel {
        background-color: #4CAF50;
        background-color: white;
        position: absolute;
        top: 0;
        right: 7px;
        border: none;
        color: #000;
        cursor: pointer;
        opacity: 0.8;
    }

    .name_head {
        color: grey;
    }

    .message {
        padding: 10px;
        padding-top: 41px;
        padding-right: 20px;
        height: 244px;
        width: 100%;
        background: url('<?= site_url('nassets') ?>/img/bck.png?v=1');
    }

    .chat {
        height: 57px;
        padding-bottom: 47px;
        margin-top: 18px;
        background-color: #4FCE5D;
        color: white;
    }

    .white {}

    .ftr-bottom .whatsapp a img {
        width: 80px;
        height: 80px;
    }
</style>
<div class="clearfix"></div>
<footer class="ftr-bottom" style="padding-top: 100px;">
    <div class="whatsapp"> <!--<button class="float-wat" onclick="openForm()">--> <a> <img
                src="<?= site_url('nassets'); ?>/img/whatsapp.svg" alt="Navafiz" class="rounded-circle float-wat" style=""
                onclick="openForm()"> </a> </div>
    <div class="chat-popup" id="myForm">
        <div class=" form-container">
            <div class="card">
                <div class="card-body"> <button id="cancel" class="cancel float-right" onclick="closeForm()">X</button>
                    <div class="text-center"> <img src="<?= site_url('nassets'); ?>/img/logo.png?v=1" alt="Navafiz"
                            style="width:200px;"> </div>
                    <hr>
                    <div class="message">
                        <div class="white pb-4">
                            <p style="backgound:white"> <strong class="name_head mt-3 mb-2">Navafiz Support
                                    Systems</strong><br> Hello! <br>Thank you for choosing Navafiz Support
                                systems.<br><br>How can I help you? </p>
                        </div>
                    </div> <a href="https://api.whatsapp.com/send/?phone=+971554465332" target="_blank" type="submit"
                        class="chat btn btn-block" pt-2 pb-4 mb-3> <img src="<?= site_url('nassets'); ?>/img/whatsapp.svg"
                            alt="Navafiz" class="rounded-circle" style="width:40px;height: 40px">Start Chat </a>
                </div>
            </div>
        </div>
    </div>
    <section class="main-footer">
        <div class="container hidden-print">
            <div class="row">
                <div class="col-md-6 mx-auto"> <a href="https://play.google.com/store/apps/details?id=navafiz.apk"
                        target="_blank"> <img src="<?= base_url('nassets/img/googleplaystore.png'); ?>" class="img-fluid"
                            width="200" /> <!--<i class="fab fa-android fa-3x grow" style="color:#fff"></i>--> </a>
                    &nbsp;&nbsp; <a href="https://apps.apple.com/pk/app/navafiz/id1557617416" target="_blank"> <img
                            src="<?= base_url('nassets/img/applestore.png'); ?>" class="img-fluid" width="200" />
                        <!--<i class="fab fa-apple fa-3x grow" style="color:#fff"></i>--> </a> </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto"> &nbsp;&nbsp; </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <h4>Jobs</h4>
                    <ul class="list-unstyled">
                        <li><a class="ftr" href="">Find jobs</a></li>
                        <li> <a class="ftr" href="">Register for Jobs</a> </li>
                        <li><a class="ftr" href="">Jobs by Title</a></li>
                        <li> <a class="ftr" href=""> Sign up for job alerts </a> </li>
                        <li> <a class="ftr" href=""> Build online CV </a> </li>
                        <li><a class="ftr" href="">Career resources</a></li>
                        <li><a class="ftr" href="">Help for Candidates</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h4>For Employers</h4>
                    <ul class="list-unstyled">
                        <li><a class="ftr" href="">Post a job</a></li>
                        <li><a class="ftr" href="">Search CV database</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h4>Discover</h4>
                    <ul class="list-unstyled">
                        <li><a class="ftr" href="">Salaries</a></li>
                        <li><a class="ftr" href="">Courses</a></li>
                        <li><a class="ftr" href="">Events</a></li>
                        <li><a class="ftr" href="">Research Reports</a></li>
                        <li><a class="ftr" href="">Articles</a></li>
                        <li><a class="ftr" href="">Public Holidays</a></li>
                        <li> <a class="ftr" href="" target="_blank"> Bidayati Jobs </a> </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h4>Other Services</h4>
                    <ul class="list-unstyled">
                        <li><a class="ftr" href="">For affiliates</a></li>
                        <li><a class="ftr" href="">For training providers</a></li>
                        <li> <a class="ftr" href=""> For HR professionals </a> </li>
                        <li> <a class="ftr" href=""> For event organisers </a> </li>
                        <li><a class="ftr" href="">For journalists</a></li>
                        <li> <a class="ftr" href=""> For universities </a> </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h4>About Navafiz</h4>
                    <ul class="list-unstyled">
                        <li><a class="ftr" href="<?= site_url('/about') ?>">About us</a></li>
                        <li><a class="ftr" href="">Advertise with us</a></li>
                        <li><a class="ftr" href="<?= site_url('front/terms_and_conditions') ?>">Terms and Conditions</a>
                        </li>
                        <li><a class="ftr" href="<?= site_url('front/privacy_policy') ?>">Privay Policy</a></li>
                        <li><a class="ftr" href="<?= site_url('/contact') ?>">Contact us</a></li>
                        <li><a class="ftr" href="">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-sm-2 social-icons">
                    <h4>Follow Us</h4>
                    <div class="row space-bottom-lg">
                        <div class="col-sm-3"> <a class="ftr"
                                href="https://www.facebook.com/groups/JobPostMail/?_rdc=2&_rdr" target="_blank"> <i
                                    class="fab fa-facebook-square fa-3x grow"></i> </a> </div>
                        <div class="col-sm-3"> <a class="ftr" href="https://www.linkedin.com/company/navafiz"
                                target="_blank"> <i class="fab fa-linkedin fa-3x grow" style="color:#fff"></i> </a>
                        </div>
                        <!--                       <div class="col-sm-3">                            <a class="ftr" href="" target="_blank">                                <i class="fab fa-twitter-square fa-3x grow"></i>                            </a>                        </div>-->
                        <div class="col-sm-3"> <a class="ftr"
                                href="https://www.youtube.com/channel/UCekQrDwBfQ6z6QnwSlbNDqA" target="_blank"> <i
                                    class="fab fa-youtube-square fa-3x grow" style="color:#fff"></i> </a> </div>
                    </div>
                </div>
            </div>
    </section>
</footer>
<div class="mobmenuoverlay"></div>
<!--<script src="<?= site_url('assets'); ?>/owl.carousel/owl.carousel.min.js"></script>--></body>

</html>
<script src="<?= site_url('nassets'); ?>/js/custom.js?v=1"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>function openForm() { document.getElementById("myForm").style.display = "block"; } function closeForm() { document.getElementById("myForm").style.display = "none"; }</script>