<?php 
$this->load->view('include/header'); 
$session_user_id = $this->session->userdata('user_id');

?>
<div class="container">
    
    <div class="row">
        <div class="col-md-12 col-xs-12">                              
            <?php $this->load->view('notification/notification-messages');?>
            <form action="<?=base_url('UpdateProfile')?>" id="memberpage" method="post">
                <?php if(in_array($session_user_id, CvReviewTeamList())){ ?>
                <div class="card" style="margin-bottom: 30px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 mx-auto">
                                <div class="form-group">
                                    <?php echo GetRoleName($profile->role_id);?>
                                    <label>Team Role</label>
                                    <select class="select-category form-control" name="role_id">
                                        <option value="0">Select Role</option>
                                        <?php foreach (GetUsersRoles() as $roles){?>
                                        <option <?=$profile->role_id==$roles->role_id ? 'selected=""':'';?> value="<?=$roles->role_id?>"><?=$roles->role_name?></option>
                                        <?php }?>                                        
                                    </select>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>    
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" placeholder="" class="form-control" id="profname" name="m_name" value="<?=$profile->m_name?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="" class="form-control" value="<?=$profile->m_email?>" disabled>
                        </div>
                    </div>
                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="select-category form-control" id="gender" name="gender">
                                <option value="male" <?=($profile->gender == "male")? "selected" : ""?>> Male </option>
                                <option value="female" <?=($profile->gender == "female")? "selected" : ""?>> Female </option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Industry<span class="required">*</span></label>
                          <select class="select-category form-control" name="m_category">
                            <option value="">Select Industry</option>
                            <?php
                            if($categories != "empty"){                            
                                foreach($categories as $category){?>
                                    <option value="<?=$category->c_id?>" <?=($category->c_id == $profile->m_category)? "selected" : ""?>>
                                    <?=$category->c_name?>
                                    </option>
                            <?php } }?>
                          </select>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Industry 1<span class="required">*</span></label>
                          <select class="select-category form-control" name="industry1">
                            <option value="">Select Industry</option>
                            <?php
                            if($categories != "empty"){                            
                                foreach($categories as $category){?>
                                    <option value="<?=$category->c_id?>" <?=($category->c_id == $profile->industry1)? "selected" : ""?>>
                                    <?=$category->c_name?>
                                    </option>
                            <?php } }?>
                          </select>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Industry 2<span class="required">*</span></label>
                          <select class="select-category form-control" name="industry2">
                            <option value="">Select Industry</option>
                            <?php
                            if($categories != "empty"){                            
                                foreach($categories as $category){?>
                                    <option value="<?=$category->c_id?>" <?=($category->c_id == $profile->industry2)? "selected" : ""?>>
                                    <?=$category->c_name?>
                                    </option>
                            <?php } }?>
                          </select>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Profession</label>
                          <input type="text" placeholder="" class="form-control" name="m_profession" value="<?=$profile->m_profession?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Experience</label>
                          <select class="select-category form-control" id="experience" name="m_experience">
                            <option <?=($profile->m_experience == "Fresh")? "selected" : ""?>> Fresh </option>
                            <option <?=($profile->m_experience == "1 Years")? "selected" : ""?>> 1 Years </option>
                            <option <?=($profile->m_experience == "2 Years")? "selected" : ""?>> 2 Years </option>
                            <option <?=($profile->m_experience == "3 Years")? "selected" : ""?>> 3 Years </option>
                            <option <?=($profile->m_experience == "4 Years")? "selected" : ""?>> 4 Years </option>
                            <option <?=($profile->m_experience == "5 Years")? "selected" : ""?>> 5 Years </option>
                            <option <?=($profile->m_experience == "6 Years")? "selected" : ""?>> 6 Years </option>
                            <option <?=($profile->m_experience == "7 Years")? "selected" : ""?>> 7 Years </option>
                            <option <?=($profile->m_experience == "8 Years")? "selected" : ""?>> 8 Years </option>
                            <option <?=($profile->m_experience == "9 Years")? "selected" : ""?>> 9 Years </option>
                            <option <?=($profile->m_experience == "10 Years")? "selected" : ""?>> 10 Years </option>
                            <option <?=($profile->m_experience == "11 Years")? "selected" : ""?>> 11 Years </option>
                            <option <?=($profile->m_experience == "12 Years")? "selected" : ""?>> 12 Years </option>
                            <option <?=($profile->m_experience == "13 Years")? "selected" : ""?>> 13 Years </option>
                            <option <?=($profile->m_experience == "14 Years")? "selected" : ""?>> 14 Years </option>
                            <option <?=($profile->m_experience == "15 Years")? "selected" : ""?>> 15 Years </option>
                            <option <?=($profile->m_experience == "More than 15 Years")? "selected" : ""?>> More than 15 Years </option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>U.A.E Experience</label>
                          <select class="select-category form-control" id="experience" name="uae_experience">
                            <option <?=($profile->uae_experience == "Fresh")? "selected" : ""?>> Fresh </option>
                            <option <?=($profile->uae_experience == "1 Years")? "selected" : ""?>> 1 Years </option>
                            <option <?=($profile->uae_experience == "2 Years")? "selected" : ""?>> 2 Years </option>
                            <option <?=($profile->uae_experience == "3 Years")? "selected" : ""?>> 3 Years </option>
                            <option <?=($profile->uae_experience == "4 Years")? "selected" : ""?>> 4 Years </option>
                            <option <?=($profile->uae_experience == "5 Years")? "selected" : ""?>> 5 Years </option>
                            <option <?=($profile->uae_experience == "6 Years")? "selected" : ""?>> 6 Years </option>
                            <option <?=($profile->uae_experience == "7 Years")? "selected" : ""?>> 7 Years </option>
                            <option <?=($profile->uae_experience == "8 Years")? "selected" : ""?>> 8 Years </option>
                            <option <?=($profile->uae_experience == "9 Years")? "selected" : ""?>> 9 Years </option>
                            <option <?=($profile->uae_experience == "10 Years")? "selected" : ""?>> 10 Years </option>
                            <option <?=($profile->uae_experience == "11 Years")? "selected" : ""?>> 11 Years </option>
                            <option <?=($profile->uae_experience == "12 Years")? "selected" : ""?>> 12 Years </option>
                            <option <?=($profile->uae_experience == "13 Years")? "selected" : ""?>> 13 Years </option>
                            <option <?=($profile->uae_experience == "14 Years")? "selected" : ""?>> 14 Years </option>
                            <option <?=($profile->uae_experience == "15 Years")? "selected" : ""?>> 15 Years </option>
                            <option <?=($profile->uae_experience == "More than 15 Years")? "selected" : ""?>> More than 15 Years </option>
                          </select>
                        </div>
                    </div>
                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Current Employer</label>
                          <input type="text" placeholder="" class="form-control" name="m_employer" value="<?=$profile->m_employer?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Employment status</label>
                          <select class="select-category form-control" id="employment_status" name="employment_status">
                            <option value="employed" <?=($profile->employment_status == "employed")? "selected" : ""?>> Employed </option>
                            <option value="unemployed" <?=($profile->employment_status == "unemployed")? "selected" : ""?>> Un employed </option>
                            <option value="contract" <?=($profile->employment_status == "contract")? "selected" : ""?>> Contract </option>
                            <option value="others" <?=($profile->employment_status == "others")? "selected" : ""?>> Others </option>
                          </select>
                        </div>
                  </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Nationality</label>
                          <input type="text" placeholder="" class="form-control" name="m_nationality" value="<?=$profile->m_nationality?>">
                        </div>
                    </div>                    
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Home Country</label>
                          <select id="country_id" name="country_id" class="select-category form-control">
                            <?php
                                $flag = "";
                                if($countries != "empty"){
                                    foreach($countries as $country){
                                        if($country->id == $profile->country_id)
                                            $flag = $country->alpha_2;
                                     ?>
                                <option value="<?=$country->id?>" <?=($country->id == $profile->country_id)? "selected" :""?>>
                                <?=$country->country?>
                            <?php } }?>
                          </select>
                        </div>
                    </div>
                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Home City</label>
                          <input type="text" placeholder="" class="form-control" id="location" name="m_city" value="<?=$profile->m_city?>">
                        </div>
                    </div>                    
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" placeholder="" class="form-control" id="phone" name="m_phone" value="<?=$profile->m_phone?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>City of Job Preference</label>
                          <input type="text" placeholder="" class="form-control" name="m_job_preference" value="<?=$profile->m_job_preference?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Visa status  (<?php echo $profile->visa_status;?>)</label>
                          <select class="select-category form-control" id="visa_status" name="visa_status">
                            <option value="Not Applicable" <?=($profile->visa_status == "Not Applicable")? "selected" : ""?>>Not Applicable</option>
                            <option value="Employment Visa in UAE" <?=($profile->visa_status == "Employment Visa in UAE")? "selected" : ""?>>Employment Visa in UAE</option>
                            <option value="Visit Visa in UAE" <?=($profile->visa_status == "Visit Visa in UAE")? "selected" : ""?>>Visit Visa in UAE</option>
                            <option value="On Spouse Visa" <?=($profile->visa_status == "On Spouse Visa")? "selected" : ""?>>On Spouse Visa</option>
                            <option value="On Father Visa" <?=($profile->visa_status == "On Father Visa")? "selected" : ""?>>On Father Visa</option>
                            <option value="Others" <?=($profile->visa_status == "Others")? "selected" : ""?>>Others</option>
                          </select>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Visa Valid Till</label>
                          <input type="date" class="form-control"  name="m_valid_till" value="<?=$profile->m_valid_till?>">
                        </div>
                    </div>                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Current Designation</label>
                          <input type="text" class="form-control"  name="m_current_design" value="<?=$profile->m_current_design?>">
                        </div>
                    </div>                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Desired Designation Now</label>
                          <input type="text" class="form-control"  name="m_desired_design" value="<?=$profile->m_desired_design?>">
                        </div>
                    </div>                   
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Field Background</label>
                          <input type="text" class="form-control"  name="m_f_background" value="<?=$profile->m_f_background?>">
                        </div>
                    </div>                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Current City</label>
                          <input type="text" class="form-control"  name="m_current_city" value="<?=$profile->m_current_city?>">
                        </div>
                    </div>                
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                          <label>Current Country</label>
                          <select name="m_current_country_id" class="select-category form-control">
                            <?php
                                $flag = "";
                                if($countries != "empty"){
                                    foreach($countries as $country){
                                        if($country->id == $profile->m_current_country_id)
                                            $flag = $country->alpha_2;
                                     ?>
                                    <option value="<?=$country->id?>" <?=($country->id == $profile->m_current_country_id)? "selected" :""?>>
                                    <?=$country->country?>
                            <?php }}?>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                          <label>Notice Peirod</label>
                          <select name="m_notice_period" class="select-category form-control">                       
                            <option value="Immediate Joiner" <?=($profile->m_notice_period  == "Immediate Joiner")? "selected" : ""?>> Immediate Joiner </option>
                            <option value="7 Days" <?=($profile->m_notice_period  == "7 Days")? "selected" : ""?>> 7 Days </option>
                            <option value="15 Days" <?=($profile->m_notice_period  == "15 Days")? "selected" : ""?>> 15 Days </option>
                            <option value="1 Month" <?=($profile->m_notice_period  == "1 Month")? "selected" : ""?>> 1 Month </option>
                            <option value="2 Months" <?=($profile->m_notice_period  == "2 Months")? "selected" : ""?>> 2 Months </option>
                            <option value="3 Months" <?=($profile->m_notice_period  == "3 Months")? "selected" : ""?>> 3 Months </option>
                            <option value="More Than 3 Months" <?=($profile->m_notice_period  == "More Than 3 Months")? "selected" : ""?>> More Than 3 Months </option>
                          </select>
                        </div>
                    </div>                
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                          <label>Marital Status</label>
                          <select name="m_married_status" class="select-category form-control">                       
                            <option value="single" <?=($profile->m_married_status  == "single")? "selected" : ""?>> Single </option>
                            <option value="married" <?=($profile->m_married_status  == "married")? "selected" : ""?>> Married </option>
                            <option value="divorced" <?=($profile->m_married_status  == "divorced")? "selected" : ""?>> Divorced </option>
                          </select>
                        </div>
                    </div>                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Driving License Status</label>
                          <input type="text" placeholder="" class="form-control" id="driving" name="m_driving_lisence" value="<?=$profile->m_driving_lisence?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Languages</label><span> Mention name with comma </span>
                          <input type="text" placeholder="" class="form-control" id="languages" name="m_languages" value="<?=$profile->m_languages?>">
                        </div>
                    </div>                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>NAVAFIZ Profile Link</label>
                          <input type="text" class="form-control" name="navafiz_profile_link" value="<?=$profile->navafiz_profile_link?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>LinkedIn Profile Link</label>
                          <input type="text" class="form-control" name="linkedin_profile_link" value="<?=$profile->linkedin_profile_link?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Youtube CV Link</label>
                          <input type="text" class="form-control" name="youtube_cv_link" value="<?=$profile->youtube_cv_link?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Additional Remarks</label>
                          <textarea name="m_add_remarks" style="resize:none; height: 150px;" class="form-control"><?= $profile->m_add_remarks ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <h4>Other Matching Titles/Position with my Profile & Skills</h4>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 1</label>
                          <input type="text" class="form-control" name="profession1" value="<?=$profile->profession1?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 2</label>
                          <input type="text" class="form-control" name="profession2" value="<?=$profile->profession2?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 3</label>
                          <input type="text" class="form-control" name="profession3" value="<?=$profile->profession3?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 4</label>
                          <input type="text" class="form-control" name="profession4" value="<?=$profile->profession4?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 5</label>
                          <input type="text" class="form-control" name="profession5" value="<?=$profile->profession5?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Save </button>
                    </div>
                </div>
              </form>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>
<script>
$(document).on('click', '.showjobdetailClass', function(){
    data = this.id;
    ids = data.split("_"); 
    id = ids[1];
		
    $("#showjobdetails_"+id).hide();
    $("#maineditjobdetails_"+id).show();
	
	
    $('#jobyear_'+id).datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
    $('#jobtoyear_'+id).datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
});
</script>