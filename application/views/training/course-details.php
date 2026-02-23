<?php $this->load->view('include/header-training') ?>
<?php $session_id = $user_id = $this->session->userdata('user_id'); ?>

<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">-->
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">-->
<link href="<?= site_url('nassets/rating/css/star-rating.css')?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?= site_url('nassets/rating/themes/krajee-fas/theme.css')?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?= site_url('nassets/rating/themes/krajee-svg/theme.css')?>" media="all" rel="stylesheet" type="text/css"/>
<!--suppress JSUnresolvedLibraryURL -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?= site_url('nassets/rating/js/star-rating.js')?>" type="text/javascript"></script>
<script src="<?= site_url('nassets/rating/themes/krajee-fas/theme.js')?>" type="text/javascript"></script>
<script src="<?= site_url('nassets/rating/themes/krajee-svg/theme.js')?>" type="text/javascript"></script>
<style>
    
    body {
    font-family: 'Roboto', sans-serif;
    font-size: 14px;
    line-height: 26px;
    color: #343e51;
    font-weight: normal;
    }
    
.page-banner.bg-1 {
    background: rgba(0, 0, 0, 0) url('<?=site_url('nassets')?>/img/front/jd1.jpg') repeat scroll center center / cover;
}

.height-200 {
    height: 200px;
}

.mt-20{
    margin-top:20px;
}

.mb-40{
    margin-bottom:40px;
}

.mb-50{
    margin-bottom:50px;
}

.mt-80{
    margin-top:80px;
}
.course-t1 {
    font-size: 55px;
    line-height: 60px;
    color: #343e51;
    font-weight: bold;
}

ul.list-none {
    margin: 0;
    padding: 0;
    list-style: none;
}



ion-icon {
  color: #6ac142;
}

.fa-star {
  color: #6ac142;
}

.fa-star-half-alt{
    color: #6ac142;
}

.fa-c{
    color: #6ac142;
}

.fa-check-square{
     color: #6ac142;
}

.course-info ul li small {
    display: block;

}

.course-info ul li a {
    display: block;
}

.course-info ul li {
    display: inline-block;
    border-right: 1px solid #e5e5e5;
    /*padding: 0 30px;*/
    padding-right: 40px;
}

.list-none li {
    display: inline;
}

.course-info ul li small {
    font-size: 12px;
    color: #c2c2c2;
    margin: 0;
    line-height: 1;
}

.course-details ul li span {
    color: #c2c2c2;
    display: inline-block;
    margin: 0 8px;
}

.rating-number h3 {
    font-size: 53px;
    color: #6ac142;
    /*margin-bottom: 30px;*/
}

.single-progress .progress-bar {
    background-color: #6ac142;
}

.rating-box{
       background: white;
    padding: 20px 30px;
    border-radius: 2%;
     border: 1.5px solid white;

}

.student-reviews ul li {
    display: table;
    width: 100%;
    padding: 40px 0 30px 0;
    border-bottom: 1px solid #ebebeb;
}

.student-thumb{
    display: table-cell;
}

.student-thumb {
    width: 16%;
}

.students-rating i {
    font-size: 14px;
    color: #f5c136;
    line-height: 1;
}

.student-thumb p {
    display: block;
    line-height: 1;
    font-size: 16px;
    font-weight: 700;
    
    color: #6ac142;
}

.student-thumb small {
    font-size: 12px;
    color: #bbbec3;
}

.course-features {
    border: 1px solid #ebebeb;
    padding: 30px 30px 8px 30px;
    background-color: white;
    width: 400px;
    
}
.course-features ul.course-features ul {
margin: 0;
    padding: 0;
    list-style: none;
}

.course-features ul li {
    display: table;
    width: 100%;
    margin-bottom: 16px;
}
.course-features ul li:first-child span:first-child {
    font-size: 14px;
    color: #636363;
}

.course-features ul li:first-child span:last-child {
    font-size: 24px;
    font-weight: 700;
    color: #6ac142;
}

.course-features ul li span:first-child {
    text-align: left;
    font-size: 16px;
    color: #c2c2c2;
}

.course-features ul li span {
    display: table-cell;
}

.course-features-bottom .btn-common {
/*    display: block;
    font-size: 14px;
    height: 46px;
    line-height: 46px;*/

    margin-top:40px;
    margin-bottom:20px;
    background-color: #6ac142;
    font-family: 'Roboto', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #ffffff;
    padding: 0 20px;
    min-width: 140px;
    height: 40px;
    line-height: 38px;
    text-align: center;
    cursor: pointer;
    display: block;
    text-transform: uppercase;
    border: 2px solid #6ac142;
    border-radius: 30px;
    transition: .3s;
}

.course-features-bottom p {
    font-size: 14px;
    color: #c2c2c2;
    /*margin-top: 15px;*/
}

.mt-50{
    margin-top:50px;
}

.author-bio {
    border: 1px solid #ebebeb;
    padding: 30px;
    font-size: 14px;
    color: #636363;
    line-height: 24px;
    width:400px;
    background-color:#FFF;
}
.author-bio h3 {
    font-size: 24px;
    color: #1a1a23;
    margin: 0;
}

.author-bio small {
    display: block;
    font-size: 12px;
    color: #c2c2c2;
    line-height: 1;
    margin-top: 2px;
}

.social-icons a {
    background-color: #ebebeb;
    display: inline-block;
    width: 53px;
    height: 64px;
    font-size: 14px;
    color: #c2c2c2;
    line-height: 45px;
    margin: 0 5px;
    text-align: center;
}

.author-rating i{
    color:#f5c136;
}
</style>

<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>


<?php
//echo "<pre>";
//print_r($course);
//exit();
?>

<div class="mm-page mm-slideout">

        <div class="page-banner height-200 bg-1">
            <div class="">
                <div class="page-title vertical-middle text-center">
                    <h2 class="course-t1 pt-5">COURSE DETAILS</h2>
                </div>
            </div>
        </div>
    <div class="breadcrumb-area mt-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-breadcrumb">
                        <ul class="list-none">
                            <li class="">
                                <a href="<?=site_url('training')?>">Training</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-right fa-1x"></i>
                            </li>
                            <li>Courses Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="course-details-area mt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-details mb-40">
                        <h2><?=$course->title?></h2>
                        <div class="course-info mt-5 mb-50" style="margin-bottom:50px">
                            <ul class="list-none">
                                <li>
                                   
                                    <ion-icon name="calendar-clear-outline"></ion-icon> <?=$course->added_on?>
                                    <!--<small class="ml-4">8 am - 11 am</small>-->
                                </li>
                                <li style="">
                                   <ion-icon name="pencil-outline"></ion-icon> <?=$course->cat_title?>
                                   <small class="ml-4">Category</small>
                                </li>
<!--                                <li style="">
                                   Review 
                                   <div class="author-rating">
                                       <i class="fas fa-star fa-1x"></i>
                                       <i class="fas fa-star fa-1x"></i>
                                       <i class="fas fa-star fa-1x"></i>
                                       <i class="fas fa-star fa-1x"></i>
                                       <i class="fas fa-star-half-alt fa-1x"></i>
                                   </div>
                                </li>-->
                            </ul>
                        </div>
                        <img src='<?=site_url('assets/uploads/courses/'.$course->course_image)?>' style="height:450px;width: 710px" class="mb-40">
                        <h3>Course Description</h3>
                        <p>
                            <?=$course->description?>
                        </p>
                        
<!--                        <h3>Certifications</h3>
                        <p>
                            
                        </p>-->
                        <h3>Curriculum</h3>
                        <ul class="" style='list-style: none; padding: 0;margin:0'>
                            <li>
                            <i class="fas fa-check-square fa-1x"></i>
                             <span>Lecture 1</span>
                              Lecture 1 What is LearnPress 
                              <span>(60m)</span>
                            </li>
                            
                            <li>
                            <i class="fas fa-check-square fa-1x"></i>
                             <span>Lecture 2</span>
                               What is LearnPress 
                              <span>(60m)</span>
                            </li>
                            
                            <li>
                            <i class="fas fa-check-square fa-1x"></i>
                             <span>Lecture 1</span>
                              Lecture 3  How to use LearnPress 
                              <span>(60m)</span>
                            </li>
                            
                             <li>
                            <i class="fas fa-check-square fa-1x"></i>
                             <span>Lecture 4</span>
                               Certificate add-on 
                              <span>(45m)</span>
                            </li>
                            
                              <li>
                            <i class="fas fa-check-square fa-1x"></i>
                             <span>Lecture 5</span>
                               WooCommerce payments add-on 
                              <span>(45m)</span>
                            </li>
                            
                            
                            
                        </ul>
                        
                        <hr>
                    </div>
                    <?php $rat = CheckRating($course->id,$session_id);
                        if($rat == "not_found"){?>
                    <div class="mb-4">
                        <i>Please Give Us Your Feedback</i>
                        <form action="<?= site_url('training/course_rating/'.$course->id)?>" method="post" id="rating_">
                            <input required class="rb-rating" name="rating" type="text" title="">
                            <div class="form-group">
                                <textarea required="" name="comment" rows="3" class="form-control" placeholder="Please type your comment here"></textarea>
                            </div>
                            <input type="submit" class="btn btn-outline-success">
                        </form>
                    </div>
                            <?php } ?>
                    
                    <h3>Review and Rating</h3>
                    <div class="rating-box mt-5" style="">
                       
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="rating-number d-table">
                                    <div class="vertical-middle">
                                        <?php   $rat_5 = array(5.9,5.8,5.7,5.6,5.5,5.4,5.3,5.2,5.1);
                                                $rat_4 = array(4.9,4.8,4.7,4.6,4.5,4.4,4.3,4.2,4.1);
                                                $rat_3 = array(3.9,3.8,3.7,3.6,3.5,3.4,3.3,3.2,3.1);
                                                $rat_2 = array(2.9,2.8,2.7,2.6,2.5,2.4,2.3,2.2,2.1);
                                                $rat_1 = array(1.9,1.8,1.7,1.6,1.5,1.4,1.3,1.2,1.1);  
                                                
                                                $ratng = number_format($course->avg_rating,1);
                                                $ratng_f = floor($ratng); ?>
                                        <h3><?=$ratng?></h3>
                                        <?php // if($course->avg_rating + 0 == 4) ?>
                                        <div class="rating-stars">
                                            <?php for($i=0; $i< $ratng_f;$i++){ ?>
                                                    <i class="fas fa-star fa-1x" style="color: none;"></i>
                                            <?php }
                                                  if(in_array($ratng,$rat_5) || in_array($ratng,$rat_4) || in_array($ratng,$rat_3) || in_array($ratng,$rat_2) || in_array($ratng,$rat_1)){ ?>
                                                    <i class="fas fa-star-half-alt fa-1x" style="color:#6ac142"></i>
                                               <?php   }
                                                  if($ratng == 1 || in_array($ratng,$rat_1)){
                                                      if(in_array($ratng,$rat_1)){?>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                      <?php }else{ ?>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                      <?php }
                                                  }else if($ratng == 2 || in_array($ratng,$rat_2)){
                                                      if(in_array($ratng,$rat_2)){?>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                      <?php }else {?>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                  <?php } 
                                                  
                                                      }else if($ratng == 3 || in_array($ratng,$rat_3)){
//                                                          echo "here"; exit();
                                                          if(in_array($ratng,$rat_3)){?>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                      <?php }else{ ?>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                      <?php } 
                                                      
                                                          }else if($ratng == 4 || in_array($ratng,$rat_4)){
                                                            if(!in_array($ratng,$rat_4)){?>
                                                            <i class="far fa-star fa-1x" style="color: #6ac142;"></i>
                                                          <?php } }
                                            ?>
                                            <p>Average Rating</p>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row mb-3">
                                    <div class="col-xl-2 col-lg-3 col-4">
					<strong>5 stars</strong>
				    </div>
                                    <div class="col-xl-8 col-lg-7 col-5">
				     <div class="single-progress">
				       <div class="progress">
					 <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:100%">
					 </div>
				       </div>
				     </div>
				    </div>
                                    <div class="col-xl-2 col-lg-2 col-2">
					<span><?=$course->rating_5?></span>
                                        
                                    </div>
                                </div>
                                
                               <div class="row mb-3">
                                    <div class="col-xl-2 col-lg-3 col-4">
					<strong>4 stars</strong>
				    </div>
                                    <div class="col-xl-8 col-lg-7 col-5">
				     <div class="single-progress">
				       <div class="progress">
					 <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:70%">
					 </div>
				       </div>
				     </div>
				    </div>
                                    <div class="col-xl-2 col-lg-2 col-2">
					<span><?=$course->rating_4?></span>
                                    </div>
                                </div>
                                
                                   <div class="row mb-3">
                                    <div class="col-xl-2 col-lg-3 col-4">
					<strong>3 stars</strong>
				    </div>
                                    <div class="col-xl-8 col-lg-7 col-5">
				     <div class="single-progress">
				       <div class="progress">
					 <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:65%">
					 </div>
				       </div>
				     </div>
				    </div>
                                    <div class="col-xl-2 col-lg-2 col-2">
					<span><?=$course->rating_3?></span>
                                        
                                    </div>
                                </div>
                                
                                 <div class="row mb-3">
                                    <div class="col-xl-2 col-lg-3 col-4">
					<strong>2 stars</strong>
				    </div>
                                    <div class="col-xl-8 col-lg-7 col-5">
				     <div class="single-progress">
				       <div class="progress">
					 <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:40%">
					 </div>
				       </div>
				     </div>
				    </div>
                                    <div class="col-xl-2 col-lg-2 col-2">
					<span><?=$course->rating_2?></span>
                                        
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-xl-2 col-lg-3 col-4">
					<strong>1 stars</strong>
				    </div>
                                    <div class="col-xl-8 col-lg-7 col-5">
				     <div class="single-progress">
				       <div class="progress">
					 <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
					 </div>
				       </div>
				     </div>
				    </div>
                                    <div class="col-xl-2 col-lg-2 col-2">
					<span><?=$course->rating_1?></span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="student-reviews mt-20">
                        <ul class="list-none">
                        <?php $std = ReviewStudents($course->id); 
                                foreach($std as $std_detail){ 
                                    $user_info = GetUserDetails($std_detail->student_id);
//                                    echo "<pre>";print_r($user_info);exit();?>
                            <li>
                                <div class="student-thumb">
                                    <img src="<?=site_url('assets/uploads/members/'.$user_info->m_avatar)?>" alt="" class="rounded-circle" style="height: 80px;;width: 80px">
                                    <p class="mt-3"><?=$user_info->m_name?></p>
                                    <!--<small>1 Month Ago</small>-->
                                </div>
                                <div class="student-review">
                                    <div class="students-rating">
                                        <?php if($std_detail->rating == 1){ ?>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                        <?php }else if($std_detail->rating == 2) {?>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                        <?php }else if($std_detail->rating == 3){ ?>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                        <?php }else if($std_detail->rating == 4){?>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="far fa-star fa-1x"></i>
                                        <?php }else if($std_detail->rating == 5){ ?>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                            <i class="fas fa-star fa-1x"></i>
                                        <?php } ?>
                                        
                                    </div>
                                    <p>
                                        <?=$std_detail->comments?>
                                    </p>
                                </div>
                            </li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                    
                    
                    
                </div>
                <div class="col-lg-4">
                    <div class="course-features mt-sm-40 ml-5 text-center">
                        <ul class="list-none">
                            <li>
                                <span>Course fee</span>
                                <span class="course-price">$<?=$course->price?></span>
                            </li>
                            <li>
                                <span>
                                    <i class="fas fa-c fa-folder-open fa-1x"></i>
                                    Lectures
                                </span>
                                <span>16 Units</span>
                            </li>
                            <li>
                                <span>
                                    <i class="fas fa-c fa-flag fa-1x"></i>
                                    Duration
                                </span>
                                <span>
                                    <?=$course->duration?>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="fas fa-c fa-pencil-alt fa-1x"></i>
                                    Skill Level
                                </span>
                                <span><?=$course->skill_level?></span>
                            </li>
                            <li>
                                <span>
                                    <i class="fas fa-c fa-graduation-cap fa-1x"></i>
                                    Max Students
                                </span>
                                <span>
                                       <?=$course->max_students?>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="fas fa-c fa-comments fa-1x"></i>
                                    Language
                                </span>
                                <span>
                                    <?=$course->language?>
                                </span>
                            </li>
                            
                        </ul>
                         <?php if($course_taken == "not-taken") { ?>
                        <div class="course-features-bottom mt-30">
                            <a href="<?= site_url('training/enroll/'.$course->id)?>" class="btn-common">
                               Take This Course 
                            </a>
                            
                            <p>Enroll until  <?=$course->last_date_to_enroll?></p>
                        </div>
                     <?php   } ?>
                    </div>
                    
                    <div class="author-bio text-center mt-50 ml-5">
                        <h3><?=$course->m_name?></h3>
                        <small><?=$course->m_profession?></small>
                        <img src="<?=site_url('assets/uploads/members/'.$course->m_avatar)?>" class="img-fluid rounded-circle mb-3" alt="" style="height: 150px; width: 150px; margin-top: 25px;">
                        
<!--                        <div class="author-rating">
                            <i class="fas fa-star fa-1x"></i>
                            <i class="fas fa-star fa-1x"></i>
                            <i class="fas fa-star fa-1x"></i>
                            <i class="fas fa-star fa-1x"></i>
                            <i class="fas fa-star fa-1x"></i>
                            <span>(5 Rate)</span>
                        </div>-->
                        <p><?=$course->about_instructor?></p>
                        <div class="social-icons mt-20">
                            <a href="<?=$course->m_fb?>"><i class="fab fa-facebook-f fa-1x"></i></a>
                            <a href="<?=$course->linkedin_profile_link?>"><i class="fab fa-linkedin-in fa-1x"></i></a>
                            
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>

    <script>
        jQuery(document).ready(function () {


            

            $('.rb-rating').rating({
                'showCaption': true,
                'stars': '5',
                'min': '0',
                'max': '5',
                'step': '1',
                'size': 'md',
                'starCaptions': {0: 'status:0 stars', 1: 'status:1 star', 2: 'status:2 stars', 3: 'status:3 stars'}
            });
            
        });
    </script>

<?php $this->load->view('include/footer.php'); ?>