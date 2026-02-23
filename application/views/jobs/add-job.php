<?php $this->load->view('include/header');
$nw_img_search = "";
?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<link href="<?=base_url()?>assets/frontend/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery.tagsinput.min.css">
<div class="container-mid">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12 mx-auto">

            <div class="Heading-title-left black small-heading">
                <h3>Post A New job  -- <small><a href="<?=site_url('myjobs');?>" class="btn btn-success">My Posted Jobs</a></small></h3>
            </div>
            <div id="modalloading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> </div>
            <p class="text-success" id="jobsuccesssms">

            </p>
            <br>
            <div class="post-job2-panel">
       <div class="form-group"> <span class="errormessage"><?php echo validation_errors(); ?></span> </div>
        <!--  <div class="form-group"> <span class="successmessage"><?php echo $this->session->flashdata('msg'); ?></span> </div>-->
        <?php if($this->session->flashdata('msg')){?>
        <div role="alert" class="form alert alert-success mx-auto">
            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            <?php echo $this->session->flashdata('msg'); ?> </div>
            <?php }?>
            <form action="<?=base_url()?>jobs/savejob" class="row" method="post" id="formd" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12 col-xs-12" >
                        <div class="form-group">
                       <label>Job Title *</label>
                       <input type="text" placeholder="Enter title if the job title is not available in upper job title" id="jobtitle2" name="jobtitle2" required="" class="form-control">
                   </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Job Details</label>
                        <textarea class="form-control" id="jobdescr" name="jobdescr" rows="8" required></textarea>
                    </div>
                </div>


                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Job Category / Industries*</label>
                         <select id="jobcat_id" name="jobcat_id" class="questions-category form-control" required=''>
                            <option value="">Select Category</option>
                            <?php
                            foreach($categories as $cat){?>                                      
                                <option value="<?=$cat->c_id;?>"><?=$cat->c_name;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div> 

                    <div class="clearfix"></div>       

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">                            
                            <label>Country *</label>
                             <select id="jobcountry" name="jobcountry" required class="questions-category form-control">
                                 <option value="234"> United Arab Emirates</option>
                                    <?php
                                    foreach($country_result as $country){?>                                      
                                        <option value="<?=$country->id;?>"><?=$country->country;?></option>
                                    <?php }?>                                            
                            </select>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>City *</label>
                            <input type="text" placeholder="Job Location" class="form-control" id="jobcity" value="-" name="jobcity" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Reference By *</label>
                            <input type="text" placeholder="Job Reference By" class="form-control" id="job_reference_by" value="" name="job_reference_by">
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
                            <input type="text" placeholder="Name of Company" class="form-control" value="-" id="jobcompany" name="jobcompany" required>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Email Address to Apply *</label>
                            <input type="email" placeholder="Email address to apply for job" class="form-control" id="jobemailapply" name="jobemailapply">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Skills required for job</label>
                            <input type="text" id="tags" name="jobtags" value="" class="form-control" data-role="tagsinput">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Image</label><span class="Errorclass" id="jobimagesms"></span>
                             <input type="file" id="pic"  name="pic"> 
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="text" readonly name="lib_file_selected" id="lib_file_selected" class="form-control" />
                            <?php echo anchor_popup('admin/gallery/allimages/', 'Pictures Library', $nw_img_search); ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-outline-success col-sm-12 col-xs-12 pull-right">Post Job</button>
                    </div>
                </form>
            </div>
        </div>                
    </div>
</div>    
    
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
<!--    <script type="text/javascript">
        CKEDITOR.replace('ckeditor.html');
    </script>-->


    <!-- CORE JS -->
    <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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

<?php $this->load->view('include/footer'); ?>