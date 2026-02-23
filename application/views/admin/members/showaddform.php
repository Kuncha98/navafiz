<script>
$(document).ready(function(){

	$("#email_address").blur(function()
		{
			
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;		
		var email = $('#email_address').val();
		if(!emailReg.test($('#email_address').val()) || $('#email_address').val() == ''){
			error = "Please enter a valid email";	
		 $("#sms-area").show();
		 $("#sms-area").addClass( "alert-danger" );
		 $("#message").html(error);
			
		
		}else
			{
			//$("#msgbox").html('Loading..');
			$.post("<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",{ email:email, actioncall: 'checkEmail' } ,function(data)
	        	{
				if(data == 1)
			  		{
					error = "Email already exists";
			  		$("#sms-area").show();
		    		$("#sms-area").addClass( "alert-danger" );
		    		$("#message").html(error);
			 
			 
			  		}
		  		});
			  }	
		})		
		
});
</script>

<form role="form" method="post" action="<?=site_url('admin/members/save_member')?>" class="form-horizontal form-bordered">
  <div class="panel panel-default">
    
    <div class="panel-body">
    
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
            <label class="col-sm-2 control-label">Team Role</label>
             <div class="col-sm-10">
            <select class="select-category form-control" name="role_id">
                <option value="0">Select Role</option>
                <?php foreach (GetUsersRoles() as $roles){?>
                <option value="<?=$roles->role_id?>"><?=$roles->role_name?></option>
                <?php }?>                                        
            </select>
            </div>
          </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
               <label class="col-sm-2 control-label">Name:</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter name" class="form-control" name="name" id="name" value="">
                </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label class="col-sm-2 control-label">Email Address:</label>
              <div class="col-sm-10">
                 <input type="text" placeholder="Enter email address" class="form-control" name="email_address" id="email_address" value="">
              </div>
      </div>  
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Phone:</label>
                <div class="col-sm-10">
                  <input type="text" placeholder="Enter phone" class="form-control" name="phone" id="" value="">
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
                                    <option value="<?=$category->c_id?>" >
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
                                    <option value="<?=$category->c_id?>">
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
                                    <option value="<?=$category->c_id?>">
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
                  <input type="text" class="form-control" name="m_profession" id="" value="">
                </div>
              </div>
            </div>
        </div>
                     
      
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Experiance:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_experience" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">U.A.E Experiance:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="uae_experience" id="" value="">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Current Employer:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_employer" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Employement Status:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="employment_status" id="" value="">
                </div>
              </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Nationality:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_nationality" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Home Country:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_current_country_id" id="" value="">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Home City:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_city" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Phone:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_phone" id="" value="">
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
            <option value="male">Male</option>
            <option value="female">Female</option>
         </select>
        </div>
        </div> 
            </div>
            
            
            
            
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Current City:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_current_city" id="" value="">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Current Country:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_current_country_id" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Material Status:</label>
                <div class="col-sm-10">
                    <select name="m_married_status" class="form-control">
                        <option value="0">Select Material Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
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
                  <input type="text" class="form-control" name="m_driving_lisence" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Languages Mention name with comma:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_languages" id="" value="">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">LinkedIn Profile Link Mention name with comma:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="linkedin_profile_link" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Youtube CV Link:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="youtube_cv_link" id="" value="">
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Member Status</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_status" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Facebook Link</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="m_fb" id="" value="">
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
                  <input type="text" class="form-control" name="profession1" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Titles/Position 2:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="profession2" id="" value="">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Titles/Position 3:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="profession3" id="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Titles/Position 4:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="profession4" id="" value="">
                </div>
              </div>
            </div>
        </div>
        
        
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Titles/Position 5:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="profession5" id="" value="">
                </div>
              </div>
            </div>
          <div class="col-md-6">
                <div class="form-group">
                <label class="col-sm-2 control-label">Visa status(UAE):</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="visa_status" id="" value="">
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
