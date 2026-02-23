<?php $this->load->view('include/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>Job Portals</h2>
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">
                    <b>Navafiz:</b>  <a href="<?=isset($user_job_portal->navafiz) ? $user_job_portal->navafiz:'';?>" target="_blank"><?=isset($user_job_portal->navafiz) ? $user_job_portal->navafiz:'';?></a>
                </li>
                <li class="list-group-item list-group-item-secondary">
                    <b>Bayt:</b>  <a href="<?=isset($user_job_portal->bayt) ? $user_job_portal->bayt:'';?>" target="_blank"><?=isset($user_job_portal->bayt) ? $user_job_portal->bayt:'';?></a>
                </li>
                <li class="list-group-item list-group-item-info">
                    <b>Monster Gulf:</b>  <a href="<?=isset($user_job_portal->gulftalent) ? $user_job_portal->gulftalent:'';?>" target="_blank"><?=isset($user_job_portal->gulftalent) ? $user_job_portal->gulftalent:'';?></a>
                </li>
                <li class="list-group-item list-group-item-danger">
                    <b>Gulf Talent:</b>  <a href="<?=isset($user_job_portal->gulftalent) ? $user_job_portal->gulftalent:'';?>" target="_blank"><?=isset($user_job_portal->gulftalent) ? $user_job_portal->gulftalent:'';?></a>
                </li>
                <li class="list-group-item list-group-item-success">
                    <b>Naukri Gulf:</b>  <a href="<?=isset($user_job_portal->naukrigulf) ? $user_job_portal->naukrigulf:'';?>" target="_blank"><?=isset($user_job_portal->naukrigulf) ? $user_job_portal->naukrigulf:'';?></a>
                </li>
                <li class="list-group-item list-group-item-warning">
                    <b>Dubizzle:</b>  <a href="<?=isset($user_job_portal->dubizzle) ? $user_job_portal->dubizzle:'';?>" target="_blank"><?=isset($user_job_portal->dubizzle) ? $user_job_portal->dubizzle:'';?></a>
                </li>
                <li class="list-group-item list-group-item-danger">
                    <b>Indeed:</b>  <a href="<?=isset($user_job_portal->indeed) ? $user_job_portal->indeed:'';?>" target="_blank"><?=isset($user_job_portal->indeed) ? $user_job_portal->indeed:'';?></a>
                </li>
                <li class="list-group-item list-group-item-primary">
                    <b>Rigzone (World Wide Worker):</b>  <a href="<?=isset($user_job_portal->worldwideworker) ? $user_job_portal->worldwideworker:'';?>" target="_blank"><?=isset($user_job_portal->worldwideworker) ? $user_job_portal->worldwideworker:'';?></a>
                </li>
                <li class="list-group-item list-group-item-dark">
                    <b>Goto Gulf:</b>  <a href="<?=isset($user_job_portal->gotogulf) ? $user_job_portal->gotogulf:'';?>" target="_blank"><?=isset($user_job_portal->gotogulf) ? $user_job_portal->gotogulf:'';?></a>
                </li>
                <li class="list-group-item list-group-item-info">
                    <b>Buzz On (Khaleej Times):</b>  <a href="<?=isset($user_job_portal->khaleejtimes) ? $user_job_portal->khaleejtimes:'';?>" target="_blank"><?=isset($user_job_portal->khaleejtimes) ? $user_job_portal->khaleejtimes:'';?></a>
                </li>
            </ul>
            
            
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 m-t-20" style="margin-top: 30px;">
            <a href="<?=site_url('job_portals/index/'.$user_id)?>" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">Update Job Portals</a>
        </div>
        
        <div class="col-md-12 col-sm-12 col-xs-12 m-t-20" style="margin-top: 30px;">
            <a href="<?=site_url('track_steps/sheet/'.$user_id)?>" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">Tracking Sheet</a>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>