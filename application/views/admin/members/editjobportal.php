
<style>
    .add_jobportals small{
        color: #9c9c9c;
    }
</style>
<div class="container">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12  add_jobportals">
         
            <form action="<?=base_url('admin/members/update_job_portal/')?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                     <div class="form-group">
                        <label>Navafiz</label>
                        <input type="url" placeholder="Add Your Profile Link Here" class="form-control" name="navafiz" value="<?=isset($user_job_portal->navafiz) ? $user_job_portal->navafiz:'';?>" >
                        <small><a href="https://navafiz.com" target="_blank">https://navafiz.com</a></small>
                     </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Bayt</label>
                        <input type="url" placeholder="Add Your Profile Link Here" class="form-control" name="bayt_link" value="<?=isset($user_job_portal->bayt) ? $user_job_portal->bayt:'';?>" >                        
                        <small><a href="https://www.bayt.com" target="_blank">https://www.bayt.com</a></small>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                   <div class="form-group">
                        <label>Monster Gulf</label>
                        <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="monstergulf" value="<?=isset($user_job_portal->monstergulf) ? $user_job_portal->monstergulf:'';?>" >
                        <small><a href="https://www.monstergulf.com" target="_blank">https://www.monstergulf.com</a></small>
                   </div>
                    </div>
                    <div class="col-md-6">
                   <div class="form-group">
                    <label>Gulf Talent</label>
                    <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="gulftalent" value="<?=isset($user_job_portal->gulftalent) ? $user_job_portal->gulftalent:'';?>" >
                    <small><a href="https://www.gulftalent.com" target="_blank">https://www.gulftalent.com</a></small>
                   </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                   <div class="form-group">
                    <label>Naukri Gulf</label>
                    <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="naukrigulf" value="<?=isset($user_job_portal->naukrigulf) ? $user_job_portal->naukrigulf:'';?>" >
                    <small><a href="https://www.naukrigulf.com" target="_blank">https://www.naukrigulf.com</a></small>
                   </div> 
                  </div>
                   <div class="col-md-6">
                   <div class="form-group">
                    <label>Dubizzle</label>
                    <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="dubizzle" value="<?=isset($user_job_portal->dubizzle) ? $user_job_portal->dubizzle:'';?>" >
                    <small><a href="https://www.dubizzle.com" target="_blank">https://www.dubizzle.com</a></small>                        
                   </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Indeed</label>
                        <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="indeed" value="<?=isset($user_job_portal->indeed) ? $user_job_portal->indeed:'';?>" >
                        <small><a href="https://www.indeed.ae" target="_blank">https://www.indeed.ae</a></small>
                    </div>  
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Rigzone (World Wide Worker)</label>
                        <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="worldwideworker" value="<?=isset($user_job_portal->worldwideworker) ? $user_job_portal->worldwideworker:'';?>" >
                        <small><a href="https://www.rigzone.com" target="_blank">https://www.rigzone.com</a></small>
                    </div>  
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Goto Gulf</label>
                    <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="gotogulf" value="<?=isset($user_job_portal->gotogulf) ? $user_job_portal->gotogulf:'';?>" >
                    <small><a href="https://gotogulf.com" target="_blank">https://gotogulf.com</a></small>
                    </div> 
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Buzz On (Khaleej Times)</label>
                    <input type="url" placeholder="Add Your Profile Link Here" class="form-control" name="khaleejtimes" value="<?=isset($user_job_portal->khaleejtimes) ? $user_job_portal->khaleejtimes:'';?>">
                    <small><a href="https://buzzon.khaleejtimes.com" target="_blank">https://buzzon.khaleejtimes.com</a></small>
                    </div> 
                    </div>
                </div>
                
                 <input type="hidden" name="is_post" value="1">
                <input type="hidden" name="user_id" value="<?=$user_id?>">
                <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Save</button>
            </form>
        </div>
    </div>
</div>
