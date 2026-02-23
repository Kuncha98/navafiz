<?php
//print_r($profile);
//exit();
?>
<div class="container mt-5">
    
    <div class="row mb-5">
        
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <img class="rounded-circle mb-3" style="height: 93px;" src="<?=site_url('assets/uploads/members/'.$profile->m_avatar)?>">
            </div>    
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                 <b>
                    <?=$profile->m_name?>
                    <br />
                    <?php if($profile->role_id>0){?>
                    (<?= GetRoleName($profile->role_id);?>)
                    <?php }?>
                    <br />
                    <?=$profile->m_profession?>
                    <br />
                    <?=($profile->m_current_city == "")? "---":$profile->m_current_city?>
                    <br />
                    <hr>
                </b>
                    <div class="profile_views">
                        <i>Profile Views </i> <small><i class="fas fa-eye"></i></small> <i><b><?= $profile->m_profile_view;?></b></i>
                    </div>
                    <hr>        
                    <i>Recommendations </i> <i><b>(<?=count($recommand_list)?>)</b></i>    
                </div>
                
                    
                        
                     
            </div>    
        </div>
        
    </div>
    
<div class="row">
                <div class="col-md-12">
                    <div class="card profile">
                        <div class="card-body">
                            <div class="wow fadeInDown">
                                <div style="text-align: justify;">
                                    <h3 class="text-center">
                                       Summary of Career                  
                                    <!--<a href="<?=site_url('summary-career');?>" style="vertical-align: inherit;" class="btn btn-white btn-xs text-center" title="Edit Summary of Career"><i class="fas fa-edit mt-0" style="font-size: 16px;"></i></a>-->

                                     </h3>
                                     <p>
                                        <?php if(!empty($summary_points->point_1)){?>     
                                        1. <?=isset($summary_points->point_1)? $summary_points->point_1:'';?>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_2)){?>     
                                        2. <?=isset($summary_points->point_2)? $summary_points->point_2:'';?>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_3)){?>     
                                        3. <?=isset($summary_points->point_3)? $summary_points->point_3:'';?>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_4)){?>     
                                        4. <?=isset($summary_points->point_4)? $summary_points->point_4:'';?>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_5)){?>     
                                        5. <?=isset($summary_points->point_5)? $summary_points->point_5:'';?>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_6)){?>     
                                        6. <?=isset($summary_points->point_6)? $summary_points->point_6:'';?>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_7)){?>     
                                        7. <?=isset($summary_points->point_7)? $summary_points->point_7:'';?>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_8)){?>     
                                        8. <?=isset($summary_points->point_8)? $summary_points->point_8:'';?>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_9)){?>     
                                        9. <?=isset($summary_points->point_9)? $summary_points->point_9:'';?>
                                        <hr>
                                        <?php }?>
                                        <?php if(!empty($summary_points->point_10)){?>     
                                        10. <?=isset($summary_points->point_10)? $summary_points->point_10:'';?>
                                        <hr>
                                        <?php }?>                                        
                                    </p>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
    <?php if($ach_results){?>
    <div class="row mt-5">                   
                <div class="col-md-12">
                    <h3 class="wow fadeInDown text-center" style="padding-top: 25px;"> 
                        Achievements
                        </h3>
                    
                    <?php foreach($ach_results as $ach_results){ ?>
                    <div class="card" style="margin-bottom: 15px;">
                        <div class="card-header">
                            <b><?=$ach_results->title;?></b>  
                                                         
                        </div>
                        <div class="card-body">                            
                            <?=($ach_results->description == "")? "---": $ach_results->description;?> 
                            <br />
                            
                        </div>                        
                    </div>                    
                    <?php }?>                
                </div>
    </div>
    <?php } ?>
    
    <div class="row">
                <div class="col-md-12 col-sm-12 col-12">                    
                    <h3 class="wow fadeInDown text-center" style="padding-top: 25px;">
                        Work Experience (Employment History)  
                        
                    </h3>
                    <?php foreach($employment_history as $emp_history){?>                    
                    <div class="card" style="margin-bottom: 15px;">                        
                        <div class="card-body">
                            <p class="text-center">
                                Experience as <b><?=$emp_history->position_designation?></b>
                            </p>
                            <ul class="list-unstyled profile-about" style="list-style: none !important;">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">Employer</span> </div>
                                        <div class="col-sm-8">
                                            <?php
                                            $company_name = GetCompanyName(intval($emp_history->company_name));
                                            $company_id = GetCompanyName(intval($emp_history->company_id)); 
                                            ?>                       
                                             <?= !empty($company_name) ? $company_name : $company_id  ;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">From</span> </div>
										<div class="col-sm-8"><?=DateFormat($emp_history->start_year);?></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">To</span> </div>
										<div class="col-sm-8"><?=DateFormat($emp_history->end_year);?></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">Detail</span> </div>
                                        <div class="col-sm-8"><?=nl2br($emp_history->description);?></div>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>                        
                    </div>
                    <?php }?> 
                </div>
            </div>
    
    
    
    
    <div class="row">                   
                <div class="col-md-12">
                    <h3 class="wow fadeInDown text-center" style="padding-top: 25px;"> 
                        Academic Qualification
                    </h3>
                    <?php
                    if($edu_results){?>
                    <?php foreach($edu_results as $edu_result){ ?>
                    <div class="card" style="margin-bottom: 15px;">                        
                        <div class="card-body">                            
                            <p class="text-center">
                                <b><?=$edu_result->me_degree;?></b>  
                                <?=date('d F Y', strtotime($edu_result->me_year));?>
                            </p>
                            <?=($edu_result->me_descr == "")? "---": $edu_result->me_descr;?> 
                            <br />
                           
                        </div>                        
                    </div>                    
                    <?php }?>
                <?php }?>
                </div>
    </div>
    <div class="row">
                <div class="col-md-12 col-sm-12 col-12">                    
                    <h5 class="wow fadeInDown text-center" style="padding-top: 25px;">
                                  Certifications  
                        
                    </h5>
                    <?php foreach($certifications as $certificate){?>                    
                    <div class="card" style="margin-bottom: 15px;">                        
                        <div class="card-body">
                            <p class="text-center">
                                <b><?=$certificate->c_title?></b>
                            </p>
                            <ul class="list-unstyled profile-about" style="list-style: none !important;">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">Duration</span> </div>
                                        <div class="col-sm-8">                      
                                             <?=$certificate->c_duration?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">Description</span> </div>
					<div class="col-sm-8"><?=$certificate->c_description?></div>
                                    </div>
                                </li>
                            </ul>
                        </div>                        
                    </div>
                    <?php }?> 
                </div>
    </div>
    
    
</div>