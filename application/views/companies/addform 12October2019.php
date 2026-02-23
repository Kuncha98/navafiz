<?php $this->load->view('header.php'); ?>
<link href="<?=base_url()?>assets/frontend/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery.tagsinput.min.css">
<body>
<div class="page category-page">
    <?php $this->load->view('pagetop.php'); ?>
    <div class="clearfix"></div>
        <section class="post-job ">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="Heading-title-left black small-heading">
                            <h3>New Company</h3>                         
                        </div>
                           <div id="modalloading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> </div>
                            <p class="text-success" id="jobsuccesssms"></p>
                            <br>
                        <div class="post-job2-panel">
                   <?php $this->load->view('notification/notification-messages'); ?>
                    <?php if($this->session->flashdata('msg')){?>
                    <div role="alert" class="form alert alert-success">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <?php echo $this->session->flashdata('msg'); ?> 
                    </div>
                    <?php } ?>
                    <form action="<?=base_url('companies/save');?>" class="row" method="post" id="formd" enctype="multipart/form-data">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Category *</label>
                                <select id="cat_id" name="cat_id" class="questions-category form-control" required>
                                    <?php	
                                    $cat_results = $this->db->query("SELECT * FROM jb_categories where c_status =1")->result_array();                                      
                                    foreach ($cat_results as $cat_row){?>
                                    <option value="<?=$cat_row['c_id']?>">
                                    <?=$cat_row['c_name']?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Name *</label>
                                <input type="text" placeholder="Enter Name" id="name" name="name" class="form-control" required>
                            </div>
                        </div>                                
                        <div class="clearfix"></div> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mobile</label>
                                  <input type="text" placeholder="Enter Mobile" id="mobile" name="mobile" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Phone</label>
                               <input type="text" placeholder="Enter Phone" id="phone" name="phone" class="form-control">
                            </div>
                        </div>
                         <div class="clearfix"></div>       

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Fax</label>
                                  <input type="text" placeholder="Enter Fax" id="fax" name="fax" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Website</label>
                               <input type="text" placeholder="Enter Website" id="website" name="website" class="form-control">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Career Page</label>
                               <input type="text" placeholder="Enter Career page link" id="website" name="co_career_page" class="form-control">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Address *</label>
                                <input type="text" placeholder="Enter Address" class="form-control" id="address" value="" name="address" required>
                            </div>
                        </div>
                        <div class="clearfix"></div> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" id="tags" name="keywords" value="" class="form-control" data-role="tagsinput">
                            </div>
                        </div>   
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Image</label><span class="Errorclass" id="jobimagesms"></span>
                                <input type="file" id="company_logo"  name="company_logo"> 
                            </div>                                  
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-default pull-right">Submit <i class="fa fa-angle-right"></i></button>
                           <!-- <button type="button" class="btn btn-default pull-right" onClick="postJob()">Post Job <i class="fa fa-angle-right"></i></button>-->
                        </div>
                    </form>
                </div>
                </div>
                    
                </div>
            </div>
        </section>
    
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
<!-- FOR THIS PAGE ONLY -->
<!--  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVj6yChAfe1ilA4YrZgn_UCAnei8AhQxQ&amp;sensor=false"></script>
<script type="text/javascript" src="js/map.js"></script>-->

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