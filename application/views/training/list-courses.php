

<?php foreach($courses as $course){?>
    <div class="col-md-3 mt-5">
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
              <div class="col-md-4">
                  <h4 style="color:#6ac142; font-size:27px" class="float-right mt-2"><?=$course->price?> </h4>
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
