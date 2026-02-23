<?php $this->load->view('include/header.php'); 
$session_user_id = $this->session->userdata('user_id');
?>
<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery.tagsinput.min.css">
<style type="text/css">
  .modal-dialog{
    max-width: 750px;
  }
  .card{
      margin-bottom: 20px;
  }
</style>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<div class="container-mid">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-md-7 company_search pr-0">
                              <input type="text" class="form-control" id="companies_search" name="s_company" placeholder="Search Companies">
                            </div>
                            <div class="col-md-3 pl-0 pr-0">
                                <select class="select-category form-control" id="cat_id">
                                  <option label="Select Option"></option>
                                   <?php   
                                     if($categories != "empty"){
                                       foreach($categories as $category){?>
                                          <option value="<?=$category->c_id?>"> <?=$category->c_name?></option>
                                          <?php }?>
                                    <?php  }?>
                                </select>
                            </div>
                            <div class="col-md-2 pl-0">
                                <button type="button" class="btn btn-primary btn-search-submit" onClick="search_companies(1,50);">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>                
    </div>
    <div class="row">
        <div class="col-md-6 col-xs-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5>Total Companies (<?=$total_count;?>) <small><a href="#" class="btn btn-primary float-right" id="add_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">Add Company</a></small></h5>                                        
                </div>
            </div>
        </div>                                
    </div>
    <?php $this->load->view('notification/notification-messages');?>        
    <div class="row" id="loadData">

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12  text-center">
          <button class="btn btn-primary  paging_page" style="width: 40%;">Load More</button>
          <img width="65" style="display:none;" id="loading-image" src="<?= site_url('nassets/img/ajax-loader.gif');?>">
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>
<script>    
    function loadCompanies(page_id,limit){  
         $("#profloading").show();
         $('#page_id').val(page_id);    
         $('#limit').val(limit);
         

         var form_data = {
             page_id : page_id,       
             limit : limit,       
         };    
         $.ajax({
             url   : "<?= site_url('companies/companiesajax');?>",
             type  : 'POST',
             data  : form_data,
             crossDomain:true,
             dataType: 'jsonp',
             success : function(data){
                 $("#profloading").hide();
                 $('#loadData').html(data);
             },
             complete:function(){
                 $('.paging_page').show();
                 $('#loading-image').hide();
             }
        }); 
    }

    $(document).ready(function(){      
        var page_id = 1;    
        var limit = '<?php echo $limit;?>';    
        search_companies(page_id,limit);
        $(document).on('click', '.paging_page', function(){ 
            $('.paging_page').hide();
            $('#loading-image').show();
            var page_id=1;    
            var limit = parseInt($("#limit").val());
            $('#page_id').val(page_id);      
            b = parseInt(50);    
            var total_limit = limit + b;      
            search_companies(page_id,total_limit);
        });    
    });

    function search_companies(page_id,limit){
        var company = $('#companies_search').val();
        var category = $('#cat_id').val();
        $('#page_id').val(page_id);    
        $('#limit').val(limit);
        if(limit == ''){
            $('#limit').val(25);
        }
        var form_data = {
            page_id       : page_id,       
            limit         : limit, 
            company       : company,
            category      : category,      
        };    
    
        $.ajax({
            url   : "<?= site_url('companies/companiesajax');?>",
            type  : 'POST',
            data  : form_data,
            crossDomain: true,
            success : function(data){        
                $("#profloading").hide();
                $('#loadData').html(data);
            },
            complete:function(){
                $('.paging_page').show();
                $('#loading-image').hide();
            }
        }); 
    }
</script>

<div class="modal fade" id="company_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="float-right" aria-hidden="true">&times;</span></button>
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Add Company</h4>
      </div>

      <div class="modal-body">
          <form action="<?=base_url('companies/save');?>" class="row" method="post" id="formd" enctype="multipart/form-data">
            <input type="hidden" name="action" value="companies">
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
                                <label>Email</label>
                                  <input type="text" placeholder="Enter Email" id="email" required="" name="email" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Website</label>
                               <input type="text" placeholder="Enter Website" id="website" name="website" class="form-control">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Career Page</label>
                               <input type="text" placeholder="Enter Career page link" id="website" name="co_career_page" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Fax</label>
                                  <input type="text" placeholder="Enter Fax" id="fax" name="fax" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>City</label>
                                  <input type="text" placeholder="Please Enter City" id="city" name="city" class="form-control">
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
                            <div class="form-group">
                                <label>Admin Remarks</label>
                                <input type="text" name="admin_remarks" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-primary pull-right">Submit <i class="fa fa-angle-right" style="margin-top: 0; font-size: 14px; color: #fff;"></i></button>
                           <!-- <button type="button" class="btn btn-default pull-right" onClick="postJob()">Post Job <i class="fa fa-angle-right"></i></button>-->
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>

<script>


$(document).ready(function(){
    $('#add_company').on('click', function(e){
        $('#company_modal').modal();        
    });
});


// AJAX call for autocomplete 
$(document).ready(function(){
  $("#search-box").keyup(function(){
    var key = $(this).val();
    $.ajax({
    type: "POST",
    url: "<?= site_url('companies/companiesajax');?>",
    data: {keyword:key},
    beforeSend: function(){
      $("#search-box").css("background","#FFF url('<?= site_url();?>/nassets/img/LoaderIcon.gif') no-repeat 165px");
    },
    success: function(data){
     // alert(data);
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    }
    });
  });   
});
</script> 
<script type="text/javascript" src="<?= site_url();?>assets/frontend/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript">
    $('#tags').tagsInput({
        width: 'auto'
    });
</script>
