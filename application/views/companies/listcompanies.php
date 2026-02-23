<?php $session_user_id = $this->session->userdata('user_id');?>
    <?php if($companies !='empty' ) {
        foreach(@$companies as $company){ ?>
            <div class="col-md-4 co-xs-12">
                <div class="card" style="padding: 20px;">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?=base_url()?><?=$company->co_logo?>" class="col-md-12 col-xs-12"> 
                        </div>
                        <div class="col-md-8">
                            <a href="<?=site_url('companies/company_detail/'.$company->co_id)?>">
                                <b><?=$company->co_name?></b>
                            </a> 
                            <p>
                                <strong>Category :</strong> <?=($company->c_name != "")? $company->c_name : "" ?>
                            </p>
                            <p>
                                <?php $tags_arr = explode(",",$company->co_tags); ?>
                            </p>
                        </div>                          
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">                            
                            <p>
                                Address:
                                <hr>
                                <?=$company->co_address?>
                            </p>
                            <p>
                                Phone:
                                <hr>
                                <?=($company->co_phone != "")? $company->co_phone : "" ?>
                            </p>
                            <p>
                                Mobile:
                                <hr>
                                <?=($company->co_mobile != "")? $company->co_mobile : "" ?>
                            </p>
                            <p>
                                Fax:
                                <hr>
                                <?=($company->co_fax != "")? $company->co_fax : " " ?>
                            </p>
                            <p>
                                City:
                                <hr>
                                <?=($company->city != "")? $company->city : " " ?>
                            </p>
                            <p>
                                Website:
                                <hr>
                                <?=($company->co_website != "")? $company->co_website : "" ?>
                            </p>
                            <p>
                                Email:
                                <hr>
                                <?=($company->co_email != "")? $company->co_email : "" ?>
                            </p>
                            <p>
                                Tags:
                                <hr>
                                <?php
                                for($a=0;$a<count($tags_arr); $a++){?>                    
                                <span><?php echo $tags_arr[$a] ?></span> 
                                <?php }?>
                            </p>
                            <p>
                                
                            </p>
                            <p class="bio">
                                <?php $career_link = !empty($company->co_career_page) ? $company->co_career_page : $company->co_website; ?>
                                <?php $edit_team_list = array_merge(CvReviewTeamList(),  TempTeamList());?>
                                <?php if(in_array($session_user_id, $edit_team_list)){?>
                                Added on: 
                                <?=date('d-M-Y - h:i a', strtotime($company->company_added_on));?>                                    
                                <hr>
                                <a href="<?=site_url('companies/edit/'.$company->co_id)?>" class="btn btn-primary"> Edit</a>
                                <?php }?>
                                <a href="<?=site_url('companies/apply/'.$company->co_id);?>" class="btn btn-primary float-right" target="_blank" rel="nofollow"> Apply </a>
                            </p>
                        </div>
                    </div>
              </div>
            </div>
            <?php }
            } else{ ?>
                <div role="alert" class="alert alert-danger alert-dismissible">
                    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                    <strong></strong> - No data exits! 
                </div>
            <?php }?>