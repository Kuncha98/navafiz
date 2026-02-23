
<style>
    .company-img img{
        width: 350px;
    }
</style>




<div class="col-md-12 mx-auto"><h2 class="text-center">Search Results For "<?=$search_keyword?>"</h2></div>
        <div class="col-md-12 mx-auto"><h2 class="text-center"><?php echo $title ?> (<?=count($jobs)?>)</h2></div>
        <?php    
if($jobs!='empty') {        
    foreach(@$jobs as $job){ 
//        echo $job->job_reference_by;exit();
        if(isset($job->j_country_id)){
            $country = getCountryById($job->j_country_id);
        }
        if(isset($job->cat_id)){
            $category = getCatgoryById($job->cat_id);
        }
        if(isset($job->j_addedby) && intval($job->j_addedby) > 0){
           
            $added_b = GetUserName($job->j_addedby);
            
        }
        if(isset($job->job_reference_by) && intval($job->job_reference_by) > 0){
             
//            $ref_by = GetUserName($job->job_reference_by);
        }
        print_r($job->job_reference_by);exit();
//        print_r($added_by);exit();
        ?>
        <div class="col-md-4 col-xs-4">
            <a href="<?= site_url('job/'.$job->j_id)?>" style="color:#000">
                <div class="card">
                    <div class="card-header">
                        <h4><?=$job->j_title?> </h4>
                        <?php if($job->j_status==2){?>
                            <span class="btn btn-danger float-right">Job is closed</span>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                    <?php if($job->j_image != ""){?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="company-img"> <img src="<?=base_url()?>/assets/uploads/jobs/<?=$job->j_image?>" alt="<?=$job->j_title?>"> </div>
                            </div>
                            <p>&nbsp;</p>
                            <?php }?>
                            <p><b>Job Description:</b></p>
                            <p><?= link_it(nl2br($job->j_descr));?></p>
                            <div class="row">
                            <div class="col-md-6 col-xs-12"><b>Job Category:</b> <?= isset($category->c_name) ? $category->c_name : '' ?></div>
                            <div class="col-md-6 col-xs-12"><b>Job Country:</b> <?= isset($country->country) ;?></div>
                            <div class="col-md-6 col-xs-12"><b>Job State:</b> <?=$job->j_state;?></div>
                            <div class="col-md-6 col-xs-12"><b>Job City:</b> <?=$job->j_location;?></div>
                            <div class="col-md-6 col-xs-12"><b>Company:</b> <?=($job->j_company == "") ? "---" : $job->j_company?></div>
                            <div class="col-md-6 col-xs-12"><b>Email for apply:</b> <?=($job->j_email_apply == "")? "---" : $job->j_email_apply?></div>
                            <div class="col-md-6 col-xs-12"><b>Posted On:</b> <?=date("M d, Y",$job->j_add_date)?></div>
                            <div class="col-md-6 col-xs-12"><b>Job Added By:</b> <?= isset($added_b[0]->m_name) ? $added_b[0]->m_name : '' ;?></div>
                            <div class="col-md-6 col-xs-12"><b>Job Reference By:</b> <?=isset($ref_by[0]->m_name) ? $ref_by[0]->m_name : '';?></div>
                            <div class="col-md-6 col-xs-12"><b>Job Views:</b> <?=$job->views?></div>
                        </div>
                    </div>
                </div>   
            </a>
            
        </div>
        
    <?php } }else{?>
        <div role="alert" class="alert alert-danger alert-dismissible">
            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            <strong></strong> - No data exits! 
      </div>
<?php }?>