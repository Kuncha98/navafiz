<?php $this->load->view('admin/header.php'); ?>

<body>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<?php $this->load->view('admin/page_top.php'); ?>
<div class="page-container"> 
  <?php $this->load->view('admin/left_side.php'); ?>
  <div class="page-content"> 
    <div class="page-header">
      <div class="page-title">
        <h3>Jobs </h3>
      </div>
       </div>
       
     
       
       <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin/jobs">Home</a></li>
        <li class="active">Jobs</li>
      </ul>
      <div class="visible-xs breadcrumb-toggle"> <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a> </div>
      
    </div>
  <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
        <li id="list"><a href="<?=base_url()?>admin/jobs" id="listForms"><i class="icon-checkbox-partial"></i> List Jobs</a></li>
        <li id="add"><a href="<?=base_url()?>admin/jobs/addjobform" id="showAddForm"><i class="icon-checkbox-unchecked"></i> Add Job</a></li>
       
      </ul>
      <div class="alert fade in block-inner" id="sms-area" style="display:none">
		                <button data-dismiss="alert" class="close" type="button">×</button>
		                <i class="icon-checkmark-circle"></i> <span id="message"></span>
		            </div>
      <div class="tab-content"> 
        
        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside"> 
               
          <div class="panel panel-default">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-paragraph-justify"></i> Jobs</h6>
            </div>
               <div id="loading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/admin/images/large.gif" alt="Loading..." /> </div>
           <form action="<?=base_url()?>admin/jobs/updatejob" class="form-horizontal form-bordered" method="post" id="jobpage" enctype="multipart/form-data">
  <input type="hidden" id="job_id" name="job_id" value="<?=$form->j_id?>" />
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Category:</label>
        <div class="col-sm-10">
          <select id="jobcat_id" name="jobcat_id" class="form-control">
            <?php
			 
				 if($categories != "empty")
				 {
					 foreach($categories as $category)
					 {
				 ?>
          
            
             <option value="<?=$category->c_id?>" <?php echo ($category->c_id == $form->cat_id)? "selected" : "" ?> >
              <?=$category->c_name?>
              </option>
            
            <?php
					 }
				 }
				 ?>
          </select>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Job Title:</label>
        <div class="col-sm-10">
          <select id="jobtitle" name="jobtitle" class="form-control">
           <option value="">Select title</option>
              <?php			 
                    $cat_qry = "SELECT * FROM jb_jobtitle where jt_status =1";
                    $cat_rs =  mysql_query($cat_qry); echo mysql_error();
                    while($cat_row = mysql_fetch_array($cat_rs))
                    { ?>
          
            
             <option value="<?=$cat_row['jt_title']?>" <?php echo ($cat_row['jt_title'] == $form->j_title)? "selected" : "" ?>>
               <?=$cat_row['jt_title']?>
              </option>
            
            <?php
					
				 }
				 ?>
          </select>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="jobtitle2" id="jobtitle2" value="<?=$form->j_title?>" >
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Slug:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Slug" class="form-control" name="jobslug" id="jobslug" value="<?=$form->j_slug?>" >
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Country:</label>
        <div class="col-sm-10">
          
           <select id="jobcountry" name="jobcountry" class="form-control">
            <?php
			
			 
				 if($countries != "empty")
				 {
					 foreach($countries as $country)
					 {
				 ?>
          
            
             <option value="<?=$country->id?>" <?php echo ($country->id == $form->j_country_id)? "selected" : "" ?> >
              <?=$country->country?>
              </option>
            
            <?php
					 }
				 }
				 ?>
          </select>
          
        </div>
      </div>
      
    <div class="form-group">
        <label class="col-sm-2 control-label">Image:</label>
        <div class="col-sm-10">
           <input type="file" id="pic"  name="pic">
            <img id="j_image" src="<?=base_url()?>assets/uploads/jobs/<?=$form->j_image?>" width="80"/>
                 
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">state:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter State" class="form-control" name="jobstate" id="jobstate" value="<?=$form->j_state?>"  >
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">City:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter City" class="form-control" name="jobcity" id="jobcity" value="<?=$form->j_location?>" >
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Name of company:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name of Company" class="form-control" name="jobcompany" id="jobcompany" value="<?=$form->j_company?>"  >
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Email Address to Apply *:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Address to Apply" class="form-control" name="jobemailapply" id="jobemailapply" value="<?=$form->j_email_apply?>"  >
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Skills required for job:</label>
        <div class="col-sm-10">
          <input type="text" id="tags2" class="tags" value="<?=$form->j_tags?>">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
        <textarea class="editor" name="jobdescr" id="jobdescr"	 placeholder="Enter text ..."><?=$form->j_descr?>" </textarea>
</textarea>
       
        </div>
      </div>
      
      
    
      <div class="form-actions text-right">
        <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </div>
</form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('admin/footer.php'); ?>
   
  </div>
 
</div>
</body>
</html>