<?php $this->load->view('include/header'); ?>
<?php $session_user_id = $this->session->userdata('user_id');?>
<?php // $use = IsFeaturedRecruiter(); print_r($use);exit();?>
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
  
      .job-box {
        background-color: #fff;
        clear: both;
        margin-bottom: 30px;
        overflow: hidden;
        padding: 30px 0;
        position: relative;
    }    
    .categories-list-page .comp-logo {
        padding: 5px;
        margin: 0 auto;
        display: table;
    }
    .categories-list-page .job-title-box {
        position: relative;
        overflow: hidden;
        margin-left: 15px;
    }
    a {
        outline: none !important;
        color: #242424;
        text-decoration: none;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease- 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }    
    
    ul{
        list-style: none;
        margin: 0;
        padding: 0;
    }
    ul li{
        border-bottom: solid 1px #ccc;
        padding: 10px 0; 
    }

</style>
<div class="container-mid">
    
    <?php
        $list_title = GetUserListName($list_id);
        $list_title = @$list_title[0]->name;
    ?>
    <h2 class="ml-5"><?=$list_title?>-</h2>
    <h3 class="ml-5">Active Jobs(s) in UAE-Found ACTIVE</h3>
    <h4 class="ml-5">During Last 30 Days</h4>
    <?php if(isset($views)){ ?>
    <!--<p class="ml-5">Page View(s): <i> <?= isset($views) ? $views : ''?></i></p>-->
    <?php } ?>
    <div class="row mt-4">
        <div class="col-md-10 col-xs-12">
            <div class="row">
                <?php
        if($jobs_by_list != 'empty'){
//            echo "<pre>";print_r($users_by_list);exit();
        foreach($jobs_by_list as $list){
            if(intval($list->list_id) > 0 && isset($list->job_id)){
                $job = GetJobTitle($list->job_id);
//                echo "<pre>";print_r($job);exit();
                 
        ?>
        <?php if(isset($job->j_id)){ ?>        
        <div class="col-md-4 col-xs-4">
            <div class="card">
            
            <a href="<?=base_url()?>job/<?=$job->j_id?>/<?php echo $job->j_slug?>">
                <div class="img" style="width: 100%;height: 200px;background:#ccc url('<?=base_url()?>/assets/uploads/jobs/<?=($job->j_image == "")?"noimage.png":$job->j_image ?>?v=1') center center;background-size: cover;"></div>
                <div class="card-body" style="font-size: 13px;">                    
                    <b><?=$job->j_title?></b>
                    <hr>                                        
                    <b><?=$job->j_location;?></b>  <span class="float-right"><b><?=date("M d-Y",$job->j_add_date)?></b></span>
                    <p>
                        <?=  substr(strip_tags($job->j_descr, '<>'), 0,200);?>                    
                    </p>
                    <p>
                        <button type="button" class="float-right btn btn-success m-2 p-1">View Detail</button>
                    </p>
                    
                </div>
            </a>
            </div>    
        </div> 
        <?php   
            }
        }
        }
        }else{?>
            
        <?php }
        ?>
            </div>
        </div>
<!--        <div class="col-md-2 col-xs-12">
            
        </div>-->
            
        <div class="col-md-2 col-xs-12">
            <div class="row mb-3 text-center">
                <div class="col-12">
                    <a href="<?=site_url('users_list/users_by_list/'.$list_id);?>" class="btn btn-primary mr-3">Matching Candidates</a>                   
                </div>
            </div>
            <div class="row mb-3 text-center">
                <div class="col-12">
                    <a href="<?=site_url('professionals');?>" class="btn btn-primary mr-3">Find More Candidates</a>                   
                </div>
            </div>
            <h5 class="text-center mb-3">Filter By List Name</h5>
            <div class="row">
              <?php
                if($list_users != 'empty'){
                foreach($list_users as $list){ ?>
                <div class="col-md-12 col-xs-12 mb-2 m-0"> 
                    <?php $count = GetCount($list->id); ?>
                    <?php $list_id==$list->id ? $list_title = $list->name : ''?>
                    <a href="<?=site_url('users_list/users_by_list/'.$list->id)?>" class="btn <?=$list_id==$list->id ? 'btn-secondary':'btn-outline-secondary';?> col-12"><?=$list->name?>  (<?=$count?>) </a>
                </div>
                <?php } }?>  
            </div>
        </div>
        
    </div>
</div>



<?php $this->load->view('include/footer'); ?>

