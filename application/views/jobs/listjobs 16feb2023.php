<?php 
$session_user_id = $this->session->userdata('user_id');
?>
<style>
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
    .card{
        margin-bottom: 30px;
        position: relative;
    }
</style>

<?php if($jobs!='empty') {
    foreach(@$jobs as $job){ ?>
    <div class="col-md-4">        
        <div class="card"> 
            <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                <!--<a href="<?=site_url('jobs/delete/'.$job->j_id);?>" style="position: absolute;right: -10px;top: -26px;font-weight: bold;font-size: 30px;" onclick="return confirm('Are you sure you want to delete this?')">X</a>-->
            <?php }?>
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
<?php }}?>    
<div class="pagination-box">
    <?php echo($paging_link);?>            
 </div>
    


