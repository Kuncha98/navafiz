<?php $this->load->view('include/header'); ?>
<style>
    .add_jobportals small{
        color: #9c9c9c;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12  add_jobportals">
            <h2>Recruiters</h2>
            <p>
                UAE  has more than its fair share of recruitment companies and consultants. <br />
                Some of these have an exemplary reputation, with many years of experience in the UAE and Middle East job market. <br />
                As per UAE labor law, it is illegal for a recruitment agency to charge any type of fee for finding you a job; recruiters typically get their commission from the employer and not the employee. It is also illegal for an agency to ask you to pay for your visa, which is the employer’s responsibility.
            </p>
            <form action="<?=base_url('recruiters/index/'.$user_id)?>" method="post">                
                <div class="form-group">
                    <label>1. Hays</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="hays" value="<?=isset($user_job_portal->hays) ? $user_job_portal->hays:'';?>" >
                    <small><a href="http://www.hays.ae" target="_blank">http://www.hays.ae/</a></small>
                </div>
                <div class="form-group">
                    <label>2. NADIA</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="nadia" value="<?=isset($user_job_portal->nadia) ? $user_job_portal->nadia:'';?>" >
                    <small><a href="https://nadia-me.com/" target="_blank">https://nadia-me.com/</a></small>
                </div>
                <div class="form-group">
                    <label>3. BAC Middle East</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="bac" value="<?=isset($user_job_portal->bac) ? $user_job_portal->bac:'';?>" >
                    <small><a href="https://www.bacme.com/" target="_blank">https://www.bacme.com/</a></small>
                </div>
                <div class="form-group">
                    <label>4. Charterhouse</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="charterhouse" value="<?=isset($user_job_portal->charterhouse) ? $user_job_portal->charterhouse:'';?>" >
                    <small><a href="https://www.charterhouseme.ae/" target="_blank">https://www.charterhouseme.ae/</a></small>                        
                </div>
                <div class="form-group">
                    <label>5. Michael Page</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="michael_page" value="<?=isset($user_job_portal->michael_page) ? $user_job_portal->michael_page:'';?>" >
                    <small><a href="https://www.michaelpage.ae/" target="_blank">https://www.michaelpage.ae/</a></small>
                </div>
                <div class="form-group">
                    <label>6. Experts Recruitment</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="expertsrecruitment" value="<?=isset($user_job_portal->expertsrecruitment) ? $user_job_portal->expertsrecruitment:'';?>" >
                    <small><a href="http://www.expertsrecruitment.com/" target="_blank">http://www.expertsrecruitment.com/</a></small>
                </div>
                <div class="form-group">
                    <label>7. Abcrec Ruitment</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="abcrecruitment" value="<?=isset($user_job_portal->abcrecruitment) ? $user_job_portal->abcrecruitment:'';?>" >
                    <small><a href="http://www.abcrecruitment.ae/" target="_blank">http://www.abcrecruitment.ae/</a></small>
                </div>
                <div class="form-group">
                    <label>8. Roberthalf</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="roberthalf" value="<?=isset($user_job_portal->roberthalf) ? $user_job_portal->roberthalf:'';?>" >
                    <small><a href="https://www.roberthalf.ae/" target="_blank">https://www.roberthalf.ae/</a></small>
                </div>
                <div class="form-group">
                    <label>9. Gulf Recruiter</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="gulfrecruiter" value="<?=isset($user_job_portal->gulfrecruiter) ? $user_job_portal->gulfrecruiter:'';?>" >
                    <small><a href="https://gulfrecruiter.com/" target="_blank">https://gulfrecruiter.com/</a></small>
                </div>
                <div class="form-group">
                    <label>10. Tascout Sourcing</label>
                    <input type="text" placeholder="Add Details here" class="form-control" name="tascoutsourcing" value="<?=isset($user_job_portal->tascoutsourcing) ? $user_job_portal->tascoutsourcing:'';?>" >
                    <small><a href="https://www.tascoutsourcing.com/" target="_blank">https://www.tascoutsourcing.com/</a></small>
                </div>
                
                
                
                
            
        
                
                
                <input type="hidden" name="is_post" value="1">
                <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Save</button>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>