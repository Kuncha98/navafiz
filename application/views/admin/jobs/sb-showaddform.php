


<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />


<form action="<?=base_url()?>admin/jobs/savejob" class="form-horizontal form-bordered" method="post" id="" enctype="multipart/form-data">
  <input type="hidden" id="jobimage" name="jobimage" value="" />
  
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Category:</label>
        <div class="col-sm-10">
          <select id="jobcat_id" name="jobcat_id" class="form-control" required> 
            <?php
			 
				 if($categories != "empty")
				 {
					 foreach($categories as $category)
					 {
				 ?>
          
            
             <option value="<?=$category->c_id?>" >
              <?=$category->c_name?>
              </option>
            
            <?php
					 }
				 }
				 ?>
          </select>
        </div>
      </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Job Title:</label>
        <div class="col-sm-10">
          <select id="jobtitle" name="jobtitle" class="form-control" required>
              <option value="">Select title</option>
              <?php foreach($job_title as $title){ ?>			 
                    <option value="<?=$title->jt_id?>">
                      <?=$title->jt_title?>
                    </option>
                    <?php 
            
              }
	?>
          </select>
        </div>
      </div>
      </div>
  </div>
  
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Job Reference By:</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Enter Title" id="autouser" class="form-control" name="m_name" value="" required>
            <input type="hidden" placeholder="Enter Title" id="userid" class="form-control" name="user_id" value="" >
        </div>
      </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
        <label class="col-sm-2 control-label">Slug:</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Enter Slug" class="form-control" name="jobslug" id="jobslug" value="" required >
        </div>
      </div>
      </div>
  </div>
   
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter title if the job title is not available in upper job title" class="form-control" name="jobtitle2" id="jobtitle2"  >
        </div>
      </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Country:</label>
        <div class="col-sm-10">
          
           <select id="jobcountry" name="jobcountry" class="form-control" required>
            <?php
			 
				 if($countries != "empty")
				 {
					 foreach($countries as $country)
					 {
				 ?>
          
            
             <option value="<?=$country->id?>" >
              <?=$country->country?>
              </option>
            
            <?php
					 }
				 }
				 ?>
          </select>
          
        </div>
      </div>
      </div>
  </div>
     
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Image:</label>
        <div class="col-sm-10">
           <input type="file" id="pic"  name="pic">
                 
        </div>
      </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">state:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter State" class="form-control" name="jobstate" id="jobstate" required>
        </div>
      </div>
      </div>
  </div>
      
      
  <div class="row">
      <div class="col-md-6">
         <div class="form-group">
        <label class="col-sm-2 control-label">City:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter City" class="form-control" name="jobcity" id="jobcity"  required>
        </div>
      </div> 
      </div>
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Name of company:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name of Company" class="form-control" name="jobcompany" id="jobcompany"  required>
        </div>
      </div>
      </div>
  </div>
    
      
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Email Address to Apply:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Address to Apply" class="form-control" name="jobemailapply" id="jobemailapply"  required>
        </div>
      </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Skills required for job:</label>
        <div class="col-sm-10">
          <input type="text" id="tags2" name="tags2" class="tags form-control" value="">
        </div>
      </div>
      </div>
  </div>
      
      
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
        <textarea class="editor" name="jobdescr" rows="4" cols="50" id="jobdescr"	 placeholder="Enter text ..."></textarea>
       
        </div>
      </div>
      </div>
  </div>
  
    <div class="col-md-12">
          <div class="form-actions">
        <input type="submit" class="btn btn-primary btn-block" value="Submit" />
         </div>
       </div>
      
      
       
      
      
      
    
      
 
 
</form>
              
    
  <script> 
    $(document).ready(function(){

     $( "#autouser" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>admin/members/userList",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
                console.log('ajax complte');
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#autouser').val(ui.item.label); // display the selected text
//          $('#name').val(ui.item.label); // display the selected text
          $('#userid').val(ui.item.value); // save selected id to input
         
          return false;
        }
      });

    });


   
</script>




   

 
