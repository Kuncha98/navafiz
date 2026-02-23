<style>
    .banner-area{
        background: url('<?=site_url('nassets')?>/img/front/1.JPG');
        /*background-repeat: repeat;*/
        background-attachment: scroll;
          height: 100%;

  /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        top: -38.5px;
        position: relative;
        height:880px;
        padding-top:145px;
        padding-bottom:430px;
    }

    .banner-text h1 {
    font-size: 80px;
    font-family: 'Roboto Slab', serif;
    font-weight: 700;
    color: #343e51;
    line-height: 60px;
   }

  .banner-text p {
    margin: 30px 0 0 0;
   }

   .search-box{
        margin-top:40px;
        box-shadow: 12.5px 21.651px 49px 0px rgba( 58, 74, 88, .10 );
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        line-height: 26px;
        color: #343e51;
        font-weight: normal;

   }

   .search-box input, .search-box .rel-sel, .search-box .cat-sel{
    height: 60px;
    border: 0;
    width: 25%;
    padding-left: 30px;
    border-left: 1px solid #ebebeb;
    margin-top: -1px;
}

.search-box input {
    border-radius: 60px 0 0 60px;
}

.inpt-search{
    overflow: visible;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;

   /*margin-right:-5px;*/

}
/*.rel-sel{
     overflow: visible;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    margin:0;
    position: relative;
     right: -4px;
}*/

.search-box select{
  overflow: visible;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    margin-left:-8px;
}

.btn-search{
    width: 155px;
    height: 60px;
    margin-left: -4px;
    border-radius: 0 60px 60px 0;
    background-color: #6ac142;
    font-family: 'Roboto', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #ffffff;
    padding: 0 20px;
    font-size:15px;
    line-height: 38px;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border: 2px solid #6ac142;
    transition: .3s;
}

/*TEXTBLOCK INNER*/
.textblock-inner {
    background-color: #ffffff;
    border-radius: 20px;
    padding: 35px 80px;
    border: 1px solid #ebebeb;
    box-shadow: 12.5px 21.651px 49px 0px rgba( 58, 74, 88, .10 );
    position:relative;
    top:-125px;
}

.textblock-inner h4 {
    font-size: 22px ;
    text-transform: uppercase;
    font-family: 'Roboto Slab', serif;
    font-weight: 700;
    color: #343e51;
    line-height: 30px
}
.textblock-inner h4 ion-icon {
  color: green;
}
.textblock-inner p {
    margin-top: 0;
    margin-bottom: 1rem;
}

@media (min-width: 1200px){
.container {
    max-width: 1140px;
}
}

@media (min-width: 992px){
.container {
    max-width: 960px;
}
}
@media (min-width: 768px){
.container {
    max-width: 720px;
}
}
@media (min-width: 576px){
.container {
    max-width: 540px;
}
}

.course-title h2::after {
    background-color: #6ac142;
    width: 70px;
    height: 4px;
    position: absolute;
    bottom: -18px;
    left: 0;
    right: 0;
    margin: auto;
    content: "";
}

.course-title h2 {
    font-size: 36px;
    color: #343e51;
    font-weight: 700;
    text-transform: uppercase;
    position: relative;
    margin-top: 2px;
}

/*COURSES TABS*/

.mt-60{
    margin-top:70px;
}





 @media screen and (min-width: 1284px){
    .course-nav-tabs ul li a {
    padding: 8px 19.6px;
}
 }

@media screen and (min-width: 992px){
.col-lg-8 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 66.666667%;
    flex: 0 0 66.666667%;
    max-width: 66.666667%;
}
}

.course-nav-tabs ul li a.active {
    background-color: #6ac142;
    color: #ffffff;
}

.white{
    background-color:#ffffff;
}

.nav-tabs {
    border-bottom: none !important;
}

.course-nav-tabs ul li:first-child a {
    border-radius: 50px 0 0 50px;
}

.course-nav-tabs ul li:last-child a {
        font-family: 'Roboto', sans-serif;
    border-right: 0;
    border-radius: 0 50px 50px 0;
    padding-right: 50px;
}
.course-nav-tabs ul li a {
    color: #677083;
    font-size: 16px;
    display: block;
    padding: 16px 40px;
    transition: .3s;
    border-right: 1px solid #ebebeb;
}

/*COURSES*/

.tab-content .author-style{
        font-size: 16px;
    line-height: 1.5;
    color: #343e51;
    font-weight: 500;
    display: block;
    padding-top: 10px;
    position: absolute;
    margin-left: 13px;
}

.course-meta .a1 {
    color: #677083;
    font-size: 14px;
    padding: 5px 12px;


}

.course-meta .a2 {
    color: #677083;
    font-size: 14px;
    padding: 5px 12px;


}

/*EXPERT SECTION*/

.pb-230 {
    padding-bottom: 230px;
}

.pt-80 {
    padding-top: 80px !important;
}

.overlay {
    position: relative;
}

.fix {
    overflow: hidden !important;
}

#team-overlay .bg-expert {
    background: url('<?=site_url('nassets')?>/img/front/expert2.jpg') repeat scroll center center / cover;
    height:75%
}
/*
#team-overlay {
    background: rgba(0, 0, 0, 0.50);
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

  }*/

.z-index {
    position: relative;
    z-index: 9;
}
.z-index h2{
      font-size: 3rem;
    line-height: 2;
}

.exp-img{
    position:relative;
    top:-110px;
}

.exp-img  .team-name    {
    font-family: 'Roboto Slab', serif;
    font-weight: 700;
    font-size:22px;
    color: #343e51;
   line-height: 1;

}

.blog-title h2 {
    font-size: 36px;
    color: #343e51;
    font-weight: 700;
    text-transform: uppercase;
    position: relative;
    margin-top: 2px;
}

.blog-title h2::after {
    background-color: #6ac142;
    width: 70px;
    height: 4px;
    position: absolute;
    bottom: -18px;
    left: 0;
    right: 0;
    margin: auto;
    content: "";
}

.blog-single {
    display: table;
}

.blog-thumb {
    width: 44%;
    display: table-cell;
}

.blog-desc {
    border: 1px solid #ebebeb;
    border-left: 0;
    border-radius: 0 10px 10px 0;
    padding: 20px 20px 20px 20px;
    width: 56%;
    display: table-cell;
    vertical-align: top;
    background-color:#fff;
}

.blog-single .blog-img{
    border-top-left-radius:20px;
    border-bottom-left-radius:20px;
}

.event-single {
    border-radius: 10px;
    background-color: #ffffff;
    border: 1px solid #ebebeb;
    padding: 20px 40px 20px 40px;
    position: relative;
}



.event-single::before{
    width: 0;
    opacity: 0;
    visibility: hidden;
    transition: .6s;
}

.event-single::before {
    background-image: url('<?=site_url('nassets/img/front/events.jpg')?>');
    background-size: cover;
    background-repeat: no-repeat;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    content: "";
    border-radius: 10px;
}

.event-single::after {
    width: 0;
    opacity: 0;
    visibility: hidden;
    transition: .6s;
}


.event-single::after {
    background: rgba(0,0,0,.50);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    content: "";
    border-radius: 10px;
}

#workshop-details{
    width: 115%;
    border-radius: 20px;
    height: 28%;

}

.pb-30{
    padding-bottom:30px;
}

.test-title h2 {
    font-size: 36px;
    color: #343e51;
    font-weight: 700;
    text-transform: uppercase;
    position: relative;
    margin-top: 2px;
    font-family: 'Roboto Slab', serif;
    line-height: 60px;
}

.test-title h2::after{
    background-color: #6ac142;
    width: 70px;
    height: 4px;
    position: absolute;
    bottom: -18px;
    left: 0;
    right: 0;
    margin: auto;
    content: "";
}

/*.card .test-details{
    border-radius:25%;
}*/






/*some extra css*/


/* Large desktop :1200px. */


/* Normal desktop :992px. */
@media screen and (min-width: 992px) and (max-width: 1169px) {
.mt-md-30 {margin-top:30px;}
.mb-md-30 {margin-bottom:30px;}
.mr-md-50 {margin-right:50px !important;}
.ds-md-none {display:none !important;}


.header-right .register-login {
	display:none;
}
.course-nav-tabs ul li a {
    padding: 8px 19.6px;
}
.col-lg-7 .blog-desc p {
	display:none;
}
.social-icons a {
    width: 40px;
    height: 40px;
    line-height: 40px;
    margin: 0 2px;
}
}
/* Medium desktop :992px. */
@media screen and (min-width: 992px) and (max-width: 1024px) {

.course-nav-tabs ul li a {
    padding: 8px 18.6px;
}
.blog-single.style-2 .category-desc p {
	height:50px;
	overflow:hidden
}
.product-results.pull-right > span {
	display:none;
}
.course-single.list-view .course-thumb {
	width:40%;
}
.course-single.list-view .course-info {
	width:60%;
}
.products-sort.show {
	display:none;
}
/* product list view */
.product-listview-in-sidebar .single-product.list-view .product-text p {
    height: 80px;
    overflow: hidden;
}
}
/* Tablet  :991px. */
@media screen and (max-width: 991px) {
.mt-sm-20 {margin-top:20px;}
.mt-sm-25 {margin-top:25px;}
.mt-sm-40 {margin-top:40px;}
.mt-sm-30 {margin-top:30px;}
.mb-sm-30 {margin-bottom:30px;}
.mt-sm-50 {margin-top:50px;}

.height-415 {height:375px;}

.header-area .row {
    height: 60px;
}
.register-login {
	display:none;
}
.btn-common.mr-90 {
    margin-right: 24px !important;
}
.mini-cart {}
.mini-cart > ul > li {
	margin:0 10px;
}
.mini-cart ul li.mmenu-icon {
	display:inline-block;
}
.mini-cart > ul > li > a {
    width: 40px;
    height: 40px;
    line-height: 40px;
}
.mainmenu {
	display:none;
}
.mobile-menu {
	display:block;
}
.mm-menu_offcanvas {
	z-index:99999;
}
/*----------------------------------------*/
/*Banner Text
/*----------------------------------------*/
.banner-text h1 {
	font-size:60px;
}
/*----------------------------------------*/
/* Course
/*----------------------------------------*/
.course-nav-tabs ul li a {
    padding: 8px 26.6px;
}
/*----------------------------------------*/
/* Blog
/*----------------------------------------*/
.product-results {
	display:none;
}
.category-desc small {
	display:block;
}
.products-sort.show {
	display:none;
}
.course-single.list-view .course-text {
	margin-top:0;
}
.course-single.list-view .course-text p {
	display:none;
}
.teacher-thumb {
	vertical-align:middle;
}
.blog-single.style-2 .category-thumb {
	width:auto;
	display:block;
}
.blog-single.style-2 .category-thumb img {
	border-radius: 10px 10px 0 0;
}
.blog-single.style-2 .category-desc {
	width:auto;
	display:block;
	border-radius: 0 0 10px 10px;
}
/* product-list view */
.single-product.list-view .product-thumb-sin {
	width:44%;
}
.single-product.list-view .product-text {
	width:56%;
}
/* product list view */
.product-listview-in-sidebar .single-product.list-view .product-text p {
    height: 80px;
    overflow: hidden;
}
.products-nav-tabs li {
	margin-right:10px;
}
.product-comment-form > h4::before {
	display:none;
}
/* header top */
.header-top {
	display:none;
}
.banner-area.bg-2.mt-40 {
	margin-top:0;
}
.banner-text.style-2 h1 {
	font-size:48px;
}
.banner-area .row.pt-100 {
	padding-top:100px;
}
.banner-area .row.pb-200 {
	padding-bottom:100px;
}
.course-discount h2 {
    font-size: 48px;
}
/* event list */
.category-single {
    display: block !important;
}
.category-single.list-view .category-thumb {
    width: auto;
    display: block;
}
.category-single.list-view .category-desc {
    width: auto;
    display: block;
}
.category-thumb img {
    border-radius: 10px 10px 0 0;
}
.category-desc {
	border:1px solid #ebebeb;
	border-radius: 0 0 10px 10px;
}
}

/* Large Mobile  :767px. */
@media screen and (max-width: 767px) {
.container, .container-fluid {
	width:85%;
}
#ppl-testimonials .testimonial-area .images-test img{
    	width:60px;
        height:60px;
    }
/*----------------------------------------*/
/* Banner Text
/*----------------------------------------*/
.banner-text h1 {
	font-size:48px;
}
.search-box .inp, .search-box .cat-sel .rel-sel{
	width:100%;
	border-radius:0;
	height:45px;
}
.search-box select {
	margin-top:15px;
}
.search-box button {
    width: 100%;
    border-radius: 0;
    margin-left: 0;
    border-radius: 0;
    margin-top: 15px;
	height:45px;

}
.search-box .inpt-search {
    width: 100%;
    border-radius: 0;
    margin-left: 0;
    border-radius: 0;
    margin-top: 15px;
	height:45px;

}
.search-box .cat-sel {
    width: 100%;
    border-radius: 0;
    margin-left: 0;
    border-radius: 0;
    margin-top: 15px;
	height:45px;

}
.search-box .rel-sel {
    width: 100%;
    border-radius: 0;
    margin-left: 0;
    border-radius: 0;
    margin-top: 15px;
	height:45px;

}
.signup-form input {
	margin-left:0;
	margin-bottom:15px;
}
.signup-form input:first-child {
	border-radius:0;
}
.signup-form input:last-child {
	margin-bottom:0;
}
/*----------------------------------------*/
/* Blog
/*----------------------------------------*/
.blog-single.style-1 .blog-desc p {
	display:none;
}
.social-icons.style-2.pull-right {
	float:none;
	margin-top:10px;
}
.social-icons.style-2 span {
	display:none !important;
}
/*----------------------------------------*/
/* Footer
/*----------------------------------------*/
.footer-bottom {}
.copyright-text {
	text-align:center;
}
.copyright-text p {
	line-height:1;
}
.footer-bottom ul {
	display:none;
}
.gallery-nav ul li {
	margin-right:20px;
}
.office-address {
    text-align: left;
    margin-bottom: 30px;
}
.products-sort {
	display:none;
}
.site-pagination.on-top {
	display:none;
}
.product-view-system.pull-right {
	float:none;
}
/* teachers profile */
.teacher-thumb {
    text-align: left;
    width: auto;
    height: auto;
    display: block;
}
.teacher-desc {
    display: block;
	padding-left:0;
}
/* product list view */
.single-product.list-view .product-thumb-sin, .single-product.list-view .product-text {
	display:block;
	width:auto;
}
.single-product.list-view {
	display:block;
}
.single-product.list-view .product-text {
	border:1px solid #ebebeb;
	border-top:0;
	border-radius:0 0 10px 10px;
}
/* product list view */
.product-listview-in-sidebar .single-product.list-view .product-thumb-sin {
    width: auto;
}
.product-listview-in-sidebar .single-product.list-view .product-text {
    width: auto;
}
.course-reactions {
    text-align: left;
    margin-top: 25px;
}
.product-comments .comment-avatar {
    width: auto;
    height: auto;
}
.product-comments .comment-desc {
	padding-left:0;
	margin-top:10px;
}
.register-form-top h3 {
    font-size: 24px;
}
.course-discount.pt-100 {
	padding-left:0;
}
/* 404 msg */
.error-msg-area {
	padding:40px 0 50px 0;
}
.d-xs-none {
	display:none !important;
	height:0;
}
/* counter up */
.counter-single span {
    font-size: 36px;
}
/* count down */
.course-countdown span.time-count {
    font-size: 36px;
}
.course-single.list-view .course-meta {
	display:none;
}
}

/* 640px. */
@media screen and (max-width: 640px) {

.header-right .btn-search.mr-90 {
	display:none;
}
.course-nav-tabs ul li a {
    padding: 8px 16.2px;
}
}

/* 575px. */
@media screen and (max-width: 575px) {

.course-nav-tabs ul li a {
    padding: 8px 10px;
    font-size: 12px;
}


}

/* 480px. */
@media screen and (max-width: 480px) {

   #ppl-testimonials .testimonial-area .images-test img{
    	width:60px;
        height:60px;
    }

.mt-xs-30 {margin-top:30px;}
.mb-xs-10 {margin-bottom:10px;}
.mb-xs-17 {margin-bottom:17px;}
.mb-xs-20 {margin-bottom:20px;}
.pr-05 {padding-right:15px !important;}
.section-title h2, .section-title h3, .subscribe-form h3 {
	font-size:24px;
	line-height:1.3;
}
.section-title p br {
	display:none;
}
#scrollUp {
    right: 20px;
    width: 35px;
    height: 35px;
    line-height: 35px;
}
.banner-text h1 {
    font-size: 36px;
	line-height:1.2;
}
.course-nav-tabs {
    max-height: 212px;
    overflow-y: auto;
}
.course-nav-tabs ul li {
    display: block;
    width: 100%;
}
.course-nav-tabs ul li:first-child a, .course-nav-tabs ul li:last-child a, .course-nav-tabs ul {
	border-radius:0;
}
.blog-single.style-1 .blog-desc ul {
	display:none;
}
.footer-widget {
	margin-top:30px;
}
.blog-single.style-2 .category-thumb, .blog-single.style-2 .category-desc {
	display:block;
	width:auto;
}
.blog-single.style-2 .category-thumb img {
	border-radius:10px 10px 0 0;
}
.blog-fullwidth h2, .blog-details h2 {
	font-size:30px;
	line-height:1.2;
}
.play-btn {
    height: 60px;
    width: 60px;
    line-height: 60px;
}
.page-title h2 {
	font-size:36px;
	line-height:1.2;
}
.comment-desc {
    padding-left: 0;
    padding-top: 15px;
}
.blog-comments ul li ul {
    margin-left: 50px;
    margin-top: 35px;
}
.category-thumb {
    width: auto;
    display: block;
}
.category-thumb img {
	border-radius:10px 10px 0 0;
	height:auto;
}
.category-desc {
	width: auto;
	border-radius: 0 0 10px 10px;
	display: block;
	border: 1px solid #ebebeb;
}
.course-single.list-view .course-meta {
	display:block;
}
.course-single {
	text-align:left;
}
.course-single.list-view .course-thumb, .course-single.list-view .course-info {
	width:auto;
	float:none;
}
.course-single.list-view .course-info {
	border:1px solid #ebebeb;
	border-radius: 0 0 10px 10px;
	height:auto;
	padding-bottom:20px;
}
.course-single.list-view .course-thumb img {
    border-radius: 10px 10px 0 0;
    height: auto;
}
.course-single.list-view .course-text p {
	display:block;
}
.student-reviews ul li {
	display:block;
}
.student-thumb, .student-review {
	display:block;
}
.student-thumb {
	width:100%;
	display:table;
}
.student-img {
	display:table-cell;
	width:80px;
	vertical-align:top;
}
.student-name{
	display:table-cell;
	vertical-align:middle;
	padding-left:30px;
}
.course-info ul li {
    padding: 0 20px;
}
.pl-05 {padding-left:15px !important;}
.product-review-desc {
	padding: 15px 20px 15px 20px;
}
.search-area.pd-50 {
	padding:30px 0 30px 0;
}
.banner-text.style-2 h1 {
    font-size: 36px;
}
.course-discount h2 {
    font-size: 36px;
}
.counter-single {
    margin-left:auto;
	margin-right:auto;
}
.course-countdown span.time-count {
  font-size: 36px;
}
.cart-update.pull-right {
	float:none;
}
/* 404 msg */
.error-msg-area {
	padding:40px 0 50px 0;
}
}

/* 360px. */
@media screen and (max-width: 360px) {
.container {
	width:320px;
}
.mini-cart > ul > li {
    margin: 0 5px;
}
.mini-cart > ul > li > a {
    width: 35px;
    height: 35px;
    line-height: 35px;
	font-size:14px;
}
.mainmenu-area.stick .mini-cart > ul > li > a {
    width: 35px;
    height: 35px;
    line-height: 35px;
	font-size:14px;
}
.cart-dropdown {
	width:300px;
	right:10px;
	padding:20px;
}
.banner-text h1 {
	font-size:30px;
}
.textblock-inner {
    padding: 25px 35px;
}
.blog-single.style-1 .blog-thumb, .blog-single.style-1 .blog-desc {
	width:auto;
	display:block;
}
.blog-single.style-1 .blog-thumb img {
	border-radius:10px 10px 0 0;
}
.subscribe-form input {
    width: 100%;
    border-radius: 30px;
    margin-left: 0;
}
.subscribe-form button {
    border-radius: 30px;
    margin-left: 0;
    width: 100%;
	margin-top:15px;
}
.blog-comments ul li ul {
    margin-left: 30px;
}
/* social icons */
.social-icons a {
	margin:5px;
}
.course-info ul li:last-child {
    border-right: 0;
    padding-left: 0;
    padding-top: 10px;

}
.course-countdown > div {
    display: block;
}
.course-countdown .cdown {
    width: 50%;
    float: left;
    text-align: center;
    flex: unset;
}
.col-lg-6.col-sm-6.col-6.pl-0 {
	padding-right:0;
	flex:100%;
	max-width:100%;
}

}

/*@media (max-width: 991px){
  .course-nav-tabs ul li a {
    padding: 8px 26.6px;
}*/

/*}*/

/* 320px. */














</style>
<link href="<?=site_url('nassets/owl.carousel/assets/owl.carousel.min.css');?>" rel="stylesheet">
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>














<?php $this->load->view('include/header-training.php'); ?>

<?php $this->load->view('notification/notification-messages');?>
<section class="top-banner-area">

    <div class="banner-area pt-145 pb-430">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="inner-banner text-center">
                        <div class="banner-text">
                            <h1>Find Online Courses</h1>
                            <p>Discover more courses to boost your skills</p>
                        </div>
                        <div class="search-box">
                            <input type="text" class="inpt-search" placeholder="Keyword Search">
                            <select class="cat-sel">
                                <option>Select Category</option>
                                <?php foreach($courses_cat as $cat){ ?>
                                <option value="<?=$cat->id?>"><?=$cat->title?></option>
                                <?php } ?>
                            </select>
                            <select class="rel-sel">
                                <option>Muslim</option>
                                <option>Hindu</option>
                                <option>Christian</option>
                            </select>
                            <button class="btn-search">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="top-textblock-area">
    <div class="textblock-area">
        <div class="container textblock-inner">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="text-inner">
                        <h4> <ion-icon name="play-outline"></ion-icon>   Best Online Course</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="text-inner">
                        <h4> <ion-icon name="planet-outline"></ion-icon>   Best Industry Leader</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="text-inner">
                        <h4> <ion-icon name="book-outline"></ion-icon>  Best Book Library</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .add-course #save-course a {
        color:#fff;
        
        background:#6ac142;
    }
</style>

<div class="add-course mb-5">
    <div class="text-center" id="save-course">
        <a class="btn btn-ouline" href="<?=site_url('training/add_course')?>">Add New Course</a>
    </div>
</div>

<section class="top-courses-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="course-title text-center">
                    <h2> OUR COURSES </h2>
                </div>
            </div>
        </div>
        <div class="row mt-60">
            <div class="col-lg-8 offset-lg-2">
                <div class="course-nav-tabs">
                    <ul class="nav nav-tabs">
                        <li>
                            <a class="active white" data-toggle="tab" href="#all-courses">All Courses</a>
                        </li>
                       <?php foreach($courses_cat as $cat){ ?>
                        <li>
                            <a class="white tabs" data-toggle="tab" cat="<?=$cat->id?>" href="#tab<?=$cat->id?>"><?=$cat->title?></a>
                        </li>
                       <?php } ?>
                        
                    </ul>

                </div>
            </div>
        </div>
        <div class="tab-content">
        <div id="all-courses" class="mt-60 tab-pane active">
           <div class="row">
            <?php foreach($courses as $course){ ?>
            <div class="col-lg-3">
              <div class="card">
                  <a href="<?=site_url('training/courseDetail/'.$course->id)?>">
                      <img class="card-img-top" src="<?=site_url('assets/uploads/courses/'.$course->course_image)?>" alt="Card image cap">
                  </a>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">
                              <a href="<?=site_url('n/'.$course->m_id)?>">
                      <img src="<?=site_url('assets/uploads/members/'.$course->m_avatar)?>" alt="" style="height:60px; width:60px" class="img-fluid rounded-circle mb-3">
                      <h4 class="author-style" style="display: inline; color: #343e51;"> <?=$course->m_name?> <br> <strong style="color: #a0a6af;"><?=$course->m_profession?></strong></h4>
                      <!--<h4 class=""></h4>-->
                      </a>
                      </div>
                          <?php // echo $course->price;exit();?>
                      <div class="col-md-4">
                          <h4 style="color:#6ac142; font-size:27px" class="float-right mt-2"> $<?=$course->price?> </h4>
                      </div>
                       </div>
                      <div class="text-center mt-2">
                          <h3 style="color: #343e51;"><?=$course->title?></h3>
                      <p><?=$course->description?></p>
                      </div>

                      <div class="course-meta">
                          <a href="" class="a1 float-left">
                              <i class="fa fa-1x fa-calendar-alt"></i> <?=$course->added_on?>
                          </a>
                          <a href="" class="a2 float-right">
                              <i class="fa fa-1x fa-user"></i> <?=GetTotalStudents($course->id); ?>
                          </a>
                      </div>

                  </div>
              </div>
            </div>
            <?php } ?>


            </div>
        </div>




        
        
<div class="row" id="ajax-courses">
   
</div>
        
        
<?php foreach($courses_cat as $cat){?>
    <div id="tab<?=$cat->id?>" class="mt-60 tab-pane">

    </div>
<?php } ?>

        <!--THIRD TAB-->

<!--        <div id="tab2" class="mt-60 tab-pane">
            <div class="row">
                                <div class="col-md-3">
                       <div class="card">
                  <a href="#">
                  <img class="card-img-top" src="<?=site_url('nassets')?>/img/front/all4.jpg" alt="Card image cap">
                  </a>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">
                              <a href="">
                      <img src="<?=site_url('nassets')?>/img/front/man3.jpg" alt="" style="height:60px; width:60px" class="img-fluid rounded-circle mb-3">
                      <h4 class="author-style" style="display: inline; color: #343e51;"> Mr. Usman Abdullah <br> <strong style="color: #a0a6af;">Web Developer</strong></h4>
                      <h4 class=""></h4>
                      </a>
                      </div>
                      <div class="col-md-4">
                          <h4 style="color:#6ac142; font-size:27px" class="float-right mt-2"> $280 </h4>
                      </div>
                       </div>
                      <div class="text-center mt-2">
                          <h3 style="color: #343e51;">Computer Science</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, obcaecati beatae! Et in ullam repellendus.</p>
                      </div>

                      <div class="course-meta">
                          <a href="" class="a1 float-left">
                              <i class="fa fa-1x fa-calendar-alt"></i> 05 Nov, 2019
                          </a>
                          <a href="" class="a2 float-right">
                              <i class="fa fa-1x fa-user"></i> 27/30 Students
                          </a>
                      </div>

                  </div>
              </div>
            </div>
            </div>
        </div>-->


        <div id="tab3" class="mt-60 tab-pane">
            <div class="row">
                   <div class="col-md-3">
                       <div class="card">
              <a href="#">
                  <img class="card-img-top" src="<?=site_url('nassets')?>/img/front/all4.jpg" alt="Card image cap">
                  </a>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">
                              <a href="">
                      <img src="<?=site_url('nassets')?>/img/front/man2.jpg" alt="" style="height:60px; width:60px" class="img-fluid rounded-circle mb-3">
                      <h4 class="author-style" style="display: inline; color: #343e51;"> Mr. John Doe <br> <strong style="color: #a0a6af;">Web Developer</strong></h4>
                      <!--<h4 class=""></h4>-->
                      </a>
                      </div>
                      <div class="col-md-4">
                          <h4 style="color:#6ac142; font-size:27px" class="float-right mt-2"> $280 </h4>
                      </div>
                       </div>
                      <div class="text-center mt-2">
                          <h3 style="color: #343e51;">Computer Science</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, obcaecati beatae! Et in ullam repellendus.</p>
                      </div>

                      <div class="course-meta">
                          <a href="" class="a1 float-left">
                              <i class="fa fa-1x fa-calendar-alt"></i> 05 Nov, 2019
                          </a>
                          <a href="" class="a2 float-right">
                              <i class="fa fa-1x fa-user"></i> 27/30 Students
                          </a>
                      </div>

                  </div>
              </div>
            </div>
            </div>
        </div>




<!--        <div id="tab4" class="mt-60 tab-pane">
            <div class="row">
            <div class="col-md-3">
                       <div class="card">
                <a href="#">
                  <img class="card-img-top" src="<?=site_url('nassets')?>/img/front/all4.jpg" alt="Card image cap">
                  </a>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">
                              <a href="">
                      <img src="<?=site_url('nassets')?>/img/front/man.jpg" alt="" style="height:60px; width:60px" class="img-fluid rounded-circle mb-3">
                      <h4 class="author-style" style="display: inline; color: #343e51;"> Mr. Sikander Ahmad <br> <strong style="color: #a0a6af;">Web Developer</strong></h4>
                      <h4 class=""></h4>
                      </a>
                      </div>
                      <div class="col-md-4">
                          <h4 style="color:#6ac142; font-size:27px" class="float-right mt-2"> $280 </h4>
                      </div>
                       </div>
                      <div class="text-center mt-2">
                          <h3 style="color: #343e51;">Computer Science</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, obcaecati beatae! Et in ullam repellendus.</p>
                      </div>

                      <div class="course-meta">
                          <a href="" class="a1 float-left">
                              <i class="fa fa-1x fa-calendar-alt"></i> 05 Nov, 2019
                          </a>
                          <a href="" class="a2 float-right">
                              <i class="fa fa-1x fa-user"></i> 27/30 Students
                          </a>
                      </div>

                  </div>
              </div>
            </div>
            </div>
        </div>-->





        </div>


            </div>

    </div>
</section>

<section class="team-area fix mt-60">
    <div id="team-overlay">
    <div class="section-title-expert overlay1 pt-80 pb-230 bg-expert">
        <div class="z-index text-white text-center">
            <h2>WE'RE EXPERTS, SO YOU DON'T HAVE TO BE </h2>
            <p>A crew of experienced educators helm our vast and growing library. Harness their expertise, and get the same </p>
        </div>
    </div>
        </div>
    <div class="expert-desc">
        <div class="container">
             <div class="d-flex justify-content-center exp-img">
        <div class="row">



            <div class="col-md-4">
                <img src="<?=site_url('nassets/img/front/man3.jpg')?>" style="height:220px; width:220px; box-shadow: 0 0 12px 4px #fff;" class="img-fluid rounded-circle mb-3">
                <div class="text-center mt-2">
                    <h4 class="team-name">Mr.Usman Abdullah</h4>
                    <strong style="color: #a0a6af;line-height: 1; margin-top: 10px">Web developer</strong>
                </div>
            </div>
            <div class="col-md-4">
                                <img src="<?=site_url('nassets/img/front/man4.jpg')?>" style="height:220px; width:220px ; box-shadow: 0 0 12px 4px #fff;" class="img-fluid rounded-circle mb-3">
                <div class="text-center mt-2">
                    <h4 class="team-name">Mr.Liaquat</h4>
                    <strong style="color: #a0a6af;line-height: 1; margin-top: 10px">Education</strong>
                </div>
            </div>
            <div class="col-md-4">
                                <img src="<?=site_url('nassets/img/front/man2.jpg')?>" style="height:220px; width:220px ; box-shadow: 0 0 12px 4px #fff;" class="img-fluid rounded-circle mb-3">
                <div class="text-center mt-2">
                    <h4 class="team-name">Mr.John Doe</h4>
                    <strong style="color: #a0a6af;line-height: 1; margin-top: 10px">Designer</strong>
                </div>
            </div>
                </div>
        </div>
       </div>
    </div>
</section>


<section class="events-and-blog-area mt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-title text-center">
                    <h2>EVENTS AND BLOGS</h2>
                </div>
            </div>
        </div>
        <div class="row mt-60">
            <div class="col-lg-7">



                <div class="blog-single">
                    <div class="row no-gutters">

                    <div class="blog-thumb">
                        <a href="">
                            <img class="blog-img" src="<?=site_url('nassets/img/front/blog1.jpg')?>">
                        </a>
                    </div>




                    <div class="blog-desc">
                        <h4 style="line-height:1;"> <a href='' style="text-decoration:none;color: #343e51; "> HOW TO GET BETTER AT LEARNING</a> </h4>
                        <div class="row">
                            <div class="col-md-6 float-right"><p>5 DEC 2020</p></div>
                            <div class="col-md-6 float-left"><p>By <a href="">Abdullah Usman</a></p></div>
                        </div>

                        <p class="mt-1">
                            Don't be distracted by criticism. Remember the only taste of success some people.
                        </p>
                        <a href="" class="readmore">VIEW DETAILS</a>
                    </div>
                    </div>
                </div>



             <div class="blog-single mt-3">
                    <div class="row no-gutters">

                    <div class="blog-thumb">
                        <a href="">
                            <img class="blog-img" src="<?=site_url('nassets/img/front/blog1.jpg')?>">
                        </a>
                    </div>




                    <div class="blog-desc">
                        <h4 style="line-height:1;"> <a href='' style="text-decoration:none;color: #343e51; "> HOW TO GET BETTER AT LEARNING</a> </h4>
                        <div class="row">
                            <div class="col-md-6 float-right"><p>5 DEC 2020</p></div>
                            <div class="col-md-6 float-left"><p>By <a href="">Abdullah Usman</a></p></div>
                        </div>

                        <p class="mt-1">
                            Don't be distracted by criticism. Remember the only taste of success some people.
                        </p>
                        <a href="" class="readmore">VIEW DETAILS</a>
                    </div>
                    </div>
             </div>

            </div>

            <div class="col-lg-5">
                <div class="card mb-4" id="workshop-details">
                 <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                        <strong style="font-size: 38px;  font-weight: 700;  color: #6ac142;">05</strong>
                        <strong style="font-size: 14px;  font-weight: 700;  color: #6ac142;">DEC</strong>
                    </div>
                    <div class="col-md-9">
                     <h5 class="" style="text-decoration:none;color: #343e51;">HANDS ON TRAINING WORKSHOP</h5>

                            <div class="row" style="margin-top:-20px;">
                                <div class="col-md-6">
                                    <i class="fas fa-map-marker-alt fa-1x"></i><strong style="font-size: 16px;  font-weight: 600;  color: #a0a6af;;"> NEW YORK,US</strong>
                                </div>
                                <div class="col-md-6">
                                   <i class="fas fa-clock fa-1x"></i> <strong style="font-size: 16px;  font-weight: 600;  color: #a0a6af;;">10 A.M - 12 P.M</strong>
                                </div>
                             </div>
                            <div class="mt-4 readmore">
                                <a href="">VIEW DETAILS</a>
                            </div>
                    </div>
                   </div>
                  </div>
               </div>
                <div class="card mb-4" id="workshop-details">
                 <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                        <strong style="font-size: 38px;  font-weight: 700;  color: #6ac142;">10</strong>
                        <strong style="font-size: 14px;  font-weight: 700;  color: #6ac142;">DEC</strong>
                    </div>
                    <div class="col-md-9">
                     <h5 class="" style="text-decoration:none;color: #343e51;">COLORFUL DAY EVENT</h5>

                            <div class="row" style="margin-top:-20px;">
                                <div class="col-md-6">
                                    <i class="fas fa-map-marker-alt fa-1x"></i><strong style="font-size: 16px;  font-weight: 600;  color: #a0a6af;;"> GEORGIA,US</strong>
                                </div>
                                <div class="col-md-6">
                                   <i class="fas fa-clock fa-1x"></i> <strong style="font-size: 16px;  font-weight: 600;  color: #a0a6af;;">09 A.M - 12 P.M</strong>
                                </div>
                             </div>
                            <div class="mt-4 readmore">
                                <a href="">VIEW DETAILS</a>
                            </div>
                    </div>
                   </div>
                  </div>
               </div>

                <div class="card mb-4" id="workshop-details">
                 <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                        <strong style="font-size: 38px;  font-weight: 700;  color: #6ac142;">22</strong>
                        <strong style="font-size: 14px;  font-weight: 700;  color: #6ac142;">FEB</strong>
                    </div>
                    <div class="col-md-9">
                     <h5 class="" style="text-decoration:none;color: #343e51;">SUMMER SCHOOL 2019</h5>

                            <div class="row" style="margin-top:-20px;">
                                <div class="col-md-6">
                                    <i class="fas fa-map-marker-alt fa-1x"></i><strong style="font-size: 16px;  font-weight: 600;  color: #a0a6af;;"> NEW YORK,US</strong>
                                </div>
                                <div class="col-md-6">
                                   <i class="fas fa-clock fa-1x"></i> <strong style="font-size: 16px;  font-weight: 600;  color: #a0a6af;;">10 A.M - 12 P.M</strong>
                                </div>
                             </div>
                            <div class="mt-4 readmore">
                                <a href="">VIEW DETAILS</a>
                            </div>
                    </div>
                   </div>
                  </div>
               </div>
    </div>
</section>


<section id="ppl-testimonials">
    <div class="testimonial-area pb-30 fix mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="test-title text-center">
                        <h2>WHAT OTHER SAY?</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-lg-6">
                    <div class="card" style="border-radius:25px; height: 260px; padding: 20px">
                        <div class="card-body">
                            <div class="test-desc">
                                <p>In today's world, its important to harness technology to help us advance and connect.</p>
                            </div>
                            <div class="row mt-5 d-flex justify-content-start">
                                <div class="col-md-4">
                                  <img src="<?=site_url('nassets/img/front/man2.jpg')?>" style="height:100px; width:100px ; box-shadow: 0 0 12px 4px #fff;" class="img-fluid rounded-circle mb-3">
                                </div>
                                <div class="col-md-8 mt-4" style="margin-left:-45px">

                                     <h4 class="team-name">Mr.John Doe</h4>
                                     <p style="color: #a0a6af;line-height: 1; margin-top: 10px; font-weight: 400px !important">Designer</p>

                                </div>
                            <div>
                        </div>
                    </div>
                  </div>
                 </div>

             </div>
            <div class="col-lg-6">
                <div class="card" style="border-radius:25px; height: 260px; padding: 20px">
                        <div class="card-body">
                            <div class="test-desc">
                                <p>In today's world, its important to harness technology to help us advance and connect.</p>
                            </div>
                            <div class="row mt-5 d-flex justify-content-start">
                                <div class="col-md-4">
                                  <img src="<?=site_url('nassets/img/front/man3.jpg')?>" style="height:100px; width:100px ; box-shadow: 0 0 12px 4px #fff;" class="img-fluid rounded-circle mb-3">
                                </div>
                                <div class="col-md-8 mt-4" style="margin-left:-45px">

                                     <h4 class="team-name">Mr.Usman Abudllah</h4>
                                     <p style="color: #a0a6af;line-height: 1; margin-top: 10px; font-weight: 400px !important">Designer</p>

                                </div>
                            <div>
                        </div>
                    </div>
                  </div>
                 </div>

             </div>

            </div>
    </div>
  </div>
</section>






<script src="<?=site_url('');?>nassets/owl.carousel/owl.carousel.min.js"></script>
<script>
$('.services-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});


$('.tabs').click(function(){
     var id =  $(this).attr("cat");
     console.log(id);
//     var form_data = {
//         id : id,
//     };
    
     
      $.ajax({
        url   : "<?= site_url('training/trainingajax')?>/"+id,
        type  : 'POST',
        data  : {id:id},
        success : function(data){ 
//            alert('success');
            $('#ajax-courses').html(data);
        },
//        complete:function(){
////            $('.paging_page').show();
////            $('#loading-image').hide();
//        }
    });  
     
})

</script>

<?php $this->load->view('include/footer.php'); ?>