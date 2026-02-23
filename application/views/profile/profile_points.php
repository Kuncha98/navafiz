<style>
    .u_id a {
        color: black;
    }
    .u_id a:hover{
        color: #636464;
    }
</style>
<?php $this->load->view('include/header');
$job_p = 0 ; $other = 0;?>
<div class="container-mid">
    <h2 class="text-center mb-4 ">Recruitment Support Points - <?=$user[0]->m_name?></h2>
    <div class="row">
        <div class="col-12">
            <div class="">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                           <th>Title</th>
                           <th>Points</th>
                        </tr>
                    </thead>  
                    <tbody>
                    <?php if(!empty($points)){?>
                        <?php foreach($points as $row){
                            if(!empty($row->points_type)){
                                if($row->points_type == 'ProfileRecommendation' || $row->points_type == 'Blueuser'){ 
                                    if(isset($row->user_id)){
                                        $user = GetUserName($row->user_id);
                                            if(isset($user[0]->m_name)){
                                    ?>
                                     <tr>
                                        <td>                                    
                                            <p>
                                                <?php if($row->points_type == 'ProfileRecommendation'){
                                                        echo "Recommended Profile";
                                                }else if($row->points_type == 'Blueuser'){
                                                        echo "Added Blueuser";
                                                }
                                                ?> 
                                                <?php if($row->user_id>0){?>
                                                <a href="<?=site_url('n/'.$row->user_id);?>">
                                                    
                                                    <?= isset($user[0]->m_name) ? $user[0]->m_name : '' ?>
                                                </a>
                                                <?php }?> 
                                            </p>
                                        </td>
                                        <td><?= $row->user_points;?></td>
                                    </tr>
                                <?php 
                                
                                $other = $other + $row->user_points;
                                                } 
                                }
                            }
                                if(!empty($row->job_id) && isset($row->job_id)){
                                   $job = GetJobTitle($row->job_id);
                                   if(isset($job->j_title)){
                                ?>
                                <tr>
                                    <td>                                    
                                        <p>
                                            <?php if($row->points_type == 'Recommendation'){
                                                echo "Recommended";                                            
                                            }else if($row->points_type == 'Shortlist'){
                                                echo "Shortlisted";                                            
                                            }else if($row->points_type == 'MarkedInterviewed'){
                                                echo "Mark Interviewed ";
                                            }
                                            ?> 
                                            <?php if($row->user_id>0){?>
                                            <a href="<?=site_url('n/'.$row->user_id);?>">
                                                <?php $user = GetUserName($row->user_id); ?>
                                                <?= isset($user[0]->m_name) ? $user[0]->m_name : '' ?>
                                            </a>
                                            <?php }?> 
                                            <?php if(!empty($row->job_id)){ 
                                                echo "for";
                                            }?> 
                                            <?php if(!empty($row->job_id)){
                                                echo $row->job_id;
                                                ?>
                                            <a href="<?=site_url('job/'.$row->job_id);?>">
                                                <?php $job = GetJobTitle($row->job_id); echo $job->j_title; ?>
                                            </a>
                                            <?php }?>
                                        </p>
                                    </td>
                                    <td><?= $row->user_points;?></td>
                                </tr>
                            <?php
                            $job_p = $job_p + $row->user_points;
                                }
                            }        
                            $total = $job_p + $other;
                        } 
                        
                        }
                    }else{?>
                        <?php echo "This User Have <strong>0</strong> Points"; 
                    }?>
                    </tbody>
                    <thead>
                        <th>Total</th>
                        <th><?php if($total > 0){
                            echo $total;                            
                        }else{echo 0;} 
                        ?>
                        </th>
                    </thead>                   
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer');?>