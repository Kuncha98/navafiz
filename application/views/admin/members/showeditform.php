
<form role="form" method="post" action="<?=site_url('admin/members/update_member').'/'.$form->m_id?>" class="form-horizontal form-bordered">
  <div class="panel panel-default">
    
    <div class="panel-body">
    
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
            <?php echo GetRoleName($form->role_id);?>
            <label class="col-sm-2 control-label">Team Role</label>
             <div class="col-sm-10">
            <select class="select-category form-control" name="role_id">
                <option value="0">Select Role</option>
                <?php foreach (GetUsersRoles() as $roles){?>
                <option <?=$form->role_id==$roles->role_id ? 'selected=""':'';?> value="<?=$roles->role_id?>"><?=$roles->role_name?></option>
                <?php }?>                                        
            </select>
            </div>
          </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
               <label class="col-sm-2 control-label">Name:</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter name" class="form-control" name="name" id="name" value="<?=$form->m_name?>">
                </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label class="col-sm-2 control-label">Email Address:</label>
              <div class="col-sm-10">
                 <input type="text" placeholder="Enter email address" class="form-control" name="email_address" id="email_address" value="<?=$form->m_email?>">
              </div>
      </div>  
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Phone:</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter phone" class="form-control" name="phone" id="" value="<?=$form->m_phone?>">
                </div>
              </div> 
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Industry 1:</label>
                <div class="col-sm-10">
                  <select class="select-category form-control" name="m_category">
                            <option value="">Select Industry</option>
                            <?php
                            if($categories != "empty"){                            
                                foreach($categories as $category){?>
                                    <option value="<?=$category->c_id?>" <?=($category->c_id == $form->m_category)? "selected" : ""?>>
                                    <?=$category->c_name?>
                                    </option>
                            <?php } }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Industry 2:</label>
                <div class="col-sm-10">
                  <select class="select-category form-control" name="m_category">
                            <option value="">Select Industry</option>
                            <?php
                            if($categories != "empty"){                            
                                foreach($categories as $category){?>
                                    <option value="<?=$category->c_id?>" <?=($category->c_id == $form->industry1)? "selected" : ""?>>
                                    <?=$category->c_name?>
                                    </option>
                            <?php } }?>
                  </select>
                </div>
              </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Industry 3:</label>
                <div class="col-sm-10">
                  <select class="select-category form-control" name="m_category">
                            <option value="">Select Industry</option>
                            <?php
                            if($categories != "empty"){                            
                                foreach($categories as $category){?>
                                    <option value="<?=$category->c_id?>" <?=($category->c_id == $form->industry2)? "selected" : ""?>>
                                    <?=$category->c_name?>
                                    </option>
                            <?php } }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Profession:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_profession" id="" value="<?=$form->m_profession?>">
                </div>
              </div>
            </div>
        </div>
                     
      
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Experiance:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_experience" id="" value="<?=$form->m_experience?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">U.A.E Experiance:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="uae_experience" id="" value="<?=$form->uae_experience?>">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Current Employer:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_employer" id="" value="<?=$form->m_employer?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Employement Status:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="employment_status" id="" value="<?=$form->employment_status?>">
                </div>
              </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Nationality:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_nationality" id="" value="<?=$form->m_nationality?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Home Country:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_current_country_id" id="" value="<?=$form->m_current_country_id?>">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Home City:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_city" id="" value="<?=$form->m_city?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Phone:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_phone" id="" value="<?=$form->m_phone?>">
                </div>
              </div>
            </div>
        </div>
        
        
        <div class="row">
            
            <div class="col-md-6">
           <div class="form-group">
        <label class="col-sm-2 control-label">Gender:</label>
        <div class="col-sm-10">
         <select class="form-control" name="gender" id="gender">
            <option value="">Select Gender</option>
            <option value="male" <?=($form->gender == "male")? "selected":""?>>Male</option>
            <option value="female" <?=($form->gender == "female")? "selected":""?>>Female</option>
         </select>
        </div>
        </div> 
            </div>
            
            
            
            
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Current City:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_current_city" id="" value="<?=$form->m_current_city?>">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Current Country:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_current_country_id" id="" value="<?=$form->m_current_country_id?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Material Status:</label>
                <div class="col-sm-10">
                    <select name="m_married_status" class="form-control">
                        <option value="0">Select Material Status</option>
                        <option value="single" <?=($form->m_married_status == "single")? "selected":""?>>Single</option>
                        <option value="married" <?=($form->m_married_status == "married")? "selected":""?>>Married</option>
                        <option value="divorced" <?=($form->m_married_status == "divorced")? "selected":""?>>Divorced</option>
                    </select>
                </div>
              </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Driving License Status:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_driving_lisence" id="" value="<?=$form->m_driving_lisence?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Languages Mention name with comma:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_languages" id="" value="<?=$form->m_languages?>">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">LinkedIn Profile Link Mention name with comma:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="linkedin_profile_link" id="" value="<?=$form->linkedin_profile_link?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Youtube CV Link:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="youtube_cv_link" id="" value="<?=$form->youtube_cv_link?>">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Member Status</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_status" id="" value="<?=$form->m_status?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Facebook Link</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_fb" id="" value="<?=$form->m_fb?>">
                </div>
              </div>
            </div>
        </div>
        
        <h3>Other Matching Titles/Position with my Profile & Skills</h3>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Titles/Position 1:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="profession1" id="" value="<?=$form->profession1?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Titles/Position 2:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="profession2" id="" value="<?=$form->profession2?>">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Titles/Position 3:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="profession3" id="" value="<?=$form->profession3?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Titles/Position 4:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="profession4" id="" value="<?=$form->profession4?>">
                </div>
              </div>
            </div>
        </div>
        
        
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Titles/Position 5:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="profession5" id="" value="<?=$form->profession5?>">
                </div>
              </div>
            </div>
          <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Visa status(UAE):</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="visa_status" id="" value="<?=$form->visa_status?>">
                </div>
              </div>
            </div>
            
        </div>
      
        <!--<div class="form-group">
        <label class="col-sm-2 control-label">Password:</label>
        <div class="col-sm-10">
          <input type="password" placeholder="" class="form-control" name="password" id="password">
        </div>
      </div>-->
      
     <div class="form-actions text-right">
          <input type="submit" class="btn btn-primary btn-block" value="Submit"/> 
      </div>
    </div>
  </div>
</form>
