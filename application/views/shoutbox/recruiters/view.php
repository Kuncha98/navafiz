<?php $this->load->view('include/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>Recruiters</h2>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">
                    <b>1. Hays:</b>  <a href="<?=isset($user_job_portal->hays) ? $user_job_portal->hays:'';?>" target="_blank"><?=isset($user_job_portal->hays) ? $user_job_portal->hays:'';?></a>
                </li>
                <li class="list-group-item list-group-item-danger">
                    <b>2. NADIA:</b>  <a href="<?=isset($user_job_portal->nadia) ? $user_job_portal->nadia:'';?>" target="_blank"><?=isset($user_job_portal->nadia) ? $user_job_portal->nadia:'';?></a>
                </li>
                <li class="list-group-item list-group-item-success">
                    <b>3. BAC Middle East:</b>  <a href="<?=isset($user_job_portal->bac) ? $user_job_portal->bac:'';?>" target="_blank"><?=isset($user_job_portal->bac) ? $user_job_portal->bac:'';?></a>
                </li>
                <li class="list-group-item list-group-item-warning">
                    <b>4. Charterhouse:</b>  <a href="<?=isset($user_job_portal->charterhouse) ? $user_job_portal->charterhouse:'';?>" target="_blank"><?=isset($user_job_portal->charterhouse) ? $user_job_portal->charterhouse:'';?></a>
                </li>
                <li class="list-group-item list-group-item-danger">
                    <b>5. Michael Page:</b>  <a href="<?=isset($user_job_portal->michael_page) ? $user_job_portal->michael_page:'';?>" target="_blank"><?=isset($user_job_portal->michael_page) ? $user_job_portal->michael_page:'';?></a>
                </li>
                <li class="list-group-item group-item-warning">
                    <b>6. Experts Recruitment:</b>  <a href="<?=isset($user_job_portal->expertsrecruitment) ? $user_job_portal->expertsrecruitment:'';?>" target="_blank"><?=isset($user_job_portal->expertsrecruitment) ? $user_job_portal->expertsrecruitment:'';?></a>
                </li>
                <li class="list-group-item list-group-item-danger">
                    <b>7. Abcrec Ruitment:</b>  <a href="<?=isset($user_job_portal->abcrecruitment) ? $user_job_portal->abcrecruitment:'';?>" target="_blank"><?=isset($user_job_portal->abcrecruitment) ? $user_job_portal->abcrecruitment:'';?></a>
                </li>
                <li class="list-group-item list-group-item-primary">
                    <b>8. Roberthalf:</b>  <a href="<?=isset($user_job_portal->roberthalf) ? $user_job_portal->roberthalf:'';?>" target="_blank"><?=isset($user_job_portal->roberthalf) ? $user_job_portal->roberthalf:'';?></a>
                </li>
                <li class="list-group-item list-group-item-dark">
                    <b>9. Gulf Recruiter:</b>  <a href="<?=isset($user_job_portal->gulfrecruiter) ? $user_job_portal->gulfrecruiter:'';?>" target="_blank"><?=isset($user_job_portal->gulfrecruiter) ? $user_job_portal->gulfrecruiter:'';?></a>
                </li>
                <li class="list-group-item list-group-item-info">
                    <b>10. Tascout Sourcing:</b>  <a href="<?=isset($user_job_portal->tascoutsourcing) ? $user_job_portal->tascoutsourcing:'';?>" target="_blank"><?=isset($user_job_portal->tascoutsourcing) ? $user_job_portal->tascoutsourcing:'';?></a>
                </li>
            </ul>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 m-t-20" style="margin-top: 30px;">
            <a href="<?=site_url('recruiters/index/'.$user_id)?>" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">Update Recruiters</a>
        </div>
        
        <div class="col-md-12 col-sm-12 col-xs-12 m-t-20" style="margin-top: 30px;">
            <a href="<?=site_url('track_steps/sheet/'.$user_id)?>" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">Tracking Sheet</a>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>