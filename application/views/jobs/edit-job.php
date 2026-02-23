<?php $this->load->view('include/header.php'); 
$nw_img_search = '';
?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery.tagsinput.min.css">
<div class="container">
    <div class="row">
        <?php $this->load->view('notification/notification-messages');?>
        <form action="<?=base_url('jobs/updatejob/'.$job->j_id);?>" class="row" method="post" id="formd" enctype="multipart/form-data">
            <input type="hidden" id="job_id" name="job_id" value="<?php echo $job->j_id?>"/>
            <div class="col-md-12 col-sm-12 col-xs-12" >
                    <div class="form-group">
                   <label>Job Title *</label>
                   <input type="text" value="<?php echo $job->j_title?>" placeholder="Enter title if the job title is not available in upper job title" id="jobtitle2" name="jobtitle2" required="" class="form-control">
               </div>
            </div>              
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label>Job Details</label>
                    <textarea class="form-control" id="jobdescr" name="jobdescr" rows="8" required><?php echo $job->j_descr?> </textarea>
                </div>
            </div>
              
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label>Job Category *</label>
                <select id="jobcat_id" name="jobcat_id" class="questions-category form-control" required>
                  <?php foreach($categories as $cat_row){ ?>
                  <option value="<?=$cat_row->c_id?>" <?php echo ($job->cat_id == $cat_row->c_id) ? "selected" : ""?>>
                  <?=$cat_row->c_name;?>
                  </option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Country *</label>
                  <select id="jobcountry" name="jobcountry" required class="questions-category form-control">
                    <option value="234"> United Arab Emirates</option>
                    <?php			 
                    foreach($country_result as $country_row)
                      {?>
                    <option value="<?=$country_row->id?>" <?php echo ($job->j_country_id == $country_row->id) ? "selected" : ""?>>
                    <?=$country_row->country?>
                    </option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="clearfix"></div>
                           
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>City *</label>
                        <input type="text" placeholder="Job Location" class="form-control" id="jobcity" value="<?php echo $job->j_location ?>" name="jobcity" required>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Reference By *</label>
                        <input type="text" placeholder="Job Reference By" class="form-control" id="job_reference_by" value="" name="job_reference_by">
                    </div>
                </div>
              <div class="clearfix"></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Name of Company *</label>
                  <input type="text" placeholder="Name of Company" class="form-control" value="<?php echo $job->j_company?>"  id="jobcompany" name="jobcompany" required>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Email Address to Apply *</label>
                  <input type="email" placeholder="Email address to apply for job" class="form-control" id="jobemailapply" name="jobemailapply"  value="<?php echo $job->j_email_apply?>">
                </div>
              </div>
              <div class="clearfix"></div>          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>Skills required for job</label>
                  <input type="text" id="tags" name="jobtags" value="<?php echo $job->j_tags?>" class="form-control" data-role="tagsinput">
                </div>
              </div>
              
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>Image</label>
                  <span class="Errorclass" id="jobimagesms"></span>
                  <input type="file" id="pic"  name="pic">
                    <img onerror= this.style.display='none' id="j_image" src="<?=base_url()?>/assets/uploads/jobs/<?=($job->j_image == "")?"noimage.png":$job->j_image ?>" width="80"/>
                </div>
              </div>
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <input type="text" readonly name="lib_file_selected" id="lib_file_selected" class="form-control" />
                    <?php echo anchor_popup('admin/gallery/allimages/', 'Picture Library', $nw_img_search); ?>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 mx-auto">
              <button type="submit" class="btn btn-success col-12 mb-5">Update Job</button>                
            </div>
        </form>        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- FOR THIS PAGE ONLY -->
<script type="text/javascript" src="<?=base_url()?>assets/frontend/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript">
    $('#tags').tagsInput({
        width: 'auto'
    });
    
     $(document).ready(function(){

     // Initialize
     
    $( "#job_reference_by" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: base_url+"jobs/userList",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#job_reference_by').val(ui.item.label); // display the selected text
//          $('#name').val(ui.item.label); // display the selected text
//          $('#userid').val(ui.item.value); // save selected id to input
//          $('#useremail').val(ui.item.email); // save selected id to input
//          $('#m_city').val(ui.item.current_city); // save selected id to input

        return false;
        }
      });
 

    });
    
</script>