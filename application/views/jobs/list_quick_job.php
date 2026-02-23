<?php $this->load->view('include/header'); ?>
<?php $session_user_id = $this->session->userdata('user_id');?>
<?php // print_r($quick_jobs) ?>
<div class="container">
    
    <?php $this->load->view('notification/notification-messages'); ?>
    <div class="row">
        <div class="col-12">
            <a class="mr-3">Page Views:<i>5</i></a>
            <!--<a href="<?=site_url('find-job');?>" class="btn btn-primary mr-3">Find Job</a>-->                    
            <a href="<?=site_url('professionals');?>" class="btn btn-primary mr-3">Find Professionals</a>
            <a href="<?=site_url('event');?>" class="btn btn-primary">Events and Seminars</a>
        </div>
    </div>
    <div class="row">
        <?php // echo "<pre>";print_r(($quick_jobs));exit(); ?>
        <?php foreach($quick_jobs as $quick_job){ ?>
        <div class="col-md-4 mt-3 mb-3">
            <div class="card">
                <div class="card text-center">
                    <div class="card-header">
                      <?=$quick_job->title?>
                    </div>
                    <div class="card-body">
                      <p class="card-text"><?=$quick_job->description?></p>
                      
                      <!--<footer class="blockquote-footer mt-5 float-left">Added By: <cite title="Source Title"><?=$quick_job->m_name?></cite></footer>-->
                      <button type="button" class="btn btn-outline-dark float-right col-12 mt-5" id="apply" onclick="findId(<?=$quick_job->quick_job_id?>)" data-toggle="modal" data-target="#exampleModal">Apply</button>
                      
                    </div>
                    
                    <div class="card-footer">
                        Added Date: <span class="text-muted"><?=$quick_job->added_on?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply Quick Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <form method="post" action="<?=site_url('jobs/appyQuickJob/')?>" enctype="multipart/form-data">
      <div class="modal-body">
         
          <div class="form-group">
            <label for="name" class="col-form-label required">Name:</label>
            <input type="text" required="" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="form-group">
            <label for="whatsapp_number" class="col-form-label required">Whatsapp Number:</label>
            <input type="text" required="" class="form-control" name="whatsapp_number" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="">
          </div>
          <div class="form-group">
            <label for="resume_file" class="col-form-label">Resume:</label>
            <input type="file" class="form-control" name="resume_file" id="resume_file">
          </div>
          <div class="form-group">
            <!--<label for="recipient-name" class="col-form-label">Email:</label>-->
            <input type="hidden" class="form-control" name="job_id" id="quick_job_id">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Apply</button>
      </div>
        </form>
    </div>
  </div>
</div>


<script type="text/javascript">
 
function findId(id){
//    alert(id);
    $("#quick_job_id").val( id );
}    
</script>






<?php $this->load->view('include/footer'); ?>