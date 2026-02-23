<?php $this->load->view('include/header'); ?>
<style type="text/css">
    .card{
        margin-bottom: 30px;
    }
  

  
  .col-md-2 button .fa-angle-right {
    margin-top: 0;
    font-size: 20px;
    vertical-align: bottom;
    margin-left: 4px;
    color: #fff;
  }
  .col-md-7 input{
    padding: .375rem 2.75rem;
  }


    .profile-list .skills a {
        background-color: #f1f1f1;
        border-radius: 5px;
        font-size: 16px;
        margin: 0 10px 10px 0;
        padding: 5px 20px;
        text-transform: uppercase;
    }
    
    .proimg{    
        border-radius: 8px !important;
        border: 2px solid #215374;
        display: block;
        width: 110px;
        height: 110px;
        float: left;
        margin-right: 20px;
        background-size: cover;
    }
    a{
        text-decoration: none;
        color: #000;
    }
    .picandinfo p{
        font-size: 13px;
    }
    .userinfo a{
        font-weight: bold;
        text-decoration: none;
        font-size: 13px;
    }
    .heading{
        font-weight: bold;
        font-size: 13px;
        border-bottom: 1px solid #ccc;
        margin-top: 0px;
        margin-bottom: 5px;
    }
    .detail{
        font-size: 13px;
        text-decoration: none;
    }

    .Heading-title-left h1
    {
      margin: 3% 0 5% 0;
    }
    .Heading-title-left h1::after {
        background-color: #242424;
        top: 100px;
        content: "";
        height: 1px;
        left: 0;
        margin: 0 auto;
        position: absolute;
        right: 0;
        width: 59px;
    }

    .Heading-title-left h1::before {
        background-color: #242424;
        top: 90px;
        content: "";
        height: 1px;
        left: 0;
        margin: 0 auto;
        position: absolute;
        right: 0;
        width: 99px;
     }
     
     @media screen and (max-width: 450px){
         .tabs_options a{
             max-width: 100%;
             display: block;
             margin-bottom: 9px;
         }
    }
    
    @media screen and (max-width: 400px){
        .tabs_options a{
            max-width: 100%;
            display: block;
            margin-bottom: 9px;
             
         }
    }
     

</style>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<div class="container-mid">
    <div class="card tabs_options">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <a href="<?=site_url('mentors/quick_job_applicants');?>" class="btn btn-primary mr-3">Quick Job Applicants</a>                    
                    <a href="<?=site_url('users_list/users_by_list');?>" class="btn btn-primary mr-3">Recommended Candidates List</a>                    
                    <a href="<?=site_url('users_list/users_by_list/82');?>" class="btn btn-primary mr-3">Featured Candidates</a>                    
                    <a href="<?=site_url('social-media');?>" class="btn btn-primary mr-3">Join WhatsApp Group</a>             
                </div>
            </div>
            <div class="row">    
                <div class="col-md-12">
                    <div class="form">
                    <form action="" method="post" class="SearchProfiles">
                        <div class="form-group row">
                            <div class="col-md-3 col-xs-12 p-4"><input type="text" class="form-control" id="by_name" name="by_name" placeholder="By Name"></div>
                            <div class="col-md-3 col-xs-12 p-4"><input type="text" class="form-control" id="by_skills" name="by_skills" placeholder="By Skills"></div>
                            <div class="col-md-3 col-xs-12 p-4"><input type="text" class="form-control" id="by_profession" name="by_profession" placeholder="By Proffession"></div>
                            <div class="col-md-3 col-xs-12 p-4">
                                <select class="select-category form-control" id="s_catid">
                                    <option label="By Industry" value="">By Industry</option>
                                    <?php $categories = GetCategoryList()?>
                                    <?php foreach($categories as $category){?>
                                           <option value="<?=$category->c_id?>"> <?=$category->c_name?></option>                            
                                    <?php }?>
                              </select>
                            </div>
                            <div class="col-md-3 col-xs-12 p-4"><input type="text" class="form-control" id="m_current_city" name="m_current_city" placeholder="By Current City"></div>
                            <div class="col-md-3 col-xs-12 p-4"><input type="text" class="form-control" id="m_nationality" name="m_nationality" placeholder="By Nationality"></div>
                            <div class="col-md-3 col-xs-12 p-4"><input type="text" class="form-control" id="m_phone" name="m_phone" placeholder="By Phone"></div>
                            <div class="col-md-3 col-xs-12 p-4"><input type="text" class="form-control" id="m_email" name="m_email" placeholder="By Email"></div>
                            <div class="col-md-3 col-xs-12 p-4">
                                <select class="select-category form-control" id="register_on">
                                    <option label="Last Registered" value="">Last Registered</option>
                                    <option value="last_week">This Week</option>
                                    <option value="this_month">This Month</option>
                              </select>
                            </div>
<!--                            <div class="col-md-3 col-xs-12 p-4">
                                <select class="select-category form-control" id="custom_filter">
                                    <option value="">Select Filter</option>
                                    <option value="Nurs">Nurses</option>
                                    <option value="Cashier">Cashier</option>
                                    <option value="Caregiver">Caregiver</option>
                              </select>
                            </div>-->
                            <div class="col-md-3 col-xs-12 p-4">
                                <button type="submit" class="btn btn-primary col-12">Search</button>
                            </div>                
                        </div>            
                      </form>
                  </div>
                </div>
              </div>
        </div>
    </div>

</div>
<div class="container-mid">    

    <div class="row" id="loadData">
        
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12  text-center">
          <img width="65" style="display:none;" id="loading-image" src="<?= site_url('nassets/img/ajax-loader.gif');?>">
          <br />
          <button class="btn btn-primary  loadmore" style="width: 40%;">Load More</button>
        </div>
    </div>
</div>

<?php $this->load->view('include/footer');?> 
<!-- CORE JS -->  
<script>
$(document).ready(function(){      
    var page_id = 1;    
    var limit = '<?php echo $limit?>';    
    loadProfessionals(page_id,limit);
    
    $(document).on('click', '.loadmore', function(){        
        $('.paging_page').hide();
        var page_id       =   1;    
        var limit       = parseInt($("#limit").val());          
        $('#page_id').val(page_id);
        b = parseInt(100);
        var total_limit = limit + b;
        loadProfessionals(page_id,total_limit);
    });
    
    
    
//    $(document).on('click', '.search_by_prof', function(){        
//        $('.paging_page').hide();
//        
//        loadnurseslist();
//    });    
    
    
    $(document).on('submit', '.SearchProfiles', function(frm){        
        frm.preventDefault();
        
        $('#loadData').html('');
        $('.paging_page').hide();
        var page_id       =   1;    
        var limit       = 0;          
        $('#page_id').val(page_id);
        b = parseInt(100);
        var total_limit = limit + b;
        loadProfessionals(page_id,total_limit);
    });
    
    
    
    
//    $('#search_proff').on('change', function(){
////            $('#loadData').html('');
//            loadnurseslist();
//        })
//    });
  
//    function loadnurseslist(){
//        $('#loading-image').show();      
////        $('#limit').val(limit);
//        var search_proff = $('#search_proff').val();
//        var form_data = {
//          search_proff : search_proff,  
//        };    
//        $.ajax({
//          url   : "<?php echo site_url('professionals/AjaxSearch/')?>/"+search_proff,
//          type  : 'POST',
//          data  : form_data,
//          success : function(data){
////             alert(data);
//            $("#profloading").hide();
//            $('#loadDataProff').html(data);
//          },
//          complete:function(){
//            $('.paging_page').show();
//            $('#loading-image').hide();
//          }
//        }); 
//    }
    
    
});
    
    
function loadProfessionals(page_id,limit){  
    
    $('#loading-image').show();    
    $('#page_id').val(page_id);    
    $('#limit').val(limit);
    
    var by_name = $('#by_name').val();
    var by_skills = $('#by_skills').val();
    var by_profession = $('#by_profession').val();
    var m_nationality = $('#m_nationality').val();
    var m_current_city = $('#m_current_city').val();
    var s_catid = $('#s_catid').val();
    var register_on = $('#register_on').val();
    var m_phone = $('#m_phone').val();
    var m_email = $('#m_email').val();
    var custom_filter = $('#custom_filter').val();
    // alert(limit);
    var form_data = {
      page_id       : page_id,       
      limit         : limit, 
      by_name       : by_name,
      by_skills     : by_skills,
      by_profession : by_profession,
      m_current_city : m_current_city,
      m_nationality : m_nationality,
      s_catid       : s_catid,      
      register_on       : register_on,      
      custom_filter       : custom_filter,      
      m_phone       : m_phone,      
      m_email       : m_email,      
    };    
    
    $.ajax({
        url   : "professionals/professionalsajax",
        type  : 'POST',
        data  : form_data,
        success : function(data){            
            $('#loadData').html(data);
        },
        complete:function(){
            $('.paging_page').show();
            $('#loading-image').hide();
        }
    }); 
}
function copyLink(button) {
    const link = button.previousElementSibling.href; // get <a> before button
    const msg = button.nextElementSibling;          // get <span> after button
    
    navigator.clipboard.writeText(link).then(() => {
        msg.style.display = "inline";
        setTimeout(() => {
            msg.style.display = "none";
        }, 2000);
    });
}
</script>
