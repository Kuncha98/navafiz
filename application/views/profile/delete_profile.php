<?php 
$this->load->view('include/header'); 
$session_user_id = $this->session->userdata('user_id');
?>
<div class="container">
    
    <div class="row">
        <div class="col-md-12 col-xs-12">                              
            <?php $this->load->view('notification/notification-messages');?>
            <form action="<?=base_url('profile/Delete/'.$profile_details->m_id)?>" id="memberpage" method="post">
                <?php if(in_array($session_user_id, CvReviewTeamList())){ ?>
                <div class="card" style="margin-bottom: 30px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 mx-auto">
                                <div class="form-group">
                                    <?php echo GetRoleName($profile_details->role_id);?>
                                    <label>Team Role</label>
                                    <select class="select-category form-control" name="role_id" disabled="disabled">
                                        <option value="0">Select Role</option>
                                        <?php foreach (GetUsersRoles() as $roles){?>
                                        <option <?=$profile_details->role_id==$roles->role_id ? 'selected=""':'';?> value="<?=$roles->role_id?>"><?=$roles->role_name?></option>
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
                            <input type="text" placeholder="" class="form-control" id="profname" name="m_name" value="<?=$profile_details->m_name?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="" class="form-control" value="<?=$profile_details->m_email?>" disabled>
                        </div>
                    </div>
                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="select-category form-control" disabled="disabled" id="gender" name="gender" disabled>
                                <option value="male" <?=($profile_details->gender == "male")? "selected" : ""?>> Male </option>
                                <option value="female" <?=($profile_details->gender == "female")? "selected" : ""?>> Female </option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Category<span class="required">*</span></label>
                          <select class="select-category form-control" name="m_category" disabled>
                            <option value="">Select Category</option>
                            <?php
                            if($categories != "empty"){                            
                                foreach($categories as $category){?>
                                    <option value="<?=$category->c_id?>" <?=($category->c_id == $profile_details->m_category)? "selected" : ""?>>
                                    <?=$category->c_name?>
                                    </option>
                            <?php } }?>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Profession</label>
                          <input type="text" placeholder="" class="form-control" name="m_profession" value="<?=$profile_details->m_profession?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Experience</label>
                          <select class="select-category form-control" id="experience" disabled="disabled" name="m_experience">
                            <option <?=($profile_details->m_experience == "Fresh")? "selected" : ""?>> Fresh </option>
                            <option <?=($profile_details->m_experience == "1 Years")? "selected" : ""?>> 1 Years </option>
                            <option <?=($profile_details->m_experience == "2 Years")? "selected" : ""?>> 2 Years </option>
                            <option <?=($profile_details->m_experience == "3 Years")? "selected" : ""?>> 3 Years </option>
                            <option <?=($profile_details->m_experience == "4 Years")? "selected" : ""?>> 4 Years </option>
                            <option <?=($profile_details->m_experience == "5 Years")? "selected" : ""?>> 5 Years </option>
                            <option <?=($profile_details->m_experience == "6 Years")? "selected" : ""?>> 6 Years </option>
                            <option <?=($profile_details->m_experience == "7 Years")? "selected" : ""?>> 7 Years </option>
                            <option <?=($profile_details->m_experience == "8 Years")? "selected" : ""?>> 8 Years </option>
                            <option <?=($profile_details->m_experience == "9 Years")? "selected" : ""?>> 9 Years </option>
                            <option <?=($profile_details->m_experience == "10 Years")? "selected" : ""?>> 10 Years </option>
                            <option <?=($profile_details->m_experience == "11 Years")? "selected" : ""?>> 11 Years </option>
                            <option <?=($profile_details->m_experience == "12 Years")? "selected" : ""?>> 12 Years </option>
                            <option <?=($profile_details->m_experience == "13 Years")? "selected" : ""?>> 13 Years </option>
                            <option <?=($profile_details->m_experience == "14 Years")? "selected" : ""?>> 14 Years </option>
                            <option <?=($profile_details->m_experience == "15 Years")? "selected" : ""?>> 15 Years </option>
                            <option <?=($profile_details->m_experience == "More than 15 Years")? "selected" : ""?>> More than 15 Years </option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>U.A.E Experience</label>
                          <select class="select-category form-control" id="experience" disabled="disabled" name="uae_experience">
                            <option <?=($profile_details->uae_experience == "Fresh")? "selected" : ""?>> Fresh </option>
                            <option <?=($profile_details->m_experience == "1 Years")? "selected" : ""?>> 1 Years </option>
                            <option <?=($profile_details->uae_experience == "2 Years")? "selected" : ""?>> 2 Years </option>
                            <option <?=($profile_details->uae_experience == "3 Years")? "selected" : ""?>> 3 Years </option>
                            <option <?=($profile_details->uae_experience == "4 Years")? "selected" : ""?>> 4 Years </option>
                            <option <?=($profile_details->uae_experience == "5 Years")? "selected" : ""?>> 5 Years </option>
                            <option <?=($profile_details->uae_experience == "6 Years")? "selected" : ""?>> 6 Years </option>
                            <option <?=($profile_details->uae_experience == "7 Years")? "selected" : ""?>> 7 Years </option>
                            <option <?=($profile_details->uae_experience == "8 Years")? "selected" : ""?>> 8 Years </option>
                            <option <?=($profile_details->uae_experience == "9 Years")? "selected" : ""?>> 9 Years </option>
                            <option <?=($profile_details->uae_experience == "10 Years")? "selected" : ""?>> 10 Years </option>
                            <option <?=($profile_details->uae_experience == "11 Years")? "selected" : ""?>> 11 Years </option>
                            <option <?=($profile_details->uae_experience == "12 Years")? "selected" : ""?>> 12 Years </option>
                            <option <?=($profile_details->uae_experience == "13 Years")? "selected" : ""?>> 13 Years </option>
                            <option <?=($profile_details->uae_experience == "14 Years")? "selected" : ""?>> 14 Years </option>
                            <option <?=($profile_details->uae_experience == "15 Years")? "selected" : ""?>> 15 Years </option>
                            <option <?=($profile_details->uae_experience == "More than 15 Years")? "selected" : ""?>> More than 15 Years </option>
                          </select>
                        </div>
                    </div>
                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Current Employer</label>
                          <input type="text" placeholder="" class="form-control" name="m_employer" value="<?=$profile_details->m_employer?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Employment status</label>
                          <select class="select-category form-control" id="employment_status" name="employment_status" disabled="disabled">
                                <option value="employed" <?=($profile_details->employment_status == "employed")? "selected" : ""?>> Employed </option>
                            <option value="unemployed" <?=($profile_details->employment_status == "unemployed")? "selected" : ""?>> Un employed </option>
                            <option value="contract" <?=($profile_details->employment_status == "contract")? "selected" : ""?>> Contract </option>
                            <option value="others" <?=($profile_details->employment_status == "others")? "selected" : ""?>> Others </option>
                          </select>
                        </div>
                  </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Nationality</label>
                          <input type="text" placeholder="" class="form-control" name="m_nationality" value="<?=$profile_details->m_nationality?>" disabled>
                        </div>
                    </div>                    
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Home Country</label>
                          <select id="country_id" name="country_id" class="select-category form-control" disabled="disabled">
                            <?php
                                $flag = "";
                                if($countries != "empty"){
                                    foreach($countries as $country){
                                        if($country->id == $profile_details->country_id)
                                            $flag = $country->alpha_2;
                                     ?>
                                <option value="<?=$country->id?>" <?=($country->id == $profile_details->country_id)? "selected" :""?>>
                                <?=$country->country?>
                            <?php } }?>
                          </select>
                        </div>
                    </div>
                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Home City</label>
                          <input type="text" placeholder="" class="form-control" id="location" name="m_city" value="<?=$profile_details->m_city?>" disabled>
                        </div>
                    </div>                    
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" placeholder="" class="form-control" id="phone" name="m_phone" value="<?=$profile_details->m_phone?>" disabled>
                        </div>
                  </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Visa status  (<?php echo $profile_details->visa_status;?>)</label>
                          <select class="select-category form-control" disabled="disabled" id="visa_status" name="visa_status">
                            <option value="Not Applicable" <?=($profile_details->visa_status == "Not Applicable")? "selected" : ""?>>Not Applicable</option>
                            <option value="Employment Visa in UAE" <?=($profile_details->visa_status == "Employment Visa in UAE")? "selected" : ""?>>Employment Visa in UAE</option>
                            <option value="Visit Visa in UAE" <?=($profile_details->visa_status == "Visit Visa in UAE")? "selected" : ""?>>Visit Visa in UAE</option>
                            <option value="On Spouse Visa" <?=($profile_details->visa_status == "On Spouse Visa")? "selected" : ""?>>On Spouse Visa</option>
                            <option value="On Father Visa" <?=($profile_details->visa_status == "On Father Visa")? "selected" : ""?>>On Father Visa</option>
                            <option value="Others" <?=($profile_details->visa_status == "Others")? "selected" : ""?>>Others</option>
                          </select>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Current City</label>
                          <input type="text" class="form-control"  name="m_current_city" value="<?=$profile_details->m_current_city?>" disabled>
                        </div>
                    </div>                
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                          <label>Current Country</label>
                          <select name="m_current_country_id" class="select-category form-control" disabled="disabled">
                            <?php
                                $flag = "";
                                if($countries != "empty"){
                                    foreach($countries as $country){
                                        if($country->id == $profile_details->m_current_country_id)
                                            $flag = $country->alpha_2;
                                     ?>
                                    <option value="<?=$country->id?>" <?=($country->id == $profile_details->m_current_country_id)? "selected" :""?>>
                                    <?=$country->country?>
                            <?php }}?>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                          <label>Marital Status</label>
                          <select name="m_married_status" class="select-category form-control" disabled="disabled">                       
                            <option value="single" <?=($profile_details->m_married_status  == "single")? "selected" : ""?>> Single </option>
                            <option value="married" <?=($profile_details->m_married_status  == "married")? "selected" : ""?>> Married </option>
                            <option value="divorced" <?=($profile_details->m_married_status  == "divorced")? "selected" : ""?>> Divorced </option>
                          </select>
                        </div>
                    </div>                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Driving License Status</label>
                          <input type="text" placeholder="" class="form-control" id="driving" name="m_driving_lisence" value="<?=$profile_details->m_driving_lisence?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Languages</label><span> Mention name with comma </span>
                          <input type="text" placeholder="" class="form-control" id="languages" name="m_languages" value="<?=$profile_details->m_languages?>" disabled>
                        </div>
                    </div>                
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>LinkedIn Profile Link</label><span> Mention name with comma </span>
                          <input type="text" class="form-control" name="linkedin_profile_link" value="<?=$profile_details->linkedin_profile_link?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Youtube CV Link</label>
                          <input type="text" class="form-control" name="youtube_cv_link" value="<?=$profile_details->youtube_cv_link?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <h4>Other Matching Titles/Position with my Profile & Skills</h4>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 1</label>
                          <input type="text" class="form-control" name="profession1" value="<?=$profile_details->profession1?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 2</label>
                          <input type="text" class="form-control" name="profession2" value="<?=$profile_details->profession2?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 3</label>
                          <input type="text" class="form-control" name="profession3" value="<?=$profile_details->profession3?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 4</label>
                          <input type="text" class="form-control" name="profession4" value="<?=$profile_details->profession4?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Titles/Position 5</label>
                          <input type="text" class="form-control" name="profession5" value="<?=$profile_details->profession5?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" onclick="return confirm('Are you Sure you want to delete this?')" class="btn btn-outline-danger col-md-12 col-sm-12 col-xs-12"> Delete </button>
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