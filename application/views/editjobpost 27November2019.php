<?php $this->load->view('header.php');
$nw_img_search = "";
 ?>
<link href="<?=base_url()?>assets/frontend/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery.tagsinput.min.css">

<body>
<div class="page category-page"> 
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  
 
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Edit A Job</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a> </li>
              <li class="active">Edit Job</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="post-job ">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
          <div class="Heading-title-left black small-heading">
            <h3>Edit A job</h3>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>--> 
          </div>
          <div id="modalloading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> </div>
          <p class="text-success" id="jobsuccesssms"> </p>
          <br>
          <div class="post-job2-panel">
            <div class="form-group"> <span class="errormessage"><?php echo validation_errors(); ?></span> </div>
            
            <?php
			$job_title2 = "";
			$job_title = 0;
					if($this->session->flashdata('msg')){
						if(is_numeric($job->j_title))
	$job_title = $job->j_title;
else
	$job_title2 = $job->j_title;
						
						
				?>
            <div role="alert" class="form alert alert-success">
              <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
              <?php echo $this->session->flashdata('msg'); ?> </div>
            <?php
					}
				?>
            <form action="<?=base_url()?>updatejobdata" class="row" method="post" id="formd" enctype="multipart/form-data">
              <input type="hidden" id="job_id" name="job_id" value="<?php echo $job->j_id?>"/>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>Image</label>
                  <span class="Errorclass" id="jobimagesms"></span>
                  <input type="file" id="pic"  name="pic">
                    <img id="j_image" src="<?=base_url()?>/assets/uploads/jobs/<?=($job->j_image == "")?"noimage.png":$job->j_image ?>" width="80"/>
                </div>
              </div>
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                         <input type="text" readonly name="lib_file_selected" id="lib_file_selected" class="form-control" />
                                <?php echo anchor_popup('admin/gallery/allimages/', 'Library', $nw_img_search); ?>
                                    </div>
                                  
                                </div>
              
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Job Category *</label>
                  <select id="jobcat_id" name="jobcat_id" class="questions-category form-control" required>
                    <?php			 
                    $cat_qry = "SELECT * FROM jb_categories where c_status =1  ORDER BY c_name ASC";
                    $cat_rs =  mysql_query($cat_qry); echo mysql_error();
                    while($cat_row = mysql_fetch_array($cat_rs))
                    { ?>
                    <option value="<?=$cat_row['c_id']?>" <?php echo ($job->cat_id == $cat_row['c_id']) ? "selected" : ""?>>
                    <?=$cat_row['c_name']?>
                    </option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Job Title</label>
                  <select id="jobtitle" name="jobtitle" class="questions-title form-control" required>
                    <?php			 
                    $cat_qry = "SELECT * FROM jb_jobtitle where jt_status =1 ORDER BY jt_title ASC";
                    $cat_rs =  mysql_query($cat_qry); echo mysql_error();
                    while($cat_row = mysql_fetch_array($cat_rs))
                    { ?>
                    <option value="<?=$cat_row['jt_title']?>" <?php echo ($job->j_title == $cat_row['jt_title']) ? "selected" : ""?>>
                    <?=$cat_row['jt_title']?>
                    </option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="form-group">
                  <label>Job Title (Optional) </label>
                  <input type="text" placeholder="Enter title if the job title is not available in upper job title" id="jobtitle2" name="jobtitle2" class="form-control" value="<?php echo $job_title2?>">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Country *</label>
                  <select id="jobcountry" name="jobcountry" required class="questions-category form-control">
                    <option value="234"> United Arab Emirates</option>
                    <?php			 
                    $country_qry = "SELECT * FROM jb_country";
                    $country_rs =  mysql_query($country_qry); echo mysql_error();
                    while($country_row = mysql_fetch_array($country_rs)){?>
                    <option value="<?=$country_row['id']?>" <?php echo ($job->j_country_id == $country_row['id']) ? "selected" : ""?>>
                    <?=$country_row['country']?>
                    </option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>State *</label>
                  <input type="text" placeholder="Job Location" class="form-control" value="<?php echo $job->j_state?>" id="jobstate" name="jobstate" required>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>City *</label>
                  <input type="text" placeholder="Job Location" class="form-control" id="jobcity" value="<?php echo $job->j_location?>" name="jobcity" required>
                </div>
              </div>
              <!--<div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Image</label><span class="Errorclass" id="jobimagesms"></span>
                  <input type="file" id="jobfile"  name="jobfile"> <span><img id="j_image" src="<?=base_url()?>assets/uploads/jobs/" width="80" height="80" style="display:none"  /></span>
                  <table id="files">
                  </table>
                                    </div>
                                </div>-->
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
                  <input type="email" placeholder="Email address to apply for job" class="form-control" id="jobemailapply" name="jobemailapply"  value="<?php echo $job->j_email_apply?>"  required>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>Skills required for job</label>
                  <input type="text" id="tags" name="jobtags" value="<?php echo $job->j_tags?>" class="form-control" data-role="tagsinput">
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>Job Detials</label>
                  <textarea class="ckeditor" id="jobdescr" name="jobdescr" required> <?php echo $job->j_descr?> </textarea>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-default pull-right">Post Job <i class="fa fa-angle-right"></i></button>
                <!-- <button type="button" class="btn btn-default pull-right" onClick="postJob()">Post Job <i class="fa fa-angle-right"></i></button>--> 
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="widget">
            <div class="widget-heading"><span class="title">Find Professionals</span></div>
            <div class="" id="followers">
              <ul class="list-group list-group-dividered list-group-full">
                <?php 
    
    if($relatedprofiles!='empty') {
	
    foreach(@$relatedprofiles as $relatedprofile){ 

          

		
?>
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left"> <a class="avatar avatar-online" href="javascript:void(0)"> <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($relatedprofile->m_avatar == "")?"default.png":$relatedprofile->m_avatar?>" class="img-responsive" alt=""> <i></i> </a> </div>
                   
                    <div class="media-body"> 
                    
                      <div><a class="name" href="<?=base_url()?>professional/<?=$relatedprofile->m_id?>"> <strong>
                        <?=$relatedprofile->m_name?>
                        </strong> </a></div>
                      <div><small><strong>Profession: </strong>
                        <?=$relatedprofile->m_profession?>
                        </small></div>
                      <div><small><strong>Current City:</strong>
                        <?=$relatedprofile->m_current_city?>
                        </small></div>
                      <div><small><strong>Employer:</strong>
                        <?=$relatedprofile->m_employer?>
                        </small></div>
                      <div><small><strong> Employment Status:</strong>
                        <?=$relatedprofile->employment_status?>
                        </small></div>
                      <div><small><strong>Visa Status:</strong>
                        <?=$relatedprofile->visa_status?>
                        </small></div>
                      <div><small><strong>Email:</strong>
                        <?=$relatedprofile->m_email?>
                        </small></div>
                    </div>
                  </div>
                </li>
                <?php
	   }
					}
				?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
  
  <!-- FOR THIS PAGE ONLY --> 
  <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/jquery.tagsinput.min.js"></script> 
  <script type="text/javascript">
            $('#tags').tagsInput({
                width: 'auto'
            });
        </script> 
  <script type="text/javascript" src="<?=base_url()?>assets/frontend/ckeditor/ckeditor.js"></script> 
  <!-- CK-EDITOR --> 
  <!-- <script src="../../../cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>--> 
  <script type="text/javascript">
            CKEDITOR.replace('ckeditor.html');
        </script> 
  
  
  
  <!-- CORE JS --> 
  <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/custom.js"></script> 
  <script>
$(function () {
	
    $('#jobform').fileUploadUI({
        uploadTable: $('#files'),
        downloadTable: $('#files'),
		
        buildUploadRow: function (files, index) {
            return $('<tr><td><img src="<?=base_url()?>assets/frontend/images/small.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
				
			if(file.msg == "large size") {
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Errorclass">Size should be less than 2MB</span>');
				}
			else if(file.msg == "invalid type") {
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Errorclass">Only jpg,jpeg,png allowed</span>');
       	 		}
			else if(file.msg == "success") {
				$('#jobimage').val(file.name);
				$('#j_image').show();
				$('#j_image').attr('src','<?=base_url()?>assets/uploads/jobs/small_thumbs/'+file.name);
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Successclass">File upload successfully</span>');
       	 		}
		 	else {
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Errorclass">Due to internet Problem file not upload </span>');
       	 		}
		    
		
        }
    });
   
	

});
</script> 
</div>
</body>
</html>