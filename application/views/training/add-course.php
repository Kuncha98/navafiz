<?php $this->load->view('include/header-training') ?>

<style>
    .page-banner.bg-1 {
    background: rgba(0, 0, 0, 0) url('<?=site_url('nassets')?>/img/front/jd1.jpg') repeat scroll center center / cover;
}

ul.list-none {
    margin: 0;
    padding: 0;
    list-style: none;
}

.list-none li {
    display: inline;
}
</style>





<div class="page-banner height-200 bg-1">
            <div class="">
                <div class="page-title vertical-middle text-center">
                    <h2 class="course-t1 pt-5 pb-5">ADD NEW COURSE</h2>
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
                        <li>Add Course</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="">
        <form action="<?= site_url('training/save_course')?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Course Image</label>
                        <input type="file" id="img" name="img" required=""  value="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Price in $</label>
                        <input type="text" name="price" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Language</label>
                        <input type="text" name="language" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Last Date For Enrollment</label>
                        <input id="input_year" required="" type="date" name="enrollment_date" class="form-control" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Duration in Hour(s)</label>
                        <input type="text" required="" name="duration" class="form-control" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Max Students</label>
                        <input type="text" name="max_students" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Skill Level</label>
                        <select name="skill_level" required class="form-control">
                           <option value="Beginner">Beginner</option>
                           <option value="Intermediate">Intermediate</option>
                           <option value="Expert">Expert</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Course Category</label>
                        <select name="category_id" required class="form-control">
                           <?php foreach($courses_cat as $cat){?>
                            <option value="<?=$cat->id?>"><?=$cat->title?></option>
                           <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>About Instructor</label>
                        <textarea class="form-control" required name="about_instructor" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>Course Description</label>
                        <textarea class="form-control" required name="description" rows="5"></textarea>
                    </div>
                </div>
                
            </div>
            <div class="text-center">
                    <input style="background: #6ac142;color: #fff;" type="submit" name="Save" class="btn btn-ouline">
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('include/footer.php'); ?>

<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
$(document).ready(function(){    
    $('#input_year').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });    
});
 
</script> -->