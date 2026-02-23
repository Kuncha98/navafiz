<?php $this->load->view('include/header'); ?>
<?php $session_user_id = $this->session->userdata('user_id');?>
<?php // echo $page_id;exit();?>
<style>
    #loading-image{
        display:inline-block;
    }
    
    .pagination-box a.paging_page{
        border: solid 1px #ccc;
        padding: 9px;
        font-size: 20px;
        background: #ccc;
    }
    .pagination-box a.paging_page:hover{
      background: #b9b1d8;
    }
    .pagination-box span.paginate_active{
        border: solid 1px #ccc;
        padding: 9px;
        font-size: 20px;
        background: #b9b1d8;
        color: white;
    }
    #loadingjobs1{
        margin: 0 auto;
        background: rgba(0,0,0, 0.5);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
    }
    
    
    @media screen and (max-width: 450px){
        #s-btns{
            margin-right: auto;
            margin-left: auto;
        }
    }
    
    
    @media screen and (max-width: 400px){
        #s-btns{
            margin-right: auto;
            margin-left: auto;
        }
    }
    
    
</style>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<input type="hidden" name="cat_id" id="cat_id" />

<div class="container-mid">
    
    <?php $this->load->view('notification/notification-messages');?>
    
    <div class="row">
        <?php if (isset($session_user_id) && intval($session_user_id) > 0){ ?>
            <div class="d-flex flex-row bd-highlight mb-3" id="s-btns">
                <div class="p-2 bd-highlight"><a href="<?=site_url('social-media');?>" class="btn btn-primary mr-3 mb-2">Join WhatsApp Group</a></div>
                <div class="p-2 bd-highlight"><a href="<?=site_url('jobs/addjob');?>" class="btn btn-primary mr-3 mb-2">Post Job</a></div>
                <div class="p-2 bd-highlight"><a href="<?=site_url('feed');?>" class="btn btn-primary mr-3 mb-2">Jobs As Received</a></div>
            </div>
        <?php } ?>
    </div>
    
    <div class="row">
        <!--<div class="col-md-9 col-xs-12 mb-4"></div>-->
        <div class="col-md-9 col-xs-12">
            <div class="card profile">
                <div class="card-header">
                    <b>Featured Jobs</b>
                </div>
                <div class="card-body">
                    <div class="row" id="load_ajax_featured_jobs" style="font">
                        <p class="text-center loadingjobs" id="loadingjobs" style="margin: 0 auto;">
                            <img src="<?=site_url('nassets/feed/images/loader.gif');?>" width="150" />
                        </p>
                    </div>
                </div>
            </div> 
            <div class="card profile">
                <div class="card-header">
                    <b>Latest Jobs</b>
                    <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                    <a href="<?php echo site_url('jobs/addjob')?>" class="btn btn-success float-right">Post Job</a>
                    <?php }?>
                </div>
                <div class="card-body">
                    <div class="row" id="load_ajax_jobs">                        
                        <p class="text-center loadingjobs1" id="loadingjobs1" style="margin: 0 auto;">
                            <img src="<?=site_url('nassets/feed/images/loader.gif');?>" width="150" />
                        </p>
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="card profile">
                <div class="card-header"><b>Categories</b></div>
                <div class="card-body">
                    <ul class="categories-module">
                     <?php foreach ($cat_list as $cat){?>
                        <li class="jobcats" id="<?=$cat->c_id;?>"> <a href="javascript:void(0);">  <?=$cat->c_name;?> <span>(<?=$cat->cat_tot_jobs;?>)</span> </a> </li>
                     <?php }?>                
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12  text-center">
          <img width="65" id="loading-image" src="<?= site_url('nassets/img/ajax-loader.gif');?>">
          <br />
          <button class="btn btn-primary loadmore" style="width: 40%;">Load More</button>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer');?>
<script>
    $('#loading-image').hide();
    function loadJobs(cat_id,page_id,limit){
        $("#loadingjobs1").show();
        var cat_id	= $("#cat_id").val();
        $('#page_id').val(page_id);		
        $('#limit').val(limit);
        var form_data = {
            page_id : page_id, 
            cat_id : cat_id, 
            limit : limit, 
            action : 'show_jobs'
        };		

        $.ajax({
            url  	: "jobs/getlist",
            type 	: 'POST',
            data 	: form_data,
            success : function(data){
                $('#loading-image').hide();
                $("#loadingjobs1").hide();
                $('#load_ajax_jobs').html(data);
                $("html, body").animate({ scrollTop: $('.header').offset().top }, 1000);
            }
        });	
    }
        
    function loadFeaturedJobs(cat_id,page_id,limit){
        $("#loadingjobs").show();	
        $('#page_id').val(page_id);		
        $('#limit').val(limit);

        var form_data = {
            page_id : page_id, 
            cat_id : cat_id, 
            limit : limit, 
            action : 'show_featured_jobs'
        };		

        $.ajax({
            url  	: "jobs/getfeaturedlist",
            type 	: 'POST',
            data 	: form_data,
            success : function(data){
                // console.log(data);
                $("#loadingjobs").hide();
                $('#load_ajax_featured_jobs').html(data);
                $("html, body").animate({ scrollTop: $('.header').offset().top }, 1000);
            }
        });	
    }
    
    $(document).on('click', '.loadmore', function(){
        
        $('#loading-image').show();
        $('.paging_page').hide();
        var cat_id	= $("#cat_id").val();
        var page_id       =   1;    
        var limit       = parseInt($("#limit").val());   
        
        $('#page_id').val(page_id);
        b = parseInt(20);
        var total_limit = limit + b;
        console.log(total_limit);
        loadJobs(cat_id,page_id,total_limit);
        
    });

    $(document).ready(function(){
        var page_id = 1;
        var limit = '<?php echo $limit?>';
        loadJobs('',page_id,limit);
        $(document).on('click', '.paging_page', function(){
            var page_id= this.id;
            var cat_id = $("#cat_id").val();
            var limit = $("#limit").val();
            $('#page_id').val(page_id);
            $('#limit').val(limit);
            loadJobs(cat_id,page_id,limit);
        });

        $(document).on('click', '.jobcats', function(){		
            var cat_id =  this.id;
            var page_id = 1;//$("#page_id").val();
            var limit = 100;//$("#limit").val();
            $('#page_id').val(page_id);
            $('#page_id').val(page_id);
            $('#cat_id').val(cat_id);
            $('#limit').val(limit);
            loadJobs(cat_id,page_id,limit);
        });
    });
        
    $(document).ready(function(){
        var page_id = 1;
        var limit = '<?php echo $limit?>';
        loadFeaturedJobs('',page_id,limit);
        
        $(document).on('click', '.paging_page', function(){		
            var page_id = this.id;
            var cat_id	= $("#cat_id").val();
            var limit				= $("#limit").val();
            $('#page_id').val(page_id);
            $('#limit').val(limit);
            loadFeaturedJobs(cat_id,page_id,limit);
        });

        $(document).on('click', '.jobcats', function(){
            var cat_id = this.id;
            var page_id = 1;//$("#page_id").val();
            var limit = 100;//$("#limit").val();
            $('#page_id').val(page_id);
            $('#page_id').val(page_id);
            $('#cat_id').val(cat_id);
            $('#limit').val(limit);
            loadFeaturedJobs(cat_id,page_id,limit);
        });
    });                
</script>